-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 oct. 2021 à 08:22
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `photographics`
--
CREATE DATABASE IF NOT EXISTS `photographics` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `photographics`;
-- --------------------------------------------------------

--
-- Structure de la table `admin`
--
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_Login` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Admin_Password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Admin_DATH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Admin_AuthToken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- Structure de la table `photography`
--
DROP TABLE IF EXISTS `photography`;
CREATE TABLE IF NOT EXISTS `photography` (
  `Photo_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Photo_Link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Photo_Size` int(11) DEFAULT NULL,
  `Photo_Tags` int(11) DEFAULT NULL,
  `Photo_UploaderID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Photo_ID`),
  KEY `Photo_UploaderID` (`Photo_UploaderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- Structure de la table `selectedtag`
--
DROP TABLE IF EXISTS `selectedtag`;
CREATE TABLE IF NOT EXISTS `selectedtag` (
  `SelectedTag_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SelectedTag_PhotoID` int(11) DEFAULT NULL,
  `SelectedTag_Tags_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`SelectedTag_ID`),
  KEY `SelectedTag_PhotoID` (`SelectedTag_PhotoID`),
  KEY `SelectedTag_Tags_ID` (`SelectedTag_Tags_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- Structure de la table `tags`
--
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `Tags_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tags_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Tags_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;