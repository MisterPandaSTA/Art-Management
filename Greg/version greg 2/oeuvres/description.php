<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.oeuvre.php');

$oeuvre=new Oeuvre($_GET['id_oeuvre']);
echo 'Nom de l\'artiste : '.$oeuvre->getNomArtiste().' <br> nom de l\'oeuvre :'.$oeuvre->getNom().'<br> Type d\'oeuvre : '.$oeuvre->getTypeOeuvre().'<br> Dimensions : '.$oeuvre->getDimensions().'<br> Poids : '.$oeuvre->getPoids().'<br> Description : '.$oeuvre->getDescriptionOeuvre().'<br> Date de création : '.$oeuvre->getDateCreation().'<br> Livraison : '.$oeuvre->getLivraison().'';