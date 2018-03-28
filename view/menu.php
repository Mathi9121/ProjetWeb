<?php
session_start();
$adresse = $_SERVER['PHP_SELF'];
$a = explode('/', $adresse);
$k = sizeof($a);
if($a[$k-1] == 'index.php'){
	require("class/autoloader.class.php");
}else{
	require("../class/autoloader.class.php");
}
Autoloader::register();
$select = "SELECT * FROM _META_MENU;";
$bdd = new connexion();
$rep = $bdd->query($select);
?>

<html>
<head>
<title>Accueil</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
	<body>
		<div id="menu">
			<?php
			echo "<ul>";
			for($i=0; $i<sizeof($rep); $i++){
				if($a[$k-1] == 'index.php'){
					echo "<li><a href='controller/".$rep[$i]->chemin.".php'>".$rep[$i]->libelle."</a></li>";
				}else{
					echo "<li><a href='".$rep[$i]->chemin.".php'>".$rep[$i]->libelle."</a></li>";
				}
			}
			echo "</ul>";
			?>
		</div>
	</body>
</html>
