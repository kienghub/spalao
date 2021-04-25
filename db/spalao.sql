-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2021 at 05:48 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spa`
--

-- --------------------------------------------------------

--
-- Table structure for table `spa_bill`
--

CREATE TABLE `spa_bill` (
  `bill_id` varchar(200) DEFAULT NULL,
  `bill_no` varchar(200) DEFAULT NULL,
  `bill_qty` int(100) DEFAULT NULL,
  `bill_price_for_course` varchar(255) DEFAULT NULL,
  `bill_price_for_time` varchar(255) DEFAULT NULL,
  `bill_total` varchar(255) DEFAULT NULL,
  `bill_status` varchar(255) DEFAULT NULL,
  `bill_createdAt` varchar(255) DEFAULT NULL,
  `bill_createdBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `spa_branch`
--

CREATE TABLE `spa_branch` (
  `_id` int(11) NOT NULL,
  `branch_id` varchar(100) DEFAULT NULL,
  `branch_name_l` varchar(55) DEFAULT NULL,
  `branch_name_e` varchar(55) DEFAULT NULL,
  `branch_createdAt` datetime DEFAULT NULL,
  `branch_createdBy` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_branch`
--

INSERT INTO `spa_branch` (`_id`, `branch_id`, `branch_name_l`, `branch_name_e`, `branch_createdAt`, `branch_createdBy`) VALUES
(1, '1', 'ສາຂາໂພນທັນ', '', '2021-03-21 17:02:28', '2011200803'),
(2, '3', 'ສາຂາແຄມຂອງ', '', '2021-03-21 17:02:39', '2011200803'),
(3, '2102220415', 'ສາຂາຈອມມະນີໃຕ້', '', '2021-03-21 17:00:39', '2011200803');

-- --------------------------------------------------------

--
-- Table structure for table `spa_bring_equiment`
--

CREATE TABLE `spa_bring_equiment` (
  `bring_id` varchar(100) DEFAULT NULL,
  `bring_equiment_id` varchar(255) DEFAULT NULL,
  `bring_qty` int(20) DEFAULT NULL,
  `bring_time` varchar(20) DEFAULT NULL,
  `bring_status` varchar(255) DEFAULT NULL,
  `bring_note` varchar(255) DEFAULT NULL,
  `bring_createdAt` varchar(25) DEFAULT NULL,
  `bring_createdBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_bring_equiment`
--

INSERT INTO `spa_bring_equiment` (`bring_id`, `bring_equiment_id`, `bring_qty`, `bring_time`, `bring_status`, `bring_note`, `bring_createdAt`, `bring_createdBy`) VALUES
('3d2a2b0f7fa8f9e4832a26ddb648caaa', '2102260757', 5000, '2021-03-10', 'true', '', '2021-03-10 17:32:02', '2011200803'),
('a8e5e88f951ca0f31755f2fdf64befcd', '2102260133', 10, '2021-03-13', 'true', '', '2021-03-13 16:23:34', '2011200803'),
('d57cad9bdfee5333aefb113e9c0e0f8b', '2102260133', 100, '2021-03-16', 'true', '', '2021-03-16 06:44:06', '2011200803'),
('26eb2bff5fc0e4bfdfcfd8e16dcd52c3', '2102260133', 200, '2021-03-16', 'true', '', '2021-03-16 06:48:28', '2011200803'),
('d8578f46a9efb5460ac5982a97d38f2c', '2102260757', 100, '2021-03-16', 'true', '', '2021-03-16 08:44:39', '2011200803'),
('50051f269a93b7803173a094c01dad55', '2102260725', 60, '2021-03-17', 'true', '', '2021-03-17 23:36:24', '2011200803');

-- --------------------------------------------------------

--
-- Table structure for table `spa_broked`
--

CREATE TABLE `spa_broked` (
  `bk_id` varchar(100) DEFAULT NULL,
  `bk_equiment_id` varchar(255) DEFAULT NULL,
  `bk_qty` int(20) DEFAULT NULL,
  `bk_time` varchar(20) DEFAULT NULL,
  `bk_status` varchar(255) DEFAULT NULL,
  `bk_note` varchar(255) DEFAULT NULL,
  `bk_createdAt` varchar(25) DEFAULT NULL,
  `bk_createdBy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_broked`
--

INSERT INTO `spa_broked` (`bk_id`, `bk_equiment_id`, `bk_qty`, `bk_time`, `bk_status`, `bk_note`, `bk_createdAt`, `bk_createdBy`) VALUES
('3d2a2b0f7fa8f9e4832a26ddb648caaa', '2102260757', 5000, '2021-03-10', 'true', '', '2021-03-10 17:32:02', '2011200803'),
('a8e5e88f951ca0f31755f2fdf64befcd', '2102260133', 10, '2021-03-13', 'true', '', '2021-03-13 16:23:34', '2011200803'),
('a790d0b601278838c0cd965420f67645', '2102260757', 20, '2021-03-16', 'true', 'ແຕກ', '2021-03-16 08:51:44', '2011200803'),
('1c3d095ffe3802a2e5eb37123f90169d', '2102260754', 30, '2021-03-17', 'true', '', '2021-03-17 23:37:42', '2011200803');

-- --------------------------------------------------------

--
-- Table structure for table `spa_category`
--

CREATE TABLE `spa_category` (
  `_id` int(11) NOT NULL,
  `cate_id` varchar(100) DEFAULT NULL,
  `cate_title` varchar(255) DEFAULT NULL,
  `cate_note` text DEFAULT NULL,
  `cate_createdAt` datetime DEFAULT NULL,
  `cate_createdBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_category`
--

INSERT INTO `spa_category` (`_id`, `cate_id`, `cate_title`, `cate_note`, `cate_createdAt`, `cate_createdBy`) VALUES
(1, '1', 'ນວດທຳມະດາ', '', '2021-03-14 15:30:27', '2011200803'),
(2, '2', 'ໂບທອ໋ກ', '', '2021-03-14 15:30:40', '2011200803'),
(3, '3', 'ຂັດຜິວ', '', '2021-03-14 15:30:38', '2011200803'),
(4, 'f8abe88223eeb2dc6245e0f6750fdab8', 'ອົບຂາວ', '', '2021-03-14 15:30:34', '2011200803'),
(5, 'e34041cc37d5b72a3bb9a01c03278a5b', 'ຮົມຢາ', '', '2021-03-14 15:30:31', '2011200803');

-- --------------------------------------------------------

--
-- Table structure for table `spa_equiment`
--

CREATE TABLE `spa_equiment` (
  `e_id` varchar(100) DEFAULT NULL,
  `e_cate_id` varchar(100) DEFAULT NULL,
  `e_name_l` varchar(100) DEFAULT NULL,
  `e_name_e` varchar(100) DEFAULT NULL,
  `e_type` varchar(25) DEFAULT NULL,
  `e_size` varchar(20) DEFAULT NULL,
  `e_Bprice` varchar(10) DEFAULT NULL,
  `e_status` varchar(25) DEFAULT NULL,
  `e_img` varchar(255) DEFAULT NULL,
  `e_note` varchar(255) DEFAULT NULL,
  `e_createdAt` varchar(255) DEFAULT NULL,
  `e_createdBy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_equiment`
--

INSERT INTO `spa_equiment` (`e_id`, `e_cate_id`, `e_name_l`, `e_name_e`, `e_type`, `e_size`, `e_Bprice`, `e_status`, `e_img`, `e_note`, `e_createdAt`, `e_createdBy`) VALUES
('2102260133', '2102261217', 'ເສື້ອແບບພະນັກງານ', '', 'ຜືນ', 'ກາງ', '30000', 'true', '963858.png', '', '2021-03-17', '2011200803'),
('2102260728', '2102261249', 'ຖ້ອຍແກງ', '', 'ຖ້ວຍ', 'ໃຫຍ່', '', 'true', '', '', '2021-02-26', '2011200803'),
('2102260725', '2102261249', 'ຖ້ອຍແກງ', '', 'ຖ້ວຍ', 'ນ້ອຍ', '', 'true', '', '', '2021-02-26', '2011200803'),
('2102260757', '2102261238', 'ຈອກວາຍ', '', 'ຈອກ', 'ປົກກະຕິ', '', 'true', '', '', '2021-02-26', '2011200803'),
('2102260754', '2102261238', 'ຈອກແກ້ວໃສ', '', 'ຈອກ', 'ກາງ', '', 'true', '', '', '2021-02-26', '2011200803');

-- --------------------------------------------------------

--
-- Table structure for table `spa_eresivce`
--

CREATE TABLE `spa_eresivce` (
  `ere_id` varchar(100) DEFAULT NULL,
  `ere_equiment_id` varchar(255) DEFAULT NULL,
  `ere_qty` int(20) DEFAULT NULL,
  `ere_Bprice` varchar(10) DEFAULT NULL,
  `ere_time` varchar(20) DEFAULT NULL,
  `ere_status` varchar(255) DEFAULT NULL,
  `ere_note` varchar(255) DEFAULT NULL,
  `ere_createdAt` varchar(25) DEFAULT NULL,
  `ere_createdBy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_eresivce`
--

INSERT INTO `spa_eresivce` (`ere_id`, `ere_equiment_id`, `ere_qty`, `ere_Bprice`, `ere_time`, `ere_status`, `ere_note`, `ere_createdAt`, `ere_createdBy`) VALUES
('5bf2b3e4facfbbc015268cad246332e8', '2102260728', 200, '12000', '2021-03-10', 'true', '', '2021-03-10 16:52:20', '2011200803'),
('f64ce40c012e1f455811859f5a0681b8', '2102260133', 300, '55000', '2021-03-10', 'true', '', '2021-03-10 17:17:58', '2011200803'),
('3d2a2b0f7fa8f9e4832a26ddb648caaa', '2102260757', 5000, '6000', '2021-03-10', 'true', '', '2021-03-10 17:32:02', '2011200803'),
('42a38650abf746e716aa6f0b218f279d', '2102260757', 4000, '12000', '2021-03-10', 'true', '', '2021-03-10 21:26:55', '2011200803');

-- --------------------------------------------------------

--
-- Table structure for table `spa_estock`
--

CREATE TABLE `spa_estock` (
  `est_id` varchar(100) NOT NULL,
  `est_equiment` varchar(255) DEFAULT NULL,
  `est_qty` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_estock`
--

INSERT INTO `spa_estock` (`est_id`, `est_equiment`, `est_qty`) VALUES
('122c539f76e98c1d58afcc9488e7ddef', '2102260728', '700'),
('4a6c68cdb406ff699a19eca38658d862', '2102260754', '670'),
('8b73cb8599f3479a84ae5e5da4e17cd0', '2102260133', '700'),
('9da660f282f67dd4820773d97535ed8a', '2102260725', '-60'),
('f51ce3ef4874f675b023a1b64f220356', '2102260757', '8880');

-- --------------------------------------------------------

--
-- Table structure for table `spa_etype`
--

CREATE TABLE `spa_etype` (
  `etype_id` varchar(100) NOT NULL,
  `etype_name_l` varchar(55) DEFAULT NULL,
  `etype_name_e` varchar(55) DEFAULT NULL,
  `etype_createdAt` datetime DEFAULT NULL,
  `etype_createdBy` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_etype`
--

INSERT INTO `spa_etype` (`etype_id`, `etype_name_l`, `etype_name_e`, `etype_createdAt`, `etype_createdBy`) VALUES
('2102261204', 'ເຄື່ອງຄົວ', '', '2021-03-10 00:00:00', '2011200803'),
('2102261205', 'ບ່ວງ', '', '2021-02-26 00:00:00', '2011200803'),
('2102261217', 'ເຄື່ອງແບບພະນັກງານ', '', '2021-02-26 00:00:00', '2011200803'),
('2102261238', 'ຈອກ', '', '2021-02-26 00:00:00', '2011200803'),
('2102261249', 'ຖ້ວຍ', '', '2021-03-17 23:19:00', '2011200803'),
('2102261258', 'ຈານ', '', '2021-03-10 15:33:19', '2011200803');

-- --------------------------------------------------------

--
-- Table structure for table `spa_login`
--

CREATE TABLE `spa_login` (
  `login_id` varchar(100) DEFAULT NULL,
  `login_user` varchar(255) DEFAULT NULL,
  `login_host` varchar(255) DEFAULT NULL,
  `login_address` varchar(255) DEFAULT NULL,
  `login_lat` varchar(255) DEFAULT NULL,
  `login_long` varchar(255) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `branch` varchar(150) DEFAULT NULL,
  `years` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_login`
--

INSERT INTO `spa_login` (`login_id`, `login_user`, `login_host`, `login_address`, `login_lat`, `login_long`, `login_time`, `branch`, `years`) VALUES
('2102270101', 'admin', 'kieng.local', '', '', '', '2021-02-27 01:02:00', '2102241100', '2020'),
('2102270234', 'admin', 'kieng.local', '', '', '', '2021-02-27 02:02:00', '2102241100', '2021'),
('2102270239', 'admin', 'kieng.local', '', '', '', '2021-02-27 14:02:00', '2102241100', '2021'),
('2102270240', 'admin', 'kieng.local', '', '', '', '2021-02-27 02:02:00', '2102241100', '2021'),
('2102270309', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-27 15:02:00', '', '2021'),
('2102270310', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-27 15:02:00', '', '2021'),
('2102270317', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-27 15:02:00', '', '2021'),
('2102270321', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-27 15:02:00', '', '2021'),
('2102270325', 'admin', 'kieng.local', '', '', '', '2021-02-27 03:02:00', '2102241100', '2021'),
('2102270342', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-27 15:02:00', '', '2021'),
('2102270617', 'admin', 'kieng', '', '', '', '2021-02-27 18:02:00', '', '2021'),
('2102270632', 'admin', 'kieng', '', '', '', '2021-02-27 18:02:00', '', '2021'),
('2102270633', 'admin', 'kieng', '', '', '', '2021-02-27 18:02:00', '2102241100', '2021'),
('2102270651', 'admin', 'kieng', '', '', '', '2021-02-27 18:02:00', '', '2021'),
('2102270654', 'admin', 'kieng', '', '', '', '2021-02-27 18:02:00', '', '2021'),
('2102270656', 'admin', 'kieng', '', '', '', '2021-02-27 18:02:00', '2102241100', '2021'),
('2102270705', 'admin', 'kieng.local', '', '', '', '2021-02-27 07:02:00', '2102241100', '2021'),
('2102270818', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-27 20:02:00', '', '2021'),
('2102271041', 'admin', 'kieng.local', '', '', '', '2021-02-27 10:02:00', '2102241100', '2021'),
('2102271114', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-27 23:02:00', '', '2021'),
('2102271218', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-27 12:02:00', '2102241100', '2021'),
('2102280132', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-02-28 13:02:00', '', '2021'),
('2102280517', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 17:02:00', '', '2021'),
('2102280601', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 18:02:00', '2102241100', '2021'),
('2102280626', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 18:02:00', '2102241100', '2021'),
('2102280632', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 18:02:00', '', '2021'),
('2102280633', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 18:02:00', '2102241100', '2021'),
('2102280706', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 19:02:00', '2102241100', '2021'),
('2102280707', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 19:02:00', '', '2021'),
('2102280710', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 19:02:00', '', '2021'),
('2102280712', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 19:02:00', '', '2021'),
('2102280718', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 19:02:00', '', '2021'),
('2102280724', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 19:02:00', '2102241100', '2021'),
('2102280726', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 19:02:00', '', '2021'),
('2102280729', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 19:02:00', '2102241100', '2021'),
('2102280753', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 19:02:00', '', '2021'),
('2102280826', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 20:02:00', '2102241100', '2021'),
('2102280835', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 20:02:00', '', '2021'),
('2102280856', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-02-28 20:02:00', '', '2021'),
('2103010259', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-01 14:20:59', '', '2021'),
('2103010549', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-01 17:47:49', '', '2021'),
('2103010605', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-01 18:51:05', '', '2021'),
('2103010817', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-01 20:14:17', '', '2021'),
('2103010920', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-01 21:12:20', '', '2021'),
('2103011235', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-01 12:13:35', '', '2021'),
('2103020112', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 13:17:12', '2102241100', '2021'),
('2103020113', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 13:20:13', '2102241100', '2021'),
('2103020119', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 13:16:19', '2102241100', '2021'),
('2103020121', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 13:23:21', '2102241100', '2021'),
('2103020138', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 13:06:38', '2102241100', '2021'),
('2103020140', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 13:13:40', '2102241100', '2021'),
('2103020147', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 13:20:47', '2102241100', '2021'),
('2103020150', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 13:14:50', '2102241100', '2021'),
('2103020347', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 15:03:47', '2102241100', '2021'),
('2103020400', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:36:00', '2102241100', '2021'),
('2103020407', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:36:07', '2102241100', '2021'),
('2103020416', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:35:16', '2102241100', '2021'),
('2103020418', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:34:18', '2102241100', '2021'),
('2103020424', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:34:24', '2102241100', '2021'),
('2103020436', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:34:36', '2102241100', '2021'),
('2103020443', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:36:43', '2102241100', '2021'),
('2103020446', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:34:46', '2102241100', '2021'),
('2103020449', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:33:49', '2102241100', '2021'),
('2103020455', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-02 16:36:55', '', '2021'),
('2103021001', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 10:57:01', '', '2021'),
('2103021036', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 10:56:36', '', '2021'),
('2103021104', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 11:19:04', '', '2021'),
('2103021108', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 11:08:08', '', '2021'),
('2103021110', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 11:11:10', '', '2021'),
('2103021200', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 12:15:00', '2102241100', '2021'),
('2103021241', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 12:04:41', '', '2021'),
('2103021247', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-02 12:08:47', '2102241100', '2021'),
('2103030404', 'admin', 'kieng.local', '', '', '', '2021-03-03 16:43:04', '2102241100', '2021'),
('2103030420', 'admin', 'kieng.local', '', '', '', '2021-03-03 16:28:20', '', '2021'),
('2103030907', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-03 21:43:07', '', '2021'),
('2103030910', 'admin', 'kieng.local', '', '', '', '2021-03-03 09:40:10', '2102241100', '2021'),
('2103030916', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-03 21:21:16', '', '2021'),
('2103030919', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-03 21:28:19', '', '2021'),
('2103030920', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-03 21:28:20', '2102241100', '2021'),
('2103030921', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-03 21:28:21', '2102241100', '2021'),
('2103030929', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-03 21:45:29', '', '2021'),
('2103030930', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-03 21:59:30', '', '2021'),
('2103031113', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-03 23:11:13', '2102241100', '2021'),
('2103031224', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-03 12:00:24', '', '2021'),
('2103040937', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-04 21:35:37', '', '2021'),
('2103041014', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-04 10:21:14', '', '2021'),
('2103060904', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-06 21:49:04', '', '2021'),
('1de88d9439e954983ea289a6d964a6d2', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-08 11:08:12', '', '2021'),
('1b0cc95c01e988a4038e4491c52747e5', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-08 22:09:18', '', '2021'),
('aabfd25438df9a0f6632e9de99e3f0f5', 'kieng', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:00:21', '', '2021'),
('b15011d1afede5eee993d1fc51cf3a6b', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:00:41', '', '2021'),
('0050ce1a45d0e3ac26fc74309a245b77', 'kieng', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:00:59', '', '2021'),
('9df03a871132a48f90e7140292cca210', 'kieng', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:01:33', '', '2021'),
('f2cc92b0d3df05e0f59957c827bfe8bd', 'kieng', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:04:05', '2102241100', '2021'),
('cc0d88b35df3f6f73896949ce87fa720', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:05:22', '', '2021'),
('45e3c6cb23199f7a4bfd8fdb7ca1fe70', 'kieng', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:09:32', '', '2021'),
('eb185b81e1838d4e915228757d5e8d87', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:40:15', '', '2021'),
('d0fbb863216688659ba0a6187daae788', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:43:31', '', '2021'),
('c5043ff3e5c1c6af2f829dad0ff7b10e', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:45:32', '', '2021'),
('7fcb0a2b47b96e7ce270a04fbd9a38b2', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:52:09', '2102241100', '2021'),
('c694bc1137f4929fc0a1615d897caf18', 'thong', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:53:47', '', '2021'),
('97feff1aa2bdf077987ddbd91039cdc7', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 10:59:48', '2102241100', '2021'),
('22cc7d8f4cb0261fff2d39ad300fd65e', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 11:06:03', '', '2021'),
('62d2719ab769d44352574aa62cc257fb', 'thong', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 11:10:27', '', '2021'),
('1ebfe8455b471daf73876d1e004b00e6', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 11:20:06', '2102241100', '2021'),
('5a640a077ff553ed3254ce0829b60d2f', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 11:31:52', '', '2021'),
('e3de1b7addee4ba10b0cee52ed976967', 'phet', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 11:45:40', '', '2021'),
('45711faef30835f9e1b813f1608e3be9', 'admin', 'kieng.local', 'Vientiane', '17.9667', '102.6000', '2021-03-09 12:13:04', '', '2021'),
('9d9c6b9288509482d2404e221560a127', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-09 21:46:32', '', '2021'),
('c5dbd6d5d8ddd6488c770748fd2ade3f', 'phet', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-09 21:51:24', '2102241100', '2021'),
('ac14aa538facd5138e23962625839434', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-09 23:52:53', '', '2021'),
('2af671778979ace6e654fb2d21b88086', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:07:52', '', '2021'),
('cca5062d7092af659954149ef3aab006', 'phet', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:20:52', '', '2021'),
('abce63864981dc8cabfb16058d73d060', 'phet', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:25:11', '2102241100', '2021'),
('e7c9e961a9d20e3807892b96466df285', 'somphet', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:28:06', '', '2021'),
('0dfb3ea8ae1809d1a15cb5f7e05b2e95', 'somphet', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:28:08', '2102241100', '2021'),
('50d0131fa5133db46eedb58ea719e468', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:32:11', '', '2021'),
('a35b514e1faf107cc7bc1d702d013f33', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:34:48', '', '2021'),
('c61c5a8e893fa9b9fe13684429271604', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:35:14', '2102241100', '2021'),
('8609e8def8c1d2274859873350d2186c', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:37:07', '2102241100', '2021'),
('6b888a155ebfbc72ba7c3a2d52bf4e0e', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:41:23', '2102241100', '2021'),
('a88eb3cebb602adab48223f47df24d11', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:49:33', '', '2021'),
('1dec613f001f4d5882bddf99e5758d8b', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:49:43', '', '2021'),
('7f78835fc28da86c60540bdc8f2adf94', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:58:22', '', '2021'),
('e16184365273a971f0f376e03d73a0a7', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 00:58:35', '2102241100', '2021'),
('48091f28d55036706686c96ea5861cbb', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 01:03:01', '2102241100', '2021'),
('c336024a3461c53446c5bfbb0ed38c11', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 07:38:22', '', '2021'),
('713d9b957e3098ed98b3c219367a2d46', 'admin', 'kieng.local', '', '', '', '2021-03-10 11:31:19', '', '2021'),
('d59f3a31abd92751c4fc63986f6797b2', 'thong', 'kieng.local', '', '', '', '2021-03-10 11:34:39', '2102241100', '2021'),
('938434ecdfad72ef896ec8c907e5c1e1', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 12:03:13', '', '2021'),
('13d98441d45a62757506c9fe74734e19', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 12:29:41', '', '2021'),
('73d03bd7f25b6150ffc277f6ffce8f90', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 12:29:51', '', '2021'),
('abecac4eac6587569d804d43c3348ef7', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 12:33:24', '2102241100', '2021'),
('abecac4eac6587569d804d43c3348ef7', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 12:33:43', '2102241100', '2021'),
('c3457353b6b2a8f7ef21e74f379e908a', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 12:33:45', '', '2021'),
('8699bc0da89d1c41bb3b24a2e1b17b0d', 'thong', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 13:18:54', '2102241100', '2021'),
('5e5ff260d7a1ef68ffa9f7318011e2a3', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 14:49:43', '', '2021'),
('2a465b80f8663c8e0a9ef258b6041d78', 'admin', 'kieng', 'Vientiane', '17.9667', '102.6000', '2021-03-10 15:24:13', '', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `spa_member`
--

CREATE TABLE `spa_member` (
  `_id` int(11) NOT NULL,
  `mb_id` varchar(150) DEFAULT NULL,
  `mb_fullName` varchar(255) DEFAULT NULL,
  `mb_phoneNumber` varchar(25) DEFAULT NULL,
  `mb_address` varchar(255) DEFAULT NULL,
  `mb_note` varchar(255) DEFAULT NULL,
  `mb_createdAt` varchar(25) DEFAULT NULL,
  `mb_createdBy` varchar(55) DEFAULT NULL,
  `branch_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_member`
--

INSERT INTO `spa_member` (`_id`, `mb_id`, `mb_fullName`, `mb_phoneNumber`, `mb_address`, `mb_note`, `mb_createdAt`, `mb_createdBy`, `branch_id`) VALUES
(1, '1', 'ສົມພອນ ສົດສະໄຫວ', '030558374933', 'ສົມສະຫວາດ', '', '2021-02-23', 'admin', NULL),
(2, '2102230404', 'ແສງເດືອນ', '02057465844', 'ຈັນສະຫວ່າງ, ສິໂຄດຕະບອງ, ນະຄອນຫລວງວຽງຈັນ', '', '2021-02-23', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spa_order`
--

CREATE TABLE `spa_order` (
  `od_id` varchar(255) DEFAULT NULL,
  `od_bill_no` varchar(250) DEFAULT NULL,
  `od_pro_id` varchar(255) DEFAULT NULL,
  `od_status` varchar(255) DEFAULT NULL,
  `od_aproval` varchar(255) DEFAULT NULL,
  `od_time` datetime DEFAULT NULL,
  `order_createdAt` varchar(255) DEFAULT NULL,
  `order_createdBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `spa_product`
--

CREATE TABLE `spa_product` (
  `_id` int(11) NOT NULL,
  `pro_id` varchar(150) DEFAULT NULL,
  `pro_cate_id` varchar(150) DEFAULT NULL,
  `pro_title` varchar(255) DEFAULT NULL,
  `price_for_course` decimal(10,2) DEFAULT NULL,
  `pro_qty` int(10) DEFAULT NULL,
  `price_for_time` decimal(10,2) DEFAULT NULL,
  `pro_status` varchar(25) DEFAULT NULL,
  `pro_note` text DEFAULT NULL,
  `pro_createdAt` datetime DEFAULT NULL,
  `pro_createdBy` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `spa_product`
--

INSERT INTO `spa_product` (`_id`, `pro_id`, `pro_cate_id`, `pro_title`, `price_for_course`, `pro_qty`, `price_for_time`, `pro_status`, `pro_note`, `pro_createdAt`, `pro_createdBy`) VALUES
(1, '899cacefc7014e5dba6ac7ccbb9f0428', '91cb423a28ba38f258e0cf29881ed231', 'ຂັດຜິວຂາວ', '450000.00', 3, '450000.00', 'true', '', '2021-03-14 23:43:18', '2011200803'),
(2, '9e2b3aff5e4911b08f359a150eccb59d', 'e3c74f3b47afdaeee5752cfeac2230e3', 'ນວດເພື່ອສຸຂະພາບ', '70000.00', 2, '50000.00', 'true', '', '2021-03-14 23:43:24', '2011200803'),
(3, 'd1940e7e24638a0213f2f6ffa53ad67b', 'd558f0817a9e4d5e3ec15e56c701cc5f', 'ໂບທ໋ອກໜ້າຂາວ', '3000000.00', 5, '3500000.00', 'true', '', '2021-03-14 23:43:10', '2011200803');

-- --------------------------------------------------------

--
-- Table structure for table `spa_profile_system`
--

CREATE TABLE `spa_profile_system` (
  `p_id` varchar(100) DEFAULT NULL,
  `p_title` varchar(55) DEFAULT NULL,
  `p_contact1` varchar(55) DEFAULT NULL,
  `p_contact2` varchar(25) DEFAULT NULL,
  `p_contact3` varchar(25) DEFAULT NULL,
  `p_detail` varchar(255) DEFAULT NULL,
  `p_status` varchar(25) DEFAULT NULL,
  `p_logo` varchar(255) DEFAULT NULL,
  `p_createdAt` varchar(20) DEFAULT NULL,
  `p_createdBy` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_profile_system`
--

INSERT INTO `spa_profile_system` (`p_id`, `p_title`, `p_contact1`, `p_contact2`, `p_contact3`, `p_detail`, `p_status`, `p_logo`, `p_createdAt`, `p_createdBy`) VALUES
('2102250704', 'ຮ້ານ ລາວປະຍຸກ ແລະ ຄວາມງາມ', '020 56475833', '', '', '', 'true', '185436.png', '2021-03-14', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `spa_rate`
--

CREATE TABLE `spa_rate` (
  `rate_id` int(11) NOT NULL,
  `rate_THB` varchar(25) DEFAULT NULL,
  `rate_USD` varchar(25) DEFAULT NULL,
  `rate_createdAt` varchar(25) DEFAULT NULL,
  `rate_createdBy` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_rate`
--

INSERT INTO `spa_rate` (`rate_id`, `rate_THB`, `rate_USD`, `rate_createdAt`, `rate_createdBy`) VALUES
(2, '350', '9200', '2021-03-17', 'admin'),
(2102220653, '300', '9000', '2021-03-17', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `spa_users`
--

CREATE TABLE `spa_users` (
  `user_id` varchar(100) NOT NULL,
  `user_fname` varchar(100) DEFAULT NULL,
  `user_lname` varchar(100) DEFAULT NULL,
  `user_gender` varchar(20) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_tel` varchar(20) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_role` varchar(100) DEFAULT NULL,
  `user_status` varchar(30) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `user_createdAt` datetime DEFAULT NULL,
  `user_createdBy` varchar(50) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `spa_users`
--

INSERT INTO `spa_users` (`user_id`, `user_fname`, `user_lname`, `user_gender`, `user_address`, `user_tel`, `user_name`, `user_password`, `user_role`, `user_status`, `user_img`, `user_createdAt`, `user_createdBy`, `branch`) VALUES
('2011200803', 'ກວາງ', 'ວິໄລຍະວົງ', 'MALE', 'ວຽງຈັນ', '020 56756440', 'admin', '202cb962ac59075b964b07152d234b70', 'ADMIN', 'true', '754520.jpg', '2021-04-18 00:00:00', 'admin', '3'),
('2011200851', 'ກ້ຽງ', 'ຈັນທະວີໄຊ', 'MALE', 'ວຽງຈັນ', '020 56676624', 'Joy', '202cb962ac59075b964b07152d234b70', 'MASSAGE', 'true', '508376.png', '2021-04-18 00:00:00', 'admin', '3'),
('2011200921', 'ສົມເພັດ', 'ແພງສີລັດ', 'FEMALE', 'ວຽງຈັນ', '020 5938533', 'phet', '202cb962ac59075b964b07152d234b70', 'MASSAGE', 'true', '559779.jpeg', '2021-04-18 00:00:00', 'admin', '3'),
('2012011006', 'ອຸດອນ', 'ຄຳມວ່ນ', 'FEMALE', 'ໂພນມີໄຊ', '020 5968495', 'done', '202cb962ac59075b964b07152d234b70', 'MASSAGE', 'true', '837689.jpeg', '2021-04-18 00:00:00', 'admin', '3'),
('2102060110', 'ສັນຕິ', 'ວາງບົວຊົງ', 'FEMALE', 'ວຽງຈັນ', '56676625', 'sunti', '202cb962ac59075b964b07152d234b70', 'ADMIN', 'true', '458805.jpeg', '2021-04-18 00:00:00', 'admin', '2102220415'),
('72da23205f0a11c7b27aa6f2352c071a', 'ວັນທອງ', 'ສອນສະຫວັນ', 'FEMALE', 'ວຽງຈັນ', '0205847548', 'thong', '202cb962ac59075b964b07152d234b70', 'MASSAGE', 'true', '483540.jpeg', '2021-04-18 00:00:00', 'admin', '3'),
('d3c9ee1a578820a90d8c57d98ea3b76f', 'bounma', 'sml', 'FEMALE', 'ນະ​ຄອນຫຼວງ', '02095510406', 'boun', '202cb962ac59075b964b07152d234b70', 'MASSAGE', 'true', '803321.jpeg', '2021-04-18 00:00:00', 'admin', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spa_branch`
--
ALTER TABLE `spa_branch`
  ADD PRIMARY KEY (`_id`) USING BTREE;

--
-- Indexes for table `spa_category`
--
ALTER TABLE `spa_category`
  ADD PRIMARY KEY (`_id`) USING BTREE;

--
-- Indexes for table `spa_estock`
--
ALTER TABLE `spa_estock`
  ADD PRIMARY KEY (`est_id`) USING BTREE;

--
-- Indexes for table `spa_etype`
--
ALTER TABLE `spa_etype`
  ADD PRIMARY KEY (`etype_id`) USING BTREE;

--
-- Indexes for table `spa_member`
--
ALTER TABLE `spa_member`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `spa_product`
--
ALTER TABLE `spa_product`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `spa_rate`
--
ALTER TABLE `spa_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `spa_users`
--
ALTER TABLE `spa_users`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spa_branch`
--
ALTER TABLE `spa_branch`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2102220419;

--
-- AUTO_INCREMENT for table `spa_category`
--
ALTER TABLE `spa_category`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spa_member`
--
ALTER TABLE `spa_member`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spa_product`
--
ALTER TABLE `spa_product`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spa_rate`
--
ALTER TABLE `spa_rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2102220654;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
