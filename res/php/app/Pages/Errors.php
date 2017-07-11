<?php

namespace REC1\Pages;

/**
 * @todo Documentar
 */
class Errors extends \REC1\Components\Page {

    private $Error_Code;

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     * @param int $error_code
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL, $error_code = 0) {
        parent::__construct($REC1Components);

        $this->Error_Code = $error_code;

        $this->initTwigTemplate();
        $this->initVars();
    }

    /**
     * 
     */
    public function CheckPost() {
        
    }

    /**
     * 
     */
    public function initTwigTemplate() {
        $this->setTemplate("pages/errors/error.twig");
    }

    /**
     * 
     */
    public function initVars() {
        $this->setVars([
            "rec1.page.title" => "Error Critico | " . $this->Error_Code,
            "rec1.debug.error_code" => $this->Error_Code,
        ]);
    }

}
