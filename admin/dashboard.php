<?php

require_once('includes/classconfig.php');


if(isset($_SESSION['id']) && $_SESSION['permission'])
{	
	$texte = "Dashboard";
	$desc = "Bienvenue ".$_SESSION['prenom']." " ;
	require_once('includes/dashhead.php');	
	if($_SESSION['permission'] == 'admin' )
	{
		
		
	}
	
}
elseif(isset($_SESSION['id']))
{
	$texte = "Dashboard";
	$desc = "Bienvenue ".$_SESSION['prenom']." . C'est votre première connexion, pour avoir un accès complet, veuillez definir votre mot de passe !" ;
	require_once('includes/dashhead.php');

	?>
	<body onLoad="setTimeout('RedirectFirstLogin()', 10000)">
		<section class="container page_content">
			<div class="row cadre">
		
				<div onLoad="setTimeout('RedirectFirstLogin()', 10000)">
					Vous vous êtes connectez avec le mot de passe de base, vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/user.php">votre page profil</a> afin que vous definissiez votre nouveau mot de passe.
				</div>
	<?php

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

