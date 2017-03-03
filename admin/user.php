<?php

require_once('includes/classconfig.php');

require_once('includes/dashhead.php');

if(isset($_SESSION['id']))
{	
	if(isset($_POST['email'])) {
		$user = new User ();
		$user->setNom($_POST['nom']);
		$user->setPrenom($_POST['prenom']);
		$user->setEmail($_POST['email']);
		$updata = $user->modUser($_SESSION['id']);

		if(isset($_POST['oldpass']) && ($_POST['newpass']) == ($_POST['newpass2'])) {

			$updatepwd = $user->updatePassword($_POST['oldpass'],$_POST['newpass'],$_SESSION['id']);
		}	
		elseif($updata == TRUE || $updatepwd == TRUE){
	
		$_SESSION['id'] = $login['0'];
		$_SESSION['permission']= $login['1'];
		}
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