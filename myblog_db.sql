-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 11:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `disabled` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `disabled`) VALUES
(10, 'Politics', 'politics', 0),
(11, 'Sports & Entertainment', 'sports-entertainment', 0),
(12, 'Lifestyle & Fashion', 'lifestyle-fashion', 0),
(13, 'Sex & Society', 'sex-society', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `content`, `image`, `date`, `slug`) VALUES
(3, 4, 11, 'My love story', '<p>gaofjkvbei9djky7rdfh nweuj enehikdjcbww jie dnjk  wwd d dhiw   suc  grg  glkmxz f f mo mjmzeorituthvxzcmfjrj Albanus Munage Albanus Muange Mutunga Elperzideute Missie Joan Jimmy Musyoka Samuel Ngut Mwendwa Jose Kion<img src=\"uploads/IMG-20211212-WA0005.jpg\" data-filename=\"IMG-20211212-WA0005.jpg\" style=\"width: 480px;\"></p>', 'uploads/1688913645city-690332_1280.jpg', '2023-07-09 13:54:32', 'my-love-story5068'),
(4, 4, 10, 'Beautiful', 'Missie ', 'uploads/1688903255profile-6.jpg', '2023-07-09 14:34:39', 'beautiful-gilrs2868'),
(6, 4, 12, 'Blog post ', 'Salimia watu pesa huisha kaka. Please keep working hard fuck all of ypu guys just making progress here and there. We don\'t give a fuck about anything in this world just do you bit and leave.', NULL, '2023-07-09 15:46:56', 'blog-post3088'),
(7, 4, 10, 'Raila ', 'Matatu', 'uploads/1689089379IMG-20211212-WA0005.jpg', '2023-07-11 18:28:23', 'raila3229'),
(8, 4, 13, 'Family', 'Joan and Amani', 'uploads/1689089893IMG-20211212-WA0010.jpg', '2023-07-11 18:38:14', 'family6033'),
(9, 4, 12, 'My Girl friend', '<p><img src=\"/uploads/IMG-20211212-WA0007.jpg\" data-filename=\"IMG-20211212-WA0007.jpg\" style=\"width: 480px;\"></p><p>She is my best friend</p>', 'uploads/1689151569IMG-20211212-WA0005.jpg', '2023-07-12 11:46:09', 'my-girl-friend8800');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `date`, `role`) VALUES
(4, 'AlbanusMuange', 'albanusmuangemutunga@gmail.com', '$2y$10$wdjcFWU7bZNTWGzpKEy1POLkJeSVIZpOS3/Hu7dSKvhw7W23iD.om', 'uploads/1688487018DSC_0606.JPG', '2023-06-30 11:01:31', 'admin'),
(8, 'MutungaAlbanus', 'albanusmuange@gmail.com', '$2y$10$TanVogWNpVIXx0m/4k.0m.lk4Dmk5.s8WmKB2KTseCpHrcaVK2AxW', 'uploads/1688487108IMG-20211212-WA0011.jpg', '2023-07-02 12:24:17', 'user'),
(9, 'JoanMissie', 'joanmissie@gmail.com', '$2y$10$q.zS8YjGVWIqr2.eCSy3RuvqwAMan5KK5olw.VJOyeaDLT/bSfJWK', 'uploads/1688486989IMG-20211212-WA0005.jpg', '2023-07-02 12:25:26', 'user'),
(11, 'AlaryJ', 'alaryj@gmail.com', '$2y$10$z4qrX3o7K75daOCwVI3wwulJ5C9dPVj8e1SrKrQ4EXJaGm78eMFsW', 'uploads/1688486920profile-16.jpg', '2023-07-02 16:34:42', 'user'),
(12, 'Simon', 'simon@gmail.com', '$2y$10$Rey6DHegrfJQPCUwms08/uTBQVfy7yhLulFdJ7hfD3bCVDD1bgfPy', 'uploads/1688487385profile-11.jpg', '2023-07-04 13:06:21', 'user'),
(13, 'Faith', 'faith@gmail.com', '$2y$10$AuHZQP8.40gNsUpWFULozOHYTwhoKioqq/LdBYubq.MifESKwLzlu', NULL, '2023-07-04 19:19:13', 'user'),
(14, 'Mirriam', 'mirriam@gmail.com', '$2y$10$FMCZ2TZL.kYgmHbo4nkI8OPIP8zvdnCf978E36lzjuks1.osdeEz.', 'uploads/1688488248feed-7.jpg', '2023-07-04 19:24:35', 'user'),
(15, 'Jane', 'jane@gmail.com', '$2y$10$ry8EZfIAJKLyHMDVYt2m4.0E.nSLnfsE2yLj5dG7qmI8Ccc1OSanK', NULL, '2023-07-04 19:31:42', 'user'),
(16, 'Ann', 'ann@gmail.com', '$2y$10$mUYKONuRa4B1vkZ/gdQ9S.47u1zhv0UJpiYLSdlA3ciG2D/lUoYB6', NULL, '2023-07-04 19:35:58', 'user'),
(17, 'Tomcat', 'tomcat@gmail.com', '$2y$10$jaXuTLE3rmvCG9f479J9QO/Trw2b.DRe0FBka0it9j67UAwDkjKvq', 'uploads/1689154252IMG-20211212-WA0010.jpg', '2023-07-06 00:17:04', 'admin'),
(18, 'Doe', 'doe@gmail.com', '$2y$10$uAbOcDIaMl5aJOQi6bACM.PQ/ha9lK.ZTi.cLWoHRvme6EpJq3mEi', 'uploads/1689053472profile-12.jpg', '2023-07-06 00:25:35', 'user'),
(19, 'DeDe', 'de@gmail.com', '$2y$10$Dc5dJfFCf6HOeNk3lP2vjOCJ4zcxhPR/7q2DZ3q808chf2YGGIbeW', NULL, '2023-07-06 00:36:19', 'user'),
(20, 'Willy', 'willy@gmail.com', '$2y$10$V3T86XHAHqvPAkynnjzrG.LPFzAlOiGR3Jm8pMJx3jKZ0alShiCK6', 'uploads/1689053436profile-8.jpg', '2023-07-06 16:26:55', 'user'),
(22, 'David', 'david@gmail.com', '$2y$10$EPXetMkFxago5PTgPKTwTO6eFLXcOIpcDZBQjfUhN.lQctTHEHpEC', 'uploads/1689053378dirt-bike-690770_1280.jpg', '2023-07-09 14:57:19', 'user'),
(23, 'Eliza', 'eliza@gmail.com', '$2y$10$DItrqL0xdB.iKROfKdAKtOxyU2IqeQreZelDn5LwVCB0jY/TQ9tXy', 'uploads/1689053361feed-7.jpg', '2023-07-11 08:28:58', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `title` (`title`),
  ADD KEY `slug` (`slug`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
