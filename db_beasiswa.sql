-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 09:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'amin', 'amin', 'amin'),
(2, 'Taufik Nurul Hidayat', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `akun_siswa`
--

CREATE TABLE `akun_siswa` (
  `nis` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_siswa`
--

INSERT INTO `akun_siswa` (`nis`, `nama`, `password`) VALUES
('0037354087', 'Tri Anggraini', 'd41d8cd98f00b204e9800998ecf8427e'),
('093919191', 'tes', '28b662d883b6d76fd96e4ddc5e9ba780'),
('123456789', 'Test', '827ccb0eea8a706c4c34a16891f84e7b'),
('12345678910', 'Stefanus rahman', '827ccb0eea8a706c4c34a16891f84e7b'),
('202093', 'Taufik Nurul Hidayat', '76868b011b66684d4a91d4ef7e1a2651'),
('303030', 'kevin antonio', 'd2e7a2105d0fb461fe6f2858cc33942f'),
('76897656', 'Stefanus aulia', '827ccb0eea8a706c4c34a16891f84e7b'),
('8877777', 'Taufik', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` int(10) NOT NULL,
  `nama_beasiswa` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `nama_beasiswa`, `deskripsi`) VALUES
(1, 'Akademik', 'Persyaratan :\r\n\r\nPersyaratan umum untuk mendaftar Beasiswa ini antara lain adalah sebagai berikut.\r\n\r\nMahasiswa program Strata 1 (S1) atau Diploma 4 (D4) yang minimal duduk di semester  2 dan maksimal semester 8;\r\nUntuk mahasiswa program DIploma 3 (D3) paling rendah duduk di semester 2 dan maksimal semester 4\r\nMahasiswa yang telah memenuhi persyaratan pendaftaran Beasiswa di atas selanjutnya mengajukan permohonan tertulis kepada rektor, direktur, atau ketua pimpinan perguruan tinggi terkait untuk mendapatkan bantuan dengan melampirkan berkas-berkas berikut:\r\n\r\nFotokopi Kartu Tanda Mahasiswa (KTM) dan Kartu Rencana Studi (KRS) atau dokumen lain yang sejenis sebagai bukti mahasiswa aktif;\r\nFotokopi rekening listrik bulan terakhir atau bukti pembayaran Pajak Bumi dan Bangunan (PBB) orang tua atau wali;\r\nFotokopi Kartu Keluarga (KK)\r\nSurat pernyataan tidak sedang menerima beasiswa dari pihak lain di lingkungan Kemenristekdikti yang diketahui oleh Pimpinan Perguruan Tinggi Bidang Kemahasiswaan;\r\nSurat Rekomendasi dari pimpinan fakultas atau jurusan\r\nFotocopi rekening bank  yang ditunjuk oleh Pimpinan Perguruan Tinggi Bidang Kemahasiswaan;'),
(2, 'Non Akademik', 'Persyaratan :\r\n\r\nPersyaratan umum untuk mendaftar Beasiswa ini antara lain adalah sebagai berikut.\r\n\r\nMahasiswa program Strata 1 (S1) atau Diploma 4 (D4) yang minimal duduk di semester  2 dan maksimal semester 8;\r\nUntuk mahasiswa program DIploma 3 (D3) paling rendah duduk di semester 2 dan maksimal semester 4\r\nMahasiswa yang telah memenuhi persyaratan pendaftaran Beasiswa di atas selanjutnya mengajukan permohonan tertulis kepada rektor, direktur, atau ketua pimpinan perguruan tinggi terkait untuk mendapatkan bantuan dengan melampirkan berkas-berkas berikut:\r\n\r\nFotokopi Kartu Tanda Mahasiswa (KTM) dan Kartu Rencana Studi (KRS) atau dokumen lain yang sejenis sebagai bukti mahasiswa aktif;\r\nFotokopi rekening listrik bulan terakhir atau bukti pembayaran Pajak Bumi dan Bangunan (PBB) orang tua atau wali;\r\nFotokopi Kartu Keluarga (KK)\r\nSurat pernyataan tidak sedang menerima beasiswa dari pihak lain di lingkungan Kemenristekdikti yang diketahui oleh Pimpinan Perguruan Tinggi Bidang Kemahasiswaan;\r\nSurat Rekomendasi dari pimpinan fakultas atau jurusan\r\nFotocopi rekening bank  yang ditunjuk oleh Pimpinan Perguruan Tinggi Bidang Kemahasiswaan;');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(15) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nis` int(15) DEFAULT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_hp` varchar(35) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `ipk` decimal(10,0) NOT NULL,
  `pil_beasiswa` enum('A','NA') NOT NULL COMMENT 'A=Akademik\r\nNA=Non Akademik',
  `berkas` varchar(50) NOT NULL,
  `status` enum('B','D','T') NOT NULL COMMENT 'B=Belum Diverifikasi\r\nD=Diterima\r\nT=Ditolak',
  `id_admin` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `tgl_daftar`, `nis`, `nama`, `email`, `no_hp`, `semester`, `ipk`, `pil_beasiswa`, `berkas`, `status`, `id_admin`) VALUES
(22, '2023-09-21', 123456789, 'Test', 'test@gmail.com', '1221', '2', '3', 'A', '123456789-daftar.pdf', 'D', 0),
(23, '2023-09-21', 76897656, 'Stefanus aulia', 'stefanus@gmail.com', '08543567892', '8', '4', 'A', '76897656-daftar.pdf', 'D', 0),
(24, '2023-09-21', 93919191, 'tes', 'test@gmail.com', '08492782724', '4', '4', 'A', '093919191-daftar.pdf', 'B', 0),
(25, '2023-09-21', 8877777, 'Taufik', 'taufik@gmail.com', '88888', '6', '4', 'A', '8877777-daftar.pdf', 'D', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun_siswa`
--
ALTER TABLE `akun_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id_beasiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_daftar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
