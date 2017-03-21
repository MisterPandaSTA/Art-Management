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
});

/*------------------------ 
    index.php (login)
-------------------------*/      



$(document).ready(function () {
	$('#mdpoublie').click(function(){
		alert("Veuillez contacter votre administrateur pour qu'il réinitialise votre mot de passe.");
	});
});


/*------------------------ 
  user.php (modif user)
-------------------------*/


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
		console.log(action);
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

$(document).ready(function () {
	$(".delete").click(function (){
		$(".action").val('delete');
		var id_user = $(this).parent().parent().attr('id').substr(1);
		var action = $('#n'+id_user+' input[name="action"]').val();
		console.log(action);
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


/*------------------------ 
  oeuvre.php (gestion des oeuvres)
-------------------------*/


/*------------------------ 
  exposition.php (gestion des expos)
-------------------------*/


/*------------------------ 
  artistes.php (gestion des artistes)
-------------------------*/


/*------------------------ 
    .php ()
-------------------------*/
