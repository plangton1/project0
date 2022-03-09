-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 04:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_type` int(50) NOT NULL,
  `product_unit` varchar(300) NOT NULL,
  `product_img` varchar(300) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_sale` int(50) NOT NULL,
  `product_net` int(50) NOT NULL,
  `product_detail` varchar(300) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_unit`, `product_img`, `product_price`, `product_sale`, `product_net`, `product_detail`, `created_at`) VALUES
('0zkaTTLSqd', 'อุกกาบาต', 1, 'ขวด', 'f.jpg', 30, 20, 24, '', '0000-00-00'),
('at5MgKk66T', 'กระท่อม', 2, 'แผง', '', 10, 50, 30, '', '0000-00-00'),
('MvWmKiZ3SX', 'ยาาาา', 2, 'เม็ด', 'da639fa056afa600fe33a1e4622c1f21.jpg', 30, 60, 60, '', '0000-00-00'),
('R87B6tBqaM', 'เฮโรอีน', 2, 'ชิ้น', '121196005.jpg', 20, 10, 30, '', '0000-00-00'),
('rQqSBfGNWl', 'ดอก', 2, 'ดอก', '4129แก้วชมพูภาพ2.jpg', 50, 100, 50, 'ดอก', '0000-00-00'),
('WPItORGIML', 'ฝิ่น', 1, 'เส้น', '1645427108767d5224a6073bb1cd8e2df609b437ac.jpg', 30, 40, 20, 'ไม่มี', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `stock_1`
--

CREATE TABLE `stock_1` (
  `stock_id` int(10) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `product_id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_1`
--

INSERT INTO `stock_1` (`stock_id`, `sup_id`, `product_id`, `stock_qty`, `stock_total`) VALUES
(71, 20, '0zkaTTLSqd', 1, 30),
(70, 19, '0zkaTTLSqd', 1, 30),
(69, 18, '0zkaTTLSqd', 50, 1500),
(72, 0, '0zkaTTLSqd', 3, 90),
(73, 0, '0zkaTTLSqd', 3, 90),
(74, 0, '0zkaTTLSqd', 3, 90),
(75, 0, '0zkaTTLSqd', 5, 150),
(76, 0, '0zkaTTLSqd', 5, 150),
(77, 0, '0zkaTTLSqd', 5, 150),
(78, 0, '0zkaTTLSqd', 5, 150),
(79, 0, '0zkaTTLSqd', 5, 150),
(80, 0, '0zkaTTLSqd', 5, 150),
(81, 0, '0zkaTTLSqd', 5, 150),
(82, 0, '0zkaTTLSqd', 5, 150),
(83, 0, '0zkaTTLSqd', 5, 150),
(84, 0, '0zkaTTLSqd', 5, 150),
(85, 0, '0zkaTTLSqd', 1, 30),
(86, 0, '0zkaTTLSqd', 1, 30),
(87, 0, '0zkaTTLSqd', 1, 30),
(88, 0, '0zkaTTLSqd', 1, 30),
(89, 0, '0zkaTTLSqd', 1, 30),
(90, 0, '0zkaTTLSqd', 1, 30),
(91, 0, '0zkaTTLSqd', 1, 30),
(92, 0, '0zkaTTLSqd', 2, 60),
(93, 0, '0zkaTTLSqd', 5, 150),
(94, 0, '0zkaTTLSqd', 5, 150),
(95, 0, '0zkaTTLSqd', 1, 30),
(96, 0, '0zkaTTLSqd', 1, 30),
(97, 0, '0zkaTTLSqd', 1, 30),
(98, 0, '0zkaTTLSqd', 1, 30),
(99, 39, '0zkaTTLSqd', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `supplies_1`
--

CREATE TABLE `supplies_1` (
  `sup_id` int(10) NOT NULL,
  `sup_img` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sup_dttm` datetime NOT NULL,
  `sup_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sup_last` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sup_add` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sup_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sup_date` date NOT NULL,
  `sup_qty` int(11) NOT NULL,
  `sup_total` float NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplies_1`
--

INSERT INTO `supplies_1` (`sup_id`, `sup_img`, `sup_dttm`, `sup_name`, `sup_last`, `sup_add`, `sup_phone`, `sup_date`, `sup_qty`, `sup_total`, `created_at`) VALUES
(38, '2022-03-07 13:54:00', '0000-00-00 00:00:00', '12321', '213213', '312131', '2022-03-03', '0000-00-00', 0, 0, NULL),
(39, 'European Pattern Wedding Invitation Poster Background Material.jpg', '2022-03-07 13:57:50', '3', '3', '3', '3', '2022-03-03', 0, 0, NULL),
(40, '1646636882Simple Floral Pink Background Psd Layered Advertising Background.jpg', '0000-00-00 00:00:00', '1231', '1321', '321', '31', '2022-03-01', 0, 0, '2022-03-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'ยาแพ้\r\n'),
(2, 'ยาธาตุน้ำดำ'),
(3, 'ยาอันตราย'),
(4, 'ยาถ่าย');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `user_last` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_phone` varchar(300) NOT NULL,
  `user_add` varchar(300) NOT NULL,
  `user_date` date NOT NULL,
  `created_at` varchar(300) NOT NULL,
  `role` varchar(300) NOT NULL,
  `user_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_last`, `username`, `password`, `user_phone`, `user_add`, `user_date`, `created_at`, `role`, `user_img`) VALUES
(38, 'mos', 'mos', 'user', '1234', 'mos', 'mos', '2022-02-23', '', 'เภสัชกร', 'yak.jpg'),
(53, 'anuwat', '233121', 'aaa', '776645', 'sadsd', 'dsadassdsa', '2022-02-28', '', 'owner', 'yak.jpg'),
(54, '3', '3', '', '330471', '3', '3', '2022-02-21', '', 'เจ้าของกิจการ', '44b549ad87b31b6fa414fd3047dbde1d.jpg'),
(55, '231232', '23213', '11111', '119851', '2131312', '213121', '2022-03-02', '', 'เจ้าของกิจการ', 'b3af50a7dd397e9b7958af2264a23d4d-removebg-preview.png'),
(56, '33333', '123123321321321', '3212321313', '992501', '3213213133', '2132112321', '2022-02-15', '', 'เจ้่าของกิจการ', '188420.jpg'),
(57, '5555', '5555', '5555', '5555', '5555', '5555', '2022-03-02', '', 'เภสัชกร', 'c42a98a8a6e3655f693111cef1d22f40.jpg'),
(58, '3123123', '', '', '170639', '', '', '0000-00-00', '', 'เจ้าของกิจการ', 'S__258547714-removebg-preview.png'),
(59, '3123232131233', '123123123123123', '12312323213', '479389', '3123123123123123', '1231231221312312', '2022-03-01', '', 'เจ้่าของกิจการ', '767d5224a6073bb1cd8e2df609b437ac.jpg'),
(60, '322', '322', '1111111', '233636', '333', '334', '2022-02-02', '', 'เจ้าของกิจการ', 'pixlr-bg-result (1).png'),
(61, 'dasadasdasds', 'ddsadsadasd', 'adasdsadsdadasdas', '270476', 'asdadas', 'asdasdasdasd', '2022-03-04', '', 'เจ้่าของกิจการ', 'pixlr-bg-result (1).png'),
(62, 'asdsadasdas', 'dasdasdasdas', 'sdaasdadadasd', '881263', 'asdadasdsa', 'sdasdas', '2022-02-23', '', 'เจ้าของกิจการ', 'download (14).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stock_1`
--
ALTER TABLE `stock_1`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `supplies_1`
--
ALTER TABLE `supplies_1`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock_1`
--
ALTER TABLE `stock_1`
  MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `supplies_1`
--
ALTER TABLE `supplies_1`
  MODIFY `sup_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
