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
		var nom = $("#formCreate input[name='nom']")[0].value;
		var prenom= $("#forCreate input[name='prenom']")[0].value;
		var email = $("#formCreate input[name='email']")[0].value;	
		var permission  = $("#formCreate select[name='']")[0].value;
		if(nom.trim() != '') {
			$.ajax({
				url: "includes/AjaxPhpfunctions/funcCreateUser.php",
				method: 'POST',
				data : {
						nom : nom,
						prenom : prenom,
						email : email,
						permission : permission,
						id_user : id_user
						
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
		}
	});
});



$(document).ready(function () {
	$('#modifier').click(function(){
		var nom = $("#formGestion input[name='title']")[0].value;
		var prenom= $('#forGestion textarea')[0].value;



		if(titre.trim() != '') {
			$.ajax({
				url: "funcModUser.php",
				method: 'POST',
				data : data,
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
		}		
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
