-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2025 at 09:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `projectmain_db`
--

CREATE TABLE `projectmain_db` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projectmain_db`
--

INSERT INTO `projectmain_db` (`id`, `title`, `category`, `description`, `image`, `created_at`) VALUES
(18, 'Wordpress Web Design', 'Web Design', 'This is my first published web design project created using WordPress as a personal portfolio website. It serves as an online showcase of my early design work, focusing on clean layout, responsive structure, and user-friendly navigation. The site highlights my understanding of visual hierarchy, color balance, and typography, while maintaining a professional and minimalist aesthetic. This project represents my initial step into live web design and demonstrates my ability to build and publish a functional and visually appealing website.\r\n🔗 https://samananiascases.wordpress.com/', 'uploads/webdesign.png', '2025-10-30 05:34:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projectmain_db`
--
ALTER TABLE `projectmain_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projectmain_db`
--
ALTER TABLE `projectmain_db`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
