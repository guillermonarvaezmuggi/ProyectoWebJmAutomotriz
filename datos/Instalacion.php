<?php 
include "Conexion.php";
function crearBD(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    $sql =  "CREATE DATABASE jmAutomotrizEIRL";
    if(mysqli_query($con,$sql)){
      echo "consulta correcta";   
    };
    mysqli_close($con);
}
crearBD();
function crearTablaProveedor(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    mysqli_select_db($con,"jmAutomotrizEIRL");
    $sqlProveedor="CREATE TABLE proveedor(
    idProveedor int not null auto_increment,
    nombre varchar(100),
    razonSocial varchar(30),
    ruc varchar(11) unique,
    telefono int(9),
    telefono2 int(9),
    direccion varchar(200),
    email1 varchar(100),
    email2 varchar(100),
    paginaWeb varchar(100),
    fechaRegistro datetime default now(),
    observaciones varchar(200),
    constraint idProveedor_pk PRIMARY KEY
    (idProveedor) 
    )";

    if(mysqli_query($con,$sqlProveedor)){
        echo "Tabla Proveedor creada";
    }
    mysqli_close($con);
}
crearTablaProveedor();

function crearTablaMarca(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    mysqli_select_db($con,"jmAutomotrizEIRL");
    $sqlMarca="CREATE TABLE marca(
        idMarca int not null auto_increment,
        nombre varchar(100),
        CONSTRAINT idMarca_pk PRIMARY KEY
        (idMarca)
        )";
    if(mysqli_query($con,$sqlMarca)){
        echo "Tabla Marca Creada";
    }
    mysqli_close($con);
}
crearTablaMarca();

function crearTablaCategoria(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    mysqli_select_db($con,"jmAutomotrizEIRL");
    $sqlCategoria="CREATE TABLE categoria(
    idCategoria INT NOT NULL auto_increment,
    nombre VARCHAR(100),
    CONSTRAINT idCategoria_pk PRIMARY KEY
    (idCategoria)
    )";
    if(mysqli_query($con,$sqlCategoria)){
        echo "Tabla Categoria Creada";
    }
    mysqli_close($con);
}

crearTablaCategoria();

function crearTablaSubCategoria(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    mysqli_select_db($con,"jmAutomotrizEIRL");
    $sqlCategoria="CREATE TABLE subCategoria(
    idSubCategoria INT NOT NULL auto_increment,
    nombre VARCHAR(100),
    CONSTRAINT idSubCategoria_pk PRIMARY KEY
    (idSubCategoria)
    )";
    if(mysqli_query($con,$sqlCategoria)){
        echo "Tabla SubCategoria Creada";
    }
    mysqli_close($con);
}
crearTablaSubCategoria();

function crearTablaUnidad(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    mysqli_select_db($con,"jmAutomotrizEIRL");
    $sqlCategoria="CREATE TABLE unidad(
    idUnidad INT NOT NULL auto_increment,
    nombre VARCHAR(100),
    CONSTRAINT idUnidad_pk PRIMARY KEY
    (idUnidad)
    )";
    if(mysqli_query($con,$sqlCategoria)){
        echo "Tabla Unidad Creada";
    }
    mysqli_close($con);
}
crearTablaUnidad();
function crearTablaProducto(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    mysqli_select_db($con,"jmAutomotrizEIRL");
    $sqlProducto="CREATE TABLE producto(
    idProducto int not null auto_increment,
    idCategoria int,
    idSubCategoria int,
    idMarca int,
    idUnidad int,
    nombre varchar(300),
    descripcion varchar(300),
    imagen LONGBLOB,
    stock float,
    precio float,
    observacion varchar(300),
    CONSTRAINT idUnidad_fk FOREIGN KEY (idUnidad) REFERENCES unidad(idUnidad),
    CONSTRAINT idMarca_fk FOREIGN KEY (idMarca) REFERENCES marca(idMarca),
    CONSTRAINT idCategoria_fk foreign key (idCategoria) REFERENCES categoria(idCategoria), 
    CONSTRAINT idSubCategoria_fk FOREIGN KEY (idSubCategoria) REFERENCES subCategoria(idSubCategoria), 
    CONSTRAINT idProducto_pk PRIMARY KEY (idProducto)
    )";

    if(mysqli_query($con,$sqlProducto)){
        echo "Tabla Producto creada";
    }else{
        echo "hay un error en tabla producto";
    }
    mysqli_close($con);
}

crearTablaProducto();

function crearTablaSuministro(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    mysqli_select_db($con,"jmAutomotrizEIRL");
    $sqlSuministro="CREATE TABLE suministro(
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
    )";
    if(mysqli_query($con,$sqlSuministro)){
        echo "Tabla suminitro creada";
    }
    mysqli_close($con);
}
crearTablaSuministro();

function crearTablaRol(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    mysqli_select_db($con,"jmAutomotrizEIRL");
    $sqlRol="CREATE TABLE rol(
    idRol int not null auto_increment,
    nombre varchar(100),
    CONSTRAINT idRol_pk PRIMARY KEY
    (idRol)
    )";
    if(mysqli_query($con,$sqlRol)){
        echo "Tabla Rol creada";
    }
    mysqli_close($con);
}
crearTablaRol();
function crearTablaUsuario(){
    $cnn = new Conexion();
    $con = $cnn->conectar();

    mysqli_select_db($con,"jmAutomotrizEIRL");
    $sql="CREATE TABLE usuario(
    idUsuario int not null auto_increment,
    idRol int,
    usuario varchar(100),
    contrasena varchar(100),
    nombre varchar(100),
    apellidoPaterno varchar(100),
    apellidoMaterno varchar(100),
    dni varchar(8) unique,
    sexo varchar(1),
    telefono int unique,
    domicilio varchar(200),
    fechaRegistro datetime default now(),
    CONSTRAINT idRol2_fk FOREIGN KEY
    (idRol) REFERENCES rol(idRol),
    CONSTRAINT idUsuario_pk PRIMARY KEY
    (idUsuario)
    )";

    if(mysqli_query($con,$sql)){
        echo "Tabla usuarios creada";
    }
    else{
        echo "No ha creado nada la tabla usuario";
    }
    mysqli_close($con);
}
crearTablaUsuario();




?>