<?php

namespace REC1\Factory;

class ExtendedComponents extends \REC1\Factory\BaseComponents {

    /**
     * Objeto con métodos usados en el control de la base de datos
     * @var \REC1\Database 
     */
    private $Database;

    /**
     * Objeto con métodos usados en la configuracion de la pagina
     * @var \REC1\Config 
     */
    private $PageConfig;

    /**
     * 
     * @param \REC1\Database $Database
     * @param \REC1\Config $PageConfig
     * @param \REC1\Factory\BaseComponents $BaseComponents
     */
    public function __construct(\REC1\Database $Database = NULL, \REC1\Config $PageConfig = NULL, \REC1\Factory\BaseComponents $BaseComponents = NULL) {
        if (!$BaseComponents) {
            $BaseComponents = new \REC1\Factory\BaseComponents();
        }
        parent::__construct($BaseComponents->getLogger(), $BaseComponents->getErrorSet(), $BaseComponents->getWarningSet());

        $this->Database = ($Database) ? : new \REC1\Database(NULL, $this);
        $this->PageConfig = ($PageConfig) ? : new \REC1\Config(NULL, NULL, $this);
    }

    /**
     * 
     * @return \REC1\Database
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
