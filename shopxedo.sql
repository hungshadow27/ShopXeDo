-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 09:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 2),
(3, 1, 2, 1);

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
(1, 'Combo lên đĩa', 'Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp đặt hỗ trợ khách hàng lên xe.', 'combo-len-dia-category', '1'),
(2, 'Đồ chơi phần ghi đông', 'Đây là bộ phận dễ dàng thay thế nhất và cũng được nhiều shop cung cấp. Tùy theo nhu cầu mà bạn cần lựa chọn cho mình các loại ghi đông phù hợp nhất với bản thân cũng như sở thích cá nhân mình', 'do-choi-phan-ghi-dong-category', '1'),
(3, 'Xe điện E-Scooter Mini', 'Xe điện gấp gọn dễ sử dụng các mẫu HOT cao cấp.', 'xe-dien-escooter-category', '1');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `file_name`) VALUES
(4, 'test', '1741537494.png'),
(5, 'combo-len-dia-lv1-new-2022-1', 'combolendialv1new2022-1.jpg'),
(6, 'combo-len-dia-lv1-new-2022-2', 'combolendialv1new2022-2.jpg'),
(7, 'combo-len-dia-lv1-new-2022-3', 'combolendialv1new2022-3.jpg'),
(8, 'bao-tay-baracuda-1', 'baotaybaracuda1.jpg'),
(9, 'bao-tay-baracuda-2', 'baotaybaracuda2.jpg'),
(10, 'bao-tay-baracuda-3', 'baotaybaracuda3.jpg'),
(11, 'combo-len-dia-category', 'p1.jpg'),
(12, 'do-choi-phan-ghi-dong-category', 'dochoiphanghidong.jpg'),
(13, 'xe-dien-escooter-category', 'xedienescooter.jpg'),
(14, 'menu-1', 'menu1.jpg'),
(15, 'menu-2', 'AccountIcon2.png'),
(16, 'menu-3', 'menu3.jpg'),
(17, 'menu-4', 'unnamed.png'),
(18, 'cac-san-pham-khac-category', 'cacsanphamkhac.jpg'),
(19, 'service-1', 'ca-ch-mo-tie-m-ru-a-xe-ma-y-thu-ve-30-trie-u-mo-i-tha-ng-2-1583134987-width1004height565.png'),
(20, 'service-2', 'baoduongxe-01_31cba1ec453d4b9aa71a94dadec1f391.jpg'),
(21, 'service-3', 't11.jpg'),
(22, 'loginbg', 'loginbg.jpg'),
(23, 'logo', 'logowheel.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `shipping_address` varchar(2550) NOT NULL,
  `total_cost` int(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `ispaid` varchar(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `finish_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product`, `shipping_address`, `total_cost`, `status`, `ispaid`, `created_at`, `finish_date`) VALUES
(7, 1, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"1\";s:8:\"quantity\";s:1:\"1\";}}', 'ngũ phúc-kiến thụy-hải phòng', 1530000, 2, '0', '2025-03-17 16:38:35', '2025-03-17 16:39:00'),
(8, 1, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"1\";s:8:\"quantity\";s:1:\"2\";}}', 'ngũ phúc-kiến thụy-hải phòng', 3030000, 0, '0', '2025-03-17 20:19:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Test', '<p><img alt=\"\" src=\"http://localhost/shopxedo/Public/images/1741537494.png\" style=\"height:855px; width:855px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:48px\"><span style=\"color:#1abc9c\"><strong>Test 1</strong></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>jhahiufhwbfahfuoqhoungauhfo</p>\r\n\r\n<p><span style=\"color:#9b59b6\"><span style=\"font-size:72px\"><strong>Test 2</strong></span></span></p>\r\n\r\n<p>faohowhjoijqwnoahoid</p>', 'test', '2025-03-17 03:05:03', '2025-03-18 02:02:41');

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
(1, 'Combo lên đĩa (LV1) NEW 2022', '<h1><span style=\"font-size:36px\"><span style=\"color:#e74c3c\"><strong>M&ocirc; tả chi tiết&nbsp;</strong></span></span></h1>\r\n\r\n<p>Combo đ&ugrave;m l&ecirc;n đĩa lv1 2022 được XĐĐ lựa chọn tối ưu nhất tiết kiệm nhất v&agrave; đẹp hơn mẫu 2019</p>\r\n\r\n<h1><strong>V&agrave;i điều về sản phẩm</strong></h1>\r\n\r\n<p>Combo lv1 mới kh&aacute;c với combo lv1 củ ở đĩa thắng trước đẹp hơn khi sử dụng đĩa phay lỗ th&aacute;i, v&agrave; mẫu phuộc trước được lựa chọn tốt hơn bởi thương hiệu DPR bảo h&agrave;nh 6 th&aacute;ng</p>\r\n\r\n<h1><strong>C&aacute;c bạn từ Channel Xe độ đẹp đ&aacute;nh gi&aacute;</strong></h1>\r\n\r\n<p>Combo lv1 NEW c&oacute; gi&aacute; th&agrave;nh thấp nhất d&agrave;nh cho học sinh sinh vi&ecirc;n muốn từ phanh đ&ugrave;m l&ecirc;n phanh đĩa trước v&agrave; nh&igrave;n đẹp mắt với đĩa kiểu trước</p>\r\n\r\n<h1><strong>Combo lv1 new gồm c&oacute;:</strong></h1>\r\n\r\n<ol>\r\n	<li>Cặp phuộc trước DPR ( Bảo h&agrave;nh 6 th&aacute;ng )</li>\r\n	<li>Tay thắng dầu</li>\r\n	<li>D&acirc;y dầu</li>\r\n	<li>Heo 1 pis</li>\r\n	<li>Đ&ugrave;m trước</li>\r\n	<li>Căm osaki ( 1 b&aacute;nh trước )</li>\r\n	<li>Đĩa kiểu th&aacute;i</li>\r\n</ol>', 'a:3:{i:0;s:28:\"combo-len-dia-lv1-new-2022-1\";i:1;s:28:\"combo-len-dia-lv1-new-2022-2\";i:2;s:28:\"combo-len-dia-lv1-new-2022-3\";}', 1500000.00, 0.00, 11, 1),
(2, 'Bao tay Baracuda *Chính hãng', '', 'a:3:{i:0;s:18:\"bao-tay-baracuda-1\";i:1;s:18:\"bao-tay-baracuda-2\";i:2;s:18:\"bao-tay-baracuda-3\";}', 500000.00, 0.00, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` int(1) DEFAULT NULL,
  `comment` varchar(2550) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `order_id`, `user_id`, `product_id`, `star`, `comment`, `created_at`) VALUES
(1, 3, 1, 1, 4, 'fff', '2025-03-16 22:13:14'),
(2, 3, 1, 2, 5, 'aa', '2025-03-16 22:20:09'),
(3, 4, 1, 1, 5, 'ggg', '2025-03-16 23:10:51'),
(4, 7, 1, 1, 5, 'gggaaa', '2025-03-17 16:39:11');

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
(1, 'admin', '123', 'admin', 'Admin', '2025-03-18', '1', 'ngũ phúc-kiến thụy-hải phòng', '0987654321', '2025-03-17'),
(5, 'hungngu', '123', 'customer', 'Phạm Hùng', '2025-03-12', '1', 'ngũ phúc-kiến thụy-hải phòng', '4213213', '2025-03-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
