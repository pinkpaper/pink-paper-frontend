-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 11:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(255) NOT NULL,
  `about_us` longtext NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `Udated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about_us`, `created_at`, `Udated_at`) VALUES
(1, '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n\r\n1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these ma', 'Thursday, 27 January 2022', 'Fri, 28 Jan 2022 13:49:16 +0530');

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
(1, '1723205b-c751-487b-bc14-1b3183edb3d78', 'Admin', 'admin@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', '', '', 0, 'verified', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(25) NOT NULL,
  `message_uid` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext CHARACTER SET utf8 NOT NULL,
  `from_ip` varchar(255) CHARACTER SET utf8 NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `message_uid`, `first_name`, `last_name`, `email`, `message`, `from_ip`, `from_browser`, `created_at`) VALUES
(1, 'njshbdsvhb', 'abhinav', 'nagar', 'jasahbka cs', 'hj', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `donate_eth`
--

CREATE TABLE `donate_eth` (
  `donate_id` int(200) NOT NULL,
  `donate_uid` varchar(200) NOT NULL,
  `post_uid` varchar(200) NOT NULL,
  `from_user_address` varchar(200) NOT NULL,
  `to_user_address` varchar(200) NOT NULL,
  `eth_price` varchar(200) NOT NULL,
  `transation_hash` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_time` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate_eth`
--

INSERT INTO `donate_eth` (`donate_id`, `donate_uid`, `post_uid`, `from_user_address`, `to_user_address`, `eth_price`, `transation_hash`, `from_ip`, `from_time`, `from_browser`) VALUES
(1, 'f009f4ea-6eb5-4f1e-954c-631d43f6ac36', '322d3b26-2487-01b5-010c-79c8455984a5', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', '0.00089', '0xb8990c2a7af315ece66b96e7bf1026271e968fab5ff5b0d27d00026799aae581', '::1', '2022-06-15', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36'),
(2, '8cf1e4fb-9716-49c1-8e73-74404dfb8205', '322d3b26-2487-01b5-010c-79c8455984a5', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', '0.00089', '0xef55b57c1d5d057f963f82907e5461c160ce42a2498a25d3bdb26fc1409ee238', '::1', '2022-06-15', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36'),
(3, '809e1734-5716-48d9-8406-5721a026e210', '322d3b26-2487-01b5-010c-79c8455984a5', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', '0.00089', '0x1d3453b93cf70f585e0265d104232e53c5ddf7bf1933c3cd1f435d2f576946f3', '::1', 'Wed, 15 Jun 2022 19:02:14 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(4, '6cde7dbd-3df8-4251-9384-dbab884d7ff1', '322d3b26-2487-01b5-010c-79c8455984a5', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', '0.00088', '0x98b738bfda5c6a9c6a92bbe6c979d6014a0a15f99999c76a643fcdb4e46258d4', '::1', 'Wed, 15 Jun 2022 19:15:39 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(5, 'd0275198-eeba-4441-922a-9ea2fd8f2601', '322d3b26-2487-01b5-010c-79c8455984a5', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', '0.00177', '0xd590605b82e49ff768d73c9b326f6415027e15896988f36c4b5787e39340d5ad', '::1', 'Wed, 15 Jun 2022 19:17:40 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(6, '9e5434e2-32f6-440d-8740-9077af8a4536', '322d3b26-2487-01b5-010c-79c8455984a5', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', '0.00086', '0xe38af77788d5d3c4ea1e68a7d5178f09459b39a3df9297befb92113b8a9a5715', '::1', 'Thu, 16 Jun 2022 13:06:47 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(7, '40ee2cc6-7347-4b39-ac06-be888e6d93e6', '2491a988-428b-0104-01c8-604112496479', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', '0.00086', '0x9cb0a8f4619d4713b3dfe7f79a922b231fce6c38f620e30a7b76d8d5902b74f2', '::1', 'Thu, 16 Jun 2022 13:09:26 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(8, '3ca75d21-fbcc-4f8a-a6fc-7d5c15fbd7e2', '2491a988-428b-0104-01c8-604112496479', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', '0.00086', '0x6c262cf3766135b0604c3c0b897722277a61e44c7fd82862899bdb4985dc9e3d', '::1', 'Thu, 16 Jun 2022 13:10:11 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(9, '64b0ec96-319b-4bd2-96c8-ea82a9819450', '2491a988-428b-0104-01c8-604112496479', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', '0.00172', '0xbe9c73342fe39ce81b9225b56eb47d31cb3e453c4df2af5e412e7291c29fe5fe', '::1', 'Thu, 16 Jun 2022 13:10:47 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(10, '372068f0-8cc3-480f-93db-745cd32874c5', 'ce90b2d6-5996-014d-01e8-c718adeed2d5', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x55e2780588aa5000F464f700D2676fD0a22Ee160', '0.00086', '0x15db1c399b94745856336989d7dd350940c3c590f59502532b87d24191d8db8b', '::1', 'Thu, 16 Jun 2022 13:20:29 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(11, '757cd7a6-b68c-4052-a1f4-ce026ab56626', 'ce90b2d6-5996-014d-01e8-c718adeed2d5', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x55e2780588aa5000F464f700D2676fD0a22Ee160', '0.00087', '0x3de030fe8c7d389853e4fc5c3299c66a46542a2661740b6a7877d64f43016815', '::1', 'Thu, 16 Jun 2022 14:42:06 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(12, 'ef1de741-88be-42f4-a307-b6b5ad53a3be', 'eebe61e0-f1b5-0186-010f-027e6c8753b3', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x55e2780588aa5000F464f700D2676fD0a22Ee160', '0.00087', '0x73db780b602584637d15de22f0dc0da1f982cfc219dd6985a77e0da95192dc4a', '::1', 'Thu, 16 Jun 2022 14:43:19 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(13, '02f88981-6479-4bd1-9358-2c4a90e826de', 'eebe61e0-f1b5-0186-010f-027e6c8753b3', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x55e2780588aa5000F464f700D2676fD0a22Ee160', '0.00087', '0xbf1cd08537b759491aa619f8ea4f6fa513172ef9a66e8cb2cc9d877231e606e2', '::1', 'Thu, 16 Jun 2022 14:44:34 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36'),
(14, '790cb99e-348f-42bc-bfac-25c068cb9314', 'eebe61e0-f1b5-0186-010f-027e6c8753b3', '0xed9b1756dbf760a79547677f598bf001dad50fd1', '0x55e2780588aa5000F464f700D2676fD0a22Ee160', '0.00087', '0xcfc249aa591d61101e4f8fde73c8e8e25d0bd49c1c793d802f4be258ae068b66', '::1', 'Thu, 16 Jun 2022 14:45:03 +0530', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36');

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
(2, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', 'active'),
(3, '16d2019a-6124-4eb3-8b31-5565afac5397', 'active'),
(4, '9d6f6b37-f9eb-4925-a118-d1f671561593', 'active'),
(5, '9fa36c48-3e5e-01b8-0188-691dc55a9145', 'active'),
(6, '2491a988-428b-0104-01c8-604112496479', 'active'),
(7, 'eebe61e0-f1b5-0186-010f-027e6c8753b3', 'active'),
(8, 'ce90b2d6-5996-014d-01e8-c718adeed2d5', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `follow_id` int(11) NOT NULL,
  `following_user_uid` varchar(255) NOT NULL,
  `followed_user_uid` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`follow_id`, `following_user_uid`, `followed_user_uid`, `date`) VALUES
(66, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '1723205b-c751-487b-bc14-1b3183edb3d4', '2022-02-22'),
(76, '32cba5c9-ae06-4e44-b83d-8b34c148c0b2', '1723205b-c751-487b-bc14-1b3183edb3d4', '2022-02-22'),
(78, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '32cba5c9-ae06-4e44-b83d-8b34c148c0b2', '2022-02-22'),
(79, '32cba5c9-ae06-4e44-b83d-8b34c148c0b2', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '2022-02-22'),
(117, '1723205b-c751-487b-bc14-1b3183edb3d4', '32cba5c9-ae06-4e44-b83d-8b34c148c0b2', '2022-02-22'),
(118, '1723205b-c751-487b-bc14-1b3183edb3d4', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '2022-02-22'),
(121, '29a0d728-6cc5-01d0-01f3-aeaa9e2ac0a1', '1723205b-c751-487b-bc14-1b3183edb3d4', '2022-06-10');

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
(10, 'Home', 'home', '', '', ''),
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

--
-- Dumping data for table `metamask_details`
--

INSERT INTO `metamask_details` (`meta_id`, `meta_uid`, `user_uid`, `metamask_address`, `meta_status`) VALUES
(6, '5ad56c18-e7cb-01ca-01be-20029e069083', '1723205b-c751-487b-bc14-1b3183edb3d4', '0x276b5E99Bf72FEb4C2B21112aD70cd5838969103', 'active'),
(7, '90d5ft18-e7cb-01ca-32be-20029e067583', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '0x55e2780588aa5000F464f700D2676fD0a22Ee160', 'active'),
(9, '58f0e2a0-b5bd-0121-0123-91ed9664c7a3', '29a0d728-6cc5-01d0-01f3-aeaa9e2ac0a1', '0xed9b1756dbf760a79547677f598bf001dad50fd1', 'active'),
(10, '540242b0-02bc-011a-012f-105d41064c4f', 'b0ed11d8-e617-01ae-018c-6a41938a15cf', '0xed9b1756dbf760a79547677f598bf001dad50fd1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `metamask_login`
--

CREATE TABLE `metamask_login` (
  `ID` int(11) NOT NULL,
  `address` varchar(42) NOT NULL,
  `publicName` tinytext DEFAULT NULL,
  `nonce` tinytext DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `first_time_login` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metamask_login`
--

INSERT INTO `metamask_login` (`ID`, `address`, `publicName`, `nonce`, `created`, `first_time_login`) VALUES
(1, '0x63891340a48059a84b5f9d8df9782ae2f5aa76b8', 'sss', '623351f6721d6', '2022-03-16 18:59:43', 'true'),
(30, '0xed9b1756dbf760a79547677f598bf001dad50fd1', NULL, '62aaf48a91fa7', '2022-06-11 08:53:15', '');

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

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`comment_id`, `comment_uid`, `user_uid`, `post_uid`, `comment`, `status`, `from_ip`, `from_browser`, `created_at`, `updated_at`) VALUES
(5, '18ceaaa9-f629-014b-0155-14442121343e', '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c87aa0', '<p>hhh</p>', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Fri, 14 Jan 2022 18:44:50 +0530', ''),
(9, 'ef393067-470d-01c4-0168-1158b3f436fb', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c87aa0', 'thank', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Fri, 14 Jan 2022 21:53:45 +0530', ''),
(11, '646d8ba8-9016-01cb-0180-926e822e5c00', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', 'test', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 15 Jan 2022 12:02:06 +0530', ''),
(13, 'a95b2fdf251ce814ab82db095eda6e92e86911cfbe16dede576a21c5f9296d2a4eab6195910d17c5e1ba827f2e088430721c4ed19eb366e9698c2a44e438af7a', '1723205b-c751-487b-bc14-1b3183edb3d78 ', '7962b98b-f95b-45fc-845b-6e2045094027 ', 'Hello World', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 11:47:41 +0530', ''),
(14, '3c11e4f316c956a27655902dc1a19b925b8887d59eff791eea63edc8a05454ec594d5eb0f40ae151df87acd6e101761ecc5bb0d3b829bf3a85f5432493b22f37', '1723205b-c751-487b-bc14-1b3183edb3d78 ', '7962b98b-f95b-45fc-845b-6e2045094027 ', 'd', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 11:48:21 +0530', ''),
(15, '31bca02094eb78126a517b206a88c73cfa9ec6f704c7030d18212cace820f025f00bf0ea68dbf3f3a5436ca63b53bf7bf80ad8d5de7d8359d0b7fed9dbc3ab99', '1723205b-c751-487b-bc14-1b3183edb3d78 ', '16d2019a-6124-4eb3-8b31-5565afac5397 ', 'jnw', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Sat, 22 Jan 2022 12:10:55 +0530', ''),
(17, '2d7fdcf256ec5fda53dd26f37ca0bc61a2b76c057775381518616b9985235e46edcbb179b286c3bc26187dc3da5df28b34556dc43c2a5752a3568abd6cf49471', '1723205b-c751-487b-bc14-1b3183edb3d78 ', '1dfa9441-bf55-4d86-bee8-04c9a2028d8c ', 'cmnt1', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 12:46:17 +0530', ''),
(18, 'f7acb21ef36457983daa9971cc620ea614fe0aaa834d7d23442656290c109365453fd974d0a5fa3c7687eb6a8b4af36119dd390da539fd07abf56e1975fa233f', '1723205b-c751-487b-bc14-1b3183edb3d78 ', '1dfa9441-bf55-4d86-bee8-04c9a2028d8c ', 'ok', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 12:51:09 +0530', ''),
(19, '68c7fe70-ecef-0175-01c5-a62fdb88543c', '1723205b-c751-487b-bc14-1b3183edb3d4', '16d2019a-6124-4eb3-8b31-5565afac5397', 'cmnt1', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Wed, 26 Jan 2022 15:00:31 +0530', ''),
(20, 'd600825f-db45-0183-019c-3ea5eff00663', '1723205b-c751-487b-bc14-1b3183edb3d4', '16d2019a-6124-4eb3-8b31-5565afac5397', 'cmnt1', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Wed, 26 Jan 2022 15:00:31 +0530', ''),
(21, 'cc3cb501-0fb1-0105-01bb-638cfcefdf3f', '1723205b-c751-487b-bc14-1b3183edb3d4', '16d2019a-6124-4eb3-8b31-5565afac5397', 'retry', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Wed, 26 Jan 2022 15:07:39 +0530', ''),
(22, 'dfff522a-c171-01ba-01be-00b14b4dad27', '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 'hiiii', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Thu, 27 Jan 2022 01:22:52 +0530', ''),
(23, '3abffd0a-75c2-011f-01c6-2b14d8d0483a', '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 'hiiiiii2', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Thu, 27 Jan 2022 01:23:12 +0530', ''),
(24, '5a9392f2-3b48-0115-0199-003c05e077f3', '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 'cmnt5', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Thu, 27 Jan 2022 01:24:22 +0530', ''),
(25, 'bebe5acf-977a-01ae-0107-d7d608bbd788', '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 'okok', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Thu, 27 Jan 2022 01:24:48 +0530', ''),
(26, 'd294175e-3be4-01ab-0189-ec52f13df62a', '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 'two', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Thu, 27 Jan 2022 01:25:28 +0530', ''),
(29, 'da69c267-2a43-01cd-01ea-771d0a9b75ae', '1723205b-c751-487b-bc14-1b3183edb3d4', '7962b98b-f95b-45fc-845b-6e2045094027', 'dfg', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Wed, 02 Feb 2022 10:25:24 +0530', ''),
(31, 'b34bd4b8-8baa-01c1-0106-de71460e2b8f', '1723205b-c751-487b-bc14-1b3183edb3d4', '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', 'ok', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Fri, 04 Feb 2022 10:44:43 +0530', ''),
(32, '815ea2d0-df9f-011b-01c3-6ff9da1e84ae', '15f72840-75de-015e-0131-40fe0cfab9e6', '4eb03715-cf96-0164-01a6-95560a22f6a7', 'best', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Thu, 09 Jun 2022 11:11:30 +0530', ''),
(33, '8919ef3f-ea8f-016c-01bf-045be5275698', '29a0d728-6cc5-01d0-01f3-aeaa9e2ac0a1', '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', 'czc', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Fri, 10 Jun 2022 21:17:18 +0530', ''),
(34, '9ce56532-bd4d-0198-018f-0f5b7f6715a2', 'b0ed11d8-e617-01ae-018c-6a41938a15cf', 'aa8eee89-1832-01eb-0132-ef3bfa0e9c49', 'Best story', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Sat, 11 Jun 2022 16:38:29 +0530', '');

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
(58, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 897),
(59, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c87aa0', 0),
(60, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '7962b98b-f95b-45fc-845b-6e2045094027', 0),
(66, '1723205b-c751-487b-bc14-1b3183edb3d4', '16d2019a-6124-4eb3-8b31-5565afac5397', 0),
(67, '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 0),
(68, '1723205b-c751-487b-bc14-1b3183edb3d4', '47bb69b0-db0f-019a-0178-32641bddcce8', 0),
(69, '1723205b-c751-487b-bc14-1b3183edb3d4', '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', 0),
(70, '15f72840-75de-015e-0131-40fe0cfab9e6', '4eb03715-cf96-0164-01a6-95560a22f6a7', 0),
(71, '15f72840-75de-015e-0131-40fe0cfab9e6', '322d3b26-2487-01b5-010c-79c8455984a5', 0),
(72, '29a0d728-6cc5-01d0-01f3-aeaa9e2ac0a1', '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', 0),
(73, '29a0d728-6cc5-01d0-01f3-aeaa9e2ac0a1', '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', 0),
(74, '29a0d728-6cc5-01d0-01f3-aeaa9e2ac0a1', '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', 0),
(75, '29a0d728-6cc5-01d0-01f3-aeaa9e2ac0a1', '322d3b26-2487-01b5-010c-79c8455984a5', 0),
(76, 'b0ed11d8-e617-01ae-018c-6a41938a15cf', 'eebe61e0-f1b5-0186-010f-027e6c8753b3', 0),
(77, 'b0ed11d8-e617-01ae-018c-6a41938a15cf', 'aa8eee89-1832-01eb-0132-ef3bfa0e9c49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_list`
--

CREATE TABLE `post_list` (
  `list_id` int(20) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `post_uid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_list`
--

INSERT INTO `post_list` (`list_id`, `user_uid`, `post_uid`) VALUES
(5, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c87aa0'),
(8, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c77aa0'),
(46, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '7962b98b-f95b-45fc-845b-6e2045094027'),
(64, '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c77aa0'),
(65, '1723205b-c751-487b-bc14-1b3183edb3d4', '47bb69b0-db0f-019a-0178-32641bddcce8'),
(66, '1723205b-c751-487b-bc14-1b3183edb3d4', '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9'),
(68, '1723205b-c751-487b-bc14-1b3183edb3d4', '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7'),
(69, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '322d3b26-2487-01b5-010c-79c8455984a5'),
(70, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'ce90b2d6-5996-014d-01e8-c718adeed2d5'),
(71, 'b0ed11d8-e617-01ae-018c-6a41938a15cf', 'aa8eee89-1832-01eb-0132-ef3bfa0e9c49');

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

--
-- Dumping data for table `post_subcomments`
--

INSERT INTO `post_subcomments` (`subcomment_id`, `subcomment_uid`, `user_uid`, `post_uid`, `comment_uid`, `subcomment`, `subcomment_status`, `from_ip`, `from_browser`, `created_at`, `updated_at`) VALUES
(15, 'fb90cdd3-f7e2-0150-01f8-0df3df6b76a8', '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c87aa0', 'ef393067-470d-01c4-0168-1158b3f436fb', 'hello', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Mon, 17 Jan 2022 14:15:37 +0530', ''),
(17, 'b42a60cb-486a-01e1-011b-eac3e5f320a0', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c87aa0', 'a9b60f0f-e014-0104-0190-a7259ecc37b6', 'fbvghghhfdf', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Mon, 17 Jan 2022 14:21:23 +0530', ''),
(20, 'anoanox4u820', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '646d8ba8-9016-01cb-0180-926e822e5c00', 'hello', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Fri, 21 Jan 2022 15:58:01 +0530', ''),
(21, 'lndcdaj9393271nijia', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c87aa0', 'ef393067-470d-01c4-0168-1158b3f436fb', 'hi', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Fri, 21 Jan 2022 16:00:08 +0530', ''),
(22, '31bca02094eb78126a517b206a88c73cfa9ec6f704c7030d18212cace820f025f00bf0ea68dbf3f3a5436ca63b53bf7bf80ad8d5de7d8359d0b7fed9dbc3ab99', '', '', '', 'hahi', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 11:54:17 +0530', ''),
(23, '31bca02094eb78126a517b206a88c73cfa9ec6f704c7030d18212cace820f025f00bf0ea68dbf3f3a5436ca63b53bf7bf80ad8d5de7d8359d0b7fed9dbc3ab99', '', '', '', 'hahi', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 11:54:18 +0530', ''),
(24, 'dfa5d1cefd0efdf5f52b765120da72c5706eb1dd113234cfdf31e31f9cd0283366f6a8f7230f29ea42d83acfe02743dc2504cda07c30f6e84bf9b1ca35966266', '', '', '', 'hah', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 11:54:19 +0530', ''),
(25, '3c11e4f316c956a27655902dc1a19b925b8887d59eff791eea63edc8a05454ec594d5eb0f40ae151df87acd6e101761ecc5bb0d3b829bf3a85f5432493b22f37', '', '', '', 'hahah', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 11:54:20 +0530', ''),
(26, 'dfa5d1cefd0efdf5f52b765120da72c5706eb1dd113234cfdf31e31f9cd0283366f6a8f7230f29ea42d83acfe02743dc2504cda07c30f6e84bf9b1ca35966266', '', '', '', 'hah', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Sat, 22 Jan 2022 11:54:30 +0530', ''),
(27, '31bca02094eb78126a517b206a88c73cfa9ec6f704c7030d18212cace820f025f00bf0ea68dbf3f3a5436ca63b53bf7bf80ad8d5de7d8359d0b7fed9dbc3ab99', '', '', '', 'hahi', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Sat, 22 Jan 2022 12:01:04 +0530', ''),
(28, 'vs', '', '', '', 'db', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Sat, 22 Jan 2022 12:02:07 +0530', ''),
(29, 'sh', '', '', '', 'dth', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Sat, 22 Jan 2022 12:02:54 +0530', ''),
(30, 'd', '1723205b-c751-487b-bc14-1b3183edb3d78 ', '7962b98b-f95b-45fc-845b-6e2045094027 ', 'a95b2fdf251ce814ab82db095eda6e92e86911cfbe16dede576a21c5f9296d2a4eab6195910d17c5e1ba827f2e088430721c4ed19eb366e9698c2a44e438af7a', 'adf', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Sat, 22 Jan 2022 12:06:18 +0530', ''),
(31, 'dfa5d1cefd0efdf5f52b765120da72c5706eb1dd113234cfdf31e31f9cd0283366f6a8f7230f29ea42d83acfe02743dc2504cda07c30f6e84bf9b1ca35966266', '', '', '', 'hah', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Sat, 22 Jan 2022 12:11:07 +0530', ''),
(33, '31bca02094eb78126a517b206a88c73cfa9ec6f704c7030d18212cace820f025f00bf0ea68dbf3f3a5436ca63b53bf7bf80ad8d5de7d8359d0b7fed9dbc3ab99', '1723205b-c751-487b-bc14-1b3183edb3d78 ', '16d2019a-6124-4eb3-8b31-5565afac5397 ', '31bca02094eb78126a517b206a88c73cfa9ec6f704c7030d18212cace820f025f00bf0ea68dbf3f3a5436ca63b53bf7bf80ad8d5de7d8359d0b7fed9dbc3ab99', 'hahi', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Sat, 22 Jan 2022 12:21:07 +0530', ''),
(34, 'dfa5d1cefd0efdf5f52b765120da72c5706eb1dd113234cfdf31e31f9cd0283366f6a8f7230f29ea42d83acfe02743dc2504cda07c30f6e84bf9b1ca35966266', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '69d5069d-8b58-4229-a01e-9ec821c87aa0', 'b5f996de-12dd-01f7-01ee-0561fc53a830', 'hah', 'active', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Sat, 22 Jan 2022 12:22:45 +0530', ''),
(35, '1be9fa03753f12a5e990b0f9a368549757415389a936c52568a9bb2a32f8f939d6e245026d9d7d3fe0e75eaab1984fefa196d4703d5de2800dd37eb02d8bfdbe', '1723205b-c751-487b-bc14-1b3183edb3d78 ', '1dfa9441-bf55-4d86-bee8-04c9a2028d8c ', '2d7fdcf256ec5fda53dd26f37ca0bc61a2b76c057775381518616b9985235e46edcbb179b286c3bc26187dc3da5df28b34556dc43c2a5752a3568abd6cf49471', 'vut', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 12:46:27 +0530', ''),
(36, 'd617a70d00440622046b8118e881ca1bbf7c3efdff937ea70ba508e1efc76261a86ba358fae2e024fb25ccf376815ca5a713d0eb779b1e5070ffc2f85eb2b72f', '1723205b-c751-487b-bc14-1b3183edb3d78 ', '1dfa9441-bf55-4d86-bee8-04c9a2028d8c ', '2d7fdcf256ec5fda53dd26f37ca0bc61a2b76c057775381518616b9985235e46edcbb179b286c3bc26187dc3da5df28b34556dc43c2a5752a3568abd6cf49471', 'kslacm', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sat, 22 Jan 2022 12:48:02 +0530', ''),
(37, '9b3803d8-9bfa-01b8-01fa-3990ce6d669a', '1723205b-c751-487b-bc14-1b3183edb3d4', '16d2019a-6124-4eb3-8b31-5565afac5397', 'cc3cb501-0fb1-0105-01bb-638cfcefdf3f', 'retry1', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Wed, 26 Jan 2022 15:13:39 +0530', ''),
(39, '145e63de-d54f-0116-013b-982b10016510', '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 'd294175e-3be4-01ab-0189-ec52f13df62a', 'ok', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Thu, 03 Feb 2022 13:07:37 +0530', ''),
(40, '29e94142-f44c-0171-0136-bcafdd3c772b', '1723205b-c751-487b-bc14-1b3183edb3d4', '69d5069d-8b58-4229-a01e-9ec821c77aa0', 'bebe5acf-977a-01ae-0107-d7d608bbd788', 'ok', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Thu, 03 Feb 2022 13:47:17 +0530', ''),
(41, '427e80cd-2ca3-01fe-01ed-18bb7e5fc3c7', '1723205b-c751-487b-bc14-1b3183edb3d4', '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '646d8ba8-9016-01cb-0180-926e822e5c00', 'hello', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Fri, 04 Feb 2022 10:44:28 +0530', ''),
(42, '14cd3a36-b167-0159-0150-d3b4a476d7a8', 'b0ed11d8-e617-01ae-018c-6a41938a15cf', 'aa8eee89-1832-01eb-0132-ef3bfa0e9c49', '9ce56532-bd4d-0198-018f-0f5b7f6715a2', 'Thank You', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Sat, 11 Jun 2022 16:38:45 +0530', '');

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
(2, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-01-24', 1113),
(7, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '', 1188),
(12, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '', 657),
(40, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-01-24', 10),
(41, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-01-25', 500),
(48, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-01-25', 2),
(49, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-01-25', 3),
(50, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-01-26', 1),
(51, '16d2019a-6124-4eb3-8b31-5565afac5397', '2022-01-26', 34),
(52, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-01-27', 11),
(53, '47bb69b0-db0f-019a-0178-32641bddcce8', '2022-01-27', 1),
(54, '', '2022-01-27', 12),
(55, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-01-27', 2),
(56, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-01-28', 1),
(57, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-01-28', 3),
(58, '', '2022-01-28', 39),
(59, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-01-28', 4),
(60, '47bb69b0-db0f-019a-0178-32641bddcce8', '2022-01-28', 3),
(61, '', '2022-01-29', 286),
(62, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-01-29', 1),
(63, '47bb69b0-db0f-019a-0178-32641bddcce8', '2022-01-29', 1),
(64, '', '2022-01-30', 11),
(65, '', '2022-01-31', 218),
(66, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-01-31', 2),
(67, '', '2022-02-01', 170),
(68, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-01', 2),
(69, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-01', 1),
(70, '', '2022-02-02', 16),
(71, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-02', 3),
(72, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-02', 2),
(73, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-02', 1),
(74, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-02', 1),
(75, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-02', 1),
(76, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-02', 1),
(77, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-02', 1),
(78, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-02', 1),
(79, '', '2022-02-02', 1),
(80, '', '2022-02-02', 1),
(81, '', '2022-02-02', 1),
(82, '', '2022-02-02', 1),
(83, '', '2022-02-02', 1),
(84, '', '2022-02-02', 1),
(85, '', '2022-02-02', 1),
(86, '', '2022-02-02', 1),
(87, '', '2022-02-02', 1),
(88, '', '2022-02-02', 1),
(89, '', '2022-02-02', 1),
(90, '', '2022-02-02', 1),
(91, '', '2022-02-02', 1),
(92, '', '2022-02-02', 1),
(93, '', '2022-02-02', 1),
(94, '', '2022-02-02', 1),
(95, '', '2022-02-02', 1),
(96, '', '2022-02-02', 1),
(97, '', '2022-02-02', 1),
(98, '', '2022-02-02', 1),
(99, '', '2022-02-02', 1),
(100, '', '2022-02-02', 1),
(101, '', '2022-02-02', 1),
(102, '', '2022-02-02', 1),
(103, '', '2022-02-02', 1),
(104, '', '2022-02-02', 1),
(105, '', '2022-02-02', 1),
(106, '', '2022-02-02', 1),
(107, '', '2022-02-02', 1),
(108, '', '2022-02-02', 1),
(109, '', '2022-02-02', 1),
(110, '', '2022-02-02', 1),
(111, '', '2022-02-02', 1),
(112, '', '2022-02-02', 1),
(113, '', '2022-02-02', 1),
(114, '', '2022-02-02', 1),
(115, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-03', 1),
(116, '', '2022-02-03', 1),
(117, '', '2022-02-03', 1),
(118, '', '2022-02-03', 1),
(119, '', '2022-02-03', 1),
(120, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-03', 1),
(121, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 2),
(122, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 2),
(123, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 2),
(124, '', '2022-02-03', 1),
(125, '', '2022-02-03', 1),
(126, '', '2022-02-03', 1),
(127, '', '2022-02-03', 1),
(128, '', '2022-02-03', 1),
(129, '', '2022-02-03', 1),
(130, '', '2022-02-03', 1),
(131, '', '2022-02-03', 1),
(132, '', '2022-02-03', 1),
(133, '', '2022-02-03', 1),
(134, '', '2022-02-03', 1),
(135, '', '2022-02-03', 1),
(136, '', '2022-02-03', 1),
(137, '', '2022-02-03', 1),
(138, '', '2022-02-03', 1),
(139, '', '2022-02-03', 1),
(140, '', '2022-02-03', 1),
(141, '', '2022-02-03', 1),
(142, '', '2022-02-03', 1),
(143, '', '2022-02-03', 1),
(144, '', '2022-02-03', 1),
(145, '', '2022-02-03', 1),
(146, '', '2022-02-03', 1),
(147, '', '2022-02-03', 1),
(148, '', '2022-02-03', 1),
(149, '', '2022-02-03', 1),
(150, '', '2022-02-03', 1),
(151, '', '2022-02-03', 1),
(152, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-03', 1),
(153, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 2),
(154, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 2),
(155, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 2),
(156, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(157, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(158, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(159, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(160, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(161, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(162, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(163, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(164, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(165, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(166, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(167, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(168, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(169, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(170, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(171, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(172, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(173, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(174, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(175, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(176, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(177, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-03', 1),
(178, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(179, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(180, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(181, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(182, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(183, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(184, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(185, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(186, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(187, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(188, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(189, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(190, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(191, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(192, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(193, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-03', 1),
(194, '', '2022-02-03', 1),
(195, '', '2022-02-03', 1),
(196, '', '2022-02-03', 1),
(197, '', '2022-02-03', 1),
(198, '', '2022-02-03', 1),
(199, '', '2022-02-03', 1),
(200, '', '2022-02-03', 1),
(201, '', '2022-02-03', 1),
(202, '', '2022-02-03', 1),
(203, '', '2022-02-03', 1),
(204, '', '2022-02-03', 1),
(205, '', '2022-02-03', 1),
(206, '', '2022-02-03', 1),
(207, '', '2022-02-03', 1),
(208, '', '2022-02-03', 1),
(209, '', '2022-02-03', 1),
(210, '', '2022-02-03', 1),
(211, '', '2022-02-03', 1),
(212, '', '2022-02-03', 1),
(213, '', '2022-02-03', 1),
(214, '', '2022-02-03', 1),
(215, '', '2022-02-03', 1),
(216, '', '2022-02-03', 1),
(217, '', '2022-02-03', 1),
(218, '', '2022-02-03', 1),
(219, '', '2022-02-03', 1),
(220, '', '2022-02-03', 1),
(221, '', '2022-02-03', 1),
(222, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(223, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(224, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(225, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(226, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(227, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(228, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(229, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(230, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(231, '', '2022-02-04', 1),
(232, '', '2022-02-04', 1),
(233, '', '2022-02-04', 1),
(234, '', '2022-02-04', 1),
(235, '', '2022-02-04', 1),
(236, '', '2022-02-04', 1),
(237, '', '2022-02-04', 1),
(238, '', '2022-02-04', 1),
(239, '', '2022-02-04', 1),
(240, '', '2022-02-04', 1),
(241, '', '2022-02-04', 1),
(242, '', '2022-02-04', 1),
(243, '', '2022-02-04', 1),
(244, '', '2022-02-04', 1),
(245, '', '2022-02-04', 1),
(246, '', '2022-02-04', 1),
(247, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-04', 1),
(248, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-05', 1),
(249, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-05', 1),
(250, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-05', 1),
(251, '', '2022-02-05', 1),
(252, '', '2022-02-05', 1),
(253, '', '2022-02-05', 1),
(254, '', '2022-02-05', 1),
(255, '47bb69b0-db0f-019a-0178-32641bddcce8', '2022-02-05', 1),
(256, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-05', 20),
(257, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-06', 1),
(258, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-06', 1),
(259, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-06', 1),
(260, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-06', 1),
(261, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-06', 1),
(262, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(263, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(264, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(265, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(266, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(267, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(268, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(269, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(270, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(271, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(272, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(273, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(274, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(275, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(276, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(277, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(278, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(279, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(280, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(281, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(282, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(283, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(284, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(285, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(286, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(287, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(288, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(289, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(290, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(291, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(292, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(293, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(294, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(295, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(296, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(297, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(298, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(299, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(300, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(301, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(302, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(303, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(304, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(305, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(306, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(307, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(308, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(309, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(310, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(311, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(312, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(313, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(314, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(315, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(316, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(317, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(318, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(319, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(320, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(321, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(322, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(323, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(324, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(325, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(326, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(327, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(328, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(329, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(330, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(331, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(332, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(333, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(334, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(335, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(336, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(337, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(338, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(339, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(340, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(341, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(342, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(343, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(344, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(345, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(346, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-06', 1),
(347, '', '2022-02-06', 1),
(348, '', '2022-02-06', 1),
(349, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(350, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(351, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(352, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(353, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(354, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(355, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(356, '', '2022-02-07', 1),
(357, '', '2022-02-07', 1),
(358, '', '2022-02-07', 1),
(359, '', '2022-02-07', 1),
(360, '', '2022-02-07', 1),
(361, '', '2022-02-07', 1),
(362, '', '2022-02-07', 1),
(363, '', '2022-02-07', 1),
(364, '', '2022-02-07', 1),
(365, '', '2022-02-07', 1),
(366, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-07', 1),
(367, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(368, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(369, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(370, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(371, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(372, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(373, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(374, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(375, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(376, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(377, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(378, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(379, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(380, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(381, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(382, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(383, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(384, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(385, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(386, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(387, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(388, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(389, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(390, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(391, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(392, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(393, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(394, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(395, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(396, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(397, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(398, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(399, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(400, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(401, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(402, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(403, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(404, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(405, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(406, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(407, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(408, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(409, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(410, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(411, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-07', 1),
(412, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-07', 1),
(413, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-07', 1),
(414, '47bb69b0-db0f-019a-0178-32641bddcce8', '2022-02-07', 1),
(415, '47bb69b0-db0f-019a-0178-32641bddcce8', '2022-02-07', 1),
(416, '', '2022-02-07', 1),
(417, '', '2022-02-07', 1),
(418, '', '2022-02-07', 1),
(419, '', '2022-02-07', 1),
(420, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(421, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(422, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(423, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(424, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(425, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(426, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(427, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(428, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(429, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(430, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-08', 1),
(431, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-08', 1),
(432, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-08', 1),
(433, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-08', 1),
(434, '', '2022-02-08', 1),
(435, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(436, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(437, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(438, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-08', 1),
(439, '', '2022-02-09', 3),
(440, '', '2022-02-09', 3),
(441, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '2022-02-09', 1),
(442, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-09', 4),
(443, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-09', 4),
(444, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '2022-02-09', 4),
(445, '16d2019a-6124-4eb3-8b31-5565afac5397', '2022-02-09', 3),
(446, '47bb69b0-db0f-019a-0178-32641bddcce8', '2022-02-09', 5),
(447, '', '2022-02-10', 45),
(448, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-10', 5),
(449, '', '2022-02-11', 8),
(450, '47bb69b0-db0f-019a-0178-32641bddcce8', '2022-02-11', 3),
(451, '47bb69b0-db0f-019a-0178-32641bddcce8', '2022-02-13', 4),
(452, '', '2022-02-13', 6),
(453, '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', '2022-02-13', 1),
(454, '47750f46-3db1-4395-a713-b9a7e6d9b529', '2022-02-13', 1),
(455, '47750f46-3db1-4395-a713-b9a7e6d9b529', '2022-02-14', 1),
(456, '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', '2022-02-14', 1),
(457, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-15', 18),
(458, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-20', 10),
(459, '', '2022-02-20', 1),
(460, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-22', 11),
(461, '7962b98b-f95b-45fc-845b-6e2045094027', '2022-02-22', 2),
(462, '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', '2022-02-22', 3),
(463, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-23', 32),
(464, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-24', 51),
(465, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-25', 3),
(466, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-26', 30),
(467, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-02-28', 1),
(468, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-03-02', 16),
(469, '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', '2022-03-02', 1),
(470, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', '2022-03-03', 13),
(471, '', '2022-03-05', 4),
(472, 'c2fb5dbd-d4b3-01d7-018b-e04db763b362', '2022-03-05', 1),
(473, '322d3b26-2487-01b5-010c-79c8455984a5', '2022-03-05', 3),
(474, '322d3b26-2487-01b5-010c-79c8455984a5', '2022-03-07', 1829),
(475, 'ce90b2d6-5996-014d-01e8-c718adeed2d5', '2022-03-07', 1114),
(476, 'eebe61e0-f1b5-0186-010f-027e6c8753b3', '2022-03-07', 1213),
(477, '2491a988-428b-0104-01c8-604112496479', '2022-03-07', 1425),
(478, '9fa36c48-3e5e-01b8-0188-691dc55a9145', '2022-03-07', 1000),
(479, '', '2022-03-07', 8),
(480, '', '2022-03-09', 7),
(481, '', '2022-06-09', 12),
(482, '4eb03715-cf96-0164-01a6-95560a22f6a7', '2022-06-09', 34),
(483, 'ce90b2d6-5996-014d-01e8-c718adeed2d5', '2022-06-09', 4),
(484, 'eebe61e0-f1b5-0186-010f-027e6c8753b3', '2022-06-09', 2),
(485, '322d3b26-2487-01b5-010c-79c8455984a5', '2022-06-09', 66),
(486, 'c2fb5dbd-d4b3-01d7-018b-e04db763b362', '2022-06-09', 1),
(487, '68be0cf0-2362-0166-014d-4891aa2821b2', '2022-06-09', 5),
(488, '', '2022-06-10', 9),
(489, '322d3b26-2487-01b5-010c-79c8455984a5', '2022-06-10', 79),
(490, '2491a988-428b-0104-01c8-604112496479', '2022-06-10', 47),
(491, '68be0cf0-2362-0166-014d-4891aa2821b2', '2022-06-10', 34),
(492, '9fa36c48-3e5e-01b8-0188-691dc55a9145', '2022-06-10', 31),
(493, 'ce90b2d6-5996-014d-01e8-c718adeed2d5', '2022-06-10', 6),
(494, '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', '2022-06-10', 6),
(495, '322d3b26-2487-01b5-010c-79c8455984a5', '2022-06-11', 19),
(496, '', '2022-06-11', 2),
(497, 'eebe61e0-f1b5-0186-010f-027e6c8753b3', '2022-06-11', 10),
(498, 'aa8eee89-1832-01eb-0132-ef3bfa0e9c49', '2022-06-11', 20),
(499, '322d3b26-2487-01b5-010c-79c8455984a5', '2022-06-13', 2),
(500, '322d3b26-2487-01b5-010c-79c8455984a5', '2022-06-15', 136),
(501, 'aa8eee89-1832-01eb-0132-ef3bfa0e9c49', '2022-06-15', 2),
(502, '322d3b26-2487-01b5-010c-79c8455984a5', '2022-06-16', 4),
(503, '2491a988-428b-0104-01c8-604112496479', '2022-06-16', 6),
(504, 'ce90b2d6-5996-014d-01e8-c718adeed2d5', '2022-06-16', 6),
(505, 'eebe61e0-f1b5-0186-010f-027e6c8753b3', '2022-06-16', 6);

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
  `blog_ipfs_url` varchar(200) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`post_id`, `post_uid`, `user_uid`, `post_title`, `post_content`, `featured_image`, `post_tags`, `unlisted`, `pin_story`, `post_status`, `post_slug`, `meta_title`, `meta_description`, `blog_ipfs_url`, `from_ip`, `from_browser`, `created_at`, `updated_at`) VALUES
(1, '16d2019a-6124-4eb3-8b31-5565afac5397', '1723205b-c751-487b-bc14-1b3183edb3d4', 'ffff', '<p><br></p>', '1640541498.png', '.', 'false', 'false', 'deleted', 'ffff-8310cbac69 ', 'ffff | Shubham Gupt', 'ffff is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Sun, 26 Dec 2021 23:27:38 +0530', 'Sat, 22 Jan 2022 15:05:25 +0530'),
(2, 'ae280a04-d65c-4b4c-9149-4c53302fa7c6', '1723205b-c751-487b-bc14-1b3183edb3d4', 'ffff', '<p><br></p>', 'null', '', 'false', 'false', 'deleted', 'ffff-7818a770ea', 'ffff | Shubham Gupta', 'ffff is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Sun, 26 Dec 2021 23:30:07 +0530', 'Sun, 26 Dec 2021 23:30:17 +0530'),
(3, '1dfa9441-bf55-4d86-bee8-04c9a2028d8c', '1723205b-c751-487b-bc14-1b3183edb3d4', 'gggg', '<p><br></p>', '1640541831.png', '', 'false', 'false', 'deleted', 'gggg-aa0e613558', 'gggg | Shubham Gupta', 'gggg is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Sun, 26 Dec 2021 23:31:30 +0530', 'Sun, 26 Dec 2021 23:33:51 +0530'),
(4, 'c408ea2c-3a67-484f-a7f8-538450985cee', '1723205b-c751-487b-bc14-1b3183edb3d4', 'demo', '<p><br></p>', '1640545444.png', '', 'false', 'false', 'deleted', 'demo-9cb97d5bd2', 'demo | Shubham Gupta', 'demo is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Mon, 27 Dec 2021 00:29:33 +0530', 'Mon, 27 Dec 2021 00:34:04 +0530'),
(5, '69d5069d-8b58-4229-a01e-9ec821c77aa0', '1723205b-c751-487b-bc14-1b3183edb3d4', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>fffLorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p><br></p>', '', 'tag1', 'false', 'false', 'published', 'fLorem-Ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry--0192fc0990', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry. | Shubham Gupta', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry. is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'Fri, 31 Dec 2021 14:38:52 +0530', ''),
(6, '8e2682a9-ae7e-48b9-9f4b-c3b8725d2de7', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>', '', 'tag1,tag2', 'false', 'false', 'published', 'Lorem-Ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry--a4b1d953e5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. | Ajay Kumar', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. is published by Ajay Kumar.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'Sat, 01 Jan 2022 13:54:10 +0530', 'Sat, 01 Jan 2022 13:54:33 +0530'),
(7, '69d5069d-8b58-4229-a01e-9ec821c87aa0', '1723205b-c751-487b-bc14-1b3183edb3d4', 'Ipsum is simply dummy text of the printing and typesetting industry.', '<p>fffLorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br></p><p><br></p>', '', 'tag1', 'false', 'false', 'published', 'Ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry--0192fc0990', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry. | Shubham Gupta', 'fLorem Ipsum is simply dummy text of the printing and typesetting industry. is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'Fri, 31 Dec 2021 14:38:52 +0530', ''),
(8, '7962b98b-f95b-45fc-845b-6e2045094027', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'Lorem Ipsum is simply dummy text of the printing and typeset', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typesetLorem Ipsum&nbsp;is simply dummy text of the printing and typeset</span></p>', '1641980318.jpg', 'tag2', 'false', 'false', 'published', 'Lorem-Ipsum-is-simply-dummy-text-of-the-printing-and-typeset-594f0e3ff1', 'Lorem Ipsum is simply dummy text of the printing and typeset | Ajay Kumar', 'Lorem Ipsum is simply dummy text of the printing and typeset is published by Ajay Kumar.', '', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Mobile Safari/537.36', 'Wed, 12 Jan 2022 15:07:58 +0530', 'Wed, 12 Jan 2022 15:08:37 +0530'),
(9, '47750f46-3db1-4395-a713-b9a7e6d9b529', '1723205b-c751-487b-bc14-1b3183edb3d4', 'Story 1!!', '<p>HEllo world</p>', '', 'tag2', 'false', 'false', 'deleted', 'Story-1--502b099bc3', 'Story 1!! | Shubham Gupta', 'Story 1!! is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Wed, 26 Jan 2022 15:31:05 +0530', 'Wed, 26 Jan 2022 15:31:45 +0530'),
(10, '47bb69b0-db0f-019a-0178-32641bddcce8', '1723205b-c751-487b-bc14-1b3183edb3d4', 'Story 1', '<p>Hellllllllllo</p>', '1644559324.png', 'tag3', 'false', 'false', 'published', 'Story-1-f8f3118593', 'Story 1 | Shubham Gupta', 'Story 1 is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'Wed, 26 Jan 2022 15:37:03 +0530', '2022-02-11'),
(11, '28bb9066-6b47-4039-b1c9-9a67553896a9', 'undefined', 'j', 'ssdasfd', 'dsfd', 'erdgf', 'wedvfdg', 'dfgfh', 'dfgf', 'wert', 'swdefdg', 'dfdg', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Tue, 08 Feb 2022 11:02:08 +0530', ''),
(12, '8190cb89-54e0-42a8-8e3b-7c0c5ca3c7f6', 'undefined', 'ok', 'ok', 'o', 'ok', 'ok', 'ok', 'published', 'ok', 'ok', 'ok', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Tue, 08 Feb 2022 11:12:57 +0530', ''),
(13, '92cd9ee2-d490-457e-899e-d1c8ddb37205', 'undefined', 'NEw Post', 'Nothing here', '.', 'tag2', 'ok', 'no', 'published', 'cfvgbhnjmk,', 'sdcfvgbhnjmk,l', 'dcftvgybhnj', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-08', ''),
(14, '74204b13-6a00-4e83-8699-9d99bf03ddea', 'd9b23dd2-13a8-4cdd-b5a5-cc4c48521c10', 'serdtfyg', 'dcfvgbh', 'ghnj', 'cfgvhbnj', 'tgyhuji', 'true', 'published', 'fvgbh', 'gvhb', '                                              dfgcvhbjn', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-09', ''),
(16, '1729b8bb-3a1d-434e-9a8a-e572e8a49fe9', '1723205b-c751-487b-bc14-1b3183edb3d4', 'storytocheck', '<p>oktest1</p>', '1644766971.jpg', 'tag3,ok7', 'false', 'false', 'published', 'storytocheck-dc413a356e', 'storytocheck | Shubham Gupta', 'storytocheck is published by Shubham Gupta.', 'https://ipfs.io/ipfs/Qma16ASXZXv8KsHtu4H3DrhaP51A14XPv4Qnt4Mfd8iw6N', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-10', '2022-02-13'),
(17, '112b6f67-e06b-49d4-bf6d-a0e9f7c7324f', 'd9b23dd2-13a8-4cdd-b5a5-cc4c48521c10', 'title1', 'nothing', '1644486823.png', 'tag2', 'ok', 'true', 'published', 'h', 'no', 'ok', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-10', ''),
(22, 'c60fc101-fb6c-4871-b614-bcb9f1d450f8', 'd9b23dd2-13a8-4cdd-b5a5-cc4c48521c10', 'title1', 'nothing', '1644487076.png', 'tag2', 'ok', 'true', 'published', 'h', 'no', 'ok', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-10', ''),
(23, '9d6f6b37-f9eb-4925-a118-d1f671561593', '1723205b-c751-487b-bc14-1b3183edb3d4', 'one', 'one', '1644488485.png', 'tag1', 'one', 'true', 'published', 'ok ', 'meta1', 'oneoneone', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-10', 'Thu, 10 Feb 2022 15:51:24 +0530'),
(24, 'e47754c1-3ef2-010c-015c-763ba429f918', '1723205b-c751-487b-bc14-1b3183edb3d4', 'no', '<p>jns</p>', '1644488662.png', 'ok,ok1', 'true', 'false', 'published', 'no-07da139ad2', 'no | Shubham Gupta', 'no is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Thu, 10 Feb 2022 15:54:21 +0530', ''),
(26, '1a14738f-7ccf-017f-015b-46f60df2605d', '1723205b-c751-487b-bc14-1b3183edb3d4', 'title', '<p>ok</p>', '1644490071.png', 'ok,ok1', 'true', 'false', 'published', 'title-87dde8966f', 'title | Shubham Gupta', 'title is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Thu, 10 Feb 2022 16:17:50 +0530', ''),
(28, '29f158ca-8cb0-49b5-8d8c-75019b66982c', 'd9b23dd2-13a8-4cdd-b5a5-cc4c48521c10', 'final', 'okokok', '1644490234.png', 'tag4', 'no', 'true', 'published', 'ok', 'ok', 'ok', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-10', ''),
(37, 'f35bd473-1506-4b2f-960f-7f866fbbfa43', '1723205b-c751-487b-bc14-1b3183edb3d4', 'title', '<p>ok</p>', '1644555812.png', 'tag9', 'false', 'false', 'deleted', 'title-282c6ee67d', 'title | Shubham Gupta', 'title is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-11', '2022-02-11'),
(45, '224dfbeb-c22f-4334-a1d6-a62ada8b0376', '1723205b-c751-487b-bc14-1b3183edb3d4', 'titlwwww', '<p>vhbjn</p>', '1644555954.png', 'tag2', 'false', 'false', 'deleted', 'titlwwww-bbcf67e7e0', 'titlwwww | Shubham Gupta', 'titlwwww is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-11', '2022-02-11'),
(47, '58083272-27be-0143-0193-592efecf936f', '1723205b-c751-487b-bc14-1b3183edb3d4', 'vb n', '<p>vgjbhn</p>', '1644556037.png', 'ok1,hg', 'false', 'false', 'deleted', 'vb-n-6dae67e4f2', 'vb n | Shubham Gupta', 'vb n is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Fri, 11 Feb 2022 10:37:16 +0530', ''),
(54, 'e895d382-156e-4604-9689-0ee165a3a1b9', '1723205b-c751-487b-bc14-1b3183edb3d4', 'vb n', '<p>vgjbhn</p>', '1644556037.png', 'ok1,hg', 'false', 'false', 'deleted', 'vb-n-ff3b0144c6', 'vb n | Shubham Gupta', 'vb n is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-11', '2022-02-11'),
(55, 'c2dd2842-a9b5-01df-01c1-16aa21cb4494', '1723205b-c751-487b-bc14-1b3183edb3d4', 'fvhbjnk', '<p>cgvbhjn</p>', '1644556110.png', 'tag9', 'false', 'false', 'deleted', 'fvhbjnk-ebdb5755b0', 'fvhbjnk | Shubham Gupta', 'fvhbjnk is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Fri, 11 Feb 2022 10:38:30 +0530', ''),
(56, 'bb8d981d-04d3-432c-8a96-99fd8780a81c', '1723205b-c751-487b-bc14-1b3183edb3d4', 'fvhbjnk', '<p>cgvbhjn</p>', '1644556110.png', 'tag9', 'false', 'false', 'trash', 'fvhbjnk-b592ad2e13', 'fvhbjnk | Shubham Gupta', 'fvhbjnk is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-11', '2022-02-11'),
(57, '7c7995ee-b83f-48a7-8f9d-fb496fe11e07', '1723205b-c751-487b-bc14-1b3183edb3d4', 'fvhbjnk', '<p>cgvbhjn</p>', '1644556110.png', 'tag9', 'false', 'false', 'deleted', 'fvhbjnk-8998b5aebc', 'fvhbjnk | Shubham Gupta', 'fvhbjnk is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-11', '2022-02-11'),
(58, '42f67029-1c03-466f-9209-984039929b2f', '1723205b-c751-487b-bc14-1b3183edb3d4', 'fvhbjnk', '<p>cgvbhjn</p>', '1644556110.png', 'tag9', 'false', 'false', 'deleted', 'fvhbjnk-d7d5e03e0a', 'fvhbjnk | Shubham Gupta', 'fvhbjnk is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-11', ''),
(59, '2ef1c74f-4dec-44bd-80d0-2d33a1893df4', '1723205b-c751-487b-bc14-1b3183edb3d4', 'fvhbjnk', '<p>cgvbhjn</p>', '1644556110.png', 'tag9', 'false', 'false', 'deleted', 'fvhbjnk-b8d043d5f9', 'fvhbjnk | Shubham Gupta', 'fvhbjnk is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-11', '2022-02-11'),
(62, '080bda9e-1641-0164-013b-4ea32e44b6c1', '1723205b-c751-487b-bc14-1b3183edb3d4', 'j', '<p>gvhjn</p>', '1644556300.jpg', 'tag9', 'false', 'false', 'deleted', 'j-2edac0a84f', 'j | Shubham Gupta', 'j is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Fri, 11 Feb 2022 10:41:40 +0530', ''),
(72, '467e8b5f-9dc2-0103-0134-b935d724f449', '1723205b-c751-487b-bc14-1b3183edb3d4', 'tocheck', '<p>okok</p>', '1644556529.png', 're', 'false', 'false', 'published', 'tocheck-633df87af6', 'tocheck | Shubham Gupta', 'tocheck is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Fri, 11 Feb 2022 10:45:29 +0530', ''),
(73, '24f0c853-74ef-015e-015d-7f85825f5119', '1723205b-c751-487b-bc14-1b3183edb3d4', 'title', '<p>okok</p>', '1644556828.jpg', 'tag3', 'false', 'false', 'deleted', 'title-7a22ab6e7f', 'title | Shubham Gupta', 'title is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'Fri, 11 Feb 2022 10:50:27 +0530', ''),
(74, '5c126dfb-ac82-0191-01d3-071315c09091', '1723205b-c751-487b-bc14-1b3183edb3d4', 'The World', '<p>aesrdtfgyuhijokp</p>', '1646495597.png', 'World', 'false', 'false', 'published', 'The-World-acc7b1df7d', 'The World | Shubham Gupta', 'The World is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Sat, 05 Mar 2022 21:23:16 +0530', ''),
(75, '68be0cf0-2362-0166-014d-4891aa2821b2', '1723205b-c751-487b-bc14-1b3183edb3d4', 'The World', '<p>aesrdtfgyuhijokp kabs</p>', '1646495649.png', 'World', 'false', 'false', 'published', 'The-World-a2a5f05709', 'The World | Shubham Gupta', 'The World is published by Shubham Gupta.', 'https://ipfs.io/ipfs/QmUUtfigdLA4i2rSkZQkqD3drSfcDTSGPmZc4oi195Zsfm', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Sat, 05 Mar 2022 21:24:09 +0530', ''),
(76, 'e4c51fce-82a4-0165-01e6-593f6c8d5794', '1723205b-c751-487b-bc14-1b3183edb3d4', 'The World', '<h3>History of Earth:</h3><p>Scientific research has shown that the age of the earth is 4.54 billion years. Initially, the earth was in a molten state, but over time, water began to accumulate in the earth’s atmosphere and its surface cooled to form a crust. Shortly afterwards, the moon was formed.</p><p>Scientists believe that a body the size of Mars ,whose mass was one tenth of the Earth’s mass, collided with the Earth and as a result of this collision the moon came into being.</p><h3>Essential elements of earth</h3><p>The Earth’s atmosphere contains 78.08% nitrogen (N², dry air), 20.95% oxygen (O2), 0.930% argon, 0.039% carbon dioxide, water (climate change). The total surface area of ​​the earth is about 510,072,000 km2, of which 148,940,000 km2 or 29.2% is land and 361,132,000 km2 or 70.8% is water. In terms of area, about 71% of the earth’s surface is covered by saltwater seas, and the remaining 29% includes continents, islands and freshwater lakes.</p><p>Water is the beginning of life and water is essential for all forms of life, which do not currently exist on the surface of any planet in our solar system other than our earth.</p><h3>Affect of human activities on Earth</h3><p>The human population of the earth has exceeded 7.6 billion. And man is always engaged in wars over it. Due to overpopulation and human activities, the problems on earth that play an important role in life are disappearing. If this continues , there will be a time when resources will run out and there will be no life on earth.</p><p><br></p>', '1646495768.jpg', 'World', 'false', 'false', 'published', 'The-World-7bd680c462', 'The World | Shubham Gupta', 'The World is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Sat, 05 Mar 2022 21:26:08 +0530', ''),
(77, '0e12bb2b-27b3-0123-0127-62963b1dae72', '1723205b-c751-487b-bc14-1b3183edb3d4', 'The World', '<h3>History of Earth:</h3><p>Scientific research has shown that the age of the earth is 4.54 billion years. Initially, the earth was in a molten state, but over time, water began to accumulate in the earth’s atmosphere and its surface cooled to form a crust. Shortly afterwards, the moon was formed.</p><p>Scientists believe that a body the size of Mars ,whose mass was one tenth of the Earth’s mass, collided with the Earth and as a result of this collision the moon came into being.</p><h3>Essential elements of earth</h3><p>The Earth’s atmosphere contains 78.08% nitrogen (N², dry air), 20.95% oxygen (O2), 0.930% argon, 0.039% carbon dioxide, water (climate change). The total surface area of ​​the earth is about 510,072,000 km2, of which 148,940,000 km2 or 29.2% is land and 361,132,000 km2 or 70.8% is water. In terms of area, about 71% of the earth’s surface is covered by saltwater seas, and the remaining 29% includes continents, islands and freshwater lakes.</p><p>Water is the beginning of life and water is essential for all forms of life, which do not currently exist on the surface of any planet in our solar system other than our earth.</p><h3>Affect of human activities on Earth</h3><p>The human population of the earth has exceeded 7.6 billion. And man is always engaged in wars over it. Due to overpopulation and human activities, the problems on earth that play an important role in life are disappearing. If this continues , there will be a time when resources will run out and there will be no life on earth.</p><p><br></p>', '1646495801.jpg', 'World', 'true', 'true', 'published', 'The-World-58c4b17ff3', 'The World | Shubham Gupta', 'The World is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Sat, 05 Mar 2022 21:26:41 +0530', ''),
(78, 'c2fb5dbd-d4b3-01d7-018b-e04db763b362', '1723205b-c751-487b-bc14-1b3183edb3d4', 'The World', '<h3>History of Earth:</h3><p>Scientific research has shown that the age of the earth is 4.54 billion years. Initially, the earth was in a molten state, but over time, water began to accumulate in the earth’s atmosphere and its surface cooled to form a crust. Shortly afterwards, the moon was formed.</p><p>Scientists believe that a body the size of Mars ,whose mass was one tenth of the Earth’s mass, collided with the Earth and as a result of this collision the moon came into being.</p><h3>Essential elements of earth</h3><p>The Earth’s atmosphere contains 78.08% nitrogen (N², dry air), 20.95% oxygen (O2), 0.930% argon, 0.039% carbon dioxide, water (climate change). The total surface area of ​​the earth is about 510,072,000 km2, of which 148,940,000 km2 or 29.2% is land and 361,132,000 km2 or 70.8% is water. In terms of area, about 71% of the earth’s surface is covered by saltwater seas, and the remaining 29% includes continents, islands and freshwater lakes.</p><p>Water is the beginning of life and water is essential for all forms of life, which do not currently exist on the surface of any planet in our solar system other than our earth.</p><h3>Affect of human activities on Earth</h3><p>The human population of the earth has exceeded 7.6 billion. And man is always engaged in wars over it. Due to overpopulation and human activities, the problems on earth that play an important role in life are disappearing. If this continues , there will be a time when resources will run out and there will be no life on earth.</p><p><br></p>', '1646495834.jpg', 'World,mothernature', 'false', 'true', 'published', 'The-World-ec318d3853', 'The World | Shubham Gupta', 'The World is published by Shubham Gupta.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Sat, 05 Mar 2022 21:27:14 +0530', ''),
(79, '322d3b26-2487-01b5-010c-79c8455984a5', '1723205b-c751-487b-bc14-1b3183edb3d4', 'The World', '<h3><br></h3><p>Scientific research has shown that the age of the earth is 4.54 billion years. Initially, the earth was in a molten state, but over time, water began to accumulate in the earth’s atmosphere and its surface cooled to form a crust. Shortly afterwards, the moon was formed.</p><h3>Scientists believe that a body the size of Mars ,whose mass was one tenth of the Earth’s mass, collided with the Earth and as a result of this collision the moon came into being.</h3><p><br></p><p>The Earth’s atmosphere contains 78.08% nitrogen (N², dry air), 20.95% oxygen (O2), 0.930% argon, 0.039% carbon dioxide, water (climate change). The total surface area of ​​the earth is about 510,072,000 km2, of which 148,940,000 km2 or 29.2% is land and 361,132,000 km2 or 70.8% is water. In terms of area, about 71% of the earth’s surface is covered by saltwater seas, and the remaining 29% includes continents, islands and freshwater lakes.</p><p>Water is the beginning of life and water is essential for all forms of life, which do not currently exist on the surface of any planet in our solar system other than our earth.</p><h3>Affect of human activities on Earth</h3><p>The human population of the earth has exceeded 7.6 billion. And man is always engaged in wars over it. Due to overpopulation and human activities, the problems on earth that play an important role in life are disappearing. If this continues , there will be a time when resources will run out and there will be no life on earth.</p><p><br></p>', '1646495905.jpg', 'World', 'false', 'true', 'published', 'The-World-2ec8b7c0a9', 'The World | Shubham Gupta', 'The World is published by Shubham Gupta.', 'https://ipfs.io/ipfs/QmP3mEq9t96wWSGE2Jdf8ANXVj2m9TW1NJdzztTtJtbNgp', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Sat, 05 Mar 2022 21:28:24 +0530', ''),
(80, '9fa36c48-3e5e-01b8-0188-691dc55a9145', '1723205b-c751-487b-bc14-1b3183edb3d4', 'English Premier League', '<p><span style=\"color: rgb(67, 80, 89); background-color: rgb(255, 255, 255);\">The new English Premier League season is here; but before its arrival, several clubs made some intriguing moves. The ongoing summer transfer window is always wild, and teams can still bolster their rosters until August closes. There was plenty of spending at the top of the EPL (except Tottenham, again), and every club is gunning to take down Chelsea, who topped the table last year with a record-breaking 30 wins in one season and 93 total points.</span></p><p><span style=\"color: rgb(67, 80, 89); background-color: rgb(255, 255, 255);\">Lastly, Conte is no stranger to winning. He three-peated with Juventus in his final three seasons with the club and knows what it takes for a team to retain that high level of play to win. This experience will be crucial for the club if the</span></p><p><span style=\"color: rgb(67, 80, 89); background-color: rgb(255, 255, 255);\">The Diego Costa saga has supplied most of Chelsea’s headlines this summer, but they’ve also made some moves and it wouldn’t be surprising if they made another key deal for a solid role player. As opposed to last season, squad depth takes on a new challenge this season since they’re in the Champions League. Surely, Conte wants to play his best squad for those matches, which means there will likely be much more rotation than last season, when they didn’t play in any European competition — a huge benefit.</span></p><p><span style=\"color: rgb(67, 80, 89); background-color: rgb(255, 255, 255);\"> </span></p><p><span style=\"color: rgb(67, 80, 89); background-color: rgb(255, 255, 255);\"> Chelsea’s only notable departure this offseason was Nemanja Matic, who left to rejoin Jose Mourinho at Manchester United. The Blues replaced him with Tiemoué Bakayoko, who had an impressive season in Monaco last year and is probably an upgrade over Matic, whose offensive skills were quite limited in the midst of showing inconsistent tendencies on defense.</span></p><p><span style=\"color: rgb(67, 80, 89); background-color: rgb(255, 255, 255);\"> y hope to repeat as champions.</span></p>', '1646642975.png', 'football,epl', 'false', 'true', 'published', 'English-Premier-League-75e80f81fb', 'English Premier League | Shubham Gupta', 'English Premier League is published by Shubham Gupta.', 'https://ipfs.io/ipfs/QmcuqSTftoW7DQ8DTp2hvTw81jxGTkM4baDvJEHBJY5DVp', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Mon, 07 Mar 2022 14:19:35 +0530', ''),
(81, '2491a988-428b-0104-01c8-604112496479', '1723205b-c751-487b-bc14-1b3183edb3d4', 'Ancient History', '<p>T<span style=\"color: rgb(31, 32, 36); background-color: rgb(255, 255, 255);\">he variety of societies in West Africa is significant, and it is hard to describe the history of all of its people by finding a few common traits and historical episodes. Nevertheless, it is vital that the influence of the great rivers, the abundance of gold, Islam, and European colonization have all contributed to the history of the region. One of the most prominent episodes in the history of West Africa is the golden age of Ancient Mali, a kingdom which was a source of inspiration for the nations which emerged as a result of the decolonization process. The author of “An Epic of Old Mali” describes rich cultural traditions preserved by griots. They represent the structure of the Malinke society, the role of kings, sorcerers, Islam, and tributary relationships1. The economy of the prosperous ancient state that was based on trade and gold exports, and its culture allow for a more comprehensive understanding of both the continent’s past and future.</span></p><p><span style=\"color: rgb(31, 32, 36); background-color: rgb(255, 255, 255);\">One of the examples of the advantages that the geography of West Africa provides is the story of the establishment and the development of the Mali Empire. The vast territories which its rulers controlled included completely different terrains, people, and cultures. The enormous deposits of gold became one of the main factors contributing to the rapid development of the state.2&nbsp;The demand for the precious metal showed steady growth throughout the Middle Ages, and the lack of a similarly high concentration of gold mines in the Old World allowed the state to impose extremely high tariffs on gold trade. Moreover, the trade in copper and salt was also a major source of the initial wealth. It was used by the first Mali kings to establish institutions and the military capable of maintaining the order in the state.</span></p><p><span style=\"color: rgb(31, 32, 36); background-color: rgb(255, 255, 255);\">Moreover, the geographical position of West Africa did not allow for well-established trade contacts between rather isolated settlements scattered across the country. Despite the fact that the societies that later became a part of the Mali Empire mainly included various types of farmers, herders, and even gold miners, they did not have any intention of cooperating and trading with each other. The underpopulation of the region and modest surpluses of production have historically encouraged local self-sufficiency.3&nbsp;Moreover, the region’s population did not build sophisticated roads and did not utilize wheeled vehicles, preferring pack-animals. Merchants from the outside world also did not have many incentives to visit these isolated places that lacked infrastructure and ethnic make-up which made communication difficult, as various groups had different cultural features and languages.</span></p>', '1646643164.jpg', 'history', 'false', 'true', 'published', 'Ancient-History-167f247745', 'Ancient History | Shubham Gupta', 'Ancient History is published by Shubham Gupta.', 'https://ipfs.io/ipfs/QmYkcHuGiT3kveSR6PFMopAZ7eiGAPwfgwJTmnKXAfSZ2D', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Mon, 07 Mar 2022 14:22:44 +0530', ''),
(82, 'eebe61e0-f1b5-0186-010f-027e6c8753b3', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'International Politics', '<p>President Bush agreed with his opponent “that the biggest threat </p><p>facing this country is weapons of mass destruction in the hands </p><p>of a terrorist network.” 2  The novelist Melvin Jules Bukiet </p><p>recently wrote: “There’s a sense that Los Alamos can be found in </p><p>the family attic these days, everyone has it, everyone’s doing </p><p>it. This is the war of the rest of our lives.” 3 Recent public </p><p>opinion polls indicate that a majority of Americans expect the </p><p>United States to be attacked again by terrorists, this time </p><p>using weapons of mass destruction. 4  In this paper, I will </p><p>discuss briefly the potential consequences of an atomic attack </p><p>on the US, some technical issues and whether terrorists may be </p><p>working on acquiring or may already have an atomic weapon, </p><p>security and intelligence issues, and what should the US do, </p><p>both at the international and domestic levels, to keep the</p><p>nation safe against nuclear terrorism.</p><p>There are basically two types of atomic weapons. The first </p><p>is a “gun-type” weapon where a mass of highly enriched uranium, </p><p>or HEU, is shot down a tube into another HEU mass, creating a </p><p>supercritical mass and nuclear explosion. 6 This is the simplest </p><p>and most reliable nuclear fission weapon, so reliable in fact </p><p>that it was used untested in the Hiroshima bomb. 7  Weapons grade </p><p>refers to purified fissile material that is most suitable for </p><p>use in a nuclear weapon. A concentration of more than 90 percent </p><p>is optimal for both uranium 235 and plutonium 239 (Rhodes, 1986, </p><p>p. 8). Nuclear material with much lower concentrations can be </p><p>used in nuclear weapons, but uranium at concentrations less than </p><p>20 percent cannot be used for this purpose. 8 </p><p><br></p><p>5 Terrorism Project. (2001). What if the Terrorists Go Nuclear? http://www.cdi.org/terrorism/nuclear-pr.cfm </p><p>(accessed 28 Feb 2009).</p><p>p. 1.</p><p>6 Jonathan Medalia. (2004). Nuclear Terrorism: A Brief Review of Threats and Responses. CRS Report for </p><p>Congress. September 22, p. 3.</p><p>7 Beckman et al, op. cit., p. 376.</p><p><br></p><p>8 Richard Rhodes. (1986). The Making of the Atomic Bomb. New York: Simon and Schuster, p. 9.</p><p><br></p><p>4</p><p>The other bomb is an implosion bomb, which normally uses </p><p>weapons-grade plutonium (WGPU) composed mainly of the isotope </p><p>239. 9 A shell of this material is surrounded by chemical </p><p>explosives arrayed to produce a symmetrical inward-moving </p><p>implosion shock wave that compresses the plutonium enough to be </p><p>supercritical. The bomb detonated at Nagasaki was of this type. </p><p>    </p><p>     </p>', '1646643975.png', 'World,politics', 'false', 'true', 'published', 'International-Politics-5166869e48', 'International Politics | Ajay Kumar', 'International Politics is published by Ajay Kumar.', 'https://ipfs.io/ipfs/QmWthBDUJEzjBXubfiRaLbi9L3JMwKRk4bHutjwiux2MWv', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Mon, 07 Mar 2022 14:36:15 +0530', ''),
(83, 'ce90b2d6-5996-014d-01e8-c718adeed2d5', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'ICC tournament', '<p>Cricket World Cup is the biggest international event of cricket. The first Cricket World Cup was played during 1975 in England (www. wikipedia. org). The first three matches were also recognized as Prudential Cup with the sponsorship of prudential plc, it is a pecuniary services company. Till the1992 Cricket World Cup, only 8 teams used to participate in the tournament. Later on, the number of teams increased and in Cricket World Cup2007, 16 teams had participated. But in 2011 Cricket World Cup 14 teams are participating. Introduction</p><p class=\"ql-align-justify\">Cricket is a sport that has been played around the world for more than eight centuries. It is one of the most well-loved and feverishly watched sports in the&nbsp;world. It involves two teams with 11 players on each side. The captain who wins the toss decides whether his team bats or bowls first. If they bat first, their aim is to score a lot of runs and make sure the other team does not reach that score. Cricket is played in many formats, but the most popular are Test cricket And One Day cricket. In Test cricket game goes on for 5 days, with each team batting twice - if time permits.</p><p class=\"ql-align-justify\">The first attempt at any kind of world championship was in 1912, when a three-way series was arranged between the then current Test playing nations, Australia, England and South Africa. No similar events were held again until 1975. The first ICC World Cup (officially called the Prudential Cup) was in1975, hosted by England (see full list of host countries). This tournament included the six Test-playing nations (England, Australia, New Zealand, West Indies, India and Pakistan), who were joined by Sri Lanka and East Africa. Following the success of this tournament, it was repeated in 1979 and 1983 in England.</p><p class=\"ql-align-justify\">After this, the tournament moved to be played in other countries, maintaining a four-year cycle. 60 overs were used for the first three world cups. This was reduced to 50 in 1987 and has been that way since. Women also participate in another Cricket World cup since 1975. Cricket World Cup Hosting Nations England, 1975 This was the first ever Cricket World Cup, officially called the Prudential Cup, and was held from June 7 to June 21, 1975 in England. The tournament was held in England as it was considered the only nation at the time that had the resources to stage an event of such magnitude.</p><p><br></p>', '1646644334.jpg', 'World,cricket', 'false', 'true', 'published', 'ICC-tournament-7dd931d944', 'ICC tournament | Ajay Kumar', 'ICC tournament is published by Ajay Kumar.', 'https://ipfs.io/ipfs/Qme8Y93UEfLkzZL7PPYMQNiMtSjGFQRUaeLCQHMAH6J5HV', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'Mon, 07 Mar 2022 14:42:14 +0530', ''),
(84, 'ba2d7a08-dce8-01e5-0117-8edb597e3373', '\r\nWarning:  Undefined variable $user_uid in C:xampphtdocscms-mediumcreate-story.php on line 153\r\n', 'chandan is the best', '<p>Hello this is my new story Have you ever listen it</p>', '1654752379.jpg', 'new,hello', 'false', 'true', 'published', 'chandan-is-the-best-5328217360', 'chandan is the best | ', 'chandan is the best is published by .', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Thu, 09 Jun 2022 10:56:18 +0530', ''),
(85, '4eb03715-cf96-0164-01a6-95560a22f6a7', '15f72840-75de-015e-0131-40fe0cfab9e6', 'chandan is the best', '<p>Hello I am chandan vishwakarma</p>', '1654772327.jpg', 'new', 'false', 'false', 'published', 'chandan-is-the-best-93ec2aa0dd', 'chandan is the best | Chandan', 'chandan is the best is published by Chandan.', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Thu, 09 Jun 2022 11:07:45 +0530', '2022-06-09'),
(86, 'aa8eee89-1832-01eb-0132-ef3bfa0e9c49', 'b0ed11d8-e617-01ae-018c-6a41938a15cf', 'This is new Story', '<p>Hello I am new Story</p>', '1654945638.png', 'new', 'false', 'true', 'published', 'This-is-new-Story-2ff7a9a9d9', 'This is new Story | aarya sharma', 'This is new Story is published by aarya sharma.', 'https://ipfs.io/ipfs/QmTtD68EmEJjeS98tu8zUyyaY8srjh7hkEr15opKnDfdGy', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Sat, 11 Jun 2022 16:37:17 +0530', '');

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
(1, 'tag9', '', 'Wed, 12 Jan 2022 10:07:36 +0530'),
(2, 'tag2', '', ''),
(3, 'tag3', '', ''),
(4, 'tag 4', '', ''),
(5, 'tag', 'Wed, 12 Jan 2022 14:42:12 +0530', ''),
(6, 'tag54', 'Mon, 07 Feb 2022 12:28:08 +0530', ''),
(7, 'tag11', 'Mon, 07 Feb 2022 12:32:32 +0530', ''),
(8, 'tag22', 'Mon, 07 Feb 2022 12:35:14 +0530', ''),
(9, 'tag4', 'Mon, 07 Feb 2022 12:36:09 +0530', ''),
(10, 'tag45', 'Tue, 08 Feb 2022 10:24:09 +0530', ''),
(11, 're', 'Tue, 08 Feb 2022 10:39:32 +0530', ''),
(12, 're', 'Tue, 08 Feb 2022 10:39:33 +0530', ''),
(13, 're', 'Tue, 08 Feb 2022 10:39:34 +0530', ''),
(14, 'tag222', 'Tue, 08 Feb 2022 10:42:42 +0530', ''),
(15, 'haha', 'Tue, 08 Feb 2022 22:28:58 +0530', ''),
(16, 'ok1', 'Wed, 09 Feb 2022 19:26:58 +0530', ''),
(17, 'ok2', 'Wed, 09 Feb 2022 19:31:39 +0530', ''),
(18, 'hg', 'Fri, 11 Feb 2022 10:36:56 +0530', ''),
(19, 'ok7', 'Sun, 13 Feb 2022 21:12:18 +0530', ''),
(20, 'World', 'Sat, 05 Mar 2022 20:54:40 +0530', ''),
(21, 'Earth', 'Sat, 05 Mar 2022 20:54:52 +0530', ''),
(22, 'mothernature', 'Sat, 05 Mar 2022 20:55:04 +0530', ''),
(23, 'lifeonearth', 'Sat, 05 Mar 2022 20:55:15 +0530', ''),
(24, 'football', 'Mon, 07 Mar 2022 14:16:16 +0530', ''),
(25, 'epl', 'Mon, 07 Mar 2022 14:16:23 +0530', ''),
(26, 'history', 'Mon, 07 Mar 2022 14:22:36 +0530', ''),
(27, 'politics', 'Mon, 07 Mar 2022 14:36:05 +0530', ''),
(28, 'cricket', 'Mon, 07 Mar 2022 14:39:27 +0530', '');

-- --------------------------------------------------------

--
-- Table structure for table `terms_of_use`
--

CREATE TABLE `terms_of_use` (
  `id` int(200) NOT NULL,
  `uuid` varchar(200) NOT NULL,
  `terms` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, '', '1723205b-c751-487b-bc14-1b3183edb3d4', 'tag3', '', '', '', ''),
(11, '', 'ab05490a-5153-4aae-b7a8-a40d6cf52955', 'tag', '', '', '', ''),
(21, '', '1723205b-c751-487b-bc14-1b3183edb3d4', 'tag9', '', '', '', ''),
(22, '', '1723205b-c751-487b-bc14-1b3183edb3d4', 'tag2', '', '', '', ''),
(23, '', '1723205b-c751-487b-bc14-1b3183edb3d4', 'tag2', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(20) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `metamask_address` varchar(200) NOT NULL,
  `first_time_login` varchar(200) NOT NULL,
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
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_uid`, `metamask_address`, `first_time_login`, `name`, `username`, `email`, `password`, `profile`, `bio`, `code`, `email_status`, `account_status`, `from_ip`, `from_browser`, `created_at`, `updated_at`) VALUES
(3, '1723205b-c751-487b-bc14-1b3183edb3d4', '', '', 'Shubham Gupta', 'shubham8028', 'shubham8028@gmail.com', '$2y$10$vrvOWEPP9j5uxc0E/IL5.erpvx90V9b2.viLfr4tqvTKEoupOh732', '1646493742.png', 'I am a web developer turned travel blogger that is forced to code to eat.', 0, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '2022-01-11', '2022-03-05'),
(4, 'ab05490a-5153-4aae-b7a8-a40d6cf52955', '', '', 'Ajay Kumar', 'ajay', 'ajay@gmail.com', '$2y$10$vrvOWEPP9j5uxc0E/IL5.erpvx90V9b2.viLfr4tqvTKEoupOh732', '1646653640.png', '', 0, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '2022-01-25', '2022-03-07'),
(5, '32cba5c9-ae06-4e44-b83d-8b34c148c0b2', '', '', 'Raman Kumar', 'raman', 'raman@gmail.com', '$2y$10$DUVBk8w.dpDxEgzhmEbw6OSbDaN4lKEk8gy6ae1PPGouz3nO6uVHW', '', '', 0, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-11', ''),
(7, 'd9b23dd2-13a8-4cdd-b5a5-cc4c48521c10', '', '', 'Abhinav nagar', 'Abhinavji89', 'Abhinavji89@gmail.com', '$2y$10$fl191SNTlMQ9gNbFzRWhuekjQT2EBpViTpa7mS1kyVJ2ZDpmbAkx2', 'Abhinav', 'ok', 763242, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-08', ''),
(8, '5f2ce1a5-1b31-42d4-9614-18140869451f', '', '', 'user1', 'okok', 'okok@gmail.com', '$2y$10$tY18T.H0Sasj3sCrnj1.G.unWKmZOvkeV71OPcCNZgzXbKL8i30lW', '1644487852.png', 'nothing', 0, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-10', ''),
(9, 'f12bc7b3-2936-4255-aca1-3f581abbe36f', '', '', 'o', 'vgb', 'vgb@ok.vpm', '$2y$10$Cnz2810CWAUitr53mhE/r.D8Yt.GekDvAjwXX57HB49z3LwnXRoC.', '1644489403.jpg', 'j', 0, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', '2022-02-10', ''),
(10, '6c03469e-06d2-4ba0-b140-bce7eb3ac9c1', '', '', 'Abhinav Nagar', 'abhinav', 'abhinav@gmail.com', '$2y$10$AZe5oQHxUt5er12tf8X.f.ygBcsbQ/2tMzMClGxTYS.bugZFWLaPu', '', '', 995820, 'notverified', 'inactive', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2022-03-05', ''),
(23, 'b0ed11d8-e617-01ae-018c-6a41938a15cf', '0xed9b1756dbf760a79547677f598bf001dad50fd1', 'true', 'aarya sharma', 'vishwakarmachandan336', 'vishwakarmachandan336@gmail.com', '', '', '', 0, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_eth`
--
ALTER TABLE `donate_eth`
  ADD PRIMARY KEY (`donate_id`);

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
-- Indexes for table `metamask_login`
--
ALTER TABLE `metamask_login`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `address` (`address`);

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
-- Indexes for table `terms_of_use`
--
ALTER TABLE `terms_of_use`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donate_eth`
--
ALTER TABLE `donate_eth`
  MODIFY `donate_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `editor_choice`
--
ALTER TABLE `editor_choice`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

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
  MODIFY `meta_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `metamask_login`
--
ALTER TABLE `metamask_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `like_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `post_list`
--
ALTER TABLE `post_list`
  MODIFY `list_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `post_subcomments`
--
ALTER TABLE `post_subcomments`
  MODIFY `subcomment_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `post_views_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `terms_of_use`
--
ALTER TABLE `terms_of_use`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topic_follow`
--
ALTER TABLE `topic_follow`
  MODIFY `topic_follow_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
