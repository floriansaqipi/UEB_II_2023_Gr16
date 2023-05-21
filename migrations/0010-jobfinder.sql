-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 21, 2023 at 07:52 PM
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
-- Database: `jobfinder`
--

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
(1, 5, 3, 'This is the first comment very interestin i know', 1, '2023-05-13'),
(2, 3, 3, 'Hey this i kinda cool', 1, '2023-05-13'),
(3, 3, 3, 'Wow this comment works', 0, '2023-05-13'),
(14, 3, 4, 'asdfasdfasf', 1, '2023-05-14'),
(15, 3, 8, 'I like this a lot tbh', 1, '2023-05-17'),
(16, 3, 8, 'i like this too', 1, '2023-05-17'),
(17, 28, 8, 'A cool comment', 0, '2023-05-20');

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
(1, 'Kosovo', 'XK', 5),
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
(3, 1, 3, 'assa', '2023-05-13', 'pexels-pixabay-268533.jpg', 'tha', 'this, cool, is, u , no', 1),
(5, 4, 3, 'COOL stuff', '2023-05-13', 'pexels-pixabay-268533.jpg', 'This is nice inst', 'cool, stuff', 1),
(8, 4, 4, 'COOL stuff', '2023-05-13', 'pexels-pixabay-268533.jpg', 'This is a post innit', 'javascript, course, class, great', 1),
(26, 2, 8, 'COOL', '2023-05-18', 'default_post.jpg', 'Cool post i think', '', 1),
(27, 3, 8, 'This is a true post', '2023-05-19', 'pexels-pixabay-268533.jpg', 'This is lovely', 'tree, summer, night, purple, nature', 1),
(28, 1, 8, 'This is a test', '2023-05-19', 'pexels-pixabay-268533.jpg', 'asdfasdfasda', 'adfasdfasdf', 1),
(30, 1, 8, 'z\\c\\c\\zcdfasdfasdfasdfdasdfsfd', '2023-05-21', 'Capi.PNG', 'asdfasdfasfasdfasfasf', 'cool, nice, smth', 1),
(31, 1, 8, 'WOW', '2023-05-21', 'default_post.jpg', 'asfasfasf', 'asfasdf', 0);

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
(6, 'Video');

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
(3, 'test', 'test1234', 'test', 'test', 'test@test.com', 'profile.jpg', 'cover_default.jpg', 0, 'web dev', 'also like programming', '', 0),
(4, 'test1', 'test1234', 'test', 'test', 'test1@test.com', 'profile.jpg', 'cover.jpg', 1, 'web', 'i like programming', '', 0),
(5, 'ttest', '$2y$10$q1ylm/CYniOy9nOQR6pseu0W9/jJo3Skqr94nnaCMc05m9XsEY0F.', 'test', 'test1', 'erzaamerovci@gmail.com', 'profile.jpg', 'cover_default.jpg', 0, '', '', '9ee57252c00c0d1c58dbdbab90546d03', 1),
(8, 'florian', '$2y$10$akFp9YLR5VtcCg.ohPhGF.8ehZpBqdDuu.DK9vlRqbnKoEg5IMGMa', 'Florian', 'Saqipi', 'floriansaqipi@gmail.com', 'default.jpg', 'cover_default.jpg', 1, 'Hi im coding here', 'This is my about for this project i have started pretty cool huh', '90192ce31284f4aa9f29f94429dbdb2d', 1);

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
(1, 'npsu3hb2cqd07u977elbd51vbe', 1684691339);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `country_logins`
--
ALTER TABLE `country_logins`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
