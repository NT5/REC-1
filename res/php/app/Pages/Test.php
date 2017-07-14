<?php

namespace REC1\Pages;

/**
 * 
 */
class Test extends \REC1\Components\Page {

    /**
     *
     * @var \REC1\Formats\Carreras 
     */
    private $Carreras;

    /**
     *
     * @var \REC1\Formats\Peds 
     */
    private $Peds;

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL) {
        parent::__construct($REC1Components);

        $this->Carreras = new \REC1\Formats\Carreras($this, $this->getUsers());
        $this->Peds = new \REC1\Formats\Peds($this, $this->getUsers());

        // $this->getCarreras()->insertCareer('Test!', new \REC1\Components\Users\User(1));
        // $this->getPeds()->insertPed('Test!', $this->getUsers()->getUser(1));

        $this->initTwigTemplate();
        $this->initVars();
    }

    /**
     * 
     * @return \REC1\Formats\Carreras
     */
    private function getCarreras() {
        return $this->Carreras;
    }

    /**
     * 
     * @return \REC1\Formats\Peds
     */
    private function getPeds() {
        return $this->Peds;
    }

    public function CheckPost() {
        
    }

    public function initTwigTemplate() {
        $this->setTemplate('pages/test.twig');
    }

    public function initVars() {
        $this->setVar('rec1.page.title', 'Pagina de prueba');

        $this->setVars([
            'rec1.carreras.list' => $this->getCarreras()->getCarreras(),
            'rec1.peds.list' => $this->getPeds()->getPeds()
        ]);
    }

}
