-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 10:00 AM
-- Server version: 11.1.0-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studi_kasus`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'fondasa', 'New York', '6289520000000'),
(2, 'fandi', 'surabaya', '+6289524004702');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Jacket'),
(2, 'Kemeja'),
(3, 'Koko'),
(4, 'celana\r\n'),
(20, 'kaos');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `ketersediaan_stok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `nama`, `harga`, `ketersediaan_stok`) VALUES
(42, 'Koko Pria Premium', 345000, 'tersedia'),
(46, 'Kemeja Pria', 130000, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$6Eljd3XlRDz1ji4epgJW3OnYr2I7W20v3L7hWachJ8IDGDKo4Wv9C');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(7, 1, 'Jacket Pria Special Edition', 250000, 'mQjSnGKZxiNS37vKkzr7.png', 'Jacket Special Edition yang Sangat Langka dan banyak dicari oleh pada Kolektor Pakaian', 'tersedia'),
(8, 2, 'Kemeja Pria', 130000, 'WncPHIP3yWfSnLvwPa1J.png', 'Kemeja Pria dengan Harga Terjangkau yang bisa Kalian Lihat Sekarang', 'tersedia'),
(9, 2, 'Kemeja Kekinian Produk Terbaru', 155000, 'IFE1RSJRu6WF0nsK64FQ.png', 'Kemeja Produk Terbaru ini yaitu dengan Design yang kekinian', 'tersedia'),
(10, 3, 'Baju Koko Pria Elegan', 175000, 'V9vHmmpIiUOft7rJRlyO.png', 'Baju Koko ini Cocok untuk Pria yang lebih mengedepankan Design yang Minimalis namun tetap terlihat Elegan', 'tersedia'),
(11, 3, 'Baju Koko Produk Terbaru ', 155000, 'xBSiOMoYuGWwgXE8P8Iy.png', 'Baju Koko ini cocok untuk Anak Muda yang suka bepergian tetapi tetap terlihat Elegan dengan Design tersebut', 'tersedia'),
(12, 3, 'Koko Pria Premium', 345000, 'DMns57AgMqKKQKJTlg05.png', 'Baju Koko Premium dengan bahan terbuat dari Kain Katun dengan Jahitan asli dan banyak digemari oleh kalangan Anak Muda', 'tersedia'),
(13, 1, 'Jacket Pria Model Terbaru', 240000, 'rRecl4IefcbbWefi70EQ.png', 'Jacket Keluaran Terbaru dari Kami yang mengedepankan Style Kekinian dan Desain yang Terbaik', 'tersedia'),
(14, 3, 'baju koko sederhana', 5000000, 'U7kfd5zampgNWro6m3uv.png', 'ini baju koko dengan keluaran terbaru', 'tersedia'),
(16, 1, 'jacket terbaru', 500000, 'TitZLFZGBMgOSwkdpwNw.png', 'ini jacket terbaru', 'tersedia'),
(17, 1, 'jacket pria terbaru', 450000, '144i85qCJmPGs6bxayQh.png', 'jacket terbaru', 'tersedia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
