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

    }

?>