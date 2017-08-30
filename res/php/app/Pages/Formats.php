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

        $area = filter_input(INPUT_GET, 'area_formato');
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'id');

        $vars = [];
        $FormatComponets = $this->getFormatComponents();

        switch ($action) {
            case "add":
                switch ($area) {
                    case "carreras":
                        $CarrerasCompo = $this->getFormatComponents()->getCarrerasClass();
                        $carrera_name = filter_input(INPUT_POST, 'new_carrera_name');
                        if ($carrera_name) {
                            $CarrerasCompo->insertCarrera($carrera_name, $this->Me);
                            $vars["rec1.page.notification"] = "¡Se añadio la carrera con el nombre $carrera_name a la base de datos!";
                        }
                        break;
                    case "12":
                        print_r($this->getPost());
                        break;
                }
                break;
            case "del":
                switch ($area) {
                    case "carreras":
                        $CarrerasCompo = $this->getFormatComponents()->getCarrerasClass();
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

        $AreaManager = \REC1\Pages\Formats\Areas\AreaManager::getInstance($FormatComponets);
        $_area = $AreaManager->getArea($area);

        $vars["rec1.page.get_active_action"] = $action;
        $vars["rec1.page.get_active_id"] = $id;

        $this->setTemplate($_area->getTemplate());
        $this->Twig_Vars = $_area->getVars();
    }

    public function initVars() {
        $this->setVars($this->Twig_Vars);
    }

}
