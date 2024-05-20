-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2022 lúc 09:52 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlttn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bailam`
--

CREATE TABLE `bailam` (
  `maTaiKhoan` varchar(255) NOT NULL,
  `maDe` varchar(255) NOT NULL,
  `diem` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bailam`
--

INSERT INTO `bailam` (`maTaiKhoan`, `maDe`, `diem`) VALUES
('hocsinh1@gmail.com', '54049', 2.5),
('L1SV1@gmail.com', '54037', 1.43),
('L1SV2@gmail.com', '54037', 0),
('L2SV2@gmail.com', '54037', 4.29),
('nttnguyen2002@gmail.com', '54037', 1.43),
('sv123@gmail.com', '54033', 2.5),
('sv123@gmail.com', '54035', 5),
('sv123@gmail.com', '54039', 7.5),
('sv123@gmail.com', '54049', 2.5),
('sv123@gmail.com', '54062', 2),
('sv123@gmail.com', '54064', 2),
('sv123@gmail.com', '54080', 6),
('sv123@gmail.com', '54081', 10),
('sv1@gmail.com', '54036', 7.5),
('tunguy12b4thptlh2020@gmail.com', '54037', 2.86);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bode`
--

CREATE TABLE `bode` (
  `maDe` int(255) NOT NULL,
  `tenDe` varchar(255) NOT NULL,
  `maLop` varchar(255) NOT NULL,
  `thoiGianLamBai` int(11) NOT NULL,
  `ngayThi` datetime NOT NULL,
  `daoCauHoi` varchar(11) NOT NULL,
  `xemDiem` varchar(255) NOT NULL,
  `xemDapAn` varchar(255) NOT NULL,
  `loaiDe` varchar(255) NOT NULL DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bode`
--

INSERT INTO `bode` (`maDe`, `tenDe`, `maLop`, `thoiGianLamBai`, `ngayThi`, `daoCauHoi`, `xemDiem`, `xemDapAn`, `loaiDe`) VALUES
(54033, 'Test 1', '8b0xJP5c', 46, '2022-05-15 23:25:00', 'false', '', '', 'default'),
(54034, 'sdfsd', '', 45, '2022-05-15 23:37:00', 'false', '', '', 'default'),
(54035, 'fsdfs', 'PXyiOFlQ', 45, '2022-05-15 23:38:00', 'false', '', '', 'default'),
(54036, 'Bài kiểm tra Web', 'ABC', 45, '2022-05-17 07:20:00', 'false', '', '', 'default'),
(54037, 'Bài kiểm tra 1', 'abcd', 5, '2022-05-17 08:12:00', 'false', '', '', 'default'),
(54038, 'trung', 'abcd', 45, '2022-05-28 09:14:00', 'false', '', '', 'default'),
(54039, 'Kiểm tra giữa kì', '8b0xJP5c', 45, '2022-05-18 10:14:00', 'true', '', '', 'default'),
(54047, 'classs', '8b0xJP5c', 45, '2022-05-21 10:32:00', 'false', '', '', 'default'),
(54048, 'fsdf', '123', 45, '2022-05-21 10:47:00', 'false', '', '', 'default'),
(54049, 'bài 1', '841464_Nhom4', 45, '2022-06-02 15:30:00', 'false', '', '', 'default'),
(54059, '123', '841464_Nhom4', 45, '2022-06-03 16:14:00', 'false', '', '', 'default'),
(54060, '123', '123', 45, '2022-06-20 16:23:00', 'false', '', '', 'pdf'),
(54062, '123', '841464_Nhom4', 45, '2022-06-20 18:54:00', 'false', '', '', 'default'),
(54063, 'sdfsdf', '841464_Nhom4', 45, '2022-06-20 19:08:00', 'false', '', '', 'pdf'),
(54064, '567', '841464_Nhom4', 45, '2022-06-20 19:27:00', 'false', '', '', 'default'),
(54080, 'test', '841464_Nhom4', 120, '2022-06-22 13:30:00', 'false', '', '', 'pdf'),
(54081, 'test2', '841464_Nhom4', 45, '2022-06-22 14:30:00', 'false', '', '', 'pdf');

--
-- Bẫy `bode`
--
DELIMITER $$
CREATE TRIGGER `xóa bài làm` AFTER DELETE ON `bode` FOR EACH ROW DELETE FROM bailam WHERE bailam.maDe not IN (SELECT maDe from bode )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `xóa chi tiết bài làm` AFTER DELETE ON `bode` FOR EACH ROW DELETE FROM chitietbailam WHERE chitietbailam.maDe not IN (SELECT maDe from bode )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `xóa chi tiết bộ đề` AFTER DELETE ON `bode` FOR EACH ROW DELETE FROM chitietbode WHERE chitietbode.maBoDe not IN (SELECT maDe from bode )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi_nganhang`
--

CREATE TABLE `cauhoi_nganhang` (
  `maCau` int(11) NOT NULL,
  `maNhom` varchar(255) DEFAULT NULL,
  `noiDung` varchar(255) DEFAULT NULL,
  `dapAn` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cauhoi_nganhang`
--

INSERT INTO `cauhoi_nganhang` (`maCau`, `maNhom`, `noiDung`, `dapAn`) VALUES
(12001, '42001', 'Phương pháp nhanh nhất để trao đổi dữ liệu giữa các tiến trình là:', 'a'),
(12002, '42001', 'Hai chức năng chính của hệ điều hành là gì?', 'c'),
(12003, '42003', 'Mô hình chức năng của hệ thống (BFD) cho biết?', 'a'),
(12004, '42003', 'Loại biểu đồ nhằm diễn tả một quá trình xử lý thông tin ở mức logic, nhằm trả lời câu hỏi \"Làm gì?\" mà bỏ qua câu hỏi là \"Làm như thế nào\"… là?', 'b'),
(12005, '42003', 'Trong phát triển phần mềm, yếu tố nào quan trọng nhất?', 'a'),
(12006, '42003', 'Kỹ sư phần mềm không cần', 'c'),
(12007, '42004', 'Nguyên nhân cơ bản nào dẫn đến sự  ra đời của mạng máy tính', 'd'),
(12008, '42004', 'Ý nghĩa cơ bản nhất của mạng máy tính là gì?', 'b'),
(12009, '42005', 'Một biến được gọi là biến toàn cục nếu:', 'b'),
(12010, '42005', 'Một biến được gọi là một biến địa phương nếu:', 'a'),
(12029, '42015', 'câu hỏi 1', 'b'),
(12030, '42003', 'k,kpk', 'a'),
(12031, '42003', 'cd', 'b'),
(12032, '42016', 'cd', 'b'),
(12033, '42017', 'cd', 'b'),
(12034, '42018', 'f', 'b'),
(12035, '42019', 'f', 'a'),
(12036, '42020', 'nội dung', 'b');

--
-- Bẫy `cauhoi_nganhang`
--
DELIMITER $$
CREATE TRIGGER `question` AFTER DELETE ON `cauhoi_nganhang` FOR EACH ROW DELETE FROM luachon WHERE maCau not IN (SELECT maCau from cauhoi_nganhang )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbailam`
--

CREATE TABLE `chitietbailam` (
  `maTaiKhoan` varchar(255) NOT NULL,
  `maCau` varchar(255) NOT NULL,
  `maDe` varchar(255) NOT NULL,
  `dapAnChon` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietbailam`
--

INSERT INTO `chitietbailam` (`maTaiKhoan`, `maCau`, `maDe`, `dapAnChon`) VALUES
('hocsinh1@gmail.com', '12001', '54049', ''),
('hocsinh1@gmail.com', '12002', '54049', ''),
('hocsinh1@gmail.com', '12003', '54049', 'a'),
('hocsinh1@gmail.com', '12004', '54049', 'a'),
('L1SV1@gmail.com', '12001', '54037', 'b'),
('L1SV1@gmail.com', '12002', '54037', 'c'),
('L1SV1@gmail.com', '12003', '54037', 'b'),
('L1SV1@gmail.com', '12004', '54037', 'c'),
('L1SV1@gmail.com', '12005', '54037', 'b'),
('L1SV1@gmail.com', '12006', '54037', 'b'),
('L1SV1@gmail.com', '12007', '54037', 'c'),
('L1SV2@gmail.com', '12001', '54037', 'b'),
('L1SV2@gmail.com', '12002', '54037', 'b'),
('L1SV2@gmail.com', '12003', '54037', 'b'),
('L1SV2@gmail.com', '12004', '54037', 'a'),
('L1SV2@gmail.com', '12005', '54037', 'c'),
('L1SV2@gmail.com', '12006', '54037', 'd'),
('L1SV2@gmail.com', '12007', '54037', 'c'),
('L2SV2@gmail.com', '12001', '54037', 'a'),
('L2SV2@gmail.com', '12002', '54037', 'a'),
('L2SV2@gmail.com', '12003', '54037', 'a'),
('L2SV2@gmail.com', '12004', '54037', 'a'),
('L2SV2@gmail.com', '12005', '54037', 'a'),
('L2SV2@gmail.com', '12006', '54037', 'a'),
('L2SV2@gmail.com', '12007', '54037', 'a'),
('nttnguyen2002@gmail.com', '12001', '54037', 'b'),
('nttnguyen2002@gmail.com', '12002', '54037', 'a'),
('nttnguyen2002@gmail.com', '12003', '54037', 'b'),
('nttnguyen2002@gmail.com', '12004', '54037', 'c'),
('nttnguyen2002@gmail.com', '12005', '54037', 'a'),
('nttnguyen2002@gmail.com', '12006', '54037', 'd'),
('nttnguyen2002@gmail.com', '12007', '54037', 'c'),
('sv123@gmail.com', '0', '54080', 'A'),
('sv123@gmail.com', '0', '54081', 'A'),
('sv123@gmail.com', '1', '54080', 'A'),
('sv123@gmail.com', '1', '54081', 'B'),
('sv123@gmail.com', '12001', '54033', 'a'),
('sv123@gmail.com', '12001', '54035', 'a'),
('sv123@gmail.com', '12001', '54039', 'a'),
('sv123@gmail.com', '12001', '54049', 'a'),
('sv123@gmail.com', '12001', '54062', 'a'),
('sv123@gmail.com', '12001', '54064', 'a'),
('sv123@gmail.com', '12002', '54033', 'a'),
('sv123@gmail.com', '12002', '54035', 'b'),
('sv123@gmail.com', '12002', '54039', 'a'),
('sv123@gmail.com', '12002', '54049', 'a'),
('sv123@gmail.com', '12002', '54062', 'a'),
('sv123@gmail.com', '12002', '54064', 'a'),
('sv123@gmail.com', '12003', '54033', ''),
('sv123@gmail.com', '12003', '54035', 'a'),
('sv123@gmail.com', '12003', '54039', 'a'),
('sv123@gmail.com', '12003', '54049', ''),
('sv123@gmail.com', '12003', '54062', ''),
('sv123@gmail.com', '12003', '54064', ''),
('sv123@gmail.com', '12004', '54033', ''),
('sv123@gmail.com', '12004', '54035', ''),
('sv123@gmail.com', '12004', '54039', 'b'),
('sv123@gmail.com', '12004', '54049', ''),
('sv123@gmail.com', '12004', '54062', ''),
('sv123@gmail.com', '12004', '54064', ''),
('sv123@gmail.com', '12005', '54062', ''),
('sv123@gmail.com', '12005', '54064', ''),
('sv123@gmail.com', '2', '54080', 'B'),
('sv123@gmail.com', '2', '54081', 'C'),
('sv123@gmail.com', '3', '54080', 'A'),
('sv123@gmail.com', '3', '54081', 'D'),
('sv123@gmail.com', '4', '54080', 'B'),
('sv123@gmail.com', '4', '54081', 'D'),
('sv123@gmail.com', '5', '54080', 'C'),
('sv123@gmail.com', '5', '54081', 'C'),
('sv123@gmail.com', '6', '54080', 'A'),
('sv123@gmail.com', '6', '54081', 'B'),
('sv123@gmail.com', '7', '54080', 'B'),
('sv123@gmail.com', '7', '54081', 'A'),
('sv123@gmail.com', '8', '54080', 'C'),
('sv123@gmail.com', '8', '54081', ''),
('sv123@gmail.com', '9', '54080', 'D'),
('sv1@gmail.com', '12001', '54036', 'a'),
('sv1@gmail.com', '12002', '54036', 'a'),
('sv1@gmail.com', '12005', '54036', 'a'),
('sv1@gmail.com', '12010', '54036', 'a'),
('tunguy12b4thptlh2020@gmail.com', '12001', '54037', 'c'),
('tunguy12b4thptlh2020@gmail.com', '12002', '54037', 'c'),
('tunguy12b4thptlh2020@gmail.com', '12003', '54037', 'c'),
('tunguy12b4thptlh2020@gmail.com', '12004', '54037', 'c'),
('tunguy12b4thptlh2020@gmail.com', '12005', '54037', 'c'),
('tunguy12b4thptlh2020@gmail.com', '12006', '54037', 'c'),
('tunguy12b4thptlh2020@gmail.com', '12007', '54037', 'c');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbode`
--

CREATE TABLE `chitietbode` (
  `maCau` varchar(255) NOT NULL,
  `maBoDe` varchar(255) NOT NULL,
  `dapAn` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietbode`
--

INSERT INTO `chitietbode` (`maCau`, `maBoDe`, `dapAn`) VALUES
('0', '54080', 'A'),
('0', '54081', 'A'),
('1', '54080', 'A'),
('1', '54081', 'B'),
('12001', '54033', NULL),
('12001', '54034', NULL),
('12001', '54035', NULL),
('12001', '54036', NULL),
('12001', '54037', NULL),
('12001', '54038', NULL),
('12001', '54039', NULL),
('12001', '54047', NULL),
('12001', '54048', NULL),
('12001', '54049', NULL),
('12001', '54059', NULL),
('12001', '54062', NULL),
('12001', '54064', NULL),
('12002', '54033', NULL),
('12002', '54034', NULL),
('12002', '54035', NULL),
('12002', '54036', NULL),
('12002', '54037', NULL),
('12002', '54038', NULL),
('12002', '54039', NULL),
('12002', '54047', NULL),
('12002', '54048', NULL),
('12002', '54049', NULL),
('12002', '54059', NULL),
('12002', '54062', NULL),
('12002', '54064', NULL),
('12003', '54033', NULL),
('12003', '54034', NULL),
('12003', '54035', NULL),
('12003', '54037', NULL),
('12003', '54038', NULL),
('12003', '54039', NULL),
('12003', '54047', NULL),
('12003', '54048', NULL),
('12003', '54049', NULL),
('12003', '54059', NULL),
('12003', '54062', NULL),
('12003', '54064', NULL),
('12004', '54033', NULL),
('12004', '54034', NULL),
('12004', '54035', NULL),
('12004', '54037', NULL),
('12004', '54038', NULL),
('12004', '54039', NULL),
('12004', '54049', NULL),
('12004', '54059', NULL),
('12004', '54062', NULL),
('12004', '54064', NULL),
('12005', '54036', NULL),
('12005', '54037', NULL),
('12005', '54059', NULL),
('12005', '54062', NULL),
('12005', '54064', NULL),
('12006', '54037', NULL),
('12007', '54037', NULL),
('12010', '54036', NULL),
('2', '54080', 'B'),
('2', '54081', 'C'),
('3', '54080', 'A'),
('3', '54081', 'D'),
('4', '54080', 'B'),
('4', '54081', 'D'),
('5', '54080', 'C'),
('5', '54081', 'C'),
('6', '54080', 'D'),
('6', '54081', 'B'),
('7', '54080', 'A'),
('7', '54081', 'A'),
('8', '54080', 'B'),
('8', '54081', ''),
('9', '54080', 'C');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietlop`
--

CREATE TABLE `chitietlop` (
  `maLop` varchar(255) NOT NULL,
  `maTaiKhoan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietlop`
--

INSERT INTO `chitietlop` (`maLop`, `maTaiKhoan`) VALUES
('841464_Nhom4', 'hocsinh1@gmail.com'),
('abcd', 'L1SV1@gmail.com'),
('abcd', 'L1SV2@gmail.com'),
('abcd', 'L1SV3@gmail.com'),
('abcd', 'L2SV2@gmail.com'),
('abcd', 'nttnguyen2002@gmail.com'),
('841464_Nhom4', 'sv123@gmail.com'),
('8b0xJP5c', 'sv123@gmail.com'),
('abcd', 'sv123@gmail.com'),
('PXyiOFlQ', 'sv123@gmail.com'),
('8b0xJP5c', 'sv12@gmail.com'),
('ABC', 'sv1@gmail.com'),
('PXyiOFlQ', 'sv1@gmail.com'),
('8b0xJP5c', 'sv2@gmail.com'),
('ABC', 'sv2@gmail.com'),
('abcd', 'sv2@gmail.com'),
('PXyiOFlQ', 'sv2@gmail.com'),
('841464_Nhom4', 'sv3@gmail.com'),
('8b0xJP5c', 'sv3@gmail.com'),
('ABC', 'sv3@gmail.com'),
('abcd', 'sv3@gmail.com'),
('PXyiOFlQ', 'sv3@gmail.com'),
('841464_Nhom4', 'sv4@gmail.com'),
('8b0xJP5c', 'sv4@gmail.com'),
('ABC', 'sv4@gmail.com'),
('abcd', 'sv4@gmail.com'),
('PXyiOFlQ', 'sv4@gmail.com'),
('841464_Nhom4', 'sv5@gmail.com'),
('8b0xJP5c', 'sv5@gmail.com'),
('PXyiOFlQ', 'sv5@gmail.com'),
('123', 'sv6@gmail.com'),
('841464_Nhom4', 'sv6@gmail.com'),
('8b0xJP5c', 'sv6@gmail.com'),
('PXyiOFlQ', 'sv6@gmail.com'),
('123', 'sv7@gmail.com'),
('841464_Nhom4', 'sv7@gmail.com'),
('8b0xJP5c', 'sv7@gmail.com'),
('PXyiOFlQ', 'sv7@gmail.com'),
('123', 'sv8@gmail.com'),
('841464_Nhom4', 'sv8@gmail.com'),
('8b0xJP5c', 'sv8@gmail.com'),
('123', 'sv9@gmail.com'),
('841464_Nhom4', 'sv9@gmail.com'),
('8b0xJP5c', 'sv9@gmail.com'),
('abcd', 'tunguy12b4thptlh2020@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `maLop` varchar(255) NOT NULL,
  `tenLop` varchar(255) DEFAULT NULL,
  `ThongTin` varchar(255) NOT NULL,
  `maGiangVien` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`maLop`, `tenLop`, `ThongTin`, `maGiangVien`) VALUES
('123', 'test', '123', 'nguyntrung291@gmail.com'),
('841464_Nhom4', 'Lập trình web và ứng dụng nâng cao', '', 'nguyntrung291@gmail.com'),
('8b0xJP5c', 'Lớp 3', 'Lớp 2', 'nguyntrung291@gmail.com'),
('ABC', 'ABC', '', 'thanhsang@sgu.edu.vn'),
('abcd', 'lớp 1', '', 'trung@gmail.com'),
('HxWayMjv', 'Lớp 1', '', 'gv1@gmail.com'),
('lDBF7QAd', 'lớp 2', '', 'trung@gmail.com'),
('PXyiOFlQ', 'Lớp 4', 'eqwqw', 'gv1@gmail.com'),
('QNpKqgPF', 'Lớp 1', '', 'gv1@gmail.com'),
('zKHkKsdR', 'ds', 'csd', 'nguyntrung291@gmail.com');

--
-- Bẫy `lop`
--
DELIMITER $$
CREATE TRIGGER `test` AFTER DELETE ON `lop` FOR EACH ROW DELETE FROM chitietlop WHERE maLop not IN (SELECT maLop from lop )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luachon`
--

CREATE TABLE `luachon` (
  `maLuaChon` varchar(255) NOT NULL,
  `maCau` varchar(255) NOT NULL,
  `noiDung` varchar(255) DEFAULT NULL,
  `laDapAn` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `luachon`
--

INSERT INTO `luachon` (`maLuaChon`, `maCau`, `noiDung`, `laDapAn`) VALUES
('a', '12001', 'A.Vùng nhớ chia sẽ', 1),
('a', '12002', 'A.Quản lý; phân phối tài nguyên đảm bảo đồng nhất dữ liệu', 0),
('a', '12003', 'A.Hệ thống thực hiện những công việc gì?', 1),
('a', '12004', 'A. Biểu đồ phân tích', 0),
('a', '12005', 'A. Con người.', 1),
('a', '12006', 'A. Kiến thức về phân tích thiết kế hệ thống.', 0),
('a', '12007', 'A. Nhu cầu trao đổi thông tin ngày càng tăng', 0),
('a', '12008', 'A. Nâng cao độ tin cậy của hệ thống máy tính', 0),
('a', '12009', 'A. Nó được khai báo tất cả các hàm, ngoại trừ hàm main ().', 0),
('a', '12010', 'A. Nó được khai báo bên trong các hàm hoặc thủ tục, kể cả hàm main ().', 1),
('a', '12029', 'câu a', 0),
('a', '12030', ',l', 1),
('a', '12031', 'cd', 0),
('a', '12032', 'cd', 0),
('a', '12033', 'cd', 0),
('a', '12034', 'f', 0),
('a', '12035', 'f', 1),
('a', '12036', '1', 0),
('b', '12001', 'B. Trao đổi thông điệp', 0),
('b', '12002', 'B.Quản lý; chia sẻ tài nguyên', 0),
('b', '12003', 'B.Mô hình dữ liệu của hệ thống?', 0),
('b', '12004', 'B. Biểu đồ luồng dữ liệu ', 1),
('b', '12005', 'B. Quy trình', 0),
('b', '12006', 'B. Kiến thức về cơ sở dữ liệu.', 0),
('b', '12007', 'B. Khối lượng thông tin lưu trên máy tính ngày càng tăng', 0),
('b', '12008', 'B. Trao đổi và chia sẻ thông tin', 1),
('b', '12009', 'B. Nó được khai báo ngoài tất cả các hàm kể cả hàm main ().', 1),
('b', '12010', 'B. Nó đươc khai báo bên trong các hàm ngoại trừ hàm main ().', 0),
('b', '12029', 'câu b', 1),
('b', '12030', 'x', 0),
('b', '12031', 'c', 1),
('b', '12032', 'c', 1),
('b', '12033', 'c', 1),
('b', '12034', 'f', 1),
('b', '12035', 'f', 0),
('b', '12036', '11', 1),
('c', '12001', 'C. Pipe', 0),
('c', '12002', 'C.Quản lý; chia sẻ tài nguyên; giả lập một máy tính mở rộng', 1),
('c', '12003', 'C.Qúa trình xử lý của hệ thống?', 0),
('c', '12004', 'C. Biểu đồ tổng quát', 0),
('c', '12005', 'C. Sản phầm.', 0),
('c', '12006', 'C. Lập trình thành thạo bằng một ngôn ngữ lập trình. ', 1),
('c', '12007', 'C. Khoa học và công nghệ về lĩnh vực máy tính và truyền thông phát triển', 0),
('c', '12008', 'C. Phát triển ứng dụng trên máy tính ', 0),
('c', '12009', 'C. Nó được khai báo bên ngoài hàm main ().', 0),
('c', '12010', 'C. Nó được khai báo bên trong hàm main ().', 0),
('c', '12029', 'câu c', 0),
('c', '12030', 'xx', 0),
('c', '12031', 'c', 0),
('c', '12032', 'c', 0),
('c', '12033', 'c', 0),
('c', '12034', 'f', 0),
('c', '12035', 'f', 0),
('c', '12036', '1', 0),
('d', '12001', 'D. Sockets', 0),
('d', '12002', 'D.Che dấu các chi tiết phần cứng; cung cấp một máy tính mở rộng', 0),
('d', '12003', 'D.Lựa chọn khác', 0),
('d', '12004', 'D. Biểu đồ thực thể kết hợp', 0),
('d', '12005', 'D. Thời gian.', 0),
('d', '12006', 'D. Kinh nghiệm quản lý dự án phần mềm.', 0),
('d', '12007', 'D. Cả ba câu trên đúng', 1),
('d', '12008', 'D. Nâng cao chất lượng khai thác thông tin', 0),
('d', '12009', 'D.  Nó được khai báo bên trong hàm main ().', 0),
('d', '12010', 'D. Nó được khai báo bên ngoài các hàm kể cả hàm main ().', 0),
('d', '12029', 'câu d', 0),
('d', '12030', 'x', 0),
('d', '12031', 'c', 0),
('d', '12032', 'c', 0),
('d', '12033', 'c', 0),
('d', '12034', 'f', 0),
('d', '12035', 'f', 0),
('d', '12036', '1', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomcauhoi`
--

CREATE TABLE `nhomcauhoi` (
  `maNhomCauHoi` int(11) NOT NULL,
  `tenNhomCauHoi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhomcauhoi`
--

INSERT INTO `nhomcauhoi` (`maNhomCauHoi`, `tenNhomCauHoi`) VALUES
(42001, 'Hệ điều hành'),
(42003, 'Phân tích thiết kế hệ thống thông tin'),
(42004, 'Công nghệ phần mềm'),
(42005, 'Mạng máy tính'),
(42006, 'Kỹ thuật lập trình'),
(42013, 'tesst'),
(42015, 'nhóm 1'),
(42016, 'cd'),
(42017, 'cd'),
(42018, 'f'),
(42019, 'f'),
(42020, 'abc');

--
-- Bẫy `nhomcauhoi`
--
DELIMITER $$
CREATE TRIGGER `QuestionGroup` AFTER DELETE ON `nhomcauhoi` FOR EACH ROW DELETE FROM cauhoi_nganhang WHERE cauhoi_nganhang.maNhom not in (SELECT maNhomCauHoi FROM nhomcauhoi)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `maReport` int(255) NOT NULL,
  `maGv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieuDe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noiDung` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `trangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`maReport`, `maGv`, `tieuDe`, `noiDung`, `thoiGian`, `trangThai`) VALUES
(73005, 'nguyntrung291@gmail.com', 'ừ', 'fwe', '2022-06-02 16:25:28', 1),
(73006, 'nguyntrung291@gmail.com', 'vsdvs', '', '2022-06-02 16:28:52', 1),
(73007, 'nguyntrung291@gmail.com', '   vds', 'vsdvs', '2022-06-02 16:30:31', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `loaiTk` varchar(255) DEFAULT NULL,
  `hoten` varchar(255) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sdt` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `maCanhan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`mail`, `password`, `loaiTk`, `hoten`, `ngaysinh`, `sdt`, `active`, `maCanhan`) VALUES
('abc123@gmail.com', '11111111', 'gv', 'Thành Trung', '2022-05-03', '0774112237', 1, '1000'),
('abc@gmail.com', '12345678', 'gv', 'abc', '2022-05-10', '0909626952', 1, '1001'),
('admin@gmail.com', '12345678', 'admin', 'admin', NULL, NULL, 1, '1002'),
('cd@g.com', '11111111', 'gv', 'cd', '2022-05-05', '0774112237', 1, '1003'),
('gv1@gmail.com', '11111111', 'gv', 'Thành Trung', '2022-05-15', '0774112237', 1, '1004'),
('hocsinh1@gmail.com', '11111111', 'sv', 'Nguyễn Thành trung', '2022-04-26', '0774112237', 1, '1005'),
('L1SV1@gmail.com', '123456789', 'sv', 'alo alo', '2022-05-17', '0847914186', 1, '1006'),
('L1SV2@gmail.com', '1234567890', 'sv', 'L1SV2', '2002-09-09', '0342876917', 1, '1007'),
('L1SV3@gmail.com', '123456789', 'sv', 'kienai', '2022-05-17', '0356782440', 1, '1008'),
('L2SV2@gmail.com', '123123123', 'sv', 'L2SV2', '2022-05-05', '0917178990', 1, '1009'),
('minhquan@gmail.com', 'quan1234', 'sv', 'hoang trieu minh quan', '2002-05-31', '0908736148', 1, '1010'),
('nguyntrung222291@gmail.com', '11111111', 'gv', 'Thành Trung', '2022-04-05', '0774112237', 1, '1011'),
('nguyntrung291@gmail.com', '11111111', 'gv', 'trung', '2022-03-28', '0774112237', 1, '1012'),
('nguyntrung2922322231@gmail.com', '11111111', 'sv', 'trung', '2022-04-09', '0774112237', 1, '1013'),
('nguyntrung2922331@gmail.com', '11111111', 'sv', 'trung', '2022-04-09', '0774112237', 1, '1014'),
('nguyntrung2rrrrr91@gmail.com', '11111111', 'sv', 'ẻgerge', '2022-04-13', '0774112237', 1, '1015'),
('nguyntrung@gmail.com', '11111111', 'sv', 'trung', '2022-04-12', '0774112237', 1, '1016'),
('nttnguyen2002@gmail.com', 'dangki123', 'sv', 'L2SV2@gmail.com', '2002-07-19', '0956516515', 1, '1017'),
('sv10@gmail.com', '11111111', 'sv', 'sv10', '2022-04-21', '0774112237', 1, '1018'),
('sv11@gmail.com', '11111111', 'sv', 'sv11', '2022-04-21', '0774112237', 1, '1019'),
('sv123@gmail.com', '11111111', 'sv', 'Thành Trung', '2022-05-10', '0774112237', 1, '1020'),
('sv12@gmail.com', '11111111', 'sv', 'sv12', '2022-04-21', '0774112237', 1, '1021'),
('sv1@gmail.com', '11111111', 'sv', 'sv1', '2022-04-21', '0774112237', 1, '1022'),
('sv2@gmail.com', '11111111', 'sv', 'sv2', '2022-04-21', '0774112237', 1, '1023'),
('sv3@gmail.com', '11111111', 'sv', 'sv3', '2022-04-21', '0774112237', 1, '1024'),
('sv4@gmail.com', '11111111', 'sv', 'sv4', '2022-04-21', '0774112237', 1, '1025'),
('sv5@gmail.com', '11111111', 'sv', 'sv5', '2022-04-21', '0774112237', 1, '1026'),
('sv6@gmail.com', '11111111', 'sv', 'sv6', '2022-04-21', '0774112237', 1, '1027'),
('sv7@gmail.com', '11111111', 'sv', 'sv7', '2022-04-21', '0774112237', 1, '1028'),
('sv8@gmail.com', '11111111', 'sv', 'sv8', '2022-04-21', '0774112237', 1, '1029'),
('sv9@gmail.com', '11111111', 'sv', 'sv9', '2022-04-21', '0774112237', 1, '1030'),
('test1@gmail.com', '11111111', 'gv', 'test1', '2022-05-18', '0774112237', 0, '12345'),
('thanhsang@sgu.edu.vn', '12345678', 'gv', 'Nguyễn Thanh Sang', '2022-05-12', '0909626954', 1, ''),
('thanhtien@gmail.com', '11111111', 'gv', 't', '2002-12-11', '0862106951', 1, ''),
('thanhtiens@gmail.com', '123456789', 'sv', 's', '2002-12-11', '0862106951', 1, ''),
('trung@gmail.com', '11111111', 'gv', 'Thành Trung', '2022-06-03', '0774112238', 1, ''),
('tunguy12b4thptlh2020@gmail.com', '123456789', 'sv', 'alo alo', '2022-05-04', '0847914186', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `idNotice` int(255) NOT NULL,
  `idClass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`idNotice`, `idClass`, `title`, `notice`, `date`) VALUES
(11009, '8b0xJP5c', '1', 'Nguyen thanh turng\nfwefhiweh', '2022-05-21 14:33:00'),
(11012, '', 'dsf', 'fsd', '2022-05-21 03:05:39'),
(11013, '', 'czx', 'cz', '2022-05-21 03:08:41'),
(11015, '8b0xJP5c', 'fds', 'cds', '2022-05-21 13:57:10'),
(11016, '8b0xJP5c', 'vsd', 'fds', '2022-05-21 13:51:25'),
(11017, '8b0xJP5c', 'vsd', 'vsd', '2022-05-21 03:42:02'),
(11018, '8b0xJP5c', 'sdv', 'vsd', '2022-05-21 03:42:53'),
(11019, '8b0xJP5c', 'cds', 'csdcdssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2022-05-21 03:46:00'),
(11020, '8b0xJP5c', 'cds', 'csdc', '2022-05-21 03:47:00'),
(11021, '', 'sd', 'csd', '2022-05-21 03:51:32'),
(11022, '', 'sd', 'csd', '2022-05-21 03:51:46'),
(11023, '123', 'fwe', 'fwe', '2022-05-21 03:58:50'),
(11024, '123', 'vsd', 'vsd', '2022-05-21 04:00:48'),
(11025, '8b0xJP5c', 'h', 'joj', '2022-05-21 13:52:07'),
(11026, '841464_Nhom4', 'tiêu đề', 'nội dung', '2022-05-28 04:15:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bailam`
--
ALTER TABLE `bailam`
  ADD PRIMARY KEY (`maTaiKhoan`,`maDe`);

--
-- Chỉ mục cho bảng `bode`
--
ALTER TABLE `bode`
  ADD PRIMARY KEY (`maDe`);

--
-- Chỉ mục cho bảng `cauhoi_nganhang`
--
ALTER TABLE `cauhoi_nganhang`
  ADD PRIMARY KEY (`maCau`);

--
-- Chỉ mục cho bảng `chitietbailam`
--
ALTER TABLE `chitietbailam`
  ADD PRIMARY KEY (`maTaiKhoan`,`maCau`,`maDe`);

--
-- Chỉ mục cho bảng `chitietbode`
--
ALTER TABLE `chitietbode`
  ADD PRIMARY KEY (`maCau`,`maBoDe`);

--
-- Chỉ mục cho bảng `chitietlop`
--
ALTER TABLE `chitietlop`
  ADD PRIMARY KEY (`maTaiKhoan`,`maLop`) USING BTREE;

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`maLop`);

--
-- Chỉ mục cho bảng `luachon`
--
ALTER TABLE `luachon`
  ADD PRIMARY KEY (`maLuaChon`,`maCau`);

--
-- Chỉ mục cho bảng `nhomcauhoi`
--
ALTER TABLE `nhomcauhoi`
  ADD PRIMARY KEY (`maNhomCauHoi`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`maReport`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`mail`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`idNotice`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bode`
--
ALTER TABLE `bode`
  MODIFY `maDe` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54082;

--
-- AUTO_INCREMENT cho bảng `cauhoi_nganhang`
--
ALTER TABLE `cauhoi_nganhang`
  MODIFY `maCau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12037;

--
-- AUTO_INCREMENT cho bảng `nhomcauhoi`
--
ALTER TABLE `nhomcauhoi`
  MODIFY `maNhomCauHoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42021;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `maReport` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73008;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `idNotice` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11027;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
