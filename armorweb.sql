# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : armorweb


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `armorweb`;

CREATE DATABASE `armorweb`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `armorweb`;

#
# Structure for the `estado` table : 
#

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(150) DEFAULT NULL,
  `estado_color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `grado_persona` table : 
#

CREATE TABLE `grado_persona` (
  `grado_id` int(11) NOT NULL AUTO_INCREMENT,
  `grado_descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`grado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `tipo_persona` table : 
#

CREATE TABLE `tipo_persona` (
  `tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `persona` table : 
#

CREATE TABLE `persona` (
  `persona_id` int(11) NOT NULL AUTO_INCREMENT,
  `grado_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `persona_nombre` varchar(150) DEFAULT NULL,
  `persona_apellido` varchar(150) DEFAULT NULL,
  `persona_ci` varchar(10) DEFAULT NULL,
  `persona_telefono` varchar(50) DEFAULT NULL,
  `persona_celular` varchar(50) DEFAULT NULL,
  `persona_direccion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`persona_id`),
  KEY `fk_puede_ser` (`tipo_id`),
  KEY `fk_tiene_grado` (`grado_id`),
  KEY `fk_tiene_un` (`estado_id`),
  CONSTRAINT `fk_puede_ser` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_persona` (`tipo_id`),
  CONSTRAINT `fk_tiene_grado` FOREIGN KEY (`grado_id`) REFERENCES `grado_persona` (`grado_id`),
  CONSTRAINT `fk_tiene_un` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `tipo_arma` table : 
#

CREATE TABLE `tipo_arma` (
  `tipoarma_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoarma_descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`tipoarma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(50) DEFAULT NULL,
  `usuario_login` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `arma` table : 
#

CREATE TABLE `arma` (
  `arma_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoarma_id` int(11) DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `arma_numorden` varchar(10) DEFAULT NULL,
  `arma_codigo` varchar(50) DEFAULT NULL,
  `arma_fechaingreso` date DEFAULT NULL,
  `arma_horaingreso` time DEFAULT NULL,
  `arma_procedencia` varchar(150) DEFAULT NULL,
  `arma_marca` varchar(150) DEFAULT NULL,
  `arma_calibre` varchar(10) DEFAULT NULL,
  `arma_aniodotacion` varchar(10) DEFAULT NULL,
  `arma_lugardotacion` varchar(250) DEFAULT NULL,
  `arma_novedades` varchar(250) DEFAULT NULL,
  `arma_responsable` varchar(250) DEFAULT NULL,
  `arma_foto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`arma_id`),
  KEY `fk_clasifica` (`tipoarma_id`),
  KEY `fk_ingresa` (`usuario_id`),
  KEY `fk_se_asigna` (`persona_id`),
  KEY `fk_tiene` (`estado_id`),
  CONSTRAINT `fk_clasifica` FOREIGN KEY (`tipoarma_id`) REFERENCES `tipo_arma` (`tipoarma_id`),
  CONSTRAINT `fk_ingresa` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  CONSTRAINT `fk_se_asigna` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`),
  CONSTRAINT `fk_tiene` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `registro` table : 
#

CREATE TABLE `registro` (
  `registro_id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) DEFAULT NULL,
  `arma_id` int(11) DEFAULT NULL,
  `registro_fechasalida` date DEFAULT NULL,
  `registro_horasalida` time DEFAULT NULL,
  `registro_fechaingreso` date DEFAULT NULL,
  `registro_horaingreso` time DEFAULT NULL,
  `registro_observacion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`registro_id`),
  KEY `fk_genera` (`arma_id`),
  KEY `fk_realiza` (`persona_id`),
  CONSTRAINT `fk_genera` FOREIGN KEY (`arma_id`) REFERENCES `arma` (`arma_id`),
  CONSTRAINT `fk_realiza` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`persona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;