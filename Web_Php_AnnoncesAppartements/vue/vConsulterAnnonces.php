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
        
                  <h1 class="my-4">Votre futur appartement</h1>
                  <hr/>
                  <div class="list-group">
                    <a href="#" class="list-group-item">T2 (lien &agrave; r&eacute;aliser)</a>
                    <a href="#" class="list-group-item">T3 (lien &agrave; r&eacute;aliser)</a>
                    <a href="#" class="list-group-item">T4 (lien &agrave; r&eacute;aliser)</a>
                  </div>
        
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
                        <img class="d-block img-fluid " src="../asset/images/Unicil-900x350-origin.png" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
        
        <!-- BOUCLER POUR INTEGRER CHAQUE ANNONCE DANS LE HTML -->
        
                  <div class="row">
                  <?php           
        		  if ($listAnnonce != NULL) {
        		    foreach ($listAnnonce as $annonce){?>
                  
                  	<div class="col-lg-4 col-md-6 mb-4">
                    	<div class="card h-100">
                            
                            <div class="view overlay">
                            	<a href="../controleur/cDetailAnnonce.php?idAnnonce=<?php echo $annonce->getIdAnnonce()?>"><img class="card-img-top img-responsive" height="180" src="<?php echo $annonce->getImage1()?>" alt=""></a>
                            </div>
                            
                            <div class="card-body">
                            	<h4 class="card-title">
                                	<a href="../controleur/cDetailAnnonce.php?idAnnonce=<?php echo $annonce->getIdAnnonce()?>"><?php echo $annonce->getVille()?></a>
                            	</h4>
                              	
                              	<h5><?php echo number_format($annonce->getPrix(), 0, ',', ' ');?>&euro;</h5>
                              	
                              	<p id="pCardText" ><em> <?php echo $annonce->getDescriptif()?></em></p>
                            
                            </div>
                            
                            <div class="card-footer">
                           		<small class="text-muted"><strong><?php echo $annonce->getType()?></strong><?php echo " - "?><strong><?php echo $annonce->getSurface()."m&sup2;"?></strong><?php echo " - ".$annonce->getExposition()?></small>                	
                            </div>
                      	</div>
                 	</div>          
                  <?php 
        		    }
        		  }?>
        		  </div>
                </div> 
              </div>
            </div>
          
    	</section>
	</div>
	
	
</body>
</html>
