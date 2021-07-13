-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2021 at 11:30 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lessintutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `mapelname` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `bukti_bayar` varchar(64) DEFAULT NULL,
  `is_payed` tinyint(1) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL,
  `refund` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `rolename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `rolename`) VALUES
(77, 'Siswa'),
(88, 'Pengajar'),
(99, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id` int(11) NOT NULL,
  `tingkat` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tingkatan`
--

INSERT INTO `tingkatan` (`id`, `tingkat`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_mapel`, `foto`, `nama`, `email`, `username`, `password`, `tanggal_lahir`, `no_rek`, `no_hp`, `alamat`, `role`) VALUES
(2, 0, '', 'dadang san bambang', 'bambang45@gmail.com', 'bangjago_00', '75e268897eba759cdca75ccb3efc3d40e583236f5105477c825d6b38085533b5e5192b91e79f6a58f1b6eb6c4103edf97eec8d51928c4f6349e50f58969c6195', '12-09-1988', '1223334433', '822393307', 'jl.sendiri gada gandengan Blok B.00', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_pengajar` (`id_pengajar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_tingkatan` (`id_tingkatan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pengajar` (`id_pengajar`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkatan`
--
ALTER TABLE `tingkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id`);
