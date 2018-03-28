<?php
if(isset($_GET["idMenu"])){
	$select = "SELECT * FROM _META_MENU WHERE id = ".$_GET["idMenu"].";";
	$bdd = new connexion();
	$rep = $bdd->query($select);
	echo "
		<html>
		<form method='post' action='form_menu_main.php'>
		<label>Titre</label>
		<input type='text' id='titreMenu' name='titreMenu' required  value='".$rep[0]->libelle."'/>
		<label>Chemin</label>
		<input type='text' id='cheminMenu' name='cheminMenu' required  value='".$rep[0]->chemin."'/>
		<input type='hidden' id='id' name='id'  value='".$rep[0]->id."'/>
		<select name = 'nomParent'>
			<option></option>";
			foreach($rep as $key=>$value){
				echo "<option value='".$rep[$key]->id."'>".$rep[$key]->libelle."</option>";
			}
	echo "
		</select>
		<input type='submit' id='cmdModifier' name='cmdModifier' value='Modifier'/>
		<input type='submit' id='cmdSupprimer' name='cmdSupprimer' value='Supprimer'/>
		</form>
		</html>";
}else{
	?>
	<form method="post" action="form_menu_main.php">
		<label>Titre</label>
		<input type="text" id="titreMenu" name="titreMenu" required/>
		<label>Chemin</label>
		<input type="text" id="cheminMenu" name="cheminMenu" required/>
		<select name = "nomParent">
			<option></option>
			<?php foreach($rep as $key=>$value){
				echo "<option value='".$rep[$key]->id."'>".$rep[$key]->libelle."</option>";
			}
			?>
		</select>
		<input type="submit" id="cmdValider" name="cmdValider" value="Valider"/>
	</form>
	<?php
	
}
?>
