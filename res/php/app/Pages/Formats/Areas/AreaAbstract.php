<?php

namespace REC1\Pages\Formats\Areas;

/**
 * 
 */
abstract class AreaAbstract {

    /**
     *
     * @var array 
     */
    private $Vars = [];

    /**
     *
     * @var \REC1\Formats\FormatComponents 
     */
    private $FormatComponets;

    /**
     * 
     */
    abstract public static function getInstance(\REC1\Formats\FormatComponents $FormatComponets);

    /**
     * 
     * @param \REC1\Formats\FormatComponents $FormatComponets
     */
    public function __construct(\REC1\Formats\FormatComponents $FormatComponets) {
        $this->FormatComponets = $FormatComponets;
    }

    /**
     * 
     * @param string $name
     * @param mixed $val
     */
    protected function addVar($name, $val) {
        $this->Vars[$name] = $val;
    }

    /**
     * 
     * @return array
     */
    public function getVars() {
        return $this->Vars;
    }

    /**
     * 
     * @return \REC1\Formats\FormatComponents
     */
    public function getFormatComponents() {
        return $this->FormatComponets;
    }

}
