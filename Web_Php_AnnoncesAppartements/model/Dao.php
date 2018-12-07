<?php
echo "<!--import de Dao.php-->";
require_once '../metier/FicheAppart.php';
require_once '../metier/Annonce.php';
require_once '../metier/Utilisateur.php';
require_once '../metier/Demande.php';
require_once '../metier/DemandeAttente.php';
require_once '../metier/DemandeEnCours.php';

class Dao{
    //propriétés.
    //Connection affectée lors de la construction de l'objet dao
    private $connection;
    
    //Champs de la table annonce
    private $tableAnnonce = 'annonce';
    private $idAnnonce = 'idAnnonce';    
    private $type = 'type';
    private $surface = 'surface';
    private $prix = 'prix';
    private $image1 = 'image1';
    private $descriptif = 'descriptif';    
    private $exposition = 'exposition';
    private $ville = 'ville';
    private $dateAnnonce = 'dateAnnonce';
    
    //Champs de la table utilisateur
    private $tableUtilisateur = 'utilisateur';
    private $idUtilisateur = 'idUtilisateur';
    private $login = 'login';
    private $password = 'password';
    private $role = 'role';
    private $nomUtilisateur = 'nomUtilisateur';
    private $prenomUtilisateur = 'prenomUtilisateur';
    private $mailUtilisateur = 'mailUtilisateur';
    
    //Champs de la table Demande
    private $tableDemande = 'demande';
    private $idDemande = 'idDemande';
    private $radio1 = 'radio1';
    private $radio2 = 'radio2';
    private $radio3 = 'radio3';
    private $messageDemandeClient = 'messageDemandeClient';
    private $dateDemande = 'dateDemande';
    private $statutDemande = 'statutDemande';
    private $datePriseEnCharge = 'datePriseEnCharge';
    private $nomOperateur = 'nomOperateur';
    private $actionRealisee = 'actionRealisee';
    private $demarcheClientPreconisee = 'demarcheClientPreconisee';
    private $dateTraitement = 'dateTraitement';
    
    private $msgStatutEnCours = "En cours de traitement";
    
    
    //constructeur
    public function __construct(){
        try{
            $this->connection = new PDO('mysql:host=localhost;dbname='.$this->tableAnnonce.';charset=utf8', 'flo', 'java1');
        }
        catch (Exception $e){
            die('Erreur : '. $e->getMessage());
        }
    }
    
    //Insert de l'annonce du formulaire.
    //avec une requête préparée.
    function insertIntoAnnonce($ficheAppart){
        $sqlInsert = "INSERT INTO `".$this->tableAnnonce."`(`".$this->type."`, `".$this->surface."`, `".$this->prix."`, `".$this->image1."`, `".$this->descriptif."`, `".$this->exposition."`, `".$this->ville."`, ".$this->dateAnnonce.") VALUES (?,?,?,?,?,?,?,?)";
        
        $req = $this->connection->prepare($sqlInsert);
                        
        //recuperation des propriétés de l'objet $FicheAppart dans des variables                
        $req->execute(array(
            $type = $ficheAppart->getType(),
            $surface = $ficheAppart->getSurface() ,
            $prix = $ficheAppart->getPrix() ,
            $image1 = $ficheAppart->getImage1() ,
            $descriptif = $ficheAppart->getDescriptif(),
            $exposition = $ficheAppart->getExposition(),
            $ville = $ficheAppart->getVille(),
            $dateAnnonce = $ficheAppart->getDateAnnonce()
            
        ) );                       
    
        $req->closeCursor();
        
    }
    
    
    function selectTableAnnonce() {
        $sqlSelect = "SELECT * FROM `".$this->tableAnnonce."` ORDER BY `".$this->idAnnonce."`";
        $listAnnonce = NULL;
        
        $resultSet = $this->connection->query($sqlSelect);
        
        // On affiche chaque entrée une à une
        while ($fiche=$resultSet->fetch()) {
            $idAnnonce = $fiche[$this->idAnnonce];
            $type = $fiche[$this->type];
            $surface = $fiche[$this->surface];
            $prix = $fiche[$this->prix];
            $image1 = $fiche[$this->image1];
            $descriptif = $fiche[$this->descriptif];
            $exposition = $fiche[$this->exposition];
            $ville = $fiche[$this->ville];
            $dateAnnonce = $fiche[$this->dateAnnonce];
            
            //On instancie un objet Annonce
            $annonce = new Annonce($idAnnonce, $type, $surface, $prix, $image1, $descriptif, $exposition, $ville, $dateAnnonce);
            
            //puis mettre lobjet Annonce dans une liste dannonces.
            $listAnnonce[] = $annonce;
            
        }
        
        $resultSet->closeCursor();
        
        return $listAnnonce;
    }
    
    //Selection d'une annonce et retour d'une annonce
    /**
     * Selection d'une annonce et retour d'une annonce
     * @param $idAnnonce
     * @return $annonce
     */
    function selectAnnonce($idAnnonce) {
        
        //
        $sqlSelect = "SELECT `".$this->type."`, `".$this->surface."`, `".$this->prix."`, `"
                                .$this->image1."`, `".$this->descriptif."`, `"
                                .$this->exposition."`, `".$this->ville."`, `".$this->dateAnnonce
                                ."` FROM `".$this->tableAnnonce
                                ."` WHERE `".$this->idAnnonce
                                ."` LIKE ".$idAnnonce."";
        $annonce = NULL;
        
        $resultSet = $this->connection->query($sqlSelect);
        
        // On affiche chaque entrée une à une
        while ($fiche=$resultSet->fetch()) {
            $type = $fiche[$this->type];
            $surface = $fiche[$this->surface];
            $prix = $fiche[$this->prix];
            $image1 = $fiche[$this->image1];
            $descriptif = $fiche[$this->descriptif];
            $exposition = $fiche[$this->exposition];
            $ville = $fiche[$this->ville];
            $dateAnnonce = $fiche[$this->dateAnnonce];
            
            //On instancie un objet Annonce
            $annonce = new Annonce($idAnnonce, $type, $surface, $prix, $image1, $descriptif, $exposition, $ville, $dateAnnonce);
                       
        }
        
        $resultSet->closeCursor();
        
        return $annonce;
    }
  
    
    //Delete d'une ou plusieurs annonces
    //avec un opérateur IN qui permet d'inclure plusieurs valeurs (ici la chaine $sqlADelete)
    function deleteAnnonce($chaineADelete) {
            
        $sqlDelete = "DELETE FROM `".$this->tableAnnonce."` WHERE `".$this->idAnnonce."` IN (".$chaineADelete.")";
            
        $req = $this->connection->exec($sqlDelete);
                     
            
    }
    
    //Update d'une annonce
    //avec une requête préparée
    function updateAnnonce($idAnnonce, $ficheAppart) {
               
        $sqlUpdate = "UPDATE `".$this->tableAnnonce
                                ."` SET `".$this->type."`= :nvType, `".$this->surface."`= :nvSurface, 
                                        `".$this->prix."`= :nvPrix, `".$this->image1."`= :nvImage1,
                                        `".$this->descriptif."`= :nvDescriptif, `".$this->exposition."`= :nvExposition,
                                        `".$this->ville."`= :nvVille, `".$this->dateAnnonce."`= :nvDateAnnonce 
                                WHERE `".$this->idAnnonce."` 
                                LIKE '".$idAnnonce."'";
       
        $req = $this->connection->prepare($sqlUpdate);
                                
        $req->execute(array(
            'nvType' => $ficheAppart->getType(),
            'nvSurface' => $ficheAppart->getSurface(),
            'nvPrix' => $ficheAppart->getPrix(),
            'nvImage1' => $ficheAppart->getImage1(),
            'nvDescriptif' => $ficheAppart->getDescriptif(),
            'nvExposition' => $ficheAppart->getExposition(),
            'nvVille' => $ficheAppart->getVille(),
            'nvDateAnnonce' => $ficheAppart->getDateAnnonce(),
            
        ));                          
                      
    }   
    
    function verifAuthentification($inputLogin, $inputPassword) {
        
        $sqlSelectUtilisateur = "SELECT * FROM `".$this->tableUtilisateur."` WHERE ".$this->login." LIKE '".$inputLogin."' AND ".$this->password." LIKE '".$inputPassword."'" ;
        
        $resulSet = $this->connection->query($sqlSelectUtilisateur);
        
        //Je récupère le nombre de ligne affectées par la requête. 
        $nbreLigneAffectee = $resulSet->rowCount();
        
        // Si le nombre est 1, c'est qu'il a trouvé la correspondance du login et password en base de donnnées.
        if ($nbreLigneAffectee == 1) {
            while ($fiche = $resulSet->fetch()) {                
                $idUtilisateur = $fiche[$this->idUtilisateur];
                $login = $fiche[$this->login];
                $password = $fiche[$this->password];
                $role = $fiche[$this->role];
                $nomUtilisateur = $fiche[$this->nomUtilisateur];
                $prenomUtilisateur = $fiche[$this->prenomUtilisateur];
                $mailUtilisateur = $fiche[$this->mailUtilisateur];
                
                //Je récupere et j'instancie un nouvel utilisateur
                $utilisateur = new Utilisateur($idUtilisateur, $login, $password, $role, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur);
            }
        }
        //sinon je sette la variable utilisateur à null
        else{
            $utilisateur = NULL;
        }
        //je retourne une variable utilisateur qui peut être nulle
        return $utilisateur;
            
        
    }
    
    //Insert de la demande du client.
    //avec une requête préparée.
    function insertIntoDemandeClient($idAnnonce, $listInputClient, $idUtilisateur){
        $sqlInsertDemandeClient = "INSERT INTO `".$this->tableDemande."`(`".$this->idAnnonce."`, `".$this->radio1."`, `".$this->radio2."`, `".$this->radio3."`, `".$this->messageDemandeClient."`, `".$this->dateDemande."`, `".$this->idUtilisateur."`) 
                                    VALUES (:idAnnonce, :radio1, :radio2, :radio3, :message, :dateDemande, :idUtilisateur)";
        
        $req = $this->connection->prepare($sqlInsertDemandeClient);
       
        //recuperation des propriétés de l'objet $FicheAppart dans des variables
        $req->execute(array(
            'idAnnonce' => $idAnnonce,
            'radio1' => $listInputClient[0],
            'radio2' => $listInputClient[1],
            'radio3' => $listInputClient[2],
            'message' => $listInputClient[3],
            'dateDemande' => date('Y-m-d H:i:s'),
            // $dateDemande = date('Y-m-d H:i:s')   //autre manière d'enregitrer la date en base.
            'idUtilisateur' => $idUtilisateur
        ) );
        
        $req->closeCursor();
                        
    }
    
    //Fonction de selection de données de la table demande selon l'id de l'utilisateur
    //avec une procédure stockée
    function selectTableDemande($idUtilisateur){
    
        $sqlSelect = "CALL selectionDemandeClient($idUtilisateur)"; //Procedure stockee
//         DELIMITER $$
//         CREATE DEFINER=`root`@`localhost` PROCEDURE `selectionDemandeClient`(IN `in_idUtilisateur` INT)
//         BEGIN
//         SELECT idDemande, idAnnonce, radio1, radio2, radio3, messageDemandeClient, dateDemande, statutDemande, demarcheClientPreconisee, dateTraitement
//         FROM demande
//         WHERE idUtilisateur = in_idUtilisateur
//         ORDER BY idDemande ;
//         END$$
//         DELIMITER ;
                
        $listDemande = NULL;          
        
        $resultSet = $this->connection->query($sqlSelect);
               
        
        // On affiche chaque entrée une à une
        while ($fiche=$resultSet->fetch()) {
            $idDemande = $fiche[$this->idDemande];
            $idAnnonce = $fiche[$this->idAnnonce];
            $radio1 = $fiche[$this->radio1];
            $radio2 = $fiche[$this->radio2];
            $radio3 = $fiche[$this->radio3];
            $messageDemandeClient = $fiche[$this->messageDemandeClient];
            $dateDemande = $fiche[$this->dateDemande];
            $statutDemande = $fiche[$this->statutDemande];
            $demarcheClientPreconisee = $fiche[$this->demarcheClientPreconisee];
            $dateTraitement = $fiche[$this->dateTraitement];
            
            //On instancie un objet Demande
            $demande = new Demande($idDemande, $idUtilisateur, $idAnnonce, $radio1, $radio2, $radio3, $messageDemandeClient, $dateDemande, $statutDemande, $demarcheClientPreconisee, $dateTraitement);
            
            $listDemande[] = $demande;
            
        }
        
        $resultSet->closeCursor();
        
        return $listDemande;
    }
    
    //Selection de données des demandes en attente de traitement
    //Avec une jointure
    function selectTableDemandeAttente() {
        $sqlSelect ="SELECT ".$this->tableDemande.".".$this->idDemande.", ".$this->tableDemande.".".$this->idUtilisateur.", "
                            .$this->tableDemande.".".$this->idAnnonce.", ".$this->tableDemande.".".$this->radio1.", "
                            .$this->tableDemande.".".$this->radio2.", ".$this->tableDemande.".".$this->radio3.", "
                            .$this->tableDemande.".".$this->messageDemandeClient.", ".$this->tableDemande.".".$this->dateDemande.", "
                            .$this->tableUtilisateur.".".$this->nomUtilisateur.", ".$this->tableUtilisateur.".".$this->prenomUtilisateur.", "
                            .$this->tableUtilisateur.".".$this->mailUtilisateur." 
                    FROM `".$this->tableDemande."`
                    INNER JOIN `".$this->tableUtilisateur."`
                    ON ".$this->tableDemande.".".$this->idUtilisateur." = ".$this->tableUtilisateur.".".$this->idUtilisateur."
                    WHERE `".$this->statutDemande."` IS null 
                    ORDER BY `".$this->dateDemande."`";
        
        $listDemandeAttente = NULL;
                
        $resultSet = $this->connection->query($sqlSelect);
       
        // On affiche chaque entrée une à une
        while ($fiche=$resultSet->fetch()) {
            $idDemande = $fiche[$this->idDemande];
            $idUtilisateur = $fiche[$this->idUtilisateur];
            $idAnnonce = $fiche[$this->idAnnonce];
            $radio1 = $fiche[$this->radio1];
            $radio2 = $fiche[$this->radio2];
            $radio3 = $fiche[$this->radio3];
            $messageDemandeClient = $fiche[$this->messageDemandeClient];
            $dateDemande = $fiche[$this->dateDemande];
            $nomUtilisateur = $fiche[$this->nomUtilisateur];
            $prenomUtilisateur = $fiche[$this->prenomUtilisateur];
            $mailUtilisateur = $fiche[$this->mailUtilisateur];
            
            //On instancie un objet Demande
            $demandeAttente = new DemandeAttente($idDemande, $idUtilisateur, $idAnnonce, $radio1, $radio2, $radio3, $messageDemandeClient, $dateDemande, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur);
            
            $listDemandeAttente[] = $demandeAttente;
            
        }
        
        $resultSet->closeCursor();
        
        return $listDemandeAttente;
        
    }
    
//     function updateDemandeAttente($idDemandeSelect, $nomOperateur){
        
//         $sqlUpdate = "UPDATE `".$this->tableDemande."` SET `".$this->statutDemande."`= :".$this->statutDemande.",`".$this->datePriseEnCharge."`= :".$this->datePriseEnCharge.",`".$this->nomOperateur."`= :".$this->nomOperateur." WHERE `".$this->idDemande."` = ".$idDemandeSelect.""; 
        
//         $req = $this->connection->prepare($sqlUpdate);
        
//         $req->execute(array(
//             'statutDemande' => $this->msgStatutEnCours,
//             'datePriseEnCharge' => date('Y-m-d H:i:s'),
//             'nomOperateur' => $nomOperateur            
//         ));
        
//         $req->closeCursor();
        
//     }
    
    function updateDemandeAttente($idDemandeSelect, $nomOperateur, $actionRealisee, $demarchePreconisee){
        
        $sqlUpdate = "UPDATE `".$this->tableDemande."` SET `".$this->statutDemande."`= :".$this->statutDemande.",`".$this->datePriseEnCharge."`= :".$this->datePriseEnCharge.",`".$this->nomOperateur."`= :".$this->nomOperateur.",`".$this->actionRealisee."`= :".$this->actionRealisee.",`".$this->demarcheClientPreconisee."`= :".$this->demarcheClientPreconisee." WHERE `".$this->idDemande."` = ".$idDemandeSelect."";
        
        $req = $this->connection->prepare($sqlUpdate);
        
        $req->execute(array(
            'statutDemande' => $this->msgStatutEnCours,
            'datePriseEnCharge' => date('Y-m-d H:i:s'),
            'nomOperateur' => $nomOperateur,
            'actionRealisee' => $actionRealisee,
            'demarcheClientPreconisee' => $demarchePreconisee
        ));
        
        $req->closeCursor();
        
    }
    
    function selectTableDemandeEnCours($nomOperateur){
        
        $sqlSelect = "SELECT ".$this->tableDemande.".".$this->idDemande.", ".$this->tableDemande.".".$this->idUtilisateur.", "
                                .$this->tableDemande.".".$this->idAnnonce.", ".$this->tableDemande.".".$this->radio1.", "
                                .$this->tableDemande.".".$this->radio2.", ".$this->tableDemande.".".$this->radio3.", "
                                .$this->tableDemande.".".$this->messageDemandeClient.", ".$this->tableDemande.".".$this->dateDemande.", "
                                .$this->tableDemande.".".$this->datePriseEnCharge.", ".$this->tableDemande.".".$this->actionRealisee.", "
                                .$this->tableDemande.".".$this->demarcheClientPreconisee.", ".$this->tableDemande.".".$this->dateTraitement.", "
                                .$this->tableUtilisateur.".".$this->nomUtilisateur.", ".$this->tableUtilisateur.".".$this->prenomUtilisateur.", "
                                .$this->tableUtilisateur.".".$this->mailUtilisateur."
                        FROM `".$this->tableDemande."`
                        INNER JOIN `".$this->tableUtilisateur."`
                        ON ".$this->tableDemande.".".$this->idUtilisateur." = ".$this->tableUtilisateur.".".$this->idUtilisateur."
                        WHERE `".$this->statutDemande."` LIKE 'En cours de traitement' 
                        AND `".$this->nomOperateur."` LIKE '".$nomOperateur."' 
                        ORDER BY `".$this->dateDemande."`";
        
                            
        $listDemandeEnCours = NULL;
                                
        $resultSet = $this->connection->query($sqlSelect);
                                
        // On affiche chaque entrée une à une
        while ($fiche=$resultSet->fetch()) {
            $idDemande = $fiche[$this->idDemande];
            $idUtilisateur = $fiche[$this->idUtilisateur];
            $idAnnonce = $fiche[$this->idAnnonce];
            $radio1 = $fiche[$this->radio1];
            $radio2 = $fiche[$this->radio2];
            $radio3 = $fiche[$this->radio3];
            $messageDemandeClient = $fiche[$this->messageDemandeClient];
            $dateDemande = $fiche[$this->dateDemande];
            $datePriseEnCharge = $fiche[$this->datePriseEnCharge];
            $actionRealisee = $fiche[$this->actionRealisee];
            $demarcheClientPreconisee = $fiche[$this->demarcheClientPreconisee];
            $dateTraitement = $fiche[$this->dateTraitement];         
            $nomUtilisateur = $fiche[$this->nomUtilisateur];
            $prenomUtilisateur = $fiche[$this->prenomUtilisateur];
            $mailUtilisateur = $fiche[$this->mailUtilisateur];
               
                                    
        //On instancie un objet Demande
        $demandeEnCours = new DemandeEnCours($idDemande, $idUtilisateur, $idAnnonce, $radio1, $radio2, $radio3, $messageDemandeClient, $dateDemande, $datePriseEnCharge, $actionRealisee, $demarcheClientPreconisee, $dateTraitement, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur);
                              
        $listDemandeEnCours[] = $demandeEnCours;
                                    
        }
                                
        $resultSet->closeCursor();
                                
        return $listDemandeEnCours;
                                
                                
    }
    
    
}
    
    
//         while ($fiche = $resulSet->fetch()) {
            
//             $idUtilisateur = $fiche[$this->idUtilisateur];
//             $login = $fiche[$this->login];
//             $role = $fiche[$this->role];
//             $nomUtilisateur = $fiche[$this->nomUtilisateur];
//             $mailUtilisateur = $fiche[$this->mailUtilisateur];
                        
//         }
        
//         if ( ($idUtilisateur != NULL) AND ($login !=NULL) AND ($role!=NULL) AND ($nomUtilisateur!=NULL) AND ($mailUtilisateur!=NULL) ) {
            
//             $utilisateur = new Utilisateur($idUtilisateur, $login, $role, $nomUtilisateur, $mailUtilisateur);
        
//         }
//         else{
            
//         }
        
//         return $utilisateur;
   
   
    /*Update d'une annonce
    //avec une requête simple
    function updateAnnonce($idAnnonce, $ficheAppart) {
        
        $sqlUpdate = "UPDATE `".$this->tableAnnonce
        ."` SET `".$this->type."`='".$ficheAppart->getType()."',`".$this->surface."`=".$ficheAppart->getSurface().",`"
            .$this->prix."`=".$ficheAppart->getPrix().",`".$this->image1."`='".$ficheAppart->getImage1()."',`"
                .$this->descriptif."`='".$ficheAppart->getDescriptif()."',`".$this->exposition."`='".$ficheAppart->getExposition()."',`"
                    .$this->ville."`='".$ficheAppart->getVille()."',`".$this->dateAnnonce."`='".$ficheAppart->getDateAnnonce()."'
                                WHERE `".$this->id
                                ."` LIKE '".$idAnnonce."'";
                                
                                echo $sqlUpdate;
                                $req = $this->connection->exec($sqlUpdate);
                                
    }    
    */
 

