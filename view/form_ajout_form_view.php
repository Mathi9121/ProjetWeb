<?php

if(isset($_GET['id'])){
	echo '
	<form method="post" action="form_ajout_form_main.php?id='.$rep[0]->id.'"	>
		<label>Nom : </label><input type = "text" name = "title" value="'.$rep[0]->libelle.'"/>
		<label>Methode : </label><select name = "method">
									<option value="'.$rep[0]->methode.'">'.$rep[0]->methode.'</option>
									<option value="get">GET</option>
									<option value="post">POST</option>
								</select
		<label>Action : </label><input type = "text" name = "action" value="'.$rep[0]->action.'"/>
		<input type="submit" value="Enregistrer" name="Enregistrer"/>
		<input type="submit" value="Supprimer" name="Supprimer"/>
	</form>
	<br/><br/>';
	echo '<a href="form_ajoutRecherche_main.php?form='.$_GET['id'].'" >Ajouter</a>';

}else if(empty($_POST['Ajouter']) && empty($_GET['id'])){
	?>
	<form method="post" action="form_ajout_form_main.php">
		<label>Nom : </label><input type = "text" name = "title"/>
		<label>Methode : </label><select name = "method">
									<option value="get">GET</option>
									<option value="post">POST</option>
								</select
		<label>Action : </label><input type = "text" name = "action"/>
		<input type="submit" value="Ajouter" name="Ajouter"/>
	</form>
	<?php 
}
?>
