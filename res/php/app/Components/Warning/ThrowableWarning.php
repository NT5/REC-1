<?php

namespace REC1\Components\Warning;

/**
 * @todo Documentacion
 */
interface ThrowableWarning {

    /**
     * 
     * @return \REC1\Components\Warning\WarningSet
     */
    public function getWarningSet();

    /**
     * 
     * @param type $Warning
     */
    public function addWarning($Warning);

    /**
     * 
     * @return type
     */
    public function getWarnings();
}
