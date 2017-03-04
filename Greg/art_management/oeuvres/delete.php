<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.oeuvre.php');

if(isset($_GET['id_oeuvre'])) {
	$oeuvre = new Oeuvre($_GET['id_oeuvre']);
	$oeuvre->delete();

	
}

header("location:oeuvre.php");