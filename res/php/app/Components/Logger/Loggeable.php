<?php

namespace REC1\Components\Logger;

/**
 * @TODO Documentacion
 */
interface Loggeable {

    /**
     * 
     * @return \REC1\Components\Logger
     */
    public function getLogger();

    /**
     * 
     * @param string $area
     * @param string $string
     * @param string $format
     */
    public function setLog($area, $string, ...$format);
}
