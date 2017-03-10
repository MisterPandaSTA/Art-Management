<?php

if(isset($_SESSION['id']) && $_SESSION['permission'])
{	

	function showPage ($texte = "Dashboard") 
	{
		echo $texte ;
	}

		function showDesc ($desc)
	{
    	echo $desc ;
	}

	$desc = "Bienvenue ".$_SESSION['prenom']." " ;


	?>

	<div class="topbar">
		<h2><?php $h1 = showPage() ; ?></h2>
		<p><?php $p = showDesc($desc) ; ?></p>
	</div>
</div>

	<?php
}
