-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2018 at 07:28 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_count`
--

CREATE TABLE `app_count` (
  `count` varchar(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_count`
--

INSERT INTO `app_count` (`count`, `id`) VALUES
('89', 1),
('900', 2),
('8899', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(18, '1456218755'),
(11, '1457337056'),
(1, '1457430081'),
(1, '1457430089'),
(15, '1457430097'),
(1, '1457453870'),
(15, '1461143020'),
(13, '1481189416'),
(13, '1481189453'),
(2, '1481189795'),
(2, '1481189806');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `phone_number`, `password`, `salt`, `user_type`) VALUES
(16, 'xcadmin', 'vm@xctllp.com', '8129393265', '1ca69af7965ef974c19f310fbdbbf17975375312fbf12d0dd902d246cc4a440658b628c9c102967c72740e53d6ecd45d1ef6d542845c85a84c6a79466cb38e4c', '2cdc254765aca05eab0e84731ef68d26454dd13dd2e8ad5730150623cb028d5ca0c457ad6d6df59f0a2f893d31ec8caddb4738868ce1023134e442743f0f375f', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `newsmaker`
--

CREATE TABLE `newsmaker` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` varchar(30) NOT NULL,
  `snote` varchar(500) NOT NULL,
  `lnote` varchar(10000) NOT NULL,
  `pic` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsmaker`
--

INSERT INTO `newsmaker` (`id`, `title`, `date`, `snote`, `lnote`, `pic`) VALUES
(30, 'hash', 'hashhashhash', 'hashhashhashhashhash', 'Beirut, Lebanon - Every night, Muhammad Darwish goes to sleep under four blankets. It is his only hope of keeping warm. Like everyone in the besieged Syrian mountain town of Madaya, the 26-year-old has few other choices if he is to avoid freezing to death.\r\n\r\nThere is no fuel to warm his home or cook hot food.\r\n\r\n&#34;The weather is so cold because we are in the mountains,&#34; said Darwish, a dentistry student and one of the only medics left in Madaya. &#34;The temperature is -5C at night. We are afraid of dying from the cold.&#34;\r\n\r\nLast year, the Syrian mountain resort of Madaya drew the world&#39;s attention when medical workers published harrowing photos of its its malnourished residents showing wide-eyed babies without access to milk, and elderly men with cavernous rib cages. \r\n\r\nNow after Aleppo&#39;s fall, residents say they fear that their town, besieged by Syrian regime forces and its allies since July 2015, might face a similar fate.\r\n\r\n&#34;People are living in huge fear, because of the bombing, the heavy shelling and the snipers,&#34; Darwish told Al Jazeera from inside Madaya. &#34;People don&#39;t know anything about their future.&#34;', 'a:1:{i:0;s:58:\"uploads/news/3D-rendering-science-DNA-spiral_1920x1080.jpg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` varchar(30) NOT NULL,
  `snote` varchar(500) NOT NULL,
  `lnote` varchar(10000) NOT NULL,
  `lpic` varchar(10000) NOT NULL,
  `pic` varchar(10000) NOT NULL,
  `sales` varchar(11) NOT NULL,
  `rental` varchar(11) NOT NULL,
  `brand` varchar(1000) NOT NULL,
  `hot` varchar(11) NOT NULL,
  `featured` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `date`, `snote`, `lnote`, `lpic`, `pic`, `sales`, `rental`, `brand`, `hot`, `featured`) VALUES
(27, 'vvvv', 'vvvvv ', 'vvvv', 'vvvv', 'a:1:{i:0;s:44:\"uploads/products/thumbnail/product_img_1.jpg\";}', 'a:1:{i:0;s:34:\"uploads/products/product_img_1.jpg\";}', '1', '0', 'vvvv', '0', '0'),
(28, 'bgbgbgbg', 'bg', 'bgbgbgbgbg', 'bgbgbgbgbg', 'a:1:{i:0;s:33:\"uploads/products/thumbnail/08.jpg\";}', 'a:1:{i:0;s:62:\"uploads/products/3D-rendering-science-DNA-spiral_1920x1080.jpg\";}', '1', '0', 'nnn', '1', '0'),
(29, 'vvvvtttttttttt', 'hhhhh', 'canon', 'hhhhhhhhhhh', 'a:1:{i:0;s:44:\"uploads/products/thumbnail/product_img_1.jpg\";}', 'a:1:{i:0;s:62:\"uploads/products/3D-rendering-science-DNA-spiral_1920x1080.jpg\";}', '0', '1', 'hhhh', '0', '0'),
(30, 'bbbbbbbb', 'bbbb', 'bbyyyy', 'hhhhhh canon', 'a:1:{i:0;s:33:\"uploads/products/thumbnail/08.jpg\";}', 'a:1:{i:0;s:62:\"uploads/products/3D-rendering-science-DNA-spiral_1920x1080.jpg\";}', '0', '0', 'vvvv', '1', '0'),
(31, 'Printers', 'Printers', 'PrintersPrinters', 'PrintersPrinters', 'a:1:{i:0;s:44:\"uploads/products/thumbnail/product_img_1.jpg\";}', 'a:1:{i:0;s:62:\"uploads/products/3D-rendering-science-DNA-spiral_1920x1080.jpg\";}', '0', '1', 'hp', '1', '1'),
(32, 'CANON | PRINTER', '6TH JUly 2016', 'VVVVVAVVVVVA', 'VVVVVAVV  VVVAVVVVVAVVVVVA', 'a:1:{i:0;s:44:\"uploads/products/thumbnail/product_img_1.jpg\";}', 'a:1:{i:0;s:62:\"uploads/products/3D-rendering-science-DNA-spiral_1920x1080.jpg\";}', '1', '0', 'HP', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `customer` varchar(300) NOT NULL,
  `testimonial` varchar(600) NOT NULL,
  `subtitle` varchar(1000) NOT NULL,
  `pic` varchar(10000) NOT NULL,
  `time_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `customer`, `testimonial`, `subtitle`, `pic`, `time_at`) VALUES
(27, 'vimal', 'hashhashhashhashhashhashhash', 'vimalvimal', 'a:1:{i:0;s:41:\"uploads/testimonial/testimonial_img_1.jpg\";}', '2016-12-15 17:01:23'),
(28, 'vimalvimal', 'vimalvimalvimalvimalvimalvimal', 'vimalvimalvimalvimal', 'a:1:{i:0;s:26:\"uploads/testimonial/08.jpg\";}', '2016-12-15 17:01:47'),
(29, 'vimalvimalvimalvimalvimal', 'vimalvimalvimalvimalvimalvimalvimalvimalvimal', 'vimalvimalvimalvimalvimalvimal', 'a:1:{i:0;s:65:\"uploads/testimonial/3D-rendering-science-DNA-spiral_1920x1080.jpg\";}', '2016-12-15 17:02:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_count`
--
ALTER TABLE `app_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsmaker`
--
ALTER TABLE `newsmaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_count`
--
ALTER TABLE `app_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `newsmaker`
--
ALTER TABLE `newsmaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
