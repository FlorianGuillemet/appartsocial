<?php
require_once '../controleur/cSessionOK.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Espace personnel</title>
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
        <div class="container-fluid">
    
          <div class="row mx-4">
    
            <div class="col-lg-3">
    
              <h1 class="my-4">Espace personnel</h1>
              <hr/>
              <div class="list-group">
                <a href="#mesDemandes" class="list-group-item"><span class="fas fa-comment-alt mr-3"></span>Mes demandes 
                <?php if ($listDemande != NULL) {
                    echo "(".count($listDemande).")";
                }?></a>
                
                <a href="#mesAnnoncesFavorites" class="list-group-item"><span class="fas fa-star mr-3"></span>Mes annonces favorites</a>
                <a href="#monDossierFinancement" class="list-group-item"><span class="fas fa-folder-open mr-3"></span>Mon dossier de financement</a>
              </div>
    
            </div>
            <!-- /.col-lg-3 -->
    
            <div class="col-lg-9">
            	<div id="mesDemandes">
            		<h2 class="my-4">Mes demandes</h2>
            		
            		<div class="container-fluid">
                		<form method="post" action="#">
                    	
                        	<table class="table table-hover">
                        	<caption>Liste des demandes</caption>
                        		<!-- Ligne d'entête du tableau -->
                        		
                        		<thead class="thead-light">
                            		<tr>
                            			<th scope="col" class="col-ld-2">Date et heure<br/>de la demande</th>
                            			<th scope="col" class="col-ld-1">R&eacute;f&eacute;rence<br/>de l'annonce</th>
                            			<th scope="col" class="col-ld-2">Statut de la demande</th>
                            			<th scope="col" class="col-ld-1">Acompagnement<br/>pour dossier<br/>de financement</th>
                            			<th scope="col" class="col-ld-3">Message envoy&eacute;</th>
                            			<th scope="col" class="col-ld-2">R&eacute;ponse</th>
                            			<th scope="col" class="col-ld-1"></th>
                            		</tr>
                        		</thead>
                        		
                        		<tbody>
                        		<?php 
                        		if($listDemande != null){
                        		    foreach ($listDemande as $demande){?>
                        			
                            		<tr>
                            			<th scope="row"><?php                                        
                            			$dateTime = new DateTime($demande->getDateDemande());
                                        echo $dateTime->format('d.m.Y H\hi'); // 31.07.2012
                                        ?></th>
                            			
                            		   	<td><a href="../controleur/cDetailAnnonce.php?idAnnonce=<?php echo $demande->getIdAnnonce()?>" title="Vers la page de d&eacute;tail de l'annonce"><?php echo $demande->getIdAnnonce()?></a></td>
                            		   	<td><?php if ($demande->getStatutDemande() == NULL) {
                            		   	echo "En attente de traitement";
                            		   	}
                            		   	else{echo $demande->getStatutDemande();}
                            		   	?></td>
                            		   	<td><?php echo $demande->getRadio2()?></td>
                            		   	<td><?php echo $demande->getMessageDemandeClient()?></td>
                            		   	<td><?php echo $demande->getDemarcheClientPreconisee()?></td>
                            		   	<td><button class="btn btn-warning" type="submit" name="submitDelete" value="<?php echo $demande->getIdDemande()?>"><span class="fas fa-trash-alt"></span></button></td>	
                            		   		    
                            		</tr>
                        				
                            		<?php 
                        		    }
                        				    
                        		}            		           		
                        		else{ ?>
                        		    <tbody>
                            		    <tr>
                            		    <td colspan="10"><span class="text-info"><strong>Vous n'avez aucune demande en cours</strong></span></td>            				    
                                    	</tr>
                            		</tbody>
                        		<?php }?>
                        		
                        		</tbody>
                    		</table>    		
                		</form>
        			</div> 
        	            		
            	
            	</div>
            	
            	<div id="mesAnnoncesFavorites">
            		<h2 class="my-4">Mes annonces favorites</h2>
            		<p>
            		Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, 
            		ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, 
            		rei publicae consulere oporteret?

					Haec igitur prima lex amicitiae sanciatur, ut ab amicis honesta petamus, 
					amicorum causa honesta faciamus, ne exspectemus quidem, dum rogemur; studium semper adsit, 
					cunctatio absit; consilium vero dare audeamus libere. 
					Plurimum in amicitia amicorum bene suadentium valeat auctoritas, 
					eaque et adhibeatur ad monendum non modo aperte sed etiam acriter, si res postulabit, et adhibitae pareatur.

					Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, 
					quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, 
					gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.
            		</p>
            	</div>
            	
            	<div id="monDossierFinancement">
            		<h2 class="my-4">Mon dossier de financement</h2>
            		<p>
            		Ego vero sic intellego, Patres conscripti, nos hoc tempore in provinciis decernendis 
            		perpetuae pacis habere oportere rationem. Nam quis hoc non sentit omnia alia esse nobis 
            		vacua ab omni periculo atque etiam suspicione belli?

					Pandente itaque viam fatorum sorte tristissima, qua praestitutum erat eum vita et imperio spoliari, 
					itineribus interiectis permutatione iumentorum emensis venit Petobionem oppidum Noricorum, 
					ubi reseratae sunt insidiarum latebrae omnes, et Barbatio repente apparuit comes, 
					qui sub eo domesticis praefuit, cum Apodemio agente in rebus milites ducens, 
					quos beneficiis suis oppigneratos elegerat imperator certus nec praemiis nec miseratione ulla posse deflecti.

					Ac ne quis a nobis hoc ita dici forte miretur, 
					quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, 
					ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, 
					quae ad humanitatem pertinent, habent quoddam commune vinculum, 
					et quasi cognatione quadam inter se continentur.
            		</p>            		
            	
            	</div>
    
            </div>  
          </div>
        </div>
          
    	</section>
	</div>
	
</body>
</html>
