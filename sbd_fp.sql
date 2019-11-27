-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 01:19 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbd_fp`
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

--
-- Dumping data for table `detil_rumahsakit`
--

INSERT INTO `detil_rumahsakit` (`id_vaksin`, `id_rumahsakit`, `biaya`) VALUES
('V00001', 'R00001', '50000.00'),
('V00001', 'R00002', '45000.00'),
('V00001', 'R00003', '65000.00'),
('V00001', 'R00004', '65000.00'),
('V00002', 'R00001', '100000.00'),
('V00002', 'R00002', '95000.00'),
('V00002', 'R00003', '150000.00'),
('V00002', 'R00004', '125000.00'),
('V00002', 'R00005', '165000.00'),
('V00002', 'R00006', '145000.00'),
('V00003', 'R00001', '225000.00'),
('V00003', 'R00002', '225000.00'),
('V00003', 'R00003', '250000.00'),
('V00003', 'R00004', '275000.00'),
('V00003', 'R00006', '250000.00'),
('V00004', 'R00001', '225000.00'),
('V00004', 'R00003', '250000.00'),
('V00004', 'R00006', '275000.00'),
('V00005', 'R00003', '275000.00'),
('V00005', 'R00004', '275000.00'),
('V00006', 'R00003', '600000.00'),
('V00006', 'R00004', '650000.00'),
('V00006', 'R00005', '750000.00'),
('V00006', 'R00006', '800000.00'),
('V00007', 'R00004', '425000.00'),
('V00007', 'R00005', '450000.00'),
('V00007', 'R00006', '475000.00'),
('V00008', 'R00001', '150000.00'),
('V00008', 'R00002', '175000.00'),
('V00008', 'R00004', '150000.00'),
('V00008', 'R00005', '165000.00'),
('V00009', 'R00004', '425000.00'),
('V00009', 'R00006', '425000.00'),
('V00010', 'R00001', '350000.00'),
('V00010', 'R00003', '325000.00'),
('V00010', 'R00005', '350000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `username` varchar(20) NOT NULL,
  `nama_pasien` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`username`, `nama_pasien`, `password`, `tgl_lahir`, `jenis_kelamin`, `alamat`) VALUES
('a', 'a', '0cc175b9c0f1b6a831c399e269772661', '2007-12-01', 'l', 'a'),
('z', 'z', 'fbade9e36a3f36d3d676c1b808451dd7', '2007-12-01', 'p', 'z');

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

--
-- Dumping data for table `rumahsakit`
--

INSERT INTO `rumahsakit` (`id_rumahsakit`, `nama_rumahsakit`, `alamat`, `no_telp`) VALUES
('R00001', 'Puskesmas Permata Bunda', 'Jl. Soekarno Hatta No. 67', '0314528329'),
('R00002', 'Puskesmas Sehat Selalu', 'Jl. Anggrek No. 101', '0315483648'),
('R00003', 'Rumah Sakit Jaya Abadi', 'Jl. Cempaka No. 1', '0318748382'),
('R00004', 'Rumah Sakit Elizabeth', 'Jl. Medan Raya No. 83', '0317472929'),
('R00005', 'Rumah Sakit Harapan Bangsa', 'Jl. Singaraja No. 56', '0318472839'),
('R00006', 'Rumah Sakit Pelita Harapan', 'Jl. Bali No. 45', '0318472928');

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

--
-- Dumping data for table `usiapemberian`
--

INSERT INTO `usiapemberian` (`id_usia`, `id_vaksin`, `no_urut`, `usia_pemberian`, `jarak`) VALUES
('U00001', 'V00001', 1, 2, 2),
('U00002', 'V00001', 2, 3, 1),
('U00003', 'V00001', 3, 4, 1),
('U00004', 'V00002', 1, 2, 2),
('U00005', 'V00002', 2, 3, 1),
('U00006', 'V00002', 3, 4, 1),
('U00007', 'V00003', 1, 2, 2),
('U00008', 'V00004', 1, 2, 2),
('U00009', 'V00004', 2, 3, 1),
('U00010', 'V00004', 3, 4, 1),
('U00011', 'V00005', 1, 2, 2),
('U00012', 'V00005', 2, 3, 1),
('U00013', 'V00005', 3, 4, 1),
('U00014', 'V00006', 1, 2, 2),
('U00015', 'V00006', 2, 4, 2),
('U00016', 'V00006', 3, 6, 2),
('U00017', 'V00007', 1, 2, 2),
('U00018', 'V00007', 2, 4, 2),
('U00019', 'V00007', 3, 6, 2),
('U00020', 'V00008', 1, 9, 9),
('U00021', 'V00009', 1, 15, 15),
('U00022', 'V00010', 1, 12, 12);

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
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`id_vaksin`, `nama_vaksin`, `perulangan`) VALUES
('V00001', 'Hepatitis B', 3),
('V00002', 'Polio', 3),
('V00003', 'BCG', 1),
('V00004', 'DPT', 3),
('V00005', 'HiB', 3),
('V00006', 'PCV', 3),
('V00007', 'Rotavirus', 3),
('V00008', 'Campak', 1),
('V00009', 'MMR', 1),
('V00010', 'Varisela', 1);

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
