<?php

    class ticket {

        private $_db;

        public function __construct($db)
        {
            $this->_db = $db;
        }

        public function addMaintenance($id_typt){
            $result = $this->_db->query("SELECT * FROM `ticket` WHERE `id_ticket` = '$id_typt'");
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(empty($row)){
                return false;
            }else{
                $this->_db->query('INSERT INTO `maintenance`(`id_type`, `id_cycle`, `id_categorie`, `id_user`, `id_priorite`, `commentaire`, `date_echeance`) VALUES ("'.$row['id_type'].'","'.$row['id_cycle'].'","'.$row['id_categorie'].'","'.$row['id_user'].'","'.$row['id_priorite'].'","'.$row['commentaire'].'","'.$row['date_echeance'].'")');
                echo 'INSERT INTO `maintenance`(`id_type`, `id_cycle`, `id_categorie`, `id_user`, `id_priorite`, `commentaire`, `date_echeance`) VALUES ("'.$row['id_type'].'","'.$row['id_cycle'].'","'.$row['id_categorie'].'","'.$row['id_user'].'","'.$row['id_priorite'].'","'.$row['commentaire'].'","'.$row['date_echeance'].'")';
                $this->_db->query("DELETE FROM `ticket` WHERE `id_ticket` = '$id_typt'");
                return true;
            }
        }
    }

?>