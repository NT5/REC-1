<?php

namespace REC1\Components;

/**
 * @todo Documentar / Mejorar
 */
class PageManager extends \REC1\Components\REC1Components {

    /**
     *
     * @var int 
     */
    private $Listen_Type;

    /**
     *
     * @var string 
     */
    private $Listen_Url;

    /**
     *
     * @var \REC1\Components\Page
     */
    private $Page;

    /**
     *
     * @var \REC1\Components\User 
     */
    private $User;

    /**
     * 
     * @param int $ListenType
     * @param string $ListenUrl
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct($ListenType = NULL, $ListenUrl = NULL, \REC1\Components\REC1Components $REC1Components = NULL) {
        if (!$REC1Components) {
            $REC1Components = new \REC1\Components\REC1Components();
        }
        parent::__construct($REC1Components->getUsers(), $REC1Components);

        $this->Listen_Type = ($ListenType) ? : INPUT_GET;
        $this->Listen_Url = ($ListenUrl) ? : 'p';

        $this->setLog(\REC1\Components\Logger\Areas::PAGE_MANAGER, "Nueva instancia controladora de página creada");
    }

    /**
     * 
     * @return int
     */
    public function getListenType() {
        return $this->Listen_Type;
    }

    /**
     * 
     * @return string
     */
    public function getListenUrl() {
        return $this->Listen_Url;
    }

    /**
     * 
     * @return \REC1\Components\Page
     */
    public function getPage() {
        return $this->Page;
    }

    /**
     * 
     * @param \REC1\Components\Page $page
     */
    private function setPage(\REC1\Components\Page $page) {
        $this->Page = $page;
    }

    /**
     * 
     * @return \REC1\Components\Twig
     */
    public function getTwig() {
        $Page = $this->getPage();
        if ($Page) {
            return $Page->getTwig();
        }
    }

    /**
     * 
     */
    public function display() {
        $Page = $this->getPage();
        if ($Page) {
            echo $this->getPage()->display();
        } else {
            echo "No page class found";
        }
    }

    /**
     * 
     */
    public function initPage() {
        $Page = NULL;

        if (
                $this->checkInstallation() === FALSE &&
                $this->checkWarnings() === FALSE &&
                $this->checkErrors() === FALSE &&
                $this->checkDatabase() === FALSE &&
                $this->checkUserCount() === FALSE
        ) {

            $url_page = filter_input($this->getListenType(), $this->getListenUrl());

            switch ($url_page) {
                case "test":
                    $Page = new \REC1\Pages\Test($this);
                    break;
                case "home":
                default:
                    $Page = new \REC1\Pages\Home($this);
                    break;
            }
            $this->setPage($Page);

            $this->initVars();

            /**
             * @todo Mejorar
             */
            if (!$this->getUser()) {
                $Page = new \REC1\Pages\Login($this);
                $this->setPage($Page);
            }
        }
    }

    private function initVars() {
        $this->initUser()

        ;
    }

    private function initUser() {
        $User = $this->getUsers();
        $Twig = $this->getTwig();

        $cookie_session = $this->getCookies()->getCookie('session');

        if ($cookie_session) {
            $user_data = $User->getUserSessionClass()->getUser($cookie_session);
            if ($user_data) {
                $this->User = $user_data;
                $Twig->setVar('rec1.user.logged', $this->User);
            }
        }
    }

    public function getUser() {
        return $this->User;
    }

    /**
     * 
     * @return boolean
     */
    private function checkInstallation() {
        $PageConfig = $this->getPageConfig();

        if ($PageConfig->getFirstRun()) {
            $Page = new \REC1\Pages\Installer\PageConfig($this);

            $this->setPage($Page);

            return TRUE;
        }
        return FALSE;
    }

    /**
     * 
     * @return boolean
     */
    private function checkDatabase() {
        $Installer = new \REC1\Components\Database\Installer($this);
        if (!$Installer->isInstalled()) {
            $Installer->Install();

            $Page = new \REC1\Pages\Installer\Database($this);

            $this->setPage($Page);

            return TRUE;
        }
        return FALSE;
    }

    /**
     * 
     * @return boolean
     */
    private function checkUserCount() {
        $Users = $this->getUsers();

        if ($Users->getCountUsers() <= 0) {
            $Page = new \REC1\Pages\Installer\Users($this);

            $this->setPage($Page);

            return TRUE;
        }

        return FALSE;
    }

    /**
     * 
     * @return boolean
     */
    private function checkErrors() {
        foreach ($this->getErrors() as $error) {

            switch ($error->getErrorCode()) {
                case \REC1\Components\Error\Errors::CANT_CREATE_DATABASE_CONTROLLER:
                case \REC1\Components\Error\Errors::CANT_CREATE_DATABASE_CONNECTION:
                case \REC1\Components\Error\Errors::CANT_CREATE_DATABASE_CONFIG:
                case \REC1\Components\Error\Errors::CANT_CONNECT_MYSQLI_LINK:
                    $Page = new \REC1\Pages\Errors($this, $error->getErrorCode());
                    $this->setPage($Page);

                    return TRUE;
            }
        }

        return FALSE;
    }

    /**
     * 
     * @return boolean
     */
    private function checkWarnings() {
        foreach ($this->getWarnings() as $warning) {

            switch ($warning->getWarningCode()) {
                case \REC1\Components\Warning\Warnings::DEFAULT_PAGE_CONFIGURATION:
                    $this->setPage(new \REC1\Pages\Installer\PageConfig($this));

                    return TRUE;
            }
        }
        return FALSE;
    }

}
