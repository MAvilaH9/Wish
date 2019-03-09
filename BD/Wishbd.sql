-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2019 a las 00:51:44
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wishbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `IdAdministrador` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `IdCaracteristicas` int(11) NOT NULL,
  `NombreCaracteristica` varchar(100) NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`IdCaracteristicas`, `NombreCaracteristica`, `IdProducto`) VALUES
(1, 'Talla', 1),
(2, 'Color', 2),
(3, 'Color', 3),
(4, 'Color', 4),
(5, 'Talla', 6),
(6, 'Talla', 55),
(7, 'Talla', 56),
(8, 'Color', 56),
(24, 'Talla', 57),
(25, 'Talla', 57),
(26, 'Talla', 57),
(27, 'Color', 57),
(28, 'Talla', 57),
(29, 'Color', 57),
(30, 'Talla', 57),
(31, 'Color', 57),
(32, 'Talla', 57),
(33, 'Color', 57),
(34, 'Talla', 57),
(35, 'Color', 57),
(36, 'Talla', 57),
(37, 'Color', 57),
(38, 'Talla', 57),
(39, 'Color', 57),
(40, 'Talla', 57),
(41, 'Color', 57),
(42, 'Talla', 57),
(43, 'Color', 57),
(44, 'Talla', 57),
(45, 'Color', 57),
(46, 'Talla', 57),
(47, 'Color', 57),
(48, 'Talla', 57),
(49, 'Color', 57),
(50, 'Talla', 57),
(51, 'Color', 57),
(52, 'Talla', 57),
(53, 'Color', 57),
(54, 'Talla', 57),
(55, 'Color', 57),
(56, 'Talla', 57),
(57, 'Color', 57),
(58, 'Talla', 57),
(59, 'Color', 57),
(60, 'Talla', 57),
(61, 'Color', 57),
(62, 'Talla', 57),
(63, 'Color', 57),
(64, 'Talla', 57),
(65, 'Color', 57),
(66, 'Talla', 57),
(67, 'Color', 57),
(68, 'Talla', 57),
(69, 'Color', 57),
(70, 'Talla', 58),
(71, 'Color', 58),
(72, 'Talla', 58),
(73, 'Color', 58),
(74, 'Talla', 59),
(75, 'Color', 59),
(76, 'Talla', 60),
(77, 'Color', 60),
(78, 'Talla', 60),
(79, 'Color', 60),
(80, 'Talla', 60),
(81, 'Talla', 60),
(82, 'Color', 60),
(83, 'Talla', 60),
(84, 'Color', 60),
(85, 'Talla', 60),
(86, 'Color', 60),
(87, 'Talla', 61),
(88, 'Color', 61),
(89, 'Talla', 61),
(90, 'Color', 61),
(91, 'Talla', 61),
(92, 'Color', 61),
(93, 'Talla', 61),
(94, 'Color', 61),
(95, 'Talla', 61),
(96, 'Color', 61),
(97, 'Talla', 61),
(98, 'Color', 61),
(99, 'Talla', 61),
(100, 'Color', 61),
(101, 'Talla', 61),
(102, 'Color', 61),
(103, 'Talla', 61),
(104, 'Color', 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `IdCarrito` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdVendedor` int(11) NOT NULL,
  `IdCupon` int(11) DEFAULT NULL,
  `IdPeso` int(11) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCategoriaPadre` varchar(50) NOT NULL,
  `NombreCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoriaPadre`, `NombreCategoria`) VALUES
(1, '1', 'Accesorios'),
(2, '2', 'Accesorios de teléfono'),
(3, '3', 'Deportes y actividades al aire libre'),
(4, '4', 'Moda'),
(5, '5', 'Blusas'),
(6, '6', 'Zapatos'),
(7, '7', 'Cuidado personal'),
(8, '8', 'Aparatos electrónicos'),
(9, '9', 'Pasatiempos'),
(10, '10', 'Relojes'),
(11, '11', 'Automotriz'),
(12, '12', 'Piezas y accesorios'),
(13, '13', 'Carteras y bolsos'),
(14, '14', 'Teléfonos inteligentes'),
(15, '15', 'Decoración del hogar'),
(16, '16', 'Relojes analógicos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `IdComentarios` int(11) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Valoracion` varchar(50) NOT NULL,
  `Fecha` varchar(50) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE `cupon` (
  `IdCupon` int(11) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Porcentaje` varchar(10) NOT NULL,
  `FechaInicio` varchar(20) NOT NULL,
  `FechaFin` varchar(20) NOT NULL,
  `Minimo` varchar(20) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `IdDetalle` int(11) NOT NULL,
  `IdValor` int(11) NOT NULL,
  `IdMaestro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`IdDetalle`, `IdValor`, `IdMaestro`) VALUES
(15, 89, 12),
(16, 92, 13),
(17, 95, 14),
(18, 98, 15),
(19, 101, 16),
(20, 107, 18),
(21, 110, 19),
(22, 111, 20),
(23, 112, 20),
(24, 113, 21),
(25, 114, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `IdDetalleVenta` int(11) NOT NULL,
  `IdVenta` int(11) NOT NULL,
  `IdCarrito` int(11) NOT NULL,
  `IdDireccionVendedor` int(11) DEFAULT NULL,
  `IdVendedor` int(11) NOT NULL,
  `IdDireccionUsuario` int(11) DEFAULT NULL,
  `IdEnvio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccionusuario`
--

CREATE TABLE `direccionusuario` (
  `IdDireccionUsuario` int(11) NOT NULL,
  `NombreCliente` varchar(100) NOT NULL,
  `ApellidoCliente` varchar(100) NOT NULL,
  `DireccionCliente1` varchar(200) NOT NULL,
  `DireccionCliente2` varchar(200) DEFAULT NULL,
  `Pais` varchar(50) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `CodigoPostal` int(11) NOT NULL,
  `Telefono` varchar(18) NOT NULL,
  `IdVenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccionusuario`
--

INSERT INTO `direccionusuario` (`IdDireccionUsuario`, `NombreCliente`, `ApellidoCliente`, `DireccionCliente1`, `DireccionCliente2`, `Pais`, `Ciudad`, `Estado`, `CodigoPostal`, `Telefono`, `IdVenta`) VALUES
(1, 'Mario', 'Avila Hu', 'adsafsafsaf', NULL, 'fsdfsdfdsfsdfsdf', 'dsfdsfsdfdsf', 'sfsdfdsfsd', 97300, '9992712112', NULL),
(2, 'Mario', 'Avila Hu', '', NULL, '', '', '', 0, '', NULL),
(3, 'Mario', 'Avila Hu', 'Calle 12', NULL, 'Mexico', 'Merida', 'Yucatan', 97300, '9992712112', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccionvendedor`
--

CREATE TABLE `direccionvendedor` (
  `IdDireccionVendedor` int(11) NOT NULL,
  `NombreVendedor` varchar(100) NOT NULL,
  `ApellidosVendedor` varchar(100) NOT NULL,
  `DireccionVendedor1` varchar(200) NOT NULL,
  `DireccionVendedor2` varchar(200) DEFAULT NULL,
  `Pais` varchar(50) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `CodigoPostal` int(11) NOT NULL,
  `Telefono` varchar(18) NOT NULL,
  `IdVendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `IdEnvio` int(11) NOT NULL,
  `FolioEnvio` int(11) NOT NULL,
  `PrecioEnvio` int(11) NOT NULL,
  `TiempoEstimadoEnvio` varchar(50) DEFAULT NULL,
  `EstatusEnvio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenproducto`
--

CREATE TABLE `imagenproducto` (
  `IdImagenProducto` int(11) NOT NULL,
  `Portada` varchar(500) NOT NULL,
  `Imagen1` varchar(500) DEFAULT NULL,
  `Imagen2` varchar(500) DEFAULT NULL,
  `Imagen3` varchar(500) DEFAULT NULL,
  `Imagen4` varchar(500) DEFAULT NULL,
  `Imagen5` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenproducto`
--

INSERT INTO `imagenproducto` (`IdImagenProducto`, `Portada`, `Imagen1`, `Imagen2`, `Imagen3`, `Imagen4`, `Imagen5`) VALUES
(1, '1anilloplata', '1Anilloplata2', '1anilloplata3', '1anilloplata4', NULL, NULL),
(2, '1correa', '1correa2', '1correa3', '1correa4', NULL, NULL),
(3, '1lentes', '1lentes2', '1lentes3', '1lentes4', NULL, NULL),
(4, '1percing', '1percing2', '1percing3', '1percing4', NULL, NULL),
(5, '2cableusb', '2cableusb2', '2cableusb3', '2cableus4', NULL, NULL),
(6, '2mica', '2mica2', '2mica3', '2mica4', NULL, NULL),
(7, '2protector', NULL, NULL, NULL, NULL, NULL),
(8, '2protector2', NULL, NULL, NULL, NULL, NULL),
(9, '3camara', NULL, NULL, NULL, NULL, NULL),
(10, '3cuchillo', NULL, NULL, NULL, NULL, NULL),
(11, '3lampara', NULL, NULL, NULL, NULL, NULL),
(12, '3led', NULL, NULL, NULL, NULL, NULL),
(13, '4chamarra', NULL, NULL, NULL, NULL, NULL),
(14, '4mallon', NULL, NULL, NULL, NULL, NULL),
(15, '4pantalon', NULL, NULL, NULL, NULL, NULL),
(16, '4saco', NULL, NULL, NULL, NULL, NULL),
(17, '5playera', NULL, NULL, NULL, NULL, NULL),
(18, '5polo', NULL, NULL, NULL, NULL, NULL),
(19, '5sport', NULL, NULL, NULL, NULL, NULL),
(20, '5sudadera', NULL, NULL, NULL, NULL, NULL),
(21, '6botas', NULL, NULL, NULL, NULL, NULL),
(22, '6deportes', NULL, NULL, NULL, NULL, NULL),
(23, '6industrial', NULL, NULL, NULL, NULL, NULL),
(24, '6tenis', NULL, NULL, NULL, NULL, NULL),
(25, '7cortaunas', NULL, NULL, NULL, NULL, NULL),
(26, '7faja', NULL, NULL, NULL, NULL, NULL),
(27, '7rodillera', NULL, NULL, NULL, NULL, NULL),
(28, '7shampoo', NULL, NULL, NULL, NULL, NULL),
(29, '8audifonos', NULL, NULL, NULL, NULL, NULL),
(30, '8dron', NULL, NULL, NULL, NULL, NULL),
(31, '8leds', NULL, NULL, NULL, NULL, NULL),
(32, '8maus', NULL, NULL, NULL, NULL, NULL),
(33, 'Capture001.png', '', '', '', '', ''),
(34, 'Capture001.png', '', '', '', '', ''),
(41, '75guadalupe.JPG', '', '', '', '', ''),
(42, 'IMG-20160903-WA0000.jpg', '', '', '', '', ''),
(43, 'IMG-20160903-WA0000.jpg', '', '', '', '', ''),
(44, 'IMG-20160713-WA0000.jpg', '', '', '', '', ''),
(45, '20170202_005301.jpg', '', '', '', '', ''),
(46, '20170202_010317.jpg', '', '', '', '', ''),
(47, '20170202_010317.jpg', '', '', '', '', ''),
(48, '20170202_010317.jpg', '', '', '', '', ''),
(49, '20170202_010317.jpg', '', '', '', '', ''),
(50, '20170202_010317.jpg', '', '', '', '', ''),
(51, '20170202_010317.jpg', '', '', '', '', ''),
(52, '20170202_010317.jpg', '', '', '', '', ''),
(53, '20170202_010317.jpg', '', '', '', '', ''),
(54, '20170202_010317.jpg', '', '', '', '', ''),
(55, '20170202_010330.jpg', '', '', '', '', ''),
(56, '', '', '', '', '', ''),
(57, '', '', '', '', '', ''),
(58, '', '', '', '', '', ''),
(59, 'images (2).jpg', '', '', '', '', ''),
(60, '', '', '', '', '', ''),
(61, '', '', '', '', '', ''),
(62, 'IMG-20160718-WA0000.jpg', '', '', '', '', ''),
(63, '', '', '', '', '', ''),
(64, '20170202_010330.jpg', '', '', '', '', ''),
(65, '20170131_034922.jpg', '', '', '', '', ''),
(66, '20161108_212612.jpg', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `IdMaestro` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`IdMaestro`, `Precio`, `Cantidad`, `IdProducto`) VALUES
(1, '500.00', 10, 57),
(2, '500.00', 10, 57),
(3, '500.00', 10, 57),
(4, '500.00', 10, 57),
(5, '90.00', 10, 57),
(6, '290.00', 9, 58),
(7, '400.00', 10, 60),
(8, '400.00', 10, 60),
(9, '400.00', 10, 60),
(10, '400.00', 10, 60),
(11, '400.00', 9, 60),
(12, '400.00', 9, 60),
(13, '90.00', 9, 61),
(14, '90.00', 9, 61),
(15, '90.00', 9, 61),
(16, '0.00', 9, 61),
(17, '0.00', 9, 61),
(18, '0.00', 9, 61),
(19, '0.00', 9, 61),
(20, '0.00', 9, 61),
(21, '90.00', 1, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacionadministrador`
--

CREATE TABLE `notificacionadministrador` (
  `IdNotificacionAdministrador` int(11) NOT NULL,
  `Descripcionistrador` varchar(500) DEFAULT NULL,
  `IdAdministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacionusuario`
--

CREATE TABLE `notificacionusuario` (
  `IdNotificacionUsuario` int(11) NOT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacionvendedor`
--

CREATE TABLE `notificacionvendedor` (
  `IdNotificacionVendedor` int(11) NOT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `IdVendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `IdPerfil` int(11) NOT NULL,
  `NombrePerfil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`IdPerfil`, `NombrePerfil`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso`
--

CREATE TABLE `peso` (
  `IdPeso` int(11) NOT NULL,
  `PrecioPeso` int(11) NOT NULL,
  `PesoMaxPeso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `NombreProducto` varchar(100) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `PrecioDescuento` int(11) DEFAULT NULL,
  `Peso` varchar(50) NOT NULL,
  `EstadoProducto` int(11) NOT NULL,
  `EstadoPetProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `IdVendedor` int(11) NOT NULL,
  `IdImagenProducto` int(11) DEFAULT NULL,
  `IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `NombreProducto`, `Descripcion`, `Codigo`, `Precio`, `PrecioDescuento`, `Peso`, `EstadoProducto`, `EstadoPetProducto`, `Cantidad`, `IdVendedor`, `IdImagenProducto`, `IdCategoria`) VALUES
(1, 'Anillo de Plata', 'Anillo para compromiso de plata', 123, 300, 200, '100 gr', 0, 0, 10, 1, 1, 1),
(2, 'Correa', 'Correa de cuero para caballero', 321, 150, 100, '50gr', 0, 0, 5, 1, 2, 1),
(3, 'Lentes', 'Lentes para sol', 123, 550, 250, '100 gr', 0, 0, 10, 1, 3, 1),
(4, 'Percing', 'Percing para caballero', 555, 150, 50, '50gr', 0, 0, 10, 1, 4, 1),
(5, 'Cable usb', 'Cable usb para celular', 123, 220, 150, '100 gr', 0, 0, 10, 1, 5, 2),
(6, 'Mica', 'Mica para pantalla ', 555, 150, 50, '50gr', 0, 0, 10, 1, 6, 2),
(7, 'Protector Transparente', 'Protector Transparente para celular', 123, 250, 150, '100 gr', 0, 0, 10, 1, 7, 2),
(8, 'Protector para celular', 'Protector movil', 555, 250, 200, '50gr', 0, 0, 10, 1, 8, 2),
(9, 'Camara', 'Camara Portatil deportiva', 123, 1550, 1250, '100 gr', 0, 0, 10, 1, 9, 3),
(10, 'Navaja', 'Navaja', 555, 350, 250, '50gr', 0, 0, 10, 1, 10, 3),
(11, 'Lampara deportiva', 'Lampara tipo minero', 123, 250, 150, '100 gr', 0, 0, 10, 1, 11, 3),
(12, 'Luz Led', 'Luz led para sala', 555, 150, 100, '50gr', 0, 0, 10, 1, 12, 3),
(13, 'Chamarra', 'Chamarra elegante', 123, 750, 550, '100 gr', 0, 0, 10, 1, 13, 4),
(14, 'Mallon', 'Mallon deportivo para caballero', 555, 250, 150, '50gr', 0, 0, 10, 1, 14, 4),
(15, 'Jeans', 'Jeans para caballero', 123, 550, 350, '100 gr', 0, 0, 10, 1, 15, 4),
(16, 'Saco', 'Saco elegante para caballero', 555, 750, 550, '50gr', 0, 0, 10, 1, 16, 4),
(17, 'Playera de vestir', 'Playera manga larga', 123, 350, 250, '100 gr', 0, 0, 10, 1, 17, 5),
(18, 'Playera Polo', 'Playera tipo polo para caballero', 555, 250, 150, '50gr', 0, 0, 10, 1, 18, 5),
(19, 'Playera deportiva', 'Playera deportiva', 123, 250, 100, '100 gr', 0, 0, 10, 1, 19, 5),
(20, 'Sudadera', 'Sudadera con impresion para caballero', 555, 350, 250, '50gr', 0, 0, 10, 1, 20, 5),
(21, 'Botas', 'Botas de vestir para caballero', 123, 650, 500, '100 gr', 0, 0, 10, 1, 21, 6),
(22, 'Tenis Deportivos', 'Tenis para deporte para caballero', 555, 450, 350, '50gr', 0, 0, 10, 1, 22, 6),
(23, 'Zapatos Industriales', 'Zapatos para trabajos industriales', 123, 550, 500, '100 gr', 0, 0, 10, 1, 23, 6),
(24, 'Tenis Blancos', 'Tenis de vestis para caballero', 555, 550, 450, '50gr', 0, 0, 10, 1, 24, 6),
(25, 'Cortauñas', 'Cortaulñas de acero inoxidable', 123, 100, 50, '100 gr', 0, 0, 10, 1, 25, 7),
(26, 'Faja', 'Faja para evitar dolores de espalda', 555, 350, 250, '50gr', 0, 0, 10, 1, 26, 7),
(27, 'Rodillera', 'Rodillera para cubrir leciones', 123, 550, 250, '100 gr', 0, 0, 10, 1, 27, 7),
(28, 'Shampoo', 'Shampoo para caida de pelo', 555, 150, 50, '50gr', 0, 0, 10, 1, 28, 7),
(29, 'Audifonos', 'Audifonos inalambricos', 123, 250, 150, '100 gr', 0, 0, 10, 1, 29, 8),
(30, 'Dron', 'Dron con camara color blanco', 555, 1550, 1050, '50gr', 0, 0, 10, 1, 30, 8),
(31, 'Luces Led', 'Luces del de colores', 123, 150, 100, '100 gr', 0, 0, 10, 1, 31, 8),
(32, 'Mause', 'Mause inalambrico', 555, 150, 50, '50gr', 0, 0, 10, 1, 32, 8),
(33, 'Tenis', 'amsdÃ±kjakldjkajsdjaldjsdklsajkdkld', 878707, 890, 800, '0', 0, 0, 9, 2, NULL, 6),
(34, 'Tenis', 'amsdÃ±kjakldjkajsdjaldjsdklsajkdkld', 878707, 890, 800, '0', 0, 0, 9, 2, NULL, 6),
(35, 'Tenis', 'amsdÃ±kjakldjkajsdjaldjsdklsajkdkld', 878707, 890, 800, '0', 0, 0, 9, 2, NULL, 6),
(36, 'Tenis', 'amsdÃ±kjakldjkajsdjaldjsdklsajkdkld', 878707, 890, 800, '0', 0, 0, 9, 2, NULL, 6),
(37, 'Tenis', 'amsdÃ±kjakldjkajsdjaldjsdklsajkdkld', 878707, 890, 800, '0', 0, 0, 9, 2, NULL, 6),
(38, 'Tenis', 'adhahsdkÃ±hasÃ±kdhsaÃ±kdhÃ±kashdÃ±ash', 90890709, 890, 800, '0', 0, 0, 9, 2, NULL, 6),
(42, 'Lentes', 'adsasdasdsadas', 908098, 300, 250, '0', 0, 0, 9, 2, 41, 1),
(43, 'Playera', '\r\nasdjlahdlsahdlhsaldkhksahdkashhd', 9080908, 250, 200, '0', 0, 0, 9, 2, 42, 4),
(44, 'Playera', '\r\nasdjlahdlsahdlhsaldkhksahdkashhd', 9080908, 250, 200, '0', 0, 0, 9, 2, 43, 4),
(46, 'Gorra', 'asdkaÃ±sdÃ±asdkÃ±lsakdÃ±kaÃ±sdk', 8090, 150, 100, '0', 0, 0, 9, 2, 44, 4),
(47, 'Blusa', 'asdsadasdsadasd', 0, 300, 240, '0', 0, 0, 9, 2, 45, 5),
(48, 'Blusa', 'sadÃ±ajdÃ±ajsdÃ±jadjÃ±l', 909009, 300, 250, '0', 0, 0, 10, 2, 46, 5),
(49, 'Blusa', 'sadÃ±ajdÃ±ajsdÃ±jadjÃ±l', 909009, 300, 250, '0', 0, 0, 10, 2, 47, 5),
(50, 'Blusa', 'sadÃ±ajdÃ±ajsdÃ±jadjÃ±l', 909009, 300, 250, '0', 0, 0, 10, 2, 48, 5),
(51, 'Blusa1', 'sadÃ±ajdÃ±ajsdÃ±jadjÃ±l', 909009, 300, 250, '0', 0, 0, 10, 2, 49, 5),
(52, 'Blusa1', 'sadÃ±ajdÃ±ajsdÃ±jadjÃ±l', 909009, 300, 250, '0', 0, 0, 10, 2, 50, 5),
(53, 'Blusa1', 'sadÃ±ajdÃ±ajsdÃ±jadjÃ±l', 909009, 300, 250, '0', 0, 0, 10, 2, 52, 5),
(54, 'Blusa1', 'sadÃ±ajdÃ±ajsdÃ±jadjÃ±l', 909009, 300, 250, '0', 0, 0, 10, 2, 53, 5),
(55, 'Blusa1', 'sadÃ±ajdÃ±ajsdÃ±jadjÃ±l', 909009, 300, 250, '0', 0, 0, 10, 2, 54, 5),
(56, 'Blusa 2', 'aÃ±ldjaÃ±ldjsldjaÃ±jdÃ±sajdÃ±sa', 9090, 300, 250, '0', 0, 0, 9, 2, 55, 5),
(57, 'Camisa', 'asadsadsadsadsad', 78, 70, 70, '0', 0, 0, 9, 2, 59, 4),
(58, 'Reloj', 'sÃ±jdÃ±sajdsjadÃ±ajdÃ±ljlÃ±sjdÃ±jaÃ±sdjÃ±lsa', 90990, 300, 290, '0', 0, 0, 9, 2, 62, 10),
(59, 'Reloj', 'aljdÃ±sjadÃ±jaÃ±djasÃ±jdj', 70, 350, 300, '9', 0, 0, 10, 2, 64, 10),
(60, 'Jeans', 'aÃ±ljdÃ±ljadÃ±jsaÃ±djÃ±sdajÃ±lj|', 9080, 500, 400, '0', 0, 0, 9, 2, 65, 4),
(61, 'Playera', 'lasÃ±dkakdlÃ±aksdÃ±akÃ±ldksÃ±lakdÃ±l', 900909, 90, 80, '0', 0, 0, 9, 2, 66, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productocaracteristicas`
--

CREATE TABLE `productocaracteristicas` (
  `IdProducto` int(11) NOT NULL,
  `IdCaracteristicas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productocaracteristicas`
--

INSERT INTO `productocaracteristicas` (`IdProducto`, `IdCaracteristicas`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productovalor`
--

CREATE TABLE `productovalor` (
  `IdProducto` int(11) NOT NULL,
  `IdValor` int(11) NOT NULL,
  `IdCaracteristicas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productovalor`
--

INSERT INTO `productovalor` (`IdProducto`, `IdValor`, `IdCaracteristicas`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `IdPublicacion` int(11) NOT NULL,
  `cantidadVendidaPublicacion` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(40) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contrasenia` varchar(30) NOT NULL,
  `IdPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `NombreUsuario`, `Apellidos`, `Correo`, `Contrasenia`, `IdPerfil`) VALUES
(1, 'Mario', 'Avila Hu', 'mavilah9@gmail.com', '12345', 3),
(2, 'Joseph', 'Paredes Rafful', 'joseph@gmail.com', '123', 2),
(3, 'Santos', 'Chac Cante', 'santos@gmail.com', '123', 3),
(6, 'German', 'Dzul Vera', 'german@gmail.com', '123', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor`
--

CREATE TABLE `valor` (
  `IdValor` int(11) NOT NULL,
  `Valor` varchar(100) NOT NULL,
  `IdCaracteristicas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valor`
--

INSERT INTO `valor` (`IdValor`, `Valor`, `IdCaracteristicas`) VALUES
(1, '3.5', 1),
(2, '4', 1),
(3, '4.5', 1),
(4, '5', 1),
(5, '5.5', 1),
(6, '6', 1),
(7, '6.5', 1),
(8, '7', 1),
(9, '7.5', 1),
(10, '8', 1),
(11, '8.5', 1),
(12, '9', 1),
(13, '9.5', 1),
(14, '10', 1),
(15, 'Negro', 2),
(16, 'Verde', 2),
(17, 'Azul', 2),
(18, 'Amarillo', 2),
(19, 'Negro & Gris', 3),
(20, 'Dorado & Marrón', 3),
(21, 'Azul & Azul', 3),
(22, 'Plateado & Plateado', 3),
(24, 'Rojo', 4),
(25, 'Negro', 4),
(26, 'Dorado', 4),
(27, 'Rosa', 4),
(28, 'Huawei Mate 10', 5),
(29, 'iPhone 6S', 5),
(30, 'Samsung Galaxy S7', 5),
(31, 'Samsung Galaxy S9 Plus', 5),
(32, 'Chico', 26),
(33, 'Chico', 28),
(35, 'Chico', 30),
(37, 'Chico', 32),
(39, 'Chico', 34),
(41, 'Chico', 36),
(43, 'Chico', 38),
(44, 'Negro', 38),
(45, 'Mediana', 40),
(46, 'Verde', 40),
(47, 'Mediana', 42),
(48, 'Verde', 42),
(49, 'Mediana', 44),
(50, 'Verde', 44),
(51, 'Grande', 46),
(52, 'Verde', 46),
(53, 'Grande', 48),
(54, 'Verde', 48),
(55, 'Grande', 50),
(56, 'Verde', 50),
(57, 'Grande', 52),
(58, 'Verde', 52),
(59, 'Grande', 54),
(60, 'Verde', 54),
(61, 'Grande', 56),
(62, 'Verde', 56),
(63, 'Grande', 58),
(64, 'Verde', 58),
(65, 'Grande', 1),
(66, 'Verde', 1),
(67, 'Grande', 2),
(68, 'Grande', 3),
(69, 'Grande', 4),
(70, 'Mediana', 5),
(71, 'Unitalla', 6),
(72, 'Unitalla', 72),
(73, 'Negro', 72),
(74, 'unitalla', 74),
(75, 'Verde', 74),
(76, '28', 7),
(77, 'Negro', 77),
(78, '30', 8),
(79, 'Negro', 78),
(81, '34', 81),
(82, 'Negro', 82),
(83, '32', 83),
(85, 'Negro', 84),
(87, '32', 85),
(89, 'Negro', 86),
(90, 'Chica', 87),
(92, 'Negro', 88),
(93, 'Grande', 89),
(95, 'Negro', 90),
(96, 'Grande', 91),
(98, 'Rojo', 92),
(99, 'XL', 93),
(101, 'Rojo', 94),
(102, 'Xll', 95),
(105, 'Xll', 97),
(107, 'Negro', 98),
(108, 'Chico', 99),
(110, 'Negro', 100),
(111, 'XCH', 101),
(112, 'Negro', 102),
(113, 'Mediana', 103),
(114, 'Negro', 104);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `IdVendedor` int(11) NOT NULL,
  `Empresa` varchar(500) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`IdVendedor`, `Empresa`, `IdUsuario`) VALUES
(1, 'UTM', 1),
(2, 'Paredes', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `IdVenta` int(11) NOT NULL,
  `StatusPago` int(11) NOT NULL,
  `ClaveTransaccion` int(11) NOT NULL,
  `Fecha` varchar(50) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` int(11) DEFAULT NULL,
  `DatosPaypal` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`IdVenta`, `StatusPago`, `ClaveTransaccion`, `Fecha`, `Cantidad`, `Total`, `DatosPaypal`, `Correo`) VALUES
(1, 0, 1234, '2019-02-14', 2, 400, NULL, 'mavilah9@gmail.com'),
(2, 0, 1, '2019-02-14 14:41:28', 2, 400, NULL, 'mavilah9@gmail.com'),
(3, 0, 1, '2019-02-14 14:43:32', 2, 400, NULL, 'mavilah9@gmail.com'),
(4, 0, 1, '2019-02-14 14:51:34', 2, 400, NULL, 'mavilah9@gmail.com'),
(5, 0, 1, '2019-02-14 14:52:30', 2, 400, NULL, 'mavilah9@gmail.com'),
(6, 0, 1, '2019-02-14 14:54:46', 2, 400, NULL, 'mavilah9@gmail.com'),
(7, 0, 1, '2019-02-15 16:31:03', 3, 600, NULL, 'mavilah9@gmail.com'),
(8, 0, 1, '2019-02-15 16:31:22', 3, 600, NULL, 'mavilah9@gmail.com'),
(9, 0, 1, '2019-02-15 16:31:37', 3, 600, NULL, 'mavilah9@gmail.com'),
(10, 0, 6, '2019-02-15 17:32:38', 3, 600, NULL, 'mavilah9@gmail.com'),
(11, 0, 6, '2019-02-15 17:32:46', 3, 600, NULL, 'mavilah9@gmail.com'),
(12, 0, 6, '2019-02-15 17:34:00', 3, 600, NULL, 'mavilah9@gmail.com'),
(13, 0, 6, '2019-02-15 17:36:06', 4, 750, NULL, 'mavilah9@gmail.com'),
(14, 0, 6, '2019-02-15 17:38:46', 4, 750, NULL, 'mavilah9@gmail.com'),
(15, 0, 6, '2019-02-15 17:59:29', 4, 750, NULL, 'mavilah9@gmail.com'),
(16, 0, 6, '2019-02-15 18:00:44', 4, 750, NULL, 'mavilah9@gmail.com'),
(17, 0, 6, '2019-02-15 18:01:52', 4, 750, NULL, 'mavilah9@gmail.com'),
(18, 0, 6, '2019-02-15 18:03:44', 4, 750, NULL, 'mavilah9@gmail.com'),
(19, 0, 6, '2019-02-15 18:04:45', 5, 850, NULL, 'mavilah9@gmail.com'),
(20, 0, 6, '2019-02-15 20:16:09', 5, 850, NULL, 'mavilah9@gmail.com'),
(21, 0, 6, '2019-02-15 20:22:03', 5, 850, NULL, 'mavilah9@gmail.com'),
(22, 0, 6, '2019-02-15 20:23:55', 5, 850, NULL, 'mavilah9@gmail.com'),
(23, 0, 6, '2019-02-15 20:33:51', 5, 850, NULL, 'mavilah9@gmail.com'),
(24, 0, 6, '2019-02-15 20:43:44', 4, 750, NULL, 'mavilah9@gmail.com'),
(25, 0, 0, '2019-02-17 16:38:31', 5, 900, NULL, 'mavilah9@gmail.com'),
(26, 0, 40, '2019-02-19 10:00:32', 0, 0, NULL, 'joseph@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `IdWishlist` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wishlist`
--

INSERT INTO `wishlist` (`IdWishlist`, `Nombre`, `IdProducto`, `IdUsuario`) VALUES
(1, 'Mario', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`IdAdministrador`),
  ADD KEY `RefUsuario75` (`IdUsuario`),
  ADD KEY `RefProducto118` (`IdProducto`);

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`IdCaracteristicas`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`IdCarrito`),
  ADD KEY `RefProducto39` (`IdProducto`),
  ADD KEY `RefPeso121` (`IdPeso`),
  ADD KEY `RefCliente73` (`IdUsuario`),
  ADD KEY `RefVendedor74` (`IdVendedor`),
  ADD KEY `RefCupon117` (`IdCupon`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`),
  ADD KEY `RefCategoria107` (`NombreCategoriaPadre`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`IdComentarios`),
  ADD KEY `RefUsuario52` (`IdUsuario`),
  ADD KEY `RefProducto53` (`IdProducto`);

--
-- Indices de la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`IdCupon`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `IdValor` (`IdValor`),
  ADD KEY `IdMaestro` (`IdMaestro`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`IdDetalleVenta`),
  ADD KEY `RefVenta51` (`IdVenta`),
  ADD KEY `RefCarrito63` (`IdCarrito`),
  ADD KEY `RefDireccionVendedor64` (`IdDireccionVendedor`),
  ADD KEY `RefVendedor66` (`IdVendedor`),
  ADD KEY `RefDireccionCliente96` (`IdDireccionUsuario`),
  ADD KEY `RefEnvio113` (`IdEnvio`);

--
-- Indices de la tabla `direccionusuario`
--
ALTER TABLE `direccionusuario`
  ADD PRIMARY KEY (`IdDireccionUsuario`),
  ADD KEY `RefVenta95` (`IdVenta`);

--
-- Indices de la tabla `direccionvendedor`
--
ALTER TABLE `direccionvendedor`
  ADD PRIMARY KEY (`IdDireccionVendedor`),
  ADD KEY `RefVendedor71` (`IdVendedor`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`IdEnvio`);

--
-- Indices de la tabla `imagenproducto`
--
ALTER TABLE `imagenproducto`
  ADD PRIMARY KEY (`IdImagenProducto`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`IdMaestro`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `notificacionadministrador`
--
ALTER TABLE `notificacionadministrador`
  ADD PRIMARY KEY (`IdNotificacionAdministrador`),
  ADD KEY `RefAdministrador83` (`IdAdministrador`);

--
-- Indices de la tabla `notificacionusuario`
--
ALTER TABLE `notificacionusuario`
  ADD PRIMARY KEY (`IdNotificacionUsuario`),
  ADD KEY `RefCliente112` (`IdUsuario`);

--
-- Indices de la tabla `notificacionvendedor`
--
ALTER TABLE `notificacionvendedor`
  ADD PRIMARY KEY (`IdNotificacionVendedor`),
  ADD KEY `RefVendedor111` (`IdVendedor`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`IdPerfil`);

--
-- Indices de la tabla `peso`
--
ALTER TABLE `peso`
  ADD PRIMARY KEY (`IdPeso`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `RefVendedor43` (`IdVendedor`),
  ADD KEY `RefImagenProducto47` (`IdImagenProducto`),
  ADD KEY `RefCategoria98` (`IdCategoria`);

--
-- Indices de la tabla `productocaracteristicas`
--
ALTER TABLE `productocaracteristicas`
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdCaracteristicas` (`IdCaracteristicas`);

--
-- Indices de la tabla `productovalor`
--
ALTER TABLE `productovalor`
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdValor` (`IdValor`),
  ADD KEY `IdCaracteristicas` (`IdCaracteristicas`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`IdPublicacion`),
  ADD KEY `RefProducto84` (`IdProducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `RefPerfil36` (`IdPerfil`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`IdValor`),
  ADD KEY `RefCaracteristicas116` (`IdCaracteristicas`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`IdVendedor`),
  ADD KEY `RefUsuario40` (`IdUsuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`IdVenta`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`IdWishlist`),
  ADD KEY `RefProducto68` (`IdProducto`),
  ADD KEY `RefUsuario69` (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `IdAdministrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `IdCaracteristicas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `IdCarrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `IdComentarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `IdCupon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `IdDetalleVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccionusuario`
--
ALTER TABLE `direccionusuario`
  MODIFY `IdDireccionUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `direccionvendedor`
--
ALTER TABLE `direccionvendedor`
  MODIFY `IdDireccionVendedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `IdEnvio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenproducto`
--
ALTER TABLE `imagenproducto`
  MODIFY `IdImagenProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `IdMaestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `notificacionadministrador`
--
ALTER TABLE `notificacionadministrador`
  MODIFY `IdNotificacionAdministrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacionusuario`
--
ALTER TABLE `notificacionusuario`
  MODIFY `IdNotificacionUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacionvendedor`
--
ALTER TABLE `notificacionvendedor`
  MODIFY `IdNotificacionVendedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `IdPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `peso`
--
ALTER TABLE `peso`
  MODIFY `IdPeso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `IdPublicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `IdValor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `IdVendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `IdWishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `RefProducto118` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `RefUsuario75` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD CONSTRAINT `caracteristicas_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `RefCliente73` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `RefCupon117` FOREIGN KEY (`IdCupon`) REFERENCES `cupon` (`IdCupon`),
  ADD CONSTRAINT `RefPeso121` FOREIGN KEY (`IdPeso`) REFERENCES `peso` (`IdPeso`),
  ADD CONSTRAINT `RefProducto39` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `RefVendedor74` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `RefProducto53` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `RefUsuario52` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`IdMaestro`) REFERENCES `maestro` (`IdMaestro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`IdValor`) REFERENCES `valor` (`IdValor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `RefCarrito63` FOREIGN KEY (`IdCarrito`) REFERENCES `carrito` (`IdCarrito`),
  ADD CONSTRAINT `RefDireccionCliente96` FOREIGN KEY (`IdDireccionUsuario`) REFERENCES `direccionusuario` (`IdDireccionUsuario`),
  ADD CONSTRAINT `RefDireccionVendedor64` FOREIGN KEY (`IdDireccionVendedor`) REFERENCES `direccionvendedor` (`IdDireccionVendedor`),
  ADD CONSTRAINT `RefEnvio113` FOREIGN KEY (`IdEnvio`) REFERENCES `envio` (`IdEnvio`),
  ADD CONSTRAINT `RefVendedor66` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`),
  ADD CONSTRAINT `RefVenta51` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`);

--
-- Filtros para la tabla `direccionusuario`
--
ALTER TABLE `direccionusuario`
  ADD CONSTRAINT `RefVenta95` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`);

--
-- Filtros para la tabla `direccionvendedor`
--
ALTER TABLE `direccionvendedor`
  ADD CONSTRAINT `RefVendedor71` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`);

--
-- Filtros para la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD CONSTRAINT `maestro_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacionadministrador`
--
ALTER TABLE `notificacionadministrador`
  ADD CONSTRAINT `RefAdministrador83` FOREIGN KEY (`IdAdministrador`) REFERENCES `administrador` (`IdAdministrador`);

--
-- Filtros para la tabla `notificacionusuario`
--
ALTER TABLE `notificacionusuario`
  ADD CONSTRAINT `RefCliente112` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `notificacionvendedor`
--
ALTER TABLE `notificacionvendedor`
  ADD CONSTRAINT `RefVendedor111` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `RefCategoria98` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`),
  ADD CONSTRAINT `RefImagenProducto47` FOREIGN KEY (`IdImagenProducto`) REFERENCES `imagenproducto` (`IdImagenProducto`),
  ADD CONSTRAINT `RefVendedor43` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`);

--
-- Filtros para la tabla `productocaracteristicas`
--
ALTER TABLE `productocaracteristicas`
  ADD CONSTRAINT `productocaracteristicas_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productocaracteristicas_ibfk_2` FOREIGN KEY (`IdCaracteristicas`) REFERENCES `caracteristicas` (`IdCaracteristicas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productovalor`
--
ALTER TABLE `productovalor`
  ADD CONSTRAINT `productovalor_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productovalor_ibfk_2` FOREIGN KEY (`IdCaracteristicas`) REFERENCES `caracteristicas` (`IdCaracteristicas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productovalor_ibfk_3` FOREIGN KEY (`IdValor`) REFERENCES `valor` (`IdValor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `RefProducto84` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `RefPerfil36` FOREIGN KEY (`IdPerfil`) REFERENCES `perfil` (`IdPerfil`);

--
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
  ADD CONSTRAINT `RefCaracteristicas116` FOREIGN KEY (`IdCaracteristicas`) REFERENCES `caracteristicas` (`IdCaracteristicas`);

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `RefUsuario40` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `RefProducto68` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `RefUsuario69` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
