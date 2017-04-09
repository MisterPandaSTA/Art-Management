/*------------------------ 
    partout
-------------------------*/

function RedirectLogin(){
        document.location.href="index.php";
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
        document.location.href="user.php";
      }

/*------------------------ 
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
  user.php (modif user)
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-------------------------*/

/*test*/

/*$(document).ready(function () {
	$('#btn-modal').click(function(){
		$('#mymodal').modal('toggle');
	});
});*/


/*------------------------ 
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
  gestion_user.php (gestion Admin)
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
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



/*---------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
  oeuvre.php (gestion des oeuvres)
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------*/



$(document).ready(function () {
	$('#btn_oeuvre_create').click(function(e){
		e.preventDefault(e);
		var nom = $("#formCreateOeuvre input[name='nom']").val();
		console.log(nom);
		var id_artiste = $("#formCreateOeuvre select[name='id_artiste']").val();
		console.log(id_artiste);
		var date_creation = $("#formCreateOeuvre input[name='date_creation']").val();
		console.log(date_creation);
		var img_name = $("#formCreateOeuvre input[name='photo']").val();
		console.log(img_name);
		var type_oeuvre = $("#formCreateOeuvre input[name='type_oeuvre']").val();
		console.log(type_oeuvre);
		var dimensions = $("#formCreateOeuvre input[name='dimensions']").val();
		console.log(dimensions);	
		var poids = $("#formCreateOeuvre input[name='poids']").val();
		console.log(poids);
		var livraison = $("#formCreateOeuvre select[name='livraison']").val();
		console.log(livraison);
		var description_oeuvre = $("#formCreateOeuvre textarea[name='description_oeuvre']").val();
		console.log(description_oeuvre);
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcCreateOeuvre.php",
				method: 'POST',
				data : {
						nom : nom,
						id_artiste : id_artiste,
						date_creation : date_creation,
						img_name : img_name,
						type_oeuvre : type_oeuvre,
						dimensions : dimensions,
						poids : poids,
						livraison : livraison,
						description_oeuvre : description_oeuvre
						
					},
				success : function (response) {
					console.log(response);
				},
				error: function () {
					console.log('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
					document.location.href="oeuvre.php";
				}
			});	
		
	});
});

$(document).ready(function () {
	$('.btn_affiche_modifier_oeuvre').click(function (){

		var id_oeuvre = $(this).parent().parent().attr('id').substr(1);

		var nom_oeuvre = $('#n'+id_oeuvre+' .td_nom').html();
		var nom_artiste = $('#n'+id_oeuvre+' input[name="id_artiste"]').val();
		var livraison = $('#n'+id_oeuvre+' input[name="livraison"]').val();
		var description_oeuvre = $('#n'+id_oeuvre+' textarea[name="description_oeuvre"]').val();
		var img_name = $('#n'+id_oeuvre+' input[name="photo"]').val();
		var dimensions = $('#n'+id_oeuvre+' input[name="dimensions"]').val();
		var poids = $('#n'+id_oeuvre+' input[name="poids"]').val();
		var type_oeuvre = $('#n'+id_oeuvre+' input[name="type_oeuvre"]').val();
		var date_creation = $('#n'+id_oeuvre+' input[name="date_creation"]').val();
		
		$('.nom_oeuvre').html(nom_oeuvre);

		$('#formCreateOeuvre').toggle(false);
		$('#formTradOeuvre').toggle(false);
		$('#formModifOeuvre').toggle(true);
		$('#qrcode_photo').toggle(true);

		$("#formModifOeuvre input[name='id_oeuvre']").val(id_oeuvre);
		$("#formModifOeuvre input[name='nom']").val(nom_oeuvre);
		$("#formModifOeuvre select[name='id_artiste'] option[value="+nom_artiste+"]").prop('selected', true);
		$("#formModifOeuvre select[name='livraison'] option[value="+livraison+"]").prop('selected', true);
		$("#formCreateOeuvre input[name='photo']").val(img_name);
		$("#formModifOeuvre input[name='dimensions']").val(dimensions);
		$("#formModifOeuvre input[name='poids']").val(poids);
		$("#formModifOeuvre input[name='type_oeuvre']").val(type_oeuvre);
		$("#formModifOeuvre textarea[name='description_oeuvre']").val(description_oeuvre);
		$("#formModifOeuvre input[name='date_creation']").val(date_creation);

		var img = $('<a href="images/qrcode/QRcode'+id_oeuvre+'.svg" download><img id="img_qrcode" src="images/qrcode/QRcode'+id_oeuvre+'.svg" /></a>'); //Equivalent: $(document.createElement('img'))
		$( "#imagediv a" ).replaceWith(img);

	}); 
});	

$(document).ready(function () {
	$('.btn_annuler_oeuvre').click(function () {
		$('#formModifOeuvre').toggle(false);
		$('#qrcode_photo').toggle(false);
		$('#formTradOeuvre').toggle(false);
		$('#formCreateOeuvre').toggle(true);
	});
});

$(document).ready(function () {
	$('#btn_oeuvre_modif').click(function(e){
		e.preventDefault();
		var nom = $("#formModifOeuvre input[name='nom']").val();
		console.log(nom);
		var id_artiste = $("#formModifOeuvre select[name='id_artiste']").val();
		console.log(id_artiste);
		var id_oeuvre = $("#formModifOeuvre input[name='id_oeuvre']").val();
		console.log(id_oeuvre);
		var date_creation = $("#formModifOeuvre input[name='date_creation']").val();
		console.log(date_creation);
		var type_oeuvre = $("#formModifOeuvre input[name='type_oeuvre']").val();
		console.log(type_oeuvre);
		var img_name = $("#formCreateOeuvre input[name='photo']").val();
		console.log(img_name);
		var dimensions = $("#formModifOeuvre input[name='dimensions']").val();
		console.log(dimensions);
		var poids = $("#formModifOeuvre input[name='poids']").val();
		console.log(poids);
		var livraison = $("#formModifOeuvre select[name='livraison']").val();
		console.log(livraison);
		var description_oeuvre = $("#formModifOeuvre textarea[name='description_oeuvre']").val();
		console.log(description_oeuvre);
		$(".action").val('modifier');
		var action = $("#formModifOeuvre input[name='action']").val();
		console.log(action);
	
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcModOeuvre.php",
				method: 'POST',
				data : {
						nom : nom,
						id_artiste : id_artiste,
						date_creation : date_creation,
						type_oeuvre : type_oeuvre,
						img_name : img_name,
						dimensions : dimensions,
						poids : poids,
						livraison : livraison,
						description_oeuvre : description_oeuvre,
						id_oeuvre : id_oeuvre,
						action : action
						
					},
				success : function (response) {
					console.log(response);
				},
				error: function () {
					console.log('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
					
					
					document.location.href="oeuvre.php";
					
				}
			});		
	});
});


$(document).ready(function () {
	$(".btn_oeuvre_delete").click(function (){
		$(".action").val('delete');
		var action = $('#formModifOeuvre input[name="action"]').val();
		var id_artiste = $('#formModifOeuvre input[name="id_oeuvre"]').val();
		var nom = $("#formModifOeuvre input[name='nom']").val();
		$(".nom_artiste").html(nom);
		console.log(action);
		$('#requeteAjaxDelete').click(function (){
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcModOeuvre.php",
				method: 'POST',
				data: {
						id_oeuvre : id_oeuvre,
						action : action
				},
				success : function (response) {
						console.log(response);
				},
				error: function () {
					console.log('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
					$('.reset-complet')
					$(document).click(function (){
						document.location.href="oeuvre.php";
					});	
				}		
			});
		
		});	
	});
});

/*$(document).ready(function () {
	$('.btn_affiche_trad_artiste').click(function (){
		var id = $(this).parent().parent().attr('id').substr(1);

		var nom = $('#n'+id+' .td_nom').html();
		var description_anglais = $('#n'+id+' textarea[name="description_anglais"]').val();
		var description_allemand = $('#n'+id+' textarea[name="description_allemand"]').val();
		var description_russe = $('#n'+id+' textarea[name="description_russe"]').val();
		var description_chinois = $('#n'+id+' textarea[name="description_chinois"]').val();
		var activitees_anglais = $('#n'+id+' input[name="activitees_anglais"]').val();
		var activitees_allemand = $('#n'+id+' input[name="activitees_allemand"]').val();
		var activitees_russe = $('#n'+id+' input[name="activitees_russe"]').val();
		var activitees_chinois = $('#n'+id+' input[name="activitees_chinois"]').val();
		
		$('.nom_artiste').html(nom);
		
		$('#formCreateArtiste').toggle(false);
		$('#formModifArtiste').toggle(false);
		$('#formTradArtiste').toggle(true);
		
		
		$("#formTradArtiste textarea[name='description_anglais']").val(description_anglais);
		$("#formTradArtiste textarea[name='description_allemand']").val(description_allemand);
		$("#formTradArtiste textarea[name='description_russe']").val(description_russe);
		$("#formTradArtiste textarea[name='description_chinois']").val(description_chinois);
		$("#formTradArtiste input[name='activitees_anglais']").val(activitees_anglais);
		$("#formTradArtiste input[name='activitees_allemand']").val(activitees_allemand);
		$("#formTradArtiste input[name='activitees_russe']").val(activitees_russe);
		$("#formTradArtiste input[name='activitees_chinois']").val(activitees_chinois);
		$("#formTradArtiste input[name='id_artiste']").val(id);
	});
});

$(document).ready(function () {
	$('#btn_modif_trad_artiste').click(function(){
		
		var id_artiste = $("#formTradArtiste input[name='id_artiste']").val();
		var description_anglais = $("#formTradArtiste textarea[name='description_anglais']").val();
		var description_allemand = $("#formTradArtiste textarea[name='description_allemand']").val();
		var description_russe = $("#formTradArtiste textarea[name='description_russe']").val();
		var description_chinois = $("#formTradArtiste textarea[name='description_chinois']").val();
		var activitees_anglais = $("#formTradArtiste input[name='activitees_anglais']").val();
		var activitees_allemand = $("#formTradArtiste input[name='activitees_allemand']").val();
		var activitees_russe = $("#formTradArtiste input[name='activitees_russe']").val();
		var activitees_chinois = $("#formTradArtiste input[name='activitees_chinois']").val();
		$(".action").val('traduction');
		var action = $('#formTradArtiste input[name="action"]').val();
		$.ajax({
				url: "includes/AjaxPhpfunctions/funcModArtiste.php",
				method: 'POST',
				data: {
						id_artiste : id_artiste,
						action : action,
						description_anglais : description_anglais,
						description_allemand : description_allemand,
						description_russe : description_russe,
						description_chinois : description_chinois,
						activitees_anglais : activitees_anglais,
						activitees_allemand : activitees_allemand,
						activitees_russe : activitees_russe,
						activitees_chinois: activitees_chinois
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
/*
							ajaxResponse = parseInt(response,10);
						}
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
					
						document.location.href="http://localhost/git/art_management/admin/artiste.php";
					
				}		
		});
	});
});*/

$(document).ready(function () {
	$(".btn_oeuvre_qrcode").click(function (){
		$(".action").val('qrcode');
		var action = $('#formModifOeuvre input[name="action"]').val();
		var id_oeuvre = $('#formModifOeuvre input[name="id_oeuvre"]').val();
		console.log(action);
		console.log(id_oeuvre);
		
		
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcModOeuvre.php",
				method: 'POST',
				data: {
						id_oeuvre : id_oeuvre,
						action : action,
				},
				success : function (response) {
						console.log(response);
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
					
					var img = $('<a href="images/qrcode/QRcode'+id_oeuvre+'.svg" download><img id="img_qrcode" src="images/qrcode/QRcode'+id_oeuvre+'.svg" /></a>'); //Equivalent: $(document.createElement('img'))
					$( "#imagediv a" ).replaceWith(img);	
				}		
			});	
	});
});


/*------------------------ 
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
  exposition.php (gestion des expos)
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-------------------------*/


/*------------------------ 
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
  artistes.php (gestion des artistes)
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-------------------------*/
/*$(document).ready(function () {
	$('#btn_artiste_create').click(function(){
		var nom_artiste = $("#formCreateArtiste input[name='nom_artiste']").val();
		console.log(nom_artiste);
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
		var img_name = $("#formCreateArtiste input[name='photo']").val();
		console.log(img_name);
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcCreateArtiste.php",
				method: 'POST',
				data : {
						nom_artiste : nom_artiste,
						prenom : prenom,
						pseudo : pseudo,
						email : email,
						telephone : telephone,
						adresse : adresse,
						activitees : activitees,
						description : description,
						img_name : img_name
						
					},
				success : function (response) {
					console.log(response);
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
				}
			});	
		
	});
});*/

$(document).ready(function () {
	$('#btn_artiste_create').click(function(e){
		e.preventDefault();
		var form = $('#formCreateArtiste').get(0);
		var formData = new FormData(form);// get the form data
		// on envoi formData vers mail.php
		$.ajax({
			type		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url		: 'includes/AjaxPhpfunctions/funcCreateArtiste.php', // the url where we want to POST
			data		: formData, // our data object
			dataType	: 'json', // what type of data do we expect back from the server
			processData: false,
			contentType: false,
			success : function (response) {
				console.log(response);
			},
			error: function () {
				console.log('Désolé, une erreur est survenue lors de de la requête ajax');
			},
			complete : function () {
				console.log('Requête Ajax exécutée');

				document.location.href="artiste.php";
			}

		});
	});
});

$(document).ready(function () {
	$('.btn_affiche_modifier_artiste').click(function (){
		var id = $(this).parent().parent().attr('id').substr(1);

		var nom_artiste = $('#n'+id+' .td_nom').html();
		var prenom = $('#n'+id+' .td_prenom').html();
		var pseudo = $('#n'+id+' .td_pseudo').html();
		var email = $('#n'+id+' input[name="email"]').val();
		var telephone = $('#n'+id+' input[name="telephone"]').val();
		var adresse = $('#n'+id+' input[name="adresse"]').val();
		var activitees = $('#n'+id+' input[name="activitees"]').val();
		var description = $('#n'+id+' textarea[name="description"]').val();
		var img_name = $('#n'+id+' input[name="photo"]').val();

		console.log(img_name);

		$('.nom_artiste').html(nom_artiste);
		var img = $('<img id="photo" src="images/artiste/'+img_name+'" />'); //Equivalent: $(document.createElement('img'))
		$("#img_actuel #photo").replaceWith(img);

		$('#formCreateArtiste').toggle(false);
		$('#formTradArtiste').toggle(false);
		$('#formModifArtiste').toggle(true);

		$("#formModifArtiste input[name='nom_artiste']").val(nom_artiste);
		$("#formModifArtiste input[name='prenom']").val(prenom);
		$("#formModifArtiste input[name='pseudo']").val(pseudo);
		$("#formModifArtiste input[name='email']").val(email);
		$("#formModifArtiste input[name='telephone']").val(telephone);
		$("#formModifArtiste input[name='adresse']").val(adresse);
		$("#formModifArtiste input[name='activitees']").val(activitees);
		$("#formModifArtiste textarea[name='description']").val(description);
		$("#formModifArtiste input[name='id_artiste']").val(id);
		$("#formCreateArtiste input[name='photo']").val(photo);

		

	}); 
});	

$(document).ready(function () {
	$('.btn_annuler_artiste').click(function () {
		$('#formModifArtiste').toggle(false);
		$('#formTradArtiste').toggle(false);
		$('#formCreateArtiste').toggle(true);
	});
});



$(document).ready(function () {
	$('#btn_artiste_modif').click(function(e){
		e.preventDefault();
		$(".action").val('modifier');
		var form = $('#formModifArtiste').get(0);
		var formData = new FormData(form);// get the form data
		// on envoi formData vers mail.php
		$.ajax({
			type		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url		: 'includes/AjaxPhpfunctions/funcModArtiste.php', // the url where we want to POST
			data		: formData, // our data object
			dataType	: 'json', // what type of data do we expect back from the server
			processData: false,
			contentType: false,
			success : function (response) {
				console.log(response);
			},
			error: function () {
				console.log('Désolé, une erreur est survenue lors de de la requête ajax');
			},
			complete : function () {
				console.log('Requête Ajax exécutée');

				document.location.href="artiste.php";
			}

		});
	});
});


$(document).ready(function () {
	$(".btn_artiste_delete").click(function (){
		$(".action").val('delete');
		var action = $('#formModifArtiste input[name="action"]').val();
		var id_artiste = $('#formModifArtiste input[name="id_artiste"]').val();
		var nom_artiste = $("#formModifArtiste input[name='nom_artiste']").val();
		$(".nom_artiste").html(nom);
		console.log(action);
		$('#requeteAjaxDelete').click(function (){
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcModArtiste.php",
				method: 'POST',
				data: {
						id_artiste : id_artiste,
						action : action
				},
				success : function (response) {
						console.log(response);
						
				},
				error: function () {
					alert('Désolé, une erreur est survenue lors de de la requête ajax');
				},
				complete : function () {
					console.log('Requête Ajax exécutée');
					$('.reset-complet')
					$(document).click(function (){
						document.location.href="artiste.php";
					});	
				}		
			});
		
		});	
	});
});

$(document).ready(function () {
	$('.btn_affiche_trad_artiste').click(function (){
		var id = $(this).parent().parent().attr('id').substr(1);

		var nom_artiste = $('#n'+id+' .td_nom').html();
		var description_anglais = $('#n'+id+' textarea[name="description_anglais"]').val();
		var description_allemand = $('#n'+id+' textarea[name="description_allemand"]').val();
		var description_russe = $('#n'+id+' textarea[name="description_russe"]').val();
		var description_chinois = $('#n'+id+' textarea[name="description_chinois"]').val();
		var activitees_anglais = $('#n'+id+' input[name="activitees_anglais"]').val();
		var activitees_allemand = $('#n'+id+' input[name="activitees_allemand"]').val();
		var activitees_russe = $('#n'+id+' input[name="activitees_russe"]').val();
		var activitees_chinois = $('#n'+id+' input[name="activitees_chinois"]').val();
		
		$('.nom_artiste').html(nom_artiste);
		
		$('#formCreateArtiste').toggle(false);
		$('#formModifArtiste').toggle(false);
		$('#formTradArtiste').toggle(true);
		
		
		$("#formTradArtiste textarea[name='description_anglais']").val(description_anglais);
		$("#formTradArtiste textarea[name='description_allemand']").val(description_allemand);
		$("#formTradArtiste textarea[name='description_russe']").val(description_russe);
		$("#formTradArtiste textarea[name='description_chinois']").val(description_chinois);
		$("#formTradArtiste input[name='activitees_anglais']").val(activitees_anglais);
		$("#formTradArtiste input[name='activitees_allemand']").val(activitees_allemand);
		$("#formTradArtiste input[name='activitees_russe']").val(activitees_russe);
		$("#formTradArtiste input[name='activitees_chinois']").val(activitees_chinois);
		$("#formTradArtiste input[name='id_artiste']").val(id);
	});
});

$(document).ready(function () {
	$('#btn_modif_trad_artiste').click(function(){
		
		var id_artiste = $("#formTradArtiste input[name='id_artiste']").val();
		var description_anglais = $("#formTradArtiste textarea[name='description_anglais']").val();
		var description_allemand = $("#formTradArtiste textarea[name='description_allemand']").val();
		var description_russe = $("#formTradArtiste textarea[name='description_russe']").val();
		var description_chinois = $("#formTradArtiste textarea[name='description_chinois']").val();
		var activitees_anglais = $("#formTradArtiste input[name='activitees_anglais']").val();
		var activitees_allemand = $("#formTradArtiste input[name='activitees_allemand']").val();
		var activitees_russe = $("#formTradArtiste input[name='activitees_russe']").val();
		var activitees_chinois = $("#formTradArtiste input[name='activitees_chinois']").val();
		$(".action").val('traduction');
		var action = $('#formTradArtiste input[name="action"]').val();
		$.ajax({
				url: "includes/AjaxPhpfunctions/funcModArtiste.php",
				method: 'POST',
				data: {
						id_artiste : id_artiste,
						action : action,
						description_anglais : description_anglais,
						description_allemand : description_allemand,
						description_russe : description_russe,
						description_chinois : description_chinois,
						activitees_anglais : activitees_anglais,
						activitees_allemand : activitees_allemand,
						activitees_russe : activitees_russe,
						activitees_chinois: activitees_chinois
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
					
						document.location.href="http://localhost/git/art_management/admin/artiste.php";
					
				}		
		});
	});
});

/*------------------------ 
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
    .php ()
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------
-------------------------*/
