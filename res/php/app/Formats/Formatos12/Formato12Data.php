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
    private $Anio_Carrera;

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
    private $Varones_MF_V;

    /**
     *
     * @var int
     */
    private $Varones_NVR;

    /**
     * 
     * @return int
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
    private $Mujeres_MF_M;

    /**
     *
     * @var int
     */
    private $Mujeres_NMR;

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
    public function getAnioCarrera() {
        return $this->Anio_Carrera;
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
    public function getVaroneMfV() {
        return $this->Varones_MF_V;
    }

    /**
     * 
     * @return int
     */
    public function getVaroneNvr() {
        return $this->Varones_NVR;
    }

    /**
     * 
     * @return int
     */
    public function getVaronesUrbano() {
        return $this->Varones_Urbano;
    }

    /**
     * 
     * @return int
     */
    public function getVaronesRural() {
        return $this->Varones_Rural;
    }

    /**
     * 
     * @return int
     */
    public function getMujeresMFM() {
        return $this->Mujeres_MF_M;
    }

    /**
     * 
     * @return int
     */
    public function getMujeresNMR() {
        return $this->Mujeres_NMR;
    }

    /**
     * 
     * @return int
     */
    public function getMujeresUrbano() {
        return $this->Mujeres_Urbano;
    }

    /**
     * 
     * @return int
     */
    public function getMujeresRural() {
        return $this->Mujeres_Rural;
    }

    public function __construct($Record_Id, $Formato_Id, $Carrera_Id, $Turno_Id, $Anio_Carrera, $Varones_Urbano, $Varones_Rural, $Varones_MF_V, $Varones_NVR, $Mujeres_Urbano, $Mujeres_Rural, $Mujeres_MF_M, $Mujeres_NMR) {
        $this->Record_Id = $Record_Id;
        $this->Formato_Id = $Formato_Id;
        $this->Carrera_Id = $Carrera_Id;
        $this->Turno_Id = $Turno_Id;
        $this->Anio_Carrera = $Anio_Carrera;
        $this->Varones_Urbano = $Varones_Urbano;
        $this->Varones_Rural = $Varones_Rural;
        $this->Mujeres_Urbano = $Mujeres_Urbano;
        $this->Mujeres_Rural = $Mujeres_Rural;
        $this->Mujeres_MF_M = $Mujeres_MF_M;
        $this->Mujeres_NMR = $Mujeres_NMR;
        $this->Varones_MF_V = $Varones_MF_V;
        $this->Varones_NVR = $Varones_NVR;
    }

}
