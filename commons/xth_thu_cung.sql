-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 12, 2024 lúc 12:23 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `xth_thu_cung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `name`, `address`, `email`, `password`, `role`) VALUES
(1, 'Trần Đức Khang', 'Nam Định, Việt Nam', 'tdkhangg2004@gmail.com', '19092004', 0),
(2, 'Mèo', 'aaa', 'aaa@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `account_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image_src` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `image_src`) VALUES
(1, 'Chó', 'sanpham12.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_src` text NOT NULL,
  `price_old` float NOT NULL,
  `price_new` float NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image_src`, `price_old`, `price_new`, `description`, `quantity`, `status`, `category_id`) VALUES
(39, 'Alaska', 'sanpham11.png', 10999000, 8999000, 'Từng có một thời gian, việc nuôi chó lai Nhật với Bắc Kinh được xem là một trào lưu thịnh hành. Gần như ai cũng sở hữu cho mình một bé chó xù Nhật vô cùng đáng yêu và mang một bản sắc riêng. Mặc dù nổi tiếng là vậy, thế nhưng không nhiều người hiểu rõ về giống chó cảnh này. Vậy bạn có biết các giống Nhật lai Bắc Kinh được ra đời như thế nào hay không? Nguồn gốc của chó Bắc Kinh Nhật lông xù Chó Bắc Kinh lai Nhật là một giống chó lai được ra đời dựa trên sự kết hợp của 2 giống chó Nhật thuần chủng và chó Bắc Kinh thuần chủng. Với những sự tương đồng về hình dáng và có những vẻ đẹp riêng, các giống chó Nhật lai Bắc Kinh dễ dàng khiến người ta phát cuồng vì vẻ ngoài của chính mình. Những bé chó Bắc Kinh lai với Nhật dễ dàng được đón nhận nồng nhiệt với chúng hội tụ đủ những tính trạng trội từ 2 dòng chó gốc. Nguyên do chủ yếu là bởi giống chó Nhật với Bắc Kinh có họ gần nhau. Vì thế, ở một số khía cạnh, chúng có sự kết hợp khá hoàn hảo. Đồng thời điều khiến các bé chó lông xù Nhật lai Bắc Kinh được xem trọng về giá trị là bởi 2 dòng chó bố mẹ chuẩn chủng tạo ra các bé là khá hiếm. Sự ra đời của các bé chó Nhật lai Bắc Kinh được xem là môt cách để giữ gìn những đặc tính tốt của 2 loài chó này. Tuy nhiên trước sự yêu mến lớn từ những người yêu chó, các bé chó bắc kinh lai Nhật trưởng thành hay còn bé đã ngày một được nhân giống nhiều hơn. Chó Bắc Kinh Nhật bao nhiêu kg? Hình dáng như thế nào Việc một bé chó Nhật Bắc Kinh có ngoại hình trội hơn về giống Nhật hay Bắc Kinh hoàn toàn phụ thuộc vào yếu tố xem bố hay mẹ của các bé là giống loài nào. vì lẽ đó mà cân nặng và hình dáng của các bé sẽ bị phụ thuộc khá nhiều vào chủng loại của bố mẹ. Vậy cân nặng và hình dáng các bé chó lai này là gì bạn có biết?', 19, 1, 1),
(40, 'Chó cảnh', 'sanpham5.jpg', 10999000, 7999000, 'Từng có một thời gian, việc nuôi chó lai Nhật với Bắc Kinh được xem là một trào lưu thịnh hành. Gần như ai cũng sở hữu cho mình một bé chó xù Nhật vô cùng đáng yêu và mang một bản sắc riêng. Mặc dù nổi tiếng là vậy, thế nhưng không nhiều người hiểu rõ về giống chó cảnh này. Vậy bạn có biết các giống Nhật lai Bắc Kinh được ra đời như thế nào hay không? Nguồn gốc của chó Bắc Kinh Nhật lông xù Chó Bắc Kinh lai Nhật là một giống chó lai được ra đời dựa trên sự kết hợp của 2 giống chó Nhật thuần chủng và chó Bắc Kinh thuần chủng. Với những sự tương đồng về hình dáng và có những vẻ đẹp riêng, các giống chó Nhật lai Bắc Kinh dễ dàng khiến người ta phát cuồng vì vẻ ngoài của chính mình. Những bé chó Bắc Kinh lai với Nhật dễ dàng được đón nhận nồng nhiệt với chúng hội tụ đủ những tính trạng trội từ 2 dòng chó gốc. Nguyên do chủ yếu là bởi giống chó Nhật với Bắc Kinh có họ gần nhau. Vì thế, ở một số khía cạnh, chúng có sự kết hợp khá hoàn hảo. Đồng thời điều khiến các bé chó lông xù Nhật lai Bắc Kinh được xem trọng về giá trị là bởi 2 dòng chó bố mẹ chuẩn chủng tạo ra các bé là khá hiếm. Sự ra đời của các bé chó Nhật lai Bắc Kinh được xem là môt cách để giữ gìn những đặc tính tốt của 2 loài chó này. Tuy nhiên trước sự yêu mến lớn từ những người yêu chó, các bé chó bắc kinh lai Nhật trưởng thành hay còn bé đã ngày một được nhân giống nhiều hơn. Chó Bắc Kinh Nhật bao nhiêu kg? Hình dáng như thế nào Việc một bé chó Nhật Bắc Kinh có ngoại hình trội hơn về giống Nhật hay Bắc Kinh hoàn toàn phụ thuộc vào yếu tố xem bố hay mẹ của các bé là giống loài nào. vì lẽ đó mà cân nặng và hình dáng của các bé sẽ bị phụ thuộc khá nhiều vào chủng loại của bố mẹ. Vậy cân nặng và hình dáng các bé chó lai này là gì bạn có biết?', 7, 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_account` (`account_id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`name`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`name`),
  ADD KEY `fk_category` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
