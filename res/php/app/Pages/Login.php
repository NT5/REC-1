<?php

namespace REC1\Pages;

/**
 * 
 */
class Login extends \REC1\Components\Page {

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
            "token"
        ];

        if ($POST && \REC1\Util\Functions::checkArray($require, $POST)) {
            $Users = $this->getUsers();
            $UserToken = $Users->getUserTokenClass();
            $UserSession = $Users->getUserSessionClass();

            $User = $UserToken->getUser($POST['token']);
            if ($User) {

                $token = $UserSession->generateToken();
                $UserSession->insertToken($User->getId(), $token);

                $this->getCookies()->setCookie("session", $token);

                return TRUE;
            }
            return FALSE;
        }
        return NULL;
    }

    /**
     * 
     */
    public function initTwigTemplate() {
        switch ($this->CheckPost()) {
            case NULL:
            case FALSE:
                $this->setTemplate('pages/login.twig');
                break;
            case TRUE:
            default:
                $this->setTemplate('pages/login/done.twig');
                break;
        }
    }

    /**
     * 
     */
    public function initVars() {
        $this->setVar('page_title', 'Iniciar sesión');
    }

}
