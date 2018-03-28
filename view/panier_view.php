<?php
if(isset($_COOKIE["achat"])){
?>
<table>
	<?php
		$_SESSION["commande"] = 0;
		for($j=1;$j<=sizeof($_COOKIE["achat"]["produit"]);$j++){
			$bdd = new connexion();
			$sel = "SELECT * FROM Annonce WHERE id = :id";
			$rep = $bdd->prepareQuery($sel, array(':id' => $_COOKIE["achat"]["produit"][$j]));
			for($i=0;$i<sizeof($rep);$i++){
				$selU = "SELECT * FROM utilisateur WHERE id = :idU";
				$repU = $bdd->prepareQuery($selU, array(':idU' => $rep[$i]->id_utilisateur));
				echo "<tr>";
				echo "<td>".$rep[$i]->titre."</td>";
				echo "<td>".$rep[$i]->prix."</td>";
				echo "<td>".$repU[0]->login."</td>";
				echo "</tr>";
				$_SESSION["commande"] += $rep[$i]->prix;
			}
		}
	
	?>
	<tr>
		<td colspan="2"></td>
		<td>Total :
		<?php
		echo $_SESSION["commande"];
		?>
		€</td>
	</tr>
</table>
<input type="submit" name="commander" value="Commander"/>
<?php
}
else{
	echo "Aucun achat dans le panier.";
}
?>