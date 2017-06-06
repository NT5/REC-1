<?php

namespace REC1\Warning;

/**
 * 
 */
interface ThrowableWarning {

    /**
     * 
     * @return \REC1\Warning\WarningSet
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
