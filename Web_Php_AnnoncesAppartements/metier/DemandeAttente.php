<?php
class DemandeAttente{
    
    private $idDemande;
    private $idUtilisateur;
    private $idAnnonce;
    private $radio1;
    private $radio2;
    private $radio3;
    private $messageDemandeClient;
    private $dateDemande;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $mailUtilisateur;
    private $dateTraitement;
    
    public function __construct($idDemande, $idUtilisateur, $idAnnonce, $radio1, $radio2, $radio3, $messageDemandeClient, $dateDemande, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur){
        $this->idDemande = $idDemande;
        $this->idUtilisateur = $idUtilisateur;
        $this->idAnnonce = $idAnnonce;
        $this->radio1 = $radio1;
        $this->radio2 = $radio2;
        $this->radio3 = $radio3;
        $this->messageDemandeClient = $messageDemandeClient;
        $this->dateDemande = $dateDemande;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->prenomUtilisateur = $prenomUtilisateur;
        $this->mailUtilisateur = $mailUtilisateur;
        $this->dateTraitement = date('Y-m-d H:i:s');
    }
    
    
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
    
    public function getIdAnnonce()
    {
        return $this->idAnnonce;
    }

    public function getRadio1()
    {
        return $this->radio1;
    }

    public function getRadio2()
    {
        return $this->radio2;
    }

    public function getRadio3()
    {
        return $this->radio3;
    }

    public function getMessageDemandeClient()
    {
        return $this->messageDemandeClient;
    }

    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    public function getMailUtilisateur()
    {
        return $this->mailUtilisateur;
    }

    public function getDateTraitement()
    {
        return $this->dateTraitement;
    }


}