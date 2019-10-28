<?php

namespace App\Model;

use Core\Database;

class PanellistsModel
{
    private $id;
    private $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function __construct()
    {
        $this->db = new Database();
    }

    public static function show()
    {
        $db = new Database();
        $db->select()->from('panellists');

        return $db->getAll();
    }
}
