<?php

class Oeuvre {
    
    private $id_oeuvre;
    private $nom;
    private $type_oeuvre;
    private $dimensions;
    private $poids;
    private $description_oeuvre;
    private $date_creation;
    private $livraison;
    
    
    function __construct($id='0'){
		if($id!='0'){
			$res=sql("SELECT id_oeuvre,nom,type_oeuvre,dimensions,poids,description_oeuvre,date_creation,livraison FROM oeuvre WHERE id_oeuvre='$id_oeuvre'");
			$user=$res[0];
			$this->id=$user['id_oeuvre'];
			$this->nom=$user['nom'];
			$this->type_oeuvre=$user['type_oeuvre'];
			$this->dimensions=$user['dimensions'];
			$this->poids=$user['poids'];
			$this->description_oeuvre=$user['description_oeuvre'];
			$this->date_creation=$user['date_creation'];
			$this->livraison=$user['livraison'];


		}
    }
    
    /*  getters et setters */
    
    function getIdOeuvre(){
        
        return $this->id_oeuvre;
    }
    
    function setIdOeuvre($idOeuvre){
        
        $this->id_oeuvre=$idOeuvre;
    }
    
    function getNom(){
        
        return $this->nom;
    }
    
    function setNom($nom){
        
        $this->nom=$nom;
    }
    
    function getTypeOeuvre(){
        
        return $this->type_oeuvre;
    }

    function setTypeOeuvre($typeOeuvre){
        
        $this->type_oeuvre=$typeOeuvre;
    }
    
    function getDimensions(){
        
        return $this->dimensions;
    }
    
    function setDimensions($dimensions){
        
        $this->dimensions=$dimensions;
    }
    
    function getPoids(){
        
        return $this->poids;
    }
    
    function setPoids($poids){
        
        $this->poids=$poids;
    }

    function getDescriptionOeuvre(){
        
        return $this->description_oeuvre;
    }
    
    function setDescriptionOeuvre($descriptionOeuvre){
        
        $this->description_oeuvre=$descriptionOeuvre;
    }
    
    function getDateCreation (){
        
        return $this->date_creation;
    }
    
    function setDateCreation($dateCreation){
        
        $this->date_creation=$dateCreation;
    }
    
    function getLivraison(){
        
        return $this->livraison;
    }
    
    function setLivraison($livraison){
        
        $this->livraison=$livraison;
    }
}