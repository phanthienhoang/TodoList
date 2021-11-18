-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2021 lúc 11:27 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `to_do_list`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `work_name` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('planning','doing','complete') NOT NULL DEFAULT 'planning',
  `DELETE_FLG` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tasks`
--

INSERT INTO `tasks` (`id`, `work_name`, `start_date`, `end_date`, `status`, `DELETE_FLG`, `create_at`, `update_at`) VALUES
(1, 'Delete Task', '2021-11-16 00:00:00', '2021-11-17 00:00:00', 'planning', 0, '2021-11-16 00:00:00', '2021-11-16 00:00:00'),
(2, 'Update Task', '2021-11-16 21:21:36', '2021-11-17 21:21:00', 'doing', 0, '2021-11-16 21:21:36', '2021-11-16 21:21:36'),
(3, 'insert data test', '2021-11-16 21:21:36', '2021-11-16 21:21:36', 'complete', 0, '2021-11-16 21:22:03', '2021-11-16 21:22:03'),
(4, 'ssdfdsfsbh', '2021-11-25 00:00:00', '2021-11-26 00:00:00', 'planning', 1, '2021-11-18 10:40:53', '2021-11-18 10:40:53'),
(5, 'create DB', '2021-11-16 00:00:00', '2021-11-18 00:00:00', 'complete', 0, '2021-11-18 11:23:39', '2021-11-18 11:23:39'),
(6, 'fsafasfass', '2021-11-18 00:00:00', '2021-11-18 23:00:00', 'planning', 1, '2021-11-18 12:10:48', '2021-11-18 12:10:48'),
(7, 'search by date time', '2021-11-18 00:00:00', '2021-11-23 00:00:00', 'planning', 0, '2021-11-18 12:21:18', '2021-11-18 12:21:18'),
(8, 'Create Task', '2021-11-16 00:00:00', '2021-11-18 00:00:00', 'planning', 0, '2021-11-18 12:21:39', '2021-11-18 12:21:39'),
(9, 'aedsdsad', '2021-11-18 00:00:00', '2021-11-19 00:00:00', 'planning', 1, '2021-11-18 12:23:27', '2021-11-18 12:23:27'),
(10, 'PHP UNIT TEST', '2021-11-18 00:00:00', '2021-11-20 00:00:00', 'doing', 0, '2021-11-18 16:36:12', '2021-11-18 16:36:12'),
(11, 'validate form', '2021-11-17 00:00:00', '2021-11-18 00:00:00', 'complete', 0, '2021-11-18 16:36:37', '2021-11-18 16:36:37'),
(12, 'Css ', '2021-11-17 00:00:00', '2021-11-18 00:00:00', 'doing', 0, '2021-11-18 16:39:49', '2021-11-18 16:39:49'),
(13, 'dâsdas', '2021-11-17 00:00:00', '2021-11-19 00:00:00', 'doing', 1, '2021-11-18 16:40:03', '2021-11-18 16:40:03'),
(14, 'dsadsad', '2021-11-17 00:00:00', '2021-11-19 00:00:00', 'doing', 1, '2021-11-18 16:40:12', '2021-11-18 16:40:12'),
(15, 'Drag and Drop', '2021-11-18 00:00:00', '2021-11-20 00:00:00', 'complete', 0, '2021-11-18 16:40:22', '2021-11-18 16:40:22'),
(16, 'âsasasasasasas dsdadasd', '2021-11-17 00:00:00', '2021-11-19 00:00:00', 'planning', 1, '2021-11-18 16:42:22', '2021-11-18 16:42:22'),
(17, 'sadasdasd', '2021-11-18 00:00:00', '2021-11-18 00:00:00', 'complete', 1, '2021-11-18 16:43:56', '2021-11-18 16:43:56'),
(18, 'dsadas', '2021-11-18 00:00:00', '2021-11-19 00:00:00', 'complete', 1, '2021-11-18 16:44:58', '2021-11-18 16:44:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
