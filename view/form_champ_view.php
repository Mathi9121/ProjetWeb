<form method="POST" action="form_ajout_form_main.php"/>
	<label>Name : </label><input type = "text" name = "name"/>
	<label>Type : </label><input type = "text" name = "type"/>
	<label>Label : </label><input type = "text" name = "label"/>
	<label>Source Donnée : </label><input type = "text" name = "source_data"/>
	<label>Source Table : </label><input type = "text" name = "source_data"/>
	<label>Données Cible : </label><input type = "text" name = "source_data"/>
	<label>Rang : </label><input type = "text" name = "source_data"/>
	<label>Operateur : </label><input type = "text" name = "source_data"/>
	<label>Formulaire : </label><select><?php
								foreach($rep as $key=>$value){
									echo '<option value = "'.$rep[$key]->id'"></option>'

								}?>
								</select>
</form>