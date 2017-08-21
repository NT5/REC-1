CREATE TABLE IF NOT EXISTS `Formato_8` (
  `Formato_Id` int(15) NOT NULL AUTO_INCREMENT,
  `Formato_Name` VARCHAR(350) NOT NULL,
  `Ped_Id` int(15) NOT NULL,
  `Anio_Lectivo` int(15) NOT NULL,
  `Trimestre` int(15) NOT NULL,
  `Create_by` INT NOT NULL DEFAULT '1',
  `Create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Formato_Id`),
  FOREIGN KEY (`Ped_Id`) REFERENCES `Peds` (`Ped_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS `Formato_8_Data` (
  `Record_Id` int(15) NOT NULL AUTO_INCREMENT,
  `Formato_Id` int(15) NOT NULL,
  `Carrera_Id` int(15) NOT NULL,
  `Turno_Id` int(15) NOT NULL,
  `Anio_Carrera` int(15) NOT NULL,
  `Menos_25` int(15) NOT NULL,
  `De_25_30` int(15) NOT NULL,
  `De_31_40` int(15) NOT NULL,
  `De_40_Mas` int(15) NOT NULL,
  PRIMARY KEY (`Record_Id`),
  FOREIGN KEY (`Formato_Id`) REFERENCES `Formato_8` (`Formato_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Carrera_Id`) REFERENCES `Carreras` (`Carrera_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Turno_Id`) REFERENCES `Turnos` (`Turno_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);