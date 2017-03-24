<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.oeuvre.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="connexion.php">
<label>Nom</label>
<input type="text" name="nom">	
<label>Mot de Passe</label>
<input type="password" name="password">
<input type="submit" value="envoyer">
</form>
</body>
</html>

<?php

if(isset($_POST['nom'])){
	$res=Oeuvre::connect($_POST['nom'],$_POST['password']);
    if($res === FALSE) {
    	echo 'Email et mot de passe entrés sont invalides';
    }
    else {
        $_SESSION['id'] = $res;
        header('Location: dashboard.php');
    }
}
