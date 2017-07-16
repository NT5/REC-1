<?php

namespace REC1\Formats;

/**
 * 
 */
class FormatComponents extends \REC1\Components\ExtendedComponents {

    /**
     *
     * @var \REC1\Components\Users
     */
    private $UsersClass;

    /**
     *
     * @var \REC1\Formats\Carreras 
     */
    private $Carreras;

    /**
     *
     * @var \REC1\Formats\Carreras
     */
    private $Peds;

    /**
     *
     * @var \REC1\Formats\Turnos 
     */
    private $Turnos;

    /**
     * 
     * @param \REC1\Components\ExtendedComponents $ExtendedComponents
     * @param \REC1\Components\Users $Users
     * @param \REC1\Formats\Carreras $Carreras
     * @param \REC1\Formats\Carreras $Peds
     * @param \REC1\Formats\Turnos $Turnos
     */
    public function __construct(\REC1\Components\ExtendedComponents $ExtendedComponents = NULL, \REC1\Components\Users $Users = NULL, \REC1\Formats\Carreras $Carreras = NULL, \REC1\Formats\Carreras $Peds = NULL, \REC1\Formats\Turnos $Turnos = NULL) {
        if (!$ExtendedComponents) {
            $ExtendedComponents = new \REC1\Components\ExtendedComponents();
        }
        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $ExtendedComponents->getCookies(), $ExtendedComponents);

        $this->UsersClass = ($Users) ? : new \REC1\Components\Users($this);
        $this->Carreras = ($Carreras) ? : new \REC1\Formats\Carreras($this, $this->getUsersClass());
        $this->Peds = ($Peds) ? : new \REC1\Formats\Peds($this, $this->getUsersClass());
        $this->Turnos = ($Turnos) ? : new \REC1\Formats\Turnos($this, $this->getUsersClass());
    }

    /**
     * 
     * @return \REC1\Components\Users
     */
    public function getUsersClass() {
        return $this->UsersClass;
    }

    /**
     * 
     * @return \REC1\Formats\Carreras
     */
    public function getCarreras() {
        return $this->Carreras;
    }

    /**
     * 
     * @return \REC1\Formats\Peds
     */
    public function getPeds() {
        return $this->Peds;
    }

    /**
     * 
     * @return \REC1\Formats\Turnos
     */
    public function getTurnos() {
        return $this->Turnos;
    }

}
