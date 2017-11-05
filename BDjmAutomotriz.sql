
CREATE database jmAutomotrizEIRL;

use jmAutomotrizEIRL;

CREATE TABLE proveedor(
idProveedor int not null,
nombre varchar(100),
razonSocial varchar(30),
ruc varchar(11) unique,
telefono int(9),
telefono2 int(9),
direccion varchar(200),
email1 varchar(100),
email2 varchar(100),
paginaWeb varchar(100),
observaciones varchar(200),
constraint idProveedor_pk PRIMARY KEY
(idProveedor)
);

CREATE TABLE marca(
idMarca int not null,
nombre varchar(100),
CONSTRAINT idMarca_pk PRIMARY KEY
(idMarca)
);

CREATE TABLE categoria(
idCategoria INT NOT NULL,
nombre VARCHAR(100),
CONSTRAINT idCategoria_pk PRIMARY KEY
(idCategoria)
);

CREATE TABLE producto(
idProducto int not null,
idCategoria int,
idMarca int,
descripcion varchar(100),
stock float,
precio float,
observacion varchar(300),
CONSTRAINT idCategoria_fk foreign key
(idCategoria) REFERENCES categoria(idCategoria),
CONSTRAINT idMarca_fk FOREIGN KEY 
(idMarca) REFERENCES marca(idMarca),
CONSTRAINT idProducto_pk PRIMARY KEY (idProducto),
CONSTRAINT precio_ck2 check(precio>0)
);

CREATE TABLE suministro(
idProducto int,
idProveedor int,
cantidad float,
FechaPedido date,
precio float,
CONSTRAINT idProducto_fk FOREIGN KEY
(idProducto) REFERENCES producto(idProducto),
CONSTRAINT idProveedor_fk FOREIGN KEY
(idProveedor) REFERENCES proveedor(idProveedor),
CONSTRAINT cantidad_ck check(cantidad>0),
CONSTRAINT precio_ck check(precio>0),
CONSTRAINT idProdProvee_pk PRIMARY KEY
(idProducto,idProveedor)
);

CREATE TABLE rol(
idRol int not null,
nombre varchar(100),
CONSTRAINT idRol_pk PRIMARY KEY
(idRol)
);

CREATE TABLE usuario(
idUsuario int not null,
idRol int,
usuario varchar(100),
password varchar(100),
nombre varchar(100),
apellidoPaterno varchar(100),
apellidoMaterno varchar(100),
direccion varchar(100),
sexo varchar(1),
dni varchar(8) unique,
CONSTRAINT idRoll_fk FOREIGN KEY
(idRol) REFERENCES rol(idRol)
);