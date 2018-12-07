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
			
	<br/>
	
	<div id="corps-texte-body">
		
    	<form class="form-inline" method="post" action="../controleur/cModifierAnnonce.php">
    		<div class="container">
        		<legend>Formulaire de modification de l'annonce <strong>#<?php echo $annonce->getIdAnnonce()?></strong></legend>
        		<hr>
    		</div>		
    		<div class="container">
    		
    			<div class="form-group my-3">
        			<label class="col-md-2">Type</label>
        			<div class="btn-group btn-group-toggle" data-toggle="buttons">    				   		        		
                		<label id="lblRadioT1" class="btn btn-light">
                			<input type="radio" name="inputType" id="radioT1" value="T1" > T1
              			</label>
              			<label id="lblRadioT2" class="btn btn-light">
                			<input type="radio" name="inputType" id="radioT2" value="T2" > T2
              			</label>
              			<label id="lblRadioT3" class="btn btn-light">
                			<input type="radio" name="inputType" id="radioT3" value="T3" > T3
              			</label>
              			<label id="lblRadioT4" class="btn btn-light">
                			<input type="radio" name="inputType" id="radioT4" value="T4" > T4
              			</label>
              			<label id="lblRadioT5" class="btn btn-light">
                			<input type="radio" name="inputType" id="radioT5" value="T5" > T5
              			</label>        		
        			</div>
        		</div>
    			
    			<div class="form-group my-3">
    				<label class="col-md-2">Surface</label>					
            		<input class="col-md-1 form-control" type="number" name="inputSurface" min="9" max="150" style="text-align:right" value="<?php echo $annonce->getSurface() ?>" required>
                 	<span class="input-group-addon">m&sup2;</span>      				
    			</div>		
                
    			<div class="form-group my-3">
    				<label class="col-md-2">Prix</label>
    				<input class="col-md-1 form-control" type="number" name="inputPrix" min="0" max="1000000" step="1000" style="text-align:right" value="<?php echo $annonce->getPrix() ?>" required>
                 	<span class="input-group-btn">&euro;</span> 
    			</div>
    			
    			<div class="form-group my-3">
               		<label class="col-md-2">Photo</label>
               		<input class="col-md-4 form-control" type="text" name="inputImage" placeholder="Copiez l'URL de l'image" value="<?php echo $annonce->getImage1() ?>" required>
               	</div>        
    			
    			<div class="form-group my-3">
    				<label class="col-md-2">Descriptif</label>
    				<textarea class="col-md-5 form-control" name="inputDescriptif" rows="5" type="text"><?php echo $annonce->getDescriptif() ?></textarea>
    			</div>
    			
    			<div class="form-group my-3">
      				<label class="col-md-2">Exposition</label>
      				<div class="btn-group btn-group-toggle " data-toggle="buttons">
      					  					  					
      					<label id="lblRadioS" class="btn btn-light">
                        	<input type="radio" name="inputExposition" id="radioS" value="S" > S
                      	</label>              		
                  		<label id="lblRadioSO" class="btn btn-light">
                    		<input type="radio" name="inputExposition" id="radioSO" value="S-O" > S-O
                  		</label>
                  		<label id="lblRadioO" class="btn btn-light">
                    		<input type="radio" name="inputExposition" id="radioO" value="O"> O
                  		</label>
                  		<label id="lblRadioNO" class="btn btn-light">
                    		<input type="radio" name="inputExposition" id="radioNO" value="N-O"> N-O
                  		</label>
      					<label id="lblRadioN" class="btn btn-light">
    	   					 <input type="radio" name="inputExposition" id="radioN" value="N"> N
    				    </label>  					 
                  		<label id="lblRadioNE" class="btn btn-light">
                    		<input type="radio" name="inputExposition" id="radioNE" value="N-E"> N-E
                  		</label>
                  		<label id="lblRadioE" class="btn btn-light">
                    		<input type="radio" name="inputExposition" id="radioE" value="E"> E
                  		</label>
                  		<label id="lblRadioSE" class="btn btn-light">
                    		<input type="radio" name="inputExposition" id="radioS-E" value="S-E"> S-E
                  		</label>
                  		              		
               		</div>
               	</div>
               	
               	<div class="form-group my-3">
               		<label class="col-md-2">Ville</label>
               		<input list="datalist" class="col-md-4 form-control" name="inputVille" value="<?php echo $annonce->getVille() ?>" required>
                      	<datalist id="datalist" >                       
               				<option value="Marseille"></option>
               				<option value="Nice"></option>
               				<option value="Aix-en-Provence"></option>
               				<option value="La Ciotat"></option>
               				<option value="Gap"></option>
               				<option value="Manosque"></option>
                      	</datalist>
               	</div>           
               	  			  			
            </div>
    		
    		<br/>
    		<div class="container">
        		<div class="row justify-content-center">
        			<div class="col-md-2 col-xs-2 col1 center-block"> 
        				<button class="btn btn-success btn-lg center-block" type="submit" name="submitUpdate" value="<?php echo $annonce->getIdAnnonce() ?>">Modifier ces champs</button>
        			</div>
        		</div>			
    		</div>		
    		
    	</form>
	</div>
		
	<script type="text/javascript">
		
		var type = "<?php echo $annonce->getType(); ?>" ;
		(function setAttChecked() {  					    
			
			switch (type) {
				case "T1":
				document.getElementById("lblRadioT1").setAttribute("class", "btn btn-light active");
				document.getElementById("radioT1").checked = true;
					break;
				case "T2":
				document.getElementById("lblRadioT2").setAttribute("class", "btn btn-light active");
				document.getElementById("radioT2").checked = true;
					break;
				case "T3":
				document.getElementById("lblRadioT3").setAttribute("class", "btn btn-light active");
				document.getElementById("radioT3").checked = true;
					break;
				case "T4":
				document.getElementById("lblRadioT4").setAttribute("class", "btn btn-light active");
				document.getElementById("radioT4").checked = true;
					break;
				case "T5":
					document.getElementById("lblRadioT5").setAttribute("class", "btn btn-light active");
					document.getElementById("radioT5").checked = true;
					break;
				
				default:
					break;
			}
		})();
	
		
		var exposition = "<?php echo $annonce->getExposition(); ?>" ;
  		(function setAttActive() {  					    
  			
  			switch (exposition) {
  				case "S":
					document.getElementById("lblRadioS").setAttribute("class", "btn btn-light active");
					document.getElementById("radioS").checked = true;
				break;
  				case "S-O":
					document.getElementById("lblRadioSO").setAttribute("class", "btn btn-light active");
					document.getElementById("radioSO").checked = true;
				break;
  				case "O":
					document.getElementById("lblRadioO").setAttribute("class", "btn btn-light active");
					document.getElementById("radioO").checked = true;
				break;
  				case "N-O":
					document.getElementById("lblRadioNO").setAttribute("class", "btn btn-light active");
					document.getElementById("radioNO").checked = true;
				break;
				case "N":
  					document.getElementById("lblRadioN").setAttribute("class", "btn btn-light active");
  					document.getElementById("radioN").checked = true;
					break;
				case "N-E":
					document.getElementById("lblRadioNE").setAttribute("class", "btn btn-light active");
					document.getElementById("radioNE").checked = true;
				break;
				case "E":
					document.getElementById("lblRadioE").setAttribute("class", "btn btn-light active");
					document.getElementById("radioE").checked = true;
				break;
				case "S-E":
					document.getElementById("lblRadioSE").setAttribute("class", "btn btn-light active");
					document.getElementById("radioSE").checked = true;
				break;

  				default:
  					break;
  			}
  		})();
  				
  	</script>
  	
</body>	
</html>