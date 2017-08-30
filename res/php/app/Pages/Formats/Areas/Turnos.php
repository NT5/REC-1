<?php

namespace REC1\Pages\Formats\Areas;

/**
 * 
 */
class Turnos extends \REC1\Pages\Formats\Areas\AreaAbstract implements \REC1\Pages\Formats\Areas\AreaInterface {

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
        $TurnosClass = $this->getFormatComponents()->getTurnosClass();

        $this->addVar("rec1.page.title", "Formatos | Turnos");
        $this->addVar("rec1.turnos.list", $TurnosClass->getTurnos());
    }

    /**
     * 
     * @return string
     */
    public function getTemplate() {
        return "pages/formats/turnos.twig";
    }

    /**
     * 
     * @return string
     */
    public function getAreaURL() {
        return "turnos";
    }

}
