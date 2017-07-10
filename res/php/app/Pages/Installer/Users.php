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

        $this->initTwigTemplate();
        $this->initVars();
    }

    /**
     * 
     * @return boolean
     */
    public function CheckPost() {
        $POST = $this->getPost();

        $require = [
            "username",
            "email"
        ];

        if ($POST && \REC1\Util\Functions::checkArray($require, $POST)) {
            $User = $this->saveUser($POST);
            if ($User !== FALSE) {
                $this->setVar("token", $User->getToken());
            }
            return TRUE;
        }
        return FALSE;
    }

    /**
     * 
     */
    public function initTwigTemplate() {
        if (!$this->CheckPost()) {
            $this->setTemplate("pages/installer/users.twig");
        } else {
            $this->setTemplate("pages/installer/users/done.twig");
        }
    }

    /**
     * 
     */
    public function initVars() {
        $this->setVars([
            "page_title" => 'Instalación | Configuración de usuarios'
        ]);
    }

    /**
     * 
     * @param array $POST
     * @return \REC1\Components\Users\User|boolean
     */
    private function saveUser($POST) {
        $Users = $this->getUsers();

        $User = $Users->insertUser($POST['username'], $POST['email'], 0, 1);

        return $User;
    }

}
