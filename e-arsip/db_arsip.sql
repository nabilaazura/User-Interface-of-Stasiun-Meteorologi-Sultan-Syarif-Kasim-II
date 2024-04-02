-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 12:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `no_surat` varchar(35) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `prihal` varchar(100) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id_arsip`, `no_surat`, `tanggal_surat`, `tanggal_diterima`, `prihal`, `id_departemen`, `id_pengirim`, `file`) VALUES
(4, '192-1680-aa-1', '2022-02-02', '2022-02-09', 'Surat ini itu', 15, 5, '61f9f15572033.pdf'),
(5, '192282-138uu-xxxx', '2022-02-02', '2022-02-02', 'Surat keluar', 17, 6, '620343816a0ae.jpg'),
(7, 'ME.01.00/001/KPKU/IV/20222', '2022-02-08', '2022-02-10', 'Sekolah Lapangan Cuaca Nelayan', 16, 6, '620337674c3fd.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`id_departemen`, `nama_departemen`) VALUES
(15, 'AA'),
(16, 'Analisa'),
(17, 'Tehnisi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `no_dokumen` varchar(45) NOT NULL,
  `tanggal_dokumen` date NOT NULL,
  `tentang` varchar(100) NOT NULL,
  `nama_departemen` varchar(25) NOT NULL,
  `pembuat` varchar(50) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`id_dokumen`, `no_dokumen`, `tanggal_dokumen`, `tentang`, `nama_departemen`, `pembuat`, `file`) VALUES
(12, 'xx-aaa-vb-1920', '2022-02-04', 'Surat Keluar', 'BPBD Pekanbaru', 'Bu Warih', '62032bb68fcd8.pdf'),
(13, '11', '2022-02-15', 'fs', 'ad', 'FEW', '62121e1dc7bbe.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengirim_surat`
--

CREATE TABLE `tbl_pengirim_surat` (
  `id_pengirim` int(11) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengirim_surat`
--

INSERT INTO `tbl_pengirim_surat` (`id_pengirim`, `nama_pengirim`, `alamat`, `no_hp`, `email`) VALUES
(5, 'BB', 'SSK II Pekanbaru', '0811111111', 'ssk@gmail.id'),
(6, 'Buk Warih', 'SSK II PKU', '0811111111', 'bukwari@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tbl_pengirim_surat`
--
ALTER TABLE `tbl_pengirim_surat`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pengirim_surat`
--
ALTER TABLE `tbl_pengirim_surat`
  MODIFY `id_pengirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
