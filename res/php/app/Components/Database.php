<?php

namespace REC1\Components;

/**
 * @todo Documentacion
 * Clase principal que controla y proporciona todos los métodos de la base de datos
 */
class Database extends \REC1\Components\BaseComponents {

    /**
     * @var \REC1\Components\Database\Connection Instancia de <b>\REC1\Components\Database\Connection</b> 
     */
    private $Connection;

    /**
     * @param \REC1\Components\Database\Connection $Connection Instancia de <b>\REC1\Components\Database\Connection</b>
     * @param \REC1\Components\BaseComponents $BaseComponents
     */
    public function __construct(\REC1\Components\Database\Connection $Connection = NULL, \REC1\Components\BaseComponents $BaseComponents = NULL) {
        if (!$BaseComponents) {
            $BaseComponents = new \REC1\Components\BaseComponents();
        }
        parent::__construct($BaseComponents->getLogger(), $BaseComponents->getErrorSet(), $BaseComponents->getWarningSet());

        $this->Connection = ($Connection) ? : new \REC1\Components\Database\Connection(NULL, $this);

        $this->setLog(\REC1\Components\Logger\Areas::DATABASE_METHODS, "Nueva instancia de base de datos creada");
    }

    /**
     * Método que cierra la conexión MySQLi
     */
    public function close() {
        if ($this->getConnection()) {
            $this->getConnection()->getMySQLi()->close();
            $this->setLog(\REC1\Components\Logger\Areas::DATABASE_METHODS, "Conexión MySQLi cerrada");
        } else {
            $this->setLog(\REC1\Components\Logger\Areas::DATABASE_METHODS_ERROR, "Llamada del método 'close' sin establecer una conexión validad a la base de datos");
        }
    }

    /**
     * 
     * @param string $charset
     */
    public function charset($charset) {
        if ($this->getConnection()) {
            mysqli_set_charset($this->getConnection()->getMySQLi(), $charset);
            $this->setLog(\REC1\Components\Logger\Areas::DATABASE_METHODS, "Charset de la base de datos cambiado a %s", $charset);
        }
    }

    /**
     * Ejecuta un <b>mysqli_query</b> a la base de datos
     * @param string $sql Cadena de texto con comando SQL
     * @return mysqli_result Regresa objecto <b>mysqli_result</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public function query($sql) {
        if ($this->getConnection()) {
            return $this->getConnection()->getMySQLi()->query($sql);
        } else {
            $this->setLog(\REC1\Components\Logger\Areas::DATABASE_METHODS_ERROR, "Llamada del método 'query' sin establecer una conexión validad a la base de datos");
        }
        return NULL;
    }

    /**
     * Ejecuta un <b>mysqli_stmt</b> a la base de datos
     * @param string $statement Cadena de texto con comando SQL
     * @return mysqli_stmt Regresa objecto <b>mysqli_stmt</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public function prepare($statement) {
        if ($this->getConnection()) {
            return $this->getConnection()->getMySQLi()->prepare($statement);
        } else {
            $this->setLog(\REC1\Components\Logger\Areas::DATABASE_METHODS_ERROR, "Llamada del método 'prepare' sin establecer una conexión validad a la base de datos");
        }
        return NULL;
    }

    /**
     * Regresa Objecto MySQLi
     * @return \REC1\Components\Database\Connection|NULL Instancia <b>\REC1\Components\Database\Connection</b> proporcionada por
     * la clase de conexión
     */
    public function getConnection() {
        return ($this->Connection ? $this->Connection : NULL);
    }

    /**
     * Regresa una cadena de texto con la descripción del ultimo error
     * @return string Una cadena de texto que describe el error o una cadena de texto
     * vacia si no existe ninguno
     */
    public function getError() {
        return ($this->getConnection() ? mysqli_error($this->getConnection()->getMySQLi()) : "Instancia controladora MySQLi no conectada");
    }

    /**
     * 
     * @return int
     */
    public function getLastId() {
        return ($this->getConnection() ? $this->getConnection()->getMySQLi()->insert_id : 0);
    }

    /**
     * 
     */
    public function disableForeignKeyChecks() {
        $this->query("SET FOREIGN_KEY_CHECKS=0;");
    }

    /**
     * 
     */
    public function enableForeignKeyChecks() {
        $this->query("SET FOREIGN_KEY_CHECKS=1;");
    }

}
