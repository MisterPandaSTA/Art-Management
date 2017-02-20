<?php

require_once('include/includes.php');

if(isset($_SESSION['id']) && $_SESSION['permission'] == 'admin'){
	echo 'ici c\'est pour les admins !';
}
else(isset($_SESSION['id']) && $_SESSION['permission'] == 'utilisateur'){
	echo 'ici c\'est pour les admins !';
}


?>
<!DOCTYPE html><html>
<meta charset="utf-8">
<head>
</head>
<body>

<p>ici c'est le dashboard</p>

</body>
<?php
?>