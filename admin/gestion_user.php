<?php

require_once('include/includes.php');
require 'include/PHPMailer/PHPMailerAutoload.php';

if(isset($_POST['nom']) && ($_POST['prenom']))/*Si je reçois un $_POST['nom'], alors je crèer une nouvelle entré dans la table User avec les informations données*/{
	$user = new User ();
	$user->setNom($_POST['nom']);
	$user->setPrenom($_POST['prenom']);
	$user->setEmail($_POST['email']);
	// $user->setPassword($_POST['password']);
	$hash = user::hashage(default_password);
	$user->setPermission($_POST['permission']);
	$create = $user->createUser($hash);

}


if(isset($error)) /*si j'ai un $erreur alors je créer un nouveau formulaire*/ {
	echo '<div class="error">'.$error.'</div>';
	$user->form('inscription.php','M\'inscrire');	
}
elseif (!isset($error) && isset($_POST['nom'] && $create = TRUE)) /*Si je n'ai pas d'erreur et que j'ai bien reçus un $_POST['nom'], alors j'affiche le message*/{
			$mail = new PHPMailer;
			$mail->Host = 'artmwebmaster@gmail.com';
			$mail->SMTPAuth = TRUE;
			$mail->Username = 'artmwebmaster@gmail.com';
			$mail->Password = 'azerty012345678912';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			
	echo 'l\'inscription a bien été réalisé. Un email à été envoyé au nouvelle utilisateur.';
	echo 'Que voulez-vous faire ? <a href="dashboard.php">Retour au dashboard</a> <a href="gestion_user.php">Gérer les utilisateurs</a>';
}
else /*sinon j'affiche un formulaire vierge*/ {  
	$new_user = new user();
	$new_user->formcreate('gestion_user.php');
}



?>