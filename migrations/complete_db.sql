-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 11, 2023 at 07:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'javascriptaa'),
(3, 'php'),
(4, 'javas'),
(5, 'test'),
(7, 'boostrap'),
(8, 'OOP'),
(9, 'procedural PHPs'),
(15, 'HTML5');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(2, 1, 'Cindy', 'cindy@email.com', 'Hey you brock', 'approved', '2023-05-12'),
(3, 4, 'Sanra', 'sfas@asfasf', 'HEY im a florian', 'approved', '2023-05-12'),
(4, 1, 'FLoriani', 'asfasf@asfasf', 'This is some cute stuff init mate', 'approved', '2023-05-13'),
(5, 1, 'HEY', 'hey@hey', 'heyheyheyhehyehye', 'unapproved', '2023-05-13'),
(6, 1, 'waline', 'safs@asfasf', 'hey i am waline', 'unapproved', '2023-05-13'),
(7, 1, 'Florian', 'flor@flro.com', 'Just a comment', 'unapproved', '2023-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 2, 'MY project is straight fire brosa', 'John Doe', '2023-05-14', 'nature.png', 'wow I really really like this', 'edwin, javascript, php', 3, 'published'),
(4, 5, 'Javascript', 'Florian Saqipis', '2023-05-12', 'pexels-pixabay-268533.jpg', 'this is a cool project         ', 'javascript, course, class, great', 4, 'published'),
(6, 5, 'COOL', 'me lol', '2023-05-12', 'pexels-pixabay-268533.jpg', '         lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'this, cool, is, u , no', 4, 'draft'),
(7, 5, 'Javascriptasdas', 'FLorian', '2023-05-12', 'pexels-pixabay-268533.jpg', 'loremloremloremloremloremloremloremloremloremloremloremlorem         ', 'cool, stuff', 4, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(2, 'peterson', 'peter123', 'William', 'Petersons', 'peterson@gmail.com', '', 'admin', ''),
(3, 'floraini', '123', 'florian', 'Flori', 'asfas@asfas.com', '', 'subscriber', ''),
(4, 'PETET', '123', 'quenchi', 'peterson', 'pete@gmail.com', '', 'subscriber', ''),
(5, 'example', '123', 'Example', 'example', 'example@asdasd.com', '', 'subscriber', ''),
(6, 'asdadasd', 'adsasd', 'Flor', 'sdasda', 'dasda@asdad.com', '', 'subscriber', '$2y$10$iusesomecrazystring22'),
(7, 'asdasda', 'ssfsdf', '', '', 'SFSFSSD@sfsd', '', 'subscriber', '$2y$10$iusesomecrazystring22'),
(8, 'asdasda', 'ssfsdf', '', '', 'SFSFSSD@sfsd', '', 'subscriber', '$2y$10$iusesomecrazystring22'),
(9, 'Flori', '*0', '', '', 'fsfs@fasds.com', '', 'subscriber', '$2y$10$iusesomecrazystring22'),
(10, 'aasfas', '*0', '', '', 'SDFASF@SFS', '', 'subscriber', '$2y$10$iusesomecrazystring22'),
(11, 'aaa', '*0', '', '', 'aaa@aasdda.com', '', 'subscriber', '$2y$10$iusesomecrazystring22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Database: `db`
--
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Table structure for table `studentet`
--

CREATE TABLE `studentet` (
  `Id` int(11) DEFAULT NULL,
  `Emri` varchar(25) DEFAULT NULL,
  `Mbiemri` varchar(25) DEFAULT NULL,
  `Data_reg` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentet`
--

INSERT INTO `studentet` (`Id`, `Emri`, `Mbiemri`, `Data_reg`) VALUES
(11, 'test', 'test', '2023-04-12'),
(21, 'florian', 'saqipi', '2023-04-12');
--
-- Database: `dbtest`
--
CREATE DATABASE IF NOT EXISTS `dbtest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbtest`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Web'),
(2, 'Web'),
(3, 'diqka'),
(4, 'edhe'),
(5, 'diqka'),
(6, 'edhe'),
(7, 'diqka'),
(8, 'edhe');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `emri`) VALUES
(1, 'Fistek'),
(2, 'Florian');

-- --------------------------------------------------------

--
-- Table structure for table `profesoret`
--

CREATE TABLE `profesoret` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profesoret`
--

INSERT INTO `profesoret` (`id`, `emri`, `mbiemri`, `email`) VALUES
(1, 'filan', 'fisteku', 'emal2@sfda.com'),
(2, 'filan', 'fisteku', 'emal2@sfda.com'),
(3, 'filan', 'fisteku', 'emal2@sfda.com'),
(4, 'filan', 'fisteku', 'emal2@sfda.com'),
(5, 'filan', 'fisteku', 'emal2@sfda.com'),
(6, 'filan', 'fisteku', 'emal2@sfda.com'),
(7, 'filan', 'fisteku', 'emal2@sfda.com'),
(8, 'filan', 'fisteku', 'emal2@sfda.com'),
(9, 'filan', 'fisteku', 'emal2@sfda.com'),
(10, 'filan', 'fisteku', 'emal2@sfda.com'),
(11, 'filan', 'fisteku', 'emal2@sfda.com'),
(12, 'filan', 'fisteku', 'emal2@sfda.com'),
(13, 'filan', 'fisteku', 'emal2@sfda.com'),
(14, 'filan', 'fisteku', 'emal2@sfda.com'),
(15, 'filan', 'fisteku', 'emal2@sfda.com'),
(16, 'filan', 'fisteku', 'emal2@sfda.com'),
(17, 'filan', 'fisteku', 'emal2@sfda.com'),
(18, 'filan', 'fisteku', 'emal2@sfda.com'),
(19, 'filan', 'fisteku', 'emal2@sfda.com'),
(20, 'filan', 'fisteku', 'emal2@sfda.com'),
(21, 'filan', 'fisteku', 'emal2@sfda.com'),
(22, 'filan', 'fisteku', 'emal2@sfda.com'),
(23, 'filan', 'fisteku', 'emal2@sfda.com'),
(24, 'filan', 'fisteku', 'emal2@sfda.com'),
(25, 'filan', 'fisteku', 'emal2@sfda.com'),
(26, 'filan', 'fisteku', 'emal2@sfda.com'),
(27, 'filan', 'fisteku', 'emal2@sfda.com'),
(28, 'filan', 'fisteku', 'emal2@sfda.com'),
(29, 'filan', 'fisteku', 'emal2@sfda.com'),
(30, 'filan', 'fisteku', 'emal2@sfda.com'),
(31, 'filan', 'fisteku', 'emal2@sfda.com'),
(32, 'filan', 'fisteku', 'emal2@sfda.com'),
(33, 'filan', 'fisteku', 'emal2@sfda.com'),
(34, 'filan', 'fisteku', 'emal2@sfda.com'),
(35, 'filan', 'fisteku', 'emal2@sfda.com'),
(36, 'filan', 'fisteku', 'emal2@sfda.com'),
(37, 'filan', 'fisteku', 'emal2@sfda.com'),
(38, 'filan', 'fisteku', 'emal2@sfda.com'),
(39, 'filan', 'fisteku', 'emal2@sfda.com'),
(40, 'filan', 'fisteku', 'emal2@sfda.com'),
(41, 'filan', 'fisteku', 'emal2@sfda.com'),
(42, 'filan', 'fisteku', 'emal2@sfda.com'),
(43, 'filan', 'fisteku', 'emal2@sfda.com'),
(44, 'filan', 'fisteku', 'emal2@sfda.com'),
(45, 'filan', 'fisteku', 'emal2@sfda.com'),
(46, 'filan', 'fisteku', 'emal2@sfda.com'),
(47, 'filan', 'fisteku', 'emal2@sfda.com'),
(48, 'filan', 'fisteku', 'emal2@sfda.com'),
(49, 'filan', 'fisteku', 'emal2@sfda.com'),
(50, 'filan', 'fisteku', 'emal2@sfda.com'),
(51, 'filan', 'fisteku', 'emal2@sfda.com'),
(52, 'filan', 'fisteku', 'emal2@sfda.com'),
(53, 'filan', 'fisteku', 'emal2@sfda.com'),
(54, 'filan', 'fisteku', 'emal2@sfda.com'),
(55, 'filan', 'fisteku', 'emal2@sfda.com'),
(56, 'filan', 'fisteku', 'emal2@sfda.com'),
(57, 'filan', 'fisteku', 'emal2@sfda.com'),
(58, 'filan', 'fisteku', 'emal2@sfda.com'),
(59, 'filan', 'fisteku', 'emal2@sfda.com'),
(60, 'filan', 'fisteku', 'emal2@sfda.com'),
(61, 'filan', 'fisteku', 'emal2@sfda.com'),
(62, 'filan', 'fisteku', 'emal2@sfda.com'),
(63, 'filan', 'fisteku', 'emal2@sfda.com'),
(64, 'filan', 'fisteku', 'emal2@sfda.com'),
(65, 'filan', 'fisteku', 'emal2@sfda.com'),
(66, 'filan', 'fisteku', 'emal2@sfda.com'),
(67, 'filan', 'fisteku', 'emal2@sfda.com'),
(68, 'filan', 'fisteku', 'emal2@sfda.com'),
(69, 'filan', 'fisteku', 'emal2@sfda.com'),
(70, 'filan', 'fisteku', 'emal2@sfda.com'),
(71, 'filan', 'fisteku', 'emal2@sfda.com'),
(72, 'filan', 'fisteku', 'emal2@sfda.com'),
(73, 'filan', 'fisteku', 'emal2@sfda.com'),
(74, 'filan', 'fisteku', 'emal2@sfda.com'),
(75, 'filan', 'fisteku', 'emal2@sfda.com'),
(76, 'filan', 'fisteku', 'emal2@sfda.com'),
(77, 'filan', 'fisteku', 'emal2@sfda.com'),
(78, 'filan', 'fisteku', 'emal2@sfda.com'),
(79, 'filan', 'fisteku', 'emal2@sfda.com'),
(80, 'filan', 'fisteku', 'emal2@sfda.com'),
(81, 'filan', 'fisteku', 'emal2@sfda.com'),
(82, 'filan', 'fisteku', 'emal2@sfda.com'),
(83, 'filan', 'fisteku', 'emal2@sfda.com'),
(84, 'filan', 'fisteku', 'emal2@sfda.com'),
(85, 'filan', 'fisteku', 'emal2@sfda.com'),
(86, 'filan', 'fisteku', 'emal2@sfda.com'),
(87, 'filan', 'fisteku', 'emal2@sfda.com'),
(88, 'filan', 'fisteku', 'emal2@sfda.com'),
(89, 'filan', 'fisteku', 'emal2@sfda.com'),
(90, 'filan', 'fisteku', 'emal2@sfda.com'),
(91, 'filan', 'fisteku', 'emal2@sfda.com'),
(92, 'filan', 'fisteku', 'emal2@sfda.com'),
(93, 'filan', 'fisteku', 'emal2@sfda.com'),
(94, 'filan', 'fisteku', 'emal2@sfda.com'),
(95, 'filan', 'fisteku', 'emal2@sfda.com'),
(96, 'filan', 'fisteku', 'emal2@sfda.com'),
(97, 'filan', 'fisteku', 'emal2@sfda.com'),
(98, 'filan', 'fisteku', 'emal2@sfda.com'),
(99, 'filan', 'fisteku', 'emal2@sfda.com'),
(100, 'filan', 'fisteku', 'emal2@sfda.com'),
(101, 'filan', 'fisteku', 'emal2@sfda.com'),
(102, 'filan', 'fisteku', 'emal2@sfda.com'),
(103, 'filan', 'fisteku', 'emal2@sfda.com'),
(104, 'filan', 'fisteku', 'emal2@sfda.com'),
(105, 'filan', 'fisteku', 'emal2@sfda.com'),
(106, 'filan', 'fisteku', 'emal2@sfda.com'),
(107, 'filan', 'fisteku', 'emal2@sfda.com'),
(108, 'filan', 'fisteku', 'emal2@sfda.com'),
(109, 'filan', 'fisteku', 'emal2@sfda.com'),
(110, 'filan', 'fisteku', 'emal2@sfda.com'),
(111, 'filan', 'fisteku', 'emal2@sfda.com'),
(112, 'filan', 'fisteku', 'emal2@sfda.com'),
(113, 'filan', 'fisteku', 'emal2@sfda.com'),
(114, 'filan', 'fisteku', 'emal2@sfda.com'),
(115, 'filan', 'fisteku', 'emal2@sfda.com'),
(116, 'filan', 'fisteku', 'emal2@sfda.com'),
(117, 'filan', 'fisteku', 'emal2@sfda.com'),
(118, 'filan', 'fisteku', 'emal2@sfda.com'),
(119, 'filan', 'fisteku', 'emal2@sfda.com'),
(120, 'filan', 'fisteku', 'emal2@sfda.com'),
(121, 'filan', 'fisteku', 'emal2@sfda.com'),
(122, 'filan', 'fisteku', 'emal2@sfda.com'),
(123, 'filan', 'fisteku', 'emal2@sfda.com'),
(124, 'filan', 'fisteku', 'emal2@sfda.com'),
(125, 'filan', 'fisteku', 'emal2@sfda.com'),
(126, 'filan', 'fisteku', 'emal2@sfda.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesoret`
--
ALTER TABLE `profesoret`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profesoret`
--
ALTER TABLE `profesoret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- Database: `demos`
--
CREATE DATABASE IF NOT EXISTS `demos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `demos`;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Database: `jobfinder`
--
CREATE DATABASE IF NOT EXISTS `jobfinder` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jobfinder`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `content`, `is_approved`, `date`) VALUES
(49, 33, 8, 'wow web is cool', 1, '2023-05-23'),
(50, 33, 8, 'This is pretty nice', 0, '2023-05-23'),
(52, 32, 8, 'This is pretty innovating!', 1, '2023-05-23'),
(55, 43, 23, 'Wow this is a great sunset', 1, '2023-05-23'),
(59, 33, 8, 'Those new features are really cool!', 1, '2023-07-02'),
(61, 32, 8, 'This is a really nice post!', 1, '2023-07-02'),
(63, 32, 8, 'this is a cool comment', 1, '2023-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `country_logins`
--

CREATE TABLE `country_logins` (
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(2) NOT NULL,
  `login_counter` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country_logins`
--

INSERT INTO `country_logins` (`country_id`, `name`, `code`, `login_counter`) VALUES
(1, 'Kosovo', 'XK', 47),
(2, 'Bulgaria', 'BG', 3),
(3, 'Netherlands', 'NL', 1),
(4, 'Japan', 'JP', 2),
(5, 'United States', 'US', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `category_id`, `user_id`, `title`, `date`, `image`, `content`, `tags`, `is_published`) VALUES
(32, 20, 8, 'What Data Tech Companies Collect', '2023-05-22', 'blog_images2Fwhat-data-do-the-five-largest-tech-companies-colle-750x420.jpg', 'Big data brings big privacy issues and it is wise to understand what data is collected from you when you browse the internet. Baynote has created an infographic that shows the vast amounts of different types of data that is collected by the five largest tech companies in the world: Google, Apple, Facebook, Yahoo! and Amazon. ', 'data, big data, tech, infographic, info, top', 1),
(33, 20, 8, 'The Power of Web 3', '2023-05-22', 'Untitled-940-×-600px-26.png', 'Are you tired of being at the mercy of big tech companies and their endless stream of privacy violations and data breaches? Enter Web 3, the decentralised internet that aims to put the power back in the hands of users. In this blog, we’ll dive into what Web 3 is, its benefits,  the challenges it faces, and what a Web 3 future looks like.', 'web, web-3, ai, chat', 1),
(34, 20, 8, 'Consumers post data leak', '2023-05-22', 'download.jpeg', 'F5’s latest Curve of Convenience report shows that in the event of a data leak a majority of Australia/NZ consumers are unwilling to continue buying from the company involved (71%).', 'leak, data, encryption, security, block, chain', 1),
(35, 20, 8, 'Meta $1.3 billion fine', '2023-05-22', 'hero-image.jpg', 'The issue revolves around the way Facebook handled European user data. According to Ireland\'s Data Protection Commission (DPC), which announced the results(opens in a new tab) of its inquiry into Meta Ireland on Monday, Facebook\'s transferring of user data from Europe to the U.S. was in breach of Europe\'s General Data Protection Regulation (GDPR) rules.', 'meta, facebook, data, fine, issue, protection', 1),
(36, 20, 8, 'OpenAI international regulatory', '2023-05-22', 'openai-getty.jpg', 'AI is developing rapidly enough and the dangers it may pose are clear enough that OpenAI’s leadership believes that the world needs an international regulatory body akin to that governing nuclear power — and fast. But not too fast.', 'ai, openai, chat, gpt, chatgpt, chat gpt, regulatory, law', 1),
(37, 20, 8, 'Fake Pentagon attack', '2023-05-22', 'default_post.jpg', 'Surprising literally no one, the combination of paid blue checks and generative AI makes it all too easy to spread misinformation. On Monday morning, a seemingly AI-generated image of an explosion at the Pentagon circulated around the internet, even though the event didn’t actually happen.', 'data, security, encryption, attack, protection', 1),
(38, 20, 8, 'SkyFi fresh satellite imagery ', '2023-05-22', '9862750B-A82F-449E-B7CB-07D00854E2F6.jpg', 'Commercial Earth-observation companies collect an unprecedented volume of images and data every single day, but purchasing even a single satellite image can be cumbersome and time-intensive. SkyFi, a two-year-old startup, is looking to change that with an app and API that makes ordering a satellite image as easy as a click of a few buttons on a smartphone or computer.', 'earth, observation, satellite, image, quality', 0),
(40, 1, 8, 'Beatiful nature', '2023-05-22', 'wide-angle-shot-single-tree-growing-clouded-sky-during-sunset-surrounded-by-grass_181624-22807.jpg', 'Photo wide angle shot of a single tree growing under a clouded sky during a sunset surrounded by grass', 'nature, photo, tree, grass, sky', 1),
(41, 1, 8, 'Listening to Nature !!', '2023-05-23', 'gettyimages-168346757_web.jpg', 'Sounds like birdsong and flowing water may alleviate stress, help lower blood pressure and lead to feelings of tranquility', 'water, forest, moss, waterfall', 0),
(43, 1, 23, 'Gorgeous sunset', '2023-05-23', 'tree-736885_1280.jpg', 'This sunset is magnificient I really enjoyed it', 'tree, sun, sunset, nature, orange', 1),
(44, 1, 23, 'Rainbow', '2023-05-23', 'landscape-nature-mountan-alps-rainbow-76824355.jpg', 'This is an amazing rainbow I captured the other day', 'mountain, rainbow, sun, daylight', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`category_id`, `name`) VALUES
(1, 'Nature \r\n'),
(2, 'Lifestyle'),
(3, 'Creative'),
(4, 'Unique'),
(5, 'Music'),
(6, 'Video'),
(20, 'Tech');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` text NOT NULL DEFAULT 'default.jpg',
  `cover_image` text NOT NULL DEFAULT 'cover_default.jpg',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `bio` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `image`, `cover_image`, `is_admin`, `bio`, `about`, `verify_token`, `verify_status`) VALUES
(8, 'florian', '$2y$10$akFp9YLR5VtcCg.ohPhGF.8ehZpBqdDuu.DK9vlRqbnKoEg5IMGMa', 'Florian', 'Saqipi', 'floriansaqipi@gmail.com', 'aa.png', 'istockphoto-1208738316-170667a.jpg', 1, 'Hi im coding here', 'This is my about for this project i have started pretty cool huh', '90192ce31284f4aa9f29f94429dbdb2d', 1),
(23, 'filanii', '$2y$10$nNsdfdXAkS.jwUrPE0hLM.Jqxfw2ZJj4pq09ABp7kipXgqPdXYiRy', 'Filan', 'Fisteku', 'floorii123321fasdfasdf@gmail.com', '5426a51fe15b4bb1dca378b3f6963d30.jpg', 'photo-1586672806791-3a67d24186c0.jpeg', 0, 'Web Developer', 'I really like working with php', '7939a7b8c2094420234a0efb02d0f6ca', 1),
(26, 'fisteku', '$2y$10$8cGqwp1/iIkUptGX2pC.5.R1gLMeWfI7CvLJkEE7B9nsXCNlBVfLq', 'Filan', 'Fisteku', 'floorii123321@gmail.com', 'default.jpg', 'cover_default.jpg', 0, '', '', '965a31bca6238eaf7fe4746010ffa60d', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'npsu3hb2cqd07u977elbd51vbe', 1684703026),
(2, '1687lnlr5i0usoqeg707jkbn18', 1684798035),
(3, '48uaobmecbosgefsg022es6vqn', 1684851381),
(4, 'pju8obu4snbaihrp2jnr5tc012', 1684859481),
(5, 'j40l1vs5koj55js8aa9uq7jgeu', 1687349807),
(6, 'd8lihpl0lmhofp7dpvs4gprpal', 1688254222),
(7, 'lp7fkpl6n0d921d0b62rmhv54l', 1688299923),
(8, '4mocsd3kkh6u9jlgs93lgp4sun', 1688341480),
(9, 'iavfqisif5lbrjj2klvv3jlhcc', 1688340177),
(10, '83jlppuraljqbql8mgopeo5dn1', 1688331021),
(11, 'nrfb9d26p6e8helj40ograrsd0', 1688471507);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `post_user_id` (`user_id`);

--
-- Indexes for table `country_logins`
--
ALTER TABLE `country_logins`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `country_logins`
--
ALTER TABLE `country_logins`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`category_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `loginapp`
--
CREATE DATABASE IF NOT EXISTS `loginapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `loginapp`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'florian', 'flori'),
(2, 'xmen', 'test'),
(3, 'James', 'Het'),
(5, 'Data', 'aadss'),
(7, 'FLorian\'s', 'are great'),
(8, 'florian', 'asdfasfsfasdf'),
(9, 'wow', '$2y$10$iusesomecrazystrings2uZFriV23PcGPOV5k/LrUqQHlCqST1DE.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"angular_direct\":\"direct\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"dbtest\",\"table\":\"categories\"},{\"db\":\"dbtest\",\"table\":\"profesoret\"},{\"db\":\"dbtest\",\"table\":\"login\"},{\"db\":\"jobfinder\",\"table\":\"comments\"},{\"db\":\"jobfinder\",\"table\":\"posts\"},{\"db\":\"jobfinder\",\"table\":\"users_online\"},{\"db\":\"jobfinder\",\"table\":\"users\"},{\"db\":\"jobfinder\",\"table\":\"country_logins\"},{\"db\":\"jobfinder\",\"table\":\"post_categories\"},{\"db\":\"cms\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'jobfinder', 'users', '{\"sorted_col\":\"`users`.`image` ASC\"}', '2023-05-16 23:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-11-11 18:26:03', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
