<?php

namespace REC1;

class REC1 extends \REC1\Factory\ExtendedComponents {

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

        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $BaseComponents);

        $this->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "Nueva instancia %s creada", get_class());

        // $this->run();
    }

    /**
     * 
     * @return \REC1\PageManager
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
     * @return \REC1\Factory\BaseComponents
     */
    private function initBaseComponents() {
        $Logger = new \REC1\Util\Logger();
        $WarningSet = new \REC1\Warning\WarningSet();
        $ErrorSet = new \REC1\Error\ErrorSet();

        $BaseComponents = new \REC1\Factory\BaseComponents($Logger, $ErrorSet, $WarningSet);

        return $BaseComponents;
    }

    /**
     * 
     * @param \REC1\Factory\BaseComponents $BaseComponents
     * @return \REC1\Factory\ExtendedComponents
     */
    private function initExtendedComponents(\REC1\Factory\BaseComponents $BaseComponents) {
        $PageConfig = $this->initPageConfig($BaseComponents);
        $Database = $this->initDatabase($BaseComponents);

        $ExtendedComponents = new \REC1\Factory\ExtendedComponents($Database, $PageConfig, $BaseComponents);

        return $ExtendedComponents;
    }

    /**
     * 
     * @param \REC1\Factory\BaseComponents $BaseComponents
     * @return \REC1\Cookies
     */
    private function initCookies(\REC1\Factory\BaseComponents $BaseComponents) {
        $Cookies = new \REC1\Cookies("uml_rec-1");
        return $Cookies;
    }

    /**
     * 
     * @param \REC1\Factory\BaseComponents $BaseComponents
     * @return \REC1\Config
     */
    private function initPageConfig(\REC1\Factory\BaseComponents $BaseComponents) {
        $BaseComponents->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "Intentando crear instancia de configuración para pagina...");
        $PageConfig = \REC1\Config::fromIniFile($this->getConfigFile(), $BaseComponents);
        $BaseComponents->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "Instancia de configuración creada");

        return $PageConfig;
    }

    /**
     * 
     * @param \REC1\Factory\BaseComponents $BaseComponents
     * @return \REC1\Database
     */
    private function initDatabase(\REC1\Factory\BaseComponents $BaseComponents) {
        $BaseComponents->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "Inicializando componentes de base de datos...");

        $mysqli_config = \REC1\Database\Config::fromIniFile($this->getConfigFile(), $BaseComponents);
        $mysqli_connection = new \REC1\Database\Connection($mysqli_config, $BaseComponents);

        $Database = new \REC1\Database($mysqli_connection, $BaseComponents);

        $BaseComponents->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "Componentes de base de datos iniciados");

        return $Database;
    }

    /**
     * 
     * @param int $ListenType
     * @param string $ListenUrl
     */
    public function runHTML($ListenType = NULL, $ListenUrl = NULL) {

        $this->PageManager = new \REC1\PageManager($ListenType, $ListenUrl, $this);

        $this->initInstall();

        $this->getPageManager()->initPage();

        $this->disposeObjects();

        $this->getPageManager()->getTwig()->setVars([
            'page_title' => $this->getPageConfig()->getPageTitle() . $this->getPageManager()->getTwig()->getVar('page_title'),
            'logs' => $this->getLogger()->getLogs()
        ]);

        $this->getPageManager()->display();
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
        $this->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "Eliminando instancia %s...", get_class());

        $this->disposePageConfig();
        $this->disposeDatabase();

        $this->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "Instancia %s finalizada correctamente", get_class());
        $this->ExecutionTime = ( microtime(true) - self::getExecutionTime() );
        $this->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "%s generada en %sms", get_class(), $this->getExecutionTime());
    }

    /**
     *  
     */
    private function disposePageConfig() {
        if (!$this->getPageConfig()->saveToIni($this->getConfigFile())) {
            $this->addWarning(new \REC1\Warning(\REC1\Warning\Warnings::CANT_SAVE_PAGE_CONFIG_FILE));
        }
    }

    /**
     * 
     */
    private function disposeDatabase() {

        if (!$this->getDatabase()->getConnection()->getConfig()->saveToIni($this->getConfigFile())) {
            $this->addWarning(new \REC1\Warning(\REC1\Warning\Warnings::CANT_SAVE_DATABASE_CONFIG_FILE));
        }

        if ($this->getDatabase()->getConnection()->getMySQLi()) {
            $this->getDatabase()->close();
            $this->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "Base de datos desconectada");
        } else {
            $this->getWarningSet()->addWarning(new \REC1\Warning(\REC1\Warning\Warnings::NO_DATABASE_CONNECTION_TO_CLOSE));
            $this->getLogger()->setLog(\REC1\Util\Logger\Areas::CORE, "No existía una base de datos conectada; ignorando cierre");
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
