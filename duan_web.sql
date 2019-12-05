-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2019 lúc 08:42 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `image`, `name`, `url`) VALUES
(1, 'public/images/colors-curl-logo-template_23-2147536125.jpg', 'xxx', ''),
(2, 'public/images/background-of-spots-halftone_1035-3847.jpg', NULL, NULL),
(4, 'public/images/blue-tech-logo_1103-822.jpg', NULL, NULL),
(13, 'public/images/colors-curl-logo-template_23-2147536125.jpg', 'xxx', ''),
(14, 'public/images/background-of-spots-halftone_1035-3847.jpg', NULL, NULL),
(15, 'public/images/blue-tech-logo_1103-822.jpg', NULL, NULL),
(16, 'public/images/colors-curl-logo-template_23-2147536125.jpg', 'xxx', ''),
(17, 'public/images/background-of-spots-halftone_1035-3847.jpg', NULL, NULL),
(18, 'public/images/blue-tech-logo_1103-822.jpg', NULL, NULL),
(19, 'public/images/colors-curl-logo-template_23-2147536125.jpg', 'xxx', ''),
(20, 'public/images/background-of-spots-halftone_1035-3847.jpg', NULL, NULL),
(21, 'public/images/blue-tech-logo_1103-822.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(190) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_vietnamese_ci,
  `slug` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `desc`, `slug`, `created_at`) VALUES
(1, 'bbb', NULL, NULL, '2019-11-27 20:06:22'),
(3, 'bbbs', NULL, NULL, '2019-11-27 20:06:22'),
(4, 'bbb1', NULL, NULL, '2019-11-27 20:06:22'),
(5, 'bbbs12', NULL, NULL, '2019-11-27 20:06:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reply_for` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `product_id`, `user_id`, `reply_for`, `created_at`) VALUES
(1, '', 0, 0, 0, '2019-11-23 18:40:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone_number` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `customer_phone` int(20) DEFAULT NULL,
  `customer_email` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `status`, `total_price`, `payment_method`, `discount`, `buyer_id`, `voucher_id`, `message`, `created_at`) VALUES
(34, 'nam', 123, 'nam@gmail.com', 'ha noi, ha noi', NULL, 2200, 0, NULL, NULL, NULL, NULL, '2019-12-02 04:16:28'),
(35, '0', 1, '000', 'ha noi, ha noi', NULL, 660, 2, NULL, NULL, NULL, NULL, '2019-12-02 04:22:46'),
(36, '1', 12, '123@gmail.com', 'ha noi, ha noi', NULL, 2640, 1, NULL, NULL, NULL, NULL, '2019-12-02 07:40:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `unit_price`) VALUES
(34, 1, 10, 220),
(35, 1, 3, 220),
(36, 1, 12, 220);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale_off` int(11) DEFAULT NULL,
  `desc_short` text COLLATE utf8mb4_vietnamese_ci,
  `detail` text COLLATE utf8mb4_vietnamese_ci,
  `amount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '1',
  `rating` double DEFAULT NULL,
  `disabled_comment` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `image`, `price`, `sale_off`, `desc_short`, `detail`, `amount`, `status`, `views`, `rating`, `disabled_comment`, `created_at`, `updated_at`) VALUES
(2, 1, 'sfzdvxgbcfvngvhmn,j', 'public/images/a.jpg', 100, 20, 'Cash on Delivery Eligible. Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C Cash on Delivery Eligible. Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&CCash on Delivery Eligible. Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&CCash on Delivery Eligible. Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&CCash on Delivery Eligible. Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&CCash on Delivery Eligible. Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, NULL, 1, NULL, NULL, '2019-11-28 07:54:02', '2019-11-23 18:28:10'),
(3, 1, 'd', 'public/images/background-of-spots-halftone_1035-3847.jpg', 220, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-11-27 22:06:04', '2019-11-23 18:30:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_gallreries`
--

CREATE TABLE `product_gallreries` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image_text` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product_gallreries`
--

INSERT INTO `product_gallreries` (`id`, `product_id`, `image_url`, `image_text`) VALUES
(1, 2, 'public/images/background-of-spots-halftone_1035-3847.jpg', ''),
(2, 3, 'public/images/a.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings_web`
--

CREATE TABLE `settings_web` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `flavors_icon` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `hotline` varchar(25) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `content_about` text COLLATE utf8mb4_vietnamese_ci,
  `map` text COLLATE utf8mb4_vietnamese_ci,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `url_facebook` text COLLATE utf8mb4_vietnamese_ci,
  `url_youtube` text COLLATE utf8mb4_vietnamese_ci,
  `url_twitter` text COLLATE utf8mb4_vietnamese_ci,
  `url_instagram` text COLLATE utf8mb4_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `settings_web`
--

INSERT INTO `settings_web` (`id`, `logo`, `slogan`, `flavors_icon`, `hotline`, `email`, `company_name`, `content_about`, `map`, `address`, `url_facebook`, `url_youtube`, `url_twitter`, `url_instagram`) VALUES
(1, 'public/images/logo2.png', 'phụ kiện máy tinh', 'public/images/logo2.png', '099999999', 'phukienmaytinh@gmail.com', NULL, NULL, NULL, 'Ngõ 58 Nguyễn Khánh Toàn Quan Hoa Cầu Giấy, Hà Nội', 'https://www.facebook.com', 'https://www.yotube.com', 'https://www.twitter.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `desc` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `url` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `image`, `desc`, `url`, `status`) VALUES
(1, 'public/images/bg.jpg', '', '', 0),
(2, 'public/images/bg2.jpg', '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `password`, `role`, `status`, `created_at`) VALUES
(1, 'Nam', '', 'demo@gmail.com', '$2y$10$lw17HGf8auyVJSRfPUMTfuYZ8XkJypJvX2tTMZPtS30uAJd5YKKgO', 0, 0, '2019-12-01 15:33:46'),
(2, 'dd1111111', 'images/user.png', '1', '$2y$10$P1E.p0ABa3QCuZAsiFD0rO.7xHRKGqZMFg3/7B3JXX01Ypf9TL6eG', 0, 0, '2019-12-01 16:09:00'),
(3, 'dd1111111', 'images/user.png', '123@gmail.com', '$2y$10$TbRUIn9VZPfmlBsIzT5mUu9R8s68I954BK3j/pQBFqJFP/qqstorO', 0, 0, '2019-12-01 16:09:08'),
(4, 'Tin Tức', 'images/user.png', 'd@gmail.com', '$2y$10$GbRMOdaxX7QnLpgjNYenIu/36Py1wlk3bS8.o1e6preAu0SdbT9oi', 0, 0, '2019-12-01 16:10:49'),
(5, 'dd1111111', 'images/user.png', '123@gmail.com', '$2y$10$FeZGFm/uTlNN6seVR7EOSu6uofBn0Ebx9dymDA/XhaYotu5o64B.q', 0, 0, '2019-12-02 01:40:13'),
(6, 'dd1111111', 'images/user.png', '123@gmail.com0', '$2y$10$VS7W9JTm1nColFgl1O1VlO4.wVcPyyZk0Gy9fQz6j5k.S9a/Gp.Am', 0, 0, '2019-12-02 01:41:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `used_count` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cate_name` (`cate_name`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_gallreries`
--
ALTER TABLE `product_gallreries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings_web`
--
ALTER TABLE `settings_web`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product_gallreries`
--
ALTER TABLE `product_gallreries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `settings_web`
--
ALTER TABLE `settings_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
