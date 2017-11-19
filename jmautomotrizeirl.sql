-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2017 a las 19:16:34
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10
create database jmautomotrizeirl;
use jmautomotrizeirl;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jmautomotrizeirl`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`prueba`@`localhost` PROCEDURE `deleteCategoria` (IN `user_id` INT(11))  BEGIN
        DELETE FROM categoria WHERE idCategoria=user_id;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `deleteMarca` (IN `user_id` INT(11))  BEGIN
        DELETE FROM marca WHERE idMarca=user_id;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `deleteRol` (IN `user_id` INT(11))  BEGIN
        DELETE FROM rol WHERE idRol=user_id;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `deleteSubCategoria` (IN `user_id` INT(11))  BEGIN
        DELETE FROM subCategoria WHERE idSubCategoria=user_id;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `deleteSuministro` (IN `user_id` INT(11), IN `user_id2` INT(11))  BEGIN
        DELETE FROM suministro WHERE idProducto=user_id and idProveedor=user_id2;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `deleteUnidad` (IN `user_id` INT(11))  BEGIN
        DELETE FROM unidad WHERE idUnidad=user_id;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `insertCategoria` (IN `nombreP` VARCHAR(100))  BEGIN
                Insert INTO categoria(nombre) VALUES(nombreP);
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `insertMarca` (IN `nombreP` VARCHAR(100))  BEGIN
                Insert INTO marca(nombre) VALUES(nombreP);
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `insertProducto` (IN `idCategoriaP` INT(11), `idSubCategoriaP` INT(11), `idMarcaP` INT(11), `idUnidadP` INT(11), `nombreP` VARCHAR(300), `descripcionP` VARCHAR(300), `stockP` FLOAT, `precioP` FLOAT, `observacionP` VARCHAR(100))  BEGIN
          Insert INTO producto(idCategoria,idSubCategoria,
          idMarca,idUnidad,nombre,descripcion,
        stock,precio,observacion) VALUES(idCategoriaP,
        idSubcategoriaP,idMarcaP,idUnidadP,nombreP,
      descripcionP,stockP,precioP,observacionP);
      END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `insertProveedor` (IN `nombreP` VARCHAR(100), IN `razonSocialP` VARCHAR(30), IN `rucP` VARCHAR(11), IN `telefonoP` INT(9), IN `telefono2P` INT(9), IN `direccionP` VARCHAR(200), IN `email1P` VARCHAR(100), IN `email2P` VARCHAR(100), IN `paginaWebP` VARCHAR(100), IN `observacionesP` VARCHAR(200))  BEGIN
          Insert INTO proveedor(nombre,razonSocial,ruc,telefono,telefono2
          ,direccion,email1,email2,paginaWeb,observaciones) 
          VALUES(nombreP,razonSocialP,rucP,telefonoP,telefono2P,
          direccionP,email1P,email2P,paginaWebP,observacionesP);
      END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `insertRol` (IN `nombreP` VARCHAR(100))  BEGIN
                Insert INTO rol(nombre) VALUES(nombreP);
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `insertSubCategoria` (IN `nombreP` VARCHAR(100))  BEGIN
                Insert INTO subCategoria(nombre) VALUES(nombreP);
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `insertSuministro` (IN `idProductoP` INT(11), `idProveedorP` INT(11), `cantidadP` INT(11), `fechaPedidoP` DATE, `precioP` FLOAT, `observacionP` VARCHAR(100))  BEGIN
          Insert INTO suministro(idProducto,idProveedor,cantidad,fechaPedido,precio,observacion) 
          VALUES(idProductoP,idProveedorP,cantidadP,fechaPedidoP,precioP,observacionP);
      END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `insertUnidad` (IN `nombreP` VARCHAR(100))  BEGIN
                Insert INTO unidad(nombre) VALUES(nombreP);
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `insertUser` (IN `idRolP` INT(11), IN `usuarioP` VARCHAR(100), IN `contrasenaP` VARCHAR(100), IN `nombreP` VARCHAR(100), IN `apellidoPaternoP` VARCHAR(100), IN `apellidoMaternoP` VARCHAR(100), IN `dniP` VARCHAR(8), IN `sexoP` VARCHAR(1), IN `telefonoP` INT(11), IN `domicilioP` VARCHAR(200))  BEGIN
                Insert INTO usuario(idRol,usuario,contrasena,nombre,apellidoPaterno,apellidoMaterno,
                dni,sexo,telefono,domicilio) VALUES(idRolP,usuarioP,contrasenaP,nombreP,apellidoPaternoP,
                apellidoMaternoP,dniP,sexoP,telefonoP,domicilioP);
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectCategoria` ()  BEGIN
            SELECT * FROM categoria order by idCategoria asc;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectMarca` ()  BEGIN
            SELECT * FROM marca order by idMarca asc;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectProducto` ()  BEGIN
            SELECT * FROM producto order by idProducto asc;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectProveedor` ()  BEGIN
            SELECT * FROM proveedor order by idProveedor asc;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectRol` ()  BEGIN
            SELECT * FROM rol order by idRol asc;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectSubCategoria` ()  BEGIN
            SELECT * FROM subCategoria order by idSubCategoria asc;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectSuministro` ()  BEGIN
            SELECT * FROM suministro;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectSuminstro` ()  BEGIN
            SELECT * FROM suministro;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectUnidad` ()  BEGIN
            SELECT * FROM unidad order by idUnidad asc;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `selectUser` ()  BEGIN
            SELECT * FROM usuario order by idUsuario asc;
        END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `updateCategoria` (IN `user_id` INT(11), IN `nombreP` VARCHAR(100))  BEGIN
            UPDATE categoria SET nombre=nombreP
            WHERE idCategoria=user_id;
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `updateMarca` (IN `user_id` INT(11), IN `nombreP` VARCHAR(100))  BEGIN
            UPDATE marca SET nombre=nombreP
            WHERE idMarca=user_id;
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `updateProducto` (IN `user_id` INT(11), IN `idCategoriaP` INT(11), `idSubCategoriaP` INT(11), `idMarcaP` INT(11), `idUnidadP` INT(11), `nombreP` VARCHAR(300), `descripcionP` VARCHAR(300), `stockP` FLOAT, `precioP` FLOAT, `observacionP` VARCHAR(100))  BEGIN
      UPDATE producto SET idCategoria=idCategoriaP,
      idSubcategoria=idSubCategoriaP,idMarca=idMarcaP,
      idUnidad=idUnidadP,nombre=nombreP,descripcion=descripcionP
      ,stock=stockP,precio=precioP,
      observacion=observacionP
      WHERE idProducto=user_id;
      END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `updateRol` (IN `user_id` INT(11), IN `nombreP` VARCHAR(100))  BEGIN
            UPDATE rol SET nombre=nombreP
            WHERE idRol=user_id;
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `updateSubCategoria` (IN `user_id` INT(11), IN `nombreP` VARCHAR(100))  BEGIN
            UPDATE subCategoria SET nombre=nombreP
            WHERE idSubCategoria=user_id;
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `updateUnidad` (IN `user_id` INT(11), IN `nombreP` VARCHAR(100))  BEGIN
            UPDATE unidad SET nombre=nombreP
            WHERE idUnidad=user_id;
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `updateUsuario` (IN `user_id` INT(11), IN `idRolP` INT(11), IN `usuarioP` VARCHAR(100), IN `contrasenaP` VARCHAR(100), IN `nombreP` VARCHAR(100), IN `apellidoPaternoP` VARCHAR(100), IN `apellidoMaternoP` VARCHAR(100), IN `dniP` VARCHAR(8), IN `sexoP` VARCHAR(1), IN `telefonoP` INT(11), IN `domicilioP` VARCHAR(200))  BEGIN
            UPDATE usuario SET idRol=idRolP,usuario=usuarioP,contrasena=contrasenaP,
            nombre=nombreP,apellidoPaterno=apellidoPaternoP,apellidoMaterno=apellidoMaternoP,
            dni=dniP,sexo=sexoP,telefono=telefonoP,domicilio=domicilioP
            WHERE idUsuario=user_id;
            END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `whereCategoria` (IN `user_id` INT(11))  BEGIN 
                SELECT * FROM categoria where idCategoria=user_id;
                END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `whereMarca` (IN `user_id` INT(11))  BEGIN 
                SELECT * FROM marca where idMarca=user_id;
                END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `whereProducto` (IN `user_id` INT(11))  BEGIN 
                SELECT * FROM producto where idProducto=user_id;
                END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `whereRol` (IN `user_id` INT(11))  BEGIN 
                SELECT * FROM rol where idRol=user_id;
                END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `whereSubCategoria` (IN `user_id` INT(11))  BEGIN 
                SELECT * FROM subCategoria where idSubCategoria=user_id;
                END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `whereSuministro` (IN `user_id` INT(11), IN `user_id2` INT(11))  BEGIN 
                SELECT * FROM suministro where idProducto=user_id and idProveedor=user_id2;
                END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `whereUnidad` (IN `user_id` INT(11))  BEGIN 
                SELECT * FROM unidad where idUnidad=user_id;
                END$$

CREATE DEFINER=`prueba`@`localhost` PROCEDURE `whereUsuario` (IN `user_id` INT(11))  BEGIN 
                SELECT * FROM usuario where idUsuario=user_id;
                END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`) VALUES
(2, 'Categoria1'),
(3, 'Categoria2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `nombre`) VALUES
(2, 'Marca1'),
(3, 'Marca2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idSubCategoria` int(11) DEFAULT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `idUnidad` int(11) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `stock` float DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `observacion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `idCategoria`, `idSubCategoria`, `idMarca`, `idUnidad`, `nombre`, `descripcion`, `stock`, `precio`, `observacion`) VALUES
(1, 2, 2, 2, 1, 'Tornillos', 'asdasdad', 12, 123, 'memoModficado'),
(2, 3, 3, 3, 1, 'claudioCorazon', 'adas', 12, 123, 'asdasd'),
(3, 3, 3, 3, 2, 'meme', 'adasd', 12, 12, 'sdad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `razonSocial` varchar(30) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `telefono2` int(9) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `paginaWeb` varchar(100) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT CURRENT_TIMESTAMP,
  `observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `razonSocial`, `ruc`, `telefono`, `telefono2`, `direccion`, `email1`, `email2`, `paginaWeb`, `fechaRegistro`, `observaciones`) VALUES
(1, 'asdasd', 'asdasd', '12345678901', 123213, 123213, 'asdad', '123123asdsad', '12321asdasd', 'ww.papurri.com', '2017-11-19 12:33:49', 'asdad'),
(2, 'provee2', 'adasd', '12321', 123213, 1232131, '123123', 'asdsad', '123123aa', 'asdasd', '2017-11-19 12:39:41', '1231231');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(2, 'Administrador'),
(3, 'MecÃ¡nico'),
(4, 'Cajero'),
(5, 'Almacenero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `idSubCategoria` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idSubCategoria`, `nombre`) VALUES
(2, 'SubCategoria'),
(3, 'subCategoria2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suministro`
--

CREATE TABLE `suministro` (
  `idProducto` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `cantidad` float DEFAULT NULL,
  `fechaPedido` date DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suministro`
--

INSERT INTO `suministro` (`idProducto`, `idProveedor`, `cantidad`, `fechaPedido`, `precio`, `observacion`) VALUES
(1, 1, 12, '2017-11-17', 123, 'asda'),
(1, 2, 12, '2017-11-07', 12, 'asdad'),
(2, 1, 12, '2017-11-16', 12, 'asdad'),
(2, 2, 21, '2017-11-09', 12, 'asdasd'),
(3, 1, 12, '2017-11-16', 12, 'asdaada'),
(3, 2, 12, '2017-11-01', 121, 'asdad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `idUnidad` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idUnidad`, `nombre`) VALUES
(1, 'kg'),
(2, 'm'),
(3, 'Onz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidoPaterno` varchar(100) DEFAULT NULL,
  `apellidoMaterno` varchar(100) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `domicilio` varchar(200) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idRol`, `usuario`, `contrasena`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `dni`, `sexo`, `telefono`, `domicilio`, `fechaRegistro`) VALUES
(1, 4, '20140896', 'memo123', 'Guillermo Eduardo ', 'Narvaez', 'Muggi', '17920884', 'M', 980545386, 'Av.Manuel gonzales prada 768', '2017-11-19 12:27:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idUnidad_fk` (`idUnidad`),
  ADD KEY `idMarca_fk` (`idMarca`),
  ADD KEY `idCategoria_fk` (`idCategoria`),
  ADD KEY `idSubCategoria_fk` (`idSubCategoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`),
  ADD UNIQUE KEY `ruc` (`ruc`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idSubCategoria`);

--
-- Indices de la tabla `suministro`
--
ALTER TABLE `suministro`
  ADD PRIMARY KEY (`idProducto`,`idProveedor`),
  ADD KEY `idProveedor_fk` (`idProveedor`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`idUnidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD KEY `idRol2_fk` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `idSubCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `idCategoria_fk` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `idMarca_fk` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`),
  ADD CONSTRAINT `idSubCategoria_fk` FOREIGN KEY (`idSubCategoria`) REFERENCES `subcategoria` (`idSubCategoria`),
  ADD CONSTRAINT `idUnidad_fk` FOREIGN KEY (`idUnidad`) REFERENCES `unidad` (`idUnidad`);

--
-- Filtros para la tabla `suministro`
--
ALTER TABLE `suministro`
  ADD CONSTRAINT `idProducto_fk` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `idProveedor_fk` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `idRol2_fk` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
