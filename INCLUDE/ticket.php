<?php

    class ticket {

        private $_db;
        private $_id_ticket;
        private $_id_type;
        private $_id_cycle;
        private $_id_categorie;
        private $_id_user;
        private $_id_priorite;
        private $_commentaire;
        private $_date_echeance;

        public function __construct($db)
        {
            $this->_db = $db;
        }

        public function addMaintenance($id_typt, $id_cycle, $id_categorie, $id_user, $id_priorite, $commentaire, $date_echeance){

        }
    }

?>