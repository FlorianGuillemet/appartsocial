<?php
session_start();
//Si il n'y a pas de session qui ouverte (!isset()), alors on redirige vers le controleur de connection.
if ( !isset($_SESSION['idUtilisateur'])) {
    header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cConnection.php");
}
//Si la session n'est pas en admin, alors je redirige sur la page pr�d�dente (en utilisant la $_Session['redirect'] sett�e lors de l'authentification).
if ($_SESSION['role'] != 'admin') {
    
    header ("Location:  http://" . $_SERVER['SERVER_NAME'].$_SESSION['redirect'] );
    
}