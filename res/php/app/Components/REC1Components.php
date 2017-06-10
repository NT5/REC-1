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
     *
     * @var \REC1\Cookies 
     */
    private $Cookies;

    /**
     * 
     * @param \REC1\Users $Users
     * @param \REC1\Cookies $Cookies
     * @param \REC1\Factory\ExtendedComponents $ExtendedComponents
     */
    public function __construct(\REC1\Users $Users = NULL, \REC1\Cookies $Cookies = NULL, \REC1\Factory\ExtendedComponents $ExtendedComponents = NULL) {
        if (!$ExtendedComponents) {
            $ExtendedComponents = new \REC1\Factory\ExtendedComponents();
        }
        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $ExtendedComponents);

        $this->Users = ($Users) ? : new \REC1\Users($this);
        $this->Cookies = ($Cookies) ? : new \REC1\Cookies();
    }

    /**
     * 
     * @return \REC1\Users
     */
    public function getUsers() {
        return $this->Users;
    }

    /**
     * 
     * @return \REC1\Cookies
     */
    public function getCookies() {
        return $this->Cookies;
    }

}
