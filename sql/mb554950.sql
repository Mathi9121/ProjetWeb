-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 20 Mars 2018 à 14:55
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mb554950`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
`id` int(11) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `descriptif` varchar(4000) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `ville` varchar(40) DEFAULT NULL,
  `date_post` date DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_ref` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `descriptif`, `prix`, `ville`, `date_post`, `id_utilisateur`, `id_ref`) VALUES
(1, 'Vend Manga', 'occasion mais bon Ã©tat', 5, 'CHALON SUR SAÃ–NE', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `annonce_recherche`
--

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
  `titre_ann` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
`id` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
`id` int(11) NOT NULL,
  `titre` varchar(20) DEFAULT NULL,
  `auteur` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ref_cat`
--

CREATE TABLE IF NOT EXISTS `ref_cat` (
  `id_cat` int(11) NOT NULL DEFAULT '0',
  `id_ref` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `mdp` varchar(20) DEFAULT NULL,
  `mail` varchar(70) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `mdp`, `mail`) VALUES
(1, 'anna', 'anna', 'anna');

-- --------------------------------------------------------

--
-- Structure de la table `version`
--

CREATE TABLE IF NOT EXISTS `version` (
`id` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `vers_ref`
--

CREATE TABLE IF NOT EXISTS `vers_ref` (
  `id_vers` int(11) NOT NULL DEFAULT '0',
  `id_ref` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `_meta_champs`
--

CREATE TABLE IF NOT EXISTS `_meta_champs` (
`id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `_meta_form`
--

CREATE TABLE IF NOT EXISTS `_meta_form` (
`id` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  `methode` varchar(4) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `cible` varchar(50) NOT NULL,
  `table` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `_meta_form`
--

INSERT INTO `_meta_form` (`id`, `libelle`, `methode`, `action`, `name`, `cible`, `table`) VALUES
(1, 'annonce_recherche', 'post', 'form_recherche_main', 'Annonces', 'Recherche', 'Annonce'),
(2, 'Ajout_menu', 'post', 'form_menu_main', '', '', ''),
(3, 'choix_form', 'post', 'form_recherche_main', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `_meta_menu`
--

CREATE TABLE IF NOT EXISTS `_meta_menu` (
`id` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  `chemin` varchar(400) DEFAULT NULL,
  `id_parent` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `_meta_menu`
--

INSERT INTO `_meta_menu` (`id`, `libelle`, `chemin`, `id_parent`) VALUES
(1, 'Annonce', 'liste_annonce_main', 0),
(2, 'Ajouter', 'form_ann_main', 1),
(3, 'Menu', 'liste_menu_main', 0),
(4, 'Ajouter', 'form_menu_main', 3),
(7, 'Ajouter version', 'form_version_main', 0),
(8, 'accueil', 'accueil', 0),
(9, 'Rechercher', 'form_recherche_main', 0),
(10, 'Formulaire', 'form_ajout_form_main', 0),
(11, 'RÃ©fÃ©rences', 'form_ref_main', 0),
(12, 'Liste Formulaire', 'list_form_main', 0);

-- --------------------------------------------------------

--
-- Structure de la table `_meta_recherche`
--

CREATE TABLE IF NOT EXISTS `_meta_recherche` (
`id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `label` varchar(20) DEFAULT NULL,
  `source_data` varchar(40) DEFAULT NULL,
  `source_table` varchar(40) DEFAULT NULL,
  `donnee_cible` varchar(20) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `operateur` varchar(3) DEFAULT NULL,
  `id_F` int(11) DEFAULT NULL,
  `data` varchar(2000) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `_meta_recherche`
--

INSERT INTO `_meta_recherche` (`id`, `name`, `type`, `label`, `source_data`, `source_table`, `donnee_cible`, `numero`, `operateur`, `id_F`, `data`) VALUES
(1, 'titre', 'text', 'Titre', 'titre', 'Annonce', 'string', 1, '=', 1, ''),
(2, 'titreMenu', 'text', 'Titre', '', '_meta_recherche', 'string', NULL, '', 2, ''),
(3, 'cheminMenu', 'text', 'Chemin', '', '_meta_recherche', 'string', NULL, '', 2, ''),
(4, 'select_form', 'select', '', 'int', '_meta_recherche', 'libelle', NULL, '=', 3, '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
 ADD PRIMARY KEY (`id`), ADD KEY `id_utilisateur` (`id_utilisateur`), ADD KEY `id_ref` (`id_ref`);

--
-- Index pour la table `annonce_recherche`
--
ALTER TABLE `annonce_recherche`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reference`
--
ALTER TABLE `reference`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ref_cat`
--
ALTER TABLE `ref_cat`
 ADD PRIMARY KEY (`id_ref`,`id_cat`), ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `version`
--
ALTER TABLE `version`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vers_ref`
--
ALTER TABLE `vers_ref`
 ADD PRIMARY KEY (`id_vers`,`id_ref`), ADD KEY `id_ref` (`id_ref`);

--
-- Index pour la table `_meta_champs`
--
ALTER TABLE `_meta_champs`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `_meta_form`
--
ALTER TABLE `_meta_form`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `_meta_menu`
--
ALTER TABLE `_meta_menu`
 ADD PRIMARY KEY (`id`), ADD KEY `id_parent` (`id_parent`);

--
-- Index pour la table `_meta_recherche`
--
ALTER TABLE `_meta_recherche`
 ADD PRIMARY KEY (`id`), ADD KEY `id_F` (`id_F`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `annonce_recherche`
--
ALTER TABLE `annonce_recherche`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reference`
--
ALTER TABLE `reference`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `version`
--
ALTER TABLE `version`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `_meta_champs`
--
ALTER TABLE `_meta_champs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `_meta_form`
--
ALTER TABLE `_meta_form`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `_meta_menu`
--
ALTER TABLE `_meta_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `_meta_recherche`
--
ALTER TABLE `_meta_recherche`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
