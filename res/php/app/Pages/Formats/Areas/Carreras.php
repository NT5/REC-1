<?php

namespace REC1\Pages\Formats\Areas;

/**
 * 
 */
class Carreras extends \REC1\Pages\Formats\AreaAbstract {

    /**
     *
     * @var \self
     */
    private static $Instance;

    /**
     * 
     * @param \REC1\Formats\FormatComponents $FormatComponets
     * @param string $Action
     * @return self
     */
    public static function getInstance(\REC1\Formats\FormatComponents $FormatComponets, $Action) {
        if (!isset(self::$Instance)) {
            $c = __CLASS__;
            self::$Instance = new $c($FormatComponets, $Action);
        }
        return self::$Instance;
    }

    /**
     * 
     * @param \REC1\Formats\FormatComponents $FormatComponets
     * @param string $Action
     */
    public function __construct(\REC1\Formats\FormatComponents $FormatComponets, $Action) {
        parent::__construct($FormatComponets, $Action);
    }

    /**
     * 
     * @return string
     */
    public function getTemplate() {
        return "pages/formats/carreras.twig";
    }

    /**
     * 
     * @return string
     */
    public function getAreaURL() {
        return "carreras";
    }

    /**
     * 
     */
    public function initArea() {
        $CarrerasClass = $this->getFormatComponents()->getCarrerasClass();
        $this->initActions();

        $this->addVar("rec1.page.title", "Formatos | Carreras");
        $this->addVar("rec1.carreras.list", $CarrerasClass->getCarreras());
    }

    public function getAdd() {
        $FormatCompo = $this->getFormatComponents();
        $CarrerasCompo = $FormatCompo->getCarrerasClass();
        $Me = $FormatCompo->getUsersClass()->getUserSessionClass()->getFromCookie();

        $carrera_name = filter_input(INPUT_POST, 'new_carrera_name');
        if ($carrera_name) {
            $CarrerasCompo->insertCarrera($carrera_name, $Me);
            $this->addVar("rec1.page.notification", "¡Se añadio la carrera con el nombre $carrera_name a la base de datos!");
        }
    }

    public function getDel() {
        $FormatCompo = $this->getFormatComponents();
        $CarrerasCompo = $FormatCompo->getCarrerasClass();
        $carrera_id = filter_input(INPUT_GET, 'id');

        if ($carrera_id) {
            $carrera_item = $CarrerasCompo->getCarrera($carrera_id);
            if ($carrera_item) {
                $carrera_name = $carrera_item->getName();
                $CarrerasCompo->deleteCarrera($carrera_id);
                $this->addVar("rec1.page.notification", "¡Se borro la carrera $carrera_name!");
            }
        }
    }

    public function getEdit() {
        
    }

    public function getList() {
        
    }

}
