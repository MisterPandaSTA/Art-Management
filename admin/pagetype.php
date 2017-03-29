<?php	

require_once('includes/classconfig.php');

if($_SESSION['id']){
	if($_SESSION['permission'] == 'utilisateur' || $_SESSION['permission'] == 'admin') {
	$texte = "Dashboard > type";
	$desc = "Vous pouvez  ...  .";
	require_once('includes/dashhead.php');
	?>
	
	<section class="container-fluid page_content active">
		<div class="row cadre">

	<!-- contenue -->



	
	<?php
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
