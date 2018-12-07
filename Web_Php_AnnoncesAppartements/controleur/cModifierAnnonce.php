<?php
require_once '../controleur/cSessionAdminOK.php';

require_once '../model/Dao.php';

$dao = new Dao();

    //Si on a cliqué sur le bouton modifier (qui concerne la vue vModifierAnnonce.php),
    //Alors on affiche un formulaire de modification des champs de l'annonce
    if (isset($_GET['submitModifier'])) {
                
        $annonce = $dao->selectAnnonce($_GET['submitModifier']);    //recuperation de l'annonce par l'id de l'annonce qui est la value de $_GET['submitModifier']
              
        require_once '../vue/vUpdateAnnonce.php';
        
        //header("Location:  http://" . $_SERVER['SERVER_NAME']."./vue/vUpdateAnnonce.php?surface=". $annonce->getSurface());
        
    }
    //Sinon si on a cliqué sur le bouton modifier (qui concerne la vue vUpdateAnnonce.php),
    //Alors on met à jour l'annonce par l'ID
    elseif(isset($_POST['submitUpdate'])) {
        
        //On recupere les différentes valeurs des inputs du formulaire (y compris ceux qui ne sont pas modifiés)
        $type = $_POST['inputType'];
        $surface = htmlspecialchars($_POST['inputSurface'], ENT_QUOTES);
        $prix = htmlspecialchars($_POST['inputPrix'], ENT_QUOTES);
        $image1 = htmlspecialchars($_POST['inputImage'], ENT_QUOTES);
        $descriptif = htmlspecialchars($_POST['inputDescriptif'], ENT_QUOTES);
        $exposition = $_POST['inputExposition'];
        $ville = htmlspecialchars($_POST['inputVille'], ENT_QUOTES);
        
        //On recrée un objet ficheAppart -> qui remet à jour la date de l'annonce
        $ficheAppart = new FicheAppart($type, $surface, $prix, $image1, $descriptif, $exposition, $ville);
               
        //On appelle la methode de modification en envoyant l'id de l'annonce ($_POST['submitUpdate']) et l'objet ficheAppart qui contient les données à modifier et celles qui n'ont pas été modifiées.  
        $idAnnonce = htmlentities($_POST['submitUpdate']);
        
        $dao->updateAnnonce($idAnnonce , $ficheAppart); 
        
        header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cModifierAnnonce.php");
    
    }
    //Sinon, On affiche la table des annonces. => on rentre dans ce else au premier affichage de la page modifierAnnonce
    else{
         
        $listAnnonce = $dao->selectTableAnnonce();        
        //On intègre la vue modifierAnnonce
        require_once '../vue/vModifierAnnonce.php';
        
    }
    
    
    
