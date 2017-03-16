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
	<div>
		<img src="images/test.svg" class="logo_sidebar"></img>
		<div class="topbar">
			<h2><?php $h1 = showPage() ; ?></h2>
			<p><?php $p = showDesc($desc) ; ?></p>
		</div>
	</div>	
</div>

	<?php
}
