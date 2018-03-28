<?php
if(isset($_SESSION["id"])){
?>
<form method="post" action="form_version_main.php">
	<label>Titre : </label><input type="text" name="titre" required/><br>
	<label>Versions existantes:</label>
	<select name="lstVersion">
	<?php
		$sel = "SELECT * FROM Version;";
		$bdd = new connexion();
		$rep = $bdd->query($sel);
		for($i=0;$i<sizeof($rep);$i++){
			echo "<option value='".$rep[$i]->id."'>".$rep[$i]->libelle."</option>";
		}
	?>
	</select>
	<input type="submit" name="enregistrer" value="Enregistrer"/>
</form>
<?php
}
else{
	header("Location:form_auth_main.php");
}
?>

