<?php

namespace REC1\Pages\Formats\Areas;

/**
 * 
 */
class AreaManager {

    /**
     *
     * @var \self
     */
    private static $Instance;

    /**
     *
     * @var \REC1\Formats\FormatComponents 
     */
    private $FormatComponets;

    /**
     *
     * @var array 
     */
    private $Areas = [];

    /**
     * 
     * @return self
     */
    public static function getInstance(\REC1\Formats\FormatComponents $Compo) {
        if (!isset(self::$Instance)) {
            $c = __CLASS__;
            self::$Instance = new $c($Compo);
        }
        return self::$Instance;
    }

    /**
     * 
     * @param \REC1\Formats\FormatComponents $Compo
     */
    public function __construct(\REC1\Formats\FormatComponents $Compo) {
        $this->FormatComponets = $Compo;

        $this->initAreas();
    }

    /**
     * 
     */
    private function initAreas() {
        $Compo = $this->getFormatComponents();

        $this->addArea(\REC1\Pages\Formats\Areas\DefaultArea::getInstance($Compo));
        $this->addArea(\REC1\Pages\Formats\Areas\Carreras::getInstance($Compo));
        $this->addArea(\REC1\Pages\Formats\Areas\Peds::getInstance($Compo));
        $this->addArea(\REC1\Pages\Formats\Areas\Turnos::getInstance($Compo));
        $this->addArea(\REC1\Pages\Formats\Areas\Formato12::getInstance($Compo));
    }

    /**
     * 
     * @param string $area
     * @return \REC1\Pages\Formats\Areas\AreaInterface
     */
    public function getArea($area) {
        if (array_key_exists($area, $this->Areas)) {
            return $this->Areas[$area];
        }
        return $this->Areas["default"];
    }

    /**
     * 
     * @param string $area
     */
    public function addArea(\REC1\Pages\Formats\Areas\AreaInterface $area) {
        $this->Areas[$area->getAreaURL()] = $area;
    }

    /**
     * 
     * @return \REC1\Formats\FormatComponents
     */
    public function getFormatComponents() {
        return $this->FormatComponets;
    }

}
