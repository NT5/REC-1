CREATE TABLE IF NOT EXISTS `Formato_7` (
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
CREATE TABLE IF NOT EXISTS `Formato_7_Data` (
  `Record_Id` int(15) NOT NULL AUTO_INCREMENT,
  `Formato_Id` int(15) NOT NULL,
  `Carrera_Id` int(15) NOT NULL,
  `Turno_Id` int(15) NOT NULL,
  `Anio_Carrera` int(15) NOT NULL,
  `Varones_Urbano` int(15) NOT NULL,
  `Varones_Rural` int(15) NOT NULL,
  `Mujeres_Urbano` int(15) NOT NULL,
  `Mujeres_Rural` int(15) NOT NULL,
  PRIMARY KEY (`Record_Id`),
  FOREIGN KEY (`Formato_Id`) REFERENCES `Formato_7` (`Formato_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Carrera_Id`) REFERENCES `Carreras` (`Carrera_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Turno_Id`) REFERENCES `Turnos` (`Turno_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);