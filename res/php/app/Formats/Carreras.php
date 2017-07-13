<?php

namespace REC1\Formats;

/**
 * 
 */
class Carreras extends \REC1\Components\ExtendedComponents {

    /**
     *
     * @var \REC1\Components\Users
     */
    private $UsersClass;

    /**
     * 
     * @param \REC1\Components\ExtendedComponents $ExtendedComponents
     * @param \REC1\Components\Users $Users
     */
    public function __construct(\REC1\Components\ExtendedComponents $ExtendedComponents = NULL, \REC1\Components\Users $Users = NULL) {
        if (!$ExtendedComponents) {
            $ExtendedComponents = new \REC1\Components\ExtendedComponents();
        }
        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $ExtendedComponents->getCookies(), $ExtendedComponents);

        $this->UsersClass = ($Users) ? : new \REC1\Components\Users($this);

        $this->setLog(\REC1\Components\Logger\Areas::FORMATS_CARRERAS, "Nueva instancia de carreras creada");
    }

    /**
     * 
     * @return \REC1\Components\Users
     */
    public function getUsersClass() {
        return $this->UsersClass;
    }

    /**
     * 
     * @param int $id
     * @return \REC1\Formats\Carreras\Carrera
     */
    public function getCarrera($id) {
        $carrera_id = NULL;
        $carrera_name = NULL;
        $create_by = NULL;
        $create_at = NULL;

        $stmt = $this->getDatabase()->prepare("SELECT Carrera_Id, Carrera_Name, Create_by, Create_at FROM Carreras WHERE Carrera_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($carrera_id, $carrera_name, $create_by, $create_at);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        if ($carrera_id !== NULL && $carrera_name !== NULL && $create_by !== NULL && $create_at !== NULL) {
            $user = $this->getUsersClass()->getUser($create_by);
            if ($user === NULL) {
                $user = new \REC1\Components\Users\User();
            }
            return new \REC1\Formats\Carreras\Carrera($carrera_id, $carrera_name, $create_at, $user);
        }
        return NULL;
    }

    /**
     * @return array
     */
    public function getCarreras() {
        $carrera_id = NULL;
        $carreras = [];

        $stmt = $this->getDatabase()->prepare("SELECT Carrera_Id FROM Carreras");

        $stmt->execute();
        $stmt->bind_result($carrera_id);
        $stmt->store_result();

        while ($stmt->fetch()) {
            $carreras[] = $this->getCarrera($carrera_id);
        }

        $stmt->free_result();
        $stmt->close();

        return $carreras;
    }

    /**
     * 
     * @param string $name
     * @param \REC1\Components\Users\User $create_by
     */
    public function insertCareer($name, \REC1\Components\Users\User $create_by) {
        $stmt = $this->getDatabase()->prepare("INSERT INTO Carreras (Carrera_Name, Create_by) VALUES (?, ?)");

        $stmt->bind_param('si', $name, $create_by->getId());
        $stmt->execute();
        $stmt->close();
    }

    /**
     * 
     * @param int $id
     */
    public function deleteCareer($id) {
        $stmt = $this->getDatabase()->prepare("DELETE FROM Carreras WHERE Carrera_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

}
