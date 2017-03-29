<?php
require_once('../classconfig.php');


if(isset($_GET['id_artiste'])) {
	$artiste = new Artiste($_GET['id_artiste']);
	$artiste->form('modifier.php','mettre à jour');
}
	if($_POST['action'] == 'modifier' ){

	$artiste = new Artiste($_POST['id_artiste']);
	$artiste->setNom($_POST['nom']);
	$artiste->setPrenom($_POST['prenom']);
	$artiste->setPseudo($_POST['pseudo']);
	$artiste->setEmail($_POST['email']);
	$artiste->setTelephone($_POST['telephone']);
	$artiste->setAdresse($_POST['adresse']);
	$artiste->setActivitees($_POST['activitees']);
	$artiste->setDescription($_POST['description']);
	
	var_dump($artiste);
	$update=$artiste->syncDb();

	}
	if ($_POST['action'] == 'traduction')  {
		$artiste->setDescriptionAnglais($_POST['description_anglais']);
		$artiste->setDescriptionAllemand($_POST['description_allemand']);
		$artiste->setDescriptionRusse($_POST['description_russe']);
		$artiste->setDescriptionChinois($_POST['description_chinois']);
		$artiste->setActiviteesAnglais($_POST['activitees_anglais']);
		$artiste->setActiviteesAllemand($_POST['activitees_allemand']);
		$artiste->setActiviteesRusse($_POST['activitees_russe']);
		$artiste->setActiviteesChinois($_POST['activitees_chinois']);
		$reset = $user->syncDb();
	}

	if ($_POST['action'] == 'delete') {
		$user = new Artiste ($_POST['id_user']);
		$delete = $user->deleteArtiste($_POST['id_user']);
	}
	else {
		return FALSE;
	}
	
}