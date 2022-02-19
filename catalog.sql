-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 05:38 PM
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
  `product_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_type` int(50) NOT NULL,
  `product_unit` int(11) NOT NULL,
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
(28, '3', 2, 0, '', 33, 0, 3, '3', '0000-00-00'),
(29, '333', 1, 0, '', 333, 0, 333, '33', '0000-00-00'),
(30, '1', 2, 0, '', 1, 0, 1, '1', '0000-00-00'),
(31, 'sas', 1, 0, '', 0, 0, 0, 'sadas', '0000-00-00'),
(32, '3', 1, 0, '', 3, 0, 3, '3', '0000-00-00'),
(33, 'กหฟฟกห', 1, 0, '1645278080png-clipart-black-and-white-s-white-and-black-frame-art-illustration-removebg-preview.png', 0, 0, 0, 'กหฟฟหก', '0000-00-00'),
(34, 'ฟฟฟฟ', 1, 0, '1645280351png-clipart-black-and-white-s-white-and-black-frame-art-illustration-removebg-preview.png', 0, 0, 0, 'ฟฟฟฟ', '0000-00-00'),
(35, '12321', 0, 0, '1645280365png-clipart-black-and-white-s-white-and-black-frame-art-illustration-removebg-preview.png', 213213, 0, 312321, '32131', '0000-00-00'),
(36, '12321312', 1, 0, '1645280377png-clipart-black-and-white-s-white-and-black-frame-art-illustration-removebg-preview.png', 2131232, 0, 3121312, '312312', '0000-00-00'),
(37, 'กหฟฟหกฟ', 1, 0, '1645285383png-clipart-black-and-white-s-white-and-black-frame-art-illustration-removebg-preview.png', 12312, 0, 312213, 'ฟหกฟ', '0000-00-00'),
(38, '1', 0, 0, '1645285530png-clipart-black-and-white-s-white-and-black-frame-art-illustration-removebg-preview.png', 1, 0, 1, '1', '0000-00-00'),
(39, '333', 1, 0, '1645285940png-clipart-black-and-white-s-white-and-black-frame-art-illustration-removebg-preview.png', 333, 0, 333, '333', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(300) NOT NULL,
  `sup_last` varchar(300) NOT NULL,
  `sup_add` varchar(300) NOT NULL,
  `sup_phone` varchar(300) NOT NULL,
  `sup_date` date NOT NULL,
  `sup_img` varchar(300) NOT NULL,
  `created_at` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`sup_id`, `sup_name`, `sup_last`, `sup_add`, `sup_phone`, `sup_date`, `sup_img`, `created_at`) VALUES
(70, 'กหฟกฟหก', 'หกฟหก', 'หฟกฟกห', 'ฟกหฟหก', '2022-02-02', '', '2022-02-19');

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
(2, 'ยาธาตุน้ำดำ');

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
(36, 'atapol', 'jitrakmun', 'admin', '1234', '064111111', 'bangkok', '2022-02-27', '', 'ผู้ดูแลระบบ', ''),
(37, 'beww', 'dangwan', 'owner', '1234', '0641111123', 'nakornnayok', '2022-02-04', '', 'เจ้าของกิจการ', ''),
(38, 'mos', 'mos', 'user', '1234', 'mos', 'mos', '2022-02-23', '', 'เภสัชกร', ''),
(53, 'anuwat', '233121', 'aaa', '776645', 'sadsd', 'dsadassdsa', '2022-02-28', '', 'owner', 'yak.jpg'),
(54, '3', '3', '', '330471', '3', '3', '2022-02-21', '', 'เจ้าของกิจการ', 'png-clipart-black-and-white-s-white-and-black-frame-art-illustration-removebg-preview.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
