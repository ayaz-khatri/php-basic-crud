-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 07:41 AM
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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Burgers', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
(2, 'Pizzas', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
(3, 'Dairy Products', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
(4, 'Meat and Poultry', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
(5, 'Seafood', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
(6, 'Grains and Cereals', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
(7, 'Bakery and Pastries', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
(8, 'Beverages', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
(9, 'Snacks', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
(10, 'Desserts', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` char(1) NOT NULL DEFAULT 'u',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `dob`, `phone`, `address`, `image`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', '$2y$10$zAvrVPt/THAbomRK5n3C1e/OO2CevtozhmKYFIK6tDytYnHHip1.i', NULL, NULL, NULL, NULL, NULL, 'a', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37'),
(2, 'Mary Johnson', 'maryjohnson@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, NULL, 'u', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37'),
(3, 'Michael Parker', 'michaelparker@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, NULL, 'u', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37'),
(4, 'Alice Smith', 'alicesmith@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, NULL, 'u', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37'),
(5, 'Bob Johnson', 'bobjohnson@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, NULL, 'u', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37'),
(6, 'Eve Adams', 'eveadams@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, NULL, 'u', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37'),
(7, 'Charlie Brown', 'charliebrown@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, NULL, 'u', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37'),
(8, 'David Smith', 'davidsmith@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, NULL, 'u', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37'),
(9, 'Grace Wilson', 'gracewilson@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, NULL, 'u', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37'),
(10, 'Frank Miller', 'frankmiller@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', NULL, NULL, NULL, NULL, NULL, 'u', 1, '2023-10-31 11:29:37', '2023-10-31 11:29:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
