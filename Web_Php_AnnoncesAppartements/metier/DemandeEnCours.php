<?php
class DemandeEnCours{
    
    private $idDemande;
    private $idUtilisateur;
    private $idAnnonce;
    private $radio1;
    private $radio2;
    private $radio3;
    private $messageDemandeClient;
    private $dateDemande;
    private $datePriseEnCharge;
    private $actionRealisee;
    private $demarcheClientPreconisee;
    private $dateTraitement;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $mailUtilisateur;

    
    public function __construct($idDemande, $idUtilisateur, $idAnnonce, $radio1, $radio2, $radio3, $messageDemandeClient, $dateDemande, $datePriseEnCharge, $actionRealisee, $demarcheClientPreconisee, $dateTraitement, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur){
        $this->idDemande = $idDemande;
        $this->idUtilisateur = $idUtilisateur;
        $this->idAnnonce = $idAnnonce;
        $this->radio1 = $radio1;
        $this->radio2 = $radio2;
        $this->radio3 = $radio3;
        $this->messageDemandeClient = $messageDemandeClient;
        $this->dateDemande = $dateDemande;
        $this->datePriseEnCharge = $datePriseEnCharge;
        $this->actionRealisee = $actionRealisee;
        $this->demarcheClientPreconisee = $demarcheClientPreconisee;
        $this->dateTraitement = $dateTraitement;
        
        $this->nomUtilisateur = $nomUtilisateur;
        $this->prenomUtilisateur = $prenomUtilisateur;
        $this->mailUtilisateur = $mailUtilisateur;
               
    }
    
    public function getIdDemande() {
        return $this->idDemande;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getIdAnnonce() {
        return $this->idAnnonce;
    }

    public function getRadio1() {
        return $this->radio1;
    }

    public function getRadio2() {
        return $this->radio2;
    }

    public function getRadio3() {
        return $this->radio3;
    }

    public function getMessageDemandeClient() {
        return $this->messageDemandeClient;
    }

    public function getDateDemande() {
        return $this->dateDemande;
    }

    public function getDatePriseEnCharge() {
        return $this->datePriseEnCharge;
    }

    public function getActionRealisee() {
        return $this->actionRealisee;
    }

    public function getDemarcheClientPreconisee() {
        return $this->demarcheClientPreconisee;
    }

    public function getDateTraitement() {
        return $this->dateTraitement;
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