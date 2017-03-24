<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.exposition.php');

/*Oeuvre::affichage();*/
$exposition=new Exposition();
$exposition->affichage();