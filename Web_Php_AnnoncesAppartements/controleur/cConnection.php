<?php
session_start();

require_once '../vue/vConnection.php';

//Si le bouton submit a �t� cliqu�
//Alors Je v�rifie les champs de saisie
if (isset($_POST['submitLogin'])){
    
    //Si un nom d'utilisateur ET un password a �t� saisi 
    //Alors je r�cup�re les saisies et je fais une recherche en base de donn�es de ces saisies.
    if( (htmlspecialchars(isset($_POST['inputLogin']))) 
        AND ($_POST['inputLogin']) != NULL
        AND (htmlspecialchars(isset($_POST['inputPassword']))) 
        AND ($_POST['inputPassword']) != NULL ) {
                                  
        $inputLogin = $_POST['inputLogin'];
        $inputPassword = $_POST['inputPassword'];
                       
        require_once '../model/Dao.php';
            
        //J'instancie ma connexion
        $dao = new Dao();
            
        //Je r�cup�re le nombre de ligne affect�es par la requ�te. 
        $utilisateur = $dao->verifAuthentification($inputLogin, $inputPassword);
            
        // Si l'utilisateur n'est pas null, c'est qu'il a trouv� la correspondance du login et password en base de donnn�es.
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
            //erreur d'authentification' : je redirige sur la m�me page mais avec un param�tre en get
            header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cConnection.php?authentification=ko");
        }
            
    }
    //saisie vide : je redirige sur la m�me page
    else{        
        
        header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cConnection.php");
            
    }
    
}


//SI on se redirige vers ce controleur avec un param�tre "deconnection == OK", 
//ALors on ferme la session en cours et on redirige vers la page d'authentification
if (isset($_GET['deconnection']) AND $_GET['deconnection'] == "ok") {
    
    session_destroy();
    
    header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cConnection.php");
}
