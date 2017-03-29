<?php	

require_once('includes/classconfig.php');

if($_SESSION['id']){
	if($_SESSION['permission'] == 'utilisateur' || $_SESSION['permission'] == 'admin') {
	$texte = "Dashboard > type";
	$desc = "Vous pouvez  ...  .";
	require_once('includes/dashhead.php');
	
	?>
	<section class="container-fluid page_content">
		<div class="row cadre">
			<div class="panel panel-default">
	 		
		
			
				
	<?php

					$artiste= new artiste();
					$artiste->formArtiste('artiste.php','Créer');
	?>
				
			</div>
		</div>
		<div class="row cadre">
			<div class="panel panel-default">
	 			<div class="panel-heading">Liste des fiches artistes</div>
		
			
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Pseudo</th>
						<th>Email</th>
						<th>Téléphone</th>
						<th>Adresse</th>
						<th>Activitées</th>
						<th>Description</th>
						<th colspan="2">Action</th>
						
					</thead>

				<?php


					$modif = Artiste::listGestion(0, 10);
					foreach($modif as $form) {
						$f = new Artiste($form['id_artiste']);
						$f->afficheArtisteModif('');
					}
				
				?></table>
			</div>
		</div>	
	</sections>	


	
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