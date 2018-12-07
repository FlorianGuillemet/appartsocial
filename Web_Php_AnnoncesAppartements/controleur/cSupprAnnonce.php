<?php
require_once '../controleur/cSessionAdminOK.php';

require_once '../model/Dao.php';

$dao = new Dao();

if (isset($_POST)) {
        
    //initialisation de la liste des annonces.
    $listAnnonce = $dao->selectTableAnnonce();
    //On initialise cette variable � null pour qu'elle soit initialis�e lors du test de la condition plus bas
    $listIdChecked = NULL;
    
    //On met dans un tableau $listIdChecked, les valeurs des idAnnonce pour chaque annonce qui a �t� coch�e.
    if ($listAnnonce != NULL) {
        foreach ($listAnnonce as $annonce){
            if (isset($_POST['inputCheckBox-'.$annonce->getIdAnnonce().''])) {  //le name du $_POST = ['inputCheckBox- + l'id de l'annonce]
                $idAnnonce = $_POST['inputCheckBox-'.$annonce->getIdAnnonce().''];
                $listIdChecked[] = $idAnnonce;
            }
        }
    }    
    
    //Si le tableau $listIdChecked n'est pas null (il y a donc des iD � supprimer),
    //Alors on cr�e une chaine sql des ID � supprimer
    if($listIdChecked != NULL){
        //on initialise la chaine avec la premi�re valeur
        $chaineADelete = $listIdChecked[0];
        $compteur = 1;
        
        //puis on boucle � partir de la deuxi�me valeur jusqu'� la taille du tableau, en concat�nant la chaine avec une virgule.
        for ($i = 1; $i < sizeof($listIdChecked); $i++) {
            
            $chaineADelete .= ', '.$listIdChecked[$i];
            $compteur++;
        }
                
        //Puis on envoie la chaine sql � la m�thode deleteAnnonce.
        $dao->deleteAnnonce($chaineADelete);
        
    }
       
    //On raffraichit la table des annonces.
    $listAnnonce = $dao->selectTableAnnonce();
    //autre mani�re de raffraichir l'affichage du tableau: faire r�afficher la page.
    //header("Location:  http://" . $_SERVER['SERVER_NAME']."/cDeleteEmprunt.php");
    
    //On int�gre la vue supprAnnonce
    require_once '../vue/vSupprAnnonce.php';
    
}