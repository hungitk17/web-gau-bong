-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2019 lúc 07:56 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlicuahanggau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `mahd` varchar(10) NOT NULL,
  `masp` varchar(10) NOT NULL,
  `soluongmua` int(3) NOT NULL,
  `gia` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`mahd`, `masp`, `soluongmua`, `gia`, `thanhtien`) VALUES
('5', 'CB1', 1, 460000, 460000),
('6', 'GB1', 1, 170000, 170000),
('7', 'MB12', 1, 290000, 290000),
('8', 'DRMCA', 1, 250000, 250000),
('9', 'CB1', 1, 460000, 460000),
('9', 'CB10', 1, 480000, 480000),
('9', 'CB11', 1, 140000, 140000),
('10', 'H1', 1, 250000, 250000),
('10', 'H10', 1, 160000, 160000),
('10', 'H11', 1, 390000, 390000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(10) NOT NULL,
  `taikhoannguoidung` varchar(50) NOT NULL,
  `ngaydathang` varchar(10) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `trangthai` text NOT NULL,
  `diachigiaohang` text NOT NULL,
  `hinhthucvanchuyen` text NOT NULL,
  `hinhthucthanhtoan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `taikhoannguoidung`, `ngaydathang`, `tongtien`, `trangthai`, `diachigiaohang`, `hinhthucvanchuyen`, `hinhthucthanhtoan`) VALUES
(7, 'tvhung', '15-05-2019', 290000, 'Chưa Giao', 'Ấp 1 phú thạnh , nhơn trạch', 'Giao Hàng Chuẩn', 'Thanh Toán Tiền Khi Nhận Hàng'),
(10, 'qqqqq', '15-05-2019', 800000, 'Chưa Giao', 'abcd', 'Giao Hàng Chuẩn', 'Thanh Toán Tiền Khi Nhận Hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(10) NOT NULL,
  `tendn` varchar(50) NOT NULL,
  `mk` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `quyen` text NOT NULL,
  `hoten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tendn`, `mk`, `sdt`, `email`, `quyen`, `hoten`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '1', ''),
(0, 'nhanvien', '2a2fa4fe2fa737f129ef2d127b861b7e', '', '', '3', ''),
(16, 'tvhung', 'aa266201566b8609ccc524ed2ea6b254', '0389853806', 'thung6131@gmail.com', '2', 'Trần Văn Hùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `marole` int(2) NOT NULL,
  `tenrole` text NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`marole`, `tenrole`, `mota`) VALUES
(1, 'admin', 'Quyền admin có thể tạo và cấp quyền cho user'),
(2, 'Nhân Viên', 'Quyền được phép bán hàng và cập nhật sản phẩm'),
(3, 'Khách hàng', 'Quyền được mua hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(10) NOT NULL,
  `tensp` varchar(50) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `mausac` varchar(10) DEFAULT NULL,
  `chatlieu` varchar(50) DEFAULT NULL,
  `trangthai` tinyint(1) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `hinh1` varchar(50) DEFAULT NULL,
  `hinh2` varchar(50) DEFAULT NULL,
  `hinh3` varchar(50) DEFAULT NULL,
  `hinh4` varchar(50) DEFAULT NULL,
  `hinh5` varchar(50) DEFAULT NULL,
  `mota` varchar(10000) DEFAULT NULL,
  `maloai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `size`, `mausac`, `chatlieu`, `trangthai`, `soluong`, `hinh1`, `hinh2`, `hinh3`, `hinh4`, `hinh5`, `mota`, `maloai`) VALUES
('CB1', 'Chó Bông Đầu To', 460000, 110, 'Xám', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-dau-to-1.jpg', 'Image/ChoBong/cho-dau-to-2.jpg', 'Image/ChoBong/cho-dau-to-5.jpg', '', '', 'Chó Bông Đầu To – Kích Thước: 1m1- 460.000đ.', 'CB'),
('CB10', 'Chó Husky Áo Len', 480000, 100, 'Xám', 'Vải lông mềm mại, len áo và bông độn mềm và êm ái.', 0, 50, 'Image/ChoBong/cho-husky-ao-len-1.jpg', 'Image/ChoBong/husky-7.jpg', 'Image/ChoBong/husky-2.jpg', 'Image/ChoBong/husky-4.jpg', '', 'Chó Husky áo Len – Kích Thước: 1m- 480.000đ. Chó Husky áo len là một trong những dòng sản phẩm bán chạy nhất hiện nay tại cửa hàng. Chú chó bông chinh phục khách hàng với vẻ ngoài đáng yêu, tinh nghịch của gương mặt tương tự loài chó Husky nổi tiếng.', 'CB'),
('CB11', 'Chó Ngồi', 140000, 90, 'Trắng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-ngoi-1.jpg', 'Image/ChoBong/cho-ngoi-6.jpg', '', '', '', 'Chó Ngồi – Kích Thước: 30- 140.000đ.', 'CB'),
('CB12', 'Chó Hồng', 140000, 90, 'Hồng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-hong-nam-1.jpg', 'Image/ChoBong/cho-hong-nam-3.jpg', 'Image/ChoBong/cho-hong-nam-5.jpg', 'Image/ChoBong/cho-hong-nam-7.jpg', '', 'Chó Hồng – Kích Thước: 30- 140.000đ.', 'CB'),
('CB13', 'Chó Bully', 620000, 120, 'Xám', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-bully-1.jpg', 'Image/ChoBong/cho-bully-3.jpg', 'Image/ChoBong/cho-bully-4.jpg', 'Image/ChoBong/cho-bully-5.jpg', '', 'Chó Bully – Kích Thước: 1m2- 620.000đ. Chó Bully – một giống chó mới, có nguồn gốc từ nước Mỹ, là hậu duệ của chó Pit Bull. Vừa là một hình ảnh động vật độc đáo bên ngoài vừa là một hình tượng ngộ nghĩnh trong các bộ phim hoạt hình nổi tiếng. Được sự ưa chuộng của nhiều đối tượng khác nhau, chú chó này đã được biến tấu thành những con thú nhồi bông cực kì xinh xắn, trở thành những món quà mang đầy ý nghĩa.', 'CB'),
('CB14', 'Chó Puco V', 140000, 60, 'Nâu', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-puco-ao-3.jpg', 'Image/ChoBong/cho-puco-ao-1.jpg', 'Image/ChoBong/cho-puco-ao-4.jpg', 'Image/ChoBong/cho-puco-ao-5.jpg', '', 'Chó Puco V – Kích Thước: 60cm- 140.000đ. Chó Puco V là nhân vật đã gắn liền với bộ phim hoạt hình nổi tiếng, chú đã làm không biết bao nhiêu người phải say đắm. Ngày nay những nhà sản xuất đã biến nhân vật này thành những bé gấu bông chó Puco V được rất nhiều bạn trẻ yêu thích. Cùng khám phá những đặc điểm nổi bật giúp chú hot đến như vậy nha!', 'CB'),
('CB15', 'Chó Áo Sao', 130000, 25, 'Nâu Sậm', 'Lông xù, bông độn gấu cao cấp.', 0, 50, 'Image/ChoBong/CHO-AO-SAO-1.jpg', 'Image/ChoBong/CHO-AO-SAO-2.jpg', '', '', '', 'Chó Áo Sao – Kích Thước: 25cm- 130.000đ. Chó xù áo sao là một người bạn trung thành và dễ thương của các bé. Với ngoại hình được điểm tô thêm chiếc áo có hình ngôi sao rực rỡ, chú chó lại càng có vẻ đáng yêu và ngộ nghĩnh hơn.', 'CB'),
('CB2', 'Chó Cừu', 270000, 40, 'Nâu', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-cuu-1.jpg', 'Image/ChoBong/cho-cuu-1-1.jpg', 'Image/ChoBong/cho-cuu-3.jpg', 'Image/ChoBong/cho-cuu-6.jpg', '', 'Chó Cừu – Kích Thước: 40cm- 270.000đ.', 'CB'),
('CB3', 'Chó Mũi Tim Áo Kẻ', 180000, 90, 'Nâu', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-mui-tim-nam-dai-1.jpg', 'Image/ChoBong/cho-mui-tim-nam-dai-2.jpg', 'Image/ChoBong/cho-mui-tim-nam-dai-5.jpg', 'Image/ChoBong/cho-mui-tim-nam-dai-6.jpg', '', 'Chó Mũi Tim Áo Kẻ – Kích Thước: 70cm- 180.000đ.', 'CB'),
('CB4', 'Chó Bông Shiba Cosplay', 140000, 90, 'Nâu Trắng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-shiba-cosplay-1.jpg', 'Image/ChoBong/cho-shiba-cosplay-2.jpg', 'Image/ChoBong/cho-shiba-cosplay-4.jpg', '', '', 'Chó Bông Đầu To – Kích Thước: 1m1- 460.000đ.', 'CB'),
('CB5', 'Chó Mắt Đốm Mềm', 290000, 80, 'Xám', 'Vải bông mềm mại, bông độn cao cấp và êm ái.', 0, 50, 'Image/ChoBong/cho-mat-dom-mem-1.jpg', 'Image/ChoBong/cho-mat-dom-mem-2.jpg', 'Image/ChoBong/cho-mat-dom-mem-5.jpg', '', '', 'Chó Mắt Đốm Mềm – Kích Thước: 80cm- 290.000đ.Đối với dòng sản phẩm gấu dạng nằm này, kích thước của gấu sẽ chỉ tầm 80cm. Một kích thước vừa đủ để bạn có thể ôm hay nằm thư giãn trên chú chó bông đáng yêu này. Với kích thước 80cm, bạn cũng có thể dễ dàng di chuyển chú chó bông đến mọi nơi trong nhà. Bé cũng có thể dễ dàng hơn khi ôm ấp và chơi đùa với chú, kích thước vừa tầm chắc chắn sẽ khiến bé thích thú khi chơi đùa cùng chú chó đáng yêu, thân thiện này.', 'CB'),
('CB6', 'Chó Bông Party', 250000, 50, 'Xanh dương', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-party-1.jpg', 'Image/ChoBong/cho-party-4.jpg', 'Image/ChoBong/cho-party-5.jpg', 'Image/ChoBong/cho-party-6.jpg', '', 'Chó Bông Party – Kích Thước: 50cm- 250.000đ.', 'CB'),
('CB7', 'Chó Đốm', 260000, 50, 'Trắng đen', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-dom-1.jpg', 'Image/ChoBong/cho-dom-4.jpg', 'Image/ChoBong/cho-dom-7.jpg', '', '', 'Chó Đốm – Kích Thước: 50cm- 260.000đ.', 'CB'),
('CB8', 'Chó Husky Baby', 290000, 50, 'Xám', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-husky-baby-1.jpg', 'Image/ChoBong/cho-husky-baby-7.jpg', 'Image/ChoBong/cho-husky-baby-10.jpg', '', '', 'Chó Husky Baby – Kích Thước: 50cm- 290.000đ.', 'CB'),
('CB9', 'Chó Ôm Tim', 220000, 50, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/ChoBong/cho-om-tim-1.jpg', 'Image/ChoBong/cho-om-tim-4.jpg', 'Image/ChoBong/cho-om-tim-8.jpg', '', '', 'Chó Ôm Tim – Kích Thước: 50cm- 20.000đ.', 'CB'),
('DRMCA', 'Doremon cao ráo', 250000, 100, 'Xanh dương', '100% Bông Gòn Cao Cấp', 0, 5, 'Image/doremon/doremoncao_1.jpg', 'Image/doremon/doremoncao_2.jpg', 'Image/doremon/doremoncao_3.jpg', 'Image/doremon/doremoncao_4.jpg', 'Image/doremon/doremoncao_5.jpg', 'Một doremon thật dễ thương với chiều cao phá cách', 'DRM'),
('DRMCM', 'Doremon chớp mắt', 200000, 65, 'Xanh dương', '100% Bông Gòn Cao Cấp', 0, 20, 'Image/doremon/doremonchopmat.jpg', '', '', '', '', 'Doremon với đôi mắt thất dễ thương', 'DRM'),
('DRMCO', 'Doremon mắt dấu cộng', 235000, 60, 'Xanh dương', '100% Nhập khẩu chính .jpghãng', 0, 12, 'Image/doremon/doremoncong.jpg', '', '', '', '', 'Doremon với đôi mắt dống cậu thật duyên dáng', 'DRM'),
('DRMFM', 'Doremon đầy đủ màu sắc', 900000, 80, 'Màu tổng h', '100% Nhập khẩu chính hãng', 0, 2, 'Image/doremon/doremonfullmau_1.jpg', '', '', '', '', 'Doremon đa màu sắc thật mới lạ', 'DRM'),
('DRMHE', 'Doremon trái tim', 925000, 60, 'Xanh dương', '100% Nhập khẩu chính hãng', 0, 4, 'Image/doremon/doremonheart_1.jpg', '', '', '', '', 'Ôi! Doremon đáng yêu quá cơ', 'DRM'),
('DRMLL', 'Doremon cười với chiếc lưỡi kì lạ', 150000, 90, 'Xanh dương', '100% Bông Gòn Cao Cấp', 0, 9, 'Image/doremon/doremonleluoi.jpg', '', '', '', '', 'Doremon trông thật ngộ nghĩnh', 'DRM'),
('DRMLO', 'Doremon tình yêu', 935000, 120, 'Xanh dương', '100% Nhập khẩu chính hãng', 0, 4, 'Image/doremon/doremonlove_1.jpg', 'Image/doremon/doremonlove_2.jpg', 'Image/doremon/doremonlove_3.jpg', 'Image/doremon/doremonlove_4.jpg', 'Image/doremon/doremonlove_5.jpg', 'Doremon trông thật đáng yêu', 'DRM'),
('DRMMT', 'Doremon với gương mặt khá ngộ nghĩnh', 255000, 80, 'Xanh dương', '100% Nhập khẩu chính hãng', 0, 19, 'Image/doremon/doremonmatto.jpg', '', '', '', '', 'Doremon đã thay đổi khuôn mặt của mình', 'DRM'),
('DRMMY', 'Doremon mặc yếm', 250000, 50, 'Xanh dương', '100% Bông Gòn Cao Cấp', 0, 19, 'Image/doremon/doremonmacyem.jpg', '', '', '', '', 'Doremon với trang phục kì lạ', 'DRM'),
('DRMNA', 'Doremon nằm ngủ', 220000, 60, 'Xanh dương', '100% Bông Gòn Cao Cấp', 0, 8, 'Image/doremon/doremonnam_1.jpg', '', '', '', '', 'doremon với dáng nằm như nobita', 'DRM'),
('DRMNO', 'Doremon đội nón', 260000, 90, 'Xanh dương', '100% Nhập khẩu chính hãng', 0, 20, 'Image/doremon/doremonnon_1.jpg', 'Image/doremon/doremonnon_2.jpg', 'Image/doremon/doremonnon_3.jpg', '', '', 'Doremon vô cùng đáng yêu kho đội trên mình chiếc nón', 'DRM'),
('DRMTN', 'Doremon tốt nghiệp', 400000, 130, 'Xanh dương', '100% Bông Gòn Cao Cấp', 0, 2, 'Image/doremon/doremontotnghiep_1.jpg', 'Image/doremon/doremontotnghiep_2.jpg', 'Image/doremon/doremontotnghiep_3.jpg', '', '', 'Doremon đã tốt nghiệp rồi', 'DRM'),
('DRMTT', 'Doremon thiên thần', 200000, 90, 'Xanh dương', '100% Nhập khẩu chính hãng', 0, 5, 'Image/doremon/doremonthienthan_1.jpg', 'Image/doremon/doremonthienthan_2.jpg', 'Image/doremon/doremonthienthan_3.jpg', 'Image/doremon/doremonthienthan_4.jpg', 'Image/doremon/doremonthienthan_5.jpg', 'Một thiên thần là doremon', 'DRM'),
('DRMVT', 'Doremon vui tươi', 900000, 100, 'Xanh dương', '100% Bông Gòn Cao Cấp', 0, 3, 'Image/doremon/doremonvuituoi.jpg', '', '', '', '', 'Doremon vui tươi, trông cậu ấy thật dễ thương', 'DRM'),
('DRMVU', 'Doremon vui vẻ', 245000, 90, 'Xanh dương', '100% Nhập khẩu chính hãng', 0, 8, 'Image/doremon/doremonvui_1.jpg', 'Image/doremon/doremonvui_2.jpg', 'Image/doremon/doremonvui_3.jpg', 'Image/doremon/doremonvui_4.jpg', 'Image/doremon/doremonvui_5.jpg', 'Doremon với nụ cười không lẫn vào ai được', 'DRM'),
('GB1', 'Chuối Bông Mềm', 170000, 50, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/bap-ngo-1-500x750.jpg', 'Image/GoiBong/bap-ngo-3-500x750.jpg', 'Image/GoiBong/bap-ngo-4-500x333.jpg', '', '', 'Chuối Bông Mềm – Kích Thước: 50cm- 170.000đ.', 'GB'),
('GB10', 'Gối Bia Bông', 140000, 90, 'Xanh Lá', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/bia-bong-15-500x750.jpg', 'Image/GoiBong/bia-bong-8-500x750.jpg', 'Image/GoiBong/bia-bong-2-500x750.jpg', 'Image/GoiBong/bia-bong-21-500x750.jpg', '', 'Gối Bia Bông – Kích Thước: 70cm- 140.000đ.', 'GB'),
('GB11', 'Cá Sấu Mềm', 1200000, 150, 'Xanh lá', 'Sợi Bông Mềm', 0, 50, 'Image/GoiBong/ca-sau-mem-1-1-500x333.jpg', 'Image/GoiBong/ca-sau-mem-2-1-500x333.jpg', 'Image/GoiBong/ca-sau-mem-5-500x333.jpg', 'Image/GoiBong/ca-sau-mem-1-500x750.jpg', 'Image/GoiBong/ca-sau-mem-2-500x750.jpg', 'Cá Sấu Mềm – Kích Thước: 150cm- 1.200.000đ. Cá sấu mềm là một trong những sản phẩm được nhiều người lựa chọn làm quà tặng nhân dịp sinh nhật, giáng sinh, lễ tình nhân…nhằm thể hiện sự quan tâm tới những người thân yêu của mình và mang lại niềm vui cho họ.', 'GB'),
('GB12', 'Bắp Ngô Bông', 930000, 60, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/bap-ngo-4-500x333.jpg', 'Image/GoiBong/bap-ngo-3-500x750.jpg', 'Image/GoiBong/bap-ngo-1-500x750.jpg', '', '', 'Bắp Ngô Bông– Kích Thước: 60cm- 330.000đ. Bắp ngô bông trong thế giới rau củ quả đã tới với Shop nhồi bông rồi đây. Với ngoại hình hết sức đáng yêu cùng phong cách ngộ nghĩnh, bắp ngô bông có thể chinh phục được cả trẻ em và người lớn ngay từ lần gặp đầu tiên.', 'GB'),
('GB13', 'Cá Mập Bông', 180000, 60, 'Xanh Dương', '100% Bông gòn cao cấp và an toàn tuyệt đối cho bé.', 0, 50, 'Image/GoiBong/ca-map-1-500x333.jpg', 'Image/GoiBong/ca-map-3-500x333.jpg', 'Image/GoiBong/kitty-om-ca-5-500x333.jpg', 'Image/GoiBong/kitty-om-ca-9-500x333.jpg', '', 'Cá Mập Bông – Kích Thước: 60cm- 180.000đ. Khác với hình tượng dữ tợn, chú cá mập bằng bông hiền lành và đáng yêu với vẻ ngoài nhỏ nhắn. Không còn gì đặc biệt hơn khi dành tặng cho bé món quà là chú cá bằng bông êm ái này vào dịp sinh nhật bé.', 'GB'),
('GB14', 'Đùi Gà Bông', 960000, 100, 'Vàng Cam', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/dui-ga-bong-2-1-500x750.jpg', 'Image/GoiBong/dui-ga-bong-2-1-500x750.jpg', 'Image/GoiBong/dui-ga-bong-2-500x750.jpg', 'Image/GoiBong/dui-ga-bong-6-500x333.jpg', '', 'Đùi Gà Bông – Kích Thước: 100cm- 360.000đ. Nếu trước đây gấu bông là sự lựa chọn duy nhất mỗi khi bạn băn khoăn không biết tặng quà gì cho bạn bè người thân thì nay gấu bông đã xưa rồi giờ phải tặng Đùi gà bông mới hợp độc, lạ. Đồng thời cũng thể hiện nét tính cách của bạn cũng như người nhận. Cùng tìm hiểu về sản phẩm đặc biệt này nhé!', 'GB'),
('GB15', 'Gà Bông Nằm', 190000, 50, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/ga-bongnam-1-500x333.jpg', 'Image/GoiBong/ga-bongnam-2-500x333.jpg', '', '', '', 'Gà Bông Nằm – Kích Thước: 50cm- 190.000đ. Những chú gấu bông hot luôn là đối tượng được các tín đồ đam mê sưu tập để ý và trong đó chú Gà bông nằm đáng yêu này sẽ không thể nào bị bỏ qua dễ dàng. Hãy cùng điểm qua các đặc điểm nổi bật của chú để xem chú có gì để được săn đón như vậy!', 'GB'),
('GB2', 'Cà Rốt Mềm', 280000, 90, 'Cam', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/ca-rot-mem-1-500x333.jpg', 'Image/GoiBong/ca-rot-mem-3-500x750.jpg', 'Image/GoiBong/ca-rot-mem-4-500x750.jpg', '', '', 'Cà Rốt Mềm – Kích Thước: 90cm- 280.000đ.', 'GB'),
('GB3', 'Brow Đút Tay', 230000, 40, 'Nâu', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/brown-dut-tay-3-500x333.jpg', 'Image/GoiBong/brown-dut-tay-5-500x333.jpg', 'Image/GoiBong/brown-dut-tay-6-500x333.jpg', 'Image/GoiBong/brown-dut-tay-1-500x750.jpg', '', 'Brow Đút Tay – Kích Thước: 40cm- 230.000đ.', 'GB'),
('GB4', 'Gối Liền Chăn Mèo Hello Kitty', 250000, 40, 'Trắng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/goi-lien-chan-22-1-500x333.jpg', 'Image/GoiBong/goi-lien-chan-56-500x750.jpg', 'Image/GoiBong/goi-lien-chan-59-500x750.jpg', '', '', 'Gối Liền Chăn Mèo Hello Kitty – Kích Thước: 40cm- 210.000đ.', 'GB'),
('GB5', 'Gối Liền Chăn Totoro', 250000, 40, 'Xám', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/goi-lien-chan-15-500x750.jpg', 'Image/GoiBong/goi-lien-chan-51-500x750.jpg', 'Image/GoiBong/goi-lien-chan-53-500x750.jpg', '', '', 'Gối Liền Chăn Totoro – Kích Thước: 40cm- 250.000đ.', 'GB'),
('GB6', 'Gối Liền Chăn Doremon', 250000, 40, 'Xanh Dương', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/goi-lien-chan-26-500x333.jpg', 'Image/GoiBong/goi-lien-chan-28-500x750.jpg', '', '', '', 'Gối Liền Chăn Doremon – Kích Thước: 40cm- 250.000đ.', 'GB'),
('GB7', 'Gối Liền Chăn Stitch', 250000, 40, 'Xanh Dương', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/goi-lien-chan-12-500x333.jpg', 'Image/GoiBong/goi-lien-chan-30-500x750.jpg', 'Image/GoiBong/goi-lien-chan-43-500x750.jpg', '', '', 'Gối Liền Chăn Stitch – Kích Thước: 40cm- 250.000đ.', 'GB'),
('GB8', 'Gối Liền Chăn Lợn Peppa Pig', 250000, 40, 'Hồng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/goi-lien-chan-3-500x333.jpg', 'Image/GoiBong/goi-lien-chan-11-500x333.jpg', 'Image/GoiBong/goi-lien-chan-45-500x750.jpg', '', '', 'Gối Liền Chăn Lợn Peppa Pig – Kích Thước: 40cm- 250.000đ.', 'GB'),
('GB9', 'Gối Liền Chăn Khỉ Bông', 250000, 40, 'Hồng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GoiBong/goi-lien-chan-39-500x333.jpg', 'Image/GoiBong/goi-lien-chan-40-500x750.jpg', '', '', '', 'Gối Liền Chăn Khỉ Bông – Kích Thước: 40cm-250.000đ.', 'GB'),
('H1', 'Gấu Pooh Nấm', 250000, 60, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 5, 'Image/GauBongHot/gaupoohnam1.jpg', 'Image/GauBongHot/gaupoohnam2.jpg', 'Image/GauBongHot/gaupoohnam3.jpg', 'Image/GauBongHot/gaupoohnam4.jpg', '', 'Bấn có biất không, chú gấu Pooh duấc lấy nguyên mấu tấ mất cô gấu có thất sấng tấi Canada. Dù là nguyên mấu hay trong phim thì gấu Pooh cung duấc rất nhiấu bấn nhấ yêu mấn bấi tính cách vui vấ, hoà dấng. Hãy xem chú gấu Pooh nấm có nhấng diấm gì nấi bất nhé.', 'H'),
('H10', 'Superman', 160000, 40, 'Xanh Dương', '100% Bông Gòn Cao Cấp', 0, 11, 'Image/GauBongHot/superman1.jpg', 'Image/GauBongHot/superman2.jpg', 'Image/GauBongHot/superman3.jpg', '', '', 'Nấu bấn có mất cấu con trai và cấu bé rất thích các nhân vất siêu anh hùng thì bấn không thấ nào bấ qua duấc món quà tuyất vấi này. Thay vì các siêu anh hùng làm bấng nhấa cấng và nhanh hấng tấi sao bấn không tấng cho bé mất con siêu nhân super man làm tấ thú nhấi bông nhấ. Món quà vấa quen vấa lấ này chấc chấn sấ khiấn bé thích mê.', 'H'),
('H11', 'Big Hero 6', 390000, 70, 'Trắng', '100% Bông Gòn Cao Cấp', 0, 4, 'Image/GauBongHot/bighero1.jpg', 'Image/GauBongHot/bighero2.jpg', 'Image/GauBongHot/bighero3.jpg', 'Image/GauBongHot/bighero4.jpg', '', 'Nấu ai thích nhấng bấ phim hoất hình vấ các siêu anh hùng thì hấn sấ biất dấn nhấng chú robot Big Hero 6. Ðây là nhấng chú rô bất có nét tính cách hài huấc và rất dung cấm chấng lấi nhân vất phấn diấn deo mất nấ. Cùng xem nhấng chú robot bấng bông này có gì dấc biất nhé.', 'H'),
('H12', 'Ciu Ciu', 330000, 60, 'Da Người', '100% Bông Gòn Cao Cấp', 0, 10, 'Image/GauBongHot/ciuciu1.jpg', 'Image/GauBongHot/ciuciu2.jpg', 'Image/GauBongHot/ciuciu3.jpg', 'Image/GauBongHot/ciuciu4.jpg', 'Image/GauBongHot/ciuciu5.jpg', 'Nấu bấn dang tìm mất món quà dấc, lấ dấ tấng cho nhấng cô nàng có cá tính mấnh mấ, tinh nghấch thì Ciu Ciu chính là sấn phấm mà bấn cấn. Tấ hình dáng cho tấi màu sấc, chú thú bông này dấu cho thấy nét dấ thuong cấa mình và chấc chấn nguấi nhấn duấc món quà này sấ vô cùng thích thú.', 'H'),
('H13', 'Mèo Oggy', 200000, 60, 'Xanh Dương', '100% Bông Gòn Cao Cấp', 0, 5, 'Image/GauBongHot/oggy1.jpg', 'Image/GauBongHot/oggy2.jpg', 'Image/GauBongHot/oggy3.jpg', 'Image/GauBongHot/oggy4.jpg', '', 'Tấ truấc dấn nay nấm trong danh sách nhấng món quà yêu thích dành cho rất nhiấu lấa tuấi dó chính là nhấng hình ấnh gấu bông dáng yêu. Gấu bông tuấng trung cho sấ trấ, cho sấ ngây ngô, cho niấm hấnh phúc. Vấi sấ da dấng vấ hình thấc, gấu bông trấ thành sấ lấa chấn cho dông dấo nhiấu nguấi tiêu dùng. Có thấ kấ dấn sấn phấm dang duấc ua chuấng hiấn nay dó chính là gấu bông mang tên mèo Oggy vấi hình dáng ngấ nghinh, tinh nghấch, mất hình ấnh dang rất duấc lòng nhiấu dấi tuấng, nhất là các em nhấ.', 'H'),
('H14', 'Báo Hồng', 430000, 110, 'Hồng', 'Bông sạch lõi bông xoắn 3 chiều.', 0, 14, 'Image/GauBongHot/baohong1.jpg', 'Image/GauBongHot/baohong2.jpg', '', '', '', 'Thú bông báo hấng duấc mô phấng theo nhân vất hoất hình duấc các bấn trấ rất yêu quý. Không còn là nhấng hình ấnh qua màn hình, chú báo tinh nghấch giấ dây dã di vào dấi sấng cấa giấi trấ bấng cách…nhấi bông! Sấ thất tiấc nấu nhu các Fan hâm mấ chú báo hấng không duấc sấ hấu ngay mất chú nhấi bông dấi thấc nhu thấ này.', 'H'),
('H15', 'Cừu Tròn', 120000, 30, 'Xám', 'PP cotton cao cấp.', 0, 30, 'Image/GauBongHot/cuutron1.jpg', 'Image/GauBongHot/cuutron2.jpg', 'Image/GauBongHot/cuutron3.jpg', 'Image/GauBongHot/cuutron4.jpg', '', 'Cấu tròn nhấi bông là mất chú cấu béo ngấ nghinh và rất dấc biất. Chú cấu duấc sinh ra dấ giúp mấi nguấi cấm thấy vui vấ và thích thú. Chấ cấn nhìn thấy ngoấi hình tròn xoe cấa cấu bông thôi là dã thấy yêu rấi.', 'H'),
('H2', 'Gấu Bông Qoobee Agapi', 280000, 20, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 10, 'Image/GauBongHot/qoobee1.jpg', 'Image/GauBongHot/qoobee2.jpg', 'Image/GauBongHot/qoobee3.jpg', 'Image/GauBongHot/qoobee4.jpg', 'Image/GauBongHot/qoobee5.jpg', 'Gấu bông vấn luôn luôn là mất trong nhấng món quà phù hấp vấi mấi dấi tuấng, bấn có thấ tấng bấn bè, nguấi thân, nhấng nguấi thân yêu trong gia dình… Trên thấ truấng hiấn tấi có rất nhiấu loấi gấu bông khác nhau vấi nhiấu kiấu dáng bất mất, mấu mã phong phú, thấ nhung trong khoấng vài ngày trấ lấi dây, gấu bông Qoobee Agapi dang là tấ khóa duấc tìm kiấm nhiấu nhất trên các trang mấng xã hấi. Hãy cùng chúng tôi tìm hiấu chi tiất hon vấ chú gấu bông này nhé.', 'H'),
('H3', 'RiLaKKuMa Mềm', 195000, 50, 'Nâu', '100% Bông Gòn Cao Cấp', 0, 20, 'Image/GauBongHot/rilakumamem1.jpg', 'Image/GauBongHot/rilakumamem2.jpg', '', '', '', 'Gấu bông Rilakkuma mấm chính là hình dáng cấa nhân vất hoất hình cùng tên do Nhất Bấn sấn xuất. Mất nhấn vất vấi tính các luấi không ai có thấ sánh bấng. Vấi tính cách cùng ngoấi hình dáng yêu nhân vất dã duấc nhiấu bấn trấ yêu thích. Gấu Rilakkuma chính là mất trong nhấng món dấ choi duấc nhiấu nguấi yêu thích nhất trong thấi gian vấa qua.', 'H'),
('H4', 'Vịt Bông MiMi', 155000, 30, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 15, 'Image/GauBongHot/vitmimi1.jpg', 'Image/GauBongHot/vitmimi2.jpg', 'Image/GauBongHot/vitmimi3.jpg', 'Image/GauBongHot/vitmimi4.jpg', 'Image/GauBongHot/vitmimi5.jpg', 'Có nhấng thấ luôn dáng yêu khiấn nhiấu nguấi không thấ cuấng lấi, trong dó có vất bông Mimi – Lalafanfan. Vất bông Mimi – Lalafanfan nấi bất ngay tấ cái nhìn dấu tiên và thu hút vấ không ít nhấng trái tim bấ lấ nhấp cấa nhấng ai yêu thích nhấng diấu dấ thuong. Ðiấu gì khiấn chú vất bông này trấ nên nấi tiấng nhu vấyấ Hãy dấ Teddy.vn giấi dáp thấc mấc qua bài viất duấi dây.', 'H'),
('H5', 'Bò Chăm Chỉ', 900000, 110, 'nâu', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/GauBongHot/bochamchi1.jpg', 'Image/GauBongHot/bochamchi2.jpg', 'Image/GauBongHot/bochamchi3.jpg', 'Image/GauBongHot/bochamchi4.jpg', 'Image/GauBongHot/bochamchi5.jpg', 'Ngay khi phim lên sóng, khán giấ dã san lùng tìm mua chú bò bông cham chấ dấ thuong này. lúc dấu giá cấa món quà này không rấ chút nào. Shop Teddy.vn rất dau dấu vấi vấn dấ này, bấi khách hàng ai cung muấn sấ hấu 1 em bò cham chấ. Nhung ngân sách có hấn. Nhấ Uy Tín và Mấi hàng quen vấi xuấng Hàn Quấc, cuấi cùng thì chú bò cung dã xuất hiấn ấ shop, vấi hình dáng xinh yêu nhu trong phim.', 'H'),
('H6', 'Gấu Mr Bean', 220000, 60, 'Nâu', 'Vấi bông mềm cùng lõi xoắn bông ba chiều', 0, 3, 'Image/GauBongHot/mrbean1.jpg', 'Image/GauBongHot/mrbean2.jpg', '', '', '', 'Gấu Mr. Bean không phấi là ngài Bean nhấi bông dâu, mà dó chính là chú gấu Teddy- nguấi bấn thân nhất cấa Mr. Bean cho series phim hài nấi tiấng cùng tên. Các bấn nhấ chấc hấn dã quá quen thuấc vấi nhân vất này rấi dúng không. Tin mấng là chú gấu này dã vấ tấi Viất Nam và sấn sàng trấ thành nguấi bấn dấng hành vấi các khách hàng yêu quý rấi dây!', 'H'),
('H7', 'Lavar', 170000, 40, 'Đỏ', '100% Bông Gòn Cao Cấp', 0, 12, 'Image/GauBongHot/lavar1.jpg', 'Image/GauBongHot/lavar2.jpg', 'Image/GauBongHot/lavar3.jpg', 'Image/GauBongHot/lavar4.jpg', '', 'Hai chú siêu hài huấc trong phim hoất hình lava và cấc kì dáng yêu', 'H'),
('H8', 'Gấu Pooh Ðại', 420000, 70, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 17, 'Image/GauBongHot/gaupoohdai1.jpg', 'Image/GauBongHot/gaupoohdai2.jpg', 'Image/GauBongHot/gaupoohdai3.jpg', '', '', 'Chú gấu tinh nghấch cấc kì cute', 'H'),
('H9', 'Hoa Du Ký', 190000, 30, 'Ðỏ', '100% Bông Gòn Cao Cấp', 0, 22, 'Image/GauBongHot/hoaduki1.jpg', 'Image/GauBongHot/hoaduki2.jpg', 'Image/GauBongHot/hoaduki3.jpg', 'Image/GauBongHot/hoaduki4.jpg', '', 'Hoa Du Ký là mất bấ phim truyấn hình dài tấp Hàn Quấc có sấ tham gia cấa nam tài tấ Korea Lee Seung-gi, cùng các diấn viên khác Cha Seung-won, Oh Yeon-seo, Lee Hong-gi và Jang Gwang. Tác phấm Hoa Du Ký duấc sáng tác bấi chấ em nhà Hong, bấ phim là bấn sao duấc phát triấn theo huấng khác cấa tác phấm Trung Hoa kinh diấn Tây du ký. Và chấc hấn nấu bấn là fan cấa bấ phim do diấn viên Lee Seung Gi thấ vai này thì không thấ không quan tâm dấn chú khấ bông Son Oh Gong, dây có thấ coi là mất trong nhấng dấc diấm nôi bất nhất trong bấ phim này.', 'H'),
('MB1', 'Mèo Amuse', 210000, 110, 'Đen Trắng,', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/meo-amuse.jpg', 'Image/MeoBong/meo-amuse-1.jpg', 'Image/MeoBong/meo-amuse-2.jpg', 'Image/MeoBong/meo-amuse-3.jpg', 'Image/MeoBong/meo-amuse-4.jpg', 'Mèo Amuse bông được tạo hình từ một nhân vật đặc trưng của văn hóa Nhật Bản vô cùng đáng yêu. Chú mèo bông này được người Nhật xem như là một lonh vật mang đến sự may mắn, tiền tài trong cuộc sống. Chính vì thế, chú mèo bông này sữ là một món quà tuyệt vời để dành tặng bạn bè, người thân bởi nó như một lời chúc may mắn, của người tặng tới mọi người. ', 'MB'),
('MB10', 'Mèo Nằm Mềm', 920000, 60, 'Trắng, Nâu', 'Vải bông cao cấp', 0, 50, 'Image/MeoBong/meo-nam-mem.jpg', 'Image/MeoBong/meo-nam-mem-1.jpg', 'Image/MeoBong/meo-nam-mem-2.jpg', 'Image/MeoBong/meo-nam-mem-3.jpg', 'Image/MeoBong/meo-nam-mem-4.jpg', 'Mèo nằm mềm là một thiết kế theo kiểu nằm, vừa mềm vừa êm. Đây chắc hẳn là một lựa chọn tuyệt vời cho những ai không nghĩ được món quà nào đặc biệt hơn cho bạn bè, người thân hay có thể sử dụng làm món đồ trang trí cho không gian trở nên thêm phần đặc biệt. ', 'MB'),
('MB11', 'Mèo Pusheen', 260000, 40, 'Đa dạng', '100%  Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/meo-sensei-4.jpg', 'Image/MeoBong/meo-pusheen.jpg', 'Image/MeoBong/meo-pusheen-2.jpg', 'Image/MeoBong/meo-pusheen-3.jpg', 'Image/MeoBong/meo-pusheen-4.jpg', 'Mèo Pusheen là một nhân vật thú cưng trong tập truyện của một tác giả người mỹ mang tên Clarie Belton. Tập truyện có tên Everyday Cute, với hình ảnh đáng yêu chú mèo Pusheen đã đốn tim không biết bao nhiêu độc giả trên nhiều quốc gia khác nhau trong đó có Việt Nam.', 'MB'),
('MB12', 'Mèo Sensi', 290000, 60, 'Đa dạng', '100%  Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/meo-sensei.jpg', 'Image/MeoBong/meo-sensei-1.jpg', 'Image/MeoBong/meo-sensei-2.jpg', 'Image/MeoBong/meo-sensei-3.jpg', 'Image/MeoBong/meo-sensei-4.jpg', 'Mèo Sensei là một thiết kế theo kiểu nằm, vừa mềm vừa êm. Đây chắc hẳn là một lựa chọn tuyệt vời cho những ai không nghĩ được món quà nào đặc biệt hơn cho bạn bè, người thân hay có thể sử dụng làm món đồ trang trí cho không gian trở nên thêm phần đặc biệt.', 'MB'),
('MB13', 'Mèo Xám', 920000, 60, 'Xám', '100%  Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/meo-xam.jpg', 'Image/MeoBong/meo-xam-1.jpg', 'Image/MeoBong/meo-xam-2.jpg', 'Image/MeoBong/meo-xam-3.jpg', 'Image/MeoBong/meo-xam-4.jpg', 'Mèo xám là một thiết kế theo kiểu nằm, vừa mềm vừa êm. Đây chắc hẳn là một lựa chọn tuyệt vời cho những ai không nghĩ được món quà nào đặc biệt hơn cho bạn bè, người thân hay có thể sử dụng làm món đồ trang trí cho không gian trở nên thêm phần đặc biệt.', 'MB'),
('MB14', 'Mèo Xám Đứng', 960000, 80, 'Xám', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/meo-xam-dung.jpg', 'Image/MeoBong/meo-xam-dung-1.jpg', 'Image/MeoBong/meo-xam-dung-2.jpg', 'Image/MeoBong/meo-xam-dung-3.jpg', 'Image/MeoBong/meo-xam-dung-4.jpg', 'Lấy cảm hứng từ những chú mèo dễ thương và tinh nghịch, mèo xám đứng chắc chắn sẽ là món quà độc đáo và thú vị để dành tặng cho bạn bè, người thân của bạn vào những dịp đặc biệt. Chú mèo nhồi bông trông rất “đại boss” này có thể dùng để ôm hoặc trang trí cho phòng ngủ, phòng khách vô cùng mới lạ.', 'MB'),
('MB15', 'Gối Chăn', 420000, 40, 'Đa dạng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/goi-men-chan.jpg', 'Image/MeoBong/goi-men-chan-1.jpg', 'Image/MeoBong/goi-men-chan-2.jpg', 'Image/MeoBong/goi-men-chan-3.jpg', 'Image/MeoBong/goi-men-chan-4.jpg', 'Gối chăn là một chú mèo thiết kế theo kiểu nằm, với nhiều màu sắc khác nhau. Đây chắc hẳn sẽ là một lựa chọn tuyệt vời cho những ai không nghĩ được món quà nào đặc biệt hơn cho bạn bèn, người thân hay có thể sử dụng làm món đồ trang trí cho không gian trở nên thêm phần đặc biệt.', 'MB'),
('MB2', 'Mèo Chii Nằm Mềm', 240000, 90, 'Đen Xám, ', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/meo-chii-nam-mem.jpg ', 'Image/MeoBong/meo-chii-nam-mem-1.jpg', 'Image/MeoBong/meo-chii-nam-mem-2.jpg', 'Image/MeoBong/meo-chii-nam-mem-3.jpg', 'Image/meo-chii-nam-mem-4.jpg', 'Mèo Chii Nằm Mềm vô cùng đáng yêu và ngộ nghĩnh sẽ làm món quà cực kì dễ thương dành tặng cho các bạn trẻ', 'MB'),
('MB3', 'Mèo Chii', 950000, 80, 'Đen Xám, ', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/meo-chii.jpg ', 'Image/MeoBong/meo-chii-1.jpg', 'Image/MeoBong/meo-chii-2.jpg', 'Image/MeoBong/meo-chii-3.jpg', 'Image/MeoBong/meo-chii-4.jpg', ' Mèo Chii một chú mèo đáng yêu đang được ưa chuộng nhiều nhất trong các dòng sản phẩm thú bông. vỚI gương mặt tinh nghịch, chú mèo chắc hẵn là một món quà không thể thiếu trong những dịp kỉ niệm', 'MB'),
('MB4', 'Mèo Chii Ngồi', 250000, 50, 'Đen xám', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/meo-chii-ngoi.jpg ', 'Image/MeoBong/meo-chii-ngoi-1.jpg', 'Image/MeoBong/meo-chii-ngoi-2.jpg', 'Image/MeoBong/meo-chii-ngoi-3.jpg', 'Image/MeoBong/meo-chii-ngoi-4.jpg', 'Mèo chii ngồi với hình dáng đáng yêu, dễ thương và không kém phần tinh nghịch luôn được các em nhỏ yêu thích. Đây là món quá vô cùng độc đáo, ấn tượng mà cha mẹ không nên bỏ  qua gửi tặng cho bé yêu của mình vào các dịp đặc biệt đấy nhé! ', 'MB'),
('MB5', 'Mèo Híp', 270000, 50, 'Hồng', '100%  Bông Gòn Cao Cấp ', 0, 50, 'Image/MeoBong/meo-hip.jpg', 'Image/MeoBong/meo-hip-1.jpg', 'Image/MeoBong/meo-hip-2.jpg', 'Image/MeoBong/meo-hip-3.jpg', 'Image/MeoBong/meo-hip-4.jpg', 'Chú Mèo Híp vô vùng đáng yêu và xinh xắn/ Chú Mèo Híp này hiện đang rất là hot luôn. Mua về làm quà tặng bạn thì bạn ấy sẽ thích liền đấy nhé.', 'MB'),
('MB6', 'Mèo Dinga', 620000, 100, 'Nâu', 'Lông nhung và mịn', 0, 50, 'Image/MeoBong/meo-dinga.jpg', 'Image/MeoBong/meo-dinga.jpg-1', 'Image/MeoBong/meo-dinga.jpg-2', 'Image/MeoBong/meo-dinga-3.jpg', 'Image/MeoBong/meo-dinga-4.jpg', 'Chú Mèo Dinga bằng bông được mô phỏng từ chú mèo siêu nổi tiếng trong bộ phim Hàn Quốc \"Chú Mèo Dinga và chí chso Puco\". Với gương mặt độc đáo đáng yêu đây sẽ là món quà yêu thích đối với người bạn yêu thương đấy.', 'MB'),
('MB7', 'Mèo Marie', 450000, 65, 'Trắng', 'Vải bông cao cấp êm ái, bông gòn chất lượng cao', 0, 50, 'Image/MeoBong/meo-marie.jpg', 'Image/MeoBong/meo-marie-1.jpg', 'Image/MeoBong/meo-marie-2.jpg', 'Image/MeoBong/meo-marie-3.jpg', 'Image/MeoBong/meo-marie-4.jpg', 'Mèo Marie bằng bông là phiên bản nhân vật hoạt hình nổi tiếng trong bộ phin \"The Aristocats\". Được sản xuất như món quà dành cho người hâm mộ êu thích cô mèo này.', 'MB'),
('MB8', 'Mèo Mặt Lớn', 240000, 60, 'Vàng', 'Vải bông cao cấp', 0, 50, 'Image/MeoBong/meo-mat-lon.jpg', 'Image/MeoBong/meo-mat-lon-1.jpg', 'Image/MeoBong/meo-mat-lon-2.jpg', 'Image/MeoBong/meo-mat-lon-3.jpg', 'Image/MeoBong/meo-mat-lon-4.jpg', 'Chú Mèo Mặt Lớn siêu đáng yêu sẽ là món quà cực kì ý nghĩa với bạn trẻ đó  ', 'MB'),
('MB9', 'Mèo Mishu', 590000, 90, 'Trắng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/MeoBong/meo-mishu.jpg', 'Image/MeoBong/meo-mishu-1.jpg', 'Image/MeoBong/meo-mishu-2.jpg', 'Image/MeoBong/meo-mishu-3.jpg', 'Image/MeoBong/meo-mishu-4.jpg', 'Mèo Mishu là một trong những chú gấu bông được yêu thích nhất trên thị trường hiện nay. Với tạo hình độc đáo, vui nhộn, chú mèo xinh xắn này sẽ là một lựa chọn tuyệt vời cho bạn bè, người thân hay là một món đồ trang trí khiến không gian trở nên tinh tế hơn.', 'MB'),
('PKC1', 'Pokemon Rùa Kini', 930000, 50, 'Xanh Vàng', 'Bông Gòn Cao Cấp', 0, 50, 'Image/PiKaChu/pokemon-rua-kini.jpg', 'Image/PiKaChu/pokemon-rua-kini-1.jpg', 'Image/PiKaChu/pokemon-rua-kini-2.jpg', 'Image/PiKaChu/pokemon-rua-kini-3.jpg', 'Image/PiKaChu/pokemon-rua-kini-4.jpg', 'Nhắc đến những con thú nhồi bông xinh xắn và độc đáo, không thể không nhắc đến những chú pikachu dễ thương, rực rỡ và nổi bật. Những con thú nhồi bông pikachu mềm với sắc vàng rực rỡ sẽ góp phần làm bừng sáng không gian sống của bạn.', 'PKC'),
('PKC2', 'Pokemon Tai Dài', 260000, 50, 'Nâu', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/PiKaChu/pokemon-tai-dai.jpg', 'Image/PiKaChu/pokemon-tai-dai-1.jpg', 'Image/PiKaChu/pokemon-tai-dai-2.jpg', 'Image/PiKaChu/pokemon-tai-dai-3.jpg', 'Image/PiKaChu/pokemon-tai-dai-4.jpg', 'Nhắc đến những con thú nhồi bông xinh xắn và độc đáo, không thể không nhắc đến những chú pikachu rực rỡ và nổi bật. Những con thú nhồi bông pikachu mềm với sắc vàng rực rỡ sẽ góp phần làm bừng sáng không gian sống của bạn.', 'PKC'),
('PKC3', 'Pokemon Hồng Mắt To', 195000, 50, 'Hồng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/PiKaChu/pokemon-hong-mat-to.jpg', 'Image/PiKaChu/pokemon-hong-mat-to-1.jpg', 'Image/PiKaChu/pokemon-hong-mat-to-2.jpg', 'Image/PiKaChu/pokemon-hong-mat-to-3.jpg', 'Image/PiKaChu/pokemon-hong-mat-to-4.jpg', 'Nhắc đến những con thú nhồi bông xinh xắn và độc đáo, không thể không nhắc đến những chú pikachu rực rỡ và nổi bật. Những con thú nhồi bông pikachu mềm với sắc vàng rực rỡ sẽ góp phần làm bừng sáng không gian sống của bạn.', 'PKC'),
('PKC4', 'Gấu Bông Pikachu ', 450000, 90, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/PiKaChu/shin-pikachu.jpg', 'Image/PiKaChu/shin-pikachu-1.jpg', 'Image/PiKaChu/shin-pikachu-2.jpg', 'Image/PiKaChu/shin-pikachu-3.jpg', 'Image/PiKaChu/shin-pikachu-4.jpg', 'Gấu bông Shin Pikachu được lấy cảm hứng từ cậu bé bút chì Shin ngộ nghĩnh với chiếc áo của chú Pikachu huyền thoại. Cậu bé Shin vô cùng đáng yêu này sẽ là lựa chọn tuyệt vời làm quà tặng cho em nhỏ, bạn bè hoặc người thân. Ngoài ra, dùng làm món đồ trang trí nội thất trong phòng cũng rất ấn tượng, sinh động.', 'PKC'),
('PKC5', 'Pokemon Hẹ Lá', 930000, 50, 'Xanh', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/PiKaChu/pokemon-he-la.jpg', 'Image/PiKaChu/pokemon-he-la-1.jpg', 'Image/PiKaChu/pokemon-he-la-2.jpg', 'Image/PiKaChu/pokemon-he-la-3.jpg', 'Image/PiKaChu/pokemon-he-la.jpg', 'Nhắc đến những con thú nhồi bông xinh xắn và độc đáo, không thể không nhắc đến những chú pikachu dễ thương, rực rỡ và nổi bật. Những con thú nhồi bông pikachu mềm với sắc vàng rực rỡ sẽ góp phần làm bừng sáng không gian sống của bạn.', 'PKC'),
('PKC6', 'Pikachu Áo', 220000, 60, 'Vàng Xanh', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/PiKaChu/pikachu-ao.jpg', 'Image/PiKaChu/pikachu-ao-1.jpg', 'Image/PiKaChu/pikachu-ao-2.jpg', 'Image/PiKaChu/pikachu-ao-3.jpg', 'Image/PiKaChu/pikachu-ao-4.jpg', 'Nhắc đến những con thú nhồi bông xinh xắn và độc đáo, không thể không nhắc đến những chú pikachu dễ thương, rực rỡ và nổi bật. Những con thú nhồi bông pikachu mềm với sắc vàng rực rỡ sẽ góp phần làm bừng sáng không gian sống của bạn.', 'PKC'),
('PKC7', 'Pikachu Mềm', 130000, 40, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/PiKaChu/pikachu-mem.jpg', 'Image/PiKaChu/pikachu-mem-1.jpg', 'Image/PiKaChu/pikachu-mem-2.jpg', 'Image/PiKaChu/pikachu-mem-3.jpg', 'Image/PiKaChu/pikachu-mem-4.jpg', 'Nhắc đến những con thú nhồi bông xinh xắn và độc đáo, không thể không nhắc đến những chú pikachu vàng tươi, rực rỡ và nổi bật. Những con thú nhồi bông pikachu mềm với sắc vàng rực rỡ sẽ góp phần làm bừng sáng không gian sống của bạn.', 'PKC'),
('PKC8', 'Pikachu', 290000, 60, 'Vàng', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/PiKaChu/pikachu.jpg', 'Image/PiKaChu/pikachu-1.jpg', 'Image/PiKaChu/pikachu-2.jpg', 'Image/PiKaChu/pikachu-3.jpg', 'Image/PiKaChu/pikachu-4.jpg', 'Nhắc đến những con thú nhồi bông xinh xắn và độc đáo, không thể không nhắc đến những chú pikachu vàng tươi, rực rỡ và nổi bật. Những con thú nhồi bông pikachu mềm với sắc vàng rực rỡ sẽ góp phần làm bừng sáng không gian sống của bạn.', 'PKC'),
('PKC9', 'Pikachu Mũ', 460000, 90, 'Vàng Xanh', '100% Bông Gòn Cao Cấp', 0, 50, 'Image/PiKaChu/pikachu-mu.jpg', 'Image/PiKaChu/pikachu-mu-1.jpg', 'Image/PiKaChu/pikachu-mu-2.jpg', 'Image/PiKaChu/pikachu-mu-3.jpg', 'Image/PiKaChu/pikachu-mu-4.jpg', 'Nhắc đến những con thú nhồi bông xinh xắn và độc đáo, không thể không nhắc đến những chú pikachu vàng tươi, rực rỡ và nổi bật. Những con thú nhồi bông pikachu mềm với sắc vàng rực rỡ sẽ góp phần làm bừng sáng không gian sống của bạn.', 'PKC'),
('SAN', 'Shin áo ngủ', 125000, 50, 'Xám', '100% Nhập khẩu chính hãng', 0, 8, 'Image/shin/shinaongu_1.jpg', 'shinaongu_2.jpg', 'shinaongu_3.jpg', 'shinaongu_4.jpg', 'shinaongu_5.jpg', 'Shin sắp đi ngủ rồi này', 'S'),
('SBT', 'Shin người dơi', 200000, 80, 'Xám', '1100% Bông Gòn Cao Cấp', 0, 12, 'Image/shin/shinbatman_1.jpg', 'Image/shin/shinbatman_2.jpg', 'Image/shin/shinbatman_3.jpg', 'Image/shin/shinbatman_4.jpg', 'Image/shin/shinbatman_5.jpg', 'Shin làm batman này oai không', 'S'),
('SDT', 'Shin đội trưởng', 220000, 100, 'Xám', '100% Nhập khẩu chính hãng', 0, 5, 'Image/shin/shindoitruong_1.jpg', 'Image/shin/shindoitruong_2.jpg', 'Image/shin/shindoitruong_3.jpg', 'Image/shin/shindoitruong_4.jpg', 'Image/shin/shindoitruong_5.jpg', 'Shin làm siêu anh hùng nè', 'S'),
('SDV', 'Shin áo đỏ', 125000, 50, 'Xám', '100% Bông Gòn Cao Cấp', 0, 2, 'Image/shin/shindovang_1.jpg', 'Image/shin/shindovang_2.jpg', 'Image/shin/shindovang_3.jpg', '', '', 'Shin có cái áo màu đỏ và quần màu vàng này', 'S'),
('SGD', 'Shin giận dỗi', 900000, 120, 'Xám', '100% Nhập khẩu chính hãng', 0, 12, 'Image/shin/shingiandoi.jpg', '', '', '', '', 'Shin giận dỗi rồi', 'S'),
('SGI', 'Shin áo đỏ', 120000, 80, 'Xám', '100% Bông Gòn Cao Cấp', 0, 15, 'Image/shin/shingirl.jpg', '', '', '', '', 'Shin có áo màu đỏ nè', 'S'),
('SHK', 'Shin áo hồng kem', 200000, 90, 'Xám', '100% Nhập khẩu chính hãng', 0, 9, 'Image/shin/shinhongkem.jpg', '', '', '', '', 'Shin có áo hồng kem nè', 'S'),
('SND', 'Shin người dơi', 200000, 80, 'Xám', '1100% Bông Gòn Cao Cấp', 0, 12, 'Image/shin/shinbatman_1.jpg', 'Image/shin/shinbatman_2.jpg', 'Image/shin/shinbatman_3.jpg', 'Image/shin/shinbatman_4.jpg', 'Image/shin/shinbatman_5.jpg', 'Shin làm batman này oai không', 'S'),
('SNG', 'Shin ngầu', 280000, 60, 'Xám', '100% Nhập khẩu chính hãng', 0, 5, 'Image/shin/shinngau.jpg', '', '', '', '', 'Shin đeo kính mát nhìn ngầu quá', 'S'),
('SSD', 'Shin áo sọc đỏ', 125000, 90, 'Xám', '100% Bông Gòn Cao Cấp', 0, 7, 'Image/shin/shinsocdo.jpg', '', '', '', '', 'Shin đi tắm hơi nào', 'S'),
('SSM', 'Shin siêu anh hùng', 125000, 50, 'Xám', '100% Bông Gòn Cao Cấp', 0, 4, 'Image/shin/shinsuperman_1.jpg', 'Image/shin/shinsuperman_2.jpg', 'Image/shin/shinsuperman_3.jpg', 'Image/shin/shinsuperman_4.jpg', 'Image/shin/shinsuperman_5.jpg', 'Shin làm siêu anh hùng đội trưởng nè', 'S'),
('SSX', 'Shin áo sọc xanh', 420000, 50, 'Xám', '100% Nhập khẩu chính hãng', 0, 19, 'Image/shin/shinsocxanh.jpg', '', '', '', '', 'Shin đi tắm hơi nào', 'S'),
('SVA', 'Shin áo vàng', 900000, 90, 'Xám', '100% Bông Gòn Cao Cấp', 0, 8, 'Image/shin/shinvang_1.jpg', '', '', '', '', 'Shin có áo màu vàng nè', 'S'),
('SXA', 'Shin áo xanh chuối', 225000, 100, 'Xám', '100% Bông Gòn Cao Cấp', 0, 8, 'Image/shin/shinxanh.jpg', '', '', '', '', 'Shin có áo màu xanh chuối nè', 'S'),
('SXN', 'Shin áo xám nhạt', 150000, 50, 'Xám', '100% Nhập khẩu chính hãng', 0, 20, 'Image/shin/shinxamnhat_1.jpg', 'Image/shin/shinxamnhat_2.jpg', 'Image/shin/shinxamnhat_3.jpg', 'Image/shin/shinxamnhat_4.jpg', 'Image/shin/shinxamnhat_5.jpg', 'Shin có áo màu xám nè', 'S'),
('SXX', 'Shin áo xanh dương', 925000, 80, 'Xám', '100% Nhập khẩu chính hãng', 0, 9, 'Image/shin/shinxanhxanh_1.jpg', '', '', '', '', 'Shin có áo màu xanh dương nè', 'S'),
('TD1', 'Teddy Áo Tim Love', 930000, 140, 'Nâu', 'Bông mềm', 0, 20, 'Image/GauBongTeddy/teddyaotimlove1.jpg', 'Image/GauBongTeddy/teddyaotimlove2.jpg', 'Image/GauBongTeddy/teddyaotimlove3.jpg', 'Image/GauBongTeddy/teddyaotimlove4.jpg', '', 'Cực kì đáng yêu', 'TD'),
('TD10', 'Teddy Xám Khăn Đỏ', 990000, 80, 'Xám', 'Bông mềm', 0, 10, 'Image/GauBongTeddy/teddyxamkhando1.jpg', 'Image/GauBongTeddy/teddyxamkhando2.jpg', 'Image/GauBongTeddy/teddyxamkhando3.jpg', 'Image/GauBongTeddy/teddyxamkhando4.jpg', 'Image/GauBongTeddy/teddyxamkhando5.jpg', 'Các bạn đang tìm món quà để tặng bạn bè trong dịp sinh nhật thì Teddy xám khăn đỏ là một sự lựa chọn tuyệt vời. Chú gấu xám đáng yêu với chiếc khăn đỏ xinh xắn khiến bất kỳ ai cũng muốn ôm ấp vào lòng.', 'TD'),
('TD11', 'Teddy Áo Mũ Đỏ', 530000, 110, 'Nâu', 'Bông mềm', 0, 20, 'Image/GauBongTeddy/teddyaomudo1.jpg', 'Image/GauBongTeddy/teddyaomudo2.jpg', '', '', '', 'Chắc hẳn với những ai yêu thích hoạt hình thì sẽ không thể quên nhân vật Teddy áo mũ đỏ này được bởi sự tinh nghịch và hoạt bát của chú. Và các tín đồ yêu thích sự năng động phóng khoáng sẽ không thể bỏ lỡ chú trong bộ sưu tập của mình chứ? Hãy xem chú có gì thu hút đến vậy nha!', 'TD'),
('TD12', 'Teddy Lavender', 430000, 80, 'Tím', 'Bông mềm', 0, 10, 'Image/GauBongTeddy/teddylavender1.jpg', 'Image/GauBongTeddy/teddylavender2.jpg', 'Image/GauBongTeddy/teddylavender3.jpg', 'Image/GauBongTeddy/teddylavender4.jpg', 'Image/GauBongTeddy/teddylavender5.jpg', 'Chắc hẳn trong mỗi chúng ta không còn quá xa lạ với chú gấu teddy luôn là người bạn đồng hành thân thiết cùng với Ngài Bean (Mr Bean); trong bộ phim nổi tiếng cùng tên. Có lẽ lấy cảm hứng từ chú gấu thân thiện, dễ thương đó mà những chú gấu Teddy hiện đại luôn để lại những ấn sâu sắc với mọi người. Teddy Lavender là một chú gấu mang sắc tím đặc trưng luôn được các bạn trẻ ưa chuộng và lựa chọn làm quà tặng cho những người bạn thân thiết của mình.', 'TD'),
('TD13', 'Teddy Nâu Nhập', 1500000, 200, 'Nâu', 'Bông mềm', 0, 12, 'Image/GauBongTeddy/teddynhap1.jpg', 'Image/GauBongTeddy/teddynhap2.jpg', 'Image/GauBongTeddy/teddynhap3.jpg', 'Image/GauBongTeddy/teddynhap4.jpg', 'Image/GauBongTeddy/teddynhap5.jpg', 'Trước đây khi nói đến gấu bông chắc hẳn mọi người nghĩ đó là đồ chơi của trẻ nhỏ. Tuy nhiên những năm gần đây những chú gấu Teddy lại là những món quà được nhiều bạn trẻ yêu thích chọn lựa trao cho nhau trong những dịp sinh nhật hay những ngày lễ kỉ niệm. Hãy cùng khám phá chú gấu Teddy nâu nhập siêu đáng yêu và ngộ nghĩnh này các bạn nhé.', 'TD'),
('TD14', 'Teddy Chân Love', 990000, 80, 'Hồng', 'Bông mềm', 0, 10, 'Image/GauBongTeddy/teddychanlove1.jpg', '', '', '', '', 'Hồng cá tính cực kì dễ thương', 'TD'),
('TD15', 'Teddy Socola', 490000, 60, 'Nâu', 'Bông mềm', 0, 10, 'Image/GauBongTeddy/teddysocola1.jpg', 'Image/GauBongTeddy/teddysocola2.jpg', 'Image/GauBongTeddy/teddysocola3.jpg', 'Image/GauBongTeddy/teddysocola4.jpg', 'Image/GauBongTeddy/teddysocola5.jpg', 'Sắp đến sinh nhật con gái yêu rồi, các bậc phụ huynh đã nghĩ nên tặng cho con gái món quà nào chưa? Các bé sẽ chắc chắn thích thú với những chú gấu Teddy socola đáng yêu đấy. Bài viết dưới đây chúng ta sẽ cùng đi tìm hiểu chi tiết về chú gấu bông đáng yêu này nhé.', 'TD'),
('TD2', 'Teddy Khăn', 620000, 120, 'Xanh Dương', 'Bông mềm', 0, 10, 'Image/GauBongTeddy/teddykhan1.jpg', 'Image/GauBongTeddy/teddykhan2.jpg', '', '', '', 'Mềm mịn nhẹ nhàng và tinh tế', 'TD'),
('TD3', 'Teddy Angel Hồng', 1250000, 160, 'Hồng', 'Bông mềm', 0, 5, 'Image/GauBongTeddy/teddyangelhong1.jpg', 'Image/GauBongTeddy/teddyangelhong2.jpg', 'Image/GauBongTeddy/teddyangelhong3.jpg', 'Image/GauBongTeddy/teddyangelhong4.jpg', 'Image/GauBongTeddy/teddyangelhong5.jpg', 'dịu dàng đáng yêu', 'TD'),
('TD4', 'Teddy Angel Tím', 890000, 130, 'Tím', 'Bông mềm', 0, 5, 'Image/GauBongTeddy/teddyangeltim1.jpg', 'Image/GauBongTeddy/teddyangeltim2.jpg', 'Image/GauBongTeddy/teddyangeltim3.jpg', 'Image/GauBongTeddy/teddyangeltim4.jpg', '', 'dịu dàng đáng yêu', 'TD'),
('TD5', 'Teddy Áo Đen Love', 1400000, 180, 'Trắng', 'Bông mềm', 0, 20, 'Image/GauBongTeddy/teddyaodenlove1.jpg', 'Image/GauBongTeddy/teddyaodenlove2.jpg', 'Image/GauBongTeddy/teddyaodenlove3.jpg', '', '', 'Cực kì đáng yêu', 'TD'),
('TD6', 'Teddy Đen Xù', 920000, 150, 'Đen', '100% Bông gòn cao cấp', 0, 3, 'Image/GauBongTeddy/teddydenxu1.jpg', 'Image/GauBongTeddy/teddydenxu2.jpg', 'Image/GauBongTeddy/teddydenxu3.jpg', 'Image/GauBongTeddy/teddydenxu4.jpg', '', 'Teddy đen xù là dòng gấu cao cấp được thiết kế sinh động, đáng yêu, phù hợp với mọi lứa tuổi. Với bộ lông xù mềm mượt gấu Teddy được rất nhiều người lựa chọn làm quà tặng để gửi gắm những điều muốn nói cho người thương, bạn bè và người thân trong các dịp lễ, ngày sinh nhật… Với kiểu dáng to khổng lồ, bắt mắt cùng độ cao cấp về chất lượng, giá cả phải chăng chắc chắn đây là một lựa chọn hàng đầu mà bạn không thể bỏ qua.', 'TD'),
('TD7', 'Teddy Hồng Xù', 530000, 110, 'Hồng', '100% Bông gòn cao cấp', 0, 5, 'Image/GauBongTeddy/teddyhongxu1.jpg', 'Image/GauBongTeddy/teddyhongxu2.jpg', 'Image/GauBongTeddy/teddyhongxu3.jpg', '', '', 'Teddy hồng xù là dòng gấu cao cấp được thiết kế sinh động, đáng yêu, phù hợp với mọi lứa tuổi. Với bộ lông xù mềm mượt gấu Teddy được rất nhiều người lựa chọn làm quà tặng để gửi gắm những điều muốn nói cho người thương, bạn bè và người thân trong các dịp lễ, ngày sinh nhật… Với kiểu dáng to khổng lồ, bắt mắt cùng độ cao cấp về chất lượng, giá cả phải chăng chắc chắn đây là một lựa chọn hàng đầu mà bạn không thể bỏ qua.', 'TD'),
('TD8', 'Teddy Tim Love', 680000, 120, 'Nâu', 'Bông mềm', 0, 10, 'Image/GauBongTeddy/teddytimlove1.jpg', '', '', '', '', 'Teddy tim love: là một trong những dòng sản phẩm gấu Teddy cao cấp. Với thiết kế trái tim to, thêu cầu kỳ trước ngực, cùng chữ “Love” đã làm cho sản phẩm này trở thành một món quà biểu tượng cho tình yêu tuyệt vời.', 'TD'),
('TD9', 'Teddy Hug Me Hồng Baby', 960000, 140, 'Hồng', 'Bông mềm', 0, 15, 'Image/GauBongTeddy/teddyhongbaby1.jpg', 'Image/GauBongTeddy/teddyhongbaby2.jpg', '', '', '', 'Gấu Teddy Hug me hồng baby với dáng vẻ ngọt ngào, dễ thương sẽ làm rung động bất cứ cô gái nào ngay từ cái nhìn đầu tiên. Chú gấu này xứng đáng là món quà lí tưởng dành tặng cho những cô nàng gà bông dễ thương.', 'TD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `maloai` varchar(10) NOT NULL,
  `tenloai` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`maloai`, `tenloai`) VALUES
('CB', 'Chó Bông'),
('DRM', 'Gấu Bông DoReMon'),
('GB', 'Gối Bông'),
('H', 'Gấu Bông Hot'),
('MB', 'Mèo Bông'),
('PKC', 'Gấu Bông PiKaChu'),
('S', 'Shin Cấu Bé Bút Chì'),
('TD', 'Gấu Bông Teddy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`tendn`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`marole`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `MaTL` (`maloai`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`maloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `MaTL` FOREIGN KEY (`maloai`) REFERENCES `theloai` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
