<?php
	$bdd = new connexion();
if(isset($_POST['valider'])){
	var_dump($rep2);
	echo '<form method="'.$rep2[0]->methode.'" >
			<input type="hidden" name="champ" value="'.$rep2[0]->methode.'">
			<input type="hidden" name="id" value="'.$rep2[0]->id.'">
			<input type="hidden" name="data" value="">';

			foreach ($rep as $key => $value) {
				if($rep[$key]->type == "text"){
					echo'<label>'.$rep[$key]->label.'</label><input type="'.$rep[$key]->type.'" name="'.$rep[$key]->name.'"/>';
				}else if($rep[$key]->type == "select"){

				}
			}

	echo '	<input type="submit" name="recherche" value="Rechercher"/>
		</form>';
}
else if (isset($_POST['recherche'])){
	echo "<table>";
	echo "<tr>";
	echo "<th>Titre</th>";
	echo "<th>Descriptif</th>";
	echo "<th>Prix</th>";
	echo "<th>Ville</th>";
	echo "</tr>";

	echo "</table>";
}
else if(empty($_POST['valider']) && empty($_POST['recherche'])){
	echo "<form method='".$rep[0]->methode."' action='".$rep[0]->action.".php'>";
	
	for($i=0; $i<sizeof($repR); $i++){
		echo '<label>'.$repR[$i]->label.'</label>';	
		if($repR[$i]->type=="select"){
			var_dump($repR);
			echo "<select name='".$repR[$i]->name."'>";
			for($j=0;$j<sizeof($repI); $j++){
				echo "<option value='".$repI[$i]->id."'>".$repI[$i]->name."</option>";
			}
			echo "</select>";
		}
		else{
			echo "<input type='".$repR[$i]->type."' name='".$repR[$i]->name."'/><br>";
		}
	}
	
	echo "<input type='submit' name='valider' value='Rechercher'/>";
	echo "</form>";		
}


?>
