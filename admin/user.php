<?php

require_once('include/includes.php');
require_once('header.php');

if(isset($_SESSION['id']))
{	

	require_once('SideBar.php');

	if(isset($_POST['email'])) {
		$user = new User ();
		$user->setNom($_POST['nom']);
		$user->setPrenom($_POST['prenom']);
		$user->setEmail($_POST['email']);
		$updata = $user->modUser($_SESSION['id']);

		if(isset($_POST['oldpassword'] && $_SESSION['newpass'] && $_SESSION['newpass2'])) {

			$updatepwd = $user->updatePassword($_POST['oldpassword'],$_POST['newpassword'],$_SESSION['id']);
		}
	}
	if ($updata !== FALSE || $updatepwd !== FALSE){
		echo 'Les informations de votre compte ont étaient mises à jours.';
	}
	else {
	$modif = new User($_SESSION['id']);
	$modif->modForm('user.php');
	}
}
else { 

?>
	<body onLoad="setTimeout('RedirectLogin()', 5000)">
		<div onLoad="setTimeout('RedirectLogin()', 5000)">Vous n'avez pas accès au contenue de cette page, dans 5 secondes vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/index.php">la page de connexion</a></div>
	<?php

}

	require_once('footer.php');

?>
