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
            $res=sql("SELECT artiste.nom as nom_artiste, oeuvre.nom, type_oeuvre, oeuvre.id_artiste, id_oeuvre, dimensions, poids, description_oeuvre, date_creation, livraison  FROM oeuvre INNER JOIN artiste ON oeuvre.id_artiste=artiste.id_artiste  WHERE id_oeuvre='".$id."'");
            /*var_dump($res);*/
            $user=$res[0];
            
            $this->nom_artiste=$user['nom_artiste'];
            $this->id_oeuvre=$user['id_oeuvre'];
            $this->id_artiste=$user['id_artiste'];
            $this->nom=$user['nom'];
            $this->type_oeuvre=$user['type_oeuvre'];
            $this->dimensions=$user['dimensions'];
            $this->poids=$user['poids'];
            $this->description_oeuvre=$user['description_oeuvre'];
            $this->date_creation=$user['date_creation'];
            $this->livraison=$user['livraison'];
            
/*var_dump($user);*/
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

    function getIdArtiste(){

        return $this->id_artiste;
    }

    function setIdArtiste($idArtiste){

        $this->id_artiste=$idArtiste;
    }

    function getNomArtiste(){

        return $this->nom_artiste;
    }

    function setNomArtiste($nomArtiste){

        $this->nom_artiste=$nomArtiste;
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
            $res= sql("INSERT INTO oeuvre (id_oeuvre,id_artiste,nom,type_oeuvre,dimensions,poids,
                description_oeuvre,date_creation,livraison)
                      VALUES (NULL,'".$this->id_artiste."','".$this->nom."','".$this->type_oeuvre."','".$this->dimensions."','".$this->poids."','".$this->description_oeuvre."','".$this->date_creation."','".$this->livraison."')");
              

            if($res!==FALSE){
                $this->id_oeuvre=$res;
                return TRUE;
            }
              
        }    
        else {
            //Sinon on fait un UPDATE
                $res=sql("UPDATE oeuvre SET 
                id_artiste='".$this->id_artiste."',
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
                    echo 'la mise a jour a fonctionné';
                }
                else {
                    return FALSE;
                    echo 'la mise a jour a échoué';
                }
               
        }

    }
            
    /* affichage de la liste des oeuvres */

    function affichage(){
         $res=sql("SELECT * FROM oeuvre");
         foreach ($res as $value) {
             /*var_dump($value);
    */  echo ''.$value['nom'].'<br><a href="modifier.php?id_oeuvre='.$value['id_oeuvre'].'">Modifier </a><a href="delete.php?id_oeuvre='.$value['id_oeuvre'].'">Supprimer </a><a href="pagetype.php?id_oeuvre='.$value['id_oeuvre'].'">Description</a><br><br>';
        }
            echo '<a href="creer.php">Créer nouvelle fiche</a>';
    }

     /* suppression d'une oeuvre*/

    function delete(){
            $res=sql("DELETE FROM oeuvre WHERE id_oeuvre='".$_GET['id_oeuvre']."'");
    }


    // formulaire de création d'utilisateur

    function formCreate($target){ /*ceci est le formulaire de création de compte*/
        ?>
        <form id="formCreate" action="../admin/creation_oeuvre.php" method="post">
            <table class="table table-bordered table-striped table-hover">
            <thead>
                
                <th colspan="3"><label for="id_artiste">Choix de l'artiste :</label>
            <select name="id_artiste" id="id_artiste">
            <?php
            $req=sql("SELECT nom, id_artiste FROM artiste ");
                 
            foreach ($req as $donnee) {
                echo '<option value="'.$donnee['id_artiste'].'">'.$donnee['nom'].'</option>';
            }?></select>
            

            
        <tr>
           <td>
                <label for"nom">nom de l'oeuvre :</label>
                <input type="text" name="nom" />
            </td>
            <td>
                <label for"type_oeuvre">type d'oeuvre :</label>
                <input type="text" name="type_oeuvre" />
            </td>
            <td>
                <label for="dimensions">dimensions</label>
                <input type="text" name="dimensions" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="poids">poids</label>
                <input type="text" name="poids" />
            </td>
            <td>
                <label for="description_oeuvre">description_oeuvre</label>
                <input type="text" name="description_oeuvre" />
            </td>
            <td>
                <label for="date_creation">date de creation</label>
                <input type="text" name="date_creation" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="livraison">livraison</label>
                <input type="text" name="livraison" />
            </td>
            <td>
                <input id="create" type="submit" name="submit" value="Créer" />
            </td>
            <td>
                <form id="formCreate" action="../admin/modifier.php" method="post">
                <input id="modifier" type="submit" name="submit" value="Modifier" />
                </form>
            </td>
        </tr>
         </th></thead>
        </form><?php
    }

 /***** FONCTION SELECT  *****/
    function select (){
    $res=sql("SELECT artiste.nom as nom_artiste, oeuvre.nom, type_oeuvre, oeuvre.id_artiste, id_oeuvre, dimensions, poids, description_oeuvre, date_creation, livraison  FROM oeuvre INNER JOIN artiste ON oeuvre.id_artiste=artiste.id_artiste  ");
        foreach ($res as $user){
            $oeuvre = new Oeuvre($user['id_oeuvre']);
            echo "<tr>";
            echo "<td>".$oeuvre->getNomArtiste()."</td>";
            echo "<td>".$oeuvre->getNom()."</td>";
            echo "<td>".$oeuvre->getTypeOeuvre()."</td>";
            echo "<td>".$oeuvre->getDimensions()."</td>";
            echo "<td>".$oeuvre->getPoids()."</td>";
            echo "<td>".$oeuvre->getDescriptionOeuvre()."</td>";
            echo "<td>".$oeuvre->getDateCreation()."</td>";
            echo "<td>".$oeuvre->getLivraison()."</td>";
            echo "<td></form></td>";

            echo "</tr>";

            }
        }
  }          