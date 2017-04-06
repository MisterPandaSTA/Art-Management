 <?php

class User {
    
    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $permission;
    
    function __construct($id=0){
        
        if($id!=0) {
             $user = sql("SELECT * FROM utilisateur WHERE id_utilisateur = '".$id."'");
            $u = $user[0];
            
            $this->id_utilisateur = $u['id_utilisateur'];
            $this->nom = $u['nom'];
            $this->prenom = $u['prenom'];
            $this->email = $u['email'] ; 
            $this->password = $u['password'] ;   
            $this->permission = $u['permission'] ;   
            
        }
        
    }
    
      function getId() {
        return $this->id_utilisateur;
    }
    
    function setNom($nom) {
        $this->nom = $nom;
    }
    
    function getNom() {
        return $this->nom;
    }
    
    function setPrenom ($prenom) {
        $this->prenom = $prenom;
    }
    
    function getPrenom() {
        return $this->prenom;
    }
    
      function setEmail ($email) {
        $this->email = $email;
    }
    
    function getEmail() {
        return $this->email;
    }
    
     function setPermission ($permission) {
        $this->permission = $permission;
    }
    
    function getPermission() {
        return $this->permission;
    }
    
    //function de création d'utilisateur

    function createUser($hash){
        if(empty($this->id_utilisateur)) { /*si je n'ai pas d'id alors je créer une nouvelle entré dans la table avec les informations transmisent dans le formulaire*/
        	/*$hash = user::hashage(default_password);*/

            $res = sql("INSERT INTO utilisateur (`nom`, `prenom`, `email`, `password`, `permission`) 
                VALUES ('".addslashes($this->nom)."',
                '".addslashes($this->prenom)."',
    			'".addslashes($this->email)."',
    			'".$hash."',
    			'".addslashes($this->permission)."');");
            
    		if($res !== FALSE) /*si ça retourne autre chose que FALSE alors je détermine l'ID et je retour TRUE*/{
    			$this->id_utilisateur = $res;
    			return TRUE;
    		}
    		else /*Sinon je retourne FALSE*/ {
    			return FALSE;
    		}
    	}
    }

    // formulaire de création d'utilisateur

    function formCreate($target){ /*ceci est le formulaire de création de compte*/
    	?><form id="formCreate" action="<?php echo $target; ?>" method="post">
    		<label for"nom">Nom :</label>
    		<input type="text" name="nom" />
    		<label for"prenom">Prénom :</label>
    		<input type="text" name="prenom" />
    		<label for="email">Email</label>
			<input type="email" name="email" />
            <label for="permission">Permission</label>
                <select name="permission" id="permission">
                   <option value="inactif">inactif</option>
                   <option value="utilisateur">utilisateur</option>
                   <option value="admin">admin</option>
                </select>   
            
			<input id="create" type="submit" name="submit" value="Créer" />
    	</form><?php
    }

     //formulaire de gestion d'utilisateur

   static function listGestion($startNb=0, $nbElmts=10){ /*ceci est la liste des formulaires de modification des comptes*/
        $res = sql("
            SELECT *
            FROM utilisateur
            ORDER BY nom 
            LIMIT ".$startNb.",".$nbElmts." ;"
            );
        /*print_r($res);*/
        return $res;
    }
    function formGestion($target){
        ?><tr class="formGestion" id="<?php echo "n".$this->getId(); ?>">
            <td><input type="text" name="nom" value="<?php echo $this->getNom(); ?>" /></td>
            <td><input type="text" name="prenom" value="<?php echo $this->getPrenom(); ?>" /></td>
            <td><input type="email" name="email" value="<?php echo $this->getEmail(); ?>" /></td>
            <td><select name="permission" id="permission">
                   <option value="inactif" <?php if( $this->getPermission() == "inactif") { echo 'selected' ;} ?> >inactif</option>
                   <option value="utilisateur" <?php if( $this->getPermission() == "utilisateur") { echo 'selected' ;} ?>>utilisateur</option>
                   <option value="admin" <?php if( $this->getPermission() == "admin") { echo 'selected' ;} ?>>admin</option>
                </select></td>   
            <td><input type="hidden" name="id_user" value="<?php echo $this->getId(); ?>" />
            <input class="action" type="hidden" name="action" value="" />

            <input type="submit" class="modifier btn btn-success" name="submit" value="Modifier" /></td>
            <td><button class="reset btn btn-info" data-toggle= "modal" data-target= ".reset-pass-modal">Réinitialiser</button></td>
            <td><button class="delete btn btn-danger" id="btn-modal" data-toggle= "modal" data-target= ".delete-pass-modal">Suppr</button></td>
        </tr>
            
        <?php
    }    

    // formulaire modification de l'utilisateur

    function modForm($target){ /* ceci est le formulaire de modification de compte pour l'user*/
    ?><form action="<?php echo $target; ?>" method="post">
     <label for"nom">Votre nom :</label><br />
    <input type="text" name="nom" value="<?php echo $this->getNom(); ?>" /><br />
    <label for"prenom">Votre prénom :</label><br />
    <input type="text" name="prenom" value="<?php echo $this->getPrenom(); ?>" /><br />
    <label for="email">Votre email</label><br />
    <input type="email" name="email" value="<?php echo $this->getEmail(); ?>" /><br />
    <label for="oldpass">Mot de passe actuel:</label><br />
    <input type="password" name="oldpass" /><br />
    <label for="newpass">Nouveau Mot de passe :</label><br />
    <input type="password" name="newpass" /><br />
    <label for="newpass2">Veuillez retapper votre nouveau mot de passe :</label><br />
    <input type="password" name="newpass2" /><br />
    <input type="submit" class="btn btn-info" name="submit" value="modifier" /><br />
    </form><?php
    }

    // Fonction Login

    static function login($email, $password){
        $res = sql("SELECT id_utilisateur, prenom, password, permission FROM utilisateur WHERE email = '$email';");
        if (!empty($res)) {
            $passtest = $res[0]['password']; 
            if (password_verify($password, $passtest)) {
                if ($password !== default_password){
                    $id_user = $res[0]['id_utilisateur'];
                    $prenom = $res[0]['prenom'];
                    $permission = $res[0]['permission'];
                    return array($id_user, $prenom, $permission);
                }
                else {
                    $id_user = $res[0]['id_utilisateur'];
                    $prenom = $res[0]['prenom'];
                    $permission = $res[0]['permission'];
                    return array($id_user, $prenom, $permission);   
                }        
            }
            else /*sinon je retourn FALSE*/{
            return FALSE;
            } 
        }    
        else /*sinon je retourn FALSE*/{
            return FALSE;
        }
    }

    //function logout

	function disconnect(){ /*quand je me déclenche, je casse la session et le cookie avant de recréer une nouvelle session et d'envoyer l'utilisateur sur index.php*/
		session_destroy();
		session_start();
		header('Location: index.php');
	}         

    // fonction update user

    function modUser($id){
        if(empty($id)) {
            return FALSE;
        }
        else{ 
            $res = sql("UPDATE utilisateur set nom = '".addslashes($this->nom)."',
                prenom = '".addslashes($this->prenom)."',
                email = '".addslashes($this->email)."' WHERE id_utilisateur='".addslashes($id)."';");
            if($res !== FALSE){

                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }

    // fonction update gestion user

    function gestionUser($id) {
        if(empty($id)) {
            return FALSE;
        }
        else{
            $res= sql("UPDATE utilisateur set nom = '".addslashes($this->nom)."',
                prenom = '".addslashes($this->prenom)."',
                email = '".addslashes($this->email)."',
                permission = '".addslashes($this->permission)."' 
                WHERE id_utilisateur='".addslashes($id)."';"
                );
            if($res !== FALSE){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }

/*----------------

     Fonction Bcrypt

    ----------------*/

   static function hashage($password) {
        
        $hash = password_hash($password,PASSWORD_BCRYPT,["cost" => cost]);
        
        if($hash == true){
            return $hash;
        }
        else{
            echo 'erreur de hachage';
            return FALSE;
        }

    }

    function updatePassword($oldpass, $newpass, $id) {
        if(empty($id))
        {
             return FALSE;
        }
        else{
            $res = sql("SELECT password FROM utilisateur WHERE id_utilisateur ='".$id."';");
            $passtest = $res[0]['password'];
            if (password_verify($oldpass, $passtest)){
                if ($oldpass == default_password) {
                    $update = sql("UPDATE utilisateur set password = '".user::hashage($newpass)."', permission = 'utilisateur' WHERE id_utilisateur='".$id."';");
                    
                        $res = sql("SELECT id_utilisateur, prenom, permission FROM utilisateur WHERE id_utilisateur ='".$id."';");
                            $id_user = $res[0]['id_utilisateur'];
                            $prenom = $res[0]['prenom']; 
                            $permission = $res[0]['permission'];
                        return array($id_user, $prenom, $permission);
                }    
                else {
                        $update = sql("UPDATE utilisateur set password = '".user::hashage($newpass)."' WHERE id_utilisateur='".addslashes($id)."';");
                }
            }
            
            else /*sinon je retourn FALSE*/{
                return FALSE;
            }
        }
    }



/* ---------------
    reset mdp
-----------------*/

    function resetPass($id) {

        if(empty($id)) {
            return FALSE;
        }
        else {
            $res = sql("UPDATE utilisateur set password = '".user::hashage(default_password)."' WHERE id_utilisateur ='".addslashes($id)."';");

            if($res !== FALSE){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }

 /* ---------------
    Delete User

 -----------------*/

    function deleteUser($id) {

        if(empty($id)) {
            return FALSE;
        }
        else {
            $res = sql("DELETE FROM utilisateur WHERE id_utilisateur ='".addslashes($id)."';");

            if($res !== FALSE){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }

}