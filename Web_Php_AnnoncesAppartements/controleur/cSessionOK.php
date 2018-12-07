<?php
session_start();
//Si il n'y a pas de session qui ouverte (!isset()), alors on redirige vers le controleur de connection.
if ( !isset($_SESSION['idUtilisateur'])) {
    header("Location:  http://" . $_SERVER['SERVER_NAME']."./controleur/cConnection.php");
}