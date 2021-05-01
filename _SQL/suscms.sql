-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 02:59 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suscms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `uid` int(11) NOT NULL,
  `insight_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_uid_foreign` (`uid`),
  KEY `comments_insight_id_foreign` (`insight_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `description`, `created_at`, `updated_at`, `status`, `uid`, `insight_id`) VALUES
(17, 2, 'good one', '2019-04-06 07:33:30', '2019-04-06 07:33:30', 1, 2, 9),
(16, 2, 'you go mother fucker', '2019-04-06 07:29:54', '2019-04-06 07:29:54', 0, 2, 8),
(15, 2, 'very much informative', '2019-04-06 07:23:11', '2019-04-06 07:23:11', 1, 2, 7),
(35, 3, 'this suggestion is not appropriate . I do not recommend this set of information.', '2019-04-10 22:01:39', '2019-04-10 22:01:39', 0, 8, 28),
(36, 4, 'kgf is a very good movie. Its speaks a lot about courage, strength,will power and so on... where as zero is no where near the kgf.  I do not recommend this movie.', '2019-04-10 22:05:18', '2019-04-10 22:05:18', 1, 8, 29);

-- --------------------------------------------------------

--
-- Table structure for table `insights`
--

DROP TABLE IF EXISTS `insights`;
CREATE TABLE IF NOT EXISTS `insights` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `abuse_type` tinyint(4) NOT NULL,
  `abuse_tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bored` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `happy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excited` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sentiment_type` tinyint(4) NOT NULL,
  `positive` double NOT NULL,
  `negative` double NOT NULL,
  `neutral` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insights`
--

INSERT INTO `insights` (`id`, `abuse_type`, `abuse_tags`, `bored`, `sad`, `angry`, `happy`, `fear`, `excited`, `sentiment_type`, `positive`, `negative`, `neutral`, `created_at`, `updated_at`) VALUES
(1, 1, '', '0.0287337904', '0.1668297547', '0.100818058', '0.1182384842', '0.2640687305', '0.3213111821', 1, 0.578, 0.189, 0.234, '2019-04-05 14:27:59', '2019-04-05 14:27:59'),
(2, 1, '', '0.1318742932', '0.2292795687', '0.2673258862', '0.0987307404', '0.1688603682', '0.1039291435', 2, 0.115, 0.718, 0.168, '2019-04-05 14:29:03', '2019-04-05 14:29:03'),
(3, 1, '', '0.0542590926', '0.1919454911', '0.2577451447', '0.1192305803', '0.1646678011', '0.2121518902', 0, 0.131, 0.638, 0.231, '2019-04-05 23:11:24', '2019-04-05 23:11:24'),
(7, 1, '', '0.0704861591', '0.060312156', '0.1011846978', '0.4110886059', '0.1213058008', '0.2356225803', 1, 0.971, 0.005, 0.024, '2019-04-06 07:23:11', '2019-04-06 07:23:11'),
(8, 0, 'offensive,hatespeech', '0.0265344749', '0.0269552094', '0.4628605706', '0.1776705064', '0.0512686079', '0.2547106307', 1, 0.458, 0.33, 0.212, '2019-04-06 07:29:54', '2019-04-06 07:29:54'),
(9, 1, '', '0.1322998223', '0.0876738351', '0.1459457887', '0.3821030955', '0.1044717099', '0.1475057485', 1, 0.988, 0.001, 0.011, '2019-04-06 07:33:30', '2019-04-06 07:33:30'),
(10, 1, '', '0.0959164089', '0.1060961795', '0.0395178611', '0.4182929446', '0.2196772657', '0.1204993402', 2, 0.33, 0.106, 0.564, '2019-04-06 08:06:54', '2019-04-06 08:06:54'),
(11, 0, 'hatespeech,offensive', '0.2342232982', '0.0202947178', '0.5449683511', '0.1019852445', '0.0359674096', '0.0625609787', 0, 0.153, 0.709, 0.138, '2019-04-06 10:38:09', '2019-04-06 10:38:09'),
(12, 0, 'hatespeech,offensive', '0.2342232982', '0.0202947178', '0.5449683511', '0.1019852445', '0.0359674096', '0.0625609787', 0, 0.153, 0.709, 0.138, '2019-04-06 10:40:32', '2019-04-06 10:40:32'),
(13, 0, 'hatespeech,offensive', '0.2342232982', '0.0202947178', '0.5449683511', '0.1019852445', '0.0359674096', '0.0625609787', 0, 0.153, 0.709, 0.138, '2019-04-06 10:40:51', '2019-04-06 10:40:51'),
(14, 0, 'hatespeech,offensive', '0.2342232982', '0.0202947178', '0.5449683511', '0.1019852445', '0.0359674096', '0.0625609787', 0, 0.153, 0.709, 0.138, '2019-04-06 10:41:02', '2019-04-06 10:41:02'),
(15, 1, '', '0.2382102655', '0.1541510741', '0.3656758422', '0.0600896311', '0.134644115', '0.047229072', 0, 0.126, 0.776, 0.098, '2019-04-07 12:12:15', '2019-04-07 12:12:15'),
(16, 1, '', '0.2382102655', '0.1541510741', '0.3656758422', '0.0600896311', '0.134644115', '0.047229072', 0, 0.126, 0.776, 0.098, '2019-04-07 12:12:39', '2019-04-07 12:12:39'),
(17, 1, '', '0.1322998223', '0.0876738351', '0.1459457887', '0.3821030955', '0.1044717099', '0.1475057485', 1, 0.988, 0.001, 0.011, '2019-04-07 12:13:21', '2019-04-07 12:13:21'),
(18, 1, '', '0', '0.0516219203', '0.1125944335', '0.481845261', '0.0773100031', '0.2766283821', 1, 0.985, 0.01, 0.004, '2019-04-07 22:31:34', '2019-04-07 22:31:34'),
(19, 1, '', '0.0985443118', '0.3301613061', '0.3188799302', '0.0050640227', '0.2232416869', '0.0241087424', 0, 0.007, 0.989, 0.003, '2019-04-07 23:50:39', '2019-04-07 23:50:39'),
(20, 0, 'hatespeech,offensive', '0.1249696067', '0.023455992', '0.666707327', '0.0896607305', '0.0337450141', '0.0614613295', 0, 0.048, 0.906, 0.046, '2019-04-08 12:27:55', '2019-04-08 12:27:55'),
(21, 0, 'offensive,hatespeech', '0.1694542421', '0.1370943568', '0.1536208867', '0.2289203247', '0.1207826763', '0.1901275134', 1, 0.55, 0.206, 0.245, '2019-04-08 12:29:02', '2019-04-08 12:29:02'),
(22, 0, 'offensive,hatespeech', '0.0210194114', '0.0359646002', '0.0161118275', '0.3816372662', '0.2150685146', '0.3301983801', 2, 0.162, 0.059, 0.78, '2019-04-08 12:29:23', '2019-04-08 12:29:23'),
(23, 1, '', '0.0131671998', '0.0506235568', '0.0260041404', '0.4627173966', '0.1556043381', '0.2918833683', 2, 0.124, 0.041, 0.835, '2019-04-08 12:29:49', '2019-04-08 12:29:49'),
(24, 1, '', '0', '0.1065964951', '0.0993075692', '0.4112203756', '0.1492511242', '0.2336244359', 2, 0.341, 0.053, 0.606, '2019-04-08 12:50:54', '2019-04-08 12:50:54'),
(25, 0, 'hatespeech,offensive', '0.1508786767', '0.0806596524', '0.5335390628', '0.1221593132', '0.0440725108', '0.0686907841', 0, 0.12, 0.862, 0.018, '2019-04-09 13:39:30', '2019-04-09 13:39:30'),
(26, 0, 'offensive,hatespeech', '0.0565714193', '0.1048151639', '0.1319522144', '0.3156394224', '0.111624941', '0.279396839', 1, 1, 0, 0, '2019-04-10 04:42:55', '2019-04-10 04:42:55'),
(27, 0, 'hatespeech,offensive', '0.2024072889', '0.0599589683', '0.6253327432', '0.0406968741', '0.04526105', '0.0263430755', 0, 0.02, 0.947, 0.032, '2019-04-10 04:43:16', '2019-04-10 04:43:16'),
(28, 1, '', '0.050679454', '0.220511165', '0.4824694406', '0.0053502494', '0.2328618427', '0.0081278483', 0, 0.004, 0.961, 0.035, '2019-04-10 22:01:38', '2019-04-10 22:01:38'),
(29, 1, '', '0.0270579422', '0.0515545581', '0.1178845425', '0.2390174751', '0.0888063966', '0.4756790856', 1, 0.865, 0.061, 0.075, '2019-04-10 22:05:18', '2019-04-10 22:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2014_10_12_000000_create_users_table', 1),
(44, '2014_10_12_100000_create_password_resets_table', 1),
(45, '2017_06_02_182856_create_posts_table', 1),
(46, '2017_06_03_144733_add_user_id_to_posts', 1),
(47, '2017_06_03_211549_add_cover_image_to_posts', 1),
(48, '2019_02_13_091833_create_admins_table', 1),
(49, '2019_04_03_033604_create_comments_table', 1),
(50, '2019_04_04_130640_add_status_to_user_table', 2),
(51, '2019_04_04_130826_add_status_to_posts_table', 2),
(52, '2019_04_04_130923_add_status_to_comments_table', 2),
(53, '2019_04_04_163126_add_status_to_post_table', 3),
(54, '2019_04_05_081812_add_violation_column_to_user_table', 4),
(55, '2019_04_05_081929_add_user_id_column_to_comments_table', 4),
(56, '2019_04_05_134448_create_insights_table', 5),
(57, '2019_04_06_042053_remove_pid_column_from_sentiment', 6),
(58, '2019_04_06_042152_add_insight_id_to_posts_table', 6),
(59, '2019_04_06_042227_add_insight_id_to_comments_table', 6),
(60, '2019_04_08_103008_add_is_admin_column_to_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `insight_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_insight_id_foreign` (`insight_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`, `status`, `insight_id`) VALUES
(3, 'How do I clear aptitude?', '<p>Clearing aptitude is not at all a tough task, rather it is very easy. Basically aptitude problems are supposed to be solved in the fractions of seconds and without much calculations. There is a huge difference between solving a problem and solving a problem in less time. I am going to share some very useful tips which will surely help you out in clearing aptitude :</p>\r\n\r\n<ul>\r\n	<li>Before starting of anything, always make sure for why you are doing that thing.</li>\r\n	<li>At the initial level always study from the books and take help of the internet. At this level is will be very good for a person if he/she solves lots of questions.</li>\r\n	<li>This should be done to ensure the speed and accuracy of solving the questions. The initial step should be made to learn, grasp and maintain speed.</li>\r\n	<li>Now in the next step, start taking online quiz tests to have a glance of the level you are standing on currently.</li>\r\n	<li>Whenever you are not able to get good score, don&rsquo;t panic, rather cross check the way you solved the questions.</li>\r\n	<li>Find out your weak areas and start working upon them.</li>\r\n	<li>Always go through the basics before starting any topic.</li>\r\n	<li>Even if you are unable to score good marks, don&rsquo;t quit by thinking &lsquo;I will not be able to do this&rsquo; instead collect all your energy and apply it in learning from your mistakes.</li>\r\n</ul>', '2019-04-02 23:16:49', '2019-04-06 08:46:35', 2, 'sea-2755901_640_1554266809.jpg', 1, 2),
(4, 'Do you think that KGF can beat Zero ?', '<p>Both of them will be successful at the box office but Zero will make more money.</p>\r\n\r\n<p>I can explain with reasons in detail.</p>\r\n\r\n<ol>\r\n	<li>Zero has a bigger starcast consisting of Shahrukh Khan, Anushka Sharma and Katrina Kaif who are known all over India while KGF has only Kannada Superstar Yash. Many might argue that Baahubali also didn&rsquo;t have any big star but Baahubali didn&rsquo;t clash with any big film and it was a masterpiece.</li>\r\n	<li>Zero has a budget of around 200 crores. KGF has a budget of 80 crores. So the production quality of zero might be better.</li>\r\n	<li>One can be sure that zero will be promoted more aggressively like other Shahrukh Khan movies. More promotion is always better</li>\r\n	<li>Zero has more number of screens compared to KGF.</li>\r\n	<li>Zero looks like a romantic comedy while KGF is an action drama. There are many people who love action drama but family audiences prefer comedy movies. So Zero will be their first choice.</li>\r\n</ol>\r\n\r\n<p>But the result will depend upon reviews.</p>\r\n\r\n<p>If the reviews of both the films are good, Zero might make around 300 crores and KGF might make around 50 crores.</p>\r\n\r\n<p>If the reviews of zero are bad and KGF are good, Zero will make around 200 crores and KGF will make around 150 crores.</p>\r\n\r\n<p>I hope both the films make good money at box office.</p>', '2019-04-05 23:11:24', '2019-04-08 05:31:05', 2, 'Screenshot (161)_1554525673.png', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `violations` int(11) NOT NULL DEFAULT '0',
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `violations`, `isAdmin`) VALUES
(1, 'Megha K B', 'meghabhojaraj@gmail.com', '$2y$10$DlPh52FJm4P6uXg01Jcm9.caz3mTqaU944SsXOmjrnTswwCErsK4.', 'aLhK6FmY1HNFu8egvLc4VWeXvHJYybfOD869AyqyMOKOnqOdInZ3aYYzhrZ0', '2019-04-02 23:12:14', '2019-04-07 04:37:36', 1, 0, 1),
(2, 'Mazin', 'mamazin@gmail.com', '$2y$10$PMDMvEzjey/XCfrlpMzbJOL9ZDliVJDqk/ghziOmN94OVxEs3WkG.', 'OE4n7uTd0SljWPr2EALo8IPdfopX9dX0Djzcb50UlmHcQKmBg1Ch7E2hEtZv', '2019-04-04 03:45:00', '2019-04-10 04:40:39', 0, 0, 0),
(3, 'Nishan', 'nishanb7@gmail.com', '$2y$10$lWieOHn02z6ziwmoHLgeEOMIPLN/EMiKdxCI4ZJm/abXlQKO.Et/a', 'PnOQBigdI2LhYpfqTudfpkPuJ5lHMBfPwFrLj5xl64waLW9jwCO8IqbS5h9i', '2019-04-07 12:11:08', '2019-04-10 12:03:17', 1, 3, 1),
(4, 'Ranjith', 'rajranjith@gmail.com', '$2y$10$48ZckGVlYW0TLV/vJRuA9e0FYErYxuvPNAn.Jod/LohYC7XUJ2Q36', 'i2BoT81lrM8hw7iQNYZnfvLoeGjnSyv5BgB7qpHJustak3XTh3TTZgt3WfPU', '2019-04-08 07:40:39', '2019-04-08 07:40:39', 1, 0, NULL),
(5, 'Manjunath', 'mskoralli@gmail.com', '$2y$10$f1OPrM6EX0OQMlNj1pbZqu1kT1Ma8wN0A6rpx4yfEadFWCGpDexP2', 'oNFRN15c9Vv9xUaZv2I3u0DG1EdPbo3WYzUzYNfCGNZtDWV36QgmMmmMH67x', '2019-04-08 23:02:02', '2019-04-08 23:02:02', 1, 0, NULL),
(6, 'Pratheeksha S Karandoor', 'pratheekshaskarandoor@gmail.com', '$2y$10$OPPy7oLqUVrOBojXbQ5JGOeQp9aZF2oY/ybaznDYk01XMbryEuZeu', 'QiAZ4XdUnDwdxsI86uGWI7CBnGww8cUabKfxZs67pNU5yMvsWbui2EUU8v44', '2019-04-09 22:50:51', '2019-04-09 22:50:51', 1, 0, NULL),
(7, 'navya', 'navyaprabhum@gmail.com', '$2y$10$rgYT4Nng/09teO5LsSx5JuLjNk.tmwhid.rJM3GGXZhAiTqizwo72', 'ipmsfxFII0y1CybEt3vmZrqHgzXMLju117JMFutJlnWSfRyANbD1wm2PUi0W', '2019-04-09 23:03:42', '2019-04-09 23:03:42', 1, 0, NULL),
(8, 'Nishi', 'Nishi@gmail.com', '$2y$10$WvpoB1sd3l6dDYkc4UdvGOixlOzjvbZqbyt2dT/A1BLR1.UHgfpfe', 's9IoVDgSnWv5o3S1S5K2H7WDIH6fzTtJUhVwFQYPaFAfAjxEeaeG5oJkTbzN', '2019-04-09 23:41:20', '2019-04-10 22:01:38', 1, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
