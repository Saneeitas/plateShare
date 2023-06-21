-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 10:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plateShare`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Entertainment'),
(5, 'Politics'),
(7, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `recipe_id` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `message`, `timestamp`, `status`, `recipe_id`) VALUES
(18, 8, 'Asake!! on fire', '2022-11-30 23:23:59', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `ingredient` text DEFAULT NULL,
  `direction` text DEFAULT NULL,
  `cook_time` varchar(1000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `yield` varchar(1000) DEFAULT NULL,
  `category_id` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `ingredient`,`direction`, `cook_time`, `status`, `yield`, `category_id`, `image`, `timestamp`) VALUES
(4, 'Drama as Adeleke Denies Sacking 12 Workers, Dethroning Ex-APC Chairman, 2 Other Monarchs', 'Osogbo, Osun - Governor Ademola Adeleke of Osun state has denied the report that he sacked 12,000 workers in the state and dethroned 3 monarchs, including Owa of Igbaji, Gbeoyega Famoodun, the immediate past chairman of the All Progressives Congress (APC) in the state.\r\nRecall that Adeleke on his first day in office as governor signed executive orders 3, 4, and 5, which cancelled all employments and appointments by the immediate past governor, Gboyega Oyetola dated back to July 17 till Monday, November 28, when he resumed office.', 1, '5', 'uploads/politics1.jpg', '2022-11-30 11:56:33.390191'),
(5, 'Buhari Issues New Advisory, Speaks on Inflow of Weapons into Africa, Nigeria from Russia-Ukraine War ', 'President Muhammadu Buhari has warned that weapons from the raging war between Russia and Ukraine are now finding their way into the Lake Chad Basin region. Daily Trust reports that the president while speaking at the 16th Summit of the Heads of State and Government of the Lake Chad Basin Commission (LCBC), held at the Conference Hall of the Presidential Villa, said all hands must be on deck to fight the proliferation of these weapons into the region.\r\nHe noted that the proliferation of small arms and light weapons called for a reawakening of the border security of the countries within the Lake Chad region - the border area for Nigeria, Cameroon, Chad and Niger Republic.', 1, '5', 'uploads/politics2.jpg', '2022-11-30 12:03:14.375162'),
(6, 'New African Storytellers Emerge as MultiChoice Talent Factory Graduates Class of 2022', 'The African continent is rich in history and heritage. Its stories have and are being told in different lights by several storytellers. However, African stories are better told by Africans through the eyes of Africans. On October 15, the MultiChoice Talent Factory (MTF) academy graduated its third set of young, vibrant filmmakers at a ceremony in Lagos. These young filmmakers are the Class of 2022 of the renowned MultiChoice Talent Factory Academy. The MTF is MultiChoices Shared Value Initiative aimed at training young filmmakers in the business and art of filmmaking.', 1, '1', 'uploads/ent.jpg', '2022-11-30 12:10:45.417105'),
(7, 'Asake Drops Epic Video for Hit Song Organise, Fans React to the Moment Someone Was Slapped.', 'YBNL music star Asake is currently trending on social media after the visual for his hit song Organise was finally released on Tuesday, November 29. Like many of the videos directed by TG Omori, the video feature many people, with the main setting being an examination hall.', 1, '1', 'uploads/ent2.jpg', '2022-11-30 12:12:55.152214'),
(8, 'How Nigerias Debt Ballooned 800% to N42.82 Trillion in Two Decades.', 'Within two weeks of July 2021, the Nigerian Senate approved three different loans by President Muhammadu Buhari.        \r\nThe Senate approved a loan request of N2.4 trillion request from Buhari on July 7, 2021, about $6 billion at the then prevailing exchange rate and another $8.3 billion and 490 million euros from Buhari. The Debt Management Office (DMO) had said then that the borrowing was to finance the 2021 budget. By March 2021, Nigeria public debt had hit N33.1 trillion, about $87.24 billion.', 1, '7', 'uploads/bus.PNG', '2022-11-30 23:18:04.731607');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `role` varchar(1000) DEFAULT 'user',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `timestamp`) VALUES
(9, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '2022-10-25 19:50:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
