-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 02:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(5) NOT NULL,
  `nomor_induk` varchar(12) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nomor_induk`, `nama_anggota`, `kelas`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
('AG001', '13118837', 'Lukman', '4-A', 'Laki-Laki', 'jhajwhjahjhfajf', '08997878799'),
('AG002', '13118836', 'Zen', '5-A', 'Laki - Laki', 'Citra Raya, Graha Pesona', '081459082213'),
('AG004', '13118831', 'Lukman Hakim', '6-B', 'Laki-Laki', 'lukman', '081314599485');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(5) NOT NULL,
  `id_pengarang` int(3) NOT NULL,
  `id_penerbit` int(3) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tahun_terbit` varchar(10) NOT NULL,
  `rak` varchar(3) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_pengarang`, `id_penerbit`, `judul_buku`, `tahun_terbit`, `rak`, `jumlah`) VALUES
('BK001', 1, 1, 'Jika Kamu Menjadi Tanda Tambah', '2018', 'A02', 5),
('BK002', 3, 3, 'Aku dan Kamu', '2017', 'A01', 0),
('BK003', 1, 1, 'Ilmu Pengetahuan Alam', '2003', 'A03', 10),
('BK004', 3, 1, 'Aku dan Kamu dan Dia', '2001', 'A01', 17),
('BK005', 1, 1, 'English Intermediate', '2000', 'A01', 17);

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `id_ebook` varchar(6) NOT NULL,
  `nama_ebook` varchar(30) NOT NULL,
  `deskripsi_ebook` text NOT NULL,
  `pdf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`id_ebook`, `nama_ebook`, `deskripsi_ebook`, `pdf`) VALUES
('EBK001', 'Ilmu Pengetahuan Alam', 'Kelas 6 Ilmu Pengetahuan Alam', 'Kelas6-IPA.pdf'),
('EBK002', 'Sistem Informasi Perpustakaan', 'a', 'buku_sdlc2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `id_kembali` int(3) NOT NULL,
  `nomor_induk` varchar(12) NOT NULL,
  `id_anggota` varchar(5) NOT NULL,
  `id_buku` varchar(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_kembalikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kembali`
--

INSERT INTO `kembali` (`id_kembali`, `nomor_induk`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_kembalikan`) VALUES
(1, '13118837', 'AG001', 'BK001', '2022-06-27', '2022-06-30', '2022-06-27'),
(2, '13118836', 'AG002', 'BK003', '2022-06-20', '2022-06-23', '2022-06-27'),
(3, '13118836', 'AG002', 'BK003', '2022-06-28', '2022-07-01', '2022-06-28'),
(4, '13118836', 'AG002', 'BK004', '2022-06-28', '2022-07-01', '2022-06-28'),
(5, '13118837', 'AG001', 'BK001', '2022-06-27', '2022-06-30', '2022-07-11'),
(6, '13118836', 'AG002', 'BK001', '2022-06-22', '2022-06-25', '2022-07-11'),
(7, '13118836', 'AG002', 'BK003', '2022-06-28', '2022-07-01', '2022-08-07'),
(8, '13118836', 'AG002', 'BK004', '2022-06-29', '2022-07-02', '2022-08-08'),
(9, '13118836', 'AG002', 'BK005', '2022-08-08', '2022-08-11', '2022-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor_induk` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `nomor_induk`, `password`, `level`) VALUES
(1, 'Lukman Hakim', '13118835', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Zen', '13118836', 'ee11cbb19052e40b07aac0ca060c23ee', 2),
(7, 'Heru Saputro', '13118838', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(1, 'Penerbit Republika'),
(3, 'Bentang Pustaka');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` int(3) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(1, 'Zen'),
(3, 'Lukman');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` varchar(5) NOT NULL,
  `nomor_induk` varchar(12) NOT NULL,
  `id_anggota` varchar(5) NOT NULL,
  `id_buku` varchar(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `nomor_induk`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
('PJ008', '13118836', 'AG002', 'BK004', '2022-06-29', '2022-07-02'),
('PJ009', '13118836', 'AG002', 'BK005', '2022-07-08', '2022-07-11'),
('PJ010', '13118836', 'AG002', 'BK005', '2022-08-07', '2022-08-10');

--
-- Triggers `pinjam`
--
DELIMITER $$
CREATE TRIGGER `jml_after_pinjam` AFTER INSERT ON `pinjam` FOR EACH ROW UPDATE buku SET buku.jumlah = buku.jumlah -1 WHERE buku.id_buku = new.id_buku
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id_ebook`);

--
-- Indexes for table `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kembali`
--
ALTER TABLE `kembali`
  MODIFY `id_kembali` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id_pengarang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
