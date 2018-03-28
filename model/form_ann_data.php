<?php
if(!isset($_COOKIE['achat'])){
	$_SESSION["cpt"]=0;
}

if (isset($_POST["record"]))
{
	$bdd = new connexion();
	$insert = "INSERT INTO Annonce (titre, descriptif, prix, ville, id_utilisateur, id_ref) VALUES(:titre, :descriptif, :prix, :ville, :id_utilisateur, :id_ref);";
	$bdd->prepare($insert, array(':titre' => $_POST["titre"],
								':descriptif' => $_POST["desc"],
								':prix'=> $_POST["prix"],
								':ville' => $_POST["ville"],
								':id_utilisateur'=>$_SESSION["id"],
								':id_ref' => $_POST["lstRef"]));	
								
}
else if(isset($_POST["update"])){
	$bdd = new connexion();
	$upt = "UPDATE Annonce SET titre = :titre, descripif = :descriptif, prix = :prix, ville = :ville, id_ref = :id_ref  WHERE id = :id;";
	$bdd->prepare($upt, array(':titre' => $_POST["titre"],
							': descriptif'=>$_POST["desc"],
							':prix'=> $_POST["prix"],
							':ville'=>$_POST["ville"],
							'id_ref'=> $_POST["lstRef"],
							':id'=>$_POST["id"]));
}
else if(isset($_POST["delete"])){
	$bdd = new connexion();
	$del = "DELETE FROM Annonce WHERE id = :id;";
	$bdd->prepare($del, array(':id' => $_POST["id"]));
}
else if(isset($_POST["partager"])){
	
}
else if(isset($_POST["signaler"])){
	
}
else if(isset($_POST["acheter"])){
	//Pas connecté
	if(!isset($_SESSION["id"])){
		$_SESSION["cpt"]++;
		$timestamp_expiration=time()+3600;
		setcookie("achat[id][".$_SESSION["cpt"]."]",$_COOKIE["PHPSESSID"], $timestamp_expiration);
		setcookie("achat[produit][".$_SESSION["cpt"]."]", $_POST["idAnnonce"], time()+3600);
		setcookie('expiration_variable',$timestamp_expiration,$timestamp_expiration) ;
	} //connecté
	else{
		if($_SESSION["cpt"]!=0){
			for($i=1;$i<sizeof($_COOKIE["achat"]);$i++){
				if($_COOKIE["achat"]["id"][$i]==$_COOKIE["PHPSESSID"]){
					setcookie("achat[id][".$i."]",$_SESSION["id"],$_COOKIE['expiration_variable']) ;
				}
			}
		}
		$_SESSION["cpt"]++;
		setcookie("achat[id][".$_SESSION["cpt"]."]", $_SESSION["id"], time()+3600);
		setcookie("achat[produit][".$_SESSION["cpt"]."]", $_POST["idAnnonce"], time()+3600);
	}
	//header("Location:accueil.php");
	echo "Bien ajouté au panier";
}

