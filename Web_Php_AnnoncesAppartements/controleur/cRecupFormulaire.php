<?php
require_once '../controleur/cSessionAdminOK.php';

require_once '../model/Dao.php';
require_once '../metier/FicheAppart.php';

$dao = new Dao();

//Si il y a tous les Post requis
if ( (isset($_POST['inputType'])) 
    AND htmlentities(isset($_POST['inputSurface']))
    AND htmlentities(isset($_POST['inputPrix'])) AND (($_POST['inputPrix']) != 0)
    AND htmlentities(isset($_POST['inputImage']))
    AND htmlentities(isset($_POST['inputDescriptif']))
    AND (isset($_POST['inputExposition']))
    AND (isset($_POST['inputVille'])) AND (($_POST['inputVille']) != '0') ) {
    
    //recuperation des Post dans des variables
    $type = $_POST['inputType'];
    $surface = htmlentities($_POST['inputSurface'], ENT_QUOTES);
    $prix = htmlentities($_POST['inputPrix'], ENT_QUOTES);
    $image1 = htmlentities($_POST['inputImage'], ENT_QUOTES);
    $descriptif = htmlentities($_POST['inputDescriptif'], ENT_QUOTES);
    $exposition = $_POST['inputExposition'];
    $ville = $_POST['inputVille'];
      
    //Creation de l'objet $annonce
    $ficheAppart = new FicheAppart($type, $surface, $prix, $image1, $descriptif, $exposition, $ville);
    
    //Puis insertion en base
    $dao->insertIntoAnnonce($ficheAppart);
    
    header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cAjouterAnnonce.php?saisieAnnonce=ok");
          
}
else{
    //TODO renvoyer vers page d'erreur formulaire
    header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cAjouterAnnonce.php?saisieAnnonce=ko");
    
    
}