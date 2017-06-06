<?php

namespace REC1\Util\Logger;

/**
 * TODO
 */
interface Loggeable {

    /**
     * 
     * @return \REC1\Util\Logger
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
