-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2024 at 05:14 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040125`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id_content` int NOT NULL,
  `title_content` varchar(255) NOT NULL,
  `desc_content` text NOT NULL,
  `detail_content` text NOT NULL,
  `img_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id_content`, `title_content`, `desc_content`, `detail_content`, `img_content`) VALUES
(1, 'EXHUMA (2024)', 'Setelah mengalami serangkaian kejadian paranormal, sebuah keluarga kaya yang tinggal di LA memanggil duo dukun muda yang sedang naik daun, Hwa Rim dan Bong Gil untuk menyelamatkan bayi baru lahir di keluarga tersebut. Begitu mereka tiba, Hwa Rim merasakan bayangan gelap nenek moyang mereka telah melekat pada keluarga dalam apa yang disebut \'Panggilan Kuburan\'.\n\nUntuk menggali kuburan dan meringankan beban leluhur, Hwa Rim mencari bantuan dari geomancer terkemuka Sang Deok dan ahli pemakaman Yeong Geun. Yang membuat mereka kecewa, keempatnya menemukan kuburan di lokasi teduh di desa terpencil di Korea. Tidak menyadari konsekuensinya, penggalian dilakukan, melepaskan kekuatan jahat yang terkubur di bawahnya.', 'Negara: Korea Selatan\r\nTanggal Rilis: Feb 16, 2024\r\nDurasi: 2 jam, 13 menit.\r\nRating Kontent: 15+\r\nGenre: Horor, Thriller, Supernatural, Mystery\r\n', 'exhuma.jpg'),
(2, 'Monster (2023)', 'Sebuah danau besar di kota pinggiran kota. Seorang ibu tunggal yang mencintai putranya, seorang guru yang peduli terhadap murid-muridnya, dan kepolosan di masa jayanya… Meskipun ini tampak seperti pertengkaran biasa di antara anak-anak, masyarakat kota dan media terseret ke dalam drama yang sedang berlangsung ketika pernyataan-pernyataan yang saling bertentangan dilontarkan.', 'Negara: Japan\r\nTanggal Rilis: May 17, 202\r\nDurasi: 2 jam 6 min.\r\nRating Kontent: Semua Umur\r\nGenre: Thriller, Drama, Family', 'monster.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
