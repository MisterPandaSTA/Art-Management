<?php

require_once('include/includes.php');




if(isset($error)) /*si j'ai un $erreur alors je créer un nouveau formulaire*/ {
	echo '<div class="error">'.$error.'</div>';
	$user->form('inscription.php','M\'inscrire');	
}
elseif (!isset($error) && isset($_POST['nom'])) /*Si je n'ai pas d'erreur et que j'ai bien reçus un $_POST['nom'], alors j'affiche le message*/ {
	echo 'l\'inscription a bien été réalisé. Un email à été envoyé au nouvelle utilisateur.';
	echo 'Que voulez-vous faire ? <a href="dashboard.php">Retour au dashboard</a> <a href="gestion_user.php">Gérer les utilisateurs</a>';
}
else /*sinon j'affiche un formulaire vierge*/ {  
	$new_user = new user();
	$new_user->formcreate('gestion_user.php');
}



?>