<?php
require_once('../classconfig.php');
require_once('../phpqrcode/qrlib.php');

if(isset($_POST['id_oeuvre'])) {

	$oeuvre = new Oeuvre($_POST['id_oeuvre']);
	
	if($_POST['action'] == 'modifier' ){

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
		var_dump($update);
	}

	if($_POST['action'] == 'traduction') {

	}	

}
if($_POST['action'] == 'qrcode') {
	$qrcode = QRcode::png(' '.$_POST['id_oeuvre'].' ','../../images/qrcode/'.$_POST['id_oeuvre'].'.png'); // creates QR-code

	var_dump($_POST['id_oeuvre']);
	var_dump($qrcode);
	}