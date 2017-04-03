<?php	

require_once('includes/classconfig.php');

if(isset($_SESSION['id'])){
	if($_SESSION['permission'] == 'utilisateur' || $_SESSION['permission'] == 'admin') {
		$texte = "Dashboard > Gestion des Oeuvres";
		$desc = "Vous pouvez gérer les différentes oeuvres depuis cette page.";
		require_once('includes/dashhead.php');

		?>

		<section class="container-fluid page_content active">
			<div class="row cadre">
				<div class="panel-heading">
				
		<?php
		$oeuvre=new Oeuvre();
		$oeuvre->formCreate('');
			

		?>
			</div>
			<div class="row cadre">	
				<div class="panel panel-default">
			 		<div class="panel-heading">

			 			<table class="table table-bordered table-striped table-hover">
							<thead>
								<th>Nom de l'oeuvre</th>
								<th>Nom de l'artiste</th>
								<th>Livraison</th>
								<th colspan="2">Action</th>
							</thead>

	<?php
			/*$res=sql("SELECT artiste.nom as nom_artiste, oeuvre.nom, type_oeuvre, oeuvre.id_artiste, id_oeuvre, dimensions, poids, description_oeuvre, date_creation, livraison  FROM oeuvre INNER JOIN artiste ON oeuvre.id_artiste=artiste.id_artiste  ");
			foreach ($res as $user){
				$oeuvre = new Oeuvre($user['id_oeuvre']);
				echo "<tr>";
				echo "<td>".$oeuvre->getNomArtiste()."</td>";
				echo "<td>".$oeuvre->getNom()."</td>";
				echo "<td>".$oeuvre->getTypeOeuvre()."</td>";
				echo "<td>".$oeuvre->getDimensions()."</td>";
				echo "<td>".$oeuvre->getPoids()."</td>";
				echo "<td>".$oeuvre->getDescriptionOeuvre()."</td>";
				echo "<td>".$oeuvre->getDateCreation()."</td>";
				echo "<td>".$oeuvre->getLivraison()."</td>";
				echo "<td></td>";

				echo "</tr>";*/

				
			
			?>
					</table>	
				</div>
			</div>
		</section>
	}
	<?php
	/*if($_SESSION['permission'] == 'inactif'){
		$texte = "Dashboard > Gestion des Oeuvres";
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
	}*/
}
else {
	?>

	
	<body onLoad="setTimeout('RedirectLogin()', 5000)">
		<div onLoad="setTimeout('RedirectLogin()', 5000)">Vous n'avez pas accès au contenue de cette page, dans 5 secondes vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/index.php">la page de connexion</a></div>
	<?php

}

	require_once('footer.php');

?>