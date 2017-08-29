<?php

namespace REC1\Formats\Formatos12;

/**
 * 
 */
class Format12DataSet extends \REC1\Formats\FormatComponents {

    /**
     * 
     * @param \REC1\Formats\FormatComponents $FormatComponents
     */
    public function __construct(\REC1\Formats\FormatComponents $FormatComponents = NULL) {
        if (!$FormatComponents) {
            $FormatComponents = new \REC1\Formats\FormatComponents();
        }
        parent::__construct($this, $FormatComponents->getUsersClass(), $FormatComponents->getCarrerasClass(), $FormatComponents->getPedsClass(), $FormatComponents->getTurnosClass());
    }

    /**
     * 
     * @param int $id
     * @return \REC1\Formats\Formatos12\Formato12Data
     */
    public function getRecord($id) {
        $db = $this->getDatabase();

        $Record_Id = NULL;
        $Formato_Id = NULL;
        $Carrera_Id = NULL;
        $Turno_Id = NULL;
        $Anio_Carrera = NULL;
        $Matricula_Varones_Rurales = NULL;
        $Matricula_Varones_Urbanos = NULL;
        $Numero_Varones_Reprobados = NULL;
        $Matricula_Mujeres_Rurales = NULL;
        $Matricula_Mujeres_Urbanos = NULL;
        $Numero_Mujeres_Reprobados = NULL;

        $stmt = $db->prepare("SELECT Record_Id, Formato_Id, Carrera_Id, Turno_Id, Anio_Carrera, Matricula_Varones_Rurales, Matricula_Varones_Urbanos, Numero_Varones_Reprobados, Matricula_Mujeres_Rurales, Matricula_Mujeres_Urbanos, Numero_Mujeres_Reprobados FROM Formato_12_Data WHERE Record_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($Record_Id, $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Matricula_Varones_Rurales, $Matricula_Varones_Urbanos, $Numero_Varones_Reprobados, $Matricula_Mujeres_Rurales, $Matricula_Mujeres_Urbanos, $Numero_Mujeres_Reprobados);
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
                $Matricula_Varones_Rurales !== NULL &&
                $Matricula_Varones_Urbanos !== NULL &&
                $Numero_Varones_Reprobados !== NULL &&
                $Matricula_Mujeres_Rurales !== NULL &&
                $Matricula_Mujeres_Urbanos !== NULL &&
                $Numero_Mujeres_Reprobados !== NULL
        ) {
            return new \REC1\Formats\Formatos12\Formato12Data($Record_Id, $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Matricula_Varones_Rurales, $Matricula_Varones_Urbanos, $Numero_Varones_Reprobados, $Matricula_Mujeres_Rurales, $Matricula_Mujeres_Urbanos, $Numero_Mujeres_Reprobados);
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
     * @param int $Formato_Id
     * @param int $Carrera_Id
     * @param int $Turno_Id
     * @param int $Anio_Carrera
     * @param int $Matricula_Varones_Rurales
     * @param int $Matricula_Varones_Urbanos
     * @param int $Numero_Varones_Reprobados
     * @param int $Matricula_Mujeres_Rurales
     * @param int $Matricula_Mujeres_Urbanos
     * @param int $Numero_Mujeres_Reprobados
     */
    public function insertRecord($Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Matricula_Varones_Rurales, $Matricula_Varones_Urbanos, $Numero_Varones_Reprobados, $Matricula_Mujeres_Rurales, $Matricula_Mujeres_Urbanos, $Numero_Mujeres_Reprobados) {
        $db = $this->getDatabase();

        $stmt = $db->prepare("INSERT INTO Formato_12_Data (Formato_Id, Carrera_Id, Turno_Id, Anio_Carrera, Matricula_Varones_Rurales, Matricula_Varones_Urbanos, Numero_Varones_Reprobados, Matricula_Mujeres_Rurales, Matricula_Mujeres_Urbanos, Numero_Mujeres_Reprobados) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('iiiiiiiiii', $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Matricula_Varones_Rurales, $Matricula_Varones_Urbanos, $Numero_Varones_Reprobados, $Matricula_Mujeres_Rurales, $Matricula_Mujeres_Urbanos, $Numero_Mujeres_Reprobados);
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
