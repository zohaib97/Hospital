-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 06:21 PM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `search_facility` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `super_admin` int(11) NOT NULL,
  `ad_hospital` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL DEFAULT 'not_approve',
  `UNHS_num` varchar(250) NOT NULL,
  `on/off` varchar(255) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `address`, `password`, `contact`, `organization`, `work`, `search_facility`, `time`, `super_admin`, `ad_hospital`, `status`, `code`, `UNHS_num`, `on/off`) VALUES
(1, 'Super Admin', 'admin@gmail.com', 'karachi', 'admin', '0989766523', '', '', '', '07:31:00 pm', 1, '', 'approve', '', '', 'on'),
(4, 'Muhammad Bilal', 'hospitaladmin@gmail.com', 'DHA', '1234', '434334544', '', '', '', '07:31:00 pm', 0, '', 'approve', '0bb93fe9c0', '4', 'off'),
(19, 'Daniyal', 'daniyal@gmail.com', '', '123', '677654334343', 'Pak Indus', 'Doctor', 'Dummy Text', '06:06:55 pm', 0, 'Pak Indus', 'approve', '3517140174', '987654321', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `app_type`
--

CREATE TABLE `app_type` (
  `app_id` int(11) NOT NULL,
  `app_type` varchar(255) NOT NULL,
  `ahos_name` varchar(255) NOT NULL,
  `app_show` varchar(255) NOT NULL DEFAULT 'not_allow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_type`
--

INSERT INTO `app_type` (`app_id`, `app_type`, `ahos_name`, `app_show`) VALUES
(3, 'Nurse', '', 'allow'),
(4, 'Doctor', '', 'not_allow'),
(17, 'Surgical', '', 'not_allow'),
(18, 'Hello World', '', 'not_allow');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hid` int(11) NOT NULL,
  `h_name` varchar(255) NOT NULL,
  `h_status` varchar(255) NOT NULL DEFAULT 'active',
  `u_id` int(11) NOT NULL,
  `h_NHS_no` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hid`, `h_name`, `h_status`, `u_id`, `h_NHS_no`, `start_date`, `end_date`) VALUES
(15, 'Jinnah', 'active', 4, '332225', '', ''),
(21, 'Indus', 'active', 1, '3322125', '', ''),
(34, 'Pak Indus', 'active', 1, 'NH-215890', '03/11/2021', '03/04/2021');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `pid` int(11) NOT NULL,
  `ptitle` varchar(200) NOT NULL,
  `pdescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`pid`, `ptitle`, `pdescription`) VALUES
(3, 'Star Wars', 'Hello'),
(8, 'dd', 'sdsdsd');

-- --------------------------------------------------------

--
-- Table structure for table `refer_advice`
--

CREATE TABLE `refer_advice` (
  `ref_id` int(11) NOT NULL,
  `ref_reqt` varchar(255) NOT NULL,
  `ref_prio` varchar(255) NOT NULL,
  `ref_clterm` varchar(255) NOT NULL,
  `ref_spec` varchar(255) NOT NULL,
  `ref_cltype` varchar(255) NOT NULL,
  `ref_namecl` varchar(255) NOT NULL,
  `ad_lupd_date` varchar(250) NOT NULL,
  `ad_f_date` varchar(250) NOT NULL,
  `ad_status` varchar(500) NOT NULL,
  `ad_ref_no` varchar(250) NOT NULL,
  `ref_hid` varchar(255) NOT NULL,
  `ref_sid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refer_advice`
--

INSERT INTO `refer_advice` (`ref_id`, `ref_reqt`, `ref_prio`, `ref_clterm`, `ref_spec`, `ref_cltype`, `ref_namecl`, `ad_lupd_date`, `ad_f_date`, `ad_status`, `ad_ref_no`, `ref_hid`, `ref_sid`) VALUES
(1, 'Advice', 'Routine', 'sdsds', 'Dummy Text', 'Dummy Text', 'Dummy Text', '2/28/2021', '2/28/2021', 'Provider Request Response', '123 000 725', '4', ''),
(2, 'Advice', 'Routine', 'dsd', 'Dummy Text', 'Dummy Text', 'Dummy Text', '2/28/2021', '2/28/2021', 'Provider Request Response', '', '4', ''),
(3, 'Refferal', 'Routine', 'sdsd', 'Dummy Text', 'Dummy Text', 'Dummy Text', '2/28/2021', '2/28/2021', 'Provider Request Response', '', '4', ''),
(4, 'Refferal', 'Routine', 'dsd', 'Dummy Text', 'Dummy Text', 'Dummy Text', '2/28/2021', '2/28/2021', 'Provider Request Response', '', '4', ''),
(5, 'Refferal', 'Routine', 'asdasd', 'Dummy Text', 'Dummy Text', 'Dummy Text', '2/28/2021', '2/28/2021', 'Provider Request Response', '', '4', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `m_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `service_r_t_support` varchar(255) NOT NULL,
  `service_cmnts` text NOT NULL,
  `service_refer` varchar(255) NOT NULL,
  `service_location` varchar(255) NOT NULL,
  `service_speciality` varchar(255) NOT NULL,
  `service_a_type` varchar(255) NOT NULL,
  `service_gender` varchar(255) NOT NULL,
  `sender_bookable` varchar(255) NOT NULL,
  `service_e_date` varchar(255) NOT NULL,
  `service_e_date2` varchar(255) NOT NULL,
  `service_t_date` varchar(255) NOT NULL,
  `service_age` varchar(255) NOT NULL,
  `service_age2` varchar(255) NOT NULL,
  `service_publish` varchar(255) NOT NULL,
  `service_caremenu` varchar(255) NOT NULL,
  `ser_cl_type` varchar(255) NOT NULL,
  `ser_res_reas` varchar(255) NOT NULL,
  `ser_res_cmnt` varchar(500) NOT NULL,
  `ser_instruct` varchar(255) NOT NULL,
  `ser_priority_rout` varchar(255) NOT NULL,
  `ser_priority_urg` varchar(255) NOT NULL,
  `ser_priority_wekex` varchar(255) NOT NULL,
  `ser_priority_2week` varchar(255) NOT NULL,
  `s_hos_name` varchar(255) NOT NULL,
  `s_hos_id` varchar(255) NOT NULL,
  `ser_create_id` varchar(255) NOT NULL,
  `ser_create_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`m_id`, `service_id`, `service_name`, `sender_email`, `service_r_t_support`, `service_cmnts`, `service_refer`, `service_location`, `service_speciality`, `service_a_type`, `service_gender`, `sender_bookable`, `service_e_date`, `service_e_date2`, `service_t_date`, `service_age`, `service_age2`, `service_publish`, `service_caremenu`, `ser_cl_type`, `ser_res_reas`, `ser_res_cmnt`, `ser_instruct`, `ser_priority_rout`, `ser_priority_urg`, `ser_priority_wekex`, `ser_priority_2week`, `s_hos_name`, `s_hos_id`, `ser_create_id`, `ser_create_name`) VALUES
(1, 8596, 'New', 'dentist@gmail.com', 'Advice Request', 'no', 'something', 'karachi', 'New Specialty', '', 'Male & Female', 'Yes', '03/02/2021', '03/03/2021', '03/04/2021', '23', '23', '', 'Include on Secondary Care Menu', 'new clinician', 'no', 'no', 'nothing', '2', '', 'Exclude Saturday', '', 'Indus', '4', '4', 'Muhammad Bilal'),
(2, 6776, 'New', 'dentist@gmail.com', 'Advice Request', 'no', 'something', 'Karachi', 'New', '', 'Male & Female', 'Yes', '03/03/2021', '03/03/2021', '03/04/2021', '23', '23', '', 'Include on Secondary Care Menu', 'surgeon', 'no', 'no', 'no', '2', '', 'Exclude Saturday', '', 'Indus', '4', '4', 'Muhammad Bilal'),
(3, 2583, 'New', 'bilaldd@gmail.com', 'Triage Request', 'abcff', 'abcdd', 'karachi', 'New', 'Hello', 'Male & Female', 'Yes', '03/10/2021', '03/09/2021', '03/12/2021', '24', '27', '', 'Include on Secondary Care Menu', 'New', 'abc', 'abcff', 'abcabc', '2', '3', 'Exclude Saturday', '4', 'Indus', '4', '4', 'Muhammad Bilal'),
(14, 535, '2', 'abc@gg', 'Appointment Request,Advice Request,', 'abc', 'abc', '32', '', '4', 'Female', 'Yes', '03/03/2021', '03/01/2021', '03/23/2021', '24', '26', '', 'Do Not Include on Secondary Care Menu', '1', 'abc', 'abc', 'asbc', '3', '', 'Exclude Saturday', '', 'Indus', '4', '4', 'Muhammad Bilal'),
(15, 6860, '1', 'abc@abc', 'Appointment Request,Advice Request,', 'abc', 'abc', '31', '6', '17', 'Male', 'Yes', '03/03/2021', '02/28/2021', '03/04/2021', '23', '27', '', 'Include on Secondary Care Menu', '2', 'abc', 'abc', 'abc', '4', '', 'Exclude Saturday', '', 'Indus', '4', '4', 'Muhammad Bilal'),
(16, 6029, 'Surgical', 'bila2l@gmail.com', 'Appointment Request', 'abc', 'abc', 'Karachi', 'abc', 'Nurse', 'Male', 'Yes', '03/24/2021', '03/15/2021', '03/10/2021', '24', '26', '', 'Include on Secondary Care Menu', 'surgeon', 'fgfg', 'abc', 'abc', '4', '', 'Exclude Saturday', '2 Week Wait', 'Indus', '4', '3', 'Bilal');

-- --------------------------------------------------------

--
-- Table structure for table `service_cliniciant`
--

CREATE TABLE `service_cliniciant` (
  `cl_id` int(11) NOT NULL,
  `cl_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_cliniciant`
--

INSERT INTO `service_cliniciant` (`cl_id`, `cl_type`) VALUES
(1, 'surgeon'),
(2, 'New Trying2');

-- --------------------------------------------------------

--
-- Table structure for table `service_location`
--

CREATE TABLE `service_location` (
  `lo_id` int(11) NOT NULL,
  `lo_bid` int(11) NOT NULL,
  `lo_name` varchar(255) NOT NULL,
  `lo_city` varchar(255) NOT NULL,
  `lo_location` varchar(255) NOT NULL,
  `loc_allow` varchar(255) NOT NULL DEFAULT 'not_allow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_location`
--

INSERT INTO `service_location` (`lo_id`, `lo_bid`, `lo_name`, `lo_city`, `lo_location`, `loc_allow`) VALUES
(31, 2256, 'Indus', 'DHA', 'Karachi', 'allow'),
(32, 1937, 'Liaqat Ali Khan', 'Clifton', 'Karachi', 'not_allow'),
(33, 7353, 'dsd', 'sdd', 'DHA', 'not_allow'),
(34, 2256, 'Indus', 'DHA', 'Karachi', 'not_allow'),
(35, 1937, 'Liaqat Ali Khan', 'Clifton', 'Karachi', 'not_allow'),
(36, 7353, 'dsd', 'sdd', 'DHA', 'not_allow'),
(37, 3282, 'sdsd', 'ssds', 'sdsds', 'not_allow'),
(38, 8116, 'clifton', 'karachi', 'karachi', 'not_allow');

-- --------------------------------------------------------

--
-- Table structure for table `service_name`
--

CREATE TABLE `service_name` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `hos_name` varchar(255) NOT NULL,
  `sname_allow` varchar(255) NOT NULL DEFAULT 'not_allow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_name`
--

INSERT INTO `service_name` (`s_id`, `s_name`, `hos_name`, `sname_allow`) VALUES
(1, 'Dentist', '', 'allow'),
(2, 'Surgical', '', 'not_allow'),
(9, 'Dentist', '', 'not_allow'),
(10, 'Surgical', '', 'not_allow'),
(14, 'New Service', '', 'not_allow');

-- --------------------------------------------------------

--
-- Table structure for table `ser_contact`
--

CREATE TABLE `ser_contact` (
  `scon_id` int(11) NOT NULL,
  `scon_name` varchar(255) NOT NULL,
  `scon_add` varchar(255) NOT NULL,
  `scon_coun` varchar(255) NOT NULL,
  `scon_postal` varchar(255) NOT NULL,
  `scon_town` varchar(255) NOT NULL,
  `hp_ctel` varchar(255) NOT NULL,
  `hp_faxn` varchar(255) NOT NULL,
  `hp_texttel` varchar(255) NOT NULL,
  `hp_pemail` varchar(255) NOT NULL,
  `pa_tel` varchar(255) NOT NULL,
  `pa_hop` varchar(255) NOT NULL,
  `sertbl_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ser_contact`
--

INSERT INTO `ser_contact` (`scon_id`, `scon_name`, `scon_add`, `scon_coun`, `scon_postal`, `scon_town`, `hp_ctel`, `hp_faxn`, `hp_texttel`, `hp_pemail`, `pa_tel`, `pa_hop`, `sertbl_id`) VALUES
(2, 'sdsd', 'sdsdwew', 'wwewe', 'wwewe', 'wwewe', 'ghghg', 'ghghg', 'mnm', 'bnb', 'jhjh', 'hhj', '16'),
(3, 'fdfd', 'fdfd', 'dsds', 'dffgf', 'dffgf', '343434', '34343', '3343434', 'dfdf@dff', '3334343', 'fgfgfg', '17'),
(4, 'dfdfd', 'fdfdfd', 'rrer', 'dfdf', 'dfdf', '343434', '34343434', '34343434', 'dfdfd@dfdfd', '4343434', 'feefefe', '18'),
(5, 'sdsd', 'sdsds', 'sds', 'dsdsd', 'dsdsd', '43434', '343434', '3434', 'rdfd2fdf@dfd', '34343', '4dfdfd', '19'),
(6, 'wewewe', 'erereref', 'dfd', 'fdfdfdfd', 'fdfdfdfd', '343434', '34343434', '343434', 'f@fd', '34343', 'ggjjg', '20'),
(7, 'fdf', 'dfdfdf', 'sds', 'ssdsd', 'ssdsd', '34343', '34343', '43434', 'fdfd@ddfd', '3543', 'fdfd', '21'),
(8, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '22'),
(9, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '23'),
(10, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '24'),
(11, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '25'),
(12, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '26'),
(13, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '27'),
(14, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '28'),
(15, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '29'),
(16, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '30'),
(17, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '31'),
(18, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '32'),
(19, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '33'),
(20, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '34'),
(21, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '35'),
(22, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '36'),
(23, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '37'),
(24, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '38'),
(25, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '39'),
(26, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '40'),
(27, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '41'),
(28, 'asd', 'asd', 'asd', 'asd', 'asd', '12312', '123', '123', 'asd@gmail.com', '123', '123', '42'),
(29, 'asd', 'asd', 'asdasd', 'as', 'as', '1231', '1231', '23123', 'asdasd@gmail.com', '123', '123', '43'),
(30, 'erer', 'erer', 'rerer', 'eerer', 'eerer', '34343', '4343434', '343434', 'gfgfg@ffgf', '434343', '4', '44'),
(31, 'abc', 'Karachi', 'Pakistan', '234', '234', '3434', '4545', '4545', 'abc@gmail.com', '4334', '5', '45'),
(32, 'zohaib', 'karachi', 'pakistan', '75300', '75300', '12345', '12345', '12345', 'surgical@gmail.com', '12345', '3', '1'),
(33, 'testing', 'abc/123,karachi', 'pakistan', '75300', '75300', '123', '123', '123', 'abc@gmail.com', '123', '3', '1'),
(34, 'testing', 'testing123', 'pakistan', '75300', '75300', '123', '123', '123', 'abc@gmail.com', '123', '4', '2'),
(35, 'abc', 'abc', 'abc', 'abc', 'abc', '323223232', '3232323', '323232', 'abc@abc', '234567654', '4', '3'),
(36, 'Dummy', 'Dummy', 'Dummy', 'Dummy', 'Dummy', '3344', '44544', '33344', 'Dummy@Dummy', '334333', '44', '4'),
(37, '', '', '', '', '', '', '', '', '', '', '', '5'),
(38, '', '', '', '', '', '', '', '', '', '', '', '6'),
(39, '', '', '', '', '', '', '', '', '', '', '', '7'),
(40, '', '', '', '', '', '', '', '', '', '', '', '8'),
(41, '', '', '', '', '', '', '', '', '', '', '', '9'),
(42, '', '', '', '', '', '', '', '', '', '', '', '10'),
(43, '', '', '', '', '', '', '', '', '', '', '', '11'),
(44, '', '', '', '', '', '', '', '', '', '', '', '12'),
(45, '', '', '', '', '', '', '', '', '', '', '', '13'),
(46, 'abc', 'abc', 'abc', 'abc', 'abc', '3444', '34343', '434', 'abc@abc', '4434', '4', '14'),
(47, 'abc', 'abc', 'abc', 'abc', 'abc', '33', '44', '55', 'abc@gfss', '3322', '3', '15'),
(48, 'dfdfdf', 'abc', 'abc', 'abc', 'abc', '3454', '45454', '4554', 'abc@abc', '43434', '5', '16');

-- --------------------------------------------------------

--
-- Table structure for table `ser_specialty_add`
--

CREATE TABLE `ser_specialty_add` (
  `spec_id` int(11) NOT NULL,
  `spec_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ser_specialty_add`
--

INSERT INTO `ser_specialty_add` (`spec_id`, `spec_name`) VALUES
(5, 'New'),
(6, 'Surgeon'),
(7, 'abc'),
(8, 'Trying'),
(9, 'New'),
(10, 'New Trying');

-- --------------------------------------------------------

--
-- Table structure for table `slot_management`
--

CREATE TABLE `slot_management` (
  `sm_id` int(11) NOT NULL,
  `sm_untilend` varchar(255) NOT NULL,
  `sm_recever` varchar(255) NOT NULL,
  `sm_days` varchar(255) NOT NULL,
  `sm_reserperiod` varchar(255) NOT NULL,
  `sm_providesys` varchar(255) NOT NULL,
  `sm_approxi` varchar(255) NOT NULL,
  `sm_ser_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot_management`
--

INSERT INTO `slot_management` (`sm_id`, `sm_untilend`, `sm_recever`, `sm_days`, `sm_reserperiod`, `sm_providesys`, `sm_approxi`, `sm_ser_id`) VALUES
(1, '343334', '334343', 'Dummy Text', '03:00', 'Dummy Text', '04:00', '17'),
(2, '4343434', '34343', 'Dummy Text', '04:00', 'Dummy Text', '04:00', '18'),
(3, '343434', '434343', 'Dummy Text', '03:00', 'Dummy Text', '03:00', '19'),
(4, '45', '545', 'Dummy Text', '03:00', 'Dummy Text', '04:00', '20'),
(5, '43434', '343434', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '21'),
(6, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '22'),
(7, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '23'),
(8, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '24'),
(9, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '25'),
(10, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '26'),
(11, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '27'),
(12, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '28'),
(13, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '29'),
(14, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '30'),
(15, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '31'),
(16, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '32'),
(17, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '33'),
(18, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '34'),
(19, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '35'),
(20, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '36'),
(21, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '37'),
(22, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '38'),
(23, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '39'),
(24, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '40'),
(25, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '41'),
(26, '123', '123', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '42'),
(27, '1', '2', 'Dummy Text', '04:00', 'Dummy Text', '04:00', '43'),
(28, '3', '3', 'Dummy Text', '03:00', 'Dummy Text', '04:00', '44'),
(29, '4', '5', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '45'),
(30, '3', '1', 'Dummy Text', '03:00', 'Dummy Text', '04:00', '1'),
(31, '4', '3', 'Dummy Text', '04:00', 'Dummy Text', '04:00', '1'),
(32, '4', '4', 'Dummy Text', '04:00', 'Dummy Text', '04:00', '2'),
(33, '3', '4', 'Dummy Text', '04:00', 'Dummy Text', '03:00', '3'),
(34, '3', '3', 'Dummy Text', '05:00', 'Dummy Text', '04:00', '4'),
(35, '', '', '', '', '', '', '5'),
(36, '', '', '', '', '', '', '6'),
(37, '', '', '', '', '', '', '7'),
(38, '', '', '', '', '', '', '8'),
(39, '', '', '', '', '', '', '9'),
(40, '', '', '', '', '', '', '10'),
(41, '', '', '', '', '', '', '11'),
(42, '', '', '', '', '', '', '12'),
(43, '', '', '', '', '', '', '13'),
(44, '3', '3', 'Dummy Text', '05:00', 'Dummy Text', '03:00', '14'),
(45, '3', '4', 'Dummy Text', '03:00', 'Dummy Text', '03:00', '15'),
(46, '4', '5', 'Dummy Text', '04:00', 'Dummy Text', '05:00', '16');

-- --------------------------------------------------------

--
-- Table structure for table `staff_role`
--

CREATE TABLE `staff_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_role`
--

INSERT INTO `staff_role` (`role_id`, `role_name`) VALUES
(1, 'Manager'),
(2, 'Doctors'),
(3, 'Nurse');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consultantrefferels`
--

CREATE TABLE `tbl_consultantrefferels` (
  `c_id` int(11) NOT NULL,
  `c_userid` int(11) NOT NULL,
  `c_rfid` int(11) NOT NULL,
  `c_file` varchar(200) DEFAULT NULL,
  `c_serid` int(11) NOT NULL,
  `c_gpid` int(11) NOT NULL,
  `c_nhsno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_consultantrefferels`
--

INSERT INTO `tbl_consultantrefferels` (`c_id`, `c_userid`, `c_rfid`, `c_file`, `c_serid`, `c_gpid`, `c_nhsno`) VALUES
(3, 1, 1, NULL, 6860, 2, 123456789),
(7, 1, 1, NULL, 6860, 2, 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_phn` varchar(255) NOT NULL,
  `contact_msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_phn`, `contact_msg`) VALUES
(1, 'Muhammad Bilal', 'bilal@gmail.com', 'IT', '8987876', 'Hello'),
(13, 'wwrwrw', 'wr@dgg', 'gdgd', 'gdgdg', 'dgdg'),
(14, 'sdhsjdh', 'dfdf@dfd', 'dd', 'dfdfd', 'dfdfd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gp_ref`
--

CREATE TABLE `tbl_gp_ref` (
  `gref_id` int(11) NOT NULL,
  `gref_name` varchar(255) NOT NULL,
  `gref_email` varchar(255) NOT NULL,
  `gref_pass` varchar(255) NOT NULL,
  `gref_contact` varchar(255) NOT NULL,
  `gref_hs_id` varchar(255) NOT NULL,
  `gref_nhs` varchar(255) NOT NULL,
  `gref_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gp_ref`
--

INSERT INTO `tbl_gp_ref` (`gref_id`, `gref_name`, `gref_email`, `gref_pass`, `gref_contact`, `gref_hs_id`, `gref_nhs`, `gref_code`) VALUES
(1, 'Ibrahim', 'ib@gmail.com', '12', '54554', '', '', ''),
(2, 'abc', 'gptest@gmail.com', '234', '234567', '', '', ''),
(3, 'zohaib', 'zohaib@gmail.com', '1234', '123124', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patients`
--

CREATE TABLE `tbl_patients` (
  `pt_id` int(11) NOT NULL,
  `pt_title` varchar(200) NOT NULL,
  `pt_name` varchar(200) NOT NULL,
  `pt_surname` varchar(200) NOT NULL,
  `pt_dob` varchar(200) NOT NULL,
  `pt_nhsno` int(11) NOT NULL,
  `pt_houseno` varchar(200) NOT NULL,
  `pt_streetname` varchar(200) NOT NULL,
  `pt_city` varchar(200) NOT NULL,
  `pt_country` varchar(200) NOT NULL,
  `pt_postcode` varchar(200) NOT NULL,
  `pt_telno` int(11) NOT NULL,
  `pt_mobno` int(11) NOT NULL,
  `pt_email` varchar(200) NOT NULL,
  `pt_hid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patients`
--

INSERT INTO `tbl_patients` (`pt_id`, `pt_title`, `pt_name`, `pt_surname`, `pt_dob`, `pt_nhsno`, `pt_houseno`, `pt_streetname`, `pt_city`, `pt_country`, `pt_postcode`, `pt_telno`, `pt_mobno`, `pt_email`, `pt_hid`) VALUES
(1, 'Dummy', 'zohaib', 'khan', '07/02/1997', 123456789, 'b/34', 'korangi', 'karachi', 'pakistan', '75300', 1212312, 123123123, 'patient@gmail.com', 4),
(2, 'Mr', 'Ahmed', 'Khan', '03/17/2021', 654321, '191', 'abc', 'karachi', 'pakistan', '3344', 332323, 343434, 'chrisee@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refferelattachment`
--

CREATE TABLE `tbl_refferelattachment` (
  `ra_id` int(11) NOT NULL,
  `ra_message` varchar(500) NOT NULL,
  `ra_attach` varchar(500) NOT NULL,
  `ra_weblink` varchar(500) NOT NULL,
  `ra_refferelid` int(11) NOT NULL,
  `ra_sender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_refferelattachment`
--

INSERT INTO `tbl_refferelattachment` (`ra_id`, `ra_message`, `ra_attach`, `ra_weblink`, `ra_refferelid`, `ra_sender_id`) VALUES
(9, 'Hello its trying', '20210227_145740.jpg', '', 3, 2),
(13, 'Yes Bro its me', '', '', 3, 1),
(22, 'Hello I need Help', '', '', 7, 2),
(23, 'Yes', '', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refferels`
--

CREATE TABLE `tbl_refferels` (
  `rf_id` int(11) NOT NULL,
  `rf_gpid` int(11) NOT NULL,
  `rf_ptitle` varchar(200) NOT NULL,
  `rf_pname` varchar(200) NOT NULL,
  `rf_psurname` varchar(200) NOT NULL,
  `rf_dob` varchar(200) NOT NULL,
  `rf_nhsno` varchar(200) NOT NULL,
  `rf_houseno` varchar(200) NOT NULL,
  `rf_streetname` varchar(200) NOT NULL,
  `rf_city` varchar(200) NOT NULL,
  `rf_country` varchar(200) NOT NULL,
  `rf_postcode` varchar(200) NOT NULL,
  `rf_telno` int(11) NOT NULL,
  `rf_mobno` int(11) NOT NULL,
  `rf_email` varchar(200) NOT NULL,
  `rf_hid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_refferels`
--

INSERT INTO `tbl_refferels` (`rf_id`, `rf_gpid`, `rf_ptitle`, `rf_pname`, `rf_psurname`, `rf_dob`, `rf_nhsno`, `rf_houseno`, `rf_streetname`, `rf_city`, `rf_country`, `rf_postcode`, `rf_telno`, `rf_mobno`, `rf_email`, `rf_hid`) VALUES
(1, 2, 'Mr', 'Ghaffar', 'Khan', '03/17/2021', '1234563434', '191', 'abc', 'Karachi', 'Pakistan', '33444', 3443434, 34343434, 'abc@abc', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `ro_id` int(11) NOT NULL,
  `ro_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`ro_id`, `ro_role`) VALUES
(1, 'Dentist'),
(2, 'General Practictional'),
(3, 'Consultant'),
(4, 'Community Nurse'),
(5, 'G-P Referrer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruser`
--

CREATE TABLE `tbl_ruser` (
  `ur_id` int(11) NOT NULL,
  `ur_fname` varchar(255) NOT NULL,
  `ur_sname` varchar(255) NOT NULL,
  `ur_email` varchar(255) NOT NULL,
  `ur_pass` varchar(255) NOT NULL,
  `ur_contact` varchar(255) NOT NULL,
  `ur_org` varchar(255) NOT NULL,
  `ur_dob` varchar(255) NOT NULL,
  `ur_regno` varchar(255) NOT NULL,
  `ur_role_id` varchar(255) NOT NULL,
  `ur_role_name` varchar(255) NOT NULL,
  `NHS_no` varchar(255) NOT NULL,
  `ur_hid` varchar(255) NOT NULL,
  `ur_status` varchar(255) NOT NULL,
  `ru_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ruser`
--

INSERT INTO `tbl_ruser` (`ur_id`, `ur_fname`, `ur_sname`, `ur_email`, `ur_pass`, `ur_contact`, `ur_org`, `ur_dob`, `ur_regno`, `ur_role_id`, `ur_role_name`, `NHS_no`, `ur_hid`, `ur_status`, `ru_created_id`) VALUES
(1, 'Consultant', 'Consultant', 'consultant@gmail.com', '1234', '034567892', 'Dummy Text', '02/24/2021', 'C-2389', '3', 'Consultant', '654321', '4', 'active', 4),
(2, 'G-P', 'Referrer', 'gp@gmail.com', '1234', '03477872234', 'Dummy Text', '02/18/2021', 'G-3425', '5', 'G-P Referrer', '654321', '4', 'inactive', 4),
(3, 'Community', 'Nurse', 'cnurse@gmail.com', '1234', '0343445453', 'Dummy Text', '02/14/2021', 'CN-8723', '4', 'Community Nurse', '654321', '4', 'inactive', 4),
(4, 'General', 'Pratictional', 'gpract@gmail.com', '1234', '03167676767', 'Dummy Tex', '02/23/2021', 'P-6727', '2', 'General Practictional', '654321', '4', 'inactive', 4),
(5, 'Dentist', 'Dentist', 'dentist@gmail.com', '1234', '03062228262', 'Dummy Text', '02/10/2021', 'D-9837', '1', 'Dentist', '654321', '4', 'active', 4),
(8, 'Testing', 'Testing', 'testing@gmail.com', 'rr', '4545356', '34', '', '', '3', 'Consultant', 'NH-215890', '34', 'approve', 0),
(9, 'wewe', 'wewe', 'dfgfg@jhjh', 'er', '545645757', '21', '', '', '4', 'Community Nurse', 'NH-215890', '34', 'not_approve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_definer`
--

CREATE TABLE `tbl_service_definer` (
  `u_serid` int(11) NOT NULL,
  `u_sername` varchar(255) NOT NULL,
  `u_seremail` varchar(255) NOT NULL,
  `u_serpass` varchar(255) NOT NULL,
  `u_sercontact` varchar(255) NOT NULL,
  `u_serrole` varchar(255) NOT NULL DEFAULT 'service_definer',
  `u_hospid` varchar(255) NOT NULL,
  `u_createid` varchar(255) NOT NULL,
  `u_serdatetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service_definer`
--

INSERT INTO `tbl_service_definer` (`u_serid`, `u_sername`, `u_seremail`, `u_serpass`, `u_sercontact`, `u_serrole`, `u_hospid`, `u_createid`, `u_serdatetime`) VALUES
(3, 'Bilal', 'service@gmail.com', 'service', '454454546', 'service_definer', '4', '4', '2021-02-24 13:44:43'),
(4, 'Ibrahim', 'ibrahim@gmail.com', '123', '454454546', 'service_definer', '4', '4', '2021-02-28 20:57:43'),
(5, 'abc', 'test@gmail.com', '34', '3363563', 'service_definer', '4', '4', '2021-02-28 22:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `staff_id` int(11) NOT NULL,
  `staff_fname` varchar(255) NOT NULL,
  `staff_sname` varchar(255) NOT NULL,
  `staff_email` varchar(25) NOT NULL,
  `staff_add1` varchar(200) NOT NULL,
  `staff_add2` varchar(200) NOT NULL,
  `staff_add3` varchar(200) NOT NULL,
  `staff_postcode` varchar(200) NOT NULL,
  `staff_pass` varchar(255) NOT NULL,
  `staff_contact` varchar(255) NOT NULL,
  `staff_department` varchar(255) NOT NULL,
  `staff_org` varchar(255) NOT NULL,
  `staff_dob` varchar(255) NOT NULL,
  `staff_regno` varchar(255) NOT NULL,
  `tbl_role` varchar(255) NOT NULL,
  `staff_status` varchar(200) NOT NULL DEFAULT 'not_active',
  `staff_hospitalid` int(11) NOT NULL,
  `u_NHS_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`staff_id`, `staff_fname`, `staff_sname`, `staff_email`, `staff_add1`, `staff_add2`, `staff_add3`, `staff_postcode`, `staff_pass`, `staff_contact`, `staff_department`, `staff_org`, `staff_dob`, `staff_regno`, `tbl_role`, `staff_status`, `staff_hospitalid`, `u_NHS_no`) VALUES
(8, 'Bilal', 'Bilal', 'manager@gmail.com', '', '', '', '', 'bilal', '09876453424', 'Indus', '', '02/17/2021', '', '1', 'active', 4, 987654321),
(28, 'M.Bilal', 'MB', 'bileeeal3322@gmail.com', '', '', '', '', 'ee', '34343', 'Liaqat Ali Khan2', '', '02/23/2021', 'ddd', '2', 'not_active', 4, 987654321),
(29, 'Mohammad', 'Bilal', 'mbilal@gmail.com', '', '', '', '', '123', '233233', '', 'Deevloopers', '', '', '5', 'active', 0, 987654321),
(31, 'Daniyal', 'Daniyal', 'daniyal21@gmail.com', '', '', '', '', '123', '334434', '', '22', '', '', '5', 'active', 22, 987654321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_type`
--
ALTER TABLE `app_type`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `refer_advice`
--
ALTER TABLE `refer_advice`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `service_cliniciant`
--
ALTER TABLE `service_cliniciant`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `service_location`
--
ALTER TABLE `service_location`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `service_name`
--
ALTER TABLE `service_name`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `ser_contact`
--
ALTER TABLE `ser_contact`
  ADD PRIMARY KEY (`scon_id`);

--
-- Indexes for table `ser_specialty_add`
--
ALTER TABLE `ser_specialty_add`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `slot_management`
--
ALTER TABLE `slot_management`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `staff_role`
--
ALTER TABLE `staff_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_consultantrefferels`
--
ALTER TABLE `tbl_consultantrefferels`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_gp_ref`
--
ALTER TABLE `tbl_gp_ref`
  ADD PRIMARY KEY (`gref_id`);

--
-- Indexes for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `tbl_refferelattachment`
--
ALTER TABLE `tbl_refferelattachment`
  ADD PRIMARY KEY (`ra_id`);

--
-- Indexes for table `tbl_refferels`
--
ALTER TABLE `tbl_refferels`
  ADD PRIMARY KEY (`rf_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`ro_id`);

--
-- Indexes for table `tbl_ruser`
--
ALTER TABLE `tbl_ruser`
  ADD PRIMARY KEY (`ur_id`);

--
-- Indexes for table `tbl_service_definer`
--
ALTER TABLE `tbl_service_definer`
  ADD PRIMARY KEY (`u_serid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `app_type`
--
ALTER TABLE `app_type`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `refer_advice`
--
ALTER TABLE `refer_advice`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service_cliniciant`
--
ALTER TABLE `service_cliniciant`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_location`
--
ALTER TABLE `service_location`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `service_name`
--
ALTER TABLE `service_name`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ser_contact`
--
ALTER TABLE `ser_contact`
  MODIFY `scon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ser_specialty_add`
--
ALTER TABLE `ser_specialty_add`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slot_management`
--
ALTER TABLE `slot_management`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `staff_role`
--
ALTER TABLE `staff_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_consultantrefferels`
--
ALTER TABLE `tbl_consultantrefferels`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_gp_ref`
--
ALTER TABLE `tbl_gp_ref`
  MODIFY `gref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_refferelattachment`
--
ALTER TABLE `tbl_refferelattachment`
  MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_refferels`
--
ALTER TABLE `tbl_refferels`
  MODIFY `rf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ruser`
--
ALTER TABLE `tbl_ruser`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_service_definer`
--
ALTER TABLE `tbl_service_definer`
  MODIFY `u_serid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
