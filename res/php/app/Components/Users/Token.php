<?php

namespace REC1\Components\Users;

/**
 * @todo Documentar
 */
class Token extends \REC1\Components\ExtendedComponents {

    /**
     *
     * @var \REC1\Components\Users
     */
    private $Users;

    /**
     *
     * @var int
     */
    private $token_Length = 4;

    /**
     * 
     * @param \REC1\Components\Users $Users
     * @param \REC1\Components\ExtendedComponents $ExtendedComponents
     */
    public function __construct(\REC1\Components\Users $Users = NULL, \REC1\Components\ExtendedComponents $ExtendedComponents = NULL) {
        if (!$ExtendedComponents) {
            $ExtendedComponents = new \REC1\Components\ExtendedComponents();
        }
        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $ExtendedComponents->getCookies(), $ExtendedComponents);

        $this->Users = ($Users) ? : new \REC1\Components\Users($ExtendedComponents, $this, NULL);

        $this->setLog(\REC1\Components\Logger\Areas::USERS_TOKEN, "Nueva instancia de Usuarios Token creada");
    }

    /**
     * 
     * @return \REC1\Components\Users
     */
    public function getUsersClass() {
        return $this->Users;
    }

    /**
     * 
     * @return string
     */
    public function generateToken() {
        $generator = new \REC1\Util\Token();
        $token = $generator->generate($this->token_Length);
        return $token;
    }

    /**
     * 
     * @param int $user_id
     * @param string $user_token
     * @return bool
     */
    public function insertToken($user_id, $user_token) {
        if ($this->getUsersClass()->getUser($user_id) !== NULL) {

            $stmt = $this->getDatabase()->prepare("INSERT INTO User_Token (User_Id, User_Token) VALUES(?, ?)");
            $stmt->bind_param('is', $user_id, $user_token);
            $stmt->execute();
            $stmt->close();

            return TRUE;
        }
        return NULL;
    }

    /**
     * 
     * @param int $user_id
     * @return string|NULL
     */
    public function getToken($user_id) {
        $user_token = NULL;

        $stmt = $this->getDatabase()->prepare("SELECT User_Token FROM User_Token WHERE User_Id = ?");

        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->bind_result($user_token);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        return $user_token;
    }

    /**
     * 
     * @param string $token
     * @return \REC1\Components\Users\User|FALSE
     */
    public function getUser($token) {
        $user_id = 0;

        $stmt = $this->getDatabase()->prepare("SELECT User_Id FROM User_Token WHERE User_Token = ?");

        $stmt->bind_param('s', $token);
        $stmt->execute();
        $stmt->bind_result($user_id);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        $user = $this->getUsersClass()->getUser($user_id);

        return ($user ? $user : FALSE);
    }

    /**
     * 
     * @param int $user_id
     * @param string $new_token
     * @return boolean
     */
    public function updateToken($user_id, $new_token) {

        if ($this->getToken($user_id) !== NULL) {

            $stmt = $this->getDatabase()->prepare("UPDATE User_Token SET User_Token = ? WHERE User_Id = ?");
            $stmt->bind_param('si', $new_token, $user_id);
            $stmt->execute();
            $stmt->close();
            return TRUE;
        }
        return NULL;
    }

}
