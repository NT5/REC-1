<?php

namespace REC1\Components\Database;

/**
 * 
 */
class Installer extends \REC1\Components\ExtendedComponents {

    /**
     * 
     * @param \REC1\Components\ExtendedComponents $ExtendedComponents
     */
    public function __construct(\REC1\Components\ExtendedComponents $ExtendedComponents) {
        if (!$ExtendedComponents) {
            $ExtendedComponents = new \REC1\Components\ExtendedComponents();
        }
        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $ExtendedComponents->getCookies(), $ExtendedComponents);
    }

    /**
     * Regresa un valor TRUE si la tabla Install_Data se encuentra en la base de datos configurada, FALSE si no existe
     * @return boolean
     */
    public function isInstalled() {
        $Database = $this->getDatabase();

        $is_installed = $Database->query("SHOW TABLES LIKE 'Install_Data'");
        return ($is_installed && $is_installed->num_rows > 0 ? TRUE : FALSE);
    }

    /**
     * Lanza secuencia de comandos que comprueba y realiza la instalación de las tablas SQL
     */
    public function Install() {
        $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Comprobando si las tablas SQL están instaladas...");

        if ($this->isInstalled() === FALSE) {
            $this->makeInstall();
            return;
        }
        $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Las tablas están instaladas, no es necesario realizar instalación");
    }

    /**
     * Realiza secuencia de comandos para la instalación de tablas SQL.
     */
    private function makeInstall() {
        $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "No se encontró una instalación valida, procediendo a crear una...");
        $this->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::NO_TABLES_INSTALLATION));

        $Database = $this->getDatabase();

        foreach (\REC1\Components\Database\Installer\InstallFiles::getFileArray() as $area_key => $area_value) {
            $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Cargando archivos del area %s...", $area_key);

            $this->installArea($area_value);

            $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Archivos del area %s instalados correctamente", $area_key);
        }

        $Database->query("INSERT INTO Install_Data VALUES(NOW());");

        $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Instalación de todos los archivos completada correctamente");
    }

    /**
     * 
     * @param array $area
     */
    private function installArea($area) {
        foreach ($area as $file_key => $file_value) {
            $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Cargando archivo %s...", $file_key);

            $file_commands = \REC1\Components\Database\Util::sqlFromFile($file_value);

            if ($file_commands) {
                $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Archivo SQL cargado desde %s", $file_value);
                $this->installFile($file_commands);
            } else {
                $this->addError(new \REC1\Components\Error(\REC1\Components\Error\Errors::INSTALLATION_TABLE_FILE_NOT_FOUND));
                $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER_ERROR, "El archivo SQL %s no pudo ser encontrado; instalación fallida", $file_value);
            }

            $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Fin de la carga del archivo %s.", $file_key);
        }
    }

    /**
     * 
     * @param array $file_commands
     */
    private function installFile($file_commands) {
        $Database = $this->getDatabase();

        $total_commands = count($file_commands);
        for ($i = 0; $total_commands > $i; $i++) {
            $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Ejecutando comando %s de %s...", ($i + 1), $total_commands);
            $query = $Database->query($file_commands[$i]);
            if ($query) {
                $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER, "Comando %s ejecutado correctamente", ($i + 1));
            } else {
                $this->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::CANT_EXECUTE_INSTALLATION_TABLE_COMMAND));
                $this->setLog(\REC1\Components\Logger\Areas::CORE_INSTALLER_ERROR, "El comando %s no se ejecuto correctamente Error: %s", ($i + 1), $Database->getError());
            }
        }
    }

}
