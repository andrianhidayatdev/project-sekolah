-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 01:37 PM
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
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_pemesanan` varchar(25) NOT NULL,
  `id_peralatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminajamn`
--

CREATE TABLE `detail_peminajamn` (
  `id_peminjam` int(11) NOT NULL,
  `id_peralatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_perbaikan`
--

CREATE TABLE `detail_perbaikan` (
  `id_perbaikan` varchar(10) NOT NULL,
  `id_peralatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nik` varchar(25) NOT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `id_jabatan` varchar(10) DEFAULT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `alamat_guru` varchar(100) DEFAULT NULL,
  `tanggallahir_guru` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` varchar(5) NOT NULL,
  `nama_hari` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelassiswa` varchar(10) DEFAULT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `id_hari` varchar(5) DEFAULT NULL,
  `id_pelajaran` varchar(10) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `semester` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelassiswa` varchar(10) NOT NULL,
  `id_jurusan` varchar(10) DEFAULT NULL,
  `id_kelas` varchar(10) DEFAULT NULL,
  `nama_kelassiswa` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` varchar(10) NOT NULL,
  `nama_merk` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` varchar(10) NOT NULL,
  `nama_pelajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(25) NOT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `tanggal_pemesanan` date DEFAULT NULL,
  `status_pemesanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `username_peminjam` varchar(50) DEFAULT NULL,
  `password_peminjam` varchar(50) DEFAULT NULL,
  `status_peminjam` varchar(10) DEFAULT NULL,
  `keterangan_peringatan` varchar(100) DEFAULT NULL,
  `image_peminjam` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id_peralatan` varchar(30) NOT NULL,
  `id_merk` varchar(10) DEFAULT NULL,
  `id_merk3` varchar(10) DEFAULT NULL,
  `id_merk2` varchar(10) DEFAULT NULL,
  `nama_peralatan` varchar(50) DEFAULT NULL,
  `tanggalbeli_peralatan` date DEFAULT NULL,
  `status_peralatan` varchar(25) DEFAULT NULL,
  `jumlahkerusakan_peralatan` int(11) DEFAULT NULL,
  `image_peralatan` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` varchar(10) NOT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `tanggal_perbaikan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(25) NOT NULL,
  `id_hari` varchar(5) DEFAULT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `alamat_siswa` varchar(100) DEFAULT NULL,
  `angkatan_siswa` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` varchar(10) NOT NULL,
  `nama_warna` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `nama_warna`) VALUES
('WRN006', 'asdsdasas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`,`id_peralatan`),
  ADD KEY `FK_relationship_21` (`id_peralatan`);

--
-- Indexes for table `detail_peminajamn`
--
ALTER TABLE `detail_peminajamn`
  ADD PRIMARY KEY (`id_peminjam`,`id_peralatan`),
  ADD KEY `FK_relationship_12` (`id_peralatan`);

--
-- Indexes for table `detail_perbaikan`
--
ALTER TABLE `detail_perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`,`id_peralatan`),
  ADD KEY `FK_relationship_18` (`id_peralatan`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `FK_relationship_10` (`id_peminjam`),
  ADD KEY `FK_relationship_3` (`id_jabatan`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `FK_relationship_1` (`id_hari`),
  ADD KEY `FK_relationship_2` (`id_pelajaran`),
  ADD KEY `FK_relationship_4` (`nik`),
  ADD KEY `FK_relationship_5` (`id_kelassiswa`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelassiswa`),
  ADD KEY `FK_relationship_6` (`id_jurusan`),
  ADD KEY `FK_relationship_7` (`id_kelas`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `FK_relationship_19` (`id_peminjam`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_peralatan`),
  ADD KEY `FK_relationship_13` (`id_merk`),
  ADD KEY `FK_relationship_14` (`id_merk2`),
  ADD KEY `FK_relationship_15` (`id_merk3`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `FK_relationship_16` (`nik`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `FK_relationship_8` (`id_hari`),
  ADD KEY `FK_relationship_9` (`id_peminjam`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `FK_relationship_20` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `FK_relationship_21` FOREIGN KEY (`id_peralatan`) REFERENCES `peralatan` (`id_peralatan`);

--
-- Constraints for table `detail_peminajamn`
--
ALTER TABLE `detail_peminajamn`
  ADD CONSTRAINT `FK_relationship_11` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`),
  ADD CONSTRAINT `FK_relationship_12` FOREIGN KEY (`id_peralatan`) REFERENCES `peralatan` (`id_peralatan`);

--
-- Constraints for table `detail_perbaikan`
--
ALTER TABLE `detail_perbaikan`
  ADD CONSTRAINT `FK_relationship_17` FOREIGN KEY (`id_perbaikan`) REFERENCES `perbaikan` (`id_perbaikan`),
  ADD CONSTRAINT `FK_relationship_18` FOREIGN KEY (`id_peralatan`) REFERENCES `peralatan` (`id_peralatan`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `FK_relationship_10` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`),
  ADD CONSTRAINT `FK_relationship_3` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_relationship_1` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`),
  ADD CONSTRAINT `FK_relationship_2` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id_pelajaran`),
  ADD CONSTRAINT `FK_relationship_4` FOREIGN KEY (`nik`) REFERENCES `guru` (`nik`),
  ADD CONSTRAINT `FK_relationship_5` FOREIGN KEY (`id_kelassiswa`) REFERENCES `kelas_siswa` (`id_kelassiswa`);

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `FK_relationship_6` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `FK_relationship_7` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_relationship_19` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`);

--
-- Constraints for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD CONSTRAINT `FK_relationship_13` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`),
  ADD CONSTRAINT `FK_relationship_14` FOREIGN KEY (`id_merk2`) REFERENCES `warna` (`id_warna`),
  ADD CONSTRAINT `FK_relationship_15` FOREIGN KEY (`id_merk3`) REFERENCES `jenis` (`id_jenis`);

--
-- Constraints for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD CONSTRAINT `FK_relationship_16` FOREIGN KEY (`nik`) REFERENCES `guru` (`nik`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_relationship_8` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`),
  ADD CONSTRAINT `FK_relationship_9` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
