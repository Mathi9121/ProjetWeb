<?php
 $adresse = $_SERVER['PHP_SELF'];
 $a = explode('/', $adresse);
 $i = sizeof($a);
 if($a[$i-1] == 'index.php'){
    include("view/corps.php");
    include("view/accueil.php");
 }else{
    include("../view/corps.php");
    include("../view/accueil.php");
 }

?>