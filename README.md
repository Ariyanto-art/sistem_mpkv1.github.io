# sistem_mpkv1.github.io
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 04:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsmpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_penerima`
--

CREATE TABLE `daftar_penerima` (
  `id_daftar_penerima` int(11) NOT NULL,
  `id_pb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_penerima`
--

INSERT INTO `daftar_penerima` (`id_daftar_penerima`, `id_pb`) VALUES
(3, 145),
(4, 144),
(5, 143),
(6, 142),
(7, 141),
(8, 140),
(9, 139),
(10, 138),
(11, 137),
(12, 136),
(13, 135),
(14, 134),
(15, 133),
(16, 132),
(17, 131),
(18, 125),
(19, 123),
(20, 122),
(21, 120),
(22, 119),
(23, 118),
(24, 117),
(25, 116),
(26, 115),
(27, 114),
(28, 113),
(29, 112),
(30, 111),
(31, 110),
(32, 108),
(33, 107),
(34, 106),
(35, 105),
(36, 104),
(37, 103),
(38, 101),
(39, 100),
(40, 97),
(41, 96),
(42, 95),
(43, 94),
(44, 93),
(45, 92),
(46, 91),
(47, 90),
(48, 89),
(49, 88),
(50, 87),
(51, 86),
(52, 85),
(53, 84),
(54, 83),
(55, 82),
(56, 81),
(57, 80),
(58, 79),
(59, 77),
(60, 76),
(61, 75),
(62, 74),
(63, 73),
(64, 72),
(65, 71),
(66, 70),
(67, 69),
(68, 68),
(69, 67),
(70, 66),
(71, 65),
(72, 64),
(73, 63),
(74, 62),
(75, 61),
(76, 60),
(77, 59),
(78, 58),
(79, 57),
(80, 55),
(81, 51),
(82, 50),
(83, 49),
(84, 48),
(85, 47),
(86, 46),
(87, 45),
(88, 44),
(89, 43),
(90, 42),
(91, 39),
(92, 38),
(93, 37),
(94, 36),
(95, 35),
(96, 34),
(97, 33),
(98, 32),
(99, 31),
(100, 30),
(101, 29),
(102, 26),
(103, 25),
(104, 24),
(105, 23),
(106, 22),
(107, 21),
(108, 20),
(109, 19),
(110, 17),
(111, 16),
(112, 15),
(113, 14),
(114, 13),
(115, 12),
(116, 11),
(117, 10),
(118, 9),
(119, 8),
(120, 7),
(121, 6),
(122, 5),
(123, 4),
(124, 3),
(125, 2),
(126, 1);

-- --------------------------------------------------------

--
-- Table structure for table `datawarga`
--

CREATE TABLE `datawarga` (
  `id_pb` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `kk` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `jkelamin` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `tl` varchar(25) NOT NULL,
  `tgl` date NOT NULL,
  `ayah` varchar(100) NOT NULL,
  `ibu` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `alasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datawarga`
--

INSERT INTO `datawarga` (`id_pb`, `gambar`, `nama`, `nik`, `kk`, `alamat`, `rt`, `rw`, `jkelamin`, `agama`, `hp`, `tl`, `tgl`, `ayah`, `ibu`, `pendidikan`, `alasan`) VALUES
(1, 'mpk logo.png', 'Martini', '', '', 'Utan Bahagia', '001', '006', 'Perempuan', 'Islam', '', 'Kutoarjo', '1940-06-21', '', '', '', 'Lansia');

-- --------------------------------------------------------

--
-- Table structure for table `data_penerima`
--

CREATE TABLE `data_penerima` (
  `id_data_penerima` int(11) NOT NULL,
  `tgl_penyaluran` date NOT NULL DEFAULT current_timestamp(),
  `id_pb` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `idlogin`
--

CREATE TABLE `idlogin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idlogin`
--

INSERT INTO `idlogin` (`id_user`, `username`, `nama_lengkap`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `lap_penyaluran`
--

CREATE TABLE `lap_penyaluran` (
  `id_lap_penyaluran` int(11) NOT NULL,
  `tanggal_penyaluran` date NOT NULL,
  `tanggal_penerima` date NOT NULL DEFAULT current_timestamp(),
  `id_pb` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_kas` int(11) NOT NULL,
  `tanggal_input` date NOT NULL,
  `kas_masuk` varchar(100) NOT NULL,
  `kas_keluar` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `bank` enum('Dhuafa','MPK','Bank Sampah','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_penerima`
--
ALTER TABLE `daftar_penerima`
  ADD PRIMARY KEY (`id_daftar_penerima`);

--
-- Indexes for table `datawarga`
--
ALTER TABLE `datawarga`
  ADD PRIMARY KEY (`id_pb`);

--
-- Indexes for table `data_penerima`
--
ALTER TABLE `data_penerima`
  ADD PRIMARY KEY (`id_data_penerima`);

--
-- Indexes for table `idlogin`
--
ALTER TABLE `idlogin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `lap_penyaluran`
--
ALTER TABLE `lap_penyaluran`
  ADD PRIMARY KEY (`id_lap_penyaluran`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_kas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_penerima`
--
ALTER TABLE `daftar_penerima`
  MODIFY `id_daftar_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `datawarga`
--
ALTER TABLE `datawarga`
  MODIFY `id_pb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `data_penerima`
--
ALTER TABLE `data_penerima`
  MODIFY `id_data_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=745;

--
-- AUTO_INCREMENT for table `idlogin`
--
ALTER TABLE `idlogin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lap_penyaluran`
--
ALTER TABLE `lap_penyaluran`
  MODIFY `id_lap_penyaluran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
