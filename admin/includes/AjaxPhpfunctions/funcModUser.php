<?php

require_once('includes/classconfig.php');

if(isset($_POST['id_user'])/*Si je reçois un $_POST['id_user'], alors je mets a jours avec les informations données*/{
		$user = new User ($_POST['id_user']);
		$user->setNom($_POST['nom']);
		$user->setPrenom($_POST['prenom']);
		$user->setEmail($_POST['email']);
		$user->setPermission($_POST['permission']);
		$create = $user->gestionUser($_POST['id_user'])