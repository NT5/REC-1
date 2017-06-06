<?php

namespace REC1\Error;

/**
 * 
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
     * @param \REC1\Error $Error
     */
    public function addError(\REC1\Error $Error) {
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
