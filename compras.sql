-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-05-2021 a las 09:22:47
-- Versión del servidor: 5.7.33-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `altaproveedor`
--

CREATE TABLE `altaproveedor` (
  `rfc` varchar(50) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `giro_empresa` varchar(500) NOT NULL,
  `dfc` varchar(500) NOT NULL,
  `dfn` varchar(10) NOT NULL,
  `colonia` varchar(200) NOT NULL,
  `cp` varchar(9) NOT NULL,
  `municipio` varchar(200) NOT NULL,
  `cond_credito` varchar(500) NOT NULL,
  `diasc` varchar(5) NOT NULL,
  `limitec` varchar(10) NOT NULL,
  `empresa` varchar(200) NOT NULL,
  `tiempo_entrega` varchar(10) NOT NULL,
  `penalizacion_inc` varchar(200) NOT NULL,
  `costos` varchar(200) NOT NULL,
  `clabe_banc` varchar(18) NOT NULL,
  `pagina_web` varchar(200) NOT NULL,
  `banco` varchar(200) NOT NULL,
  `cuentabancaria` varchar(10) NOT NULL,
  `estadocuenta` varchar(500) NOT NULL,
  `correo_aviso` varchar(200) NOT NULL,
  `director_general` varchar(200) NOT NULL,
  `telefono_dir` varchar(10) NOT NULL,
  `email_dir` varchar(250) NOT NULL,
  `repres_ventas` varchar(300) NOT NULL,
  `tel_repre` varchar(10) NOT NULL,
  `email_repre` varchar(300) NOT NULL,
  `otro_contacto` varchar(300) NOT NULL,
  `telefono_otro` varchar(10) NOT NULL,
  `email_otro` varchar(300) NOT NULL,
  `nombre1` varchar(300) NOT NULL,
  `contacto1` varchar(300) NOT NULL,
  `telefono1` varchar(10) NOT NULL,
  `nombre2` varchar(300) NOT NULL,
  `contacto2` varchar(300) NOT NULL,
  `telefono2` varchar(10) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contrasena` varchar(50) NOT NULL,
  `formato_r2_alta` varchar(200) NOT NULL,
  `form_rfc` varchar(200) NOT NULL,
  `id_oficial_repre_legal` varchar(200) NOT NULL,
  `cart_cond_comerciales` varchar(200) NOT NULL,
  `lista_precios` varchar(200) NOT NULL,
  `comprobante_domicilio` varchar(200) NOT NULL,
  `positiva` varchar(200) NOT NULL,
  `ubicacion1` varchar(100) NOT NULL,
  `ubicacion2` varchar(500) NOT NULL,
  `ubicacion3` varchar(500) NOT NULL,
  `ubicacion4` varchar(500) NOT NULL,
  `ubicacion5` varchar(500) NOT NULL,
  `ubicacion6` varchar(500) NOT NULL,
  `ubicacion7` varchar(500) NOT NULL,
  `ubicacion0` varchar(500) NOT NULL,
  `fecha_autorizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_subidad` datetime NOT NULL,
  `estatusp` varchar(50) NOT NULL,
  `tipop` varchar(50) NOT NULL,
  `usuarioc` varchar(100) NOT NULL,
  `nuestro_estado` varchar(100) NOT NULL,
  `ubnuestro_estado` varchar(500) NOT NULL,
  `fecha_positiva` date NOT NULL,
  `fecha_nue` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `altaproveedor`
--

INSERT INTO `altaproveedor` (`rfc`, `razon_social`, `giro_empresa`, `dfc`, `dfn`, `colonia`, `cp`, `municipio`, `cond_credito`, `diasc`, `limitec`, `empresa`, `tiempo_entrega`, `penalizacion_inc`, `costos`, `clabe_banc`, `pagina_web`, `banco`, `cuentabancaria`, `estadocuenta`, `correo_aviso`, `director_general`, `telefono_dir`, `email_dir`, `repres_ventas`, `tel_repre`, `email_repre`, `otro_contacto`, `telefono_otro`, `email_otro`, `nombre1`, `contacto1`, `telefono1`, `nombre2`, `contacto2`, `telefono2`, `fecha_alta`, `contrasena`, `formato_r2_alta`, `form_rfc`, `id_oficial_repre_legal`, `cart_cond_comerciales`, `lista_precios`, `comprobante_domicilio`, `positiva`, `ubicacion1`, `ubicacion2`, `ubicacion3`, `ubicacion4`, `ubicacion5`, `ubicacion6`, `ubicacion7`, `ubicacion0`, `fecha_autorizacion`, `fecha_subidad`, `estatusp`, `tipop`, `usuarioc`, `nuestro_estado`, `ubnuestro_estado`, `fecha_positiva`, `fecha_nue`) VALUES
('12AGUA56825Q', 'AGUA DE PUEBLA S.A DE C.V', 'AGUA', 'GALEANA', '30', 'SAN LORENZO', '72710', 'PUEBLA', '', '30', '100000', 'ARAM-LUZ,CAPITAN KLIN,ETIROCH,BETICINI,GLOBAL,', '30', '', 'FIJOS,', '123456789009997776', 'www.google.com', 'BBVA', '1234568459', 'OOPD610512MPLSRM07 (2).pdf', 'jrvazquezo@outlook.com', 'ROBERTO', '2228296320', 'jrvazquezo@outlook.com', 'ROBERTO', '2228296320', 'jrvazquezo@outlook.com', 'ROBERTO VAZQUEZ', '2228296320', '', 'ABC', '1234433333333333', '1234567', '', '', '', '2021-05-10 12:03:59', 'miguel', 'OOPD610512MPLSRM07 (2).pdf', 'OOPD610512MPLSRM07 (1).pdf', 'OOPD610512MPLSRM07 (2).pdf', 'OOPD610512MPLSRM07 (1).pdf', 'lista precios - copia (6).xlsx', 'CALENDARIOS2021.pdf', 'OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (1).pdf', '../docs/12AGUA56825Q/lista-precios/2021-05-13  12-20-29/lista precios - copia (6).xlsx', '../docs/VAOR870916HPL/CALENDARIOS2021.pdf', '../docs/VAOR870916HPL/cartas_cumplimiento/2021-05-10  14-03-59/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '2021-05-13 17:20:29', '2021-05-11 10:17:13', '', '', 'Daniel Marquez', 'estado de cuenta.xlsx', '../docs/12AGUA56825Q/estados_cuenta/2021-05-13  11-39-07/estado de cuenta.xlsx', '0000-00-00', '2021-05-13'),
('PASTELES1234', 'PASTELES DE PUEBLA S.A DE C.V', 'PASTELES', 'GALEANA', '30', 'SAN LORENZO', '72710', 'PUEBLA', '', '30', '100000', 'ARAM-LUZ,CAPITAN KLIN,ETIROCH,BETICINI,GLOBAL,', '30', '', 'FIJOS,', '123456789009997776', 'www.google.com', 'BBVA', '1234568459', 'OOPD610512MPLSRM07 (2).pdf', 'jrvazquezo@outlook.com', 'ROBERTO', '2228296320', 'jrvazquezo@outlook.com', 'ROBERTO', '2228296320', 'jrvazquezo@outlook.com', 'ROBERTO VAZQUEZ', '2228296320', '', 'ABC', '1234433333333333', '1234567', '', '', '', '2021-05-10 12:03:59', 'd2x6RsnOSb', 'OOPD610512MPLSRM07 (2).pdf', 'OOPD610512MPLSRM07 (1).pdf', 'OOPD610512MPLSRM07 (2).pdf', 'OOPD610512MPLSRM07 (1).pdf', 'logs pt.xlsx', 'CALENDARIOS2021.pdf', 'OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/lista-precios/2021-05-11  10-17-13/logs pt.xlsx', '../docs/VAOR870916HPL/CALENDARIOS2021.pdf', '../docs/VAOR870916HPL/cartas_cumplimiento/2021-05-10  14-03-59/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '2021-05-13 19:31:47', '2021-05-11 10:17:13', '', '', 'Daniel Marquez', '', '', '0000-00-00', '0000-00-00'),
('TARIMAS12345', 'TARIMAS DE PUEBLA S.A DE C.V', 'TARIMAS', 'GALEANA', '30', 'SAN LORENZO', '72710', 'PUEBLA', '', '30', '100000', 'ARAM-LUZ,CAPITAN KLIN,ETIROCH,BETICINI,GLOBAL,', '30', '', 'FIJOS,', '123456789009997776', 'www.google.com', 'BBVA', '1234568459', 'OOPD610512MPLSRM07 (2).pdf', 'miguel.buny@gmail.com', 'ROBERTO', '2228296320', 'jrvazquezo@outlook.com', 'ROBERTO', '2228296320', 'miguel.buny@gmail.com', 'ROBERTO VAZQUEZ', '2228296320', '', 'ABC', '1234433333333333', '1234567', '', '', '', '2021-05-10 12:03:59', '', 'OOPD610512MPLSRM07 (2).pdf', 'OOPD610512MPLSRM07 (1).pdf', 'OOPD610512MPLSRM07 (2).pdf', 'OOPD610512MPLSRM07 (1).pdf', 'logs pt.xlsx', 'CALENDARIOS2021.pdf', 'OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/lista-precios/2021-05-11  10-17-13/logs pt.xlsx', '../docs/VAOR870916HPL/CALENDARIOS2021.pdf', '../docs/VAOR870916HPL/cartas_cumplimiento/2021-05-10  14-03-59/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '2021-05-13 16:28:31', '2021-05-11 10:17:13', '', '', 'Daniel Marquez', '', '', '0000-00-00', '0000-00-00'),
('VAOR870916HPL', 'ENPRESAS DE PRUEBA', 'TEXTIL', 'GALEANA', '30', 'SAN LORENZO', '72710', 'PUEBLA', '', '30', '100000', 'ARAM-LUZ,CAPITAN KLIN,ETIROCH,BETICINI,GLOBAL,', '30', '', 'FIJOS,', '123456789009997776', 'www.google.com', 'BBVA', '1234568459', 'OOPD610512MPLSRM07 (2).pdf', 'jrvazquezo@outlook.com', 'ROBERTO', '2228296320', 'jrvazquezo@outlook.com', 'ROBERTO', '2228296320', 'jrvazquezo@outlook.com', 'ROBERTO VAZQUEZ', '2228296320', '', 'ABC', '1234433333333333', '1234567', '', '', '', '2021-05-10 12:03:59', 'miguel', 'OOPD610512MPLSRM07 (2).pdf', 'OOPD610512MPLSRM07 (1).pdf', 'OOPD610512MPLSRM07 (2).pdf', 'OOPD610512MPLSRM07 (1).pdf', 'logs pt.xlsx', 'CALENDARIOS2021.pdf', 'OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/lista-precios/2021-05-11  10-17-13/logs pt.xlsx', '../docs/VAOR870916HPL/CALENDARIOS2021.pdf', '../docs/VAOR870916HPL/cartas_cumplimiento/2021-05-10  14-03-59/OOPD610512MPLSRM07 (1).pdf', '../docs/VAOR870916HPL/OOPD610512MPLSRM07 (2).pdf', '2021-05-13 16:28:21', '2021-05-11 10:17:13', '', '', 'Daniel Marquez', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprador`
--

CREATE TABLE `comprador` (
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comprador`
--

INSERT INTO `comprador` (`usuario`, `contrasena`, `nombre`, `apellido1`, `apellido2`, `correo`, `tipo`) VALUES
('Daniel Marquez', 'dani', 'Daniel', 'Marquez', 'Marquez', 'daniel.marquez@gpoalze.com', 'ADMINISTRADOR'),
('Sin asignar', 'sin asignar', 'NO BORRAR', 'NO BORRAR', 'NO BORRAR', 'sinasignar@gmail.com', 'ADMINISTRADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `altaproveedor`
--
ALTER TABLE `altaproveedor`
  ADD PRIMARY KEY (`rfc`),
  ADD KEY `usuarioc_FK` (`usuarioc`);

--
-- Indices de la tabla `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `altaproveedor`
--
ALTER TABLE `altaproveedor`
  ADD CONSTRAINT `altaproveedor_ibfk_1` FOREIGN KEY (`usuarioc`) REFERENCES `comprador` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
