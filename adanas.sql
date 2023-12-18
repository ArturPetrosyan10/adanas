-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2023 at 03:56 PM
-- Server version: 10.8.4-MariaDB
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adanas`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_product`
--

CREATE TABLE `ad_product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_t` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_product`
--

INSERT INTO `ad_product` (`id`, `name`, `description`, `q_t`) VALUES
(32, 'գետ', 'գետ', '1000 կմ'),
(33, 'գետ', 'գետ', '1000 կմ');

-- --------------------------------------------------------

--
-- Table structure for table `ad_product_img`
--

CREATE TABLE `ad_product_img` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `nameImg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_product_img`
--

INSERT INTO `ad_product_img` (`id`, `productId`, `nameImg`, `active`) VALUES
(10, 32, 'web/adImg/1702644590new-logo.png', 0),
(11, 33, 'web/adImg/1702644917For Honor2023-8-19-1-26-28.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fs_banners`
--

CREATE TABLE `fs_banners` (
  `id` int(11) NOT NULL,
  `title_am` varchar(255) NOT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `small_description_am` varchar(255) DEFAULT NULL,
  `small_description_ru` varchar(255) DEFAULT NULL,
  `small_description_en` varchar(255) DEFAULT NULL,
  `description_am` varchar(500) DEFAULT NULL,
  `description_ru` varchar(500) DEFAULT NULL,
  `description_en` varchar(500) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `image_mobile` varchar(300) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `type_` int(11) DEFAULT 1,
  `order_num` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_banners`
--

INSERT INTO `fs_banners` (`id`, `title_am`, `title_ru`, `title_en`, `small_description_am`, `small_description_ru`, `small_description_en`, `description_am`, `description_ru`, `description_en`, `url`, `image`, `image_mobile`, `status`, `type_`, `order_num`) VALUES
(5, ' ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/17019542163.jpg', NULL, 1, 0, 2),
(7, ' ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/17008229376873603842432454.png', NULL, 1, 0, 3),
(8, ' ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/17019551532.jpg', NULL, 1, 0, 1),
(9, 'Լավ առաջարկ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/1701420658cat-4.webp', 'web/uploads/banners/1701420658cat-4.webp', 1, 1, 4),
(10, 'Լավ առաջարկ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/1701420677cat-3.webp', 'web/uploads/banners/1701420677cat-3.webp', 1, 1, 5),
(11, 'Լավ առաջարկ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/1701438893cat-6.webp', 'web/uploads/banners/1701438893cat-6.webp', 1, 1, 6),
(12, ' Այլ', '', '', ' Այլ', '', '', 'Տեստ', '', '', '', 'web/uploads/banners/1701438915cat-3.webp', 'web/uploads/banners/1701438915cat-3.webp', 1, 1, 7),
(13, ' ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/main-video.mp4', NULL, 1, 0, 0),
(14, ' ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/17019551831.jpg', NULL, 1, 0, 0),
(15, ' Գրենական պիտույքներ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/1701420563cat-5.webp', 'web/uploads/banners/1701420563cat-5.webp', 1, 1, 0),
(16, ' Թղթե պարագաներ', '', '', '', '', '', '', '', '', '', 'web/uploads/banners/1701420629download.webp', 'web/uploads/banners/1701420629download.webp', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fs_blogs`
--

CREATE TABLE `fs_blogs` (
  `id` int(11) NOT NULL,
  `page_name_am` varchar(255) DEFAULT NULL,
  `page_name_ru` varchar(255) DEFAULT NULL,
  `page_name_en` varchar(255) DEFAULT NULL,
  `page_title_am` varchar(255) DEFAULT NULL,
  `page_title_ru` varchar(255) DEFAULT NULL,
  `page_title_en` varchar(255) DEFAULT NULL,
  `page_keywords_am` text DEFAULT NULL,
  `page_keywords_ru` text DEFAULT NULL,
  `page_keywords_en` text DEFAULT NULL,
  `page_content_am` longtext DEFAULT NULL,
  `page_content_ru` longtext DEFAULT NULL,
  `page_content_en` longtext DEFAULT NULL,
  `order_num` int(11) DEFAULT 0,
  `create_date` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1,
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_blogs`
--

INSERT INTO `fs_blogs` (`id`, `page_name_am`, `page_name_ru`, `page_name_en`, `page_title_am`, `page_title_ru`, `page_title_en`, `page_keywords_am`, `page_keywords_ru`, `page_keywords_en`, `page_content_am`, `page_content_ru`, `page_content_en`, `order_num`, `create_date`, `status`, `url`, `img`, `category_id`) VALUES
(1, 'Կանացի թրենդային արևային ակնոցներ և հագուստ', '', '', 'Կանացի թրենդային արևային ակնոցներ և հագուստ', '', '', 'Կանացի թրենդային արևային ակնոցներ և հագուստ', '', '', '<p><strong>Lorem Ipsum</strong>-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:</p>\r\n', '', '', 0, '2023-12-12 13:43:05', 1, 'kanatsi_trendayin_arevayin_aknotsner_ev_hagust', 'web/uploads/1702388585post-2.webp', 246);

-- --------------------------------------------------------

--
-- Table structure for table `fs_brands`
--

CREATE TABLE `fs_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_brands`
--

INSERT INTO `fs_brands` (`id`, `name`, `order_num`, `status`) VALUES
(2, 'Dell', NULL, 1),
(3, 'Hp', NULL, 1),
(4, 'ISu', NULL, 1),
(5, 'Չի հայտարարվել', NULL, 1),
(6, 'qwe', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fs_brand_to_category`
--

CREATE TABLE `fs_brand_to_category` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_brand_to_category`
--

INSERT INTO `fs_brand_to_category` (`id`, `brand_id`, `category_id`) VALUES
(18, 4, 12),
(19, 4, 198),
(20, 3, 12),
(21, 2, 198),
(22, 5, 198),
(23, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `fs_cart`
--

CREATE TABLE `fs_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `price` int(11) DEFAULT NULL,
  `variation_id` int(11) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fs_cart`
--

INSERT INTO `fs_cart` (`id`, `user_id`, `product_id`, `quantity`, `status`, `price`, `variation_id`, `discount_id`, `created_at`) VALUES
(32, 38, 8, 2, 1, 3000, NULL, NULL, '2023-11-14 12:03:52'),
(34, 38, 10, 6, 1, 8000, NULL, NULL, '2023-11-14 12:03:55'),
(33, 38, 9, 2, 1, 4500, NULL, NULL, '2023-11-14 12:03:54'),
(35, 42, 21, 1, 1, 1144, NULL, NULL, '2023-11-24 11:54:52'),
(36, 42, 12, 1, 1, 800, NULL, NULL, '2023-11-24 11:54:53'),
(37, 42, 11, 1, 1, 30000, NULL, NULL, '2023-11-24 11:54:56'),
(38, 42, 10, 1, 1, 8000, NULL, NULL, '2023-11-24 11:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `fs_categories`
--

CREATE TABLE `fs_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `atg` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parent_id` int(11) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_categories`
--

INSERT INTO `fs_categories` (`id`, `name`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `atg`, `photo`, `url`, `create_at`, `update_at`, `parent_id`, `order_num`, `status`) VALUES
(238, 'Գրենական պիտույքներ', '', '', '', '', '', 'web/uploads/categories/17023050101701420563cat-5.webp', 'grenakan_pituyqner', '2023-12-11 14:30:10', '2023-12-11 14:30:10', NULL, NULL, 1),
(239, 'Թղթե պարագաներ', '', '', '', '', '', 'web/uploads/categories/17023050481701420629download.webp', 'txte_paraganer', '2023-12-11 14:30:48', '2023-12-11 14:30:48', NULL, NULL, 1),
(240, 'Լավ առաջարկ', '', '', '', '', '', 'web/uploads/categories/17023050831701420658cat-4.webp', 'lav_arajark', '2023-12-11 14:31:23', '2023-12-11 14:31:23', NULL, NULL, 1),
(241, 'Սպասք', '', '', '', '', '', 'web/uploads/categories/17023058751701438893cat-6.webp', 'spasq', '2023-12-11 14:32:34', '2023-12-11 14:32:34', NULL, NULL, 1),
(242, 'Այլ', '', '', '', '', '', 'web/uploads/categories/17023051981701420677cat-3.webp', 'ayl', '2023-12-11 14:33:18', '2023-12-11 14:33:18', NULL, NULL, 1),
(243, 'Մաքրության պարագաներ', '', '', '', '', '', 'web/uploads/categories/17023059871701420677cat-3.webp', 'maqrutyan_paraganer', '2023-12-11 14:46:19', '2023-12-11 14:46:19', NULL, NULL, 1),
(244, 'Նորություններ', '', '', '', '', '', NULL, 'norutyunner', '2023-12-12 13:48:59', '2023-12-12 13:48:59', NULL, NULL, 0),
(245, 'Սպորտ', '', '', '', '', '', NULL, 'sport', '2023-12-12 13:49:40', '2023-12-12 13:49:40', 244, NULL, 1),
(246, 'Ճամփորդություն', '', '', '', '', '', NULL, 'jamphordutyun', '2023-12-12 13:50:03', '2023-12-12 13:50:03', 244, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fs_categories_lang`
--

CREATE TABLE `fs_categories_lang` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_ru` text NOT NULL,
  `description_en` text NOT NULL,
  `meta_title_ru` varchar(255) NOT NULL,
  `meta_title_en` varchar(255) NOT NULL,
  `meta_description_ru` text NOT NULL,
  `meta_description_en` text NOT NULL,
  `meta_keywords_ru` text NOT NULL,
  `meta_keywords_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_categories_lang`
--

INSERT INTO `fs_categories_lang` (`id`, `category_id`, `name_ru`, `name_en`, `description_ru`, `description_en`, `meta_title_ru`, `meta_title_en`, `meta_description_ru`, `meta_description_en`, `meta_keywords_ru`, `meta_keywords_en`) VALUES
(233, 238, 'канцелярские товары', 'stationery', '', '', '', '', '', '', '', ''),
(234, 239, 'Бумажные принадлежности', 'Paper supplies', '', '', '', '', '', '', '', ''),
(235, 240, 'Хорошее предложение', 'Good offer', '', '', '', '', '', '', '', ''),
(236, 241, 'Тарелка', 'Dish', '', '', '', '', '', '', '', ''),
(237, 242, 'Другой:', 'Other:', '', '', '', '', '', '', '', ''),
(238, 243, 'Моющие средства', 'Cleaning supplies', '', '', '', '', '', '', '', ''),
(239, 244, '', '', '', '', '', '', '', '', '', ''),
(240, 245, '', '', '', '', '', '', '', '', '', ''),
(241, 246, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fs_discounts`
--

CREATE TABLE `fs_discounts` (
  `id` int(11) NOT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `discount_status` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `group_type` int(11) DEFAULT NULL,
  `discount_procent` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `discount_count` int(11) DEFAULT NULL,
  `discount_count_why` int(11) DEFAULT NULL,
  `discount_multyple_conditions` int(11) DEFAULT NULL,
  `consider_applied_discounts` int(11) DEFAULT NULL,
  `applies_full_range` int(11) DEFAULT NULL,
  `applies_full_partners` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_discounts`
--

INSERT INTO `fs_discounts` (`id`, `discount_type`, `discount_status`, `name`, `group_type`, `discount_procent`, `discount_price`, `discount_count`, `discount_count_why`, `discount_multyple_conditions`, `consider_applied_discounts`, `applies_full_range`, `applies_full_partners`, `start_date`, `end_date`, `user_id`, `order_num`) VALUES
(11, 1, 1, 'Գինու զեղչ', 2, 25, NULL, NULL, NULL, NULL, 1, 1, 1, '2023-11-01', '2023-11-30', 38, NULL),
(12, 4, 0, 'Գնիր 10 հատ 1 հատ ստացիր նվեր', NULL, NULL, NULL, 1, 10, NULL, NULL, 1, 1, '2023-11-27', '2023-12-31', 38, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fs_discount_assortment`
--

CREATE TABLE `fs_discount_assortment` (
  `id` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fs_discount_conditions`
--

CREATE TABLE `fs_discount_conditions` (
  `id` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `condition_name` varchar(255) DEFAULT NULL,
  `condition_type` int(11) DEFAULT NULL,
  `condition_pr_type` int(11) DEFAULT 1,
  `no_less` int(11) DEFAULT NULL,
  `no_more` int(11) DEFAULT NULL,
  `for_all` int(11) DEFAULT 1,
  `condition_type_date` int(10) DEFAULT NULL,
  `condition_type_date_count` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_discount_conditions`
--

INSERT INTO `fs_discount_conditions` (`id`, `discount_id`, `condition_name`, `condition_type`, `condition_pr_type`, `no_less`, `no_more`, `for_all`, `condition_type_date`, `condition_type_date_count`) VALUES
(1, 18, '999', 0, 0, 10, 30, 1, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `fs_discount_condition_assortment`
--

CREATE TABLE `fs_discount_condition_assortment` (
  `id` int(11) NOT NULL,
  `discount_condition_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fs_discount_groups`
--

CREATE TABLE `fs_discount_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_discount_groups`
--

INSERT INTO `fs_discount_groups` (`id`, `name`, `type_`, `user_id`, `order_num`, `status`) VALUES
(1, 'Գարնանային զեղչ', 1, 38, NULL, 1),
(2, 'Ձմեռային զեղչ', 4, 38, NULL, 1),
(3, 'Աշնանային զեղչ', 2, 38, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fs_discount_partners`
--

CREATE TABLE `fs_discount_partners` (
  `id` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fs_langs`
--

CREATE TABLE `fs_langs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(5) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fs_measurements`
--

CREATE TABLE `fs_measurements` (
  `id` int(11) NOT NULL,
  `code_` varchar(200) NOT NULL,
  `name` varchar(25) NOT NULL,
  `name_ru` varchar(25) NOT NULL,
  `name_en` varchar(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `order_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_measurements`
--

INSERT INTO `fs_measurements` (`id`, `code_`, `name`, `name_ru`, `name_en`, `status`, `order_num`) VALUES
(1, '0001', 'հատ', 'шт.', 'pcs', 1, 5),
(4, '00002', 'լիտր', 'литр', 'liter', 1, 1),
(5, '0003', 'տուփ', 'коробка', 'box', 1, 2),
(10, '00004', 'Գրամ', '', '', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `fs_notifications`
--

CREATE TABLE `fs_notifications` (
  `id` int(11) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `message_en` varchar(255) DEFAULT NULL,
  `message_ru` varchar(255) DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fs_notifications`
--

INSERT INTO `fs_notifications` (`id`, `message`, `message_en`, `message_ru`, `sender_id`, `recipient_id`, `type`, `status`, `url`, `created_at`) VALUES
(1, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 42, 1, 1, '/company-details/45', '2023-09-26 16:41:01'),
(2, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 43, 1, 0, '/company-details/45', '2023-09-26 16:41:01'),
(3, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 44, 1, 0, '/company-details/45', '2023-09-26 16:41:01'),
(4, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 42, 1, 1, '/company-details/45', '2023-09-26 16:47:04'),
(5, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 43, 1, 0, '/company-details/45', '2023-09-26 16:47:04'),
(6, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 44, 1, 0, '/company-details/45', '2023-09-26 16:47:04'),
(7, 'Համակարգում գրանցվել է նոր ապրանք՝ <b>ՆՈՒՌ,ՍԵՐԿԵՎԻԼ, 1000մլ, ԱՊԱԿՅԱ</b>', NULL, NULL, 45, 42, 1, 1, '/product/nur_serkevil_1000ml_apakya_13', '2023-09-26 17:30:50'),
(8, 'Համակարգում գրանցվել է նոր ապրանք՝ <b>ՆՈՒՌ,ՍԵՐԿԵՎԻԼ, 1000մլ, ԱՊԱԿՅԱ</b>', NULL, NULL, 45, 43, 1, 0, '/product/nur_serkevil_1000ml_apakya_13', '2023-09-26 17:30:50'),
(9, 'Համակարգում գրանցվել է նոր ապրանք՝ <b>ՆՈՒՌ,ՍԵՐԿԵՎԻԼ, 1000մլ, ԱՊԱԿՅԱ</b>', NULL, NULL, 45, 44, 1, 0, '/product/nur_serkevil_1000ml_apakya_13', '2023-09-26 17:30:50'),
(10, 'Դուք ունեք նոր պատվեր', NULL, NULL, 43, 45, 2, 0, '/supplier-processing', '2023-09-26 17:36:16'),
(11, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 42, 1, 1, '/company-details/46', '2023-10-09 09:36:09'),
(12, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 43, 1, 0, '/company-details/46', '2023-10-09 09:36:09'),
(13, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 44, 1, 0, '/company-details/46', '2023-10-09 09:36:09'),
(14, 'Համակարգում գրանցվել է նոր ապրանք՝ <b>Barilla Pesto Sauce Classic Genovese</b>', NULL, NULL, 46, 42, 1, 1, '/product/barilla_pesto_sauce_classic_genovese_21', '2023-10-22 16:32:39'),
(15, 'Համակարգում գրանցվել է նոր ապրանք՝ <b>Barilla Pesto Sauce Classic Genovese</b>', NULL, NULL, 46, 43, 1, 0, '/product/barilla_pesto_sauce_classic_genovese_21', '2023-10-22 16:32:39'),
(16, 'Համակարգում գրանցվել է նոր ապրանք՝ <b>Barilla Pesto Sauce Classic Genovese</b>', NULL, NULL, 46, 44, 1, 0, '/product/barilla_pesto_sauce_classic_genovese_21', '2023-10-22 16:32:39'),
(17, 'Համակարգում գրանցվել է նոր ապրանք՝ <b>Barilla Pesto Sauce Classic Genovese</b>', NULL, NULL, 46, 47, 1, 0, '/product/barilla_pesto_sauce_classic_genovese_21', '2023-10-22 16:32:39'),
(18, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 42, 1, 1, '/company-details/38', '2023-10-22 17:10:14'),
(19, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 43, 1, 0, '/company-details/38', '2023-10-22 17:10:14'),
(20, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 44, 1, 0, '/company-details/38', '2023-10-22 17:10:14'),
(21, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 47, 1, 0, '/company-details/38', '2023-10-22 17:10:14'),
(22, 'Դուք ունեք նոր պատվեր', NULL, NULL, 42, 46, 2, 0, '/supplier-processing', '2023-10-23 08:14:04'),
(23, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 54, 1, 0, '/company-details/55', '2023-11-08 12:37:09'),
(24, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 42, 1, 0, '/company-details/55', '2023-11-08 12:37:09'),
(25, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 43, 1, 0, '/company-details/55', '2023-11-08 12:37:09'),
(26, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 44, 1, 0, '/company-details/55', '2023-11-08 12:37:09'),
(27, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 47, 1, 0, '/company-details/55', '2023-11-08 12:37:09'),
(28, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 48, 1, 0, '/company-details/55', '2023-11-08 12:37:09'),
(29, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 49, 1, 0, '/company-details/55', '2023-11-08 12:37:09'),
(30, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 52, 1, 0, '/company-details/55', '2023-11-08 12:37:09'),
(31, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 54, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(32, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 42, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(33, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 43, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(34, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 44, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(35, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 47, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(36, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 48, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(37, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 49, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(38, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 52, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(39, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 54, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(40, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 42, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(41, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 43, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(42, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 44, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(43, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 47, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(44, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 48, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(45, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 49, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(46, 'Համակարգում գրանցվել է նոր գնորդ՝ <b>Պողոս</b>', NULL, NULL, 55, 52, 1, 0, '/company-details/55', '2023-11-08 12:37:10'),
(47, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 62, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(48, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 42, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(49, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 43, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(50, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 44, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(51, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 47, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(52, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 48, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(53, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 49, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(54, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 52, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(55, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 67, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(56, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 68, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(57, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 69, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(58, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 70, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(59, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 71, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(60, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 72, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(61, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 73, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(62, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 74, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(63, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 75, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(64, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Պռոշյանի կոնյակի գործարան</b>', NULL, NULL, 38, 76, 1, 0, '/company-details/38', '2023-11-14 07:28:17'),
(65, 'Պատվերի կարգավիճակը փոխվել է', NULL, NULL, 38, 1, 2, 0, '/personal-history', '2023-11-14 11:52:38'),
(66, 'Պատվերի կարգավիճակը փոխվել է', NULL, NULL, 38, 1, 2, 0, '/personal-history', '2023-11-14 11:54:36'),
(67, 'Պատվերի կարգավիճակը փոխվել է', NULL, NULL, 38, 1, 2, 0, '/personal-history', '2023-11-14 11:56:05'),
(68, 'Պատվերի կարգավիճակը փոխվել է', NULL, NULL, 38, 4, 2, 0, '/personal-history', '2023-11-14 12:04:32'),
(69, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>TEST ZEXCH</b>', NULL, NULL, 38, 42, 1, 0, '', '2023-11-14 14:36:47'),
(70, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>TEST ZEXCH</b>', NULL, NULL, 38, 43, 1, 0, '', '2023-11-14 14:36:47'),
(71, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>TEST ZEXCH</b>', NULL, NULL, 38, 47, 1, 0, '', '2023-11-14 14:36:47'),
(72, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>TEST ZEXCH</b>', NULL, NULL, 38, 48, 1, 0, '', '2023-11-14 14:36:47'),
(73, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>TEST ZEXCH</b>', NULL, NULL, 38, 49, 1, 0, '', '2023-11-14 14:36:47'),
(74, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>TEST ZEXCH</b>', NULL, NULL, 38, 52, 1, 0, '', '2023-11-14 14:36:47'),
(75, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>TEST ZEXCH</b>', NULL, NULL, 38, 67, 1, 0, '', '2023-11-14 14:36:47'),
(76, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 42, 1, 0, '/company-details/45', '2023-11-24 10:34:22'),
(77, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 43, 1, 0, '/company-details/45', '2023-11-24 10:34:22'),
(78, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 47, 1, 0, '/company-details/45', '2023-11-24 10:34:22'),
(79, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 48, 1, 0, '/company-details/45', '2023-11-24 10:34:22'),
(80, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 49, 1, 0, '/company-details/45', '2023-11-24 10:34:22'),
(81, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 52, 1, 0, '/company-details/45', '2023-11-24 10:34:22'),
(82, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>Ժորա ՍՊԸ</b>', NULL, NULL, 45, 67, 1, 0, '/company-details/45', '2023-11-24 10:34:22'),
(83, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 42, 1, 0, '/company-details/46', '2023-11-24 10:34:59'),
(84, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 43, 1, 0, '/company-details/46', '2023-11-24 10:34:59'),
(85, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 47, 1, 0, '/company-details/46', '2023-11-24 10:34:59'),
(86, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 48, 1, 0, '/company-details/46', '2023-11-24 10:34:59'),
(87, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 49, 1, 0, '/company-details/46', '2023-11-24 10:34:59'),
(88, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 52, 1, 0, '/company-details/46', '2023-11-24 10:34:59'),
(89, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>expert1</b>', NULL, NULL, 46, 67, 1, 0, '/company-details/46', '2023-11-24 10:34:59'),
(90, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>KFC ՍՊԸ</b>', NULL, NULL, 49, 42, 1, 0, '/company-details/49', '2023-11-24 10:37:07'),
(91, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>KFC ՍՊԸ</b>', NULL, NULL, 49, 43, 1, 0, '/company-details/49', '2023-11-24 10:37:07'),
(92, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>KFC ՍՊԸ</b>', NULL, NULL, 49, 47, 1, 0, '/company-details/49', '2023-11-24 10:37:07'),
(93, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>KFC ՍՊԸ</b>', NULL, NULL, 49, 48, 1, 0, '/company-details/49', '2023-11-24 10:37:07'),
(94, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>KFC ՍՊԸ</b>', NULL, NULL, 49, 52, 1, 0, '/company-details/49', '2023-11-24 10:37:07'),
(95, 'Համակարգում գրանցվել է նոր մատակարար՝ <b>KFC ՍՊԸ</b>', NULL, NULL, 49, 67, 1, 0, '/company-details/49', '2023-11-24 10:37:07'),
(96, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գինու զեղչ</b>', NULL, NULL, 38, 42, 1, 0, '', '2023-11-24 13:37:14'),
(97, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գինու զեղչ</b>', NULL, NULL, 38, 43, 1, 0, '', '2023-11-24 13:37:14'),
(98, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գինու զեղչ</b>', NULL, NULL, 38, 47, 1, 0, '', '2023-11-24 13:37:14'),
(99, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գինու զեղչ</b>', NULL, NULL, 38, 48, 1, 0, '', '2023-11-24 13:37:14'),
(100, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գինու զեղչ</b>', NULL, NULL, 38, 49, 1, 0, '', '2023-11-24 13:37:14'),
(101, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գինու զեղչ</b>', NULL, NULL, 38, 52, 1, 0, '', '2023-11-24 13:37:14'),
(102, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գինու զեղչ</b>', NULL, NULL, 38, 67, 1, 0, '', '2023-11-24 13:37:14'),
(103, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գնիր 10 հատ 1 հատ ստացիր նվեր</b>', NULL, NULL, 38, 42, 1, 0, '', '2023-11-27 12:42:22'),
(104, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գնիր 10 հատ 1 հատ ստացիր նվեր</b>', NULL, NULL, 38, 43, 1, 0, '', '2023-11-27 12:42:22'),
(105, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գնիր 10 հատ 1 հատ ստացիր նվեր</b>', NULL, NULL, 38, 47, 1, 0, '', '2023-11-27 12:42:22'),
(106, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գնիր 10 հատ 1 հատ ստացիր նվեր</b>', NULL, NULL, 38, 48, 1, 0, '', '2023-11-27 12:42:22'),
(107, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գնիր 10 հատ 1 հատ ստացիր նվեր</b>', NULL, NULL, 38, 49, 1, 0, '', '2023-11-27 12:42:22'),
(108, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գնիր 10 հատ 1 հատ ստացիր նվեր</b>', NULL, NULL, 38, 52, 1, 0, '', '2023-11-27 12:42:22'),
(109, 'Համակարգում ավելացել է նոր զեղչ ՝ <b>Գնիր 10 հատ 1 հատ ստացիր նվեր</b>', NULL, NULL, 38, 67, 1, 0, '', '2023-11-27 12:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `fs_orders`
--

CREATE TABLE `fs_orders` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL DEFAULT 0,
  `shipping_date` date DEFAULT NULL,
  `cart_id` varchar(255) DEFAULT NULL,
  `seller_quantity` int(11) DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb3 DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `is_store` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fs_pages`
--

CREATE TABLE `fs_pages` (
  `id` int(11) NOT NULL,
  `page_name_am` varchar(255) DEFAULT NULL,
  `page_name_ru` varchar(255) DEFAULT NULL,
  `page_name_en` varchar(255) DEFAULT NULL,
  `page_title_am` varchar(255) DEFAULT NULL,
  `page_title_ru` varchar(255) DEFAULT NULL,
  `page_title_en` varchar(255) DEFAULT NULL,
  `page_keywords_am` text DEFAULT NULL,
  `page_keywords_ru` text DEFAULT NULL,
  `page_keywords_en` text DEFAULT NULL,
  `page_content_am` longtext DEFAULT NULL,
  `page_content_ru` longtext DEFAULT NULL,
  `page_content_en` longtext DEFAULT NULL,
  `order_num` int(11) DEFAULT 0,
  `create_date` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_pages`
--

INSERT INTO `fs_pages` (`id`, `page_name_am`, `page_name_ru`, `page_name_en`, `page_title_am`, `page_title_ru`, `page_title_en`, `page_keywords_am`, `page_keywords_ru`, `page_keywords_en`, `page_content_am`, `page_content_ru`, `page_content_en`, `order_num`, `create_date`, `status`, `url`) VALUES
(6, 'Գաղտնիության քաղաքականություն', 'политика конфиденциальности', 'Privacy Policy', 'Գաղտնիության քաղաքականություն', 'политика конфиденциальности', 'Privacy Policy', NULL, NULL, NULL, '<div class=\"fs-help-wrapper\">\r\n\r\n        <div class=\"fs-container\">\r\n\r\n            <h1 class=\"fs-help-page-title\">Գաղտնիության քաղաքականություն</h1>\r\n\r\n            <div class=\"fs-help-page-content\">\r\n\r\n                <p align=\"center\"><strong>ՀՐԱՊԱՐԱԿԱՅԻՆ ՕՖԵՐՏԱ</strong></p>\r\n\r\n<p align=\"center\"><strong>&nbsp;</strong></p>\r\n\r\n<p align=\"center\"><strong>ONE CARD ՀԱՎԵԼՎԱԾԻ ՄԻՋՈՑՈՎ ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐԻ ՄԱՏՈՒՑՄԱՆ ՎԵՐԱԲԵՐՅԱԼ</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>Ստորև շարադրված պայմանները հանդիսանում են&nbsp;<strong>One Card հավելվածի&nbsp;</strong>և այդ պայմաններով ծառայություն ստանալու ցանկություն հայտնած ֆիզիկական անձանց (այսուհետ` նաև Օգտատեր) միջև&nbsp;<strong>One Card</strong>&nbsp;հավելվածի միջոցով ծառայությունների մատուցման հրապարակային օֆերտայի դրույթներ:</p>\r\n\r\n<p>Ծառայություններից օգտվելու օֆերտան կարող է ներկայացվել առցանց եղանակով կամ&nbsp;<strong>One Card</strong>&nbsp;հավելվածի սպասարկման գրասենյակում։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Օֆերտայում օգտագործված հիմնական հասկացությունները</em></strong></p>\r\n\r\n<p><strong><em>&nbsp;</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>One Card</strong>&nbsp;հավելված՝ բջջային հավելված, որը նախատեսված է շահավետ գնումներ կատարելու և առևտրի խթանման համար։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Crypto One (կրճատ՝ CRONE),&nbsp; One Card</strong>&nbsp;բջջային հավելվածի միջոցով գնումներ կատարելու գործիք։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Օգտատեր՝&nbsp;</strong>չափահաս և գործունակ անձ, ով ծանոթացել սույն օֆերտային, ամբողջությամբ, անվերապահ ընդունում է սույն օֆերտայի բոլոր դրույթները և իր ազատ կամքի արտահայտմամբ ցանկանում է օգտվել&nbsp;<strong>One Card</strong>&nbsp;հավելվածից և&nbsp;<strong>One Card&nbsp;</strong>հավելվածի միջոցով գնումներ կատարել։</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Անձնական օգտահաշիվ՝ One Card&nbsp;</strong>հավելվածի օգտագործման համար անհրաժեշտ անհատական էլեկտրոնային անհատական տիրույթ։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Push հաղորդագրություն՝ One Card&nbsp;</strong>հավելվածում գործող էլեկտրոնային ծանուցումների համակարգ։</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Cash back</strong>&nbsp;հաճախորդի լոյալության բոնուսային ծրագիր, որն ունի պարզ բանաձև, այն է՝ միջոցների մասնակի վերադարձ համապատասխան գնումներ կատարելու կամ ծառայություններ ձեռք բերելու դեպքում։</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Գործընկեր կազմակերպություն՝&nbsp;</strong>կազմակերպաիրավական ցանկացած ձև ունեցող, օրինական հիմքերով տնտեսական գործունություն ծավալող ցանկացած իրավաբանական անձ, որը ծառայությունների մատուցման պայմանագրի հիման վրա պարտավորվում է&nbsp;<strong>One Card</strong>&nbsp;հավելվածի&nbsp;<strong>Օգտատերերին</strong>&nbsp;կատարված գնումների դիմաց տրամադրել&nbsp;<strong>Cash Back`</strong>&nbsp;համաձայն պայմանագրում սահմանված դրույքաչափի։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1</strong><strong>․</strong><strong>&nbsp;One Card բջջային հավելվածի հրապարակային առաջարկը Օգտատերերին</strong><strong>․</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>1․1․ Ծանոթանալ սույն օֆերտային,</p>\r\n\r\n<p>1․2․ Սույն օֆերտային ծանոթանալուց հետո, օֆերտայի բոլոր դրույթներն, ամբողջությամբ, անվերապահ ընդունելու դեպքում օգտագործել&nbsp;<strong>One Card</strong>&nbsp;հավելվածը,</p>\r\n\r\n<p>1․3․&nbsp;<strong>One Card</strong>&nbsp;հավելվածի&nbsp;<strong>Գործընկներներ կազմակերպություններից</strong>&nbsp;գնումներ կատարելիս ստանալ&nbsp;<strong>Cash Back</strong>` համապատասխան&nbsp;<strong>Գործընկեր կազմակերպության</strong>&nbsp;կողմից սահմանված դրույքաչափի,</p>\r\n\r\n<p>1․4․ Համապատասխան վճարի դիմաց գնել&nbsp;<strong>One Card</strong>&nbsp;հավելվածի միջոցով գնումներ կատարելու գործիք՝&nbsp;<strong>CRONE</strong>&nbsp;և դրա միջոցով կատարել գնումներ,</p>\r\n\r\n<p>1․5․ Յուրաքանչյուր անգամ&nbsp;<strong>Գործընկեր կազմակերպությունից</strong>&nbsp;<strong>Cash Back</strong>&nbsp;ստանալուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, ինչպես նաև յուրաքանչյուր անգամ&nbsp;<strong>One Card</strong>-ի հավելվածում առնվազն 5000&nbsp;<strong>CRONE</strong>&nbsp;գնելուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, անձնական օգտահաշվում նվազագույնը 100&nbsp;<strong>CRONE</strong>&nbsp;օրական մնացորդի առկայության դեպքում, յուրաքանչյուր օր, որպես&nbsp;&nbsp;<strong>One Card</strong>&nbsp;հավելվածի օգտագործման խթանման միջոց ստանալ նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք&nbsp;<strong>CRONE</strong>։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2</strong><strong>․</strong><strong>&nbsp;One Card&nbsp;</strong>հավելվածի պարտավորությունները<strong>&nbsp;Օգտատերերի&nbsp;</strong>նկատմամբ․</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>2․1․ Անհրաժեշտության դեպքում&nbsp;<strong>One Card</strong>&nbsp;հավելվածի օգտագործմամբ հետաքրքրված անձանց տրամադրել պարզաբանումներ հրապարակային օֆերտայի յուրաքանչյուր դրույթի վերաբերյալ։</p>\r\n\r\n<p>2․2․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից&nbsp;<strong>Գործընկեր կազմակերպություններից</strong>&nbsp;գնում կատարելու դեպքում&nbsp;<strong>Cash Back-ը</strong>&nbsp;փոխանցվում է&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;<strong>անձնական օգտահաշվին</strong>&nbsp;անմիջապես, բայց ոչ ուշ քան 48 ժամվա ընթացքում,</p>\r\n\r\n<p>2․3․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից&nbsp;<strong>CRONE</strong>&nbsp;ձեռք բերելու համար համապատասխան վճարում կատարելուց անմիջապես հետո, բայց ոչ ուշ քան 48 ժամվա ընթացքում, նրա&nbsp;<strong>անձնական օգտահաշիվը</strong>&nbsp;համալրել կատարված վճարմանը համարժեք &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CRONE</strong>-ներով՝ համաձայն սույն օֆերտայում սահմանված դրույքաչափերի,</p>\r\n\r\n<p>2․4․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից յուրաքանչյուր անգամ&nbsp;<strong>Գործընկերներ կազմակերպություններից Cash Back</strong>&nbsp;ստանալուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, ինչպես նաև յուրաքանչյուր անգամ&nbsp;<strong>One Card</strong>-ի հավելվածում առնվազն 5000&nbsp;<strong>CRONE</strong>&nbsp;գնելուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, անձնական օգտահաշվում նվազագույնը 100&nbsp;<strong>CRONE</strong>&nbsp;օրական մնացորդի առկայության դեպքում, յուրաքանչյուր օր, որպես&nbsp;&nbsp;<strong>One Card&nbsp;</strong>հավելվածի օգտագործման խթանման միջոց&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;անձնական օգտահաշվին հաշվեգրել նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք&nbsp;<strong>CRONE</strong>։</p>\r\n\r\n<p>2.5. Արտադրության ծավալների և (կամ) տնտեսական և (կամ) տեխնոլոգիական և (կամ) աշխատանքի կազմակերպման պայմանների փոփոխման և (կամ) արտադրական անհրաժեշտությամբ պայմանավորված,&nbsp;&nbsp;<strong>One Card&nbsp;</strong>հավելվածը կարող է անորոշ ժամկետով դադարեցնել Օգտատերերին սույն օֆերտայի 2․4․ կետով նախատեսված խթանման միջոցի հաշվեգրումը։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3</strong><strong>․</strong><strong>&nbsp;One Card բջջային հավելվածի իրավունքները</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>3․1․ Միակողմանի փոփոխություններ կատարել&nbsp;<strong>Օֆերտայում,</strong>&nbsp;այդ մասին նախապես՝ 7 օր առաջ ծանուցելով&nbsp;<strong>Օգտատերերին Push</strong>&nbsp;<strong>հաղորդագրության</strong>&nbsp;միջոցով։</p>\r\n\r\n<p>3․2․&nbsp;<strong>Օգատիրոջ</strong>&nbsp;անձնական օգտահաշիվը 90 օր շարունակ չհամալրվելու դեպքում (<strong>Cash Back</strong>-ի ստացում կամ&nbsp;<strong>CRONE</strong>-ի գնում) ապաակտիվացնել այն,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>4</strong><strong>․</strong><strong>&nbsp;Դրույքաչափերը և փոխադարձ հաշվարկների կարգը</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4․1․ Մեկ միավոր&nbsp;<strong>CRONE-</strong>իարժեքը կազմում է 2 պայմանական միավոր,</p>\r\n\r\n<p>4․2․&nbsp;<strong>Օգտատերերը</strong>&nbsp;մեկ միավոր&nbsp;<strong>CRONE</strong>-ը գնում են 2 պայմանական միավոր արժեքով,</p>\r\n\r\n<p>4․3․&nbsp;<strong>Օգտատերերի</strong>&nbsp;կողմից&nbsp;<strong>CRONE</strong>-ի կանխիկացման դեպքում, մեկ միավոր&nbsp;<strong>CRONE</strong>-ը հաշվարկվում է 1 միավոր,</p>\r\n\r\n<p>4․4․&nbsp;<strong>Անձնական օգտահաշվի</strong>&nbsp;միջոցով գնումներ կատարելու,&nbsp;<strong>անձնական օգտահաշիվների</strong>&nbsp;միջև փոխանցումներ կատարելու, ինչպես նաև&nbsp;<strong>անձնական օգտահաշվից</strong>&nbsp;կանխիկացում կատարելու յուրաքանչյուր գործարքի դեպքում գանձվում է միջնորդավճար՝ գործարքի 10%-ի չափով։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>5</strong><strong>․</strong><strong>&nbsp;One Card հավելվածի օգտագործման կարգը</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>5․1․&nbsp;<strong>Օգտատերը</strong>&nbsp;ծանոթանում է սույն հրապարակային օֆերտային,</p>\r\n\r\n<p>5․2․ Այն դեպքում, երբ&nbsp;<strong>Օգտատիրոջ&nbsp;</strong>համար հասկանալի և ամբողջությամբ ընդունելի են սույն օֆերտային բոլոր դրույթները,&nbsp;<strong>Օգտատերը</strong>&nbsp;ստեղծում է&nbsp;<strong>անձնական օգտահաշիվ՝</strong>&nbsp;որում պարտավորվում է լրացնել իր վերաբերյալ իրական և ճշմարտացի տեղեկատվություն։ Անձնական օգտահաշվի ստեղծումը համարվում է սույն օֆերտայի ակցեպտավորում (հաստատում)։</p>\r\n\r\n<p>5․3․&nbsp;<strong>Օգտատերն</strong>&nbsp;իր ազատ կամքի արտահայտմամբ համալրում է իր&nbsp;<strong>անձնական օգտահաշիվը՝</strong>&nbsp;<strong>CRONE</strong>&nbsp;գնելու եղանակով,</p>\r\n\r\n<p>5․4․&nbsp;<strong>Օգտատերն</strong>&nbsp;իր ազատ կամքի արտահայտմամբ իր&nbsp;<strong>անձնական օգտահաշվի</strong>&nbsp;միջոցով կատարում է գնումներ,</p>\r\n\r\n<p>5․5․&nbsp;<strong>Օգտատերն</strong>&nbsp;իր ազատ կամքի արտահայտմամբ գնումներ է կատարում&nbsp;<strong>Գործընկեր կազմակերպություններից</strong>&nbsp;և ներկայացնելով իր&nbsp;<strong>անձնական օգտահաշիվը</strong>&nbsp;նույնացնող տվյալները, ստանում&nbsp;<strong>Cash Back`&nbsp;</strong>համաձայն&nbsp;<strong>Գործընկեր կազմակերպության</strong>&nbsp;կողմից սահմանված դրույքաչափի,</p>\r\n\r\n<p>5․6․&nbsp;<strong>Օգտատերը&nbsp;</strong>սույն օֆերտային 2․4 կետի դրույթների պահպանման դեպքում ստանում է նույն կետով նախատեսված խրախուսական միջոցներ։</p>\r\n\r\n<p>5․7․&nbsp;<strong>Օգտատերը</strong>&nbsp;կարող է ստեղծել ոչ ավելի քան երկու&nbsp;<strong>անձնական օգտահաշիվ։</strong></p>\r\n\r\n<p>5․8․&nbsp;<strong>Օգտատերը</strong>&nbsp;կարող է կատարել իր&nbsp;<strong>անձնական օգտահաշիվներում</strong>&nbsp;առկա &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CRONE</strong>-ների փոխանցում իր&nbsp;<strong>անձնական օգտահաշիվների</strong>&nbsp;միջև, որոնք սակայն չեն համարվում սույն օֆերտայի 2․4 կետով նախատեսված պայմանի առկայություն և չեն համարվում նույն կետով նախատեսված խրախուսանքի կիրառման հիմք։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>6</strong><strong>․</strong><strong>&nbsp;Եզրափակիչ դրույթներ</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>6․1․Սույն օֆերտայի փոփոխությունների մասին&nbsp;<strong>Push հաղորդագրության</strong>&nbsp;միջոցով առնվազն 7 օր առաջ ծանուցում ուղարկելուց հետո, ծանուցման մեջ նշված օրը, սույն օֆերտայի փոփոխված կամ վերացված դրույթը համարվում է ուժը կորցրած և գործում է օֆերտային փոփոխությամբ նախատեսված փոփոխված կամ նոր սահմանված դրույթը։</p>\r\n\r\n<p>6․2․Սույն oֆերտայի փոփոխությունների վերաբերյալ ծանուցումը համարվում է պատշաճ, այդ մասին&nbsp;<strong>Push հաղորդագրություն&nbsp;</strong>ուղարկելու պահից՝ անկախ&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից&nbsp;<strong>Push հաղորդագրություն&nbsp;</strong>փաստացի ընթերցման պահից։</p>\r\n\r\n<p>6․3․ Փոփոխությունների հետ համաձայն չլինելու դեպքում,&nbsp;<strong>Օգտատերը</strong>&nbsp;պարտավոր է անմիջապես դադարեցնել&nbsp;<strong>One Card&nbsp;</strong>հավելվածի օգտագործումն և այդ մասին գրավոր տեղեկացնել&nbsp;<strong>One Card&nbsp;</strong>հավելվածին։</p>\r\n\r\n<p>6․4․ Սույն օֆերտայում սահմանված ստորև շարադրված դրույթները ենթակա չեն փոփոխման, մասնավորապես՝</p>\r\n\r\n<p>6․4․1․&nbsp;<strong>Օգտատերերի</strong>&nbsp;կողմից&nbsp;<strong>CRONE</strong>-ի կանխիկացման դեպքում, մեկ միավոր&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CRONE</strong>-ը հաշվարկվում է 1 պայմանական միավոր,</p>\r\n\r\n<p>6․4․2․&nbsp;<strong>Օգտատերերը</strong>&nbsp;մեկ միավոր&nbsp;<strong>CRONE</strong>-ը գնում են 2 պայմանական միավոր արժեքով դրույթը կարող է փոփոխվել մասնակի, այսինքն՝ մեկ միավոր&nbsp;<strong>CRONE</strong>-ի արժեքը կարող է ավելանալ, սակայն չի կարող նվազել 2 պայմանական միավոր արժեքից։</p>\r\n\r\n<p>6․4․3․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;անձնական օգտահաշվին հաշվեգրվող նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք խրախուսական միջոցների՝&nbsp;<strong>CRONE-</strong>ի հաշվարկման դրույքաչափը չի կարող նվազել 1%-ի չափից։</p>\r\n\r\n<p>6․4․4․ Սույն օֆերտայի 2․4 կետում նախատեսված&nbsp;<strong>One Card&nbsp;</strong>հավելվածի օգտագործման խթանման միջոցների՝ անձնական օգտահաշվին հաշվեգրվող նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք&nbsp;<strong>CRONE</strong>-ի հաշվերգրման ժամանակահատվածը՝ 29 օրյա ժամկետն անփոփոխ է։</p>\r\n\r\n            </div>\r\n\r\n        </div>\r\n\r\n    </div>', '<div class=\"fs-help-wrapper\">\r\n\r\n        <div class=\"fs-container\">\r\n\r\n            <h1 class=\"fs-help-page-title\">Գաղտնիության քաղաքականություն</h1>\r\n\r\n            <div class=\"fs-help-page-content\">\r\n\r\n                <p align=\"center\"><strong>ՀՐԱՊԱՐԱԿԱՅԻՆ ՕՖԵՐՏԱ</strong></p>\r\n\r\n<p align=\"center\"><strong>&nbsp;</strong></p>\r\n\r\n<p align=\"center\"><strong>ONE CARD ՀԱՎԵԼՎԱԾԻ ՄԻՋՈՑՈՎ ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐԻ ՄԱՏՈՒՑՄԱՆ ՎԵՐԱԲԵՐՅԱԼ</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>Ստորև շարադրված պայմանները հանդիսանում են&nbsp;<strong>One Card հավելվածի&nbsp;</strong>և այդ պայմաններով ծառայություն ստանալու ցանկություն հայտնած ֆիզիկական անձանց (այսուհետ` նաև Օգտատեր) միջև&nbsp;<strong>One Card</strong>&nbsp;հավելվածի միջոցով ծառայությունների մատուցման հրապարակային օֆերտայի դրույթներ:</p>\r\n\r\n<p>Ծառայություններից օգտվելու օֆերտան կարող է ներկայացվել առցանց եղանակով կամ&nbsp;<strong>One Card</strong>&nbsp;հավելվածի սպասարկման գրասենյակում։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Օֆերտայում օգտագործված հիմնական հասկացությունները</em></strong></p>\r\n\r\n<p><strong><em>&nbsp;</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>One Card</strong>&nbsp;հավելված՝ բջջային հավելված, որը նախատեսված է շահավետ գնումներ կատարելու և առևտրի խթանման համար։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Crypto One (կրճատ՝ CRONE),&nbsp; One Card</strong>&nbsp;բջջային հավելվածի միջոցով գնումներ կատարելու գործիք։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Օգտատեր՝&nbsp;</strong>չափահաս և գործունակ անձ, ով ծանոթացել սույն օֆերտային, ամբողջությամբ, անվերապահ ընդունում է սույն օֆերտայի բոլոր դրույթները և իր ազատ կամքի արտահայտմամբ ցանկանում է օգտվել&nbsp;<strong>One Card</strong>&nbsp;հավելվածից և&nbsp;<strong>One Card&nbsp;</strong>հավելվածի միջոցով գնումներ կատարել։</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Անձնական օգտահաշիվ՝ One Card&nbsp;</strong>հավելվածի օգտագործման համար անհրաժեշտ անհատական էլեկտրոնային անհատական տիրույթ։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Push հաղորդագրություն՝ One Card&nbsp;</strong>հավելվածում գործող էլեկտրոնային ծանուցումների համակարգ։</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Cash back</strong>&nbsp;հաճախորդի լոյալության բոնուսային ծրագիր, որն ունի պարզ բանաձև, այն է՝ միջոցների մասնակի վերադարձ համապատասխան գնումներ կատարելու կամ ծառայություններ ձեռք բերելու դեպքում։</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Գործընկեր կազմակերպություն՝&nbsp;</strong>կազմակերպաիրավական ցանկացած ձև ունեցող, օրինական հիմքերով տնտեսական գործունություն ծավալող ցանկացած իրավաբանական անձ, որը ծառայությունների մատուցման պայմանագրի հիման վրա պարտավորվում է&nbsp;<strong>One Card</strong>&nbsp;հավելվածի&nbsp;<strong>Օգտատերերին</strong>&nbsp;կատարված գնումների դիմաց տրամադրել&nbsp;<strong>Cash Back`</strong>&nbsp;համաձայն պայմանագրում սահմանված դրույքաչափի։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1</strong><strong>․</strong><strong>&nbsp;One Card բջջային հավելվածի հրապարակային առաջարկը Օգտատերերին</strong><strong>․</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>1․1․ Ծանոթանալ սույն օֆերտային,</p>\r\n\r\n<p>1․2․ Սույն օֆերտային ծանոթանալուց հետո, օֆերտայի բոլոր դրույթներն, ամբողջությամբ, անվերապահ ընդունելու դեպքում օգտագործել&nbsp;<strong>One Card</strong>&nbsp;հավելվածը,</p>\r\n\r\n<p>1․3․&nbsp;<strong>One Card</strong>&nbsp;հավելվածի&nbsp;<strong>Գործընկներներ կազմակերպություններից</strong>&nbsp;գնումներ կատարելիս ստանալ&nbsp;<strong>Cash Back</strong>` համապատասխան&nbsp;<strong>Գործընկեր կազմակերպության</strong>&nbsp;կողմից սահմանված դրույքաչափի,</p>\r\n\r\n<p>1․4․ Համապատասխան վճարի դիմաց գնել&nbsp;<strong>One Card</strong>&nbsp;հավելվածի միջոցով գնումներ կատարելու գործիք՝&nbsp;<strong>CRONE</strong>&nbsp;և դրա միջոցով կատարել գնումներ,</p>\r\n\r\n<p>1․5․ Յուրաքանչյուր անգամ&nbsp;<strong>Գործընկեր կազմակերպությունից</strong>&nbsp;<strong>Cash Back</strong>&nbsp;ստանալուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, ինչպես նաև յուրաքանչյուր անգամ&nbsp;<strong>One Card</strong>-ի հավելվածում առնվազն 5000&nbsp;<strong>CRONE</strong>&nbsp;գնելուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, անձնական օգտահաշվում նվազագույնը 100&nbsp;<strong>CRONE</strong>&nbsp;օրական մնացորդի առկայության դեպքում, յուրաքանչյուր օր, որպես&nbsp;&nbsp;<strong>One Card</strong>&nbsp;հավելվածի օգտագործման խթանման միջոց ստանալ նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք&nbsp;<strong>CRONE</strong>։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2</strong><strong>․</strong><strong>&nbsp;One Card&nbsp;</strong>հավելվածի պարտավորությունները<strong>&nbsp;Օգտատերերի&nbsp;</strong>նկատմամբ․</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>2․1․ Անհրաժեշտության դեպքում&nbsp;<strong>One Card</strong>&nbsp;հավելվածի օգտագործմամբ հետաքրքրված անձանց տրամադրել պարզաբանումներ հրապարակային օֆերտայի յուրաքանչյուր դրույթի վերաբերյալ։</p>\r\n\r\n<p>2․2․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից&nbsp;<strong>Գործընկեր կազմակերպություններից</strong>&nbsp;գնում կատարելու դեպքում&nbsp;<strong>Cash Back-ը</strong>&nbsp;փոխանցվում է&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;<strong>անձնական օգտահաշվին</strong>&nbsp;անմիջապես, բայց ոչ ուշ քան 48 ժամվա ընթացքում,</p>\r\n\r\n<p>2․3․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից&nbsp;<strong>CRONE</strong>&nbsp;ձեռք բերելու համար համապատասխան վճարում կատարելուց անմիջապես հետո, բայց ոչ ուշ քան 48 ժամվա ընթացքում, նրա&nbsp;<strong>անձնական օգտահաշիվը</strong>&nbsp;համալրել կատարված վճարմանը համարժեք &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CRONE</strong>-ներով՝ համաձայն սույն օֆերտայում սահմանված դրույքաչափերի,</p>\r\n\r\n<p>2․4․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից յուրաքանչյուր անգամ&nbsp;<strong>Գործընկերներ կազմակերպություններից Cash Back</strong>&nbsp;ստանալուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, ինչպես նաև յուրաքանչյուր անգամ&nbsp;<strong>One Card</strong>-ի հավելվածում առնվազն 5000&nbsp;<strong>CRONE</strong>&nbsp;գնելուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, անձնական օգտահաշվում նվազագույնը 100&nbsp;<strong>CRONE</strong>&nbsp;օրական մնացորդի առկայության դեպքում, յուրաքանչյուր օր, որպես&nbsp;&nbsp;<strong>One Card&nbsp;</strong>հավելվածի օգտագործման խթանման միջոց&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;անձնական օգտահաշվին հաշվեգրել նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք&nbsp;<strong>CRONE</strong>։</p>\r\n\r\n<p>2.5. Արտադրության ծավալների և (կամ) տնտեսական և (կամ) տեխնոլոգիական և (կամ) աշխատանքի կազմակերպման պայմանների փոփոխման և (կամ) արտադրական անհրաժեշտությամբ պայմանավորված,&nbsp;&nbsp;<strong>One Card&nbsp;</strong>հավելվածը կարող է անորոշ ժամկետով դադարեցնել Օգտատերերին սույն օֆերտայի 2․4․ կետով նախատեսված խթանման միջոցի հաշվեգրումը։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3</strong><strong>․</strong><strong>&nbsp;One Card բջջային հավելվածի իրավունքները</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>3․1․ Միակողմանի փոփոխություններ կատարել&nbsp;<strong>Օֆերտայում,</strong>&nbsp;այդ մասին նախապես՝ 7 օր առաջ ծանուցելով&nbsp;<strong>Օգտատերերին Push</strong>&nbsp;<strong>հաղորդագրության</strong>&nbsp;միջոցով։</p>\r\n\r\n<p>3․2․&nbsp;<strong>Օգատիրոջ</strong>&nbsp;անձնական օգտահաշիվը 90 օր շարունակ չհամալրվելու դեպքում (<strong>Cash Back</strong>-ի ստացում կամ&nbsp;<strong>CRONE</strong>-ի գնում) ապաակտիվացնել այն,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>4</strong><strong>․</strong><strong>&nbsp;Դրույքաչափերը և փոխադարձ հաշվարկների կարգը</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4․1․ Մեկ միավոր&nbsp;<strong>CRONE-</strong>իարժեքը կազմում է 2 պայմանական միավոր,</p>\r\n\r\n<p>4․2․&nbsp;<strong>Օգտատերերը</strong>&nbsp;մեկ միավոր&nbsp;<strong>CRONE</strong>-ը գնում են 2 պայմանական միավոր արժեքով,</p>\r\n\r\n<p>4․3․&nbsp;<strong>Օգտատերերի</strong>&nbsp;կողմից&nbsp;<strong>CRONE</strong>-ի կանխիկացման դեպքում, մեկ միավոր&nbsp;<strong>CRONE</strong>-ը հաշվարկվում է 1 միավոր,</p>\r\n\r\n<p>4․4․&nbsp;<strong>Անձնական օգտահաշվի</strong>&nbsp;միջոցով գնումներ կատարելու,&nbsp;<strong>անձնական օգտահաշիվների</strong>&nbsp;միջև փոխանցումներ կատարելու, ինչպես նաև&nbsp;<strong>անձնական օգտահաշվից</strong>&nbsp;կանխիկացում կատարելու յուրաքանչյուր գործարքի դեպքում գանձվում է միջնորդավճար՝ գործարքի 10%-ի չափով։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>5</strong><strong>․</strong><strong>&nbsp;One Card հավելվածի օգտագործման կարգը</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>5․1․&nbsp;<strong>Օգտատերը</strong>&nbsp;ծանոթանում է սույն հրապարակային օֆերտային,</p>\r\n\r\n<p>5․2․ Այն դեպքում, երբ&nbsp;<strong>Օգտատիրոջ&nbsp;</strong>համար հասկանալի և ամբողջությամբ ընդունելի են սույն օֆերտային բոլոր դրույթները,&nbsp;<strong>Օգտատերը</strong>&nbsp;ստեղծում է&nbsp;<strong>անձնական օգտահաշիվ՝</strong>&nbsp;որում պարտավորվում է լրացնել իր վերաբերյալ իրական և ճշմարտացի տեղեկատվություն։ Անձնական օգտահաշվի ստեղծումը համարվում է սույն օֆերտայի ակցեպտավորում (հաստատում)։</p>\r\n\r\n<p>5․3․&nbsp;<strong>Օգտատերն</strong>&nbsp;իր ազատ կամքի արտահայտմամբ համալրում է իր&nbsp;<strong>անձնական օգտահաշիվը՝</strong>&nbsp;<strong>CRONE</strong>&nbsp;գնելու եղանակով,</p>\r\n\r\n<p>5․4․&nbsp;<strong>Օգտատերն</strong>&nbsp;իր ազատ կամքի արտահայտմամբ իր&nbsp;<strong>անձնական օգտահաշվի</strong>&nbsp;միջոցով կատարում է գնումներ,</p>\r\n\r\n<p>5․5․&nbsp;<strong>Օգտատերն</strong>&nbsp;իր ազատ կամքի արտահայտմամբ գնումներ է կատարում&nbsp;<strong>Գործընկեր կազմակերպություններից</strong>&nbsp;և ներկայացնելով իր&nbsp;<strong>անձնական օգտահաշիվը</strong>&nbsp;նույնացնող տվյալները, ստանում&nbsp;<strong>Cash Back`&nbsp;</strong>համաձայն&nbsp;<strong>Գործընկեր կազմակերպության</strong>&nbsp;կողմից սահմանված դրույքաչափի,</p>\r\n\r\n<p>5․6․&nbsp;<strong>Օգտատերը&nbsp;</strong>սույն օֆերտային 2․4 կետի դրույթների պահպանման դեպքում ստանում է նույն կետով նախատեսված խրախուսական միջոցներ։</p>\r\n\r\n<p>5․7․&nbsp;<strong>Օգտատերը</strong>&nbsp;կարող է ստեղծել ոչ ավելի քան երկու&nbsp;<strong>անձնական օգտահաշիվ։</strong></p>\r\n\r\n<p>5․8․&nbsp;<strong>Օգտատերը</strong>&nbsp;կարող է կատարել իր&nbsp;<strong>անձնական օգտահաշիվներում</strong>&nbsp;առկա &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CRONE</strong>-ների փոխանցում իր&nbsp;<strong>անձնական օգտահաշիվների</strong>&nbsp;միջև, որոնք սակայն չեն համարվում սույն օֆերտայի 2․4 կետով նախատեսված պայմանի առկայություն և չեն համարվում նույն կետով նախատեսված խրախուսանքի կիրառման հիմք։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>6</strong><strong>․</strong><strong>&nbsp;Եզրափակիչ դրույթներ</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>6․1․Սույն օֆերտայի փոփոխությունների մասին&nbsp;<strong>Push հաղորդագրության</strong>&nbsp;միջոցով առնվազն 7 օր առաջ ծանուցում ուղարկելուց հետո, ծանուցման մեջ նշված օրը, սույն օֆերտայի փոփոխված կամ վերացված դրույթը համարվում է ուժը կորցրած և գործում է օֆերտային փոփոխությամբ նախատեսված փոփոխված կամ նոր սահմանված դրույթը։</p>\r\n\r\n<p>6․2․Սույն oֆերտայի փոփոխությունների վերաբերյալ ծանուցումը համարվում է պատշաճ, այդ մասին&nbsp;<strong>Push հաղորդագրություն&nbsp;</strong>ուղարկելու պահից՝ անկախ&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից&nbsp;<strong>Push հաղորդագրություն&nbsp;</strong>փաստացի ընթերցման պահից։</p>\r\n\r\n<p>6․3․ Փոփոխությունների հետ համաձայն չլինելու դեպքում,&nbsp;<strong>Օգտատերը</strong>&nbsp;պարտավոր է անմիջապես դադարեցնել&nbsp;<strong>One Card&nbsp;</strong>հավելվածի օգտագործումն և այդ մասին գրավոր տեղեկացնել&nbsp;<strong>One Card&nbsp;</strong>հավելվածին։</p>\r\n\r\n<p>6․4․ Սույն օֆերտայում սահմանված ստորև շարադրված դրույթները ենթակա չեն փոփոխման, մասնավորապես՝</p>\r\n\r\n<p>6․4․1․&nbsp;<strong>Օգտատերերի</strong>&nbsp;կողմից&nbsp;<strong>CRONE</strong>-ի կանխիկացման դեպքում, մեկ միավոր&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CRONE</strong>-ը հաշվարկվում է 1 պայմանական միավոր,</p>\r\n\r\n<p>6․4․2․&nbsp;<strong>Օգտատերերը</strong>&nbsp;մեկ միավոր&nbsp;<strong>CRONE</strong>-ը գնում են 2 պայմանական միավոր արժեքով դրույթը կարող է փոփոխվել մասնակի, այսինքն՝ մեկ միավոր&nbsp;<strong>CRONE</strong>-ի արժեքը կարող է ավելանալ, սակայն չի կարող նվազել 2 պայմանական միավոր արժեքից։</p>\r\n\r\n<p>6․4․3․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;անձնական օգտահաշվին հաշվեգրվող նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք խրախուսական միջոցների՝&nbsp;<strong>CRONE-</strong>ի հաշվարկման դրույքաչափը չի կարող նվազել 1%-ի չափից։</p>\r\n\r\n<p>6․4․4․ Սույն օֆերտայի 2․4 կետում նախատեսված&nbsp;<strong>One Card&nbsp;</strong>հավելվածի օգտագործման խթանման միջոցների՝ անձնական օգտահաշվին հաշվեգրվող նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք&nbsp;<strong>CRONE</strong>-ի հաշվերգրման ժամանակահատվածը՝ 29 օրյա ժամկետն անփոփոխ է։</p>\r\n\r\n            </div>\r\n\r\n        </div>\r\n\r\n    </div>', '<div class=\"fs-help-wrapper\">\r\n\r\n        <div class=\"fs-container\">\r\n\r\n            <h1 class=\"fs-help-page-title\">Գաղտնիության քաղաքականություն</h1>\r\n\r\n            <div class=\"fs-help-page-content\">\r\n\r\n                <p align=\"center\"><strong>ՀՐԱՊԱՐԱԿԱՅԻՆ ՕՖԵՐՏԱ</strong></p>\r\n\r\n<p align=\"center\"><strong>&nbsp;</strong></p>\r\n\r\n<p align=\"center\"><strong>ONE CARD ՀԱՎԵԼՎԱԾԻ ՄԻՋՈՑՈՎ ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐԻ ՄԱՏՈՒՑՄԱՆ ՎԵՐԱԲԵՐՅԱԼ</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>Ստորև շարադրված պայմանները հանդիսանում են&nbsp;<strong>One Card հավելվածի&nbsp;</strong>և այդ պայմաններով ծառայություն ստանալու ցանկություն հայտնած ֆիզիկական անձանց (այսուհետ` նաև Օգտատեր) միջև&nbsp;<strong>One Card</strong>&nbsp;հավելվածի միջոցով ծառայությունների մատուցման հրապարակային օֆերտայի դրույթներ:</p>\r\n\r\n<p>Ծառայություններից օգտվելու օֆերտան կարող է ներկայացվել առցանց եղանակով կամ&nbsp;<strong>One Card</strong>&nbsp;հավելվածի սպասարկման գրասենյակում։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Օֆերտայում օգտագործված հիմնական հասկացությունները</em></strong></p>\r\n\r\n<p><strong><em>&nbsp;</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>One Card</strong>&nbsp;հավելված՝ բջջային հավելված, որը նախատեսված է շահավետ գնումներ կատարելու և առևտրի խթանման համար։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Crypto One (կրճատ՝ CRONE),&nbsp; One Card</strong>&nbsp;բջջային հավելվածի միջոցով գնումներ կատարելու գործիք։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Օգտատեր՝&nbsp;</strong>չափահաս և գործունակ անձ, ով ծանոթացել սույն օֆերտային, ամբողջությամբ, անվերապահ ընդունում է սույն օֆերտայի բոլոր դրույթները և իր ազատ կամքի արտահայտմամբ ցանկանում է օգտվել&nbsp;<strong>One Card</strong>&nbsp;հավելվածից և&nbsp;<strong>One Card&nbsp;</strong>հավելվածի միջոցով գնումներ կատարել։</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Անձնական օգտահաշիվ՝ One Card&nbsp;</strong>հավելվածի օգտագործման համար անհրաժեշտ անհատական էլեկտրոնային անհատական տիրույթ։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Push հաղորդագրություն՝ One Card&nbsp;</strong>հավելվածում գործող էլեկտրոնային ծանուցումների համակարգ։</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Cash back</strong>&nbsp;հաճախորդի լոյալության բոնուսային ծրագիր, որն ունի պարզ բանաձև, այն է՝ միջոցների մասնակի վերադարձ համապատասխան գնումներ կատարելու կամ ծառայություններ ձեռք բերելու դեպքում։</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Գործընկեր կազմակերպություն՝&nbsp;</strong>կազմակերպաիրավական ցանկացած ձև ունեցող, օրինական հիմքերով տնտեսական գործունություն ծավալող ցանկացած իրավաբանական անձ, որը ծառայությունների մատուցման պայմանագրի հիման վրա պարտավորվում է&nbsp;<strong>One Card</strong>&nbsp;հավելվածի&nbsp;<strong>Օգտատերերին</strong>&nbsp;կատարված գնումների դիմաց տրամադրել&nbsp;<strong>Cash Back`</strong>&nbsp;համաձայն պայմանագրում սահմանված դրույքաչափի։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1</strong><strong>․</strong><strong>&nbsp;One Card բջջային հավելվածի հրապարակային առաջարկը Օգտատերերին</strong><strong>․</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>1․1․ Ծանոթանալ սույն օֆերտային,</p>\r\n\r\n<p>1․2․ Սույն օֆերտային ծանոթանալուց հետո, օֆերտայի բոլոր դրույթներն, ամբողջությամբ, անվերապահ ընդունելու դեպքում օգտագործել&nbsp;<strong>One Card</strong>&nbsp;հավելվածը,</p>\r\n\r\n<p>1․3․&nbsp;<strong>One Card</strong>&nbsp;հավելվածի&nbsp;<strong>Գործընկներներ կազմակերպություններից</strong>&nbsp;գնումներ կատարելիս ստանալ&nbsp;<strong>Cash Back</strong>` համապատասխան&nbsp;<strong>Գործընկեր կազմակերպության</strong>&nbsp;կողմից սահմանված դրույքաչափի,</p>\r\n\r\n<p>1․4․ Համապատասխան վճարի դիմաց գնել&nbsp;<strong>One Card</strong>&nbsp;հավելվածի միջոցով գնումներ կատարելու գործիք՝&nbsp;<strong>CRONE</strong>&nbsp;և դրա միջոցով կատարել գնումներ,</p>\r\n\r\n<p>1․5․ Յուրաքանչյուր անգամ&nbsp;<strong>Գործընկեր կազմակերպությունից</strong>&nbsp;<strong>Cash Back</strong>&nbsp;ստանալուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, ինչպես նաև յուրաքանչյուր անգամ&nbsp;<strong>One Card</strong>-ի հավելվածում առնվազն 5000&nbsp;<strong>CRONE</strong>&nbsp;գնելուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, անձնական օգտահաշվում նվազագույնը 100&nbsp;<strong>CRONE</strong>&nbsp;օրական մնացորդի առկայության դեպքում, յուրաքանչյուր օր, որպես&nbsp;&nbsp;<strong>One Card</strong>&nbsp;հավելվածի օգտագործման խթանման միջոց ստանալ նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք&nbsp;<strong>CRONE</strong>։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2</strong><strong>․</strong><strong>&nbsp;One Card&nbsp;</strong>հավելվածի պարտավորությունները<strong>&nbsp;Օգտատերերի&nbsp;</strong>նկատմամբ․</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>2․1․ Անհրաժեշտության դեպքում&nbsp;<strong>One Card</strong>&nbsp;հավելվածի օգտագործմամբ հետաքրքրված անձանց տրամադրել պարզաբանումներ հրապարակային օֆերտայի յուրաքանչյուր դրույթի վերաբերյալ։</p>\r\n\r\n<p>2․2․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից&nbsp;<strong>Գործընկեր կազմակերպություններից</strong>&nbsp;գնում կատարելու դեպքում&nbsp;<strong>Cash Back-ը</strong>&nbsp;փոխանցվում է&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;<strong>անձնական օգտահաշվին</strong>&nbsp;անմիջապես, բայց ոչ ուշ քան 48 ժամվա ընթացքում,</p>\r\n\r\n<p>2․3․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից&nbsp;<strong>CRONE</strong>&nbsp;ձեռք բերելու համար համապատասխան վճարում կատարելուց անմիջապես հետո, բայց ոչ ուշ քան 48 ժամվա ընթացքում, նրա&nbsp;<strong>անձնական օգտահաշիվը</strong>&nbsp;համալրել կատարված վճարմանը համարժեք &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CRONE</strong>-ներով՝ համաձայն սույն օֆերտայում սահմանված դրույքաչափերի,</p>\r\n\r\n<p>2․4․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից յուրաքանչյուր անգամ&nbsp;<strong>Գործընկերներ կազմակերպություններից Cash Back</strong>&nbsp;ստանալուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, ինչպես նաև յուրաքանչյուր անգամ&nbsp;<strong>One Card</strong>-ի հավելվածում առնվազն 5000&nbsp;<strong>CRONE</strong>&nbsp;գնելուն հաջորդող օրվանից մինչև դրան հաջորդող 29-րդ օրը ներառյալ, անձնական օգտահաշվում նվազագույնը 100&nbsp;<strong>CRONE</strong>&nbsp;օրական մնացորդի առկայության դեպքում, յուրաքանչյուր օր, որպես&nbsp;&nbsp;<strong>One Card&nbsp;</strong>հավելվածի օգտագործման խթանման միջոց&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;անձնական օգտահաշվին հաշվեգրել նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք&nbsp;<strong>CRONE</strong>։</p>\r\n\r\n<p>2.5. Արտադրության ծավալների և (կամ) տնտեսական և (կամ) տեխնոլոգիական և (կամ) աշխատանքի կազմակերպման պայմանների փոփոխման և (կամ) արտադրական անհրաժեշտությամբ պայմանավորված,&nbsp;&nbsp;<strong>One Card&nbsp;</strong>հավելվածը կարող է անորոշ ժամկետով դադարեցնել Օգտատերերին սույն օֆերտայի 2․4․ կետով նախատեսված խթանման միջոցի հաշվեգրումը։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3</strong><strong>․</strong><strong>&nbsp;One Card բջջային հավելվածի իրավունքները</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>3․1․ Միակողմանի փոփոխություններ կատարել&nbsp;<strong>Օֆերտայում,</strong>&nbsp;այդ մասին նախապես՝ 7 օր առաջ ծանուցելով&nbsp;<strong>Օգտատերերին Push</strong>&nbsp;<strong>հաղորդագրության</strong>&nbsp;միջոցով։</p>\r\n\r\n<p>3․2․&nbsp;<strong>Օգատիրոջ</strong>&nbsp;անձնական օգտահաշիվը 90 օր շարունակ չհամալրվելու դեպքում (<strong>Cash Back</strong>-ի ստացում կամ&nbsp;<strong>CRONE</strong>-ի գնում) ապաակտիվացնել այն,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>4</strong><strong>․</strong><strong>&nbsp;Դրույքաչափերը և փոխադարձ հաշվարկների կարգը</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4․1․ Մեկ միավոր&nbsp;<strong>CRONE-</strong>իարժեքը կազմում է 2 պայմանական միավոր,</p>\r\n\r\n<p>4․2․&nbsp;<strong>Օգտատերերը</strong>&nbsp;մեկ միավոր&nbsp;<strong>CRONE</strong>-ը գնում են 2 պայմանական միավոր արժեքով,</p>\r\n\r\n<p>4․3․&nbsp;<strong>Օգտատերերի</strong>&nbsp;կողմից&nbsp;<strong>CRONE</strong>-ի կանխիկացման դեպքում, մեկ միավոր&nbsp;<strong>CRONE</strong>-ը հաշվարկվում է 1 միավոր,</p>\r\n\r\n<p>4․4․&nbsp;<strong>Անձնական օգտահաշվի</strong>&nbsp;միջոցով գնումներ կատարելու,&nbsp;<strong>անձնական օգտահաշիվների</strong>&nbsp;միջև փոխանցումներ կատարելու, ինչպես նաև&nbsp;<strong>անձնական օգտահաշվից</strong>&nbsp;կանխիկացում կատարելու յուրաքանչյուր գործարքի դեպքում գանձվում է միջնորդավճար՝ գործարքի 10%-ի չափով։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>5</strong><strong>․</strong><strong>&nbsp;One Card հավելվածի օգտագործման կարգը</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>5․1․&nbsp;<strong>Օգտատերը</strong>&nbsp;ծանոթանում է սույն հրապարակային օֆերտային,</p>\r\n\r\n<p>5․2․ Այն դեպքում, երբ&nbsp;<strong>Օգտատիրոջ&nbsp;</strong>համար հասկանալի և ամբողջությամբ ընդունելի են սույն օֆերտային բոլոր դրույթները,&nbsp;<strong>Օգտատերը</strong>&nbsp;ստեղծում է&nbsp;<strong>անձնական օգտահաշիվ՝</strong>&nbsp;որում պարտավորվում է լրացնել իր վերաբերյալ իրական և ճշմարտացի տեղեկատվություն։ Անձնական օգտահաշվի ստեղծումը համարվում է սույն օֆերտայի ակցեպտավորում (հաստատում)։</p>\r\n\r\n<p>5․3․&nbsp;<strong>Օգտատերն</strong>&nbsp;իր ազատ կամքի արտահայտմամբ համալրում է իր&nbsp;<strong>անձնական օգտահաշիվը՝</strong>&nbsp;<strong>CRONE</strong>&nbsp;գնելու եղանակով,</p>\r\n\r\n<p>5․4․&nbsp;<strong>Օգտատերն</strong>&nbsp;իր ազատ կամքի արտահայտմամբ իր&nbsp;<strong>անձնական օգտահաշվի</strong>&nbsp;միջոցով կատարում է գնումներ,</p>\r\n\r\n<p>5․5․&nbsp;<strong>Օգտատերն</strong>&nbsp;իր ազատ կամքի արտահայտմամբ գնումներ է կատարում&nbsp;<strong>Գործընկեր կազմակերպություններից</strong>&nbsp;և ներկայացնելով իր&nbsp;<strong>անձնական օգտահաշիվը</strong>&nbsp;նույնացնող տվյալները, ստանում&nbsp;<strong>Cash Back`&nbsp;</strong>համաձայն&nbsp;<strong>Գործընկեր կազմակերպության</strong>&nbsp;կողմից սահմանված դրույքաչափի,</p>\r\n\r\n<p>5․6․&nbsp;<strong>Օգտատերը&nbsp;</strong>սույն օֆերտային 2․4 կետի դրույթների պահպանման դեպքում ստանում է նույն կետով նախատեսված խրախուսական միջոցներ։</p>\r\n\r\n<p>5․7․&nbsp;<strong>Օգտատերը</strong>&nbsp;կարող է ստեղծել ոչ ավելի քան երկու&nbsp;<strong>անձնական օգտահաշիվ։</strong></p>\r\n\r\n<p>5․8․&nbsp;<strong>Օգտատերը</strong>&nbsp;կարող է կատարել իր&nbsp;<strong>անձնական օգտահաշիվներում</strong>&nbsp;առկա &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CRONE</strong>-ների փոխանցում իր&nbsp;<strong>անձնական օգտահաշիվների</strong>&nbsp;միջև, որոնք սակայն չեն համարվում սույն օֆերտայի 2․4 կետով նախատեսված պայմանի առկայություն և չեն համարվում նույն կետով նախատեսված խրախուսանքի կիրառման հիմք։</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>6</strong><strong>․</strong><strong>&nbsp;Եզրափակիչ դրույթներ</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>6․1․Սույն օֆերտայի փոփոխությունների մասին&nbsp;<strong>Push հաղորդագրության</strong>&nbsp;միջոցով առնվազն 7 օր առաջ ծանուցում ուղարկելուց հետո, ծանուցման մեջ նշված օրը, սույն օֆերտայի փոփոխված կամ վերացված դրույթը համարվում է ուժը կորցրած և գործում է օֆերտային փոփոխությամբ նախատեսված փոփոխված կամ նոր սահմանված դրույթը։</p>\r\n\r\n<p>6․2․Սույն oֆերտայի փոփոխությունների վերաբերյալ ծանուցումը համարվում է պատշաճ, այդ մասին&nbsp;<strong>Push հաղորդագրություն&nbsp;</strong>ուղարկելու պահից՝ անկախ&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;կողմից&nbsp;<strong>Push հաղորդագրություն&nbsp;</strong>փաստացի ընթերցման պահից։</p>\r\n\r\n<p>6․3․ Փոփոխությունների հետ համաձայն չլինելու դեպքում,&nbsp;<strong>Օգտատերը</strong>&nbsp;պարտավոր է անմիջապես դադարեցնել&nbsp;<strong>One Card&nbsp;</strong>հավելվածի օգտագործումն և այդ մասին գրավոր տեղեկացնել&nbsp;<strong>One Card&nbsp;</strong>հավելվածին։</p>\r\n\r\n<p>6․4․ Սույն օֆերտայում սահմանված ստորև շարադրված դրույթները ենթակա չեն փոփոխման, մասնավորապես՝</p>\r\n\r\n<p>6․4․1․&nbsp;<strong>Օգտատերերի</strong>&nbsp;կողմից&nbsp;<strong>CRONE</strong>-ի կանխիկացման դեպքում, մեկ միավոր&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CRONE</strong>-ը հաշվարկվում է 1 պայմանական միավոր,</p>\r\n\r\n<p>6․4․2․&nbsp;<strong>Օգտատերերը</strong>&nbsp;մեկ միավոր&nbsp;<strong>CRONE</strong>-ը գնում են 2 պայմանական միավոր արժեքով դրույթը կարող է փոփոխվել մասնակի, այսինքն՝ մեկ միավոր&nbsp;<strong>CRONE</strong>-ի արժեքը կարող է ավելանալ, սակայն չի կարող նվազել 2 պայմանական միավոր արժեքից։</p>\r\n\r\n<p>6․4․3․&nbsp;<strong>Օգտատիրոջ</strong>&nbsp;անձնական օգտահաշվին հաշվեգրվող նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք խրախուսական միջոցների՝&nbsp;<strong>CRONE-</strong>ի հաշվարկման դրույքաչափը չի կարող նվազել 1%-ի չափից։</p>\r\n\r\n<p>6․4․4․ Սույն օֆերտայի 2․4 կետում նախատեսված&nbsp;<strong>One Card&nbsp;</strong>հավելվածի օգտագործման խթանման միջոցների՝ անձնական օգտահաշվին հաշվեգրվող նվազագույն մնացորդի նկատմամբ հաշվարկված 1%-ին համարժեք&nbsp;<strong>CRONE</strong>-ի հաշվերգրման ժամանակահատվածը՝ 29 օրյա ժամկետն անփոփոխ է։</p>\r\n\r\n            </div>\r\n\r\n        </div>\r\n\r\n    </div>', 0, '2023-05-08 20:51:47', 1, 'police');
INSERT INTO `fs_pages` (`id`, `page_name_am`, `page_name_ru`, `page_name_en`, `page_title_am`, `page_title_ru`, `page_title_en`, `page_keywords_am`, `page_keywords_ru`, `page_keywords_en`, `page_content_am`, `page_content_ru`, `page_content_en`, `order_num`, `create_date`, `status`, `url`) VALUES
(7, 'Ինչ է Fos.am-ը', 'Что такое Fos.am?', 'What is Fos.am?', 'Ինչ է Fos.am-ը', 'Что такое Fos.am?', 'What is Fos.am?', '', '', '', '\n\n<main class=\"fs-main-content\">\n\n    <div class=\"fs-breadcrumbs-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <ul class=\"fs-breadcrumbs-list\">\n\n                <li class=\"fs-breadcrumbs-el\"><a href=\"/\">Գլխավոր էջ</a></li>\n\n                <li class=\"fs-breadcrumbs-el\">Մեր մասին</li>\n\n            </ul>\n\n        </div>\n\n    </div>\n\n    <div class=\"fs-about-us-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <div class=\"fs-about-us-content\">\n\n                <h1 class=\"fs-about-us-title\">Ի ՞նչ է FOS.AM-ը</h1>\n\n                <div class=\"fs-about-us-text\">\n\n                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի\n\n                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ.\n\n                        իիսքուե վեռիթուս անթիոպամ եսթ նե,</p>\n\n                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի\n\n                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե</p>\n\n                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի\n\n                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ Ինֆոէքսպերտ։</p>\n\n                </div>\n\n                <?\n\n                    if(isset($_SESSION[\'CUSTOMER\']) === false){\n\n                ?>\n\n                        <div class=\"fs-about-us-link-wrapper\">\n\n                            <a href=\"http://<?=$_SERVER[\'HTTP_HOST\'];?>/sign-up/\" class=\"fs-about-us-link\">Գրանցվել համակարգում</a>\n\n                        </div>\n\n                <?\n\n                    }\n\n                ?>\n\n            </div>\n\n            <div class=\"fs-about-us-video\">\n\n                <video\n\n                        id=\"my-video\"\n\n                        class=\"video-js\"\n\n                        controls\n\n                        preload=\"auto\"\n\n                        width=\"640\"\n\n                        height=\"264\"\n\n                        poster=\"/web/media/video/about-us.jpg\"\n\n                        data-setup=\"{}\"\n\n                >\n\n                    <source src=\"/web/media/video/about-us.mp4\" type=\"video/mp4\"/>\n\n                    <p class=\"vjs-no-js\">\n\n                        To view this video please enable JavaScript, and consider upgrading to a\n\n                        web browser that\n\n                        <a href=\"http://videojs.com/html5-video-support/\" target=\"_blank\"\n\n                        >supports HTML5 video</a\n\n                        >\n\n                    </p>\n\n                </video>\n\n            </div>\n\n        </div>\n\n        <div class=\"fs-how-it-works\">\n\n            <div class=\"fs-container\">\n\n                <h3 class=\"fs-how-it-works-title\">Ինչպե՞ս է աշխատում FOS-ը</h3>\n\n                <div class=\"fs-how-it-works-grid\">\n\n                    <div class=\"fs-how-it-works-grid-el\">\n\n                        <h4 class=\"fs-how-it-works-grid-el-title\">Գրանցում</h4>\n\n                        <p class=\"fs-how-it-works-desc\">Գրանցվիր կայքում Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո\n\n                            ինվենիռե</p>\n\n                        <a class=\"fs-how-it-works-icon\" href=\"/page/help\">\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                        </a>\n\n                    </div>\n\n                    <div class=\"fs-how-it-works-grid-el\">\n\n                        <h4 class=\"fs-how-it-works-grid-el-title\">Lոռեմ իպսում դոլոռ սիթ ամեթ</h4>\n\n                        <p class=\"fs-how-it-works-desc\">Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո ինվենիռե</p>\n\n                             <a class=\"fs-how-it-works-icon\" href=\"/page/help\">\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                        </a>\n\n                    </div>\n\n                    <div class=\"fs-how-it-works-grid-el\">\n\n                        <h4 class=\"fs-how-it-works-grid-el-title\">Lոռեմ իպսում դոլոռ սիթ ամեթ</h4>\n\n                        <p class=\"fs-how-it-works-desc\">Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո ինվենիռե գռաեծո\n\n                            ինվենիռե նիռե</p>\n     <a class=\"fs-how-it-works-icon\" href=\"/page/help\">\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                        </a>\n                    </div>\n\n                </div>\n\n            </div>\n\n        </div>\n\n       \n\n\n\n', '\n\n<main class=\"fs-main-content\">\n\n    <div class=\"fs-breadcrumbs-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <ul class=\"fs-breadcrumbs-list\">\n\n                <li class=\"fs-breadcrumbs-el\"><a href=\"/\">Գլխավոր էջ</a></li>\n\n                <li class=\"fs-breadcrumbs-el\">Մեր մասին</li>\n\n            </ul>\n\n        </div>\n\n    </div>\n\n    <div class=\"fs-about-us-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <div class=\"fs-about-us-content\">\n\n                <h1 class=\"fs-about-us-title\">Ի ՞նչ է FOS.AM-ը</h1>\n\n                <div class=\"fs-about-us-text\">\n\n                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի\n\n                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ.\n\n                        իիսքուե վեռիթուս անթիոպամ եսթ նե,</p>\n\n                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի\n\n                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե</p>\n\n                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի\n\n                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ Ինֆոէքսպերտ։</p>\n\n                </div>\n\n                <?\n\n                    if(isset($_SESSION[\'CUSTOMER\']) === false){\n\n                ?>\n\n                        <div class=\"fs-about-us-link-wrapper\">\n\n                            <a href=\"http://<?=$_SERVER[\'HTTP_HOST\'];?>/sign-up/\" class=\"fs-about-us-link\">Գրանցվել համակարգում</a>\n\n                        </div>\n\n                <?\n\n                    }\n\n                ?>\n\n            </div>\n\n            <div class=\"fs-about-us-video\">\n\n                <video\n\n                        id=\"my-video\"\n\n                        class=\"video-js\"\n\n                        controls\n\n                        preload=\"auto\"\n\n                        width=\"640\"\n\n                        height=\"264\"\n\n                        poster=\"/web/media/video/about-us.jpg\"\n\n                        data-setup=\"{}\"\n\n                >\n\n                    <source src=\"/web/media/video/about-us.mp4\" type=\"video/mp4\"/>\n\n                    <p class=\"vjs-no-js\">\n\n                        To view this video please enable JavaScript, and consider upgrading to a\n\n                        web browser that\n\n                        <a href=\"http://videojs.com/html5-video-support/\" target=\"_blank\"\n\n                        >supports HTML5 video</a\n\n                        >\n\n                    </p>\n\n                </video>\n\n            </div>\n\n        </div>\n\n        <div class=\"fs-how-it-works\">\n\n            <div class=\"fs-container\">\n\n                <h3 class=\"fs-how-it-works-title\">Ինչպե՞ս է աշխատում FOS-ը</h3>\n\n                <div class=\"fs-how-it-works-grid\">\n\n                    <div class=\"fs-how-it-works-grid-el\">\n\n                        <h4 class=\"fs-how-it-works-grid-el-title\">Գրանցում</h4>\n\n                        <p class=\"fs-how-it-works-desc\">Գրանցվիր կայքում Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո\n\n                            ինվենիռե</p>\n\n                        <a class=\"fs-how-it-works-icon\" href=\"/page/help\">\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                        </a>\n\n                    </div>\n\n                    <div class=\"fs-how-it-works-grid-el\">\n\n                        <h4 class=\"fs-how-it-works-grid-el-title\">Lոռեմ իպսում դոլոռ սիթ ամեթ</h4>\n\n                        <p class=\"fs-how-it-works-desc\">Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո ինվենիռե</p>\n\n                             <a class=\"fs-how-it-works-icon\" href=\"/page/help\">\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                        </a>\n\n                    </div>\n\n                    <div class=\"fs-how-it-works-grid-el\">\n\n                        <h4 class=\"fs-how-it-works-grid-el-title\">Lոռեմ իպսում դոլոռ սիթ ամեթ</h4>\n\n                        <p class=\"fs-how-it-works-desc\">Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո ինվենիռե գռաեծո\n\n                            ինվենիռե նիռե</p>\n     <a class=\"fs-how-it-works-icon\" href=\"/page/help\">\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                        </a>\n                    </div>\n\n                </div>\n\n            </div>\n\n        </div>\n\n       \n\n\n\n', '\n\n<main class=\"fs-main-content\">\n\n    <div class=\"fs-breadcrumbs-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <ul class=\"fs-breadcrumbs-list\">\n\n                <li class=\"fs-breadcrumbs-el\"><a href=\"/\">Գլխավոր էջ</a></li>\n\n                <li class=\"fs-breadcrumbs-el\">Մեր մասին</li>\n\n            </ul>\n\n        </div>\n\n    </div>\n\n    <div class=\"fs-about-us-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <div class=\"fs-about-us-content\">\n\n                <h1 class=\"fs-about-us-title\">Ի ՞նչ է FOS.AM-ը</h1>\n\n                <div class=\"fs-about-us-text\">\n\n                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի\n\n                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ.\n\n                        իիսքուե վեռիթուս անթիոպամ եսթ նե,</p>\n\n                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի\n\n                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե</p>\n\n                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի\n\n                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ Ինֆոէքսպերտ։</p>\n\n                </div>\n\n                <?\n\n                    if(isset($_SESSION[\'CUSTOMER\']) === false){\n\n                ?>\n\n                        <div class=\"fs-about-us-link-wrapper\">\n\n                            <a href=\"http://<?=$_SERVER[\'HTTP_HOST\'];?>/sign-up/\" class=\"fs-about-us-link\">Գրանցվել համակարգում</a>\n\n                        </div>\n\n                <?\n\n                    }\n\n                ?>\n\n            </div>\n\n            <div class=\"fs-about-us-video\">\n\n                <video\n\n                        id=\"my-video\"\n\n                        class=\"video-js\"\n\n                        controls\n\n                        preload=\"auto\"\n\n                        width=\"640\"\n\n                        height=\"264\"\n\n                        poster=\"/web/media/video/about-us.jpg\"\n\n                        data-setup=\"{}\"\n\n                >\n\n                    <source src=\"/web/media/video/about-us.mp4\" type=\"video/mp4\"/>\n\n                    <p class=\"vjs-no-js\">\n\n                        To view this video please enable JavaScript, and consider upgrading to a\n\n                        web browser that\n\n                        <a href=\"http://videojs.com/html5-video-support/\" target=\"_blank\"\n\n                        >supports HTML5 video</a\n\n                        >\n\n                    </p>\n\n                </video>\n\n            </div>\n\n        </div>\n\n        <div class=\"fs-how-it-works\">\n\n            <div class=\"fs-container\">\n\n                <h3 class=\"fs-how-it-works-title\">Ինչպե՞ս է աշխատում FOS-ը</h3>\n\n                <div class=\"fs-how-it-works-grid\">\n\n                    <div class=\"fs-how-it-works-grid-el\">\n\n                        <h4 class=\"fs-how-it-works-grid-el-title\">Գրանցում</h4>\n\n                        <p class=\"fs-how-it-works-desc\">Գրանցվիր կայքում Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո\n\n                            ինվենիռե</p>\n\n                        <a class=\"fs-how-it-works-icon\" href=\"/page/help\">\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                        </a>\n\n                    </div>\n\n                    <div class=\"fs-how-it-works-grid-el\">\n\n                        <h4 class=\"fs-how-it-works-grid-el-title\">Lոռեմ իպսում դոլոռ սիթ ամեթ</h4>\n\n                        <p class=\"fs-how-it-works-desc\">Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո ինվենիռե</p>\n\n                             <a class=\"fs-how-it-works-icon\" href=\"/page/help\">\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                        </a>\n\n                    </div>\n\n                    <div class=\"fs-how-it-works-grid-el\">\n\n                        <h4 class=\"fs-how-it-works-grid-el-title\">Lոռեմ իպսում դոլոռ սիթ ամեթ</h4>\n\n                        <p class=\"fs-how-it-works-desc\">Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո ինվենիռե գռաեծո\n\n                            ինվենիռե նիռե</p>\n     <a class=\"fs-how-it-works-icon\" href=\"/page/help\">\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                            <i class=\"fs-icon-chevron\"></i>\n\n                        </a>\n                    </div>\n\n                </div>\n\n            </div>\n\n        </div>\n\n       \n\n\n\n', 0, '2023-05-08 20:58:51', 1, 'about'),
(8, 'Ինչպե՞ս է աշխատում FOS-ը', 'Как работает FOS ?', 'How does FOS work?', 'Ինչպե՞ս է աշխատում FOS-ը', 'Как работает FOS ?', 'How does FOS work?', '', '', '', '\n<main class=\"fs-main-content\">\n\n    <div class=\"fs-breadcrumbs-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <ul class=\"fs-breadcrumbs-list\">\n\n                <li class=\"fs-breadcrumbs-el\"><a href=\"http://demo.loc/\">Գլխավոր էջ</a></li>\n\n                <li class=\"fs-breadcrumbs-el\">Ինչպես պատվիրել</li>\n\n            </ul>\n\n        </div>\n\n    </div>\n\n    <div class=\"fs-help-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <h1 class=\"fs-help-page-title\">Ինչպես պատվիրել</h1>\n\n            <div class=\"fs-help-page-content\">\n\n                <h1>Ինչպես պատվիրել</h1>\n\n<h3>Քայլ առաջին վերնագիր</h3>\n\n<p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե, Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե,</p>\n\n<h3>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո</h3>\n\n<p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե, Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ,: վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե:</p>\n\n<p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե, Lոռեմ իպսում դոլոռ սիթ ամեթ:</p>\n\n<ul>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս</li>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթթ. իիսքուե վեռիթուս անթիոպամ եսթ նե</li>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթթ. իիսքուե վեռիթուս անթիոպամ եսթ նե</li>\n</ul>\n\n<h3>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո</h3>\n\n<ol>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի.</li>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի</li>\n</ol>\n\n            </div>\n\n        </div>\n\n    </div>\n\n</main>', '\n<main class=\"fs-main-content\">\n\n    <div class=\"fs-breadcrumbs-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <ul class=\"fs-breadcrumbs-list\">\n\n                <li class=\"fs-breadcrumbs-el\"><a href=\"http://demo.loc/\">Գլխավոր էջ</a></li>\n\n                <li class=\"fs-breadcrumbs-el\">Ինչպես պատվիրել</li>\n\n            </ul>\n\n        </div>\n\n    </div>\n\n    <div class=\"fs-help-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <h1 class=\"fs-help-page-title\">Ինչպես պատվիրել</h1>\n\n            <div class=\"fs-help-page-content\">\n\n                <h1>Ինչպես պատվիրել</h1>\n\n<h3>Քայլ առաջին վերնագիր</h3>\n\n<p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե, Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե,</p>\n\n<h3>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո</h3>\n\n<p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե, Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ,: վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե:</p>\n\n<p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե, Lոռեմ իպսում դոլոռ սիթ ամեթ:</p>\n\n<ul>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս</li>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթթ. իիսքուե վեռիթուս անթիոպամ եսթ նե</li>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթթ. իիսքուե վեռիթուս անթիոպամ եսթ նե</li>\n</ul>\n\n<h3>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո</h3>\n\n<ol>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի.</li>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի</li>\n</ol>\n\n            </div>\n\n        </div>\n\n    </div>\n\n</main>', '\n<main class=\"fs-main-content\">\n\n    <div class=\"fs-breadcrumbs-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <ul class=\"fs-breadcrumbs-list\">\n\n                <li class=\"fs-breadcrumbs-el\"><a href=\"http://demo.loc/\">Գլխավոր էջ</a></li>\n\n                <li class=\"fs-breadcrumbs-el\">Ինչպես պատվիրել</li>\n\n            </ul>\n\n        </div>\n\n    </div>\n\n    <div class=\"fs-help-wrapper\">\n\n        <div class=\"fs-container\">\n\n            <h1 class=\"fs-help-page-title\">Ինչպես պատվիրել</h1>\n\n            <div class=\"fs-help-page-content\">\n\n                <h1>Ինչպես պատվիրել</h1>\n\n<h3>Քայլ առաջին վերնագիր</h3>\n\n<p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե, Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե,</p>\n\n<h3>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո</h3>\n\n<p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե, Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ,: վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե:</p>\n\n<p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս անթիոպամ եսթ նե, Lոռեմ իպսում դոլոռ սիթ ամեթ:</p>\n\n<ul>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ. իիսքուե վեռիթուս</li>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթթ. իիսքուե վեռիթուս անթիոպամ եսթ նե</li>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթթ. իիսքուե վեռիթուս անթիոպամ եսթ նե</li>\n</ul>\n\n<h3>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո</h3>\n\n<ol>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի ֆաբուլաս ռաթիոնիբուս աթ մեի.</li>\n	<li>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի</li>\n</ol>\n\n            </div>\n\n        </div>\n\n    </div>\n\n</main>', 0, '2023-05-08 20:58:51', 1, 'help');

-- --------------------------------------------------------

--
-- Table structure for table `fs_params`
--

CREATE TABLE `fs_params` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type_` varchar(15) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_params`
--

INSERT INTO `fs_params` (`id`, `name`, `name_ru`, `name_en`, `parent_id`, `type_`, `status`) VALUES
(33, 'Գույն', 'Цвет ', 'Color ', NULL, 'select', 1),
(40, 'Քաշը', 'Вес', 'The weight', NULL, 'text', 1),
(41, 'Քանակ', 'Количество', 'Quantity', NULL, 'number', 1),
(48, 'Խնձորի տեսակներ', 'Виды яблок', 'Types of apples', NULL, 'select', 1),
(64, 'Գոլդեն', 'Золотой', 'Golden', 48, NULL, 1),
(65, 'Դեմիրճյան', 'Демирчян', 'Demirchyan', 48, NULL, 1),
(66, 'Կեխուրի', 'Кехури', 'Kekhuri', 48, NULL, 1),
(71, 'Կարմիր', 'Красный', 'Red', 33, NULL, 1),
(72, 'Կանաչ', 'Зелёный', 'Green', 33, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fs_param_to_category`
--

CREATE TABLE `fs_param_to_category` (
  `id` int(11) NOT NULL,
  `param_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_param_to_category`
--

INSERT INTO `fs_param_to_category` (`id`, `param_id`, `category_id`) VALUES
(8, 40, 12),
(9, 48, 12),
(12, 33, 12);

-- --------------------------------------------------------

--
-- Table structure for table `fs_products`
--

CREATE TABLE `fs_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `vendor_code` varchar(200) DEFAULT NULL,
  `code_` varchar(200) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `qty_type` int(11) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_ru` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `send_notice` int(11) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_aah` int(11) DEFAULT NULL,
  `is_tax` int(11) DEFAULT NULL,
  `tax_procent` float DEFAULT 0,
  `is_env` int(11) DEFAULT NULL,
  `env_procent` float DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` float DEFAULT 0,
  `brand_id` int(11) DEFAULT NULL,
  `order_num` int(11) NOT NULL DEFAULT 0,
  `orders_count` int(11) DEFAULT 0,
  `atg` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_products`
--

INSERT INTO `fs_products` (`id`, `name`, `name_ru`, `name_en`, `vendor_code`, `code_`, `url`, `comment`, `category_id`, `qty_type`, `video`, `image`, `description`, `description_ru`, `description_en`, `send_notice`, `provider_id`, `user_id`, `is_aah`, `is_tax`, `tax_procent`, `is_env`, `env_procent`, `status`, `create_date`, `price`, `brand_id`, `order_num`, `orders_count`, `atg`) VALUES
(1, 'Միկրոֆիբրե լաթ Arm Sponge', 'Тряпка из микрофибры. Губка для рук.', 'Microfiber rag Arm Sponge', '120848', '120848', 'mikrofibre_lat_arm_sponge_1', '', 11, 5, NULL, 'web/uploads/17017001041.webp', 'Միկրոֆիբրե լաթ Arm Sponge', 'Тряпка из микрофибры. Губка для рук.', 'Microfiber rag Arm Sponge', 1, 41, 41, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 14:25:44', 1000, NULL, 0, 0, 5049222222221),
(2, 'Միկրոֆիբրե լաթ Arm Sponge', 'Тряпка из микрофибры. Губка для рук.', 'Microfiber rag Arm Sponge', '090685', '090685', 'mikrofibre_lat_arm_sponge_2', '', 11, 5, NULL, 'web/uploads/17017001871.webp', 'Միկրոֆիբրե լաթ Arm Sponge', 'Тряпка из микрофибры. Губка для рук.', 'Microfiber rag Arm Sponge', 1, 41, 41, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 14:29:22', 1000, NULL, 0, 0, 5049222222222),
(3, 'Microfiber rag Arm Sponge', 'Сигареты «Арарат Эксклюзив Слимс»', 'Cigarettes «Ararat Exclusive Slims»', '1208489', '1208489', 'microfiber_rag_arm_sponge_3', '', 11, 5, NULL, 'web/uploads/17017001871.webp', 'Microfiber rag Arm Sponge', 'Смола: 1 мг, никотин: 0,1 мг. Сигареты, содержащие измельченный табак, различаются по крепости (содержанию никотина) и вкусу. Употребление табака оказывает негативное влияние на здоровье как курильщика, так и окружающих его некурящих людей и животных. Недоступно для покупки через PayPal', 'Resin: 1 mg, nicotine: 0.1 mg. Cigarettes that contain crushed tobacco vary in strength (nicotine content) and flavor. Tobacco use has a negative impact on the health of both the smoker and the non-smoking people and animals around him. Not available for purchase with paypal', 1, 41, 41, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 14:34:50', 1000, NULL, 0, 0, 5049222222221),
(4, 'Միկրոֆիբրե լաթ Arm Sponge', 'Тряпка из микрофибры. Губка для рук.', 'Microfiber rag Arm Sponge', '12084897', '12084897', 'mikrofibre_lat_arm_sponge_4', '', 11, 5, NULL, 'web/uploads/17017001871.webp', 'Միկրոֆիբրե լաթ Arm Sponge', 'Тряпка из микрофибры. Губка для рук.', 'Microfiber rag Arm Sponge', 1, 41, 41, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 14:36:40', 1000, NULL, 0, 0, 5049222222221),
(5, 'Կարագ սերուցքային «Մարիաննա» 180գ, յուղայնությունը` 82.5%', 'Масло сливочное ', 'Creamy butter ', '', '00085', 'karag_serutsqayin_marianna_180g_yuxaynutyuny`_82.5__5', '', 87, 5, NULL, 'web/uploads/170230060313-11-300x300.webp', 'Կարագ յուղայնությունը` 82.5% Կարագը կաթնամթերային արտադրանք է, որը ստացվում է սերուցքի կամ խնոցիացված կաթի խմորումից: Կարագը բաղկացած է կաթնային ճարպից, սպիտակուցներից և ջրից: Այն սովորաբար ունի բաց դեղին գույն: Կաթնային ճարպը դրական ազդեցություն է թողնում տեսողության, մաշկի և աղեստամոքսային տրակտի վրա, ինչպես նաև խորհուրդ է տրվում կրծքով կերակրող մայրերին:', 'Жирность сливочного масла: 82,5% Сливочное масло – молочный продукт, получаемый путем брожения сливок или сгущенного молока. Сливочное масло состоит из молочного жира, белков и воды. Обычно он светло-желтого цвета. Молочный жир положительно влияет на зрение, кожу и желудочно-кишечный тракт, а также рекомендуется кормящим матерям.', 'Butter fat content: 82.5% Butter is a dairy product obtained from the fermentation of cream or condensed milk. Butter consists of milk fat, proteins and water. It is usually light yellow in color. Milk fat has a positive effect on vision, skin and gastrointestinal tract, and is also recommended for breastfeeding mothers.', 1, 39, 39, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 15:02:50', 910, 3, 0, 0, 405101405101405),
(6, 'Կաթ «Մարիաննա» 950մլ, յուղայնությունը` 3,2%', 'Молоко «Марианна» 950 мл, жирность: 3,2%', 'Milk «Marianna» 950 ml, fat content: 3.2%', '', '00089', 'kat_marianna_950ml_yuxaynutyuny`_3_2__6', '', 78, 5, NULL, 'web/uploads/170230061313-11-300x300.webp', 'Պաստերիզացված կաթ, յուղայնությունը` 3,2%: Պաստերիզացման համար կաթը տաքացվում է մինչև 80°C: Կաթը պետք չէ ավել տաքացնել, քանի որ 80°C լիովին բավարար է բակտերիաների և միկրոբների ոչնչացման համար: Այս մեթոդի յուրահատկությունը կայանում է նրանում, որ ոչնչանում են միայն բակտերիաներն ու միկրոբները, մնացած բոլոր պիտանի նյութերը պահպանվում են:', 'Молоко пастеризованное, жирность: 3,2%. Молоко нагревают до 80°С для пастеризации. Молоко не нужно дополнительно нагревать, поскольку температуры 80°C вполне достаточно для уничтожения бактерий и микробов. Особенность этого метода заключается в том, что уничтожаются только бактерии и микробы, все остальные полезные вещества сохраняются.', 'Pasteurized milk, fat content: 3.2%. Milk is heated to 80°C for pasteurization. Milk does not need to be heated more, as 80°C is completely sufficient to kill bacteria and microbes. The peculiarity of this method lies in the fact that only bacteria and microbes are destroyed, all other useful substances are preserved.', 1, 39, 39, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 15:04:36', 1000, 3, 0, 0, 401401401401),
(7, 'Թթվասեր «Մարիաննա» 400գ, յուղայնությունը` 18%', 'Сметана «Марианна» 400г, жирность: 18%', 'Sour cream «Marianna» 400g, fat content: 18%', '', '', 'ttvaser_marianna_400g_yuxaynutyuny`_18__7', '', 94, 1, NULL, 'web/uploads/170230062013-11-300x300.webp', 'Թթվասեր, յուղայնությունը` 18%', 'Кислый, жирность: 18%', 'Sour, fat content: 18%', 1, 39, 39, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 15:06:50', 650, 3, 0, 0, 40610406104061),
(8, 'Նռան գինի «Կենաց ծառ»', 'Гранатовое вино «Древо жизни»', 'Pomegranate wine «Tree of Life»', '', '6666', 'nran_gini_kenats_tsar_8', '', 190, 1, NULL, 'web/uploads/170230063013-11-300x300.webp', 'Գինու նուռ «Կենաց ծառ» մեծածախ գնով. Առաջարկում ենք գինիներ Պռոշյանի կոնյակի գործարանից՝ հաստատված առաքմամբ ողջ Ռուսաստանում և ԱՊՀ երկրներում։', 'Вино гранатовое \"Древо жизни\" цена оптовая. Предлагаем вина Прошянского коньячного завода с подтвержденной доставкой по всей России и странам СНГ.', 'Wine pomegranate \"Tree of Life\" wholesale price. We offer wines from the Proshyan cognac factory with confirmed delivery throughout Russia and the CIS countries.', 1, 38, 38, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 15:11:12', 3000, 3, 0, 0, 220110220220110),
(9, 'Ձեռնոցներ NITRILE սև KHACHATRYAN', 'Перчатки НИТРИЛОВЫЕ белые ХАЧАТРЯН', 'Gloves NITRILE white KHACHATRYAN', '', '', 'zhernotsner_nitrile_sev_khachatryan_9', '', 190, 1, NULL, 'web/uploads/17017026506.webp', 'Ձեռնոցներ NITRILE սև KHACHATRYAN', 'Перчатки НИТРИЛОВЫЕ белые ХАЧАТРЯН', 'Gloves NITRILE white KHACHATRYAN', 1, 38, 38, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 15:11:58', 4500, 3, 0, 0, 220110220220110),
(10, 'Ձեռնոցներ NITRILE սև KHACHATRYAN', 'Перчатки НИТРИЛОВЫЕ белые ХАЧАТРЯН', 'Ձեռնոցներ NITRILE սև KHACHATRYAN', '', '', 'zhernotsner_nitrile_sev_khachatryan_10', '', 190, 1, NULL, 'web/uploads/17017026045.webp', 'Ձեռնոցներ NITRILE սև KHACHATRYAN', 'Перчатки НИТРИЛОВЫЕ белые ХАЧАТРЯН', 'Ձեռնոցներ NITRILE սև KHACHATRYAN', 1, 38, 38, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 15:12:39', 8000, 3, 0, 0, 220110220220110),
(11, 'Ձեռնոցներ NITRILE սպիտակ KHACHATRYAN', 'Перчатки НИТРИЛОВЫЕ белые ХАЧАТРЯН', 'Gloves NITRILE white KHACHATRYAN', '', '', 'zhernotsner_nitrile_spitak_khachatryan_11', '', 190, 1, NULL, 'web/uploads/17017024754.webp', 'Ձեռնոցներ NITRILE սպիտակ KHACHATRYAN', 'Перчатки НИТРИЛОВЫЕ белые ХАЧАТРЯН', 'Gloves NITRILE white KHACHATRYAN', 1, 38, 38, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-18 15:13:33', 30000, 3, 0, 0, 220110220220110),
(12, 'Երկկողմանի լաթ միկրոֆիբրե Arm Sponge', 'Двусторонняя тряпка из микрофибры. Губка для рук.', 'Double-sided rag microfiber Arm Sponge', '', '', 'erkkoxmani_lat_mikrofibre_arm_sponge_12', '', 197, 4, NULL, 'web/uploads/17017023023.webp', 'Բաղադրությունը: արոսենի, ջուր, շաքար\r\n\r\nՍննդային արժեքը 100գ մթերքում:\r\n\r\nսպիտակուցներ-0.21գ, ածխաջրեր-11.8գ , ճարպեր-0.03 գ\r\n\r\nԷներգետիկ արժեքը -45.44Կկալ/ 181.76կՋ', 'Двусторонняя тряпка из микрофибры. Губка для рук.', 'Double-sided rag microfiber Arm Sponge', 1, 38, 38, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-26 14:37:38', 800, 3, 0, 0, 2009220092009),
(13, 'Բարձր ճնշման պոմպի պահեստամաս HAWK', 'Запчасть насоса высокого давления HAWK', 'High pressure pump spare part HAWK', '', '', 'barzhr_jnshman_pompi_pahestamas_hawk_13', '', 197, 4, NULL, 'web/uploads/17017006212.webp', 'Բարձր ճնշման պոմպի պահեստամաս HAWK', 'Запчасть насоса высокого давления HAWK', 'High pressure pump spare part HAWK', 1, 45, 45, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-26 17:30:50', 850, 6, 0, 0, 2009220092009),
(14, 'Երկբաղադրիչ սոսինձ ՄԴՖ-ի համար 100 մլ', 'Двухкомпонентный клей для МДФ 100 мл.', 'Two-component glue for MDF 100 ml', '', '12688', 'erkbaxadrich_sosinzh_mdf_i_hamar_100_ml_14', 'Երկբաղադրիչ սոսինձ ՄԴՖ-ի համար 100 մլ', 238, 1, NULL, 'web/uploads/170082084711184.jpg', 'Երկբաղադրիչ սոսինձ ՄԴՖ-ի համար 100 մլ', 'Двухкомпонентный клей для МДФ 100 мл.', 'Two-component glue for MDF 100 ml', NULL, 46, 46, NULL, NULL, NULL, NULL, NULL, 1, '2023-10-09 09:56:42', 710, 5, 0, 0, 3506335063506),
(15, 'սոսինձ MDF 200մլ', 'клей МДФ 200 мл', 'glue MDF 200 ml', '', '12689', 'sosinzh_mdf_200ml_15', '', 213, 1, NULL, 'web/uploads/1700820881download.jpeg', '200մլ', '200 мл', '200 ml', NULL, 46, 46, NULL, NULL, NULL, NULL, NULL, 1, '2023-10-09 09:59:22', 910, 5, 0, 0, 3506335063506),
(16, 'Սոսինձ Tytan Fast Fix Classic 290 մլ ', 'Клей Tytan Fast Fix Classic 290 мл', 'Glue Tytan Fast Fix Classic 290 ml', '', '7201290', 'sosinzh_tytan_fast_fix_classic_290_ml__16', '', 213, 1, NULL, 'web/uploads/170082099810004599.jpg', '03334/3141', '03334/3141', '03334/3141', NULL, 46, 46, NULL, NULL, NULL, NULL, NULL, 1, '2023-10-09 10:01:17', 2650, 5, 0, 0, 3506335063506),
(17, 'սոսինձ КОНТАКТ 3գր․ ապակու KM 120', 'клей КОНТАКТ 3 гр. стекло КМ 120', 'glue KONTAKT 3 gr. glass KM 120', '', '5801548', 'sosinzh_КОНТАКТ_3gr․_apaku_km_120_17', '', 213, 1, NULL, 'web/uploads/17008210394640009331154SUFx1wRGBSfsw.jpg', 'սոսինձ КОНТАКТ 3գր․ ապակու KM 120', 'клей КОНТАКТ 3 гр. стекло КМ 120', 'glue KONTAKT 3 gr. glass KM 120', NULL, 46, 46, NULL, NULL, NULL, NULL, NULL, 1, '2023-10-09 12:06:45', 840, 5, 0, 0, 3506335063506),
(18, 'Հերմետիկ ակրիլային Tytan սպիտակ 500gr', 'Герметик акриловый Титан белый 500гр', 'Hermetic acrylic Tytan white 500gr', '', '5801542', 'hermetik_akrilayin_tytan_spitak_500gr_18', '', 238, 1, NULL, 'web/uploads/170082107710-800x800.jpg', 'Հերմետիկ ակրիլային Tytan սպիտակ 500gr', 'Герметик акриловый Титан белый 500гр', 'Hermetic acrylic Tytan white 500gr', NULL, 46, 46, NULL, NULL, NULL, NULL, NULL, 1, '2023-10-09 12:14:42', 850, 5, 0, 0, 3214332143214),
(19, 'Հերմետիկ սիլիկոնային սանիտարական Момент Гермент 280 մլ', 'Герметик силиконовый сантехнический Момент Гермент 280 мл', 'Hermetic silicone sanitary Moment Germent 280 ml', '', '6203034', 'hermetik_silikonayin_sanitarakan_Момент_Гермент_280_ml_19', '', 210, NULL, NULL, 'web/uploads/1700821149203592.jpg', '• գույնը՝ սպիտակ', '• белый цвет', '• color white', NULL, 46, 46, NULL, NULL, NULL, NULL, NULL, 1, '2023-10-09 12:32:01', 2200, 5, 0, 0, 3214332143214),
(20, 'Նախաներկ բետոնկոնտակտ Ceresit CT 19/5 լ', 'Контактная грунтовка по бетону Ceresit CT 19/5 л', 'Concrete contact primer Ceresit CT 19/5 l', '', '4900631', 'naxanerk_betonkontakt_ceresit_ct_19_5_l_20', '', 205, NULL, NULL, 'web/uploads/17008211884900594.jpg', 'Նախաներկ բետոնկոնտակտ Ceresit CT 19/5 լ', 'Контактная грунтовка по бетону Ceresit CT 19/5 л', 'Concrete contact primer Ceresit CT 19/5 l', NULL, 46, 46, NULL, NULL, NULL, NULL, NULL, 1, '2023-10-09 13:11:03', 10780, 5, 0, 0, 3209332093209),
(21, 'Barilla Pesto Sauce Classic Genovese', 'Соус Барилла Песто Классический Дженовезе', 'Barilla Pesto Sauce Classic Genovese', '', '99999999', 'barilla_pesto_sauce_classic_genovese_21', 'VOR with Barilla® Pesto STIR onto Pasta, SPREAD on Pizza and sandwiches,', 174, 10, 'web/uploads/1697992822WhatsApp Video 2023-09-09 at 19.44.41.mp4', 'web/uploads/1697992358images (2).jpeg,web/uploads/169799266123134-PestoSauce-MFS-2X3-0243-8ae60aca21734c55b9c506a979ce0b8a.jpg,web/uploads/169799271023134-PestoSauce-MFS-2X3-0243-8ae60aca21734c55b9c506a979ce0b8a.jpg', 'DIAL UP THE FLAVOR with Barilla® Pesto STIR onto Pasta, SPREAD on Pizza and sandwiches, or MARINATE Chicken, Fish and Vegetables, there\'s so many ways to enjoy! Made with simple ingredients - 100% Italian Basil, Chopped Garlic, and Freshly Grated Italian Cheeses Enjoy a NEW craveable, smooth texture - Creamy Pesto (without any cream!)', 'УЛУЧШИТЕ ВКУС с помощью песто Barilla®. ПЕРЕМЕШИВАЙТЕ на макароны, НАПРАВЛЯЙТЕ на пиццу и сэндвичи или МАРИНИРУЙТЕ курицу, рыбу и овощи — есть так много способов насладиться! Изготовлено из простых ингредиентов — 100% итальянского базилика, нарезанного чеснока и свеженатёртого итальянского сыра. Наслаждайтесь НОВОЙ аппетитной гладкой текстурой — сливочным песто (без сливок!)', 'DIAL UP THE FLAVOR with Barilla® Pesto STIR onto Pasta, SPREAD on Pizza and sandwiches, or MARINATE Chicken, Fish and Vegetables, there\'s so many ways to enjoy! Made with simple ingredients - 100% Italian Basil, Chopped Garlic, and Freshly Grated Italian Cheeses Enjoy a NEW craveable, smooth texture - Creamy Pesto (without any cream!)', 1, 46, 46, NULL, NULL, NULL, NULL, NULL, 0, '2023-10-22 16:32:39', 1144, 3, 0, 0, 90909090909),
(22, 'Միկրոֆիբրե լաթ Arm Sponge', 'Тряпка из микрофибры. Губка для рук.', 'Microfiber rag Arm Sponge', '120848', '120848', 'mikrofibre_lat_arm_sponge_22', '', 11, 5, NULL, 'web/uploads/17017001871.webp', 'Միկրոֆիբրե լաթ Arm Sponge', 'Тряпка из микрофибры. Губка для рук.', 'Microfiber rag Arm Sponge', 1, 6, 6, NULL, NULL, NULL, NULL, NULL, 1, '2023-11-24 12:39:54', 1000, NULL, 0, 0, 5049222222221);

-- --------------------------------------------------------

--
-- Table structure for table `fs_product_params`
--

CREATE TABLE `fs_product_params` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `param_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_product_params`
--

INSERT INTO `fs_product_params` (`id`, `product_id`, `param_id`, `value`) VALUES
(43, 21, 40, ''),
(46, 13, 40, ''),
(47, 12, 40, ''),
(49, 11, 40, ''),
(50, 10, 40, ''),
(51, 9, 40, ''),
(54, 5, 40, ''),
(55, 6, 40, ''),
(56, 7, 40, ''),
(57, 8, 40, '');

-- --------------------------------------------------------

--
-- Table structure for table `fs_product_variations`
--

CREATE TABLE `fs_product_variations` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `param_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fs_requests`
--

CREATE TABLE `fs_requests` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fs_requests`
--

INSERT INTO `fs_requests` (`id`, `buyer_id`, `seller_id`, `status`, `created_at`) VALUES
(21, 47, 38, 1, '2023-09-27 14:20:48'),
(20, 42, 46, 1, '2023-10-22 17:10:50'),
(19, 47, 46, 1, '2023-10-19 12:04:50'),
(23, 38, 42, 1, '2023-11-28 08:16:01'),
(17, 43, 45, 1, '2023-09-26 16:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `fs_settings`
--

CREATE TABLE `fs_settings` (
  `id` int(11) NOT NULL,
  `delivery_price_yerevan` int(11) DEFAULT NULL,
  `delivery_price_regions` int(11) DEFAULT NULL,
  `delivery_fast_price_yerevan` int(11) DEFAULT NULL,
  `delivery_fast_price_regions` int(11) DEFAULT NULL,
  `delivery_free_start_price_yerevan` int(11) DEFAULT NULL,
  `delivery_free_start_price_regions` int(11) DEFAULT NULL,
  `is_free_delivery` int(11) NOT NULL DEFAULT 1,
  `admin_email` varchar(255) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `sitemap` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_brand` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_settings`
--

INSERT INTO `fs_settings` (`id`, `delivery_price_yerevan`, `delivery_price_regions`, `delivery_fast_price_yerevan`, `delivery_fast_price_regions`, `delivery_free_start_price_yerevan`, `delivery_free_start_price_regions`, `is_free_delivery`, `admin_email`, `site_logo`, `sitemap`, `user_id`, `is_brand`) VALUES
(1, 800, 600, 1300, 3000, 3300, 4500, 1, 'admin@fos.am', 'web/uploads/1701257190new-logo.png', 'sitemap.xml', 0, 0),
(2, 500, 6000, 6000, 500, 500, 6000, 1, 'gor.abrahamyan1993@gmail.com', NULL, NULL, 6, 0),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', NULL, NULL, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fs_stores`
--

CREATE TABLE `fs_stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `hvhh` varchar(255) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_stores`
--

INSERT INTO `fs_stores` (`id`, `name`, `address`, `hvhh`, `order_num`, `logo`, `phone`, `email`, `status`, `parent_id`, `user_id`) VALUES
(1, 'SAS', 'erevan', '12345678', NULL, 'web/uploads/1699882051logo.png', NULL, NULL, 1, NULL, 38),
(3, 'SAS Baxramyan', 'Բաղրամյան 35', '0303030303', NULL, 'web/uploads/16998734251200px-SAS_logo_horiz.svg.png', NULL, NULL, 1, 1, 38),
(4, 'Sas Մերգելյան', 'Մերգելյան', '0000232333', NULL, 'web/uploads/1699884321logo.png', NULL, NULL, 1, 1, 38),
(5, 'Yerevan City', 'Պրոսպեկտ', '0004040404', NULL, 'web/uploads/1699946781272833130_1311873792609395_2213242576448271050_n.jpg', NULL, NULL, 1, NULL, 38),
(6, 'Բանգլադեշի մասնաճյուղ', 'բանգլադեշ 3 րդ փողոց', '666566655', NULL, 'web/uploads/1699946851272833130_1311873792609395_2213242576448271050_n.jpg', NULL, NULL, 1, 5, 38);

-- --------------------------------------------------------

--
-- Table structure for table `fs_templates`
--

CREATE TABLE `fs_templates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `cart_id` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fs_templates`
--

INSERT INTO `fs_templates` (`id`, `user_id`, `seller_id`, `name`, `cart_id`) VALUES
(8, 47, 38, 'test', '107,104,106,105,108,109,110'),
(7, 43, 45, 'Հյութեր', '96');

-- --------------------------------------------------------

--
-- Table structure for table `fs_texts`
--

CREATE TABLE `fs_texts` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `text_am` varchar(255) DEFAULT NULL,
  `text_ru` varchar(255) DEFAULT NULL,
  `text_en` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_texts`
--

INSERT INTO `fs_texts` (`id`, `slug`, `text_am`, `text_ru`, `text_en`) VALUES
(1, '__profile__popup__', 'Անձնական էջ', 'Персональная страница', 'Personal page'),
(2, '__profile__popup__exite_', 'Ելք', 'Выход', 'Exit'),
(3, '__notif__popup_text_', 'Ծանուցումներ', 'Уведомления', 'Notifications'),
(4, '__notif__popup_first_button__', 'Ցույց տալ չկարդացածները', 'Показать непрочитанные', 'Show unread'),
(5, '__notif__popup_second_button__', 'Նշել որպես կարդացած', 'Пометить, как прочитанное', 'Mark as read'),
(6, '__notif__popup_tab_1__', 'Նոր', 'Новый', 'New'),
(7, '__notif__popup_tab_2__', 'Ծանուցում', 'Уведомление', 'Notification'),
(8, '__search_text_top_header__', 'Որոնել', 'Поиск', 'Search'),
(9, '_main_page_title_1_', 'Շաբաթվա բրենդ', 'бренд недели', 'brand of the week'),
(10, '_main_page_title_2_', 'Թոփ Կատեգորիաներ', 'Лучшие категории', 'Top Categories'),
(11, '_main_page_title_3_', 'Նոր ապրանքներ', 'Новые продукты', 'New products'),
(12, '__dr__', 'դր', 'др', 'amd'),
(13, '__select_color__', 'Ընտրել գույն', 'Выберите цвет', 'Choose a color'),
(14, '__last_block_title__', 'Միացիր Fos.am-ին', 'Присоединяйтесь к Fos.am', 'Join Fos.am'),
(15, '__last_block_text__', 'Ավելի քան 1000 կազմակերպություն միացել է մեզ: Գրանցիր կազմակերպությունը և միացիր մեր թիմին: լոռեմ իմսում դոլար սիթ դոլար', 'К нам присоединилось более 1000 организаций. Зарегистрируйте свою организацию и присоединяйтесь к нашей команде. lorem imsum доллар сит доллар', 'Over 1000 organizations have joined us. Register your organization and join our team. lorem imsum dollar sit dollar'),
(16, '__last_block_button_text__', 'Գրանցիր կազմակերպությունը', 'Зарегистрировать организацию', 'Register the organization'),
(17, '_footer_title_1_', 'Մեր մասին', 'о нас', 'About us'),
(18, '_footer_title_2_', 'Գործընկերներին', 'Коллегам', 'To partners'),
(19, '_footer_title_3_', 'Հատուկ գործընկեր', 'Специальный партнер', 'Special partner'),
(20, '_footer_title_4_', 'Գաղտնիության քաղաքականություն', 'Политика конфиденциальности', 'Privacy Policy'),
(21, '__page__contact__', 'Կապ մեզ հետ', 'Связаться с нами', 'Contact us'),
(22, '__page__who__', 'Ինչ է Fos.am-ը', 'Что такое Fos.am?', 'What is Fos.am?'),
(23, '__contact_address__', 'ՀՀ, ք. Երևան, Կոմիտաս 3, բն 19', 'РА, с. Ереван, Комитаса 3, кв.19:', 'RA, c. Yerevan, Komitas 3, flat 19:'),
(24, '__contact__phone__', '+374 55 555555', '+374 55 555555', '+374 55 555555'),
(25, '__contact__email__', 'fos@gmail.com', 'fos@gmail.com', 'fos@gmail.com'),
(26, '__categories__', 'Կատեգորիաներ', 'Категории', 'Categories'),
(27, '__all_companies__', 'Բոլոր կազմակերպությունները', 'Все компании', 'All companies'),
(28, '__company_type__', 'Կազմակերպության տեսակ', 'Тип компании', 'Company type'),
(29, '__clear_filters__', 'Մաքրել ֆիլտրը', 'Очистить фильтры', 'Clear filters'),
(30, '__become_a_partner', 'Դառնալ գործընկեր', 'Стать партнером', 'Become a partner'),
(31, '__preferred_products_services__', 'Նախընտրած ապրանքներ / ծառայություններ', 'Предпочтительные продукты/услуги', 'Preferred products / services'),
(32, '__buyer__', 'Գնորդ', 'Покупатель', 'Buyer'),
(33, '__seller__', 'Մատակարար', 'Продавец', 'Seller'),
(34, '__orders__', 'Պատվերներ', 'Заказы', 'Orders'),
(35, '__partners__', 'Գործընկերներ', 'Партнёры', 'Partners'),
(36, '__contact_persons__', 'Կոնտակտային անձիք', 'Контактные лица', 'Contact persons'),
(37, '__sales__', 'Հայտարարված զեղչեր', 'Продажи', 'Sales'),
(38, '__sended_requests__', 'Ուղարկած հայտեր', 'Отправлённые запросы', 'Sended requests'),
(39, '__templates__', 'Ձևանմուշներ', 'Шаблоны', 'Templates'),
(40, '__company_info__', 'Կազմակերպության տվյալներ', 'Информация о компании', 'Company info'),
(41, '__exit_system__', 'Ելք համակարգից', 'Выход из системы', 'Exit system'),
(42, '_all_', 'Բոլորը', 'Все', 'All'),
(43, '__ordered__', 'Պատվիրված', 'Заказал', 'Ordered'),
(44, '__sent_for_confirmation__', 'Ուղարկված հաստատման', 'Отправлено на подтверждение', 'Sent for confirmation'),
(45, '__acepted__', 'Հաստատված', 'Принял', 'Acepted'),
(46, '__closed__', 'Փակված', 'Закрыто', 'Closed'),
(47, '__rejected__', 'Մերժված', 'Отклонённый', 'Rejected'),
(48, '__by_date_', 'Ըստ ժամանակահատվածի', 'По дате', 'By date'),
(49, '__export__', 'Արտահանել', 'Экспорт', 'Export'),
(50, '__date__', 'ԱՄՍԱԹԻՎ', 'Дата', 'Date'),
(51, '__provider__', 'ՄԱՏԱԿԱՐԱՐ', 'Поставщик', 'Provider'),
(52, '__status__', 'ԿԱՐԳԱՎԻՃԱԿ', 'Положение дел', 'Status'),
(53, '__total__', 'ԸՆԴԱՄԵՆԸ', 'Общий', 'Total'),
(54, '__with_taxs__', 'ՆԵՐԱՌՅԱԼ ՀԱՐԿԵՐԸ', 'С налогами', 'With taxs'),
(55, '__partner__', 'Գործընկեր', 'Партнер', 'Partner'),
(56, '__license_end__', 'Լիցենզիայի ավարտ', 'Конец лицензии', 'License end'),
(57, '_day_', 'օր', 'День', 'Day'),
(58, '__company__', 'ԿԱԶՄԱԿԵՐՊՈՒԹՅՈՒՆ', 'Организация', 'Company'),
(59, '__workers__', 'ԱՇԽԱՏԱԿԻՑՆԵՐ', 'Коллеги по работе', 'Workers'),
(60, '__sended__', 'Ուղարկված', 'Отправлено', 'Sended'),
(61, '__sender__', 'ՈՒՂԱՐԿՈՂ', 'Отправитель', 'Sender'),
(62, '__receiver__', 'ՍՏԱՑՈՂ', 'Получатель', 'Receiver'),
(63, '__name__', 'ԱՆՎԱՆՈՒՄ', 'Имя', 'Name'),
(64, '__prods__services__', 'Ապրանքներ / Ծառայություններ\r\n\r\n                        ', 'Продукция и Услуги', 'Products / Services'),
(65, '__favorites_text__', 'Ընտրեք կատեգորիաները և կազմեք ապրանքերի /ծառայությունների Ձեր նախընտրած ցանկը', 'Предпочтительный текст', 'Favorites text'),
(66, '__code__', 'Կոդ', 'Код', 'Code'),
(67, '__control__panel__', 'Գնալ ղեկավարման համակարգ', 'Панель управления', 'Control panel'),
(68, '__hvhh__', 'Կազմակերպության ՀՎՀՀ', 'АВК организации', 'hvhh'),
(69, '__legal_name__', 'Իրավաբանական անվանումը', 'Юридическое название ', 'Legal name'),
(70, '__holding_hvhh__', 'Հոլդինգի ՀՎՀՀ', 'АВЧ холдинга', 'Holding hvhh'),
(71, '__holding_legal_name__', 'Հոլդինգի իրավաբանական անվանումը', 'Юридическое название холдинговой компании', 'Holding legal name'),
(72, '__legal_address__', 'Իրավաբանական հասցե', 'Юридический адрес', 'Legal address'),
(73, '__action_address__', 'Գործունեության հասցե', 'Рабочий адрес', 'Action address'),
(74, '__contact_person_aah__', 'Կոնտակտային անձի ԱԱՀ', 'НДС контакного лица', 'Contact person aah'),
(75, '__email__', 'Էլեկտրոնային հասցե', 'Электронная почта', 'Email'),
(76, '__phone__', 'Հեռախոսահամար', 'Номер телефона', 'Phone'),
(77, '__password__', 'Գաղտնաբառ', 'Пароль', 'Password'),
(78, '__edite_categories__', 'Փոփոխել կատեգորիաները', 'Изменить категории', 'Edite categories'),
(79, '__company_other_info__', 'Այլ տվյալներ', 'Другие данные', 'Company other info'),
(80, '__about_company__', 'Կազմակերպության մասին', 'Об организации', 'About company'),
(81, '__choise_logo__', 'Ընտրել լոգոն', 'Выберите логотип', 'Choise logo'),
(82, '__site__url__', 'Կայքի հղում', 'Ссылка на сайт', 'Site url'),
(83, '__notice_company_text_', 'Համակարգում եղած օգտագործողներին ուղարկել հաղորդագրություն Ձեր կազմակերպությունը FOS-ում գրանցելու մասին:', 'Уведомить компанию текстом', 'Notice company text'),
(84, '__cancel__', 'Չեղարկել', 'Отменить', 'Cancel'),
(85, '__save__', 'Պահպանել', 'Сохранять', 'Save'),
(86, '__change__password__', 'Փոխել գաղտնաբառը', 'Изменить пароль', 'Change password'),
(87, '__sort_by_price_bottom__', 'Ըստ գնի նվազման', 'Отсортировать по убыванию цены', 'Sort by price bottom'),
(88, '__sort_by_price_top__', 'Ըստ գնի աճման', 'Сортировать по возрастанию цены', 'Sort by price top'),
(89, '__required__', 'Պահանջված', 'Востребованная', 'Required'),
(90, '__new__', 'Նոր', 'Новый', 'New'),
(91, '__sort_by__', 'Դասակարգել ըստ', 'Сортировать по', 'Sort by'),
(92, '__filter__', 'Ֆիլտրել', 'Фильтр', 'Filter'),
(93, '__price__', 'Արժեք', 'Цена', 'Price'),
(94, '__apply__', 'Կիրառել', 'Применять', 'Apply'),
(95, '__view__', 'Դիտել', 'Смотреть', 'View'),
(96, '__product__code__', 'Ապրանքի կոդ', 'Код продукта', 'Product code'),
(97, '__description__', 'Նկարագրություն', 'Описание', 'Description'),
(98, '__like__products__', 'Նմանատիպ ապրանքներ', 'Похожие продукты', 'Like products'),
(99, '__home__page__', 'Գլխավոր էջ', 'Главная страница', 'Home page'),
(100, '__contact_us__', 'Կապ մեզ հետ', 'Связаться с нами', 'Contact us'),
(101, '__message__', 'Հաղորդագրություն', 'Сообщение', 'Message'),
(106, '__connected__providers__', 'Մեզ միացած մատակարարները', 'Провайдеры, которые присоединились к нам', 'Providers who have joined us'),
(107, '__show_all__', 'Ցուցադրել բոլորը', 'Показать все', 'Show all'),
(108, '__welcome__', 'Բարի գալուստ Fos.am', 'Добро пожаловать на Fos.am', 'Welcome to Fos.am'),
(109, '__like__buyer__', 'Գրանցվել որպես գնորդ', 'Зарегистрируйтесь как покупатель', 'Register as a buyer'),
(110, '__like__seller__', 'Գրանցվել որպես վաճառող', 'Зарегистрироваться как поставщик', 'Register as a supplier'),
(111, '__login__', 'Մուտք', 'Вход', 'Log in'),
(112, '__mypage__', 'Իմ էջը', 'моя страница', 'my page'),
(113, '__no_nots__', 'Դուք չունեք ծանուցումներ', 'У вас нет уведомлений', 'You have no notifications'),
(114, '__comps__', 'Կազմակերպություններ', 'Организации', 'Organizations'),
(115, '__conts__', 'Կոնտակտային տվյալներ', 'Контакты', 'Contacts'),
(116, '__spec__', 'Հատուկ գործընկեր', 'Специальный партнер', 'Special partner'),
(117, '__add_cart__', 'Ապրանքն(ծառայությունը) ավելացվեց զամբյուղ։', 'Товар (услуга) добавлен в корзину.', 'The product (service) was added to the cart.'),
(118, '_all_cats_', 'Բոլոր կատեգորիաները', 'Все категории', 'All Categories'),
(119, '__more__', 'Իմանալ ավելին ', 'Узнать больше', 'Know more'),
(120, '_main_page_title_55_', 'Վերջերս դիտվածները', 'Недавно просмотренные', 'Recently viewed'),
(121, '__page__how__', 'Ինչպե՞ս է աշխատում FOS-ը', 'Как работает FOS ?', 'How does FOS work?'),
(124, '__registration__', 'Գրանցում', 'Регистрация:', 'Registration'),
(125, '__basket__', 'Զամբյուղ', 'Корзина', 'Basket'),
(126, '__thank__you__', 'շնորհակալություն', 'Спасибо', 'thank you'),
(127, '__also__be__interested__', 'Ձեզ կհետաքրքրի նաև', 'Вам также может быть интересно', 'You may also be interested'),
(128, '__category__name__', 'Կատեգորիայի անվանում', 'Название категории', 'Category name'),
(129, '__empty__basket__', 'Ձեր զամբյուղը դատարկ է', 'Ваша корзина пуста', 'Your cart is empty'),
(130, '__no__products__services__', 'Զամբյուղում ապրանքներ / ծառայություններ չկան', 'В корзине нет товаров / услуг', 'There are no products / services in the cart'),
(131, '__view__range__', 'Դիտել տեսականին', 'Посмотреть ассортимент', 'View the range'),
(132, '__mark_all__', 'Նշել բոլորը', 'пометить все', 'Mark all'),
(133, '__delete__', 'Ջնջել', 'Удалить', 'Delete'),
(134, '__suspended__', 'Կասեցված է', 'Приостановленный', 'Suspended'),
(135, '__send__', 'Ուղարկել', 'Отправлять', 'Send'),
(136, '__view_more__', 'Տեսնել ավելին', 'Узнать больше', 'View more'),
(137, '__password__recovery__', 'Գաղտնաբառի վերականգնում', 'Восстановление пароля', 'Password recovery'),
(138, '__forgot__send__text__', 'Ձեր էլեկտրոնային հասցեին կուղարկվի հղում, որի միջոցով կարող եք վերականգնել գաղտնաբառը', 'Ссылка для сброса пароля будет отправлена на ваш адрес электронной почты.', 'A link to reset your password will be sent to your email address'),
(139, '__no__user__found__', 'Լրացված տվյալներով օգտագործող չի գտնվել', 'Ни один пользователь не найден с заполненными данными', 'No user found with completed data'),
(140, '__username__surname__', 'Օգտագործողի Անուն Ազգանուն', 'Имя пользователя Фамилия', 'Username Surname'),
(141, '__return__login__page__', 'Վերադարձ մուտքի էջ', 'Вернуться на страницу входа', 'Return to login page'),
(142, '__choose__', 'Ընտրել', 'Выбирать', 'Choose'),
(143, '__search__results__', 'որոնման արդյունքներ', 'результаты поиска', 'search results'),
(144, '__search__results__', 'որոնման արդյունքներ', 'результаты поиска', 'search results'),
(145, '__color__', 'Գույն', 'Цвет', 'Color'),
(146, '__food__', 'Սննդամթերք', 'Еда', 'Food'),
(147, '__household__appliances__', 'Կենցաղային տեխնիկա', 'Бытовая техника', 'Household Appliances'),
(148, '__economical__products__', 'Տնտեսական ապրանքներ', 'Экономичные продукты', 'Economical products'),
(149, '__discount__name__', 'զեղչի անվանում', 'имя скидки', 'discount name'),
(150, '__discount__', 'զեղչ', 'скидка', 'discount'),
(151, '__beginning__', 'սկիզբ', 'начало', 'beginning'),
(152, '__end__', 'վերջ', 'конец', 'end'),
(153, '__pending__', 'Սպասվող', 'В ожидании', 'Pending'),
(154, '__acting__', 'Գործող', 'Действующий', 'Acting'),
(155, '__go__back__', 'Վերադառնալ', 'Возвращаться', 'Go back'),
(156, '__want__to__delete__product__', 'Ցանկանու՞մ եք ջնջել նշված ապրանքները', 'Вы хотите удалить указанные продукты?', 'Do you want to delete the specified products?'),
(157, '__yes__', 'Այո', 'Да', 'Yes'),
(158, '__no__', 'Ոչ', 'Нет', 'No'),
(159, '__delete__the__template__', 'Ցանկանու՞մ եք ջնջել ձևանմուշը', 'Вы хотите удалить шаблон?', 'Do you want to delete the template?'),
(160, '__text__for__approval__', 'Ձևավորվել և մատակարարներին հաստատման է ուղարկվել', 'Создано и отправлено поставщикам на утверждение.', 'Created and sent to suppliers for approval'),
(161, '__order__details__', 'Պատվերի մանրամասներ', 'Детали заказа', 'Order details'),
(162, '__order__', 'Պատվեր', 'заказ', 'Order'),
(163, '__delivery__date__', 'Առաքման ամսաթիվ', 'Дата доставки', 'Delivery date'),
(164, '__pice__', 'ԳԻՆԸ', 'СТОИМОСТЬ', 'PRICE'),
(165, '__LENGTH__', 'ԵՐԿԱՐՈՒԹՅՈՒՆ', 'ДЛИНА', 'LENGTH'),
(166, '__WIDTH__', 'ԼԱՅՆՈՒԹՅՈՒՆ', 'ШИРИНА', 'WIDTH'),
(167, '__COUNT__', 'ՔԱՆԱԿ', 'КОЛИЧЕСТВО', 'count'),
(168, '__PIECE__', 'ՀԱՏ', 'ЧАСТИ', 'PIECE'),
(169, '__UNIT__OF__MEASUREMENT__', 'ԳՈՒՄԱՐԸ ԶԵՂՉՈՎ', 'СУММА СО СКИДКОЙ', 'BY UNIT OF MEASUREMENT'),
(170, '__AAH__', 'ԱԱՀ', 'НДС', 'AAH'),
(171, '__EXCISE__', 'ԱԿՑԻԶ', 'АКЦИЗ', 'EXCISE'),
(172, '__ENVIRONMENTAL__PROTECTION__', 'ԲՆԱՊԱՀՊ. ՎՃԱՐ', 'ЗАЩИТА ОКРУЖАЮЩЕЙ СРЕДЫ. ПЛАТЕЖ', 'ENVIRONMENTAL PROTECTION. FEE'),
(173, '__order__again__', 'Պատվիրել կրկին', 'Заказать еще раз', 'Order again'),
(174, '__no__comment__available__', 'Մեկբաբանություն առկա չէ', 'Нет комментариев', 'No comment available'),
(175, '__close__the__order', 'Փակել պատվերը', 'Закрыть заказ', 'Close the order'),
(176, '__confirm__change__', 'Հաստատել փոփոխությունը', 'Подтвердите изменение', 'Confirm the change'),
(177, '__sum__', 'Գումարը', 'Сумма', 'Sum'),
(178, '__sum__', 'Գումարը', 'Сумма', 'Sum'),
(179, '__sum__', 'Գումարը', 'Сумма', 'Sum'),
(180, '__my__list__', 'Իմ ցանկը', 'Мой список', 'My list'),
(181, '__received__orders__', 'Ստացված պատվերներ', 'Полученные заказы', 'Received orders'),
(182, '__received__applications__', 'Ստացված հայտեր', 'Получено заявок', 'Received applications'),
(183, '__with__changes__', 'փոփոխություններով', 'с изменениями', 'with changes'),
(184, '__provider__name__', 'Մատակարարի անվանում', 'Имя провайдера', 'Provider name'),
(185, '__information__about__', 'Կազմակերպության այլ տվյալներ', 'Прочие данные о компании', 'Other information about the organization'),
(186, '__note__to__inform__', 'Կատարել նշում տեղեկացնելու համար', 'Сделайте заметку, чтобы сообщить', 'Make a note to inform'),
(187, '__show__taxes__', 'Ցույց տալ հարկերը', 'Показать налоги', 'Show taxes'),
(188, '__dear__', 'Հարգելի', 'Уважаемый', 'Dear'),
(189, '__please__contact__us__text1__', 'Համակարգում որպես գնորդ գրանցվելու համար, խնդրում ենք, կապ հաստատել մեզ հետ', 'Для регистрации в качестве покупателя в системе свяжитесь с нами', 'To register as a buyer in the system, please contact us'),
(190, '__self__order__', 'Ինքնապատվեր', 'Самозаказ', 'Self-order'),
(191, '__register__as__supplier__', 'Համակարգում որպես մատակարար գրանցվելու համար անցեք հետևյալ հղումով', 'Для регистрации в качестве поставщика в системе перейдите по следующей ссылке', 'To register as a supplier in the system, go to the following link'),
(192, '__WELCOME1__', 'ԲԱՐԻ ԳԱԼՈՒՍՏ', 'ДОБРО ПОЖАЛОВАТЬ', 'WELCOME'),
(193, '__can__start__working__text1__', 'Համակարգի ադմինիստրատորի կողմից տվյալների հաստատումից անմիջապես հետո կարող եք սկսել աշխատել համակարգում', 'Вы можете начать работу в системе сразу после утверждения данных администратором системы.', 'You can start working in the system immediately after the data is approved by the system administrator'),
(194, '__back__', 'Հետ', 'Назад', 'Back'),
(195, '__reject__', 'Մերժել', 'Отклонять', 'Reject'),
(196, '__confirm__', 'Հաստատել', 'Подтверждать', 'Confirm'),
(197, '__note__order__', 'Նշում պատվերի վերաբերյալ', 'Примечание к заказу', 'Note on the order'),
(198, '__favorite__list__products__', 'Ապրանքների / ծառայությունների նախընտրած ցանկ', 'Список любимых товаров/услуг', 'Favorite list of products / services'),
(199, '__choose__categories__', 'Ընտրել կատեգորիաները', 'Выберите категории', 'Choose Categories'),
(200, '__electrical__engineering__', 'Էլեկտրատեխնիկա', 'Электротехника', 'Electrical engineering'),
(201, '__product__Name__', 'Ապրանքի անվանում', 'Название продукта', 'Product Name'),
(202, '__organization__Name__', 'Կազմակերպության անվանում', 'Название организации', 'Organization Name'),
(203, '__accepted__', 'Ընդունված', 'Принятый', 'Accepted'),
(204, '__current__day__', 'Ընթացիկ օր', 'Текущий день', 'Current day'),
(205, '__current__month__', 'Ընթացիկ ամիս', 'Текущий месяц', 'Current month'),
(206, '__become__partner__', 'Գործընկեր դառնալու հայտ', 'Запрос на партнерство', 'Request to become a partner'),
(207, '__unable__continue__', 'Հնարավոր չէ շարունակել, հայտը ուղարկված է', 'Невозможно продолжить, запрос отправлен', 'Unable to continue, request sent'),
(208, '__completed__', 'Ավարտված', 'Завершенный', 'Completed'),
(209, '__login__system__', 'Մուտք համակարգ', 'Система входа', 'Login system'),
(210, '__email__address__user__', 'Օգտագործողի Էլեկտրոնային հասցե', 'Адрес электронной почты пользователя', 'Email address of the user'),
(211, '__remember__me__', 'Հիշել ինձ', 'Запомнить меня', 'Remember me'),
(212, '__forgot__password__', 'Մոռացե՞լ եք գաղտնաբառը', 'Забыли пароль?', 'Forgot your password?'),
(213, '__enter__', 'Մուտք գործել', 'входить?', 'enter'),
(214, '__not__registered__yet__', 'Դուք դեռ գրանցված չե՞ք', 'Еще не зарегистрированы?', 'Not registered yet?'),
(215, '__register__', 'Գրանցվեք', 'Зарегистрироваться', 'Register'),
(216, '__register__organization__', 'Գրանցել կազմակերպությունը', 'Зарегистрировать организацию', 'Register the organization'),
(217, '__commerce__platform__is__text__', 'Սույն էլեկտրոնային առևտրային հարթակը հանդիսանում է', 'Эта платформа электронной коммерции', 'This e-commerce platform is'),
(218, '__commerce__platform__is__text__', 'Ինֆոէքսպերտի', 'Эта платформа электронной коммерции', 'Infoexpert'),
(219, '__commerce__platform__is__text2__', 'սեփականությունը և շահագործվում է վերջինիս կողմից', 'принадлежит и управляется последним', 'owned and operated by the latter'),
(220, '__two__must__be__selected__', 'Երկուսից մեկը պետք է ընտրված լինի', 'Необходимо выбрать один из двух', 'One of the two must be selected'),
(221, '__salesman__', 'Վաճառող', 'Продавец', 'Salesman'),
(222, '__must__contain__characters__8__', 'ՀՎՀՀ-ն պետք է պարունակի 8 նիշ', 'AVCHD должен содержать 8 символов.', 'AVCHD must contain 8 characters'),
(223, '__legal__address__matches__text1__', 'Նշել, եթե իրավաբանական հասցեն համընկնում է գործունեության հասցեի հետ', 'Укажите, соответствует ли юридический адрес служебному адресу', 'Specify if the legal address matches the business address'),
(224, '__email__address__incorrect__', 'էլ. հասցեն սխալ է մուտքագրված', 'электронная почта Адрес введен неверно', 'email The address was entered incorrectly'),
(225, '__phone__incorrect__', 'Հեռախոսահամարը սխալ է մուտքագրված', 'Номер телефона введен неверно', 'The phone number was entered incorrectly'),
(226, '__password__incorrect__1__', 'Գաղտնաբառը պետք է պարունակի առնվազն 8 նիշ, 1 մեծատառ, 1 փոքրատառ, 1 թիվ և 1 սիմվոլ', 'Пароль должен содержать не менее 8 символов, 1 заглавную букву, 1 строчную букву, 1 цифру и 1 символ.', 'Password must contain at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number and 1 symbol'),
(227, '__password__vary__', 'Գաղտնաբառերը տարբերվում են', 'Пароли различаются', 'Passwords vary'),
(228, '__repeat__password__', 'Կրկնել գաղտնաբառը', 'Повторите пароль', 'Repeat password'),
(229, '__i__accept__', 'Ընդունում եմ', 'Я принимаю', 'I accept'),
(230, '__i__accept__', 'Ընդունում եմ', 'Я принимаю', 'I accept'),
(231, '__privacy__policy__', 'Գաղտնիության քաղաքականության', 'политика конфиденциальности', 'Privacy Policy'),
(232, '__terms__of__service__', 'Ծառայությունների մատուցման պայմանները', 'Условия использования', 'Terms of service'),
(233, '__you__must__accept__text1__', 'Անհրաժեշտ է ընդունել Գաղտնիության քաղաքականությունը և ծառայությունների մատուցման պայմանները', 'Вы должны принять Политику конфиденциальности и Условия обслуживания.', 'You must accept the Privacy Policy and Terms of Service'),
(234, '__already__registered__', 'Արդեն գրանցվե ՞լ եք', 'Уже зарегистрирован?', 'Already registered?'),
(235, '__no__bids__text2', 'Գնորդ կազմակերպություններից ստացված հայտեր չկան։', 'Предложений от организаций-покупателей не поступало.', 'There are no bids received from buyer organizations.'),
(236, '__application__is__accepted__', 'Հայտն ընդունված է', 'Заявка принята', 'The application is accepted'),
(237, '__application__is__rejected__', 'Հայտն մերժված է', 'Заявка отклонена', 'The application has been rejected'),
(238, '__modifying__template__', 'Ձևանմուշի փոփոխում', 'Изменение шаблона', 'Modifying a template'),
(239, '__create__basket__', 'Ձևավորել զամբյուղ', 'Создать корзину', 'Create a basket'),
(240, '__more__details__', 'Մանրամասն', 'Подробнее', 'More details'),
(241, '__save__changes__', 'Պահպանել փոփոխությունները', 'Сохранить изменения', 'Save changes'),
(242, '__modify__the__template?__', 'Ցանկանու՞մ եք փոփոխել ձևանմուշը', 'Хотите изменить шаблон?', 'Do you want to modify the template?'),
(243, '__account__not__verified__yet__', 'Օգտահաշիվը դեռ հաստատված չէ', 'Аккаунт еще не подтвержден', 'Account has not been verified yet'),
(244, '__become__supplier__', 'Դառնալ մատակարար', 'Стать поставщиком', 'Become a supplier'),
(245, '__password__has__been__successfully__changed__', 'Հարգելի օգտատեր ձեր գաղտնաբառը հաջողությամբ փոփոխված է', 'Уважаемый пользователь, ваш пароль успешно изменен', 'Dear user, your password has been successfully changed'),
(246, '__select__categories__', 'Ընտրել կատեգորիաները', 'Выберите категории', 'Select categories'),
(247, '__suspend__', 'Կասեցնել', 'Приостановить', 'Suspend'),
(248, '__no__preferred__products__', 'Նախընտրած ապրանքներ չկան', 'Нет предпочтительных продуктов', 'There are no preferred products'),
(249, '__formed__', 'Ձևավորվեց', 'Формируется', 'Formed'),
(250, '__formed__', 'Ձևավորվեց', 'Формируется', 'Formed'),
(251, '__not__include__taxes__', 'Գինը չի ներառում հարկերը', 'Цена не включает налоги', 'Price does not include taxes'),
(252, '__to__register__', 'Գրանցվել', 'зарегистрироваться', 'sign up'),
(253, '__shop__', 'Խանութ', 'Магазин', 'Shop'),
(254, '__brands__', 'Բրենդներ', 'Бренды', 'Brands'),
(255, '__news__', 'Նորություններ', 'Новости', 'News'),
(256, '__contact__', 'Կապ', 'Контакт', 'Contact'),
(257, '__my__account__', 'Իմ հաշիվը', 'Мой счет', 'My account'),
(258, '__view__all__', 'Դիտել բոլորը', 'Посмотреть все', 'View all');

-- --------------------------------------------------------

--
-- Table structure for table `fs_users`
--

CREATE TABLE `fs_users` (
  `id` int(11) NOT NULL,
  `is_buyer` int(11) DEFAULT NULL,
  `is_seller` int(11) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `company_hvhh` varchar(255) DEFAULT NULL,
  `legal_name` varchar(255) DEFAULT NULL,
  `holding_hvhh` varchar(255) DEFAULT NULL,
  `holding_legal_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `legal_address` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `company_description` text DEFAULT NULL,
  `verified` int(11) DEFAULT 0,
  `notify` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `order_num` int(11) DEFAULT 0,
  `active_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_users`
--

INSERT INTO `fs_users` (`id`, `is_buyer`, `is_seller`, `auth_key`, `company_hvhh`, `legal_name`, `holding_hvhh`, `holding_legal_name`, `name`, `legal_address`, `address`, `email`, `phone`, `password`, `categories`, `image`, `link`, `company_description`, `verified`, `notify`, `created_at`, `order_num`, `active_date`, `status`) VALUES
(53, NULL, NULL, NULL, '08252998', 'Կոդվեյվ ՍՊԸ', '', '', 'Տիգրան Գագիկի Աբրահամյան', 'Սասնա ծռեր 2/2', 'Սասնա ծռեր 2/2', 'info@codewave.am', '+37491090907', '$2y$13$g4GQbS0.NlXaRCmBHjGY9.BQnjzdxIXfygKAU6//ToXjpapbiA7aG', NULL, NULL, '', NULL, 0, 1, '2023-11-06 13:59:25', 0, '2023-11-09 17:58:00', 1),
(38, 0, 1, NULL, '00000007', 'Արթուր Թեստ', '00000008', 'Արթուր Թեստ', 'Արթուր Թեստ', 'Հայաստան, 0088, Երևան Աշտարակի խճուղի, 2ա', 'Հայաստան, 0088, Երևան Աշտարակի խճուղի, 2ա', 'proshyan@mail.ru', '+37401177779', '$2y$13$.7fer6K8SW8zMTqAnXlqVurmwxWHwe5JPap7cX26ozYa7MFWQgRWW', '12;238', 'web/uploads/users/1695044009logo.png', 'https://proshyan.am', 'Արթուր Թեստ', 1, 1, '2023-09-18 13:33:29', 8, '2024-10-15 17:33:00', 1),
(37, 0, 1, NULL, '00000003', 'Ararat', '00000004', 'Ararat', 'Ararat', 'Վայր, որտեղ ծնվում են լեգենդար ARARAT կոնյակները:', 'Վայր, որտեղ ծնվում են լեգենդար ARARAT կոնյակները:', 'ararat@mail.ru', '098888887', '$2y$13$K3JmdxmeinQ./cmNNVM1l.QU58Q6d14loxxTZDt.hcajpQGu03XtK', '12;', 'web/uploads/users/areon-logo.png', 'https://am.araratbrandy.com/', '<div class=\"video__content\">\n    <div class=\"caption-text\">\n      <div class=\"caption-text__caption\" style=\"opacity: 1; position: relative; top: 100px; transform: translate(0px, -100px);\">Երևանի Կոնյակի Գործարան</div>\n      <div class=\"caption-text__text\" style=\"opacity: 1; position: relative; top: 100px; transform: translate(0px, -100px);\"><p>Վայր, որտեղ ծնվում են լեգենդար ARARAT կոնյակները: Հայաստանի կոնյակագործության յուրահատուկ համալիրն ու գլխավոր կենտրոնը:</p>\n</div>\n  \n</div>\n\n  </div>', 1, 1, '2023-09-18 12:59:28', 9, '2024-10-18 16:59:00', 1),
(36, 0, 1, NULL, '00000001', 'ԼՅՈՒՏԻԿ', '00000002', 'ԼՅՈՒՏԻԿ', 'Եղիազար Գաբուզյան', 'Գետառի փող., շենք 4/15, Կենտրոն, ք. Երևան, Հայաստան, 0023', 'Գետառի փող., շենք 4/15, Կենտրոն, ք. Երևան, Հայաստան, 0023', 'lutik@mail.ru', '091415912', '$2y$13$T5ft6q1gaPivul/FvjrV5uryxJ6xAulvCm8ccksq606yGTvMy3Uy2', '12;', 'web/uploads/users/areon-logo.png', 'www.lutik.ru', 'Թե ցանկանում ես գոհացնել ամենաբծախնդիր մարդկանց՝ օգտագործի’ր Lutik-ի պահածոյացված սնկերը քո բոլոր ուտեստներում, իրենք այդ համը երբեք չեն մոռանա:', 1, 1, '2023-09-18 12:35:11', 5, '2024-09-18 16:53:00', 1),
(40, 0, 1, NULL, '00000012', '«ԹԱՄԱՐԱ ԵՎ ԱՆԻ» ՍՊԸ', '00000013', 'ANI PRODUCT', 'Անի', 'ՀՀ Երևան, Դավիթաշեն 3-րդ թաղամաս 10/9:', 'ՀՀ Երևան, Դավիթաշեն 3-րդ թաղամաս 10/9:', 'info@ani.am', '060449449', '$2y$13$ftlKur/jZzuzKVpmcpgy7.sUcF8H3QtqOkdJLrE/dviwkXudyAMWG', '12;', 'web/uploads/users/areon-logo.png', 'https://www.ani.am/', '«ANI PRODUCT» ընկերությունը հիմնադրվել է 2003թ․ Մկրտչյան ընտանիքի կողմից՝  նպատակ ունենալով կաթնամթերքի հայրենական շուկայում նոր խոսք ասել և նոր որակի արտադրանք առաջարկել։ Ու թեև ընկերությունն ուներ միայն փոքր արտադրամաս՝ իր առջև դրել էր բիզնես-երազանք` զարգանալ և խոշոր արտադրություն ունենալ։ Շուրջ վեց տարվա հետևողական աշխատանքի շնորհիվ հնարավոր եղավ մասշտաբային ներդրումներ կատարել։ Եվ արդեն 2009թ․ կառուցվեց նոր, միջազգային բոլոր չափորոշիչներին համապատասխան գործարան, ձեռք բերվեցին նորագույն տեխնոլոգիաներ, սարքավորումներ և հոսքագծեր։ Կարևորելով բնական ու բարձրորակ հումքը՝ ընկերությունը երկարաժամկետ պայմանագրեր կնքեց բարձր լեռնային գոտիներում գտնվող ֆերմաների հետ, որպեսզի նրանք ապահովեն անարատ կաթի հումքը: Բարձրակարգ արտադրանք ունենալու համար «ANI PRODUCT»-ի ղեկավարությունն իր շուրջ համախմբեց նաև ոլորտի առաջատար մասնագետներին։ Թիմը համալրվեց բարձր որակավորում ունեցող և արտասահմանում կրթություն ստացած լավագույն մասնագետներով, ինչը թույլ տվեց գործարանին քայլել ժամանակին և գիտությանը համընթաց: Հետևողական ու նպատակասլաց աշխատանքը շատ կարճ ժամանակում երազանքը դարձրեց իրականություն. «ANI PRODUCT»-ն իր ուրույն տեղը զբաղեցրեց շուկայում։ Տարեցտարի ընդլայնելով արտադրությունը՝ ընկերությունը բացեց նաև պաղպաղակի, զովացուցիչ ըմպելիքների և ջրի արտադրամասեր։ Այսօր «ANI PRODUCT» ընկերությունն իր հավատարիմ սպառողներին առաջարկում է բարձրորակ կաթ, մածուն, թթվասեր, կաթնաշոռ, քաղցրաշոռ, պաղպաղակ, մրգային համերով տարատեսակ զովացուցիչ ըմպելիքներ և աղբյուրի ջուր։ ', 1, 1, '2023-09-18 13:47:40', 7, '2024-10-18 17:47:00', 1),
(41, 0, 1, NULL, '00000020', 'ԳՐԱՆԴ ՏՈԲԱԿՈ', '00000021', 'ԳՐԱՆԴ ՏՈԲԱԿՈ', 'Սամվել Սահակյան', 'Հայաստան, 0061, Երևան Հրանտ Վարդանյան փող., 22 շենք', 'Հայաստան, 0061, Երևան Հրանտ Վարդանյան փող., 22 շենք', 'tobacco@mail.ru', '010491213', '$2y$13$LvOabMfKPooagQuuPI1NAOMV87nD9Z5jh44nUbELHNwyA9y7CtkW2', '10;', 'web/uploads/users/1701959029ORIS-LOGO-1024x785.webp', 'http://www.grandtobacco.am', NULL, 1, 1, '2023-09-18 14:18:33', 6, '2024-06-20 18:18:00', 1),
(42, 1, NULL, NULL, '00000088', 'SAS GROUP', '00000099', 'SAS GROUP', 'GOR ABRAHAMYAN', 'SARYAN 24', 'SARYAN 24', 'sas@mail.ru', '+37495651656', '$2y$13$Lh3Z75.4HK51cBxGvOaGJOgt44k522KTXczOwiPpy6qKAbxgHlrYe', '12;198;', 'web/uploads/users/16950603853ec48d49.png', '', '', 1, 1, '2023-09-18 18:03:38', 2, '2024-11-19 22:06:00', 1),
(43, 1, NULL, NULL, '00000022', 'Լիանա ԱՁ', '', '', 'Լիանա Ա', 'ք Երևան', 'ք Երևան', 'averisyanliana@infoexpert.am', '+37455903288', '$2y$13$aZiIowI/5usBpCkwclOXge3ZiHX4.tuck0k8l.UzRSUpl.8FIvgr.', '12;', NULL, '', NULL, 1, 1, '2023-09-26 16:34:57', 3, '2023-09-30 20:41:00', 1),
(45, 0, 1, NULL, '00000888', 'Ժորա ՍՊԸ', '', '', 'Գրիգորյան Ժորա', 'Լենինգրադյան 48/4', 'Լենինգրադյան 48/4', 'zhoragrigoryan27@gmail.com', '+37495207500', '$2y$13$IrvuBX.9JLo8ec108ijE4uA8NP5TN05UK1cZW3gcGtveJc7tVuphC', '12;', 'web/uploads/users/0000000000000.webp', '', '', 1, 1, '2023-09-26 16:36:54', 1, '2023-09-30 20:40:00', 1),
(46, 0, 1, NULL, '12345678', 'expert1', '', '', 'ԴԱՎԻԹ Ավետիսյան', 'Հրաչյա Քոչար 13/4', 'Հրաչյա Քոչար 13/4', 'devfin@mail.ru', '+37455735064', '$2y$13$IwapZeDwHcNoF/5L4DgY2uxxEp4TNuEueXo7Nzlgh9z7J8.vctl7i', '198;12;', 'web/uploads/users/areon-logo.png', '', '', 1, 1, '2023-10-09 09:35:20', 2, '2023-10-31 13:36:00', 1),
(47, 1, NULL, NULL, '09876543', 'Գրիշա ԱՁ', '', '', 'Գրիշա Մանուկյան ', 'Րաֆֆի 44', 'Րաֆֆի 44', 'expert1arm@gmail.com', '+37455735066', '$2y$13$PKOoYHM7ueHsG6kStW/kKeAMzt0woL08GD3Fgrg.xVqdsIM8yEtKS', '198;12;', NULL, '', '', 1, 1, '2023-10-19 11:56:36', 5, '2023-10-31 16:01:00', 1),
(48, 1, NULL, NULL, '99998888', 'Ծիածան ՍՊԸ', '', '', 'Ավետյան Ծիածան', 'ք Երևան, Ավետիսյան փողոց', 'ք Երևան, Ավետիսյան փողոց', 'aaa@aa.com', '+37455121212', '$2y$13$Y1zZ7iazsd3MgvXUWJ/W6OvHrNVMpaJd.jaZncVhQUy1rFO5wEqiG', '198;', NULL, NULL, NULL, 0, 1, '2023-11-01 18:53:28', 6, NULL, 1),
(49, 1, 1, NULL, '98969876', 'KFC ՍՊԸ', '', '', 'Դիանա Զիմենկո Անդրեի', 'Առնո Բաբաջանյան 18/18', 'Առնո Բաբաջանյան 18/18', 'deezimenko@gmail.com', '+37498969876', '$2y$13$/9cCW8S8DYH6meXFo1tFeuxS2z.YhjwXkaviMnZKm4e3d5t5iI5SW', '12;198;', 'web/uploads/users/1701959029ORIS-LOGO-1024x785.webp', '', NULL, 1, 1, '2023-11-01 18:58:28', 3, '2024-03-12 17:39:00', 1),
(52, 1, 0, NULL, '08252998', 'Կոդվեյվ ՍՊԸ', '', '', 'Տիգրան Գագիկի Աբրահամյան', 'Սասնա ծռեր 2/2', 'Սասնա ծռեր 2/2', 'info@codewave.am', '+37491090907', '$2y$13$OVMBjXir5J02ZXEDQtgObeSwG38Ct.3/tMgzuyGoo6Bk03O00P0qO', '12;198;', 'web/uploads/users/1699279305FullLogo_Transparent.png', 'codewave.am', 'Ընկերությունը զբաղվում է ծրագրային ապահովման մշակմամբ։', 1, 1, '2023-11-06 13:56:27', 1, '2023-11-09 17:58:00', 1),
(39, 0, 1, NULL, '00000010', 'Marianna', '00000011', 'Marianna', 'Արման թաթոյան', 'Haghtanak 6 str, Erevan, Armenia, 0081', 'Haghtanak 6 str, Erevan, Armenia, 0081', '', ' (010) 731262', '$2y$13$1rJhUHoPv8Pbh1HDQ0Kg.ORDN2sfxuYANgIboAKYv9cAcCxblLTv6', '12;', 'web/uploads/users/0000000000000.webp', 'https://mariannadairy.com/', 'Կաթնամթերքի հայաստանյան շուկայում իր ուրույն տեղը զբաղեցնող «Դուստր Մարիաննա» ՍՊԸ-ն հիմնադրվել է 1997 թ.-ին Տիգրան Վարդանյանի կողմից:\n\nՇարունակաբար կատարվող ներդրումների, արտադրական գոծընթացների կատարելագործման և միջոցների արդյունավետ բաշխման շնորհիվ «Դուստր Մարիաննա» ընկերության արտադրանքն առանձնանում է որակական բարձր ցուցանիշներով՝ դառնալով ցանկալի և օգտակար մթերք Ձեր և Ձեր ընտանիքի համար:\n\n«Դուստր Մարիաննա» ընկերությունը, ընդլայնելով իր գործունեությունը, ձգտում է պահպանել բարձր և կայուն որակի արտադրանք՝ արժանանալով սպառողների բարձր գնահատականին: Դա հաստատվում է ընկերության կողմից ստացած բազմաթիվ պարգևների շնորհիվ:', 1, 1, '2023-09-18 13:42:41', 4, '2024-11-20 17:48:00', 1),
(67, 1, NULL, NULL, '84768966', 'Մերի', '78967798', 'Լեո 70', 'Մերի Մարտիրոսյան Արմենի', 'Լեո 70', 'Լեո 70', 'merimartirosyan246@gmail.com', '+37499998441', '$2y$13$JX2Q69V0RFRVs4lz7r2x7O7d5G0RTe.NBAqyLrCm3YK7IpSUXioDe', '12;', 'web/uploads/users/1702024030asdf.webp', '', NULL, 0, 1, '2023-11-10 16:41:37', 0, NULL, 1),
(77, 1, NULL, NULL, '12344567', '123', '52412891', '541065', '41', '1', '1', 'hhtfgdsa@maiol.rtuy', '+37485555555', '$2y$13$rvMFTOs1Pir4EqVkSowE8ueG7FUJwigU9O1TIIho17Km82tHmG7a2', '12;', NULL, NULL, NULL, 0, 1, '2023-11-29 14:42:12', 0, NULL, 1),
(78, 1, NULL, NULL, '85555555', '555555', '55555555', '555555555', '5555555', '5555555', '555555555', 'asdf@adfa.afd', '+37499999999', '$2y$13$1ePosG./fWpYz/6wyUM5v.J88d/7XsKhYzhGqgZQ4MArLoKToQwr2', '12;', NULL, NULL, NULL, 0, 1, '2023-11-29 14:54:39', 0, NULL, 1),
(79, 1, NULL, NULL, '50000088', '88888888888888888888', '88888888', '888888888888', '888888888888', '88888888888888888888', '88888888888888888888', 'as888888888888@mau.rw', '+37466666666', '$2y$13$LL2UfsHai6BfYWle58FbKOa5K4hgVMSr1RbdKAM9xTB.EE2b.jSZy', '12;', NULL, NULL, NULL, 0, 1, '2023-12-08 08:57:19', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fs_user_to_brand`
--

CREATE TABLE `fs_user_to_brand` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fs_user_to_category`
--

CREATE TABLE `fs_user_to_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fs_view_history`
--

CREATE TABLE `fs_view_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fs_view_history`
--

INSERT INTO `fs_view_history` (`id`, `user_id`, `product_id`, `ip`) VALUES
(1, NULL, 1, '87.241.132.38'),
(2, NULL, 2, '87.241.132.38'),
(3, NULL, 4, '87.241.132.38'),
(4, NULL, 11, '87.241.132.38'),
(5, NULL, 5, '87.241.132.38'),
(6, NULL, 9, '87.241.132.38'),
(7, NULL, 8, '87.241.132.38'),
(8, NULL, 10, '87.241.132.38'),
(9, NULL, 7, '87.241.132.38'),
(10, NULL, 1, '46.36.114.243'),
(11, NULL, 10, '46.36.114.243'),
(12, NULL, 9, '46.36.114.243'),
(13, NULL, 8, '46.36.114.243'),
(14, NULL, 12, '37.186.117.119'),
(15, 43, 13, '37.186.117.119'),
(16, NULL, 13, '46.36.112.248'),
(17, NULL, 13, '78.109.78.234'),
(18, NULL, 2, '212.34.255.110'),
(19, NULL, 13, '46.36.115.36'),
(20, NULL, 6, '87.241.132.38'),
(21, 46, 17, '37.252.86.187'),
(22, 46, 19, '37.252.86.187'),
(23, 46, 20, '37.252.86.187'),
(24, 46, 14, '37.252.86.187'),
(25, 46, 11, '37.252.86.187'),
(26, 46, 8, '37.252.86.187'),
(27, 46, 13, '37.252.86.187'),
(28, NULL, 11, '78.109.78.73'),
(29, NULL, 13, '78.109.78.73'),
(30, 47, 18, '46.36.114.17'),
(31, 47, 16, '46.36.114.17'),
(32, 47, 20, '46.36.114.17'),
(33, 47, 17, '46.36.114.17'),
(34, NULL, 13, '46.36.119.65'),
(35, 46, 5, '141.136.90.147'),
(36, 46, 6, '141.136.90.147'),
(37, 46, 12, '141.136.90.147'),
(38, 46, 21, '141.136.90.147'),
(39, 47, 8, '141.136.90.147'),
(40, NULL, 5, '46.36.117.110'),
(41, NULL, 18, '87.241.132.38'),
(42, 49, 21, '91.103.248.26'),
(43, 49, 6, '91.103.248.26'),
(44, NULL, 1, '91.103.248.26'),
(45, NULL, 12, '87.241.132.38'),
(46, 52, 21, '87.241.132.38'),
(47, NULL, 21, '87.241.173.31'),
(48, NULL, 6, '46.36.113.176'),
(49, NULL, 22, '46.36.113.176'),
(50, NULL, 3, '46.36.113.176'),
(51, NULL, 13, '127.0.0.1'),
(52, 38, 12, '127.0.0.1'),
(53, 38, 22, '127.0.0.1'),
(54, 38, 10, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `fs_wishlist`
--

CREATE TABLE `fs_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fs_wishlist`
--

INSERT INTO `fs_wishlist` (`id`, `user_id`, `product_id`, `provider_id`) VALUES
(1, 49, 14, 46),
(2, 49, 15, 46),
(3, 49, 16, 46),
(4, 49, 5, 39),
(5, 49, 6, 39),
(6, 49, 7, 39),
(7, 49, 8, 38),
(8, 55, 21, 46),
(9, 55, 13, 45),
(13, 55, 9, 38),
(14, 55, 8, 38),
(15, 55, 7, 39),
(16, 55, 6, 39),
(17, 55, 5, 39);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `address`, `location`, `number`) VALUES
(4, 'SAS', 'hanrapetucyan hrarak', '40.177633, 44.512630', '1252000'),
(5, 'CITY', 'Մաշտոցի պողոտա', '40.187244, 44.515181', '1252000'),
(6, 'mg', 'Կորյունի փողոց', '40.188086, 44.524094', '12345'),
(7, 'SAS', 'hanrapetucyan hrarak', '40.177633, 44.512630', 'hyjukil'),
(8, 'CIRANI', 'Մաշտոցի պողոտա', '40.177633, 44.512630', '1234'),
(9, 'CIRANI', 'tyugihojo', '40.177633, 44.512630', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `role` int(10) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `last_login`, `role`, `company_id`) VALUES
(6, 'admin', 'W-ok0XUWjPdEtilBf96gB2X5UkOcedeO', '$2y$13$o08m/FAvSHERmaall09T6e4/UIBO5sAV/lb5OLiIgILEXBRT9Ajsi', NULL, 'gor@mail.ru', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-04-28 16:17:56', 10, NULL),
(83, 'gor', '$2y$13$/Q/wzFkI95siiSVrtcFi0OP', '$2y$13$/Q/wzFkI95siiSVrtcFi0OPkmKmlxasmQsDkbm9bsL92i9CBCQm0C', NULL, 'gor.abrahamyan1993@gmail.com', 1, '2023-05-08 16:25:36', '2023-05-08 16:25:36', '2023-05-08 12:25:36', 20, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_product`
--
ALTER TABLE `ad_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_product_img`
--
ALTER TABLE `ad_product_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_banners`
--
ALTER TABLE `fs_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_blogs`
--
ALTER TABLE `fs_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_brands`
--
ALTER TABLE `fs_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_brand_to_category`
--
ALTER TABLE `fs_brand_to_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_cart`
--
ALTER TABLE `fs_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_categories`
--
ALTER TABLE `fs_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_categories_lang`
--
ALTER TABLE `fs_categories_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `fs_discounts`
--
ALTER TABLE `fs_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_discount_assortment`
--
ALTER TABLE `fs_discount_assortment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_discount_conditions`
--
ALTER TABLE `fs_discount_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_discount_condition_assortment`
--
ALTER TABLE `fs_discount_condition_assortment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_discount_groups`
--
ALTER TABLE `fs_discount_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_discount_partners`
--
ALTER TABLE `fs_discount_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_langs`
--
ALTER TABLE `fs_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_measurements`
--
ALTER TABLE `fs_measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_notifications`
--
ALTER TABLE `fs_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_orders`
--
ALTER TABLE `fs_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_pages`
--
ALTER TABLE `fs_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_params`
--
ALTER TABLE `fs_params`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_param_to_category`
--
ALTER TABLE `fs_param_to_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_products`
--
ALTER TABLE `fs_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_product_params`
--
ALTER TABLE `fs_product_params`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_product_variations`
--
ALTER TABLE `fs_product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_requests`
--
ALTER TABLE `fs_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_settings`
--
ALTER TABLE `fs_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_stores`
--
ALTER TABLE `fs_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_templates`
--
ALTER TABLE `fs_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_texts`
--
ALTER TABLE `fs_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_users`
--
ALTER TABLE `fs_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_user_to_brand`
--
ALTER TABLE `fs_user_to_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_user_to_category`
--
ALTER TABLE `fs_user_to_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_view_history`
--
ALTER TABLE `fs_view_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs_wishlist`
--
ALTER TABLE `fs_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `passwordResetToken` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_product`
--
ALTER TABLE `ad_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ad_product_img`
--
ALTER TABLE `ad_product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fs_banners`
--
ALTER TABLE `fs_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fs_blogs`
--
ALTER TABLE `fs_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fs_brands`
--
ALTER TABLE `fs_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fs_brand_to_category`
--
ALTER TABLE `fs_brand_to_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `fs_cart`
--
ALTER TABLE `fs_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `fs_categories`
--
ALTER TABLE `fs_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `fs_categories_lang`
--
ALTER TABLE `fs_categories_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `fs_discounts`
--
ALTER TABLE `fs_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fs_discount_assortment`
--
ALTER TABLE `fs_discount_assortment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fs_discount_conditions`
--
ALTER TABLE `fs_discount_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fs_discount_condition_assortment`
--
ALTER TABLE `fs_discount_condition_assortment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fs_discount_groups`
--
ALTER TABLE `fs_discount_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fs_discount_partners`
--
ALTER TABLE `fs_discount_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fs_langs`
--
ALTER TABLE `fs_langs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fs_measurements`
--
ALTER TABLE `fs_measurements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fs_notifications`
--
ALTER TABLE `fs_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `fs_orders`
--
ALTER TABLE `fs_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `fs_pages`
--
ALTER TABLE `fs_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fs_params`
--
ALTER TABLE `fs_params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `fs_param_to_category`
--
ALTER TABLE `fs_param_to_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fs_products`
--
ALTER TABLE `fs_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fs_product_params`
--
ALTER TABLE `fs_product_params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `fs_product_variations`
--
ALTER TABLE `fs_product_variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fs_requests`
--
ALTER TABLE `fs_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `fs_settings`
--
ALTER TABLE `fs_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fs_stores`
--
ALTER TABLE `fs_stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fs_templates`
--
ALTER TABLE `fs_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fs_texts`
--
ALTER TABLE `fs_texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `fs_users`
--
ALTER TABLE `fs_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `fs_user_to_brand`
--
ALTER TABLE `fs_user_to_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fs_user_to_category`
--
ALTER TABLE `fs_user_to_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fs_view_history`
--
ALTER TABLE `fs_view_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `fs_wishlist`
--
ALTER TABLE `fs_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fs_categories_lang`
--
ALTER TABLE `fs_categories_lang`
  ADD CONSTRAINT `fs_categories_lang_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `fs_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
