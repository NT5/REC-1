<?php

namespace REC1\Warning;

/**
 * 
 */
class WarningSet {

    /**
     *
     * @var array 
     */
    private $Warnings;

    /**
     * 
     * @param self $Warning
     */
    public function __construct(self $Warning = NULL) {
        $this->Warnings = [];

        if ($Warning !== NULL) {
            foreach ($Warning->getWarnings() as $value) {
                $this->addWarning($value);
            }
        }
    }

    /**
     * 
     * @param \REC1\Warning $Warning
     */
    public function addWarning(\REC1\Warning $Warning) {
        $this->Warnings[] = $Warning;
    }

    /**
     * 
     * @return array
     */
    public function getWarnings() {
        return $this->Warnings;
    }

}
