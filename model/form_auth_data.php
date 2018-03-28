<?php
if (isset($_POST["connecte"]))
{
	$bdd = new connexion();
	$auth = "SELECT * FROM Utilisateur WHERE login = :login AND mdp = :mdp;";
	$a = $bdd->prepareQuery($auth, array(":login" => $_POST["login"],
									":mdp" => $_POST["mdp"]));
	if(sizeof($a) == 1)
	{
		$_SESSION["id"]=$a[0]->id;
		$_SESSION["CONNECT"]= 1;
		echo $_SESSION["id"];
			if($_COOKIE['PHPSESSID'] == $_COOKIE['achat']['id'])
			{
					$_COOKIE['achat']['id'] = $_SESSION["id"];
			}
		header("Location:accueil_main.php");
	}
	else{
		echo "Impossible de se connecter. Les informations ne sont pas exactes.";
	}
}
if(isset($_POST["inscrire"])){
	$bdd = new connexion();
	$sel = "SELECT * FROM utilisateur WHERE login = :login OR mail = :mail";
	$rep = $bdd->prepareQuery($sel, array(":login" => $_POST["txtlogin"],
											":mail" => $_POST["txtmail"]));
	if(sizeof($rep)==0){
		$auth = "INSERT INTO Utilisateur(login, mdp, mail) VALUES(:login, :mdp, :mail);";
		$a = $bdd->prepare($auth, array(":login" => $_POST["txtlogin"],
										":mdp" => $_POST["txtmdp"],
										":mail" => $_POST["txtmail"]));
		$_SESSION["CONNECT"]= 1;
		header("Location:accueil_main.php");	
	}
	else{
		echo "Ces informations existent déjà.";
	}
}
if (isset($_POST["deconnecte"]))
{
	setcookie("achat[id]","",0);
	setcookie("achat[produit]","",0);
	session_destroy();
	header("Location:accueil_main.php");
}
?>
