<?php

require_once('include/includes.php');
require 'include/PHPMailer/PHPMailerAutoload.php';

if(isset($_POST['nom']) && ($_POST['prenom']))/*Si je reçois un $_POST['nom'], alors je crèer une nouvelle entré dans la table User avec les informations données*/{
	$user = new User ();
	$user->setNom($_POST['nom']);
	$user->setPrenom($_POST['prenom']);
	$user->setEmail($_POST['email']);
	$hash = hashage(default_password);
	$user->setPermission($_POST['permission']);
	$create = $user->createUser($hash);
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->CharSet = "utf-8";
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->SMTPAuth = TRUE;
	$mail->Username = 'artmwebmaster@gmail.com';
	$mail->Password = 'azerty012345678912';
	$mail->setFrom('artmwebmaster@gmail.com', 'Art-Management');
	

	$mail->addAddress('misterpandasta@gmail.com');                    

	$mail->Subject = 'Bienvenue sur Art Management !';
	$mail->msgHTML(file_get_contents('mailcreation.html'), dirname(__FILE__)); 
	$mail->AltBody = 'message pas HTML';
		if(!$mail->send()) {
 			echo 'Message could not be sent.';
 			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} 
		else {
    		echo '<p>L\'inscription a bien été réalisé. Un email a été envoyé au nouvelle utilisateur. </p>';
		}	
}



if(isset($error)) /*si j'ai un $erreur alors je créer un nouveau formulaire*/ {
	echo '<div class="error">'.$error.'</div>';
	$user->form('inscription.php','M\'inscrire');	
}
elseif (!isset($error) && isset($_POST['nom'])) /*Si je n'ai pas d'erreur et que j'ai bien reçus un $_POST['nom'], alors j'affiche le message*/{
						
	echo '<p>Que voulez-vous faire ?</p></ br> <a href="dashboard.php">Retour au dashboard</a> <a href="gestion_user.php">Gérer les utilisateurs</a>';
}
else /*sinon j'affiche un formulaire vierge*/ {  
	$new_user = new user();
	$new_user->formcreate('gestion_user.php');
}



?>