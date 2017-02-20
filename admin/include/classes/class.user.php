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
             $user = sql("SELECT * FROM utilisateur WHERE id_utilisateur = '".$id_utilisateur."'");
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

    function updatePassword($oldpass, $newpass) {
        if(empty($this->id_utilisateur)){
                return FALSE;
            }
        else{
            $res = sql("SELECT password FROM utilisateur WHERE id_utilisateur ='".$this->id."';");
            $passtest = $res[0]['password'];
            if (password_verify($oldpass, $passtest)){
                $res = sql("UPDATE utilisateur set password = '".hashage($newpass)."' WHERE id_utilisateur='".$this->id_utilisateur."';");
            }
            else /*sinon je retourn FALSE*/{
                return FALSE;
            }
        }
    }


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


    function formcreate($target){ /*ceci est le formulaire de création de compte*/
    	?><form action="<?php echo $target; ?>" method="post">
    		<label for"nom">Nom :</label><br />
    		<input type="text" name="nom" /><br />
    		<label for"nom">Prénom :</label><br />
    		<input type="text" name="prenom" /><br />
    		<label for="email">Email</label><br />
			<input type="email" name="email" /><br />
            <label for="permission">permission</label><br />
                <select name="permission" id="permission">
                   <option value="utilisateur">utilisateur</option>
                   <option value="admin">admin</option>
                </select>   
            
			<input type="submit" name="submit" value="Créer" /><br />
    	</form><?php
    }

    function modform($target){ /* ceci est le formulaire de modification de compte pour l'user*/
    ?><form action="<?php echo $target; ?>" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" />
    <label for="oldpass">Ancien mot de passe :</label>
    <input type="password" name="oldpass" />
    <label for="newpass">Nouveau Mot de passe :</label>
    <input type="password" name="newpass" />
    <label for="newpass2">Veuillez retapper votre nouveau mot de passe :</label>
    <input type="password" name="newpass2" />
    </form><?php
    }


    // Fonction Login

    static function login($email, $password){
        $res = sql("SELECT id_utilisateur, password, permission FROM utilisateur WHERE email = '$email';");
        $passtest = $res[0]['password']; 
        if (password_verify($password, $passtest)) {
            if ($password !== default_password){
                $id_user = $res[0]['id_utilisateur'];
                $permission = $res[0]['permission'];
                return array($id_user, $permission);
            }
            else {
                $id_user = $res[0]['id_utilisateur'];
                return array($id_user);   
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



}


