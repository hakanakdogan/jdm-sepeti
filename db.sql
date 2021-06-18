-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 18 Haz 2021, 19:27:16
-- Sunucu sürümü: 10.3.22-MariaDB-log
-- PHP Sürümü: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `285125`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `buy_request`
--

CREATE TABLE `buy_request` (
  `ID` int(11) NOT NULL,
  `owner_ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `car_ID` int(11) NOT NULL,
  `pending` tinyint(1) NOT NULL DEFAULT 1,
  `accepted` tinyint(1) NOT NULL DEFAULT 0,
  `rejected` tinyint(1) NOT NULL DEFAULT 0,
  `price` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `buy_request`
--

INSERT INTO `buy_request` (`ID`, `owner_ID`, `customer_ID`, `car_ID`, `pending`, `accepted`, `rejected`, `price`) VALUES
(8, 7, 2, 31, 0, 0, 1, 100000),
(9, 7, 3, 31, 0, 0, 1, 150000),
(10, 7, 3, 31, 0, 1, 0, 200000),
(11, 7, 3, 30, 0, 0, 1, 15000),
(12, 2, 7, 29, 0, 0, 1, 150000),
(13, 7, 10, 29, 0, 0, 1, 100000),
(14, 10, 3, 29, 0, 0, 1, 150000),
(15, 10, 2, 29, 0, 1, 0, 170000),
(16, 2, 7, 29, 1, 0, 0, 100000),
(17, 7, 3, 30, 0, 1, 0, 28000),
(18, 7, 11, 33, 1, 0, 0, 100000000000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car`
--

CREATE TABLE `car` (
  `ID` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `year` int(4) NOT NULL,
  `mileage` float NOT NULL,
  `isforsale` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(200) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `car`
--

INSERT INTO `car` (`ID`, `brand`, `model`, `year`, `mileage`, `isforsale`, `image`) VALUES
(29, 'Nissan', 'GTR R-34 ', 1998, 250000, 0, '5ae82d77f0f72f57c34d8c1a274f5417.jpg'),
(30, 'Honda', 's2000', 2003, 150000, 0, 'honda-s2000.jpg'),
(31, 'Honda', ' NSX ', 1996, 250000, 1, 'pexels-supreet-7993052.jpg'),
(33, 'Toyota', 'Supra', 2020, 105, 1, 'pexels-garvin-st-villier-3874337.jpg'),
(34, 'Mitsubishi', 'EVO X', 2005, 127000, 0, '9ba967e586c064aca04a7a7284fdf88a.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_customer`
--

CREATE TABLE `car_customer` (
  `ID` int(11) NOT NULL,
  `car_ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car_owner`
--

CREATE TABLE `car_owner` (
  `ID` int(11) NOT NULL,
  `car_ID` int(11) NOT NULL,
  `owner_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `car_owner`
--

INSERT INTO `car_owner` (`ID`, `car_ID`, `owner_ID`) VALUES
(17, 29, 2),
(19, 30, 3),
(20, 31, 3),
(22, 33, 7),
(23, 34, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `name`) VALUES
(2, 'michael@example.com', '$2y$10$IaQU5Ik1DasXEuoiBXcWsO9yKYxyLcB6uPxTRtW5Qz5AQmm.HRKAa', 'Michael Scott'),
(3, 'pam@example.com', '$2y$10$Vd23wha04CVy.htqNsVON.EKI4eUU5GWoLvpYO3j1Ra9FMwRAhteW', 'Pam Beesly'),
(4, 'karadogan@example.com', '$2y$10$2sIXIM5QAl49zHgc78A6tuF9Gv4PWtUe.H3UNH9JoYYEIuXltw.eS', 'Hakan Karadoğan'),
(6, 'eran@example.com', '$2y$10$qTkAfLAmDkLfqOYUBlQ31eCBvv9zoCEdqQqcKv167pe6MW/jU.CUm', 'Erhan Baştürk'),
(7, 'hakan@example.com', '$2y$10$g6qTghNN80QV2DiouHwFPurKZWkNqkLkJm/C.0SZ/SohZ7KC/Yg2e', 'Hakan Akdoğan'),
(10, 'emre@example.com', '$2y$10$krCIbmPq/jHkgpRycP35g.Xg72D6vtAaCqxRf//QU8tk.rbqMjN0W', 'Emre Karadağ'),
(11, 'as@gmail.com', '$2y$10$bIO7uKWMtW5G87G0hH40Fe7seLQy9Sj1Uu.1amgsT0XBCKJmLChEK', 'as');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `buy_request`
--
ALTER TABLE `buy_request`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`,`owner_ID`,`customer_ID`),
  ADD KEY `owner_ID` (`owner_ID`),
  ADD KEY `customer_ID` (`customer_ID`),
  ADD KEY `car_ID` (`car_ID`);

--
-- Tablo için indeksler `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `car_customer`
--
ALTER TABLE `car_customer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`,`car_ID`,`customer_ID`),
  ADD KEY `car_ID` (`car_ID`),
  ADD KEY `customer_ID` (`customer_ID`);

--
-- Tablo için indeksler `car_owner`
--
ALTER TABLE `car_owner`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`,`car_ID`,`owner_ID`),
  ADD KEY `car_ID` (`car_ID`),
  ADD KEY `owner_ID` (`owner_ID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `buy_request`
--
ALTER TABLE `buy_request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `car`
--
ALTER TABLE `car`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `car_customer`
--
ALTER TABLE `car_customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `car_owner`
--
ALTER TABLE `car_owner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `buy_request`
--
ALTER TABLE `buy_request`
  ADD CONSTRAINT `buy_request_ibfk_1` FOREIGN KEY (`owner_ID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `buy_request_ibfk_2` FOREIGN KEY (`customer_ID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `buy_request_ibfk_3` FOREIGN KEY (`car_ID`) REFERENCES `car` (`ID`);

--
-- Tablo kısıtlamaları `car_customer`
--
ALTER TABLE `car_customer`
  ADD CONSTRAINT `car_customer_ibfk_1` FOREIGN KEY (`car_ID`) REFERENCES `car` (`ID`),
  ADD CONSTRAINT `car_customer_ibfk_2` FOREIGN KEY (`customer_ID`) REFERENCES `users` (`ID`);

--
-- Tablo kısıtlamaları `car_owner`
--
ALTER TABLE `car_owner`
  ADD CONSTRAINT `car_owner_ibfk_1` FOREIGN KEY (`car_ID`) REFERENCES `car` (`ID`),
  ADD CONSTRAINT `car_owner_ibfk_2` FOREIGN KEY (`owner_ID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
