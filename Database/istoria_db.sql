-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 11:13 AM
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
  `price4` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `category`, `addons1`, `addons2`, `addons3`, `addons4`, `price1`, `price2`, `price3`, `price4`, `status`) VALUES
(1, 'coffee', 'espresso shot', 'sauce', 'drizzle', 'syrup', 10, 15, 15, 20, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(255) NOT NULL,
  `eid` int(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'on',
  `name` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `time_in` varchar(255) NOT NULL,
  `time_out` varchar(255) NOT NULL DEFAULT '0',
  `duty` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `eid`, `employee_id`, `status`, `name`, `rank`, `time_in`, `time_out`, `duty`, `day`, `month`, `year`) VALUES
(14, 10, 'EID2024-5314343', 'off', 'Young,Ethan', 'Bartender', '11:00:09', '19:20:48', 'late', '02', '03', '24'),
(18, 10, 'EID2024-5314343', 'off', 'Young,Ethan', 'Bartender', '00:34:14', '04:30:36', 'Early Out', '04', '03', '24'),
(19, 10, 'EID2024-5314343', 'on', 'Young,Ethan', 'Bartender', '04:03:25', '0', 'On Time', '05', '03', '24'),
(24, 13, 'EID2024-1231232', 'off', 'Ongchad, Mae Joy', 'Cashier', '11:58:35', '12:58:58', 'Early Out', '04', '03', '24'),
(26, 13, 'EID2024-1231232', 'on', 'Ongchad, Mae Joy', 'Cashier', '17:24:00', '0', 'On Time', '05', '03', '24');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL DEFAULT 'No Contact',
  `created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `uid`, `name`, `username`, `email`, `address`, `contact`, `created`) VALUES
(1, 1, 'De Borja, abdulsss', 'AbdulDb09', '2', 'Bay laguna', 'No Contact', '03-02-24'),
(3, 5, 'Kezuke, jose', 'Josekzk', 'Jose@gmail.com', 'bay laguna', 'No Contact', '03-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `eid` int(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `hire_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `eid`, `employee_id`, `rank`, `name`, `gender`, `age`, `birthdate`, `birthplace`, `address`, `contact`, `email`, `image`, `hire_date`) VALUES
(2, 10, 'EID2024-5314343', 'Bartender', 'Young, Ethan', 'Male', '23', '2024-03-02', 'bay lagunaaaa', '09123 Dilaa, bay, laguna,(4033)', '091231231231', 'young@gmail.com', 'a.png', '2024-03-07'),
(4, 13, 'EID2024-1231232', 'Cashier', 'Ongchad, Mae Joy', 'Female', '20', '2003-10-20', 'Baguio City', '0212, Baguio City, Benguet,  (15602)', '091231231231', 'mjongchad@gmail.com', 'Favicon.png', '2024-03-05'),
(5, 14, 'EID2024-2123123', 'Manager', 'De Borja, abdul', 'male', '20', '2004-08-09', 'bay laguna', '0912 Dila, bay, laguna,  (4033)', '0912312312312', 'abduldb09@gmail.com', 'profile.png', '2024-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, '123123 123123', '1 Caramel', '16 oz', 'hot', '[] | ', '2222-12-31 | 12:31', '123123', '123123', 'cash ', 250, '10:13PM 03-03-24 ', 'completed', 'pickup', 'Istoria52045848672d'),
(2, 1, 'sdas asda', '1 Caramel, 1 Caramel', '16 oz, 16 oz', 'hot, hot', ' | [],   | [\"espresso shot\",\"sauce\",\"drizzle\",\"syrup\"]', 'dasd | asdasasd', 'asd1231', '23123', 'cash ', 620, '10:15PM 03-03-24 ', 'completed', 'delivery', 'Istoria5332604494f8'),
(3, 1, 'De Borja abdul', '1 Caramel', '16 oz', 'hot', ' | []', 'asdasda | 123123', '123123', '123123123', 'gcash ', 310, '08:47PM 03-04-24 ', 'completed', 'delivery', 'Istoria64482e06bdfa'),
(4, 1, '123 123123', '1 Caramel', '16 oz', 'hot', ' | []', '123123 | 123123', '12312', '312312', 'gcash ', 310, '08:53PM 03-04-24 ', 'completed', 'delivery', 'Istoria679743dd120f'),
(5, 12, 'manalo Jose', '1 Caramel', '16 oz', 'hot', '[] | ', '2024-03-06 | 09:35', '0912312312', 'Helo', 'cash ', 250, '09:35PM 03-04-24 ', 'pending', 'pickup', 'Istoria9308e0c4a1b8');

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
(7, 'Caramel', 250, '200', '5.png', 'coffee', 'available'),
(8, 'Java Chip', 150, '200', '5.png', 'latte', 'available'),
(9, 'Matcha Latte', 150, '200', '5.png', 'coffee', 'available'),
(10, 'Caramels', 123, '12312', '5.png', 'coffee', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `name`, `orders`, `comment`, `image`, `rating`, `reference`, `date`) VALUES
(1, 2, '1', '123', '123', '123', 5, '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(255) NOT NULL,
  `eid` int(255) NOT NULL,
  `total_hrs` int(255) NOT NULL,
  `total_mins` int(255) NOT NULL,
  `total_days` int(255) NOT NULL,
  `total_salary` int(255) NOT NULL,
  `lates` int(255) NOT NULL,
  `bonus` int(255) NOT NULL,
  `deduction` int(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `eid`, `total_hrs`, `total_mins`, `total_days`, `total_salary`, `lates`, `bonus`, `deduction`, `month`, `year`) VALUES
(6, 10, 12, 16, 2, 770, 1, 100, 200, '03', '24');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(255) NOT NULL,
  `eid` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `eid`, `total`, `type`, `date`, `time`, `reference`) VALUES
(17, 10, 500, 'offline', '03-03-24', '17:14:45 PM', 'Store98123123s'),
(19, 0, 500, 'offline', '04-03-24', '18:38:26 PM', 'Store01923912312321312'),
(21, 0, 620, 'online', '04-03-24', '18:46:45 PM', 'Istoria5332604494f8'),
(22, 0, 310, 'online', '04-03-24', '20:54:36 PM', 'Istoria64482e06bdfa'),
(23, 0, 310, 'online', '04-03-24', '20:54:40 PM', 'Istoria679743dd120f');

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

--
-- Dumping data for table `tray`
--

INSERT INTO `tray` (`id`, `name`, `category`, `price`, `quantity`, `type`, `size`, `addons`, `image`, `user_id`, `pid`) VALUES
(16, 'Caramel', 'coffee', 250, 1, 'hot', '16 oz', '[]', '5.png', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `email`, `password`) VALUES
(1, 'user', '2', '123'),
(4, 'admin', '1', '123'),
(5, 'user', 'Jose@gmail.com', '123'),
(10, 'employee', '3', '123'),
(13, 'employee', '123', '123'),
(14, 'employee', '4', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
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
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tray`
--
ALTER TABLE `tray`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
