-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Haz 2023, 18:06:39
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0
SET SQL_REQUIRE_PRIMARY_KEY=OFF;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ecommerce2`
--
drop PROCEDURE IF EXISTS `product_image`;
DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`doadmin`@`%` PROCEDURE `product_image` (IN `p_product_id` INT(11))   BEGIN 
insert into product_images(product,image,is_main) values(p_product_id,"assets/img/product/product2.webp",1);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about_us`
--

CREATE TABLE `about_us` (
  `ID` int(11) NOT NULL,
  `media_1` text NOT NULL,
  `header_1` text NOT NULL,
  `header_2` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `about_us`
--

INSERT INTO `about_us` (`ID`, `media_1`, `header_1`, `header_2`, `content`) VALUES
(1, 'assets/img/about_us/banner19.webp', '<p>Neden mi biz ???</p>', '<p>&Uuml;r&uuml;nlerimizi tamamen kendimiz &uuml;retiyoruz</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit illo, est repellendus are quia voluptate neque reiciendis ea placeat labore maiores cum, hic ducimus ad a dolorem soluta consectetur adipisci. Perspiciatis quas ab quibusdam is. Itaque accusantium eveniet a laboriosam dolorem? Magni suscipit est corrupti explicabo non perspiciatis, excepturi ut asperiores assumenda rerum? Provident ab corrupti sequi, voluptates repudiandae eius odit aut.</p>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `addresses`
--

CREATE TABLE `addresses` (
  `ID` int(3) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `address_name` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `full_address` text NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `picker_first_name` varchar(50) NOT NULL,
  `picker_last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `addresses`
--

INSERT INTO `addresses` (`ID`, `customer_id`, `address_name`, `city`, `full_address`, `phone_number`, `picker_first_name`, `picker_last_name`) VALUES
(1, 1, 'Ev', '35', 'Şükrükaraduman caddesi no:139 daire:1', '05497262663', 'Efe', 'Şengül'),
(6, 2, 'ev', '35', 'dağ', '5497262663', 'cemal', 'mustafaoğlu'),
(9, 31, 'ev', '35', 'şükrü karaduman caddesi no:139 daire:1', '5497262663', 'efe', 'şengül');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `choose_us`
--

CREATE TABLE `choose_us` (
  `ID` int(11) NOT NULL,
  `image_1` text NOT NULL,
  `image_2` text NOT NULL,
  `header` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `choose_us`
--

INSERT INTO `choose_us` (`ID`, `image_1`, `image_2`, `header`, `text`) VALUES
(1, 'assets/img/banner/banner23.webp', 'assets/img/banner/banner24.webp', 'Neden Bizi Seçmelisiniz ?', 'lorem ipsum dolor sir amet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cities`
--

CREATE TABLE `cities` (
  `ID` int(2) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `cities`
--

INSERT INTO `cities` (`ID`, `city`) VALUES
(1, 'adana'),
(2, 'adiyaman'),
(3, 'afyon'),
(4, 'ağri'),
(5, 'amasya'),
(6, 'ankara'),
(7, 'antalya'),
(8, 'artvin'),
(9, 'aydin'),
(10, 'balikesir'),
(11, 'bilecik'),
(12, 'bingöl'),
(13, 'bitlis'),
(14, 'bolu'),
(15, 'burdur'),
(16, 'bursa'),
(17, 'çanakkale'),
(18, 'çankiri'),
(19, 'çorum'),
(20, 'denizli'),
(21, 'diyarbakir'),
(22, 'edirne'),
(23, 'elaziğ'),
(24, 'erzincan'),
(25, 'erzurum'),
(26, 'eskişehir'),
(27, 'gaziantep'),
(28, 'giresun'),
(29, 'gümüşhane'),
(30, 'hakkari'),
(31, 'hatay'),
(32, 'isparta'),
(33, 'içel'),
(34, 'istanbul'),
(35, 'izmir'),
(36, 'kars'),
(37, 'kastamonu'),
(38, 'kayseri'),
(39, 'kirklareli'),
(40, 'kirşehir'),
(41, 'kocaeli'),
(42, 'konya'),
(43, 'kütahya'),
(44, 'malatya'),
(45, 'manisa'),
(46, 'kahramanmaraş'),
(47, 'mardin'),
(48, 'muğla'),
(49, 'muş'),
(50, 'nevşehir'),
(51, 'niğde'),
(52, 'ordu'),
(53, 'rize'),
(54, 'sakarya'),
(55, 'samsun'),
(56, 'siirt'),
(57, 'sinop'),
(58, 'sivas'),
(59, 'tekirdağ'),
(60, 'tokat'),
(61, 'trabzon'),
(62, 'tunceli'),
(63, 'şanliurfa'),
(64, 'uşak'),
(65, 'van'),
(66, 'yozgat'),
(67, 'zonguldak'),
(68, 'aksaray'),
(69, 'bayburt'),
(70, 'karaman'),
(71, 'kirikkale'),
(72, 'batman'),
(73, 'şirnak'),
(74, 'bartin'),
(75, 'ardahan'),
(76, 'iğdir'),
(77, 'yalova'),
(78, 'karabük'),
(79, 'kilis'),
(80, 'osmaniye'),
(81, 'düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_info`
--

CREATE TABLE `contact_info` (
  `ID` int(11) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `phone_number2` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `google_maps` text NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `contact_info`
--

INSERT INTO `contact_info` (`ID`, `phone_number`, `phone_number2`, `email`, `google_maps`, `address`) VALUES
(1, '0123 123 12 23', '#', 'ecommercewebsite@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3127.025467944211!2d27.11320895063447!3d38.394660183925936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbd8e2fece48eb%3A0xafa58b890c33632a!2zS29uYWsvxLB6bWly!5e0!3m2!1str!2str!4v1680523013520!5m2!1str!2str', 'İzmir konak saat kulesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `full_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`ID`, `first_name`, `last_name`, `full_name`, `email`, `password`, `ip`) VALUES
(1, 'Efe', 'Şengül', 'Efe Şengül', 'asd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
(2, 'cemal', 'mustafaoğlu', 'Cemal Mustafaoğlu', 'sdf@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(30, 'Niyazi', 'Büyükerdoğan', 'Niyazi Büyükerdoğan', 'konyalisikici31@gmail.com', '34e20ed6eea10eac70d7edd2d1fa4dd5', ''),
(31, 'efe', 'şengül', 'efe şengül', 'efe20041@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(78, 'efe', 'şengül', 'efe şengül', 'ipdeneme@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '127.0.0.1'),
(79, 'Efe ', 'Şengül ', 'Efe  Şengül ', 'efe20041ip@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '192.168.0.50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `discounts`
--

CREATE TABLE `discounts` (
  `ID` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount` int(11) NOT NULL,
  `min_total` int(11) NOT NULL,
  `discount_type` int(1) NOT NULL COMMENT '1 yüzdelik, 2 tl',
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `discounts`
--

INSERT INTO `discounts` (`ID`, `code`, `discount`, `min_total`, `discount_type`, `is_active`) VALUES
(9, 'deneme_100', 100, 0, 2, 1),
(10, 'notactive', 100, 0, 1, 1),
(11, 'deneme20', 20, 0, 1, 1),
(12, 'deneme_20', 20, 3000, 2, 1),
(21, 'deneme50', 50, 0, 1, 1),
(22, 'ilksiparis50', 50, 0, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `offer_of_the_week`
--

CREATE TABLE `offer_of_the_week` (
  `ID` int(11) NOT NULL,
  `header_1` text NOT NULL,
  `header_2` text NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `offer_end` datetime NOT NULL,
  `offer_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `offer_of_the_week`
--

INSERT INTO `offer_of_the_week` (`ID`, `header_1`, `header_2`, `text`, `image`, `offer_end`, `offer_link`) VALUES
(1, '80% ye kadar indirim elde edin', 'Haftanın en iyi fırsatı', 'haftalık 80% indirim kodu ile sadece bu haftaya özel 80% indirim elde edin', 'assets/img/banner/banner-bg5.webp', '2023-04-10 00:00:00', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NULL DEFAULT current_timestamp(),
  `order_status` int(11) NOT NULL,
  `order_total` double NOT NULL,
  `payment_id` int(11) NOT NULL,
  `is_discounted` int(1) NOT NULL,
  `used_discount_code` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `picker_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`ID`, `customer_id`, `order_date`, `order_status`, `order_total`, `payment_id`, `is_discounted`, `used_discount_code`, `address`, `picker_name`) VALUES
(42, 31, '2023-06-01 14:23:24', 2, 97999.99, 19637201, 0, '', 'şükükaraduman caddesi no:139 daire:1', 'efe şengül'),
(44, 31, '2023-06-01 14:24:10', 1, 84999.99, 19637216, 1, 'deneme50', 'şükükaraduman caddesi no:139 daire:1', 'efe şengül'),
(45, 2, '2023-06-01 14:28:23', 4, 77999.99, 19637228, 1, 'deneme50', 'şükükaraduman caddesi no:139 daire:1', 'efe şengül');

--
-- Tetikleyiciler `orders`
--
DELIMITER $$
CREATE TRIGGER `order_delete` AFTER DELETE ON `orders` FOR EACH ROW delete from order_products where order_id=old.ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_products`
--

CREATE TABLE `order_products` (
  `ID` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_product_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `order_products`
--

INSERT INTO `order_products` (`ID`, `order_id`, `product`, `quantity`, `order_product_price`) VALUES
(68, 42, 3, 1, 74999.99),
(69, 42, 6, 1, 3000),
(70, 42, 4, 1, 20000),
(73, 44, 3, 2, 74999.99),
(74, 44, 4, 1, 10000),
(75, 45, 3, 2, 74999.99),
(76, 45, 6, 2, 3000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_statuses`
--

CREATE TABLE `order_statuses` (
  `ID` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `order_statuses`
--

INSERT INTO `order_statuses` (`ID`, `status`) VALUES
(1, 'Sipariş onayı bekleniyor'),
(2, 'Sipariş Hazırlanıyor'),
(3, 'Kargoya Verildi'),
(4, 'Teslim Edildi'),
(5, 'Sipariş İptal edildi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `product_category` int(2) DEFAULT NULL,
  `product_brand` int(11) DEFAULT NULL,
  `product_name` text NOT NULL,
  `product_price` double NOT NULL,
  `product_color` int(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `is_discounted` int(1) NOT NULL,
  `discounted_price` double NOT NULL,
  `is_new` int(1) NOT NULL,
  `total_selled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`ID`, `product_category`, `product_brand`, `product_name`, `product_price`, `product_color`, `product_status`, `is_discounted`, `discounted_price`, `is_new`, `total_selled`) VALUES
(3, 2, 1, 'MSI GE76 Raider i9-12900hk RTX 3080TI 16 GB 2TB SSD', 99999.99, 3, 1, 1, 74999.99, 1, 10),
(4, 5, 4, 'İphone 12 pro max 128gb product red', 20000, 1, 1, 0, 0, 1, 135),
(5, 2, 3, 'HP Pavillion ryzen 7 5700h gtx 1650 4gb', 15000, 2, 1, 0, 0, 1, 1200),
(6, 5, 5, 'Xİaomi redmi note 8 pro 128gb 64mp', 3499.99, 2, 1, 1, 3000, 1, 3500);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_brands`
--

CREATE TABLE `product_brands` (
  `ID` int(11) NOT NULL,
  `brand` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_brands`
--

INSERT INTO `product_brands` (`ID`, `brand`) VALUES
(1, 'MSI'),
(2, 'Gucci'),
(3, 'HP'),
(4, 'İphone'),
(5, 'Xiaomi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_categories`
--

CREATE TABLE `product_categories` (
  `ID` int(11) NOT NULL,
  `category` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_categories`
--

INSERT INTO `product_categories` (`ID`, `category`, `parent_id`) VALUES
(1, 'Moda, Giyim, Aksesuar', 0),
(2, 'Bilgisayar', 0),
(4, 'Çanta', 1),
(5, 'cep telefonu', 12),
(8, 'Oyun Konsolu', 0),
(12, 'telefon', 0),
(16, 'Konyalı', 0),
(20, 'Kılıf', 5),
(21, 'şarj aleti', 5),
(22, 'iphone ios telefonlar', 12),
(23, 'bel çantası', 4),
(24, 'sırt çantası', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_colors`
--

CREATE TABLE `product_colors` (
  `ID` int(11) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_colors`
--

INSERT INTO `product_colors` (`ID`, `color`) VALUES
(1, 'Kırmızı'),
(2, 'Siyah'),
(3, 'Renksiz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_comments`
--

CREATE TABLE `product_comments` (
  `ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `star` int(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` datetime not NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_comments`
--

INSERT INTO `product_comments` (`ID`, `product_id`, `comment`, `star`, `customer_id`, `date`) VALUES
(8, 6, 'ne iyi ne kötü', 3, 6, '2023-05-09'),
(9, 6, 'çok iyimiş', 5, 1, '2023-05-09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_desc`
--

CREATE TABLE `product_desc` (
  `ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_desc`
--

INSERT INTO `product_desc` (`ID`, `product_id`, `desc`) VALUES
(2, 3, '<h2>MSI GE76 Raider i9-12900hk RTX 3080TI <span style=\"color: rgb(224, 62, 45);\">MAX-P</span> 16 GB 2TB SSD</h2>\r\n<p><img src=\"../../../assets/img/product/product_desc/1682975278.jpg\" width=\"618\" height=\"618\"></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mollis tortor non urna volutpat consequat. Maecenas condimentum ac tellus ac pharetra. Nam hendrerit, mauris sit amet pretium facilisis, enim magna consequat ante, non facilisis sem lorem eu tellus. Proin blandit scelerisque velit euismod varius. Proin pretium egestas congue. Nullam eu molestie odio, quis sodales mi. Aenean pharetra, orci eget vehicula semper, ligula libero scelerisque ligula, id suscipit neque mi in ligula. Fusce lobortis nibh non libero bibendum, eget elementum diam accumsan. In laoreet tellus vel rutrum lobortis. In egestas sed orci non porta. Mauris nec arcu semper, congue dui sit amet, sollicitudin elit. Suspendisse in bibendum elit. Suspendisse feugiat neque purus, id fermentum diam mollis non.</p>'),
(3, 6, '<h2>Xİaomi redmi note 8 pro 128gb 64mp</h2>\r\n<p><img src=\"../../../assets/img/product/product_desc/1682975296.jpg\"></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mollis tortor non urna volutpat consequat. Maecenas condimentum ac tellus ac pharetra. Nam hendrerit, mauris sit amet pretium facilisis, enim magna consequat ante, non facilisis sem lorem eu tellus. Proin blandit scelerisque velit euismod varius. Proin pretium egestas congue. Nullam eu molestie odio, quis sodales mi. Aenean pharetra, orci eget vehicula semper, ligula libero scelerisque ligula, id suscipit neque mi in ligula. Fusce lobortis nibh non libero bibendum, eget elementum diam accumsan. In laoreet tellus vel rutrum lobortis. In egestas sed orci non porta. Mauris nec arcu semper, congue dui sit amet, sollicitudin elit. Suspendisse in bibendum elit. Suspendisse feugiat neque purus, id fermentum diam mollis non.</p>\r\n<p><img src=\"../../../assets/img/product/product_desc/1682975322.jpg\"></p>\r\n<p>Pellentesque orci dui, ultricies sed libero vel, fringilla maximus est. Nunc eget lacus a ante imperdiet maximus sit amet sed ex. Nam sed sapien nec nisi ultricies bibendum. Cras dui elit, gravida at nisi in, sollicitudin mollis massa. Phasellus varius leo vitae magna facilisis, nec maximus tellus pulvinar. In hac habitasse platea dictumst. Nulla eget sem libero. Nullam molestie vestibulum quam sed bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur finibus mauris risus, sed eleifend ipsum varius eu. Nulla vehicula justo tortor, at posuere quam sollicitudin nec. Fusce et ante vehicula justo accumsan consectetur.</p>'),
(4, 46, ''),
(5, 5, '                                                                                                                                                        ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `ID` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `image` text NOT NULL,
  `is_main` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`ID`, `product`, `image`, `is_main`) VALUES
(1, 6, 'assets/img/product/Xİaomi redmi note 8 pro 128gb 64mp/rn8pro_1.jpg', 1),
(2, 6, 'assets/img/product/Xİaomi redmi note 8 pro 128gb 64mp/rn8pro_2.jpg', 0),
(18, 3, 'assets/img/product/MSI GE76 Raider i9-12900hk RTX 3080TI 16 GB 2TB SSD/ge76.jpg', 1),
(19, 3, 'assets/img/product/MSI GE76 Raider i9-12900hk RTX 3080TI 16 GB 2TB SSD/76raider2.jpg', 0),
(22, 3, 'assets/img/product/MSI GE76 Raider i9-12900hk RTX 3080TI 16 GB 2TB SSD/76raider3.jpg', 0),
(42, 5, 'assets/img/product/HP Pavillion ryzen 7 5700h gtx 1650 4gb/hp1.jpg', 1),
(43, 5, 'assets/img/product/HP Pavillion ryzen 7 5700h gtx 1650 4gb/hp2.jpg', 0),
(44, 5, 'assets/img/product/HP Pavillion ryzen 7 5700h gtx 1650 4gb/hp3.jpg', 0),
(45, 4, 'assets/img/product/İphone 12 pro max 128gb product red/iphone-12-finish-select-202207-product-red_AV2.jpg', 0),
(46, 4, 'assets/img/product/İphone 12 pro max 128gb product red/iphone-12-finish-select-202207-product-red_AV1_GEO_EMEA.jpg', 0),
(47, 4, 'assets/img/product/İphone 12 pro max 128gb product red/iphone-12-finish-select-202207-product-red.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_statuses`
--

CREATE TABLE `product_statuses` (
  `ID` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `product_statuses`
--

INSERT INTO `product_statuses` (`ID`, `status`) VALUES
(1, 'Stokta var'),
(2, 'Stokta Yok');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `ID` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `shopping_cart`
--

INSERT INTO `shopping_cart` (`ID`, `customer_id`, `product_id`, `quantity`) VALUES
(138, '1', 3, 1),
(183, '77', 3, 1),
(184, '77', 4, 1),
(185, '77', 5, 1),
(186, '31', 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_general`
--

CREATE TABLE `site_general` (
  `ID` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `favicon` varchar(100) NOT NULL,
  `footer_text` varchar(200) NOT NULL,
  `copyright` varchar(100) NOT NULL,
  `header_text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `site_general`
--

INSERT INTO `site_general` (`ID`, `logo`, `favicon`, `footer_text`, `copyright`, `header_text`) VALUES
(1, 'assets/img/logo/logo_transparent.png', 'assets/img/logo/favicon-32x32.png', 'Ut enim ad minim veniam, quisnostrud exercitation ullamco laborisnisi ut aliquip ex ea commodo.', 'Copyright © 2022 Mobilyacı . All Rights Reserved', 'İlk siparişinizde 50% indirim elde edin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `header` text NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`ID`, `header`, `text`, `image`, `is_active`) VALUES
(1, '<p><span style=\"color: rgb(0, 0, 0);\">Moon sofa ile evinize</span></p>\r\n<p><span style=\"color: rgb(0, 0, 0);\">bir g&uuml;zellik yapın</span></p>', '<p><span style=\"color: rgb(0, 0, 0);\">Moon sofa ile evinize bir g&uuml;zellik yapın</span></p>', 'assets/img/slider/home3-slider2.webp', 1),
(2, '<p>Moon sofa ile evinize</p>\r\n<p>bir g&uuml;zellik yapın</p>', '<p>Moon sofa ile evinize bir g&uuml;zellik yapınasdasd</p>', 'assets/img/slider/home1-slider1.webp', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `social_media`
--

CREATE TABLE `social_media` (
  `ID` int(11) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `youtube` varchar(200) NOT NULL,
  `tiktok` varchar(200) NOT NULL,
  `site_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `social_media`
--

INSERT INTO `social_media` (`ID`, `instagram`, `facebook`, `twitter`, `youtube`, `tiktok`, `site_url`) VALUES
(1, 'instagram.com', 'facebook.com', '#', '#', '#', 'http://efesengul.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `password`) VALUES
(1, 'efe', 'efe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(11) NOT NULL,
  `customer_id` varchar(25) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `wishlist`
--

INSERT INTO `wishlist` (`ID`, `customer_id`, `product_id`) VALUES
(32, '1', 6),
(34, '1', 4),
(35, '1', 3),
(68, '1', 6),
(69, '1', 3),
(82, '3', 3),
(83, '3', 6);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Tablo için indeksler `choose_us`
--
ALTER TABLE `choose_us`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `offer_of_the_week`
--
ALTER TABLE `offer_of_the_week`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_status` (`order_status`);

--
-- Tablo için indeksler `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product` (`product`),
  ADD KEY `order_id` (`order_id`);

--
-- Tablo için indeksler `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `products_ibfk_1` (`product_color`),
  ADD KEY `product_status` (`product_status`),
  ADD KEY `product_category` (`product_category`),
  ADD KEY `product_brand` (`product_brand`);

--
-- Tablo için indeksler `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `subcat_of` (`parent_id`);

--
-- Tablo için indeksler `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `product_desc`
--
ALTER TABLE `product_desc`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product` (`product`);

--
-- Tablo için indeksler `product_statuses`
--
ALTER TABLE `product_statuses`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `customer_id` (`customer_id`(768)),
  ADD KEY `product_id` (`product_id`);

--
-- Tablo için indeksler `site_general`
--
ALTER TABLE `site_general`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `about_us`
--
ALTER TABLE `about_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `addresses`
--
ALTER TABLE `addresses`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `choose_us`
--
ALTER TABLE `choose_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `cities`
--
ALTER TABLE `cities`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Tablo için AUTO_INCREMENT değeri `discounts`
--
ALTER TABLE `discounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `offer_of_the_week`
--
ALTER TABLE `offer_of_the_week`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `order_products`
--
ALTER TABLE `order_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Tablo için AUTO_INCREMENT değeri `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Tablo için AUTO_INCREMENT değeri `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `product_desc`
--
ALTER TABLE `product_desc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `product_statuses`
--
ALTER TABLE `product_statuses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Tablo için AUTO_INCREMENT değeri `site_general`
--
ALTER TABLE `site_general`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `social_media`
--
ALTER TABLE `social_media`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`ID`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_status`) REFERENCES `order_statuses` (`ID`);

--
-- Tablo kısıtlamaları `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`ID`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_color`) REFERENCES `product_colors` (`ID`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`product_status`) REFERENCES `product_statuses` (`ID`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`product_brand`) REFERENCES `product_brands` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_6` FOREIGN KEY (`product_category`) REFERENCES `product_categories` (`ID`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product`) REFERENCES `products` (`ID`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
