<?php
require_once('../classconfig.php');
require_once('../phpqrcode/qrlib.php');

if(isset($_POST['id_oeuvre'])) {

	$oeuvre = new Oeuvre($_POST['id_oeuvre']);
	
	if($_POST['action'] == 'modifier' ){

		$oeuvre->setIdArtiste($_POST['id_artiste']);
		$oeuvre->setNom($_POST['nom']);
		$oeuvre->setImgName($_POST['photo']);
		$oeuvre->setTypeOeuvre($_POST['type_oeuvre']);
		$oeuvre->setDimensions($_POST['dimensions']);
		$oeuvre->setPoids($_POST['poids']);
		$oeuvre->setDescriptionOeuvre($_POST['description_oeuvre']);
		$oeuvre->setDateCreation($_POST['date_creation']);
		$oeuvre->setLivraison($_POST['livraison']);
		
		$img_name = $_POST['nom'].'.jpg'; 
	
		$artiste->setImgName($img_name);
		move_uploaded_file($_FILES['photo']['tmp_name'],'../../images/oeuvre/'.$img_name);
		
		var_dump($oeuvre);
		$update=$oeuvre->syncDb();
		var_dump($update);
	}

	if($_POST['action'] == 'traduction') {

	}
	if($_POST['action'] == 'delete') {
		$delete = $oeuvre->deleteOeuvre($_POST['id_oeuvre']);
		var_dump($oeuvre);
	}	

}
if($_POST['action'] == 'qrcode') {



 	$tempDir = '../../images/qrcode/'; 
      
    $dataText   = 'http://10.22.0.219/rechercher.php?id_oeuvre='.$_POST['id_oeuvre'].' '; 
    
    $saveToFile = 'QRcode'.$_POST['id_oeuvre'].'.svg'; 
     
    // it is saved to file but also returned from function 

    $back_color = 0xFFFFFF;
	$fore_color = 0x000000;
	
	unlink($tempDir.$saveToFile);
	
	$svgCode = QRcode::svg($dataText , $tempDir.$saveToFile, 'h', 20, 1, false, $back_color, $fore_color);

	var_dump($_POST['id_oeuvre']);
	var_dump($svgCode);
	}