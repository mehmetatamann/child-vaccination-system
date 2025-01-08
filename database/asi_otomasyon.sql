-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Oca 2025, 03:35:53
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `asi_otomasyon`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `asilar`
--

CREATE TABLE `asilar` (
  `id` int(11) NOT NULL,
  `asi_adi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `asilar`
--

INSERT INTO `asilar` (`id`, `asi_adi`) VALUES
(1, 'Kızamık'),
(2, 'Boğmaca'),
(3, 'Difteri'),
(4, 'Hepatit B'),
(5, 'Hepatit A'),
(6, 'Verem'),
(7, 'Tetanoz'),
(8, 'Kabakulak'),
(9, 'Suçiçeği');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastane_asi`
--

CREATE TABLE `hastane_asi` (
  `id` int(11) NOT NULL,
  `hastane_id` int(11) NOT NULL,
  `asi_id` int(11) NOT NULL,
  `asi_yapiliyor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hastane_asi`
--

INSERT INTO `hastane_asi` (`id`, `hastane_id`, `asi_id`, `asi_yapiliyor`) VALUES
(10, 2, 1, 1),
(11, 2, 2, 1),
(12, 2, 3, 1),
(13, 2, 4, 0),
(14, 2, 5, 0),
(15, 2, 6, 1),
(16, 2, 7, 1),
(17, 2, 8, 1),
(18, 2, 9, 1),
(44, 4, 1, 1),
(45, 4, 2, 0),
(46, 4, 3, 0),
(47, 4, 4, 0),
(48, 4, 5, 0),
(49, 4, 6, 0),
(50, 4, 7, 0),
(51, 4, 8, 0),
(52, 4, 9, 1),
(60, 6, 1, 1),
(61, 6, 2, 0),
(62, 6, 3, 0),
(63, 6, 6, 0),
(64, 6, 7, 0),
(65, 6, 8, 0),
(66, 6, 9, 1),
(76, 6, 1, 0),
(77, 6, 2, 1),
(78, 6, 3, 0),
(79, 6, 4, 0),
(80, 6, 5, 0),
(81, 6, 6, 0),
(82, 6, 7, 1),
(83, 6, 8, 0),
(84, 6, 9, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `il`
--

CREATE TABLE `il` (
  `il_id` int(11) NOT NULL,
  `il_adi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `il`
--

INSERT INTO `il` (`il_id`, `il_adi`) VALUES
(1, 'ADANA'),
(2, 'ADIYAMAN'),
(3, 'AFYONKARAHİSAR'),
(4, 'AĞRI'),
(5, 'AMASYA'),
(6, 'ANKARA'),
(7, 'ANTALYA'),
(8, 'ARTVİN'),
(9, 'AYDIN'),
(10, 'BALIKESİR'),
(11, 'BİLECİK'),
(12, 'BİNGÖL'),
(13, 'BİTLİS'),
(14, 'BOLU'),
(15, 'BURDUR'),
(16, 'BURSA'),
(17, 'ÇANAKKALE'),
(18, 'ÇANKIRI'),
(19, 'ÇORUM'),
(20, 'DENİZLİ'),
(21, 'DİYARBAKIR'),
(22, 'EDİRNE'),
(23, 'ELAZIĞ'),
(24, 'ERZİNCAN'),
(25, 'ERZURUM'),
(26, 'ESKİŞEHİR'),
(27, 'GAZİANTEP'),
(28, 'GİRESUN'),
(29, 'GÜMÜŞHANE'),
(30, 'HAKKARİ'),
(31, 'HATAY'),
(32, 'ISPARTA'),
(33, 'MERSİN'),
(34, 'İSTANBUL'),
(35, 'İZMİR'),
(36, 'KARS'),
(37, 'KASTAMONU'),
(38, 'KAYSERİ'),
(39, 'KIRKLARELİ'),
(40, 'KIRŞEHİR'),
(41, 'KOCAELİ'),
(42, 'KONYA'),
(43, 'KÜTAHYA'),
(44, 'MALATYA'),
(45, 'MANİSA'),
(46, 'KAHRAMANMARAŞ'),
(47, 'MARDİN'),
(48, 'MUĞLA'),
(49, 'MUŞ'),
(50, 'NEVŞEHİR'),
(51, 'NİĞDE'),
(52, 'ORDU'),
(53, 'RİZE'),
(54, 'SAKARYA'),
(55, 'SAMSUN'),
(56, 'SİİRT'),
(57, 'SİNOP'),
(58, 'SİVAS'),
(59, 'TEKİRDAĞ'),
(60, 'TOKAT'),
(61, 'TRABZON'),
(62, 'TUNCELİ'),
(63, 'ŞANLIURFA'),
(64, 'UŞAK'),
(65, 'VAN'),
(66, 'YOZGAT'),
(67, 'ZONGULDAK'),
(68, 'AKSARAY'),
(69, 'BAYBURT'),
(70, 'KARAMAN'),
(71, 'KIRIKKALE'),
(72, 'BATMAN'),
(73, 'ŞIRNAK'),
(74, 'BARTIN'),
(75, 'ARDAHAN'),
(76, 'IĞDIR'),
(77, 'YALOVA'),
(78, 'KARABÜK'),
(79, 'KİLİS'),
(80, 'OSMANİYE'),
(81, 'DÜZCE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_hasta`
--

CREATE TABLE `kullanici_hasta` (
  `id` int(11) NOT NULL,
  `kullanici_tcno` varchar(11) NOT NULL,
  `kullanici_ad_soyad` varchar(100) NOT NULL,
  `kullanici_sifre` varchar(100) NOT NULL,
  `kullanici_dogum` date NOT NULL,
  `kullanici_email` varchar(100) NOT NULL,
  `kullanici_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici_hasta`
--

INSERT INTO `kullanici_hasta` (`id`, `kullanici_tcno`, `kullanici_ad_soyad`, `kullanici_sifre`, `kullanici_dogum`, `kullanici_email`, `kullanici_tel`) VALUES
(3, '11111111111', 'Barü', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2025-01-28', 'baru@admin.com', '1111111111');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_hastane`
--

CREATE TABLE `kullanici_hastane` (
  `id` int(11) NOT NULL,
  `hastane_adi` varchar(100) NOT NULL,
  `hastane_sifre` varchar(255) NOT NULL,
  `hastane_il` int(11) NOT NULL,
  `durum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici_hastane`
--

INSERT INTO `kullanici_hastane` (`id`, `hastane_adi`, `hastane_sifre`, `hastane_il`, `durum`) VALUES
(2, 'Bartın Devlet Hastanesi', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 74, 'Onaylı Hastane'),
(4, 'Mersin Devlet Hastanesi', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 33, 'Onaylı Hastane'),
(6, 'Zonguldak Devlet Hastanesi', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 67, 'Onaylı Hastane'),
(7, 'Ankara Devlet Hastanesi', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 6, 'Reddedildi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_yonetici`
--

CREATE TABLE `kullanici_yonetici` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(100) NOT NULL,
  `kullanici_sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici_yonetici`
--

INSERT INTO `kullanici_yonetici` (`id`, `kullanici_adi`, `kullanici_sifre`) VALUES
(2, 'admin2', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8'),
(7, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `mesaj_id` int(11) NOT NULL,
  `konu` varchar(255) NOT NULL,
  `mesaj` text NOT NULL,
  `ziyaretci_ad_soyad` varchar(255) NOT NULL,
  `ziyaretci_email` varchar(255) NOT NULL,
  `gonderim_tarihi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

CREATE TABLE `randevu` (
  `id` int(11) NOT NULL,
  `hasta_id` int(11) NOT NULL,
  `hastane_id` int(11) NOT NULL,
  `asi_id` int(11) NOT NULL,
  `randevu_tarihi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`id`, `hasta_id`, `hastane_id`, `asi_id`, `randevu_tarihi`) VALUES
(8, 3, 2, 6, '2025-02-06 16:22:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `asilar`
--
ALTER TABLE `asilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hastane_asi`
--
ALTER TABLE `hastane_asi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hastane_id` (`hastane_id`),
  ADD KEY `asi_id` (`asi_id`);

--
-- Tablo için indeksler `il`
--
ALTER TABLE `il`
  ADD PRIMARY KEY (`il_id`);

--
-- Tablo için indeksler `kullanici_hasta`
--
ALTER TABLE `kullanici_hasta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanici_tcno` (`kullanici_tcno`);

--
-- Tablo için indeksler `kullanici_hastane`
--
ALTER TABLE `kullanici_hastane`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hastane_il_fk` (`hastane_il`);

--
-- Tablo için indeksler `kullanici_yonetici`
--
ALTER TABLE `kullanici_yonetici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanici_adi` (`kullanici_adi`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `randevu`
--
ALTER TABLE `randevu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `randevu_hasta_fk` (`hasta_id`),
  ADD KEY `randevu_hastane_fk` (`hastane_id`),
  ADD KEY `randevu_asi_fk` (`asi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `asilar`
--
ALTER TABLE `asilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `hastane_asi`
--
ALTER TABLE `hastane_asi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_hasta`
--
ALTER TABLE `kullanici_hasta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_hastane`
--
ALTER TABLE `kullanici_hastane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_yonetici`
--
ALTER TABLE `kullanici_yonetici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `randevu`
--
ALTER TABLE `randevu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `hastane_asi`
--
ALTER TABLE `hastane_asi`
  ADD CONSTRAINT `hastane_asi_ibfk_1` FOREIGN KEY (`hastane_id`) REFERENCES `kullanici_hastane` (`id`),
  ADD CONSTRAINT `hastane_asi_ibfk_2` FOREIGN KEY (`asi_id`) REFERENCES `asilar` (`id`);

--
-- Tablo kısıtlamaları `kullanici_hastane`
--
ALTER TABLE `kullanici_hastane`
  ADD CONSTRAINT `hastane_il_fk` FOREIGN KEY (`hastane_il`) REFERENCES `il` (`il_id`);

--
-- Tablo kısıtlamaları `randevu`
--
ALTER TABLE `randevu`
  ADD CONSTRAINT `randevu_asi_fk` FOREIGN KEY (`asi_id`) REFERENCES `asilar` (`id`),
  ADD CONSTRAINT `randevu_hasta_fk` FOREIGN KEY (`hasta_id`) REFERENCES `kullanici_hasta` (`id`),
  ADD CONSTRAINT `randevu_hastane_fk` FOREIGN KEY (`hastane_id`) REFERENCES `kullanici_hastane` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
