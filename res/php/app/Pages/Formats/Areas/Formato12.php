<?php

namespace REC1\Pages\Formats\Areas;

/**
 * 
 */
class Formato12 extends \REC1\Pages\Formats\Areas\AreaAbstract implements \REC1\Pages\Formats\Areas\AreaInterface {

    /**
     *
     * @var \self
     */
    private static $Instance;

    /**
     * 
     * @return self
     */
    public static function getInstance(\REC1\Formats\FormatComponents $FormatComponets) {
        if (!isset(self::$Instance)) {
            $c = __CLASS__;
            self::$Instance = new $c($FormatComponets);
        }
        return self::$Instance;
    }

    /**
     * 
     * @param \REC1\Formats\FormatComponents $FormatComponets
     */
    public function __construct(\REC1\Formats\FormatComponents $FormatComponets) {
        parent::__construct($FormatComponets);

        $CarrerasClass = $this->getFormatComponents()->getCarrerasClass();
        $PedsClass = $this->getFormatComponents()->getPedsClass();
        $TurnosClass = $this->getFormatComponents()->getTurnosClass();

        $this->addVar("rec1.page.title", "Formatos | Formato 12");
        $this->addVar("rec1.carreras.list", $CarrerasClass->getCarreras());
        $this->addVar("rec1.peds.list", $PedsClass->getPeds());
        $this->addVar("rec1.turnos.list", $TurnosClass->getTurnos());
    }

    /**
     * 
     * @return string
     */
    public function getTemplate() {
        return "pages/formats/formato12.twig";
    }

    /**
     * 
     * @return string
     */
    public function getAreaURL() {
        return "12";
    }

}
