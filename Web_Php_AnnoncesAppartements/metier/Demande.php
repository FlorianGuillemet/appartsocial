<?php

class Demande{
    
    private $idDemande = 'idDemande';
    private $idUtilisateur = 'idUtilisateur';
    private $idAnnonce = 'idAnnonce';
    private $radio1 = 'radio1';
    private $radio2 = 'radio2';
    private $radio3 = 'radio3';
    private $messageDemandeClient = 'messageDemandeClient';
    private $dateDemande = 'dateDemande';
    private $statutDemande = 'statutDemande';
    private $operateur = 'operateur';
    private $actionRealisee = 'actionRealisee';
    private $demarcheClientPreconisee = 'demarcheClientPreconisee';
    private $dateTraitement = 'dateTraitement';    
    
    public function __construct($idDemande, $idUtilisateur, $idAnnonce, $radio1, $radio2, $radio3, $messageDemandeClient, $dateDemande, $statutDemande, $demarcheClientPreconisee, $dateTraitement){
        $this->idDemande = $idDemande;
        $this->idUtilisateur = $idUtilisateur;
        $this->idAnnonce = $idAnnonce;
        $this->radio1 = $radio1;
        $this->radio2 = $radio2;
        $this->radio3 = $radio3;
        $this->messageDemandeClient = $messageDemandeClient;        
        $this->dateDemande = $dateDemande;
        $this->statutDemande = $statutDemande;
        $this->demarcheClientPreconisee = $demarcheClientPreconisee;
        $this->dateTraitement = $dateTraitement;
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

    public function getStatutDemande() {
        return $this->statutDemande;
    }

    public function getOperateur() {
        return $this->operateur;
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
    
    
}