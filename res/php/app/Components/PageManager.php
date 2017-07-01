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
     * @var type 
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
        if ($this->getPage()) {
            return $this->getPage()->getTwig();
        }
    }

    /**
     * 
     */
    public function display() {
        if ($this->getPage()) {
            echo $this->getPage()->display();
        }
    }

    /**
     * 
     */
    public function initPage() {
        /*
          if (
          $this->checkFirstRun() === FALSE &&
          $this->checkWarnings() === FALSE &&
          $this->checkErrors() === FALSE &&
          $this->checkUserCount() === FALSE
          ) {

          $url_page = filter_input($this->getListenType(), $this->getListenUrl());

          switch ($url_page) {
          case "home":
          default:
          $this->Page = new \REC1\Pages\Home($this);
          break;
          }
          $this->setUpUser();
          }
         * 
         */

        $this->Page = new \REC1\Pages\Home($this);
    }

    public function setUpUser() {
        $cookie_session = $this->getCookies()->getCookie('session');
        if ($cookie_session) {
            $user = $this->getUsers()->getUserSessionClass()->getUser($cookie_session);
            if ($user) {
                $this->User = $user;
                $this->getTwig()->setVar('user_data', $this->User);
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
    private function checkFirstRun() {
        if ($this->getPageConfig()->getFirstRun()) {
            $page = new \REC1\Pages\FirstRun($this, 1);

            $this->setPage($page);
            return TRUE;
        }
        return FALSE;
    }

    /**
     * 
     * @return boolean
     */
    private function checkUserCount() {
        $users = $this->getUsers()->getCountUsers();

        if ($users <= 0) {
            $page = new \REC1\Pages\FirstRun($this, 2);

            $this->setPage($page);
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
                    $this->setPage(new \REC1\Pages\Errors($this, $error->getErrorCode()));
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
                    $this->setPage(new \REC1\Pages\FirstRun($this, 1));
                    return TRUE;
            }
        }
        return FALSE;
    }

}
