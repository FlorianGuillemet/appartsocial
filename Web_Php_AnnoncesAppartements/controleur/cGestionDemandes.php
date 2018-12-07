<?php
require_once '../controleur/cSessionAdminOK.php';
require_once '../model/Dao.php';


$dao = new Dao();

//Si le post provient du submit du formulaire de traitement,
//Alors on fait un update en affectant l'id de l'opérateur de la session ouverte à la demande sélectionnée, ainsi que le texte du formulaire 
//et on sette la date de prise en charge  
if (isset($_POST['btnEnvoyer'])){
        //Si une radio a été sélectionnée
        //Alors on appelle la methode d'insert pour insérer l'opérateur à la demande et affecter une date de prise en charge 
    if ( htmlentities(isset($_POST['inputAction']), ENT_QUOTES) AND htmlentities(isset($_POST['inputMessage']), ENT_QUOTES)) {
        $idDemandeSelect = $_POST['btnEnvoyer'];
        $nomOperateur = $_SESSION['nomUtilisateur'];
        $actionRealisee = $_POST['inputAction'];
        $demarchePreconisee = $_POST['inputMessage'];
        
        $dao->updateDemandeAttente($idDemandeSelect, $nomOperateur, $actionRealisee, $demarchePreconisee);
        
        header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cGestionDemandes.php?saisieFormulaire=OK");
        
    }
    else {
        header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cGestionDemandes.php?saisieFormulaire=KO");
    }
    
}

if (isset($_POST['submitCloturer'])) {
    header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cGestionDemandes.php");
    echo " la value est :".$_POST['submitCloturer'];
}

//Selection des demandes en attente de traitement pour affichage dans le tableau correspondant
$listDemandeAttente = $dao->selectTableDemandeAttente();
//Selection des demandes en cours de traitement par l'opérateur pour affichage dans le tableau correspondant
$listDemandeEnCours = $dao->selectTableDemandeEnCours($_SESSION['nomUtilisateur']);


require_once '../vue/vGestionDemandes.php';

//Si une radio a été sélectionnée
//Alors on appelle la methode d'insert pour insérer l'opérateur à la demande et affecter une date de prise en charge 
// if (isset($_POST['inputRadio'])) {

//     $idDemandeSelect = $_POST['inputRadio'];
//     $nomOperateur = $_SESSION['nomUtilisateur'];
    
//     $dao->updateDemandeAttente($idDemandeSelect, $nomOperateur);
    
// }

// }