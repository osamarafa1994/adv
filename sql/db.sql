-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 11:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr_ad` varchar(255) NOT NULL,
  `image_n` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `descr_ad`, `image_n`) VALUES
(1, 'description1', 'img1.jpeg'),
(2, 'description2', 'img2.jpeg'),
(3, 'this is a discr', '1433176788431.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `adv_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `adv_id`, `user_id`, `body`, `created_at`) VALUES
(9, 1, 1, 'yuiyitu', '2018-05-14 13:02:49'),
(10, 1, 1, 'dxydrytdey', '2018-05-14 13:02:49'),
(14, 2, 1, 'dgsdgstsetg', '2018-05-15 11:17:20'),
(15, 2, 1, 'ryeyerdyhd', '2018-05-15 11:19:50'),
(18, 2, 1, 'fhdfjgfj', '2018-05-15 11:27:31'),
(19, 1, 1, 'wetwesg', '2018-05-15 17:15:26'),
(20, 2, 2, 'gdsgdhfd', '2018-05-15 17:50:28'),
(21, 2, 2, 'dfsd', '2018-05-15 18:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'osmaarafa', 'osama_arafa', '4297f44b13955235245b2497399d7a93', 'osamaarafa96@yahoo.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
