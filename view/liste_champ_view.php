<?php
echo "<table>
		<tr>
			<th>Name</th>
			<th>Label</th>
			<th>Type</th>
			<th>Source données</th>
			<th>Source Table</th>
			<th>Données cible</th>
			<th>Rang</th>
			<th>Opérateur</th>
		</tr>";

foreach($rep_input as $key => $value){
	echo "<tr>
			<td><a href='form_ajoutRecherche_main.php?id=".$rep_input[$key]->id."'>".$rep_input[$key]->name."</a></td>
			<td>".$rep_input[$key]->label."</td>
			<td>".$rep_input[$key]->type."euros</td>
			<td>".$rep_input[$key]->source_data."</td>
			<td>".$rep_input[$key]->source_table."</td>
			<td>".$rep_input[$key]->donnee_cible."</td>
			<td>".$rep_input[$key]->numero."</td>
			<td>".$rep_input[$key]->operateur."</td>
		</tr>";
}
?>