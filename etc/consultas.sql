/*
Consultas para reportes con parámetros
*/

SELECT idUsuario, nombre, apellido, email, tipo FROM usuario u INNER JOIN tipoUsuario t on u.idTipoUsuario = t.idTipoUsuario where t.tipo= ?

SELECT i.idInformacionAlquiler, p.nombre, precioAlquiler, poliza, existenciasAlquiler FROM informacionAlquiler i INNER JOIN producto p on i.idProducto = p.idProducto WHERE i.idProducto = ?

SELECT idProducto, nombre, precio, descripcion, existenciasCompra, categoria FROM producto p INNER JOIN categoriaProducto c ON p.idCategoriaProducto = c.idCategoriaProducto where c.categoria = ?

SELECT o.idorden, p.nombre, d.precioUnitario, d.cantidad, concat(c.nombre,' ',c.apellido) "Nombre del cliente" FROM detalleOrden d INNER JOIN orden o ON d.idOrden = o.idOrden INNER JOIN producto p ON d.idProducto = p.idProducto INNER JOIN cliente c on o.idCliente = c.idCliente where o.idOrden = ?

SELECT valor from opcionesGenerales where clave = ?



/*
Consultas para reportes con rango de fechas
*/

SELECT * FROM orden where fechaEntrega BETWEEN ? AND ? 

SELECT * FROM orden where fechaCompra = ?

SELECT * FROM ordenAlquiler where fechaDespacho BETWEEN ? AND ?
