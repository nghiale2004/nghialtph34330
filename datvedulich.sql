-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2024 at 07:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datvedulich`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categorie` (`id`, `CategoryName`, `Description`) VALUES
(1, 'Vé phổ thông', 'Chuyến bay phổ thông'),
(2, 'Business', 'Business class flights'),
(3, 'First Class', 'First class flights'),
(4, 'Vé giảm giá', 'Vé máy bay giảm giá');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--



--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FullName`, `CCCD`, `Email`, `Gender`, `Phone`, `Birthdate`, `Luggage`) VALUES
(1, 'John Doe', '123456789', 'john@example.com', 'Male', '1234567890', '1990-01-01', 'None'),
(2, 'Jane Smith', '987654321', 'jane@example.com', 'Female', '0987654321', '1992-02-02', '1 baggage');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int NOT NULL,
  `Origin` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `DepartureDate` date NOT NULL,
  `DepartureTime` time NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `category_id` int DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flights` (`id`, `Origin`, `Destination`, `DepartureDate`, `DepartureTime`, `Price`, `category_id`, `img`, `Description`) VALUES
(2, 'Da Nang', 'Hanoi', '2024-07-02', '09:00:00', '800000.00', NULL, NULL, NULL),
(3, 'Hanoi', 'Da Nang', '2024-07-10', '08:00:00', '1200000.00', NULL, NULL, NULL),
(9, 'Hanoi', 'Da Nang', '2024-07-16', '14:00:00', '1100000.00', NULL, NULL, NULL),
(11, 'Ho Chi Minh City', 'Hanoi', '2024-07-18', '16:10:00', '1700000.00', 1, 'assets/uploads/1717865141_aef6bd237841b71fee50.jpg', 'ninjda đập đá'),
(12, 'Hanoi', 'Ho Chi Minh City', '2024-07-19', '17:10:00', '1600000.00', 2, 'assets/uploads/1717781194_anh3.jpg', ''),
(13, 'Da Nang', 'Hanoi', '2024-07-20', '18:40:00', '950000.00', 2, 'assets/uploads/1717734780_20220411_223435.jpg', 'hay hay'),
(17, 'thai land', 'Hà Nội', '2024-06-08', '12:44:00', '90000000.00', 1, 'assets/uploads/1717825516_314412181_658593542589311_4958568878335587371_n.jpg', NULL),
(19, 'Korea', 'Đà Nẵng', '2024-06-09', '13:01:00', '593283.00', 2, 'assets/uploads/1717826504_757545289280603e096c8e53c4ece5c6.jpg', NULL),
(20, 'Korea', 'Thái Lan', '2024-06-08', '13:20:00', '10000000.00', 1, 'assets/uploads/1717827488_1e262c379bca56940fdb.jpg', 'Trải nghiệm dịch vụ và công nghệ tân tiến khi bay hạng Thương Gia cùng Vietnam Airlines. Giờ đây hành khách có thể tận hưởng một chuyến bay đầy cảm hứng trên mọi khía cạnh.'),
(21, 'thai land', 'Hà Nội', '2024-06-09', '11:40:00', '9921871.00', 1, 'assets/uploads/1717864594_0f01de068bfeda79ba9c4543bfe54435.jpg', 'hay ho'),
(22, 'Korea', 'Japan', '2024-06-10', '04:31:00', '7000000.00', 2, 'assets/uploads/1717914488_z3233864899932_edba86d46f46134beb75f417cc71ff81.jpg', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `TicketID` int NOT NULL,
  `FlightID` int NOT NULL,
  `CustomerID` int NOT NULL,
  `BookingDate` date NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` int NOT NULL DEFAULT '0',
  `type` enum('admin','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `password`, `created_at`, `updated_at`, `role`, `type`) VALUES
(1, 'Nguyễn Văn A', NULL, 'a@gmail.com', '$2y$10$FwOOJObkXfRr50DQO9cHOOnK5dP1bOKgh5O7zwUFW9eLjKTYpNJSq', '2024-05-30 13:44:56', '2024-05-30 13:44:56', 0, 'member'),
(4, 'Nguyễn Văn 0', NULL, 'a0@gmail.com', '$2y$10$xq30oZ8MKCDHPpF47z7fEuXm4sUTKG46BxMLD4KauYkfj9qukT8eK', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(5, 'Nguyễn Văn 1', NULL, 'a1@gmail.com', '$2y$10$/ubihpPycejntqFrOwUSb.ArNoWx2jMhszm3kBrRCa4TSNL/l3Olq', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(6, 'Nguyễn Văn 2', NULL, 'a2@gmail.com', '$2y$10$CsYyk7h7Gj8A3HkRxpo27uFaNa1YoSpQ49D/YcHqceUOOUXthEtq6', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(7, 'Nguyễn Văn 3', NULL, 'a3@gmail.com', '$2y$10$QWovu7Od2pVohiTk6O0/kOpjawDZHSEtIhtCamAuefV58qp5AgM5q', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(8, 'Nguyễn Văn 4', NULL, 'a4@gmail.com', '$2y$10$tvAiFECj.QwUeFZslayckuGCviIJyEYlcrNnSk4ZbkuTW3NxcNJKa', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(9, 'Nguyễn Văn 5', NULL, 'a5@gmail.com', '$2y$10$o6sY9ldSh6/XWQDJS1qJIudMW.MwiBZ1X8el0W3CxcLj9QjKIpZbW', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(10, 'Nguyễn Văn 6', NULL, 'a6@gmail.com', '$2y$10$VFzaB8GEAhywE9WC3eHgdevtlMpvvIRRY1r/BngyUN60ZOtVNlovq', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(11, 'Nguyễn Văn 7', NULL, 'a7@gmail.com', '$2y$10$Z9TxN0qi2A9YLjQu/UUBDuCKmrOFyiLJLBkroU.vvMma6auni7nXu', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(12, 'Nguyễn Văn 8', NULL, 'a8@gmail.com', '$2y$10$sZJdpfvzlexk5CpZxPj.H.ofjwYFugPtYjaQFkvbVNaXtjXmyWSN2', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(13, 'Nguyễn Văn 9', NULL, 'a9@gmail.com', '$2y$10$UNgrZ1Q6dyLbBkXSffp0xuGBe0EvLybDZehRANp6rno/63VWsiX7a', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(14, 'Nguyễn Văn 10', NULL, 'a10@gmail.com', '$2y$10$.HYwLcnl6ObQbJEwI5E3Geimo6PmTH4C7BENRr/.IjKjoFTM01.6C', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(15, 'Nguyễn Văn 11', NULL, 'a11@gmail.com', '$2y$10$SgIWUKn0Dx8aj9qwZNcEp.G0eoIvmOxIu1xyUxLc5OW5DSHTz8Hya', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(16, 'Nguyễn Văn 12', NULL, 'a12@gmail.com', '$2y$10$fQ4C/y4SpUDz8HOTRA1mseWjOVwb/keTZeE2433XV.hjDViVT6686', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(17, 'Nguyễn Văn 13', NULL, 'a13@gmail.com', '$2y$10$KH4jhy7vsmcxm3btXjpsCe50IrygvI0n2q9/d0eq9reae.LN/9Q.u', '2024-05-30 13:48:56', '2024-05-30 13:48:56', 0, 'member'),
(18, 'Nguyễn Văn 14', NULL, 'a14@gmail.com', '$2y$10$MpDvBxjuv7udCS.LVyuj/.9C.fXe6vFE0zWA8.HC.ZPaVzeA4XAfy', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(19, 'Nguyễn Văn 15', NULL, 'a15@gmail.com', '$2y$10$Dc30e4E6Vbp74Ltnv8d2uuEMKUib7ugY8TCUoJ7LNmaiwu2/.CWJe', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(20, 'Nguyễn Văn 16', NULL, 'a16@gmail.com', '$2y$10$2JYsCM8Tfc0g3/HUyoiMWOAoH53fmTyVJIuaL/z3lgRsf/lm0aaHe', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(21, 'Nguyễn Văn 17', NULL, 'a17@gmail.com', '$2y$10$V896habUE35cvndSS7HC7.pqf.2KgMy1acy3PwBqZK0ZRNoNZCB8a', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(22, 'Nguyễn Văn 18', NULL, 'a18@gmail.com', '$2y$10$6DsY0gP2SthyyExL6tVA6eihelrGzpeAC/USSWlaYSsQcYyoB8thu', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(23, 'Nguyễn Văn 19', NULL, 'a19@gmail.com', '$2y$10$LO1CAzzklR3cPPEMu/gqLe9Vwyf/AeL7SIfT0Csc8n2cqahsc.i2i', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(24, 'Nguyễn Văn 20', NULL, 'a20@gmail.com', '$2y$10$Lqb8xTgwiOIlOVu9A3LcbuwxsxC3awYZ2IVMpFCJ1OjKBpnKDcc/C', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(25, 'Nguyễn Văn 21', NULL, 'a21@gmail.com', '$2y$10$6wAJW1RH3bsC72Rf4cym8.IJXvQJrXdLyASCdZ9JQubwRUjLxKs2W', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(26, 'Nguyễn Văn 22', NULL, 'a22@gmail.com', '$2y$10$6QJi9hBYCGkc/GknnYmNFerd/mzK/4Yuys.fsnRXhYIPEC3d3C72W', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(27, 'Nguyễn Văn 23', NULL, 'a23@gmail.com', '$2y$10$DLiTrtrfjKm2/wVAHqYLHeNPwISABhmlFUv8KAkF2JEMxIAJVGss6', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(28, 'Nguyễn Văn 24', NULL, 'a24@gmail.com', '$2y$10$KGpeAIxjXRPoZ01yHe41NetIzhdItmqSibOSwDjKLUIuWJPVX/OSq', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(29, 'Nguyễn Văn 25', NULL, 'a25@gmail.com', '$2y$10$OLZWUMNcCx57SLv8gxmoAevW5J/qcpYJmLEH43pCfEcqK9PpRJl5i', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(30, 'Nguyễn Văn 26', NULL, 'a26@gmail.com', '$2y$10$81yUTHfNBcpGrZ/ELDRDie52hB0mRSc9X5vy.vB61wlRTH22nMv/y', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(31, 'Nguyễn Văn 27', NULL, 'a27@gmail.com', '$2y$10$zRPy4A6sBFivIn7qma5l1O/WMgVyibtaIw4vAFSB/T2JkmXTj2Xpi', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(32, 'Nguyễn Văn 28', NULL, 'a28@gmail.com', '$2y$10$GmYqtKJr0/C3bRwJRzkij.7uof9p9mA4JP74rRoIW3yOS4sxDItAS', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(33, 'Nguyễn Văn 29', NULL, 'a29@gmail.com', '$2y$10$2PvLiv/8CbBAASBTA.66ieEjd.tOAQ1PhW98/iMZksvoQybNeL9GS', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(34, 'Nguyễn Văn 30', NULL, 'a30@gmail.com', '$2y$10$76sTMhivRcjqW12G9drsz.4ioTWuuqVn8xSlS3wJ2TuLgHJ8BuXg2', '2024-05-30 13:48:57', '2024-05-30 13:48:57', 0, 'member'),
(35, 'Nguyễn Văn 31', NULL, 'a31@gmail.com', '$2y$10$hXMBuqUciqtlPP24pgtYUePD9qU0GlLZJozt5TG2POZ8AodWbaHOO', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(36, 'Nguyễn Văn 32', NULL, 'a32@gmail.com', '$2y$10$AB.VK1NfWJeZtWUG4.NP6Owrd2jh.N5tM4tKCB.4pBWhDhz8aYLrK', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(37, 'Nguyễn Văn 33', NULL, 'a33@gmail.com', '$2y$10$kSIitLQiTEqGHUQnvfhKsO2GrY4n.Bswo.atMbMrTG1If0LIbzwBi', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(38, 'Nguyễn Văn 34', NULL, 'a34@gmail.com', '$2y$10$NQaJPZ5wAScEp2r0szz5v.F26x2HMobOAAQXbHjuSHqtqM79XqRGe', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(39, 'Nguyễn Văn 35', NULL, 'a35@gmail.com', '$2y$10$LwNSRlO1PwL/a771wAUfUOnN/VwSSq1NoWNk4vJTQ2bvj5Zc/hAVW', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(40, 'Nguyễn Văn 36', NULL, 'a36@gmail.com', '$2y$10$53kBmU4GER7sfH6HXwFSRO3HbOLBcF54OGNaNyPtgXhs33C65hoKm', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(41, 'Nguyễn Văn 37', NULL, 'a37@gmail.com', '$2y$10$/u.QISfm.Ei4zdV2va2Sm.aHsOumKiwKMcT/haHIidwOHXg5p8Msq', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(42, 'Nguyễn Văn 38', NULL, 'a38@gmail.com', '$2y$10$.S6AcuzjfqU.HjtIWTunau8vqhaX0i4QwaWZvU1ETEI7ynK.C8jXG', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(43, 'Nguyễn Văn 39', NULL, 'a39@gmail.com', '$2y$10$xONlhPaHsEsT5wEwdL2q0eICr5GlKKk9/5duFDG0Q0tjMvgKjQVDK', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(44, 'Nguyễn Văn 40', NULL, 'a40@gmail.com', '$2y$10$kfF7Mxn.3sQn8OPrxNu5x.hDv7G/L4tVXKi6hHCsPZrdVVvPFJ34.', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(45, 'Nguyễn Văn 41', NULL, 'a41@gmail.com', '$2y$10$L.2l0r4p2S2Cu7zBNEf.kexUVU76vNP91AeT00A9JgNF6dwAg7HQa', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(46, 'Nguyễn Văn 42', NULL, 'a42@gmail.com', '$2y$10$MLMxcTR7nEfjQ0WEpqSJB.UAnt5c0LHxzAuAaviKYKJmiwBMaCbLa', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(47, 'Nguyễn Văn 43', NULL, 'a43@gmail.com', '$2y$10$zmxFLPz7.svZu4t62fQuW.ya9Dr52XZDSyrOQOH6JGU3I5PY24/.i', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(48, 'Nguyễn Văn 44', NULL, 'a44@gmail.com', '$2y$10$9nc.D6BX4R0O.X8p2u04KedPsz6xswKVk6YpmkJDV3l/kTsA5K7qO', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(49, 'Nguyễn Văn 45', NULL, 'a45@gmail.com', '$2y$10$eFyJ2bQVZOI/svcH4Pg31uCRp0PS3DxM7Y/sheVup0bkqvLSS5kUu', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(50, 'Nguyễn Văn 46', NULL, 'a46@gmail.com', '$2y$10$27wCJH6mZz31EzukvIi.4uFqDdWpXIC/upyIc8I9g0D7Hw3vfiU1G', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(51, 'Nguyễn Văn 47', NULL, 'a47@gmail.com', '$2y$10$nw8gCRC5FOrWZ8WtxCrwvup5xwXjWqCw11j/uZeZItmeF4E59LHJW', '2024-05-30 13:48:58', '2024-05-30 13:48:58', 0, 'member'),
(52, 'Nguyễn Văn 48', NULL, 'a48@gmail.com', '$2y$10$tSd.Vvw2mPzVKwcma2JC2uYKQR7hxpR3pj45IHIiaU.qooSnvVjnm', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(53, 'Nguyễn Văn 49', NULL, 'a49@gmail.com', '$2y$10$dKziMNbKBQmFZtOp0N6IqOf6ylJjrA5/t/19gA870NlWYAF7KJJ2.', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(54, 'Nguyễn Văn 50', NULL, 'a50@gmail.com', '$2y$10$x7fBwgLsBK1VIJrlK5Xig.pj3CvxyCkR.X9/lrxrn2L6WcR17WmaS', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(55, 'Nguyễn Văn 51', NULL, 'a51@gmail.com', '$2y$10$JKAZbwJn5KDORXPt8Wd9weMHffY17eD6W.s5VnYCQjdcw7GE4jNUW', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(56, 'Nguyễn Văn 52', NULL, 'a52@gmail.com', '$2y$10$VQCAZdBnM1xAigO2E5v67.wy0RA/QjIIp5U5yDVsn3AXQOZtmGzDi', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(57, 'Nguyễn Văn 53', NULL, 'a53@gmail.com', '$2y$10$qqyZD/vL.yZtBZW9HeHSv.M3E6RDacsDumuuaJHocim/M48vzaf7e', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(58, 'Nguyễn Văn 54', NULL, 'a54@gmail.com', '$2y$10$aBIZp.iFyJQtKY7DknJ.gu84RN3dedDC173BSSLuc32KhjISasbAy', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(59, 'Nguyễn Văn 55', NULL, 'a55@gmail.com', '$2y$10$WASh9E0GhNK2dQscivsLf.GvtazQMtDyyD1LrxwN3nEVJiPGLQa1e', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(60, 'Nguyễn Văn 56', NULL, 'a56@gmail.com', '$2y$10$PIUEsB9hkhkQSo98M4Gj0OZi1YyedtLYC0Atx8x2CO6IwLzVCIcYK', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(61, 'Nguyễn Văn 57', NULL, 'a57@gmail.com', '$2y$10$JcThAnOT0ZpspwkLwI619OySvok.oJJ.kIQPBYPn1y6Qy4xtxMMRS', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(62, 'Nguyễn Văn 58', NULL, 'a58@gmail.com', '$2y$10$UW.D8PWrBFOmWFHJFq5uJeCxfqxYAWjfy11mVNHzfeatd801BkyTu', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(63, 'Nguyễn Văn 59', NULL, 'a59@gmail.com', '$2y$10$3bsw9n4eFtg5v8KzxjGxyOcf0Cu.UN1HfzRYzaKBUZZDVUbkOUy/m', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(64, 'Nguyễn Văn 60', NULL, 'a60@gmail.com', '$2y$10$38XOYyxTZw6MBhXbaEYq5ePZ3N4h6D2f5ve4ToHUHhDV9cLkdIijO', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(65, 'Nguyễn Văn 61', NULL, 'a61@gmail.com', '$2y$10$D80wDapoMj.E.jUA.z9jw.W0BQ7sEL9xgXPNkCdMigjP8.8MfB0by', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(66, 'Nguyễn Văn 62', NULL, 'a62@gmail.com', '$2y$10$s0Y9WLzNMVHHFDGkiEYHzOrDyiONbTUZT5qUvKLmR1N3SQNeFHGpa', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(67, 'Nguyễn Văn 63', NULL, 'a63@gmail.com', '$2y$10$tbl2f7ng6Winlhin0cGDw.rRKTUbJ4YRMX/vs88NEGLHawJo3c52W', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(68, 'Nguyễn Văn 64', NULL, 'a64@gmail.com', '$2y$10$ScsZSnkEUvblGbjHC0Elw.a1jVyvBww06K2Ennf5sIwVIPLrFvf76', '2024-05-30 13:48:59', '2024-05-30 13:48:59', 0, 'member'),
(69, 'Nguyễn Văn 65', NULL, 'a65@gmail.com', '$2y$10$PfEvrWsCLASbuHJYHPSVfOfl5tKjPd/ko6OojCUgLsr/y3vg9VAIq', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(70, 'Nguyễn Văn 66', NULL, 'a66@gmail.com', '$2y$10$3AEJDQFkH45tWB77vVFpNu7vEIOHsE.fqMA08BIxb3FLnELcR9OnS', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(71, 'Nguyễn Văn 67', NULL, 'a67@gmail.com', '$2y$10$4vrXrSFYHFhGJpe9Db1xXOwrzsherjr1SpP/qpCSXz/MKmuKNnN2C', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(72, 'Nguyễn Văn 68', NULL, 'a68@gmail.com', '$2y$10$KURi7rY3kZwobOvwgVMpgu53jyqMWPS1XatDATBKEPQ1RMQQX5Tiu', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(73, 'Nguyễn Văn 69', NULL, 'a69@gmail.com', '$2y$10$XhQueq7HWStFjGVsn0dPw.ggjMsQElaB0m8Ey3BvTCZvrh0K.uF.y', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(74, 'Nguyễn Văn 70', NULL, 'a70@gmail.com', '$2y$10$yCfd.5OgpddoJaa5IOkTCeWiW1B22L0jDGXhIRS/AZgUEc5rjHahO', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(75, 'Nguyễn Văn 71', NULL, 'a71@gmail.com', '$2y$10$f2fnnw68lpKzjWJIYxKyk./7rswuUTBUAIumdg2Epa5wCGLWI6XAy', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(76, 'Nguyễn Văn 72', NULL, 'a72@gmail.com', '$2y$10$DpQ1brWDWaSTw8459Jixuu/FrDCwVLDskhltNxGaE4FB5OvOKItyO', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(77, 'Nguyễn Văn 73', NULL, 'a73@gmail.com', '$2y$10$0l9GIM3ZmQnwOedqkRmtiO7CkRifk9o6DShaL269wMHnt7xfvAnWi', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(78, 'Nguyễn Văn 74', NULL, 'a74@gmail.com', '$2y$10$LD6jZWcu692lQY3k0v58Tea6XYOWNi8q.URBPDAS7Z4Zs4VYJub9m', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(79, 'Nguyễn Văn 75', NULL, 'a75@gmail.com', '$2y$10$t9a6Jf0lR3xvvJ5mUX2v6.EOkpRHbxmYVqYsvr1xqpVKeUFbTVjTe', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(80, 'Nguyễn Văn 76', NULL, 'a76@gmail.com', '$2y$10$ld8zjsKPHpSHduJ9.yJE9eOwxHJgPFAKt6Ua/ODhLrkD5PgwJKzdC', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(81, 'Nguyễn Văn 77', NULL, 'a77@gmail.com', '$2y$10$hJbVgT5vh3DH1.Kc.wCOLeKk1nH2Rw50ESNhuxgyrpJvHf4PwdYl.', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(82, 'Nguyễn Văn 78', NULL, 'a78@gmail.com', '$2y$10$T5M3ulSWWR9tYV.oEkP0LuTIh7x8zIUC6rhe/1WHDpahWTGn4vS.y', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(83, 'Nguyễn Văn 79', NULL, 'a79@gmail.com', '$2y$10$cFZPoVmUdd5l8UZlk76uBui9YtWl1Bjt8HSqbERt2Z5nqjxjZpcfq', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(84, 'Nguyễn Văn 80', NULL, 'a80@gmail.com', '$2y$10$XGe0b31Hj.Org3gpSRSnB.8xDl6LOyGA0Of1UlLXZzScZCGnFDMvO', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(85, 'Nguyễn Văn 81', NULL, 'a81@gmail.com', '$2y$10$ZuXDF7eYbR5QaAyRly/32eSjOFCK18mQQ..IzFqa6hd1mLg7ioNjq', '2024-05-30 13:49:00', '2024-05-30 13:49:00', 0, 'member'),
(86, 'Nguyễn Văn 82', NULL, 'a82@gmail.com', '$2y$10$QpP01maEXmnyLTLEN6HHouVnkFBSBRhT3ZGJ4vDjKOcDrJhGLP2oW', '2024-05-30 13:49:01', '2024-05-30 13:49:01', 0, 'member'),
(87, 'Nguyễn Văn 83', NULL, 'a83@gmail.com', '$2y$10$eckdzBiteD/oJGejsvxdke3ojlqndBEHPnxzzKrr90nGe2hjLAzt2', '2024-05-30 13:49:01', '2024-05-30 13:49:01', 0, 'member'),
(89, 'Nguyễn Văn 85', NULL, 'a85@gmail.com', '$2y$10$6XASiG5D1HZtDZtxUrI9XeFt6eUwyF/WCyreYqYrldQWQfX3HZoTG', '2024-05-30 13:49:01', '2024-05-30 13:49:01', 0, 'member'),
(90, 'Nguyễn Văn 86', NULL, 'a86@gmail.com', '$2y$10$gJwucVIzDdtLsP9kTrYvMuFsdwkgAxiTddwp.4J44kDWAebvkZKii', '2024-05-30 13:49:01', '2024-05-30 13:49:01', 0, 'member'),
(96, 'Nguyễn Văn 92', NULL, 'a92@gmail.com', '$2y$10$MzbL3MfnLmxP7J3mjqgN7.O2l2SDOQBtFzqw/MMyr8zZqfLCYb3t2', '2024-05-30 13:49:01', '2024-05-30 13:49:01', 0, 'member'),
(109, 'Admin', 'assets/uploads/171775084220220413_095851.jpg', 'admin1@example.com', '$2y$10$FJChacrKgVDBVkxNLKO9selJ5h2cjiOj8AvVeJMWFGrE2y9XFywaO', '2024-06-07 08:44:13', '2024-06-07 08:44:13', 0, 'admin'),
(110, 'lê trọng nghĩa', 'assets/uploads/1717751551445380659_1649393369154377_15821016651817196_n.jpg', 'nghialtph34330@gmail.com', '$2y$10$QOJxdJuVUgwBuElLAqQVHuXQVTXZ8lrsE81PnG6gPgEpJbYGgwhYG', '2024-06-07 09:12:31', '2024-06-07 09:12:31', 0, 'member'),
(112, 'dien thoai', 'assets/uploads/171778491720220618_092527.jpg', 'nghialtph34330@fpt.edu.vn', '$2y$10$PNKYf2L8dlET3Fv7GcWESOiP7vOF7ZNaZqV9Vsbp6eQJRDsRIsQc2', '2024-06-07 18:28:37', '2024-06-07 18:28:37', 0, 'member'),
(113, 'nghia', 'assets/uploads/1717911434Screenshot (82).png', 'nghia@gmail.com', '$2y$10$c7SZZoBhjne9wmQp.lVv7uBoZfBbXWS0Lg.p7dmv2zhaBFDKoOAoS', '2024-06-09 05:37:14', '2024-06-09 05:37:14', 0, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_flights_categories` (`category_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `FlightID` (`FlightID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TicketID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `fk_flights_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`FlightID`) REFERENCES `flights` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
