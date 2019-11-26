-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 08:25 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosbdvital`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_rumahsakit`
--

CREATE TABLE `detil_rumahsakit` (
  `id_vaksin` char(6) NOT NULL,
  `id_rumahsakit` char(6) NOT NULL,
  `biaya` decimal(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `username` varchar(20) NOT NULL,
  `nama_pasien` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rumahsakit`
--

CREATE TABLE `rumahsakit` (
  `id_rumahsakit` char(6) NOT NULL,
  `nama_rumahsakit` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_usia` char(6) NOT NULL,
  `id_rumahsakit` char(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usiapemberian`
--

CREATE TABLE `usiapemberian` (
  `id_usia` char(6) NOT NULL,
  `id_vaksin` char(6) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `usia_pemberian` int(11) NOT NULL,
  `jarak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `id_vaksin` char(6) NOT NULL,
  `nama_vaksin` varchar(20) NOT NULL,
  `perulangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_rumahsakit`
--
ALTER TABLE `detil_rumahsakit`
  ADD PRIMARY KEY (`id_vaksin`,`id_rumahsakit`),
  ADD KEY `id_vaksin` (`id_vaksin`,`id_rumahsakit`),
  ADD KEY `id_rumahsakit` (`id_rumahsakit`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `rumahsakit`
--
ALTER TABLE `rumahsakit`
  ADD PRIMARY KEY (`id_rumahsakit`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_usia` (`id_usia`,`id_rumahsakit`,`username`),
  ADD KEY `username` (`username`),
  ADD KEY `id_rumahsakit` (`id_rumahsakit`);

--
-- Indexes for table `usiapemberian`
--
ALTER TABLE `usiapemberian`
  ADD PRIMARY KEY (`id_usia`),
  ADD KEY `id_vaksin` (`id_vaksin`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_rumahsakit`
--
ALTER TABLE `detil_rumahsakit`
  ADD CONSTRAINT `detil_rumahsakit_ibfk_1` FOREIGN KEY (`id_rumahsakit`) REFERENCES `rumahsakit` (`id_rumahsakit`),
  ADD CONSTRAINT `detil_rumahsakit_ibfk_2` FOREIGN KEY (`id_vaksin`) REFERENCES `vaksin` (`id_vaksin`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_usia`) REFERENCES `usiapemberian` (`id_usia`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pasien` (`username`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_rumahsakit`) REFERENCES `rumahsakit` (`id_rumahsakit`);

--
-- Constraints for table `usiapemberian`
--
ALTER TABLE `usiapemberian`
  ADD CONSTRAINT `usiapemberian_ibfk_1` FOREIGN KEY (`id_vaksin`) REFERENCES `vaksin` (`id_vaksin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
