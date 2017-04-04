<?php

require_once('../classconfig.php');


if(isset($_POST['nom']) && ($_POST['id_artiste']) && ($_POST['type_oeuvre'])) {

	$oeuvre= new Oeuvre();

	$oeuvre->setNom($_POST['nom']);
	$oeuvre->setIdArtiste($_POST['id_artiste']);
	$oeuvre->setTypeOeuvre($_POST['type_oeuvre']);
	$oeuvre->setDimensions($_POST['dimensions']);
	$oeuvre->setPoids($_POST['poids']);
	$oeuvre->setDescriptionOeuvre($_POST['description_oeuvre']);
	$oeuvre->setDateCreation($_POST['date_creation']);
	$oeuvre->setLivraison($_POST['livraison']);

	$insert=$oeuvre->syncDb();

	var_dump($oeuvre);
	var_dump($insert);






}