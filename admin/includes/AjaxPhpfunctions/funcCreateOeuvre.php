<?php

require_once('../classconfig.php');


if(isset($_POST['nom']) && ($_POST['id_artiste']) && ($_POST['type_oeuvre'])) {

	$oeuvre= new Oeuvre();

	$oeuvre->setNom($_POST['nom']);
	$oeuvre->setIdArtiste($_POST['id_artiste']);
	$oeuvre->setImgName($_POST['photo']);
	$oeuvre->setTypeOeuvre($_POST['type_oeuvre']);
	$oeuvre->setDimensions($_POST['dimensions']);
	$oeuvre->setPoids($_POST['poids']);
	$oeuvre->setDescriptionOeuvre($_POST['description_oeuvre']);
	$oeuvre->setDateCreation($_POST['date_creation']);
	$oeuvre->setLivraison($_POST['livraison']);

	/*$img_name = $_POST['nom'].'.jpg'; 
	
	$artiste->setImgName($img_name);
	move_uploaded_file($_FILES['photo']['tmp_name'],'../../images/oeuvre/'.$img_name);*/


	$insert=$oeuvre->syncDb();

	var_dump($oeuvre);
	var_dump($insert);






}