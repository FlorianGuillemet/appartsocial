<?php

class FicheAppart {
    
    private $type;
    private $surface;
    private $prix;
    private $image1;
    private $image2;
    private $descriptif;
    private $exposition;
    private $ville;
    private $dateAnnonce;

    public function __construct($type, $surface, $prix, $image1, $descriptif, $exposition, $ville) {
        $this->type = $type;
        $this->surface = $surface;
        $this->prix = $prix;
        $this->image1 = $image1;
        $this->descriptif = $descriptif;
        $this->exposition = $exposition;
        $this->ville = $ville;
        $this->setDateAnnonce(date('Y-m-d'));
        
    }
    
//GETTERS ET SETTERS
    public function getType(){
        return $this->type;
    }
    public function getPrix(){
        return $this->prix;
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
    public function getImage1(){
        return $this->image1;
    }    
    public function getImage2(){
        return $this->image2;
    }  
    public function getSurface(){
        return $this->surface;
    }
    public function getDateAnnonce(){
        return $this->dateAnnonce;
    }

    public function setType($type){
        $this->type = $type;
    }
    public function setPrix($prix){
        $this->prix = $prix;
    }
    public function setDescriptif($descriptif){
        $this->descriptif = $descriptif;
    }
    public function setExposition($exposition){
        $this->exposition = $exposition;
    }
    public function setVille($ville){
        $this->ville = $ville;
    }
    public function setImage1($image1){
        $this->image1 = $image1;
    }
    public function setImage2($image2){
        $this->image2 = $image2;
    }
    public function setSurface($surface){
        $this->surface = $surface;
    }
    public function setDateAnnonce($dateAnnonce){
        $this->dateAnnonce = $dateAnnonce;
    }

    
}
