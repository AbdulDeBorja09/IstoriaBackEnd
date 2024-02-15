-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2023 at 03:16 PM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `placed_on` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(4, 4, 'Ethan young', '123123', 'ethanyoung@gmail.com', '', 'flate no. 123123,halanh,calamba,laguna,20123,asdasdasd', ',Burat ni ethan (4),tite ni apol (4)', '2400', '16-Sep-2023', 'completes'),
(6, 4, 'Ethan young', '123123', 'ethanyoung@gmail.com', 'Gcash', 'House no. 123123, halang, calamba, laguna, 4033, philippines ', ',tite ni apol (1) (Small)', '300', '16-Sep-2023', 'completes'),
(7, 3, 'Mae joy Ongchad', '09123123', 'mj@gmail.com', 'Bank', 'House no. 12313, halang, calamba, laguna, 4033, philippines ', ',eeee (3) (Small),asd (3) (Small),asdasd (3) (Small),qqqqq (3) (Small)', '374436', '17-Sep-2023', 'pending'),
(8, 4, 'asdas', '123123', 'silakboapparel@gmail.com', 'Cash On Delivery', 'House no. 123123, halanh, 123, dsasdasd, 123123, sdasdasdasd', ',asd (1) (Small)', '123', '20-Sep-2023', 'pending'),
(9, 4, 'asdas', '123123', 'silakboapparel@gmail.com', 'Cash On Delivery', 'House no. 123123, halanh, 123, dsasdasd, 123123, sdasdasdasd', '', '0', '20-Sep-2023', 'pending'),
(10, 4, 'Mae joy Ongchad', '123123', 'abduldb09@gmail.com', 'Bank', 'House no. 123123, halanh, 123, asdasda, 212, sdasdasdasd', ',asdasd (1) (Small)', '1233', '20-Sep-2023', 'pending'),
(11, 4, '123123', '23123', '312', 'Cash On Delivery', 'House no. 3123123, 1231, 1231, 123123, 23123123, 123123', ',asd (1) (Small)', '123', '20-Sep-2023', 'pending'),
(12, 4, '1231', '3123', '1asdasd', 'Cash On Delivery', 'House no. 13123, 1231, 23123, 123, 123, 12312312313', ',asd (1) (Small)', '123', '20-Sep-2023', 'pending'),
(13, 3, 'Mae joy Ongchad', '123123', 'abduldb09@gmail.com', 'Cash On Delivery', 'House no. asdasd, halang, sdsd, laguna, 1231, sdasdasdasd', ',Mindful Moment (1) (Small)', '700', '30-Sep-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_detail` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quality` varchar(1000) NOT NULL,
  `design` varchar(1000) NOT NULL,
  `fit` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `esential` varchar(1000) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_detail`, `image`, `quality`, `design`, `fit`, `message`, `esential`, `size`) VALUES
(56, 'Mindful Moment', '700', 'Embrace the serenity of the present moment with our Mindful Moment T-shirt. Crafted from the softest, breathable cotton, this t-shirt not only feels luxurious against your skin but also carries a powerful message of mindfulness. The minimalist design and calming colors serve as a gentle reminder to pause, breathe, and appreciate the beauty of now.', 'Mindful moment.png', 'Made from 100% combed and ring-spun cotton, this t-shirt offers superior softness and comfort, ensuring a delightful wearing experience.', 'The Mindful Moment T-shirt features a thoughtfully designed graphic that embodies the essence of mindfulness. The intricate detailing and soothing colors create a visual representation of tranquility.', 'With a relaxed fit and durable stitching, this t-shirt provides freedom of movement while maintaining its shape, making it perfect for various activities or lounging.', 'Printed with the words Mindful Moment in elegant, script font, this t-shirt inspires mindfulness and encourages a mindful lifestyle, spreading positivity wherever you go.', 'We are committed to eco-friendly practices. Our t-shirts are created using sustainable manufacturing processes, minimizing environmental impact.', 'S, M, L, Xl');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `name`, `email`, `message`, `date`) VALUES
(1, 4, 'Mae joy Ongchad', 'mj@gmail.com', ' Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi nulla unde quam, praesentium minus maxime quia dignissimos odit doloribus nobis consequatur odio est sapiente iste accusantium quasi at debitis nam.', ' 20-Sep-2023'),
(2, 4, 'Abdul De Borja', 'abduldb09@gmail.com', ' Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi nulla unde quam, praesentium minus maxime quia dignissimos odit doloribus nobis consequatur odio est sapiente iste accusantium quasi at debitis nam.', ' 20-Sep-2023'),
(3, 4, 'sqweqe', 'abduldb09@gmail.com', ' asdasda', ' 20-Sep-2023'),
(4, 3, 'Mae joy Ongchad', 'abduldb09@gmail.com', ' sdasdasd', ' 30-Sep-2023');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `address` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `user` (`id`, `type`, `name`,  `username`, `email`, `password`, `address`) VALUES
(1, 'admin','istoria admin','adminacc', 'admin@a', '123', 'bay laguna')
INSERT INTO `user` (`id`, `type`, `name`,  `username`, `email`, `password`, `address`) VALUES
(3, 'user','istoria admin','adminacc', 'user', '123', 'bay laguna')
-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
