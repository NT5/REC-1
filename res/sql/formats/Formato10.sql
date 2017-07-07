CREATE TABLE IF NOT EXISTS `Formato_10` (
  `Record_id` int(15) NOT NULL AUTO_INCREMENT,
  `Ped_Id` int(15) NOT NULL,
  `Anio` int(15) NOT NULL,
  `Trimestre` int(15) NOT NULL,
  `Carrera_Id` int(15) NOT NULL,
  `Turno_id` int(15) NOT NULL,
  `Anio_Lectivo` int(11) NOT NULL,
  `ml_v` int(5) NOT NULL,
  `mf_v` int(5) NOT NULL,
  `ml_m` int(5) NOT NULL,
  `mf_m` int(5) NOT NULL,
  PRIMARY KEY (`Record_id`),
  FOREIGN KEY (`Carrera_id`) REFERENCES `Carreras` (`Carrera_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Ped_Id`) REFERENCES `Peds` (`Ped_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Turno_id`) REFERENCES `Turnos` (`Turno_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);