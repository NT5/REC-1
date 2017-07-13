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
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL) {
        parent::__construct($REC1Components);

        $this->Carreras = new \REC1\Formats\Carreras($this, $this->getUsers());
        
        // $this->getCarreras()->insertCareer('Test!', new \REC1\Components\Users\User(1));

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

    public function CheckPost() {
        
    }

    public function initTwigTemplate() {
        $this->setTemplate('pages/test.twig');
    }

    public function initVars() {
        $this->setVar('rec1.page.title', 'Pagina de prueba');
        $this->setVar('rec1.carreras.list', $this->getCarreras()->getCarreras());
    }

}
