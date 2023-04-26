-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2022 pada 17.10
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fys`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `username`, `password`) VALUES
(1, 'tekiro', 'tekiro', 'tekiro'),
(2, 'fys', 'fys', 'fys');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Motor Baru'),
(2, 'Motor Lama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `pdk_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `pdk_merek` varchar(20) NOT NULL,
  `pdk_nama` varchar(100) NOT NULL,
  `pdk_harga` int(20) NOT NULL,
  `pdk_cc` int(20) NOT NULL,
  `pdk_mesin` varchar(20) NOT NULL,
  `pdk_transmisi` varchar(20) NOT NULL,
  `pdk_tangki` varchar(20) NOT NULL,
  `pdk_deskripsi` varchar(200) NOT NULL,
  `pdk_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`pdk_id`, `kategori_id`, `pdk_merek`, `pdk_nama`, `pdk_harga`, `pdk_cc`, `pdk_mesin`, `pdk_transmisi`, `pdk_tangki`, `pdk_deskripsi`, `pdk_gambar`) VALUES
(20, 1, 'Honda', 'Beat', 25000000, 125, 'DHUC3', '320', '300 liter', '<p>wqebqbueqwbeyebqequbqewuqewqwwwwwwwwwwwwwwwwwwwwwwwwwwwwww</p>\r\n', 'mumun.jpg'),
(21, 1, 'Yamaha', '0mwoewqe', 1239124912, 320, 'joreqwe', 'joko', '1023', '', 'dan-gold-N7RiDzfF2iw-unsplash.jpg'),
(22, 1, 'mumun', 'josaln', 2147483647, 123123, 'wqeq', '1231q', '2131', '<hr />\r\n<p>&nbsp;</p>\r\n', 'mumun.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`pdk_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `pdk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
