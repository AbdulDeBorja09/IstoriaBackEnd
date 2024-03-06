-- BSIT221-A E-STORE-RIA DATABASE
-- - De Borja, Abdul Aziz
-- - Rausa, Zyrha Alliah
-- - Celino, Andrea Charisse 
-- - Dinero, Khylle 
-- - Brofar, Euwayne Paulette

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";

CREATE TABLE `addons` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
);

CREATE TABLE `attendance` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
);

CREATE TABLE `customer` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `uid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL DEFAULT 'No Contact',
  `created` varchar(255) NOT NULL
);

CREATE TABLE `employee` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
);

CREATE TABLE `message` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL
);

CREATE TABLE `orders` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
);

CREATE TABLE `products` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `price` int(255) NOT NULL,
  `price_range` varchar(255) NOT NULL,
  `image` mediumtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'available'
);

CREATE TABLE `review` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
);

CREATE TABLE `salary` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
);

CREATE TABLE `sales` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `eid` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL
);

CREATE TABLE `tray` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
);

CREATE TABLE `user` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);

INSERT INTO `user` (`id`, `type`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'istoria123');

