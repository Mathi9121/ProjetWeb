<?php
	$bdd = new connexion();
	$sel = "SELECT * FROM _meta_form WHERE id = :id";
	$rep = $bdd->prepareQuery($sel, array(":id", $_GET['id']));
?>