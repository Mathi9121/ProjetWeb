<?php
include("cnx.php");
/*
////////CREATION////////

//Creation table Reference
$tab_reference = "CREATE TABLE Reference (id int PRIMARY KEY AUTO_INCREMENT , titre VARCHAR(20), auteur VARCHAR(20));";
$req = mysqli_query($link, $tab_reference);

//Creation table Version
$tab_version = "CREATE TABLE Version (id int Primary Key AUTO_INCREMENT , libelle VARCHAR(20));";
$req = mysqli_query($link, $tab_version);



//Creation table Utilisateur**//*
$tab_utilisateur = "CREATE TABLE Utilisateur (id int Primary Key AUTO_INCREMENT,login VARCHAR(20), mdp VARCHAR(20), mail VARCHAR(70));";
$req = mysqli_query($link, $tab_utilisateur)or die(mysqli_error($link));
*/
//Creation table Annonce*
/*$tab_annonce = "CREATE TABLE Annonce (id int Primary Key AUTO_INCREMENT , titre VARCHAR(50), descriptif VARCHAR(4000), prix FLOAT, ville VARCHAR(40), date_post DATE, id_utilisateur int, 
foreign key 
(id_utilisateur)
references 
Utilisateur(id));";
$req = mysqli_query($link, $tab_annonce)or die(mysqli_error($link));*/
/*
$tab_menu = "CREATE TABLE _META_MENU(id int PRIMARY KEY AUTO_INCREMENT, libelle VARCHAR(20), chemin VARCHAR(400));";
$req = mysqli_query($link, $tab_menu)or die(mysqli_error($link));


$res = "DROP TABLE _META_Recherche";
$req_ins = mysqli_query($link, $res) or die(mysqli_error($link));

$res = "DROP TABLE _META_Form";
$req_ins = mysqli_query($link, $res) or die(mysqli_error($link));

$tab_rech = "CREATE TABLE _META_Form(id int PRIMARY KEY AUTO_INCREMENT, libelle VARCHAR(20), methode VARCHAR(4), action VARCHAR(20));";
$req = mysqli_query($link, $tab_rech)or die(mysqli_error($link));

$tab_rech = "CREATE TABLE _META_Recherche(id int PRIMARY KEY AUTO_INCREMENT, name VARCHAR(20), type VARCHAR(20), label VARCHAR(20), source_data VARCHAR(40), source_table VARCHAR(40),
* 											donnee_cible VARCHAR(20), numero int, operateur varchar(3), id_F int, FOREIGN KEY (id_F) REFERENCES _META_Form(id));";
$req = mysqli_query($link, $tab_rech)or die(mysqli_error($link));

$ins = "INSERT INTO _META_Form(libelle, methode, action) VALUES ('form_recherche', 'post', 'form_recherche_main.php')";
$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));

$ins = "INSERT INTO _META_Recherche(name, type, label, source_data, source_table, donnee_cible, numero, operateur, id_F) VALUES ('titre', 'text', 'Titre', 'titre', 'Annonce', 'string', 1, '=',  1)";
$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));

$tab_ver_reference = "CREATE TABLE Vers_Ref (id_vers int , id_ref int, PRIMARY KEY(id_vers, id_ref), FOREIGN KEY (id_ref) REFERENCES Reference(id), 
FOREIGN KEY (id_vers) REFERENCES Version(id));";
$req = mysqli_query($link, $tab_ver_reference)or die(mysqli_error($link));

$tab_ver_reference = "ALTER TABLE Annonce ADD id_ref int, 
ADD CONSTRAINT FOREIGN KEY (id_ref) REFERENCES Reference(id);";
$req = mysqli_query($link, $tab_ver_reference)or die(mysqli_error($link));



$table_categorie = "CREATE TABLE Categorie(id int PRIMARY KEY AUTO_INCREMENT, libelle VARCHAR(20));";
$req_ins = mysqli_query($link, $table_categorie) or die(mysqli_error($link));

$tab_ver_reference = "CREATE TABLE Ref_Cat (id_cat int , id_ref int, Primary Key(id_Ref, id_cat), Foreign KEY (id_ref) References Reference(id), Foreign KEY (id_cat) References Categorie(id));";
$req = mysqli_query($link, $tab_ver_reference)or die(mysqli_error($link));


 
$tab_ver_reference = "ALTER TABLE Annonce_Recherche ADD titre_ann varchar(50)";
$req = mysqli_query($link, $tab_ver_reference)or die(mysqli_error($link));

$tab_ver_reference = "DROP TABLE Annonce_Recherche";
$req = mysqli_query($link, $tab_ver_reference)or die(mysqli_error($link));

$table_annonce_recherche = "CREATE TABLE Annonce_Recherche(id int PRIMARY KEY AUTO_INCREMENT, id_ann int, titre varchar(20), list_cat varchar(1000), descriptif varchar(4000), prix float, ville varchar(40), date_post DATE, auteur varchar(50), reference varchar(20), list_version varchar(1000))";
$req_ins = mysqli_query($link, $table_annonce_recherche) or die(mysqli_error($link));

/*$ins = "INSERT INTO Annonce_Recherche (id_ann,titre , list_cat , descriptif, prix , ville, date_post , auteur, reference , list_version) 
		SELECT Ann.id, Ann.titre, Cat.libelle, descriptif, prix, ville, date_post, login, Ref.titre, Vers.libelle
		FROM Annonce Ann, Version Vers , Utilisateur Uti, Reference Ref, Categorie Cat, Vers_Ref VR, Ref_Cat RC
		WHERE Uti.id = Ann.id_utilisateur
		AND Ann.id_ref = Ref.id
		AND VR.id_ref = Ref.id
		AND VR.id_vers = Vers.id
		AND RC.id_ref= Ref.id
		AND RC.id_cat = Cat.id";*/
		
/*$sel = "SELECT Ann.titre, Cat.libelle, descriptif, prix, ville, date_post, login, Ref.titre, Vers.libelle
		FROM Annonce Ann, Version Vers , Utilisateur Uti, Reference Ref, Categorie Cat, Vers_Ref VR, Ref_Cat RC
		WHERE Uti.id = Ann.id_utilisateur
		AND Ann.id_ref = Ref.id
		AND VR.id_ref = Ref.id
		AND VR.id_vers = Vers.id
		AND RC.id_ref= Ref.id
		AND RC.id_cat = Cat.id;";
$sel = "SELECT Ann.titre, descriptif, prix, ville, date_post, login
		FROM Annonce Ann, Utilisateur Uti
		WHERE Uti.id = Ann.id_utilisateur;";

$ins = "insert into Annonce_Recherche (id_ann)
		Select id From Annonce";
		
$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));
*/
$up = "UPDATE Annonce_Recherche INNER JOIN Annonce ON Annonce_Recherche.id_ann = Annonce.id INNER JOIN Reference ON Annonce.id_ref = Reference.id INNER JOIN Utilisateur ON Utilisateur.id = Annonce.id_utilisateur 
								INNER JOIN Vers_Ref ON Reference.id = Vers_Ref.id_ref INNER JOIN Version ON Version.id = Vers_Ref.id_vers Inner join Ref_Cat ON Reference.id = Ref_Cat.id_ref
								Inner join Categorie ON Categorie.id = Ref_Cat.id_cat 
								INNER JOIN (SELECT Reference.id as id, GROUP_CONCAT(Categorie.libelle, ',') as libs FROM Ref_Cat Inner join Categorie ON Categorie.id = Ref_Cat.id_cat Inner join Reference ON Reference.id = Ref_Cat.id_ref Inner join Annonce ON Annonce.id_ref = Reference.id GROUP BY Annonce.id) as lcat ON lcat.id = Reference.id
								SET Annonce_Recherche.titre = Annonce.titre , Annonce_Recherche.descriptif = Annonce.descriptif, Annonce_Recherche.list_version = Version.libelle, 
								Annonce_Recherche.prix = Annonce.prix, Annonce_Recherche.date_post = Annonce.date_post, Annonce_Recherche.ville = Annonce.ville, Annonce_Recherche.reference = Reference.titre, 
								
								
								Annonce_Recherche.reference = Reference.titre, Annonce_Recherche.auteur = Utilisateur.login, Annonce_Recherche.list_cat = libs; ";
								
$req_ins = mysqli_query($link, $up) or die(mysqli_error($link));
/*
$up = "UPDATE Annonce_Recherche INNER JOIN Annonce ON Annonce_Recherche.id_ann = Annonce.id SET";
$req_ins = mysqli_query($link, $up) or die(mysqli_error($link));		
		/*
$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));
$up = "Select * FROM Annonce_Recherche 
		INNER JOIN Reference ON Annonce_Recherche.reference = Reference.titre 
		;










////////INSERTION////////

//Insertion dans la table Reference
/*
$ins = "INSERT INTO Reference VALUES (1,'Manga1','')";
$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));*/
/*$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));
$ins = "INSERT INTO Reference 1,'')";VALUES (2,'','',1)";
//$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));
$ins = "INSERT INTO Reference VALUES (3,'','',1)";
//$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));
$ins = "INSERT INTO Reference VALUES (4,'','',2)";
//$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));

//Insertion dans la table Version
$ins = "INSERT INTO Version VALUES (1,'')";
//$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));
$ins = "INSERT INTO Version VALUES (2,'')";
//$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));
$ins = "INSERT INTO Version VALUES (3,'')";
//$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));
$ins = "INSERT INTO Version VALUES (4,'')";
//$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));
*/
//Insertion dans la table Utilisateur
/*$ins = "INSERT INTO Utilisateur(login, mdp, mail) VALUES('azerty', 'azerty','azerty@azerty.com') ";
$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));*/
/*
//Insertion dans la table Annonce
$ins = "INSERT INTO Annonce VALUES ()";
//$req_ins = mysqli_query($link, $ins) or die(mysqli_error($link));




$sel = "SELECT * FROM _META_Recherche;";
$req = mysqli_query($link, $sel);

while($sel1=mysqli_fetch_array($req))
{ 
	echo $sel1['name'];
}*/
?>
