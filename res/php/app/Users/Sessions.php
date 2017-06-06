<?php

namespace REC1\Users;

/**
 * 
 */
class Sessions extends \REC1\Factory\ExtendedComponents {

    /**
     *
     * @var \REC1\Users
     */
    private $Users;

    /**
     *
     * @var int 
     */
    private $token_Length = 32;

    /**
     * 
     * @param \REC1\Users $Users
     * @param \REC1\Factory\ExtendedComponents $ExtendedComponents
     */
    public function __construct(\REC1\Users $Users = NULL, \REC1\Factory\ExtendedComponents $ExtendedComponents = NULL) {
        if (!$ExtendedComponents) {
            $ExtendedComponents = new \REC1\Factory\ExtendedComponents();
        }
        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $ExtendedComponents->getCookies(), $ExtendedComponents);

        $this->Users = ($Users) ? : new \REC1\Users($ExtendedComponents, NULL, $this);

        $this->setLog(\REC1\Util\Logger\Areas::USERS_SESSIONS, "Nueva instancia de Usuarios de sesión creada");
    }

    /**
     * 
     * @return \REC1\Users
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
     * @param string $token
     */
    public function insertToken($user_id, $token) {
        if ($this->getUsersClass()->getUser($user_id) !== NULL) {

            $stmt = $this->getDatabase()->prepare("INSERT INTO User_Sessions (User_Id, Session_Token) VALUES(?, ?)");

            $stmt->bind_param('is', $user_id, $token);
            $stmt->execute();
            $stmt->close();

            return TRUE;
        }
        return NULL;
    }

    /**
     * 
     * @param string $token
     * @return bool
     */
    public function getUser($token) {
        $user_id = NULL;

        $stmt = $this->getDatabase()->prepare("SELECT User_Id FROM User_Sessions WHERE Session_Token = ?");

        $stmt->bind_param('s', $token);
        $stmt->execute();
        $stmt->bind_result($user_id);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        if ($user_id !== NULL) {
            $user = $this->getUsersClass()->getUser($user_id);
            return ($user ? $user : FALSE);
        }
        return NULL;
    }

    /**
     * 
     * @param int $token
     * @return void
     */
    public function deleteToken($token) {
        $stmt = $this->getDatabase()->prepare("DELETE FROM User_Sessions WHERE Session_Token = ?");
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $stmt->close();
    }

}
