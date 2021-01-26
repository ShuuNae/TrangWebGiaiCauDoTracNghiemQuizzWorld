-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 26, 2021 lúc 07:03 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quizzworld`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `XoaTK` (IN `user` VARCHAR(20))  begin
Delete from ThiSinh where Username = user;
Delete from TaiKhoan where Username = user;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `MaCH` int(11) NOT NULL,
  `NDCH` varchar(1000) NOT NULL,
  `MaPhan` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`MaCH`, `NDCH`, `MaPhan`) VALUES
(1, 'Ba ông ngồi lại một mâm<br>Một ông có tóc, hai ông trọc đầu ?', 'CN'),
(2, 'Của mình mà nói của người <br>Đố ai biết được vàng mười thường cho ?', 'CN'),
(3, 'Có cổ mà không có đầu<br>Xòe như hoa nở một màu hồng tươi<br>Nhưng khi đa nắm lại rồi<br>Tựa quả phật thủ theo người suốt năm ?', 'CN'),
(4, 'Một cây mà có năm cành<br>Giáp nước thì héo, để dành thì tươi ?', 'CN'),
(5, 'Hai cô nằm nghỉ hai phòng<br>Ngày thì mở cửa mà trông ra ngoài<br>Đêm thì đóng kín chẳng ai thấy gì ?', 'CN'),
(6, 'Vừa bằng lá đa đi xa về gần ?', 'CN'),
(7, 'Vừa bằng lá niệt, trông xiết cả trời ?', 'CN'),
(8, 'Vừa bằng bước chân mà bước không qua ?', 'CN'),
(9, 'Vừa bằng trái cau, bu nhau đi trước ?', 'CN'),
(10, 'Vừa bằng điếu thuốc, ngủ ngày ngáy ton ?', 'CN'),
(11, 'Ba tháng cuốn cờ bồng con đỏ<br>Một phen cởi giáp cứu dân đen<br>Là cây gì ?', 'CC'),
(12, 'Bao năm kinh sử dồi mài<br>Anh mong đỗ Trạng, xe về rước em', 'CC'),
(13, 'Bằng đồng tiền nằm nghiêng giữa bụi<br>Là rau gì ?', 'CC'),
(14, 'Bên sông cây đứng đợi đò<br>Ai kêu khắc khoải nhớ làng, nhớ quê<br>Là cây gì ?', 'CC'),
(15, 'Bỏ ngoài nướng trong, ăn ngoài bỏ trong là cái gì?', 'CC'),
(16, 'Buổi xuân xanh người chuộng, kẻ yêu<br>Càng cao danh vọng, càng nhiều gian nan<br>Lòng không dạ đói lang thang<br>Thương người quân tử hai hàng chong chong<br>Đó là cây gì ?', 'CC'),
(17, 'Cà gì không có hột', 'CC'),
(18, 'Cá gì ở trên cây?', 'CC'),
(19, 'Cây cao vòi vọi,<br>Có đọi nước đầu<br>Là cây gì ?', 'CC'),
(20, 'Cây chi có trái không cành<br>Có hai thằng bé rập rình hai bên<br>Là cây gì ?', 'CC'),
(21, 'Loài vật nào sau đây có thể thở bằng mông?', 'LV'),
(22, 'Loài chim nào có khả năng bay ngược?', 'LV'),
(23, 'Loài cá nước ngọt nào là động vật ăn thịt?', 'LV'),
(24, 'Bộ phận nào trên người cá voi xanh nặng xấp xỉ một con voi châu Á?', 'LV'),
(25, 'Cơ quan khứu giác của loài ong mật nằm ở...', 'LV'),
(26, 'Loài vật nào sau đây đạt được khoái cảm khi giao phối?', 'LV'),
(27, 'Con người sẽ chết nếu ăn phải gan của loài động vật nào sau đây?', 'LV'),
(28, 'Bạch tuộc có tất cả bao nhiêu quả tim?', 'LV'),
(29, 'Sản phẩm nào của động vật có hạn sử dụng vĩnh viễn?', 'LV'),
(30, 'Con gì chân ngắn<br>Mà lại có màng<br>Mỏ bẹt màu vàng<br>Hay kêu cạp cạp?', 'LV'),
(31, 'Con sông nào dài nhất bán đảo Đông Dương', 'DS'),
(32, 'Tứ diện có bao nhiêu đường chéo', 'DS'),
(33, 'Rắn có mấy lá phổi', 'DS'),
(34, 'Truyện Kiều có bao nhiêu câu thơ', 'DS'),
(35, 'Hai điểm duy nhất của địa cầu không quay gọi là gì', 'DS'),
(36, 'Loài trăn thường ngủ ở đâu', 'DS'),
(37, 'Nguyên nhân nào gây ra hiện tượng sóng thần ở biển', 'DS'),
(38, 'Loài lưỡng cư nào thường xuất hiện và kêu to sau cơn mưa', 'DS'),
(39, 'Châu lục nào có diện tích lớn nhất', 'DS'),
(40, 'Công thức tính diện tích hình chữ nhật', 'DS'),
(41, 'Mắt cận thị là mắt mà khi không điều tiết có tiêu điểm nằm ở đâu?', 'TH'),
(42, 'Augustin Louis Cauchy là nhà toán học nước nào?', 'TH'),
(43, 'Ở người có bao nhiêu cặp nhiễm sắc thể?', 'TH'),
(44, 'Ban ngày hay ban đêm trái đất quay quanh mặt trời nhanh hơn?', 'TH'),
(45, 'Ai là người đưa ra ba định luật di truyền?', 'TH'),
(46, 'Sóng điện từ có bước sóng từ 100m - 10m được gọi là sóng gì?', 'TH'),
(47, 'Huyện đảo Phú Quốc thuộc tỉnh nào?', 'TH'),
(48, 'Cầu thủ nào đã đạt danh hiệu quả bóng vàng thế giới 2006?', 'TH'),
(49, 'Vị vua nào đã đặt quốc hiệu nước ta là Việt Nam như hiện nay?', 'TH'),
(50, 'Tác phẩm \"Bản án chế độ thực dân\" của Hồ Chí Minh xuất bản lần đầu tiên ở đâu?', 'TH');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dapan`
--

CREATE TABLE `dapan` (
  `MaDA` int(11) NOT NULL,
  `NDDA` varchar(1000) NOT NULL,
  `MaCH` int(11) NOT NULL,
  `DungSai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dapan`
--

INSERT INTO `dapan` (`MaDA`, `NDDA`, `MaCH`, `DungSai`) VALUES
(1, 'A. Đầu, hai đầu gối', 1, 1),
(2, 'B. Đầu, hai củi trỏ', 1, 0),
(3, 'C. Đầu, hai bàn tay', 1, 0),
(4, 'D. Đầu, hai bàn chân', 1, 0),
(5, 'A. Đầu tóc mượn', 2, 1),
(6, 'B. Mắt', 2, 0),
(7, 'C. Miệng', 2, 0),
(8, 'D. Tay', 2, 0),
(9, 'A. Bàn chân', 3, 0),
(10, 'B. Bàn tay', 3, 1),
(11, 'C. Cánh tay', 3, 0),
(12, 'D. Chân', 3, 0),
(13, 'A. Bàn chân', 4, 0),
(14, 'B. Cánh tay', 4, 0),
(15, 'C. Bàn tay', 4, 1),
(16, 'D. Đôi chân', 4, 0),
(17, 'A. Mũi', 5, 0),
(18, 'B. Miệng', 5, 0),
(19, 'C. Đôi mi', 5, 0),
(20, 'D. Đôi mắt', 5, 1),
(21, 'A. Bàn tay', 6, 0),
(22, 'B. Đôi tay', 6, 0),
(23, 'C. Bàn chân', 6, 1),
(24, 'D. Đôi chân', 6, 0),
(25, 'A. Con ngươi', 7, 0),
(26, 'B. Con mắt', 7, 1),
(27, 'C. Miệng', 7, 0),
(28, 'D. Tai', 7, 0),
(29, 'A. Cái tay', 8, 0),
(30, 'B. Cái chân', 8, 0),
(31, 'C. Cái tai', 8, 0),
(32, 'D. Cái bóng', 8, 1),
(33, 'A. Ngón Chân', 9, 1),
(34, 'B. Ngón tay', 9, 0),
(35, 'C. Tai', 9, 0),
(36, 'D. Mũi', 9, 0),
(37, 'A. Ngón chân', 10, 0),
(38, 'B. Tay', 10, 0),
(39, 'C. Ngón Tay', 10, 1),
(40, 'D. Chân', 10, 0),
(41, 'A. Cây chuối', 11, 0),
(42, 'B. Cây ổi', 11, 0),
(43, 'C. Cây bắp', 11, 1),
(44, 'D. Cây nhãn', 11, 0),
(45, 'A. Cây nhãn', 12, 0),
(46, 'B. Cây Trạng Nguyên', 12, 1),
(47, 'C. Cây vải', 12, 0),
(48, 'D. Cây dừa', 12, 0),
(49, 'A. Rau muống', 13, 0),
(50, 'B. Rau dền', 13, 0),
(51, 'C. Rau má', 13, 1),
(52, 'D. Rau đắng', 13, 0),
(53, 'A. Bụi tre', 14, 1),
(54, 'B. Bụi chuối', 14, 0),
(55, 'C. Bụi cỏ', 14, 0),
(56, 'D. Bụi phấn', 14, 0),
(57, 'A. Ổi', 15, 0),
(58, 'B. Dưa', 15, 0),
(59, 'C. Khoai', 15, 0),
(60, 'D. Ngô (bắp)', 15, 1),
(61, 'A. Cây tre', 16, 1),
(62, 'B. Cây ổi', 16, 0),
(63, 'C. Cây dừa', 16, 0),
(64, 'D. Cây vải', 16, 0),
(65, 'A. Cà pháo', 17, 0),
(66, 'B. Cà chua', 17, 0),
(67, 'C. Cà rốt', 17, 1),
(68, 'D. Cà bát', 17, 0),
(69, 'A. Cá quả', 18, 1),
(70, 'B. Cá chép', 18, 0),
(71, 'C. Cá đuối', 18, 0),
(72, 'D. Cá bống', 18, 0),
(73, 'A. Cây cọ', 19, 0),
(74, 'B. Cây nhãn', 19, 0),
(75, 'C. Cây vải', 19, 0),
(76, 'D. Cây dừa', 19, 1),
(77, 'A. Cây ngô', 20, 1),
(78, 'B. Cây đậu', 20, 0),
(79, 'C. Cây sắn', 20, 0),
(80, 'D. Cây đay', 20, 0),
(81, 'A. Kangaroo', 21, 0),
(82, 'B. Rùa', 21, 1),
(83, 'C. Cá mập', 21, 0),
(84, 'D. Chồn hương', 21, 0),
(85, 'A. chim én', 22, 0),
(86, 'B. chim ruồi', 22, 1),
(87, 'C. chim hải âu', 22, 0),
(88, 'D. chim sẻ', 22, 0),
(89, 'A. Cá Piranha', 23, 1),
(90, 'B. Cá chép', 23, 0),
(91, 'C. Cá nóc', 23, 0),
(92, 'D. Cá trê', 23, 0),
(93, 'A. Vây cá', 24, 0),
(94, 'B. Não cá', 24, 0),
(95, 'C. Lưỡi cá', 24, 1),
(96, 'D. Mắt cá', 24, 0),
(97, 'A. Đầu', 25, 0),
(98, 'B. Bụng', 25, 0),
(99, 'C. Râu', 25, 0),
(100, 'D. Chân', 25, 1),
(101, 'A. Ong', 26, 0),
(102, 'B. Ếch', 26, 0),
(103, 'C. Bạch tuộc', 26, 0),
(104, 'D. Cá heo', 26, 1),
(105, 'A. Chim cánh cụt', 27, 0),
(106, 'B. Gấu Bắc Cực', 27, 1),
(107, 'C. Rắn hổ mang', 27, 0),
(108, 'D. Gấu xám', 27, 0),
(109, 'A. 1', 28, 0),
(110, 'B. 2', 28, 0),
(111, 'C. 3', 28, 1),
(112, 'D. 4', 28, 0),
(113, 'A. Mật ong', 29, 1),
(114, 'B. Vỏ ốc', 29, 0),
(115, 'C. Tơ nhện', 29, 0),
(116, 'D. Tơ tằm', 29, 0),
(117, 'A. Con gà', 30, 0),
(118, 'B. Con bò', 30, 0),
(119, 'C. Con vịt', 30, 1),
(120, 'D. Con dê', 30, 0),
(121, 'A. Sông Hồng', 31, 0),
(122, 'B. Sông Thầy', 31, 0),
(123, 'C. Mê Kông', 31, 1),
(124, 'D. Sông Ấn', 31, 0),
(125, 'A. 8', 32, 0),
(126, 'B. 4', 32, 0),
(127, 'C. 2', 32, 0),
(128, 'D. 0', 32, 1),
(129, 'A. 2', 33, 0),
(130, 'B. 4', 33, 0),
(131, 'C. 1', 33, 1),
(132, 'D. 3', 33, 0),
(133, 'A. 3425', 34, 0),
(134, 'B. 3542', 34, 0),
(135, 'C. 3323', 34, 0),
(136, 'D. 3254', 34, 1),
(137, 'A. Địa cực', 35, 1),
(138, 'B. Trục', 35, 0),
(139, 'C. Không có', 35, 0),
(140, 'D. Chỉ có 1 điểm', 35, 0),
(141, 'A. Trên nệm', 36, 0),
(142, 'B. Trên cây', 36, 1),
(143, 'C. Trên đá', 36, 0),
(144, 'D. Trong hang', 36, 0),
(145, 'A. Gió lớn', 37, 0),
(146, 'B. Bão', 37, 0),
(147, 'C. Mưa', 37, 0),
(148, 'D. Động đất', 37, 1),
(149, 'A. Ếch', 38, 0),
(150, 'B. Cóc', 38, 0),
(151, 'C. Nhái', 38, 0),
(152, 'D. Ễnh ương', 38, 1),
(153, 'A. Châu Á', 39, 1),
(154, 'B. Châu Mỹ', 39, 0),
(155, 'C. Châu Phi', 39, 0),
(156, 'D. Châu Âu', 39, 0),
(157, 'A. a+b', 40, 0),
(158, 'B. (a+b)x2', 40, 0),
(159, 'C. a x b', 40, 1),
(160, 'D. a-b', 40, 0),
(161, 'A. Tiêu điểm nằm trước võng mạc', 41, 1),
(162, 'B. Tiêu điểm nằm sau võng mạc', 41, 0),
(163, 'C. Tiêu điểm nằm giữa võng mạc', 41, 0),
(164, 'D. Đáp án khác', 41, 0),
(165, 'A. Đức', 42, 0),
(166, 'B. Anh', 42, 0),
(167, 'C. Pháp', 42, 1),
(168, 'D. Tây Ban Nha', 42, 0),
(169, 'A. 13 cặp', 43, 0),
(170, 'B. 23 cặp', 43, 1),
(171, 'C. 21 cặp', 43, 0),
(172, 'D. 14 cặp', 43, 0),
(173, 'A. Ban ngày', 44, 0),
(174, 'B. Ban đêm', 44, 1),
(175, 'C. Cả ngày và đêm trái đất quay như nhau', 44, 0),
(176, 'D. Đáp án khác', 44, 0),
(177, 'A. Albert Einstein', 45, 0),
(178, 'B. Newton', 45, 0),
(179, 'C. Men - Đen', 45, 1),
(180, 'D. Galilei', 45, 0),
(181, 'A. Sóng siêu ngắn', 46, 0),
(182, 'B. Sóng ngắn', 46, 1),
(183, 'C. Sóng siêu dài', 46, 0),
(184, 'D. Sóng dài', 46, 0),
(185, 'A. Trà Vinh', 47, 0),
(186, 'B. An Giang', 47, 0),
(187, 'C. Cà Mau', 47, 0),
(188, 'D. Kiên Giang', 47, 1),
(189, 'A. Cafu', 48, 0),
(190, 'B. Roberto Carlos', 48, 0),
(191, 'C. Ronaldinho', 48, 0),
(192, 'D. Fabio Canavaro', 48, 1),
(193, 'A. Vua Gia Long', 49, 1),
(194, 'B. Vua Tự Đức', 49, 0),
(195, 'C. Vua Lê', 49, 0),
(196, 'D. Đáp án khác', 49, 0),
(197, 'A. Việt Nam', 50, 0),
(198, 'B. Trung Quốc', 50, 0),
(199, 'C. Pháp', 50, 1),
(200, 'D. Anh', 50, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `STT` int(11) NOT NULL,
  `MaTS` int(11) NOT NULL,
  `MaPhan` varchar(2) DEFAULT NULL,
  `ThoiGian` datetime DEFAULT NULL,
  `KetQua` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan`
--

CREATE TABLE `phan` (
  `MaPhan` varchar(2) NOT NULL,
  `TenPhan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phan`
--

INSERT INTO `phan` (`MaPhan`, `TenPhan`) VALUES
('CC', 'Cây cỏ'),
('CN', 'Con người'),
('DS', 'Đời sống'),
('LV', 'Loài vật'),
('TH', 'Tổng hợp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Username`, `Password`, `IsAdmin`) VALUES
('admin', 'admin', 1),
('nva123', '12345', 0),
('nvb123', '12345', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thisinh`
--

CREATE TABLE `thisinh` (
  `MaTS` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` char(1) DEFAULT 'M',
  `Email` varchar(100) NOT NULL,
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thisinh`
--

INSERT INTO `thisinh` (`MaTS`, `HoTen`, `NgaySinh`, `GioiTinh`, `Email`, `Username`) VALUES
(1, 'Nguyễn Văn A', '1999-05-22', 'M', 'nguyenvana@gmail.com', 'nva123'),
(2, 'Nguyễn Văn B', '1999-06-08', 'M', 'nguyenvanb@gmail.com', 'nvb123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`MaCH`);

--
-- Chỉ mục cho bảng `dapan`
--
ALTER TABLE `dapan`
  ADD PRIMARY KEY (`MaDA`),
  ADD KEY `MaCH` (`MaCH`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `MaTS` (`MaTS`),
  ADD KEY `MaPhan` (`MaPhan`);

--
-- Chỉ mục cho bảng `phan`
--
ALTER TABLE `phan`
  ADD PRIMARY KEY (`MaPhan`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Username`);

--
-- Chỉ mục cho bảng `thisinh`
--
ALTER TABLE `thisinh`
  ADD PRIMARY KEY (`MaTS`),
  ADD KEY `Username` (`Username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `MaCH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `dapan`
--
ALTER TABLE `dapan`
  MODIFY `MaDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thisinh`
--
ALTER TABLE `thisinh`
  MODIFY `MaTS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dapan`
--
ALTER TABLE `dapan`
  ADD CONSTRAINT `dapan_ibfk_1` FOREIGN KEY (`MaCH`) REFERENCES `cauhoi` (`MaCH`);

--
-- Các ràng buộc cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`MaTS`) REFERENCES `thisinh` (`MaTS`),
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`MaPhan`) REFERENCES `phan` (`MaPhan`);

--
-- Các ràng buộc cho bảng `thisinh`
--
ALTER TABLE `thisinh`
  ADD CONSTRAINT `thisinh_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `taikhoan` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
