-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 06:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `istoria_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `addons1` varchar(255) NOT NULL,
  `addons2` varchar(255) NOT NULL,
  `addons3` varchar(255) NOT NULL,
  `addons4` varchar(255) NOT NULL,
  `price1` int(255) NOT NULL,
  `price2` int(255) NOT NULL,
  `price3` int(255) NOT NULL,
  `price4` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `category`, `addons1`, `addons2`, `addons3`, `addons4`, `price1`, `price2`, `price3`, `price4`) VALUES
(1, 'coffee', 'ESPRESSO SHOT', 'SAUCE', 'SYRUP', 'DRIZZLE ', 10, 15, 15, 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `addons` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `total` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `transaction` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `product`, `size`, `type`, `addons`, `info`, `contact`, `note`, `payment`, `total`, `date`, `status`, `transaction`, `reference`) VALUES
(3, 2, 'De  Borja, abdul', '1 Java Chip ,2 Java Chip ', '16oz,16oz', 'hot,hot', '[],[\"DRIZZLE \"]', 'asdasd |asdasdasd', '123123', 'as', 'cash', 340, '09:47:38AM 02-21-24 ', 'completed', 'delivery', 'Istoria7773d4d5602d'),
(4, 2, 'asdasd, abdul', '1 Java Chip ,2 Java Chip ', '16oz,16oz', 'hot,hot', '[],[\"DRIZZLE \"]', '2024-02-23  | 21:10', '123123', 'asda', 'cash', 280, '21-Feb-2024', 'completed', 'pickup', 'Istoria7808d702b811'),
(5, 2, 'asdasd, abdul', '1 Java Chip ,2 Java Chip ', '16oz,16oz', 'hot,hot', '[],[\"DRIZZLE \"]', '2024-02-23 21:10', '123123', 'asda', 'cash', 280, '21-Feb-2024', 'pending', 'pickup', 'Istoria7902dcea86bc'),
(6, 2, 'De  Borja, abdul', '1 Java Chip ,1 Java Chip ', '16oz,22oz', 'hot,iced', '[\"ESPRESSO SHOT\",\"SAUCE\",\"SYRUP\",\"DRIZZLE \"],[\"SAUCE\",\"SYRUP\"]', '2024-02-22 09:19', '123123', '12312', 'cash', 250, '21-Feb-2024', 'pending', 'pickup', 'Istoria8326f76a99e6'),
(7, 2, 'De  Borja, abdul', '1 Java Chip ,1 Java Chip ', '16oz,16oz', 'hot,hot', '[\"SAUCE\"],[]', '2024-02-22 21:20', '123123', '', 'cash', 175, '21-Feb-2024', 'pending', 'pickup', 'Istoria8422fd685aab'),
(8, 2, 'De  Borja, abdul', '1 Java Chip ,1 Java Chip ', '16oz,16oz', 'hot,hot', '[] | ,[\"ESPRESSO SHOT\",\"SAUCE\",\"SYRUP\",\"DRIZZLE \"] | ', 'asdasda 1asdas', '123123', 'asdasd', 'cash', 280, '21-Feb-2024', 'pending', 'delivery', 'Istoria8457ff92f429'),
(9, 2, '123123, 3123', '3 Java Chip ,1 Java Chip ', '16oz,16oz', 'hot,hot', '[] | ,[] | ', '1231 | 3123', '12312', '123', 'cash', 380, '21-Feb-2024', 'pending', 'delivery', 'Istoria97995374d192'),
(10, 2, '2313, 1231', '1 Java Chip ', '16oz', 'hot', '[\"ESPRESSO SHOT\",\"SYRUP\"] | ', '123 | 3123', '231231', '2312', 'gcash', 165, '21-Feb-2024', 'pending', 'delivery', 'Istoria983255869f1d'),
(11, 2, '312312, 2312', '1 Java Chip ', '22oz', 'hot', '[\"ESPRESSO SHOT\",\"SAUCE\",\"DRIZZLE \"] | ', '1231 | 123', '213', 'asd123123', 'gcash', 185, '21-Feb-2024', 'pending', 'delivery', 'Istoria988458c380d3'),
(12, 2, '12312, 3123', '1 Java Chip ', '16oz', 'hot', '[] | ', '312 | 12312', '123', '1233123', 'gcash', 140, '09:47:38AM 02-21-24 ', 'pending', 'delivery', 'Istoria005863aea2e6'),
(13, 2, '23123, 31', '1 Java Chip ', '16oz', 'hot', '[] | ', '2312312 | 1231', '123', '123', 'gcash', 140, '09:48:49AM 02-21-24 ', 'pending', 'delivery', 'Istoria012968181666'),
(14, 2, '312312, 2312', '1 Java Chip ', '16oz', 'hot', '[] | ', '1231 | 123123', '12312312', '3123', 'gcash', 140, '09:51:34AM 02-21-24 ', 'pending', 'delivery', 'Istoria0294726057a4'),
(15, 2, '123123, 123', '1 Java Chip ,1 Java Chip ', '16oz,16oz', 'hot,hot', '[] | ,[] | ', '23123 | 1231', '3123', '12', 'gcash', 220, '09:52:58AM 02-21-24 ', 'pending', 'delivery', 'Istoria037877a1f0d4'),
(16, 2, '3123123, 2312', '1 Java Chip ,1 Java Chip ', '16oz,16oz', 'hot,hot', '[] | ,[] | ', '231 | 123', '3123', 'a12', 'gcash', 220, '09:54:13AM 02-21-24 ', 'pending', 'delivery', 'Istoria04537c52ba2c'),
(17, 2, '123123, 123', '1 Java Chip ', '16oz', 'hot', '[] | ', '123 | 1231', '1231', '23', 'gcash', 140, '09:56:11AM 02-21-24 ', 'pending', 'delivery', 'Istoria057183bce8fa'),
(18, 2, '123123, 123', '1 Java Chip ', '16oz', 'hot', '[] | ', '123 | 123', '123', '123', 'gcash', 140, '10:01AM 02-21-24 ', 'pending', 'delivery', 'Istoria090598923de7'),
(19, 2, 'Rausa zyrha', '1 Java Chip ,1 Java Chip ,5 Java Chip ', '16oz, 22oz, 22oz', 'hot,iced,iced', '[\"SAUCE\",\"SYRUP\"] | ,[\"ESPRESSO SHOT\",\"SAUCE\"] | ,[\"ESPRESSO SHOT\",\"SYRUP\",\"DRIZZLE \"] | ', 'Bay Laguna | Kamayan', '0912312312', 'none', 'cash', 900, '10:09AM 02-21-24 ', 'pending', 'delivery', 'Istoria1342b3e18e80'),
(20, 2, '1231, 123', '1 Java Chip | , 1 Java Chip | , 1 Java Chip | ', '16oz, 16oz, 16oz', 'hot, hot, hot', '[\"ESPRESSO SHOT\"] | , [] | , [\"SAUCE\"] | ', '231231231 | 2312', '3123', '123123', 'gcash', 325, '10:58AM 02-21-24 ', 'pending', 'delivery', 'Istoria43126d8ebc87'),
(21, 2, 'dasda, asdas', '5 Java Chip  ', '16oz', 'hot', '[]', '2024-02-22 | 11:29', '1231', 'asdasd', 'cash', 400, '11:33AM 02-21-24 ', 'pending', 'pickup', 'Istoria6389ef55c2b9'),
(22, 2, 'adasd, 12313', '1 Java Chip  , 1 Java Chip  , 2 Java Chip  ', '16oz, 22oz, 16oz', 'hot, iced, hot', '[], [\"ESPRESSO SHOT\",\"SAUCE\"], [\"SYRUP\",\"DRIZZLE \"]', '2024-02-13 | 23:43', '123123123', 'asda', 'gcash', 415, '11:42AM 02-21-24 ', 'completed', 'pickup', 'Istoria694412077491'),
(23, 2, 'asdasd, asd', '1 Java Chip  , 1 Java Chip  , 1 Java Chip  ', '16oz, 16oz, 22oz', 'hot, hot, iced', '[] | , [\"ESPRESSO SHOT\",\"SAUCE\"] | , [\"ESPRESSO SHOT\",\"SAUCE\",\"SYRUP\",\"DRIZZLE \"] | ', '2024-02-23 | 23:43', '123123', 'qdasdasd', 'gcash', 325, '11:43AM 02-21-24 ', 'pending', 'pickup', 'Istoria700715fe5896');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(255) NOT NULL,
  `price_range` varchar(255) NOT NULL,
  `image` mediumtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `price_range`, `image`, `category`, `status`) VALUES
(1, 'matcha', 300, '150-223', '5.png', 'latte', 'unavailable'),
(4, 'Java Chip', 80, '80-90', '5.png', 'coffee', 'unavailable'),
(5, 'Mocha', 80, '80-90', '5.png', 'latte', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tray`
--

CREATE TABLE `tray` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `addons` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL DEFAULT 'No Contact'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `name`, `username`, `email`, `password`, `address`, `contact`) VALUES
(1, 'admin', 'istoria admin', 'adminacc', '1', '123', 'bay laguna', 'No contact'),
(2, 'user', 'Abdul De borja', 'adminacc', '2', '123', 'bay laguna', 'No contact'),
(3, 'employee', 'istoria admin', 'adminacc', '3', '123', 'bay laguna', ''),
(4, 'user', 'kezuke, jose', 'josekzk', 'user', '123', 'asdasd', ''),
(8, 'user', 'ongchad, mj', 'mjongchad', 'mj@s', '123', 'asdasdasd', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tray`
--
ALTER TABLE `tray`
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
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tray`
--
ALTER TABLE `tray`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
