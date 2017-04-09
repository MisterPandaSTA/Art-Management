<?php

class Oeuvre {
    
    private $id_oeuvre;
    private $nom;
    private $img_name;
    private $type_oeuvre;
    private $dimensions;
    private $poids;
    private $description_oeuvre;
    private $date_creation;
    private $livraison;
    
 /*  constructeur */

    function __construct($id=0){
        if($id!=0){
            $res=sql("SELECT artiste.nom_artiste, oeuvre.nom, oeuvre.img_name, type_oeuvre, oeuvre.id_artiste, id_oeuvre, dimensions, poids, description_oeuvre, date_creation, livraison  FROM oeuvre INNER JOIN artiste ON oeuvre.id_artiste=artiste.id_artiste  WHERE id_oeuvre='".addslashes($id)."'");
            /*var_dump($res);*/
            $oeuvre=$res[0];
            
            $this->nom_artiste=$oeuvre['nom_artiste'];
            $this->id_oeuvre=$oeuvre['id_oeuvre'];
            $this->id_artiste=$oeuvre['id_artiste'];
            $this->nom=$oeuvre['nom'];
            $this->img_name=$oeuvre['img_name'];
            $this->type_oeuvre=$oeuvre['type_oeuvre'];
            $this->dimensions=$oeuvre['dimensions'];
            $this->poids=$oeuvre['poids'];
            $this->description_oeuvre=$oeuvre['description_oeuvre'];
            $this->date_creation=$oeuvre['date_creation'];
            $this->livraison=$oeuvre['livraison'];
            
/*var_dump($oeuvre);*/
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

    function getImgName(){

        return $this->img_name;
    }

    function setImgName($imgName){

        $this->img_name=$imgName;
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

    /* insert ou update */

   function syncDb() {
        if(empty($this->id_oeuvre)){
            //Si $this->id est vide, on fait un INSERT
            $res= sql("INSERT INTO oeuvre (id_oeuvre,
                id_artiste,
                nom,
                type_oeuvre,
                dimensions,
                poids,
                description_oeuvre,
                date_creation,
                livraison)
                      VALUES (
                      NULL,
                      '".addslashes($this->id_artiste)."',
                      '".addslashes($this->nom)."',
                      '".addslashes($this->img_name)."',
                      '".addslashes($this->type_oeuvre)."',
                      '".addslashes($this->dimensions)."',
                      '".addslashes($this->poids)."',
                      '".addslashes($this->description_oeuvre)."',
                      '".addslashes($this->date_creation)."',
                      '".addslashes($this->livraison)."'
                      )");
              

            if($res!==FALSE){
                $this->id_oeuvre=$res;
                return TRUE;
            }
              
        }    
        else {
            //Sinon on fait un UPDATE
                $res=sql("UPDATE oeuvre SET 
                id_artiste='".addslashes($this->id_artiste)."',
                nom = '".addslashes($this->nom)."',
                img_name = '".addslashes($this->img_name)."',
                type_oeuvre= '".addslashes($this->type_oeuvre)."',
                dimensions= '".addslashes($this->dimensions)."',
                poids= '".addslashes($this->poids)."',
                description_oeuvre = '".addslashes($this->description_oeuvre)."',
                date_creation = '".addslashes($this->date_creation)."',
                livraison = '".addslashes($this->livraison)."'
                WHERE id_oeuvre = '".addslashes($this->id_oeuvre)."'");


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

    function delete($id){
            $res=sql("DELETE FROM oeuvre WHERE id_oeuvre='".addslashes($id)."'");
    }


    // formulaire de création d'utilisateur

    function formOeuvre($target){ /*ceci est le formulaire de création de compte*/
        ?>
        <form id="formCreateOeuvre" action="<?php echo $target; ?>" method="post">
            <div class="panel-heading">Création de Fiche Oeuvre</div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Identité de l'oeuvre</th>
                </thead>    
                <tr>
                   <td>
                        <label for"nom">Nom de l'oeuvre :</label>
                        <input type="text" name="nom" />
                    </td>
                    <td>
                        <label for="id_artiste">Artiste :</label>
                        <select name="id_artiste" id="id_artiste">
                             <?php
                            $req= sql("SELECT nom_artiste, prenom, id_artiste FROM artiste ");
                                     
                            foreach ($req as $donnee) {
                                echo '<option value="'.$donnee['id_artiste'].'">'.$donnee['nom_artiste'].' '.$donnee['prenom'].'</option>';
                            }?>
                                         
                        </select> 
                    </td>
                    <td>
                        <label for="date_creation">Date de creation :</label>
                        <input type="text" name="date_creation" placeholder="jj/mm/aaaa"/>
                    </td>
                </tr>
                <tr>
                    <td>    
                        <label for"type_oeuvre">Type de l'oeuvre :</label>
                        <input type="text" name="type_oeuvre" />
                    </td>
                    <td colspan="2">
                        <label for="description_oeuvre">Description de l'oeuvre :</label>
                        <textarea name="description_oeuvre" cols="60"></textarea>
                    </td>
                </tr>
            </table> 
            <table class="table table-bordered table-striped table-hover ">
                <thead>
                    <th colspan="3">Données de manutentions</th>
                </thead>
                <tr>
                    <td>
                        <label for="dimensions">Dimensions :</label>
                        <input type="text" name="dimensions" />
                    </td>
                    <td>
                        <label for="poids">Poids :</label>
                        <input type="text" name="poids" />
                    </td>
                    <td>
                        <label for="livraison">Livraison :</label>
                        <select name="livraison">
                            <option value="0">
                                    Non
                            </option>
                            <option value="1">
                                    Oui
                            </option>
                        </select>
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label for="photo">Photo : </label>
                        <input type="file" name="photo" accept="image/*" value="">
                    </td>    
                    <td>
                        <input id="btn_oeuvre_create" class="btn btn-primary" type="submit" name="submit" value="Créer" />
                    </td>
                </tr>
            </table>    
        </form>

        <form id="formModifOeuvre" class="none_class">
            <div class="panel-heading">Modifier la fiche de l'oeuvre <span class="nom_oeuvre"></span></div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Identité de l'oeuvre</th>
                </thead>    
                <tr>
                   <td>
                        <label for"nom">Nom de l'oeuvre :</label>
                        <input type="text" name="nom" />
                    </td>
                    <td>
                        <label for="id_artiste">Artiste :</label>
                        <select name="id_artiste" id="id_artiste">
                            <?php
                            $req= sql("SELECT nom_artiste, prenom, id_artiste FROM artiste ");
                                     
                            foreach ($req as $donnee) {
                                echo '<option value="'.$donnee['id_artiste'].'">'.$donnee['nom_artiste'].' '.$donnee['prenom'].'</option>';
                            }?>
                                         
                        </select> 
                    </td>
                    <td>
                        <label for="date_creation">Date de creation :</label>
                        <input type="text" name="date_creation" placeholder="jj/mm/aaaa" />
                    </td>
                </tr>
                <tr>
                    <td>    
                        <label for"type_oeuvre">Type de l'oeuvre :</label>
                        <input type="text" name="type_oeuvre" />
                    </td>
                    <td>
                        <label for="description_oeuvre">Description de l'oeuvre :</label>
                        <textarea name="description_oeuvre" cols="60"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="photo">Photo : </label>
                        <input type="file" name="photo" accept="image/*" value="" >
                    </td>
                </tr>
            </table>    
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="3">Données de manutentions</th>
                </thead>
                <tr>
                    <td>
                        <label for="dimensions">Dimensions :</label>
                        <input type="text" name="dimensions" />
                    </td>
                    <td>
                        <label for="poids">Poids :</label>
                        <input type="text" name="poids" />
                    </td>
                    <td>
                        <label for="livraison">Livraison :</label>
                        <select name="livraison">
                            <option value="0">
                                    Non
                            </option>
                            <option value="1">
                                    Oui
                            </option>
                        </select>
                    </td>
                </tr> 
                <tr>    
                    <td>
                        <input type="hidden" name="id_oeuvre" value="" />
                        <input class="action" type="hidden" name="action" value="" />
                        <a href="#" class="btn btn-warning btn_annuler_oeuvre">annuler</a>
                        <a href="#" class="btn btn-success" name="modifier" value="Modifier" id="btn_oeuvre_modif">Enregistrer</a>
                        <button class="btn_oeuvre_delete btn btn-danger" id="btn-modal" data-toggle= "modal" data-target= ".delete-pass-modal">Supprimer</button>

                    </td>
                </tr>
            </table> 
        </form>
        <form id="qrcode_photo" class="none_class">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th colspan="2">Qrcode et photo</th>
                </thead>
                <tr>    
                    <td class="flex">
                        <div>
                            <button class="btn_oeuvre_qrcode btn btn-secondary">Créer QRcode</button>
                        </div>

                        <div id="imagediv"><a href="" download></a></div>
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
            </table> 
        </form>                        
        <?php
    }

 /*/***** FONCTION SELECT  *****/
/*   
    function select (){
    $res=sql("SELECT artiste.nom as nom_artiste, oeuvre.nom, type_oeuvre, oeuvre.id_artiste, id_oeuvre, dimensions, poids, description_oeuvre, date_creation, livraison  FROM oeuvre INNER JOIN artiste ON oeuvre.id_artiste=artiste.id_artiste  ");
        ?>
        <div class="panel-heading">Création de Fiche Artiste</div>
        <table class="table table-bordered table-striped table-hover">
        <?php
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
  }          */

    static function listGestion($startNb=0, $nbElmts=10){ /*ceci est la liste des formulaires de modification des comptes*/
        $res = sql("
            SELECT *
            FROM Oeuvre
            ORDER BY nom 
            LIMIT ".$startNb.",".$nbElmts." ;"
            );
        /*print_r($res);*/
        return $res;
    }

    function afficheOeuvreModif () {
        ?><tr class="afficheOeuvreModif"  id="<?php echo "n".$this->getIdOeuvre(); ?>">
            <td class="td_nom"><?php echo $this->getNom(); ?></td>
            <td class="td_artiste"><?php echo $this->getNomArtiste(); ?>
                <input type="hidden" name="id_artiste" value="<?php echo $this->getIdArtiste(); ?>">
            </td>
            <td class="td_livraison"><?php if($this->getLivraison() == 1) {echo "Oui";} else {echo "Non";} ?>
                <input type="hidden" name="livraison" value="<?php echo $this->getLivraison() ?>">
            </td>
            <td>    
                <input type="hidden" name="date_creation" value="<?php echo $this->getDateCreation(); ?>"/>
                <textarea name="description_oeuvre" class="none_class"><?php echo $this->getDescriptionOeuvre(); ?></textarea>
                <input type="hidden" name="photo"accept="image/*" value="<?php echo $this->getImgName(); ?>">
                <input type="hidden" name="dimensions" value="<?php echo $this->getDimensions(); ?>"/>
                <input type="hidden" name="poids" value="<?php echo $this->getPoids(); ?>"/>
                <input type="hidden" name="type_oeuvre" value="<?php echo $this->getTypeOeuvre(); ?>"/>
                <input class="action" type="hidden" name="action" value="" />
                <a class="btn_affiche_modifier_oeuvre btn btn-success" href="#hautpage" name="modifier">Modifier</a>
            </td>
            <td>
             <a class="btn_affiche_trad_oeuvre btn btn-info" name="traduction" href="hautpage">Traduction</a>
            </td>
          </tr>
    <?php        
    }     

     function afficheOeuvreDash () {
        ?><tr class="afficheOeuvreDash">
            <td class="td_nom"><?php echo $this->getNom(); ?></td>
            <td class="td_artiste"><?php echo $this->getNomArtiste(); ?>
            </td>
            <td class="td_livraison"><?php if($this->getLivraison() == 1) {echo "Oui";} else {echo "Non";} ?>
            </td>
            <td>    
                <input type="hidden" name="date_creation" value="<?php echo $this->getDateCreation(); ?>"/>
                <input type="hidden" name="type_oeuvre" value="<?php echo $this->getTypeOeuvre(); ?>"/>
                <input class="action" type="hidden" name="action" value="" />
                <a class="btn_affiche_modifier_oeuvre btn btn-success" href="#hautpage" name="modifier">Modifier</a>
            </td>
            <td>
             <a class="btn_affiche_trad_oeuvre btn btn-info" name="traduction" href="hautpage">Traduction</a>
            </td>
        </tr>
    <?php        
    }   

}
