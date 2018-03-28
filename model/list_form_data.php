<?php
$sel = "SELECT * FROM _META_Form";
$bdd=new connexion();
$rep = $bdd->query($sel);
var_dump($rep);
?>
