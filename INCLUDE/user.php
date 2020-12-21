<?php

class user
{

    private $_db;
    private $_email;
    private $_password;

    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function Connexion($email)
    {   // Permet à l'utilisateur de se connecter au site
        
        $result = $this->_db->query("SELECT * FROM `user` WHERE email = '$email'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if(empty($row)){
            return false;
        }else{
            $this->_email = $row["email"];
            $this->_password = $row["password"];
        }
    }
    public function compare($email, $password)
    {   // Retourne true si le Login et le Mot de passe sont correct sinon retourne false
        
        if ($email == $this->_email) 
        {
            if (password_verify($password, $this->_password)) 
            {
                echo "ok";
                return true;
            }
        }
    return false;
    }

}

?>