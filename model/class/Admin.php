<?php

class Admin
{
    private int $_id;

    private string $_name;
    private string $_mail;
    private string $_login;
    private string $_password;
    private int $_role;

    //Constructeur
    public function __construct($id, $name, $mail, $login, $password, $role)
    {
        $this->_login = $login;
        $this->_name = $name;
        $this->_mail = $mail;
        $this->_password = $password;
        
        $this->_id = intval($id);
        $this->_role = intval($role);
    }

    //SUPER SETTER
    public function __set($prop, $value)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop = $value;
        }
    }

    //SUPER GETTER
    public function __get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }
}