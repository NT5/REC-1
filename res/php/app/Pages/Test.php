<?php

namespace REC1\Pages;

/**
 * 
 */
class Test extends \REC1\Components\Page {

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL) {
        parent::__construct($REC1Components);

        // $this->getCarreras()->insertCareer('Test!', new \REC1\Components\Users\User(1));
        // $this->getPeds()->insertPed('Test!', $this->getUsers()->getUser(1));
        // $this->getTurnos()->insertTurno('Test!', $this->getUsers()->getUser(1));

        $this->initTwigTemplate();
        $this->initVars();
    }

    public function CheckPost() {
        
    }

    public function initTwigTemplate() {
        $this->setTemplate('pages/test.twig');
    }

    public function initVars() {

        $FormatComponents = $this->getFormatComponents();

        $this->setVar('rec1.page.title', 'Pagina de prueba');

        $this->setVars([
            'rec1.carreras.list' => $FormatComponents->getCarreras()->getCarreras(),
            'rec1.peds.list' => $FormatComponents->getPeds()->getPeds(),
            'rec1.turnos.list' => $FormatComponents->getTurnos()->getTurnos()
        ]);
    }

}
