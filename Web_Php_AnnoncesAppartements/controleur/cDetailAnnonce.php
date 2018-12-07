<?php
require_once '../controleur/cSessionOK.php';

require_once '../model/Dao.php';

$dao = new Dao();

//SI la page est appel�e avec en param�tre $_GET['idAnnonce'].
if(isset($_GET['idAnnonce'])){
    //On sette en sessiol l'id de l'annonce en cours de visualisation (servira plus tard)
    $_SESSION['idAnnonceEnCours'] = $_GET['idAnnonce'];
    
    $annonce = $dao->selectAnnonce($_SESSION['idAnnonceEnCours']);    //recuperation de l'annonce par l'id de l'annonce qui est la value de $_GET['idAnnonce']

}
//SINON (cas o� elle est appel�e apr�s retour de l'envoi de la demande client), 
//On reselectionne l'annonce en cours pour affichage sur la page vDetailAnnonce. 
else{
    $annonce = $dao->selectAnnonce($_SESSION['idAnnonceEnCours']);
}


require_once '../vue/vDetailAnnonce.php';