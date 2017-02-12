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
             $user = sql("SELECT * FROM utilisateur WHERE id = '".$id."'");
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
        return $this->id;
    }
    
    function setName($nom) {
        $this->nom = $nom;
    }
    
    function getName() {
        return $this->nom;
    }
    
    function setPrenom ($prenom) {
        $this->prenom = $prenom;
    }
    
    function getPrenom () {
        return $this->prenom;
    }
    
      function setEmail ($email) {
        $this->email = $email;
    }
    
    function getEmail () {
        return $this->email;
    }
    
     function setPermission ($permission) {
        $this->permission = $permission;
    }
    
    function getPermission () {
        return $this->permission;
    }
    
    function createUser(){
        if(empty($this->id)) { /*si je n'ai pas d'id alors je créer une nouvelle entré dans la table avec les informations transmisent dans le formulaire*/
            $res = sql("INSERT INTO user (nom, prenom, email, mot_de_passe) 
                VALUES ('".addslashes($this->nom)."',
                '".addslashes($this->prenom)."',
    			'".addslashes($this->email)."',
    			'".md5($_POST['mot_de_passe'])."');");
    		if($res !== FALSE) /*si ça retourne autre chose que FALSE alors je détermine l'ID et je retour TRUE*/{
    			$this->id = $res;
    			return TRUE;
    		}
    		else /*Sinon je retourne FALSE*/ {
    			return FALSE;
    		}
    	}
    }

    function form($target){ /*ceci est le formulaire d'inscription*/
    	?><form action="<?php echo $target; ?>" method="post">
    		<label for"nom">Nom d'utilisateur :</label>
    		<input type="text" name="nom" />
    		<label for="email">Email</label>
			<input type="email" name="email" />
			<label for="password1">Mot de passe :</label>
			<input type="password" name="password1" />
			<label for="password2">Veuillez retapper le mot de passe :</label>
			<input type="password" name="password2" />
			<input type="submit" name="créer" value="S'incrire" />
    	</form><?php
    }

    static function login($email, $password) /*si je reçois un $courriel, $mot_de_passe par le formulaire d'identification, je vers voir dans la base de donnée si je les retrouvent*/{
		$res = sql("SELECT id FROM user WHERE email='$email'
			AND password = '".md5($password)."';");
		if($res !== FALSE && count($res) ==1) /*si en comparant j'ai autre chose que FALSE et je n'ai que 1 seul entré dans mon tableau alors c'est bien les bonnes informations et je retourne l'ID correspondant*/{
			return $res[0]['id'];
		}
		else /*sinon je retourn FALSE*/{
			return FALSE;
		}
	}

	function disconnect(){ /*quand je me déclenche, je casse la session et le cookie avant de recréer une nouvelle session et d'envoyer l'utilisateur sur index.php*/
		session_destroy();
		session_start();
		header('Location: index.php');
	}

}          