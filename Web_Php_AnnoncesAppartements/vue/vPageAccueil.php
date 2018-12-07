<?php 
require_once '../controleur/cSessionOK.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Page d'accueil</title>
	<?php require_once 'vHead.php';?>
</head>   

<body>
	<header>
		
	</header>
	
	<div>    	
    	<?php include_once 'vNavbar.php';?>    	
    </div>  
	
	<div id="corps-texte-body">
    	<section>
    		
    		<div class="container">   		
        		</br>
        		<h2>Vous &ecirc;tes locataire et souhaitez devenir propri&eacute;taire?</h2> 
        		<hr>
        		
        		<h2>ECF: D&eacute;velopper des pages web en lien avec une base de donn&eacute;es</h2> 
        		<h3>Projet de Florian GUILLEMET</h3>
        		</br>
        	</div>	
        	<div class="container">
        		<h3>Description du site</h3>
        		</br>
    
    			<p>Le projet est un site d'annonces de bien immobilier &agrave; &agrave; destination des locataires d'un bailleur social (ici UNICIL).</p>
    
    			<p>Le site n'est accessible qu'aux locataires d'Unicil et aux administrateurs (employ&eacute;s d'unicil).</p>
    			</br>
    
    			<p><strong>Les locataires ont des droits "client".</strong></p> 
    			<p>Ils peuvent:</p>
    			<ul>
    				<li>consulter des annonces de biens (le tri des annonces n'est pas encore accessible)</li>
    				<li>laisser une demande aupr&egrave;s du service d'unicil pour obtenir des renseignements complementaires ou demander &agrave; &ecirc;tre accompagn&eacute; pour le d&eacute;pot d'un dossier</li>
    				<li>acc&eacute;der &agrave; son espace personnel o&ugrave; il peut consulter l'&eacute;tat de ses demandes: en attente ou en cours de traitement et lire la r&eacute;ponse du service unicil. (la fonction de suppression de la demande n'est pas encore disponible)</li>
    			</ul>
    			</br>
    			<p><strong>Les administrateurs ont des droits "admin".</strong></p>
    			<p>Ils peuvent:</p>
    			<ul>
    				<li>consulter des annonces</li>
    				<li>ajouter / modifier / supprimer une annonce</li>
    				<li>acc&eacute;der &agrave; un espace de gestion des demandes.</li>
    			</ul>
    			<p>Cet espace permet de consulter les demandes en attentes de traitement et de traiter ces demandes en laissant un message au locataire.
    			Une fois trait&eacute;es, ces demandes sont affect&eacute;es &agrave; l'administrateur qui a trait&eacute; la demande 
    			et elles sont visibles dans son tableau des demandes en cours de traitement. 
    			La cl&ocirc;ture de la demande n'est pas encore disponible.</p>
        		</br>
				<p>Le site est responsive (il s'adapte aux petits &eacute;crans comme les mobiles) pour les parties consultation d'annonces et formulaire de demande utilis&eacute;es par les locataires</p>        		
        		
        		<hr>
        		<h5>Les acc&egrave;s sont les suivants:</h5>
        		<p><strong>Client</strong></p>
        		<ul>
    				<li>login: "client1" mot de passe: "pass"</li>
    				<li>login: "client2" mot de passe: "pass"</li>
    				<li>login: "client3" mot de passe: "pass"</li>
    			</ul>
    			<p><strong>Admin</strong></p>
        		<ul>
    				<li>login: "admin1" mot de passe: "pass"</li>
    				<li>login: "admin2" mot de passe: "pass"</li>
    			</ul>
    		    		   		    		
            </div>
    	</section>
	</div>
	
	<footer>		
	</footer>
	
</body>
</html>