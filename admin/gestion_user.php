<?php	

require_once('includes/classconfig.php');

if($_SESSION['id'] && $_SESSION['permission'] == 'admin' ){
	$texte = "Dashboard > Gestion Utilisateur";
	$desc = "Vous pouvez gérer les differents utilisateurs depuis cette page.";
	require_once('includes/dashhead.php');
	

	?>
	<section class="container page_content">
		<div class="row cadre">
			
				
	<?php

		$create = new User();
		$create->formCreate('');

	?>
		</div><div class="row cadre">
			<div class="panel panel-default">
	 		 <div class="panel-heading">Liste des utilisateurs</div>
		
			
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Email</th>
						<th>Permission</th>
						<th colspan="3">Action</th>
						
					</thead>

	<?php


		$modif = User::listGestion(0, 10);
		foreach($modif as $form) {
			$f = new User($form['id_utilisateur']);
			$f->formGestion('');
		}
	
	?></table></div></sections>

<button type= "button" id="btn-modal" data-toggle= "modal" data-target= ".reset-pass-modal" > Launch modal </button>

		<div class="modal fade reset-pass-modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Réinitialisation de mot de passe</h4>
		      </div>
		      <div class="modal-body">
		        <p>Voulez-vous vraiment réinitialiser le mot de passe de de cet utilisateur ?</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
		        <button type="button" class="btn btn-primary">Réinitialiser</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<?php


}
else {
	?>
	<body onLoad="setTimeout('RedirectLogin()', 5000)">
		<div onLoad="setTimeout('RedirectLogin()', 5000)">Vous n'avez pas accès au contenue de cette page, dans 5 secondes vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/index.php">la page de connexion</a></div>
	<?php

}

	require_once('footer.php');

?>
