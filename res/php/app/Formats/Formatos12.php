<?php

namespace REC1\Formats;

/**
 * 
 */
class Formatos12 extends \REC1\Formats\FormatComponents {

    /**
     * 
     * @param \REC1\Formats\FormatComponents $FormatComponents
     */
    public function __construct(\REC1\Formats\FormatComponents $FormatComponents = NULL) {
        if (!$FormatComponents) {
            $FormatComponents = new \REC1\Formats\FormatComponents();
        }
        parent::__construct($this, $FormatComponents->getUsersClass(), $FormatComponents->getCarrerasClass(), $FormatComponents->getPedsClass(), $FormatComponents->getTurnosClass());
    }

    /**
     * 
     * @param type $id
     * @return \REC1\Formats\Formatos12\Formato12
     */
    public function getFormato($id) {
        $db = $this->getDatabase();
        $userClass = $this->getUsersClass();
        $pedClass = $this->getPedsClass();

        $formato_id
                = $formato_comment
                = $ped_id
                = $anio_lec
                = $trimestre
                = $create_by
                = $create_at
                = NULL;

        $stmt = $db->prepare("SELECT Formato_Id, Formato_Comment, Ped_Id, Anio_Lectivo, Trimestre, Create_by, Create_at FROM Formato_12 WHERE Formato_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($formato_id, $formato_comment, $ped_id, $anio_lec, $trimestre, $create_by, $create_at);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        if (
                $formato_id !== NULL &&
                $formato_comment !== NULL &&
                $ped_id !== NULL &&
                $anio_lec !== NULL &&
                $trimestre !== NULL &&
                $create_by !== NULL &&
                $create_at !== NULL
        ) {
            $user = $userClass->getUser($create_by);
            if ($user === NULL) {
                $user = new \REC1\Components\Users\User();
            }

            $ped = $pedClass->getPed($ped_id);
            if ($ped === NULL) {
                $ped = new \REC1\Formats\Peds\Ped();
            }

            return new \REC1\Formats\Formatos12\Formato12($formato_id, $formato_comment, $ped, $anio_lec, $trimestre, $create_at, $user);
        }
        return NULL;
    }

    /**
     * @return array
     */
    public function getFormatos() {
        $formato_id = NULL;
        $formatos = [];

        $stmt = $this->getDatabase()->prepare("SELECT Formato_Id FROM Formato_12");

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
     * @param string $comment
     * @param int $ped_id
     * @param int $anio_lectivo
     * @param int $trimestre
     * @param int $create_byid
     * @return \REC1\Formats\Formatos12\Formato12
     */
    public function insertFormato($comment, $ped_id, $anio_lectivo, $trimestre, $create_byid) {
        $db = $this->getDatabase();

        $stmt = $db->prepare("INSERT INTO Formato_12 (Formato_Comment, Ped_Id, Anio_Lectivo, Trimestre, Create_by) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param('siiii', $comment, $ped_id, $anio_lectivo, $trimestre, $create_byid);
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
        $db = $this->getDatabase();

        $stmt = $db->prepare("DELETE FROM Formato_12 WHERE Formato_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

}
