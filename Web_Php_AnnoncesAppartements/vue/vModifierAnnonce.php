<?php 
require_once '../controleur/cSessionAdminOK.php';
?>

<!DOCTYPE html>
<html>
<head>	
	<title>Modification d'une annonce</title>
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
          		<legend>Modification d'une annonce</legend>
        		<hr>
        	
        	</div>
        	    	
        	<div class="container">
        		
            	
                	<table class="table table-hover">
                	<caption>Liste des annonces</caption>
                		<!-- Ligne d'entête du tableau -->
                		
                		<thead class="thead-light">
                    		<tr>
                    			<th scope="col" class="col-ld-1">ID</th>
                    			<th scope="col" class="col-ld-1">Type</th>
                    			<th scope="col" class="col-ld-1">Surface</th>
                    			<th scope="col" class="col-ld-1">Prix</th>
                    			<th scope="col" class="col-ld-1">Image</th>
                    			<th scope="col" class="col-ld-2">Descriptif</th>
                    			<th scope="col" class="col-ld-1">Exposition</th>
                    			<th scope="col" class="col-ld-2">Ville</th>
                    			<th scope="col" class="col-ld-1">Date de l'annonce</th>
                    			<th scope="col" class="col-ld-1"></th>
                    		</tr>
                		</thead>
                		
                		<tbody>
                		<?php 
                		if($listAnnonce != null){
                		    foreach ($listAnnonce as $annonce){?>
                			<form name="formModifier" method="get" action="../controleur/cModifierAnnonce.php">
                        		<tr>
                        			<th scope="row"><?php echo $annonce->getIdAnnonce()?></th>
                        		   	<td><?php echo $annonce->getType()?></td>
                        		   	<td><?php echo $annonce->getSurface()?></td>
                        		   	<td><?php echo $annonce->getPrix()?></td>
                        		   	<td><img class="card-img" src="<?php echo $annonce->getImage1()?>" alt=""></td>
                        		   	<td><?php echo $annonce->getDescriptif()?></td>
                        		   	<td><?php echo $annonce->getExposition()?></td>
                        		   	<td><?php echo $annonce->getVille()?></td>
                        		   	<td><?php echo $annonce->getDateAnnonce()?></td>
                        		   	<td><button class="btn btn-warning" type="submit" name="submitModifier" value="<?php echo $annonce->getIdAnnonce()?>">Modifier</button></td>		    
                        		</tr>
                			</form>	
                    		<?php 
                		    }
                				    
                		}            		           		
                		else{ ?>
                		    <tbody>
                    		    <tr>
                    		    <td colspan="2">Le tableau est vide</td>            				    
                            	</tr>
                    		</tbody>
                		<?php }?>            		          			
                		
                		</tbody>
            		</table>    		
        		
        	</div> 
        	
        	<div class="container my-3">
            	<form method ="get" action="../vue/vPageAccueil.php">
            		<input class="btn btn-primary" type="submit" name="btnRetour" value="Retour &agrave; l'accueil"/>	
            	</form>
        	</div>
    	
    	</section>
	</div>			
</body>
</html>
