-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2019 a las 00:44:45
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
(6, 'Talla', 7),
(7, 'Color', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `IdCarrito` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdVendedor` int(11) NOT NULL,
  `IdCupon` int(11) DEFAULT NULL,
  `IdPeso` int(11) DEFAULT NULL,
  `Estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`IdCarrito`, `Cantidad`, `IdProducto`, `IdUsuario`, `IdVendedor`, `IdCupon`, `IdPeso`, `Estatus`) VALUES
(1, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(2, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(3, 1, 2, 1, 1, NULL, NULL, 'Pagado'),
(4, 1, 2, 1, 1, NULL, NULL, 'Pagado'),
(5, 2, 2, 1, 1, NULL, NULL, 'Pagado'),
(6, 1, 2, 1, 1, NULL, NULL, 'Pagado'),
(7, 1, 3, 1, 1, NULL, NULL, 'Pagado'),
(8, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(9, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(10, 1, 4, 1, 1, NULL, NULL, 'Pagado'),
(11, 1, 4, 1, 1, NULL, NULL, 'Pagado'),
(12, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(13, 1, 2, 1, 1, NULL, NULL, 'Pagado'),
(14, 1, 2, 1, 1, NULL, NULL, 'Pagado'),
(15, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(16, 1, 2, 1, 1, NULL, NULL, 'Pagado'),
(17, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(18, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(19, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(20, 1, 1, 1, 1, NULL, NULL, 'Pagado'),
(21, 1, 4, 1, 1, NULL, NULL, 'Pagado'),
(22, 1, 1, 1, 1, NULL, NULL, 'Pagado');

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
  `IdValor1` int(11) DEFAULT NULL,
  `IdMaestro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`IdDetalle`, `IdValor`, `IdValor1`, `IdMaestro`) VALUES
(3, 1, NULL, 2),
(4, 2, NULL, 2),
(5, 3, NULL, 2),
(6, 4, NULL, 2),
(7, 5, NULL, 2),
(8, 6, NULL, 2),
(9, 7, NULL, 2),
(10, 8, NULL, 2),
(11, 9, NULL, 2),
(17, 15, NULL, 3),
(18, 16, NULL, 3),
(19, 17, NULL, 3),
(20, 18, NULL, 3),
(21, 19, NULL, 4),
(22, 20, NULL, 4),
(23, 21, NULL, 4),
(24, 22, NULL, 4),
(25, 24, NULL, 5),
(26, 25, NULL, 5),
(27, 26, NULL, 5),
(28, 27, NULL, 5),
(29, 28, NULL, 7),
(30, 29, NULL, 7),
(31, 30, NULL, 7),
(32, 31, NULL, 7),
(33, 32, NULL, 8),
(34, 33, NULL, 8);

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

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`IdDetalleVenta`, `IdVenta`, `IdCarrito`, `IdDireccionVendedor`, `IdVendedor`, `IdDireccionUsuario`, `IdEnvio`) VALUES
(223, 1, 1, NULL, 1, NULL, NULL),
(224, 1, 2, NULL, 1, NULL, NULL),
(225, 1, 3, NULL, 1, NULL, NULL),
(226, 1, 4, NULL, 1, NULL, NULL),
(227, 1, 5, NULL, 1, NULL, NULL),
(228, 1, 6, NULL, 1, NULL, NULL),
(229, 1, 7, NULL, 1, NULL, NULL),
(230, 1, 8, NULL, 1, NULL, NULL),
(231, 1, 9, NULL, 1, NULL, NULL),
(232, 1, 10, NULL, 1, NULL, NULL),
(233, 1, 11, NULL, 1, NULL, NULL),
(234, 1, 12, NULL, 1, NULL, NULL),
(235, 1, 13, NULL, 1, NULL, NULL),
(236, 1, 14, NULL, 1, NULL, NULL),
(237, 1, 15, NULL, 1, NULL, NULL),
(238, 1, 16, NULL, 1, NULL, NULL),
(239, 1, 17, NULL, 1, NULL, NULL),
(240, 1, 18, NULL, 1, NULL, NULL),
(241, 1, 19, NULL, 1, NULL, NULL),
(242, 1, 20, NULL, 1, NULL, NULL),
(243, 1, 21, NULL, 1, NULL, NULL),
(244, 1, 22, NULL, 1, NULL, NULL);

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
(1, '1anilloplata.jpg', '1Anilloplata2.jpg', '1anilloplata3.jpg', '1anilloplata4.jpg', NULL, NULL),
(2, '1correa.jpg', '1correa2.jpg', '1correa3.jpg', '1correa4.jpg', NULL, NULL),
(3, '1lentes.jpg', '1lentes2.jpg', '1lentes3.jpg', '1lentes4.jpg', NULL, NULL),
(4, '1percing.jpg', '1percing2.jpg', '1percing3.jpg', '1percing4.jpg', NULL, NULL),
(5, '2cableusb.jpg', '2cableusb2.jpg', '2cableusb3', '2cableus4.jpg', NULL, NULL),
(6, '2mica.jpg', '2mica2.jpg', '2mica3.jpg', '2mica4.jpg', NULL, NULL),
(7, '2protector.jpg', NULL, NULL, NULL, NULL, NULL),
(8, '2protector2.jpg', NULL, NULL, NULL, NULL, NULL),
(9, '3camara.jpg', NULL, NULL, NULL, NULL, NULL),
(10, '3cuchillo.jpg', NULL, NULL, NULL, NULL, NULL),
(11, '3lampara.jpg', NULL, NULL, NULL, NULL, NULL),
(12, '3led.jpg', NULL, NULL, NULL, NULL, NULL),
(13, '4chamarra.jpg', NULL, NULL, NULL, NULL, NULL),
(14, '4mallon.jpg', NULL, NULL, NULL, NULL, NULL),
(15, '4pantalon.jpg', NULL, NULL, NULL, NULL, NULL),
(16, '4saco.jpg', NULL, NULL, NULL, NULL, NULL),
(17, '5playera.jpg', NULL, NULL, NULL, NULL, NULL),
(18, '5polo.jpg', NULL, NULL, NULL, NULL, NULL),
(19, '5sport.jpg', NULL, NULL, NULL, NULL, NULL),
(20, '5sudadera.jpg', NULL, NULL, NULL, NULL, NULL),
(21, '6botas.jpg', NULL, NULL, NULL, NULL, NULL),
(22, '6deportes.jpg', NULL, NULL, NULL, NULL, NULL),
(23, '6industrial.jpg', NULL, NULL, NULL, NULL, NULL),
(24, '6tenis.jpg', NULL, NULL, NULL, NULL, NULL),
(25, '7cortaunas.jpg', NULL, NULL, NULL, NULL, NULL),
(26, '7faja.jpg', NULL, NULL, NULL, NULL, NULL),
(27, '7rodillera.jpg', NULL, NULL, NULL, NULL, NULL),
(28, '7shampoo.jpg', NULL, NULL, NULL, NULL, NULL),
(29, '8audifonos.jpg', NULL, NULL, NULL, NULL, NULL),
(30, '8dron.jpg', NULL, NULL, NULL, NULL, NULL),
(31, '8leds.jpg', NULL, NULL, NULL, NULL, NULL),
(32, '8maus.jpg', NULL, NULL, NULL, NULL, NULL),
(33, '20161108_212612.jpg', '', '', '', '', ''),
(34, 'IMG-20160903-WA0000.jpg', '', '', '', '', '');

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
(2, '200.00', 4, 1),
(3, '100.00', 6, 2),
(4, '250.00', 10, 3),
(5, '50.00', 9, 4),
(7, '50.00', 10, 6),
(8, '200.00', 10, 7);

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
(1, 'Anillo de Plata', 'Anillo para compromiso de plata', 123, 300, 200, '100 gr', 0, 0, 4, 1, 1, 1),
(2, 'Correa', 'Correa de cuero para caballero', 321, 150, 100, '50gr', 0, 0, 6, 1, 2, 1),
(3, 'Lentes', 'Lentes para sol', 123, 550, 250, '100 gr', 0, 0, 10, 1, 3, 1),
(4, 'Percing', 'Percing para caballero', 555, 150, 50, '50gr', 0, 0, 7, 1, 4, 1),
(6, 'Mica', 'Mica para pantalla ', 555, 150, 50, '50gr', 0, 0, 10, 1, 6, 2),
(7, 'Playera', 'asdasdsadadsdasd', 98098908, 200, 150, '0', 0, 0, 10, 1, 34, 4);

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
-- Estructura de tabla para la tabla `productocarrito`
--

CREATE TABLE `productocarrito` (
  `IdCarrito` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Talla` varchar(50) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productocarrito`
--

INSERT INTO `productocarrito` (`IdCarrito`, `IdProducto`, `Talla`, `Color`, `Cantidad`) VALUES
(1, 1, '3.5', NULL, 1),
(2, 1, '4', NULL, 1),
(3, 1, '3.5', NULL, 1),
(4, 2, NULL, 'Verde', 1),
(5, 2, NULL, 'Seleccione', 2),
(6, 2, NULL, 'Verde', 1),
(7, 3, NULL, 'Azul & Azul', 1),
(8, 1, '4', NULL, 1),
(9, 1, '5', NULL, 1),
(10, 4, NULL, 'Dorado', 1),
(11, 4, NULL, 'Negro', 1),
(12, 1, '6', NULL, 1),
(13, 2, NULL, 'Negro', 1),
(14, 2, NULL, 'Azul', 1),
(15, 1, '5.5', NULL, 1),
(16, 2, NULL, 'Amarillo', 1),
(17, 1, '6', NULL, 1),
(18, 1, '5', NULL, 1),
(19, 1, '4.5', NULL, 1),
(20, 1, '5.5', NULL, 1),
(21, 4, NULL, 'Negro', 1),
(22, 1, '4', NULL, 1);

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
(6, 'German', 'Dzul Vera', 'german@gmail.com', '123', 3),
(7, 'Mario', 'Hu', 'mario@gmail.com', '12345', 3);

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
(32, 'Chica', 6),
(33, 'Negro', 7);

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
(2, 'Paredes', 2),
(6, 'Mario Hu', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `IdVenta` int(11) NOT NULL,
  `StatusPago` int(11) NOT NULL,
  `ClaveTransaccion` varchar(100) NOT NULL,
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
(1, 0, '1ff602o1c1v16s68hrag26ksr8', '2019-03-20 17:38:51', 1, 200, 'EC-66S0500774181773X', 'mavilah9@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visualizado`
--

CREATE TABLE `visualizado` (
  `IdVisualizado` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indices de la tabla `productocarrito`
--
ALTER TABLE `productocarrito`
  ADD PRIMARY KEY (`IdCarrito`),
  ADD KEY `IdCarrito` (`IdCarrito`),
  ADD KEY `IdProducto` (`IdProducto`);

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
-- Indices de la tabla `visualizado`
--
ALTER TABLE `visualizado`
  ADD PRIMARY KEY (`IdVisualizado`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdUsuario` (`IdUsuario`);

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
  MODIFY `IdCaracteristicas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `IdCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `IdDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

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
  MODIFY `IdImagenProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `IdMaestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `IdPublicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `IdValor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `IdVendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `visualizado`
--
ALTER TABLE `visualizado`
  MODIFY `IdVisualizado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `IdWishlist` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `RefCliente73` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefCupon117` FOREIGN KEY (`IdCupon`) REFERENCES `cupon` (`IdCupon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefPeso121` FOREIGN KEY (`IdPeso`) REFERENCES `peso` (`IdPeso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefProducto39` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefVendedor74` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `RefCarrito63` FOREIGN KEY (`IdCarrito`) REFERENCES `carrito` (`IdCarrito`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefDireccionCliente96` FOREIGN KEY (`IdDireccionUsuario`) REFERENCES `direccionusuario` (`IdDireccionUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefDireccionVendedor64` FOREIGN KEY (`IdDireccionVendedor`) REFERENCES `direccionvendedor` (`IdDireccionVendedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefEnvio113` FOREIGN KEY (`IdEnvio`) REFERENCES `envio` (`IdEnvio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefVendedor66` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefVenta51` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `RefCategoria98` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefImagenProducto47` FOREIGN KEY (`IdImagenProducto`) REFERENCES `imagenproducto` (`IdImagenProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefVendedor43` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productocaracteristicas`
--
ALTER TABLE `productocaracteristicas`
  ADD CONSTRAINT `productocaracteristicas_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productocaracteristicas_ibfk_2` FOREIGN KEY (`IdCaracteristicas`) REFERENCES `caracteristicas` (`IdCaracteristicas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productocarrito`
--
ALTER TABLE `productocarrito`
  ADD CONSTRAINT `productocarrito_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `RefCaracteristicas116` FOREIGN KEY (`IdCaracteristicas`) REFERENCES `caracteristicas` (`IdCaracteristicas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `RefUsuario40` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `visualizado`
--
ALTER TABLE `visualizado`
  ADD CONSTRAINT `visualizado_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `visualizado_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

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
