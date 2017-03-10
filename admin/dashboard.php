<?php

require_once('includes/classconfig.php');
require_once('includes/dashhead.php');

if(isset($_SESSION['id']) && $_SESSION['permission'])
{	
		
	if($_SESSION['permission'] == 'admin' )
	{
		
		
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

