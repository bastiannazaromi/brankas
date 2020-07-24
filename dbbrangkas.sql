-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 02:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbrangkas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id`, `nama`, `email`, `password`, `foto`, `created`) VALUES
(1, 'Brangkas Security', 'brangkas@gmail.com', '$2y$10$E48/XeKViqLkDAkmuP0wEuwlJJ0jnIYE0ZCVfUr8I5FpEL.uL7nDG', 'logo.jpg', 1586955454);

-- --------------------------------------------------------

--
-- Table structure for table `tbakses`
--

CREATE TABLE `tbakses` (
  `id` int(2) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbakses`
--

INSERT INTO `tbakses` (`id`, `akses`) VALUES
(1, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbrekap`
--

CREATE TABLE `tbrekap` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_kartu` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbrekap`
--

INSERT INTO `tbrekap` (`id`, `waktu`, `no_kartu`, `keterangan`) VALUES
(15, '2020-04-28 07:25:11', '04 41 51 E2', 'No Kartu tidak dikenali'),
(21, '2020-04-28 07:43:26', '66 EE A3 25', 'No Kartu tidak dikenali'),
(82, '2020-04-28 09:52:44', '04 41 51 E2 D4 2A 80', 'No Kartu dikenali'),
(109, '2020-05-20 14:04:11', '04 3E 46 62 FB 2A 80', 'No Kartu dikenali'),
(112, '2020-06-02 15:16:15', '66 EE A3 25', 'No Kartu dikenali'),
(113, '2020-06-02 15:16:40', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(114, '2020-06-02 15:17:15', '66 EE A3 25', 'No Kartu dikenali'),
(115, '2020-06-02 15:17:27', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(116, '2020-06-02 15:20:48', '66 EE A3 25', 'No Kartu dikenali'),
(117, '2020-06-02 15:21:08', '89 96 23 B5', 'No Kartu dikenali'),
(118, '2020-06-02 15:21:20', '66 EE A3 25', 'No Kartu dikenali'),
(119, '2020-06-02 15:22:33', '66 EE A3 25', 'No Kartu dikenali'),
(120, '2020-06-02 15:23:14', '66 EE A3 25', 'No Kartu dikenali'),
(121, '2020-06-02 15:23:41', '66 EE A3 25', 'No Kartu dikenali'),
(122, '2020-06-02 15:24:14', '66 EE A3 25', 'No Kartu dikenali'),
(123, '2020-06-02 15:53:48', '66 EE A3 25', 'No Kartu dikenali'),
(124, '2020-06-02 15:53:57', '89 96 23 B5', 'No Kartu dikenali'),
(125, '2020-06-02 15:54:09', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(126, '2020-06-02 15:56:20', '66 EE A3 25', 'No Kartu dikenali'),
(127, '2020-06-02 15:57:06', '66 EE A3 25', 'No Kartu dikenali'),
(128, '2020-06-02 15:58:11', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(129, '2020-06-02 15:58:21', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(130, '2020-06-02 15:58:29', '66 EE A3 25', 'No Kartu dikenali'),
(131, '2020-06-02 15:59:43', '89 96 23 B5', 'No Kartu dikenali'),
(132, '2020-06-02 16:01:47', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(133, '2020-06-02 16:03:37', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(134, '2020-06-02 16:03:45', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(135, '2020-06-02 16:03:53', '89 96 23 B5', 'No Kartu dikenali'),
(136, '2020-06-02 16:05:57', '89 96 23 B5', 'No Kartu dikenali'),
(137, '2020-06-02 16:06:41', '89 96 23 B5', 'No Kartu dikenali'),
(138, '2020-06-02 16:10:24', '89 96 23 B5', 'No Kartu dikenali'),
(139, '2020-06-02 16:11:06', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(140, '2020-06-02 16:11:15', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(141, '2020-06-02 16:11:24', '89 96 23 B5', 'No Kartu dikenali'),
(142, '2020-06-02 16:11:33', '89 96 23 B5', 'No Kartu dikenali'),
(143, '2020-06-02 16:12:03', '89 96 23 B5', 'No Kartu dikenali'),
(144, '2020-06-02 16:13:37', '66 EE A3 25', 'No Kartu dikenali'),
(145, '2020-06-02 16:13:45', '66 EE A3 25', 'No Kartu dikenali'),
(146, '2020-06-02 16:14:05', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(147, '2020-06-02 16:16:43', '66 EE A3 25', 'No Kartu dikenali'),
(148, '2020-06-02 16:23:15', '66 EE A3 25', 'No Kartu dikenali'),
(149, '2020-06-02 19:20:08', '66 EE A3 25', 'No Kartu dikenali'),
(150, '2020-06-02 19:23:35', '66 EE A3 25', 'No Kartu dikenali'),
(151, '2020-06-02 19:23:44', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(152, '2020-06-02 19:23:52', '66 EE A3 25', 'No Kartu dikenali'),
(153, '2020-06-02 19:24:01', '66 EE A3 25', 'No Kartu dikenali'),
(154, '2020-06-02 19:26:24', '66 EE A3 25', 'No Kartu dikenali'),
(155, '2020-06-02 19:26:34', '66 EE A3 25', 'No Kartu dikenali'),
(156, '2020-06-02 19:31:31', '66 EE A3 25', 'No Kartu dikenali'),
(157, '2020-06-02 19:31:39', '66 EE A3 25', 'No Kartu dikenali'),
(158, '2020-06-02 19:31:47', '66 EE A3 25', 'No Kartu dikenali'),
(159, '2020-06-02 19:31:58', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(160, '2020-06-02 19:36:48', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(161, '2020-06-02 19:37:55', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(162, '2020-06-02 19:40:25', '66 EE A3 25', 'No Kartu dikenali'),
(163, '2020-06-02 19:41:28', '66 EE A3 25', 'No Kartu dikenali'),
(164, '2020-06-02 19:45:18', '66 EE A3 25', 'No Kartu dikenali'),
(165, '2020-06-02 19:45:26', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(166, '2020-06-02 19:45:26', 'EB 1F D0 0D', 'No Kartu tidak dikenali'),
(167, '2020-06-02 19:46:39', '66 EE A3 25', 'No Kartu dikenali'),
(168, '2020-06-02 19:46:39', '66 EE A3 25', 'No Kartu dikenali'),
(169, '2020-06-02 19:48:31', '66 EE A3 25', 'No Kartu dikenali'),
(170, '2020-06-02 19:52:12', '66 EE A3 25', 'No Kartu dikenali'),
(171, '2020-06-02 19:54:04', '66 EE A3 25', 'No Kartu dikenali'),
(173, '2020-06-07 10:55:22', '66 EE A3 25', 'No Kartu dikenali'),
(174, '2020-06-07 10:55:41', '66 EE A3 25', 'No Kartu dikenali'),
(175, '2020-06-07 10:55:55', 'B6 69 AD AC', 'No Kartu tidak dikenali'),
(176, '2020-06-07 10:56:05', '66 EE A3 25', 'No Kartu dikenali'),
(177, '2020-06-07 10:58:51', '66 EE A3 25', 'No Kartu dikenali'),
(178, '2020-06-07 10:59:24', '66 EE A3 25', 'No Kartu dikenali'),
(179, '2020-06-07 11:01:30', '66 EE A3 25', 'No Kartu dikenali'),
(180, '2020-06-07 11:03:22', '66 EE A3 25', 'No Kartu dikenali'),
(181, '2020-06-07 11:04:54', '66 EE A3 25', 'No Kartu dikenali'),
(182, '2020-06-07 11:05:35', '66 EE A3 25', 'No Kartu dikenali'),
(183, '2020-06-07 11:06:26', '66 EE A3 25', 'No Kartu dikenali'),
(184, '2020-06-07 11:07:25', '66 EE A3 25', 'No Kartu dikenali'),
(185, '2020-06-07 11:07:45', '66 EE A3 25', 'No Kartu dikenali'),
(186, '2020-06-07 11:08:13', '66 EE A3 25', 'No Kartu dikenali'),
(187, '2020-06-07 11:08:41', '66 EE A3 25', 'No Kartu dikenali'),
(188, '2020-06-07 11:09:01', 'B6 69 AD AC', 'No Kartu tidak dikenali'),
(189, '2020-06-07 11:10:47', '66 EE A3 25', 'No Kartu dikenali'),
(190, '2020-06-07 11:11:46', 'B6 69 AD AC', 'No Kartu tidak dikenali'),
(191, '2020-06-07 11:11:57', 'B6 69 AD AC', 'No Kartu tidak dikenali'),
(192, '2020-06-07 11:12:16', '66 EE A3 25', 'No Kartu dikenali'),
(193, '2020-06-07 11:12:36', 'B6 69 AD AC', 'No Kartu tidak dikenali'),
(194, '2020-06-07 11:12:45', '66 EE A3 25', 'No Kartu dikenali'),
(195, '2020-06-07 11:13:00', '66 EE A3 25', 'No Kartu dikenali'),
(196, '2020-06-07 11:13:51', '66 EE A3 25', 'No Kartu dikenali'),
(197, '2020-06-07 11:14:07', '66 EE A3 25', 'No Kartu dikenali'),
(198, '2020-06-07 11:14:27', 'B6 69 AD AC', 'No Kartu tidak dikenali'),
(199, '2020-06-07 11:14:39', '66 EE A3 25', 'No Kartu dikenali'),
(200, '2020-06-07 11:17:36', '66 EE A3 25', 'No Kartu dikenali'),
(201, '2020-06-07 11:18:09', '66 EE A3 25', 'No Kartu dikenali'),
(202, '2020-06-07 11:18:59', 'B6 69 AD AC', 'No Kartu tidak dikenali'),
(203, '2020-06-07 11:19:11', '66 EE A3 25', 'No Kartu dikenali'),
(204, '2020-06-07 11:20:11', '66 EE A3 25', 'No Kartu dikenali'),
(205, '2020-06-07 11:20:27', 'B6 69 AD AC', 'No Kartu tidak dikenali'),
(206, '2020-06-07 11:20:40', '66 EE A3 25', 'No Kartu dikenali'),
(207, '2020-06-07 11:21:54', 'B6 69 AD AC', 'No Kartu tidak dikenali'),
(208, '2020-06-07 11:22:20', '66 EE A3 25', 'No Kartu dikenali');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_kartu` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `nama`, `no_kartu`, `status`, `created`) VALUES
(1, 'Angga aditya', '89 96 23 B5', 'ACC', 1586955454),
(2, 'm. tanziilal', '66 EE A3 25', 'ACC', 1586955454),
(9, 'Aditya Angga', '04 3E 46 62 FB 2A 80', 'ACC', 1589983430),
(11, 'Default', '89 96 23 B2', 'Belum ACC', 1592147369);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik` (`email`);

--
-- Indexes for table `tbakses`
--
ALTER TABLE `tbakses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbrekap`
--
ALTER TABLE `tbrekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbakses`
--
ALTER TABLE `tbakses`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbrekap`
--
ALTER TABLE `tbrekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
