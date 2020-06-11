-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 10:06 PM
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
-- Database: `hoteli`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotelcic`
--

CREATE TABLE `hotelcic` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `menadzerID` int(11) NOT NULL,
  `slika` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotelcic`
--

INSERT INTO `hotelcic` (`id`, `naziv`, `adresa`, `telefon`, `opis`, `menadzerID`, `slika`) VALUES
(1, 'Hyatt Regency - Paris', '3 Place du General Koenig, 75017 Paris', '+33 1 40 68 12 34', 'Jedan od najboljih hotela u srcu Pariza', 2, 'hotel1.jpg'),
(2, 'Hyatt Place - London', ' 30 Portman Square, Marylebone, London', '+44 20 7486 5800', 'Jedan od najpoznatijih hotela u Londonu', 2, 'hotel1.webp'),
(3, 'Hyatt Reagency - Belgrade', 'Milentija Popovica 5, Beograd', '011 3011234', 'Hotel smesten na Novom Beogradu, jedan je od najboljih hotela u Beogradu', 4, 'hotel2.webp'),
(4, 'Hyatt Place - Chicago', '151 E Wacker Dr, Chicago, IL', '+1 312-565-1234', 'Najveci hotel u srcu grada Cikaga', 4, 'hotel3.webp');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `korisnickoIme` varchar(50) NOT NULL,
  `lozinka` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `tipKorisnika` enum('Klijent','Menadzer','Administrator','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `korisnickoIme`, `lozinka`, `email`, `telefon`, `tipKorisnika`) VALUES
(1, 'admin', 'admin', 'admino@hyatt.com', 'xxxx', 'Administrator'),
(2, 'menadzer', 'menadzer', 'menadzer1@hyatt.com', '060/2525255', 'Menadzer'),
(3, 'NikolaMilojic', '123', 'mnikolasd@gmail.com', '063/72-99-599', 'Klijent'),
(4, 'menadzer2', 'menadzer2', 'menadzer2@hyatt.com', '060/220-509-609', 'Menadzer');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id` int(11) NOT NULL,
  `idSobe` int(11) NOT NULL,
  `cenaRezervacije` float NOT NULL,
  `datumDolaska` varchar(50) NOT NULL,
  `datumOdlaska` varchar(50) NOT NULL,
  `nazivHotela` varchar(50) NOT NULL,
  `status` enum('Rezervisano','Stigao','Otisao','') NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `idKorisnika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`id`, `idSobe`, `cenaRezervacije`, `datumDolaska`, `datumOdlaska`, `nazivHotela`, `status`, `komentar`, `idKorisnika`) VALUES
(16, 2, 2000, '2019-09-10', '2019-09-12', 'Hyatt Regency - Paris', 'Rezervisano', '4*', 3);

-- --------------------------------------------------------

--
-- Table structure for table `soba`
--

CREATE TABLE `soba` (
  `id` int(11) NOT NULL,
  `idHotela` int(11) NOT NULL,
  `tipSobe` int(11) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `brojSoba` int(11) NOT NULL,
  `brojSlobodnihSoba` int(11) NOT NULL,
  `cena` float NOT NULL,
  `slika` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soba`
--

INSERT INTO `soba` (`id`, `idHotela`, `tipSobe`, `opis`, `brojSoba`, `brojSlobodnihSoba`, `cena`, `slika`) VALUES
(1, 1, 1, 'Soba sa velikim bracnim krevetom', 5, 5, 800, 'soba1.jpg'),
(2, 1, 1, 'Moderna velika soba sa bracnim krevetom', 10, 9, 1000, 'soba2.jpg'),
(3, 1, 1, 'LUX soba sa bracnim krevetom', 7, 7, 1200, 'soba3.jpg'),
(4, 2, 1, 'Romenticna velika soba sa bracin krevetom', 7, 7, 1000, 'soba4.jpg'),
(5, 2, 1, 'Soba sa velikim krevetom (Pogodna za poslovni put)', 9, 9, 720, 'soba5.jpg'),
(6, 3, 2, 'Velika dvokrevetna soba sa dnevnom sobom', 5, 5, 1700, 'soba6.jpg'),
(7, 3, 1, 'LUX soba sa bracnim krevetom i dnevnom sobom', 7, 7, 950, 'soba7.jpg'),
(8, 3, 3, 'Trokrevetna soba sa dnevnom sobom', 8, 8, 2000, 'soba8.jpg'),
(9, 4, 3, 'Velika trokrevetna soba', 5, 6, 2200, 'soba9.jpg'),
(10, 4, 3, 'Trokrevetna soba (Pogodna za poslovnu put)', 7, 7, 1700, 'soba10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tipsobe`
--

CREATE TABLE `tipsobe` (
  `id` int(11) NOT NULL,
  `vrsta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipsobe`
--

INSERT INTO `tipsobe` (`id`, `vrsta`) VALUES
(1, 'Bracna'),
(2, 'Dvokrevetna'),
(3, 'Trokrevetna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotelcic`
--
ALTER TABLE `hotelcic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menadzerID` (`menadzerID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSobe` (`idSobe`),
  ADD KEY `idKorisnika` (`idKorisnika`);

--
-- Indexes for table `soba`
--
ALTER TABLE `soba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHotela` (`idHotela`),
  ADD KEY `tipSobe` (`tipSobe`);

--
-- Indexes for table `tipsobe`
--
ALTER TABLE `tipsobe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotelcic`
--
ALTER TABLE `hotelcic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `soba`
--
ALTER TABLE `soba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tipsobe`
--
ALTER TABLE `tipsobe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotelcic`
--
ALTER TABLE `hotelcic`
  ADD CONSTRAINT `hotelcic_ibfk_1` FOREIGN KEY (`menadzerID`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`idKorisnika`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `rezervacija_ibfk_2` FOREIGN KEY (`idSobe`) REFERENCES `soba` (`id`);

--
-- Constraints for table `soba`
--
ALTER TABLE `soba`
  ADD CONSTRAINT `soba_ibfk_1` FOREIGN KEY (`tipSobe`) REFERENCES `tipsobe` (`id`),
  ADD CONSTRAINT `soba_ibfk_2` FOREIGN KEY (`idHotela`) REFERENCES `hotelcic` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
