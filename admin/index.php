<?php
/* --------------- */
/*    index.php    */
/* --------------- */

require_once('includes/classconfig.php');

if(isset($_POST['email'])) /*si je reçois un $_POST['courriel'] par le formulaire, l'utilise la function login qui va tester les informations fournis par le formulaire*/ {
	
	$login = user::login($_POST['email'],$_POST['password']);
	
	if($login !== FALSE) /*si la fonction retourne autre chose que FALSE, alors une connection est établi*/{

		$_SESSION['id'] = $login['0'];
		$_SESSION['prenom'] = $login['1'];
		$_SESSION['permission'] = $login['2'];
		

	}
	elseif($login == FALSE){ /* sinon ce message d'erreur s'affiche*/
		$msg_soucis = "L'adresse et/ou le mot de passe ne correspondent pas à notre base de données";
	}
}
if(isset($_SESSION['id']))/*si j'ai un $_SESSION['id'] alors je revois l'utilisateur vers index.php*/ {
	header('Location:dashboard.php');
	
}
else {

require_once ('includes/dashhead/header.php');

?>

<div class="container">

<div class="row login">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    	<div class="col-xs-10 col-xs-offset-1 ">
    		<img src="images/test2.svg" id="logo"></img>
    	</div>
    </div>
</div>
<div class="row login">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" method="post" action="index.php">
			<fieldset>
				<h2>Veuillez vous identifier</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Votre adresse mail">
				</div>
				<div class="form-group" id="pass-login">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Votre mot de passe">
				</div>
				<div class="form-group">
                    <?php if(isset($msg_soucis)) { echo $msg_soucis; } ?>
				</div>
				<div class="row">
					<div class="button-checkbox col-xs-3 col-sm-3 col-xs-offset-6 col-sm-offset-8">
						<button type="button" id="mdpoublie" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Veuillez contacter votre administrateur pour qu'il réinitialise votre mot de passe.">
  							Mot de passe oublié ?
						</button>
						<!-- <a href="" id="mdpoublie" class="btn btn-link">Mot de passe oublié ?</a> -->	
					</div>
				</div>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-sm-offset-3">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Connexion">
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>

</div>


<?php

require_once('footer.php');
}
?>