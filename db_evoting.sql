-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 09:45 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(128) NOT NULL,
  `admin_username` varchar(128) NOT NULL,
  `admin_password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `role_id`) VALUES
(1, 'Rakhmat Khaidir', 'admin16', '$2y$10$riQO6ukjTjX59Bgfr//HGuS2oPB3hpOUmZOY45QTrzl0eMx04q2ga', 1),
(2, 'Panitia', 'panitia', '$2y$10$8hKoJSy1bEgVnVNmoLYnNuBp.MyRboWfbs5sgWVHeB4IVgXrWr2Ha', 2),
(3, 'Manager', 'manager', '$2y$10$P3LosxoDaTFwWpM0RPGwn.1qn3awZJ.z7e3N3J15mUOIqKRlh5jgO', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_calon_ketua`
--

CREATE TABLE `tb_calon_ketua` (
  `calon_ketua_id` int(11) NOT NULL,
  `calon_ketua_nama` varchar(128) NOT NULL,
  `calon_ketua_nourut` int(16) NOT NULL,
  `calon_ketua_foto` varchar(128) NOT NULL,
  `calon_ketua_visimisi` text NOT NULL,
  `calon_ketua_suara` int(128) NOT NULL,
  `tema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilih`
--

CREATE TABLE `tb_pemilih` (
  `pemilih_id` int(11) NOT NULL,
  `pemilih_jenis_pegawai` varchar(8) NOT NULL,
  `pemilih_nomor` varchar(128) NOT NULL,
  `pemilih_nama` varchar(128) NOT NULL,
  `pemilih_gelar_depan` varchar(10) NOT NULL,
  `pemilih_gelar_s3` varchar(10) NOT NULL,
  `pemilih_gelar_belakang` varchar(10) NOT NULL,
  `pemilih_jk` enum('L','P') NOT NULL,
  `pemilih_nidn` varchar(128) NOT NULL,
  `pemilih_pendidikan_akhir` varchar(8) NOT NULL,
  `pemilih_golongan` varchar(8) NOT NULL,
  `pemilih_jabatan` varchar(128) NOT NULL,
  `pemilih_verifikasi` enum('0','1') NOT NULL,
  `pemilih_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemilih`
--

INSERT INTO `tb_pemilih` (`pemilih_id`, `pemilih_jenis_pegawai`, `pemilih_nomor`, `pemilih_nama`, `pemilih_gelar_depan`, `pemilih_gelar_s3`, `pemilih_gelar_belakang`, `pemilih_jk`, `pemilih_nidn`, `pemilih_pendidikan_akhir`, `pemilih_golongan`, `pemilih_jabatan`, `pemilih_verifikasi`, `pemilih_status`) VALUES
(1, '', 'A1C615046', 'Nara Augustin', '', '', '', 'L', '', '', '', '', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suara`
--

CREATE TABLE `tb_suara` (
  `suara_id` int(11) NOT NULL,
  `pemilih_id` int(11) NOT NULL,
  `calon_ketua_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tema_pemilihan`
--

CREATE TABLE `tb_tema_pemilihan` (
  `tema_id` int(11) NOT NULL,
  `tema_nama` varchar(256) NOT NULL,
  `tema_batas` int(128) NOT NULL,
  `tema_logo` varchar(128) NOT NULL,
  `tema_is_active` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tema_pemilihan`
--

INSERT INTO `tb_tema_pemilihan` (`tema_id`, `tema_nama`, `tema_batas`, `tema_logo`, `tema_is_active`) VALUES
(7, 'Calon Senat ULM Perwakilan Guru Besar FKIP', 1573283640, 'Logo-Unlam-1.png', '1'),
(8, 'Calon Senat ULM Perwakilan Dosen FKIP', 1573283760, 'Logo-Unlam-2.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Panitia'),
(3, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_calon_ketua`
--
ALTER TABLE `tb_calon_ketua`
  ADD PRIMARY KEY (`calon_ketua_id`);

--
-- Indexes for table `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  ADD PRIMARY KEY (`pemilih_id`);

--
-- Indexes for table `tb_suara`
--
ALTER TABLE `tb_suara`
  ADD PRIMARY KEY (`suara_id`);

--
-- Indexes for table `tb_tema_pemilihan`
--
ALTER TABLE `tb_tema_pemilihan`
  ADD PRIMARY KEY (`tema_id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_calon_ketua`
--
ALTER TABLE `tb_calon_ketua`
  MODIFY `calon_ketua_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  MODIFY `pemilih_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_suara`
--
ALTER TABLE `tb_suara`
  MODIFY `suara_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tema_pemilihan`
--
ALTER TABLE `tb_tema_pemilihan`
  MODIFY `tema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
