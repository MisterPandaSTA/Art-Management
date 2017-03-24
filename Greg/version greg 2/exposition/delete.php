<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.exposition.php');

if(isset($_GET['id_exposition'])) {
	$exposition = new Exposition($_GET['id_exposition']);
	$exposition->delete();

	
}

header("location:exposition.php");