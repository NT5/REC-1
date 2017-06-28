<?php

namespace REC1\Components;

/**
 * @todo Documentar
 */
class ExtendedComponents extends \REC1\Components\BaseComponents {

    /**
     * Objeto con métodos usados en el control de la base de datos
     * @var \REC1\Components\Database 
     */
    private $Database;

    /**
     * Objeto con métodos usados en la configuracion de la pagina
     * @var \REC1\Components\PageConfig 
     */
    private $PageConfig;

    /**
     *
     * @var \REC1\Components\Cookies 
     */
    private $Cookies;

    /**
     * 
     * @param \REC1\Components\Database $Database
     * @param \REC1\Components\PageConfig $PageConfig
     * @param \REC1\Components\Cookies $Cookies
     * @param \REC1\Components\BaseComponents $BaseComponents
     */
    public function __construct(\REC1\Components\Database $Database = NULL, \REC1\Components\PageConfig $PageConfig = NULL, \REC1\Components\Cookies $Cookies = NULL, \REC1\Components\BaseComponents $BaseComponents = NULL) {
        if (!$BaseComponents) {
            $BaseComponents = new \REC1\Components\BaseComponents();
        }
        parent::__construct($BaseComponents->getLogger(), $BaseComponents->getErrorSet(), $BaseComponents->getWarningSet());

        $this->Database = ($Database) ? : new \REC1\Components\Database(NULL, $this);
        $this->PageConfig = ($PageConfig) ? : new \REC1\Components\PageConfig(NULL, NULL, $this);
        $this->Cookies = ($Cookies) ? : new \REC1\Components\Cookies();
    }

    /**
     * 
     * @return \REC1\Components\Database
     */
    public function getDatabase() {
        return $this->Database;
    }

    /**
     * 
     * @return \REC1\Components\PageConfig
     */
    public function getPageConfig() {
        return $this->PageConfig;
    }

    /**
     * 
     * @return \REC1\Components\Cookies
     */
    public function getCookies() {
        return $this->Cookies;
    }

}
