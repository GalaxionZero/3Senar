-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 03:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbreview`
--
CREATE DATABASE IF NOT EXISTS `dbreview` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbreview`;

-- --------------------------------------------------------

--
-- Table structure for table `start_review`
--

CREATE TABLE `start_review` (
  `id` int(255) NOT NULL,
  `user` varchar(50) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `tanggal` date NOT NULL,
  `foto_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `start_review`
--

INSERT INTO `start_review` (`id`, `user`, `nama_tempat`, `ulasan`, `rating`, `tanggal`, `foto_path`) VALUES
(10, 'Mulyono', 'Toko Kayu Serbaguna Makmur Jaya', 'Murah dan berkualiatas', 4, '2024-10-21', '2024-10-21 11.54.52.jpg'),
(11, 'Rafif', 'Ayam Geprek', 'Sangat enak dan murah', 4, '2024-10-21', '2024-10-21 11.55.17.jpeg'),
(12, 'Adi', 'Fantech', 'Barangnya bagus dan keren', 5, '2024-10-21', '2024-10-21 11.56.00.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Gregrow', 'rafif.zahran.haryadi@gmail.com', '$2y$10$fGAswPfyxV6FbtwP2eyvHuifw9gpC6blm1ZuivK7Kb8KHlq12ZODW'),
(2, 'Apipgans', 'rafifzahranh7@gmail.com', '$2y$10$EDlHKGj./zzAXicev/vEZebtgJBPq4xyWrviQdd3djRAAk0rCjWBO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `start_review`
--
ALTER TABLE `start_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `start_review`
--
ALTER TABLE `start_review`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
