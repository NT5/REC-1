<?php

namespace REC1\Pages\Formats;

/**
 * 
 */
abstract class AreaAbstract extends \REC1\Pages\Formats\ActionAbstract implements \REC1\Pages\Formats\AreaInterface {

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
     * @param \REC1\Formats\FormatComponents $FormatComponets
     * @param string $Action
     */
    abstract public static function getInstance(\REC1\Formats\FormatComponents $FormatComponets, $Action);

    /**
     * 
     * @param \REC1\Formats\FormatComponents $FormatComponets
     * @param string $Action
     */
    public function __construct(\REC1\Formats\FormatComponents $FormatComponets, $Action) {
        $this->FormatComponets = $FormatComponets;
        parent::__construct($this, $Action);
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
