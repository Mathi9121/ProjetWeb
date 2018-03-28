<?php
if(isset($_GET["id"])){
	$select = "SELECT * FROM Annonce Where id = ".$_GET["id"].";";
	$bdd = new connexion();
	$rep = $bdd->query($select);
	echo "
	<form method='post' action='form_ann_main.php'>
		<label>Titre : </label><input type='text' name='titre' value='".$rep[0]->titre."'/><br>
		<label>Descriptif :</label><input type='text' name='desc' value='".$rep[0]->descriptif."'/><br>
		<label>Prix : </label><input type='text' name='prix' value='".$rep[0]->prix."'/><br>
		<label>Ville : </label><input type='text' name='ville' value='".$rep[0]->ville."'/><br>
		
		<input type='hidden' name='idAnnonce' value='".$rep[0]->id."'/>
		";
		if(isset($_SESSION["id"])){
			if($_SESSION["id"] == $rep[0]->id_utilisateur){
				echo "<input type='submit' name='update' value='Mettre à jour'/>";
				echo "<input type='submit' name='delete' value='Supprimer' />";
			}
			echo "<input type='submit' name='signaler' value='Signaler' />";
		}
		echo "<input type='submit' name='partager' value='Partager'/>";
		echo "<input type='submit' name='acheter' value='Acheter'/>";
	echo "</form>";
}
else{
	if(isset($_SESSION["id"])){
?>
		<form method="post" action="form_ann_main.php">
			<label>Titre : </label><input type="text" name="titre" required/><br>
			<label>Descriptif</label><input type="text" name="desc"/><br>
			<label>Prix : </label><input type="text" name="prix" required/><br>
			<label>Ville : </label><input type="text" name="ville" required/><br>
			<label>Reference : </label>
			<select name="lstRef">
				<?php
				$sel = "SELECT * FROM Reference;";
				$bdd = new connexion();
				$rep = $bdd->query($sel);
				for($i=0;$i<sizeof($rep);$i++){
					echo "<option value='".$rep[$i]->id."'>".$rep[$i]->titre."</option>";
				}
				?>
			</select><br>
			<input type="submit" name="record" value="Enregistrer"/>
		</form>
	<?php
	}
	else{
		header("Location:form_auth_main.php");
	}
}
?>
