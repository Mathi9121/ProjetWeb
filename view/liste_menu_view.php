<?php
$select = "SELECT * FROM _META_MENU;";
$bdd = new connexion();
$rep = $bdd->query($select);
echo "<table>
<tr>
<th>Libelle</th>
<th>Chemin</th>
</tr>";
for($i=0; $i<sizeof($rep); $i++){
	echo "<tr>";
	echo "<td><a href='form_menu_main.php?idMenu=".$rep[$i]->id."'>".$rep[$i]->libelle."</a></td>";
	echo "<td><a href='form_menu_main.php?idMenu=".$rep[$i]->id."'>".$rep[$i]->chemin."</a></td>";
	echo "</tr>";
}
echo "</table>";
?>

