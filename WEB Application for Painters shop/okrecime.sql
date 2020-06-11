-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 03:12 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `okrecime`
--

-- --------------------------------------------------------

--
-- Table structure for table `boje`
--

CREATE TABLE `boje` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `slika` varchar(30) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boje`
--

INSERT INTO `boje` (`id`, `ime`, `slika`, `cena`) VALUES
(1, 'CRVENA', 'crvena.jpg', 50),
(2, 'LJUBICASTA', 'ljubicasta.png', 50),
(3, 'PLAVA', 'PLAVA.png', 50),
(4, 'ZELENA', 'zelena.jpg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `tip` varchar(20) NOT NULL,
  `korisnickoime` varchar(20) DEFAULT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `lozinka` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `tip`, `korisnickoime`, `mail`, `lozinka`) VALUES
(3, 'admin', 'admin', 'admin@admin.com', '$2y$10$bwTq5GU9Ap7zWOA3DRPgIOSMKhGNZ00RkqdtKrenTvv18TKUji7xu'),
(6, 'user', 'nikola', 'mnikolasd@gmail.com', '$2y$10$zX614pSloW5zwUyu0N6wDe1AqpOfNH.i7HoNpIYjAoxKIvaKC1O0y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boje`
--
ALTER TABLE `boje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boje`
--
ALTER TABLE `boje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
