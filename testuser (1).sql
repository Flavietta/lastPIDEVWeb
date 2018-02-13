-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2018 at 05:35 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conseil`
--

CREATE TABLE `conseil` (
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `refc` int(11) NOT NULL,
  `categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `reff` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `pro_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `pro_code`) VALUES
(1, 'Flavio', 'flavio', 'saidi3mahdi@gmail.com', 'saidi3mahdi@gmail.com', 1, NULL, '$2y$13$O/KxjXnsqH7vzYpuURJ7EuD6kaiQLbkPYflDuo04e9byvvj/MCQPG', '2018-02-08 04:58:05', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', NULL),
(2, 'hamma', 'lsahdksalkh', ';ashkdsadk', 's;adkhas;dhk', 2, 'asdjksadoqiw', 'aaaa', NULL, 'saldhsadhkasd;', NULL, '', 210937),
(3, 'Mahdou', 'mahdou', 'Flavio@hotmail.com', 'flavio@hotmail.com', 1, NULL, '$2y$13$td.b/geYPUURWgP7vu23..mNUTQuo8sHSAewQPGeEpFHc0cf56jpq', '2018-01-30 00:06:34', NULL, NULL, 'a:0:{}', NULL),
(4, 'hamma', 'hamma', 'Hamma@gmail.com', 'hamma@gmail.com', 1, NULL, '$2y$13$I6njKRuLTt2bQ6UrZbTZYORSJhbzRdSPs5PiBMp0xfqmMcjJltaE.', '2018-01-30 00:21:34', NULL, NULL, 'a:0:{}', NULL),
(5, 'mahdi', 'mahdi', 'ramzi@hotmail.fr', 'ramzi@hotmail.fr', 1, NULL, '$2y$13$TYgL9RKgZQX2hY/nlHmE3e1bBF21dNP53htIZe9xzOb2NxYj4qQoa', '2018-01-29 23:23:42', NULL, NULL, 'a:0:{}', NULL),
(6, 'hamza', 'hamza', 'hamza@hotmail.com', 'hamza@hotmail.com', 1, NULL, '$2y$13$l2h3TSpPU5MCQ7FTtXg7SuvOWlIWW6fA2mxLbnXmr9IgeW0nIcZwK', '2018-01-29 23:41:47', NULL, NULL, 'a:0:{}', NULL),
(7, 'lotfi', 'lotfi', 'lotfi@hotmail.com', 'lotfi@hotmail.com', 1, NULL, '$2y$13$NhHdMXHK3Sy.sxzbAwFMIO.BIkBnEPXE.TEIQrUQhUh42v3IjeTMi', '2018-01-29 23:42:49', NULL, NULL, 'a:0:{}', NULL),
(8, 'moza', 'moza', 'moza@gmail.com', 'moza@gmail.com', 1, NULL, '$2y$13$OdzDuFyV1SF.Zdh1RvC.WeWteCPtf3jfYyTQSYwjKuGgn1qCyal2m', '2018-01-29 23:58:06', NULL, NULL, 'a:0:{}', NULL),
(9, 'amine', 'amine', 'amine@gmail.com', 'amine@gmail.com', 1, NULL, '$2y$13$r9RfAm3BFN/EoyCWIkdDC.NwVmCaKtwmyE.CvVK39mHAYlcpUprk6', '2018-01-30 00:11:09', NULL, NULL, 'a:0:{}', NULL),
(10, 'ABDOU', 'abdou', 'abdou@gmail.com', 'abdou@gmail.com', 1, NULL, '$2y$13$dxMe5zDPf0S6nsbQJtuUMey2DZrRurYbruhyFEnxiNW4f6oQtnSCa', '2018-02-08 05:00:22', NULL, NULL, 'a:0:{}', NULL),
(11, 'amine1', 'amine1', 'amine1@j.com', 'amine1@j.com', 1, NULL, '$2y$13$2GEj8Mznh2yLFnbOpl9IKuwUYAPNmZykhgKteIlQf02psGCHte4KW', '2018-01-30 00:48:44', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `refp` varchar(255) NOT NULL,
  `nomp` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soin`
--

CREATE TABLE `soin` (
  `refs` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `symptome` varchar(500) NOT NULL,
  `categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conseil`
--
ALTER TABLE `conseil`
  ADD PRIMARY KEY (`refc`),
  ADD KEY `categ` (`categ`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`reff`),
  ADD KEY `cat` (`categ`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`refp`),
  ADD KEY `categP` (`categ`);

--
-- Indexes for table `soin`
--
ALTER TABLE `soin`
  ADD PRIMARY KEY (`refs`),
  ADD KEY `categS` (`categ`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conseil`
--
ALTER TABLE `conseil`
  ADD CONSTRAINT `categ` FOREIGN KEY (`categ`) REFERENCES `categorie` (`id`);

--
-- Constraints for table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `cat` FOREIGN KEY (`categ`) REFERENCES `categorie` (`id`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `categP` FOREIGN KEY (`categ`) REFERENCES `categorie` (`id`);

--
-- Constraints for table `soin`
--
ALTER TABLE `soin`
  ADD CONSTRAINT `categS` FOREIGN KEY (`categ`) REFERENCES `categorie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
