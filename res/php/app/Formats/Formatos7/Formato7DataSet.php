<?php

namespace REC1\Formats\Formatos7;

/**
 * 
 */
class Formato7DataSet extends \REC1\Formats\FormatComponents {

    /**
     * 
     * @param \REC1\Formats\FormatComponents $FormatComponents
     */
    public function __construct(\REC1\Formats\FormatComponents $FormatComponents = NULL) {

        if (!$FormatComponents) {
            $FormatComponents = new \REC1\Formats\FormatComponents();
        }

        parent::__construct($FormatComponents, $FormatComponents->getUsersClass(), $FormatComponents->getCarreras(), $FormatComponents->getPeds(), $FormatComponents->getTurnos());
    }

    /**
     * 
     * @param int $id
     * @return \REC1\Formats\Formatos7\Formato7Data
     */
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

        $stmt = $db->prepare("SELECT Record_Id, Formato_Id, Carrera_Id, Turno_Id, Anio_Carrera, Varones_Urbano, Varones_Rural, Mujeres_Urbano, Mujeres_Rural FROM Formato_7_Data WHERE Record_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($Record_Id, $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Varones_Urbano, $Varones_Rural, $Mujeres_Urbano, $Mujeres_Rural);
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
                $Mujeres_Rural !== NULL
        ) {
            return new \REC1\Formats\Formatos7\Formato7Data($Record_Id, $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Varones_Urbano, $Varones_Rural, $Mujeres_Urbano, $Mujeres_Rural);
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

        $stmt = $db->prepare("SELECT Record_Id FROM Formato_7_Data WHERE Formato_Id = ?");

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
    public function insertRecord(\REC1\Formats\Formatos7\Formato7Data $data) {
        $db = $this->getDatabase();

        $stmt = $db->prepare("INSERT INTO Formato_7_Data (Formato_Id, Carrera_Id, Turno_Id, Anio_Carrera, Varones_Urbano, Varones_Rural, Mujeres_Urbano, Mujeres_Rural) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('iiiiiiii', $data->getFormato_Id(), $data->getCarrera_Id(), $data->getTurno_Id(), $data->getAnio_Carrera(), $data->getVarones_Urbano(), $data->getVarones_Rural(), $data->getMujeres_Urbano(), $data->getMujeres_Rural());
        $stmt->execute();
        $stmt->close();
    }

    /**
     * 
     * @param int $id
     */
    public function deleteRecord($id) {
        $db = $this->getDatabase();

        $stmt = $db->prepare("DELETE FROM Formato_7_Data WHERE Record_Id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

}
