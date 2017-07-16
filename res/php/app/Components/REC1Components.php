<?php

namespace REC1\Components;

/**
 * 
 */
class REC1Components extends \REC1\Components\ExtendedComponents {

    /**
     *
     * @var \REC1\Components\Users
     */
    private $Users;

    /**
     *
     * @var \REC1\Formats\FormatComponents
     */
    private $FormatComponents;

    /**
     * 
     * @param \REC1\Components\Users $Users
     * @param \REC1\Formats\FormatComponents $FormatComponents
     * @param \REC1\Components\ExtendedComponents $ExtendedComponents
     */
    public function __construct(\REC1\Components\Users $Users = NULL, \REC1\Formats\FormatComponents $FormatComponents = NULL, \REC1\Components\ExtendedComponents $ExtendedComponents = NULL) {
        if (!$ExtendedComponents) {
            $ExtendedComponents = new \REC1\Components\ExtendedComponents();
        }
        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $ExtendedComponents->getCookies(), $ExtendedComponents);

        $this->Users = ($Users) ? : new \REC1\Components\Users($this);
        $this->FormatComponents = ($FormatComponents) ? : new \REC1\Formats\FormatComponents($this, $this->getUsers());
    }

    /**
     * 
     * @return \REC1\Components\Users
     */
    public function getUsers() {
        return $this->Users;
    }

    /**
     * 
     * @return \REC1\Formats\FormatComponents
     */
    public function getFormatComponents() {
        return $this->FormatComponents;
    }

}
