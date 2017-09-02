<?php

namespace REC1\Components;

/**
 * @todo Documentar
 */
abstract class Page extends \REC1\Components\REC1Components implements \REC1\Components\Page\PageInterface {

    /**
     *
     * @var string 
     */
    private $Page_Title;

    /**
     *
     * @var string 
     */
    private $Page_Template;

    /**
     *
     * @var \REC1\Components\Twig 
     */
    private $Twig;

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     * @param type $Page_Title
     * @param type $Page_Template
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL, $Page_Title = NULL, $Page_Template = NULL) {
        if (!$REC1Components) {
            $REC1Components = new \REC1\Components\REC1Components();
        }
        parent::__construct($REC1Components->getUsers(), $REC1Components->getFormatComponents(), $REC1Components);

        $this->Page_Title = ($Page_Title) ? : "Default";
        $this->Page_Template = ($Page_Template) ? : "base.twig";

        $this->Twig = new \REC1\Components\Twig();

        $this->setFilters();
    }

    /**
     * 
     */
    private function setFilters() {
        $Twig = $this->getTwig();

        $Twig->addFilter('integerToRoman', function ($number) {
            return \REC1\Util\Functions::integerToRoman($number);
        });
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

    /**
     * 
     * @return string
     */
    public function getPageTitle() {
        return $this->Page_Title;
    }

    /**
     * 
     * @return string
     */
    public function getPageTemplate() {
        return $this->Page_Template;
    }

    /**
     * 
     * @param string $Page_title
     */
    public function setPageTitle($Page_title) {
        $this->Page_Title = $Page_title;
    }

    /**
     * 
     * @param string $Page_template
     */
    public function setPageTemplate($Page_template) {
        $this->Page_Template = $Page_template;
    }

}
