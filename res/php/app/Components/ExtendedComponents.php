<?php

namespace REC1\Components;

class ExtendedComponents extends \REC1\Components\BaseComponents {

    /**
     * Objeto con métodos usados en el control de la base de datos
     * @var \REC1\Components\Database 
     */
    private $Database;

    /**
     * Objeto con métodos usados en la configuracion de la pagina
     * @var \REC1\Config 
     */
    private $PageConfig;

    /**
     * 
     * @param \REC1\Components\Database $Database
     * @param \REC1\Config $PageConfig
     * @param \REC1\Components\BaseComponents $BaseComponents
     */
    public function __construct(\REC1\Components\Database $Database = NULL, \REC1\Config $PageConfig = NULL, \REC1\Factory\BaseComponents $BaseComponents = NULL) {
        if (!$BaseComponents) {
            $BaseComponents = new \REC1\Components\BaseComponents();
        }
        parent::__construct($BaseComponents->getLogger(), $BaseComponents->getErrorSet(), $BaseComponents->getWarningSet());

        $this->Database = ($Database) ? : new \REC1\Components\Database(NULL, $this);
        $this->PageConfig = ($PageConfig) ? : new \REC1\Config(NULL, NULL, $this);
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
     * @return \REC1\Config
     */
    public function getPageConfig() {
        return $this->PageConfig;
    }

}
