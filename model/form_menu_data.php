<?php
$bdd = new connexion();
$sel = "SELECT * FROM _meta_menu";
$rep = $bdd->query($sel);

if(isset($_POST["cmdValider"])){
	
	$menu = "INSERT INTO _META_MENU(libelle, chemin) VALUES('".$_POST["titreMenu"]."','".$_POST["cheminMenu"]."');";
	$bdd->uid($menu);
}
if(isset($_POST["cmdSupprimer"])){
	$menu = "DELETE FROM _META_MENU WHERE id = ".$_POST["id"].";";
	$bdd->uid($menu);
}
if(isset($_POST["cmdModifier"])){
	$menu = "UPDATE _META_MENU SET titre = '".$_POST["titreMenu"]."', chemin = '".$_POST["cheminMenu"]."' WHERE id = ".$_POST["id"].";";
	$bdd->uid($menu);
}

?>
