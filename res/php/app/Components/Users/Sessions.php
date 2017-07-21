<?php

namespace REC1\Components\Users;

/**
 * @todo Documentar
 */
class Sessions extends \REC1\Components\ExtendedComponents {

    /**
     *
     * @var \REC1\Components\Users
     */
    private $Users;

    /**
     *
     * @var int 
     */
    private $token_Length = 32;

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

        $this->Users = ($Users) ? : new \REC1\Components\Users($ExtendedComponents, NULL, $this);

        $this->setLog(\REC1\Components\Logger\Areas::USERS_SESSIONS, "Nueva instancia de Usuarios de sesión creada");
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

        $stmt = $this->getDatabase()->prepare("SELECT User_Id FROM User_Sessions WHERE BINARY Session_Token = ?");

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
     */
    public function getFromCookie() {
        $cookie_session = $this->getCookies()->getCookie('session');

        if ($cookie_session) {
            $user_data = $this->getUser($cookie_session);
            return ($user_data ? $user_data : FALSE);
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param int $token
     * @return void
     */
    public function deleteToken($token) {
        $stmt = $this->getDatabase()->prepare("DELETE FROM User_Sessions WHERE BINARY Session_Token = ?");
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $stmt->close();
    }

}
