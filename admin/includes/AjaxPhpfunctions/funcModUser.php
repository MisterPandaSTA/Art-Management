<?php

require_once('../classconfig.php');

if(isset($_POST['id_user'])){
	/*Si je reçois un $_POST['id_user'], alors je mets a jours avec les informations données*/
	if($_POST['action'] == 'modifier' ){
		$user = new User ($_POST['id_user']);
		$user->setNom($_POST['nom']);
		$user->setPrenom($_POST['prenom']);
		$user->setEmail($_POST['email']);
		$user->setPermission($_POST['permission']);
		$create = $user->gestionUser($_POST['id_user']);
	}
	if ($_POST['action'] == 'reset')  {
		$user = new User ($_POST['id_user']);
		$reset = $user->resetPass($_POST['id_user']);
	}

	if ($_POST['action'] == 'delete') {
		$user = new User ($_POST['id_user']);
		$delete = $user->deleteUser($_POST['id_user']);
	}
	else {
		return FALSE;
	}

}
