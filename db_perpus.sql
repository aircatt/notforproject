-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 01:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isbn` char(20) NOT NULL,
  `j_buku_baik` int(100) NOT NULL,
  `j_buku_rusak` int(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `id_kategori`, `id_penerbit`, `tahun_terbit`, `isbn`, `j_buku_baik`, `j_buku_rusak`, `pengarang`, `foto`) VALUES
(1, 'Cara Menulis', 1, 1, 2019, '124252', 7, 18, 'Shuke', NULL),
(2, 'Cara Berenang', 2, 2, 2019, '1244567', 12, 11, 'Ali\r\n', NULL),
(6, 'Cara Bernafas', 3, 2, 2019, '3552234', 16, 13, 'Reva\r\n', NULL),
(7, 'How to Basic 3', 1, 1, 2008, '4234224', 6, 14, 'Fazly', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(100) NOT NULL,
  `nomor_hp` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode`, `nama`) VALUES
(1, 'K001', 'Sejarah'),
(2, 'K002', 'Sains'),
(3, 'K003', 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `isi`, `level`, `status`) VALUES
(2, 'BUKU Cara Bernafas SEDANG DI PINJAM OLEH Vio Samlan ', 'admin', 'aktif'),
(53, 'BUKU Cara Menulis SEDANG DI PINJAM OLEH Vio Samlan ', 'admin', 'aktif'),
(54, 'Peringatan!! Perpustakaan sedang kebakaran', 'admin', 'aktif'),
(55, 'BUKU Cara Berenang SEDANG DI PINJAM OLEH Vio Samlan ', 'admin', 'aktif'),
(56, 'BUKU Cara Bernafas SEDANG DI PINJAM OLEH Vio Samlan ', 'admin', 'aktif'),
(57, 'BUKU Cara Menulis SEDANG DI PINJAM OLEH Revallina', 'admin', 'aktif'),
(58, 'BUKU Cara Berenang SEDANG DI PINJAM OLEH Revallina', 'admin', 'aktif'),
(59, 'BUKU How to Basic 3 SEDANG DI PINJAM OLEH Revallina', 'admin', 'aktif'),
(60, 'BUKU Cara Berenang SEDANG DI PINJAM OLEH Shuke', 'admin', 'aktif'),
(61, 'BUKU Cara Berenang SEDANG DI PINJAM OLEH Shuke', 'admin', 'aktif'),
(62, 'BUKU Cara Bernafas SEDANG DI PINJAM OLEH Shuke', 'admin', 'aktif'),
(63, 'BUKU How to Basic 3 SEDANG DI PINJAM OLEH Shuke', 'admin', 'aktif'),
(64, 'BUKU How to Basic 3 SEDANG DI PINJAM OLEH Vio Samlan de Rey', 'admin', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_peminjaman` datetime NOT NULL,
  `tanggal_pengembalian` datetime DEFAULT NULL,
  `kondisi_buku_saat_dipinjam` enum('baik','rusak') NOT NULL,
  `kondisi_buku_saat_dikembalikan` enum('baik','rusak') DEFAULT NULL,
  `denda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_user`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `kondisi_buku_saat_dipinjam`, `kondisi_buku_saat_dikembalikan`, `denda`) VALUES
(20, 2, 1, '2023-02-11 06:40:46', NULL, 'baik', NULL, '0'),
(21, 2, 2, '2023-02-11 07:23:19', '2023-02-11 07:23:36', 'baik', 'rusak', '100000'),
(22, 2, 6, '2023-02-11 07:23:27', NULL, 'baik', NULL, '0'),
(23, 5, 1, '2023-02-11 10:23:43', NULL, 'baik', NULL, '0'),
(24, 5, 2, '2023-02-11 10:23:58', NULL, 'baik', NULL, '0'),
(25, 5, 7, '2023-02-11 10:24:05', '2023-02-11 10:24:20', 'baik', 'rusak', '100000'),
(26, 4, 2, '2023-02-11 10:25:57', NULL, 'baik', NULL, '0'),
(28, 4, 6, '2023-02-11 10:26:09', '2023-02-11 10:26:56', 'baik', 'rusak', '100000'),
(29, 4, 7, '2023-02-11 10:26:24', NULL, 'baik', NULL, '0'),
(30, 2, 7, '2023-02-12 12:40:48', NULL, 'baik', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `verif` varchar(100) NOT NULL DEFAULT 'Verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `kode`, `nama`, `verif`) VALUES
(1, 'P001', 'Gramedia', 'Penerbit Terverifikasi'),
(2, 'P002', 'BSE', 'Penerbit Terverifikasi'),
(3, 'P003', 'Second', 'Penerbit Terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `status` enum('terkirim','dibaca') NOT NULL,
  `tanggal_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `id_penerima`, `id_pengirim`, `judul`, `isi`, `status`, `tanggal_kirim`) VALUES
(1, 2, 1, 'Test Judul', 'Test isi', 'dibaca', '2023-02-08 01:16:31'),
(2, 2, 1, 'Kamu Membakar perpustakaan', 'test bakar ', 'dibaca', '2023-02-09 02:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nis` char(50) DEFAULT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `verif` enum('verified','unverified') NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `foto` text DEFAULT NULL,
  `join_date` datetime NOT NULL,
  `terakhir_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `kode`, `nis`, `fullname`, `username`, `password`, `kelas`, `alamat`, `verif`, `role`, `foto`, `join_date`, `terakhir_login`) VALUES
(1, 'A001', '', 'Admin', 'admin', '123', '', '', 'verified', 'admin', '../../../assets/images20230211121349yerin2.png', '2023-02-01 03:22:34', '2023-02-12 12:31:39'),
(2, 'U002', '010299', 'Vio Samlan de Rey', 'vio', '123', 'XII', 'Condet', 'verified', 'user', '../assets/images20230212121221yerin6.jpg', '2023-02-01 00:00:00', '2023-02-12 12:41:01'),
(4, 'U003', '23442', 'Jagad al Jabr', 'semesta', '123', 'XII', 'Cijantung', 'verified', 'user', '../../../assets/images20230211115313yerin5.jpg', '2023-02-02 00:00:00', '2023-02-11 23:57:27'),
(5, 'U004', '1234', 'Dimaz de Rosemary', 'dimaz', '123', 'XII', 'Condet', 'verified', 'user', '../../../assets/images20230211115636yerin7.jpg', '2023-02-02 00:00:00', '2023-02-11 23:57:27'),
(7, 'A002', '', 'Admin Silver', 'adminsilver', '123', '', '', 'verified', 'admin', '../../../assets/images20230211121411yerin6.jpg', '2023-02-02 00:00:00', '2023-02-12 00:00:01'),
(10, 'U005', '2110', 'Langit Samudra', 'langit', '123', 'XII', 'Condet', 'verified', 'user', NULL, '2023-02-12 08:14:44', '2023-02-12 09:13:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penerima` (`id_penerima`),
  ADD KEY `id_pengirim` (`id_pengirim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
