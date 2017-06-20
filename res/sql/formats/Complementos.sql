CREATE TABLE IF NOT EXISTS `Carreras` (
  `Carrera_Id` INT(15) NOT NULL AUTO_INCREMENT,
  `Carrera_Name` VARCHAR(350) NOT NULL,
  PRIMARY KEY (`Carrera_Id`)
);
CREATE TABLE IF NOT EXISTS `Peds` (
  `Ped_Id` INT(15) NOT NULL AUTO_INCREMENT,
  `Ped_Name` VARCHAR(350) NOT NULL,
  PRIMARY KEY (`Ped_Id`)
);
CREATE TABLE IF NOT EXISTS `Turnos` (
  `Turno_Id` INT(15) NOT NULL AUTO_INCREMENT,
  `Turno_Name` VARCHAR(350) NOT NULL,
  PRIMARY KEY (`Turno_Id`)
);