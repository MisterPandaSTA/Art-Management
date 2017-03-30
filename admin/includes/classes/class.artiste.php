<?php

class Artiste {

	private $id_artiste;
	private $nom;
	private $prenom;
	private $pseudo;
	private $email;
	private $telephone;
	private $adresse;
	private $activitees;
    private $description;
	
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
            $this->nom=$user['nom'];
            $this->prenom=$user['prenom'];
            $this->pseudo=$user['pseudo'];
            $this->email=$user['email'];
            $this->telephone=$user['telephone'];
            $this->adresse=$user['adresse'];
            $this->activitees=$user['activitees'];
            $this->description=$user['description'];
            
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

    function getNom(){

    	return $this->nom;
    }

    function setNom($nom){

    	$this->nom=$nom;
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


    /* 

    formulaires 

    */

    static function listGestion($startNb=0, $nbElmts=10){ /*ceci est la liste des formulaires de modification des comptes*/
        $res = sql("
            SELECT *
            FROM artiste
            ORDER BY nom 
            LIMIT ".$startNb.",".$nbElmts." ;"
            );
        /*print_r($res);*/
        return $res;
    }

     /*  formulaire création */

    function formArtiste($target) {
    ?>
    <form action="<?php echo $target; ?>" id="formCreateArtiste" method="post">
            <div class="panel-heading">Création de Fiche Artiste</div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Identité</th>
                </thead>
                <tr>
                    <td><label for="nom">Nom :</label>
                        <input type="text" name="nom" value=""></td>

                        <td><label for="prenom">Prenom :</label>
                         <input type="text" name="prenom" value=""></td>
                        
                        <td><label for="pseudo">Pseudo :</label>
                        <input type="text" name="pseudo" value=""></td>
                </tr> 
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Coordonnées</th>
                </thead>
                <tr>
                    <td><label for="email">Email :</label>
                    <input type="email" name="email" value=""></td>

                    <td><label for="telephone">Téléphone :</label>
                    <input type="tel" name="telephone" value=""></td>

                    <td><label for="adresse">Adresse :</label>
                    <input type="text" name="adresse" value=""></td>
                </tr>
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Détails</th>
                </thead>
                <tr>
                    <td><label for="activitees">Activitées :</label>
                    <input type="text" name="activitees" value=""></td>
                    <td><label for="photo">Photo : </label>
                        <input type="file" name="photo"></td>
                </tr>
                <tr>
                    <td colspan="2"><label for="description">Description :</label>
                    <textarea name="description" value="" col="5"></textarea></td>
                </tr>
            </table>
                <input type="submit" class="btn btn-primary" id="btn_artiste_create" value="Créer">
            </form>

            
            <form action='#' id="formModifArtiste" class="none_class" method="post">
            <div class="panel-heading">Modifier Fiche Artiste de</div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Identité</th>
                </thead>
                <tr>
                    <td><label for="nom">Nom :</label>
                        <input type="text" name="nom" value=""></td>

                        <td><label for="prenom">Prenom :</label>
                         <input type="text" name="prenom" value=""></td>
                        
                        <td><label for="pseudo">Pseudo :</label>
                        <input type="text" name="pseudo" value=""></td>
                </tr> 
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Coordonnées</th>
                </thead>
                <tr>
                    <td><label for="email">Email :</label>
                    <input type="email" name="email" value=""></td>

                    <td><label for="telephone">Téléphone :</label>
                    <input type="tel" name="telephone" value=""></td>

                    <td><label for="adresse">Adresse :</label>
                    <input type="text" name="adresse" value=""></td>
                </tr>
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Détails</th>
                </thead>
                <tr>
                    <td><label for="activitees">Activitées :</label>
                    <input type="text" name="activitees" value=""></td>
                    <td><label for="photo">Photo : </label>
                        <input type="file" name="photo"></td>
                </tr>
                <tr>
                    <td colspan="2"><textarea name="description" value="" col="5"></textarea></td>
                </tr>
            </table>
            <input type="hidden" name="id_artiste" value="">
            <input class="action" type="hidden" name="action" value="" />
            <input type="submit" class="btn btn-success" id="btn_artiste_modif" value="Modifier">
            <button class="delete btn btn-danger" id="btn-modal" data-toggle= "modal" data-target= ".delete-pass-modal">Supprimer</button>

        </form><?php

    
    }

    /* formulaire pour ajouter des trads*/

    function formTradArtiste () {
    ?>
    <label for="description_anglais">Description en anglais</label>
    <input type="text" name="description_anglais" value="<?= $this->description_anglais ?>">

    <label for="description_allemand">Description en allemand</label>
    <input type="text" name="description_allemand" value="<?= $this->description_allemand ?>">

    <label for="description_russe">Description en russe</label>
    <input type="text" name="description_russe" value="<?= $this->description_russe ?>">

    <label for="description_chinois">Description en chinois</label>
    <input type="text" name="description_chinois" value="<?= $this->description_chinois ?>">

    <label for="activitees_anglais">Activitées en anglais</label>
    <input type="text" name="activitees_anglais" value="<?= $this->activitees_anglais ?>">

    <label for="activitees_allemand">Activitees en allemand</label>
    <input type="text" name="activitees_allemand" value="<?= $this->activitees_allemand ?>">

    <label for="activitees_russe">Activitees en russe</label>
    <input type="text" name="activitees_russe" value="<?= $this->activitees_russe ?>">

    <label for="activitees_chinois">Activitees en chinois</label>
    <input type="text" name="activitees_chinois" value="<?= $this->activitees_chinois ?>">
    <?php
    }

     /* formulaire pour les modifs et les actions */
     function afficheArtisteModif () {
         ?><tr class="afficheArtisteModif"  id="<?php echo "n".$this->getIdArtiste(); ?>">
            <td><?php echo $this->getNom(); ?></td>
            <td><?php echo $this->getPrenom(); ?></td>
            <td><?php echo $this->getPseudo(); ?></td>
            <td>    
                <input type="hidden" name="email" value="<?php echo $this->getEmail(); ?>"/>
                <input type="hidden" name="telephone" value="<?php echo $this->getTelephone(); ?>"/>
                <input type="hidden" name="adresse" value="<?php echo $this->getAdresse(); ?>"/>
                <input type="hidden" name="activitees" value="<?php echo $this->getActivitees(); ?>"/>
                <textarea name="description" class="none_class"><?php echo $this->getDescription(); ?></textarea>
                <input class="action" type="hidden" name="action" value="" />
                <button class="btn_affiche_modifier_artiste btn btn-success" name="modifier">Modifier</button>

            </td>
            <td><button class="btn_affiche_trad_artiste btn btn-info" name="traduction">Traduction</button></td>
            
        </tr>
            
        <?php

     }


    /* Insert ou Update */

    function syncDb() {
        if(empty($this->id_artiste)){
            //Si $this->id est vide, on fait un INSERT
            $res= sql("INSERT INTO artiste (id_artiste,nom,prenom,pseudo,email,telephone,adresse,activitees,description,description_anglais,description_allemand,description_russe,description_chinois,activitees_anglais,activitees_allemand,activitees_russe,activitees_chinois)
                      VALUES (NULL,'".$this->nom."','".$this->prenom."','".$this->pseudo."','".$this->email."','".$this->telephone."','".$this->adresse."','".$this->activitees."','".$this->description."','".$this->description_anglais."','".$this->description_allemand."','".$this->description_russe."','".$this->description_chinois."','".$this->activitees_anglais."','".$this->activitees_allemand."','".$this->activitees_russe."','".$this->activitees_chinois."')");
           

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
                activitees = '".$this->activitees."',
                description = '".$this->description."',
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

     /* suppression d'un artiste*/

    function deleteArtiste(){
            $res=sql("DELETE FROM artiste WHERE id_artiste='".$_GET['id_artiste']."'");
    }




}