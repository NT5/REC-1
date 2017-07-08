CREATE TABLE IF NOT EXISTS `Formato_9` (
  `Record_Id` int(15) NOT NULL AUTO_INCREMENT,
  `Ped_Id` int(15) NOT NULL,
  `Anio_Lectivo` int(15) NOT NULL,
  `Trimestre` int(15) NOT NULL,
  `Carrera_Id` int(15) NOT NULL,
  `Turno_Id` int(15) NOT NULL,
  `Anio_Carrera` int(15) NOT NULL,
  `Evangelicos` int(15) NOT NULL,
  `Catolicos` int(15) NOT NULL,
  `Otros` int(15) NOT NULL,
  `Ninguna` int(15) NOT NULL,
  PRIMARY KEY (`Record_Id`),
  FOREIGN KEY (`Carrera_Id`) REFERENCES `Carreras` (`Carrera_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Ped_Id`) REFERENCES `Peds` (`Ped_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Turno_Id`) REFERENCES `Turnos` (`Turno_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);