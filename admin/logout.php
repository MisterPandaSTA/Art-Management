<?php
/* ---------------- */
/*    logout.php    */
/* ---------------- */
require_once('include/includes.php');
/*Si j'ai un $_SESSION['id'], alors il utilise la function de déconnection de la class*/
$logout = new user($_SESSION['id']);
$logout->Disconnect();
?>
