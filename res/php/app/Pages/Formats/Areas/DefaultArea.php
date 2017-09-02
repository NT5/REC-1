<?php

namespace REC1\Pages\Formats\Areas;

/**
 * 
 */
class DefaultArea extends \REC1\Pages\Formats\AreaAbstract {

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
        return "pages/formats.twig";
    }

    /**
     * 
     * @return string
     */
    public function getAreaURL() {
        return "default";
    }

    /**
     * 
     */
    public function initArea() {
        $this->addVar("rec1.page.title", "Formatos");

        $this->initActions();
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
