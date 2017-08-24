<?php

namespace REC1\Formats\Formatos12;

/**
 * 
 */
class Format12DataSet extends \REC1\Formats\FormatComponents {

    public function __construct(\REC1\Formats\FormatComponents $FormatComponents = NULL) {

        if (!$FormatComponents) {
            $FormatComponents = new \REC1\Formats\FormatComponents();
        }

        parent::__construct($FormatComponents, $FormatComponents->getUsersClass(), $FormatComponents->getCarreras(), $FormatComponents->getPeds(), $FormatComponents->getTurnos(), $FormatComponents->getRecord_Id(), $FormatComponents->getFormato_Id(), $FormatComponents->getAnio_carrera(), $FormatComponents->getCarrera_Id(), $FormatComponents->getTurno_Id(), $FormatComponents->getVarones_MF_V(), $FormatComponents->getVarones_NVR(), $FormatComponents->getVarones_Urbano(), $FormatComponents->getVarones_Rural(), $FormatComponents->getMujeres_MF_M(), $FormatComponents->getMujeres_NMR(), $FormatComponents->getMujeres_Urbano(), $FormatComponents->getMujeres_Rural());
    }

    public function getRecord($id) {
        $db = $this->getDatabase();

        $Record_Id = NULL;
        $Formato_Id = NULL;
        $Carrera_Id = NULL;
        $Turno_Id = NULL;
        $Anio_Carrera = NULL;
        $Varones_Urbano = NULL;
        $Varones_Rural = NULL;
        $Mujeres_Urbano = NULL;
        $Mujeres_Rural = NULL;
        $Varones_MF_V = NULL;
        $Varones_NVR = NULL;
        $Mujeres_MF_M = NULL;
        $Mujeres_NMR = NULL;

        $stmt = $db->prepare("SELECT Record_Id, Formato_Id, Carrera_Id, Turno_Id, Anio_Carrera, Varones_Urbano, Varones_Rural, Mujeres_Urbano, Mujeres_Rural, Varones_MF_V, Varones_NVR, Mujeres_MF_M, Mujeres_NMR, FROM Formato_12_Data WHERE Record_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($Record_Id, $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Varones_Urbano, $Varones_Rural, $Mujeres_Urbano, $Mujeres_Rural, $Varones_MF_V, $Varones_NVR, $Mujeres_MF_M, $Mujeres_NMR);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        if (
                $Record_Id !== NULL &&
                $Formato_Id !== NULL &&
                $Carrera_Id !== NULL &&
                $Turno_Id !== NULL &&
                $Anio_Carrera !== NULL &&
                $Varones_Urbano !== NULL &&
                $Varones_Rural !== NULL &&
                $Mujeres_Urbano !== NULL &&
                $Mujeres_Rural !== NULL &&
                $Varones_MF_V !== NULL &&
                $Varones_NVR !== NULL &&
                $Mujeres_MF_M !== NULL &&
                $Mujeres_NMR !== NULL
        ) {
            return new \REC1\Formats\Formatos12\Formato12Data($Record_Id, $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Varones_Urbano, $Varones_Rural, $Mujeres_Urbano, $Mujeres_Rural, $Varones_MF_V, $Varones_NVR, $Mujeres_MF_M, $Mujeres_NMR);
        }
    }

    /**
     * 
     * @param int $formato_id
     * @return array
     */
    public function getDataSet($formato_id) {
        $data_set = [];
        $record_id = NULL;

        $db = $this->getDatabase();

        $stmt = $db->prepare("SELECT Record_Id FROM Formato_12_Data WHERE Formato_Id = ?");

        $stmt->bind_param('i', $formato_id);
        $stmt->execute();
        $stmt->bind_result($record_id);
        $stmt->store_result();

        while ($stmt->fetch()) {
            $data_set[] = $this->getRecord($record_id);
        }

        $stmt->free_result();
        $stmt->close();

        return $data_set;
    }

    /**
     * 
     * @param \REC1\Formats\Formatos7\Formato7Data $data
     */
    public function insertRecord(\REC1\Formats\Formatos12\Formato12Data $data) {
        $db = $this->getDatabase();

        $stmt = $db->prepare("INSERT INTO Formato_12_Data (Formato_Id, Carrera_Id, Turno_Id, Anio_Carrera, Varones_Urbano, Varones_Rural, Mujeres_Urbano, Mujeres_Rural, Varones_MF_V, Varones_NVR, Mujeres_MF_M, Mujeres_NMR) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('iiiiiiiiiiii', $data->getFormato_Id(), $data->getCarrera_Id(), $data->getTurno_Id(), $data->getAnio_Carrera(), $data->getVarones_Urbano(), $data->getVarones_Rural(), $data->getMujeres_Urbano(), $data->getMujeres_Rural(), $data->getVarones_MF_V(), $data->getVarones_NVR(), $data->getMujeres_MF_M(), $data->getMujeres_NMR());
        $stmt->execute();
        $stmt->close();
    }

    /**
     * 
     * @param int $id
     */
    public function deleteRecord($id) {
        $db = $this->getDatabase();

        $stmt = $db->prepare("DELETE FROM Formato_12_Data WHERE Record_Id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

}
