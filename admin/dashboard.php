<?php

require_once('include/includes.php');

if(isset($_SESSION['id'])){
	if($_SESSION['permission'] == 'utilisateur' || $_SESSION['permission'] == 'admin' ){
		echo 'ici cest pour les user normaux !';
	}
	else($_SESSION['permission'] == 'admin' ){
		echo 'ya que les admins qui voies ça !';
	}	
}
else { 
	echo 'il faut te connecter gros !';
}


?>

<!DOCTYPE html><html>
<meta charset="utf-8">
<head>

</head>
	<body>
	<p>ici c'est le dashboard</p>

	</body>
</html>
<?php
?>