<?php	

require_once('includes/classconfig.php');

if($_SESSION['id'] && $_SESSION['permission'] == 'admin' ){

	$create = new User();
	$create->formCreate('gestion_user.php');

	$modif = User::listGestion(0, 10);
	foreach($modif as $form) {
		$f = new User($form['id_utilisateur']);
		$f->formGestion('');
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
