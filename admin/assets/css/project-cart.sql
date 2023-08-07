-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 02:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-cart`
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `username`, `password`) VALUES
(1, 'genta arimbawa', 'mastayxz', '123456');

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `email_customer`, `nama_customer`, `password_customer`, `telepon`) VALUES
(1, 'AdiTama@gmail.com', 'Tamtama', 'tama123', '081234567890'),
(2, 'AriPadma@gmail.com', 'Ari Padma Sita ', 'ari123', '088975843762'),
(3, 'artavisera@gmail.com', 'Visera Arta', ' arta234', '087856943561');

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 1, '2023-07-02 11:52:24', 14000000),
(2, 2, '2023-07-02 11:52:24', 34000000);

--
-- Dumping data for table `pembelian_product`
--

INSERT INTO `pembelian_product` (`id_pembelian_product`, `id_pembelian`, `id_product`, `jumlah`) VALUES
(1, 1, 3, 1),
(2, 2, 4, 2);

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nama_product`, `harga_product`, `qty`, `image_product`, `dekripsi_product`) VALUES
(3, 'Laptop Asus Tuf Gaming 5', 15000000, 1, 'OIP (1).jpeg', 'Procesor Intel Core i7 RAM 16GB SSD 512GB (Upgradeable)'),
(4, 'Lenovo Q27q Monitor | Lenovo Angola', 20000000, 1, 'we-lenovo_monitor_Q27q_27_gallery-2.jpg', ' Stylish 27” QHD Display'),
(5, 'Lenovo Thinkpad e15 ', 9300000, 1, 'lenovo_20t8002cus_tp_e15_g2_ryzen_1595909.jpg', 'Seri Thinkpad E15 Gen 2 ram 4GB SSD 256Gb');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
