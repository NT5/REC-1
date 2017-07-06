<?php

namespace REC1\Components;

/**
 * @todo Documentacion
 */
class BaseComponents implements \REC1\Components\Logger\Loggeable, \REC1\Components\Error\ThrowableError, \REC1\Components\Warning\ThrowableWarning {

    /**
     * Objeto con métodos usados en el registro de seguimiento
     * @var \REC1\Components\Logger 
     */
    private $Logger;

    /**
     * Set con errores que puede generar la pagina
     * @var \REC1\Components\Error\ErrorSet 
     */
    private $ErrorSet;

    /**
     * Set con advertencias que puede generar la pagina
     * @var \REC1\Components\Warning\WarningSet
     */
    private $WarningSet;

    /**
     * 
     * @param \REC1\Util\Logger $Logger
     * @param \REC1\Error\ErrorSet $ErrorSet
     * @param \REC1\Warning\WarningSet $WarningSet
     */
    public function __construct(\REC1\Components\Logger $Logger = NULL, \REC1\Components\Error\ErrorSet $ErrorSet = NULL, \REC1\Components\Warning\WarningSet $WarningSet = NULL) {
        $this->Logger = ($Logger) ? : new \REC1\Components\Logger();
        $this->ErrorSet = ($ErrorSet) ? : new \REC1\Components\Error\ErrorSet();
        $this->WarningSet = ($WarningSet) ? : new \REC1\Components\Warning\WarningSet();
    }

    /**
     * 
     * @return \REC1\Components\Logger
     */
    public function getLogger() {
        return $this->Logger;
    }

    /**
     * @param string $area
     * @param string $string
     * @param string $format
     */
    public function setLog($area, $string, ...$format) {
        $this->getLogger()->setLog($area, $string, ...$format);
    }

    /**
     * 
     * @return \REC1\Components\Error\ErrorSet
     */
    public function getErrorSet() {
        return $this->ErrorSet;
    }

    /**
     * 
     * @param type $Error
     */
    public function addError($Error) {
        $this->getErrorSet()->addError($Error);
    }

    /**
     * 
     * @return array
     */
    public function getErrors() {
        return $this->getErrorSet()->getErrors();
    }

    /**
     * @return \REC1\Components\Warning\WarningSet
     */
    public function getWarningSet() {
        return $this->WarningSet;
    }

    /**
     * 
     * @param type $Warning
     */
    public function addWarning($Warning) {
        $this->getWarningSet()->addWarning($Warning);
    }

    /**
     * @return array
     */
    public function getWarnings() {
        return $this->getWarningSet()->getWarnings();
    }

}
