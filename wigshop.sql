-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 04:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wigshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `cover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `cover`) VALUES
(1, 'Bangs wig', '20241005183510-Bangs wig.jpg'),
(2, 'Bob wig', '20241005183518-Bob wig.jpg'),
(3, 'Cosplay wig', '20241005183526-Cosplay wig.jpg'),
(4, 'Long wig', '20241005183532-Long wig.jpg'),
(5, 'Ponytail Wig', '20241005183538-Ponytail Wig.jpg'),
(6, 'Short wig', '20241005183546-Short wig.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `value` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `total_money` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `coupon` varchar(30) NOT NULL,
  `total_money` double NOT NULL,
  `time` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `idUser`, `name`, `email`, `phone`, `address`, `country`, `state`, `city`, `coupon`, `total_money`, `time`, `status`) VALUES
(15, 4, 'Raiden Ei', 'raiden@gmail.com', '0123456789', 'Inazuma', 'United States', 'Inazuma', 'Inazuma', '0', 7737, '2023-05-29 00:00:00', 'paid'),
(16, 4, 'Raiden Ei', 'raiden@gmail.com', '0123456789', 'Inazuma', 'United States', 'afa', 'asd', '0', 1971, '2023-05-29 00:00:00', 'wait'),
(18, 0, 'Chi', 'chivip16@gmail.com', '0123456789', 'Kinh Bac - Bac Ninh - Viet Nam', 'United States', 'Not Applicable', 'Bac Ninh', '0', 12423, '2023-05-29 00:00:00', 'wait'),
(19, 0, 'Chi', 'chivip16@gmail.com', '55555', 'Kinh Bac - Bac Ninh - Viet Nam', 'United States', 'Not Applicable', 'Bac Ninh', '0', 17835, '2023-05-29 00:00:00', 'wait'),
(20, 4, 'Chi', 'chivip16@gmail.com', '0123456789', 'Kinh Bac - Bac Ninh - Viet Nam', 'Albania', 'Not Applicable', 'Bac Ninh', '0', 246, '2023-05-29 00:00:00', 'wait'),
(21, 0, 'Chi', 'chivip16@gmail.com', '0123456789', 'Kinh Bac - Bac Ninh - Viet Nam', 'United States', 'Not Applicable', 'Bac Ninh', '0', 678, '2023-05-30 00:00:00', 'wait'),
(22, 0, '', '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', ''),
(23, 0, 'chi', '', '1234556789', 'Kinh Bac - Bac Ninh - Viet NamKTX', '', '', '', '', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `color` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `category` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `infomation` text NOT NULL,
  `star` float NOT NULL,
  `number_sell` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `color`, `price`, `category`, `date`, `infomation`, `star`, `number_sell`) VALUES
(1, 'Bang wig 1', '20241007034826-Bangs wig.jpg', 'Black', 100000, 'Bangs wig', '2024-10-07 03:48:26', 'no', 0, 0),
(2, 'Bang wig 2', '20241007035024-Bangs wig 1.jpg', 'Black', 200000, 'Bangs wig', '2024-10-07 03:50:24', 'no', 0, 0),
(3, 'Bob wig 1', '20241007035118-Bob wig.jpg', 'Black', 100000, 'Bob wig', '2024-10-07 03:51:18', 'no', 0, 0),
(4, 'Bob wig 2', '20241007035142-Bob wig 1.jpg', 'Purpose ', 200000, 'Bob wig', '2024-10-07 03:51:42', 'no', 0, 0),
(5, 'Bob wig 3', '20241007035200-Bob wig 2.jpg', 'Yellow ', 300000, 'Bob wig', '2024-10-07 03:52:00', 'no', 0, 0),
(6, 'Bob wig 4', '20241007035216-Bob wig 3.jpg', 'Yellow ', 400000, 'Bob wig', '2024-10-07 03:52:16', 'no', 0, 0),
(7, 'Cosplay wig 1', '20241007035320-Cosplay wig.jpg', 'Blue', 100000, 'Cosplay wig', '2024-10-07 03:53:20', 'no', 0, 0),
(8, 'Cosplay wig 2', '20241007035334-Cosplay wig 1.jpg', 'Ash, Pink', 200000, 'Cosplay wig', '2024-10-07 03:53:34', 'no', 0, 0),
(9, 'Cosplay wig 3', '20241007035353-Cosplay wig 2.jpg', 'White, Blu', 300000, 'Cosplay wig', '2024-10-07 03:53:53', 'no', 0, 0),
(10, 'Cosplay wig 4', '20241007035405-Cosplay wig 3.jpg', 'Purpose ', 400000, 'Cosplay wig', '2024-10-07 03:54:05', 'no', 0, 0),
(11, 'Long wig 1', '20241007035502-Long wig 1.jpg', 'Black', 100000, 'Long wig', '2024-10-07 03:55:02', 'no', 0, 0),
(12, 'Long wig 2', '20241007035517-Long wig 2.jpg', 'Black', 200000, 'Long wig', '2024-10-07 03:55:17', 'no', 0, 0),
(13, 'Long wig 3', '20241007035533-Long wig 3.jpg', 'Blue', 300000, 'Long wig', '2024-10-07 03:55:33', 'no', 0, 0),
(14, 'Long wig 4', '20241007035547-Long wig 4.jpg', 'Black', 400000, 'Long wig', '2024-10-07 03:55:47', 'no', 0, 0),
(15, 'Long wig 5', '20241007035559-Long wig.jpg', 'Black', 500000, 'Long wig', '2024-10-07 03:55:59', 'no', 0, 0),
(16, 'Ponytail Wig 1', '20241007035639-Ponytail Wig 1.jpg', 'Black', 100000, 'Ponytail Wig', '2024-10-07 03:56:39', 'no', 0, 0),
(17, 'Ponytail Wig 2', '20241007035653-Ponytail Wig 2.jpg', 'Black', 200000, 'Ponytail Wig', '2024-10-07 03:56:53', 'no', 0, 0),
(18, 'Ponytail Wig 3', '20241007035708-Ponytail Wig 3.jpg', 'Black', 300000, 'Ponytail Wig', '2024-10-07 03:57:08', 'no', 0, 0),
(19, 'Ponytail Wig 4', '20241007035720-Ponytail Wig 4.jpg', 'Black', 400000, 'Ponytail Wig', '2024-10-07 03:57:20', 'no', 0, 0),
(20, 'Ponytail Wig 5', '20241007035734-Ponytail Wig.jpg', 'Black', 500000, 'Ponytail Wig', '2024-10-07 03:57:34', 'no', 0, 0),
(21, 'Short wig 1', '20241007035822-Short wig 1.jpg', 'Brown', 100000, 'Short wig', '2024-10-07 03:58:22', 'no', 0, 0),
(22, 'Short wig 2', '20241007035833-Short wig 2.jpg', 'Black', 200000, 'Short wig', '2024-10-07 03:58:33', 'no', 0, 0),
(23, 'Short wig 3', '20241007035846-Short wig 3.jpg', 'Black', 300000, 'Short wig', '2024-10-07 03:58:46', 'no', 0, 0),
(24, 'Short wig 4', '20241007035912-Short wig 4.jpg', 'Ash', 400000, 'Short wig', '2024-10-07 03:59:12', 'no', 0, 0),
(25, 'Short wig 5', '20241007035946-Short wig 5.jpg', 'Pink', 500000, 'Short wig', '2024-10-07 03:59:46', 'no', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(10) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `content` text NOT NULL,
  `evaluate` float NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `idUser`, `idProduct`, `content`, `evaluate`, `date`) VALUES
(1, 4, 1, 'good', 5, '2024-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `lession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `permission` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `avatar`, `first_name`, `last_name`, `email`, `password`, `address`, `country`, `state`, `city`, `phone`, `permission`) VALUES
(3, '', '', 'Ganyu', 'ganyu@gmail.com', 'ganyu123', 'Liyue', '', '', '', '0123456789', 'Admin'),
(4, '', '', 'Raiden Ei', 'raiden@gmail.com', 'raidenei', 'Inazuma', '', '', '', '0123456789', 'user'),
(5, '2023-05-19 23-27-38 - eula.jpg', '', 'Eula Lawrency', 'eula@gmail.com', 'eulalawrency', 'Mondstart', '', '', '', '0123456789', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idorder` (`idorder`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`idorder`) REFERENCES `order_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
