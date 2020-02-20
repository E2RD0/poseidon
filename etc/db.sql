
CREATE TABLE opcionesGenerales (
    idOpcion SERIAL,
    clave VARCHAR(50) UNIQUE NOT NULL,
    valor VARCHAR(100) NOT NULL,
    PRIMARY KEY (idOpcion)
);

CREATE TABLE sucursal (
    idSucursal SERIAL,
    nombre VARCHAR(50) UNIQUE NOT NULL,
    ubicacion VARCHAR(200) NOT NULL,
    PRIMARY KEY (idSucursal)
);

CREATE TABLE tipoUsuario (
    idTipoUsuario SERIAL,
    tipo VARCHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY (idTipoUsuario)
);

CREATE TABLE usuario (
    idUsuario SERIAL,
    nombre VARCHAR(75) NOT NULL,
    apellido VARCHAR(75) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contrasena CHAR(98) NOT NULL,
    idTipoUsuario INT NOT NULL,
    PRIMARY KEY (idUsuario),
    FOREIGN KEY (idTipoUsuario) REFERENCES tipoUsuario (idTipoUsuario)
);

CREATE TABLE cliente (
    idCliente SERIAL,
    nombre VARCHAR(75) NOT NULL,
    apellido VARCHAR(75) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contrasena CHAR(98) NOT NULL,
    telefono VARCHAR(25) UNIQUE NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    PRIMARY KEY (idCliente)
);

CREATE TABLE categoriaProducto (
    idCategoriaProducto SERIAL,
    categoria VARCHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY (idCategoriaProducto)
);

CREATE TABLE producto (
    idProducto  SERIAL,
    nombre VARCHAR(200) NOT NULL,
    precio NUMERIC(9,2) NOT NULL,
    descripcion VARCHAR(250) NOT NULL,
    imgURL VARCHAR(100) NOT NULL,
    existenciasCompra INT NOT NULL,
    idCategoriaProducto INT NOT NULL,
    PRIMARY KEY (idProducto),
    FOREIGN KEY (idCategoriaProducto) REFERENCES categoriaProducto (idCategoriaProducto)
);

CREATE TABLE estadoOrden (
    idEstadoOrden SERIAL,
    estado VARCHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY (idEstadoOrden)
);

CREATE TABLE orden (
    idOrden SERIAL,
    total NUMERIC(9,2),
    fechaCompra TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP,
    fechaEntrega DATE,
    direccion VARCHAR(200),
    idCliente int NOT NULL,
    idEstadoOrden int NOT NULL,
    PRIMARY KEY (idOrden),
    FOREIGN KEY (idCliente) REFERENCES cliente (idCliente),
    FOREIGN KEY (idEstadoOrden) REFERENCES estadoOrden (idEstadoOrden)
);

CREATE TABLE detalleOrden (
    idDetalleOrden SERIAL,
    cantidad INT NOT NULL,
    precioUnitario NUMERIC(9,2),
    idOrden INT NOT NULL,
    idProducto INT NOT NULL,
    PRIMARY KEY (idDetalleOrden),
    FOREIGN KEY (idOrden) REFERENCES orden (idOrden),
    FOREIGN KEY (idProducto) REFERENCES producto (idProducto)
);

CREATE TABLE review (
    idReview SERIAL,
    comentario VARCHAR(400) NOT NULL,
    calificacion SMALLINT NOT NULL,
    idDetalleOrden INT NOT NULL,
    PRIMARY KEY (idReview),
    FOREIGN KEY (idDetalleOrden) REFERENCES detalleOrden (idDetalleOrden)
);

CREATE TABLE informacionAlquiler (
    idInformacionAlquiler SERIAL,
    precioAlquiler NUMERIC(9,2) NOT NULL,
    poliza NUMERIC(9,2) NOT NULL,
    existenciasAlquiler INT NOT NULL,
    idProducto INT NOT NULL,
    PRIMARY KEY (idInformacionAlquiler),
    FOREIGN KEY (idProducto) REFERENCES producto (idProducto)
);

CREATE TABLE estadoOrdenAlquiler (
    idEstadoOrdenAlquiler SERIAL,
    estado VARCHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY (idEstadoOrdenAlquiler)
);

CREATE TABLE ordenAlquiler (
    idOrdenAlquiler SERIAL,
    fechaEntrega DATE,
    fechaDespacho DATE,
    fechaOrdenAlquiler TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP,
    total NUMERIC(9,2), 
    idSucursal int,
    idCliente int NOT NULL,
    idEstadoOrdenAlquiler INT NOT NULL,
    PRIMARY KEY (idOrdenAlquiler),
    FOREIGN KEY (idSucursal) REFERENCES sucursal (idSucursal),
    FOREIGN KEY (idCliente) REFERENCES cliente (idCliente),
    FOREIGN KEY (idEstadoOrdenAlquiler) REFERENCES estadoOrdenAlquiler (idEstadoOrdenAlquiler)
);

CREATE TABLE estadoDetalleAlquiler (
    idEstadoDetalleAlquiler SERIAL,
    estado VARCHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY (idEstadoDetalleAlquiler)
);

CREATE TABLE detalleAlquiler (
    idDetalleAlquiler SERIAL,
    precioAlquiler NUMERIC(9,2),
    poliza NUMERIC(9,2),
    idOrdenAlquiler INT NOT NULL,
    idEstadoDetalleAlquiler INT NOT NULL,
    idInformacionAlquiler INT NOT NULL,
    PRIMARY KEY (idDetalleAlquiler),
    FOREIGN KEY (idOrdenAlquiler) REFERENCES ordenAlquiler (idOrdenAlquiler),
    FOREIGN KEY (idEstadoDetalleAlquiler) REFERENCES estadoDetalleAlquiler (idEstadoDetalleAlquiler),
    FOREIGN KEY (idInformacionAlquiler) REFERENCES informacionAlquiler (idInformacionAlquiler)
);