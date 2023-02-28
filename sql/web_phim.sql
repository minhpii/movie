-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 28, 2023 lúc 04:41 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `status`) VALUES
(10, 'Phim mới', 'phim-moi', 'Phim mới hay nhất', 1),
(11, 'Phim lẻ', 'phim-le', 'Phim lẻ hay nhất', 1),
(12, 'Phim bộ', 'phim-bo', 'Phim bộ hay nhất', 1),
(13, 'Phim chiếu rạp', 'phim-chieu-rap', 'Phim chiếu rạp hay nhất', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `slug`, `description`, `status`) VALUES
(3, 'Việt Nam', 'viet-nam', 'do Việt Nam sản xuất', 1),
(4, 'Ấn Độ', 'an-do', 'do Ấn Độ sản xuất', 1),
(5, 'Mỹ', 'my', 'do Mỹ sản xuất', 1),
(6, 'Hồng Kông', 'hong-kong', 'do Hồng Kông sản xuất', 1),
(7, 'Nhật Bản', 'nhat-ban', 'do Nhật Bản sản xuất', 1),
(8, 'Trung Quốc', 'trung-quoc', 'do Trung Quốc sản xuất', 1),
(9, 'Hàn Quốc', 'han-quoc', 'do Hàn Quốc sản xuất', 1),
(10, 'Đài Loan', 'dai-loan', 'do Đài Loan sản xuất', 1),
(11, 'Thái Lan', 'thai-lan', 'do Thái Lan sản xuất', 1),
(12, 'Philipin', 'philipin', 'do Philipin sản xuất', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim` text NOT NULL,
  `episode` varchar(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `episode`, `created_at`, `updated_at`) VALUES
(1, 9, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/muejUpYEQ0U\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1', '2023-02-24 16:33:24', '2023-02-24 16:33:24'),
(2, 9, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2oBy1i2DjOE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2', '2023-02-25 20:04:18', '2023-02-25 20:04:18'),
(7, 9, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rV9-5BBFFWk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '3', '2023-02-26 23:38:16', '2023-02-26 23:38:16'),
(10, 9, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3Rl3gp1VZBI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '4', '2023-02-26 23:37:50', '2023-02-26 23:37:50'),
(11, 10, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/XLIJfFuvGLw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1', '2023-02-26 23:41:49', '2023-02-26 23:41:49'),
(12, 10, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JxRnTUHUCbc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2', '2023-02-26 23:42:31', '2023-02-26 23:42:31'),
(13, 12, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/skwRPrDopuE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '0', '2023-02-26 23:47:44', '2023-02-26 23:47:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `slug`, `description`, `status`) VALUES
(5, 'Tâm Lý', 'tam-ly', 'Thể loại tâm lý', 1),
(6, 'Hành động', 'hanh-dong', 'Thể loại hành động', 1),
(7, 'Viễn tưởng', 'vien-tuong', 'Thể loại viễn tưởng', 1),
(8, 'Hoạt hình', 'hoat-hinh', 'Thể loại hoạt hình', 1),
(10, 'Kinh dị', 'kinh-di', 'Thể loại kinh dị', 1),
(11, 'Hài hước', 'hai-huoc', 'Thể loại hài hước', 1),
(12, 'Hình sự', 'hinh-su', 'Thể loại hình sự', 1),
(13, 'Võ thuật', 'vo-thuat', 'Thể loại võ thuật', 1),
(14, 'Cổ trang', 'co-trang', 'Thể loại cổ trang', 1),
(15, 'Phim ma', 'phim-ma', 'Thể loại phim ma', 1),
(16, 'Tình cảm', 'tinh-cam', 'Thể loại tình cảm', 1),
(17, 'Chiến tranh', 'chien-tranh', 'Thể loại chiến tranh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phimhot` int(11) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `phude` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(255) DEFAULT NULL,
  `ngaycatnhat` varchar(255) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `thoiluong` varchar(50) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `sotap` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `slug`, `description`, `status`, `image`, `category_id`, `genre_id`, `country_id`, `phimhot`, `resolution`, `phude`, `ngaytao`, `ngaycatnhat`, `year`, `thoiluong`, `tag`, `topview`, `trailer`, `sotap`) VALUES
(9, 'CHIÊU DIÊU - CHIÊU DAO', 'chieu-dieu-chieu-dao', 'Chiêu Diêu xoay quanh Nữ ma đầu Lộ Chiêu Diêu (Bạch Lộc) là môn chủ của Vạn Lục Môn. Lúc sống nàng ta hoành hành ngang ngược khiến hai giới tiên ma vừa nghe tên đã khiếp sợ. Trong một lần xuống núi Chiêu Diêu cứu được tiểu tử Mặc Thanh (Hứa Khải). Trong lúc nàng sắp lấy được ma khí thượng cổ Kiếm Vạn Quân thì bị Mặc Thanh vô tình sát hại.\r\n \r\nBản thân Chiêu Diêu lúc sống thì tự cao tự đại vang danh giang hồ, đến khi chết lại chết trong tay kẻ mình đã cứu trở thành một hồn ma nghèo kiết xác không ai ngó ngàng. Những năm đó cũng chỉ có mình Mặc Thanh đến thăm mộ nàng, còn mang cho nàng không ít hoa quả tươi. Nhưng trong lòng Chiêu Diêu vẫn mang mối hận sát thân do Mặc Thanh gây ra.\r\n \r\nNăm năm sau, tình cờ một người con gái tên Cầm Chỉ Yên (Tiêu Yến) - là đệ tử tiên môn đập đầu vào bia mộ nàng tự tử. Lộ Chiêu Diêu mượn thân xác Cẩm Chỉ Yên trọng sinh, nhưng trớ trêu nàng chỉ nhập được vào người Cầm Chỉ Yên buổi tối. Sau khi trọng sinh trở về, Lộ Chiêu Diêu phát hiện Mặc Thanh đã làm cho Vạn Lục Môn càng ngày càng lớn mạnh hơn.\r\n \r\nLộ Chiêu Diêu bèn dùng thân xác của Chỉ Yên che giấu thân phận, lợi dụng tình cảm của Mặc Thanh, một mặt báo thù hắn, mặt khác lại xúi giục hắn làm nhiều chuyện độc ác nguy hiểm đến tính mạng. Thế nhưng đối diện với tình cảm của Mặc Thanh, nàng dần dần dao động mục đích ban đầu.\r\n \r\nChiêu Diêu là bộ phim tiên hiệp cổ trang chuyển thể từ tiểu thuyết ngôn tình cùng tên, do ba công ty Ngu Hằng ảnh nghiệp, Dật Cẩm ảnh nghiệp, Hi Hòa ảnh thị phối hợp thực hiện. Bộ phận chỉ đạo sản xuất của bom tấn cổ trang này gắn liền với các tên tuổi lớn như đạo diễn Trịnh Vĩ Văn (tác phẩm tiêu biểu: Nữ Y Minh Phi Truyện, Tam Quốc Cơ Mật, Ma đạo tổ sư…), biên kịch Dương Thiên Tử (tác phẩm tiêu biểu: Lan Lăng Vương Phi, Mỹ nhân hương,..), đặc biệt với sự góp mặt của tác giả nguyên tác Cửu Lộ Phi Hương. Bộ phim quy tụ dàn diễn viên “trai tài gái sắc”: Hứa Khải (trong vai Lệ Trần Lan/Mặc Thanh), Bạch Lộc (Lộ Chiêu Diêu), Đại Húc (Khương Võ),…\r\nChú thích ảnh\r\nBạch Lộc trong vai Lộ Chiêu Diêu\r\nNữ ma đầu Lộ Chiêu Diêu (Bạch Lộc) là môn chủ Vạn Lục Môn, hoành hành ngang ngược, thanh danh rộng khắp khiến tiên ma hai giới đều khiếp sợ, nhưng tâm vẫn luôn hướng về chính nghĩa. Lúc hạ sơn, nàng đã cứu được tiểu tử Mặc Thanh (Hứa Khải) đang trong tình thế nguy hiểm, bị mười đại tiên môn vây công. \r\nChú thích ảnh\r\nNam chính Hứa Khải\r\nKhi Chiêu Diêu tham gia trận đoạt kiếm Vạn Quân do lão Ma vương để lại không ngờ lại bị Mặc Thanh giành mất, bản thân nàng còn bị kiếm thế đánh trọng thương, trở thành hồn ma, hiểu lầm mình bị Mặc Thanh tính kế.\r\nChú thích ảnh\r\nTiêu Yến trong vai Cầm Chi Yên\r\nNăm năm sau, tình cờ một người con gái tên Cầm Chỉ Yên (Tiêu Yến) - là đệ tử tiên môn đập đầu vào bia mộ nàng tự tử. Lộ Chiêu Diêu mượn thân xác Cẩm Chỉ Yên trọng sinh, nhưng chỉ nhập được vào người Cầm Chỉ Yên buổi tối. Nàng trở lại Vạn Lục Môn muốn giành lại vị trí môn chủ thì phát hiện Mặc Thanh, sau khi khôi phục thân phận Lệ Trần Lan - con trai của Ma vương, và trở thành môn chủ mới.\r\nChú thích ảnh\r\nLộ Chiêu Diêu trong thân xác của Cầm Chỉ Yên, che giấu thân phận, lợi dụng tình cảm của Lệ Trần Lan/Mặc Thanh dành cho mình, để hắn đi làm nhiều chuyện nguy hiểm. Nhưng đối mặt với chân tình của Mặc Thanh, Lộ Chiêu Diêu dần dần dao động. Cuối cùng, Lộ Chiêu Diêu cùng Mặc Thanh chung sức đánh bại môn phái giả nhân nghĩa Lạc Minh Hiên, đem sự thật phơi bày ra ánh sáng. Kết thúc đại chiến, hai người hạnh phúc bên nhau.', 1, '1676610877.jpg', 12, 1, 8, 1, 1, 1, NULL, '2023-02-26 23:43:02', '2019', '40 phút/ 1 tập', 'Arsenal Military Academy, học viện, Học Viện Quân Sự Liệt Hỏa, liệt hỏa, quân đội, Trường Quân Đội Liệt Hỏa, 烈火军校', 2, NULL, 45),
(10, 'TRƯỜNG QUÂN ĐỘI LIỆT HỎA', 'truong-quan-doi-liet-hoa', 'Phim Trường Quân Đội Liệt Hỏa hay Học Viện Quân Sự Liệt Hỏa lấy bối cảnh thời trung hoa dân quốc, xoay quanh những thiếu niên anh dũng, nhiệt huyết, họ sẵn sàng mang tất cả tuổi trẻ để cống hiến cho đất nước. Tạ Tương, cô nàng lương thiên và mạnh mẽ, để được vào trường quân đội cô đã cải trang thành nam nhi. Tại đây, Tạ Tương quen công tử nhà giàu bất cần đời Cố Yến Tranh và một người tính tình trầm tĩnh Thẩm Quân Sơn, 3 người trở thành bạn bè thân thiết và cùng nhau trải qua những bài tập, vui buồn.', 1, '1676611036.jpeg', 10, 1, 8, 1, 3, 1, NULL, '2023-02-26 23:41:02', '2020', '45 phút /1 tập', 'Arsenal Military Academy, học viện, Học Viện Quân Sự Liệt Hỏa, liệt hỏa, quân đội, Trường Quân Đội Liệt Hỏa, 烈火军校', 2, NULL, 46),
(11, 'Hai tuần', 'hai-tuan', 'Một người đàn ông sống một cách vô nghĩa .Anh bị vu cáo là giết người. Nhưng người đàn ông lúc này biết rằng anh cómột cô con gái, người bị bệnhbạch cầu. Trong hai tuần lễ tiếp theo, anh đã đấu tranh để cứu con gái của mình.Lee Jun Ki vai Jang Tae San Một anh chàng bị vu cáo là giết người, phát hiện ra rằng anh có một cô con gái đang bị bệnh bạch cầu và anh chỉ có hai tuần để cứu con gái và cả chính mình.', 1, '1676611285.jpg', 12, 1, 9, 1, 4, 0, NULL, '2023-02-26 23:44:34', '2016', '60 phút/ 1 tập', NULL, 1, '2O60CGmyzWo', 14),
(12, 'Nô lệ của quỷ 2', 'no-le-cua-quy-2', 'hay là Satan\'s Slaves: Communion nói về vài năm sau khi họ tự cứu mình khỏi một sự cố khủng khiếp khiến họ mất mẹ và đứa con út Ian, Rini cùng các em của cô, Toni và Bondi, và Cha của họ sống trong căn hộ. Họ tin rằng sống trong căn hộ sẽ an toàn nếu có chuyện gì xảy ra vì có nhiều người. Tuy nhiên, họ sớm nhận ra rằng sống với nhiều người cũng có thể nguy hiểm nếu họ không biết hàng xóm của mình. Vào một đêm đầy kinh hoàng, Rini và gia đình cô phải trở về để tự cứu mình. Nhưng lần này, có lẽ đã quá muộn để chạy.', 1, '1676611527.jpg', 11, 1, 5, 1, 3, 0, NULL, '2023-02-26 23:47:22', '2018', '1 tiếng 20 phút / 1 tập', NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(40, 9, 13),
(41, 9, 14),
(42, 9, 16),
(43, 10, 6),
(44, 10, 11),
(45, 10, 16),
(46, 10, 17),
(47, 11, 5),
(48, 11, 6),
(49, 11, 12),
(50, 11, 16),
(51, 12, 10),
(52, 12, 15),
(58, 9, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vũ Thành Minh', 'minhpii181@gmail.com', NULL, '$2y$10$88k.d4CFzznZ.h.CdU4HCuSbOQWouVNjL592TXdcoyfaI47o9eyR6', NULL, '2023-02-15 22:28:34', '2023-02-15 22:28:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
