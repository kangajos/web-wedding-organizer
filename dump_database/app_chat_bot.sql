-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 08:07 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_chat_bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_bot`
--

CREATE TABLE `chat_bot` (
  `chat_bot_id` int(11) NOT NULL,
  `tanya` varchar(255) NOT NULL,
  `jawab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_bot`
--

INSERT INTO `chat_bot` (`chat_bot_id`, `tanya`, `jawab`) VALUES
(1, 'hallo apakabar ?.', 'Selamat datang gan/sis, ada yang bisa kami bantu :)'),
(2, 'halo', 'selmat datang, ada yang bisa kami bantu ?'),
(3, 'harganya berapa ?', 'Harga yang mana ya kak ?');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `username`, `password`, `nama`, `alamat`, `no_hp`, `email`, `desa`, `kecamatan`, `kabupaten`, `status`, `level`) VALUES
(3, 'agus@gmail.com', 'c498416fd06f740698fc2a89f93fec85', 'agus salim', 'lumajang', '+6285801025012', 'agus@gmail.com', 'lumajang', 'lumajang', 'lumajang', 1, 'user'),
(4, 'uying@gmail.com', '5a308491886d95e6826ef76632ba6de5', 'Uying', 'Probolinggo', '0823555777666', 'uying@gmail.com', 'Probolinggo', 'Probolinggo', 'Pobolinggo', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `paket_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paket_id`, `nama`, `deskripsi`, `harga`) VALUES
(1, 'paket malam', 'paket malam murah', 20000),
(2, 'Paket pagi dan siang', 'paket pagi dan siang paling hemat', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `kode_pemesanan` varchar(255) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_sewa` int(11) NOT NULL DEFAULT '1',
  `produk_id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL,
  `pesan` text,
  `hapus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `kode_pemesanan`, `tanggal_pemesanan`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_sewa`, `produk_id`, `paket_id`, `member_id`, `status`, `pesan`, `hapus`) VALUES
(2, 'paket-174', '2019-03-05', '2019-03-08', '2019-03-09', 1, 0, 1, 3, '1', '', 1),
(4, 'produk-666', '2019-03-05', '2019-03-08', '2019-03-09', 2, 8, 0, 3, '1', 'admin', 0),
(5, 'produk-225', '2019-03-21', '2019-03-24', '2019-03-25', 4, 6, 0, 3, '1', '', 0),
(6, 'paket-749', '2019-03-21', '2019-03-24', '2019-03-25', 5, 0, 2, 3, '1', '', 0),
(7, 'produk-968', '2019-03-24', '2019-03-27', '2019-03-28', 1, 7, 0, 3, '1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `jenis`, `deskripsi`, `harga`, `gambar`) VALUES
(6, 'Nama Produk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem sint facilis, iure ad non deleniti nam similique nihil ipsum praesentium est quos eum modi officiis neque? Aut odit quibusdam vitae.', 290000, '5c4dfd7177cb7WhatsApp Image 2019-01-27 at 10 14 22.jpeg'),
(7, 'Nama Produk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem sint facilis, iure ad non deleniti nam similique nihil ipsum praesentium est quos eum modi officiis neque? Aut odit quibusdam vitae.', 1500000, '5c4dfd9189bc8WhatsApp Image 2019-01-27 at 10 14 23 (1).jpeg'),
(8, 'Nama Produk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem sint facilis, iure ad non deleniti nam similique nihil ipsum praesentium est quos eum modi officiis neque? Aut odit quibusdam vitae.', 1250000, '5c4dfdba067b9WhatsApp Image 2019-01-27 at 10 14 23.jpeg'),
(9, 'Nama Produk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem sint facilis, iure ad non deleniti nam similique nihil ipsum praesentium est quos eum modi officiis neque? Aut odit quibusdam vitae.', 780000, '5c4dfde380aa6WhatsApp Image 2019-01-27 at 10 14 24 (1).jpeg'),
(10, 'Nama Produk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem sint facilis, iure ad non deleniti nam similique nihil ipsum praesentium est quos eum modi officiis neque? Aut odit quibusdam vitae.', 950000, '5c4dfe17be7e1WhatsApp Image 2019-01-27 at 10 14 25 (1).jpeg'),
(11, 'Nama Produk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium obcaecati ea nam eum! Sequi rem illum quia soluta aliquid. Officiis libero vitae atque, maxime perferendis rem quam quasi iusto inventore.', 1205000, '5c4dfec37c7b4WhatsApp Image 2019-01-27 at 10 14 25 (2).jpeg'),
(12, 'Nama Produk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium obcaecati ea nam eum! Sequi rem illum quia soluta aliquid. Officiis libero vitae atque, maxime perferendis rem quam quasi iusto inventore.', 455000, '5c4dfee1a02bdWhatsApp Image 2019-01-27 at 10 14 25.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `temporary`
--

CREATE TABLE `temporary` (
  `temporary_id` int(11) NOT NULL,
  `chat_bot_id` int(11) NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temporary`
--

INSERT INTO `temporary` (`temporary_id`, `chat_bot_id`, `score`) VALUES
(1, 2, 66.6667);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_bot`
--
ALTER TABLE `chat_bot`
  ADD PRIMARY KEY (`chat_bot_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `temporary`
--
ALTER TABLE `temporary`
  ADD PRIMARY KEY (`temporary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_bot`
--
ALTER TABLE `chat_bot`
  MODIFY `chat_bot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `temporary`
--
ALTER TABLE `temporary`
  MODIFY `temporary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
