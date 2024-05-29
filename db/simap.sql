-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 02:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_perusahaan`
--

CREATE TABLE `admin_perusahaan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_perusahaan`
--

INSERT INTO `admin_perusahaan` (`id`, `username`, `password`) VALUES
(1, 'Baskara', 'baskaraadm');

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `idAset` int(11) NOT NULL,
  `namaAset` varchar(255) NOT NULL,
  `kategoriAset` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `tanggalMasuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`idAset`, `namaAset`, `kategoriAset`, `jumlah`, `departemen`, `tanggalMasuk`) VALUES
(11, 'Mobil', 'Kendaraan', 10, 'Operasi Proyek', '2024-05-01'),
(21, 'Printer', 'Alat', 5, 'IT', '2024-02-01'),
(100, 'Mobil Operasional', 'Kendaraan', 1, 'Logistik', '2023-07-30'),
(101, 'Komputer', 'Alat', 10, 'IT', '2024-01-15'),
(123, 'Kursi', 'Perabotan', 30, 'Marketing', '2023-12-05'),
(131, 'AC', 'Alat', 3, 'Operasional', '2023-09-15'),
(203, 'Crane', ' Mesin', 5, 'Operasi Proyek', '2024-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_alokasi`
--

CREATE TABLE `pengajuan_alokasi` (
  `idPengajuanAlokasi` int(11) NOT NULL,
  `idAset` int(11) DEFAULT NULL,
  `namaAset` varchar(100) NOT NULL,
  `kategoriAset` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `departemenAsal` varchar(255) NOT NULL,
  `departemenTujuan` varchar(255) NOT NULL,
  `tanggalPengalokasian` date NOT NULL,
  `alasanPengalokasian` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_alokasi`
--

INSERT INTO `pengajuan_alokasi` (`idPengajuanAlokasi`, `idAset`, `namaAset`, `kategoriAset`, `jumlah`, `departemenAsal`, `departemenTujuan`, `tanggalPengalokasian`, `alasanPengalokasian`, `status`) VALUES
(3110, 21, 'Printer', 'Alat', 1, 'Marketing', 'Keuangan', '2024-05-29', 'Butuh printer', ''),
(3111, 11, 'Mobil', 'Kendaraan', 1, 'Operasi Proyek', 'IT', '2024-05-31', 'Untuk memudahkan mobilitas ', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pembuangan`
--

CREATE TABLE `pengajuan_pembuangan` (
  `idPengajuanPembuangan` int(11) NOT NULL,
  `idAset` int(11) DEFAULT NULL,
  `namaAset` varchar(100) NOT NULL,
  `kategoriAset` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `tanggalPembuangan` date NOT NULL,
  `alasanPembuangan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pemeliharaan`
--

CREATE TABLE `pengajuan_pemeliharaan` (
  `idPengajuanPemeliharaan` int(11) NOT NULL,
  `idAset` int(11) DEFAULT NULL,
  `namaAset` varchar(100) NOT NULL,
  `kategoriAset` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `tanggalPemeliharaan` date NOT NULL,
  `alasanPemeliharaan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_pemeliharaan`
--

INSERT INTO `pengajuan_pemeliharaan` (`idPengajuanPemeliharaan`, `idAset`, `namaAset`, `kategoriAset`, `jumlah`, `departemen`, `tanggalPemeliharaan`, `alasanPemeliharaan`, `status`) VALUES
(2110, 11, 'Mobil', 'Kendaraan', 1, 'Operasi Proyek', '2024-05-28', 'Remnya blong', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pengadaan`
--

CREATE TABLE `pengajuan_pengadaan` (
  `idPengajuanPengadaan` int(11) NOT NULL,
  `namaAset` varchar(100) NOT NULL,
  `kategoriAset` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `tanggalPengadaan` date NOT NULL,
  `alasanPengadaan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_pengadaan`
--

INSERT INTO `pengajuan_pengadaan` (`idPengajuanPengadaan`, `namaAset`, `kategoriAset`, `jumlah`, `departemen`, `tanggalPengadaan`, `alasanPengadaan`, `status`) VALUES
(1001, 'Pesawat', 'Kendaraan', 10, 'Public Relation', '2024-05-30', 'Dibutuhkan untuk mencari koneksi ke luar negeri', 'A'),
(1002, 'Rumah', 'Tempat Tinggal', 1, 'Keuangan', '2024-05-11', 'Biar ga bayar kos', ''),
(1003, 'Speaker', 'Alat', 2, 'IT', '2024-05-28', 'Biar ga bosen ', ''),
(1004, 'Proyektor', 'Alat', 4, 'Creative', '2024-05-29', 'Untuk menunjang pekerjaan creative', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pengadaan_aset`
--
-- Error reading structure for table simap.pengajuan_pengadaan_aset: #1932 - Table &#039;simap.pengajuan_pengadaan_aset&#039; doesn&#039;t exist in engine
-- Error reading data for table simap.pengajuan_pengadaan_aset: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `simap`.`pengajuan_pengadaan_aset`&#039; at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_perusahaan`
--
ALTER TABLE `admin_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`idAset`);

--
-- Indexes for table `pengajuan_alokasi`
--
ALTER TABLE `pengajuan_alokasi`
  ADD PRIMARY KEY (`idPengajuanAlokasi`),
  ADD KEY `idAset` (`idAset`);

--
-- Indexes for table `pengajuan_pembuangan`
--
ALTER TABLE `pengajuan_pembuangan`
  ADD PRIMARY KEY (`idPengajuanPembuangan`),
  ADD KEY `idAset` (`idAset`);

--
-- Indexes for table `pengajuan_pemeliharaan`
--
ALTER TABLE `pengajuan_pemeliharaan`
  ADD PRIMARY KEY (`idPengajuanPemeliharaan`),
  ADD KEY `idAset` (`idAset`);

--
-- Indexes for table `pengajuan_pengadaan`
--
ALTER TABLE `pengajuan_pengadaan`
  ADD PRIMARY KEY (`idPengajuanPengadaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_perusahaan`
--
ALTER TABLE `admin_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `idAset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `pengajuan_alokasi`
--
ALTER TABLE `pengajuan_alokasi`
  MODIFY `idPengajuanAlokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3112;

--
-- AUTO_INCREMENT for table `pengajuan_pembuangan`
--
ALTER TABLE `pengajuan_pembuangan`
  MODIFY `idPengajuanPembuangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_pemeliharaan`
--
ALTER TABLE `pengajuan_pemeliharaan`
  MODIFY `idPengajuanPemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2111;

--
-- AUTO_INCREMENT for table `pengajuan_pengadaan`
--
ALTER TABLE `pengajuan_pengadaan`
  MODIFY `idPengajuanPengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_alokasi`
--
ALTER TABLE `pengajuan_alokasi`
  ADD CONSTRAINT `pengajuan_alokasi_ibfk_1` FOREIGN KEY (`idAset`) REFERENCES `aset` (`idAset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_pembuangan`
--
ALTER TABLE `pengajuan_pembuangan`
  ADD CONSTRAINT `pengajuan_pembuangan_ibfk_1` FOREIGN KEY (`idAset`) REFERENCES `aset` (`idAset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_pemeliharaan`
--
ALTER TABLE `pengajuan_pemeliharaan`
  ADD CONSTRAINT `pengajuan_pemeliharaan_ibfk_1` FOREIGN KEY (`idAset`) REFERENCES `aset` (`idAset`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
