<?php

namespace REC1\Pages\Installer;

/**
 * @todo Documentar
 * @todo Completar metodos
 */
class Users extends \REC1\Components\Page {

    /**
     * 
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct(\REC1\Components\REC1Components $REC1Components = NULL) {
        parent::__construct($REC1Components);

        $this->setTemplate("pages/installer/users.twig");

        $this->setVars([
            "page_title" => 'Instalación | Configuración de usuarios',
            "logs" => $this->getLogger()->getLogs()
        ]);
    }

}
