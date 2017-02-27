<?php

if(isset($_SESSION['id']) && $_SESSION['permission'])
{	
	?>
	<ul>
		<li><a href="dashboard.php">Dashboard</a></li>
		<li><a href="artiste.php">Artistes</a></li>
		<li><a href="oeuvre.php">Oeuvres</a></li>
		<li><a href="exposition.php">Expositions</a></li>
		<li><a href="statistique.php">Statistiques</a></li>
	<?php

	if($_SESSION['permission'] == 'admin' )
	{
	?>
		<li><a href="gestion_user.php">Gestion Utilisateurs</a></li>
		
	<?php
	}

	?>
	</ul>
	<ul>
		<li><a href="user.php">modifier profil</a></li><li><a href="logout.php">Déconnexion</a></li>
	</ul>
	<?php
}

