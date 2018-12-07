<?php 
require_once '../controleur/cSessionAdminOK.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajouter une annonce</title>
	<?php require_once 'vHead.php';?>
</head>
<body>
		
	<div>    	
    	<?php include_once 'vNavbar.php';?>    	
    </div>  
	
	<?php 
	if (isset($_GET['saisieAnnonce']) AND ($_GET['saisieAnnonce'] == 'ok')) {?>
	    <script>alert("Annonce ajout\u00e9e \u00e0 la base de donn\u00e9es");</script> 
	<?php }
	elseif (isset($_GET['saisieAnnonce']) AND ($_GET['saisieAnnonce'] == 'ko')){?>
	    <script>alert("Erreur de saisie du formulaire");</script>
	<?php }
	?>
	
	<br/>
	
	<form class="form-inline" method="post" action="../controleur/cRecupFormulaire.php">
		<div class="container">
    		<legend>Formulaire d'ajout d'une annonce</legend>
    		<hr>
		</div>		
		<div class="container">
		
			<div class="form-group my-3">
    			<label class="col-md-2">Type</label>
    			<div class="btn-group btn-group-toggle" data-toggle="buttons">        		        		
            		<label class="btn btn-light active">
            			<input type="radio" name="inputType" id="radioT1" value="T1" checked> T1
          			</label>
          			<label class="btn btn-light">
            			<input type="radio" name="inputType" id="radioT2" value="T2" > T2
          			</label>
          			<label class="btn btn-light">
            			<input type="radio" name="inputType" id="radioT3" value="T3" > T3
          			</label>
          			<label class="btn btn-light">
            			<input type="radio" name="inputType" id="radioT4" value="T4" > T4
          			</label>
          			<label class="btn btn-light">
            			<input type="radio" name="inputType" id="radioT5" value="T5" > T5
          			</label>        		
    			</div>
    		</div>
			
			<div class="form-group my-3">
				<label class="col-md-2">Surface</label>					
        		<input class="col-md-1 form-control" type="number" name="inputSurface" min="9" max="150" style="text-align:right" required>
             	<span class="input-group-addon">m&sup2;</span>      				
			</div>		
            
			<div class="form-group my-3">
				<label class="col-md-2">Prix</label>
				<input class="col-md-1 form-control" type="number" name="inputPrix" min="0" max="1000000" step="1000" style="text-align:right" required>
             	<span class="input-group-btn">&euro;</span> 
			</div>
			
			<div class="form-group my-3">
           		<label class="col-md-2">Photo</label>
           		<input class="col-md-4 form-control" type="text" name="inputImage" placeholder="Copiez l'URL de l'image" required>
           	</div>        
			
			<div class="form-group my-3">
				<label class="col-md-2">Descriptif</label>
				<textarea class="col-md-5 form-control" name="inputDescriptif" rows="5" type="text"></textarea>
			</div>
			
			<div class="form-group my-3">
  				<label class="col-md-2">Exposition</label>
  				<div class="btn-group btn-group-toggle " data-toggle="buttons">        		        		
                	<label class="btn btn-light active">
                    	<input type="radio" name="inputExposition" id="radioS" value="S" checked> S
                  	</label>              		
              		<label class="btn btn-light">
                		<input type="radio" name="inputExposition" id="radioSO" value="S-O" > S-O
              		</label>
              		<label class="btn btn-light">
                		<input type="radio" name="inputExposition" id="radioO" value="O"> O
              		</label>
              		<label class="btn btn-light">
                		<input type="radio" name="inputExposition" id="radioNO" value="N-O"> N-O
              		</label>
              		<label class="btn btn-light">
                		<input type="radio" name="inputExposition" id="radioN" value="N"> N
              		</label>
              		<label class="btn btn-light">
                		<input type="radio" name="inputExposition" id="radioNE" value="N-E"> N-E
              		</label>
              		<label class="btn btn-light">
                		<input type="radio" name="inputExposition" id="radioE" value="E"> E
              		</label>
              		<label class="btn btn-light">
                		<input type="radio" name="inputExposition" id="radioS-E" value="S-E"> S-E
              		</label>
           		</div>
           	</div>
           	
           	<div class="form-group my-3">
           		<label class="col-md-2">Ville</label>
           		<select class="col-md-4 form-control" name="inputVille" required>
           			<option value="0">&nbsp;</option>
           			<option value="Marseille">Marseille</option>
           			<option value="Nice">Nice</option>
           			<option value="Aix-en-Provence">Aix-en-Provence</option>
           			<option value="La Ciotat">La Ciotat</option>
           			<option value="Gap">Gap</option>
           			<option value="Manosque">Manosque</option>
         		</select> 

           	</div>
           
           	  			  			
        </div>
		
		<br/>
		<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-2 col-xs-2 col1 center-block"> 
    				<input class="btn btn-success btn-lg center-block" name="submitAjouter" type="submit" value="Ajouter Annonce">
    			</div>
    		</div>			
		</div>		
		
	</form>
	
	<div class="container my-3">
        <form method ="get" action="../vue/vPageAccueil.php">
        	<input class="btn btn-primary" type="submit" name="btnRetour" value="Retour &agrave; l'accueil"/>	
        </form>
    </div>
	
</body>	
</html>