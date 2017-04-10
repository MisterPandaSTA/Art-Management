<?php

require_once('includes/classconfig.php');


if(isset($_SESSION['id'])){
	if($_SESSION['permission'] == 'utilisateur' || $_SESSION['permission'] == 'admin'){	

		$texte = "Dashboard";
		$desc = "Bienvenue ".$_SESSION['prenom']." " ;
		require_once('includes/dashhead.php');
		?>
		<section class="container-fluid page_content active">
		<div class="row cadre">
			<div class="panel panel-default"><a href="oeuvre.php" class='btn btn-primary'>Gestion des Expositions</a></div>
				<table class="table table-bordered table-striped table-hover">
            		<thead>
                		<th>Thème</th>
                		<th>Artiste</th>
                		<th>Date de Début</th>
                		<th>Date de fin</th>
            		</thead>
			<?php
			$modif = exposition::listGestionDash(0, 5);
						foreach($modif as $form) {
							$f = new exposition($form['id_exposition']);
							$f->afficheExpositionDash();
						}
			?>
			</table>
		</div>
		<div class="double_affichage">
			<div class="row cadre">
				<div class="panel panel-default"><a href="oeuvre.php" class='btn btn-primary'>Gestion des Artistes</a></div>
				<table class="table table-bordered table-striped table-hover">
            		<thead>
                		<th>Nom</th>
                		<th>Prenom</th>
                		<th>Pseudo</th>
                		<th>Email</th>
                		<th>Activitées</th>
            		</thead>
				<?php
					$modif = Artiste::listGestionDash(0, 5);
								foreach($modif as $form) {
									$f = new Artiste($form['id_artiste']);
									$f->afficheArtisteDash();
								}
				?>
				</table>	
			</div>
		<?php
			if($_SESSION['permission'] == 'admin' )
			{
			?><div class="row cadre">
				<div class="panel panel-default"><a href="oeuvre.php" class='btn btn-primary'>Gestion des Utilisateurs</a></div>
				<table class="table table-bordered table-striped table-hover">
            		<thead>
                		<th>Nom</th>
                		<th>Prenom</th>
                		<th>Email</th>
                		<th>Permission</th>
            		</thead>
				<?php
					$modif = User::listGestion(0, 5);
								foreach($modif as $form) {
									$f = new User($form['id_utilisateur']);
									$f->afficheUtilisateurDash();
								}
				?>
				</table>
			</div>	
			<?php	
			}
		?>
		</div>
			<div class="row cadre">
				<div class="panel panel-default"><a href="oeuvre.php" class='btn btn-primary'>Gestion des Oeuvres</a></div>
				<table class="table table-bordered table-striped table-hover">
            		<thead>
                		<th>Nom de l'oeuvre</th>
                		<th>Artiste</th>
                		<th>livraison</th>
                		<th>date de création</th>
                		<th>type d'oeuvre</th>
            		</thead>
					<?php
					$modif = Oeuvre::listGestionDash(0, 5);
								foreach($modif as $form) {
									$f = new Oeuvre($form['id_oeuvre']);
									$f->afficheOeuvreDash();
								}
			?>
				</table>
			</div>	
		</section>
		<?php
	}
	if($_SESSION['permission'] == 'inactif'){
		$texte = "Dashboard";
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
else { 
	echo 'Vous n\'êtes pas autorisé à accéder à cette page vous allez être rediriger sur la page de connexion.';
?>
<body onLoad="setTimeout('RedirectLogin()', 5000)">
	<div onLoad="setTimeout('RedirectLogin()', 5000)">Vous n'avez pas accès au contenue de cette page, dans 5 secondes vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/index.php">la page de connexion</a></div>
<?php

}
require_once('footer.php');
?>

