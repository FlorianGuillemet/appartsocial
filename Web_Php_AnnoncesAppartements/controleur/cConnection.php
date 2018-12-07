<?php
session_start();

require_once '../vue/vConnection.php';

//Si le bouton submit a été cliqué
//Alors Je vérifie les champs de saisie
if (isset($_POST['submitLogin'])){
    
    //Si un nom d'utilisateur ET un password a été saisi 
    //Alors je récupère les saisies et je fais une recherche en base de données de ces saisies.
    if( (htmlspecialchars(isset($_POST['inputLogin']))) 
        AND ($_POST['inputLogin']) != NULL
        AND (htmlspecialchars(isset($_POST['inputPassword']))) 
        AND ($_POST['inputPassword']) != NULL ) {
                                  
        $inputLogin = $_POST['inputLogin'];
        $inputPassword = $_POST['inputPassword'];
                       
        require_once '../model/Dao.php';
            
        //J'instancie ma connexion
        $dao = new Dao();
            
        //Je récupère le nombre de ligne affectées par la requête. 
        $utilisateur = $dao->verifAuthentification($inputLogin, $inputPassword);
            
        // Si l'utilisateur n'est pas null, c'est qu'il a trouvé la correspondance du login et password en base de donnnées.
        if( $utilisateur != NULL ){               
                
            //On sette les attributs de l'utilisateur dans une variable superGlobale Session.                
            $_SESSION['idUtilisateur'] = $utilisateur->getIdUtilisateur();
            $_SESSION['login'] = $utilisateur->getLogin();
            $_SESSION['password'] = $utilisateur->getPassword();
            $_SESSION['role'] = $utilisateur->getRole();
            $_SESSION['nomUtilisateur'] = $utilisateur->getNomUtilisateur();
            $_SESSION['prenomUtilisateur'] = $utilisateur->getPrenomUtilisateur();
            $_SESSION['mailUtilisateur'] = $utilisateur->getMailUtilisateur();
            $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
                        
            header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cPageAccueil.php");
        }
        else{
            //erreur d'authentification' : je redirige sur la même page mais avec un paramètre en get
            header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cConnection.php?authentification=ko");
        }
            
    }
    //saisie vide : je redirige sur la même page
    else{        
        
        header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cConnection.php");
            
    }
    
}


//SI on se redirige vers ce controleur avec un paramètre "deconnection == OK", 
//ALors on ferme la session en cours et on redirige vers la page d'authentification
if (isset($_GET['deconnection']) AND $_GET['deconnection'] == "ok") {
    
    session_destroy();
    
    header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cConnection.php");
}
