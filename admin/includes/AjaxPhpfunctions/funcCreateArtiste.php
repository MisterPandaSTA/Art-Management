<?php

require_once('../classconfig.php');


if(isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['email'])) {
	
	$artiste= new artiste();
	$artiste->setNom($_POST['nom']);
	$artiste->setPrenom($_POST['prenom']);
	$artiste->setPseudo($_POST['pseudo']);
	$artiste->setEmail($_POST['email']);
	$artiste->setTelephone($_POST['telephone']);
	$artiste->setAdresse($_POST['adresse']);
	$artiste->setActivitees($_POST['activitees']);
	$artiste->setDescription($_POST['description']);
	
	var_dump($_POST['nom']);

	$insert=$artiste->syncDb();

}
		