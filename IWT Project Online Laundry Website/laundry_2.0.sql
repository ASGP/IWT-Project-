-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 12:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `serviceTypes` varchar(255) NOT NULL,
  `clotheTypes` varchar(255) NOT NULL,
  `count` varchar(255) NOT NULL,
  `mass` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pickupType` varchar(255) NOT NULL,
  `deliveryMethod` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `serviceTypes`, `clotheTypes`, `count`, `mass`, `address`, `pickupType`, `deliveryMethod`, `date`, `status`) VALUES
('s4k7WTaCId9zHq0', 'john@gmail.com', 'Laundry', 'Cotton', '2', '3', 'Galle', 'Bring to Store', 'Pickup from Store', '05-11-22 08:26:28', 'pending'),
('wqJIfutoqFEE8De', 'john@gmail.com', 'Laundry, Dry Cleaning, Ironing', 'Cotton, Fabric, Silk', '2', '2', 'No 07, Colombo', 'Pickup from Home', 'Delivery to Home', '05-11-22 10:47:43', 'pending'),
('xaTI0UbrGfRswBk', 'john@gmail.com', 'Laundry, Dry Cleaning, Ironing', 'Cotton, Fabric, Silk', '4', '4', 'Matara', 'Bring to Store', 'Pickup from Store', '05-11-22 08:36:46', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subscription` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `subscription`, `address`, `password`) VALUES
(6, 'John Smith', 'john@gmail.com', '0770000000', 'Plan Three', 'Galle', '123456'),
(7, 'Peter', 'peter@gmail.com', '0775654345', 'Plan Two', '', '123456'),
(8, 'John Smith', 'john2@gmail.com', '0775654345', 'Plan One', 'Galle', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
