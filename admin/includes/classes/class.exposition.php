<?php

class Exposition {
	
	private $id_exposition;
	private $id_artiste;
	private $date_debut;
	private $date_fin;
	private $theme;
  private $nom_artiste;

	 /*  constructeur */

    function __construct($id=0){
        if($id!=0){
            $res=sql("SELECT artiste.nom_artiste as nom_artiste, id_exposition, exposition.id_artiste, date_debut, date_fin, theme FROM exposition INNER JOIN artiste ON exposition.id_artiste = artiste.id_artiste WHERE id_exposition='".$id."'");
            $user=$res[0];
            $this->nom_artiste=$user['nom_artiste'];
            $this->id_exposition=$user['id_exposition'];
            $this->id_artiste=$user['id_artiste'];
            $this->date_debut=$user['date_debut'];
            $this->date_fin=$user['date_fin'];
            $this->theme=$user['theme'];
            
        }
    }
   
   	 /*  getters et setters */

   	 function getIdExposition(){

   	 	return $this->id_exposition;
   	 }

   	 function setIdExposition($idExposition){

   	 	$this->id_exposition=$idExposition;
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

   	 function getDateDebut(){

   	 	return $this->date_debut;
   	 }

   	 function setDateDebut($dateDebut){

   	 	$this->date_debut=$dateDebut;
   	 }

   	 function getDateFin(){

   	 	return $this->date_fin;
   	 }

   	 function setDateFin($dateFin){

   	 	$this->date_fin=$dateFin;
   	 }

   	 function getTheme(){

   	 	return $this->theme;
   	 }

   	 function setTheme($theme){

   	 	$this->theme=$theme;
   	 }

   	 /*  formulaire */

    function form($target,$submit='') {
    
    ?>
    <form action="<?php echo $target; ?>" method="post">
    <input type="hidden" name="id_exposition" value="<?php echo $this->id_exposition; ?>">

     <select name="id_artiste" id="id_artiste">
        <?php
        $req=sql("SELECT nom_artiste, id_artiste FROM artiste ");
                
            foreach ($req as $donnee) {
                echo '<option value="'.$donnee['id_artiste'].'">'.$donnee['nom_artiste'].'</option>';
            }
        ?>
    </select>
    <!-- <label for="id_artiste">Id Artiste</label>
    <input type="number" name="id_artiste" value="<?php echo $this->id_artiste; ?>"><br> -->

    <label for="date_debut">Date début</label>
    <input type="date" name="date_debut" value="<?= $this->date_debut ?>"><br>

    <label for="date_fin">Date fin</label>
    <input type="text" name="date_fin" value="<?= $this->date_fin ?>"><br>

    <label for="theme">Theme</label>
    <input type="text" name="theme" value="<?= $this->theme ?>"><br>

    <input type="submit" value="<?php echo $submit==''?'Envoyer':$submit; ?>">

    </form></body>
    </html><?php   

    }

    /* insert ou update */

    function syncDb() {
        if(empty($this->id_exposition)){
            //Si $this->id est vide, on fait un INSERT
            $res= sql("INSERT INTO exposition (id_exposition,id_artiste,date_debut,date_fin,theme)
                      VALUES (NULL,
                      '".addslashes($this->id_artiste)."',
                      '".addslashes($this->date_debut)."',
                      '".addslashes($this->date_fin)."',
                      '".addslashes($this->theme)."')");
              

            if($res!==FALSE){
                $this->id_exposition=$res;
                return TRUE;
            }
              
        }    
        else {
            //Sinon on fait un UPDATE
                $res=sql("UPDATE exposition SET 
                id_exposition = '".addslashes($this->id_exposition)."',
                id_artiste= '".addslashes($this->id_artiste)."',
                date_debut= '".addslashes($this->date_debut)."',
                date_fin= '".addslashes($this->date_fin)."',
                theme = '".addslashes($this->theme)."'
                WHERE id_exposition = '".addslashes($this->id_exposition)."'");

                if ($res==TRUE){
                    return TRUE;
                }
                else {
                    return FALSE;
                }
               
        }

    }

     /* affichage de la liste des oeuvres */

    function affichage(){
      $res=sql("SELECT * FROM exposition");
      foreach ($res as $value) {
        echo ''.$value['theme'].'<br><a href="modifier.php?id_exposition='.$value['id_exposition'].'">Modifier </a><a href="delete.php?id_exposition='.$value['id_exposition'].'">Supprimer </a><a href="description.php?id_exposition='.$value['id_exposition'].'">Description</a><br><br>';
        }
            echo '<a href="creer.php">Créer nouvelle fiche</a>';
    }

     /* suppression d'une oeuvre*/

    function delete(){
            $res=sql("DELETE FROM exposition WHERE id_exposition='".addslashes($_GET['id_exposition'])."'");
    }


}