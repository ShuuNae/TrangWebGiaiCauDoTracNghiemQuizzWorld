-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 26, 2021 lúc 04:37 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quizz_world`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quizz`
--

CREATE TABLE `quizz` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `ansA` text NOT NULL,
  `ansB` text NOT NULL,
  `ansC` text NOT NULL,
  `ansD` text NOT NULL,
  `correct` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quizz`
--

INSERT INTO `quizz` (`id`, `topic_id`, `question`, `ansA`, `ansB`, `ansC`, `ansD`, `correct`) VALUES
(2, 1, 'Ba ông ngồi lại một mâm. Một ông có tóc, hai ông trọc đầu ?', 'Đầu, hai đầu gối', 'Đầu, hai củi trỏ', 'Đầu, hai bàn tay', 'Đầu, hai bàn chân', 'A'),
(3, 2, 'Ba tháng cuốn cờ bồng con đỏ. Một phen cởi giáp cứu dân đen. Là cây gì ?', 'Cây chuối', 'Cây ổi', 'Cây bắp', 'Cây nhãn', 'C');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`id`, `name`, `description`) VALUES
(1, 'Con người', 'Các câu đố về chủ đề con người'),
(2, 'Cây cỏ', 'Các câu hỏi về chủ đề cây cỏ'),
(3, 'Loài vật', 'Các câu hỏi về chủ đề loài vật'),
(4, 'Đời sống', 'Các câu hỏi chủ đề về đời sống'),
(5, 'Tổng hợp', 'Các câu hỏi chủ đề về tổng hợp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `email` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `gender`, `email`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 1, 'admin@email.com', 'admin'),
(2, 'vana', 'vana', 'Văn A', 1, 'Vana@gmail.com', 'user'),
(3, 'vanb', 'vabn', 'vanbb', 2, 'vanb@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_quizzs`
--

CREATE TABLE `user_quizzs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `start_at` datetime NOT NULL,
  `finish_at` datetime NOT NULL,
  `score` float NOT NULL,
  `quizz_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quizz_data`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_topic` (`topic_id`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_quizzs`
--
ALTER TABLE `user_quizzs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_topic2` (`topic_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `quizz`
--
ALTER TABLE `quizz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_quizzs`
--
ALTER TABLE `user_quizzs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `quizz`
--
ALTER TABLE `quizz`
  ADD CONSTRAINT `fk_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_quizzs`
--
ALTER TABLE `user_quizzs`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
