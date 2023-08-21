-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 10:39 PM
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
-- Database: `robonexus`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`username`, `email`, `password`) VALUES
('Tabia04027', 'tabia.cse.20200204027@aust.edu', 'Gmail@1234'),
('Tabia', 'tabia.cse.20200204027@aust.edu', '123'),
('Maisha', 'tabiamorshed@gmail.com', '123'),
('Maisha', 'tabia.cse.20200204027@aust.edu', 'Gmail@1234'),
('Maisha', 'ponkidagreat@gmail.com', '123'),
('Raida', 'tabiamorshed@gmail.com', 'raida123'),
('Raida', 'ponkidagreat@gmail.com', 'r123'),
('Fatema', 'ponkidagreat@gmail.com', 'fatema@'),
('Tasnim', 'tmmasiat@gmail.com', '123'),
('123', '123', '123'),
('123', '123', '123'),
('Urmi', 'ponkidagreat@gmail.com', '123456'),
('Waza', 'ponkidagreat@gmail.com', 'waza'),
('Maisha', 'ponkidagreat@gmail.com', '123'),
('Urmi', 'ponkidagreat@gmail.com', '444'),
('Kanta', 'ponkidagreat@gmail.com', 'kanta'),
('Ratul', 'ponkidagreat@gmail.com', 'rat'),
('Tabia Morshed', 'ponkidagreat@gmail.com', '123Tabia@'),
('Tabia', 'ponkidagreat@gmail.com', '123'),
('Tabia', 'tabiamorshed@gmail.com', '123'),
('Adib', 'adib1690@gmail.com', '123456'),
('Tabia', 'ponkidagreat@gmail.com', '123'),
('Siam', 'siamansary.cse@aust.edu', 'siam12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
