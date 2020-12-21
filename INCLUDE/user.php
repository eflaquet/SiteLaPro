<?php

class user
{

    private $_db;
    private $_login;
    private $_password;

    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function Connexion($login, $password)
    {   // Permet à l'utilisateur de se connecter au site
        
    }
    public function compare($login, $password)
    {   // Retourne true si le Login et le Mot de passe sont correct sinon retourne false
        $hashpassword = password_verify($password, $this->_password);
        if ($login == $this->_login) 
        {
            if ($password == $hashpassword) 
            {
                return true;
            }
        }
    return false;
    }

}

?>