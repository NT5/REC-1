
CREATE TABLE IF NOT EXISTS `formato_14_chamorro` (
  `reg_id` int(15) NOT NULL AUTO_INCREMENT,
  `ped_id` int(15) NOT NULL,
  `carrera_id` int(15) NOT NULL,
  `anio_lectivo` int(15) NOT NULL,
  `reti_mujeres_id` int(15) NOT NULL,
  `reti_hombres_id` int(15) NOT NULL,
  `egre_mujeres_id` int(15) NOT NULL,
  `egre_hombres_id` int(15) NOT NULL,
  `turno_id` int(15) NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `FK_formato_14_chamorro_carreras` (`carrera_id`),
  KEY `FK_formato_14_chamorro_peds` (`ped_id`),
  KEY `FK_formato_14_chamorro_turnos` (`turno_id`),
  CONSTRAINT `FK_formato_14_chamorro_carreras` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`Carrera_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_formato_14_chamorro_peds` FOREIGN KEY (`ped_id`) REFERENCES `peds` (`Ped_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_formato_14_chamorro_turnos` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`Turno_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
