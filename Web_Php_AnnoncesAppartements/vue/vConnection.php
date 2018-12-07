<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Page d'authentification</title>
	<?php require_once 'vHead.php';?>

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../script/css/connection.css">
</head>
<body>

    <div class="container">
    	<div class="d-flex justify-content-center h-100">
    		<div class="card">
    			<div class="card-header">
    				<h3>Authentification</h3>
    				<div class="d-flex justify-content-end social_icon">
    					<span><i class="fab fa-facebook-square"></i></span>
    					<span><i class="fab fa-google-plus-square"></i></span>    					
    				</div>
    			</div>
    			
    			<div class="card-body">
    				<form name="formConnection" method="post" action="../controleur/cConnection.php">
    					<div class="input-group form-group">
    						<div class="input-group-prepend">
    							<span class="input-group-text"><i class="fas fa-user"></i></span>
    						</div>
    						<input class="form-control" type="text" name="inputLogin" placeholder="login">
    						
    					</div>
    					
    					<div class="input-group form-group">
    						<div class="input-group-prepend">
    							<span class="input-group-text"><i class="fas fa-key"></i></span>
    						</div>
    						<input class="form-control" type="password" name="inputPassword" placeholder="password">
    					</div>
    					
    					<?php 
	                    if (isset($_GET['authentification']) AND ($_GET['authentification'] == 'ko')) {?>
	    					<div class="row align-items-center remember my-3 mx-2">
	    						<span class="text-danger">Erreur : Login ou mot de passe incorrect</span>
	    					</div> 
						<?php } ?>
                    	    					
    					<div class="row align-items-center remember">
    						<input type="checkbox">Remember Me
    					</div>
    					
    					<div class="form-group">
    						<input class="btn float-right login_btn" type="submit" name="submitLogin" value="Login">
    					</div>
    				</form>
    			</div>
    			
    			<div class="card-footer">
    				
    				<div class="d-flex justify-content-center">
    					<a href="#">Identifiants oubli&eacute;s ?</a>
    				</div>
    			</div>
    			
    		</div>
    	</div>
    </div>

</body>
</html>