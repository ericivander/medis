-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 10:01 AM
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
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `privilege` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `privilege`) VALUES
('admin', 'admin', 'administrator'),
('umum', 'umum', 'akun umum');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `id_tenaga_medis` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `assignment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id_tenaga_medis`, `id_kota`, `assignment`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(1, 8, 0),
(1, 9, 0),
(1, 10, 0),
(1, 11, 0),
(1, 12, 0),
(1, 13, 0),
(1, 14, 0),
(1, 15, 0),
(1, 16, 0),
(1, 17, 0),
(1, 18, 0),
(1, 19, 0),
(1, 20, 0),
(1, 21, 0),
(1, 22, 0),
(1, 23, 0),
(1, 24, 0),
(1, 25, 0),
(1, 26, 0),
(1, 27, 0),
(1, 28, 0),
(1, 29, 0),
(1, 30, 0),
(1, 31, 0),
(1, 32, 0),
(1, 33, 0),
(1, 34, 0),
(1, 35, 0),
(1, 36, 0),
(1, 37, 0),
(1, 38, 0),
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(2, 4, 0),
(2, 5, 0),
(2, 6, 0),
(2, 7, 1),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1),
(2, 11, 1),
(2, 12, 1),
(2, 13, 1),
(2, 14, 1),
(2, 15, 1),
(2, 16, 1),
(2, 17, 1),
(2, 18, 1),
(2, 19, 1),
(2, 20, 1),
(2, 21, 1),
(2, 22, 1),
(2, 23, 1),
(2, 24, 1),
(2, 25, 1),
(2, 26, 0),
(2, 27, 1),
(2, 28, 1),
(2, 29, 0),
(2, 30, 1),
(2, 31, 0),
(2, 32, 1),
(2, 33, 0),
(2, 34, 0),
(2, 35, 0),
(2, 36, 0),
(2, 37, 0),
(2, 38, 0),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0),
(3, 4, 0),
(3, 5, 0),
(3, 6, 0),
(3, 7, 1),
(3, 8, 1),
(3, 9, 1),
(3, 10, 1),
(3, 11, 1),
(3, 12, 1),
(3, 13, 1),
(3, 14, 1),
(3, 15, 1),
(3, 16, 1),
(3, 17, 1),
(3, 18, 1),
(3, 19, 1),
(3, 20, 1),
(3, 21, 1),
(3, 22, 1),
(3, 23, 1),
(3, 24, 1),
(3, 25, 1),
(3, 26, 0),
(3, 27, 1),
(3, 28, 1),
(3, 29, 0),
(3, 30, 1),
(3, 31, 0),
(3, 32, 1),
(3, 33, 0),
(3, 34, 0),
(3, 35, 0),
(3, 36, 0),
(3, 37, 0),
(3, 38, 0),
(4, 1, 0),
(4, 2, 0),
(4, 3, 0),
(4, 4, 0),
(4, 5, 0),
(4, 6, 0),
(4, 7, 0),
(4, 8, 0),
(4, 9, 0),
(4, 10, 0),
(4, 11, 0),
(4, 12, 0),
(4, 13, 0),
(4, 14, 0),
(4, 15, 0),
(4, 16, 0),
(4, 17, 0),
(4, 18, 0),
(4, 19, 0),
(4, 20, 0),
(4, 21, 0),
(4, 22, 0),
(4, 23, 0),
(4, 24, 0),
(4, 25, 0),
(4, 26, 0),
(4, 27, 0),
(4, 28, 0),
(4, 29, 0),
(4, 30, 0),
(4, 31, 0),
(4, 32, 0),
(4, 33, 0),
(4, 34, 0),
(4, 35, 0),
(4, 36, 0),
(4, 37, 0),
(4, 38, 0),
(5, 1, 0),
(5, 2, 0),
(5, 3, 0),
(5, 4, 0),
(5, 5, 0),
(5, 6, 0),
(5, 7, 1),
(5, 8, 1),
(5, 9, 1),
(5, 10, 1),
(5, 11, 1),
(5, 12, 1),
(5, 13, 1),
(5, 14, 1),
(5, 15, 1),
(5, 16, 1),
(5, 17, 1),
(5, 18, 1),
(5, 19, 1),
(5, 20, 1),
(5, 21, 1),
(5, 22, 1),
(5, 23, 1),
(5, 24, 1),
(5, 25, 1),
(5, 26, 0),
(5, 27, 1),
(5, 28, 1),
(5, 29, 0),
(5, 30, 1),
(5, 31, 0),
(5, 32, 1),
(5, 33, 0),
(5, 34, 0),
(5, 35, 0),
(5, 36, 0),
(5, 37, 0),
(5, 38, 0),
(6, 1, 0),
(6, 2, 0),
(6, 3, 0),
(6, 4, 0),
(6, 5, 0),
(6, 6, 0),
(6, 7, 1),
(6, 8, 1),
(6, 9, 1),
(6, 10, 1),
(6, 11, 1),
(6, 12, 1),
(6, 13, 1),
(6, 14, 1),
(6, 15, 1),
(6, 16, 1),
(6, 17, 1),
(6, 18, 1),
(6, 19, 1),
(6, 20, 1),
(6, 21, 1),
(6, 22, 1),
(6, 23, 1),
(6, 24, 1),
(6, 25, 1),
(6, 26, 0),
(6, 27, 1),
(6, 28, 1),
(6, 29, 0),
(6, 30, 1),
(6, 31, 0),
(6, 32, 1),
(6, 33, 0),
(6, 34, 0),
(6, 35, 0),
(6, 36, 0),
(6, 37, 0),
(6, 38, 0),
(7, 1, 0),
(7, 2, 0),
(7, 3, 0),
(7, 4, 0),
(7, 5, 0),
(7, 6, 0),
(7, 7, 0),
(7, 8, 0),
(7, 9, 0),
(7, 10, 0),
(7, 11, 0),
(7, 12, 0),
(7, 13, 0),
(7, 14, 0),
(7, 15, 0),
(7, 16, 0),
(7, 17, 0),
(7, 18, 0),
(7, 19, 0),
(7, 20, 0),
(7, 21, 0),
(7, 22, 0),
(7, 23, 0),
(7, 24, 0),
(7, 25, 0),
(7, 26, 0),
(7, 27, 0),
(7, 28, 0),
(7, 29, 0),
(7, 30, 0),
(7, 31, 0),
(7, 32, 0),
(7, 33, 0),
(7, 34, 0),
(7, 35, 0),
(7, 36, 0),
(7, 37, 0),
(7, 38, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bencana`
--

CREATE TABLE IF NOT EXISTS `bencana` (
  `id_bencana` int(10) NOT NULL,
  `nama_bencana` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bencana`
--

INSERT INTO `bencana` (`id_bencana`, `nama_bencana`) VALUES
(6, 'Gempa Bumi'),
(7, 'Tanah Longsor'),
(8, 'Banjir'),
(9, 'Tsunami'),
(10, 'Kekeringan'),
(11, 'Erosi'),
(12, 'Gunung Berapi'),
(13, 'Kebakaran Hutan'),
(14, 'Kerusuhan Massal');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `id_biaya` int(10) NOT NULL,
  `id_tenaga_medis` int(10) NOT NULL,
  `id_kota` int(10) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

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
(70, 7, 5, 8),
(71, 1, 6, 13),
(72, 2, 6, 30),
(73, 3, 6, 15),
(74, 5, 6, 44),
(75, 7, 6, 20);

-- --------------------------------------------------------

--
-- Table structure for table `kab_kota`
--

CREATE TABLE IF NOT EXISTS `kab_kota` (
  `id_kota` int(10) NOT NULL,
  `nama_kota` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kab_kota`
--

INSERT INTO `kab_kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Kota Surabaya'),
(2, 'Sidoarjo'),
(3, 'Kota Mojokerto'),
(4, 'Kabupaten Mojokerto'),
(5, 'Gresik'),
(6, 'Lamongan'),
(7, 'Tuban'),
(8, 'Bojonegoro'),
(9, 'Bangkalan'),
(10, 'Sampang'),
(11, 'Pamekasan'),
(12, 'Sumenep'),
(13, 'Ngawi'),
(14, 'Magetan'),
(15, 'Kota Madiun'),
(16, 'Kabupaten Madiun'),
(17, 'Kota Kediri'),
(18, 'Kabupaten Kediri'),
(19, 'Nganjuk'),
(20, 'Jombang'),
(21, 'Ponorogo'),
(22, 'Pacitan'),
(23, 'Trenggalek'),
(24, 'Tulungagung'),
(25, 'Kodya Blitar'),
(26, 'Kabupaten Blitar'),
(27, 'Kodya Pasuruan'),
(28, 'Kabupaten Pasuruan'),
(29, 'Kodya Probolinggo'),
(30, 'Kab. Probolinggo'),
(31, 'Situbondo'),
(32, 'Bondowoso'),
(33, 'Kota Malang'),
(34, 'Kabupaten Malang'),
(35, 'Kota Batu'),
(36, 'Lumajang'),
(37, 'Jember'),
(38, 'Banyuwangi');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE IF NOT EXISTS `keahlian` (
  `id_keahlian` int(10) NOT NULL,
  `nama_keahlian` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `nama_keahlian`) VALUES
(1, 'Bedah Umum'),
(2, 'Jantung'),
(3, 'Kandungan'),
(4, 'Kulit'),
(5, 'Koordinator'),
(6, 'Asisten'),
(7, 'Dokter Utama'),
(8, 'Pembantu Dokter'),
(9, 'Pulmonologi'),
(10, 'Penyakit Dalam'),
(11, 'Anastesi'),
(12, 'Forensik'),
(13, 'Psikiater'),
(14, 'DVI'),
(15, 'Orthopedi'),
(16, 'Anak'),
(17, 'Obsygn'),
(18, 'Bedah Plastik'),
(19, 'Intensive Care');

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
(10, 7),
(11, 7),
(13, 10),
(13, 9),
(14, 11),
(14, 1),
(14, 14),
(14, 12),
(14, 15),
(14, 10),
(14, 13),
(9, 16),
(9, 11),
(9, 1),
(9, 12),
(9, 15),
(9, 10),
(9, 13),
(8, 16),
(8, 11),
(8, 18),
(8, 1),
(8, 14),
(8, 12),
(8, 17),
(8, 15),
(8, 10),
(8, 13),
(8, 9),
(6, 16),
(6, 11),
(6, 18),
(6, 1),
(6, 14),
(6, 12),
(6, 17),
(6, 15),
(6, 10),
(6, 13),
(7, 16),
(7, 11),
(7, 18),
(7, 1),
(7, 14),
(7, 12),
(7, 17),
(7, 15),
(7, 10),
(7, 13),
(7, 9),
(12, 11),
(12, 18),
(12, 1),
(12, 12),
(12, 19),
(12, 10),
(12, 13);

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
(12, 6),
(21, 6),
(22, 6),
(18, 6),
(23, 6),
(24, 6),
(26, 6),
(34, 6),
(36, 6),
(37, 6),
(38, 6),
(28, 6),
(30, 6),
(31, 6),
(12, 7),
(28, 7),
(30, 7),
(35, 7),
(22, 7),
(23, 7),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 8),
(27, 8),
(28, 8),
(34, 8),
(31, 8),
(38, 8),
(36, 8),
(20, 8),
(1, 9),
(23, 9),
(24, 9),
(34, 9),
(36, 9),
(37, 9),
(26, 9),
(11, 10),
(12, 10),
(7, 10),
(8, 10),
(28, 10),
(30, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(18, 10),
(19, 10),
(20, 10),
(21, 10),
(22, 10),
(23, 10),
(24, 10),
(9, 11),
(10, 11),
(11, 11),
(15, 11),
(21, 11),
(22, 11),
(23, 11),
(25, 11),
(27, 11),
(30, 11),
(32, 11),
(14, 12),
(21, 12),
(16, 12),
(18, 12),
(19, 12),
(26, 12),
(34, 12),
(3, 12),
(4, 12),
(28, 12),
(30, 12),
(32, 12),
(36, 12),
(37, 12),
(38, 12);

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
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD KEY `fk_assignment_tenagamedis` (`id_tenaga_medis`), ADD KEY `fk_assignment_kabkota` (`id_kota`);

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
  MODIFY `id_bencana` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `kab_kota`
--
ALTER TABLE `kab_kota`
  MODIFY `id_kota` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id_keahlian` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
ADD CONSTRAINT `fk_assignment_kabkota` FOREIGN KEY (`id_kota`) REFERENCES `kab_kota` (`id_kota`),
ADD CONSTRAINT `fk_assignment_tenagamedis` FOREIGN KEY (`id_tenaga_medis`) REFERENCES `tenaga_medis` (`id_tenaga_medis`);

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
