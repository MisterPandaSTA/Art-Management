<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.exposition.php');


if(isset($_GET['id_exposition'])) {
	$exposition = new Exposition($_GET['id_exposition']);
	$exposition->form('modifier.php','mettre à jour');
}

if(isset($_POST['theme']) && $_POST['theme'] != '' && $_POST['id_exposition'] !='') {

	$exposition = new Exposition($_POST['id_exposition']);
	$exposition->setIdArtiste($_POST['id_artiste']);
	$exposition->setTheme($_POST['theme']);
	$exposition->setDateDebut($_POST['date_debut']);
	$exposition->setDateFin($_POST['date_fin']);
	
	

	$update=$exposition->syncDb();


	if ($update==TRUE) {header("location:exposition.php");}
}