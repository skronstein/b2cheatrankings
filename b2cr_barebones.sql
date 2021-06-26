-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2021 at 08:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2cr_test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `reverse` tinyint(1) DEFAULT NULL,
  `traffic` tinyint(1) DEFAULT 0,
  `car` varchar(255) NOT NULL,
  `player` varchar(255) NOT NULL,
  `system` enum('Gamecube/Wii','Dolphin') NOT NULL,
  `proof` varchar(255) NOT NULL,
  `datetime_entered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_acheived` date NOT NULL,
  `track_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `category` enum('best_laps','total_times','big_crashes','race_crash_totals','big_airs','most_cars_in_crashes') DEFAULT NULL,
  `oob` tinyint(1) DEFAULT NULL,
  `crashToSaveTime` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_short` varchar(10) NOT NULL,
  `p2p` tinyint(4) NOT NULL,
  `laps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `name_short`, `p2p`, `laps`) VALUES
(1, 'Airport Terminal 3', 'at3', 0, 5),
(2, 'Airport Terminal 1&2', 'at12', 0, 3),
(3, 'Interstate Loop', 'iloop', 0, 3),
(4, 'Interstate 88', 'i88', 0, 2),
(5, 'Palm Bay Heights', 'pbh', 0, 3),
(6, 'Palm Bay Marina', 'pbm', 0, 3),
(7, 'Sunrise Valley Downtown', 'svd', 0, 4),
(8, 'Sunrise Valley Springs', 'svs', 0, 3),
(9, 'Big Surf Grove', 'bsg', 0, 4),
(10, 'Big Surf Shores', 'bss', 0, 3),
(11, 'Crystal Summit Peak', 'csp', 0, 5),
(12, 'Crystal Summit Lake', 'csl', 0, 3),
(13, 'Ocean Sprint', 'p2p1', 1, 1),
(14, 'Heartbreak Hills', 'p2p2', 1, 1),
(15, 'Freeway Dash', 'p2p3', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_track_id` (`track_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
