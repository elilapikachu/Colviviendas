-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: tumama
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `tumama`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `tumama` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `tumama`;

--
-- Table structure for table `arriendo_propiedad`
--

DROP TABLE IF EXISTS `arriendo_propiedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arriendo_propiedad` (
  `nro_arriendo` varchar(10) NOT NULL,
  `alquilino` varchar(20) NOT NULL,
  `propiedad` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `meses` int(100) NOT NULL,
  `precio_meses` bigint(249) NOT NULL,
  `estado_arriendo` varchar(2) NOT NULL,
  PRIMARY KEY (`nro_arriendo`),
  KEY `estado_arriendo` (`estado_arriendo`),
  KEY `propiedad` (`propiedad`),
  KEY `alquilino` (`alquilino`),
  CONSTRAINT `arriendo_propiedad_ibfk_1` FOREIGN KEY (`estado_arriendo`) REFERENCES `estado_arriendo` (`codigo_estado`),
  CONSTRAINT `arriendo_propiedad_ibfk_2` FOREIGN KEY (`propiedad`) REFERENCES `propiedad` (`codigo_propiedad`),
  CONSTRAINT `arriendo_propiedad_ibfk_3` FOREIGN KEY (`alquilino`) REFERENCES `persona` (`identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arriendo_propiedad`
--

LOCK TABLES `arriendo_propiedad` WRITE;
/*!40000 ALTER TABLE `arriendo_propiedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `arriendo_propiedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barrio`
--

DROP TABLE IF EXISTS `barrio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barrio` (
  `codigo_barrio` varchar(2) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`codigo_barrio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barrio`
--

LOCK TABLES `barrio` WRITE;
/*!40000 ALTER TABLE `barrio` DISABLE KEYS */;
/*!40000 ALTER TABLE `barrio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cita`
--

DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita` (
  `nro_cita` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(5) NOT NULL,
  `visitante` varchar(20) NOT NULL,
  `anfitrion` varchar(20) NOT NULL,
  `propiedad` varchar(20) NOT NULL,
  `motivo_visita` varchar(2) NOT NULL,
  PRIMARY KEY (`nro_cita`),
  KEY `motivo_visita` (`motivo_visita`),
  KEY `propiedad` (`propiedad`),
  KEY `anfitrion` (`anfitrion`),
  KEY `visitante` (`visitante`),
  CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`motivo_visita`) REFERENCES `motivo_cita` (`codigo_motivo`),
  CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`propiedad`) REFERENCES `propiedad` (`codigo_propiedad`),
  CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`anfitrion`) REFERENCES `persona` (`identificacion`),
  CONSTRAINT `cita_ibfk_4` FOREIGN KEY (`visitante`) REFERENCES `persona` (`identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `codigo_ciudad` varchar(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES ('01','Medellin'),('02','Bogota'),('03','Cali');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinacion`
--

DROP TABLE IF EXISTS `destinacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinacion` (
  `codigo_destinacion` varchar(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_destinacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinacion`
--

LOCK TABLES `destinacion` WRITE;
/*!40000 ALTER TABLE `destinacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `destinacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `codigo_estado` varchar(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_arriendo`
--

DROP TABLE IF EXISTS `estado_arriendo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_arriendo` (
  `codigo_estado` varchar(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_arriendo`
--

LOCK TABLES `estado_arriendo` WRITE;
/*!40000 ALTER TABLE `estado_arriendo` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_arriendo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodo_pago`
--

DROP TABLE IF EXISTS `metodo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metodo_pago` (
  `codigo_metodo` varchar(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_metodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodo_pago`
--

LOCK TABLES `metodo_pago` WRITE;
/*!40000 ALTER TABLE `metodo_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `metodo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `codigo_modelo` varchar(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motivo_cita`
--

DROP TABLE IF EXISTS `motivo_cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motivo_cita` (
  `codigo_motivo` varchar(2) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`codigo_motivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motivo_cita`
--

LOCK TABLES `motivo_cita` WRITE;
/*!40000 ALTER TABLE `motivo_cita` DISABLE KEYS */;
/*!40000 ALTER TABLE `motivo_cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `identificacion` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` bigint(15) NOT NULL,
  `ciudad` varchar(2) NOT NULL,
  `fecha_registro` datetime(5) NOT NULL,
  `tipo_persona` varchar(2) NOT NULL,
  `contrasena` varchar(8) NOT NULL,
  `correo` varchar(50) NOT NULL,
  PRIMARY KEY (`identificacion`),
  KEY `ciudad` (`ciudad`),
  KEY `tipo_persona` (`tipo_persona`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`codigo_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`tipo_persona`) REFERENCES `tipo_persona` (`codigo_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES ('1015189022','papitas con','guacamoles volador','crr 30 #32-20 interior 726',315606923,'03','2023-03-05 14:21:03.00000','02','volooo','ricaspapitas@gmail.com'),('1025652106','Mocho','campos veloz','cr 20 40-78 interior 809',1829183923,'02','2024-03-05 14:21:03.00000','01','123456','soyelmachopapitorico@gmail.com'),('192018172','Yanoshe quehacesh','camperas palacios ','cr20 #34-76 interior 760',2103186923,'03','2023-01-18 14:10:47.77300','04','516181','yanosequehacer@gmail.com'),('1920390292','Luli','Paredes negro','cr 80 96-34 interior 807',193898128,'03','2024-01-02 14:47:33.00000','04','1674ns','elmejordetodosprross@gmail.com'),('192726117','agustin','apprieta sta','cr 90 #40-45 interior 906',1227389321,'01','2024-06-02 09:47:33.00000','03','17167','barrenderodecasas300@gmail.com'),('6712678361','aquino commes','ricko limon','cr 56 #76-89 interior 536',1929117723,'02','2019-05-15 09:20:08.04600','04','arrozcon','restaurantesantamaria@gmail.com');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propiedad`
--

DROP TABLE IF EXISTS `propiedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propiedad` (
  `codigo_propiedad` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `propietario` varchar(20) NOT NULL,
  `metodo_pago` varchar(2) NOT NULL,
  `ciudad` varchar(2) NOT NULL,
  `barrio` varchar(2) NOT NULL,
  `precio` bigint(249) NOT NULL,
  `modelo` varchar(2) NOT NULL,
  `fecha_registro` date NOT NULL,
  `tipo_propiedad` varchar(2) NOT NULL,
  `edad` int(3) NOT NULL,
  `destinacion` varchar(2) NOT NULL,
  PRIMARY KEY (`codigo_propiedad`),
  KEY `ciudad` (`ciudad`),
  KEY `barrio` (`barrio`),
  KEY `propietario` (`propietario`),
  KEY `tipo_propiedad` (`tipo_propiedad`),
  KEY `metodo_pago` (`metodo_pago`),
  KEY `estado` (`estado`),
  KEY `modelo` (`modelo`),
  KEY `destinacion` (`destinacion`),
  CONSTRAINT `propiedad_ibfk_1` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`codigo_ciudad`),
  CONSTRAINT `propiedad_ibfk_2` FOREIGN KEY (`barrio`) REFERENCES `barrio` (`codigo_barrio`),
  CONSTRAINT `propiedad_ibfk_3` FOREIGN KEY (`propietario`) REFERENCES `persona` (`identificacion`),
  CONSTRAINT `propiedad_ibfk_4` FOREIGN KEY (`tipo_propiedad`) REFERENCES `tipo_propiedad` (`codigo_tipo`),
  CONSTRAINT `propiedad_ibfk_5` FOREIGN KEY (`metodo_pago`) REFERENCES `metodo_pago` (`codigo_metodo`),
  CONSTRAINT `propiedad_ibfk_6` FOREIGN KEY (`estado`) REFERENCES `estado` (`codigo_estado`),
  CONSTRAINT `propiedad_ibfk_7` FOREIGN KEY (`modelo`) REFERENCES `modelo` (`codigo_modelo`),
  CONSTRAINT `propiedad_ibfk_8` FOREIGN KEY (`destinacion`) REFERENCES `destinacion` (`codigo_destinacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propiedad`
--

LOCK TABLES `propiedad` WRITE;
/*!40000 ALTER TABLE `propiedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `propiedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_persona`
--

DROP TABLE IF EXISTS `tipo_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_persona` (
  `codigo_tipo` varchar(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_persona`
--

LOCK TABLES `tipo_persona` WRITE;
/*!40000 ALTER TABLE `tipo_persona` DISABLE KEYS */;
INSERT INTO `tipo_persona` VALUES ('01','Vendedor'),('02','comprador'),('03','Admin'),('04','Usuario y vendedor');
/*!40000 ALTER TABLE `tipo_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_propiedad`
--

DROP TABLE IF EXISTS `tipo_propiedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_propiedad` (
  `codigo_tipo` varchar(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_propiedad`
--

LOCK TABLES `tipo_propiedad` WRITE;
/*!40000 ALTER TABLE `tipo_propiedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_propiedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `nro_venta` varchar(10) NOT NULL,
  `comprador` varchar(20) NOT NULL,
  `fecha_compra` date NOT NULL,
  PRIMARY KEY (`nro_venta`),
  KEY `comprador` (`comprador`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`comprador`) REFERENCES `persona` (`identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_propiedad`
--

DROP TABLE IF EXISTS `venta_propiedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta_propiedad` (
  `nro_venta` varchar(10) NOT NULL,
  `codigo_propiedad` varchar(20) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `precio_final` int(249) NOT NULL,
  PRIMARY KEY (`nro_venta`,`codigo_propiedad`),
  KEY `codigo_propiedad` (`codigo_propiedad`),
  CONSTRAINT `venta_propiedad_ibfk_1` FOREIGN KEY (`nro_venta`) REFERENCES `venta` (`nro_venta`),
  CONSTRAINT `venta_propiedad_ibfk_2` FOREIGN KEY (`codigo_propiedad`) REFERENCES `propiedad` (`codigo_propiedad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_propiedad`
--

LOCK TABLES `venta_propiedad` WRITE;
/*!40000 ALTER TABLE `venta_propiedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta_propiedad` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-20 15:32:46
