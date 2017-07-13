<?php

namespace REC1\Formats\Carreras;

/**
 * 
 */
class Carrera {

    /**
     *
     * @var int 
     */
    private $Id;

    /**
     *
     * @var string 
     */
    private $Name;

    /**
     *
     * @var string 
     */
    private $CreateAt;

    /**
     *
     * @var \REC1\Components\Users\User 
     */
    private $CreateBy;

    /**
     * 
     * @param int $id
     * @param string $name
     * @param string $createat
     * @param \REC1\Components\Users\User  $createby
     */
    public function __construct($id = 0, $name = "Default", $createat = 0, \REC1\Components\Users\User $createby = NULL) {
        $this->Id = $id;
        $this->Name = $name;
        $this->CreateAt = $createat;
        $this->CreateBy = $createby;
    }

    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->Id;
    }

    /**
     * 
     * @return string
     */
    public function getName() {
        return $this->Name;
    }

    /**
     * 
     * @return string
     */
    public function getCreateAt() {
        return $this->CreateAt;
    }

    /**
     * 
     * @return \REC1\Components\Users\User 
     */
    public function getCreateBy() {
        return $this->CreateBy;
    }

}
