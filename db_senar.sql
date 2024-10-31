-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 03:41 AM
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
-- Database: `db_senar`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `stok`, `deskripsi`, `foto`) VALUES
(4, 'Guitar Electric REVSTAR', 6900000, 4, 'Gitar Revstar original diluncurkan pada tahun 2015—seri gitar elektrik baru yang pertama dari kami dalam lebih dari satu dekade. Lineup yang benar-benar baru diperkenalkan pada tahun 2022.\r\n\r\nGaya Revstar terinspirasi oleh motor café racer—mesin berperforma tinggi dengan penampilan sederhana yang disesuaikan untuk mencerminkan kepribadian pengendaranya.\r\n\r\nRevstar menyeimbangkan inovasi Jepang dan craftmanship tradisional. Fitur modern meningkatkan playability, versatility, dan tone, sedangkan desainnya mengacu pada gitar elektrik klasik Yamaha dari tahun 1966.\r\n\r\n\" ', '2024-10-29 03.34.31.webp'),
(5, 'Guitar Electric L Series', 10200000, 2, 'Yamaha L Series yang baru menawarkan kombinasi sempurna antara tradisional dan modern: nada hangat dan seimbang yang sangat cocok dengan pertunjukan solo atau mix; keelokan abadi terinspirasi oleh keterampilan pembuatan gitar selama 50 tahun yang dimiliki Yamaha; kenyamanan bermain instan; performa yang siap ditampilkan di panggung sebagai standar dengan sistem pickup Zero Impact yang baru dari Yamaha.\r\n\r\nA.R.E. (Acoustic Resonance Enhancement)\r\nA.R.E. (Acoustic Resonance Enhancement) adalah teknologi pembentukan ulang kayu orisinal yang dikembangkan oleh Yamaha. Melalui pengontrolan suhu, kelembapan, dan tekanan atmosfer yang presisi, sifat molekuler kayu dapat dimanipulasi menjadi kondisi yang lebih ideal secara akustik, mirip dengan karakteristik molekuler kayu dalam alat musik yang sudah dimainkan selama bertahun-tahun.\" ', '2024-10-29 03.56.27.webp'),
(8, 'Grand Piano CFX', 2147483647, 1, 'Filosofi desain CFX: “Konsep Unibodi”\r\nBagaimana Anda membuat alat musik yang tidak menyisakan ruang antara apa yang ingin disampaikan oleh pianis dan apa yang mereka dengar? Dimana setiap nada, warna halus, dan nuansa diekspresikan seperti yang dibayangkan? Dimana tidak ada sedikit pun gairah yang hilang dalam terjemahan dari jari, ke tuts, hammer, soundboard, dan resonansi mengisi aula konser? Dan suara murni mengalir dengan mudah dari seniman ke piano ke penonton? Ini adalah visi dari CFX.\r\n\r\nDibentuk oleh seniman untuk seniman\r\nMembuat konser megah agar terasa penyambung ekspresi Anda tidak terjadi dalam satu malam. Dibutuhkan seluruh perusahaan yang berdedikasi untuk suara selama lebih dari satu abad. Perusahaan yang berkomitmen pada inovasi agar seniman dapat mengekspresikan diri sepenuhnya. Sementara teknologi canggih dapat membantu menciptakan piano yang luar biasa, tetapi teknologi tersebut tidak dapat menggantikan telinga, mata, tangan, dan hati dari sang seniman. Hal tersebut tidak mengukur perasaan Anda ketika menekan not, atau menjelaskan mengapa nada tertentu membuat Anda merinding. CFX secara terus menerus dibentuk oleh umpan balik dari pianis terkemuka di dunia. Bukan hanya konser yang diimpikan oleh para seniman besar. Ini adalah piano yang mereka bantu untuk wujudkan.\r\n\r\nDua alat paling canggih dalam pembuatan piano\r\nPabrik Yamaha di Kakegawa, Jepang, telah mendapatkan reputasi sebagai level tertinggi dalam pembuatan piano. Tetapi di dalam sudut pabrik ini ada tempat yang lebih luar biasa. Workshop Concert Piano, tempat pengrajin ahli paling terampil kami membuat piano sepenuhnya dengan tangan. Para pengrajin ini telah belajar dari generasi pengrajin sebelumnya. Dilatih untuk mengevaluasi bahan-bahan alami yang hidup dan bernapas. Diajarkan untuk memilih kayu yang layak untuk dibuat menjadi CFX. Tukang kayu ahli yang telah membentuk soundboard, rim dan back post untuk panggung paling terkenal. Pengrajin ahli yang secara intuitif memahami keseimbangan antara presisi absolut dan sentuhan manusia. Teknisi yang telah memberikan pendapat dan mengatur concert grand untuk kompetisi bergengsi. Ini adalah upaya gabungan dari para pengrajin yang menciptakan produk unggulan yang unik. Saat memainkan CFX, Anda akan menyadari bahwa keputusan ini berada di tangan yang sangat mahir.', '2024-10-29 05.32.34.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `id_purchase` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id_user` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` int(13) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `tgl_lhr` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`id_purchase`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_order_history` (`id_order`),
  ADD KEY `fk_id_order_products` (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD CONSTRAINT `fk_id_user_purchase` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `fk_id_order_history` FOREIGN KEY (`id_order`) REFERENCES `purchase_history` (`id_purchase`),
  ADD CONSTRAINT `fk_id_order_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `fk_id_user_data` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
