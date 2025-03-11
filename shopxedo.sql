-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 03:46 PM
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
-- Database: `shopxedo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `featured` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`, `featured`) VALUES
(1, 'Combo lên đĩa', 'Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp đặt hỗ trợ khách hàng lên xe.', 'p1.jpg', '1'),
(2, 'Đồ chơi phần ghi đông', 'Đây là bộ phận dễ dàng thay thế nhất và cũng được nhiều shop cung cấp. Tùy theo nhu cầu mà bạn cần lựa chọn cho mình các loại ghi đông phù hợp nhất với bản thân cũng như sở thích cá nhân mình ', 'dochoiphanghidong.jpg', '1'),
(3, 'Xe điện E-Scooter Mini', 'Xe điện gấp gọn dễ sử dụng các mẫu HOT cao cấp.', 'xedienescooter.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image`, `price`, `sale`, `stock_quantity`, `category_id`) VALUES
(1, 'Combo lên đĩa (LV1) NEW 2022', 'Thông số cơ bản  Lắp cho xe: Nhiều dòng xe Model: Combo lv1 Thương hiệu: Honda, Yamaha Loại:               1 Mô tả chi tiết  Combo đùm lên đĩa lv1 2022 được XĐĐ lựa chọn tối ưu nhất tiết kiệm nhất và đẹp hơn mẫu 2019 Vài điều về sản […]', 'a:3:{i:0;s:27:\"combolendialv1new2022-1.jpg\";i:1;s:27:\"combolendialv1new2022-2.jpg\";i:2;s:27:\"combolendialv1new2022-3.jpg\";}', 1500000.00, 0.00, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(10) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(1) NOT NULL DEFAULT '0',
  `address` varchar(50) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `name`, `date_of_birth`, `gender`, `address`, `phone_number`, `created_at`) VALUES
(1, 'admin', '123', 'admin', 'ADMIN', '0000-00-00', '0', '', '', '2025-03-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
