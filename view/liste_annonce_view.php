<?php
$select = "SELECT * FROM Annonce;";
$bdd = new connexion();
$rep = $bdd->query($select);
echo "<table>";
echo "<tr>";
echo "<th>Titre</th>";
echo "<th>Descriptif</th>";
echo "<th>Prix</th>";
echo "<th>Ville</th>";
echo "</tr>";
for($i=0; $i<sizeof($rep); $i++){
	echo "<tr>";
	echo "<td><a href='form_ann_main.php?id=".$rep[$i]->id."'>".$rep[$i]->titre."</a></td>";
	echo "<td>".$rep[$i]->descriptif."</td>";
	echo "<td>".$rep[$i]->prix."euros</td>";
	echo "<td>".$rep[$i]->ville."</td>";
	echo "</tr>";
}
echo "</table>";
?>
