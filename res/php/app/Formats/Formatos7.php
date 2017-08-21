<?php

namespace REC1\Formats;

/**
 * 
 */
class Formatos7 extends \REC1\Components\ExtendedComponents {

    /**
     *
     * @var \REC1\Components\Users
     */
    private $UsersClass;

    /**
     *
     * @var \REC1\Formats\Peds 
     */
    private $PedsClass;

    /**
     * 
     * @param \REC1\Components\ExtendedComponents $ExtendedComponents
     * @param \REC1\Components\Users $Users
     */
    public function __construct(\REC1\Components\ExtendedComponents $ExtendedComponents = NULL, \REC1\Formats\Peds $Peds = NULL, \REC1\Components\Users $Users = NULL) {
        if (!$ExtendedComponents) {
            $ExtendedComponents = new \REC1\Components\ExtendedComponents();
        }
        parent::__construct($ExtendedComponents->getDatabase(), $ExtendedComponents->getPageConfig(), $ExtendedComponents->getCookies(), $ExtendedComponents);

        $this->UsersClass = ($Users) ? : new \REC1\Components\Users($this);
        $this->PedsClass = ($Peds) ? : new \REC1\Formats\Peds($this, $this->getUsersClass());

        $this->setLog(\REC1\Components\Logger\Areas::FORMATS_FORMATO7, "Nueva instancia para Formato No7. creada");
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
     * @return \REC1\Formats\Peds
     */
    public function getPedsClass() {
        return $this->PedsClass;
    }

    /**
     * 
     * @param int $id
     * @return \REC1\Formats\Formatos7\Formato7
     */
    public function getFormato($id) {
        $formato_id = $formato_name = $ped_id = $anio_lec = $trimestre = $create_by = $create_at = NULL;

        $stmt = $this->getDatabase()->prepare("SELECT Formato_Id, Formato_Name, Ped_Id, Anio_Lectivo, Trimestre, Create_by, Create_at FROM Formato_7 WHERE Formato_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($formato_id, $formato_name, $ped_id, $anio_lec, $trimestre, $create_by, $create_at);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        if (
                $formato_id !== NULL &&
                $formato_name !== NULL &&
                $ped_id !== NULL &&
                $anio_lec !== NULL &&
                $trimestre !== NULL &&
                $create_by !== NULL &&
                $create_at !== NULL
        ) {

            $user = $this->getUsersClass()->getUser($create_by);
            if ($user === NULL) {
                $user = new \REC1\Components\Users\User();
            }

            $ped = $this->getPedsClass()->getPed($ped_id);
            if ($ped === NULL) {
                $ped = new \REC1\Formats\Peds\Ped();
            }

            return new \REC1\Formats\Formatos7\Formato7($formato_id, $formato_name, $ped, $anio_lec, $trimestre, $create_at, $user);
        }
        return NULL;
    }

    /**
     * @return array
     */
    public function getFormatos() {
        $formato_id = NULL;
        $formatos = [];

        $stmt = $this->getDatabase()->prepare("SELECT Formato_Id FROM Formato_7");

        $stmt->execute();
        $stmt->bind_result($formato_id);
        $stmt->store_result();

        while ($stmt->fetch()) {
            $formatos[] = $this->getFormato($formato_id);
        }

        $stmt->free_result();
        $stmt->close();

        return $formatos;
    }

    /**
     * 
     * @param string $name
     * @param \REC1\Formats\Peds\Ped $ped
     * @param int $anio_lectivo
     * @param int $trimestre
     * @param \REC1\Components\Users\User $create_by
     * @return \REC1\Formats\Formatos7\Formato7
     */
    public function insertFormato($name, \REC1\Formats\Peds\Ped $ped, $anio_lectivo, $trimestre, \REC1\Components\Users\User $create_by) {
        $db = $this->getDatabase();

        $stmt = $db->prepare("INSERT INTO Formato_7 (Formato_Name, Ped_Id, Anio_Lectivo, Trimestre, Create_by) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param('siiii', $name, $ped->getId(), $anio_lectivo, $trimestre, $create_by->getId());
        $stmt->execute();
        $format_id = $db->getLastId();
        $stmt->close();

        return $this->getFormato($format_id);
    }

    /**
     * 
     * @param int $id
     */
    public function deleteFormato($id) {
        $stmt = $this->getDatabase()->prepare("DELETE FROM Formato_7 WHERE Formato_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

}
