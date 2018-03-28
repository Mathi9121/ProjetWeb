<?php
$bdd = new connexion();
if((empty($_GET['id']) && empty($_GET['form'])) || (empty($_GET['id']) && isset($_GET['form']))){
	if(isset($_POST['cmdAjouter'])){
		$sel = "SELECT * FROM _META_Form WHERE id = :id";
		$rep = $bdd->prepareQuery($sel, array(":id"=>$_GET['form']));
		$ins = "INSERT INTO _META_Recherche(name, type, label, source_data, source_table, donnee_cible,operateur, id_F) VALUES(:name,:type,:label, :source_data, :source_table, :donnee_cible, :operateur, :id_F)";
		
		$in = $bdd->prepare($ins, array(':name'=> $_POST['txtName'],
										':type' => $_POST['lstType'],
										':label'=>$_POST['txtLabel'],
										':source_data' =>$_POST['txtData'],
										':source_table'=>$_POST['txtTable'],
										':donnee_cible'=>$_POST['txtCible'],
										':operateur'=>$_POST['txtOp'],
										':id_F'=>$_POST['lstForm']));
	}
}else if(isset($_GET['form'])){
	$sel = "SELECT * FROM _META_form Where id = :id";
	$rep = $bdd->prepareQuery($sel, array(":id" => $_GET['form']));
}
else if (isset($_GET['id'])){
	$sel = "SELECT * FROM _META_Recherche Where id = :id";
	$rep = $bdd->prepareQuery($sel, array(":id" => $_GET['id']));

	$sel = "SELECT * FROM _META_Form";
	$rep_all = $bdd->query($sel);

	if(isset($_POST['Enregistrer'])){
		$up = "UPDATE _META_Recherche SET name = :name, type = :type, label= :label, source_data = :source_data, source_table = :source_table, donnee_cible= :donnee_cible,operateur = :operateur, id_F= :id_F WHERE id = :id";
		$rep_up = $bdd->prepare($up, array(':name'=> $_POST['txtName'],
										':type' => $_POST['lstType'],
										':label'=>$_POST['txtLabel'],
										':source_data' =>$_POST['txtData'],
										':source_table'=>$_POST['txtTable'],
										':donnee_cible'=>$_POST['txtCible'],
										':operateur'=>$_POST['txtOp'],
										':id_F'=>$_POST['lstForm'],
										':id' => $_GET['id']));
		
	}
}
?>
