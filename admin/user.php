<?php

require_once('includes/classconfig.php');

$texte = "Dashboard > Profil";
$desc = "Vous pouvez modifier vos informations de compte" ;
require_once('includes/dashhead.php');

if(isset($_SESSION['id']))
{	
	?>
	<section class="container-fluid page_content active">
		<div class="row cadre">
	<?php		

	if(isset($_POST['email'])) {
		$user = new User ();
		$user->setNom($_POST['nom']);
		$user->setPrenom($_POST['prenom']);
		$user->setEmail($_POST['email']);
		$updata = $user->modUser($_SESSION['id']);
		if ($updata == TRUE){
			echo "Votre profil a été mis a jour";
		}
		if(isset($_POST['oldpass']) && ($_POST['newpass']) == ($_POST['newpass2'])) {

			$updatepwd = $user->updatePassword($_POST['oldpass'],$_POST['newpass'],$_SESSION['id']);
			
			if($updatepwd !== FALSE){
				$_SESSION['id'] = $updatepwd['0'];
				$_SESSION['prenom'] = $updatepwd['1'];
				$_SESSION['permission'] = $updatepwd['2'];
			}
		
		}
		else 
		{
			echo "Le nouveau nouveau mot de passe et sa vérification ne sont pas identiques";
		}	
		
	
		
	}
	else {
	$modif = new User($_SESSION['id']);
	$modif->modForm('user.php');
	}
	?></div></sections><?php
}
else { 

?>
	<body onLoad="setTimeout('RedirectLogin()', 5000)">
		<div onLoad="setTimeout('RedirectLogin()', 5000)">Vous n'avez pas accès au contenue de cette page, dans 5 secondes vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/index.php">la page de connexion</a></div>
	<?php

}

	require_once('footer.php');

?>