-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2018 at 11:36 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.15-1+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nordcode_auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE `auto` (
  `id` int(11) NOT NULL,
  `auto_marke` varchar(255) NOT NULL,
  `auto_model` varchar(255) NOT NULL,
  `kaina` int(11) NOT NULL,
  `komentaras` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`id`, `auto_marke`, `auto_model`, `kaina`, `komentaras`) VALUES
(79, 'opel', 'astra', 40000, 'Labai graži mašina.'),
(80, 'bmw', 'm6', 560000, 'Daužtas sparnas.');

-- --------------------------------------------------------

--
-- Table structure for table `savybes`
--

CREATE TABLE `savybes` (
  `id` int(11) NOT NULL,
  `auto_id` int(11) NOT NULL,
  `odinis_s` int(1) NOT NULL DEFAULT '0',
  `oro_k` int(1) NOT NULL DEFAULT '0',
  `klimato_k` int(1) NOT NULL DEFAULT '0',
  `sildomos_s` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savybes`
--

INSERT INTO `savybes` (`id`, `auto_id`, `odinis_s`, `oro_k`, `klimato_k`, `sildomos_s`) VALUES
(243, 79, 1, 1, 0, 0),
(244, 80, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savybes`
--
ALTER TABLE `savybes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `savybes`
--
ALTER TABLE `savybes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
