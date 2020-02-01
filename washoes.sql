-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 05:39 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `washoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'washoes', 'f8f79602def57222eed5a596dd233060');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double(13,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama`, `harga`) VALUES
(1, 'Blimbing', 2000),
(2, 'Klojen', 3000),
(3, 'Kedungkandang', 4000),
(4, 'Sukun', 5000),
(5, 'Lowokwaru', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double(13,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama`, `harga`) VALUES
(1, 1, 'Balearjosari', 500),
(2, 1, 'Arjosari', 500),
(3, 1, 'Polowijen', 500),
(4, 1, 'Purwodadi', 500),
(5, 1, 'Pandanwangi', 500),
(6, 1, 'Blimbing', 500),
(7, 1, 'Purwantoro', 500),
(8, 1, 'Bunulrejo', 500),
(9, 1, 'Kesatrian', 500),
(10, 1, 'Polehan', 500),
(11, 1, 'Jodipan', 500),
(12, 2, 'Klojen', 1000),
(13, 2, 'Samaan', 1000),
(14, 2, 'Rampalcelaket', 500),
(15, 2, 'Kiduldalem', 500),
(16, 2, 'Sukoharjo', 1000),
(17, 2, 'Kasin', 500),
(18, 2, 'Kauman', 500),
(19, 2, 'Oro orodowo', 500),
(20, 2, 'Bareng', 500),
(21, 2, 'Gadingkasri', 1000),
(22, 2, 'Penanggungan', 1000),
(23, 3, 'Kotalama', 500),
(24, 3, 'Mergosono', 500),
(25, 3, 'Bumiayu', 500),
(26, 3, 'Wonokoyo', 500),
(27, 3, 'Buring', 2000),
(28, 3, 'Kedungkandang', 2000),
(29, 3, 'Lesanpuro', 500),
(30, 3, 'Sawojajar', 2000),
(31, 3, 'Madyopuro', 500),
(32, 3, 'Cemorokandang', 500),
(33, 3, 'Arjowinangun', 500),
(34, 3, 'Tlogowaru', 2000),
(35, 4, 'Ciptomulyo', 1000),
(36, 4, 'Gadang', 500),
(37, 4, 'Kebonsari', 1000),
(38, 4, 'Bandungrejosari', 500),
(39, 4, 'Sukun', 500),
(40, 4, 'Tanjungrejo', 500),
(41, 4, 'Pisangcandi', 1000),
(42, 4, 'Bandulan', 500),
(43, 4, 'Karangbesuki', 500),
(44, 4, 'Mulyorejo', 2000),
(45, 4, 'Bakalankrajan', 1000),
(46, 5, 'Tunggulwulung', 2000),
(47, 5, 'Merjosari', 500),
(48, 5, 'Tlogomas', 1000),
(49, 5, 'Dinoyo', 2000),
(50, 5, 'Sumbersari', 500),
(51, 5, 'Ketawanggede', 2000),
(52, 5, 'Jatimulyo', 1000),
(53, 5, 'Tunjungsekar', 500),
(54, 5, 'Mojolangu', 2000),
(55, 5, 'Tulusrejo', 500),
(56, 5, 'Lowokwaru', 1000),
(57, 5, 'Tasikmadu', 500);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double(13,0) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama`, `harga`, `deskripsi`) VALUES
(1, 'Standard Clean', 40000, 'Pencucian biasa pada sepatu anda'),
(2, 'Deep Clean', 60000, 'Pencucian sebersih-bersihnya'),
(3, 'Kids Shoes', 30000, 'Pencucian khusus untuk sepatu anak-anak'),
(4, 'Repaint', 150000, 'Pencucian disertai pewarnaan untuk sepatu anda'),
(5, 'Waterproof Coating', 85000, 'Lapisi sepatu anda agar tidak basah'),
(6, 'Unyellowing', 70000, 'Hilangkan noda kuning pada sepatu anda');

-- --------------------------------------------------------
--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `stat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `stat`) VALUES
(1, 'Dalam Penjemputan'),
(2, 'Proses Pencucian'),
(3, 'Pencucian Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `tanggal` date DEFAULT NULL,
  `total_harga` decimal(13,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `status`, `tanggal`, `total_harga`) VALUES
('10210372', 1, 1, '2019-03-21', '152500'),
('10210379', 1, 1, '2019-03-21', '192500'),
('10220324', 1, 1, '2019-03-22', '152500'),
('10220358', 1, 1, '2019-03-22', '32500'),
('1022038', 1, 1, '2019-03-22', '157500'),
('10280329', 1, 1, '2019-03-28', '307500'),
('10290332', 1, 2, '2019-03-29', '102500'),
('10300360', 1, 1, '2019-03-30', '92500'),
('20220350', 2, 1, '2019-03-22', '232500'),
('2022039', 2, 1, '2019-03-22', '32500'),
('40220323', 4, 1, '2019-03-22', '97000'),
('40220388', 4, 1, '2019-03-22', '77000'),
('50210338', 5, 1, '2019-03-21', '102500'),
('50210353', 5, 1, '2019-03-21', '72500'),
('50210359', 5, 1, '2019-03-21', '87500'),
('70300324', 7, 1, '2019-03-30', '152500'),
('80300332', 8, 1, '2019-03-30', '45500'),
('80300335', 8, 3, '2019-03-30', '45500'),
('8030034', 8, 3, '2019-03-30', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_order` varchar(30) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `sub_total` decimal(13,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_order`, `id_layanan`, `sub_total`) VALUES
(3, '50210338', 2, '60000'),
(4, '50210338', 1, '40000'),
(5, '50210359', 5, '85000'),
(6, '50210353', 1, '40000'),
(7, '50210353', 3, '30000'),
(10, '10210379', 2, '60000'),
(11, '10210379', 2, '60000'),
(12, '10210379', 1, '40000'),
(13, '10210379', 3, '30000'),
(15, '10210372', 4, '150000'),
(18, '40220388', 1, '40000'),
(19, '40220388', 3, '30000'),
(20, '20220350', 1, '40000'),
(21, '20220350', 1, '40000'),
(22, '20220350', 4, '150000'),
(23, '1022038', 6, '70000'),
(24, '1022038', 5, '85000'),
(25, '10220324', 4, '150000'),
(26, '10220358', 3, '30000'),
(27, '2022039', 3, '30000'),
(28, '40220323', 2, '60000'),
(29, '40220323', 3, '30000'),
(33, '10280329', 4, '150000'),
(34, '10280329', 3, '30000'),
(35, '10280329', 5, '85000'),
(36, '10280329', 1, '40000'),
(37, '10290332', 1, '40000'),
(38, '10290332', 3, '30000'),
(39, '10290332', 3, '30000'),
(40, '70300324', 4, '150000'),
(41, '10300360', 2, '60000'),
(42, '10300360', 3, '30000'),
(43, '80300332', 1, '40000'),
(44, '80300335', 1, '40000'),
(46, '8030034', 1, '40000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_kelurahan` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesanan` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_kelurahan`, `id_kecamatan`, `nama`, `username`, `password`, `alamat`, `email`, `pesanan`) VALUES
(1, 1, 1, 'Muhammad Wildan Aldiansyah', 'Aldiwildan', '8068c76c7376bc08e2836ab26359d4a4', 'Jalan Sanan No 61', 'Aldiwild77@gmail.com', 8),
(2, 1, 1, 'Aditya Wicaksono', 'aditwicak', '8068c76c7376bc08e2836ab26359d4a4', 'Jalan Senopati no 99', 'aditwicak@gmail.com', 2),
(4, 48, 5, 'Natasha Eldha O', 'natasha', '8068c76c7376bc08e2836ab26359d4a4', 'Jalan Buring no 1', 'natnat@gmail.com', 2),
(5, 7, 1, 'Subchan', 'subchan', '8068c76c7376bc08e2836ab26359d4a4', 'Jalan Sanan No 31', 'subchan@gmail.com', 3),
(6, 33, 3, 'Gilang Nur ', 'gilangnur', '8068c76c7376bc08e2836ab26359d4a4', 'Jalan Sanan No 1', 'gil@gmail.com', 0),
(7, 6, 1, 'googa googa', 'googa123', '8068c76c7376bc08e2836ab26359d4a4', 'Jalan Selawean No 1', 'googa@gmail.com', 1),
(8, 42, 4, 'alif andarta al falah', 'alifandrt', '8068c76c7376bc08e2836ab26359d4a4', 'Jalan wagirno no 9', 'alifandrt@gmail.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_kelurahan` (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
