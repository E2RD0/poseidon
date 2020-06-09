/*
 Consultas para reportes con parámetros
 */
SELECT
    idUsuario,
    nombre,
    apellido,
    email,
    tipo
FROM
    usuario u
    INNER JOIN tipoUsuario t ON u.idTipoUsuario = t.idTipoUsuario
WHERE
    t.tipo = ?;

SELECT
    i.idInformacionAlquiler,
    p.nombre,
    precioAlquiler,
    poliza,
    existenciasAlquiler
FROM
    informacionAlquiler i
    INNER JOIN producto p ON i.idProducto = p.idProducto
WHERE
    i.idProducto = ?;

SELECT
    idProducto,
    nombre,
    precio,
    descripcion,
    existenciasCompra,
    categoria
FROM
    producto p
    INNER JOIN categoriaProducto c ON p.idCategoriaProducto = c.idCategoriaProducto
WHERE
    c.categoria = ?;

SELECT
    o.idorden,
    p.nombre,
    d.precioUnitario,
    d.cantidad,
    concat(c.nombre, ' ', c.apellido) "Nombre del cliente"
FROM
    detalleOrden d
    INNER JOIN orden o ON d.idOrden = o.idOrden
    INNER JOIN producto p ON d.idProducto = p.idProducto
    INNER JOIN cliente c ON o.idCliente = c.idCliente
WHERE
    o.idOrden = ?;

SELECT
    valor
FROM
    opcionesGenerales
WHERE
    clave = ?;



    /*
     Consultas para reportes con rango de fechas
     */

SELECT
    *
FROM
    orden
WHERE
    fechaEntrega BETWEEN ?
    AND ?;

SELECT
    *
FROM
    orden
WHERE
    fechaCompra = ?;

SELECT
    *
FROM
    ordenAlquiler
WHERE
    fechaDespacho BETWEEN ?
    AND ?;



    /*
     Consultas para gráficos
     */

SELECT
    idproducto,
    nombre,
    existenciascompra
FROM
    producto;

SELECT
    detalleorden.idproducto AS "Producto No.",
    producto.nombre AS "Producto",
    SUM(SUM(detalleorden.cantidad)) OVER (PARTITION BY detalleorden.idproducto) AS "Productos vendidos"
FROM
    detalleorden
    INNER JOIN producto ON producto.idproducto = detalleorden.idproducto
GROUP BY
    "Producto No.",
    "Producto"
ORDER BY
    "Productos vendidos" DESC;

SELECT
    detalleorden.idorden AS "Orden No.",
    cliente.nombre || ' ' || cliente.apellido AS "Nombre del cliente",
    SUM(
        SUM(
            detalleorden.preciounitario * detalleorden.cantidad
        )
    ) OVER (PARTITION BY detalleorden.idorden) AS "Total"
FROM
    detalleorden
    INNER JOIN orden ON orden.idorden = detalleorden.idorden
    INNER JOIN cliente ON cliente.idcliente = orden.idcliente
WHERE
    orden.fechacompra BETWEEN '2020-02-20 08:32:41.99983-06'
    AND '2020-02-22 08:32:41.99983-06'
GROUP BY
    "Orden No.",
    "Nombre del cliente"
ORDER BY
    "Total" DESC;

SELECT
    *
FROM
    (
        SELECT
            DISTINCT ON (producto.idproducto) producto.idproducto AS "Producto No.",
            producto.nombre AS "Producto",
            COUNT(review.iddetalleorden) OVER (PARTITION BY producto.idproducto) AS "Cantidad de comentarios",
            AVG(review.calificacion) OVER (PARTITION BY producto.idproducto) AS "Promedio de nota"
        FROM
            review
            INNER JOIN detalleorden ON review.iddetalleorden = detalleorden.iddetalleorden
            INNER JOIN producto ON producto.idproducto = detalleorden.idproducto
        GROUP BY
            producto.idproducto,
            review.iddetalleorden,
            review.calificacion
    ) result
ORDER BY
    "Cantidad de comentarios" DESC;

SELECT
    COUNT(DISTINCT orden.idorden) AS "Numero de ordenes",
    SUM(
        detalleorden.preciounitario * detalleorden.cantidad
    ) AS "Total"
FROM
    orden
    INNER JOIN detalleorden ON detalleorden.idorden = orden.idorden
WHERE
    orden.fechacompra BETWEEN '2020-01-20 08:32:41.99983-06'
    AND '2020-02-20 08:32:41.99983-06';


--Funciones

--get basic data from orders
CREATE
OR REPLACE FUNCTION getOrders () RETURNS TABLE (
    idorden INT,
    cliente VARCHAR,
    direccion VARCHAR,
    total NUMERIC,
    fechacompra VARCHAR
) AS $$ DECLARE var RECORD;

BEGIN FOR var IN (
    SELECT
        Ordenes."Orden No." AS idorden,
        Ordenes."Nombre del cliente" AS cliente,
        orden.direccion AS direccion,
        Ordenes."Total" AS total,
        to_char(orden.fechacompra, 'DD Mon YY HH12:MI:SS') AS fechacompra
    FROM
        (
            SELECT
                detalleorden.idorden AS "Orden No.",
                cliente.nombre || ' ' || cliente.apellido AS "Nombre del cliente",
                SUM (
                    SUM (
                        detalleorden.preciounitario * detalleorden.cantidad
                    )
                ) OVER (PARTITION BY detalleorden.idorden) AS "Total"
            FROM
                detalleorden
                INNER JOIN orden ON orden.idorden = detalleorden.idorden
                INNER JOIN cliente ON cliente.idcliente = orden.idcliente
            GROUP BY
                "Orden No.",
                "Nombre del cliente"
        ) AS Ordenes
        JOIN orden ON orden.idorden = Ordenes."Orden No."
    ORDER BY
        idorden ASC
) LOOP idorden := var.idorden;

cliente := var.cliente;

direccion := var.direccion;

total := var.total;

fechacompra := var.fechacompra;

RETURN NEXT;

END LOOP;

END;

$$ LANGUAGE 'plpgsql';

--get specific data from one order
CREATE
OR REPLACE FUNCTION getOrders () RETURNS TABLE (
    idorden INT,
    cliente VARCHAR,
    direccion VARCHAR,
    total NUMERIC,
    fechacompra VARCHAR
) AS $ $ DECLARE var RECORD;

BEGIN FOR var IN (
    SELECT
        Ordenes."Orden No." AS idorden,
        Ordenes."Nombre del cliente" AS cliente,
        orden.direccion AS direccion,
        Ordenes."Total" AS total,
        to_char(orden.fechacompra, 'DD Mon YY HH12:MI:SS') AS fechacompra
    FROM
        (
            SELECT
                detalleorden.idorden AS "Orden No.",
                cliente.nombre || ' ' || cliente.apellido AS "Nombre del cliente",
                SUM (
                    SUM (
                        detalleorden.preciounitario * detalleorden.cantidad
                    )
                ) OVER (PARTITION BY detalleorden.idorden) AS "Total"
            FROM
                detalleorden
                INNER JOIN orden ON orden.idorden = detalleorden.idorden
                INNER JOIN cliente ON cliente.idcliente = orden.idcliente
            GROUP BY
                "Orden No.",
                "Nombre del cliente"
        ) AS Ordenes
        JOIN orden ON orden.idorden = Ordenes."Orden No."
    ORDER BY
        idorden ASC
) LOOP idorden := var.idorden;

cliente := var.cliente;

direccion := var.direccion;

total := var.total;

fechacompra := var.fechacompra;

RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE 'plpgsql';

SELECT
    *
FROM
    getOrderDetails(2);

DROP FUNCTION getOrderDetails;

CREATE
OR REPLACE FUNCTION getOrderGeneralDetails (id_orden INT) RETURNS TABLE (
    idorden INT,
    cliente VARCHAR,
    email VARCHAR,
    telefono VARCHAR,
    direccion VARCHAR,
    fechacompra TIMESTAMP,
    fechaentrega DATE,
    subtotal NUMERIC,
    IVA NUMERIC,
    total NUMERIC
) AS $ $ DECLARE order_info RECORD;

selected_order INT := id_orden;

temp_iva NUMERIC;

iva_value NUMERIC;

BEGIN iva_value := (
    SELECT
        valor
    FROM
        opcionesgenerales
    WHERE
        clave = 'IVA'
);

FOR order_info IN (
    SELECT
        orden.idorden,
        cliente.nombre || ' ' || cliente.apellido AS cliente,
        cliente.email,
        cliente.telefono,
        orden.direccion,
        orden.fechacompra,
        orden.fechaentrega,
        SUM (
            SUM (
                detalleorden.preciounitario * detalleorden.cantidad
            )
        ) OVER (PARTITION BY detalleorden.idorden) AS "subtotal"
    FROM
        orden
        JOIN cliente ON orden.idcliente = cliente.idcliente
        JOIN detalleorden ON orden.idorden = detalleorden.idorden
    WHERE
        orden.idorden = selected_order
    GROUP BY
        orden.idorden,
        cliente,
        cliente.email,
        cliente.telefono,
        orden.direccion,
        detalleorden.idorden
) LOOP idorden := order_info.idorden;

cliente := order_info.cliente;

email := order_info.email;

telefono := order_info.telefono;

direccion := order_info.direccion;

fechacompra := order_info.fechacompra;

fechaentrega := order_info.fechaentrega;

subtotal := order_info.subtotal;

temp_iva = order_info.subtotal * iva_value;

iva := temp_iva;

total := order_info.subtotal + temp_iva;

RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE 'plpgsql';

CREATE
OR REPLACE FUNCTION getOrderDetails(id_orden INT) RETURNS TABLE(
    nombre VARCHAR,
    cantidad INT,
    preciounitario NUMERIC
) AS $ $ DECLARE orderDetails RECORD;

selected_order INT := id_orden;

BEGIN FOR orderDetails IN (
    SELECT
        producto.nombre,
        detalleorden.cantidad,
        detalleorden.preciounitario
    FROM
        detalleorden
        JOIN orden ON detalleorden.idorden = orden.idorden
        JOIN producto ON producto.idproducto = detalleorden.idproducto
    WHERE
        orden.idorden = selected_order
) LOOP nombre := orderDetails.nombre;

cantidad := orderDetails.cantidad;

preciounitario := orderDetails.preciounitario;

RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE 'plpgsql';
