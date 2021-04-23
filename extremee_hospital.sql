-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2021 at 05:04 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extremee_hospital`
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
  `code` varchar(255) NOT NULL,
  `UNHS_num` varchar(250) NOT NULL,
  `on/off` varchar(255) NOT NULL DEFAULT 'off',
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `address`, `password`, `contact`, `organization`, `work`, `search_facility`, `time`, `super_admin`, `ad_hospital`, `status`, `code`, `UNHS_num`, `on/off`, `image`) VALUES
(1, 'Super Admin', 'admin@gmail.com', 'karachi', 'admin', '0989766523', '', '', '', '07:31:00 pm', 1, '', 'approve', '', '', 'on', 'a-sm.jpg');

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
(9, 'New Face 2 Face Consultation', '', 'allow'),
(10, 'New Telephone Consultation', '', 'allow'),
(11, 'New Video Consultation', '', 'allow');

-- --------------------------------------------------------

--
-- Table structure for table `organisation_type`
--

CREATE TABLE `organisation_type` (
  `id` int(11) NOT NULL,
  `ort_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organisation_type`
--

INSERT INTO `organisation_type` (`id`, `ort_name`) VALUES
(3, 'NHS Hospital'),
(4, 'GP Practice'),
(5, 'Dental Practice'),
(6, 'Opticians'),
(7, 'Community Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `orginzation`
--

CREATE TABLE `orginzation` (
  `orid` int(11) NOT NULL,
  `or_type` varchar(255) NOT NULL,
  `or_name` varchar(255) NOT NULL,
  `or_phone` varchar(255) NOT NULL,
  `or_address` varchar(255) NOT NULL,
  `or_code` varchar(255) NOT NULL,
  `or_firstaddress` varchar(255) NOT NULL,
  `or_city` varchar(255) NOT NULL,
  `or_postcode` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `org_locations`
--

CREATE TABLE `org_locations` (
  `id` int(11) NOT NULL,
  `org_location_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `org_location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `org_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `org_postcode` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `org_city` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `org_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `org_sitecode` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'Are children at lower risk of COVID-19 than adults?', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsum '),
(2, 'Note !!!', 'Due to Covid Please Wear Mask!!!!!'),
(3, 'Testing ', 'fdgjjkllmnbghjoiuytqsx');

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
  `s_orgname` varchar(255) NOT NULL,
  `s_orgid` varchar(255) NOT NULL,
  `ser_create_id` varchar(255) NOT NULL,
  `ser_create_name` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_cliniciant`
--

CREATE TABLE `service_cliniciant` (
  `cl_id` int(11) NOT NULL,
  `cl_type` varchar(255) NOT NULL,
  `cl_spectype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_cliniciant`
--

INSERT INTO `service_cliniciant` (`cl_id`, `cl_type`, `cl_spectype`) VALUES
(1, '2WW Bone', 1),
(2, '2WW Brain', 1),
(3, '2WW Breast', 1),
(4, '2WW Cancer of Unknown Primary', 1),
(5, '2WW Children & Young People', 1),
(6, '2WW Gynaecology', 1),
(7, '2ww Haematology', 1),
(8, '2WW Head & Neck', 1),
(9, '2WW Lower GI', 1),
(10, '2ww Lung', 1),
(11, '2WW Non-specific symptoms', 1),
(12, '2WW Sarcoma', 1),
(13, '2WW Skin', 1),
(14, '2WW Upper GI', 1),
(15, '2WW Urology', 1),
(16, 'Allergy', 2),
(17, 'Arrhythmia', 3),
(18, 'Cardiology Genetics', 3),
(19, 'Congenital Heart Disease', 3),
(20, 'Heart Failure', 3),
(21, 'Hypertension', 3),
(22, 'Ischaemic Heart Disease', 3),
(23, 'Lipid Management', 3),
(24, 'Not Otherwise Specified', 3),
(25, 'Rapid Access Chest Pain', 3),
(26, 'Valve Disorders', 3),
(28, 'Allergy', 4),
(29, 'Audiology', 4),
(30, 'Cardiology', 4),
(31, 'Community Paediatrics', 4),
(32, 'Dentistry / / Orthodontics', 4),
(33, 'Dermatology', 4),
(34, 'Development / Learning Disabilities', 4),
(35, 'Diabetes', 4),
(36, 'Endocrinology', 4),
(37, 'ENT', 4),
(38, 'Gastroentrology', 4),
(39, 'Gynaecology', 4),
(40, 'Gynaecology - Pregnancy Advice', 4),
(41, 'Haematology', 4),
(42, 'Immunology', 4),
(43, 'Metabolic Disorders', 4),
(44, 'Nephrology', 4),
(45, 'Neurology', 4),
(46, 'Oncology (Established Diagnoses)', 4),
(47, 'Ophthalmology - Not Otherwise Specified', 4),
(48, 'Ophthalmology - Orthoptics', 4),
(49, 'Ophthalmology - Strabismus / Ocular Motility', 4),
(50, 'Oral & Maxillofacial Surgery', 4),
(51, 'Orthopaedics', 4),
(52, 'Other Medical', 4),
(53, 'Plastic Surgery', 4),
(54, 'Respiratory', 4),
(55, 'Rheumatology', 4),
(56, 'Surgery - Not Otherwise Specified', 4),
(57, 'Urology', 4),
(64, 'Ambulatory Healthcare', 5),
(65, 'Care Coordination', 5),
(66, 'Community Nursing', 5),
(67, 'Palliative Care', 5),
(68, 'Prevention Care', 5),
(69, 'Prevention & Screening', 5),
(70, 'Allergy', 6),
(71, 'Dermatology', 6),
(72, 'Dietetics', 6),
(73, 'General Medicine', 6),
(74, 'Musculoskeletal / Rheumotology', 6),
(75, 'Oncology (Established Diagnoses)', 6),
(76, 'Podiatry', 6),
(77, 'Psychological Medicine', 6),
(78, 'Women\'s Health', 6),
(79, 'Endodontics', 7),
(80, 'Not Otherwise Specified', 7),
(81, 'Orthodontics', 7),
(82, 'Periodontics', 7),
(83, 'Prosthodontics', 7),
(84, 'Surgical Dentistry', 7),
(85, 'Acne', 8),
(86, 'Basal Cell Carcinoma', 8),
(87, 'Connective Tissue Disease', 8),
(88, 'Cosmetic Camouflage', 8),
(89, 'Exzema & Dermatitis', 8),
(90, 'Hair', 8),
(91, 'Laser Clinics', 8),
(92, 'Leg Ulcer', 8),
(93, 'Male Genital Skin Disorders', 8),
(94, 'Nails', 8),
(95, 'Not Otherwise Specified', 8),
(96, 'Oncology (Established Diagnoses)', 8),
(97, 'Patch Testing for Contact Dermatitis', 8),
(98, 'Psoriasis', 8),
(99, 'Skin Surgery for Benign Lesions', 8),
(100, 'Vulval Skin Disorders', 8),
(101, 'Erectile Dysfunction', 9),
(102, 'General Diabetic Management', 9),
(103, 'Podiatry & Foot', 9),
(104, 'Pregnancy & Maternal', 9),
(105, 'Renal Diabetes', 9),
(106, 'Type 1 Diabetes', 9),
(107, 'Colonic Imaging Assessment / Advice', 10),
(108, 'Flexible Sigmoidoscopy ', 10),
(109, 'Gastroscopy', 10),
(110, 'Bone Density Scan (DEXA)', 11),
(111, 'CT', 11),
(112, 'Fluoroscopy & Barium Studies', 11),
(113, 'Intravenous Urogram (IVU)', 11),
(114, 'MRI', 11),
(115, 'Nuclear Medicine', 11),
(116, 'Ultrasound', 11),
(117, 'X Ray Plain Film', 11),
(118, 'Blood Test', 12),
(119, 'Audiology - Hearing Assess / Reassess', 13),
(120, 'Cardiac Physiology - BP Monitoring', 13),
(121, 'Cardiac Physiology - ECG', 13),
(122, 'Cardiac Physiology - Echocardiogram', 13),
(123, 'GI Physiology - Urea Breath Test', 13),
(124, 'Neurophysiology - ECG (Routine)', 13),
(125, 'Neurophysiology - Nerve Conduction Studies', 13),
(126, 'Respiratory - Blood Gas Analysis', 13),
(127, 'Respiratory - Full Lung Function', 13),
(128, 'Respiratory - Oxygen Assessment', 13),
(129, 'Respiratory - Sleep Apnoea Screening', 13),
(130, 'Urodynamics - Free Flow / Residual Urine', 13),
(131, 'Vascular - ABPI Measurement', 13),
(132, 'Vascular - Aortic Aneurysm Assessment', 13),
(133, 'Cardiovascular Disease Risk Management', 14),
(134, 'Diabetes', 14),
(135, 'Eating Disorders - see Mental Health', 14),
(136, 'Food Allergy & Intolerance', 14),
(137, 'Gastroentrology', 14),
(138, 'Not Otherwise Specified', 14),
(139, 'Undemutrition', 14),
(140, 'Weight Management', 14),
(141, 'Balance / Dizziness', 15),
(142, 'Ear', 15),
(143, 'Fascial Plastic & Skin Lesions', 15),
(144, 'Hearing Tests/Aids', 15),
(145, 'Neck Lump / Thyroid', 15),
(146, 'Nose / Sinus', 15),
(147, 'Not Otherwise Specified', 15),
(148, 'Oncology (Established Diagnoses)', 15),
(149, 'Salivary Gland', 15),
(150, 'Sleep Apnoea', 15),
(151, 'Snoring (Not Sleep Apnoea)', 15),
(152, 'Throat (inc Voice / Swallowing)', 15),
(153, 'Tinnitus', 15),
(154, 'Adrenal Disorders', 16),
(155, 'Endocrine Pregnancy', 16),
(156, 'Gynaecological Endocrinology', 16),
(157, 'Lipid Disorders', 16),
(158, 'Metabolic Bone Disorders', 16),
(159, 'Not Otherwise Specified', 16),
(160, 'Oncology (Established Diagnoses)', 16),
(161, 'Pituritary & Hypothalamic', 16),
(162, 'Thyroid / Parathryroid', 16),
(163, 'General Medicine', 17),
(164, 'Transient Ischemic Attack', 17),
(165, 'Genetics', 18),
(166, 'Genito-Urinary Medicine', 19),
(167, 'Cognitive Disorders', 20),
(168, 'Falls', 20),
(169, 'Metabolic Bone Diseases', 20),
(170, 'Movement Disorders', 20),
(171, 'Not Otherwise Specified', 20),
(172, 'Stroke (not TIA)', 20),
(173, 'Colorectal Surgery', 21),
(174, 'Endoscopy', 21),
(175, 'Gallstones', 21),
(176, 'Hepatology', 21),
(177, 'Inflammatory Bowel Disease (IBD)', 21),
(178, 'Lower GI (medical) excl IBD', 21),
(179, 'Oncology (Established Diagnoses)', 21),
(180, 'Upper GI incl Dyspepsia', 21),
(181, 'Colposcopy', 22),
(182, 'early Pregnancy Assessment', 22),
(183, 'Family Planning', 22),
(184, 'Infertility', 22),
(185, 'Menopause', 22),
(186, 'Menstrual Disorders', 22),
(187, 'Not Otherwise Specified', 22),
(188, 'Oncology (Established Diagnoses)', 22),
(189, 'Pelvic Pain', 22),
(190, 'Perineal Repair', 22),
(191, 'Post Menaopausal Bleeding', 22),
(192, 'Pregnancy Advisory Service', 22),
(193, 'Psychosexual', 22),
(194, 'Recurrent Miscarriage', 22),
(195, 'Urogynaecology / Prolapse', 22),
(196, 'Vulval & Perineal Lesions', 22),
(197, 'Anti Coagulant', 23),
(198, 'Clotting Disorders', 23),
(199, 'Haemoglobinopathies', 23),
(200, 'Not Otherwise Specified', 23),
(201, 'Oncology (Established Diagnoses)', 23),
(202, 'Exercise', 24),
(203, 'Smoking Cessation', 24),
(204, 'Weight Management', 24),
(205, 'Autoimmune Disease', 25),
(206, 'Immunodeficiency', 25),
(207, 'Not Otherwise Specified', 25),
(208, 'Bone & Joint Infection', 26),
(209, 'Chronic Fatigue Syndrome', 26),
(210, 'Fever', 26),
(211, 'HIV', 26),
(212, 'Not Otherwise Specified', 26),
(213, 'Travel Advice', 26),
(214, 'Tropical Infections', 26),
(215, 'Tuberculosis', 26),
(216, 'Viral Heptatis (not Hep A)', 26),
(217, 'Injection & Drainage', 27),
(218, 'Tumour Ablation', 27),
(219, 'Vascular & Stent', 27),
(220, 'Learning Disabilities', 28),
(221, 'Hospital Admission', 29),
(222, 'Hospital Discharge', 29),
(223, 'Minor Illness Assessment', 29),
(224, 'Axiety/Depression/Stress: Mild/Moderate', 30),
(225, 'Axiety/Depression/Stress: Severe', 30),
(226, 'Drug/Alcohol Problems', 30),
(227, 'Eating Disorders', 30),
(228, 'Memory Problems', 30),
(229, 'Not Otherwise Specified', 30),
(230, 'Peri & Post-Natal Issues', 30),
(231, 'Psychological Disorders/Difficulties', 30),
(232, 'Psychotic Disorders', 30),
(233, 'Self Harm', 30),
(234, 'Sexual Issues', 30),
(235, 'Axiety/Depression/Stress: Mild/Moderate', 31),
(236, 'Behavioural Problems', 31),
(237, 'Drug/Alcohol Problems', 31),
(238, 'Emotional Problems', 31),
(239, 'Not Otherwise Specified', 31),
(240, 'Psychotic Disorders', 31),
(241, 'School Refusal', 31),
(242, 'Self Harm', 31),
(243, 'Sleep Problems', 31),
(244, 'Hypertension', 32),
(245, 'Nephrology', 32),
(246, 'Renal Diabetes', 32),
(247, 'Cognitive Disorders', 33),
(248, 'Epilepsy', 33),
(249, 'Headache', 33),
(250, 'Neuroinflammation - Multiple Sclerosis', 33),
(251, 'Oncology (Established Diagnoses)', 33),
(252, 'Parkinsons / Movement Disorders', 33),
(253, 'Sleep', 33),
(254, 'Stroke (not TIA)', 33),
(255, 'Transient Ischemic Attack', 33),
(256, 'Movement Disorders', 34),
(257, 'Not Otherwise Specified', 34),
(258, 'Spinal', 34),
(259, 'Antenatal', 35),
(260, 'Diabetes', 35),
(261, 'Endocrine Pregnancy', 35),
(262, 'Genetics', 35),
(263, 'Haemglobinopathies', 35),
(264, 'Maternal/Foetal Risk', 35),
(265, 'Maternal Medicine', 35),
(266, 'Multiple Pregnancy', 35),
(267, 'Not Otherwise Specified', 35),
(268, 'Falls', 36),
(269, 'Not Otherwise Specified', 36),
(270, 'Upper Limb / Splinting', 36),
(271, 'Wheelchair / Seating', 36),
(272, 'Cataract', 37),
(273, 'Cornea', 37),
(274, 'Diabetic Medical Retina', 37),
(275, 'External Eye Disease', 37),
(276, 'Glaucoma', 37),
(277, 'Laser (YAG capsulotomy)', 37),
(278, 'Low Vision', 37),
(279, 'Neuro-Ophthalmology', 37),
(280, 'Not Otherwise Specified', 37),
(281, 'Oculoplastics/Orbits/Lacrimal', 37),
(282, 'Oncology (Established Diagnoses)', 37),
(283, 'Orthoptics', 37),
(284, 'Other Medical Retina', 37),
(285, 'Squint / Ocular Mobility', 37),
(286, 'Vitreoretinal', 37),
(287, 'Fascial Deformity', 38),
(288, 'Fascial Plastics', 38),
(289, 'Head & Neck Lumps (not 2WW)', 38),
(290, 'Not Otherwise Specified', 38),
(291, 'Oncology (Established Diagnoses)', 38),
(292, 'Oral Surgery', 38),
(293, 'Salivary Gland Disease', 38),
(294, 'Foot & Ankle', 39),
(295, 'Fracture - Non Emergency', 39),
(296, 'Hand & Wrist', 39),
(297, 'Hip', 39),
(298, 'Knee', 39),
(299, 'Limb Deformity/Reconstruction', 39),
(300, 'Oncology (Established Diagnoses)', 39),
(301, 'Podiatric Surgery', 39),
(302, 'Shoulder & Elbow', 39),
(303, 'Spine - Back Pain (not Scoliosis/Deformity)', 39),
(304, 'Spine - Neck Pain', 39),
(305, 'Spine - Scoliosis & Deformity', 39),
(306, 'Sports Trauma', 39),
(307, 'Orthotics', 40),
(308, 'Prosthetics', 40),
(309, 'Pain Management', 41),
(310, 'Palliative Medicine', 42),
(311, 'Cardiovascular', 43),
(312, 'Falls', 43),
(313, 'Gynaecological Physiotherapy', 43),
(314, 'Musculoskeletal', 43),
(315, 'Neurological', 43),
(316, 'Not Otherwise Specified', 43),
(317, 'Obstetric Physiotherapy', 43),
(318, 'Oncology (Established Diagnoses)', 43),
(319, 'Respiratory', 43),
(320, 'Urological Physiotherapy', 43),
(321, 'At Risk Foot', 44),
(322, 'Biomechanical', 44),
(323, 'Diabetes (not Ulcer)', 44),
(324, 'Nail Surgery', 44),
(325, 'Not Otherwise Specified', 44),
(326, 'Podiatric Dermatology', 44),
(327, 'Podiatric Health Education', 44),
(328, 'Podiatric MSK - incl Rheumatology', 44),
(329, 'Podiatric Surgery - Excl Nail Surgery', 44),
(330, 'Neuro-rehabilitation', 45),
(331, 'Not Otherwise Specified', 45),
(332, 'Allergy', 46),
(333, 'Asthma', 46),
(334, 'COPD', 46),
(335, 'Cystic Fibrosis', 46),
(336, 'Interstitial Lung Disease', 46),
(337, 'Not Otherwise Specified', 46),
(338, 'Occupational Lung Disease', 46),
(339, 'Oncology (Established Diagnoses)', 46),
(340, 'Sleep', 46),
(341, 'Tuberculosis', 46),
(342, 'Bone / Oseteoprosis', 47),
(343, 'Inflammatory Arthritis', 47),
(344, 'Musculoskeletal', 47),
(345, 'Other Autoimmune Rhuematic Disease', 47),
(346, 'Spindal Disorders', 47),
(347, 'Excessive / Intrusive Sleepiness', 48),
(348, 'Insomnia', 48),
(349, 'Parasomnia & Other Sleep Disorders', 48),
(350, 'Sleep Apnoea / Sleep Disordered Breathing', 48),
(351, 'Communication', 49),
(352, 'Swallowing', 49),
(353, 'Exercise Medicine', 50),
(354, 'Non-Surgical Musculoskeltal', 50),
(355, 'Soft Tissue Injury', 50),
(356, 'Sports Injury', 50),
(357, 'Sports Medicine', 50),
(358, 'FH of Breast Cancer (not 2WW)', 51),
(359, 'Mammoplasty (not 2WW)', 51),
(360, 'Oncology (Established Diagnoses) (not 2WW)', 51),
(361, 'Other Symptomatic Breast (not 2WW)', 51),
(362, 'Cardiac Surgery', 52),
(363, 'Thoracic Surgery', 52),
(364, 'Endocrine Surgery', 53),
(365, 'Hernias', 53),
(366, 'Lumps & Bumps', 53),
(367, 'Basal Cell Carcinoma', 54),
(368, 'Burns', 54),
(369, 'Craniofacial', 54),
(370, 'Gynaecology & Perineal Reconstruction', 54),
(371, 'Laser', 54),
(372, 'Lower Limb', 54),
(373, 'Mammoplasty', 54),
(374, 'Minor Plastic Surgery', 54),
(375, 'Not Otherwise Specified', 54),
(376, 'Oncology (Established Diagnoses)', 54),
(377, 'Upper Limb', 54),
(378, 'Vascular Malformation', 54),
(379, 'Arterial', 55),
(380, 'Leg Ulcer', 55),
(381, 'Lymphoedema', 55),
(382, 'Not Otherwise Specified', 55),
(383, 'Varicose Veins', 55),
(384, 'Erectile Dysfunction/Andrology', 56),
(385, 'Haematuria (not 2WW)', 56),
(386, '(In) Continence', 56),
(387, 'Male Infertility', 56),
(388, 'Not Otherwise Specified', 56),
(389, 'Oncology (Established Diagnoses)', 56),
(390, 'Prostate', 56),
(391, 'Urinary Calculus', 56),
(392, 'Vasectomy', 56);

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

-- --------------------------------------------------------

--
-- Table structure for table `service_name`
--

CREATE TABLE `service_name` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `hos_name` varchar(255) NOT NULL,
  `sname_allow` varchar(255) NOT NULL DEFAULT 'not_allow',
  `org_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '2WW'),
(2, 'Allergy'),
(3, 'Cardiology'),
(4, 'Children\'s & Adolescent Services'),
(5, 'Community Healthcare'),
(6, 'Complementary Medicine'),
(7, 'Dentistry and Orthodontics'),
(8, 'Dermatology'),
(9, 'Diabetic Medicine'),
(10, 'Diagnostic Endoscopy'),
(11, 'Diagnostic Imaging'),
(12, 'Diagnostic Pathology'),
(13, 'Diagnostic Physiological Measurement'),
(14, 'Dietetics'),
(15, 'Ear, Nose & Throat'),
(16, 'Endocrinology & Metabolic Medicine'),
(17, 'General Medicine'),
(18, 'Genetics'),
(19, 'Genito-Urinary Medicine'),
(20, 'Geriatric Medicine'),
(21, 'GI and Liver (Medicine and Surgery)'),
(22, 'Gynaecology'),
(23, 'Haematology'),
(24, 'Health Promotion'),
(25, 'Immunology'),
(26, 'Infectious Diseases'),
(27, 'Intraventional Radiology'),
(28, 'Learning Disabilities'),
(29, 'Medication & Pharmacy'),
(30, 'Mental Health - Adults of all ages'),
(31, 'Mental Health - Child and Adolescent'),
(32, 'Nephrology'),
(33, 'Neurology'),
(34, 'Neurosurgery'),
(35, 'Obstetrics'),
(36, 'Occupational Therapy'),
(37, 'Ophthalmology'),
(38, 'Oral and Maxillofacial Surgery'),
(39, 'Orthopaedics'),
(40, 'Orthotics and Prosthetics'),
(41, 'Pain Management'),
(42, 'Palliative Medicine'),
(43, 'Physiotherapy'),
(44, 'Podiatry'),
(45, 'Rehabilitation'),
(46, 'Respiratory Medicine'),
(47, 'Rheumatology'),
(48, 'Sleep Medicine'),
(49, 'Speech and Language Therapy'),
(50, 'Sports and Exercise Medicine'),
(51, 'Surgery - Breast'),
(52, 'Surgery - Cardiothoracic'),
(53, 'Surgery - Not Otherwise Specified'),
(54, 'Surgery - Plastic'),
(55, 'Surgery - Vascular'),
(56, 'Urology');

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

-- --------------------------------------------------------

--
-- Table structure for table `staff_role`
--

CREATE TABLE `staff_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app`
--

CREATE TABLE `tbl_app` (
  `apid` int(11) NOT NULL,
  `nhsno` int(11) NOT NULL,
  `orid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consultantrefferels`
--

CREATE TABLE `tbl_consultantrefferels` (
  `c_id` int(11) NOT NULL,
  `c_UBRN` varchar(200) NOT NULL,
  `c_userid` int(11) NOT NULL,
  `c_rfid` int(11) NOT NULL,
  `c_file` varchar(200) DEFAULT NULL,
  `c_serid` int(11) NOT NULL,
  `c_gpid` int(11) NOT NULL,
  `c_nhsno` varchar(255) NOT NULL,
  `c_orgid` int(11) NOT NULL,
  `c_status` int(11) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patientappointment`
--

CREATE TABLE `tbl_patientappointment` (
  `o_id` int(11) NOT NULL,
  `o_ubrn` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `o_orgid` int(11) NOT NULL,
  `o_serviceid` int(11) NOT NULL,
  `o_date` date NOT NULL,
  `o_time` time NOT NULL,
  `o_patientid` int(11) NOT NULL,
  `o_refferelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patients`
--

CREATE TABLE `tbl_patients` (
  `pt_id` int(11) NOT NULL,
  `pt_title` varchar(200) NOT NULL,
  `pt_name` varchar(200) NOT NULL,
  `pt_surname` varchar(200) NOT NULL,
  `pt_dob` date NOT NULL,
  `pt_nhsno` varchar(11) NOT NULL,
  `pt_houseno` varchar(200) NOT NULL,
  `pt_streetname` varchar(200) NOT NULL,
  `pt_city` varchar(200) NOT NULL,
  `pt_country` varchar(200) NOT NULL,
  `pt_postcode` varchar(200) NOT NULL,
  `pt_telno` varchar(200) NOT NULL,
  `pt_mobno` varchar(255) NOT NULL,
  `pt_email` varchar(200) NOT NULL,
  `pt_create` varchar(200) NOT NULL,
  `pt_age` varchar(200) NOT NULL,
  `pt_createid` varchar(255) NOT NULL,
  `pt_orgid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ra_sender_id` int(11) NOT NULL,
  `reply` int(11) NOT NULL,
  `reciever` varchar(200) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `ra_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `rf_orgid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refferel_reasons`
--

CREATE TABLE `tbl_refferel_reasons` (
  `id` int(11) NOT NULL,
  `refferel_id` int(11) NOT NULL,
  `reason` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(3, 'Consultant'),
(4, 'Community Nurse'),
(5, 'General Practitioner'),
(6, 'Optometrist');

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
  `title` varchar(255) NOT NULL,
  `ur_orgname` varchar(255) NOT NULL,
  `ur_orgcode` varchar(255) NOT NULL,
  `ur_orgtype` varchar(255) NOT NULL,
  `ur_role_id` varchar(255) NOT NULL,
  `ur_role_name` varchar(255) NOT NULL,
  `ur_orgphno` varchar(255) NOT NULL,
  `ur_orgaddress` varchar(255) NOT NULL,
  `ur_status` varchar(255) NOT NULL,
  `ur_proregno` varchar(255) NOT NULL,
  `ur_address` varchar(255) NOT NULL,
  `ur_city` varchar(255) NOT NULL,
  `ur_postcode` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_serviceappointment`
--

CREATE TABLE `tbl_serviceappointment` (
  `sp_id` int(11) NOT NULL,
  `sp_ubrn` varchar(200) NOT NULL,
  `sp_refferalid` int(11) NOT NULL,
  `sp_patientid` int(11) NOT NULL,
  `sp_serviceid` int(11) NOT NULL,
  `sp_iwt` int(11) NOT NULL,
  `sp_createdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `filename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sp_requesttype` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `u_orgid` varchar(255) NOT NULL,
  `u_createid` varchar(255) NOT NULL,
  `u_serdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `staff_dob` varchar(255) NOT NULL,
  `staff_regno` varchar(255) NOT NULL,
  `tbl_role` varchar(255) NOT NULL,
  `staff_status` varchar(200) NOT NULL DEFAULT 'active',
  `staff_hospitalid` int(11) NOT NULL,
  `u_NHS_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `organisation_type`
--
ALTER TABLE `organisation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orginzation`
--
ALTER TABLE `orginzation`
  ADD PRIMARY KEY (`orid`);

--
-- Indexes for table `org_locations`
--
ALTER TABLE `org_locations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_id` (`role_id`),
  ADD UNIQUE KEY `role_id_2` (`role_id`);

--
-- Indexes for table `tbl_app`
--
ALTER TABLE `tbl_app`
  ADD PRIMARY KEY (`apid`);

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
-- Indexes for table `tbl_patientappointment`
--
ALTER TABLE `tbl_patientappointment`
  ADD PRIMARY KEY (`o_id`);

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
-- Indexes for table `tbl_refferel_reasons`
--
ALTER TABLE `tbl_refferel_reasons`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_serviceappointment`
--
ALTER TABLE `tbl_serviceappointment`
  ADD PRIMARY KEY (`sp_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_type`
--
ALTER TABLE `app_type`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `organisation_type`
--
ALTER TABLE `organisation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orginzation`
--
ALTER TABLE `orginzation`
  MODIFY `orid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_locations`
--
ALTER TABLE `org_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `refer_advice`
--
ALTER TABLE `refer_advice`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_cliniciant`
--
ALTER TABLE `service_cliniciant`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `service_location`
--
ALTER TABLE `service_location`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_name`
--
ALTER TABLE `service_name`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ser_contact`
--
ALTER TABLE `ser_contact`
  MODIFY `scon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ser_specialty_add`
--
ALTER TABLE `ser_specialty_add`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `slot_management`
--
ALTER TABLE `slot_management`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_role`
--
ALTER TABLE `staff_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_app`
--
ALTER TABLE `tbl_app`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_consultantrefferels`
--
ALTER TABLE `tbl_consultantrefferels`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patientappointment`
--
ALTER TABLE `tbl_patientappointment`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_refferelattachment`
--
ALTER TABLE `tbl_refferelattachment`
  MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_refferels`
--
ALTER TABLE `tbl_refferels`
  MODIFY `rf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_refferel_reasons`
--
ALTER TABLE `tbl_refferel_reasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_ruser`
--
ALTER TABLE `tbl_ruser`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_serviceappointment`
--
ALTER TABLE `tbl_serviceappointment`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_service_definer`
--
ALTER TABLE `tbl_service_definer`
  MODIFY `u_serid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
