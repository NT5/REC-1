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
     * @param int $ListenType
     * @param string $ListenUrl
     * @param \REC1\Components\REC1Components $REC1Components
     */
    public function __construct($ListenType = NULL, $ListenUrl = NULL, \REC1\Components\REC1Components $REC1Components = NULL) {
        if (!$REC1Components) {
            $REC1Components = new \REC1\Components\REC1Components();
        }
        parent::__construct($REC1Components->getUsers(), $REC1Components->getFormatComponents(), $REC1Components);

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
        return ($Page ? $Page->getTwig() : NULL);
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
                $this->checkUserCount() === FALSE &&
                $this->checkUserLogin() === FALSE
        ) {

            $url_page = filter_input($this->getListenType(), $this->getListenUrl());

            switch ($url_page) {
                case "user":
                    $Page = new \REC1\Pages\User($this);
                    break;
                case "test":
                    $Page = new \REC1\Pages\Test($this);
                    break;
                case "formato":
                    $Page = new \REC1\Pages\Formats($this);
                    break;
                case "page":
                    $Page = new \REC1\Pages\Page($this);
                    break;
                case "home":
                default:
                    $Page = new \REC1\Pages\Home($this);
                    break;
            }

            $this->setPage($Page);

            /**
             * @todo $Me variable in pages
             */
            $Twig = $this->getTwig();
            $Twig->setVar('rec1.user.logged', $this->getLoggedUser());
        }
        $this->initVars();
    }

    /**
     * 
     */
    private function initVars() {
        $Twig = $this->getTwig();
        $PageConfig = $this->getPageConfig();

        $Twig->setVars([
            'rec1.page.title' => \REC1\Util\Functions::strFormat("%config_title | %config_var", array(
                'config_title' => $PageConfig->getPageTitle(),
                'config_var' => $Twig->getVar('rec1.page.title')
            )),
            'rec1.page.navbar' => [
                "home" => [
                    "icon" => "language",
                    "name" => "Inicio"
                ],
                "test" => [
                    "icon" => "track_changes",
                    "name" => "Pagina de prueba"
                ]
            ]
        ]);
    }

    /**
     * 
     * @return type
     */
    private function getLoggedUser() {
        $User = $this->getUsers()->getUserSessionClass();
        return ($User->getFromCookie()) ? : NULL;
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
    private function checkUserLogin() {
        if (!$this->getLoggedUser()) {
            $Page = new \REC1\Pages\Login($this);
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
