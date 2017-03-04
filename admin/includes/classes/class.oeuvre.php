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
    
    /*  constructeur */

    function __construct($id=0){
        if($id!=0){
            $res=sql("SELECT * FROM oeuvre WHERE id_oeuvre='".$id."'");
            $user=$res[0];
            $this->id_oeuvre=$user['id_oeuvre'];
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

    /*  formulaire */

    function form($target,$submit='') {
    ?><form action="<?php echo $target; ?>" method="post">
    <input type="hidden" name="id_oeuvre" value="<?php echo $this->id_oeuvre; ?>">

    <label for="nom">Nom de l'oeuvre</label>
    <input type="text" name="nom" value="<?php echo $this->nom; ?>"><br>

    <label for="type_oeuvre">Type de l'oeuvre</label>
    <input type="text" name="type_oeuvre" value="<?= $this->type_oeuvre ?>"><br>

    <label for="dimensions">Dimensions</label>
    <input type="text" name="dimensions" value="<?= $this->dimensions ?>"><br>

    <label for="poids">Poids</label>
    <input type="text" name="poids" value="<?= $this->poids ?>"><br>

    <label for="description_oeuvre">Description de l'oeuvre</label>
    <input type="text" name="description_oeuvre" value="<?= $this->description_oeuvre ?>"><br>

    <label for="date_creation">Date de création</label>
    <input type="text" name="date_creation" value="<?= $this->date_creation ?>"><br>

    <label for="livraison">Livraison</label>
    <input type="text" name="livraison" value="<?= $this->livraison ?>"><br>

    <input type="submit" value="<?php echo $submit==''?'Envoyer':$submit; ?>">

    </form><?php   

    }

    /* insert ou update */

    function syncDb() {
        if(empty($this->id_oeuvre)){
            //Si $this->id est vide, on fait un INSERT
            $res= sql("INSERT INTO oeuvre (nom,type_oeuvre,dimensions,poids,
                description_oeuvre,date_creation,livraison)
                      VALUES ('".$this->nom."','".$this->type_oeuvre."','".$this->dimensions."','".$this->poids."','".$this->description_oeuvre."','".$this->date_creation."','".$this->livraison."')");
              

            if($res!==FALSE){
                $this->id_oeuvre=$res;
                return TRUE;
            }
              
        }    
        else {
            //Sinon on fait un UPDATE
                $res=sql("UPDATE oeuvre SET 
                nom = '".$this->nom."',
                type_oeuvre= '".$this->type_oeuvre."',
                dimensions= '".$this->dimensions."',
                poids= '".$this->poids."',
                description_oeuvre = '".$this->description_oeuvre."',
                date_creation = '".$this->date_creation."',
                livraison = '".$this->livraison."'
                WHERE id_oeuvre = '".$this->id_oeuvre."'");

                if ($res==TRUE){
                    return TRUE;
                }
                else {
                    return FALSE;
                }
               
        }

    }
        /* connexion */

        static function connect ($user,$password){
            $res=sql("SELECT id_utilisateur FROM utilisateur WHERE nom='$user' AND password='$password'");

        if($res!==FALSE && count($res)==1){
            return $res[0]['id'];
        }
        else {
            return FALSE;
            }
        }


    /* affichage de la liste des oeuvres */

    function affichage(){
         $res=sql("SELECT * FROM oeuvre");
         foreach ($res as $value) {
             /*var_dump($value);
    */  echo ''.$value['nom'].'<br><a href="modifier.php?id_oeuvre='.$value['id_oeuvre'].'">Modifier </a><a href="delete.php?id_oeuvre='.$value['id_oeuvre'].'">Supprimer </a><a href="description.php?id_oeuvre='.$value['id_oeuvre'].'">Description</a><br><br>';
        }
            echo '<a href="creer.php">Créer nouvelle fiche</a>';
    }

     /* suppression d'une oeuvre*/

    function delete(){
            $res=sql("DELETE FROM oeuvre WHERE id_oeuvre='".$_GET['id_oeuvre']."'");
    }
}


