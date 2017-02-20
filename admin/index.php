<?php
/* --------------- */
/*    index.php    */
/* --------------- */

require_once('include/includes.php');

if(isset($_POST['email'])) /*si je reçois un $_POST['courriel'] par le formulaire, l'utilise la function login qui va tester les informations fournis par le formulaire*/ {
	$login = user::login($_POST['email'],$_POST['password']);

	if($login !== FALSE) /*si la fonction retourne autre chose que FALSE, alors une connection est établi*/{

		$_SESSION['id'] = $login['0'];
		$_SESSION['permission']= $login['1'];

	}
	else /* sinon ce message d'erreur s'affiche*/{
		echo "L'adresse et/ou le mot de passe ne correspondent pas à notre base de données";
	}
}
if(isset($_SESSION['id']))/*si j'ai un $_SESSION['id'] alors je revois l'utilisateur vers index.php*/ {
	header('Location:dashboard.php');
	
}
else {
?>

<img src="">(logo)</img>

<form method="post" action="index.php">
	<label for="email">Votre email</label>
	<input type="email" name="email" placeholder="default@quelque.chose">
	<label for="password">Votre mot de passe</label>
	<input type="password" name="password">
	<input type="submit" value="Valider">
</form>

<?php
}
?>