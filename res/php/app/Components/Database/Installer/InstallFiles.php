<?php

namespace REC1\Components\Database\Installer;

/**
 * @todo Documentar
 */
class InstallFiles {

    /**
     *
     * @var array
     */
    private static $FileList = [];

    /**
     *
     * @var array 
     */
    private static $BaseDir = array(__DIR__, "..", "..", "..", "..", "..", "sql");

    /**
     * 
     */
    static function init() {

        function addTable($file) {
            $Tables = \REC1\Components\Database\Installer\InstallFilesArea::TABLES;

            InstallFiles::addFile($Tables, \REC1\Util\Functions::parseDir(array_merge(InstallFiles::getBaseDir(), $file)));
        }

        function addData($file) {
            $Data = \REC1\Components\Database\Installer\InstallFilesArea::DATA;

            InstallFiles::addFile($Data, \REC1\Util\Functions::parseDir(array_merge(InstallFiles::getBaseDir(), $file)));
        }

        addTable(array("Tables.sql"));
        addTable(array("formats", "Complementos.sql"));
        addTable(array("formats", "Formato7.sql"));
        addTable(array("formats", "Formato9.sql"));
        addTable(array("formats", "Formato10.sql"));
        addTable(array("formats", "Formato12.sql"));
        addTable(array("formats", "Formato14.sql"));

        addData(array("formats", "data", "Complementos.sql"));
    }

    /**
     * 
     * @param string $area
     * @return array
     */
    public static function getArea($area) {
        if (array_key_exists($area, self::$FileList)) {
            return self::$FileList[$area];
        }
        return [];
    }

    /**
     * 
     * @return int
     */
    public static function getAreasCount() {
        return count(self::getFileArray());
    }

    /**
     * 
     * @return int
     */
    public static function getAreaCount($area) {
        return count(self::getArea($area));
    }

    /**
     * 
     * @param string $area
     * @param string $file
     */
    public static function addFile($area, $file) {
        self::$FileList[$area][] = $file;
    }

    /**
     * 
     * @return array
     */
    public static function getFileArray() {
        return self::$FileList;
    }

    /**
     * 
     * @return array
     */
    public static function getBaseDir() {
        return self::$BaseDir;
    }

}

InstallFiles::init();
