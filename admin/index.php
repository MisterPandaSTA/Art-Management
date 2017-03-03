<?php
/* --------------- */
/*    index.php    */
/* --------------- */

require_once('include/includes.php');

if(isset($_POST['email'])) /*si je reçois un $_POST['courriel'] par le formulaire, l'utilise la function login qui va tester les informations fournis par le formulaire*/ {
	$login = user::login($_POST['email'],$_POST['password']);

	if($login !== FALSE) /*si la fonction retourne autre chose que FALSE, alors une connection est établi*/{

		$_SESSION['id'] = $login['0'];
		$_SESSION['permission']= $login['1'];

	}
	else /* sinon ce message d'erreur s'affiche*/{
		$msg_soucis = "L'adresse et/ou le mot de passe ne correspondent pas à notre base de données";
	}
}
if(isset($_SESSION['id']))/*si j'ai un $_SESSION['id'] alors je revois l'utilisateur vers index.php*/ {
	header('Location:dashboard.php');
	
}
else {

require_once ('header.php');
?>

<div class="container">

<div class="row login">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    	<div class="col-xs-10 col-xs-offset-1 ">
    		<img src="images/test.svg" id="logo"></img>
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
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Votre mot de passe">
				</div>
				<div class="form-group">
                    <?php if(isset($msg_soucis)) { echo $msg_soucis; } ?>
				</div>
				<div class="row">
					<div class="button-checkbox col-xs-3 col-sm-3 col-xs-offset-6 col-sm-offset-8">
						<a href="" id="mdpoublie" class="btn btn-link">Mot de passe oublié ?</a>	
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