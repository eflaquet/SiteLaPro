<?php
    class gestion //Permet de faire la gestion des bateaux / utilisateurs présent dans la base de données.
    {

        #getID / getNom, permet d'afficher les informations 

        private $_id_ticket;
        private $_id_type;
        private $_id_cycle;
        private $_id_categorie;
        private $_id_user;
        private $_id_priorite;
        private $_commentaire;
        private $_type;
        private $_cycle;
        private $_categorie;
        private $_nom;
        private $_prenom;
        private $_priorite;
        

        public function __construct($id_ticket,$id_typt, $id_cycle, $id_categorie, $id_user, $id_priorite, $type, $cycle, $categorie, $nom, $prenom,$priorite, $commentaire, $date_echeance)
        {  
            $this->_id_ticket = $id_ticket;
            $this->_id_type = $id_typt;
            $this->_id_cycle = $id_cycle;
            $this->_id_categorie = $id_categorie;
            $this->_id_user = $id_user;
            $this->_id_priorite = $id_priorite;
            $this->_commentaire = $commentaire;
            $this->_date_echeance = $date_echeance;
            $this->_type = $type;
            $this->_cycle = $cycle;
            $this->_categorie = $categorie;
            $this->_nom = $nom;
            $this->_priorite = $priorite;
            $this->_prenom = $prenom;
            
        }
        public function getIdticket()
        {
            return $this->_id_ticket;
        }
        public function getIdtype()
        {
            return $this->_id_type;
        }
        public function getIdcycle()
        {
            return $this->_id_cycle;
        }
        public function getIdcategorie()
        {
            return $this->_id_categorie;
        }
        public function getIduser()
        {
            return $this->_id_user;
        }
        public function getIdpriorite()
        {
            return $this->_id_priorite;
        }
        public function getCommentaire()
        {
            return $this->_commentaire;
        }
        public function getDate()
        {
            return $this->_date_echeance;
        }
        public function getType()
        {
            return $this->_type;
        }
        public function getCycle()
        {
            return $this->_cycle;
        }
        public function getPrenom()
        {
            return $this->_prenom;
        }
        public function getnom()
        {
            return $this->_nom;
        }
        public function getCategorie()
        {
            return $this->_categorie;
        }
        public function getPriorite()
        {
            return $this->_priorite;
        }
    }
