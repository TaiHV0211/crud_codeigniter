-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2021 lúc 10:49 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `crud`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `readed` tinyint(1) NOT NULL DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `content`, `seen`, `readed`, `created_date`) VALUES
(1, 'Hồ Văn Tài', 'vantai0@gmail.com', '0909110010', 'Nội dung: 0', 0, 0, '2021-11-13 17:11:04'),
(2, 'Hồ Văn Tài', 'vantai1@gmail.com', '0909110011', 'Nội dung: 1', 0, 0, '2021-11-13 17:11:04'),
(3, 'Hồ Văn Tài', 'vantai2@gmail.com', '0909110012', 'Nội dung: 2', 0, 0, '2021-11-13 17:11:04'),
(4, 'Hồ Văn Tài', 'vantai3@gmail.com', '0909110013', 'Nội dung: 3', 0, 0, '2021-11-13 17:11:04'),
(5, 'Hồ Văn Tài', 'vantai4@gmail.com', '0909110014', 'Nội dung: 4', 0, 0, '2021-11-13 17:11:04'),
(6, 'Hồ Văn Tài', 'vantai5@gmail.com', '0909110015', 'Nội dung: 5', 0, 0, '2021-11-13 17:11:04'),
(7, 'Hồ Văn Tài', 'vantai6@gmail.com', '0909110016', 'Nội dung: 6', 0, 0, '2021-11-13 17:11:04'),
(8, 'Hồ Văn Tài', 'vantai7@gmail.com', '0909110017', 'Nội dung: 7', 0, 0, '2021-11-13 17:11:04'),
(9, 'Hồ Văn Tài', 'vantai8@gmail.com', '0909110018', 'Nội dung: 8', 0, 0, '2021-11-13 17:11:04'),
(10, 'Hồ Văn Tài', 'vantai9@gmail.com', '0909110019', 'Nội dung: 9', 0, 0, '2021-11-13 17:11:04'),
(11, 'Hồ Văn Tài', 'vantai10@gmail.com', '09091100110', 'Nội dung: 10', 0, 0, '2021-11-13 17:11:04'),
(12, 'Hồ Văn Tài', 'vantai11@gmail.com', '09091100111', 'Nội dung: 11', 0, 0, '2021-11-13 17:11:04'),
(13, 'Hồ Văn Tài', 'vantai12@gmail.com', '09091100112', 'Nội dung: 12', 0, 0, '2021-11-13 17:11:04'),
(14, 'Hồ Văn Tài', 'vantai13@gmail.com', '09091100113', 'Nội dung: 13', 0, 0, '2021-11-13 17:11:04'),
(15, 'Hồ Văn Tài', 'vantai14@gmail.com', '09091100114', 'Nội dung: 14', 0, 0, '2021-11-13 17:11:04'),
(16, 'Hồ Văn Tài', 'vantai15@gmail.com', '09091100115', 'Nội dung: 15', 0, 0, '2021-11-13 17:11:04'),
(17, 'Hồ Văn Tài', 'vantai16@gmail.com', '09091100116', 'Nội dung: 16', 0, 0, '2021-11-13 17:11:04'),
(18, 'Hồ Văn Tài', 'vantai17@gmail.com', '09091100117', 'Nội dung: 17', 0, 0, '2021-11-13 17:11:04'),
(19, 'Hồ Văn Tài', 'vantai18@gmail.com', '09091100118', 'Nội dung: 18', 0, 0, '2021-11-13 17:11:04'),
(20, 'Hồ Văn Tài', 'vantai19@gmail.com', '09091100119', 'Nội dung: 19', 0, 0, '2021-11-13 17:11:04'),
(21, 'Hồ Văn Tài', 'vantai20@gmail.com', '09091100120', 'Nội dung: 20', 0, 0, '2021-11-13 17:11:04'),
(22, 'Hồ Văn Tài', 'vantai21@gmail.com', '09091100121', 'Nội dung: 21', 0, 0, '2021-11-13 17:11:04'),
(23, 'Hồ Văn Tài', 'vantai22@gmail.com', '09091100122', 'Nội dung: 22', 0, 0, '2021-11-13 17:11:04'),
(24, 'Hồ Văn Tài', 'vantai23@gmail.com', '09091100123', 'Nội dung: 23', 0, 0, '2021-11-13 17:11:04'),
(25, 'Hồ Văn Tài', 'vantai24@gmail.com', '09091100124', 'Nội dung: 24', 0, 0, '2021-11-13 17:11:04'),
(26, 'Hồ Văn Tài', 'vantai25@gmail.com', '09091100125', 'Nội dung: 25', 0, 0, '2021-11-13 17:11:04'),
(27, 'Hồ Văn Tài', 'vantai26@gmail.com', '09091100126', 'Nội dung: 26', 0, 0, '2021-11-13 17:11:04'),
(28, 'Hồ Văn Tài', 'vantai27@gmail.com', '09091100127', 'Nội dung: 27', 0, 0, '2021-11-13 17:11:04'),
(29, 'Hồ Văn Tài', 'vantai28@gmail.com', '09091100128', 'Nội dung: 28', 0, 0, '2021-11-13 17:11:04'),
(30, 'Hồ Văn Tài', 'vantai29@gmail.com', '09091100129', 'Nội dung: 29', 0, 0, '2021-11-13 17:11:04'),
(31, 'Hồ Văn Tài', 'vantai30@gmail.com', '09091100130', 'Nội dung: 30', 0, 0, '2021-11-13 17:11:04'),
(32, 'Hồ Văn Tài', 'vantai31@gmail.com', '09091100131', 'Nội dung: 31', 0, 0, '2021-11-13 17:11:04'),
(33, 'Hồ Văn Tài', 'vantai32@gmail.com', '09091100132', 'Nội dung: 32', 0, 0, '2021-11-13 17:11:04'),
(34, 'Hồ Văn Tài', 'vantai33@gmail.com', '09091100133', 'Nội dung: 33', 0, 0, '2021-11-13 17:11:04'),
(35, 'Hồ Văn Tài', 'vantai34@gmail.com', '09091100134', 'Nội dung: 34', 0, 0, '2021-11-13 17:11:04'),
(36, 'Hồ Văn Tài', 'vantai35@gmail.com', '09091100135', 'Nội dung: 35', 0, 0, '2021-11-13 17:11:04'),
(37, 'Hồ Văn Tài', 'vantai36@gmail.com', '09091100136', 'Nội dung: 36', 0, 0, '2021-11-13 17:11:04'),
(38, 'Hồ Văn Tài', 'vantai37@gmail.com', '09091100137', 'Nội dung: 37', 0, 0, '2021-11-13 17:11:04'),
(39, 'Hồ Văn Tài', 'vantai38@gmail.com', '09091100138', 'Nội dung: 38', 0, 0, '2021-11-13 17:11:04'),
(40, 'Hồ Văn Tài', 'vantai39@gmail.com', '09091100139', 'Nội dung: 39', 0, 0, '2021-11-13 17:11:04'),
(41, 'Hồ Văn Tài', 'vantai40@gmail.com', '09091100140', 'Nội dung: 40', 0, 0, '2021-11-13 17:11:04'),
(42, 'Hồ Văn Tài', 'vantai41@gmail.com', '09091100141', 'Nội dung: 41', 0, 0, '2021-11-13 17:11:04'),
(43, 'Hồ Văn Tài', 'vantai42@gmail.com', '09091100142', 'Nội dung: 42', 1, 0, '2021-11-13 17:11:04'),
(44, 'Hồ Văn Tài', 'vantai43@gmail.com', '09091100143', 'Nội dung: 43', 0, 1, '2021-11-13 17:11:04'),
(45, 'Hồ Văn Tài', 'vantai44@gmail.com', '09091100144', 'Nội dung: 44', 1, 0, '2021-11-13 17:11:04'),
(46, 'Hồ Văn Tài', 'vantai45@gmail.com', '09091100145', 'Nội dung: 45', 0, 1, '2021-11-13 17:11:04'),
(47, 'Hồ Văn Tài', 'vantai46@gmail.com', '09091100146', 'Nội dung: 46', 1, 1, '2021-11-13 17:11:04'),
(48, 'Hồ Văn Tài', 'vantai47@gmail.com', '09091100147', 'Nội dung: 47', 0, 0, '2021-11-13 17:11:04'),
(49, 'Hồ Văn Tài', 'vantai48@gmail.com', '09091100148', 'Nội dung: 48', 0, 1, '2021-11-13 17:11:04'),
(50, 'Hồ Văn Tài', 'vantai49@gmail.com', '09091100149', 'Nội dung: 49', 0, 0, '2021-11-13 17:11:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-11-07-082439', 'App\\Database\\Migrations\\CreateTableUsers', 'default', 'App', 1636273907, 1),
(2, '2021-11-12-145609', 'App\\Database\\Migrations\\CreateTablePurchase', 'default', 'App', 1636731404, 2),
(3, '2021-11-13-095517', 'App\\Database\\Migrations\\CreateTableContacts', 'default', 'App', 1636798246, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `databases` varchar(255) NOT NULL,
  `domains` varchar(255) NOT NULL,
  `support` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `purchases`
--

INSERT INTO `purchases` (`id`, `name`, `price`, `email_address`, `storage`, `databases`, `domains`, `support`) VALUES
(1, 'Dùng thử1111', '$0/MONTH', '250', '125GB', '140', '60', '24/7 trong ngày'),
(2, 'Gói thanh toán theo năm', '$400/MONTH', '150', '65GB', '60', '30', '24/7 trong ngày'),
(3, 'Vĩnh viễn', '$5000/1 LẦN DUY NHẤT', '250', '125GB', '140', '60', '24/7 trong ngày'),
(5, 'Dùng thử', '$0/MONTH', '250', '125GB', '140', '60', '24/7 trong ngày'),
(6, 'Gói thanh toán theo năm', '$400/MONTH', '150', '65GB', '60', '30', '24/7 trong ngày'),
(7, 'Vĩnh viễn', '$5000/1 LẦN DUY NHẤT', '250', '125GB', '140', '60', '24/7 trong ngày');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@gmail.com', '$2y$10$ApECYaecn4yoVvZLxEMMpOmIT/tZdLnDmtClLrqijdF0ct4r1e8me', 'Admin'),
(2, 'admin1@gmail.com', 'admin1', 'Admin'),
(3, 'vynhl@gmail.com', '$2y$10$SSz5lIg6GldPokm2MUucuuYpE6rBobB1tpQteveAOygTKV/vtv4fW', 'Vy Lan'),
(11, 'catnh@gmail.com', '$2y$10$5mRhYoezrnFIRkANiXZ2n.uKPDbHkaloAjt8lP5lifqELBbi8cZZ6', 'Cát Hoàng'),
(12, 'ypn@gmail.com', '$2y$10$LDvwSwaO1CWpVPWCMvY2CuZuRldOuGyQv6MULw244cACcuutAfTXy', 'Như Ý'),
(13, 'phuongnm@gmail.com', '$2y$10$KBOsC/nvXNMdRxb7ELs/4.QBt.lAZXsIHHqvfPxZEhPFUWcK/hXW2', 'Minh Phượng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
