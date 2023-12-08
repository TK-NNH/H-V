-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2023 lúc 02:44 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `h&v`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `idnguoidung` int(11) NOT NULL,
  `iddichvu` int(11) NOT NULL,
  `ngaybinhluan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `idnguoidung`, `iddichvu`, `ngaybinhluan`) VALUES
(15, 'dich vu tot\r\n', 1, 15, '2023-11-22 00:00:00'),
(17, 'Dich vu tot', 1, 15, '2023-11-22 00:00:00'),
(18, 'Dich vu tot', 1, 15, '2023-11-22 00:00:00'),
(19, 'Dich vu tot', 1, 15, '2023-11-22 00:00:00'),
(20, 'dichvutot', 1, 15, '2023-11-22 00:00:00'),
(21, 'dich vu tot', 2, 15, '2023-11-22 00:00:00'),
(22, 'dich vu tot', 0, 12, '2023-11-24 00:00:00'),
(23, 'phục vụ nhiệt tình', 0, 12, '2023-11-24 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coso`
--

CREATE TABLE `coso` (
  `MaCoSo` int(11) NOT NULL,
  `TenCoSo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MaNhanVien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `coso`
--

INSERT INTO `coso` (`MaCoSo`, `TenCoSo`, `DiaChi`, `MaNhanVien`) VALUES
(1, 'Sơn Tây', 'Sơn Tây', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datlich`
--

CREATE TABLE `datlich` (
  `MaDatLich` int(11) NOT NULL,
  `MaThuCung` int(11) DEFAULT NULL,
  `MaLichHen` int(11) DEFAULT NULL,
  `MaCoSo` int(11) DEFAULT NULL,
  `MaDichVu` int(11) DEFAULT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `MaDichVu` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `icon2` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `Gia` decimal(10,0) DEFAULT NULL,
  `MaCoSo` int(11) DEFAULT NULL,
  `trangthai` int(4) NOT NULL,
  `thoigiandukien` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`MaDichVu`, `name`, `img`, `icon`, `icon2`, `MoTa`, `Gia`, `MaCoSo`, `trangthai`, `thoigiandukien`) VALUES
(12, 'Cắt tóc', 'services-1.jpg', 'services-1.png', 'services-7.png', '\"Dịch vụ Cắt Tóc\" tại salon cắt tóc của chúng tôi là một trải nghiệm thời trang và phong cách đẳng cấp. Chúng tôi tự hào giới thiệu cho bạn những kiểu tóc hàng đầu theo xu hướng mới nhất. Đội ngũ thợ làm tóc chuyên nghiệp của chúng tôi sẽ tư', 50000, NULL, 0, '30 phút'),
(13, 'Gội đầu', 'services-2.jpg', 'services-2.png', 'services-8.png', 'Dịch vụ gội đầu là một quy trình làm đẹp cho tóc và da đầu, trong đó tóc được gội sạch bằng shampoo và nước ấm, sau đó được xả sạch. Quá trình này giúp loại bỏ bụi bẩn, dầu thừa, và tế bào chết trên da đầu, đồng thời tạo cảm giác thư giãn và sảng khoái. D', 50000, NULL, 0, '30 phút'),
(14, 'Nhuộm tóc', 'services-3.jpg', 'services-3.png', 'services-9.png', '\"Dịch vụ Nhuộm Tóc\" là một quy trình thẩm mỹ chuyên nghiệp tại salon cắt tóc của chúng tôi, giúp bạn thay đổi hoặc cải thiện màu sắc của mái tóc của mình. Chúng tôi cung cấp một loạt các tùy chọn màu sắc và hiệu ứng, từ tông màu tự nhiên đến các màu sắc s', 150000, NULL, 0, '60 phút'),
(15, 'Cắt tỉa lông mặt', 'services-4.jpg', 'services-4.png', 'services-10.png', 'Dịch vụ \"Cắt tỉa lông mặt\" là một phần quan trọng của trải nghiệm tại salon cắt tóc của chúng tôi. Chúng tôi cung cấp dịch vụ này để giữ cho râu và móng tay của bạn luôn trong tình trạng sạch sẽ, chỉnh chu và bảo quản phong cách. Đội ngũ chuyên gia của ch', 25000, NULL, 1, '25 phút'),
(16, 'Cạo râu', 'services-5.jpg', 'services-5.png', 'services-11.png', 'Dịch vụ Cạo râu cho web cắt tóc là một trang web hoặc ứng dụng di động cung cấp dịch vụ cắt tóc và cạo râu cho nam giới. Khách hàng có thể đặt lịch hẹn trực tuyến và chọn từ các loại kiểu tóc và cạo râu khác nhau. Các thợ làm đẹp chuyên nghiệp sẽ đến tận ', 25000, NULL, 0, '25 phút'),
(32, 'COMBO CẮT + GỘI', '', '', '', '1', 100000, NULL, 3, '60 phút'),
(33, 'COMBO CẮT + CẠO ', '', '', '', '', 65000, NULL, 3, '50 phút'),
(34, 'COMBO GỘI + NHUỘM', '', '', '', '', 150000, NULL, 3, '120 phút'),
(35, 'KID COMBO ( Cắt + Tạo kiểu )', '', '', '', '', 40000, NULL, 3, '40 phút');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DienThoai` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhen`
--

CREATE TABLE `lichhen` (
  `MaLichHen` int(11) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ThoiGianDat` varchar(255) DEFAULT NULL,
  `Gio` varchar(255) NOT NULL,
  `DichVu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `thoigiandukien` varchar(255) NOT NULL,
  `TrangThai` int(1) DEFAULT NULL,
  `MaKhachHang` int(11) DEFAULT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `Ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichhen`
--

INSERT INTO `lichhen` (`MaLichHen`, `sdt`, `email`, `ThoiGianDat`, `Gio`, `DichVu`, `Gia`, `thoigiandukien`, `TrangThai`, `MaKhachHang`, `MaNhanVien`, `Ten`) VALUES
(8, '0398455982', 'huynnph34448@fpt.edu.vn', '2023-11-30 13:00PM-13:30PM', '13:00PM-13:30PM', 'Cắt tỉa lông mặt', 25000, '25 phút ', 2, 8, NULL, 'Huynnph34448'),
(9, '0398455982', 'huynnph34448@fpt.edu.vn', '2023-11-30 10:00AM-10:30AM', '10:00AM-10:30AM', 'Nhuộm tóc', 150000, '60 phút ', 1, 8, NULL, 'Huynnph34448'),
(33, '0398455982', 'vipdktq@gmail.com', '2023-12-04 09:30AM', '09:30AM', 'COMBO CẮT + GỘI', 100000, '60 phút ', 0, 8, NULL, 'Nguyễn Như Huy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `loinhan` varchar(255) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `name`, `email`, `sdt`, `loinhan`, `thoigian`) VALUES
(2, 'a', 'a', 'a', 'a', '2023-12-05 20:33:50'),
(3, 'Nguyễn Như Huy', 'vipdktq@gmail.com', '0398455982', 'a', '2023-12-05 20:43:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoiDung` int(11) NOT NULL,
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `Sdt` varchar(20) NOT NULL,
  `MaVaiTro` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaNguoiDung`, `user`, `pass`, `email`, `Sdt`, `MaVaiTro`) VALUES
(1, 'huynn', '123456', 'vipdktq@gmail.com', '0398455982', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `TenNhanVien` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ChuyenMon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MaCoSo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `tel`, `role`) VALUES
(1, 'Admin', '123456', 'admin@fpt.edu.vn', NULL, 1),
(2, 'Hoàng Long', '123456', 'longhh7@fpt.edu.vn', NULL, 2),
(3, 'Thành Trung', '1234565', 'trungnt173@fpt.edu.vn', NULL, 2),
(4, 'TK NNH', '123456', 'huynnph34448@fpt.edu.vn', NULL, 0),
(7, 'vu', '123456', 'huynnph34448@fpt.edu.vn', NULL, 1),
(8, 'huynn', '123456', 'vipdktq@gmail.com', '0398455982', 0),
(13, 'huy12', '123456', 'vipdktq@gmail.com', '0398455982', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
--

CREATE TABLE `vnpay` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sotien` decimal(10,0) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `magiaodichVNPAY` varchar(255) NOT NULL,
  `manganhang` varchar(255) NOT NULL,
  `thoigianthanhtoan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vnpay`
--

INSERT INTO `vnpay` (`id`, `hoten`, `sotien`, `noidung`, `magiaodichVNPAY`, `manganhang`, `thoigianthanhtoan`) VALUES
(27, 'NGUYEN VAN A', 10000, 'Thanh toán hóa đơn', '14217096', 'NCB', '2023-12-04 18:51:40'),
(28, 'NGUYEN VAN A', 10000, 'Thanh toán hóa đơn', '14217138', 'NCB', '2023-12-04 19:23:44');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coso`
--
ALTER TABLE `coso`
  ADD PRIMARY KEY (`MaCoSo`),
  ADD KEY `FK_CoSo_NhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `datlich`
--
ALTER TABLE `datlich`
  ADD PRIMARY KEY (`MaDatLich`),
  ADD KEY `MaThuCung` (`MaThuCung`),
  ADD KEY `MaLichHen` (`MaLichHen`),
  ADD KEY `datlich_ibfk_3` (`MaCoSo`),
  ADD KEY `datlich_ibfk_4` (`MaDichVu`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MaDichVu`),
  ADD KEY `FK_DichVu_CoSo` (`MaCoSo`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `lichhen`
--
ALTER TABLE `lichhen`
  ADD PRIMARY KEY (`MaLichHen`),
  ADD KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `FK_LichHen_NhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaNguoiDung`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD KEY `FK_NhanVien_CoSo` (`MaCoSo`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `coso`
--
ALTER TABLE `coso`
  MODIFY `MaCoSo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `datlich`
--
ALTER TABLE `datlich`
  MODIFY `MaDatLich` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `MaDichVu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lichhen`
--
ALTER TABLE `lichhen`
  MODIFY `MaLichHen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `coso`
--
ALTER TABLE `coso`
  ADD CONSTRAINT `FK_CoSo_NhanVien` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`);

--
-- Các ràng buộc cho bảng `datlich`
--
ALTER TABLE `datlich`
  ADD CONSTRAINT `datlich_ibfk_3` FOREIGN KEY (`MaCoSo`) REFERENCES `coso` (`MaCoSo`),
  ADD CONSTRAINT `datlich_ibfk_4` FOREIGN KEY (`MaDichVu`) REFERENCES `dichvu` (`MaDichVu`);

--
-- Các ràng buộc cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD CONSTRAINT `FK_DichVu_CoSo` FOREIGN KEY (`MaCoSo`) REFERENCES `coso` (`MaCoSo`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NhanVien_CoSo` FOREIGN KEY (`MaCoSo`) REFERENCES `coso` (`MaCoSo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
