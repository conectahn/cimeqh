-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cimeqh
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Table structure for table `tblconexiones`
--

DROP TABLE IF EXISTS `tblconexiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblconexiones` (
  `conexionId` int(11) NOT NULL AUTO_INCREMENT,
  `conexionDescripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`conexionId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblconexiones`
--

LOCK TABLES `tblconexiones` WRITE;
/*!40000 ALTER TABLE `tblconexiones` DISABLE KEYS */;
INSERT INTO `tblconexiones` VALUES (1,'Monofásico'),(2,'Trifásico');
/*!40000 ALTER TABLE `tblconexiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldepartamentos`
--

DROP TABLE IF EXISTS `tbldepartamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldepartamentos` (
  `departamentoId` int(11) NOT NULL,
  `departamentoDescripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`departamentoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldepartamentos`
--

LOCK TABLES `tbldepartamentos` WRITE;
/*!40000 ALTER TABLE `tbldepartamentos` DISABLE KEYS */;
INSERT INTO `tbldepartamentos` VALUES (1,'Francisco Morazan'),(2,'Islas de la Bahia'),(3,'Cortes'),(4,'Atlantida'),(5,'Yoro'),(6,'Colón'),(7,'Comayagua'),(8,'Valle'),(9,'Choluteca'),(10,'Olancho'),(11,'La Paz'),(12,'El Paraíso'),(13,'Ocotepeque'),(14,'Copán'),(15,'Santa Bárbara'),(16,'Intibucá'),(17,'Gracias a Dios'),(18,'Lempira');
/*!40000 ALTER TABLE `tbldepartamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldocumentosaprobacion`
--

DROP TABLE IF EXISTS `tbldocumentosaprobacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldocumentosaprobacion` (
  `documentosAprobacionId` int(11) NOT NULL AUTO_INCREMENT,
  `documentoDireccion` varchar(600) NOT NULL,
  `solicitudAprobacionId` int(11) NOT NULL,
  `documentoNombre` varchar(600) NOT NULL,
  PRIMARY KEY (`documentosAprobacionId`),
  KEY `solicitudAprobacionId_idx` (`solicitudAprobacionId`),
  KEY `fksolicitudAprobacionId_idx` (`solicitudAprobacionId`),
  CONSTRAINT `fksolicitudAprobacionId` FOREIGN KEY (`solicitudAprobacionId`) REFERENCES `tblsolicitudaprobacion` (`solicitudAprobacionId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldocumentosaprobacion`
--

LOCK TABLES `tbldocumentosaprobacion` WRITE;
/*!40000 ALTER TABLE `tbldocumentosaprobacion` DISABLE KEYS */;
INSERT INTO `tbldocumentosaprobacion` VALUES (64,'files/PROYECTO DIGITALIZACION APROBACION DE PLANOS EN ENEE (1)(1)(2).pdf',89,'PROYECTO DIGITALIZACION APROBACION DE PLANOS EN ENEE (1)(1)(2).pdf'),(65,'files/put_tris(1).pdf',90,'put_tris(1).pdf'),(66,'files/C.pdf',91,'C.pdf');
/*!40000 ALTER TABLE `tbldocumentosaprobacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldocumentosrecepcion`
--

DROP TABLE IF EXISTS `tbldocumentosrecepcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldocumentosrecepcion` (
  `documentoRecepcionId` int(11) NOT NULL AUTO_INCREMENT,
  `documentoRecepcionDireccion` varchar(600) NOT NULL,
  `solicitudRecepcionId` int(11) NOT NULL,
  `documentoNombre` varchar(600) NOT NULL,
  PRIMARY KEY (`documentoRecepcionId`),
  KEY `solicitudRecepcionId_idx` (`solicitudRecepcionId`),
  CONSTRAINT `solicitudRecepcionId` FOREIGN KEY (`solicitudRecepcionId`) REFERENCES `tblsolicitudrecepcion` (`solicitudRecepcioId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldocumentosrecepcion`
--

LOCK TABLES `tbldocumentosrecepcion` WRITE;
/*!40000 ALTER TABLE `tbldocumentosrecepcion` DISABLE KEYS */;
INSERT INTO `tbldocumentosrecepcion` VALUES (5,'files/PROYECTO DIGITALIZACION APROBACION DE PLANOS EN ENEE (1).pdf',4,'PROYECTO DIGITALIZACION APROBACION DE PLANOS EN ENEE (1).pdf'),(6,'files/put_tris.pdf',4,'put_tris.pdf'),(7,'files/put_tris(2).pdf',5,'put_tris(2).pdf'),(10,'files/put_tris(4).pdf',4,'put_tris(4).pdf'),(11,'files/PROYECTO DIGITALIZACION APROBACION DE PLANOS EN ENEE (1)(1)(4).pdf',4,'PROYECTO DIGITALIZACION APROBACION DE PLANOS EN ENEE (1)(1)(4).pdf'),(12,'files/put_tris(1)(1).pdf',6,'put_tris(1)(1).pdf'),(13,'files/put_tris(2).pdf',6,'put_tris(2).pdf'),(14,'files/put_tris(1)(2).pdf',7,'put_tris(1)(2).pdf');
/*!40000 ALTER TABLE `tbldocumentosrecepcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestadoaprobacion`
--

DROP TABLE IF EXISTS `tblestadoaprobacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblestadoaprobacion` (
  `estadoAprobacionId` int(11) NOT NULL AUTO_INCREMENT,
  `estadoAprobacionDescripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`estadoAprobacionId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestadoaprobacion`
--

LOCK TABLES `tblestadoaprobacion` WRITE;
/*!40000 ALTER TABLE `tblestadoaprobacion` DISABLE KEYS */;
INSERT INTO `tblestadoaprobacion` VALUES (1,'Aprobado CIMEQH'),(2,'Aprobado ENEE'),(3,'Rechazado'),(4,'En Revision');
/*!40000 ALTER TABLE `tblestadoaprobacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestadocuenta`
--

DROP TABLE IF EXISTS `tblestadocuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblestadocuenta` (
  `estadoCuentaId` int(11) NOT NULL AUTO_INCREMENT,
  `estadoCuentaDescripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`estadoCuentaId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestadocuenta`
--

LOCK TABLES `tblestadocuenta` WRITE;
/*!40000 ALTER TABLE `tblestadocuenta` DISABLE KEYS */;
INSERT INTO `tblestadocuenta` VALUES (1,'aprobado'),(2,'denegado'),(3,'suspendido'),(4,'En Revision');
/*!40000 ALTER TABLE `tblestadocuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestadodespeje`
--

DROP TABLE IF EXISTS `tblestadodespeje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblestadodespeje` (
  `estadoDespejeId` int(11) NOT NULL AUTO_INCREMENT,
  `estadoDespejeDescripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`estadoDespejeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestadodespeje`
--

LOCK TABLES `tblestadodespeje` WRITE;
/*!40000 ALTER TABLE `tblestadodespeje` DISABLE KEYS */;
INSERT INTO `tblestadodespeje` VALUES (1,'Aprobado CIMEQH'),(2,'Aprobado ENEE'),(3,'Rechazado'),(4,'En Revisión');
/*!40000 ALTER TABLE `tblestadodespeje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestadofactibilidad`
--

DROP TABLE IF EXISTS `tblestadofactibilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblestadofactibilidad` (
  `estadoFactibilidadId` int(11) NOT NULL AUTO_INCREMENT,
  `estadoFactibilidadDescripcion` varchar(120) NOT NULL,
  PRIMARY KEY (`estadoFactibilidadId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestadofactibilidad`
--

LOCK TABLES `tblestadofactibilidad` WRITE;
/*!40000 ALTER TABLE `tblestadofactibilidad` DISABLE KEYS */;
INSERT INTO `tblestadofactibilidad` VALUES (1,'Aprobado CIMEQH'),(2,'Aprobado ENEE'),(3,'Rechazado'),(4,'En Revision');
/*!40000 ALTER TABLE `tblestadofactibilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestadorecepcion`
--

DROP TABLE IF EXISTS `tblestadorecepcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblestadorecepcion` (
  `estadoRecepcionId` int(11) NOT NULL AUTO_INCREMENT,
  `estadoRecepcionDescripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`estadoRecepcionId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestadorecepcion`
--

LOCK TABLES `tblestadorecepcion` WRITE;
/*!40000 ALTER TABLE `tblestadorecepcion` DISABLE KEYS */;
INSERT INTO `tblestadorecepcion` VALUES (1,'Aprobado CIMEQH'),(2,'Aprobado ENEE'),(3,'Rechazado'),(4,'En Revision');
/*!40000 ALTER TABLE `tblestadorecepcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproyectos`
--

DROP TABLE IF EXISTS `tblproyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblproyectos` (
  `proyectoId` int(11) NOT NULL AUTO_INCREMENT,
  `proyectoNombrePropietario` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proyectoIdentidadPropietario` varchar(30) CHARACTER SET latin1 NOT NULL,
  `proyectoCelularPropietario` varchar(45) CHARACTER SET latin1 NOT NULL,
  `proyectoEmailPropietario` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proyectoDireccionPropietario` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proyectoTelefonoPropietario` varchar(45) CHARACTER SET latin1 NOT NULL,
  `departamentoId` int(11) NOT NULL,
  `proyectoDescrpcion` varchar(100) CHARACTER SET latin1 NOT NULL,
  `proyectoLatitud` float NOT NULL,
  `proyectoLongitud` float NOT NULL,
  `proyectoDireccion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `usuarioIdentidad` varchar(25) CHARACTER SET latin1 NOT NULL,
  `proyectoNombre` varchar(200) CHARACTER SET latin1 NOT NULL,
  `tipoId` int(11) NOT NULL,
  `regionProyecto` int(11) DEFAULT NULL,
  `zonaUtm` varchar(5) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  PRIMARY KEY (`proyectoId`),
  KEY `usuarioIdentidad_idx` (`usuarioIdentidad`),
  KEY `departamentoId_idx` (`departamentoId`),
  KEY `tipoProyectoId_idx` (`tipoId`),
  KEY `regionProyecto` (`regionProyecto`),
  CONSTRAINT `departamentoId` FOREIGN KEY (`departamentoId`) REFERENCES `tbldepartamentos` (`departamentoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proyectoRegion` FOREIGN KEY (`regionProyecto`) REFERENCES `tblregion` (`idRegion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipoId` FOREIGN KEY (`tipoId`) REFERENCES `tbltipoproyectos` (`tipoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarioIdentidad` FOREIGN KEY (`usuarioIdentidad`) REFERENCES `tblusuarios` (`usuarioIdentidad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproyectos`
--

LOCK TABLES `tblproyectos` WRITE;
/*!40000 ALTER TABLE `tblproyectos` DISABLE KEYS */;
INSERT INTO `tblproyectos` VALUES (7,'dfdf','0801199503315','96425295','luis@hotmail.com','dfdfdf','96425292',1,'cdccxc',67,88,'dfdfdfdf','0801-1995','CIMEQH',6,1,NULL,NULL),(8,'asasas','99525656330','4555','sdsdsd@ddsd.com','asasasas','545',1,'dsdsdsd',95,66,'sddddsd','0801-1995','EEH',5,3,NULL,NULL),(9,'Diana Reyes','0801199306645','5454','dfdfdfd@hotmail.es','dd','96425292',1,'sdsd',66,77,'sdsds','0801-1995','SANAA',6,6,NULL,NULL),(10,'Jose Manuel Lezama','0801199308528','99999999','melito@superrito.com','Hato del medio','22222222',1,'descripcion',85,958,'hato del medio','0801-1995','Comer',5,1,NULL,NULL),(11,'0','0255856854889','33333333','a@algo.com','Comayagüela','22222222',1,'0',474719,1557380,'0.000000','0801-1995','Conexion de lineas de alta tension',5,3,'16P',NULL),(12,'Jose Paulino','0255856854889','99998882','prueba@superrito.com','Comayagüela','22222222',10,'Se desarrollaran restauraciones al equipo de campo',474719,1557380,'Comayagüela','0801-1995','Conexion de lineas de alta tension',6,6,'16P','2017-07-19 00:00:00'),(13,'Luis Paz','0801199308222','98732132','prueba@superrito.com','Comayagüela','22222222',3,'Este trata de ver algo',474719,1557380,'Comayagüela','0801-1995','Reinstalacion',5,5,'16P','2017-07-19 11:06:44');
/*!40000 ALTER TABLE `tblproyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblregion`
--

DROP TABLE IF EXISTS `tblregion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblregion` (
  `idRegion` int(11) NOT NULL AUTO_INCREMENT,
  `regionDescripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idRegion`),
  KEY `region` (`idRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblregion`
--

LOCK TABLES `tblregion` WRITE;
/*!40000 ALTER TABLE `tblregion` DISABLE KEYS */;
INSERT INTO `tblregion` VALUES (1,'Distribución Tegucigalpa y alrededores'),(2,'Área Regional Centro Sur'),(3,'Distribución San Pedro Sula y alrededores'),(4,'Área Regional de Nor Occidente'),(5,'Distribución La Ceiba y alrededores'),(6,'Área Regional del Litoral Atlántico');
/*!40000 ALTER TABLE `tblregion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblroles`
--

DROP TABLE IF EXISTS `tblroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblroles` (
  `rolId` int(11) NOT NULL AUTO_INCREMENT,
  `rolDescripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`rolId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblroles`
--

LOCK TABLES `tblroles` WRITE;
/*!40000 ALTER TABLE `tblroles` DISABLE KEYS */;
INSERT INTO `tblroles` VALUES (1,'Cimeqh Administrador'),(2,'ENEE Administrador'),(3,'Cimeqh'),(4,'Ingeniero'),(5,'ENEE Supervisor'),(6,'ENEE Aprobacion'),(7,'Rechazado');
/*!40000 ALTER TABLE `tblroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsolicitudaprobacion`
--

DROP TABLE IF EXISTS `tblsolicitudaprobacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsolicitudaprobacion` (
  `solicitudAprobacionId` int(11) NOT NULL AUTO_INCREMENT,
  `solicitudAaprobacionMontoEstimado` float NOT NULL,
  `solicitudAprobacionCosto` float NOT NULL,
  `estadoSolicitudAprobacion` int(11) NOT NULL,
  `proyectoId` int(11) NOT NULL,
  `codigoAprobacion` varchar(150) DEFAULT NULL,
  `comentarioAprobacion` varchar(600) DEFAULT NULL,
  `solicitudAprobacionFecha` datetime DEFAULT NULL,
  `fechaRegistroSolicitud` datetime DEFAULT NULL,
  PRIMARY KEY (`solicitudAprobacionId`),
  KEY `fkProyectoId_idx` (`proyectoId`),
  KEY `estadoAprobacion_idx` (`estadoSolicitudAprobacion`),
  CONSTRAINT `estadoAprobacionId` FOREIGN KEY (`estadoSolicitudAprobacion`) REFERENCES `tblestadoaprobacion` (`estadoAprobacionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkProyectoId` FOREIGN KEY (`proyectoId`) REFERENCES `tblproyectos` (`proyectoId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsolicitudaprobacion`
--

LOCK TABLES `tblsolicitudaprobacion` WRITE;
/*!40000 ALTER TABLE `tblsolicitudaprobacion` DISABLE KEYS */;
INSERT INTO `tblsolicitudaprobacion` VALUES (89,800000,700,2,7,'a82dhxaq1moryjz12h','perfecto yes','2017-07-04 00:00:00',NULL),(90,777777,700,3,8,'a82dhxaq1horyk1s2i','mal','2017-07-04 00:00:00',NULL),(91,5244550,1960,2,10,'osl6fh2j','perfecto yes','2017-07-04 00:00:00',NULL);
/*!40000 ALTER TABLE `tblsolicitudaprobacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsolicituddespeje`
--

DROP TABLE IF EXISTS `tblsolicituddespeje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsolicituddespeje` (
  `solicitudDespejeId` int(11) NOT NULL AUTO_INCREMENT,
  `solicitudDespejeHoras` float NOT NULL,
  `solicitudDespejeCuadrillas` int(11) NOT NULL,
  `solicitudDespejeCantidadPersonal` int(11) NOT NULL,
  `solicitudDespejeFecha` datetime NOT NULL,
  `solicitudDespejeCosto` float DEFAULT '0',
  `tblsolicitudaprobacion_solicitudAprobacionId` int(11) NOT NULL,
  `estadoDespejeId` int(11) NOT NULL,
  `comentarioDespeje` varchar(600) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  PRIMARY KEY (`solicitudDespejeId`),
  KEY `fk_tblsolicituddespeje_tblsolicitudaprobacion1_idx` (`tblsolicitudaprobacion_solicitudAprobacionId`),
  KEY `estadoId_idx` (`estadoDespejeId`),
  CONSTRAINT `estadoId` FOREIGN KEY (`estadoDespejeId`) REFERENCES `tblestadodespeje` (`estadoDespejeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tblsolicituddespeje_tblsolicitudaprobacion1` FOREIGN KEY (`tblsolicitudaprobacion_solicitudAprobacionId`) REFERENCES `tblsolicitudaprobacion` (`solicitudAprobacionId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsolicituddespeje`
--

LOCK TABLES `tblsolicituddespeje` WRITE;
/*!40000 ALTER TABLE `tblsolicituddespeje` DISABLE KEYS */;
INSERT INTO `tblsolicituddespeje` VALUES (14,8,8,2,'2017-07-19 00:00:00',0,91,4,NULL,'2017-07-20 13:23:48');
/*!40000 ALTER TABLE `tblsolicituddespeje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsolicitudfactibilidad`
--

DROP TABLE IF EXISTS `tblsolicitudfactibilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsolicitudfactibilidad` (
  `solicitudFactibilidadId` int(11) NOT NULL AUTO_INCREMENT,
  `voltajeId` int(11) NOT NULL,
  `conexionId` int(11) NOT NULL,
  `solicitudFactibilidadPotencia` float NOT NULL,
  `solicitudadFactibilidadCrecimientoEsperado` float NOT NULL,
  `solicitudFactibilidadKva` float NOT NULL,
  `estadoFactibilidadId` int(11) NOT NULL,
  `proyectoId` int(11) NOT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `factibilidadDocumentoNombre` varchar(600) DEFAULT NULL,
  `factibilidadDocumentoDireccion` varchar(600) DEFAULT NULL,
  `fechaSolicitud` datetime DEFAULT NULL,
  PRIMARY KEY (`solicitudFactibilidadId`),
  KEY `proyectoId_idx` (`proyectoId`),
  KEY `voltajeId_idx` (`voltajeId`),
  KEY `conexionID_idx` (`conexionId`),
  KEY `estadoFactibilidadId_idx` (`estadoFactibilidadId`),
  CONSTRAINT `conexionID` FOREIGN KEY (`conexionId`) REFERENCES `tblconexiones` (`conexionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `estadoFactibilidadId` FOREIGN KEY (`estadoFactibilidadId`) REFERENCES `tblestadofactibilidad` (`estadoFactibilidadId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proyectoId` FOREIGN KEY (`proyectoId`) REFERENCES `tblproyectos` (`proyectoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `voltajeId` FOREIGN KEY (`voltajeId`) REFERENCES `tblvoltajes` (`voltajeId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsolicitudfactibilidad`
--

LOCK TABLES `tblsolicitudfactibilidad` WRITE;
/*!40000 ALTER TABLE `tblsolicitudfactibilidad` DISABLE KEYS */;
INSERT INTO `tblsolicitudfactibilidad` VALUES (10,1,2,800,22,11,4,7,'ok',NULL,NULL,NULL),(11,2,1,1231,42,52,1,10,'ok',NULL,NULL,NULL),(12,1,1,58,6,12,4,13,NULL,NULL,NULL,'2017-07-19 14:58:36'),(13,2,2,321,645,978,4,8,NULL,NULL,NULL,'2017-07-20 15:13:57'),(14,1,2,38.5,5,25,4,12,NULL,NULL,NULL,'2017-07-20 15:17:23'),(15,2,2,123,58,24,4,9,NULL,NULL,NULL,'2017-07-20 15:17:46'),(16,1,1,32,12,123,4,11,NULL,NULL,NULL,'2017-07-20 15:18:08');
/*!40000 ALTER TABLE `tblsolicitudfactibilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsolicitudrecepcion`
--

DROP TABLE IF EXISTS `tblsolicitudrecepcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsolicitudrecepcion` (
  `solicitudRecepcioId` int(11) NOT NULL AUTO_INCREMENT,
  `solicitudRecepcioEstado` int(11) NOT NULL,
  `solicitudAprobacionId` int(11) NOT NULL,
  `comentario` varchar(600) DEFAULT NULL,
  `fechaRegistroSolicitud` datetime DEFAULT NULL,
  PRIMARY KEY (`solicitudRecepcioId`),
  KEY `fk_tblSolicitudRecpcion_tblsolicitudaprobacion1_idx` (`solicitudAprobacionId`),
  KEY `estadoRecepcionId_idx` (`solicitudRecepcioEstado`),
  CONSTRAINT `estadoRecepcionId` FOREIGN KEY (`solicitudRecepcioEstado`) REFERENCES `tblestadorecepcion` (`estadoRecepcionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tblSolicitudRecpcion_tblsolicitudaprobacion1` FOREIGN KEY (`solicitudAprobacionId`) REFERENCES `tblsolicitudaprobacion` (`solicitudAprobacionId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsolicitudrecepcion`
--

LOCK TABLES `tblsolicitudrecepcion` WRITE;
/*!40000 ALTER TABLE `tblsolicitudrecepcion` DISABLE KEYS */;
INSERT INTO `tblsolicitudrecepcion` VALUES (4,1,89,'excelente Luis sigue asi',NULL),(5,3,90,'nel',NULL),(6,2,89,'ok',NULL),(7,1,89,'',NULL);
/*!40000 ALTER TABLE `tblsolicitudrecepcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltimbres`
--

DROP TABLE IF EXISTS `tbltimbres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltimbres` (
  `timbreId` int(11) NOT NULL AUTO_INCREMENT,
  `solicitudAprobacionId` int(11) NOT NULL,
  PRIMARY KEY (`timbreId`),
  KEY `solicitudAprobacionId_idx` (`solicitudAprobacionId`),
  CONSTRAINT `solicitudAprobacionId` FOREIGN KEY (`solicitudAprobacionId`) REFERENCES `tblsolicitudaprobacion` (`solicitudAprobacionId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltimbres`
--

LOCK TABLES `tbltimbres` WRITE;
/*!40000 ALTER TABLE `tbltimbres` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltimbres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltipoproyectos`
--

DROP TABLE IF EXISTS `tbltipoproyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltipoproyectos` (
  `tipoId` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDescrpcion` varchar(200) NOT NULL,
  PRIMARY KEY (`tipoId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltipoproyectos`
--

LOCK TABLES `tbltipoproyectos` WRITE;
/*!40000 ALTER TABLE `tbltipoproyectos` DISABLE KEYS */;
INSERT INTO `tbltipoproyectos` VALUES (5,'Particular'),(6,'Urbanización');
/*!40000 ALTER TABLE `tbltipoproyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusuarios`
--

DROP TABLE IF EXISTS `tblusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblusuarios` (
  `usuarioIdentidad` varchar(25) NOT NULL,
  `usuarioPrimerNombre` varchar(45) NOT NULL,
  `usuarioSegundoNombre` varchar(45) NOT NULL,
  `usuarioPrimerApellido` varchar(45) NOT NULL,
  `usuarioSegundoApellido` varchar(45) NOT NULL,
  `usuarioNumeroColegiacion` varchar(45) NOT NULL,
  `usuarioCelular` varchar(45) NOT NULL,
  `usuarioTelefono` varchar(45) NOT NULL,
  `usuarioDireccion` varchar(45) NOT NULL,
  `usuarioContrasenia` varchar(45) NOT NULL,
  `estadoCuentaId` int(11) NOT NULL,
  `rolId` int(11) NOT NULL,
  `usuarioCorreo` varchar(100) NOT NULL,
  `usuarioFechaIngreso` int(11) NOT NULL,
  `usuarioComentario` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `usuarioMora` float DEFAULT NULL,
  `usuarioToken` varchar(100) DEFAULT NULL,
  `usuarioRegion` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuarioIdentidad`),
  KEY `rolId_idx` (`rolId`),
  KEY `estadoCuentaId_idx` (`estadoCuentaId`),
  KEY `usuarioRegion` (`usuarioRegion`),
  CONSTRAINT `estadoCuentaId` FOREIGN KEY (`estadoCuentaId`) REFERENCES `tblestadocuenta` (`estadoCuentaId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `regionUsuario` FOREIGN KEY (`usuarioRegion`) REFERENCES `tblregion` (`idRegion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rolId` FOREIGN KEY (`rolId`) REFERENCES `tblroles` (`rolId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` VALUES ('0801-1995','Jose','Carlos','Medina ','Fernandez','132','9916-1420','22456875','tiloarque','e3d718f8a5bb6e555cf341c66395f201',1,4,'prueba@superrito.com',1498682657,'',0,NULL,NULL),('0801199308222','Juan','Carlos','Izaguirre ','Lopez','1212132123','9642-3311','2245-6875','Mexico City','f49bf7b34270784b2ac3d7d2949cc3d9',1,3,'prueba@superrito.com',1498258339,NULL,NULL,'',1),('0801199503314','Luis','Eduardo','Paz','Reyes','21548164','96425292','22308090','Portal del Bosque','76b98197d40a35db050f88c51c18c157',1,3,'prueba@superrito.com',1498148000,'asddsas',0,NULL,6),('0801200003221','Luis','Fernando','Paz','Reyes','445454','84545454','54545854','dsdsds','2063278b6068554c955918b841b1091b',1,4,'prueba@superrito.com',1498256640,'csawe',0,NULL,NULL),('1111111111111','Hades','Poseidon','Neptuno','Ravana','525','99999999','22222222','Olimpo asgardiano 3 planeta','442443c17c35942d3b1113972231be1f',1,5,'prueba@superrito.com',1499272677,NULL,NULL,NULL,1),('3333333333333','asdas','Luis','xyz','Lopez','786','99668888','','kjklji','0eb7df1de72244c53fdd9f820a3ab871',1,6,'prueba@superrito.com',1499273157,NULL,NULL,'2iosqe440',3),('5555555555555','Zeus','felipe','argueta','suarez','55555','96425292','22308090','olimpo','9952409ed8b7868c338e05c58960b14d',1,5,'prueba@superrito.com',1500414160,NULL,NULL,NULL,6),('8552255494654','Vulcan','Mercurio','Nox','Ravana','123','89898898','46546545','Marte ','48d0f83b059cb7fa1795028138f4147e',1,2,'prueba@superrito.com',1500414142,NULL,NULL,NULL,NULL),('8888888888855','Ash','Brock','Misty','Ketchum','6542','65446564','65464546','Pueblo Paleta','d279787166f350ab2eb5ff69586505a2',1,3,'prueba@superrito.com',1500414061,NULL,NULL,NULL,3),('cimeqh','Jose','Alexandre','Gutember','Fernandez','654','88888888','11111111','vivo bajo el puente y vos?','a593c018727025bf395012914ebbb6e1',1,1,'prueba@superrito.com',1500413750,NULL,NULL,NULL,NULL),('enee','Zeeus','Poseidon','Ravana','Kukulkan','321','8856-9632','224-5689','Olimpo tercera casa del Zodiaco','3ab5d8ffbae1ff8d5ac01d9cce5eebf7',1,6,'prueba@superrito.com',1498754099,'',123132000,NULL,6),('enee2','Laronny','Alexandra','Velazquez','Palma','8972','56566546','32321132','Villa Olimpica','f49bfdf407508ac02bdab87c6cf8b049',1,6,'prueba@superrito.com',1500413996,NULL,NULL,NULL,1),('enee3','Neptuno','Carlos','Poseidon','Lopez','13216521','99789788','65464546','Atlantida','e2d981cc4a9db1bff3d9d058cb666891',1,5,'prueba@superrito.com',1500414458,NULL,NULL,NULL,3),('jose','Jose','Manuel','Lezama','Melito','465','99999999','22222222','ok google','b5ed8fce79005b6818fade8b814af5d0',1,4,'prueba@superrito.com',1499273055,NULL,NULL,'',NULL);
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblvoltajes`
--

DROP TABLE IF EXISTS `tblvoltajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblvoltajes` (
  `voltajeId` int(11) NOT NULL AUTO_INCREMENT,
  `voltajeDescripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`voltajeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblvoltajes`
--

LOCK TABLES `tblvoltajes` WRITE;
/*!40000 ALTER TABLE `tblvoltajes` DISABLE KEYS */;
INSERT INTO `tblvoltajes` VALUES (1,'13.4 KV'),(2,'34.5 KV');
/*!40000 ALTER TABLE `tblvoltajes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-20 16:02:54
