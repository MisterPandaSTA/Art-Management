$(document).ready(function () {
	$('#mdpoublie').on('click', function(){
		alert("Veuillez contacter votre administrateur pour qu'il réinitialise votre mot de passe.");
	});
});

function RedirectLogin(){
        document.location.href="http://localhost/git/art_management/admin/index.php";
      }
