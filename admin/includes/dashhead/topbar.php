<?php

if(isset($_SESSION['id']) && $_SESSION['permission'])
{	
	
	?>

	<div class="topbar">
		<h2><?php echo 'nom de la page en php'; ?></h2>
		<p>Bienvenue <?php echo 'prenom en php'; ?></p>
	</div>
</div>

	<?php
}
