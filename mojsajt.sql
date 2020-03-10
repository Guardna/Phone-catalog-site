-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 07:18 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mojsajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `galerije`
--

CREATE TABLE `galerije` (
  `id_galerije` int(5) NOT NULL,
  `naziv_galerije` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galerije`
--

INSERT INTO `galerije` (`id_galerije`, `naziv_galerije`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Huawei'),
(4, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `ID` int(11) NOT NULL,
  `Korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(32) NOT NULL,
  `imeprezime` varchar(50) NOT NULL,
  `mejl` varchar(32) NOT NULL,
  `tip` enum('kupac','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ID`, `Korisnicko_ime`, `lozinka`, `imeprezime`, `mejl`, `tip`) VALUES
(12, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Stefan Popovic', 'stefan.popovic.328.15@ict.edu.rs', 'admin'),
(14, 'Neko', 'cc96d05fd5e74bcf6d1d0249a863954f', 'Prezi Ime', 'nesto@gmail.com', 'kupac'),
(18, 'Ness', 'a3f5d7f40bf13b73bdf1ec9d79a4f9db', 'Ness Ness', 'ness@gmail.com', 'kupac');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `id_slike` int(5) NOT NULL,
  `id_galerije` int(5) NOT NULL,
  `naziv_slike` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id_slike`, `id_galerije`, `naziv_slike`, `slika`, `cena`) VALUES
(8, 1, 'Iphone 6', '04.jpg', '10000 eu'),
(7, 1, 'Iphone 7', '03.jpg', '2000 eu'),
(1, 1, 'Iphone X', '01.jpg', '1000 eu'),
(6, 1, 'Iphone 8', '02.jpg', '3000 eu'),
(9, 2, 'Samsung s8', '05.jpg', '4000 eu'),
(10, 2, 'Samsung s7', '06.jpg', '2000 eu'),
(11, 2, 'Samsung s6', '07.jpg', '2500 eu'),
(12, 3, 'Huawei mate 9', '08.jpg', '2000 eu'),
(13, 3, 'Huawei mate 10 Lite', '09.jpg', '3000 eu'),
(14, 4, 'Xiaomi Mi Mix 2', '010.jpg', '4000 eu'),
(15, 4, 'Xiaomi Mi 5', '011.jpg', '10000 eu'),
(16, 4, 'Xiaomi Redmi Note 4', '012.jpg', '600 eu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galerije`
--
ALTER TABLE `galerije`
  ADD PRIMARY KEY (`id_galerije`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Korisnicko_ime` (`Korisnicko_ime`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id_slike`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galerije`
--
ALTER TABLE `galerije`
  MODIFY `id_galerije` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id_slike` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
