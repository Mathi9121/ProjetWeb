<?php
$page="accueil";
if(isset($_GET["rub"])) 
{
$page=$_GET["rub"];
} 

if ($page=='accueil' || $page=='form_ann_view'
|| $page=='liste_annonce_view') {
	include $page.".php";
}
else
{
	include "404.php";
}
?>



