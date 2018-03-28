<?php
if(isset($_POST["enregistrer"])){
	$sel = "SELECT * FROM Version WHERE libelle = :libelle;";
	$bdd = new connexion();
	$rep = $bdd->prepareQuery($sel, array(":libelle" => $_POST["titre"]));
	if(sizeof($rep)==0){
		$ins = "INSERT INTO Version(libelle) VALUES(:libelle);";
		$rep = $bdd->prepare($ins, array(":libelle" => $_POST["titre"]));
	}
	else{
		echo "Cette version existe déjà.";
	}
}
?>
