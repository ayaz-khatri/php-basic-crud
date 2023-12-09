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

-- --
-- -- Table structure for table `categories`
-- --
-- DROP TABLE IF EXISTS `categories`;
-- CREATE TABLE `categories` (
--   `id` int(11) NOT NULL,
--   `name` varchar(255) NOT NULL,
--   `image` varchar(255) DEFAULT NULL,
--   `status` tinyint(1) DEFAULT 1,
--   `created_at` datetime NOT NULL DEFAULT current_timestamp(),
--   `updated_at` datetime NOT NULL DEFAULT current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `categories`
-- --

-- INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
-- (1, 'Burgers', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
-- (2, 'Pizzas', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
-- (3, 'Dairy Products', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
-- (4, 'Meat and Poultry', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
-- (5, 'Seafood', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
-- (6, 'Grains and Cereals', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
-- (7, 'Bakery and Pastries', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
-- (8, 'Beverages', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
-- (9, 'Snacks', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26'),
-- (10, 'Desserts', NULL, 1, '2023-10-31 11:40:26', '2023-10-31 11:40:26');

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

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `dob`, `phone`, `address`, `role`, `status`, `created_at`, `updated_at`)
VALUES
('1', 'John Doe', 'john@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1990-01-01', '1234567890', '123 Main St, City', 'a', 1, NOW(), NOW()),
('2', 'Jane Smith', 'jane.smith2@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1985-05-15', '9876543210', '456 Oak St, Town', 'u', 1, NOW(), NOW()),
('3', 'Bob Johnson', 'bob.johnson3@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1982-09-30', '5555555555', '789 Pine St, Village', 'u', 1, NOW(), NOW()),
('4', 'Alice Williams', 'alice.williams4@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1995-11-12', '2223334444', '101 Forest Ave, Hamlet', 'u', 1, NOW(), NOW()),
('5', 'Charlie Davis', 'charlie.davis5@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1989-07-25', '5556667777', '202 Meadow Blvd, Manor', 'u', 1, NOW(), NOW()),
('6', 'Emma Wilson', 'emma.wilson6@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1992-03-18', '9998887777', '303 Grove Ln, Estate', 'u', 1, NOW(), NOW()),
('7', 'David Martinez', 'david.martinez7@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1986-08-05', '1112223333', '404 Park Rd, Territory', 'u', 1, NOW(), NOW()),
('8', 'Olivia Robinson', 'olivia.robinson8@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1998-05-29', '4445556666', '505 Lake Dr, Province', 'u', 1, NOW(), NOW()),
('9', 'James Thompson', 'james.thompson9@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1984-12-15', '7778889999', '606 River Ave, Dominion', 'u', 1, NOW(), NOW()),
('10', 'Sophia Harris', 'sophia.harris10@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1991-02-07', '3334445555', '707 Ridge St, Republic', 'u', 1, NOW(), NOW()),
('11', 'Matthew Moore', 'matthew.moore11@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1987-09-22', '6667778888', '808 Hillside Dr, Commonwealth', 'u', 1, NOW(), NOW()),
('12', 'Ava Young', 'ava.young12@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1994-04-03', '1112223333', '909 Vale Blvd, Union', 'u', 1, NOW(), NOW()),
('13', 'William Lee', 'william.lee13@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1983-11-19', '9998887777', '123 Pineapple Ln, Confederacy', 'u', 1, NOW(), NOW()),
('14', 'Ella Turner', 'ella.turner14@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1988-06-15', '4445556666', '456 Apple St, Federation', 'u', 1, NOW(), NOW()),
('15', 'Michael Baker', 'michael.baker15@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1997-01-28', '7778889999', '789 Banana Blvd, Alliance', 'u', 1, NOW(), NOW()),
('16', 'Grace Hill', 'grace.hill16@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1986-08-10', '3334445555', '101 Cherry Dr, Coalition', 'u', 1, NOW(), NOW()),
('17', 'Daniel Adams', 'daniel.adams17@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1995-05-17', '6667778888', '202 Grape St, Axis', 'u', 1, NOW(), NOW()),
('18', 'Chloe Clark', 'chloe.clark18@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1989-12-02', '1112223333', '303 Lemon Ave, Bloc', 'u', 1, NOW(), NOW()),
('19', 'Ryan Scott', 'ryan.scott19@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1984-02-24', '9998887777', '404 Orange Blvd, Cadre', 'u', 1, NOW(), NOW()),
('20', 'Isabella Murphy', 'isabella.murphy20@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1991-09-08', '4445556666', '505 Strawberry Ln, Cell', 'u', 1, NOW(), NOW()),
('21', 'Noah Ward', 'noah.ward21@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1987-04-13', '7778889999', '606 Peach St, Circle', 'u', 1, NOW(), NOW()),
('22', 'Mia Evans', 'mia.evans22@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1994-11-28', '3334445555', '707 Pear Dr, Class', 'u', 1, NOW(), NOW()),
('23', 'Liam King', 'liam.king23@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1983-07-04', '6667778888', '808 Watermelon Blvd, Cluster', 'u', 1, NOW(), NOW()),
('24', 'Avery Rivera', 'avery.rivera24@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1997-03-09', '1112223333', '909 Blueberry Ln, Cohort', 'u', 1, NOW(), NOW()),
('25', 'Elijah Torres', 'elijah.torres25@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1986-10-22', '9998887777', '123 Raspberry St, Column', 'u', 1, NOW(), NOW()),
('26', 'Scarlett Garcia', 'scarlett.garcia26@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1993-06-05', '4445556666', '456 Grapefruit Ave, Company', 'u', 1, NOW(), NOW()),
('27', 'Benjamin Diaz', 'benjamin.diaz27@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1988-01-18', '7778889999', '789 Kiwi Dr, Concern', 'u', 1, NOW(), NOW()),
('28', 'Hannah Martinez', 'hannah.martinez28@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1995-08-31', '3334445555', '101 Mango Blvd, Condition', 'u', 1, NOW(), NOW()),
('29', 'Jackson Nguyen', 'jackson.nguyen29@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1982-05-14', '6667778888', '202 Papaya St, Conduct', 'u', 1, NOW(), NOW()),
('30', 'Lily Cooper', 'lily.cooper30@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1989-12-27', '1112223333', '303 Guava Ave, Confusion', 'u', 1, NOW(), NOW()),
('31', 'Ethan Reed', 'ethan.reed31@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1997-10-10', '9998887777', '404 Durian Blvd, Congress', 'u', 1, NOW(), NOW()),
('32', 'Aria Morgan', 'aria.morgan32@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1991-04-23', '4445556666', '505 Lychee Ln, Conspiracy', 'u', 1, NOW(), NOW()),
('33', 'Mason Bell', 'mason.bell33@example.com', '$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1988-11-08', '7778889999', '606 Water St, Confidant', 'u', 1, NOW(), NOW()),
('34', 'Harper Cox', 'harper.cox34@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1994-06-19', '3334445555', '707 Fire Blvd, Congregation', 'u', 1, NOW(), NOW()),
('35', 'Logan Price', 'logan.price35@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1985-01-02', '6667778888', '808 Earth St, Consequence', 'u', 1, NOW(), NOW()),
('36', 'Evelyn Ward', 'evelyn.ward36@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1997-08-15', '1112223333', '909 Wind Blvd, Consent', 'u', 1, NOW(), NOW()),
('37', 'Owen Foster', 'owen.foster37@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1986-03-28', '9998887777', '123 Rain St, Consensus', 'u', 1, NOW(), NOW()),
('38', 'Addison Brooks', 'addison.brooks38@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1995-10-31', '4445556666', '456 Thunder Blvd, Conspiracy', 'u', 1, NOW(), NOW()),
('39', 'Jack Perry', 'jack.perry39@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1983-06-13', '7778889999', '789 Lightning St, Constable', 'u', 1, NOW(), NOW()),
('40', 'Aubrey Hughes', 'aubrey.hughes40@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1991-03-26', '3334445555', '101 Storm Ave, Constraint', 'u', 1, NOW(), NOW()),
('41', 'Luke Long', 'luke.long41@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1988-12-09', '6667778888', '202 Sun Blvd, Construction', 'u', 1, NOW(), NOW()),
('42', 'Nora Wood', 'nora.wood42@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1994-07-22', '1112223333', '303 Moon St, Consultation', 'u', 1, NOW(), NOW()),
('43', 'Henry Ward', 'henry.ward43@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1983-02-04', '9998887777', '404 Star Dr, Contact', 'u', 1, NOW(), NOW()),
('44', 'Amelia Powell', 'amelia.powell44@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1997-09-17', '4445556666', '505 Sky Blvd, Context', 'u', 1, NOW(), NOW()),
('45', 'Leo Simmons', 'leo.simmons45@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1992-04-29', '7778889999', '606 Heaven St, Contract', 'u', 1, NOW(), NOW()),
('46', 'Stella Cooper', 'stella.cooper46@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1995-11-12', '3334445555', '707 Earth Blvd, Contradiction', 'u', 1, NOW(), NOW()),
('47', 'Jaxon Bell', 'jaxon.bell47@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1987-07-25', '6667778888', '808 Mars Dr, Control', 'u', 1, NOW(), NOW()),
('48', 'Lucy Price', 'lucy.price48@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1994-02-08', '1112223333', '909 Venus St, Convenience', 'u', 1, NOW(), NOW()),
('49', 'Asher Ward', 'asher.ward49@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1989-01-14', '7778889999', '123 Saturn Blvd, Conversion', 'u', 1, NOW(), NOW()),
('50', 'Aria Cox', 'aria.cox50@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'f', '1996-03-18', '3334445555', '303 Mercury Ln, Cooperation', 'u', 1, NOW(), NOW()),
('51', 'Gabriel Sanders', 'gabriel.sanders51@example.com', '$2y$10$6KiS6xRkfjHMUKCaaJ0fa.Ch9RFXB9ubn/1jDYjHLq564EfjKZNRm', 'm', '1990-08-27', '5556667777', '101 Sunflower St, Coexistence', 'u', 1, NOW(), NOW());



--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
-- ALTER TABLE `categories`
--   ADD PRIMARY KEY (`id`);

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
-- ALTER TABLE `categories`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
