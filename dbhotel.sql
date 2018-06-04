-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 01:09 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(255) NOT NULL,
  `jumlah_kamar` int(255) NOT NULL,
  `occupancy` int(255) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `imgpath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `jumlah_kamar`, `occupancy`, `size`, `nama_kamar`, `harga`, `imgpath`) VALUES
(1, 5, 2, '5 m', 'Deluxe Room', 1000, 'img/room2.png'),
(2, 5, 2, '10 m', 'Single Room', 2000, 'img/room3.png'),
(3, 10, 10, '20 m', 'King Suite Room', 3000, 'img/room3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(33) NOT NULL,
  `email` varchar(33) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `alamat`, `pesan`) VALUES
(1, 'aa', 'waw1891@gmail.com', 'tawangrejo', 'z'),
(2, 'aa', 'waw1891@gmail.com', 'tawangrejo', 'z'),
(3, 'aa', 'waw1891@gmail.com', 'tawangrejo', 'z'),
(4, 'aa', 'waw1891@gmail.com', 'tawangrejo', 'z'),
(5, 'aa', 'waw1891@gmail.com', 'tawangrejo', 'z'),
(6, 'aa', 'waw1891@gmail.com', 'tawangrejo', 'z'),
(7, 'aa', 'waw1891@gmail.com', 'tawangrejo', 'z');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(200) NOT NULL,
  `tamudewasa` int(50) NOT NULL,
  `tamuanak` int(50) NOT NULL,
  `cekin` date NOT NULL,
  `cekout` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `lain_lain` text NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `jumlah_bayar` double DEFAULT NULL,
  `nama_awal` varchar(30) NOT NULL,
  `nama_akhir` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepone` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `tamudewasa`, `tamuanak`, `cekin`, `cekout`, `durasi`, `lain_lain`, `payment_status`, `jumlah_bayar`, `nama_awal`, `nama_akhir`, `email`, `telepone`, `alamat`) VALUES
(1, 1, 0, '2018-05-01', '2018-05-03', 0, '', 'pending', 4000, '', '', '', '', ''),
(2, 1, 0, '2018-05-01', '2018-05-03', 0, '', '', 4000, '', '', '', '', ''),
(3, 1, 0, '2018-05-04', '2018-05-05', 0, '', '', 1000, 'choirul', 'miftah', 'waw1891@gmail.com', '+6285771330944', 'tawangrejo'),
(4, 2, 0, '2018-05-04', '2018-05-05', 1, '', '', 4000, 'miftah', 'miftah', 'waw1891@gmail.com', '+6285771330944', 'tawangrejo'),
(5, 2, 0, '2018-05-04', '2018-05-05', 1, '', '', 4000, 'miftah', 'miftah', 'waw1891@gmail.com', '+6285771330944', 'tawangrejo'),
(6, 1, 0, '2018-05-05', '2018-05-08', 3, '', '', 21000, 'aku', 'asasasas', 'yahoo@webmail.php', '', 'sa'),
(7, 1, 1, '2018-05-03', '2018-05-04', 1, '', 'pending', 1000, 'a', 'aaa', 'waw1891@gmail.com', '+6285771330944', 'tawangrejo'),
(8, 2, 0, '2018-05-03', '2018-05-26', 23, 'kopi', 'pending', 690000, 'choirul', 'miftah', 'waw1891@gmail.com', '+6285771330944', 'tawangrejo'),
(9, 1, 2, '2018-05-27', '2018-05-29', 2, '', 'pending', 6000, 'choirul', 'miftah', '', '+6285771330944', 'tawangrejo'),
(10, 1, 0, '2018-05-01', '2018-05-04', 3, '', 'pending', 18000, 'choirul', 'miftah', 'waw1891@gmail.com', '+6285771330944', 'tawangrejo'),
(11, 3, 2, '2018-06-02', '2018-06-16', 14, '', 'pending', 14000, 'choirul', 'miftah', 'aaaaaaaaaaaaaa@webmail.com', '+6285771330944', 'tawangrejo'),
(12, 1, 0, '2018-06-09', '2018-06-23', 14, '', 'pending', 70000, 'choirul', 'miftah', 'aaaaaaaaaaaaaa@webmail.com', '+6285771330944', 'tawangrejo'),
(13, 1, 0, '2018-06-02', '2018-06-09', 7, '', 'pending', 14000, 'choirul', 'miftaha', 'yahoo@webmail.php', '+6285771330944', 'tawangrejo'),
(14, 1, 1, '2018-06-02', '2018-06-05', 3, '', 'pending', 3000, 'choirul', 'miftah', 'aaaaaaaaaaaaaa@webmail.com', '+6285771330944', 'tawangrejo'),
(15, 1, 2, '2018-06-02', '2018-06-16', 14, '', 'pending', 31000, 'choirul', 'miftah', 'aaaaaaaaaaaaaa@webmail.com', '+6285771330944', 'tawangrejo'),
(16, 2, 0, '2018-06-01', '2018-06-02', 1, 'aa', 'pending', 1000, 'miftah', 'miftaha', 'waw1891@gmail.com', '+6285771330944', 'tawangrejo'),
(17, 0, 0, '0000-00-00', '0000-00-00', 0, '', 'pending', 0, 'choirul', '', 'yahoo@webmail.php', '', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `pesankamar`
--

CREATE TABLE `pesankamar` (
  `id_pesan` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesankamar`
--

INSERT INTO `pesankamar` (`id_pesan`, `id_kamar`, `jumlah_pesan`, `id`) VALUES
(1, 1, 2, 1),
(2, 1, 2, 2),
(3, 1, 1, 3),
(4, 1, 1, 4),
(4, 2, 1, 5),
(5, 1, 1, 6),
(5, 2, 1, 7),
(6, 1, 1, 8),
(6, 2, 3, 9),
(7, 1, 1, 10),
(8, 3, 10, 11),
(9, 1, 3, 12),
(10, 2, 3, 13),
(11, 1, 1, 14),
(12, 1, 5, 15),
(13, 2, 1, 16),
(14, 1, 1, 17),
(15, 2, 1, 18),
(16, 1, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `pesankamar`
--
ALTER TABLE `pesankamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pesankamar`
--
ALTER TABLE `pesankamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
