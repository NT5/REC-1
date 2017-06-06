<?php

namespace REC1\Database;

/**
 * Clase controladora de la conexión MySQLi
 */
class Connection extends \REC1\Factory\BaseComponents {

    /**
     * Instancia de configuración 
     * @var \REC1\Database\Config
     */
    private $Config;

    /**
     * Objecto MySQLi
     * @var \mysqli 
     */
    private $MySQLi;

    /**
     * Regresa instancia de conexión MySQLi además de la instancia de configuración
     * @param \REC1\Database\Config $Config
     * @param \REC1\Factory\BaseComponents $BaseComponents
     */
    public function __construct(\REC1\Database\Config $Config = NULL, \REC1\Factory\BaseComponents $BaseComponents = NULL) {
        if (!$BaseComponents) {
            $BaseComponents = new \REC1\Factory\BaseComponents();
        }
        parent::__construct($BaseComponents->getLogger(), $BaseComponents->getErrorSet(), $BaseComponents->getWarningSet());

        $this->Config = ($Config) ? : new \REC1\Database\Config(NULL, NULL, NULL, NULL, $this);

        $this->setLog(\REC1\Util\Logger\Areas::DATABASE_CONNECTION, "Nueva instancia de conexión de base de datos creada");

        $this->connect();
    }

    /**
     * Función que intenta crear instancia MySQLi con la configuración asignada
     */
    public function connect() {
        $this->setLog(\REC1\Util\Logger\Areas::DATABASE_CONNECTION, "Intentando crear instancia de MySQLi...");
        $this->MySQLi = @new \mysqli(
                $this->getConfig()->getServer(), $this->getConfig()->getUserName(), $this->getConfig()->getPassword(), $this->getConfig()->getDatabase()
        );
        if ($this->MySQLi->connect_errno) {
            $this->addError(new \REC1\Error(\REC1\Error\Errors::CANT_CONNECT_MYSQLI_LINK));
            $this->setLog(\REC1\Util\Logger\Areas::DATABASE_CONNECTION_ERROR, "No se pudo crear instancia MySQLi Error: %s (%s)", $this->MySQLi->connect_errno, $this->MySQLi->connect_error);
            $this->MySQLi = NULL;
        } else {
            $this->setLog(\REC1\Util\Logger\Areas::DATABASE_CONNECTION, "Conexion MySQLi creada correctamente");
        }
    }

    /**
     * Regresa Objecto MySQLi
     * @return \mysqli|NULL Instancia <b>MySQLi</b> proporcionada por PHP NULL Si no esata conectado a la base de datos
     */
    public function getMySQLi() {
        return ($this->MySQLi !== NULL && !$this->MySQLi->connect_errno ? $this->MySQLi : NULL);
    }

    /**
     * Regresa instancia de configuración usada en la conexion de la base de datos
     * @return \REC1\Database\Config
     */
    public function getConfig() {
        return $this->Config;
    }

}
