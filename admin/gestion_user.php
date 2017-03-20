<?php	

require_once('includes/classconfig.php');

if($_SESSION['id'] && $_SESSION['permission'] == 'admin' ){
	require_once('includes/dashhead.php');
	

	?>
	<section class="container page_content">
		<div class="row cadre">
			
				
	<?php

		$create = new User();
		$create->formCreate('');

	?>
			
		</div><div class="row cadre">
			<table class="table table-bordered table-hover">
			<tr>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th>Permission</th>
				<th>Action</th>
				
			</tr>	
	<?php


		$modif = User::listGestion(0, 10);
		foreach($modif as $form) {
			$f = new User($form['id_utilisateur']);
			$f->formGestion('');
		}
	
	?></table></div></sections><?php

}
else {
	?>
	<body onLoad="setTimeout('RedirectLogin()', 5000)">
		<div onLoad="setTimeout('RedirectLogin()', 5000)">Vous n'avez pas accès au contenue de cette page, dans 5 secondes vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/index.php">la page de connexion</a></div>
	<?php

}

	require_once('footer.php');

?>
