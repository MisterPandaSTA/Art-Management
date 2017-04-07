<?php

require_once ('config/config.php');
require_once ('config/db.php');
require_once('class.artiste.php');

$artiste=new Artiste($_GET['id_artiste']);
echo $artiste->getDescription();