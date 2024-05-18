-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 02:52 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `user_id`, `school_id`, `class_id`, `date`) VALUES
(1, 'Year 7A', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'ac2OfAXpV2HTsVOwWphDRYQlIBMeQH0LpNXbXiIvN5814Eg4KrPt8Lsa5En1', '2024-05-10 16:04:50'),
(2, 'Year 7B', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'f6SJFj7wfJWGKjsz6w4DKq72dkJCR5WqlHQ3d3QH5HwDXnH5EzWzyH7nN8gn', '2024-05-10 16:04:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_lecturers`
--

INSERT INTO `class_lecturers` (`id`, `user_id`, `class_id`, `disabled`, `date`, `school_id`, `updated_at`) VALUES
(1, 'IZQ2SyeeRin58UkfdPQFxRlLO7GOUvBav4FwbWVVRa18AFmuF7qEvcj4q8G6', 'f6SJFj7wfJWGKjsz6w4DKq72dkJCR5WqlHQ3d3QH5HwDXnH5EzWzyH7nN8gn', 0, '2024-05-10 16:07:22', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', NULL),
(2, 'rktJFRmv9WncpRIH4uwuRoz2ZhvBQ5anQEv5yLQULgmU2XnzxUM58wJ44g2h', 'f6SJFj7wfJWGKjsz6w4DKq72dkJCR5WqlHQ3d3QH5HwDXnH5EzWzyH7nN8gn', 0, '2024-05-13 14:37:48', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`id`, `user_id`, `class_id`, `disabled`, `date`, `school_id`, `updated_at`) VALUES
(1, 'J4l3kwG8UqSnhC33bKTOZDclYLCjK1duv2UnclNM5vFcPIfMOMz8ozhr5QYT', 'f6SJFj7wfJWGKjsz6w4DKq72dkJCR5WqlHQ3d3QH5HwDXnH5EzWzyH7nN8gn', 0, '2024-05-10 16:08:24', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', NULL),
(2, '3KsXT2F3KcW2uiE3IS5wq5wCHcW0bdRo6zebOpgE4WTT8gdk6DBovMGCbZQc', 'f6SJFj7wfJWGKjsz6w4DKq72dkJCR5WqlHQ3d3QH5HwDXnH5EzWzyH7nN8gn', 0, '2024-05-10 16:08:31', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', NULL),
(3, 'oLp1kpDnu393jNpmQsAXpR8CYipPGykBzOZ2wXc4lpOUdn8HXK8mhytldJjc', 'f6SJFj7wfJWGKjsz6w4DKq72dkJCR5WqlHQ3d3QH5HwDXnH5EzWzyH7nN8gn', 0, '2024-05-13 12:45:23', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school`, `school_id`, `date`, `user_id`, `status`) VALUES
(1, 'Grenville Schools - Primary', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', '2024-05-10 15:25:58', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 1),
(2, 'Grenville Schools - Secondary', '79bAeHYN3Ma3g6MwHdg5b06JRyoQbMsDHT4bdcXoe3oPfsClrFxryJ6DNEET', '2024-05-10 15:26:19', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 1),
(3, 'Grenville Schools - Preschool', 'yUkbpMqUDRkJLsK9R04xbJgO036XLI4zg71Eu0uSzoGHGdn53rJQXPUm4Qy2', '2024-05-11 23:17:53', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `test` varchar(100) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `date` datetime NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `class_id` (`class_id`),
  KEY `school_id` (`school_id`),
  KEY `user_id` (`user_id`),
  KEY `test` (`test`),
  KEY `date` (`date`),
  KEY `disabled` (`disabled`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_id`, `class_id`, `school_id`, `user_id`, `test`, `description`, `date`, `disabled`) VALUES
(3, 'OMTKd6kt4mtHQt1y3B5DevqyuXlBcXWTWtG1Zfg2SrS7NAqI0YyqGaqI0QDM', 'f6SJFj7wfJWGKjsz6w4DKq72dkJCR5WqlHQ3d3QH5HwDXnH5EzWzyH7nN8gn', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 'Year 7B End of Term', 'This test is very important for your grade point.', '2024-05-15 15:02:48', 0),
(4, 'coZGpYlfyyHHkbxjQTGjGAzxBC72RASURUzpobcnsNNNhag6jlzITIpIyZ0M', 'f6SJFj7wfJWGKjsz6w4DKq72dkJCR5WqlHQ3d3QH5HwDXnH5EzWzyH7nN8gn', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 'My Second Test', 'I love to test', '2024-05-16 12:03:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE IF NOT EXISTS `test_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` varchar(60) NOT NULL,
  `question` text NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `question_type` varchar(10) NOT NULL,
  `correct_answer` text DEFAULT NULL,
  `choices` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `test_type` (`question_type`),
  KEY `date` (`date`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`id`, `test_id`, `question`, `comment`, `image`, `question_type`, `correct_answer`, `choices`, `date`, `user_id`) VALUES
(1, 'coZGpYlfyyHHkbxjQTGjGAzxBC72RASURUzpobcnsNNNhag6jlzITIpIyZ0M', 'What is the process by which plants make energy from sunlight', '', NULL, 'subjective', NULL, NULL, '2024-05-17 11:41:22', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo'),
(2, 'coZGpYlfyyHHkbxjQTGjGAzxBC72RASURUzpobcnsNNNhag6jlzITIpIyZ0M', 'Which year did Zambia get independence?', '', NULL, 'subjective', NULL, NULL, '2024-05-17 11:49:54', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo'),
(3, 'coZGpYlfyyHHkbxjQTGjGAzxBC72RASURUzpobcnsNNNhag6jlzITIpIyZ0M', 'What age is puberty for men?', '', NULL, 'subjective', NULL, NULL, '2024-05-18 11:23:38', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo'),
(4, 'coZGpYlfyyHHkbxjQTGjGAzxBC72RASURUzpobcnsNNNhag6jlzITIpIyZ0M', 'Here is another question with a comment', 'This question is worth 1 point', NULL, 'subjective', NULL, NULL, '2024-05-18 13:00:22', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo'),
(5, 'coZGpYlfyyHHkbxjQTGjGAzxBC72RASURUzpobcnsNNNhag6jlzITIpIyZ0M', 'A new question with an image', '2 Points', 'uploads/depositphotos_88208814-stock-photo-business-strategy-banner-sign-concept.jpg', 'subjective', NULL, NULL, '2024-05-18 13:32:37', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo'),
(6, 'coZGpYlfyyHHkbxjQTGjGAzxBC72RASURUzpobcnsNNNhag6jlzITIpIyZ0M', 'Another test question with an image', '1 Point', 'uploads/1716036412_pngtree-creative-startup-banner-design-rocket-investment-piggy-bank-and-company-strategy-image_13926654.png', 'subjective', NULL, NULL, '2024-05-18 13:46:52', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo');

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
  `profile_image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`),
  KEY `date` (`date`),
  KEY `user_id` (`user_id`),
  KEY `school_id` (`school_id`),
  KEY `gender` (`gender`),
  KEY `rank` (`rank`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `school_id`, `rank`, `password`, `profile_image`) VALUES
(1, 'Eathorne', 'Banda', 'eathorne@yahoo.com', '2024-04-22 22:00:33', 'bdud3ULxTu4a8QFKYmAucbwH4KWZ0m4f6CxdEH7hcDclWgMXR52hSVOD0soo', 'male', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'super_admin', '$2y$10$pYVX5iPIuxTTgRFKrTXCFeBIEYe7HjMUZ2ECHNcGpxdzAcKgcYvy.', ''),
(2, 'Mary', 'Phiri', 'mary@yahoo.com', '2024-04-22 22:17:41', 'oao3tht79qs59ts0kCV9Zb4sl8612IhegWCXYHQclzgmRt8ReqQRWo2oxVUE', 'female', '', 'super_admin', '$2y$10$kLaJT17c4hXB3KrpLwgTUeTCAYe9cBVyIaKO/Yhw6/skEgGgmccNi', ''),
(3, 'John', 'Tembo', 'john@yahoo.com', '2024-04-26 20:35:37', 'xt1MdfCzM4rBJ8uJ5pJjqIQJ3yPh5camqK6V71jr8pi7XNfCtGwbMG02gHIX', 'male', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'admin', '$2y$10$.byCmJoPPQ3VjDKUtRZ8NO9EqvDCK14gUyizMvpSPY4hGnYZMHHqu', 'uploads/1727807829051559.jpg'),
(4, 'Anna', 'Jones', 'anna@yahoo.com', '2024-04-26 20:55:00', '8u95jViTOJeawwLiKUroeKXjfdlBLbeMW1nXWYbZs6nHvheKJ52XQyJTJnwU', 'female', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'reception', '$2y$10$Uqn6fhvqUROq8q8wqFZUXOH3JqTIVQy92VjdBbd5DJmoFj9gDvS6G', 'uploads/Elina Alfara.jpg'),
(5, 'Vibe', 'Peters', 'vibe@yahoo.com', '2024-04-26 20:56:10', 'IZQ2SyeeRin58UkfdPQFxRlLO7GOUvBav4FwbWVVRa18AFmuF7qEvcj4q8G6', 'male', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'lecturer', '$2y$10$dHNSSFH/5mbqvV7TCqoMR.25tRhsd6wwFQPiCkqMqa7T8EI/dypOW', 'uploads/1727811477760433.jpg'),
(6, 'Bob', 'Marley', 'bob@yahoo.com', '2024-04-27 22:05:21', '3KsXT2F3KcW2uiE3IS5wq5wCHcW0bdRo6zebOpgE4WTT8gdk6DBovMGCbZQc', 'male', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'student', '$2y$10$SR6Y1RwjqrG17J1nAKgJBuhXzv6oigJku7g8S.I6tHJkeV1w2mxK6', 'uploads/mark zukerberg.jpg'),
(7, 'Jane', 'Mandawa', 'jane@yahoo.com', '2024-04-27 22:10:25', 'oLp1kpDnu393jNpmQsAXpR8CYipPGykBzOZ2wXc4lpOUdn8HXK8mhytldJjc', 'female', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'student', '$2y$10$9/l3PobyNARmKiBci3gCl.PQJ3bglEzVAq8ww8S/wR9LCu9rWAYzK', 'uploads/OWAKAH SUCCESS CHISOM.jpg'),
(8, 'Amar', 'Aavani', 'amar@yahoo.com', '2024-04-27 22:15:39', 'J4l3kwG8UqSnhC33bKTOZDclYLCjK1duv2UnclNM5vFcPIfMOMz8ozhr5QYT', 'female', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'student', '$2y$10$8gu0HUB31WcyzZ91Vpa55OLXhMoPR5/78qCfp.eq8UiulYyW3yTWK', 'uploads/Amar Aavani.jpg'),
(9, 'Al-Moghro', 'Bilal', 'bilal@yahoo.com', '2024-05-07 21:52:22', 'K1ruJmb4bcwPbaocMWFNY8QjF0IY4BAxp83ZpvvB08ylSlu1G4AYP8F3ZoMr', 'male', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'student', '$2y$10$w62V.LLTIK80aplKsGQ/junotH9rsKqvqH99Gt4WVj73EEDK.qKe6', 'uploads/Al-Moghrobi Bilal.jpg'),
(10, 'Jeremiah', 'Haile', 'jeremiah@yahoo.com', '2024-05-07 21:53:00', '2OmMdNydqofm8S8jvF3pxZ2SQocFmBzuOAp7OZVCWPlhATYVEkPoF6MoGpSz', 'male', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'student', '$2y$10$jpNQ3y05yLhXHsqOqdn6lu207Xc0pWP7AzkpnY1zuhFJaTnWJ31Hq', 'uploads/JEREMIAH HAILE.jpg'),
(11, 'Ayooluwa', 'Alabi', 'ayooluwa@yahoo.com', '2024-05-07 21:56:01', 'gdEjqD7Qx153BMUEu2tWVsde90MBVsUjI2bZ9cTabDwqzfWmJrlGWN3RO1PD', 'male', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'student', '$2y$10$6zeBz1YpJPWi0algO5.QjO2gdRnvTHeBOP8PcKnVcHQeggkGrAypm', 'uploads/KINGSLEY JASON CHIBUIKEM.jpg'),
(12, 'Adenubi', 'Adefunto', 'adenubi@yahoo.com', '2024-05-09 10:41:18', 'rktJFRmv9WncpRIH4uwuRoz2ZhvBQ5anQEv5yLQULgmU2XnzxUM58wJ44g2h', 'male', 'lL0I5kALk046bESGuuvxuxi6fP2yjO3JJ9J53E2dSHLCocyzzuSkl02m9bcy', 'lecturer', '$2y$10$c91vg/lZbTPJlT.y6HU/1OFvSNVyvebErkl8CQ1.7Phrb6ztLA2pe', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
