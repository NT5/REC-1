<?php

namespace REC1\Error;

/**
 * 
 */
interface ThrowableError {

    /**
     * 
     * @return \REC1\Error\ErrorSet
     */
    public function getErrorSet();

    /**
     * 
     * @param type $Error
     */
    public function addError($Error);

    /**
     * 
     * @return type
     */
    public function getErrors();
}
