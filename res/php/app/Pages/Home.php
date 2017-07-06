<?php

namespace REC1\Pages;

/**
 * 
 */
class Home extends \REC1\Components\Page {

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL) {
        parent::__construct($REC1Components);
        $this->setTemplate("base.twig");
        $this->setVar('logs', $this->getLogger()->getLogs());
        $this->setVar('page_title', 'Home');
    }

}
