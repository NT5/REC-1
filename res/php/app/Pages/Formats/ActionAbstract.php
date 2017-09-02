<?php

namespace REC1\Pages\Formats;

/**
 * 
 */
abstract class ActionAbstract implements \REC1\Pages\Formats\ActionInterface {

    /**
     *
     * @var \REC1\Pages\Formats\AreaAbstract 
     */
    private $Area;

    /**
     *
     * @var string 
     */
    private $Action;

    /**
     * 
     * @param \REC1\Pages\Formats\AreaAbstract $Area
     * @param string $Action
     */
    public function __construct(\REC1\Pages\Formats\AreaAbstract $Area, $Action) {
        $this->Area = $Area;
        $this->Action = $Action;
    }

    /**
     * 
     */
    public function initActions() {
        switch ($this->getAction()) {
            case "add":
                $this->getAdd();
                break;
            case "del":
                $this->getDel();
                break;
            case "edit":
                $this->getEdit();
                break;
            case "list":
            default:
                $this->getList();
                break;
        }
    }

    /**
     * 
     * @return \REC1\Pages\Formats\AreaAbstract
     */
    public function getArea() {
        return $this->Area;
    }

    /**
     * 
     * @return string
     */
    public function getAction() {
        return $this->Action;
    }

}
