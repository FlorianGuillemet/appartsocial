<?php
class Utilisateur {
    
    private $idUtilisateur;
    private $login;
    private $password;
    private $role;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $mailUtilisateur;
        


    public function __construct($idUtilisateur, $login, $password, $role, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur){
        
        $this->idUtilisateur = $idUtilisateur;
        $this->login = $login;
        $this->password = $password;
        $this->role = $role;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->prenomUtilisateur = $prenomUtilisateur;
        $this->mailUtilisateur = $mailUtilisateur;
        
    }
    
    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getLogin() {
        return $this->login;
    }
    
    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function getNomUtilisateur() {
        return $this->nomUtilisateur;
    }

    public function getPrenomUtilisateur() {
        return $this->prenomUtilisateur;
    }

    public function getMailUtilisateur() {
        return $this->mailUtilisateur;
    }

    
    
}