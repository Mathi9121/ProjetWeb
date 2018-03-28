CREATE TABLE IF NOT EXISTS `utilisateur` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(20) DEFAULT NULL,
  `mdp` varchar(20) DEFAULT NULL,
  `mail` varchar(70) DEFAULT NULL
);

INSERT INTO `utilisateur` (`id`, `login`, `mdp`, `mail`) VALUES
(1, 'anna', 'anna', 'anna');

CREATE TABLE IF NOT EXISTS `reference` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titre` varchar(20) DEFAULT NULL,
  `auteur` varchar(20) DEFAULT NULL
);

INSERT INTO `reference` (`titre`, `auteur`) VALUES
('Vend Manga', 'Toto');

CREATE TABLE IF NOT EXISTS `annonce` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `descriptif` varchar(4000) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `ville` varchar(40) DEFAULT NULL,
  `date_post` date DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_ref` int(11) NOT NULL,
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id),
  FOREIGN KEY (id_ref) REFERENCES reference(id)
);

INSERT INTO `annonce` (`id`, `titre`, `descriptif`, `prix`, `ville`, `date_post`, `id_utilisateur`, `id_ref`) VALUES
(1, 'Vend Manga', 'occasion mais bon Ã©tat', 5, 'CHALON SUR SAÃ–NE', NULL, 1, 1);

CREATE TABLE IF NOT EXISTS `annonce_recherche` (
`id` int(11) NOT NULL,
  `id_ann` int(11) DEFAULT NULL,
  `titre` varchar(20) DEFAULT NULL,
  `list_cat` varchar(1000) DEFAULT NULL,
  `descriptif` varchar(4000) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `ville` varchar(40) DEFAULT NULL,
  `date_post` date DEFAULT NULL,
  `auteur` varchar(50) DEFAULT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `list_version` varchar(1000) DEFAULT NULL,
  `titre_ann` varchar(50) DEFAULT NULL,
  FOREIGN KEY (id_ann) REFERENCES annonce(id)
);

CREATE TABLE IF NOT EXISTS `categorie` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `libelle` varchar(20) DEFAULT NULL
);

INSERT INTO `categorie` (`libelle`) VALUES
('Policier'),
('Jeunesse'),
('SF');

CREATE TABLE IF NOT EXISTS `ref_cat` (
  `id_cat` int(11) NOT NULL,
  `id_ref` int(11) NOT NULL,
  PRIMARY KEY (id_cat, id_ref),
  FOREIGN KEY (id_cat) REFERENCES categorie(id),
  FOREIGN KEY (id_ref) REFERENCES reference(id)
);

INSERT INTO `ref_cat` (`id_cat`, `id_ref`) VALUES
(1,1),
(2,1);

CREATE TABLE IF NOT EXISTS `version` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `libelle` varchar(20) DEFAULT NULL
);

INSERT INTO `version` (`libelle`) VALUES
('Collector'),
('Original');

CREATE TABLE IF NOT EXISTS `vers_ref` (
  `id_vers` int(11) NOT NULL,
  `id_ref` int(11) NOT NULL,
  PRIMARY KEY (id_vers, id_ref),
  FOREIGN KEY (id_vers) REFERENCES version(id),
  FOREIGN KEY (id_ref) REFERENCES reference(id)
);

CREATE TABLE IF NOT EXISTS `_meta_champs` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `_meta_form` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `libelle` varchar(20) DEFAULT NULL,
  `methode` varchar(4) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `cible` varchar(50) NOT NULL,
  `table` varchar(50) NOT NULL
);

INSERT INTO `_meta_form` (`id`, `libelle`, `methode`, `action`, `name`, `cible`, `table`) VALUES
(1, 'annonce_recherche', 'post', 'form_recherche_main', 'Annonces', 'Recherche', 'Annonce'),
(2, 'Ajout_menu', 'post', 'form_menu_main', '', '', ''),
(3, 'choix_form', 'post', 'form_recherche_main', '', '', '');

CREATE TABLE IF NOT EXISTS `_meta_menu` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `libelle` varchar(20) DEFAULT NULL,
  `chemin` varchar(400) DEFAULT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0'
);

INSERT INTO `_meta_menu` (`libelle`, `chemin`, `id_parent`) VALUES
('Accueil', 'accueil_main', 0),
('Liste annonces', 'liste_annonce_main', 0),
('Connexion', 'form_auth_main', 0),
('Rechercher', 'form_recherche_main', 0),
('Panier', 'panier_main', 0),
('Ajouter annonce', 'form_ann_main', 1),
('Ajouter reference', 'form_ref_main', 0),
('Ajouter version', 'form_version_main', 0),
('Ajouter menu', 'form_menu_main', 3),
('Ajouter formulaire', 'form_ajout_form_main', 0),
('Liste menu', 'liste_menu_main', 0),
('Liste formulaire', 'list_form_main', 0);

CREATE TABLE IF NOT EXISTS `_meta_recherche` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `label` varchar(20) DEFAULT NULL,
  `source_data` varchar(40) DEFAULT NULL,
  `source_table` varchar(40) DEFAULT NULL,
  `donnee_cible` varchar(20) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `operateur` varchar(3) DEFAULT NULL,
  `id_F` int(11) DEFAULT NULL,
  `data` varchar(2000) NOT NULL,
  FOREIGN KEY (id_F) REFERENCES _meta_form(id)
);

INSERT INTO `_meta_recherche` (`id`, `name`, `type`, `label`, `source_data`, `source_table`, `donnee_cible`, `numero`, `operateur`, `id_F`, `data`) VALUES
(1, 'titre', 'text', 'Titre', 'titre', 'Annonce', 'string', 1, '=', 1, ''),
(2, 'titreMenu', 'text', 'Titre', '', '_meta_recherche', 'string', NULL, '', 2, ''),
(3, 'cheminMenu', 'text', 'Chemin', '', '_meta_recherche', 'string', NULL, '', 2, ''),
(4, 'select_form', 'select', '', 'int', '_meta_recherche', 'libelle', NULL, '=', 3, '');
