<?php

require_once('include/includes.php');
require_once('header.php');

if(isset($_SESSION['id']) && $_SESSION['permission'])
{	
	require_once('SideBar.php');
	echo 'ici cest pour les user normaux !';
	var_dump($_SESSION['permission']);

	if($_SESSION['permission'] == 'admin' )
	{
		var_dump($_SESSION['permission']);
		echo 'ya que les admins qui voies ça !';
	}
	
}
else { 
	echo 'Vous n\'êtes pas autorisé à accéder à cette page vous allez être rediriger sur la page de connection.';

?>
<body onLoad="setTimeout('RedirectLogin()', 5000)">
	<div onLoad="setTimeout('RedirectLogin()', 5000)">Vous n'avez pas accès au contenue de cette page, dans 5 secondes vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/index.php">la page de connexion</a></div>
<?php

}

?>

