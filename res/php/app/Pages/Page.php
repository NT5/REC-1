<?php

namespace REC1\Pages;

/**
 * 
 */
abstract class Page extends \REC1\Factory\REC1Components {

    /**
     *
     * @var \REC1\Twig 
     */
    private $Twig;

    /**
     * 
     * @param \REC1\Factory\REC1Components $REC1Components
     */
    public function __construct(\REC1\Factory\REC1Components $REC1Components = NULL) {
        if (!$REC1Components) {
            $REC1Components = new \REC1\Factory\AddDateComponents();
        }
        parent::__construct($REC1Components->getUsers(), $REC1Components);

        $this->Twig = new \REC1\Twig();
    }

    /**
     * 
     * @param string $vars
     */
    public function setVars($vars) {
        $this->getTwig()->setVars($vars);
    }

    /**
     * 
     * @param string $name
     * @param string $value
     */
    public function setVar($name, $value) {
        $this->getTwig()->setVar($name, $value);
    }

    /**
     * 
     * @param string $template
     */
    public function setTemplate($template) {
        $this->getTwig()->setTemplate($template);
    }

    /**
     * 
     * @return string
     */
    public function display() {
        return $this->getTwig()->getRender();
    }

    /**
     * 
     * @return \REC1\Twig
     */
    public function getTwig() {
        return $this->Twig;
    }

}
