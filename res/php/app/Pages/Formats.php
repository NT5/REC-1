<?php

namespace REC1\Pages;

/**
 * 
 */
class Formats extends \REC1\Components\Page {

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

        $area = filter_input(INPUT_GET, 'format');
        $template = "base.twig";

        switch ($area) {
            case "carreras":
                $template = "pages/formats/carreras.twig";
                break;
            case "peds":
                $template = "pages/formats/peds.twig";
                break;
            case "turnos":
                $template = "pages/formats/turnos.twig";
                break;
            default:
                $template = "pages/formats.twig";
                break;
        }

        $this->setTemplate($template);
    }

    public function initVars() {
        $this->setVars([
            "rec1.page.title" => "Formatos"
        ]);
    }

}
