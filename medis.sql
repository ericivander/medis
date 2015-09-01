-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2015 at 07:51 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `bencana`
--

CREATE TABLE IF NOT EXISTS `bencana` (
  `id_bencana` int(10) NOT NULL,
  `nama_bencana` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bencana`
--

INSERT INTO `bencana` (`id_bencana`, `nama_bencana`) VALUES
(1, 'Angin Topan'),
(2, 'Gunung Meletus'),
(3, 'Gempa Bumi'),
(4, 'Tanah Longsor'),
(5, 'Banjir');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `id_biaya` int(10) NOT NULL,
  `id_tenaga_medis` int(10) NOT NULL,
  `id_kota` int(10) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `id_tenaga_medis`, `id_kota`, `biaya`) VALUES
(36, 1, 1, 10),
(37, 1, 2, 12),
(38, 1, 3, 14),
(39, 1, 4, 5),
(40, 1, 5, 40),
(41, 2, 1, 12),
(42, 2, 2, 40),
(43, 2, 3, 6),
(44, 2, 4, 9),
(45, 2, 5, 19),
(46, 3, 1, 24),
(47, 3, 2, 2),
(48, 3, 3, 14),
(49, 3, 4, 10),
(50, 3, 5, 15),
(51, 4, 1, 2),
(52, 4, 2, 12),
(53, 4, 3, 15),
(54, 4, 4, 9),
(55, 4, 5, 9),
(56, 5, 1, 3),
(57, 5, 2, 14),
(58, 5, 3, 4),
(59, 5, 4, 20),
(60, 5, 5, 10),
(61, 6, 1, 12),
(62, 6, 2, 24),
(63, 6, 3, 4),
(64, 6, 4, 15),
(65, 6, 5, 36),
(66, 7, 1, 12),
(67, 7, 2, 15),
(68, 7, 3, 6),
(69, 7, 4, 16),
(70, 7, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kab_kota`
--

CREATE TABLE IF NOT EXISTS `kab_kota` (
  `id_kota` int(10) NOT NULL,
  `nama_kota` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kab_kota`
--

INSERT INTO `kab_kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Surabaya'),
(2, 'Mojokerto'),
(3, 'Jombang'),
(4, 'Kediri'),
(5, 'Tulungagung');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE IF NOT EXISTS `keahlian` (
  `id_keahlian` int(10) NOT NULL,
  `nama_keahlian` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `nama_keahlian`) VALUES
(1, 'Bedah'),
(2, 'Jantung'),
(3, 'Kandungan'),
(4, 'Kulit'),
(5, 'Koordinator'),
(6, 'Asisten'),
(7, 'DokterUtama'),
(8, 'PembantuDokter');

-- --------------------------------------------------------

--
-- Table structure for table `memerlukan`
--

CREATE TABLE IF NOT EXISTS `memerlukan` (
  `id_bencana` int(10) NOT NULL,
  `id_keahlian` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memerlukan`
--

INSERT INTO `memerlukan` (`id_bencana`, `id_keahlian`) VALUES
(1, 2),
(1, 4),
(2, 3),
(3, 1),
(3, 7),
(4, 3),
(4, 6),
(5, 2),
(5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `memiliki`
--

CREATE TABLE IF NOT EXISTS `memiliki` (
  `id_tenaga_medis` int(10) NOT NULL,
  `id_keahlian` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memiliki`
--

INSERT INTO `memiliki` (`id_tenaga_medis`, `id_keahlian`) VALUES
(1, 1),
(1, 2),
(1, 8),
(2, 3),
(2, 4),
(2, 6),
(3, 1),
(3, 3),
(3, 7),
(4, 2),
(4, 8),
(5, 2),
(5, 4),
(5, 7),
(6, 2),
(6, 2),
(6, 3),
(6, 5),
(7, 1),
(7, 3),
(7, 8),
(2, 7),
(6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pusat_sdm_medis`
--

CREATE TABLE IF NOT EXISTS `pusat_sdm_medis` (
  `id_psm` int(10) NOT NULL,
  `nama_psm` varchar(20) NOT NULL,
  `alamat_psm` varchar(50) NOT NULL,
  `jumlah_sdm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rawan_akan`
--

CREATE TABLE IF NOT EXISTS `rawan_akan` (
  `id_kota` int(10) NOT NULL,
  `id_bencana` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawan_akan`
--

INSERT INTO `rawan_akan` (`id_kota`, `id_bencana`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 3),
(3, 4),
(4, 5),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_medis`
--

CREATE TABLE IF NOT EXISTS `tenaga_medis` (
  `id_tenaga_medis` int(10) NOT NULL,
  `id_kota` int(10) DEFAULT NULL,
  `id_psm` int(10) DEFAULT NULL,
  `nama_tenaga_medis` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenaga_medis`
--

INSERT INTO `tenaga_medis` (`id_tenaga_medis`, `id_kota`, `id_psm`, `nama_tenaga_medis`) VALUES
(1, NULL, NULL, 'Andi'),
(2, NULL, NULL, 'Budi'),
(3, NULL, NULL, 'Cici'),
(4, NULL, NULL, 'Dedi'),
(5, NULL, NULL, 'Evan'),
(6, NULL, NULL, 'Fitri'),
(7, NULL, NULL, 'Gisma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id_bencana`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`), ADD KEY `fk_biaya_tm` (`id_tenaga_medis`), ADD KEY `fk_biaya_kk` (`id_kota`);

--
-- Indexes for table `kab_kota`
--
ALTER TABLE `kab_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indexes for table `memerlukan`
--
ALTER TABLE `memerlukan`
  ADD KEY `fk_perlu_ben` (`id_bencana`), ADD KEY `fk_perlu_job` (`id_keahlian`);

--
-- Indexes for table `memiliki`
--
ALTER TABLE `memiliki`
  ADD KEY `fk_milik_job` (`id_keahlian`), ADD KEY `fk_milik_tm` (`id_tenaga_medis`);

--
-- Indexes for table `pusat_sdm_medis`
--
ALTER TABLE `pusat_sdm_medis`
  ADD PRIMARY KEY (`id_psm`);

--
-- Indexes for table `rawan_akan`
--
ALTER TABLE `rawan_akan`
  ADD KEY `fk_ra_kk` (`id_kota`), ADD KEY `fk_ra_ben` (`id_bencana`);

--
-- Indexes for table `tenaga_medis`
--
ALTER TABLE `tenaga_medis`
  ADD PRIMARY KEY (`id_tenaga_medis`), ADD KEY `fk_tm_psm` (`id_psm`), ADD KEY `fk_tm_kk` (`id_kota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id_bencana` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `kab_kota`
--
ALTER TABLE `kab_kota`
  MODIFY `id_kota` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id_keahlian` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pusat_sdm_medis`
--
ALTER TABLE `pusat_sdm_medis`
  MODIFY `id_psm` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tenaga_medis`
--
ALTER TABLE `tenaga_medis`
  MODIFY `id_tenaga_medis` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `biaya`
--
ALTER TABLE `biaya`
ADD CONSTRAINT `fk_biaya_kk` FOREIGN KEY (`id_kota`) REFERENCES `kab_kota` (`id_kota`),
ADD CONSTRAINT `fk_biaya_tm` FOREIGN KEY (`id_tenaga_medis`) REFERENCES `tenaga_medis` (`id_tenaga_medis`);

--
-- Constraints for table `memerlukan`
--
ALTER TABLE `memerlukan`
ADD CONSTRAINT `fk_perlu_bencana` FOREIGN KEY (`id_bencana`) REFERENCES `bencana` (`id_bencana`),
ADD CONSTRAINT `fk_perlu_job` FOREIGN KEY (`id_keahlian`) REFERENCES `keahlian` (`id_keahlian`);

--
-- Constraints for table `memiliki`
--
ALTER TABLE `memiliki`
ADD CONSTRAINT `fk_milik_job` FOREIGN KEY (`id_keahlian`) REFERENCES `keahlian` (`id_keahlian`),
ADD CONSTRAINT `fk_milik_tm` FOREIGN KEY (`id_tenaga_medis`) REFERENCES `tenaga_medis` (`id_tenaga_medis`);

--
-- Constraints for table `rawan_akan`
--
ALTER TABLE `rawan_akan`
ADD CONSTRAINT `fa_ra_bencana` FOREIGN KEY (`id_bencana`) REFERENCES `bencana` (`id_bencana`),
ADD CONSTRAINT `fk_ra_kk` FOREIGN KEY (`id_kota`) REFERENCES `kab_kota` (`id_kota`);

--
-- Constraints for table `tenaga_medis`
--
ALTER TABLE `tenaga_medis`
ADD CONSTRAINT `fk_tm_kk` FOREIGN KEY (`id_kota`) REFERENCES `kab_kota` (`id_kota`),
ADD CONSTRAINT `fk_tm_psm` FOREIGN KEY (`id_psm`) REFERENCES `pusat_sdm_medis` (`id_psm`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
