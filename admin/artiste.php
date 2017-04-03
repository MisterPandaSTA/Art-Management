<?php	

require_once('includes/classconfig.php');

if($_SESSION['id']){
	if($_SESSION['permission'] == 'utilisateur' || $_SESSION['permission'] == 'admin') {
	$texte = "Dashboard > type";
	$desc = "Vous pouvez  ...  .";
	require_once('includes/dashhead.php');
	
	?>
	<section class="container-fluid page_content active">
		<div class="row cadre">
			<div class="panel panel-default">
				
	<?php

					$artiste= new artiste();
					$artiste->formArtiste('artiste.php');
	?>
				
			</div>
		</div>
		<div class="row cadre">
			<div class="panel panel-default">
	 			<div class="panel-heading">Liste des fiches artistes</div>
		
			
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Pseudo</th>
						<th>Email</th>
						<th>Téléphone</th>
						<th>Adresse</th>
						<th>Activitées</th>
						<th>Description</th>
						<th colspan="2">Action</th>
						
					</thead>

				<?php


					$modif = Artiste::listGestion(0, 10);
					foreach($modif as $form) {
						$f = new Artiste($form['id_artiste']);
						$f->afficheArtisteModif('');
					}
				
				?></table>
			</div>
		</div>	
	</sections>	

		<div class="modal fade delete-pass-modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Supprimer la fiche artiste ?</h4>
		      </div>
		      <div class="modal-body">
		        <p>Voulez-vous vraiment supprimer la fiche de l'artiste <span class="nom_artiste"></span> ?</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
		        <button type="button" class="btn btn-primary" id="requeteAjaxDelete" data-toggle= "modal" data-target= ".suppr-complet" data-dismiss="modal">Supprimer</button>
		      </div>
		 	</div><!-- /.modal-content -->	
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	

	<div class="modal fade suppr-complet" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Action effectué</h4>
		      </div>
		      <div class="modal-body">
		        <p>Vous venez de supprimer le compte <span class="nom_compte"></span> </p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal" id="reset_page">Fermer</button>
		      </div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<?php
	}
}
else {
	?>
	<body onLoad="setTimeout('RedirectLogin()', 5000)">
		<div onLoad="setTimeout('RedirectLogin()', 5000)">Vous n'avez pas accès au contenue de cette page, dans 5 secondes vous allez être redirigé vers <a href="http://localhost/git/art_management/admin/index.php">la page de connexion</a></div>
	<?php

}

	require_once('footer.php');

?>