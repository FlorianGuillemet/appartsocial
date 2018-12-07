<?php
require_once '../controleur/cSessionAdminOK.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion des demandes locataires</title>
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
    
              <h1 class="my-4">Gestion des demandes locataires</h1>
              <hr/>
              <div class="list-group">
                <a href="#DemandesAttente" class="list-group-item"><span class="fas fa-hourglass-start mr-3"></span>Demandes locataires en attente 
                <?php if ($listDemandeAttente != NULL) {
                    echo "(".count($listDemandeAttente).")";
                }?></a>
                
                <a href="#DemandesCours" class="list-group-item"><span class="fas fa-sync-alt mr-3"></span>Mes demandes en cours
                <?php if ($listDemandeEnCours != NULL) {
                    echo "(".count($listDemandeEnCours).")";
                }?></a></a>
                
              </div>
    
            </div>
            <!-- /.col-lg-3 -->
    
            <div class="col-lg-9">
            	<div id="DemandesAttente">
            		<h2 class="my-4"><span class="fas fa-hourglass-start mr-3"></span>Demandes locataires en attente</h2>
            		
            		<div class="container-fluid">
                		<form method="post" action="#">
                    	
                        	<table class="table table-hover">
                        	<caption>Liste des demandes en attente de traitement</caption>
                        		<!-- Ligne d'entête du tableau -->
                        		
                        		<thead class="thead-light" >
                            		<tr>
                            			<th scope="col" class="col-ld-1 thBorderBHidden"></th>
                            			<th class="thBorderLR thBorderBHidden" colspan="3">Informations locataire</th>                            			
                            			<th scope="col" class="col-ld-1 thBorderBHidden"></th>
                            			<th class="thBorderLR thBorderBHidden" colspan="4">R&eacute;capitulatif de la demande du locataire</th>                            			
                            			<th scope="col" class="col-ld-1 thBorderBHidden"></th>
                            		</tr>
                        		</thead>
                        		<thead class="thead-light" >
                            		<tr>
                            			<th scope="col" class="col-ld-1">Date et heure<br/>de la demande</th>
                            			<th scope="col" class="col-ld-1 thBorderLeft fontNormal">ID du locataire</th>
                            			<th scope="col" class="col-ld-1 fontNormal">Nom et pr&eacute;nom<br/>du locataire</th>
                            			<th scope="col" class="col-ld-1 thBorderRight fontNormal">Adresse e-mail<br/>du locataire</th>
                            			<th scope="col" class="col-ld-1">R&eacute;f&eacute;rence<br/>de l'annonce</th>
                            			<th scope="col" class="col-ld-1 thBorderLeft fontNormal">A &eacute;valu&eacute; ses <br/> possibilit&eacute;s<br/> d'emprunt</th>
                            			<th scope="col" class="col-ld-1 fontNormal">Accompa-<br/>-gnement<br/>demand&eacute;</th>
                            			<th scope="col" class="col-ld-1 fontNormal">Contact<br/> rapide</th>
                            			<th scope="col" class="col-ld-3 thBorderRight fontNormal">Message du locataire</th>
                            			<th scope="col" class="col-ld-1">Traiter la demande</th>
                            		</tr>
                        		</thead>
                        		
                        		<tbody>
                            		
                            		<?php 
                            		if($listDemandeAttente != null){
                            		    foreach ($listDemandeAttente as $demandeAttente){?>
                            			
                                		<tr>
                                			<th scope="row"><?php                                        
                                			$dateDemandeAttente = new DateTime($demandeAttente->getDateDemande());
                                            echo $dateDemandeAttente->format('d.m.Y H\hi'); // 31.07.2012
                                            ?></th>
                                			<td><?php echo $demandeAttente->getIdUtilisateur()?></td>
                                		   	<td><?php echo $demandeAttente->getNomUtilisateur()." ".$demandeAttente->getPrenomUtilisateur()?></td>
                                		   	<td><a href="mailto:<?php echo $demandeAttente->getMailUtilisateur()?>" title="Envoyer un e-mail au locataire"><?php echo $demandeAttente->getMailUtilisateur()?></a></td>
                                		   	<td><a href="../controleur/cDetailAnnonce.php?idAnnonce=<?php echo $demandeAttente->getIdAnnonce()?>" title="Vers la page de d&eacute;tail de l'annonce"><?php echo $demandeAttente->getIdAnnonce()?></a></td>
                                		   	<td><?php echo $demandeAttente->getRadio1()?></td>
                                		   	<td><?php echo $demandeAttente->getRadio2()?></td>
                                		   	<td><?php if($demandeAttente->getRadio3() == "Oui") echo "<strong>".$demandeAttente->getRadio3()."</strong>"?></td>
                                		   	<td><?php echo $demandeAttente->getMessageDemandeClient()?></td>
                                		   	<td>
                                		   		<div class="container">
  													
  													<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formulaireModal"><span class="fas fa-edit"></span></button>

                                                    <!-- fenêtre modale -->
                                                    <div class="modal fade" id="formulaireModal" role="dialog">
                                                    	<div class="modal-dialog">                                                        
                                                          <!-- contenu de la fenêtre-->
                                                        	<div class="modal-content">
                                                                <form class="form-inline" method="post" action="../controleur/cGestionDemandes.php">
                                                                <div class="modal-header">
                                                                	<button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                	<h3 class="modal-title">Traitement de la demande</h3>
                                                                </div>
                                                                
                                                                    <div class="modal-body">
                                                                    	<div class="container"></div>
                                                                    	<div class="form-group ">
                                                            				<label>Mon action r&eacute;alis&eacute;e</label>
                                                            				<textarea class="form-control" name="inputAction" rows="3" type="text" required></textarea>
                                                            			</div>
                                                            			<div class="form-group my-3">
                                                            				<label>Message &agrave; destination du locataire (d&eacute;marche pr&eacute;conis&eacute;e)</label>
                                                            				<textarea class="form-control" name="inputMessage" rows="5" type="text" required></textarea>
                                                            			</div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    	<button name="btnEnvoyer" type="submit" class="btn btn-default" value="<?php echo $demandeAttente->getIdDemande()?>">Envoyer</button>
                                                                    </div>
                                                                </form>
                                                        	</div>
                                                    	</div>
                                                    </div>
                                                    
                                                </div>
                                		   	</td>	
                                		</tr>
                            				
                                		<?php 
                            		    }
                            				    
                            		}            		           		
                            		else{ ?>
                            		    <tbody>
                                		    <tr>
                                		    <td colspan="10"><span class="text-info"><strong>Aucune demande en attente de traitement</strong></span></td>            				    
                                        	</tr>
                                		</tbody>
                            		<?php }?>
                            		                            			
                        		</tbody>
                        		
                    		</table>    		
                		</form>
        			</div> 
            	</div>
            </div>  
          </div>
        </div>
          
    	</section>
    	   	
    	
    	<section>    		
        	<!-- second tableau - demandes en cours de traitement -->
            <div class="container-fluid">
        
                <div class="row mx-4" id="DemandesCours">
                
                	<h2 class="my-4"><span class="fas fa-sync-alt mr-3"></span>Mes demandes locataires en cours</h2>
                	<div class="container-fluid">
                    	<form method="post" action="#">
                        	
                           	<table class="table table-hover">
                           	<caption>Liste des demandes locataires en cours</caption>
                           		<!-- Ligne d'entête du tableau -->
                           		<thead class="thead-light" >
                               		<tr>
                               			<th scope="col" class="col-ld-1 thBorderBHidden"></th>
                               			<th class="thBorderLR thBorderBHidden" colspan="3">Informations locataire</th>                            			
                               			<th scope="col" class="col-ld-1 thBorderBHidden"></th>
                               			<th class="thBorderLR thBorderBHidden" colspan="4">R&eacute;capitulatif de la demande du locataire</th> 
                               			<th class="thBorderLR thBorderBHidden" colspan="3">Traitement de la demande du locataire</th>                            			
                               			<th scope="col" class="col-ld-1 thBorderBHidden"></th>
                               		</tr>
                           		</thead>
                           		<thead class="thead-light" >
                               		<tr>
                               			<th scope="col" class="col-ld-1">Date et heure<br/>de la demande</th>
                               			<th scope="col" class="col-ld-1 thBorderLeft fontNormal">ID du locataire</th>
                               			<th scope="col" class="col-ld-1 fontNormal">Nom et pr&eacute;nom<br/>du locataire</th>
                               			<th scope="col" class="col-ld-1 thBorderRight fontNormal">Adresse e-mail<br/>du locataire</th>
                               			<th scope="col" class="col-ld-1">R&eacute;f&eacute;rence<br/>de l'annonce</th>
                               			<th scope="col" class="col-ld-1 thBorderLeft fontNormal">A &eacute;valu&eacute; ses <br/> possibilit&eacute;s<br/> d'emprunt</th>
                               			<th scope="col" class="col-ld-1 fontNormal">Accompa-<br/>-gnement<br/>demand&eacute;</th>
                               			<th scope="col" class="col-ld-1 fontNormal">Contact<br/> rapide</th>
                               			<th scope="col" class="col-ld-3 thBorderRight fontNormal">Message du locataire</th>
                               			<th scope="col" class="col-ld-1">Date de prise<br/> en charge</th>
                               			<th scope="col" class="col-ld-1 fontNormal">Mon action r&eacute;alis&eacute;e</th>
                               			<th scope="col" class="col-ld-2 thBorderRight fontNormal">Message au locataire (d&eacute;marche pr&eacute;conis&eacute;e)</th>
                               			<th scope="col" class="col-ld-1">Cloturer la demande</th>
                               		</tr>
                           		</thead>
                           		
                           		<tbody>
                               		<form method="post" action="../controleur/cGestionDemandes.php">
                               		<?php 
                               		if($listDemandeEnCours != null){
                               		    foreach ($listDemandeEnCours as $demandeEnCours){?>
                               			
                                   		<tr>
                                   			<th scope="row"><?php                                        
                                   			$dateDemande = new DateTime($demandeEnCours->getDateDemande());
                                               echo $dateDemande->format('d.m.Y H\hi'); // 31.07.2012
                                               ?></th>
                                   			<td><?php echo $demandeEnCours->getIdUtilisateur()?></td>
                                   		   	<td><?php echo $demandeEnCours->getNomUtilisateur()." ".$demandeEnCours->getPrenomUtilisateur()?></td>
                                   		   	<td><a href="mailto:<?php echo $demandeEnCours->getMailUtilisateur()?>" title="Envoyer un e-mail au locataire"><?php echo $demandeEnCours->getMailUtilisateur()?></a></td>
                                   		   	<td><a href="../controleur/cDetailAnnonce.php?idAnnonce=<?php echo $demandeEnCours->getIdAnnonce()?>" title="Vers la page de d&eacute;tail de l'annonce"><?php echo $demandeEnCours->getIdAnnonce()?></a></td>
                                   		   	<td><?php echo $demandeEnCours->getRadio1()?></td>
                                   		   	<td><?php echo $demandeEnCours->getRadio2()?></td>
                                   		   	<td><?php if($demandeEnCours->getRadio3() == "Oui") echo "<strong>".$demandeEnCours->getRadio3()."</strong>"?></td>
                                   		   	<td><?php echo $demandeEnCours->getMessageDemandeClient()?></td>
                                   		   	<th><?php                                        
                                   		   	$datePrise = new DateTime($demandeEnCours->getDatePriseEnCharge());
                                               echo $datePrise->format('d.m.Y H\hi'); // 31.07.2012
                                               ?>
                                   		   	</th>
                                   		   	<td><?php if($demandeEnCours->getActionRealisee() != NULL) echo $demandeEnCours->getActionRealisee();
                                   		   	else{ echo "/";}?></td>
                                   		   	<td><?php if($demandeEnCours->getDemarcheClientPreconisee() != NULL) echo $demandeEnCours->getDemarcheClientPreconisee();
                                   		   	else{ echo "/";}?></td>
                                   		   	<td><button class="btn btn-primary" type="submit" name="submitCloturer" value="<?php echo $demandeEnCours->getIdDemande()?>"><span class="fas fa-door-closed"></span></button></td>	
                                   		   		    
                                   		</tr>
                               				
                                   		<?php 
                               		    }
                               				    
                               		}            		           		
                               		else{ ?>
                               		    <tbody>
                                   		    <tr>
                                   		    <td colspan="13"><span class="text-info"><strong>Aucune demande en cours de traitement</strong></span></td>            				    
                                           	</tr>
                                   		</tbody>
                               		<?php }?>                               		
                               			
                              		</form>
                           		</tbody>
                           		
                       		</table>    		
                   		</form>
           			</div> 
                  
                </div>
            </div>
        </section>
        
        <?php 
    	if (isset($_GET['saisieFormulaire']) AND ($_GET['saisieFormulaire'] == 'OK')) {?>
    	    <script>alert("Demande traitée et enregistrée en base de données");</script> 
    	<?php }
    	elseif (isset($_GET['saisieFormulaire']) AND ($_GET['saisieFormulaire'] == 'KO')){?>
    	    <script>alert("Erreur de saisie du formulaire");</script>
    	<?php }
    	?>
          
	</div>
	
	
</body>
</html>
