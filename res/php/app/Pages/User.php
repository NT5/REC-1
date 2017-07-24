<?php

namespace REC1\Pages;

/**
 * 
 */
class User extends \REC1\Components\Page {

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL) {
        parent::__construct($REC1Components);

        $this->initTwigTemplate();
        $this->initVars();
    }

    public function CheckPost() {
        
    }

    public function initTwigTemplate() {
        $this->setTemplate('pages/user.twig');
    }

    public function initVars() {
        $this->setVars([
            "rec1.page.title" => "Usuarios"
        ]);
    }

}
