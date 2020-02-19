INSERT INTO opcionesGenerales VALUES
(DEFAULT, 'IVA', '0.13');

INSERT INTO sucursal VALUES
(DEFAULT, 'Poseidon Puerto de La Libertad', 'Puerto de La Libertad, El Malecon, La Libertad, El Salvador'),
(DEFAULT, 'Poseidon El Tunco', 'Playa El Tunco, La Libertad, El Salvador'),
(DEFAULT, 'Poseidon Metrocentro', 'Centro Comercial Metrocentro, San Salvador, El Salvador'),
(DEFAULT, 'Poseidon Costa del Sol', 'Playa Costa del Sol, La Paz, El Salvador'),
(DEFAULT, 'Poseidon El Majahual', 'Playa El Majahual, La Libertad, El Salvador');

INSERT INTO tipoUsuario VALUES 
(DEFAULT, 'Superadministrador'),
(DEFAULT, 'Administrador'),
(DEFAULT, 'Gerente');

INSERT INTO usuario VALUES
(DEFAULT,'Eduardo', 'Estrada', 'e2rd0@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', 1 ),
(DEFAULT,'Bryan', 'Galdámez', 'bryan@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', 2),
(DEFAULT,'Kimberly', 'Segers', 'kimberly@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', 2),
(DEFAULT,'Tiffany', 'Pennington', 'tiffany@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', 3),
(DEFAULT,'Aureliano', 'Buendía', 'aureliano@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', 3);

INSERT INTO cliente VALUES
(DEFAULT,'Roberto', 'Marenco', 'roberto@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887071', 'Reparto Maquilishuat Av. Los Cedros #84, San Salvador, El Salvador'),
(DEFAULT,'Julio', 'Alvarenga', 'julio@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887172', 'Iglesia Miramonte, San Salvador'),
(DEFAULT,'Gerardo', 'Borje', 'gerardo@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887273', 'Rpto Morazán I Cl El Salvador No 154 Soya'),
(DEFAULT,'Alberto', 'Castillo', 'alberto@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887374', 'Resid Las Colinas Políg 9 Pje 6 No 7, Sta Tecla'),
(DEFAULT,'Berenice', 'Domínguez', 'berenice@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887475', 'Centro Comercial Salvador Del Mundo Módulo #12, Detrás De Pizza Hut Entre Ave 63 Y 65 San Salvador'),
(DEFAULT,'Carlos', 'Escamilla', 'carlos@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887576', 'URBANIZACION EL PROGRESO, LOTE NUMERO SEIS, POLIGONO “D”, JURISDICCION DE EL CONGO'),
(DEFAULT,'David', 'Flores', 'david@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887677', 'Col Escalón Cl Juan José Cañas No 249 Unidad Médica Escalón'),
(DEFAULT,'Eduardo', 'Guirola', 'eduardo@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887778', 'Col Escalón 79 Av '),
(DEFAULT,'Fernando', 'Hurtado', 'fernando@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887879', 'Carrt Al Puerta De La Libertad Km 9 1/2 100 Mts Antes Del Viceministerio'),
(DEFAULT,'Gilberto', 'Iniesta', 'gilberto@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372887970', 'Resid Altavista Cl Las Delicias Políg 35 No 17, San Martín'),
(DEFAULT,'Héctor', 'Jiménez', 'hector@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372884142', 'Bo San Miguelito 1 Av Nte No 1105'),
(DEFAULT,'Isaac', 'Laureles', 'isaac@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+503728871449', 'Colonia América Lotif Qta Figueroa Cl de Lab. Cosmos No 54 LT4'),
(DEFAULT,'Jorge', 'Martínez', 'jorge@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+503728874690', 'Bo Distrito Comercial Central 1 Cl Ote Loc 209'),
(DEFAULT,'Katerine', 'Navas', 'katerine@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50372882979', 'Col San Francisco Las Mercedes Cl Los Granados No 37'),
(DEFAULT,'Laura', 'Ortiz', 'laura@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50364985467', 'Col Campestre Av Masferrer Sur Pje 1 No 9'),
(DEFAULT,'Marta', 'Peña', 'marta@mail.com', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', '+50375269458', 'AVENIDA CLUB DE LEONES NO 1 ENTRE 1A CALLE PTEY CALLE RAMON FLORES PONIENTE CHALCHUAPA');

INSERT INTO categoriaProducto VALUES 
(DEFAULT, 'Tablas'),
(DEFAULT, 'Accesorios'),
(DEFAULT, 'Ropa');


INSERT INTO producto VALUES
();

INSERT INTO estadoOrden VALUES
(DEFAULT, 'carrito'),
(DEFAULT, 'compraFinalizada'),
(DEFAULT, 'productoEntregado');

INSERT INTO orden VALUES
();

INSERT INTO detalleOrden VALUES
();

INSERT INTO review VALUES
();

INSERT INTO informacionAlquiler VALUES
(DEFAULT, 38.00, 300.00, 14, 1);
(DEFAULT, 50.00, 400.00, 10, 2);
(DEFAULT, 40.00, 300.00, 10, 5);
(DEFAULT, 45.00, 330.00, 10, 7);
(DEFAULT, 35.00, 280.00, 10, 9);

INSERT INTO estadoOrdenAlquiler VALUES
(DEFAULT, 'carrito'),
(DEFAULT, 'compraFinalizada'),
(DEFAULT, 'ordenFinalizada');

INSERT INTO ordenAlquiler VALUES
();

INSERT INTO estadoDetalleAlquiler VALUES
(DEFAULT, 'productoEntregado'),
(DEFAULT, 'productoDevuelto'),
(DEFAULT, 'productoPerdido'),
(DEFAULT, 'polizaPagada');

INSERT INTO detalleAlquiler VALUES
();