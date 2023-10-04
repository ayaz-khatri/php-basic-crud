-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 02:50 PM
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
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` char(1) DEFAULT 'u',
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', '$2y$10$tMVS.80AAFUl6qLraqtb8ep/a7ByRTsMCrNb6ArOqbXwEya/zsbFe', 'a', 1, '2023-09-14 16:02:37', '2023-09-14 16:02:37'),
(2, 'Mary Johnson', 'maryjohnson@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'u', 1, '2023-09-20 19:00:53', '2023-09-20 19:00:53'),
(3, 'David Wilson', 'davidwilson@example.com', '$2y$10$baXJ.vLlpsWpt0n9/VqLCeL53Ry1bWUtGoT91ZjBtaaqiGVHnt.Q6', 'u', 1, '2023-09-20 19:01:14', '2023-09-20 19:01:14'),
(4, 'Susan Brown', 'susanbrown@example.com', '$2y$10$k.5WbzCMqaaQtdXwmSBDTeQrb.Zy20njIP9O00ZSgUAraD80xFYLq', 'u', 1, '2023-09-20 19:01:38', '2023-09-20 19:01:38'),
(5, 'Michael Lee', 'michaellee@example.com', '$2y$10$M/dhdIYoshGEIfBUyohFc.l01UEwch5D/Yzom/KvTC1xUmYeEimba', 'u', 1, '2023-09-20 19:02:02', '2023-09-20 19:02:02'),
(6, 'Linda Davis', 'lindadavis@example.com', '$2y$10$UXPQCMKfIGwzGNFADk8AouzPxw68WTWI9Gupot9QgtBR0slhkVCr6', 'u', 1, '2023-09-20 19:02:29', '2023-09-20 19:02:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
