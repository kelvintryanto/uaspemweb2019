-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 07:29 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaspemweb2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `detailorder_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`detailorder_id`, `qty`, `price`, `order_id`, `item_id`) VALUES
(8, 2, 125000, 19, 59);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `username` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `stock`, `description`, `image`, `username`) VALUES
(56, 'Harimau', 125000, 3, 'gambar harimau', 'harimau.jpg', 'kelvin.tryanto'),
(59, 'Elang', 125000, 10, 'kepala elang putih\r\n', 'elang.jpg', 'kelvin.tryanto'),
(64, 'kucing', 125000, 3, 'kepala kucing bergambar meong\r\n', 'kucing.jpg', 'kelvin.tryanto'),
(65, 'Gajah', 162000, 12, 'gambar gajah\r\n', 'gajah.jpg', 'kelvin.tryanto'),
(66, 'Detak Jantung', 124000, 4, 'detak jantung yang kencang berdebar tanpa henti', 'detakjantung.jpg', 'kelvin.tryanto'),
(67, 'Elang Putih', 156000, 7, 'kepala elang putih besar\r\n', 'elangputih.jpg', 'kelvin.tryanto'),
(70, 'Srigala', 125000, 4, 'srigala mengaum di malam hari', 'srigala.jpg', 'kelvin.tryanto');

-- --------------------------------------------------------

--
-- Table structure for table `item_cart`
--

CREATE TABLE `item_cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `username_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_ship`
--

CREATE TABLE `item_ship` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `receiver` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` int(11) NOT NULL,
  `city` varchar(256) NOT NULL,
  `courier` varchar(256) DEFAULT NULL,
  `ship_price` int(11) DEFAULT NULL,
  `no_resi` varchar(128) DEFAULT NULL,
  `shipped` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_ship`
--

INSERT INTO `item_ship` (`id`, `order_id`, `receiver`, `address`, `phone`, `city`, `courier`, `ship_price`, `no_resi`, `shipped`) VALUES
(4, 19, 'Kelvin Tryanto', 'Jalan Kodiklat TNI no. 87', 2147483647, '457', 'jne', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_order` varchar(256) NOT NULL,
  `price_total` int(11) NOT NULL,
  `payment_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`order_id`, `user_id`, `date_order`, `price_total`, `payment_status`) VALUES
(19, 7, '1561305260', 250000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(7, 'kelvin.tryanto', 'kelvin.tryanto@gmail.com', 'harimau.jpg', '$2y$10$FMGJjfc71twvZlIj47irNOJUsX1V6Qm6/EHA.9uKNyQLPzdcEC8lG', 1, 1, 1557686744),
(8, 'dominic', 'dominic.reinaldo@gmail.com', 'default.jpg', '$2y$10$ehMkb2lt.sQx5YK1Cd5ijuiXdsgYrRI5HR1U5zTa2dMkGHvfGTTzW', 2, 1, 1557706079),
(9, 'dominic.reinaldo', 'dominic.reinaldo11@gmail.com', 'default.jpg', '$2y$10$9KmhnXPzA9272Cye.WdTYO/hQl.EYAdFGImNhZfPTmO2c4Bzp3m1y', 2, 1, 1558014405),
(11, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$c2dj/ZVDSKd9PGenhDghde0S6/I9WLnY9fqpcoLNl6Ya3fhvCorRi', 1, 1, 1558404078),
(12, 'user', 'kt_bluesky93@yahoo.com', 'default.jpg', '$2y$10$LNNNlp4oLNeXd2mgPsXKte3YgSOZCtYx3./eJn6YODuwiKTh.hMfS', 2, 1, 1560834120);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(12, 2, 3),
(36, 2, 2),
(42, 1, 4),
(43, 1, 3),
(45, 1, 5),
(46, 1, 6),
(47, 3, 2),
(51, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Shop'),
(3, 'User'),
(4, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tag', 1),
(3, 1, 'User List', 'admin/userlist', 'fas fa-fw fa-users', 1),
(4, 1, 'Manage Item', 'admin/manageitem', 'fas fa-fw fa-database', 1),
(5, 2, 'Item Shop', 'shop', 'fas fa-fw fa-home', 1),
(6, 2, 'Cart', 'shop/cart', 'fas fa-fw fa-shopping-cart', 1),
(7, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(8, 3, 'Edit Profile', 'user/editprofile', 'fas fa-fw fa-cogs', 1),
(9, 3, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 4, 'Menu Management', 'menu', 'fas fa-fw fa-bars', 1),
(11, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-align-left', 1),
(13, 2, 'Payment', 'shop/payment', 'fas fa-money-check-alt', 1),
(14, 2, 'History', 'shop/history', 'fas fa-history', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'skyjack345@gmail.com', 'WPFcLe1u1+0J1KICOff59T4tWBnYiI2pk/s4LuJuh94=', '1558399277'),
(2, 'admin@gmail.com', 'EBvLSgQiuySm+Twlj3zuVOYJNWL6sPWdXVWBWpcTjDs=', '1558404078');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`detailorder_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_cart`
--
ALTER TABLE `item_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_ship`
--
ALTER TABLE `item_ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `detailorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `item_cart`
--
ALTER TABLE `item_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `item_ship`
--
ALTER TABLE `item_ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
