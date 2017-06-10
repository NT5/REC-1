<?php

namespace REC1\Components\Error;

/**
 * @todo Documentacion
 */
class ErrorSet {

    /**
     *
     * @var array 
     */
    private $Errors;

    /**
     * 
     * @param self $Errors
     */
    public function __construct(self $Errors = NULL) {
        $this->Errors = [];

        if ($Errors !== NULL) {
            foreach ($Errors->getErrors() as $value) {
                $this->addError($value);
            }
        }
    }

    /**
     * 
     * @param \REC1\Components\Error $Error
     */
    public function addError(\REC1\Components\Error $Error) {
        $this->Errors[] = $Error;
    }

    /**
     * 
     * @return array
     */
    public function getErrors() {
        return $this->Errors;
    }

}
