<?php

require_once ('../includes/functions.php');
require_once ('../includes/config.php');
require_once ('class/class.artiste.php');

$artiste=new Artiste($_GET['id_artiste']);
echo 'nom de l\'artiste : '.$artiste->getNom().'<br> prénom de l\'artiste : '.$artiste->getPrenom().'<br> pseudo : '.$artiste->getPseudo().'<br> Email : '.$artiste->getEmail().'<br> Telephone : '.$artiste->getTelephone().'<br> Adresse : '.$artiste->getAdresse().'<br> Description : '.$artiste->getDescription().' <br> Activitees : '.$artiste->getActivitees().'<br> Description Anglais : '.$artiste->getDescriptionAnglais().' <br> Description Allemand : '.$artiste->getDescriptionAllemand().' <br> Description Russe : '.$artiste->getDescriptionRusse().' <br> Description Chinois : '.$artiste->getDescriptionChinois().' <br> Activitees Anglais : '.$artiste->getActiviteesAnglais().' <br> Activitees Allemand : '.$artiste->getActiviteesAllemand().' <br> Activitees Russe : '.$artiste->getActiviteesRusse().' <br> Activitees Chinois : '.$artiste->getActiviteesChinois().'';