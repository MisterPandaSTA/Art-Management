<?php
require_once('../classconfig.php');

if(isset($_POST['id_oeuvre'])) {

	$oeuvre = new Oeuvre($_POST['id_oeuvre']);
	
	if($_POST['action'] == 'modifier' ){

		$oeuvre = new Oeuvre($_POST['id_oeuvre']);
		$oeuvre->setIdArtiste($_POST['id_artiste']);
		$oeuvre->setNom($_POST['nom']);
		$oeuvre->setTypeOeuvre($_POST['type_oeuvre']);
		$oeuvre->setDimensions($_POST['dimensions']);
		$oeuvre->setPoids($_POST['poids']);
		$oeuvre->setDescriptionOeuvre($_POST['description_oeuvre']);
		$oeuvre->setDateCreation($_POST['date_creation']);
		$oeuvre->setLivraison($_POST['livraison']);
		
		
		var_dump($oeuvre);
		$update=$oeuvre->syncDb();
	}

	if ($_POST['action'] == 'traduction') {

	}
}