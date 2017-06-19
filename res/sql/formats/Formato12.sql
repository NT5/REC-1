-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.11 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla formato_12_danielsantos.carreras
CREATE TABLE IF NOT EXISTS `carreras` (
  `Carrera_id` int(15) NOT NULL AUTO_INCREMENT,
  `Nombre_Carrera` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Carrera_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla formato_12_danielsantos.formato_12
CREATE TABLE IF NOT EXISTS `formato_12` (
  `Record_id` int(15) NOT NULL,
  `Peds_id` int(15) NOT NULL,
  `Anio_lec` int(15) NOT NULL,
  `Anio_carrera` int(15) NOT NULL,
  `Trimestre` int(15) NOT NULL,
  `Carrera_id` int(15) NOT NULL,
  `Turno_id` int(15) NOT NULL,
  `M_r_rural_id` int(15) NOT NULL,
  `M_r_urbano_id` int(15) NOT NULL,
  `V_r_rural_id` int(15) NOT NULL,
  `V_r_urbano_id` int(15) NOT NULL,
  PRIMARY KEY (`Record_id`),
  KEY `FK_formato_12_carreras` (`Carrera_id`),
  KEY `FK_formato_12_peds` (`Peds_id`),
  KEY `FK_formato_12_turnos` (`Turno_id`),
  KEY `FK_formato_12_m_rural` (`M_r_rural_id`),
  KEY `FK_formato_12_m_urbano` (`M_r_urbano_id`),
  KEY `FK_formato_12_v_rural` (`V_r_rural_id`),
  KEY `FK_formato_12_v_urbano` (`V_r_urbano_id`),
  CONSTRAINT `FK_formato_12_carreras` FOREIGN KEY (`Carrera_id`) REFERENCES `carreras` (`Carrera_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_formato_12_m_rural` FOREIGN KEY (`M_r_rural_id`) REFERENCES `m_rural` (`M_r_rural_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_formato_12_m_urbano` FOREIGN KEY (`M_r_urbano_id`) REFERENCES `m_urbano` (`M_r_urbano_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_formato_12_peds` FOREIGN KEY (`Peds_id`) REFERENCES `peds` (`Peds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_formato_12_turnos` FOREIGN KEY (`Turno_id`) REFERENCES `turnos` (`Turno_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_formato_12_v_rural` FOREIGN KEY (`V_r_rural_id`) REFERENCES `v_rural` (`V_r_rural_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_formato_12_v_urbano` FOREIGN KEY (`V_r_urbano_id`) REFERENCES `v_urbano` (`V_r_urbano_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla formato_12_danielsantos.m_rural
CREATE TABLE IF NOT EXISTS `m_rural` (
  `M_r_rural_id` int(15) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`M_r_rural_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla formato_12_danielsantos.m_urbano
CREATE TABLE IF NOT EXISTS `m_urbano` (
  `M_r_urbano_id` int(15) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`M_r_urbano_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla formato_12_danielsantos.peds
CREATE TABLE IF NOT EXISTS `peds` (
  `Peds_id` int(15) NOT NULL AUTO_INCREMENT,
  `Nombre_peds` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Peds_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla formato_12_danielsantos.turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `Turno_id` int(15) NOT NULL AUTO_INCREMENT,
  `Nombre_turno` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Turno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla formato_12_danielsantos.v_rural
CREATE TABLE IF NOT EXISTS `v_rural` (
  `V_r_rural_id` int(15) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`V_r_rural_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla formato_12_danielsantos.v_urbano
CREATE TABLE IF NOT EXISTS `v_urbano` (
  `V_r_urbano_id` int(15) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`V_r_urbano_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;