<?php

namespace REC1\Pages\Formats;

/**
 * 
 */
interface AreaInterface {

    /**
     * 
     */
    public function initArea();

    /**
     * 
     */
    public function getAreaURL();

    /**
     * 
     */
    public function getTemplate();

    /**
     * 
     */
    public function getVars();
}
