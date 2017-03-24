<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.exposition.php');

$exposition=new Exposition($_GET['id_exposition']);
echo 'Nom de l\'artiste : '.$exposition->getNomArtiste().'<br> thème de l\'exposition : '.$exposition->getTheme().'<br> Date de début : 
'.$exposition->getDateDebut().'<br> Date de fin : '.$exposition->getDateFin().'<br>';  