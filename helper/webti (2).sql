-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 04:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`) VALUES
(111, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `info_peminjaman`
--

CREATE TABLE `info_peminjaman` (
  `kode_pinjam` int(255) NOT NULL,
  `jam_pinjam` time(6) NOT NULL,
  `jam_kembali` time(6) NOT NULL,
  `no_loker` int(255) NOT NULL,
  `id_admin` int(255) NOT NULL,
  `id_peminjam` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `no` int(50) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_admin` int(20) DEFAULT NULL,
  `id_peminjam` int(255) DEFAULT NULL,
  `jam_pinjam` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`no`, `status`, `id_admin`, `id_peminjam`, `jam_pinjam`) VALUES
(1, 'kosong', NULL, NULL, NULL),
(2, 'kosong', NULL, NULL, NULL),
(3, 'kosong', NULL, NULL, NULL),
(4, 'kosong', NULL, NULL, NULL),
(5, 'kosong', NULL, NULL, NULL),
(6, 'kosong', NULL, NULL, NULL),
(7, 'kosong', NULL, NULL, NULL),
(8, 'kosong', NULL, NULL, NULL),
(9, 'kosong', NULL, NULL, NULL),
(10, 'kosong', NULL, NULL, NULL),
(11, 'kosong', NULL, NULL, NULL),
(12, 'kosong', NULL, NULL, NULL),
(13, 'kosong', NULL, NULL, NULL),
(14, 'kosong', NULL, NULL, NULL),
(15, 'kosong', NULL, NULL, NULL),
(16, 'kosong', NULL, NULL, NULL),
(17, 'kosong', NULL, NULL, NULL),
(18, 'kosong', NULL, NULL, NULL),
(19, 'kosong', NULL, NULL, NULL),
(20, 'kosong', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penitip`
--

CREATE TABLE `penitip` (
  `id_peminjam` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `nohp` int(255) NOT NULL,
  `nim_nidn` int(255) NOT NULL,
  `no` int(255) DEFAULT NULL,
  `id_admin` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nim_nidn` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nohp` int(255) NOT NULL,
  `id_admin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim_nidn`, `nama`, `email`, `jurusan`, `kelas`, `password`, `nohp`, `id_admin`) VALUES
(121212, 'Agus ', 'aguskotak@gmail.com', 'Teknologi Informasi', 'TI-5C', 'agus', 2147483647, 111),
(444444, 'Jason Statham', 'jason@gmail.com', 'Ekonomi Syariah', 'TI-5C', 'jason', 86754321, 111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `info_peminjaman`
--
ALTER TABLE `info_peminjaman`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `pengurus` (`id_admin`),
  ADD KEY `infoloker` (`no_loker`),
  ADD KEY `peminjam` (`id_peminjam`),
  ADD KEY `infojam` (`jam_pinjam`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `jam_pinjam` (`jam_pinjam`),
  ADD UNIQUE KEY `jam_pinjam_2` (`jam_pinjam`),
  ADD KEY `nimpeminjam` (`id_peminjam`),
  ADD KEY `pengurusloker` (`id_admin`);

--
-- Indexes for table `penitip`
--
ALTER TABLE `penitip`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `namapenitip` (`nim_nidn`),
  ADD KEY `noloker` (`no`),
  ADD KEY `managepeminjam` (`id_admin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim_nidn`),
  ADD KEY `melihat` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info_peminjaman`
--
ALTER TABLE `info_peminjaman`
  MODIFY `kode_pinjam` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info_peminjaman`
--
ALTER TABLE `info_peminjaman`
  ADD CONSTRAINT `infojam` FOREIGN KEY (`jam_pinjam`) REFERENCES `loker` (`jam_pinjam`),
  ADD CONSTRAINT `infoloker` FOREIGN KEY (`no_loker`) REFERENCES `loker` (`no`),
  ADD CONSTRAINT `peminjam` FOREIGN KEY (`id_peminjam`) REFERENCES `penitip` (`id_peminjam`),
  ADD CONSTRAINT `pengurus` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `nimpeminjam` FOREIGN KEY (`id_peminjam`) REFERENCES `penitip` (`id_peminjam`),
  ADD CONSTRAINT `pengurusloker` FOREIGN KEY (`id_admin`) REFERENCES `penitip` (`id_peminjam`);

--
-- Constraints for table `penitip`
--
ALTER TABLE `penitip`
  ADD CONSTRAINT `managepeminjam` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `namapenitip` FOREIGN KEY (`nim_nidn`) REFERENCES `user` (`nim_nidn`),
  ADD CONSTRAINT `noloker` FOREIGN KEY (`no`) REFERENCES `loker` (`no`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `melihat` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
