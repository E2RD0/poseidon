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
