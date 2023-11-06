-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 04:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `gender`, `phone`, `email`, `dob`, `password`, `image`) VALUES
(1, 'Djum', 'Djuma', 'male', '0785389001', 'admin@gmail.com', '1994-12-23', 'ecd00aa1acd325ba7575cb0f638b04a5', '202310021900user.png');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `b_id` int(11) NOT NULL,
  `c_fk_id` int(11) DEFAULT NULL,
  `p_fk_id` int(11) DEFAULT NULL,
  `packs_count` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `cancel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`b_id`, `c_fk_id`, `p_fk_id`, `packs_count`, `status`, `cancel`) VALUES
(1, 1, 2, '29', 'not', 'not');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_int` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Bikman djuma', 'bikman@gmail.com', '0785389000', '38f17e0ef292963e64b9a68452e776a7'),
(2, 'Test', 'test@gmail.com', '0785389001', 'e9d966ebc74f5363765fa3169d8a142a'),
(3, 'tests', 'test2@gmail.com', '0785389011', 'c06db68e819be6ec3d26c6038d8e8d1f'),
(4, 'Dilofwa', 'dilofwa@gmail.com', '0785389111', 'c06db68e819be6ec3d26c6038d8e8d1f'),
(5, 'Ricardo', 'ricardo@gmail.com', '0785389123', 'f2a46c2e2f0b81c20b9ed0a7643d179f'),
(6, 'Mustapha', 'mustapha@gmail.com', '0787610100', 'acdfa2132d9cd86bff70898f68a3113d');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `mg_bottle` varchar(100) DEFAULT NULL,
  `bottle_pack` varchar(100) DEFAULT NULL,
  `manu_date` varchar(100) DEFAULT NULL,
  `exp_date` varchar(100) DEFAULT NULL,
  `ndc` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `name`, `description`, `image`, `quantity`, `mg_bottle`, `bottle_pack`, `manu_date`, `exp_date`, `ndc`, `price`) VALUES
(1, 'Paracetamol', 'Paracetamol is a commonly used medicine that can help treat pain and reduce a high temperature (fever). It\'s typically used to relieve mild or moderate pain, such as headaches, toothache or sprains, and reduce fevers caused by illnesses such as colds and flu', '202310020336product_07_large.png', '25', '200', '12', '2023-10-02', '2023-11-10', '76542-1235-60', '20000'),
(2, 'Action', 'Take Action is the generic form of Plan B, which is a type of emergency contraceptive pill. A person can take this pill to prevent pregnancy after having sex without using a barrier method of birth control, or if they experienced contraception failure', '202310020348product_05.png', '30', '500', '24', '2023-10-01', '2023-12-01', '12342-1235-05', '34000'),
(3, 'Analgesics', ' analgesics, are medications that are used to relieve or reduce pain. The term analgesic is derived from the Greek words an (without) and algos (pain), so it literally means ,without pain, These medications work by interfering with the body\'s perception of pain, thereby providing relief from various types and levels of pain, ranging from mild to severe.', '202310072212analgetics.jpg', '28', '200', '12', '2023-10-07', '2023-10-27', '12002-1205-12', '40000'),
(4, 'Cuartem', 'Take Action is the generic form of Plan B, which is a type of emergency contraceptive pill.', '202310080332download.jpg', '42', '200', '24', '2023-08-02', '2024-09-22', '76542-1235-10', '150000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `c_fk_id` (`c_fk_id`),
  ADD KEY `p_fk_id` (`p_fk_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_int`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_int` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`c_fk_id`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`p_fk_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
