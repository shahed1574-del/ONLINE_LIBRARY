-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 ديسمبر 2025 الساعة 14:47
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_library1`
--

-- --------------------------------------------------------

--
-- بنية الجدول `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `publishing_house_name` varchar(100) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `cover_photo` varchar(100) NOT NULL,
  `count_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `books`
--

INSERT INTO `books` (`id`, `book_name`, `author_name`, `publishing_house_name`, `reference_number`, `cover_photo`, `count_book`) VALUES
(4, 'قواعد العشق الأربعون', 'ألف شفق', 'دار كلمات', '1002001', '12132025020807.jpeg', 20),
(5, 'ديوان المتنبي', 'أبي الطيب المتنبي', 'دار كلمات', '1002002', '12132025020956.jpeg', 20),
(6, 'ديوان الجواهري', 'محمد مهدي الجواهري', 'دار كلمات', '1002003', '12132025021050.jpeg', 20),
(7, 'العادات الذرية', 'جيمس كلير', 'دار كلمات', '1002004', '12132025021152.jpeg', 20),
(8, 'للرجال فقط', 'أدهم الشرقاوي', 'دار كلمات', '1002005', '12132025021308.jpeg', 20),
(9, 'حالات حرجة', 'هادي العبدالله', 'دار كلمات', '1002006', '12132025021357.jpeg', 20),
(10, 'مسلكيات', 'ابراهيم السكران', 'دار كلمات', '1002007', '12132025021457.jpeg', 20);

-- --------------------------------------------------------

--
-- بنية الجدول `borrow_a_book`
--

CREATE TABLE `borrow_a_book` (
  `id` int(11) NOT NULL,
  `the_user` varchar(100) NOT NULL,
  `the_book` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `nots` varchar(100) NOT NULL,
  `borrowing_date` date NOT NULL,
  `replay_date` date NOT NULL,
  `security` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `borrow_a_book`
--

INSERT INTO `borrow_a_book` (`id`, `the_user`, `the_book`, `order_time`, `order_status`, `nots`, `borrowing_date`, `replay_date`, `security`) VALUES
(1, '', 5, '2025-12-13 13:29:14', 'طلب', '', '0000-00-00', '0000-00-00', ''),
(2, '', 5, '2025-12-13 13:29:17', 'طلب', '', '0000-00-00', '0000-00-00', ''),
(3, '', 6, '2025-12-13 13:31:02', 'طلب', '', '0000-00-00', '0000-00-00', ''),
(4, 'حسن', 7, '2025-12-13 13:31:57', 'طلب', '', '0000-00-00', '0000-00-00', ''),
(5, 'حسن', 6, '2025-12-13 13:51:05', 'طلب', '', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- بنية الجدول `us`
--

CREATE TABLE `us` (
  `id` int(11) NOT NULL,
  `the_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `e_mail` varchar(100) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `us`
--

INSERT INTO `us` (`id`, `the_name`, `phone`, `e_mail`, `msg`) VALUES
(1, 'سمير', '+19302362376', 'تااتبلايبيسبلس', 'اترلتايبفسيفغقسغق');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `The_user` varchar(100) NOT NULL,
  `Full_name` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `The_Password` varchar(255) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `The_user`, `Full_name`, `job`, `The_Password`, `Address`) VALUES
(1, 'شهد', 'شهد', '', '$2y$10$CpHGlwXxbfCsNygBaNItsOqXFfZf9mLcBGgg70kJhgJ', 'ادلب'),
(2, 'شهد', 'شهد', '', '$2y$10$WsMX33MG24SLs2iirf3AZOhi6xqulD57aNYFnx/9EJX', 'ادلب'),
(3, 'سلاف', 'سلاف البو', '', '$2y$10$8.4tafkJadF.thx8Fp05Wu0/0GJ/dwUMs.qX0eeJNDT', 'ادلب'),
(4, 'صادق', 'شعبان', '', '$2y$10$z6ddnv0e9357MrpFsDwKFOlV6.SZ2yLja3YoUy0PaRk', 'حلب'),
(5, 'سليم', 'سليم شعبان', '', '$2y$10$J1rMjgS3WqTr89TEENkn.uY281PB/klW71e0bw.3EeD', 'حلب'),
(6, 'مهند', 'مهند سمير', '', '$2y$10$J.F4jjcOQzjA8Di2h1ThCOgEAR86Dt4h5kyvo1d7296', 'ادلب'),
(7, 'محمد', 'محمد المحمد', '', '$2y$10$Xi3kfgOEmIPJ36qRhZ5vuuJIxz/HLIJP47BHHLRGaiv', 'ادلب'),
(8, 'صالح', 'صالح الصالح', '', '$2y$10$HMSFIMpuD0gmwAxI7yKP8OvmMsLdBhxLyWLE156xzZM', 'ادلب'),
(9, 'شهد', 'شهد البو', '', '$2y$10$7sbNWFzZ.kjHmhRBWVGZxuEzsVYCoppgvmiY.aW/kqv', 'ادلب'),
(10, 'شهد', 'شهد البو', '', '$2y$10$YwsmVnnFk.UyTK.oEgRDEOsqV3wyuJus0fT7ItTTG6J', 'ادلب'),
(11, 'شهد', 'شهد البو', '', '$2y$10$jBfZG1Mjh7PkhvfFacMZIutJ5R0UozUdyrrw5Py56.w', 'ادلب'),
(12, 'شادن', 'شادن البو', '', '$2y$10$/iGrfnzzw9r6mc0GpUeCbOvJ4g9vqYx3F3Cqp2MR7Lp95SdWocaZS', 'ادلب'),
(13, 'احمد', 'احمد محمد', 'مدير', '$2y$10$nQ52j8F188IVWqtT9pvosuAzgJcS4Dze7D5QxUmpJKsHDCqGZE2NW', 'ادلب'),
(14, 'شادن', 'شادن الاغا', 'مدير', '$2y$10$YOCjfM39OElP23tYWWEgJ.xZPPENbrCDdz2VFjg/ZDrWuSabHMNya', 'حلب'),
(15, 'شادن', 'شادن الاغا', 'مدير', '$2y$10$yk/9EsJ2/xrGU9z6NrUF3eW5zkpp.SafTk2ZfRod3fSs0cnTtKenK', 'حلب'),
(16, 'احمد', 'احمد جلال', 'مدير', '$2y$10$qJl81lYTzBeYQddGmelmIOAsJJyROJD/xjiPu/Vl99uHzyh51xRIS', 'حلب'),
(17, 'شهد', 'شهد البو', 'مدير', '$2y$10$2yFBWX4fNxIog8ldLPehXOX.Kmu6I.q.zijnSnIJb7H75O9yMETqq', 'ادلب'),
(18, 'ماجدة', 'ماجدة الرومي', 'مدير', '$2y$10$87bCPe/DnnfDm3gYDFqjX.NZpskjUcA.guwJtRxPJ.2crzYI4p4pm', 'حلب'),
(19, 'ماجد', 'ماجد المهندس', 'مدير', '$2y$10$qj9woT7A3x1lsVzcuHjBN.7xK4/87lhzuxhd46.b.BJs2k9qxBps.', 'ادلب'),
(20, 'حسن', 'حسن محمد', 'مدير', '$2y$10$08smAva1ivGV0KGqxVPLCOD1Cy4TBrQYrIbZc/5BDZrESPBlRKKJ.', 'ادلب');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_a_book`
--
ALTER TABLE `borrow_a_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `us`
--
ALTER TABLE `us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `borrow_a_book`
--
ALTER TABLE `borrow_a_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `us`
--
ALTER TABLE `us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
