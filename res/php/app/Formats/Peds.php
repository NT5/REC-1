<?php

namespace REC1\Formats;

/**
 * 
 */
class Peds extends \REC1\Components\ExtendedComponents {

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

        $this->setLog(\REC1\Components\Logger\Areas::FORMATS_PEDS, "Nueva instancia de Peds creada");
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
     * @return \REC1\Formats\Peds\Ped
     */
    public function getPed($id) {
        $ped_id = NULL;
        $ped_name = NULL;
        $create_by = NULL;
        $create_at = NULL;

        $stmt = $this->getDatabase()->prepare("SELECT Ped_Id, Ped_Name, Create_by, Create_at FROM Peds WHERE Ped_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($ped_id, $ped_name, $create_by, $create_at);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        if ($ped_id !== NULL && $ped_name !== NULL && $create_by !== NULL && $create_at !== NULL) {
            $user = $this->getUsersClass()->getUser($create_by);
            if ($user === NULL) {
                $user = new \REC1\Components\Users\User();
            }
            return new \REC1\Formats\Peds\Ped($ped_id, $ped_name, $create_at, $user);
        }
        return NULL;
    }

    /**
     * @return array
     */
    public function getPeds() {
        $ped_id = NULL;
        $peds = [];

        $stmt = $this->getDatabase()->prepare("SELECT Ped_Id FROM Peds");

        $stmt->execute();
        $stmt->bind_result($ped_id);
        $stmt->store_result();

        while ($stmt->fetch()) {
            $peds[] = $this->getPed($ped_id);
        }

        $stmt->free_result();
        $stmt->close();

        return $peds;
    }

    /**
     * 
     * @param string $name
     * @param \REC1\Components\Users\User $create_by
     */
    public function insertPed($name, \REC1\Components\Users\User $create_by) {
        $stmt = $this->getDatabase()->prepare("INSERT INTO Peds (Ped_Name, Create_by) VALUES (?, ?)");

        $stmt->bind_param('si', $name, $create_by->getId());
        $stmt->execute();
        $stmt->close();
    }

    /**
     * 
     * @param int $id
     */
    public function deletePed($id) {
        $stmt = $this->getDatabase()->prepare("DELETE FROM Peds WHERE Ped_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

}
