CREATE TABLE IF NOT EXISTS `Formato_14` (
  `Record_id` int(15) NOT NULL AUTO_INCREMENT,
  `Ped_Id` int(15) NOT NULL,
  `Carrera_Id` int(15) NOT NULL,
  `Anio_Lectivo` int(15) NOT NULL,
  `Reti_Mujeres_Id` int(15) NOT NULL,
  `Reti_hombres_Id` int(15) NOT NULL,
  `Egre_mujeres_Id` int(15) NOT NULL,
  `Egre_hombres_Id` int(15) NOT NULL,
  `Turno_Id` int(15) NOT NULL,
  PRIMARY KEY (`Reg_Id`),
  FOREIGN KEY (`Carrera_Id`) REFERENCES `Carreras` (`Carrera_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Ped_Id`) REFERENCES `Peds` (`Ped_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Turno_Id`) REFERENCES `Turnos` (`Turno_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);