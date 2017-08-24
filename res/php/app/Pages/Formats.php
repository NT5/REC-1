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
     * @var \REC1\Components\Users\User
     */
    private $Me;

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL) {
        parent::__construct($REC1Components);

        $this->Me = $this->getUsers()->getUserSessionClass()->getFromCookie();

        $this->initTwigTemplate();
        $this->initVars();
    }

    public function CheckPost() {
        
    }

    public function initTwigTemplate() {

        $area = filter_input(INPUT_GET, 'format');
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'id');

        $template = "base.twig";
        $vars = [];
        $FormatComponets = $this->getFormatComponents();

        switch ($action) {
            case "add":
                switch ($area) {
                    case "carreras":
                        $CarrerasCompo = $this->getFormatComponents()->getCarreras();
                        $carrera_name = filter_input(INPUT_POST, 'new_carrera_name');
                        if ($carrera_name) {
                            $CarrerasCompo->insertCarrera($carrera_name, $this->Me);
                            $vars["rec1.page.notification"] = "¡Se añadio la carrera con el nombre $carrera_name a la base de datos!";
                        }
                        break;
                    case "12":
                        // TODO
                        break;
                }
                break;
            case "del":
                switch ($area) {
                    case "carreras":
                        $CarrerasCompo = $this->getFormatComponents()->getCarreras();
                        $carrera_id = filter_input(INPUT_GET, 'id');

                        if ($carrera_id) {
                            $carrera_item = $CarrerasCompo->getCarrera($carrera_id);
                            if ($carrera_item) {
                                $carrera_name = $carrera_item->getName();
                                $CarrerasCompo->deleteCarrera($carrera_id);
                                $vars["rec1.page.notification"] = "¡Se borro la carrera $carrera_name!";
                            }
                        }
                        break;
                }
                break;
            case "edit":
                switch ($area) {
                    case "carreras":
                        // TODO Edit
                        break;
                }
                break;
            default:
                break;
        }

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
            case "12":
                $template = "pages/formats/formato12.twig";
                $vars["rec1.page.title"] = "Formatos | Formato 12";

                $vars["rec1.peds.list"] = $FormatComponets->getPeds()->getPeds();
                $vars["rec1.carreras.list"] = $FormatComponets->getCarreras()->getCarreras();
                $vars["rec1.turnos.list"] = $FormatComponets->getTurnos()->getTurnos();
                break;
            default:
                $template = "pages/formats.twig";
                $vars["rec1.page.title"] = "Formatos";
                break;
        }

        $vars["rec1.page.get_active_action"] = $action;
        $vars["rec1.page.get_active_id"] = $id;

        $this->setTemplate($template);
        $this->Twig_Vars = $vars;
    }

    public function initVars() {
        $this->setVars($this->Twig_Vars);
    }

}
