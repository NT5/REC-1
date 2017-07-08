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

    private function initTwigTemplate() {
        if (!$this->CheckPost()) {
            $this->setTemplate("pages/installer/pageconfig.twig");
        } else {
            $this->setTemplate("pages/installer/pageconfig/config_done.twig");
        }
    }

    private function initVars() {
        $this->setVars([
            "page_title" => 'Instalación | Configuración Inicial'
        ]);
    }

    /**
     * 
     * @return bool
     */
    private function CheckPost() {
        $POST = filter_input_array(INPUT_POST);

        $require = [
            "server",
            "user",
            "password",
            "database"
        ];

        if ($POST && \REC1\Util\Functions::checkArray($require, $POST)) {
            $db_config = $this->getDatabase()->getConnection()->getConfig();

            $db_config->setServer($POST['server']);
            $db_config->setUserName($POST['user']);
            $db_config->setPassword($POST['password']);
            $db_config->setDatabase($POST['database']);

            $this->getPageConfig()->setFirstRun(FALSE);

            return TRUE;
        }
        return FALSE;
    }

}
