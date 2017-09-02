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

        $area = filter_input(INPUT_GET, 'area');
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'id');

        $vars = [];
        $FormatComponets = $this->getFormatComponents();

        $AreaManager = \REC1\Pages\Formats\AreaManager::getInstance($FormatComponets, $action);
        $_area = $AreaManager->getArea($area);
        $_area->initArea();

        $vars["rec1.page.get_active_action"] = $action;
        $vars["rec1.page.get_active_id"] = $id;

        $this->setTemplate($_area->getTemplate());
        $this->Twig_Vars = array_merge($vars, $_area->getVars());
    }

    public function initVars() {
        $this->setVars($this->Twig_Vars);
    }

}
