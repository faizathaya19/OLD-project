-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2022 pada 14.41
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sehati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_user` varchar(11) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(25) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `nama_user`, `password`, `hak_akses`, `id_admin`) VALUES
('1', 'Faiz athaya', 'faiz', 'admin', 12119185);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_area`
--

CREATE TABLE `tb_data_area` (
  `area_id` int(11) NOT NULL,
  `nama_area` varchar(24) NOT NULL,
  `ongkir_area` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_area`
--

INSERT INTO `tb_data_area` (`area_id`, `nama_area`, `ongkir_area`) VALUES
(1, 'Jakarta', 10000),
(2, 'bogor', 20000),
(3, 'Depok', 30000),
(4, 'tanggerang', 40000),
(5, 'bekasi', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_produk`
--

CREATE TABLE `tb_data_produk` (
  `pdk_data_id` int(11) NOT NULL,
  `ktgr_id` int(11) NOT NULL,
  `pdk_id` int(11) NOT NULL,
  `pdk_ukuran` varchar(15) NOT NULL,
  `pdk_harga` int(20) NOT NULL,
  `pdk_deskripsi` text NOT NULL,
  `pdk_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_produk`
--

INSERT INTO `tb_data_produk` (`pdk_data_id`, `ktgr_id`, `pdk_id`, `pdk_ukuran`, `pdk_harga`, `pdk_deskripsi`, `pdk_gambar`) VALUES
(25, 14, 15, '250gr', 50000, 'Kue Nastar Dengan Menggunakan Campuran Mentega Wisman Dan Mentega Orchid Di Adonannya. Selai Nanas Yang Digunakan Homemade, Rasanya Manis Dan Asam Segar. Kualitas Premium.\r\n\r\nHome Made Tanpa Bahan Pengawet, Tanpa Pemanis Buatan. Menggunakan Nanas Yang Manis Asam Sehingga Rasanya Menyegarkan, Sangat Pas Dicampur Dengan Adonan Kulit Nastar Yang Lembut Dan Renyah. Nanasnya Dijamin Gak Pelit Dan Lumer Dimulut.\r\n', '20220709033743f6f454b0-385a-4e94-8370-44f6efd543eb.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `ktgr_id` int(11) NOT NULL,
  `ktgr_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`ktgr_id`, `ktgr_nama`) VALUES
(13, 'Bolu'),
(14, 'Cookie'),
(15, 'Kue');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `pem_id` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `pem_id`, `tanggal_pembayaran`, `bukti_pembayaran`) VALUES
(32, 22, '2022-07-07', '20220707144107struktur navigasi (2).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `pem_id` int(11) NOT NULL,
  `id_p_user` varchar(50) NOT NULL,
  `p_nama` varchar(25) NOT NULL,
  `p_perusahaan` varchar(25) NOT NULL,
  `p_alamat` varchar(255) NOT NULL,
  `p_tempat` varchar(25) NOT NULL,
  `area_id` int(11) NOT NULL,
  `p_kodepos` int(6) NOT NULL,
  `p_telp` varchar(14) NOT NULL,
  `pem_tanggal` date NOT NULL,
  `pem_total` int(11) NOT NULL,
  `pem_status_pembayaran` varchar(20) NOT NULL,
  `pem_status_pengiriman` varchar(20) NOT NULL,
  `pem_tambahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`pem_id`, `id_p_user`, `p_nama`, `p_perusahaan`, `p_alamat`, `p_tempat`, `area_id`, `p_kodepos`, `p_telp`, `pem_tanggal`, `pem_total`, `pem_status_pembayaran`, `pem_status_pengiriman`, `pem_tambahan`) VALUES
(22, 'Faizathayaramadhan@gmail.com', 'Faiz Athaya Ramadhan', 'domino', 'jl. aselih Rt.010 Rw.01 No.41A ciganjur, jagakarsa, jakarta selatan', 'rumah', 5, 165, '082260621445', '2022-07-07', 4639, 'Menunggu Konfirmasi', 'pending', 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pem_pdk`
--

CREATE TABLE `tb_pem_pdk` (
  `id_pem_pdk` int(11) NOT NULL,
  `pem_id` int(11) NOT NULL,
  `pdk_data_id` int(11) NOT NULL,
  `pem_pdk_jumlah` int(15) NOT NULL,
  `pem_pdk_nama` varchar(15) NOT NULL,
  `pem_pdk_harga` varchar(15) NOT NULL,
  `pem_pdk_subharga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pem_pdk`
--

INSERT INTO `tb_pem_pdk` (`id_pem_pdk`, `pem_id`, `pdk_data_id`, `pem_pdk_jumlah`, `pem_pdk_nama`, `pem_pdk_harga`, `pem_pdk_subharga`) VALUES
(37, 22, 20, 3, 'Kue', '213', 639);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `pdk_id` int(11) NOT NULL,
  `pdk_nama` varchar(50) NOT NULL,
  `pdk_gambar_pdk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`pdk_id`, `pdk_nama`, `pdk_gambar_pdk`) VALUES
(14, 'Bronis Panggang', '20220709031743image_picker480.1653291650.jpg'),
(15, 'Nastar', '20220709032950f6f454b0-385a-4e94-8370-44f6efd543eb.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_p_user`
--

CREATE TABLE `tb_p_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `id_p_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_p_user`
--

INSERT INTO `tb_p_user` (`id_user`, `nama_user`, `password`, `hak_akses`, `id_p_user`) VALUES
(7, 'Faiz Athaya Ramadhan', 'Faiz', 'user', 'Faizathayaramadhan@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_data_area`
--
ALTER TABLE `tb_data_area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `ongkir_area` (`ongkir_area`);

--
-- Indeks untuk tabel `tb_data_produk`
--
ALTER TABLE `tb_data_produk`
  ADD PRIMARY KEY (`pdk_data_id`),
  ADD KEY `ktgr_id` (`ktgr_id`),
  ADD KEY `pdk_id` (`pdk_id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`ktgr_id`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`pem_id`);

--
-- Indeks untuk tabel `tb_pem_pdk`
--
ALTER TABLE `tb_pem_pdk`
  ADD PRIMARY KEY (`id_pem_pdk`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`pdk_id`);

--
-- Indeks untuk tabel `tb_p_user`
--
ALTER TABLE `tb_p_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_data_area`
--
ALTER TABLE `tb_data_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_data_produk`
--
ALTER TABLE `tb_data_produk`
  MODIFY `pdk_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `ktgr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `pem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_pem_pdk`
--
ALTER TABLE `tb_pem_pdk`
  MODIFY `id_pem_pdk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `pdk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_p_user`
--
ALTER TABLE `tb_p_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
