<?php

namespace REC1\Components;

/**
 * @todo Documentar
 * Clase que contiene metodos y variables de configuracion de la pagina
 */
class PageConfig extends \REC1\Components\BaseComponents {

    /**
     * @var string Cadena de texto con el titulo de la pagina
     */
    private $page_title;

    /**
     * @var boolean Variable que comprueba el estado de la instalación
     */
    private $first_run;

    /**
     * Regresa instancia de configuración de la pagina web
     * @param string $page_title cadena de texto que se usa en los tags <b>title</b>
     * @param boolean $first_run Es la primera ejecucion de la pagina
     * @param \REC1\Components\BaseComponents $BaseComponents
     */
    public function __construct($page_title = NULL, $first_run = TRUE, \REC1\Components\BaseComponents $BaseComponents = NULL) {
        if (!$BaseComponents) {
            $BaseComponents = new \REC1\Components\BaseComponents();
        }
        parent::__construct($BaseComponents->getLogger(), $BaseComponents->getErrorSet(), $BaseComponents->getWarningSet());

        $this->page_title = ($page_title) ? : "Default";
        $this->first_run = ($first_run == TRUE ? TRUE : FALSE);

        $this->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG, "Nueva instancia de configuración de pagina creada");
    }

    /**
     * 
     * @return string
     */
    public function getPageTitle() {
        return $this->page_title;
    }

    /**
     * 
     * @return boolean
     */
    public function getFirstRun() {
        return $this->first_run;
    }

    /**
     * 
     * @param string $title
     */
    public function setPageTitle($title) {
        $this->page_title = $title;
    }

    /**
     * 
     * @param boolean $first_run
     */
    public function setFirstRun($first_run) {
        $this->first_run = $first_run;
    }

    /**
     * Guarda la configuracion en un archivo .ini
     * @param string $ini Ruta del archivo .ini en el servidor
     * @return boolean
     */
    public function saveToIni($ini = 'config.ini') {

        $this->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG, "Intentando guardar configuración en el archivo $ini...");

        $data = [
            "title" => $this->getPageTitle(),
            "first_run" => ($this->getFirstRun() ? "true" : "false")
        ];
        $ini_area = "REC-1";

        foreach ($data as $index => $value) {
            if (\REC1\Util\Files::set_ini_file($ini, $ini_area, $index, $value)) {
                $this->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG, "La variable %s fue guardada correctamente con el valor: %s", $index, $value);
                continue;
            } else {
                $this->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG_ERROR, "No se pudo guardar el archivo de configuración; operacion abortada");
                $this->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::CANT_SAVE_PAGE_CONFIG_FILE));

                return FALSE;
            }
        }
        $this->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG, "El archivo $ini fue guardado correctamente");
        return TRUE;
    }

    /**
     * Regresa instancia de configuración de la pagina web cargada desde un archivo .ini valido
     * @param string $inifile Ruta del archivo .ini en el servidor
     * @param \REC1\Components\BaseComponents $BaseComponents
     * @return \REC1\Components\PageConfig Regresa instancia de configuracion creada
     */
    public static function fromIniFile($inifile = NULL, \REC1\Components\BaseComponents $BaseComponents = NULL) {

        $BaseComponents = ($BaseComponents) ? : new \REC1\Components\BaseComponents();
        $inifile = ($inifile) ? : 'config.ini';

        $BaseComponents->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG, "Intentando crear configuración con $inifile...");

        $ini = \REC1\Util\Files::load_ini_file($inifile);

        if ($ini) {

            $BaseComponents->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG, "Comprobando estructura de $inifile...");

            $valid_structure = [
                "title",
                "first_run"
            ];
            $ini_area = "REC-1";

            if (\REC1\Util\Functions::checkArray([$ini_area], $ini) && \REC1\Util\Functions::checkArray($valid_structure, $ini[$ini_area])) {
                $instance = new self(
                        $ini[$ini_area]["title"], $ini[$ini_area]["first_run"], $BaseComponents
                );
                $BaseComponents->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG, "Instancia de configuración creada correctamente con $inifile");

                return $instance;
            } else {
                $BaseComponents->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG_ERROR, "El archivo $inifile tiene una estructura invalida");

                $BaseComponents->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::PAGE_CONFIGURATION_INVALID_FORMAT));
                $BaseComponents->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::DEFAULT_PAGE_CONFIGURATION));

                return new self(NULL, NULL, $BaseComponents);
            }
        } else {
            $BaseComponents->setLog(\REC1\Components\Logger\Areas::CORE_CONFIG_ERROR, "El archivo $inifile no pudo ser cargado");

            $BaseComponents->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::CANT_LOAD_PAGE_CONFIGURATION_FILE));
            $BaseComponents->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::DEFAULT_PAGE_CONFIGURATION));

            return new self(NULL, NULL, $BaseComponents);
        }
    }

}
