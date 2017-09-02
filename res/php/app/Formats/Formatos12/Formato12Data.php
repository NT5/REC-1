<?php

namespace REC1\Formats\Formatos12;

/**
 * 
 */
class Formato12Data {

    /**
     *
     * @var int 
     */
    private $Record_Id;

    /**
     *
     * @var int 
     */
    private $Formato_Id;

    /**
     *
     * @var int 
     */
    private $Carrera_Id;

    /**
     *
     * @var int 
     */
    private $Turno_Id;

    /**
     *
     * @var int 
     */
    private $Anio_Carrera;

    /**
     *
     * @var int 
     */
    private $Matricula_Varones_Rurales;

    /**
     *
     * @var int
     */
    private $Matricula_Varones_Urbanos;

    /**
     * 
     * @return int
     */
    private $Numero_Varones_Reprobados;

    /**
     *
     * @var int
     */
    private $Matricula_Mujeres_Rurales;

    /**
     *
     * @var int
     */
    private $Matricula_Mujeres_Urbanos;

    /**
     *
     * @var int
     */
    private $Numero_Mujeres_Reprobados;

    /**
     * 
     * @param int $Record_Id
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
    public function __construct($Record_Id, $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Matricula_Varones_Rurales, $Matricula_Varones_Urbanos, $Numero_Varones_Reprobados, $Matricula_Mujeres_Rurales, $Matricula_Mujeres_Urbanos, $Numero_Mujeres_Reprobados) {
        $this->Record_Id = $Record_Id;
        $this->Formato_Id = $Formato_Id;
        $this->Carrera_Id = $Carrera_Id;
        $this->Turno_Id = $Turno_Id;
        $this->Anio_Carrera = $Anio_Carrera;
        $this->Matricula_Varones_Rurales = $Matricula_Varones_Rurales;
        $this->Matricula_Varones_Urbanos = $Matricula_Varones_Urbanos;
        $this->Numero_Varones_Reprobados = $Numero_Varones_Reprobados;
        $this->Matricula_Mujeres_Rurales = $Matricula_Mujeres_Rurales;
        $this->Matricula_Mujeres_Urbanos = $Matricula_Mujeres_Urbanos;
        $this->Numero_Mujeres_Reprobados = $Numero_Mujeres_Reprobados;
    }

    /**
     * 
     * @return int
     */
    public function getRecordId() {
        return $this->Record_Id;
    }

    /**
     * 
     * @return int
     */
    public function getFormatoId() {
        return $this->Formato_Id;
    }

    /**
     * 
     * @return int
     */
    public function getCarreraId() {
        return $this->Carrera_Id;
    }

    /**
     * 
     * @return int
     */
    public function getTurnoId() {
        return $this->Turno_Id;
    }

    /**
     * 
     * @return int
     */
    public function getAnioCarrera() {
        return $this->Anio_Carrera;
    }

    /**
     * 
     * @return int
     */
    public function getMatricula_Varones_Rurales() {
        return $this->Matricula_Varones_Rurales;
    }

    /**
     * 
     * @return int
     */
    public function getMatricula_Varones_Urbanos() {
        return $this->Matricula_Varones_Urbanos;
    }

    /**
     * 
     * @return int
     */
    public function getNumero_Varones_Reprobados() {
        return $this->Numero_Varones_Reprobados;
    }

    /**
     * 
     * @return int
     */
    public function getMatricula_Mujeres_Rurales() {
        return $this->Matricula_Mujeres_Rurales;
    }

    /**
     * 
     * @return int
     */
    public function getMatricula_Mujeres_Urbanos() {
        return $this->Matricula_Mujeres_Urbanos;
    }

    /**
     * 
     * @return int
     */
    public function getNumero_Mujeres_Reprobados() {
        return $this->Numero_Mujeres_Reprobados;
    }

}
