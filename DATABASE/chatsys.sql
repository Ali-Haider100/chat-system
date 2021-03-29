-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 08:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `friends` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `frndStatus` varchar(255) NOT NULL,
  `rqstStatus` varchar(255) NOT NULL,
  `requestDate` varchar(255) NOT NULL,
  `emailStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `email`, `username`, `friends`, `identity`, `frndStatus`, `rqstStatus`, `requestDate`, `emailStatus`) VALUES
(55, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'off', 'friended', '2021-01-14 11:50:14 AM', 'off'),
(56, 'daaade32526f8b8bf71f8fc547ad06b86ba06797', 'ali haider', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', 'off', 'friended', '2021-01-49 11:54:49 AM', 'off'),
(57, '405009c61a8483b7832d6b91d739862a7ccd5072', 'chess', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', 'off', 'pending', '2021-01-02 11:55:02 AM', 'off'),
(61, 'daaade32526f8b8bf71f8fc547ad06b86ba06797', 'ali haider', 'gazalle', '444014719329ee15220b6a9105fe25803092e696', 'off', 'pending', '2021-03-39 07:26:39 AM', 'off'),
(62, '444014719329ee15220b6a9105fe25803092e696', 'gazalle', 'haider', 'd02d616b037a5187dd863157fa2951656511506d', 'off', 'friended', '2021-03-17 07:28:17 AM', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `friends` varchar(255) NOT NULL,
  `requests` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  `newone` varchar(255) NOT NULL,
  `statuss` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `image`, `name`, `email`, `password`, `friends`, `requests`, `members`, `newone`, `statuss`) VALUES
(26, 'ali haider.jpg', 'ali haider', 'daaade32526f8b8bf71f8fc547ad06b86ba06797', '4fe3d04c17b9bcbac9eb1fd08548b934001a924e', '1', '1', '10', '2021-01-11', 'off'),
(27, 'user3-128x128.jpg', 'girl user', 'c0556c2efb85e93037681164036c8d2c3fc91ee1', 'ced3da5c49bcb10dbf6492b5bb3801da43f36523', '0', '0', '10', '2021-01-12', 'off'),
(33, 'user3-128x128.jpg', 'girl', '122c869709c23ae45f449c553a5f0368bf2bd448', '68f84d16a9d1f1fa6948039f274e323fcf7838ee', '0', '0', '10', '2021-01-11', 'off'),
(35, 'user7-128x128.jpg', 'chess', '405009c61a8483b7832d6b91d739862a7ccd5072', '796e34d3540c047545a59d5875de91e4c1edb284', '0', '1', '10', '2021-01-12', 'off'),
(36, 'Selection_003.png', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '58455568aff48ad9187f3c297c15b1b5ed4f4f7d', '2', '0', '10', '21/01/2021', 'off'),
(38, 'unnamed.jpg', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '8c83a0ecbf1a17c2807c014cac11d55210b65637', '1', '0', '10', '2021-01-21', 'off'),
(39, 'gazelle-5992510_1280.jpg', 'gazalle', '444014719329ee15220b6a9105fe25803092e696', 'b8e98f7e9469666dc8b4058953407a8e56959e08', '1', '0', '10', '2021-03-09', 'off'),
(40, 'new.jpg', 'haider', 'd02d616b037a5187dd863157fa2951656511506d', '6ca96a88a151c418a355aaf80bebfa1a9a285915', '1', '0', '10', '2021-03-09', 'off'),
(41, 'qrcode_chrome.png', 'dino', 'd85a15527450004fc9c4160eefafc39bc97a696e', 'f47488793e0e95648033a4af34faeefc2432397a', '0', '0', '10', '2021-03-09', 'newOff');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `friendone` varchar(255) NOT NULL,
  `nameone` varchar(255) NOT NULL,
  `nametwo` varchar(255) NOT NULL,
  `friendtwo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `msgStatus` varchar(255) NOT NULL,
  `tming` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `friendone`, `nameone`, `nametwo`, `friendtwo`, `content`, `msgStatus`, `tming`) VALUES
(24, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '52TE4PFugn36tKjXlMerkg7OtQ==', 'read', '2021-01-21 03:52:05 PM'),
(25, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', 'xivSrbB6jjPm+7WYhpW+lRmboPHz', 'read', '2021-01-21 03:53:12 PM'),
(26, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '5ivSrbB6jjPm+6mYng==', 'read', '2021-01-21 03:53:23 PM'),
(27, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '/GSTuf9pxzzxvv2Rg9qyxwjOq/XjAQ==', 'read', '2021-01-21 03:53:41 PM'),
(28, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '9m7A4Pk8hjCjva+YnJWrkg7QvOc=', 'read', '2021-01-21 03:53:54 PM'),
(29, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '7mXX4Od0gi/m+7yFlJWmiAmbv+zpFQ==', 'read', '2021-01-21 03:54:23 PM'),
(30, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '9m6TqbB9in3lqbKa0cW+jBXIrf/o', 'read', '2021-01-21 03:54:38 PM'),
(31, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '4GCToul5xzjxr6iFhNk=', 'read', '2021-01-21 03:55:20 PM'),
(32, 'daaade32526f8b8bf71f8fc547ad06b86ba06797', 'ali haider', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', 'x2KS4NVukyjxrrHb0f2wkFzaq/umIZRX', 'read', '2021-01-21 04:00:30 PM'),
(33, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'ali haider', 'daaade32526f8b8bf71f8fc547ad06b86ba06797', '9m7b4Pk8hjCjvbSZlA==', 'read', '2021-01-21 04:00:46 PM'),
(34, 'daaade32526f8b8bf71f8fc547ad06b86ba06797', 'ali haider', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '+2PStLBqgi/6+7OektA=', 'read', '2021-01-21 04:01:01 PM'),
(35, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'ali haider', 'daaade32526f8b8bf71f8fc547ad06b86ba06797', '52aTr/s8kDXir/2Wg9D/nhPO+frpEZVFvey4ypYByxoY', 'read', '2021-01-21 04:01:27 PM'),
(36, 'daaade32526f8b8bf71f8fc547ad06b86ba06797', 'ali haider', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', 'wWTHqPlygH3wq7iUmNSz', 'read', '2021-01-21 04:02:02 PM'),
(37, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'ali haider', 'daaade32526f8b8bf71f8fc547ad06b86ba06797', '4GCTp/9zgw==', 'read', '2021-01-21 04:02:12 PM'),
(38, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '527K4PN0gj7o9/2UkNmzxxHe+fznG5ACsaKg1dMLihoEmbBaMyjJ14712UaMrNoJUA==', 'read', '2021-01-21 04:02:58 PM'),
(39, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '9n7D7rA8ji6jr7WSg9D/hhLC+ff1C45H', 'read', '2021-01-21 04:05:11 PM'),
(40, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '52TE4PFugn36tKg=', 'read', '2021-01-21 04:09:41 PM'),
(41, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '5ivSrbB6jjPm', 'read', '2021-01-21 04:10:00 PM'),
(42, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '4GXW4P15lC7ivLg=', 'read', '2021-01-21 04:15:42 PM'),
(43, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '+2Pas7B1lH3ktLKT', 'read', '2021-01-21 05:28:47 PM'),
(44, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '7mnQ', 'read', '2021-01-21 05:32:41 PM'),
(45, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', 'zknw8g==', 'read', '2021-01-21 05:34:17 PM'),
(46, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', 'zknw8w==', 'read', '2021-01-21 05:34:39 PM'),
(47, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '7g==', 'read', '2021-01-21 05:37:02 PM'),
(48, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '7Q==', 'read', '2021-01-21 05:37:15 PM'),
(49, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '52rd4PJ0jn3oorzXmdSzi1zTuPc=', 'read', '2021-01-21 05:47:00 PM'),
(50, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '5WKTtPh3xzX2', 'read', '2021-01-21 05:47:19 PM'),
(51, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '527K', 'read', '2021-01-21 05:50:56 PM'),
(52, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '6GTcpA==', 'read', '2021-01-21 05:51:27 PM'),
(53, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '4GXW', 'read', '2021-01-21 05:59:47 PM'),
(54, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '+3zc', 'read', '2021-01-21 06:00:03 PM'),
(55, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '+2Pas7B1lH3ktLKT', 'read', '2021-01-21 06:03:13 PM'),
(56, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '+2Pas7B1lA==', 'read', '2021-01-21 06:04:20 PM'),
(57, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '7mnQ', 'read', '2021-01-21 06:06:03 PM'),
(58, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '7mjboQ==', 'read', '2021-01-21 06:06:20 PM'),
(59, '80a7e82f24ff40d705061729d54be30fa9757e9f', 'erturul', 'check', '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', '52berQ==', 'read', '2021-01-21 06:06:53 PM'),
(60, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '7mU=', 'read', '2021-01-21 06:19:27 PM'),
(61, '8a71e72a289c7432ba4a0de35e6cb8a112f30b82', 'check', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '+2Pas7B1lH30tK+cmNu4xx3Vvb7iF5VH', 'read', '2021-01-21 06:28:03 PM'),
(64, 'daaade32526f8b8bf71f8fc547ad06b86ba06797', 'ali haider', 'erturul', '80a7e82f24ff40d705061729d54be30fa9757e9f', '52KTqP9txzzm+6SYhJWyggibuPjyHYkC/KKh2MQcig8EgvcNLi3Ikg==', 'unread', '2021-01-30 11:42:22 PM'),
(65, '444014719329ee15220b6a9105fe25803092e696', 'gazalle', 'haider', 'd02d616b037a5187dd863157fa2951656511506d', 'x2TE4PFugn36tKjXmdS2gxnJ', 'read', '2021-03-09 11:30:07 AM'),
(66, 'd02d616b037a5187dd863157fa2951656511506d', 'haider', 'gazalle', '444014719329ee15220b6a9105fe25803092e696', 'xive4PZ1iTg=', 'read', '2021-03-09 11:30:22 AM'),
(67, '444014719329ee15220b6a9105fe25803092e696', 'gazalle', 'haider', 'd02d616b037a5187dd863157fa2951656511506d', '+2PStOM8gDLsv/PZ3w==', 'read', '2021-03-09 11:30:41 AM'),
(68, '444014719329ee15220b6a9105fe25803092e696', 'gazalle', 'haider', 'd02d616b037a5187dd863157fa2951656511506d', '+GPStLB9lTijorKC0dGwjhLc', 'read', '2021-03-09 11:30:54 AM'),
(69, 'd02d616b037a5187dd863157fa2951656511506d', 'haider', 'gazalle', '444014719329ee15220b6a9105fe25803092e696', '5ive4PRzjjPk+7qYntE=', 'read', '2021-03-09 11:31:15 AM'),
(70, 'd02d616b037a5187dd863157fa2951656511506d', 'haider', 'gazalle', '444014719329ee15220b6a9105fe25803092e696', '7mnQ', 'read', '2021-03-09 12:10:32 PM'),
(71, '444014719329ee15220b6a9105fe25803092e696', 'gazalle', 'haider', 'd02d616b037a5187dd863157fa2951656511506d', '+2Pas7B1lH3ktLKT', 'read', '2021-03-09 12:10:48 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
