-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 May 2017, 00:41:25
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `personal_bank`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `account_info`
--

CREATE TABLE `account_info` (
  `Account_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Account_Number` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Balance` int(11) NOT NULL,
  `Branch` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `account_info`
--

INSERT INTO `account_info` (`Account_ID`, `Customer_ID`, `Account_Number`, `Balance`, `Branch`) VALUES
(8, 7, '1472586925836984', 0, 'Menderes/Sirinyer/IZMIR'),
(9, 6, '1474452147896325', 0, 'Menderes/Sirinyer/IZMIR'),
(10, 10, '1254745325471236', 0, 'Hatay/Konak/Izmir');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_Name` varchar(50) NOT NULL,
  `Admin_LoginName` varchar(50) NOT NULL,
  `Admin_Password` varchar(50) NOT NULL,
  `Admin_Phone` varchar(50) NOT NULL,
  `Admin_Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`Admin_ID`, `Admin_Name`, `Admin_LoginName`, `Admin_Password`, `Admin_Phone`, `Admin_Email`) VALUES
(1, 'Humeyra Erdem', 'erdemhumeyra', 'erdem123', '05354896978', 'erdem@gmail.com'),
(2, 'Seran Erdemir', 'erdemirseran', 'erdemir123', '05314568974', 'erdemir@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bankcard_info`
--

CREATE TABLE `bankcard_info` (
  `BankCard_ID` int(11) NOT NULL,
  `Account_ID` int(11) NOT NULL,
  `BankCard_Number` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `BankCart_Security` varchar(10) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `BankCard_Password` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `BankCard_ValidThru` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_info`
--

CREATE TABLE `customer_info` (
  `Customer_ID` int(11) NOT NULL,
  `Customer_TC` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Customer_Number` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Customer_Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Customer_Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Customer_Gender` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Customer_Birthdate` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Customer_Phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Customer_Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Customer_Address` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Customer_LoanPoint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `customer_info`
--

INSERT INTO `customer_info` (`Customer_ID`, `Customer_TC`, `Customer_Number`, `Customer_Password`, `Customer_Name`, `Customer_Gender`, `Customer_Birthdate`, `Customer_Phone`, `Customer_Email`, `Customer_Address`, `Customer_LoanPoint`) VALUES
(6, '447788552223', '44558899', '555555', 'Süleyman Gündüz', 'Male', '12.12.1992', '05326988585', 'gunduz@gmail.com', 'Buca/Izmir', 4),
(7, '44552211447', '63259874', '256325', 'Aysel Koc', 'Female', '22.03.1980', '05478521456', 'koc@gmail.com', 'Uskudar/Istanbul', 150),
(8, '42365214563', '45212365', '225544', 'Ayse Aydın', 'Female', '14.06.1999', '05315622112', 'aydin@gmail.com', 'Karsiyaka/Izmir', 111),
(10, '12345625634', '78524698', '456789', 'Meltem YILDIRIM', 'Female', '15.10.1982', '05478965415', 'yıldırım@gmail.com', 'Buca/Izmir', 70);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`Account_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Tablo için indeksler `bankcard_info`
--
ALTER TABLE `bankcard_info`
  ADD PRIMARY KEY (`BankCard_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Tablo için indeksler `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `account_info`
--
ALTER TABLE `account_info`
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `bankcard_info`
--
ALTER TABLE `bankcard_info`
  MODIFY `BankCard_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `account_info`
--
ALTER TABLE `account_info`
  ADD CONSTRAINT `account_info_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer_info` (`Customer_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `bankcard_info`
--
ALTER TABLE `bankcard_info`
  ADD CONSTRAINT `bankcard_info_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `bankcard_info` (`BankCard_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
