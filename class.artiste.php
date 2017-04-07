<?php

class Artiste {

	private $id_artiste;
	private $nom;
	private $prenom;
	private $pseudo;
	private $email;
	private $telephone;
	private $adresse;
    private $photo_artiste;
	private $description;
	private $activitees;
	private $description_anglais;
	private $description_allemand;
	private $description_russe;
	private $description_chinois;
	private $activitees_anglais;
	private $activitees_allemand;
	private $activitees_russe;
	private $activitees_chinois;


	/* constructeur */

	function __construct($id=0){
        if($id!=0){
            $res=sql("SELECT * FROM artiste WHERE id_artiste='".$id."'");
            $user=$res[0];
            $this->id_artiste=$user['id_artiste'];
            $this->nom_artiste=$user['nom_artiste'];
            $this->prenom=$user['prenom'];
            $this->pseudo=$user['pseudo'];
            $this->email=$user['email'];
            $this->telephone=$user['telephone'];
            $this->adresse=$user['adresse'];
            $this->photo_artiste=$user['photo_artiste'];
            $this->description=$user['description'];
            $this->activitees=$user['activitees'];
            $this->description_anglais=$user['description_anglais'];
            $this->description_allemand=$user['description_allemand'];
            $this->description_russe=$user['description_russe'];
            $this->description_chinois=$user['description_chinois'];
            $this->activitees_anglais=$user['activitees_anglais'];
            $this->activitees_allemand=$user['activitees_allemand'];
            $this->activitees_russe=$user['activitees_russe'];
            $this->activitees_chinois=$user['activitees_chinois'];
        }
    }

    /* getters et setters */

    function getIdArtiste(){

    	return $this->id_artiste;
    }

    function setIdArtiste($id_artiste){

    	$this->id_artiste=$id_artiste;
    }

    function getNomArtiste(){

    	return $this->nom_artiste;
    }

    function setNomArtiste($nomArtiste){

    	$this->nom_artiste=$nomArtiste;
    }

    function getPrenom(){

    	return $this->prenom;
    }

    function setPrenom($prenom){

    	$this->prenom=$prenom;
    }

    function getPseudo(){

    	return $this->pseudo;
    }

    function setPseudo($pseudo){

    	$this->pseudo=$pseudo;
    }

    function getEmail(){

        return $this->email;
    }
 
    function setEmail($email){

        $this->email=$email;
    }

    function getTelephone(){

        return $this->telephone;
    }

    function setTelephone($telephone){

        $this->telephone=$telephone;
    }

    function getAdresse(){

        return $this->adresse;
    }

    function setAdresse($adresse){

        $this->adresse=$adresse;
    }

    function getPhotoArtiste(){

        return $this->photo_artiste;
    }

    function getDescription(){

        return $this->description;
    }

    function setDescription($description){

        $this->description=$description;
    }

    function getActivitees(){

        return $this->activitees;
    }

    function setActivitees($activitees){

        $this->activitees=$activitees;
    }

    function getDescriptionAnglais(){

        return $this->description_anglais;
    }

    function setDescriptionAnglais($description_anglais){

        $this->description_anglais=$description_anglais;
    }

    function getDescriptionAllemand(){

        return $this->description_allemand;
    }

    function setDescriptionAllemand($description_allemand){

        $this->description_allemand=$description_allemand;
    }

    function getDescriptionRusse(){

        return $this->description_russe;
    }

    function setDescriptionRusse($description_russe){

        $this->description_russe=$description_russe;
    }

    function getDescriptionChinois(){

        return $this->description_chinois;
    }

    function setDescriptionChinois($description_chinois){

        $this->description_chinois=$description_chinois;
    }

    function getActiviteesAnglais(){

        return $this->activitees_anglais;
    }

    function setActiviteesAnglais($activitees_anglais){

        $this->activitees_anglais=$activitees_anglais;
    }

    function getActiviteesAllemand(){

        return $this->activitees_allemand;
    }

    function setActiviteesAllemand($activitees_allemand){

        $this->activitees_allemand=$activitees_allemand;
    }

    function getActiviteesRusse(){

        return $this->activitees_russe;
    }

    function setActiviteesRusse($activitees_russe){

        $this->activitees_russe=$activitees_russe;
    }

    function getActiviteesChinois(){

        return $this->activitees_chinois;
    }

    function setActiviteesChinois($activitees_chinois){

        $this->activitees_chinois=$activitees_chinois;
    }


    /* formulaire */

     /*  formulaire */

    function form($target,$submit='') {
    ?><form action="<?php echo $target; ?>" method="post">
    <input type="hidden" name="id_artiste" value="<?php echo $this->id_artiste; ?>">

    <label for="nom">Nom de l'artiste</label>
    <input type="text" name="nom" value="<?php echo $this->nom; ?>"><br>

    <label for="prenom">Prénom de l'artiste</label>
    <input type="text" name="prenom" value="<?= $this->prenom ?>"><br>

    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" value="<?= $this->pseudo ?>"><br>

    <label for="email">Email</label>
    <input type="email" name="email" value="<?= $this->email ?>"><br>

    <label for="telephone">Téléphone</label>
    <input type="tel" name="telephone" value="<?= $this->telephone ?>"><br>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" value="<?= $this->adresse ?>"><br>

    <label for="description">Description</label>
    <input type="text" name="description" value="<?= $this->description ?>"><br>

    <label for="activitees">Activitées</label>
    <input type="text" name="activitees" value="<?= $this->activitees ?>"><br>

    <label for="description_anglais">Description en anglais</label>
    <input type="text" name="description_anglais" value="<?= $this->description_anglais ?>"><br>

    <label for="description_allemand">Description en allemand</label>
    <input type="text" name="description_allemand" value="<?= $this->description_allemand ?>"><br>

    <label for="description_russe">Description en russe</label>
    <input type="text" name="description_russe" value="<?= $this->description_russe ?>"><br>

    <label for="description_chinois">Description en chinois</label>
    <input type="text" name="description_chinois" value="<?= $this->description_chinois ?>"><br>

    <label for="activitees_anglais">Activitées en anglais</label>
    <input type="text" name="activitees_anglais" value="<?= $this->activitees_anglais ?>"><br>

    <label for="activitees_allemand">Activitees en allemand</label>
    <input type="text" name="activitees_allemand" value="<?= $this->activitees_allemand ?>"><br>

    <label for="activitees_russe">Activitees en russe</label>
    <input type="text" name="activitees_russe" value="<?= $this->activitees_russe ?>"><br>

    <label for="activitees_chinois">Activitees en chinois</label>
    <input type="text" name="activitees_chinois" value="<?= $this->activitees_chinois ?>"><br>

    <input type="submit" value="<?php echo $submit==''?'Envoyer':$submit; ?>">

    </form><?php
    }

    /* Insert ou Update */

    function syncDb() {
        if(empty($this->id_artiste)){
            //Si $this->id est vide, on fait un INSERT
            $res= sql("INSERT INTO artiste (id_artiste,nom,prenom,pseudo,email,telephone,adresse,description,activitees,description_anglais,description_allemand,description_russe,description_chinois,activitees_anglais,activitees_allemand,activitees_russe,activitees_chinois)
                      VALUES (NULL,'".$this->nom."','".$this->prenom."','".$this->pseudo."','".$this->email."','".$this->telephone."','".$this->adresse."','".$this->description."','".$this->activitees."','".$this->description_anglais."','".$this->description_allemand."','".$this->description_russe."','".$this->description_chinois."','".$this->activitees_anglais."','".$this->activitees_allemand."','".$this->activitees_russe."','".$this->activitees_chinois."')");
           

            if($res!==FALSE){
                $this->id_artiste=$res;
                return TRUE;
            }
              
        }    
        else {
            //Sinon on fait un UPDATE
                $res=sql("UPDATE artiste SET 
                nom = '".$this->nom."',
                prenom= '".$this->prenom."',
                pseudo= '".$this->pseudo."',
                email= '".$this->email."',
                telephone = '".$this->telephone."',
                adresse = '".$this->adresse."',
                description = '".$this->description."',
                activitees = '".$this->activitees."',
                description_anglais = '".$this->description_anglais."',
                description_allemand = '".$this->description_allemand."',
                description_russe = '".$this->description_russe."',
                description_chinois = '".$this->description_chinois."',
                activitees_anglais = '".$this->activitees_anglais."',
                activitees_allemand = '".$this->activitees_allemand."',
                activitees_russe = '".$this->activitees_russe."',
                activitees_chinois = '".$this->activitees_chinois."'
                WHERE id_artiste = '".$this->id_artiste."'");

                if ($res==TRUE){
                    return TRUE;
                }
                else {
                    return FALSE;
                }
               
        }

        }

    /* affichage de la liste des artistes */

    function affichage(){
         $res=sql("SELECT * FROM artiste");
         foreach ($res as $value) {
             /*var_dump($value);
    */  echo ''.$value['nom'].'<br><a href="modifier.php?id_artiste='.$value['id_artiste'].'">Modifier </a><a href="delete.php?id_artiste='.$value['id_artiste'].'">Supprimer </a><a href="description.php?id_artiste='.$value['id_artiste'].'">Description</a><br><br>';
        }
            echo '<a href="creer.php">Créer nouvelle fiche</a>';
    }

     /* suppression d'un artiste*/

    function delete(){
            $res=sql("DELETE FROM artiste WHERE id_artiste='".$_GET['id_artiste']."'");
    }




}