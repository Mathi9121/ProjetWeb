<?php
$bdd = new connexion();
$auth = "SELECT * FROM Utilisateur;";
$a = $bdd->query($auth);
echo "Utilisateur : ";
echo "<table>
<tr><th>id</th><th>login</th><th>mdp</th><th>mail</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id."</td>";
	echo "<td>".$a[$i]->login."</td>";
	echo "<td>".$a[$i]->mdp."</td>";
	echo "<td>".$a[$i]->mail."</td>";
	echo "</tr>";
}
echo "</table>";
$auth = "SELECT * FROM Reference;";
$a = $bdd->query($auth);
echo "Reference : ";
echo "<table>
<tr><th>id</th><th>titre</th><th>auteur</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id."</td>";
	echo "<td>".$a[$i]->titre."</td>";
	echo "<td>".$a[$i]->auteur."</td>";
	echo "</tr>";
}
echo "</table>";
$auth = "SELECT * FROM Version;";
$a = $bdd->query($auth);
echo "Version : ";
echo "<table>
<tr><th>id</th><th>libelle</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id."</td>";
	echo "<td>".$a[$i]->libelle."</td>";
	echo "</tr>";
}
echo "</table>";
$auth = "SELECT * FROM Annonce;";
$a = $bdd->query($auth);
echo "Annonce : ";
echo "<table>
<tr><th>id</th><th>titre</th><th>descriptif</th><th>prix</th><th>ville</th><th>date_post</th><th>id_utilisateur</th><th>id_ref</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id."</td>";
	echo "<td>".$a[$i]->titre."</td>";
	echo "<td>".$a[$i]->descriptif."</td>";
	echo "<td>".$a[$i]->prix."</td>";
	echo "<td>".$a[$i]->ville."</td>";
	echo "<td>".$a[$i]->date_post."</td>";
	echo "<td>".$a[$i]->id_utilisateur."</td>";
	echo "<td>".$a[$i]->id_ref."</td>";
	echo "</tr>";
}
echo "</table>";
$auth = "SELECT * FROM _META_MENU;";
$a = $bdd->query($auth);
echo "_META_MENU : ";
echo "<table>
<tr><th>id</th><th>libelle</th><th>chemin</th><th>id_parent</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id."</td>";
	echo "<td>".$a[$i]->libelle."</td>";
	echo "<td>".$a[$i]->chemin."</td>";
	echo "<td>".$a[$i]->id_parent."</td>";
	echo "</tr>";
}
echo "</table>";
$auth = "SELECT * FROM _META_Form;";
$a = $bdd->query($auth);
echo "_META_Form : ";
echo "<table>
<tr><th>id</th><th>libelle</th><th>methode</th><th>action</th><th>name</th><th>cible</th><th>table</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id."</td>";
	echo "<td>".$a[$i]->libelle."</td>";
	echo "<td>".$a[$i]->methode."</td>";
	echo "<td>".$a[$i]->action."</td>";
	echo "<td>".$a[$i]->name."</td>";
	echo "<td>".$a[$i]->cible."</td>";
	echo "<td>".$a[$i]->table."</td>";
	echo "</tr>";
}
echo "</table>";
$auth = "SELECT * FROM _META_Recherche;";
$a = $bdd->query($auth);
echo "_META_Recherche : ";
echo "<table>
<tr><th>id</th><th>name</th><th>type</th><th>label</th><th>source_data</th><th>donnee_cible</th><th>numero</th><th>operateur</th><th>id_F</th><th>data</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id."</td>";
	echo "<td>".$a[$i]->name."</td>";
	echo "<td>".$a[$i]->type."</td>";
	echo "<td>".$a[$i]->label."</td>";
	echo "<td>".$a[$i]->source_data."</td>";
	echo "<td>".$a[$i]->source_table."</td>";
	echo "<td>".$a[$i]->donnee_cible."</td>";
	echo "<td>".$a[$i]->numero."</td>";
	echo "<td>".$a[$i]->operateur."</td>";
	echo "<td>".$a[$i]->id_F."</td>";
	echo "</tr>";
}
echo "</table>";
$auth = "SELECT * FROM Vers_Ref;";
$a = $bdd->query($auth);
echo "Vers_Ref : ";
echo "<table>
<tr><th>id_vers</th><th>id_ref</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id_vers."</td>";
	echo "<td>".$a[$i]->id_ref."</td>";
	echo "</tr>";
}
echo "</table>";
$auth = "SELECT * FROM Categorie;";
$a = $bdd->query($auth);
echo "CATEGORIE : ";
echo "<table>
<tr><th>id</th><th>libelle</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id."</td>";
	echo "<td>".$a[$i]->libelle."</td>";
	echo "</tr>";
}
echo "</table>";
$up = "Select * FROM Annonce_Recherche ;";
$a = $bdd->query($up);
echo "Annonce_Recherche : ";
echo "<table>
<tr><th>id</th><th>id_ann</th><th>titre</th><th>list_cat</th><th>descriptif</th><th>prix</th><th>ville</th><th>date_post</th><th>auteur</th><th>reference</th><th>list_version</th><th>titre_ann</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id."</td>";
	echo "<td>".$a[$i]->id_ann."</td>";
	echo "<td>".$a[$i]->titre."</td>";
	echo "<td>".$a[$i]->list_cat."</td>";
	echo "<td>".$a[$i]->descriptif."</td>";
	echo "<td>".$a[$i]->prix."</td>";
	echo "<td>".$a[$i]->ville."</td>";
	echo "<td>".$a[$i]->date_post."</td>";
	echo "<td>".$a[$i]->auteur."</td>";
	echo "<td>".$a[$i]->reference."</td>";
	echo "<td>".$a[$i]->list_version."</td>";
	echo "<td>".$a[$i]->titre_ann."</td>";
	echo "</tr>";
}
echo "</table>";
$up = "Select * FROM ref_cat ;";
$a = $bdd->query($up);
echo "Ref_cat : ";
echo "<table>
<tr><th>id_cat</th><th>id_ref</th></tr>";
for($i=0;$i<sizeof($a);$i++){
	echo "<tr>";
	echo "<td>".$a[$i]->id_cat."</td>";
	echo "<td>".$a[$i]->id_ref."</td>";
	echo "</tr>";
}
echo "</table>";

?>

<div id="accueil">
	Bienvenue
</div>
		



