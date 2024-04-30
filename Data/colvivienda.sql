-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: colviviendas
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
-- Current Database: `colviviendas`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `colviviendas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `colviviendas`;

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
INSERT INTO `arriendo_propiedad` VALUES ('2361','1920390292','5176','2023-02-15','2024-03-14',13,34000000,'A5'),('5173','1015189022','6131','2020-07-16','2024-07-10',43,87000000,'A2'),('8137','1920390292','6326','2022-07-21','2024-01-30',19,46000000,'A2'),('8191','1025652106','9327','2021-07-15','2024-03-21',27,150000000,'A2'),('8266','6712678361','1632','2022-02-17','2024-04-03',27,45000000,'A2');
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
INSERT INTO `barrio` VALUES ('BC','Chapinero'),('BP','Barrio Alto Prado'),('BU','Usaquén'),('CG','Barrio Granada'),('CT','Getsemaní'),('ME','Usaquén'),('ML',' Laureles'),('MP','El Poblado');
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
INSERT INTO `cita` VALUES ('1839','2024-01-17','11:30:42.00000','192018172','6712678361','1632','67'),('3476','2024-02-27','18:45:45.00000','1025652106','1015189022','6131','69'),('5632','2024-02-28','11:37:49.00000','1920390292','6712678361','9327','71'),('7494','2024-05-07','21:25:19.00000','192018172','6712678361','5176','67'),('9574','2023-12-21','08:04:56.00000','1025652106','6712678361','6326','68');
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
INSERT INTO `ciudad` VALUES ('01','Medellin'),('02','Bogota'),('03','Cali'),('04','Barranquilla'),('05','Cartagena');
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
INSERT INTO `destinacion` VALUES ('13','Residencial'),('14','Residencial'),('15','Mixta'),('16','Recreativo'),('17','Vacacional');
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
INSERT INTO `estado` VALUES ('E1','Disponible'),('E2','Vendido'),('E3','Alquilado'),('E4','En proceso de venta'),('E5','En proceso de construcción'),('E6','Requiere reparaciones'),('E7','Bajo contrato');
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
INSERT INTO `estado_arriendo` VALUES ('A1','Disponible para arriendo'),('A2','Arrendado'),('A3','En proceso de arriendo'),('A4','Arrendamiento renovado'),('A5','Arrendamiento renovado');
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
INSERT INTO `metodo_pago` VALUES ('M1','Transferencia bancaria'),('M2','Pago en efectivo'),('M3','Cheque'),('M4','Tarjeta de crédito/débito'),('M5','Transferencia electrónica de fondos (TEF)');
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
INSERT INTO `modelo` VALUES ('2P','casa de dos pisos estilo moderno'),('C1','casa antigua'),('CC','Casa Colonial'),('CE','Casa Contemporánea'),('CT','Casa Contemporánea'),('CV','Casa Victoriana');
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
INSERT INTO `motivo_cita` VALUES ('67','Hola, estoy interesado en una casa que vi anunciada en su página web en el Barrio El Poblado en Medellín. ¿Podría programar una visita para esta seman'),('68','Buenos días, estamos buscando un apartamento para alquilar en el Barrio Chapinero en Bogotá. ¿Sería posible visitar el apartamento que tienen disponib'),('69','Hola, he decidido comprar el local comercial en el Barrio Usaquén. ¿Podríamos programar una cita para firmar el contrato de compraventa y realizar la '),('70','Hola, estoy interesado en alquilar el apartamento en Laureles. ¿Podríamos reunirnos para discutir los términos del contrato de arrendamiento?'),('71','Hola, estamos considerando invertir en una propiedad en Envigado y nos gustaría recibir asesoramiento personalizado.');
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
  `foto` varchar(150) NOT NULL,
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
INSERT INTO `propiedad` VALUES ('1632','Carrera 33 # 10-75','http://localhost/colviviendas/imgs/casas/casa.jpg','E4','192018172','M1','01','ME',570000000,'2P','2020-04-02','CO',12,'13'),('5176','Carrera 50 # 80-30','http://localhost/colviviendas/imgs/casas/casa2.jpg','E4','1015189022','M5','03','CT',619000000,'CT','2022-03-01','CO',24,'14'),('6131','Calle de las Damas # 10-15','http://localhost/colviviendas/imgs/casas/casa3.jpg','E5','1025652106','M2','05','CG',815000000,'CV','2022-06-30','PT',15,'17'),('6326','Calle 62 # 15-35','http://localhost/colviviendas/imgs/casas/casa4.jpg','E1','192726117','M2','02','BP',1140000000,'CC','2023-12-28','PI',34,'13'),('9327','Avenida 4 Norte # 23-45,','http://localhost/colviviendas/imgs/casas/casa5.jpg','E6','1920390292','M4','04','ME',489000000,'CT','2023-02-28','PU',26,'16');
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
INSERT INTO `tipo_propiedad` VALUES ('CO','Condominios'),('PC','Propiedad Compartida'),('PI','Propiedad Individual'),('PT','Terrenos'),('PU','Propiedad unifamiliar');
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
INSERT INTO `venta` VALUES ('350637','1920390292','2019-03-24'),('351364','192018172','2020-06-18'),('354235','192726117','2022-07-13'),('356479','1015189022','2022-12-30'),('359495','1025652106','2023-05-23');
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
INSERT INTO `venta_propiedad` VALUES ('350637','5176','2024-02-15',560000000),('351364','1632','2024-04-25',390000000),('354235','6131','2023-11-22',689000000),('356479','6326','2024-03-20',478000000),('359495','9327','2023-08-15',560000000);
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

-- Dump completed on 2024-04-29 12:54:16
