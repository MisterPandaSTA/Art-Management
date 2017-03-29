/*------------------------ 
    partout
-------------------------*/

function RedirectLogin(){
        document.location.href="http://localhost/git/art_management/admin/index.php";
      }

/*------------------------
	sidebar.php (partout)
--------------------------*/


$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        $("#sidebar-wrapper").toggleClass("active");
        $(".page_content").toggleClass("active");
});

/*------------------------ 
    index.php (login)
-------------------------*/      



/*$(document).ready(function () {
	$('#mdpoublie').click(function(){s
		alert("Veuillez contacter votre administrateur pour qu'il réinitialise votre mot de passe.");
	});
});*/

$(document).ready(function () {
  $('#mdpoublie').popover('');
});

/*------------------------ 
    Dashboard.php (firtlogin)
-------------------------*/

function RedirectFirstLogin(){
        document.location.href="http://localhost/git/art_management/admin/user.php";
      }

/*------------------------ 
  user.php (modif user)
-------------------------*/

/*test*/

/*$(document).ready(function () {
	$('#btn-modal').click(function(){
		$('#mymodal').modal('toggle');
	});
});*/


/*------------------------ 
  gestion_user.php (gestion Admin)
-------------------------*/
$(document).ready(function () {
	$('#create').click(function(){
		var nom = $("#formCreate input[name='nom']").val();
		console.log(nom);
		var prenom = $("#formCreate input[name='prenom']").val();
		console.log(prenom);
		var email = $("#formCreate input[name='email']").val();
		console.log(email);	
		var permission = $("#formCreate select[name='permission']").val();
		console.log(permission);
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcCreateUser.php",
				method: 'POST',
				data : {
						nom : nom,
						prenom : prenom,
						email : email,
						permission : permission,
						
					},
				success : function (response) {
					console.log(response);
					if(response == 'error' ) {
						// le code PHP retourne 'error', c'est-à-dire que la requête SQL ne s'est pas exécuté correctement 
						alert('Désolé, une erreur est survenue lors de l\'enregistrement du cycle en base de données');
						ajaxResponse = false;
					}
					else if (response == 'ok') {
						// si on reçoit ok, nous étions alors en mode 'done' et tout s'est bien déroulé 
						console.log('Cycle achevé et mis à jours');
						ajaxResponse = true;
					}
					else {
						// Dans le dernier cas, nous devons recevons l'id du cycle nouvellement créé. Nous l'attrinuons à la variable actualCycleId sous forme d'entier
						/*actualCycleId = parseInt(response);
						ajaxResponse = parseInt(response);*/

						ajaxResponse = parseInt(response,10);
					}
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
				}
			});	
		
	});
});



$(document).ready(function () {
	$('.modifier').click(function(){
		$(".action").val('modifier');
		var id_user = $(this).parent().parent().attr('id').substr(1);
		console.log(id_user);
		var nom = $('#n'+id_user+' input[name="nom"]').val();
		console.log(nom);
		var prenom = $('#n'+id_user+' input[name="prenom"]').val();
		console.log(prenom);
		var email = $('#n'+id_user+' input[name="email"]').val();
		console.log(email);	
		var permission = $('#n'+id_user+' select[name="permission"]').val();
		console.log(permission);
		var action = $('#n'+id_user+' input[name="action"]').val();
		console.log(action);		
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcModUser.php",
				method: 'POST',
				data : {
						nom : nom,
						prenom : prenom,
						email : email,
						permission : permission,
						id_user : id_user,
						action : action
					},
				success : function (response) {
					console.log(response);
					if(response == 'error' ) {
						// le code PHP retourne 'error', c'est-à-dire que la requête SQL ne s'est pas exécuté correctement 
						alert('Désolé, une erreur est survenue lors de l\'enregistrement du cycle en base de données');
						ajaxResponse = false;
					}
					else if (response == 'ok') {
						// si on reçoit ok, nous étions alors en mode 'done' et tout s'est bien déroulé 
						console.log('Cycle achevé et mis à jours');
						ajaxResponse = true;
					}
					else {
						// Dans le dernier cas, nous devons recevons l'id du cycle nouvellement créé. Nous l'attrinuons à la variable actualCycleId sous forme d'entier
						/*actualCycleId = parseInt(response);
						ajaxResponse = parseInt(response);*/

						ajaxResponse = parseInt(response,10);
					}
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
				}
			});		
	});
});

$(document).ready(function () {
	$(".reset").click(function (){
		$(".action").val('reset');
		var id_user = $(this).parent().parent().attr('id').substr(1);
		var action = $('#n'+id_user+' input[name="action"]').val();
		var email = $('#n'+id_user+' input[name="email"]').val();
		$(".nom_compte").html(email);
		console.log(id_user);
		console.log(email);
		console.log(action);
		$('#requeteAjaxReset').click(function (){
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcModUser.php",
				method: 'POST',
				data: {
						id_user : id_user,
						action : action
				},
				success : function (response) {
						console.log(response);
						if(response == 'error' ) {
							// le code PHP retourne 'error', c'est-à-dire que la requête SQL ne s'est pas exécuté correctement 
							alert('Désolé, une erreur est survenue lors de l\'enregistrement du cycle en base de données');
							ajaxResponse = false;
						}
						else if (response == 'ok') {
							// si on reçoit ok, nous étions alors en mode 'done' et tout s'est bien déroulé 
							console.log('Cycle achevé et mis à jours');
							ajaxResponse = true;
						}
						else {
							// Dans le dernier cas, nous devons recevons l'id du cycle nouvellement créé. Nous l'attrinuons à la variable actualCycleId sous forme d'entier
							/*actualCycleId = parseInt(response);
							ajaxResponse = parseInt(response);*/

							ajaxResponse = parseInt(response,10);
						}
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
				} 
			});
		});	
	});
});

$(document).ready(function () {
	$(".delete").click(function (){
		$(".action").val('delete');
		var id_user = $(this).parent().parent().attr('id').substr(1);
		var action = $('#n'+id_user+' input[name="action"]').val();
		var email = $('#n'+id_user+' input[name="email"]').val();
		$(".nom_compte").html(email);
		console.log(id_user);
		console.log(email);
		console.log(action);
		$('#requeteAjaxDelete').click(function (){
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcModUser.php",
				method: 'POST',
				data: {
						id_user : id_user,
						action : action
				},
				success : function (response) {
						console.log(response);
						if(response == 'error' ) {
							// le code PHP retourne 'error', c'est-à-dire que la requête SQL ne s'est pas exécuté correctement 
							alert('Désolé, une erreur est survenue lors de l\'enregistrement du cycle en base de données');
							ajaxResponse = false;
						}
						else if (response == 'ok') {
							// si on reçoit ok, nous étions alors en mode 'done' et tout s'est bien déroulé 
							console.log('Cycle achevé et mis à jours');
							ajaxResponse = true;
						}
						else {
							// Dans le dernier cas, nous devons recevons l'id du cycle nouvellement créé. Nous l'attrinuons à la variable actualCycleId sous forme d'entier
							/*actualCycleId = parseInt(response);
							ajaxResponse = parseInt(response);*/

							ajaxResponse = parseInt(response,10);
						}
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
					$('.reset-complet')
					$(document).click(function (){
						document.location.href="http://localhost/git/art_management/admin/gestion_user.php";
					});	
				}		
			});
		
		});	
	});
});


/*------------------------ 
  oeuvre.php (gestion des oeuvres)
-------------------------*/


/*------------------------ 
  exposition.php (gestion des expos)
-------------------------*/


/*------------------------ 
  artistes.php (gestion des artistes)
-------------------------*/
$(document).ready(function () {
	$('#btn_artiste_create').click(function(){
		var nom = $("#formCreateArtiste input[name='nom']").val();
		console.log(nom);
		var prenom = $("#formCreateArtiste input[name='prenom']").val();
		console.log(prenom);
		var pseudo = $("#formCreateArtiste input[name='pseudo']").val();
		console.log(pseudo);
		var email = $("#formCreateArtiste input[name='email']").val();
		console.log(email);
		var telephone = $("#formCreateArtiste input[name='telephone']").val();
		console.log(telephone);	
		var adresse = $("#formCreateArtiste input[name='adresse']").val();
		console.log(adresse);
		var activitees = $("#formCreateArtiste input[name='activitees']").val();
		console.log(activitees);
		var description = $("#formCreateArtiste textarea[name='description']").val();
		console.log(description);
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcCreateArtiste.php",
				method: 'POST',
				data : {
						nom : nom,
						prenom : prenom,
						pseudo : pseudo,
						email : email,
						telephone : telephone,
						adresse : adresse,
						activitees : activitees,
						description : description
						
					},
				success : function (response) {
					console.log(response);
					if(response == 'error' ) {
						// le code PHP retourne 'error', c'est-à-dire que la requête SQL ne s'est pas exécuté correctement 
						alert('Désolé, une erreur est survenue lors de l\'enregistrement du cycle en base de données');
						ajaxResponse = false;
					}
					else if (response == 'ok') {
						// si on reçoit ok, nous étions alors en mode 'done' et tout s'est bien déroulé 
						console.log('Cycle achevé et mis à jours');
						ajaxResponse = true;
					}
					else {
						// Dans le dernier cas, nous devons recevons l'id du cycle nouvellement créé. Nous l'attrinuons à la variable actualCycleId sous forme d'entier
						/*actualCycleId = parseInt(response);
						ajaxResponse = parseInt(response);*/

						ajaxResponse = parseInt(response,10);
					}
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
				}
			});	
		
	});
});

$(document).ready(function () {
	$('.btn_affiche_modifier_artiste').click(function (){
		var id = $(this).parent().parent().attr('id').substr(1);

		var nom = $('#n'+id+' td').html();
		var prenom = $('#n'+id+' td').html();
		var pseudo = $('#n'+id+' td').html();
		var email = $('#n'+id+' input[name="email"]').val();
		var telephone = $('#n'+id+' input[name="telephone"]').val();
		var adresse = $('#n'+id+' input[name="adresse"]').val();
		var activitees = $('#n'+id+' input[name="activitees"]').val();
		var description = $('#n'+id+' textarea[name="description"]').val();
		

		$('#formCreateArtiste').toggle(false);
		$('#formModifArtiste').toggle(true);

		$("#formModifArtiste input[name='nom']").val(nom);
		$("#formModifArtiste input[name='prenom']").val(prenom);
		$("#formModifArtiste input[name='pseudo']").val(pseudo);
		$("#formModifArtiste input[name='email']").val(email);
		$("#formModifArtiste input[name='telephone']").val(telephone);
		$("#formModifArtiste input[name='adresse']").val(adresse);
		$("#formModifArtiste input[name='activitees']").val(activitees);
		$("#formModifArtiste textarea[name='description']").val(description);
		$("#formModifArtiste input[name='id_artiste']").val();
	}); 
});	


$(document).ready(function () {
	$('.btn_artiste_modif').click(function(){
	/*	$(".action").val('modifier');*/
		var nom = $("#formModifArtiste input[name='nom']").val();
		var prenom = $("#formModifArtiste input[name='prenom']").val();
		var pseudo = $("#formModifArtiste input[name='pseudo']").val();
		var email = $("#formModifArtiste input[name='email']").val();
		var telephone = $("#formModifArtiste input[name='telephone']").val();
		var adresse = $("#formModifArtiste input[name='adresse']").val();
		var activitees = $("#formModifArtiste input[name='activitees']").val();
		var description = $("#formModifArtiste textarea[name='description']").val();
		var action = $("#formModifArtiste input[name='action']").val();
		var id_artiste = $("#formModifArtiste input[name='id_artiste']").val();

		console.log(nom);
		
		console.log(prenom);
		
		console.log(pseudo);
		
		console.log(email);
		
		console.log(telephone);	
		
		console.log(adresse);
		
		console.log(activitees);
		
		console.log(description);	
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcModArtiste.php",
				method: 'POST',
				data : {
						nom : nom,
						prenom : prenom,
						pseudo : pseudo,
						email : email,
						telephone : telephone,
						adresse : adresse,
						activitees : activitees,
						description : description,
						action : action,
						id_artiste : id_artiste
						
					},
				success : function (response) {
					console.log(response);
					if(response == 'error' ) {
						// le code PHP retourne 'error', c'est-à-dire que la requête SQL ne s'est pas exécuté correctement 
						alert('Désolé, une erreur est survenue lors de l\'enregistrement du cycle en base de données');
						ajaxResponse = false;
					}
					else if (response == 'ok') {
						// si on reçoit ok, nous étions alors en mode 'done' et tout s'est bien déroulé 
						console.log('Cycle achevé et mis à jours');
						ajaxResponse = true;
					}
					else {
						// Dans le dernier cas, nous devons recevons l'id du cycle nouvellement créé. Nous l'attrinuons à la variable actualCycleId sous forme d'entier
						/*actualCycleId = parseInt(response);
						ajaxResponse = parseInt(response);*/

						ajaxResponse = parseInt(response,10);
					}
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
				}
			});		
	});
});


$(document).ready(function () {
	$(".artiste_delete").click(function (){
		$(".action").val('delete');
		var id_user = $(this).parent().parent().attr('id').substr(1);
		var action = $('#n'+id_user+' input[name="action"]').val();
		var email = $('#n'+id_user+' input[name="email"]').val();
		$(".nom_compte").html(email);
		console.log(id_user);
		console.log(email);
		console.log(action);
		$('#requeteAjaxDelete').click(function (){
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcModUser.php",
				method: 'POST',
				data: {
						id_user : id_user,
						action : action
				},
				success : function (response) {
						console.log(response);
						if(response == 'error' ) {
							// le code PHP retourne 'error', c'est-à-dire que la requête SQL ne s'est pas exécuté correctement 
							alert('Désolé, une erreur est survenue lors de l\'enregistrement du cycle en base de données');
							ajaxResponse = false;
						}
						else if (response == 'ok') {
							// si on reçoit ok, nous étions alors en mode 'done' et tout s'est bien déroulé 
							console.log('Cycle achevé et mis à jours');
							ajaxResponse = true;
						}
						else {
							// Dans le dernier cas, nous devons recevons l'id du cycle nouvellement créé. Nous l'attrinuons à la variable actualCycleId sous forme d'entier
							/*actualCycleId = parseInt(response);
							ajaxResponse = parseInt(response);*/

							ajaxResponse = parseInt(response,10);
						}
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
					$('.reset-complet')
					$(document).click(function (){
						document.location.href="http://localhost/git/art_management/admin/gestion_user.php";
					});	
				}		
			});
		
		});	
	});
});

/*------------------------ 
    .php ()
-------------------------*/
