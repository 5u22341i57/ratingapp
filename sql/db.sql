-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2019 at 07:04 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `idRatings` int(11) NOT NULL,
  `idUsersRatings` int(11) NOT NULL,
  `listNameRatings` tinytext NOT NULL,
  `itemRatings` tinytext,
  `ratingRatings` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`idRatings`, `idUsersRatings`, `listNameRatings`, `itemRatings`, `ratingRatings`) VALUES
(114, 2, 'Milk', 'Milk 1', 1),
(115, 2, 'Milk', 'Milk 2', 2),
(116, 2, 'Milk', 'Milk 6', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(2, 'test', 'test@test.com', '$2y$10$.nWwq8QMEjgfPsUeHl7XXOTf1fTrTl4QejFYVkWUzqDyaf9vKdkMy'),
(3, 'johnsmith', 'johnsmith@email.com', '$2y$10$qiGDJcnCtqSYAfklH6hLmeeckuTfTKI03KXB.FALETpooYyRbJw5a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`idRatings`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `idRatings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
