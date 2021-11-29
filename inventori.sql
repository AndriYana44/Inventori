-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2021 at 02:12 AM
-- Server version: 8.0.25
-- PHP Version: 7.3.24-(to be removed in future macOS)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dinas`
--

CREATE TABLE `tb_dinas` (
  `id` int NOT NULL,
  `dinas` varchar(255) NOT NULL,
  `jml_polri` int NOT NULL,
  `jml_pns` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_perlengkapan_badan`
--

CREATE TABLE `tb_perlengkapan_badan` (
  `id` int NOT NULL,
  `id_dinas` int NOT NULL,
  `sabhara` int NOT NULL,
  `lantas` int NOT NULL,
  `jaket_staf_pria` int NOT NULL,
  `jaket_staf_wanita` int NOT NULL,
  `baju_sabhara_pria` int NOT NULL,
  `baju_sabhara_wanita` int NOT NULL,
  `baju_provos_pria` int NOT NULL,
  `baju_provos_wanita` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_perlengkapan_kaki`
--

CREATE TABLE `tb_perlengkapan_kaki` (
  `id` int NOT NULL,
  `id_dinas` int NOT NULL,
  `pdl_staf` int NOT NULL,
  `olahraga` int NOT NULL,
  `kaos_kaki` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_perlengkapan_kepala`
--

CREATE TABLE `tb_perlengkapan_kepala` (
  `id` int NOT NULL,
  `id_dinas` int NOT NULL,
  `jilbab_polwan` int DEFAULT '0',
  `jilbab_reskrim` int DEFAULT '0',
  `jilbab_pns` int DEFAULT '0',
  `topi_gol_1` int DEFAULT '0',
  `topi_gol_2` int DEFAULT '0',
  `topi_gol_3` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@localhost.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_perlengkapan_badan`
--
ALTER TABLE `tb_perlengkapan_badan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_perlengkapan_kaki`
--
ALTER TABLE `tb_perlengkapan_kaki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_perlengkapan_kepala`
--
ALTER TABLE `tb_perlengkapan_kepala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_perlengkapan_badan`
--
ALTER TABLE `tb_perlengkapan_badan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_perlengkapan_kaki`
--
ALTER TABLE `tb_perlengkapan_kaki`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_perlengkapan_kepala`
--
ALTER TABLE `tb_perlengkapan_kepala`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
