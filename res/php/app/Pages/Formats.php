<?php

namespace REC1\Pages;

/**
 * 
 */
class Formats extends \REC1\Components\Page {

    /**
     *
     * @var array
     */
    private $Twig_Vars = [];

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
        $action = filter_input(INPUT_GET, 'action');
        $template = "base.twig";
        $vars = [];
        $FormatComponets = $this->getFormatComponents();

        switch ($area) {
            case "carreras":
                $template = "pages/formats/carreras.twig";
                $vars["rec1.page.title"] = "Formatos | Carreras";
                $vars["rec1.carreras.list"] = $FormatComponets->getCarreras()->getCarreras();
                
                break;
            case "peds":
                $template = "pages/formats/peds.twig";
                $vars["rec1.page.title"] = "Formatos | Peds";
                $vars["rec1.peds.list"] = $FormatComponets->getPeds()->getPeds();
                break;
            case "turnos":
                $template = "pages/formats/turnos.twig";
                $vars["rec1.page.title"] = "Formatos | Turnos";
                $vars["rec1.turnos.list"] = $FormatComponets->getTurnos()->getTurnos();
                break;
            default:
                $template = "pages/formats.twig";
                $vars["rec1.page.title"] = "Formatos";
                break;
        }

        $this->setTemplate($template);
        $this->Twig_Vars = $vars;
    }

    public function initVars() {
        $this->setVars($this->Twig_Vars);
    }

}
