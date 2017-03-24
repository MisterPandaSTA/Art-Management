<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.oeuvre.php');

if(empty($_GET['id_oeuvre'])){
	$oeuvre= new Oeuvre();
	$oeuvre->form('creer.php','creer fiche');
}

if(isset($_POST['nom'])) {


	$oeuvre->setNom($_POST['nom']);
	$oeuvre->setIdArtiste($_POST['id_artiste']);
	$oeuvre->setTypeOeuvre($_POST['type_oeuvre']);
	$oeuvre->setDimensions($_POST['dimensions']);
	$oeuvre->setPoids($_POST['poids']);
	$oeuvre->setDescriptionOeuvre($_POST['description_oeuvre']);
	$oeuvre->setDateCreation($_POST['date_creation']);
	$oeuvre->setLivraison($_POST['livraison']);



	$insert=$oeuvre->syncDb();


		
	
	if ($insert==TRUE) {header("location:oeuvre.php");}
}