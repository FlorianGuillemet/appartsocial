<?php
require_once '../controleur/cSessionOK.php';

require_once '../model/Dao.php';
    
$dao = new Dao();
    
//Selection de toutes les annonces dans une liste d'annonces
$listAnnonce = $dao->selectTableAnnonce();
    
require_once '../vue/vConsulterAnnonces.php';

