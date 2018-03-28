<?php
if(isset($_POST["enregistrer"])){
	$sel = "SELECT * FROM Reference WHERE titre = :titre AND auteur = :auteur;";
	$bdd = new connexion();
	$rep = $bdd->prepareQuery($sel, array(":titre" => $_POST["titre"], 
										":auteur" => $_POST["auteur"]));
	if(sizeof($rep)==0){
		$ins = "INSERT INTO Reference(titre, auteur) VALUES(:titre, :auteur);";
		$rep = $bdd->prepare($ins, array(":titre" => $_POST["titre"],
										":auteur" => $_POST["auteur"]));
		$sel = "SELECT id FROM Reference WHERE titre = :titre  AND auteur = :auteur;";
		$rep = $bdd->prepareQuery($sel, array(":titre" => $_POST["titre"],
											":auteur" => $_POST["auteur"]));
		$ins = "INSERT INTO Vers_Ref VALUES(:vers, :ref)";
		$rep = $bdd->prepare($ins, array(":vers" => $_POST["lstVersion"],
										":ref" => $rep[0]->id));
	}
	else{
		$sel = "SELECT * FROM Vers_Ref WHERE id_ref = :ref;";
		$rep = $bdd->prepareQuery($sel, array(":ref" => $rep[0]->id));
		$present = 0;
		for($i=0; $i<sizeof($rep);$i++){
			if($rep[$i]->id_vers == $_POST["lstVersion"]){
				echo $present = 1;
			}
		}
		if($present == 1){
			$ins = "INSERT INTO Vers_Ref VALUES(:vers, :ref)";
			$rep = $bdd->prepare($ins, array(":vers" => $_POST["lstVersion"],
												":ref" => $rep[0]->id));
		}
	}
}
?>
