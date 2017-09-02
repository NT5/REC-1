<?php

namespace REC1\Pages\Formats\Areas;

/**
 * 
 */
class Formato14 extends \REC1\Pages\Formats\AreaAbstract {

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

    public function getAreaURL() {
        return "14";
    }

    public function getTemplate() {
        return "pages/formats/formato14.twig";
    }

    public function initArea() {
        $CarrerasClass = $this->getFormatComponents()->getCarrerasClass();
        $PedsClass = $this->getFormatComponents()->getPedsClass();
        $TurnosClass = $this->getFormatComponents()->getTurnosClass();
        $this->initActions();

        $this->addVar('rec1.page.title', 'Formatos | Formato 14');
        $this->addVar("rec1.carreras.list", $CarrerasClass->getCarreras());
        $this->addVar("rec1.peds.list", $PedsClass->getPeds());
        $this->addVar("rec1.turnos.list", $TurnosClass->getTurnos());
    }

    public function getAdd() {
        
    }

    public function getDel() {
        
    }

    public function getEdit() {
        
    }

    public function getList() {
        
    }

}
