-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 08:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` int(11) NOT NULL,
  `qnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `price`, `qnt`) VALUES
(1, 'LITTLE BLACK DRESS', 30, 11),
(2, 'JEANS', 15, 22),
(3, 'SWEATER', 17, 57),
(4, 'SOCKS', 220, 10),
(5, 'RACKET', 220, 61),
(6, 'SNEAKERS', 13, 19),
(7, 'SHORTS', 95, 45),
(8, 'BALL', 25, 12),
(9, 'SOCCER BALL', 68, 77),
(10, 'COAT AND GLOVES', 600, 45),
(11, 'WOMEN SHOES', 350, 390),
(12, 'JACKET', 25, 33),
(13, 'HAT', 44, 56),
(14, 'LAWN MOWER', 120, 111),
(15, 'WARDROBES', 212, 333),
(16, 'BABY BED', 222, 2222),
(17, 'KIDS TOYS', 33, 22),
(545, 'SHIRT', 450, 44),
(546, 'GAME CONSOLE', 66, 55),
(547, 'LEGO', 9, 8),
(548, 'TRAMPOLINE', 99, 77);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=549;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
