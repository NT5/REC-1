<?php

namespace REC1\Pages\Formats\Areas;

/**
 * 
 */
class Carreras extends \REC1\Pages\Formats\Areas\AreaAbstract implements \REC1\Pages\Formats\Areas\AreaInterface {

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

        $this->addVar("rec1.page.title", "Formatos | Carreras");
        $this->addVar("rec1.carreras.list", $CarrerasClass->getCarreras());
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

}
