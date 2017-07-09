<?php

namespace REC1\Pages\Installer;

/**
 * @todo Documentar
 * @todo Completar metodos
 */
class PageConfig extends \REC1\Components\Page {

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL) {
        parent::__construct($REC1Components);

        $this->initTwigTemplate();

        $this->initVars();
    }

    /**
     * 
     */
    public function initTwigTemplate() {
        if (!$this->CheckPost()) {
            $this->setTemplate("pages/installer/pageconfig.twig");
        } else {
            $this->setTemplate("pages/installer/pageconfig/done.twig");
        }
    }

    /**
     * 
     */
    public function initVars() {
        $this->setVars([
            "page_title" => 'Instalación | Configuración Inicial'
        ]);
    }

    /**
     * 
     * @return bool
     */
    public function CheckPost() {
        $POST = filter_input_array(INPUT_POST);

        $require = [
            "server",
            "user",
            "password",
            "database"
        ];

        if ($POST && \REC1\Util\Functions::checkArray($require, $POST)) {
            $this->saveConfig($POST);
            return TRUE;
        }
        return FALSE;
    }

    /**
     * 
     * @param array $vars
     */
    private function saveConfig($vars) {
        $db_config = $this->getDatabase()->getConnection()->getConfig();

        $db_config->setServer($vars['server']);
        $db_config->setUserName($vars['user']);
        $db_config->setPassword($vars['password']);
        $db_config->setDatabase($vars['database']);

        $this->getPageConfig()->setFirstRun(FALSE);
    }

}
