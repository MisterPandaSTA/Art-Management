<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.oeuvre.php');


if(isset($_GET['id_oeuvre'])) {
	$oeuvre = new Oeuvre($_GET['id_oeuvre']);
	$oeuvre->form('modifier.php','mettre à jour');
}

if(isset($_POST['nom']) && $_POST['nom'] != '' && $_POST['id_oeuvre'] !='') {

	$oeuvre = new Oeuvre($_POST['id_oeuvre']);
	$oeuvre->setIdArtiste($_POST['id_artiste']);
	$oeuvre->setNom($_POST['nom']);
	$oeuvre->setTypeOeuvre($_POST['type_oeuvre']);
	$oeuvre->setDimensions($_POST['dimensions']);
	$oeuvre->setPoids($_POST['poids']);
	$oeuvre->setDescriptionOeuvre($_POST['description_oeuvre']);
	$oeuvre->setDateCreation($_POST['date_creation']);
	$oeuvre->setLivraison($_POST['livraison']);
	
	/*var_dump($oeuvre);*/
	var_dump($oeuvre);
	$update=$oeuvre->syncDb();


	if ($update==TRUE) {header("location:oeuvre.php");}
}
	

