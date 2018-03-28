<?php
if(isset($_POST["valider"])){
	$bdd = new connexion();
	$sel = "SELECT * FROM _META_Recherche WHERE id_F = ".$_POST["select_form"]." ORDER BY numero;";
	$rep = $bdd->query($sel);
	$sel2 = "SELECT * FROM _META_Form WHERE id = ".$_POST["select_form"].";";
	$rep2 = $bdd->query($sel2);
	//$table = $rep2[0]->table;
}else if(isset($_POST["recherche"])){
	$sel = "SELECT * FROM _META_Recherche WHERE id_F = :id_F ORDER BY numero;";
	$rep = $bdd->prepareQuery($sel, array(":id_F" => $_POST['id']));
	$sel = "SELECT * FROM ".$rep[0]->source_table." WHERE ";
	$tab = array();
	$tab2 =  array();
	foreach ($rep as $key => $value) {
		if($key != 0 && $key != sizeof($rep)-1){
			$sel .= "AND";
		}
		$sel .= $rep[$key]->source_data." = :data".$key;
		$tab1 = array(":data".$key => $_POST[$rep[$key]->name]);
		$tab = array_merge($tab1, $tab2);

	}
	$rep = $bdd->prepareQuery($sel, $tab);
}else{
	$select = "SELECT * FROM _META_Form WHERE libelle = :libelle;";
	$rep = $bdd->prepareQuery($select, array(':libelle' => 'choix_form'));

	$select = "SELECT * FROM _META_Recherche WHERE id_F = ".$rep[0]->id.";";
	$repR = $bdd->query($select);

	$select = "SELECT * FROM _META_Form WHERE cible = :cible";
	$repI = $bdd->prepareQuery($select, array(':cible'=>'Recherche'));

}
?>
