<?php
require_once '../controleur/cSessionAdminOK.php';

require_once '../model/Dao.php';

$dao = new Dao();

if (isset($_POST)) {
        
    //initialisation de la liste des annonces.
    $listAnnonce = $dao->selectTableAnnonce();
    //On initialise cette variable à null pour qu'elle soit initialisée lors du test de la condition plus bas
    $listIdChecked = NULL;
    
    //On met dans un tableau $listIdChecked, les valeurs des idAnnonce pour chaque annonce qui a été cochée.
    if ($listAnnonce != NULL) {
        foreach ($listAnnonce as $annonce){
            if (isset($_POST['inputCheckBox-'.$annonce->getIdAnnonce().''])) {  //le name du $_POST = ['inputCheckBox- + l'id de l'annonce]
                $idAnnonce = $_POST['inputCheckBox-'.$annonce->getIdAnnonce().''];
                $listIdChecked[] = $idAnnonce;
            }
        }
    }    
    
    //Si le tableau $listIdChecked n'est pas null (il y a donc des iD à supprimer),
    //Alors on crée une chaine sql des ID à supprimer
    if($listIdChecked != NULL){
        //on initialise la chaine avec la première valeur
        $chaineADelete = $listIdChecked[0];
        $compteur = 1;
        
        //puis on boucle à partir de la deuxième valeur jusqu'à la taille du tableau, en concaténant la chaine avec une virgule.
        for ($i = 1; $i < sizeof($listIdChecked); $i++) {
            
            $chaineADelete .= ', '.$listIdChecked[$i];
            $compteur++;
        }
                
        //Puis on envoie la chaine sql à la méthode deleteAnnonce.
        $dao->deleteAnnonce($chaineADelete);
        
    }
       
    //On raffraichit la table des annonces.
    $listAnnonce = $dao->selectTableAnnonce();
    //autre manière de raffraichir l'affichage du tableau: faire réafficher la page.
    //header("Location:  http://" . $_SERVER['SERVER_NAME']."/cDeleteEmprunt.php");
    
    //On intègre la vue supprAnnonce
    require_once '../vue/vSupprAnnonce.php';
    
}