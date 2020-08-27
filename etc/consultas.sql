/*
 Consultas para reportes con parámetros
 */ SELECT
idUsuario,
nombre,
apellido,
email,
tipo
FROM
	usuario u
	INNER JOIN tipoUsuario T ON u.idTipoUsuario = T.idTipoUsuario
WHERE
	T.tipo = ?;
SELECT
	i.idInformacionAlquiler,
	P.nombre,
	precioAlquiler,
	poliza,
	existenciasAlquiler
FROM
	informacionAlquiler i
	INNER JOIN producto P ON i.idProducto = P.idProducto
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
	producto
	P INNER JOIN categoriaProducto C ON P.idCategoriaProducto = C.idCategoriaProducto
WHERE
	C.categoria = ?;
SELECT
	o.idorden,
	P.nombre,
	d.precioUnitario,
	d.cantidad,
	concat ( C.nombre, ' ', C.apellido ) "Nombre del cliente"
FROM
	detalleOrden d
	INNER JOIN orden o ON d.idOrden = o.idOrden
	INNER JOIN producto P ON d.idProducto = P.idProducto
	INNER JOIN cliente C ON o.idCliente = C.idCliente
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
	SUM ( SUM ( detalleorden.cantidad ) ) OVER ( PARTITION BY detalleorden.idproducto ) AS "Productos vendidos"
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
	SUM ( SUM ( detalleorden.preciounitario * detalleorden.cantidad ) ) OVER ( PARTITION BY detalleorden.idorden ) AS "Total"
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
	SELECT DISTINCT ON
		( producto.idproducto ) producto.idproducto AS "Producto No.",
		producto.nombre AS "Producto",
		COUNT ( review.iddetalleorden ) OVER ( PARTITION BY producto.idproducto ) AS "Cantidad de comentarios",
		AVG ( review.calificacion ) OVER ( PARTITION BY producto.idproducto ) AS "Promedio de nota"
	FROM
		review
		INNER JOIN detalleorden ON review.iddetalleorden = detalleorden.iddetalleorden
		INNER JOIN producto ON producto.idproducto = detalleorden.idproducto
	GROUP BY
		producto.idproducto,
		review.iddetalleorden,
		review.calificacion
	) RESULT
ORDER BY
	"Cantidad de comentarios" DESC;
SELECT COUNT
	( DISTINCT orden.idorden ) AS "Numero de ordenes",
	SUM ( detalleorden.preciounitario * detalleorden.cantidad ) AS "Total"
FROM
	orden
	INNER JOIN detalleorden ON detalleorden.idorden = orden.idorden
WHERE
	orden.fechacompra BETWEEN '2020-01-20 08:32:41.99983-06'
	AND '2020-02-20 08:32:41.99983-06';
--Funciones
--get basic data from orders
CREATE
	OR REPLACE FUNCTION getOrders ( ) RETURNS TABLE ( idorden INT, cliente VARCHAR, direccion VARCHAR, total NUMERIC, fechacompra VARCHAR ) AS $ $ DECLARE
	var RECORD;
BEGIN
		FOR var IN (
		SELECT
			Ordenes."Orden No." AS idorden,
			Ordenes."Nombre del cliente" AS cliente,
			orden.direccion AS direccion,
			Ordenes."Total" AS total,
			to_char( orden.fechacompra, 'DD Mon YY HH12:MI:SS' ) AS fechacompra
		FROM
			(
			SELECT
				detalleorden.idorden AS "Orden No.",
				cliente.nombre || ' ' || cliente.apellido AS "Nombre del cliente",
				SUM ( SUM ( detalleorden.preciounitario * detalleorden.cantidad ) ) OVER ( PARTITION BY detalleorden.idorden ) AS "Total"
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
		)
		LOOP
		idorden := var.idorden;
	cliente := var.cliente;
	direccion := var.direccion;
	total := var.total;
	fechacompra := var.fechacompra;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';
--get specific data from one order
CREATE
	OR REPLACE FUNCTION getOrders ( ) RETURNS TABLE ( idorden INT, cliente VARCHAR, direccion VARCHAR, total NUMERIC, fechacompra VARCHAR ) AS $$ DECLARE
	var RECORD;
BEGIN
    FOR var IN (
		SELECT
			orden.idorden,
			cliente.nombre || ' ' || cliente.apellido AS cliente,
			orden.direccion,
			orden.total,
			to_char(orden.fechacompra, 'DD Mon YY, HH12:MI AM') AS fechacompra
		FROM
            orden
            JOIN cliente USING (idcliente)
		ORDER BY
			idorden ASC
		) LOOP
        idorden := var.idorden;
        cliente := var.cliente;
        direccion := var.direccion;
        total := var.total;
        fechacompra := var.fechacompra;
	    RETURN NEXT;
    END LOOP;
END;
$$ LANGUAGE'plpgsql';

CREATE
	OR REPLACE FUNCTION getOrderGeneralDetails ( id_orden INT ) RETURNS TABLE (
		idorden INT,
		cliente VARCHAR,
		email VARCHAR,
		telefono VARCHAR,
		direccion VARCHAR,
		fechacompra VARCHAR,
		fechaentrega VARCHAR,
		subtotal NUMERIC,
		IVA NUMERIC,
		total NUMERIC
	) AS $$ DECLARE
	order_info RECORD;
BEGIN
	FOR order_info IN (
		SELECT
			orden.idorden,
			cliente.nombre || ' ' || cliente.apellido AS cliente,
			cliente.email,
			cliente.telefono,
			orden.direccion,
			to_char(orden.fechacompra, 'DD Mon YY, HH12:MI AM') AS fechacompra,
			to_char(orden.fechaentrega, 'DD Mon YY') AS fechaentrega,
			orden.subtotal,
            orden.ivaAplicado,
            orden.total
		FROM
			orden
			JOIN cliente ON orden.idcliente = cliente.idcliente
			JOIN detalleorden ON orden.idorden = detalleorden.idorden
		WHERE
			orden.idorden = id_orden
		GROUP BY
			orden.idorden,
			cliente,
			cliente.email,
			cliente.telefono,
			orden.direccion,
			detalleorden.idorden
		)
    LOOP
        idorden := order_info.idorden;
        cliente := order_info.cliente;
        email := order_info.email;
        telefono := order_info.telefono;
        direccion := order_info.direccion;
        fechacompra := order_info.fechacompra;
        fechaentrega := order_info.fechaentrega;
        subtotal := order_info.subtotal;
        IVA = order_info.ivaAplicado;
        total := order_info.total;
        RETURN NEXT;
    END LOOP;
END;
$$ LANGUAGE'plpgsql';

CREATE
	OR REPLACE FUNCTION getOrderDetails ( id_orden INT ) RETURNS TABLE ( idproducto INT, nombre VARCHAR, cantidad INT, preciounitario NUMERIC ) AS $ $ DECLARE
	orderDetails RECORD;
selected_order INT := id_orden;
BEGIN
		FOR orderDetails IN (
		SELECT ROW_NUMBER
			( ) OVER ( ) AS "idproducto",
			producto.nombre,
			detalleorden.cantidad,
			detalleorden.preciounitario
		FROM
			detalleorden
			JOIN orden ON detalleorden.idorden = orden.idorden
			JOIN producto ON producto.idproducto = detalleorden.idproducto
		WHERE
			orden.idorden = selected_order
		)
		LOOP
		idproducto := orderDetails.idproducto;
	nombre := orderDetails.nombre;
	cantidad := orderDetails.cantidad;
	preciounitario := orderDetails.preciounitario;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';
--GetRentals()
CREATE
	OR REPLACE FUNCTION getRentals ( ) RETURNS TABLE ( idorden INT, cliente VARCHAR, sucursal VARCHAR, fechacompra VARCHAR, fechasalquiler VARCHAR, totalalquiler NUMERIC ) AS $ $ DECLARE
	var RECORD;
BEGIN
		FOR var IN (
		SELECT
			alquileres."idalquiler" AS idorden,
			alquileres."cliente" AS cliente,
			sucursal.nombre AS sucursal,
			to_char( ordenalquiler.fechaordenalquiler, 'DD Mon, YY' ) AS fechacompra,
			to_char( ordenalquiler.fechaentrega, 'DD Mon, YY' ) || ' - ' || to_char( ordenalquiler.fechadespacho, 'DD Mon, YY' ) AS fechasalquiler,
			alquileres."totalalquiler" AS totalalquiler
		FROM
			(
			SELECT
				detallealquiler.idordenalquiler AS "idalquiler",
				cliente.nombre || ' ' || cliente.apellido AS "cliente",
				SUM (
					SUM (
						detallealquiler.precioalquiler * ( DATE_PART( 'day', ordenalquiler.fechadespacho :: DATE ) - DATE_PART( 'day', ordenalquiler.fechaentrega :: DATE ) )
					)
				) OVER ( PARTITION BY detallealquiler.idordenalquiler ) AS "totalalquiler"
			FROM
				detallealquiler
				JOIN ordenalquiler ON ordenalquiler.idordenalquiler = detallealquiler.idordenalquiler
				JOIN cliente ON cliente.idcliente = ordenalquiler.idcliente
			GROUP BY
				"idalquiler",
				"cliente"
			) AS alquileres
			JOIN ordenalquiler ON ordenalquiler.idordenalquiler = alquileres."idalquiler"
			JOIN sucursal ON ordenalquiler.idsucursal = sucursal.idsucursal
		ORDER BY
			idorden ASC
		)
		LOOP
		idorden := var.idorden;
	cliente := var.cliente;
	sucursal := var.sucursal;
	fechacompra := var.fechacompra;
	fechasalquiler := var.fechasalquiler;
	totalalquiler := var.totalalquiler;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';
--getRentalGeneralDetails(int id_rental)
CREATE
	OR REPLACE FUNCTION getRentalGeneralDetails ( id_rental INT ) RETURNS TABLE (
		idalquiler INT,
		cliente VARCHAR,
		email VARCHAR,
		telefono VARCHAR,
		sucursal VARCHAR,
		fechacompra VARCHAR,
		fechaalquiler VARCHAR,
		fechadevolucion VARCHAR,
		subtotal NUMERIC,
		iva NUMERIC,
		total NUMERIC
	) AS $ $ DECLARE
	order_info RECORD;
selected_rental INT := id_rental;
temp_iva NUMERIC;
iva_value NUMERIC;
BEGIN
		iva_value := ( SELECT valor FROM opcionesgenerales WHERE clave = 'IVA' );
	FOR order_info IN (
		SELECT
			ordenalquiler.idordenalquiler AS idalquiler,
			cliente.nombre || ' ' || cliente.apellido AS cliente,
			cliente.email,
			cliente.telefono,
			sucursal.nombre AS sucursal,
			to_char( ordenalquiler.fechaordenalquiler, 'DD Mon, YY' ) AS fechacompra,
			to_char( ordenalquiler.fechaentrega, 'DD Mon, YY' ) AS fechaentrega,
			to_char( ordenalquiler.fechadespacho, 'DD Mon, YY' ) AS fechadevolucion,
			SUM (
				SUM (
					detallealquiler.precioalquiler * ( DATE_PART( 'day', ordenalquiler.fechadespacho :: DATE ) - DATE_PART( 'day', ordenalquiler.fechaentrega :: DATE ) )
				)
			) OVER ( PARTITION BY detallealquiler.idordenalquiler ) AS "subtotal"
		FROM
			ordenalquiler
			JOIN cliente ON ordenalquiler.idcliente = cliente.idcliente
			JOIN detallealquiler ON ordenalquiler.idordenalquiler = detallealquiler.idordenalquiler
			JOIN sucursal ON ordenalquiler.idsucursal = sucursal.idsucursal
		WHERE
			ordenalquiler.idordenalquiler = selected_rental
		GROUP BY
			ordenalquiler.idordenalquiler,
			cliente,
			cliente.email,
			cliente.telefono,
			sucursal,
			detallealquiler.idordenalquiler
		)
		LOOP
		idalquiler := order_info.idalquiler;
	cliente := order_info.cliente;
	email := order_info.email;
	telefono := order_info.telefono;
	sucursal := order_info.sucursal;
	fechacompra := order_info.fechacompra;
	fechaalquiler := order_info.fechaentrega;
	fechadevolucion := order_info.fechadevolucion;
	subtotal := order_info.subtotal;
	temp_iva = order_info.subtotal * iva_value;
	iva := temp_iva;
	total := order_info.subtotal + temp_iva;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';
--getRentalSpecificDetails()
CREATE
	OR REPLACE FUNCTION getRentalDetails ( id_rental INT ) RETURNS TABLE ( idproducto INT, nombre VARCHAR, precioalquiler NUMERIC ) AS $ $ DECLARE
	rentalDetails RECORD;
selected_order INT := id_orden;
BEGIN
		FOR rentalDetails IN (
		SELECT ROW_NUMBER
			( ) OVER ( ) AS "idproducto",
			producto.nombre,
			detallealquiler.precioalquiler
		FROM
			detallealquiler
			JOIN ordenalquiler ON detallealquiler.idordenalquiler = ordenalquiler.idordenalquiler
			JOIN informacionalquiler ON informacionalquiler.idinformacionalquiler = detallealquiler.idinformacionalquiler
			JOIN producto ON producto.idproducto = informacionalquiler.idproducto
		WHERE
			ordenalquiler.idordenalquiler = selected_order
		)
		LOOP
		idproducto := rentalDetails.idproducto;
	nombre := rentalDetails.nombre;
	precioalquiler := rentalDetails.precioalquiler;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';
--getProducts()
--DROP function  getProducts();
CREATE
	OR REPLACE FUNCTION getProducts ( ) RETURNS TABLE (
		idproducto INT,
		nombre VARCHAR,
		cantidad INT,
		precio NUMERIC ( 6, 2 ),
		idcategoriaproducto INT,
		categoria VARCHAR,
		descripcion VARCHAR,
		imgurl VARCHAR,
		calificacion NUMERIC ( 2, 1 )
	) AS $ $ DECLARE
	products RECORD;
BEGIN
		FOR products IN (
		SELECT
			producto.idproducto,
			producto.nombre,
			producto.existenciascompra AS cantidad,
			producto.precio,
			producto.idcategoriaproducto,
			categoriaproducto.categoria AS categoria,
			producto.descripcion,
			producto.imgurl,
			AVG ( review.calificacion ) AS calificacion
		FROM
			producto
			INNER JOIN categoriaproducto ON categoriaproducto.idcategoriaproducto = producto.idcategoriaproducto
			LEFT JOIN review ON review.idproducto = producto.idproducto
		WHERE
			producto.existe = TRUE
		GROUP BY
			producto.idproducto,
			categoriaproducto.categoria
		ORDER BY
			producto.idproducto
		)
		LOOP
		idproducto := products.idproducto;
	nombre := products.nombre;
	cantidad := products.cantidad;
	precio := products.precio;
	categoria := products.categoria;
	idcategoriaproducto := products.idcategoriaproducto;
	descripcion := products.descripcion;
	imgurl := products.imgurl;
	calificacion := products.calificacion;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';
--getFeaturedProducts()
--DROP function  getFeaturedProducts();
CREATE
	OR REPLACE FUNCTION getFeaturedProducts ( ) RETURNS TABLE (
		idproducto INT,
		nombre VARCHAR,
		cantidad INT,
		precio NUMERIC ( 6, 2 ),
		idcategoriaproducto INT,
		categoria VARCHAR,
		descripcion VARCHAR,
		imgurl VARCHAR,
		calificacion NUMERIC ( 2, 1 )
	) AS $ $ DECLARE
	products RECORD;
BEGIN
		FOR products IN (
		SELECT
			producto.idproducto,
			producto.nombre,
			producto.existenciascompra AS cantidad,
			producto.precio,
			producto.idcategoriaproducto,
			categoriaproducto.categoria AS categoria,
			producto.descripcion,
			producto.imgurl,
			AVG ( review.calificacion ) AS calificacion
		FROM
			producto
			INNER JOIN categoriaproducto ON categoriaproducto.idcategoriaproducto = producto.idcategoriaproducto
			LEFT JOIN review ON review.idproducto = producto.idproducto
		WHERE
			producto.existe = TRUE
		GROUP BY
			producto.idproducto,
			categoriaproducto.categoria
		HAVING
			AVG ( review.calificacion ) >= 4
		ORDER BY
			producto.idproducto
			LIMIT 12
		)
		LOOP
		idproducto := products.idproducto;
	nombre := products.nombre;
	cantidad := products.cantidad;
	precio := products.precio;
	categoria := products.categoria;
	idcategoriaproducto := products.idcategoriaproducto;
	descripcion := products.descripcion;
	imgurl := products.imgurl;
	calificacion := products.calificacion;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';
--getProductReviews()
CREATE
	OR REPLACE FUNCTION getProductReviews ( id_producto INT ) RETURNS TABLE ( idreview INT, cliente VARCHAR, puntuacion NUMERIC ( 3, 2 ), comentario VARCHAR ) AS $$ DECLARE
	selected_product INT := id_producto;
reviews RECORD;
BEGIN
    FOR reviews IN (
		SELECT ROW_NUMBER ( ) OVER ( ) AS idreview,
			cliente.nombre || ' ' || cliente.apellido AS cliente,
			review.calificacion AS puntuacion,
			review.comentario AS comentario,
			idreview AS idreal
		FROM
			review
			JOIN detalleorden ON detalleorden.iddetalleorden = review.iddetalleorden
			JOIN orden ON orden.idorden = detalleorden.idorden
			JOIN cliente ON orden.idcliente = cliente.idcliente
			JOIN producto ON detalleorden.idproducto = producto.idproducto
		WHERE
			producto.idproducto = selected_product
		) LOOP
            idreview := reviews.idreview;
            cliente := reviews.cliente;
            puntuacion := reviews.puntuacion;
            comentario := reviews.comentario;
            RETURN NEXT;
        END LOOP;
    END;
$$ LANGUAGE'plpgsql';
--getProductReviewData(idproducto int)
CREATE
	OR REPLACE FUNCTION getProductReviewData ( id_producto INT ) RETURNS TABLE ( producto VARCHAR, reviews INT ) AS $$ DECLARE
	review_info RECORD;
BEGIN
    FOR review_info IN (
		SELECT
			producto.nombre,
			COUNT ( review.idreview ) AS reviews
		FROM
			review
			JOIN detalleorden ON detalleorden.iddetalleorden = review.iddetalleorden
			JOIN producto ON detalleorden.idproducto = producto.idproducto
		WHERE
			producto.idproducto = id_producto
		GROUP BY
			producto.nombre
		) LOOP
		    producto := review_info.nombre;
            reviews := review_info.reviews;
            RETURN NEXT;
        END LOOP;
    END;
$$ LANGUAGE'plpgsql';
--getProductQuantites()
CREATE
	OR REPLACE FUNCTION getProductQuantities (quantity INT) RETURNS TABLE ( producto VARCHAR, cantidad INT ) AS $ $ DECLARE
	product_info RECORD;
BEGIN
		FOR product_info IN ( SELECT nombre, existenciascompra AS cantidad FROM producto ORDER BY existenciascompra ASC LIMIT quantity )
		LOOP
		producto := product_info.nombre;
	cantidad := product_info.cantidad;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';
--getOrdersByClient
CREATE
	OR REPLACE FUNCTION getOrdersByClient ( id_cliente INT ) RETURNS TABLE ( idorden INT, estado VARCHAR, total NUMERIC, fechacompra VARCHAR ) AS $ $ DECLARE
	var RECORD;
BEGIN
	FOR var IN (
		SELECT
			orden.idorden AS idorden,
			to_char( orden.fechacompra, 'DD Mon YY, HH12:MI AM' ) AS fechacompra,
		CASE
            WHEN estadoorden.estado = 'compraFinalizada' THEN
            'Comprado'
            WHEN estadoorden.estado = 'productoEntregado' THEN
            'Entregado'
        END AS estado,
        orden.total AS total
		FROM
			orden
			JOIN estadoorden USING ( idestadoorden )
			JOIN cliente USING ( idcliente )
		WHERE
			estadoorden.estado NOT LIKE 'carrito'
			AND cliente.idcliente = 22
		GROUP BY
			orden.idorden,
			estadoorden.estado
		ORDER BY
			idorden ASC
		)
		LOOP
		idorden := var.idorden;
	fechacompra := var.fechacompra;
	estado := var.estado;
	total := var.total;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';
--readCart()
CREATE
	OR REPLACE FUNCTION readCart ( id_orden INT ) RETURNS TABLE ( idproducto INT, imgurl VARCHAR, nombre VARCHAR, preciounitario NUMERIC, cantidad INT ) AS $ $ DECLARE
	cart_info RECORD;
BEGIN
		FOR cart_info IN (
		SELECT
			producto.idproducto,
			producto.imgurl,
			producto.nombre,
			detalleorden.preciounitario,
			detalleorden.cantidad
		FROM
			detalleorden
			JOIN orden ON detalleorden.idorden = orden.idorden
			JOIN producto ON detalleorden.idproducto = producto.idproducto
		WHERE
			orden.idorden = id_orden
		ORDER BY
			detalleorden.iddetalleorden ASC
		)
		LOOP
		idproducto := cart_info.idproducto;
	imgurl := cart_info.imgurl;
	nombre := cart_info.nombre;
	preciounitario := cart_info.preciounitario;
	cantidad := cart_info.cantidad;
	RETURN NEXT;

END LOOP;

END;

$ $ LANGUAGE'plpgsql';

SELECT
    nombre,
    COUNT (idproducto) as cantidad
FROM
    detalleorden
    JOIN orden USING (idorden)
    JOIN producto USING (idproducto)
GROUP BY
    nombre
ORDER BY
    cantidad DESC
LIMIT
    quantity
