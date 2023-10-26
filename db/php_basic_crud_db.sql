-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 03:50 PM
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
-- Database: `php_basic_crud_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `category_status` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Gents', NULL, 1, '2023-10-26 18:37:37', '2023-10-26 18:37:37'),
(2, 'Ladies', NULL, 1, '2023-10-26 18:49:35', '2023-10-26 18:49:35'),
(3, 'Kids', NULL, 1, '2023-10-26 18:49:40', '2023-10-26 18:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` char(1) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_role` char(1) NOT NULL DEFAULT 'u',
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_gender`, `user_dob`, `user_phone`, `user_address`, `user_image`, `user_role`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', '$2y$10$tMVS.80AAFUl6qLraqtb8ep/a7ByRTsMCrNb6ArOqbXwEya/zsbFe', NULL, NULL, NULL, NULL, NULL, 'a', 1, '2023-09-14 16:02:37', '2023-09-14 16:02:37'),
(2, 'Mary Johnson', 'maryjohnson@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, 'user-653a3dc7d74bf.png', 'u', 1, '2023-09-20 19:00:53', '2023-10-26 15:24:13'),
(3, 'David Wilson', 'davidwilson@example.com', '$2y$10$baXJ.vLlpsWpt0n9/VqLCeL53Ry1bWUtGoT91ZjBtaaqiGVHnt.Q6', NULL, NULL, NULL, NULL, 'user-653a3dbcba4ad.jpg', 'u', 1, '2023-09-20 19:01:14', '2023-10-26 15:24:13'),
(5, 'Michael Lee', 'michaellee@example.com', '$2y$10$M/dhdIYoshGEIfBUyohFc.l01UEwch5D/Yzom/KvTC1xUmYeEimba', NULL, NULL, NULL, NULL, 'user-653a3da24197e.jpg', 'u', 1, '2023-09-20 19:02:02', '2023-10-26 15:24:13'),
(6, 'Linda Davis', 'lindadavis@example.com', '$2y$10$UXPQCMKfIGwzGNFADk8AouzPxw68WTWI9Gupot9QgtBR0slhkVCr6', NULL, NULL, NULL, NULL, 'user-653a3d9905118.png', 'u', 1, '2023-09-20 19:02:29', '2023-10-26 15:24:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
