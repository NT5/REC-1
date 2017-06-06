<?php

namespace REC1\Factory;

/**
 * 
 */
class REC1Components extends \REC1\Factory\ExtendedComponents {

    /**
     *
     * @var \REC1\Users
     */
    private $Users;

    /**
     * @param \REC1\Users $Users
     * @param \REC1\Factory\ExtendedComponents $ExtendedComponents
     */
    public function __construct(\REC1\Users $Users = NULL, \REC1\Factory\ExtendedComponents $ExtendedComponents = NULL) {
        if (!$ExtendedComponents) {
            $ExtendedComponents = new \REC1\Factory\ExtendedComponents();
        }
        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $ExtendedComponents->getCookies(), $ExtendedComponents);

        $this->Users = ($Users) ? : new \REC1\Users($this);
    }

    /**
     * 
     * @return \REC1\Users
     */
    public function getUsers() {
        return $this->Users;
    }

}
