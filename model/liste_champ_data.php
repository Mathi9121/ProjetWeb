<?php
if(isset($_GET['id'])){
	$sele = "Select * FROM _META_Recherche WHERE id_F = ".$_GET['id'];
	$bdd = new connexion();
	$rep_input = $bdd->query($sele);
}
?>