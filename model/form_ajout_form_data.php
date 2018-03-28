<?php
if(isset($_GET['id'])){
	$sele = "Select * FROM _META_Form WHERE id = ".$_GET['id'];
	$bdd = new connexion();
	$rep = $bdd->query($sele);
	
	if(isset($_POST['Supprimer'])){
		$ins = "DELETE FROM _META_Form WHERE id = :id;";
		$rep1 = $bdd->prepare($ins, array(":id" => $_GET['id']));
		if($rep1 == true){header('Location: list_form_main.php');}
	}else if(isset($_POST['Enregistrer'])){
		$ins = "Update _META_Form SET libelle = :libelle, methode= :methode, action=:action WHERE id = :id;";
		$rep1 = $bdd->prepare($ins, array(":libelle" => $_POST['title'],
										 ":methode" => $_POST['method'],
										 ":action" => $_POST['action'],
										 ":id" => $_GET['id'])	);
		if($rep1 == true){header('Location: list_form_main.php');}
	}
}else if(isset($_POST['Ajouter'])){
	$ins = "INSERT INTO _META_Form (libelle, methode , action ) VALUES (:libelle, :methode, :action);";
	$rep = $bdd->prepare($ins, array(":libelle" => $_POST['title'],
									 ":methode" => $_POST['method'], 
									 ":action" => $_POST['action']));
}else if (empty($_GET['id'])){

}
?>
