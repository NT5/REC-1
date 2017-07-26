CREATE TABLE IF NOT EXISTS `Formato_14` (
  `Formato_Id` int(15) NOT NULL AUTO_INCREMENT,
  `Formato_Name` VARCHAR(350) NOT NULL,
  `Create_by` INT NOT NULL DEFAULT '1',
  `Create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Formato_Id`)
);
CREATE TABLE IF NOT EXISTS `Formato_14_Data` (
  `Record_id` int(15) NOT NULL AUTO_INCREMENT,
  `Formato_Id` int(15) NOT NULL,
  `Ped_Id` int(15) NOT NULL,
  `Carrera_Id` int(15) NOT NULL,
  `Anio_Lectivo` int(15) NOT NULL,
  `Reti_Mujeres_Id` int(15) NOT NULL,
  `Reti_hombres_Id` int(15) NOT NULL,
  `Egre_mujeres_Id` int(15) NOT NULL,
  `Egre_hombres_Id` int(15) NOT NULL,
  `Turno_Id` int(15) NOT NULL,
  PRIMARY KEY (`Record_id`),
  FOREIGN KEY (`Formato_Id`) REFERENCES `Formato_14` (`Formato_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Carrera_Id`) REFERENCES `Carreras` (`Carrera_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Ped_Id`) REFERENCES `Peds` (`Ped_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Turno_Id`) REFERENCES `Turnos` (`Turno_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);