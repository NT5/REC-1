<?php

namespace REC1\Pages\Formats;

/**
 * 
 */
interface ActionInterface {

    /**
     * 
     */
    public function getList();

    /**
     * 
     */
    public function getEdit();

    /**
     * 
     */
    public function getDel();

    /**
     * 
     */
    public function getAdd();
}
