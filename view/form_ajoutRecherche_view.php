<?php
if(isset($_GET['id'])){
	echo '
	<form method="post" action="form_ajoutRecherche_main.php?id='.$_GET['id'].'">
		<label>Label</label><input type="text" name="txtLabel" value="'.$rep[0]->label.'"/><br>
		<label>Type</label><select name="lstType"> 
								<option value="text">Text</option>
								<option value="select">Select</option>
								<option value="checkbox">Checkbox</option>
								<option value="radiobox">Radiobox</option>
							</select><br>
		<label>Name</label><input type="text" name="txtName" value="'.$rep[0]->name.'"/><br>
		<label>Source data</label><input type="text" name="txtData" value="'.$rep[0]->source_data.'"/><br>
		<label>Source table</label><input type="text" name="txtTable" value="'.$rep[0]->source_table.'"/><br>
		<label>Donnees cible</label><input type="text" name="txtCible" value="'.$rep[0]->donnee_cible.'"/><br>
		<label>Operateur</label><input type="text" name="txtOp" value="'.$rep[0]->operateur.'"/><br>
		<label>Numéro du formulaire</label><select name="lstForm">';
										for($i=0;$i<sizeof($rep_all);$i++){
											echo "<option value='".$rep_all[$i]->id."' ";
											if(isset($_GET['form']) ){
												if($rep_all[$i]->id == $rep[0]->id){echo "required ";}
											}
											echo ">".$rep_all[$i]->libelle."</option>";
										}
							echo		'</select><br>
		<input type="submit" name="Enregistrer" value="Enregistrer"/>
	</form>';
}else if(isset($_GET['form'])){
	echo '
	<form method="post" action="form_ajoutRecherche_main.php?form='.$_GET['form'].'">
		<label>Label</label><input type="text" name="txtLabel"/><br>
		<label>Type</label><select name="lstType"> 
								<option value="text">Text</option>
								<option value="select">Select</option>
								<option value="checkbox">Checkbox</option>
								<option value="radiobox">Radiobox</option>
							</select><br>
		<label>Name</label><input type="text" name="txtName" /><br>
		<label>Source data</label><input type="text" name="txtData"/><br>
		<label>Source table</label><input type="text" name="txtTable"/><br>
		<label>Donnees cible</label><input type="text" name="txtCible"/><br>
		<label>Operateur</label><input type="text" name="txtOp" /><br>
		<label>Numéro du formulaire</label><select name="lstForm">
											<option value="'.$rep[0]->id.'">'.$rep[0]->libelle.'</option>";
										</select><br>
		<input type="submit" name="cmdAjouter" value="Ajouter"/>
	</form>';
}else{
	echo '<form method="post" action="form_ajoutRecherche_main.php?id='.$_GET['id'].'">';
	?>
		<label>Label</label><input type="text" name="txtLabel"/><br>
		<label>Type</label><select name="lstType"> 
								<option value="text">Text</option>
								<option value="select">Select</option>
								<option value="checkbox">Checkbox</option>
								<option value="radiobox">Radiobox</option>
							</select><br>
		<label>Name</label><input type="text" name="txtName"/><br>
		<label>Source data</label><input type="text" name="txtData"/><br>
		<label>Source table</label><input type="text" name="txtTable"/><br>
		<label>Donnees cible</label><input type="text" name="txtCible"/><br>
		<label>Operateur</label><input type="text" name="txtOp"/><br>
		<label>Numéro du formulaire</label><select name="lstForm">
											<?php
											for($i=0;$i<sizeof($rep_all);$i++){
												echo "<option value='".$rep_all[$i]->id."'>".$rep_all[$i]->libelle."</option>";
											}
											?>
										</select><br>
		<input type="submit" name="cmdAjouter" value="Ajouter"/>
	</form>
	<?php
}
