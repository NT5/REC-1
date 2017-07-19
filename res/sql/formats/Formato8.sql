CREATE TABLE IF NOT EXISTS `Formato_8` (
  `Record_Id` int(15) NOT NULL AUTO_INCREMENT,
  `Ped_Id` int(15) NOT NULL,
  `Anio_Lectivo` int(15) NOT NULL,
  `Trimestre` int(15) NOT NULL,
  `Carrera_Id` int(15) NOT NULL,
  `Turno_Id` int(15) NOT NULL,
  `Anio_Carrera` int(15) NOT NULL,
  `Menos_25` int(15) NOT NULL,
  `De_25_30` int(15) NOT NULL,
  `De_31_40` int(15) NOT NULL,
  `De_40_Mas` int(15) NOT NULL,
  PRIMARY KEY (`Record_Id`),
  FOREIGN KEY (`Ped_Id`) REFERENCES `Peds` (`Ped_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Carrera_Id`) REFERENCES `Carreras` (`Carrera_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Turno_Id`) REFERENCES `Turnos` (`Turno_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);