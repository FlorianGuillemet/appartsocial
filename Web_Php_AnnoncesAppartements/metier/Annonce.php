<?php

class Annonce {

private $idAnnonce;
private $type;
private $surface;
private $prix;
private $image1;
private $descriptif;
private $exposition;
private $ville;
private $dateAnnonce;


public function __construct($idAnnonce, $type, $surface, $prix, $image1, $descriptif, $exposition, $ville, $dateAnnonce) {
    $this->idAnnonce = $idAnnonce;
    $this->type = $type;
    $this->surface = $surface;
    $this->prix = $prix;
    $this->image1 = $image1;
    $this->descriptif = $descriptif;
    $this->exposition = $exposition;
    $this->ville = $ville;
    $this->dateAnnonce = $dateAnnonce;
    
}


//GETTERS ET SETTERS
public function getIdAnnonce(){
    return $this->idAnnonce;
}
public function getType(){
    return $this->type;
}
public function getPrix(){
    return $this->prix;
}
public function getImage1(){
    return $this->image1;
}
public function getDescriptif(){
    return $this->descriptif;
}
public function getExposition(){
    return $this->exposition;
}
public function getVille(){
    return $this->ville;
}
public function getSurface(){
    return $this->surface;
}
public function getDateAnnonce(){
    return $this->dateAnnonce;
}


}
