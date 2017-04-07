<?php

require_once ('config/config.php');
require_once ('config/db.php');
require_once('class.oeuvre.php');
require_once('class.artiste.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>

	<title></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="container">
		<div class="row titre">
			<div class="col-md-12">
		<h1 class="text-center "> Grand angle vous souhaite la bienvenue !</h1>
		</div>
	</div>

		<form class="form-inline" method="post" action="rechercher.php">
  		<div class="form-group">
  		<label for="requete">Recherche</label>
   		<input type="text" class="form-control" id="requete" name="requete" placeholder="Jane Doe">
		</div>
		<button type="submit" class="btn btn-default">Rechercher</button>
		</form>
		

	

	


			<div class="row">

			<?php

			if (isset($_GET['id_oeuvre'])){
				$oeuvre= new Oeuvre($_GET['id_oeuvre']);
 			
 			echo '<div class="col-md-3 margin_img"><img src="img/'.$oeuvre->getImgName().'"/></div>';

            echo  '<div class="col-md-6 margin_text"><strong>Nom de l\'artiste : </strong><a href="rechercher.php?id_artiste='.$oeuvre->getIdArtiste().'">'.$oeuvre->getNomArtiste().'</a><br>';
            
            echo '<p class="margin_text"><strong>Date de création : </strong>'.$oeuvre->getDateCreation().'</p>';

            echo '<p class="margin_text"><strong>Description de l\'oeuvre : </strong>'.$oeuvre->getDescriptionOeuvre().'</br>';
           
			echo '<p class="margin_text"><strong>Dimensions de l\'oeuvre : </strong>'.$oeuvre->getDimensions().'</p>			
			<nav aria-label="...">
	  			<ul class="pager">
	    			<li><a href="rechercher.php?id_oeuvre='.$oeuvre->getIdOeuvre().'">Previous</a></li>
	   			    <li><a href="rechercher.php?id_oeuvre='.$oeuvre->getIdOeuvreNext().'">Next</a></li>
	  			</ul>
			</nav></div>';
			}

			else {
			$oeuvre = new Oeuvre();
			$oeuvre -> recherche();
			}

			if(isset($_GET['id_artiste'])){
				$artiste=new Artiste($_GET['id_artiste']);
				echo '<div class="col-md-3 margin_img"><img src="img/'.$artiste->getPhotoArtiste().'"/></div>';
				echo '<div class="col-md-6"><p class="margin_text">'.$artiste->getPrenom().' '.$artiste->getNomArtiste().'</p>';
				echo '<p class="margin_text">'.$artiste->getDescription().'</p></div></div>';
			}
			?>



			</div>
			
	</div>
</body>
</html>