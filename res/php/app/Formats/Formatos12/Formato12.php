<?php

namespace REC1\Formats\Formatos12;

/**
 * 
 */
class Formato12 {

    /**
     *
     * @var int 
     */
    private $Id;

    /**
     *
     * @var string 
     */
    private $Name;

    /**
     *
     * @var \REC1\Formats\Peds\Ped 
     */
    private $Ped;

    /**
     *
     * @var int 
     */
    private $Anio_Lectivo;

    /**
     *
     * @var int 
     */
    private $Trimestre;

    /**
     *
     * @var string 
     */
    private $CreateAt;

    /**
     *
     * @var \REC1\Components\Users\User 
     */
    private $CreateBy;

    /**
     * 
     * @param int $id
     * @param string $name
     * @param \REC1\Formats\Peds\Ped $ped
     * @param int $Anio_Lectivo
     * @param int $Trimestre
     * @param int $createat
     * @param \REC1\Components\Users\User $createby
     */
    public function __construct($id = 0, $name = "Default", \REC1\Formats\Peds\Ped $ped = NULL, $Anio_Lectivo = 0, $Trimestre = 0, $createat = 0, \REC1\Components\Users\User $createby = NULL) {
        $this->Id = $id;
        $this->Name = $name;
        $this->Ped = $ped;
        $this->Anio_Lectivo = $Anio_Lectivo;
        $this->Trimestre = $Trimestre;
        $this->CreateAt = $createat;
        $this->CreateBy = $createby;
    }

    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->Id;
    }

    /**
     * 
     * @return string
     */
    public function getName() {
        return $this->Name;
    }

    /**
     * 
     * @return \REC1\Formats\Peds\Ped
     */
    public function getPed() {
        return $this->Ped;
    }

    /**
     * 
     * @return int
     */
    public function getAnioLectivo() {
        return $this->Anio_Lectivo;
    }

    /**
     * 
     * @return int
     */
    public function getTrimestre() {
        return $this->Trimestre;
    }

    /**
     * 
     * @return string
     */
    public function getCreateAt() {
        return $this->CreateAt;
    }

    /**
     * 
     * @return \REC1\Components\Users\User 
     */
    public function getCreateBy() {
        return $this->CreateBy;
    }

}
