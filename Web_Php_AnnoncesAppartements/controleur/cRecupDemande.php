<?php

require_once '../model/Dao.php';
require_once '../controleur/cSessionOK.php';

$dao = new Dao();

//SI clic sur le bouton submit d'envoi de la demande,
//On recupere les valeurs des inputs et on les enregistre dans un tableau qui est envoyé à la methode d'insertion en base.
if (isset($_POST['submitDemande'])) {
    $inputRadio1 = $_POST['inputRadio1'];
    $inputRadio2 = $_POST['inputRadio2'];
    $inputRadio3 = $_POST['inputRadio3'];
    $inputMessage = htmlentities($_POST['inputMessage'], ENT_QUOTES);
    
    $listInputClient = array($inputRadio1, $inputRadio2, $inputRadio3, $inputMessage);
    
    //On insère les valeurs du formulaire ainsi que l'ID de l'annonce en cours et l'ID de l'utilisateur
    $dao->insertIntoDemandeClient($_SESSION['idAnnonceEnCours'], $listInputClient, $_SESSION['idUtilisateur']);    
    
    header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cDetailAnnonce.php?envoiDemande=ok");
}


