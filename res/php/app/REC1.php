<?php

namespace REC1;

class REC1 extends \REC1\Components\REC1Components {

    /**
     *
     * @var \self 
     */
    private static $Instance;

    /**
     *
     * @var \REC1\PageManager 
     */
    private $PageManager;

    /**
     * @var float Guarda el tiempo de ejecución en milisegundos
     */
    private $ExecutionTime = 0;

    /**
     * Ruta del archivo .ini que contiene la configuración de la pagina
     * @var string
     */
    private $ConfigFile;

    /**
     * 
     * @return self
     */
    public static function getInstance() {
        if (!isset(self::$Instance)) {
            $c = __CLASS__;
            self::$Instance = new $c;
        }
        return self::$Instance;
    }

    public function __construct() {

        $this->ExecutionTime = microtime(true);
        $this->ConfigFile = \REC1\Util\Functions::parseDir(array(__DIR__, "..", "..", "..", "config.ini"));

        $BaseComponents = $this->initBaseComponents();
        $ExtendedComponents = $this->initExtendedComponents($BaseComponents);
        $REC1Components = $this->initREC1Components($ExtendedComponents);

        parent::__construct($REC1Components->getUsers(), $ExtendedComponents);

        $this->getLogger()->setLog(\REC1\Components\Logger\Areas::CORE, "Nueva instancia %s creada", get_class());

        // $this->run();
    }

    /**
     * 
     * @return \REC1\Components\PageManager
     */
    public function getPageManager() {
        return $this->PageManager;
    }

    /**
     * 
     * @return string
     */
    public function getConfigFile() {
        return $this->ConfigFile;
    }

    /**
     * 
     * @return float
     */
    public function getExecutionTime() {
        return $this->ExecutionTime;
    }

    /**
     * 
     * @return \REC1\Components\BaseComponents
     */
    private function initBaseComponents() {
        $Logger = new \REC1\Components\Logger();
        $WarningSet = new \REC1\Components\Warning\WarningSet();
        $ErrorSet = new \REC1\Components\Error\ErrorSet();

        $BaseComponents = new \REC1\Components\BaseComponents($Logger, $ErrorSet, $WarningSet);

        return $BaseComponents;
    }

    /**
     * 
     * @param \REC1\Components\BaseComponents $BaseComponents
     * @return \REC1\Components\ExtendedComponents
     */
    private function initExtendedComponents(\REC1\Components\BaseComponents $BaseComponents) {
        $PageConfig = $this->initPageConfig($BaseComponents);
        $Database = $this->initDatabase($BaseComponents);
        $Cookies = $this->initCookies($BaseComponents);

        $ExtendedComponents = new \REC1\Components\ExtendedComponents($Database, $PageConfig, $Cookies, $BaseComponents);

        return $ExtendedComponents;
    }

    /**
     * 
     * @param \REC1\Components\ExtendedComponents $ExtendedComponents
     * @return \REC1\Components\REC1Components
     */
    private function initREC1Components(\REC1\Components\ExtendedComponents $ExtendedComponents) {
        $Users = new \REC1\Components\Users($ExtendedComponents, NULL, NULL);

        $REC1Components = new \REC1\Components\REC1Components($Users, $ExtendedComponents);

        return $REC1Components;
    }

    /**
     * 
     * @param \REC1\Components\BaseComponents $BaseComponents
     * @return \REC1\Components\Cookies
     */
    private function initCookies(\REC1\Components\BaseComponents $BaseComponents) {
        $Cookies = new \REC1\Components\Cookies("uml_rec-1", $BaseComponents);
        return $Cookies;
    }

    /**
     * 
     * @param \REC1\Components\BaseComponents $BaseComponents
     * @return \REC1\Components\PageConfig
     */
    private function initPageConfig(\REC1\Components\BaseComponents $BaseComponents) {
        $Logger = $BaseComponents->getLogger();

        $Logger->setLog(\REC1\Components\Logger\Areas::CORE, "Intentando crear instancia de configuración para pagina...");

        $PageConfig = \REC1\Components\PageConfig::fromIniFile($this->getConfigFile(), $BaseComponents);

        $Logger->setLog(\REC1\Components\Logger\Areas::CORE, "Instancia de configuración creada");

        return $PageConfig;
    }

    /**
     * 
     * @param \REC1\Components\BaseComponents $BaseComponents
     * @return \REC1\Components\Database
     */
    private function initDatabase(\REC1\Components\BaseComponents $BaseComponents) {
        $Logger = $BaseComponents->getLogger();

        $Logger->setLog(\REC1\Components\Logger\Areas::CORE, "Inicializando componentes de base de datos...");

        $mysqli_config = \REC1\Components\Database\Config::fromIniFile($this->getConfigFile(), $BaseComponents);
        $mysqli_connection = new \REC1\Components\Database\Connection($mysqli_config, $BaseComponents);

        $Database = new \REC1\Components\Database($mysqli_connection, $BaseComponents);

        $Logger->setLog(\REC1\Components\Logger\Areas::CORE, "Componentes de base de datos iniciados");

        return $Database;
    }

    /**
     * 
     * @param int $ListenType
     * @param string $ListenUrl
     */
    public function runHTML($ListenType = NULL, $ListenUrl = NULL) {

        $this->PageManager = new \REC1\Components\PageManager($ListenType, $ListenUrl, $this);

        // $this->initInstall();

        $PageManager = $this->getPageManager();

        $PageManager->initPage();

        $this->disposeObjects();

        $Twig = $PageManager->getTwig();

        $Twig->setVars([
            'page_title' => $this->getPageConfig()->getPageTitle() . " | " . $Twig->getVar('page_title'),
            'logs' => $this->getLogger()->getLogs()
        ]);

        $PageManager->display();
    }

    /**
     * <p>
     * Borra de forma segura todos objetos que la aplicación uso
     * </p>
     * <br/>
     * Se recomienda usar este método cuando se finalice la aplicación
     * o estes seguro de no usar ningun metodo de base de datos o de configuración
     */
    private function disposeObjects() {
        $Logger = $this->getLogger();

        $Logger->setLog(\REC1\Components\Logger\Areas::CORE, "Eliminando instancia %s...", get_class());

        $this->disposePageConfig();
        $this->disposeDatabase();

        $Logger->setLog(\REC1\Components\Logger\Areas::CORE, "Instancia %s finalizada correctamente", get_class());

        $this->ExecutionTime = ( microtime(true) - self::getExecutionTime() );

        $Logger->setLog(\REC1\Components\Logger\Areas::CORE, "%s generada en %sms", get_class(), $this->getExecutionTime());
    }

    /**
     *  
     */
    private function disposePageConfig() {
        $PageConfig = $this->getPageConfig();

        if (!$PageConfig->saveToIni($this->getConfigFile())) {
            $this->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::CANT_SAVE_PAGE_CONFIG_FILE));
        }
    }

    /**
     * 
     */
    private function disposeDatabase() {
        $Database = $this->getDatabase();
        $Connection = $Database->getConnection();
        $Logger = $this->getLogger();

        if (!$Connection->getConfig()->saveToIni($this->getConfigFile())) {
            $this->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::CANT_SAVE_DATABASE_CONFIG_FILE));
        }

        if ($Connection->getMySQLi()) {
            $Database->close();
            $Logger->setLog(\REC1\Components\Logger\Areas::CORE, "Base de datos desconectada");
        } else {
            $this->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::NO_DATABASE_CONNECTION_TO_CLOSE));
            $Logger->setLog(\REC1\Components\Logger\Areas::CORE, "No existía una base de datos conectada; ignorando cierre");
        }
    }

    /**
     * 
     */
    private function initInstall() {
        if ($this->getDatabase()->getConnection()->getMySQLi()) {
            $this->getDatabase()->charset('utf8');

            $Installer = new \REC1\Util\Installer($this);
            $Installer->Install();
        }
    }

}
