CREATE TABLE IF NOT EXISTS `Formato_12` (
  `Formato_Id` int(15) NOT NULL AUTO_INCREMENT,
  `Formato_Name` VARCHAR(350) NOT NULL,
  `Ped_id` INT(15) NOT NULL,
  `Anio_Lectivo` INT(15) NOT NULL,
  `Trimestre` INT(15) NOT NULL,
  `Create_by` INT NOT NULL DEFAULT '1',
  `Create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Formato_Id`),
  FOREIGN KEY (`Ped_id`) REFERENCES `Peds` (`Ped_Id`) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS `Formato_12_Data` (
  `Record_id` INT(15) NOT NULL AUTO_INCREMENT,
  `Formato_Id` int(15) NOT NULL,
  `Anio_carrera` INT(15) NOT NULL,
  `Carrera_id` INT(15) NOT NULL,
  `Turno_id` INT(15) NOT NULL,
  `Varones_MF_V` INT(15) NOT NULL,
  `Varones_NVR` INT(15) NOT NULL,
  `Varones_Urbano` INT(15) NOT NULL,
  `Varones_Rural` INT(15) NOT NULL,
  `Mujeres_MF_M` INT(15) NOT NULL,
  `Mujeres_NMR` INT(15) NOT NULL,
  `Mujeres_Urbano` INT(15) NOT NULL,
  `Mujeres_Rural` INT(15) NOT NULL,
  PRIMARY KEY (`Record_id`),
  FOREIGN KEY (`Formato_Id`) REFERENCES `Formato_12` (`Formato_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Carrera_id`) REFERENCES `Carreras` (`Carrera_Id`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`Turno_id`) REFERENCES `Turnos` (`Turno_Id`) ON UPDATE CASCADE ON DELETE CASCADE
);