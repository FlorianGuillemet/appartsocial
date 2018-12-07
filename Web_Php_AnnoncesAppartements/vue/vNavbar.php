<div class="container-fluid">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
        <a class="navbar-brand mx-3" href="../controleur/cPageAccueil.php">
        	<img src="../asset/images/AL_400x400.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
        	<ul class="navbar-nav mr-auto mx-3">
            	<li class="nav-item active">
            		<a class="nav-link" href="../controleur/cPageAccueil.php">Accueil</a>
            	</li>
                <li class="nav-item">
                	<a class="nav-link" href="../controleur/cConsulterAnnonces.php">Logements en vente</a>
                </li>
                <?php if ( $_SESSION['role'] == 'admin') 
                    echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"../controleur/cAjouterAnnonce.php\">Ajouter une annonce</a>
                          </li>"; ?>
                <?php if ( $_SESSION['role'] == 'admin') 
                    echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"../controleur/cModifierAnnonce.php\">Modifier une annonce</a>
                          </li>"; ?>
                <?php if ( $_SESSION['role'] == 'admin') 
                    echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"../controleur/cSupprAnnonce.php\">Supprimer une annonce</a>
                          </li>"; ?>
            </ul>
             
        	<ul class="navbar-nav mr-right mx-3">          
        		<div class="nav-item dropdown">
            	    <button class="btn btn-outline-info dropdown-toggle" type="button" id="menu" data-toggle="dropdown"><span class="fas fa-user-circle mr-2"></span><?php echo $_SESSION['prenomUtilisateur']." ".$_SESSION['nomUtilisateur'] ?> 
                	    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="menu">
                    <?php if ( $_SESSION['role'] == 'client') 
                        echo   "<li><a class=\"dropdown-item\" href=\"../controleur/cEspacePersonnel.php\">Mon espace personnel<span class=\"fas fa-chalkboard-teacher ml-3\"></span></a></li>
                                <li><a class=\"dropdown-item\" href=\"#\">Mes informations personnelles<span class=\"fas fa-address-book ml-3\"></span></a></li>
                            <li class=\"dropdown-divider\"></li>"?>
                    <?php if ( $_SESSION['role'] == 'admin') 
                        echo   "<li><a class=\"dropdown-item\" href=\"../controleur/cGestionDemandes.php\">Gestion des demandes locataires<span class=\"fas fa-book-reader ml-3\"></span></a></li>
                            <li class=\"dropdown-divider\"></li>"?>
                    	<li><a class="dropdown-item" href="../controleur/cConnection.php?deconnection=ok">Se d&eacute;connecter<span class="fas fa-lock ml-3"></span></a></li>
                    </ul>
              	    	</div>      	
                    
        	</ul>
             
        </div>
    </nav>
</div>