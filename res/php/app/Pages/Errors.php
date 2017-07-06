<?php

namespace REC1\Pages;

/**
 * @todo Documentar
 */
class Errors extends \REC1\Components\Page {

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     * @param int $error_code
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL, $error_code = 0) {
        parent::__construct($REC1Components);

        $this->setTemplate("pages/errors/error.twig");
        $this->setVars([
            "page_title" => "Error Critico | " . $error_code,
            "error_code" => $error_code,
            "logs" => $this->getLogger()->getLogs()
        ]);
    }

}
