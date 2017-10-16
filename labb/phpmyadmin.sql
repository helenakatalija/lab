-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:8889
-- Tid vid skapande: 09 okt 2017 kl 13:36
-- Serverversion: 5.6.35
-- PHP-version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `labb3`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Author`
--

CREATE TABLE `Author` (
  `Firstname` varchar(60) CHARACTER SET latin1 NOT NULL,
  `Lastname` varchar(60) CHARACTER SET latin1 NOT NULL,
  `Social security nr` int(11) DEFAULT NULL,
  `Birthyear` int(11) DEFAULT NULL,
  `Website` varchar(60) CHARACTER SET latin1 NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `Book`
--

CREATE TABLE `Book` (
  `Number of pages` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `title` varchar(11) CHARACTER SET latin1 NOT NULL,
  `Edition` varchar(11) CHARACTER SET latin1 NOT NULL,
  `Year of publish` int(11) NOT NULL,
  `Publishing company` varchar(11) CHARACTER SET latin1 NOT NULL,
  `author` varchar(60) CHARACTER SET latin1 NOT NULL,
  `onloan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Book`
--

INSERT INTO `Book` (`Number of pages`, `ISBN`, `title`, `Edition`, `Year of publish`, `Publishing company`, `author`, `onloan`) VALUES
(55, 423, 'Wordpress', 'second', 2013, 'Company', 'Mattias Månsson', 1),
(23, 765, 'Harry pott', 'second', 2015, 'Apa', 'Karina Nas', 1),
(44, 3414, 'Life of pi', 'second', 2015, 'Apa', 'Helena Karlsson', 0),
(58, 4662, 'PHP', 'third', 2017, 'Nordsjö', 'Johan Kohlin', 1),
(232, 42435, 'Javascript', 'third', 1980, 'Company', 'Anders Rudgård', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `Created`
--

CREATE TABLE `Created` (
  `author ID` int(11) NOT NULL,
  `book ISBN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `reserved`
--

CREATE TABLE `reserved` (
  `title` varchar(60) CHARACTER SET latin1 NOT NULL,
  `ISBN` int(60) NOT NULL,
  `author` varchar(60) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` char(50) NOT NULL,
  `userpass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`userid`, `username`, `userpass`) VALUES
(1, 'helena', 'f0578f1e7174b1a41c4ea8c6e17f7a8a3b88c92a'),
(2, 'Andre', '8be52126a6fde450a7162a3651d589bb51e9579d');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Index för tabell `Created`
--
ALTER TABLE `Created`
  ADD PRIMARY KEY (`author ID`,`book ISBN`),
  ADD KEY `book ISBN` (`book ISBN`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Author`
--
ALTER TABLE `Author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `Created`
--
ALTER TABLE `Created`
  ADD CONSTRAINT `created_ibfk_1` FOREIGN KEY (`author ID`) REFERENCES `Author` (`ID`),
  ADD CONSTRAINT `created_ibfk_2` FOREIGN KEY (`book ISBN`) REFERENCES `Book` (`ISBN`);
