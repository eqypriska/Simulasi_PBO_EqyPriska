-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 07:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1d_eqypriska`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Utomo', 'SMAN 3 Bandung', '78.25', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMKN 2 Surabaya', '90.00', '250000.00', 'Reguler', 'Teknik Komputer', 'Kampus Barat', NULL, NULL, NULL, NULL),
(4, 'Dedi Dermawan', 'SMAN 5 Yogyakarta', '82.10', '250000.00', 'Reguler', 'Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMAN 1 Medan', '88.40', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Barat', NULL, NULL, NULL, NULL),
(6, 'Fahri Hamzah', 'MAN 1 Semarang', '79.90', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Gutawa', 'SMAN 8 Jakarta', '92.50', '250000.00', 'Reguler', 'Teknik Komputer', 'Kampus Barat', NULL, NULL, NULL, NULL),
(8, 'Hadi Wijaya', 'SMAN 1 Solo', '95.00', '150000.00', 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Permata', 'SMAN 2 Malang', '89.00', '150000.00', 'Prestasi', NULL, NULL, 'Futsal', 'Provinsi', NULL, NULL),
(10, 'Joko Tarub', 'SMKN 1 Blitar', '86.50', '150000.00', 'Prestasi', NULL, NULL, 'Lomba Kompetensi Siswa', 'Nasional', NULL, NULL),
(11, 'Kartika Sari', 'SMAN 3 Yogyakarta', '94.20', '150000.00', 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Internasional', NULL, NULL),
(12, 'Laksana Tri', 'SMAN 1 Denpasar', '87.80', '150000.00', 'Prestasi', NULL, NULL, 'Pencak Silat', 'Provinsi', NULL, NULL),
(13, 'Mega Utami', 'SMAN 4 Makassar', '91.00', '150000.00', 'Prestasi', NULL, NULL, 'Olimpiade Fisika', 'Nasional', NULL, NULL),
(14, 'Naufal Abdi', 'MAN 2 Jakarta', '88.50', '150000.00', 'Prestasi', NULL, NULL, 'Tahfidz Al-Quran', 'Nasional', NULL, NULL),
(15, 'Oki Setiawan', 'SMAN 1 Balikpapan', '84.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KD/2026/001', 'Kementerian Perhubungan'),
(16, 'Putri Rahayu', 'SMAN 1 Palembang', '89.25', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KD/2026/002', 'Badan Siber dan Sandi Negara'),
(17, 'Qomaruddin', 'SMAN 2 Padang', '81.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KD/2026/003', 'Kementerian Keuangan'),
(18, 'Rini Amalia', 'SMAN 1 Pontianak', '86.70', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KD/2026/004', 'Badan Meteorologi Klimatologi Geofisika'),
(19, 'Sultan Hasan', 'SMKN 1 Makassar', '83.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KD/2026/005', 'Kementerian Perhubungan'),
(20, 'Tania Kirana', 'SMAN 7 Manado', '90.10', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KD/2026/006', 'Badan Siber dan Sandi Negara'),
(21, 'Umar Bin Khattab', 'MAN 1 Banda Aceh', '85.60', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KD/2026/007', 'Kementerian Keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
