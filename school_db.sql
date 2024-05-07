-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 01:38 PM
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
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(30) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class` (`class`),
  KEY `user_id` (`user_id`),
  KEY `school_id` (`school_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `user_id`, `school_id`, `class_id`, `date`) VALUES
(1, 'Year 7A', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '5bMB75TLxnNamvul8k6f95k7Lj1ajzUg0wOpzGQ1nhxsiHwu6NetcAOqb0rH', '2024-04-28 19:28:58'),
(3, 'Year 7B', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'mN8PHEIGjvD1LkCTrgDgp6uQIzKjcA0CHota96xHSalB2KbaS7yRFSQqjoFZ', '2024-04-28 19:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `class_lecturers`
--

CREATE TABLE IF NOT EXISTS `class_lecturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `class_id` (`class_id`),
  KEY `disabled` (`disabled`),
  KEY `date` (`date`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_lecturers`
--

INSERT INTO `class_lecturers` (`id`, `user_id`, `class_id`, `disabled`, `date`, `school_id`, `updated_at`) VALUES
(1, 'IZQ2SyeeRin58UkfdPQFxRlLO7GOUvBav4FwbWVVRa18AFmuF7qEvcj4q8G6', '5bMB75TLxnNamvul8k6f95k7Lj1ajzUg0wOpzGQ1nhxsiHwu6NetcAOqb0rH', 1, '2024-04-30 16:33:52', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '2024-05-01 10:13:50'),
(2, 'IZQ2SyeeRin58UkfdPQFxRlLO7GOUvBav4FwbWVVRa18AFmuF7qEvcj4q8G6', '5bMB75TLxnNamvul8k6f95k7Lj1ajzUg0wOpzGQ1nhxsiHwu6NetcAOqb0rH', 1, '2024-05-01 10:36:31', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '2024-05-01 10:37:50'),
(3, 'IZQ2SyeeRin58UkfdPQFxRlLO7GOUvBav4FwbWVVRa18AFmuF7qEvcj4q8G6', '5bMB75TLxnNamvul8k6f95k7Lj1ajzUg0wOpzGQ1nhxsiHwu6NetcAOqb0rH', 1, '2024-05-01 10:39:35', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '2024-05-01 13:06:19'),
(4, 'IZQ2SyeeRin58UkfdPQFxRlLO7GOUvBav4FwbWVVRa18AFmuF7qEvcj4q8G6', 'mN8PHEIGjvD1LkCTrgDgp6uQIzKjcA0CHota96xHSalB2KbaS7yRFSQqjoFZ', 1, '2024-05-01 13:15:21', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '2024-05-01 13:29:11'),
(5, 'IZQ2SyeeRin58UkfdPQFxRlLO7GOUvBav4FwbWVVRa18AFmuF7qEvcj4q8G6', 'mN8PHEIGjvD1LkCTrgDgp6uQIzKjcA0CHota96xHSalB2KbaS7yRFSQqjoFZ', 0, '2024-05-01 13:29:30', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE IF NOT EXISTS `class_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `disabled` (`disabled`),
  KEY `class_id` (`class_id`),
  KEY `user_id` (`user_id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`id`, `user_id`, `class_id`, `disabled`, `date`, `school_id`, `updated_at`) VALUES
(1, 'J4l3kwG8UqSnhC33bKTOZDclYLCjK1duv2UnclNM5vFcPIfMOMz8ozhr5QYT', 'mN8PHEIGjvD1LkCTrgDgp6uQIzKjcA0CHota96xHSalB2KbaS7yRFSQqjoFZ', 1, '2024-05-01 14:45:36', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '2024-05-01 19:51:25'),
(2, '3KsXT2F3KcW2uiE3IS5wq5wCHcW0bdRo6zebOpgE4WTT8gdk6DBovMGCbZQc', 'mN8PHEIGjvD1LkCTrgDgp6uQIzKjcA0CHota96xHSalB2KbaS7yRFSQqjoFZ', 0, '2024-05-01 14:46:07', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', NULL),
(3, 'oLp1kpDnu393jNpmQsAXpR8CYipPGykBzOZ2wXc4lpOUdn8HXK8mhytldJjc', 'mN8PHEIGjvD1LkCTrgDgp6uQIzKjcA0CHota96xHSalB2KbaS7yRFSQqjoFZ', 1, '2024-05-01 14:48:08', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '2024-05-01 19:51:54'),
(4, 'J4l3kwG8UqSnhC33bKTOZDclYLCjK1duv2UnclNM5vFcPIfMOMz8ozhr5QYT', 'mN8PHEIGjvD1LkCTrgDgp6uQIzKjcA0CHota96xHSalB2KbaS7yRFSQqjoFZ', 0, '2024-05-01 19:59:49', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', NULL),
(5, 'oLp1kpDnu393jNpmQsAXpR8CYipPGykBzOZ2wXc4lpOUdn8HXK8mhytldJjc', 'mN8PHEIGjvD1LkCTrgDgp6uQIzKjcA0CHota96xHSalB2KbaS7yRFSQqjoFZ', 1, '2024-05-01 20:22:09', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '2024-05-04 17:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `class_tests`
--

CREATE TABLE IF NOT EXISTS `class_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `test` varchar(100) NOT NULL,
  `test_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `date` (`date`),
  KEY `test` (`test`),
  KEY `disabled` (`disabled`),
  KEY `class_id` (`class_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Grenville - Secondary', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', '2024-04-25 15:39:19', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 1),
(2, 'Grenville - Primary', '7vVNDm5uDZd4Tnfqkwe6AIM5ryq3aO9h1khOqb8Muwz45Z1o8lsGrBqtik6f', '2024-04-25 15:39:32', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `school_id`, `rank`, `password`, `profile_photo`) VALUES
(1, 'Eathorne', 'Banda', 'eathorne@yahoo.com', '2024-04-22 22:00:33', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 'male', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'super_admin', '$2y$10$pYVX5iPIuxTTgRFKrTXCFeBIEYe7HjMUZ2ECHNcGpxdzAcKgcYvy.', ''),
(2, 'Mary', 'Phiri', 'mary@yahoo.com', '2024-04-22 22:17:41', 'oao3tht79qs59ts0kCV9Zb4sl8612IhegWCXYHQclzgmRt8ReqQRWo2oxVUE', 'female', '', 'super_admin', '$2y$10$kLaJT17c4hXB3KrpLwgTUeTCAYe9cBVyIaKO/Yhw6/skEgGgmccNi', ''),
(3, 'John', 'Tembo', 'john@yahoo.com', '2024-04-26 20:35:37', 'xt1MdfCzM4rBJ8uJ5pJjqIQJ3yPh5camqK6V71jr8pi7XNfCtGwbMG02gHIX', 'male', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'admin', '$2y$10$.byCmJoPPQ3VjDKUtRZ8NO9EqvDCK14gUyizMvpSPY4hGnYZMHHqu', ''),
(4, 'Anna', 'Jones', 'anna@yahoo.com', '2024-04-26 20:55:00', '8u95jViTOJeawwLiKUroeKXjfdlBLbeMW1nXWYbZs6nHvheKJ52XQyJTJnwU', 'female', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'reception', '$2y$10$Uqn6fhvqUROq8q8wqFZUXOH3JqTIVQy92VjdBbd5DJmoFj9gDvS6G', ''),
(5, 'Vibe', 'Peters', 'vibe@yahoo.com', '2024-04-26 20:56:10', 'IZQ2SyeeRin58UkfdPQFxRlLO7GOUvBav4FwbWVVRa18AFmuF7qEvcj4q8G6', 'male', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'lecturer', '$2y$10$dHNSSFH/5mbqvV7TCqoMR.25tRhsd6wwFQPiCkqMqa7T8EI/dypOW', ''),
(6, 'Bob', 'Marley', 'bob@yahoo.com', '2024-04-27 22:05:21', '3KsXT2F3KcW2uiE3IS5wq5wCHcW0bdRo6zebOpgE4WTT8gdk6DBovMGCbZQc', 'male', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'student', '$2y$10$SR6Y1RwjqrG17J1nAKgJBuhXzv6oigJku7g8S.I6tHJkeV1w2mxK6', ''),
(7, 'Jane', 'Mandawa', 'jane@yahoo.com', '2024-04-27 22:10:25', 'oLp1kpDnu393jNpmQsAXpR8CYipPGykBzOZ2wXc4lpOUdn8HXK8mhytldJjc', 'female', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'student', '$2y$10$9/l3PobyNARmKiBci3gCl.PQJ3bglEzVAq8ww8S/wR9LCu9rWAYzK', ''),
(8, 'Maria', 'Jonnes', 'maria@yahoo.com', '2024-04-27 22:15:39', 'J4l3kwG8UqSnhC33bKTOZDclYLCjK1duv2UnclNM5vFcPIfMOMz8ozhr5QYT', 'female', 'll7OeAgsjEP6tCaWcdUASuTqesxo7h9m7R3dmehcB6ytWau8WKbohkSpHO1o', 'student', '$2y$10$8gu0HUB31WcyzZ91Vpa55OLXhMoPR5/78qCfp.eq8UiulYyW3yTWK', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
