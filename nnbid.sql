-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 20, 2017 at 07:47 AM
-- Server version: 5.6.33
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `nnbid`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tb_buyers`
--

CREATE TABLE `tb_buyers` (
  `buyer_id` int(11) NOT NULL,
  `buyer_company_name` varchar(100) NOT NULL,
  `buyer_type` int(11) NOT NULL,
  `buyer_address` varchar(100) NOT NULL,
  `buyer_city` varchar(100) NOT NULL,
  `buyer_state` varchar(50) NOT NULL,
  `buyer_zip` varchar(10) NOT NULL,
  `buyer_country` varchar(30) NOT NULL,
  `buyer_phone_1` varchar(20) NOT NULL,
  `buyer_phone_2` varchar(100) NOT NULL,
  `buyer_fax` varchar(100) NOT NULL,
  `buyer_alt_email` varchar(100) NOT NULL,
  `buyer_contact_1` varchar(100) NOT NULL,
  `buyer_contact_2` varchar(100) NOT NULL,
  `user_type` int(20) NOT NULL DEFAULT '3',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_buyers`
--

INSERT INTO `tb_buyers` (`buyer_id`, `buyer_company_name`, `buyer_type`, `buyer_address`, `buyer_city`, `buyer_state`, `buyer_zip`, `buyer_country`, `buyer_phone_1`, `buyer_phone_2`, `buyer_fax`, `buyer_alt_email`, `buyer_contact_1`, `buyer_contact_2`, `user_type`, `username`, `password`, `status`) VALUES
(1, 'ds', 3, '3', 'asdasd', '', '', '', 'dasd', '', '', '', '', 'dasd', 3, '', '', 1),
(2, 'abc ltd.', 3, '', '', '', '', '', '', '', '', '', '', '', 2, 'akakak', 'akakak', 1),
(3, 'akshay ltd', 1, '', '', '', '', '', '', '', '', '', '', '', 2, 'akshayak', 'akshayak', 1),
(4, 'akshay ltd', 1, '', '', '', '', '', '', '', '', '', '', '', 2, 'akshayak', 'akshayak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_companies`
--

CREATE TABLE `tb_companies` (
  `company_id` int(25) NOT NULL,
  `seller_company_name` varchar(30) NOT NULL,
  `seller_type` varchar(10) NOT NULL,
  `seller_address` varchar(100) NOT NULL,
  `seller_city` varchar(20) NOT NULL,
  `seller_state` varchar(20) NOT NULL,
  `seller_zip` int(20) NOT NULL,
  `seller_country` varchar(15) NOT NULL,
  `seller_phone_1` bigint(15) NOT NULL,
  `seller_phone_2` bigint(15) NOT NULL,
  `seller_fax` bigint(15) NOT NULL,
  `seller_image` varchar(100) NOT NULL,
  `seller_alt_email` varchar(20) NOT NULL,
  `seller_contact_1` varchar(20) NOT NULL,
  `seller_contact_2` varchar(20) NOT NULL,
  `seller_contact_3` varchar(20) NOT NULL,
  `seller_description` varchar(100) NOT NULL,
  `user_type` int(10) NOT NULL DEFAULT '2',
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_companies`
--

INSERT INTO `tb_companies` (`company_id`, `seller_company_name`, `seller_type`, `seller_address`, `seller_city`, `seller_state`, `seller_zip`, `seller_country`, `seller_phone_1`, `seller_phone_2`, `seller_fax`, `seller_image`, `seller_alt_email`, `seller_contact_1`, `seller_contact_2`, `seller_contact_3`, `seller_description`, `user_type`, `status`) VALUES
(1, 'Company 1', '2', 'jnsadasdasdd', '', '67865', 0, '', 0, 0, 65465, '', '', '0', '0', '0', 'bjhjh', 2, 1),
(2, 'Company 2', '1', 'csasa', '', '', 0, '', 0, 0, 0, '', '', '0', '0', '0', '', 2, 1),
(3, 'Company 3', '2', 'dasdas', '', '', 0, '', 0, 0, 0, '', '', '0', '0', '0', 'dasda', 2, 1),
(4, 'Jitender Sharma Ltd.', '1', '', '', '', 0, '', 0, 0, 0, '', '', '', '', '', 'jhgjghfv', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lot`
--

CREATE TABLE `tb_lot` (
  `id_lot` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `lot_number` varchar(200) NOT NULL,
  `lot_description` varchar(200) NOT NULL,
  `lot_product_qty` varchar(200) NOT NULL,
  `lot_bid_unit` varchar(200) NOT NULL,
  `lot_emd_cmd` varchar(200) NOT NULL,
  `lot_start_bid` varchar(200) NOT NULL,
  `lot_increment_by` varchar(200) NOT NULL,
  `lot_img_1` varchar(200) NOT NULL,
  `lot_img_2` varchar(200) NOT NULL,
  `lot_img_3` varchar(200) NOT NULL,
  `lot_catalogue_1` varchar(200) NOT NULL,
  `lot_catalogue_2` varchar(200) NOT NULL,
  `lot_catalogue_3` varchar(200) NOT NULL,
  `lot_status` int(11) NOT NULL DEFAULT '1',
  `activate` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lot`
--

INSERT INTO `tb_lot` (`id_lot`, `auction_id`, `lot_number`, `lot_description`, `lot_product_qty`, `lot_bid_unit`, `lot_emd_cmd`, `lot_start_bid`, `lot_increment_by`, `lot_img_1`, `lot_img_2`, `lot_img_3`, `lot_catalogue_1`, `lot_catalogue_2`, `lot_catalogue_3`, `lot_status`, `activate`) VALUES
(1, 2, '23123213/312312', 'dasda', 'dasda', '', '', '', '', '', '', '', '', '', '', 1, 1),
(2, 2, '324234', 'dsfsafds', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(3, 2, '231231', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(4, 1, '21312ed', 'dsadfsa', '', '', '', '', '', '', '', '', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_manage_auctions`
--

CREATE TABLE `tb_manage_auctions` (
  `id_m_a` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `auction_type` int(11) NOT NULL,
  `auction_number` varchar(200) NOT NULL,
  `auction_description` text NOT NULL,
  `material_venue` text NOT NULL,
  `auction_start_dt` varchar(30) NOT NULL,
  `auction_end_dt` varchar(30) NOT NULL,
  `auction_start_time` varchar(30) NOT NULL,
  `auction_end_time` varchar(30) NOT NULL,
  `term` varchar(200) NOT NULL,
  `catalogue` varchar(200) NOT NULL,
  `live` int(11) NOT NULL DEFAULT '0',
  `archive` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_manage_auctions`
--

INSERT INTO `tb_manage_auctions` (`id_m_a`, `seller_id`, `auction_type`, `auction_number`, `auction_description`, `material_venue`, `auction_start_dt`, `auction_end_dt`, `auction_start_time`, `auction_end_time`, `term`, `catalogue`, `live`, `archive`, `status`) VALUES
(1, 1, 1, 'dasdas', 'dasdad', 'dasdasadsasd', '2017-09-03', '2017-09-04', '07:00', '19:00', '', '', 0, 1, 1),
(2, 3, 2, 'dasdas', 'dasdas', 'sadasd', '2017-09-04', '2017-09-04', '02:13', '14:31', '', '', 1, 1, 1),
(3, 4, 2, 'regergthyr', 'dasda', '', '2017-09-05', '2017-09-12', '12:59', '01:00', '', '', 1, 1, 1),
(4, 2, 1, 'dsadad', 'dasddas', 'dasdas', '2017-09-04', '2017-09-18', '08:08', '20:08', '', '', 1, 1, 1),
(5, 3, 1, 'fgggfgsdasda', 'ferfer', 'ferfer', '2017-09-04', '2017-09-07', '09:09', '21:09', '', '', 1, 1, 1),
(6, 3, 1, 'fgggfgsdasda', 'ferfer', 'ferfer', '2017-09-04', '2017-09-07', '09:09', '21:09', '', '', 0, 1, 1),
(7, 3, 1, 'fgggfgsdasda', 'ferfer', 'ferfer', '2017-09-04', '2017-09-07', '09:09', '21:09', '', '', 1, 1, 1),
(8, 3, 1, 'fgggfgsdasda', 'ferfer', 'ferfer', '2017-09-04', '2017-09-07', '09:09', '21:09', '', '', 1, 1, 1),
(9, 1, 1, 'dfwqdwqd', '', '', '', '', '', '', '', '', 0, 1, 1),
(10, 1, 1, 'fefwefe', '', '', '', '', '', '', '', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `type`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'akshay', '$P$BUKvyHn3xYXfe8A4wuYGFo3.4ySrZd/', 'akshaykankal@gmail.com', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2017-09-19 22:44:02', '2017-08-30 12:29:40', '2017-09-19 20:44:02'),
(2, 'akakak', 'akakak', '', 1, 2, 0, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-09-07 10:19:42'),
(3, 'akshayak', '$P$BQmAijGSRgfr1TNK3GoaKb/rmXBzRK1', '', 1, 2, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2017-09-18 13:05:51', '0000-00-00 00:00:00', '2017-09-18 11:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buyers`
--
ALTER TABLE `tb_buyers`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `tb_companies`
--
ALTER TABLE `tb_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tb_lot`
--
ALTER TABLE `tb_lot`
  ADD PRIMARY KEY (`id_lot`);

--
-- Indexes for table `tb_manage_auctions`
--
ALTER TABLE `tb_manage_auctions`
  ADD PRIMARY KEY (`id_m_a`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_autologin`
--
ALTER TABLE `user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_buyers`
--
ALTER TABLE `tb_buyers`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_companies`
--
ALTER TABLE `tb_companies`
  MODIFY `company_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_lot`
--
ALTER TABLE `tb_lot`
  MODIFY `id_lot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_manage_auctions`
--
ALTER TABLE `tb_manage_auctions`
  MODIFY `id_m_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;