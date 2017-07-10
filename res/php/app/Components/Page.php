<?php

namespace REC1\Components;

/**
 * @todo Documentar
 */
abstract class Page extends \REC1\Components\REC1Components implements \REC1\Components\Page\PageInterface {

    /**
     *
     * @var \REC1\Components\Twig 
     */
    private $Twig;

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL) {
        if (!$REC1Components) {
            $REC1Components = new \REC1\Components\REC1Components();
        }
        parent::__construct($REC1Components->getUsers(), $REC1Components);

        $this->Twig = new \REC1\Components\Twig();
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
     * @return \REC1\Components\Twig
     */
    public function getTwig() {
        return $this->Twig;
    }

    /**
     * 
     * @return array
     */
    public function getPost() {
        $POST = filter_input_array(INPUT_POST);
        return $POST;
    }

}
