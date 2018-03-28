<?php
echo "<table>
		<tr>
			<th>Nom</th>
			<th>Methode</th>
			<thAction</th>
		</tr>";
for($i=0; $i<sizeof($rep); $i++){
	echo "<tr>";
	echo "<td><a href='form_ajout_form_main.php?id=".$rep[$i]->id."'>".$rep[$i]->libelle."</a></td>";
	echo "<td>".$rep[$i]->methode."</td>";
	echo "<td>".$rep[$i]->action."</td>";
	echo "</tr>";
}
echo "</table>";
?>
