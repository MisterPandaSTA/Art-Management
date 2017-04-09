<?php

require_once('../classconfig.php');

if(isset($_POST['nom_artiste']) && ($_POST['prenom']) && ($_POST['email'])) {
	
	var_dump($_POST['nom_artiste']);

	$artiste= new artiste();
	$artiste->setNomArtiste($_POST['nom_artiste']);
	$artiste->setPrenom($_POST['prenom']);
	$artiste->setPseudo($_POST['pseudo']);
	$artiste->setEmail($_POST['email']);
	$artiste->setTelephone($_POST['telephone']);
	$artiste->setAdresse($_POST['adresse']);
	$artiste->setActivitees($_POST['activitees']);
	$artiste->setDescription($_POST['description']);
	

	$img_name = $_POST['nom_artiste'].$_POST['prenom'].'.jpg'; 

	$artiste->setImgName($img_name);
	move_uploaded_file($_FILES['photo']['tmp_name'],'../../images/artiste/'.$img_name);
	
	var_dump($artiste);
	/*var_dump($_POST['nom_artiste']);
	var_dump($_FILES);*/
	

	$insert=$artiste->syncDb();

}
		