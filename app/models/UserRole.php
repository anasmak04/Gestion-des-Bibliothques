<?php

namespace App\models;

class UserRole{


    private $id_user;
    private $role_id;

    /**
     * @param $id
     * @param $role_id
     */
    public function __construct($id_user, $role_id)
    {
        $this->id = $id_user;
        $this->role_id = $role_id;
    }

    /**
     * @return mixed
     */
    public function getId_user()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId_user($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * @param mixed $role_id
     */
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }





}