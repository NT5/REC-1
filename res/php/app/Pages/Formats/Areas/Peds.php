<?php

namespace REC1\Pages\Formats\Areas;

/**
 * 
 */
class Peds extends \REC1\Pages\Formats\AreaAbstract {

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
        return "pages/formats/peds.twig";
    }

    /**
     * 
     * @return string
     */
    public function getAreaURL() {
        return "peds";
    }

    /**
     * 
     */
    public function initArea() {
        $PedsClass = $this->getFormatComponents()->getPedsClass();
        $this->initActions();

        $this->addVar("rec1.page.title", "Formatos | Peds");
        $this->addVar("rec1.peds.list", $PedsClass->getPeds());
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
