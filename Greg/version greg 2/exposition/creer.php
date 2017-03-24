<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.exposition.php');

if(empty($_GET['id_exposition'])){
	$exposition= new Exposition();
	$exposition->form('creer.php','creer fiche');
}

if(isset($_POST['theme'])) {

	$exposition->setIdArtiste($_POST['id_artiste']);
	$exposition->setDateDebut($_POST['date_debut']);
	$exposition->setDateFin($_POST['date_fin']);
	$exposition->setTheme(addslashes($_POST['theme']));
	



	$insert=$exposition->syncDb();


		
	
	if ($insert==TRUE) {header("location:exposition.php");}
}