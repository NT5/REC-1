CREATE TABLE IF NOT EXISTS `Formato_10` (
  `Formato_Id` int(15) NOT NULL AUTO_INCREMENT,
  `Formato_Name` VARCHAR(350) NOT NULL,
  `Create_by` INT NOT NULL DEFAULT '1',
  `Create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Formato_Id`)
);
CREATE TABLE IF NOT EXISTS `Formato_10_Data` (
  `Record_id` int(15) NOT NULL AUTO_INCREMENT,
  `Formato_Id` int(15) NOT NULL,
  `Ped_Id` int(15) NOT NULL,
  `Anio` int(15) NOT NULL,
  `Trimestre` int(15) NOT NULL,
  `Carrera_Id` int(15) NOT NULL,
  `Turno_id` int(15) NOT NULL,
  `Anio_Lectivo` int(15) NOT NULL,
  `ML_V` int(15) NOT NULL,
  `MF_V` int(15) NOT NULL,
  `ML_M` int(15) NOT NULL,
  `MF_M` int(15) NOT NULL,
  PRIMARY KEY (`Record_id`),
  FOREIGN KEY (`Formato_Id`) REFERENCES `Formato_10` (`Formato_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Carrera_id`) REFERENCES `Carreras` (`Carrera_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Ped_Id`) REFERENCES `Peds` (`Ped_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Turno_id`) REFERENCES `Turnos` (`Turno_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);