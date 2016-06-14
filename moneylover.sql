-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2016 at 02:18 AM
-- Server version: 10.1.10-MariaDB-log
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneylover`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `wallet_id`, `user_id`, `name`, `type`, `parent_id`, `picture`, `created`, `updated`) VALUES
(1, 0, 0, 'Food', 0, 0, '', '2016-05-02 10:26:08', '2016-05-02 10:26:08'),
(2, 0, 0, 'Transport', 0, 0, '', '2016-05-02 10:26:28', '2016-05-02 10:26:28'),
(3, 0, 0, 'Love', 0, 0, '', '2016-05-03 03:26:00', '2016-05-03 03:26:00'),
(4, 0, 0, 'Bill', 0, 0, '', '2016-05-03 03:26:36', '2016-05-03 03:26:36'),
(5, 0, 0, 'Gift', 1, 0, '', '2016-05-03 03:26:58', '2016-05-03 03:26:58'),
(6, 0, 0, 'Medical', 0, 0, '', '2016-05-03 03:27:21', '2016-05-03 03:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cost` bigint(12) NOT NULL,
  `note` text NOT NULL,
  `with` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `event` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `category_id`, `wallet_id`, `user_id`, `cost`, `note`, `with`, `date`, `event`, `created`, `updated`) VALUES
(2, 1, 1, 1, 1000, '', '', '2016-06-13', '', '2016-06-13 11:09:24', '2016-06-13 11:09:24'),
(3, 2, 1, 1, 2000, '', '', '2016-06-13', '', '2016-06-13 11:31:44', '2016-06-13 11:31:44'),
(4, 1, 2, 1, 3000, '', '', '2016-06-13', '', '2016-06-13 11:34:24', '2016-06-13 11:34:24'),
(5, 5, 2, 1, 4000, 'Transfer from wallet Wallet 1 thaibm', '', '2016-06-13', '', '2016-06-13 11:35:57', '2016-06-13 11:35:57'),
(6, 4, 2, 1, 5000, '', '', '2016-06-13', '', '2016-06-13 11:38:04', '2016-06-13 11:38:04'),
(7, 5, 1, 1, 6000, '', '', '2016-06-13', '', '2016-06-13 11:53:39', '2016-06-13 11:53:39'),
(8, 5, 1, 1, 7000, 'Transfer from wallet Wallet 2 thaibm', '', '2016-06-13', '', '2016-06-13 15:34:58', '2016-06-13 15:34:58'),
(9, 5, 2, 1, 8000, 'Transfer from wallet Wallet 1 thaibm', '', '2016-06-13', '', '2016-06-13 15:43:29', '2016-06-13 15:43:29'),
(10, 2, 1, 1, 8000, 'Test transfer money', '', '2016-06-13', '', '2016-06-13 15:43:29', '2016-06-13 15:43:29'),
(11, 5, 4, 1, 9000, 'Transfer from wallet Wallet 1 thaibm', '', '2016-06-13', '', '2016-06-13 15:50:03', '2016-06-13 15:50:03'),
(12, 3, 1, 1, 9000, 'test transfer', '', '2016-06-13', '', '2016-06-13 15:50:03', '2016-06-13 15:50:03'),
(13, 6, 1, 1, 9000, '', '', '2016-06-14', '', '2016-06-14 02:15:25', '2016-06-14 02:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `current_wallet_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `avatar`, `current_wallet_id`, `created`, `updated`) VALUES
(1, 'thaibm.uet@gmail.com', '2caf1eaa16d0ea78fe42b6ff694c212b07273b0c', '526848-sanji.jpg', 1, '2016-05-02 10:47:38', '2016-06-14 02:15:25'),
(6, 'buiminhthai0408@gmail.com', '2caf1eaa16d0ea78fe42b6ff694c212b07273b0c', 'https://lh6.googleusercontent.com/-IHxuLd33xCQ/AAAAAAAAAAI/AAAAAAAAAVo/_sB9zCPmIqM/photo.jpg', 0, '2016-06-11 11:33:31', '2016-06-12 05:57:44'),
(7, 'bmt.uet@gmail.com', '', 'https://lh3.googleusercontent.com/-JS5rFGBg2J4/AAAAAAAAAAI/AAAAAAAAAFw/RbHjPFaxPv0/photo.jpg', 8, '2016-06-11 11:35:25', '2016-06-13 10:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `starting_amount` bigint(12) NOT NULL,
  `exclude_from_total` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `name`, `currency`, `starting_amount`, `exclude_from_total`, `created`, `updated`) VALUES
(1, 1, 'Wallet 1 thaibm', 'Dolar', 1000000, 0, '2016-05-02 10:25:52', '2016-05-02 10:25:52'),
(2, 1, 'Wallet 2 thaibm', 'EUR', 59999, 0, '2016-05-02 16:40:30', '2016-05-02 16:40:30'),
(4, 1, 'Wallet 3 thaibm', 'EUR', 500000, 0, '2016-06-10 08:34:42', '2016-06-10 08:34:42'),
(5, 1, 'Wallet 4 thaibm', 'VND', 90000000, 0, '2016-06-10 08:35:37', '2016-06-10 08:35:37'),
(6, 2, 'Wallet 1', 'VND', 10000, 0, '2016-06-11 09:52:17', '2016-06-11 09:52:17'),
(7, 5, 'Black', 'DOLAR', 500000, 0, '2016-06-11 09:57:34', '2016-06-11 09:57:34'),
(8, 7, 'Wallet 1 btm.uet', 'VND', 9999, 0, '2016-06-13 10:24:13', '2016-06-13 10:24:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
