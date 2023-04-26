-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 04:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_yoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `username`, `password`) VALUES
(1, 'yoga', 'dhania', 'dhania');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(23) NOT NULL,
  `tempat_pelanggan` varchar(30) NOT NULL,
  `tl_pelanggan` date DEFAULT NULL,
  `jk_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `pembayaran_pelanggan` int(11) NOT NULL,
  `tgl_booking` date DEFAULT NULL,
  `bukti_booking` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(25) NOT NULL,
  `kelas_harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas_id`, `kelas_nama`, `kelas_harga`) VALUES
(1, 'Care', 1000000),
(2, 'Body', 600000),
(3, 'Hot', 1300000),
(4, 'Mind', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `kontak_id` int(25) NOT NULL,
  `Kontak_nama` varchar(25) NOT NULL,
  `kontak_email` varchar(250) NOT NULL,
  `Kontak_subjek` varchar(50) NOT NULL,
  `kontak_pesan` longtext NOT NULL,
  `kontak_testimoni` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`kontak_id`, `Kontak_nama`, `kontak_email`, `Kontak_subjek`, `kontak_pesan`, `kontak_testimoni`) VALUES
(1, 'faiz athaya', 'faizathayaramadhan@gmail.com', 'pesenan', 'asd', 'asd dasdasdasdsadasdasasdasdasdasdasdasdasdas asd asd asdasdasd asdasdsa asdasdasdfasdasdasdweasdasdasdasdasasd'),
(2, 'faiz athaya', 'faizathayaramadhan@gmail.com', 'pesenan', 'asd', 'asd'),
(4, 'faiz', 'faizathayaramadhan@gmail.com', 'pesenan', 'asd asdfdas asdas dw ac asd wa asd aw sdad', ' asd asd aw asd asd aw sd aw3e fsadasedaw asd awe asdaw adsr wa sd w asd wae as'),
(5, 'murh', 'mm@gmail.com', 'asd', 'asd asd w asd asd wa asd aw34 asd aw sdaws dasd', 'a sd aew rasdaw3 asdaw4 afasdaw3 asd 3qa dasd'),
(6, '23321', 'asd1', 'pesenan', 'ad', 'asddaqsda sd aer asd aW fasd awe asd'),
(7, 'xdfas', 'sad', 'asd', 'daswe asd aw asdw awsdaswa3 asd', 'daw fasdaw3 asdqet ad aw3 fase qwasd aw sdadas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_yoga`
--

CREATE TABLE `tb_yoga` (
  `id_yoga` int(11) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`kontak_id`);

--
-- Indexes for table `tb_yoga`
--
ALTER TABLE `tb_yoga`
  ADD PRIMARY KEY (`id_yoga`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `kontak_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_yoga`
--
ALTER TABLE `tb_yoga`
  MODIFY `id_yoga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_yoga`
--
ALTER TABLE `tb_yoga`
  ADD CONSTRAINT `tb_yoga_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_booking` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
