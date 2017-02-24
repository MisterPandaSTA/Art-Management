<?php

require_once('include/includes.php');
require_once('header.php');

if(isset($_SESSION['id']) && $_SESSION['permission'])
{	

	require_once('SideBar.php');

	if(isset($_POST['email'])) {


		if(isset($_POST['oldpassword']))
	}
	else {
	$modif = new User($_SESSION['id']);
	$modif->modform('user.php');
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
