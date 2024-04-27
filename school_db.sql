-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 06:34 PM
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
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `profile_photo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school` varchar(30) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `school` (`school`),
  KEY `school_id` (`school_id`),
  KEY `date` (`date`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school`, `school_id`, `date`, `user_id`, `status`) VALUES
(1, 'Gonda', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '2024-04-25 15:39:19', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 1),
(2, 'Anoya', '7vVNDm5uDZd4Tnfqkwe6AIM5ryq3aO9h1khOqb8Muwz45Z1o8lsGrBqtik6f', '2024-04-25 15:39:32', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`),
  KEY `date` (`date`),
  KEY `user_id` (`user_id`),
  KEY `school_id` (`school_id`),
  KEY `gender` (`gender`),
  KEY `rank` (`rank`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `school_id`, `rank`, `password`, `profile_photo`) VALUES
(1, 'Eathorne', 'Banda', 'eathorne@yahoo.com', '2024-04-22 22:00:33', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 'male', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'super_admin', '$2y$10$pYVX5iPIuxTTgRFKrTXCFeBIEYe7HjMUZ2ECHNcGpxdzAcKgcYvy.', ''),
(2, 'Mary', 'Phiri', 'mary@yahoo.com', '2024-04-22 22:17:41', 'oao3tht79qs59ts0kCV9Zb4sl8612IhegWCXYHQclzgmRt8ReqQRWo2oxVUE', 'female', '', 'super_admin', '$2y$10$kLaJT17c4hXB3KrpLwgTUeTCAYe9cBVyIaKO/Yhw6/skEgGgmccNi', ''),
(3, 'John', 'Tembo', 'john@yahoo.com', '2024-04-26 20:35:37', 'xt1MdfCzM4rBJ8uJ5pJjqIQJ3yPh5camqK6V71jr8pi7XNfCtGwbMG02gHIX', 'male', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'admin', '$2y$10$.byCmJoPPQ3VjDKUtRZ8NO9EqvDCK14gUyizMvpSPY4hGnYZMHHqu', ''),
(4, 'Anna', 'Jones', 'anna@yahoo.com', '2024-04-26 20:55:00', '8u95jViTOJeawwLiKUroeKXjfdlBLbeMW1nXWYbZs6nHvheKJ52XQyJTJnwU', 'female', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'reception', '$2y$10$Uqn6fhvqUROq8q8wqFZUXOH3JqTIVQy92VjdBbd5DJmoFj9gDvS6G', ''),
(5, 'Vibe', 'Peters', 'vibe@yahoo.com', '2024-04-26 20:56:10', 'IZQ2SyeeRin58UkfdPQFxRlLO7GOUvBav4FwbWVVRa18AFmuF7qEvcj4q8G6', 'male', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'lecturer', '$2y$10$dHNSSFH/5mbqvV7TCqoMR.25tRhsd6wwFQPiCkqMqa7T8EI/dypOW', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
