-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 12, 2024 at 07:59 PM
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
-- Table structure for table `admin_departemen`
--

CREATE TABLE `admin_departemen` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_departemen`
--

INSERT INTO `admin_departemen` (`id`, `username`, `password`, `nama`, `role`, `email`, `kontak`) VALUES
(21, 'Yanti', 'yantiadm', 'Yanti Desiana', 'Admin Departemen', 'yantisimap@gmail.com', '02828300');

-- --------------------------------------------------------

--
-- Table structure for table `admin_perusahaan`
--

CREATE TABLE `admin_perusahaan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_perusahaan`
--

INSERT INTO `admin_perusahaan` (`id`, `username`, `password`, `nama`, `role`, `email`, `kontak`) VALUES
(1, 'Baskara', 'baskaraadm', 'Baskara Adudu', 'Admin Perusahaan', 'baskarasimap@gmail.com', '0871383902');

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
(1, 'Laptop', 'Elektronik', 10, 'Marketing', '2023-06-01'),
(2, 'Proyektor', 'Elektronik', 5, 'Marketing', '2023-06-05'),
(3, 'Kamera', 'Elektronik', 7, 'Marketing', '2023-06-10'),
(4, 'Papan Tulis', 'Perlengkapan Kantor', 20, 'Marketing', '2023-06-15'),
(5, 'Kursi Kantor', 'Perabotan', 30, 'Marketing', '2023-06-20'),
(11, 'Mobil', 'Kendaraan', 10, 'Operasi Proyek', '2024-05-01'),
(21, 'Printer', 'Alat', 5, 'IT', '2024-02-01'),
(100, 'Mobil Operasional', 'Kendaraan', 1, 'Logistik', '2023-07-30'),
(101, 'Komputer', 'Alat', 10, 'IT', '2024-01-15'),
(131, 'AC', 'Alat', 3, 'IT', '2023-09-15'),
(206, 'Crane', ' Mesin', 2, 'Operasi Proyek', '2024-05-21'),
(208, 'Traktor', 'Mesin', 3, 'Operasi Proyek', '2024-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_aset`
--

CREATE TABLE `laporan_aset` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `tanggal_laporan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_aset`
--

INSERT INTO `laporan_aset` (`id`, `judul`, `departemen`, `bulan`, `tahun`, `tanggal_laporan`) VALUES
(1, 'Laporan Mei', 'Operasi Proyek', 5, 2024, '2024-06-03 08:05:32'),
(3, 'Laporan Juni (Marketing)', 'Marketing', 6, 2023, '2024-06-03 09:44:39'),
(4, 'Laporan Juni', 'Marketing', 6, 2023, '2024-06-03 09:48:36'),
(5, 'Laporan Mei (Operasi Proyek)', 'Operasi Proyek', 5, 2024, '2024-06-03 10:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`, `nama`, `role`, `email`, `kontak`) VALUES
(1, 'bety', 'bety', 'Bety', 'Manager Aset', 'betycantik@gmail.com', '019838295');

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
(3110, 21, 'Printer', 'Alat', 1, 'Marketing', 'Keuangan', '2024-05-29', 'Butuh printer', 'APPROVED'),
(3111, 11, 'Mobil', 'Kendaraan', 1, 'Operasi Proyek', 'IT', '2024-05-31', 'Untuk memudahkan mobilitas ', 'REJECTED');

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

--
-- Dumping data for table `pengajuan_pembuangan`
--

INSERT INTO `pengajuan_pembuangan` (`idPengajuanPembuangan`, `idAset`, `namaAset`, `kategoriAset`, `jumlah`, `departemen`, `tanggalPembuangan`, `alasanPembuangan`, `status`) VALUES
(4110, 131, 'AC', 'Alat', 1, 'Operasional', '2024-05-31', 'Udah rusak', 'APPROVED'),
(4111, 4, 'Papan Tulis', 'Perlengkapan Kantor', 1, 'Marketing', '2024-06-17', 'Sudah rusak', '');

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
(2110, 11, 'Mobil', 'Kendaraan', 1, 'Operasi Proyek', '2024-05-28', 'Remnya blong', 'APPROVED'),
(2113, 131, 'AC', 'Alat', 1, 'IT', '2024-06-17', 'AC tidak dingin', '');

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
  `status` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_pengadaan`
--

INSERT INTO `pengajuan_pengadaan` (`idPengajuanPengadaan`, `namaAset`, `kategoriAset`, `jumlah`, `departemen`, `tanggalPengadaan`, `alasanPengadaan`, `status`) VALUES
(1001, 'Pesawat', 'Kendaraan', 10, 'Public Relation', '2024-05-30', 'Dibutuhkan untuk mencari koneksi ke luar negeri', 'REJECTED'),
(1002, 'Rumah', 'Tempat Tinggal', 1, 'Keuangan', '2024-05-11', 'Biar ga bayar kos', 'REJECTED'),
(1004, 'Proyektor', 'Alat', 4, 'Creative', '2024-05-29', 'Untuk menunjang pekerjaan creative', 'APPROVED'),
(1005, 'Mobil', 'Kendaraan', 2, 'Marketing', '2024-05-30', 'Untuk menunjang pekerjaan kami', 'REJECTED'),
(1006, 'PC', 'Alat', 5, 'Public Relation', '2024-05-31', 'Untuk menunjang pekerjaan', ''),
(1007, 'Kulkas', 'Perabotan', 1, 'Operasi Proyek', '2024-06-04', 'Untuk menyimpan kebutuhan makanan selama pengerjaan proyek', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_departemen`
--
ALTER TABLE `admin_departemen`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `laporan_aset`
--
ALTER TABLE `laporan_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin_departemen`
--
ALTER TABLE `admin_departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin_perusahaan`
--
ALTER TABLE `admin_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `idAset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `laporan_aset`
--
ALTER TABLE `laporan_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajuan_alokasi`
--
ALTER TABLE `pengajuan_alokasi`
  MODIFY `idPengajuanAlokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3112;

--
-- AUTO_INCREMENT for table `pengajuan_pembuangan`
--
ALTER TABLE `pengajuan_pembuangan`
  MODIFY `idPengajuanPembuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4112;

--
-- AUTO_INCREMENT for table `pengajuan_pemeliharaan`
--
ALTER TABLE `pengajuan_pemeliharaan`
  MODIFY `idPengajuanPemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2114;

--
-- AUTO_INCREMENT for table `pengajuan_pengadaan`
--
ALTER TABLE `pengajuan_pengadaan`
  MODIFY `idPengajuanPengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

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
