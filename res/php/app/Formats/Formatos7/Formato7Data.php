<?php

namespace REC1\Formats\Formatos7;

/**
 * 
 */
class Formato7Data {

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
    private $Varones_Urbano;

    /**
     *
     * @var int 
     */
    private $Varones_Rural;

    /**
     *
     * @var int 
     */
    private $Mujeres_Urbano;

    /**
     *
     * @var int 
     */
    private $Mujeres_Rural;

    /**
     * 
     * @param int $Record_Id
     * @param int $Formato_Id
     * @param int $Carrera_Id
     * @param int $Turno_Id
     * @param int $Anio_Carrera
     * @param int $Varones_Urbano
     * @param int $Varones_Rural
     * @param int $Mujeres_Urbano
     * @param int $Mujeres_Rural
     */
    public function __construct($Record_Id, $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Varones_Urbano, $Varones_Rural, $Mujeres_Urbano, $Mujeres_Rural) {
        $this->Record_Id = $Record_Id;
        $this->Formato_Id = $Formato_Id;
        $this->Carrera_Id = $Carrera_Id;
        $this->Turno_Id = $Turno_Id;
        $this->Anio_Carrera = $Anio_Carrera;
        $this->Varones_Urbano = $Varones_Urbano;
        $this->Varones_Rural = $Varones_Rural;
        $this->Mujeres_Urbano = $Mujeres_Urbano;
        $this->Mujeres_Rural = $Mujeres_Rural;
    }

    /**
     * 
     * @return int
     */
    public function getRecord_Id() {
        return $this->Record_Id;
    }

    /**
     * 
     * @return int
     */
    public function getFormato_Id() {
        return $this->Formato_Id;
    }

    /**
     * 
     * @return int
     */
    public function getCarrera_Id() {
        return $this->Carrera_Id;
    }

    /**
     * 
     * @return int
     */
    public function getTurno_Id() {
        return $this->Turno_Id;
    }

    /**
     * 
     * @return int
     */
    public function getAnio_Carrera() {
        return $this->Anio_Carrera;
    }

    /**
     * 
     * @return int
     */
    public function getVarones_Urbano() {
        return $this->Varones_Urbano;
    }

    /**
     * 
     * @return int
     */
    public function getVarones_Rural() {
        return $this->Varones_Rural;
    }

    /**
     * 
     * @return int
     */
    public function getMujeres_Urbano() {
        return $this->Mujeres_Urbano;
    }

    /**
     * 
     * @return int
     */
    public function getMujeres_Rural() {
        return $this->Mujeres_Rural;
    }

}
