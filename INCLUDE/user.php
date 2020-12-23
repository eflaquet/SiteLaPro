<?php

class user
{

    private $_db;
    private $_username;
    private $_name;
    private $_email;
    private $_password;
    private $_id_type;
   

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
            $this->_username = $row["username"];
            $this->_name = $row["name"];
            $this->_email = $row["email"];
            $this->_password = $row["password"];
            $this->_id_type = $row["id_type"];
        }
    }
    public function compare($email, $password)
    {   // Retourne true si le Login et le Mot de passe sont correct sinon retourne false
        
        if ($email == $this->_email) 
        {
            if (password_verify($password, $this->_password)) 
            {
                $this->_password = $password;
                return true;
            }
        }
    return false;
    }
    public function getUsername(){
        return $this->_username;
    }
    public function getName(){
        return $this->_name;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function getIdticket(){
        return $this->_id_type;
    }
}

?>