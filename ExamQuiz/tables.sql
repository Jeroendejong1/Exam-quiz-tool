-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 mei 2017 om 07:26
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_quiz`
--
CREATE DATABASE IF NOT EXISTS `exam_quiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `exam_quiz`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `exam`
--

CREATE TABLE `exam` (
  `examID` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(240) DEFAULT NULL COMMENT 'in minutes',
  `requiredScore` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person`
--

CREATE TABLE `person` (
  `personID` int(11) NOT NULL,
  `role` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `question`
--

CREATE TABLE `question` (
  `questionID` int(5) NOT NULL,
  `examID` int(6) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correctans1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correctans2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correctans3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wrongans1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wrongans2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wrongans3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wrongans4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wrongans5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `casus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `points` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `score`
--

CREATE TABLE `score` (
  `scoreID` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `examId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examID`);

--
-- Indexen voor tabel `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personID`);

--
-- Indexen voor tabel `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexen voor tabel `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`scoreID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `exam`
--
ALTER TABLE `exam`
  MODIFY `examID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `person`
--
ALTER TABLE `person`
  MODIFY `personID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `question`
--
ALTER TABLE `question`
  MODIFY `questionID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `score`
--
ALTER TABLE `score`
  MODIFY `scoreID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
