-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: wishbd
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `IdAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdAdministrador`),
  KEY `RefUsuario75` (`IdUsuario`),
  KEY `RefProducto118` (`IdProducto`),
  CONSTRAINT `RefProducto118` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  CONSTRAINT `RefUsuario75` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caracteristicas`
--

DROP TABLE IF EXISTS `caracteristicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caracteristicas` (
  `IdCaracteristicas` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCaracteristica` varchar(100) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdCaracteristicas`),
  KEY `RefProducto60` (`IdProducto`),
  CONSTRAINT `RefProducto60` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caracteristicas`
--

LOCK TABLES `caracteristicas` WRITE;
/*!40000 ALTER TABLE `caracteristicas` DISABLE KEYS */;
INSERT INTO `caracteristicas` VALUES (1,'Talla',1);
/*!40000 ALTER TABLE `caracteristicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `IdCarrito` int(11) NOT NULL AUTO_INCREMENT,
  `IdProducto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdVendedor` int(11) NOT NULL,
  `IdCupon` int(11) DEFAULT NULL,
  `IdPeso` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdCarrito`),
  KEY `RefProducto39` (`IdProducto`),
  KEY `RefPeso121` (`IdPeso`),
  KEY `RefCliente73` (`IdUsuario`),
  KEY `RefVendedor74` (`IdVendedor`),
  KEY `RefCupon117` (`IdCupon`),
  CONSTRAINT `RefCliente73` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  CONSTRAINT `RefCupon117` FOREIGN KEY (`IdCupon`) REFERENCES `cupon` (`IdCupon`),
  CONSTRAINT `RefPeso121` FOREIGN KEY (`IdPeso`) REFERENCES `peso` (`IdPeso`),
  CONSTRAINT `RefProducto39` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  CONSTRAINT `RefVendedor74` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (1,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCategoriaPadre` varchar(50) NOT NULL,
  `NombreCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCategoria`),
  KEY `RefCategoria107` (`NombreCategoriaPadre`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'1','Accesorios'),(2,'2','Accesorios de teléfono'),(3,'3','Deportes y actividades al aire libre'),(4,'4','Moda'),(5,'5','Blusas'),(6,'6','Zapatos'),(7,'7','Cuidado personal'),(8,'8','Aparatos electrónicos'),(9,'9','Pasatiempos'),(10,'10','Relojes'),(11,'11','Automotriz'),(12,'12','Piezas y accesorios'),(13,'13','Carteras y bolsos'),(14,'14','Teléfonos inteligentes'),(15,'15','Decoración del hogar'),(16,'16','Relojes analógicos');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `IdComentarios` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(500) NOT NULL,
  `Valoracion` varchar(50) NOT NULL,
  `Fecha` varchar(50) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdComentarios`),
  KEY `RefUsuario52` (`IdUsuario`),
  KEY `RefProducto53` (`IdProducto`),
  CONSTRAINT `RefProducto53` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  CONSTRAINT `RefUsuario52` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cupon`
--

DROP TABLE IF EXISTS `cupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupon` (
  `IdCupon` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(50) NOT NULL,
  `Porcentaje` varchar(10) NOT NULL,
  `FechaInicio` varchar(20) NOT NULL,
  `FechaFin` varchar(20) NOT NULL,
  `Minimo` varchar(20) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`IdCupon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cupon`
--

LOCK TABLES `cupon` WRITE;
/*!40000 ALTER TABLE `cupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `cupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleventa` (
  `IdDetalleVenta` int(11) NOT NULL AUTO_INCREMENT,
  `IdVenta` int(11) NOT NULL,
  `IdCarrito` int(11) NOT NULL,
  `IdDireccionVendedor` int(11) NOT NULL,
  `IdVendedor` int(11) NOT NULL,
  `IdDireccionUsuario` int(11) NOT NULL,
  `IdEnvio` int(11) NOT NULL,
  PRIMARY KEY (`IdDetalleVenta`),
  KEY `RefVenta51` (`IdVenta`),
  KEY `RefCarrito63` (`IdCarrito`),
  KEY `RefDireccionVendedor64` (`IdDireccionVendedor`),
  KEY `RefVendedor66` (`IdVendedor`),
  KEY `RefDireccionCliente96` (`IdDireccionUsuario`),
  KEY `RefEnvio113` (`IdEnvio`),
  CONSTRAINT `RefCarrito63` FOREIGN KEY (`IdCarrito`) REFERENCES `carrito` (`IdCarrito`),
  CONSTRAINT `RefDireccionCliente96` FOREIGN KEY (`IdDireccionUsuario`) REFERENCES `direccionusuario` (`IdDireccionUsuario`),
  CONSTRAINT `RefDireccionVendedor64` FOREIGN KEY (`IdDireccionVendedor`) REFERENCES `direccionvendedor` (`IdDireccionVendedor`),
  CONSTRAINT `RefEnvio113` FOREIGN KEY (`IdEnvio`) REFERENCES `envio` (`IdEnvio`),
  CONSTRAINT `RefVendedor66` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`),
  CONSTRAINT `RefVenta51` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleventa`
--

LOCK TABLES `detalleventa` WRITE;
/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccionusuario`
--

DROP TABLE IF EXISTS `direccionusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccionusuario` (
  `IdDireccionUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCliente` varchar(100) NOT NULL,
  `ApellidoCliente` varchar(100) NOT NULL,
  `DireccionCliente1` varchar(200) NOT NULL,
  `DireccionCliente2` varchar(200) DEFAULT NULL,
  `Pais` varchar(50) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `CodigoPostal` int(11) NOT NULL,
  `Telefono` varchar(18) NOT NULL,
  `IdVenta` int(11) NOT NULL,
  PRIMARY KEY (`IdDireccionUsuario`),
  KEY `RefVenta95` (`IdVenta`),
  CONSTRAINT `RefVenta95` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccionusuario`
--

LOCK TABLES `direccionusuario` WRITE;
/*!40000 ALTER TABLE `direccionusuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccionusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccionvendedor`
--

DROP TABLE IF EXISTS `direccionvendedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccionvendedor` (
  `IdDireccionVendedor` int(11) NOT NULL AUTO_INCREMENT,
  `NombreVendedor` varchar(100) NOT NULL,
  `ApellidosVendedor` varchar(100) NOT NULL,
  `DireccionVendedor1` varchar(200) NOT NULL,
  `DireccionVendedor2` varchar(200) DEFAULT NULL,
  `Pais` varchar(50) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `CodigoPostal` int(11) NOT NULL,
  `Telefono` varchar(18) NOT NULL,
  `IdVendedor` int(11) NOT NULL,
  PRIMARY KEY (`IdDireccionVendedor`),
  KEY `RefVendedor71` (`IdVendedor`),
  CONSTRAINT `RefVendedor71` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccionvendedor`
--

LOCK TABLES `direccionvendedor` WRITE;
/*!40000 ALTER TABLE `direccionvendedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccionvendedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envio`
--

DROP TABLE IF EXISTS `envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envio` (
  `IdEnvio` int(11) NOT NULL AUTO_INCREMENT,
  `FolioEnvio` int(11) NOT NULL,
  `PrecioEnvio` int(11) NOT NULL,
  `TiempoEstimadoEnvio` varchar(50) DEFAULT NULL,
  `EstatusEnvio` int(11) NOT NULL,
  PRIMARY KEY (`IdEnvio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envio`
--

LOCK TABLES `envio` WRITE;
/*!40000 ALTER TABLE `envio` DISABLE KEYS */;
/*!40000 ALTER TABLE `envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenproducto`
--

DROP TABLE IF EXISTS `imagenproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenproducto` (
  `IdImagenProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Portada` varchar(500) NOT NULL,
  `Imagen1` varchar(500) DEFAULT NULL,
  `Imagen2` varchar(500) DEFAULT NULL,
  `Imagen3` varchar(500) DEFAULT NULL,
  `Imagen4` varchar(500) DEFAULT NULL,
  `Imagen5` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`IdImagenProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenproducto`
--

LOCK TABLES `imagenproducto` WRITE;
/*!40000 ALTER TABLE `imagenproducto` DISABLE KEYS */;
INSERT INTO `imagenproducto` VALUES (1,'1anilloplata',NULL,NULL,NULL,NULL,NULL),(2,'1correa',NULL,NULL,NULL,NULL,NULL),(3,'1lentes',NULL,NULL,NULL,NULL,NULL),(4,'1percing',NULL,NULL,NULL,NULL,NULL),(5,'2cableusb',NULL,NULL,NULL,NULL,NULL),(6,'2mica',NULL,NULL,NULL,NULL,NULL),(7,'2protector',NULL,NULL,NULL,NULL,NULL),(8,'2protector2',NULL,NULL,NULL,NULL,NULL),(9,'3camara',NULL,NULL,NULL,NULL,NULL),(10,'3cuchillo',NULL,NULL,NULL,NULL,NULL),(11,'3lampara',NULL,NULL,NULL,NULL,NULL),(12,'3led',NULL,NULL,NULL,NULL,NULL),(13,'4chamarra',NULL,NULL,NULL,NULL,NULL),(14,'4mallon',NULL,NULL,NULL,NULL,NULL),(15,'4pantalon',NULL,NULL,NULL,NULL,NULL),(16,'4saco',NULL,NULL,NULL,NULL,NULL),(17,'5playera',NULL,NULL,NULL,NULL,NULL),(18,'5polo',NULL,NULL,NULL,NULL,NULL),(19,'5sport',NULL,NULL,NULL,NULL,NULL),(20,'5sudadera',NULL,NULL,NULL,NULL,NULL),(21,'6botas',NULL,NULL,NULL,NULL,NULL),(22,'6deportes',NULL,NULL,NULL,NULL,NULL),(23,'6industrial',NULL,NULL,NULL,NULL,NULL),(24,'6tenis',NULL,NULL,NULL,NULL,NULL),(25,'7cortaunas',NULL,NULL,NULL,NULL,NULL),(26,'7faja',NULL,NULL,NULL,NULL,NULL),(27,'7rodillera',NULL,NULL,NULL,NULL,NULL),(28,'7shampoo',NULL,NULL,NULL,NULL,NULL),(29,'8audifonos',NULL,NULL,NULL,NULL,NULL),(30,'8dron',NULL,NULL,NULL,NULL,NULL),(31,'8leds',NULL,NULL,NULL,NULL,NULL),(32,'8maus',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `imagenproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacionadministrador`
--

DROP TABLE IF EXISTS `notificacionadministrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacionadministrador` (
  `IdNotificacionAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcionistrador` varchar(500) DEFAULT NULL,
  `IdAdministrador` int(11) NOT NULL,
  PRIMARY KEY (`IdNotificacionAdministrador`),
  KEY `RefAdministrador83` (`IdAdministrador`),
  CONSTRAINT `RefAdministrador83` FOREIGN KEY (`IdAdministrador`) REFERENCES `administrador` (`IdAdministrador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacionadministrador`
--

LOCK TABLES `notificacionadministrador` WRITE;
/*!40000 ALTER TABLE `notificacionadministrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacionadministrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacionusuario`
--

DROP TABLE IF EXISTS `notificacionusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacionusuario` (
  `IdNotificacionUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(500) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IdNotificacionUsuario`),
  KEY `RefCliente112` (`IdUsuario`),
  CONSTRAINT `RefCliente112` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacionusuario`
--

LOCK TABLES `notificacionusuario` WRITE;
/*!40000 ALTER TABLE `notificacionusuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacionusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacionvendedor`
--

DROP TABLE IF EXISTS `notificacionvendedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacionvendedor` (
  `IdNotificacionVendedor` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(500) DEFAULT NULL,
  `IdVendedor` int(11) NOT NULL,
  PRIMARY KEY (`IdNotificacionVendedor`),
  KEY `RefVendedor111` (`IdVendedor`),
  CONSTRAINT `RefVendedor111` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacionvendedor`
--

LOCK TABLES `notificacionvendedor` WRITE;
/*!40000 ALTER TABLE `notificacionvendedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacionvendedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `IdPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `NombrePerfil` varchar(30) NOT NULL,
  PRIMARY KEY (`IdPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador'),(2,'Vendedor'),(3,'Cliente');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peso`
--

DROP TABLE IF EXISTS `peso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peso` (
  `IdPeso` int(11) NOT NULL AUTO_INCREMENT,
  `PrecioPeso` int(11) NOT NULL,
  `PesoMaxPeso` int(11) NOT NULL,
  PRIMARY KEY (`IdPeso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peso`
--

LOCK TABLES `peso` WRITE;
/*!40000 ALTER TABLE `peso` DISABLE KEYS */;
/*!40000 ALTER TABLE `peso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
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
  `IdImagenProducto` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  PRIMARY KEY (`IdProducto`),
  KEY `RefVendedor43` (`IdVendedor`),
  KEY `RefImagenProducto47` (`IdImagenProducto`),
  KEY `RefCategoria98` (`IdCategoria`),
  CONSTRAINT `RefCategoria98` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`),
  CONSTRAINT `RefImagenProducto47` FOREIGN KEY (`IdImagenProducto`) REFERENCES `imagenproducto` (`IdImagenProducto`),
  CONSTRAINT `RefVendedor43` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Anillo de Plata','Anillo para compromiso de plata',123,300,200,'100 gr',0,0,10,1,1,1),(2,'Correa','Correa de cuero para caballero',321,150,100,'50gr',0,0,5,1,2,1),(3,'Lentes','Lentes para sol',123,550,250,'100 gr',0,0,10,1,3,1),(4,'Percing','Percing para caballero',555,150,50,'50gr',0,0,10,1,4,1),(5,'Cable usb','Cable usb para celular',123,220,150,'100 gr',0,0,10,1,5,2),(6,'Mica','Mica para pantalla ',555,150,50,'50gr',0,0,10,1,6,2),(7,'Protector Transparente','Protector Transparente para celular',123,250,150,'100 gr',0,0,10,1,7,2),(8,'Protector para celular','Protector movil',555,250,200,'50gr',0,0,10,1,8,2),(9,'Camara','Camara Portatil deportiva',123,1550,1250,'100 gr',0,0,10,1,9,3),(10,'Navaja','Navaja',555,350,250,'50gr',0,0,10,1,10,3),(11,'Lampara deportiva','Lampara tipo minero',123,250,150,'100 gr',0,0,10,1,11,3),(12,'Luz Led','Luz led para sala',555,150,100,'50gr',0,0,10,1,12,3),(13,'Chamarra','Chamarra elegante',123,750,550,'100 gr',0,0,10,1,13,4),(14,'Mallon','Mallon deportivo para caballero',555,250,150,'50gr',0,0,10,1,14,4),(15,'Jeans','Jeans para caballero',123,550,350,'100 gr',0,0,10,1,15,4),(16,'Saco','Saco elegante para caballero',555,750,550,'50gr',0,0,10,1,16,4),(17,'Playera de vestir','Playera manga larga',123,350,250,'100 gr',0,0,10,1,17,5),(18,'Playera Polo','Playera tipo polo para caballero',555,250,150,'50gr',0,0,10,1,18,5),(19,'Playera deportiva','Playera deportiva',123,250,100,'100 gr',0,0,10,1,19,5),(20,'Sudadera','Sudadera con impresion para caballero',555,350,250,'50gr',0,0,10,1,20,5),(21,'Botas','Botas de vestir para caballero',123,650,500,'100 gr',0,0,10,1,21,6),(22,'Tenis Deportivos','Tenis para deporte para caballero',555,450,350,'50gr',0,0,10,1,22,6),(23,'Zapatos Industriales','Zapatos para trabajos industriales',123,550,500,'100 gr',0,0,10,1,23,6),(24,'Tenis Blancos','Tenis de vestis para caballero',555,550,450,'50gr',0,0,10,1,24,6),(25,'Cortauñas','Cortaulñas de acero inoxidable',123,100,50,'100 gr',0,0,10,1,25,7),(26,'Faja','Faja para evitar dolores de espalda',555,350,250,'50gr',0,0,10,1,26,7),(27,'Rodillera','Rodillera para cubrir leciones',123,550,250,'100 gr',0,0,10,1,27,7),(28,'Shampoo','Shampoo para caida de pelo',555,150,50,'50gr',0,0,10,1,28,7),(29,'Audifonos','Audifonos inalambricos',123,250,150,'100 gr',0,0,10,1,29,8),(30,'Dron','Dron con camara color blanco',555,1550,1050,'50gr',0,0,10,1,30,8),(31,'Luces Led','Luces del de colores',123,150,100,'100 gr',0,0,10,1,31,8),(32,'Mause','Mause inalambrico',555,150,50,'50gr',0,0,10,1,32,8);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicacion` (
  `IdPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `cantidadVendidaPublicacion` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdPublicacion`),
  KEY `RefProducto84` (`IdProducto`),
  CONSTRAINT `RefProducto84` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacion`
--

LOCK TABLES `publicacion` WRITE;
/*!40000 ALTER TABLE `publicacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(40) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contrasenia` varchar(30) NOT NULL,
  `IdPerfil` int(11) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `RefPerfil36` (`IdPerfil`),
  CONSTRAINT `RefPerfil36` FOREIGN KEY (`IdPerfil`) REFERENCES `perfil` (`IdPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Mario','Avila Hu','mavilah9@gmail.com','12345',3),(2,'Joseph','Paredes Rafful','joseph@gmail.com','123',3),(3,'Santos','Chac Cante','santos@gmail.com','123',3),(6,'German','Dzul Vera','german@gmail.com','123',3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valor`
--

DROP TABLE IF EXISTS `valor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valor` (
  `IdValor` int(11) NOT NULL AUTO_INCREMENT,
  `Valor` varchar(100) NOT NULL,
  `IdCaracteristicas` int(11) NOT NULL,
  PRIMARY KEY (`IdValor`),
  KEY `RefCaracteristicas116` (`IdCaracteristicas`),
  CONSTRAINT `RefCaracteristicas116` FOREIGN KEY (`IdCaracteristicas`) REFERENCES `caracteristicas` (`IdCaracteristicas`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valor`
--

LOCK TABLES `valor` WRITE;
/*!40000 ALTER TABLE `valor` DISABLE KEYS */;
INSERT INTO `valor` VALUES (1,'3.5',1),(2,'4',1),(3,'4.5',1),(4,'5',1),(5,'5.5',1),(6,'6',1),(7,'6.5',1),(8,'7',1),(9,'7.5',1),(10,'8',1),(11,'8.5',1),(12,'9',1),(13,'9.5',1),(14,'10',1);
/*!40000 ALTER TABLE `valor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedor`
--

DROP TABLE IF EXISTS `vendedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendedor` (
  `IdVendedor` int(11) NOT NULL AUTO_INCREMENT,
  `Empresa` varchar(500) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IdVendedor`),
  KEY `RefUsuario40` (`IdUsuario`),
  CONSTRAINT `RefUsuario40` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedor`
--

LOCK TABLES `vendedor` WRITE;
/*!40000 ALTER TABLE `vendedor` DISABLE KEYS */;
INSERT INTO `vendedor` VALUES (1,'UTM',1);
/*!40000 ALTER TABLE `vendedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `IdVenta` int(11) NOT NULL AUTO_INCREMENT,
  `StatusPago` int(11) NOT NULL,
  `ClaveTransaccion` int(11) NOT NULL,
  `Fecha` varchar(50) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` int(11) DEFAULT NULL,
  `DatosPaypal` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  PRIMARY KEY (`IdVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlist` (
  `IdWishlist` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IdWishlist`),
  KEY `RefProducto68` (`IdProducto`),
  KEY `RefUsuario69` (`IdUsuario`),
  CONSTRAINT `RefProducto68` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  CONSTRAINT `RefUsuario69` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-12 16:20:15
