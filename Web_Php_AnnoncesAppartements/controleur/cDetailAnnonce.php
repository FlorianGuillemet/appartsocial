<?php
require_once '../controleur/cSessionOK.php';

require_once '../model/Dao.php';

$dao = new Dao();

//SI la page est appelée avec en paramètre $_GET['idAnnonce'].
if(isset($_GET['idAnnonce'])){
    //On sette en sessiol l'id de l'annonce en cours de visualisation (servira plus tard)
    $_SESSION['idAnnonceEnCours'] = $_GET['idAnnonce'];
    
    $annonce = $dao->selectAnnonce($_SESSION['idAnnonceEnCours']);    //recuperation de l'annonce par l'id de l'annonce qui est la value de $_GET['idAnnonce']

}
//SINON (cas où elle est appelée après retour de l'envoi de la demande client), 
//On reselectionne l'annonce en cours pour affichage sur la page vDetailAnnonce. 
else{
    $annonce = $dao->selectAnnonce($_SESSION['idAnnonceEnCours']);
}


require_once '../vue/vDetailAnnonce.php';