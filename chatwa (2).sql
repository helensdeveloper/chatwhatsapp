-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2021 at 10:14 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `apps_id` int(3) NOT NULL,
  `apps_code` varchar(50) DEFAULT NULL,
  `apps_api` varchar(250) DEFAULT NULL,
  `apps_token` text,
  `apps_devicekey` varchar(250) DEFAULT NULL,
  `apps_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`apps_id`, `apps_code`, `apps_api`, `apps_token`, `apps_devicekey`, `apps_update`) VALUES
(1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `j_id` int(15) NOT NULL,
  `j_nama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`j_id`, `j_nama`) VALUES
(1, 'Admin'),
(2, 'Admin'),
(3, 'Admin Lab'),
(4, 'Coba');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `k_id` int(20) NOT NULL,
  `k_nama` varchar(100) DEFAULT NULL,
  `k_jk` varchar(50) DEFAULT NULL,
  `k_kota` varchar(50) DEFAULT NULL,
  `k_lahir` datetime DEFAULT NULL,
  `k_jabatan` int(15) DEFAULT NULL,
  `k_phone` varchar(50) DEFAULT NULL,
  `k_email` varchar(100) DEFAULT NULL,
  `k_status` int(15) DEFAULT NULL,
  `k_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`k_id`, `k_nama`, `k_jk`, `k_kota`, `k_lahir`, `k_jabatan`, `k_phone`, `k_email`, `k_status`, `k_date`) VALUES
(1, 'Dedy Aprianda', '1', 'Suko Rejo', '1997-12-20 00:00:00', 4, '6282288777821', 'dediafrianda11@gmail.com', 1, '2020-12-22 14:08:53'),
(2, 'Dedy Aprianda', '1', 'Suko Rejo', '1997-12-20 00:00:00', 4, '6282288777821', 'helensdeveloper@gmail.com', 1, '2020-12-22 14:08:53'),
(3, 'Dedy Aprianda', '1', 'Suko Rejo', '1997-12-20 00:00:00', 4, '6282288777821', 'dediafrianda44@gmail.com', 1, '2020-12-22 14:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` int(5) NOT NULL,
  `smtp_protocol` varchar(10) DEFAULT NULL,
  `smtp_host` varchar(150) NOT NULL,
  `smtp_email` varchar(150) NOT NULL,
  `smtp_password` text NOT NULL,
  `smtp_secure` varchar(20) NOT NULL,
  `port_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`id`, `smtp_protocol`, `smtp_host`, `smtp_email`, `smtp_password`, `smtp_secure`, `port_no`) VALUES
(1, 'smtp', 'smtp.gmail.com', 'boxmusic664@gmail.com', 'Alnaira25102018', 'ssl', '465');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(150) DEFAULT NULL,
  `u_pass` varchar(150) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_role` int(5) DEFAULT NULL,
  `u_kid` int(20) DEFAULT NULL,
  `u_last` timestamp NULL DEFAULT NULL,
  `u_ip` varchar(50) DEFAULT NULL,
  `u_stat` varchar(10) DEFAULT NULL,
  `u_photo` varchar(100) DEFAULT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_pass`, `u_email`, `u_role`, `u_kid`, `u_last`, `u_ip`, `u_stat`, `u_photo`, `u_date`) VALUES
(1, 'admin', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=', 'dediafrianda11@gmail.com', 1, 1, '0000-00-00 00:00:00', '127.0.0.1', '1', '90x90.jpg', '2021-01-15 04:20:47'),
(16, 'user1', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=', 'helensdeveloper@gmail.com', 2, 2, '0000-00-00 00:00:00', '127.0.0.1', '1', '90x90.jpg', '2021-01-01 07:52:08'),
(17, 'user2', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=', 'dediafrianda44@gmail.com', 2, 3, '0000-00-00 00:00:00', '127.0.0.1', '1', '90x90.jpg', '2021-01-22 03:52:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`apps_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `apps_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `j_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `k_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
