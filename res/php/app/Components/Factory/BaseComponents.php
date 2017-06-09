<?php

namespace REC1\Factory;

/**
 * 
 */
class BaseComponents implements \REC1\Util\Logger\Loggeable, \REC1\Error\ThrowableError, \REC1\Warning\ThrowableWarning {

    /**
     * Objeto con métodos usados en el registro de seguimiento
     * @var \REC1\Util\Logger 
     */
    private $Logger;

    /**
     * Set con errores que puede generar la pagina
     * @var \REC1\Error\ErrorSet 
     */
    private $ErrorSet;

    /**
     * Set con advertencias que puede generar la pagina
     * @var \REC1\Warning\WarningSet
     */
    private $WarningSet;

    /**
     * 
     * @param \REC1\Util\Logger $Logger
     * @param \REC1\Error\ErrorSet $ErrorSet
     * @param \REC1\Warning\WarningSet $WarningSet
     */
    public function __construct(\REC1\Util\Logger $Logger = NULL, \REC1\Error\ErrorSet $ErrorSet = NULL, \REC1\Warning\WarningSet $WarningSet = NULL) {
        $this->Logger = ($Logger) ? : new \REC1\Util\Logger();
        $this->ErrorSet = ($ErrorSet) ? : new \REC1\Error\ErrorSet();
        $this->WarningSet = ($WarningSet) ? : new \REC1\Warning\WarningSet();
    }

    /**
     * 
     * @return \REC1\Util\Logger
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
     * @return \REC1\Error\ErrorSet
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
     * @return \REC1\Warning\WarningSet
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
