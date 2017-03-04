<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.artiste.php');

/*Oeuvre::affichage();*/
$oeuvre=new Artiste();
$oeuvre->affichage();