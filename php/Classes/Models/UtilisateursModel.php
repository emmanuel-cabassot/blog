<?php

namespace App\php\Classes\Models;

class UtilisateursModel extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $email;
    protected $id_droits;

    public function __construct()
    {
        $this->table = 'utilisateurs';
    }
    
    /**
     * Récupérer un user à partir de son login
     * @param string $login 
     * @return mixed 
     */
    public function login($login)
    {  
        $login = htmlspecialchars($login, ENT_QUOTES);
        return $this->requete("SELECT * FROM $this->table WHERE login = ?", [$login])->fetch();       
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of id_droits
     */ 
    public function getId_droits()
    {
        return $this->id_droits;
    }

    /**
     * Set the value of id_droits
     *
     * @return  self
     */ 
    public function setId_droits($id_droits)
    {
        $this->id_droits = $id_droits;

        return $this;
    }
}
