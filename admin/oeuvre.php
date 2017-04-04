<?php	

require_once('includes/classconfig.php');

if(isset($_SESSION['id'])) {
	if($_SESSION['permission'] == 'utilisateur' || $_SESSION['permission'] == 'admin') {
	$texte = "Dashboard > Gestion des Oeuvres";
	$desc = "Vous pouvez gérer les différentes oeuvres depuis cette page.";
	require_once('includes/dashhead.php');
	?>
	
	<section class="container-fluid page_content active">
		<div class="row cadre">
			<div class="panel panel-heading">
				
			<?php
				$oeuvre=new Oeuvre();
				$oeuvre->formOeuvre('oeuvre.php');
				

			?>
			</div>
		</div>		
		<div class="row cadre">	
				<div class="panel panel-default flex tableau_mise_page">
			 		<div class="panel-heading">Liste des fiches oeuvres</div>
			 		<div class="flex">
			 			<table class="table table-bordered table-striped table-hover double_table">
							<thead>
								<th>Nom de l'oeuvre</th>
								<th>Nom de l'artiste</th>
								<th>Livraison</th>
								<th colspan="2">Action</th>
							</thead>
							<?php
							
							$modif = Oeuvre::listGestion(0, 10);
							foreach($modif as $form) {
								$f = new Oeuvre($form['id_oeuvre']);
								$f->afficheOeuvreModif();
							}
						?>
						</table>
						<table class="table table-bordered table-striped table-hover double_table">
							<thead>
								<th>Nom de l'oeuvre</th>
								<th>Nom de l'artiste</th>
								<th>Livraison</th>
								<th colspan="2">Action</th>
							</thead>
							<?php
							
							$modif = Oeuvre::listGestion(10, 20);
							foreach($modif as $form) {
								$f = new Oeuvre($form['id_oeuvre']);
								$f->afficheOeuvreModif();
							}
						?>
						</table>
					</div>
				</div>
		</div>	
	</sections>	

	<?php
	if($_SESSION['permission'] == 'inactif'){
		$texte = "Dashboard > type";
		$desc = "Bienvenue ".$_SESSION['prenom']." . C'est votre première connexion, pour avoir un accès complet, veuillez definir votre mot de passe !" ;
		require_once('includes/dashhead.php');

		?>
		<body onLoad="setTimeout('RedirectFirstLogin()', 10000)">
			<section class="container-fluid page_content active">
				<div class="row cadre">
			
					<div onLoad="setTimeout('RedirectFirstLogin()', 10000)">
						Vous vous êtes connectez avec le mot de passe de base, vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/user.php">votre page profil</a> afin que vous definissiez votre nouveau mot de passe.
					</div>
				</div>
			</section>		
		<?php
	}
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
