<?php 
require_once '../controleur/cSessionOK.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Consultation annonces</title>
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
        		
        	<!-- Page Content -->
            <div class="container">
        
            	<div class="row">
        
                	<div class="col-lg-3">
        
                  		<h2 class="my-4"><?php echo $annonce->getVille()?></h2>
                  		<hr>
                  		<h4 class="my-2 mx-3"><?php echo $annonce->getType()?> de <?php echo $annonce->getSurface()?> <span>m&sup2;</span></h4>
                  		<h4 class="my-2 mx-3"><?php echo number_format($annonce->getPrix(), 0, ',', ' ');?>&euro;</h4>
                  
                	</div>
                    <!-- /.col-lg-3 -->
        
                	<div class="col-lg-9">
                  
                  		<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    		<ol class="carousel-indicators">
                      			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    		</ol>
                    		<div class="carousel-inner" role="listbox">
                      			<div class="carousel-item active">
                        			<img class="d-block img-responsive" style="margin:0 auto;" height="400" src="<?php echo $annonce->getImage1()?>" alt="First slide">
                        			<div class="carousel-caption">
                  						<h3>Pi&egrave;ce</h3>
                  						<p>Commentaire</p>
                					</div>
                      			</div>
                      			<div class="carousel-item">
                        			<img class="d-block img-responsive" style="margin:0 auto;" height="400" src="http://placehold.it/900x350" alt="Second slide">
                        			<div class="carousel-caption">
                  						<h3>Pi&egrave;ce</h3>
                  						<p>Commentaire</p>
                					</div>
                      			</div>
                      			<div class="carousel-item">
                        			<img class="d-block img-responsive" style="margin:0 auto;" height="400" src="http://placehold.it/900x350" alt="Third slide">
                        			<div class="carousel-caption">
                  						<h3>Pi&egrave;ce</h3>
                  						<p>Commentaire</p>
                					</div>
                      			</div>
                    		</div>
                            <!-- Left and right controls -->          
                    		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      			<span class="sr-only">Previous</span>
                    		</a>
                    		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      			<span class="carousel-control-next-icon" aria-hidden="true"></span>
                      			<span class="sr-only">Next</span>
                    		</a>          
                  		</div>
                	</div>
                	<!-- /.col-lg-9 -->        
        		</div>
                <!-- /.row -->
              
              	<div class="row">
        
                	<div class="col-lg-3">
                  		<h3 class="my-4"></h3>
                  	</div>
                    <!-- /.col-lg-3 -->
        			<div class="col-lg-1"></div>
        			
        			<div class="col-lg-7">
        				
        				<label for="descriptif"><strong>Descriptif</strong></label>
        				<p id="descriptif"><?php echo $annonce->getDescriptif(); ?></p>
              
            		</div>
            		
            		<div class="col-lg-1"></div>
        		</div>
        		
        	</div>
        	
        	
        	<div class="container">	
        		
        		<div class="row">			
        			<div class="container">	
        				<div class="form-group my-3">
        					<button id="btnInteresse" class="btn btn-primary btn-lg left-block mx-3" >Int&eacute;ress&eacute; ?</button>
        				</div>
        			</div>
        		</div>
        		
        		<div id="containerFormulaire" class="row" >		
        			<div class="container">
        				<form method="post" action="../controleur/cRecupDemande.php">
        					
        					<div class="form-group my-3">
        						<label class="col-md-6">Avez-vous d&eacute;j&agrave; &eacute;valu&eacute; vos possibilit&eacute;s d'emprunt ?</label>
            					<div class="btn-group btn-group-toggle mx-3 mb-3" data-toggle="buttons">
                					<label id="lblRadio1Oui" class="btn btn-light active">
                            			<input class="form-control" type="radio" name="inputRadio1" id="radio1Oui" value="Oui" checked> Oui
                          			</label>
                          			<label id="lblRadio1Non" class="btn btn-light">
                            			<input class="form-control" type="radio" name="inputRadio1" id="radio1Non" value="Non"> Non
                          			</label>
            					</div>
            				</div>		
        					
        					<div class="form-group my-3">
        						<label class="col-md-6">Souhaiteriez-vous &ecirc;tre accompagn&eacute; par nos services pour vous aider &agrave; pr&eacute;parer un dossier de financement ?</label>
            					<div class="btn-group btn-group-toggle mx-3 mb-3" data-toggle="buttons">
                					<label id="lblRadio2Oui" class="btn btn-light active">
                            			<input class="form-control" type="radio" name="inputRadio2" id="radio2Oui" value="Oui" checked> Oui
                          			</label>
                          			<label id="lblRadio2Non" class="btn btn-light">
                            			<input class="form-control" type="radio" name="inputRadio2" id="radio2Non" value="Non"> Non
                          			</label>
            					</div>
            				</div>		
            				
            				<div class="form-group my-3">
        						<label class="col-md-6">D&eacute;sirez-vous &ecirc;tre recontact&eacute; rapidement ?</label>
            					<div class="btn-group btn-group-toggle mx-3 mb-3" data-toggle="buttons">
                					<label id="lblRadio3Oui" class="btn btn-light active">
                            			<input class="form-control" type="radio" name="inputRadio3" id="radio3Oui" value="Oui" checked> Oui
                          			</label>
                          			<label id="lblRadio3Non" class="btn btn-light">
                            			<input class="form-control" type="radio" name="inputRadio3" id="radio3Non" value="Non"> Non
                          			</label>
            					</div>
            				</div>		    
        					   				
            				<div class="form-inline my-3">
            					<label class="col-md-6">Message compl&eacute;mentaire, &agrave; l'attention de notre service de vente immobili&egrave;re :</label>
            					<div class="col-md-6">
            						<textArea class="form-control" id="txtAreaMessage" name="inputMessage" placeholder="Ecrivez votre message ici (300 caract&egrave;res maximum)" rows="3" maxlength="300" ></textArea>
            					</div>
            				</div>									
        					
        					
            				<div class="form-group my-3">                		
                        		<button class="btn btn-success btn-lg left-block mx-3" type="submit" name="submitDemande" value="<?php echo $annonce->getIdAnnonce();?>">Envoyer ma demande</button>
                        	</div>	            				
        
        				</form>
        			</div>
        		</div>
        	</div>
        	
    	</section>
	</div>
	
	<script >

	var btnInteresse = document.getElementById('btnInteresse');
	var containerFormulaire = document.getElementById('containerFormulaire');

	containerFormulaire.setAttribute("style", "visibility: hidden");
	btnInteresse.addEventListener("click", function() {afficherFormulaire();});

	function afficherFormulaire(){
		console.log('containerFormulaire');
		containerFormulaire.setAttribute("style", "visibility: visible");	
	}
	
	</script>
	
	<?php 
	if ( isset($_GET['envoiDemande']) AND $_GET['envoiDemande'] == 'ok')  {?>
	    <script>alert("Votre demande a bien \u00e9t\u00e9 envoy\u00e9e");</script> 
	<?php }
	elseif ( isset($_GET['envoiDemande']) AND $_GET['envoiDemande'] == 'ko'){?>
	    <script>alert("Demande non envoy\u00e9e");</script>
	<?php }
	?>

</body>
</html>
