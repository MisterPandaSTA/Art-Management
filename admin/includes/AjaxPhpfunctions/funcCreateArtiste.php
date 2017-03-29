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
	$artiste->setDescription($_POST['description']);
	$artiste->setActivitees($_POST['activitees']);
	var_dump($_POST['nom']);
	/*$artiste->setDescriptionAnglais($_POST['description_anglais']);
	$artiste->setDescriptionAllemand($_POST['description_allemand']);
	$artiste->setDescriptionRusse($_POST['description_russe']);
	$artiste->setDescriptionChinois($_POST['description_chinois']);
	$artiste->setActiviteesAnglais($_POST['activitees_anglais']);
	$artiste->setActiviteesAllemand($_POST['activitees_allemand']);
	$artiste->setActiviteesRusse($_POST['activitees_russe']);
	$artiste->setActiviteesChinois($_POST['activitees_chinois']);*/

	$insert=$artiste->syncDb();

}
		