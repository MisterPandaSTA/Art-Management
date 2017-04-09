<?php

class Artiste {

	private $id_artiste;
	private $nom_artiste;
	private $prenom;
	private $pseudo;
	private $email;
	private $telephone;
	private $adresse;
	private $activitees;
    private $description;
    private $img_name;
	
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
            $artiste=$res[0];
            $this->id_artiste=$artiste['id_artiste'];
            $this->nom_artiste=$artiste['nom_artiste'];
            $this->prenom=$artiste['prenom'];
            $this->pseudo=$artiste['pseudo'];

            $this->email=$artiste['email'];
            $this->telephone=$artiste['telephone'];
            $this->adresse=$artiste['adresse'];
            $this->activitees=$artiste['activitees'];
            $this->description=$artiste['description'];
            $this->img_name=$artiste['img_name'];
            
            $this->description_anglais=$artiste['description_anglais'];
            $this->description_allemand=$artiste['description_allemand'];
            $this->description_russe=$artiste['description_russe'];
            $this->description_chinois=$artiste['description_chinois'];
            $this->activitees_anglais=$artiste['activitees_anglais'];
            $this->activitees_allemand=$artiste['activitees_allemand'];
            $this->activitees_russe=$artiste['activitees_russe'];
            $this->activitees_chinois=$artiste['activitees_chinois'];
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

    function setNomArtiste($nom_artiste){

    	$this->nom_artiste=$nom_artiste;
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

     function getImgName(){

        return $this->img_name;
    }

    function setImgName($imgName){

        $this->img_name=$imgName;
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
            ORDER BY nom_artiste 
            LIMIT ".$startNb.",".$nbElmts." ;"
            );
        /*print_r($res);*/
        return $res;
    }

     /*  formulaire création */

    function formArtiste($target) {
    ?>
    <form action="<?php echo $target; ?>" id="formCreateArtiste" method="post">
        <div class="panel-heading">Création de fiche artiste</div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Identité de l'artiste</th>
                </thead>
                <tr>
                    <td>
                        <label for="nom_artiste">Nom :</label>
                            <input type="text" name="nom_artiste" value="">
                        </td>

                        <td>
                            <label for="prenom">Prenom :</label>
                            <input type="text" name="prenom" value="">
                         </td>
                        
                        <td>
                            <label for="pseudo">Pseudo :</label>
                            <input type="text" name="pseudo" value="">
                        </td>
                </tr> 
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Coordonnées de l'artiste</th>
                </thead>
                <tr>
                    <td>
                        <label for="email">Email :</label>
                        <input type="email" name="email" value="">
                    </td>

                    <td>
                        <label for="telephone">Téléphone :</label>
                        <input type="tel" name="telephone" value="">
                    </td>

                    <td>
                        <label for="adresse">Adresse :</label>
                        <input type="text" name="adresse" value="">
                    </td>
                </tr>
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Information diverses</th>
                </thead>
                <tr>
                    <td>
                        <label for="activitees">Activitées :</label>
                        <input type="text" name="activitees" value="">
                    </td>
                    
                    <td>
                        <label for="photo">Photo : </label>
                        <input type="file" name="photo" accept="image/*">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="description">Description :</label>
                        <textarea name="description" value="" cols="120" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="btn btn-primary" id="btn_artiste_create" value="Créer">
                    </td>
                </tr>
            </table>
                
            </form>

            
        <form id="formModifArtiste" class="none_class">
            <div class="panel-heading">Modifier fiche artiste de M. <span class="nom_artiste"></span></div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Identité de l'artiste</th>
                </thead>
                <tr>
                    <td>
                        <label for="nom_artiste">Nom :</label>
                        <input type="text" name="nom_artiste" value="">
                    </td>

                    <td>
                        <label for="prenom">Prenom :</label>
                        <input type="text" name="prenom" value="">
                    </td>
                        
                    <td>
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" name="pseudo" value="">
                    </td>
                </tr> 
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Coordonnées de l'artiste</th>
                </thead>
                <tr>
                    <td>
                        <label for="email">Email :</label>
                        <input type="email" name="email" value="">
                    </td>
                    
                    <td>
                        <label for="telephone">Téléphone :</label>
                        <input type="tel" name="telephone" value="">
                    </td>

                    <td>
                        <label for="adresse">Adresse :</label>
                        <input type="text" name="adresse" value="">
                    </td>
                </tr>
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Information diverses</th>
                </thead>
                <tr>
                    <td>
                        <label for="activitees">Activitées :</label>
                        <input type="text" name="activitees" value="">
                    </td>
                    
                    <td class="flex">
                        <div>
                            <label for="photo">Changer de photo: </label>
                            <input type="file" name="photo" accept="image/*">
                        </div>
                        <div id="img_actuel">
                            <img id="photo"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="description">Description :</label>
                        <textarea name="description" value="" cols="120" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id_artiste" value="">
                        <input class="action" type="hidden" name="action" value="" />
                        <a href="#" class="btn btn-warning btn_annuler_artiste">Annuler</a>
                        <a href="#" class="btn btn-success" id="btn_artiste_modif">Modifier</a>
                        <button class="btn_artiste_delete btn btn-danger" id="btn-modal" data-toggle= "modal" data-target= ".delete-pass-modal">Supprimer</button>
                    </td> 
                </tr>
            </table>
        </form>

        <from id="formTradArtiste" class="none_class">
            <div class="panel-heading">Modifier les traductions de la fiche Artiste de M. <span class="nom_artiste"></span></div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="2">Description :</th>
                </thead>
                <tr>
                    <td>
                        <label for="description_anglais">Anglais :</label>
                        <textarea name="description_anglais" cols="60" rows="3"></textarea>
                    </td>

                    <td>
                        <label for="description_allemand">Allemand :</label>
                        <textarea name="description_allemand" cols="60" rows="3"></textarea>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label for="description_russe">Russe :</label>
                        <textarea name="description_russe" cols="60" rows="3"></textarea>
                    </td>

                    <td>
                        <label for="description_chinois">Chinois :</label>
                        <textarea name="description_chinois" cols="60" rows="3"></textarea> 
                    </td>
                </tr>
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="2">Activitées</th>
                </thead>
                <tr>
                    <td>
                        <label for="activitees_anglais">Anglais :</label>
                        <input type="text" name="activitees_anglais" value="">
                    </td>

                    <td>
                        <label for="activitees_allemand">Allemand :</label>
                        <input type="text" name="activitees_allemand" value="">
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label for="activitees_russe">Russe :</label>
                        <input type="text" name="activitees_russe" value="">
                    </td>

                    <td>
                        <label for="activitees_chinois">Chinois :</label>
                        <input type="text" name="activitees_chinois" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id_artiste" value="">
                        <input class="action" type="hidden" name="action" value="" />
                        <a href="#" class="btn btn-warning btn_annuler_artiste">Annuler</a>
                        <a href="#" class="btn btn-success" id="btn_modif_trad_artiste">Enregistrer</a>
                    </td>
                </tr>
            </table>
        </from>    

        <?php

    
    }

     /* formulaire pour les modifs et les actions */
    function afficheArtisteModif () {
        ?><tr class="afficheArtisteModif"  id="<?php echo "n".$this->getIdArtiste(); ?>">
            <td class="td_nom"><?php echo $this->getNomArtiste(); ?></td>
            <td class="td_prenom"><?php echo $this->getPrenom(); ?></td>
            <td class="td_pseudo"><?php echo $this->getPseudo(); ?></td>
            <td>    
                <input type="hidden" name="email" value="<?php echo $this->getEmail(); ?>"/>
                <input type="hidden" name="telephone" value="<?php echo $this->getTelephone(); ?>"/>
                <input type="hidden" name="adresse" value="<?php echo $this->getAdresse(); ?>"/>
                <input type="hidden" name="activitees" value="<?php echo $this->getActivitees(); ?>"/>
                <textarea name="description" class="none_class"><?php echo $this->getDescription(); ?></textarea>
                <input type="hidden" name="photo" value="<?php echo $this->getImgName(); ?>">
                <input class="action" type="hidden" name="action" value="" />
                <a class="btn_affiche_modifier_artiste btn btn-success" name="modifier" href="#hautpage">Modifier</a>

            </td>
            <td>
                <textarea name="description_anglais" class="none_class"><?= $this->description_anglais ?></textarea>    
                <textarea name="description_allemand" class="none_class"><?= $this->description_allemand ?></textarea>   
                <textarea name="description_russe" class="none_class"><?= $this->description_russe ?></textarea>    
                <textarea name="description_chinois" class="none_class"><?= $this->description_chinois ?></textarea> 
                <input type="hidden" name="activitees_anglais" value="<?= $this->activitees_anglais ?>">
                <input type="hidden" name="activitees_allemand" value="<?= $this->activitees_allemand ?>"> 
                <input type="hidden" name="activitees_russe" value="<?= $this->activitees_russe ?>">
                <input type="hidden" name="activitees_chinois" value="<?= $this->activitees_chinois ?>">
                <a class="btn_affiche_trad_artiste btn btn-info" name="traduction" href="#hautpage">Traduction</a>
            </td>
            
        </tr>
            
        <?php

     }


    /* Insert ou Update */

    function syncDb() {
        if(empty($this->id_artiste)){
            //Si $this->id est vide, on fait un INSERT
            $res= sql("INSERT INTO artiste (id_artiste,
                nom_artiste,
                prenom,
                pseudo,
                email,
                telephone,
                adresse,
                activitees,
                description,
                img_name,
                description_anglais,
                description_allemand,
                description_russe,
                description_chinois,
                activitees_anglais,
                activitees_allemand,
                activitees_russe,
                activitees_chinois)
                      VALUES (
                      NULL,
                      '".addslashes($this->nom_artiste)."',
                      '".addslashes($this->prenom)."',
                      '".addslashes($this->pseudo)."',
                      '".addslashes($this->email)."',
                      '".addslashes($this->telephone)."',
                      '".addslashes($this->adresse)."',
                      '".addslashes($this->activitees)."',
                      '".addslashes($this->description)."',
                      '".addslashes($this->img_name)."',
                      '".addslashes($this->description_anglais)."',
                      '".addslashes($this->description_allemand)."',
                      '".addslashes($this->description_russe)."',
                      '".addslashes($this->description_chinois)."',
                      '".addslashes($this->activitees_anglais)."',
                      '".addslashes($this->activitees_allemand)."',
                      '".addslashes($this->activitees_russe)."',
                      '".addslashes($this->activitees_chinois)."'
                      )");
           

            if($res!==FALSE){
                $this->id_artiste=$res;
                return TRUE;
            }
              
        }    
        else {
            //Sinon on fait un UPDATE
                $res=sql("UPDATE artiste SET 
                nom_artiste = '".addslashes($this->nom_artiste)."',
                prenom= '".addslashes($this->prenom)."',
                pseudo= '".addslashes($this->pseudo)."',
                email= '".addslashes($this->email)."',
                telephone = '".addslashes($this->telephone)."',
                adresse = '".addslashes($this->adresse)."',
                activitees = '".addslashes($this->activitees)."',
                description = '".addslashes($this->description)."',
                 img_name = '".addslashes($this->img_name)."',
                description_anglais = '".addslashes($this->description_anglais)."',
                description_allemand = '".addslashes($this->description_allemand)."',
                description_russe = '".addslashes($this->description_russe)."',
                description_chinois = '".addslashes($this->description_chinois)."',
                activitees_anglais = '".addslashes($this->activitees_anglais)."',
                activitees_allemand = '".addslashes($this->activitees_allemand)."',
                activitees_russe = '".addslashes($this->activitees_russe)."',
                activitees_chinois = '".addslashes($this->activitees_chinois)."'
                WHERE id_artiste = '".addslashes($this->id_artiste)."'");

                if ($res==TRUE){
                    return TRUE;
                }
                else {
                    return FALSE;
                }
               
        }

        }

     /* suppression d'un artiste*/

    function deleteArtiste($id_artiste){
            $res=sql("DELETE FROM artiste WHERE id_artiste='".$id_artiste."'");
    }




}