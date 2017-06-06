<?php

namespace REC1\Pages;

/**
 * 
 */
class Home extends \REC1\Pages\Page {

    /**
     * 
     * @param \REC1\Factory\REC1Components $REC1Components
     */
    public function __construct(\REC1\Factory\REC1Components $REC1Components = NULL) {
        parent::__construct($REC1Components);
            $this->setTemplate("base.twig");
    }
}
