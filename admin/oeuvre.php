<?php

require_once('includes/classconfig.php');


if(isset($_SESSION['id']))
{
	if($_SESSION['permission'] == 'utilisateur' || $_SESSION['permission'] == 'admin') {	
		require_once('includes/dashhead.php');
		echo '<div>';	
		/*Oeuvre::affichage();*/
		$oeuvre=new Oeuvre();
		$oeuvre->affichage();
		
		if(isset($_GET['id_oeuvre'])) {
		$oeuvre = new Oeuvre($_GET['id_oeuvre']);
		$oeuvre->form('oeuvre.php','mettre à jour');

/*if(isset($_POST['nom']) && $_POST['nom'] != '' && $_POST['id_oeuvre'] !='') {

	$oeuvre = new Oeuvre($_POST['id_oeuvre']);
	$oeuvre->setNom($_POST['nom']);
	$oeuvre->setTypeOeuvre($_POST['type_oeuvre']);
	$oeuvre->setDimensions($_POST['dimensions']);
	$oeuvre->setPoids($_POST['poids']);
	$oeuvre->setDescriptionOeuvre($_POST['description_oeuvre']);
	$oeuvre->setDateCreation($_POST['date_creation']);
	$oeuvre->setLivraison($_POST['livraison']);
	
	var_dump($oeuvre);

	$update=$oeuvre->syncDb();


	if ($update==TRUE) {header("location:oeuvre.php");}
}*/

/*if(empty($_GET['id_oeuvre'])){
	$oeuvre= new Oeuvre();
	$oeuvre->form('creer.php','creer fiche');
}

if(isset($_POST['nom'])) {


	$oeuvre->setNom($_POST['nom']);
	$oeuvre->setTypeOeuvre($_POST['type_oeuvre']);
	$oeuvre->setDimensions($_POST['dimensions']);
	$oeuvre->setPoids($_POST['poids']);
	$oeuvre->setDescriptionOeuvre($_POST['description_oeuvre']);
	$oeuvre->setDateCreation($_POST['date_creation']);
	$oeuvre->setLivraison($_POST['livraison']);



	$insert=$oeuvre->syncDb();


		
	
	if ($insert==TRUE) {header("location:oeuvre.php");}
}*/
	}
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






