-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2022 at 02:59 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_cms_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `email_status` varchar(50) NOT NULL,
  `account_status` varchar(50) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `user_uid`, `name`, `email`, `password`, `phone`, `profile`, `code`, `email_status`, `account_status`, `created_at`) VALUES
(1, '', 'Admin', 'admin@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', '', '', 0, 'verified', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `editor_choice`
--

CREATE TABLE `editor_choice` (
  `ec_id` int(11) NOT NULL,
  `post_uid` varchar(255) NOT NULL,
  `ec_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editor_choice`
--

INSERT INTO `editor_choice` (`ec_id`, `post_uid`, `ec_status`) VALUES
(1, '69d5069d-8b58-4229-a01e-9ec821c87aa0', 'active'),
(2, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `follow_id` int(11) NOT NULL,
  `following_user_uid` varchar(255) NOT NULL,
  `followed_user_uid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`follow_id`, `following_user_uid`, `followed_user_uid`) VALUES
(36, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '1723205b-c751-487b-bc14-1b3183edb3d4'),
(37, '1723205b-c751-487b-bc14-1b3183edb3d4', 'ab05490a-5153-4aae-b7a8-a40d6cf52955');

-- --------------------------------------------------------

--
-- Table structure for table `header-settings`
--

CREATE TABLE `header-settings` (
  `id` int(200) NOT NULL,
  `nav-name` varchar(255) NOT NULL,
  `nav-link` varchar(255) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header-settings`
--

INSERT INTO `header-settings` (`id`, `nav-name`, `nav-link`, `from_ip`, `from_browser`, `time`) VALUES
(10, 'Home', 'index', '', '', ''),
(11, 'About', 'about', '', '', ''),
(12, 'Contact', 'contact', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(200) NOT NULL,
  `logo_image` varchar(255) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_image`, `from_ip`, `from_browser`, `time`) VALUES
(1, 'assets/images/logo/logo.svg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'Wed, 16 Jun 2021 13:04:26 +0530');

-- --------------------------------------------------------

--
-- Table structure for table `metamask_details`
--

CREATE TABLE `metamask_details` (
  `meta_id` int(20) NOT NULL,
  `meta_uid` varchar(255) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `metamask_address` varchar(255) NOT NULL,
  `meta_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(50) NOT NULL,
  `email` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`) VALUES
(1, 'abhinavji89@gail.com', '2021-12-31'),
(2, 'bhuhiuhi@gmail.com', '2021-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `comment_id` int(20) NOT NULL,
  `comment_uid` varchar(255) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `post_uid` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `like_id` int(20) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `post_uid` varchar(255) NOT NULL,
  `total_like` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`like_id`, `user_uid`, `post_uid`, `total_like`) VALUES
(43, '1723205b-c751-487b-bc14-1b3183edb3d4', '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', 0),
(55, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', 0),
(58, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 0),
(59, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c87aa0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_list`
--

CREATE TABLE `post_list` (
  `list_id` int(20) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `post_uid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_subcomments`
--

CREATE TABLE `post_subcomments` (
  `subcomment_id` int(30) NOT NULL,
  `subcomment_uid` varchar(255) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `post_uid` varchar(255) NOT NULL,
  `comment_uid` varchar(255) NOT NULL,
  `subcomment` varchar(255) NOT NULL,
  `subcomment_status` varchar(255) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `post_views_id` int(20) NOT NULL,
  `post_uid` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `post_per_day_views` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_views`
--

INSERT INTO `post_views` (`post_views_id`, `post_uid`, `day`, `post_per_day_views`) VALUES
(7, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '', 1174);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `icon_name` varchar(255) NOT NULL,
  `icon_font` varchar(255) NOT NULL,
  `icon_color` varchar(20) NOT NULL,
  `icon_link` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `icon_name`, `icon_font`, `icon_color`, `icon_link`, `visibility`) VALUES
(2, 'twitter', 'fab fa-twitter', '#1DA1F2', 'twitter.com', 'true'),
(7, 'instagram', 'fab fa-instagram', '#E1306C;', 'insta.com', 'true'),
(9, 'telegram', 'fab fa-telegram-plane', '#0088CC', 'telegram.com', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `post_id` int(20) NOT NULL,
  `post_uid` varchar(255) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `unlisted` varchar(10) NOT NULL,
  `pin_story` varchar(20) NOT NULL,
  `post_status` varchar(30) NOT NULL,
  `post_slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`post_id`, `post_uid`, `user_uid`, `post_title`, `post_content`, `featured_image`, `post_tags`, `unlisted`, `pin_story`, `post_status`, `post_slug`, `meta_title`, `meta_description`, `from_ip`, `from_browser`, `created_at`, `updated_at`) VALUES
(1, '16d2019a-6124-4eb3-8b31-5565afac5397', '1723205b-c751-487b-bc14-1b3183edb3d4', 'ffff', '<p><br></p>', '1640541498.png', '', 'false', 'false', 'deleted', 'ffff-8310cbac69', 'ffff | Shubham Gupta', 'ffff is published by Shubham Gupta.', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Sun, 26 Dec 2021 23:27:38 +0530', 'Sun, 26 Dec 2021 23:28:18 +0530'),
(2, 'ae280a04-d65c-4b4c-9149-4c53302fa7c6', '1723205b-c751-487b-bc14-1b3183edb3d4', 'ffff', '<p><br></p>', 'null', '', 'false', 'false', 'deleted', 'ffff-7818a770ea', 'ffff | Shubham Gupta', 'ffff is published by Shubham Gupta.', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Sun, 26 Dec 2021 23:30:07 +0530', 'Sun, 26 Dec 2021 23:30:17 +0530'),
(3, '1dfa9441-bf55-4d86-bee8-04c9a2028d8c', '1723205b-c751-487b-bc14-1b3183edb3d4', 'gggg', '<p><br></p>', '1640541831.png', '', 'false', 'false', 'deleted', 'gggg-aa0e613558', 'gggg | Shubham Gupta', 'gggg is published by Shubham Gupta.', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Sun, 26 Dec 2021 23:31:30 +0530', 'Sun, 26 Dec 2021 23:33:51 +0530'),
(4, 'c408ea2c-3a67-484f-a7f8-538450985cee', '1723205b-c751-487b-bc14-1b3183edb3d4', 'demo', '<p><br></p>', '1640545444.png', '', 'false', 'false', 'deleted', 'demo-9cb97d5bd2', 'demo | Shubham Gupta', 'demo is published by Shubham Gupta.', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Mon, 27 Dec 2021 00:29:33 +0530', 'Mon, 27 Dec 2021 00:34:04 +0530'),
(5, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '1723205b-c751-487b-bc14-1b3183edb3d4', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>fffLorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p><br></p>', '', 'tag1', 'false', 'false', 'published', 'fLorem-Ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry--0192fc0990', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry. | Shubham Gupta', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry. is published by Shubham Gupta.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'Fri, 31 Dec 2021 14:38:52 +0530', ''),
(6, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>', '', 'tag1,tag2', 'false', 'false', 'published', 'Lorem-Ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry--a4b1d953e5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. | Ajay Kumar', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. is published by Ajay Kumar.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'Sat, 01 Jan 2022 13:54:10 +0530', 'Sat, 01 Jan 2022 13:54:33 +0530'),
(7, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '1723205b-c751-487b-bc14-1b3183edb3d4', 'Ipsum is simply dummy text of the printing and typesetting industry.', '<p>fffLorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p><br></p>', '', 'tag1', 'false', 'false', 'published', 'Ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry--0192fc0990', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry. | Shubham Gupta', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry. is published by Shubham Gupta.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'Fri, 31 Dec 2021 14:38:52 +0530', '');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 'tag1', '', ''),
(2, 'tag2', '', ''),
(3, 'tag3', '', ''),
(4, 'tag 4', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `topic_follow`
--

CREATE TABLE `topic_follow` (
  `topic_follow_id` int(20) NOT NULL,
  `topic_follow_uid` varchar(255) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `topic_follow` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic_follow`
--

INSERT INTO `topic_follow` (`topic_follow_id`, `topic_follow_uid`, `user_uid`, `topic_follow`, `status`, `from_ip`, `from_browser`, `created_at`) VALUES
(3, '', '1723205b-c751-487b-bc14-1b3183edb3d4', 'tag1', '', '', '', ''),
(4, '', '1723205b-c751-487b-bc14-1b3183edb3d4', 'tag2', '', '', '', ''),
(5, '', '1723205b-c751-487b-bc14-1b3183edb3d4', 'tag3', '', '', '', ''),
(7, '', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'tag2', '', '', '', ''),
(8, '', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'tag1', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(20) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `email_status` varchar(50) NOT NULL,
  `account_status` varchar(50) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_uid`, `name`, `username`, `email`, `password`, `profile`, `bio`, `code`, `email_status`, `account_status`, `from_ip`, `from_browser`, `created_at`) VALUES
(3, '1723205b-c751-487b-bc14-1b3183edb3d4', 'Shubham Gupta', 'shubham8028', 'shubham8028@gmail.com', '$2y$10$vrvOWEPP9j5uxc0E/IL5.erpvx90V9b2.viLfr4tqvTKEoupOh732', '', 'I am a web developer turned travel blogger that is forced to code to eat.', 0, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', ''),
(4, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'Ajay Kumar', 'ajay', 'ajay@gmail.com', '$2y$10$ix.Xo0U.5cknURdxKahZP.bqKT99lSB6GvL55OCJJGOz4Ku74MHFi', '', '', 0, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editor_choice`
--
ALTER TABLE `editor_choice`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `header-settings`
--
ALTER TABLE `header-settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metamask_details`
--
ALTER TABLE `metamask_details`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `post_list`
--
ALTER TABLE `post_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `post_subcomments`
--
ALTER TABLE `post_subcomments`
  ADD PRIMARY KEY (`subcomment_id`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`post_views_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `topic_follow`
--
ALTER TABLE `topic_follow`
  ADD PRIMARY KEY (`topic_follow_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `editor_choice`
--
ALTER TABLE `editor_choice`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `header-settings`
--
ALTER TABLE `header-settings`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `metamask_details`
--
ALTER TABLE `metamask_details`
  MODIFY `meta_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `like_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `post_list`
--
ALTER TABLE `post_list`
  MODIFY `list_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_subcomments`
--
ALTER TABLE `post_subcomments`
  MODIFY `subcomment_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `post_views_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topic_follow`
--
ALTER TABLE `topic_follow`
  MODIFY `topic_follow_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
