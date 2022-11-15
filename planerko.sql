-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 03:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planerko`
--

-- --------------------------------------------------------

--
-- Table structure for table `dogadjaj`
--

CREATE TABLE `dogadjaj` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `lokacija` varchar(255) NOT NULL,
  `vremeod` datetime NOT NULL,
  `vremedo` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dogadjaj`
--

INSERT INTO `dogadjaj` (`id`, `naslov`, `opis`, `lokacija`, `vremeod`, `vremedo`, `user_id`) VALUES
(9, 'Rafting', 'Odlazak na rafting rekom Tarom', 'Rafting centar RT', '2022-07-22 08:00:00', '2022-07-24 22:00:00', 2),
(10, 'Jahanje', 'Jahanje na hipodromu na Banovom brdu', 'Banovo brdo', '2022-06-28 16:00:00', '2022-06-28 19:00:00', 1),
(11, 'More', 'Odlazak na more sa deckom', 'Lefkada', '2022-08-03 05:59:00', '2022-08-14 00:00:00', 2),
(12, 'Diplomiranje', 'Kraj cetvrte godine', 'Fakultet organizacionih nauka', '2022-09-20 03:16:00', '2022-09-20 10:30:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Sofija', 'sofija'),
(2, 'Andjela', 'andjela');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dogadjaj`
--
ALTER TABLE `dogadjaj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dogadjaj`
--
ALTER TABLE `dogadjaj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
