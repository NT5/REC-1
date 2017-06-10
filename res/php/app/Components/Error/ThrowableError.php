<?php

namespace REC1\Components\Error;

/**
 * @todo Documentacion
 */
interface ThrowableError {

    /**
     * 
     * @return \REC1\Components\Error\ErrorSet
     */
    public function getErrorSet();

    /**
     * 
     * @param int $Error
     */
    public function addError($Error);

    /**
     * 
     * @return array
     */
    public function getErrors();
}
