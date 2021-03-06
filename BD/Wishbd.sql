-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-04-2019 a las 14:48:34
-- Versión del servidor: 10.3.14-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id8736505_wish`
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
(28, 'Talla', 12),
(29, 'Color', 12),
(30, 'Talla', 12),
(31, 'Color', 12),
(32, 'Talla', 12),
(33, 'Color', 12),
(34, 'Talla', 13),
(35, 'Color', 13),
(36, 'Talla', 16),
(37, 'Color', 16),
(38, 'Talla', 16),
(39, 'Color', 16),
(40, 'Talla', 16),
(41, 'Color', 16),
(42, 'Talla', 18),
(43, 'Color', 18),
(44, 'Talla', 18),
(45, 'Color', 18);

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
(71, 1, 18, 1, 1, NULL, NULL, 'Pagado');

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

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`IdCupon`, `Codigo`, `Porcentaje`, `FechaInicio`, `FechaFin`, `Minimo`, `Cantidad`) VALUES
(1, 'wish2403', '20', '2019-03-24', '2019-03-31', '200', 3),
(3, 'Calor', '30', '2019-04-06', '2019-04-07', '0', 100),
(6, '21', '10', '2019-04-06', '2019-04-07', '0', 100);

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
(55, 54, NULL, 19),
(56, 55, NULL, 19),
(57, 56, NULL, 20),
(58, 57, NULL, 20),
(59, 58, NULL, 21),
(60, 59, NULL, 21),
(61, 60, NULL, 22),
(62, 61, NULL, 22),
(67, 66, NULL, 25),
(68, 67, NULL, 25),
(69, 68, NULL, 26),
(70, 69, NULL, 26);

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
(1648, 53, 71, NULL, 1, NULL, NULL);

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
  `IdVenta` int(11) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccionusuario`
--

INSERT INTO `direccionusuario` (`IdDireccionUsuario`, `NombreCliente`, `ApellidoCliente`, `DireccionCliente1`, `DireccionCliente2`, `Pais`, `Ciudad`, `Estado`, `CodigoPostal`, `Telefono`, `IdVenta`, `IdUsuario`) VALUES
(1, 'Mario', 'Avila Hu', 'adsafsafsaf', NULL, 'fsdfsdfdsfsdfsdf', 'dsfdsfsdfdsf', 'sfsdfdsfsd', 97300, '9992712112', NULL, 0),
(10, 'Mario', 'Avila Hu', 'Calle 12 por 25 y 27', NULL, 'Mexico', 'Merida', 'Yucatan', 97300, '9992712112', NULL, 1);

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
(34, 'IMG-20160903-WA0000.jpg', '', '', '', '', ''),
(35, '5b2a60067973335cb60f8614-large.jpg', '5b2a60067973335cb60f8614-1-large.jpg', '', '', '', ''),
(36, '5b2a60067973335cb60f8614-large.jpg', '5b2a60067973335cb60f8614-1-large.jpg', '', '', '', ''),
(37, '5b2a60067973335cb60f8614-large.jpg', '5b2a60067973335cb60f8614-1-large.jpg', '', '', '', ''),
(38, '5b2a60067973335cb60f8614-large.jpg', '5b2a60067973335cb60f8614-1-large.jpg', '', '', '', ''),
(39, '5b2a60067973335cb60f8614-large.jpg', '', '', '', '', ''),
(40, '5b2a60067973335cb60f8614-large.jpg', '', '', '', '', ''),
(41, '5b2a60067973335cb60f8614-large.jpg', '', '', '', '', ''),
(42, '5b2a60067973335cb60f8614-large.jpg', '', '', '', '', ''),
(43, '5b2a60067973335cb60f8614-large.jpg', '', '', '', '', ''),
(44, '5b2a60067973335cb60f8614-large.jpg', '', '', '', '', ''),
(45, '5b2a60067973335cb60f8614-large.jpg', '', '', '', '', ''),
(46, '5b2a60067973335cb60f8614-large.jpg', '', '', '', '', ''),
(47, '7faja.jpg', '', '', '', '', ''),
(48, '5b2a60067973335cb60f8614-large.jpg', '', '', '', '', ''),
(49, '4mallon.jpg', '', '', '', '', ''),
(50, 'Las-5-cosas-que-nos-dejo-la-primera-Fecha-FIFA-del-Tri-del-Tata-Martino-1120x581.png', '', '', '', '', ''),
(51, '4mallon.jpg', '', '', '', '', ''),
(52, 're1.jpg', '', '', '', '', ''),
(53, 're1.jpg', '', '', '', '', ''),
(54, 're1.jpg', '', '', '', '', ''),
(55, 're1.jpg', '', '', '', '', '');

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
(2, '200.00', -2, 1),
(3, '100.00', -39, 2),
(4, '250.00', 9, 3),
(5, '50.00', 9, 4),
(7, '50.00', 10, 6),
(19, '350.00', 2, 12),
(20, '350.00', 2, 12),
(21, '350.00', 2, 12),
(22, '120.00', 1, 13),
(25, '890.00', 1, 16),
(26, '300.00', 9, 18);

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
(1, 'Anillo de Plata', 'Anillo para compromiso de plata', 123, 300, 200, '100 gr', 0, 0, 17, 1, 1, 1),
(2, 'Correa', 'Correa para cabellero de varios colores', 321, 150, 100, '50gr', 0, 0, 19, 1, 2, 1),
(3, 'Lentes', 'Lentes para sol', 123, 550, 250, '100 gr', 0, 0, 20, 1, 3, 1),
(4, 'Percing', 'Percing para caballero', 555, 150, 50, '50gr', 0, 0, 20, 1, 4, 1),
(6, 'Mica', 'Mica para pantalla ', 555, 150, 50, '50gr', 0, 0, 20, 1, 6, 2),
(12, 'Faja deportiva', '{axkñasjdñajdñxjañ', 90890, 300, 250, '0', 0, 0, 2, 1, 47, 1),
(13, 'Audifono', 'audifonos ', 15, 100, 20, '0', 0, 0, 1, 1, 48, 2),
(16, 'Pantalón deportivo ', 'Pantalon para hacer deporte', 1785, 890, 890, '0', 0, 0, 4, 1, 51, 4),
(18, 'Reloj', 'Reloj para caballero', 8098098, 400, 300, '0', 0, 0, 9, 1, 55, 1);

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
(31, 2, NULL, 'Negro', 1),
(32, 2, NULL, 'Verde', 1),
(33, 2, NULL, 'Azul', 1),
(34, 2, NULL, 'Amarillo', 1),
(35, 2, NULL, 'Amarillo', 1),
(36, 1, '5', NULL, 1),
(37, 1, '5', NULL, 1),
(38, 2, NULL, 'Verde', 1),
(39, 2, NULL, 'Amarillo', 1),
(61, 2, NULL, 'Negro', 1),
(64, 1, '3.5', NULL, 2),
(65, 2, NULL, 'Negro', 1),
(68, 1, '4', NULL, 1),
(71, 18, NULL, 'Azul', 1);

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
(7, 'Mario', 'Hu', 'mario@gmail.com', '12345', 3),
(8, 'Mario', 'Avila', 'mavila@gmail.com', '123', 1);

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
(54, '', 28),
(55, 'negro', 29),
(56, '', 30),
(57, 'negro', 31),
(58, '', 32),
(59, 'negro', 33),
(60, '', 34),
(61, 'negro', 35),
(62, 'chica', 36),
(63, 'negro', 37),
(64, 'chica', 38),
(65, 'negro', 39),
(66, 'chica', 40),
(67, 'negro', 41),
(68, '', 42),
(69, 'Azul', 43),
(70, '', 44),
(71, 'Azul', 45);

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
(1, 0, '1ff602o1c1v16s68hrag26ksr8', '2019-03-20 17:38:51', 1, 200, 'EC-66S0500774181773X', 'mavilah9@gmail.com'),
(2, 0, 'plbhuos5ifkvgiclb8ejr3f69j', '2019-03-24 00:02:09', 1, 100, NULL, 'mavilah9@gmail.com'),
(3, 0, 'plbhuos5ifkvgiclb8ejr3f69j', '2019-03-24 00:50:18', 1, 200, 'EC-07B08855KP730991T', 'mavilah9@gmail.com'),
(4, 0, '6l85mtn0n2qlv628u3er1e6ps3', '2019-03-26 23:37:24', 1, 100, NULL, 'mavilah9@gmail.com'),
(5, 0, '6l85mtn0n2qlv628u3er1e6ps3', '2019-03-26 23:43:50', 1, 100, NULL, 'mavilah9@gmail.com'),
(6, 0, '6l85mtn0n2qlv628u3er1e6ps3', '2019-03-26 23:46:15', 1, 100, NULL, 'mavilah9@gmail.com'),
(7, 0, '6l85mtn0n2qlv628u3er1e6ps3', '2019-03-26 23:47:08', 1, 100, NULL, 'mavilah9@gmail.com'),
(8, 0, '6l85mtn0n2qlv628u3er1e6ps3', '2019-03-26 23:47:50', 1, 100, NULL, 'mavilah9@gmail.com'),
(9, 0, '6l85mtn0n2qlv628u3er1e6ps3', '2019-03-26 23:57:48', 1, 100, NULL, 'mavilah9@gmail.com'),
(10, 0, '6l85mtn0n2qlv628u3er1e6ps3', '2019-03-26 23:58:28', 1, 100, NULL, 'mavilah9@gmail.com'),
(11, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 07:46:49', 1, 100, NULL, 'mavilah9@gmail.com'),
(12, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 07:49:22', 1, 100, NULL, 'mavilah9@gmail.com'),
(13, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 07:53:58', 1, 100, NULL, 'mavilah9@gmail.com'),
(14, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 07:54:24', 1, 100, NULL, 'mavilah9@gmail.com'),
(15, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 07:54:45', 1, 100, NULL, 'mavilah9@gmail.com'),
(16, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 07:55:39', 1, 100, NULL, 'mavilah9@gmail.com'),
(17, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 07:56:00', 1, 100, NULL, 'mavilah9@gmail.com'),
(18, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 07:56:45', 1, 100, NULL, 'mavilah9@gmail.com'),
(19, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 07:59:20', 1, 100, NULL, 'mavilah9@gmail.com'),
(20, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:00:01', 1, 100, NULL, 'mavilah9@gmail.com'),
(21, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:00:52', 1, 100, NULL, 'mavilah9@gmail.com'),
(22, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:01:07', 1, 100, NULL, 'mavilah9@gmail.com'),
(23, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:01:28', 1, 100, NULL, 'mavilah9@gmail.com'),
(24, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:02:03', 1, 100, NULL, 'mavilah9@gmail.com'),
(25, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:02:25', 1, 100, NULL, 'mavilah9@gmail.com'),
(26, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:02:49', 1, 100, NULL, 'mavilah9@gmail.com'),
(27, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:03:20', 1, 100, NULL, 'mavilah9@gmail.com'),
(28, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:04:03', 1, 100, NULL, 'mavilah9@gmail.com'),
(29, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:04:24', 1, 100, NULL, 'mavilah9@gmail.com'),
(30, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:04:58', 1, 100, NULL, 'mavilah9@gmail.com'),
(31, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:05:26', 1, 100, NULL, 'mavilah9@gmail.com'),
(32, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:06:13', 1, 100, NULL, 'mavilah9@gmail.com'),
(33, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:07:48', 1, 100, NULL, 'mavilah9@gmail.com'),
(34, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:08:54', 1, 100, NULL, 'mavilah9@gmail.com'),
(35, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:10:10', 1, 100, NULL, 'mavilah9@gmail.com'),
(36, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:12:58', 1, 100, NULL, 'mavilah9@gmail.com'),
(37, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:14:11', 1, 100, NULL, 'mavilah9@gmail.com'),
(38, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:17:00', 1, 100, NULL, 'mavilah9@gmail.com'),
(39, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:18:01', 1, 100, NULL, 'mavilah9@gmail.com'),
(40, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:25:03', 1, 100, NULL, 'mavilah9@gmail.com'),
(41, 0, 'kaaeb1qdicevgelth36ivqkd82', '2019-03-27 08:28:57', 1, 100, NULL, 'mavilah9@gmail.com'),
(42, 0, 'd4tlrjp8esuq9etdaj5vb25aqn', '2019-03-27 09:15:54', 1, 100, NULL, 'mavilah9@gmail.com'),
(43, 0, '6qpn5itovjk848cblvjf75ep2s', '2019-03-27 09:27:57', 1, 200, NULL, 'mavilah9@gmail.com'),
(44, 0, '6qpn5itovjk848cblvjf75ep2s', '2019-03-27 09:32:01', 1, 200, NULL, 'mavilah9@gmail.com'),
(45, 0, '6qpn5itovjk848cblvjf75ep2s', '2019-03-27 09:34:52', 1, 200, NULL, 'mavilah9@gmail.com'),
(46, 0, '6qpn5itovjk848cblvjf75ep2s', '2019-03-27 09:45:03', 1, 100, NULL, 'mavilah9@gmail.com'),
(47, 0, '6qpn5itovjk848cblvjf75ep2s', '2019-03-27 09:48:22', 1, 100, NULL, 'mavilah9@gmail.com'),
(48, 0, '6qpn5itovjk848cblvjf75ep2s', '2019-03-27 09:56:17', 1, 100, NULL, 'mavilah9@gmail.com'),
(49, 0, '6qpn5itovjk848cblvjf75ep2s', '2019-03-27 09:57:25', 1, 100, NULL, 'mavilah9@gmail.com'),
(50, 0, 'a3k9puesr7g5gnkuu3af15f7lv', '2019-03-28 20:18:00', 1, 100, 'EC-5CU098095G6429301', 'mavilah9@gmail.com'),
(51, 0, '13e4cj87h6atepft6lj8323ll5', '2019-04-03 16:28:16', 2, 320, NULL, 'mavilah9@gmail.com'),
(52, 0, 'no1i8ho1qeajvq07qt7o2k80om', '2019-04-29 04:38:18', 1, 200, NULL, 'mavilah9@gmail.com'),
(53, 0, 'no1i8ho1qeajvq07qt7o2k80om', '2019-04-29 04:44:35', 1, 300, NULL, 'mavilah9@gmail.com');

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
  ADD KEY `RefVenta95` (`IdVenta`),
  ADD KEY `IdUsuario` (`IdUsuario`);

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
  MODIFY `IdCaracteristicas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `IdCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
  MODIFY `IdCupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `IdDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1649;

--
-- AUTO_INCREMENT de la tabla `direccionusuario`
--
ALTER TABLE `direccionusuario`
  MODIFY `IdDireccionUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `IdImagenProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `IdMaestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `IdPublicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `IdValor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `IdVendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `visualizado`
--
ALTER TABLE `visualizado`
  MODIFY `IdVisualizado` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `RefVenta95` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `visualizado_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
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
