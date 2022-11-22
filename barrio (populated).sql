-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 07:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barrio`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":1,\"case_title\":\"Lopez vs Garcia\",\"complaint_desc\":\"Ms. Garcia was arrested on June 18, 2020 at the checkpoint here at Brgy. 385 as she tried to go out using an alleged fake quarantine pass. The Brgy. Tanod said that Ms. Garcia planned to go to Supermarket to buy goods but they were not allowed to go out and were detained for falsifying documents.\",\"relief_desc\":\"In the sake of humanity, we will release them and request that they return to their homes, but we will nonetheless pursue a case against them for violating Articles 175.\",\"date_of_incident\":\"2020-06-18 00:00:00\",\"date_reported\":\"2022-11-21 00:18:00\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:18:00.000000Z\",\"updated_at\":\"2022-11-20T16:18:00.000000Z\"}}', NULL, '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(2, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"article_no\":175,\"case_no\":1,\"created_at\":\"2022-11-20T16:18:00.000000Z\",\"updated_at\":\"2022-11-20T16:18:00.000000Z\"}}', NULL, '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(3, 'Account', 'Person created', 'App\\Models\\Person', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":1,\"salutation\":\"Mr.\",\"first_name\":\"Arnel\",\"middle_name\":\"Masa\",\"last_name\":\"Lopez\",\"created_at\":\"2022-11-20T16:18:00.000000Z\",\"updated_at\":\"2022-11-20T16:18:00.000000Z\"}}', NULL, '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(4, 'Account', 'Person created', 'App\\Models\\Person', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":2,\"salutation\":\"Ms.\",\"first_name\":\"Ann\",\"middle_name\":\"Soriano\",\"last_name\":\"Garcia\",\"created_at\":\"2022-11-20T16:18:00.000000Z\",\"updated_at\":\"2022-11-20T16:18:00.000000Z\"}}', NULL, '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(5, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"case_no\":1,\"complainant_id\":1,\"respondent_id\":2,\"created_at\":\"2022-11-20T16:18:00.000000Z\",\"updated_at\":\"2022-11-20T16:18:00.000000Z\"}}', NULL, '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(6, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":1,\"file_address\":\"1668961080.png\",\"person_id\":1,\"created_at\":\"2022-11-20T16:18:00.000000Z\",\"updated_at\":\"2022-11-20T16:18:00.000000Z\"}}', NULL, '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(7, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":2,\"case_title\":\"Carlos vs Rojero\",\"complaint_desc\":\"On May 3, 2021, charges of usurpation of authority against a 41 year old woman clad in a PNP athletic uniform who walked into Brgy. 385, Quiapo, Manila on May 1, 2021. Marilyn Diaz, a resident of Sto. Nino, Paranaque City, was accosted by Base Police personnel at 3 p.m. on Wednesday in front of the Land Bank Branch for jaywalking. When asked for identification, Rojero failed to present a PNP ID and was brought to the Base Police Office for investigation where authorities found out that she is not a police officer.\",\"relief_desc\":\"Rojero was presented before the Quiapo City Prosecutors Office for inquest proceedings for violation of Article 177 of the Revised Penal Code for usurpation of authority and Article 179 for illegal use of uniforms or insignia.\",\"date_of_incident\":\"2021-04-01 00:00:00\",\"date_reported\":\"2022-11-21 00:19:59\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:19:59.000000Z\",\"updated_at\":\"2022-11-20T16:19:59.000000Z\"}}', NULL, '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(8, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":2,\"article_no\":179,\"case_no\":2,\"created_at\":\"2022-11-20T16:19:59.000000Z\",\"updated_at\":\"2022-11-20T16:19:59.000000Z\"}}', NULL, '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(9, 'Account', 'Person created', 'App\\Models\\Person', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":3,\"salutation\":\"Mr.\",\"first_name\":\"Roberto\",\"middle_name\":\"Mendoza\",\"last_name\":\"Carlos\",\"created_at\":\"2022-11-20T16:19:59.000000Z\",\"updated_at\":\"2022-11-20T16:19:59.000000Z\"}}', NULL, '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(10, 'Account', 'Person created', 'App\\Models\\Person', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":4,\"salutation\":\"Ms.\",\"first_name\":\"Marilyn\",\"middle_name\":\"Diaz\",\"last_name\":\"Rojero\",\"created_at\":\"2022-11-20T16:19:59.000000Z\",\"updated_at\":\"2022-11-20T16:19:59.000000Z\"}}', NULL, '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(11, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":2,\"case_no\":2,\"complainant_id\":3,\"respondent_id\":4,\"created_at\":\"2022-11-20T16:19:59.000000Z\",\"updated_at\":\"2022-11-20T16:19:59.000000Z\"}}', NULL, '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(12, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":2,\"file_address\":\"1668961199.png\",\"person_id\":3,\"created_at\":\"2022-11-20T16:19:59.000000Z\",\"updated_at\":\"2022-11-20T16:19:59.000000Z\"}}', NULL, '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(13, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":3,\"case_title\":\"Galanza vs Bayanay\",\"complaint_desc\":\"According to the police, witness Jameson\\r\\nGalanza, a security guard, was on duty when he saw Ian causing trouble at a gasoline station along Arlegui Petron Service Center in Metro Manila at around 3 a.m. on October 26, 2022 The suspect then pulled a gun from his car which prompted the witness to pacify him. Ian left the area and Jameson\\r\\nimmediately reported the incident to PS 14.\",\"relief_desc\":\"Jameson wants Ian to be charged with Alarms and Scandals of the Revised Penal Code and violation of R.A. 10591 or the Comprehensive Firearms and Ammunition Regulation Act.\",\"date_of_incident\":\"2022-10-26 00:00:00\",\"date_reported\":\"2022-11-21 00:21:03\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:21:03.000000Z\",\"updated_at\":\"2022-11-20T16:21:03.000000Z\"}}', NULL, '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(14, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":3,\"article_no\":155,\"case_no\":3,\"created_at\":\"2022-11-20T16:21:03.000000Z\",\"updated_at\":\"2022-11-20T16:21:03.000000Z\"}}', NULL, '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(15, 'Account', 'Person created', 'App\\Models\\Person', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":5,\"salutation\":\"Mr.\",\"first_name\":\"Jameson\",\"middle_name\":\"Cruz\",\"last_name\":\"Galanza\",\"created_at\":\"2022-11-20T16:21:03.000000Z\",\"updated_at\":\"2022-11-20T16:21:03.000000Z\"}}', NULL, '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(16, 'Account', 'Person created', 'App\\Models\\Person', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":6,\"salutation\":null,\"first_name\":\"Ian\",\"middle_name\":\"Fuellas\",\"last_name\":\"Bayanay\",\"created_at\":\"2022-11-20T16:21:03.000000Z\",\"updated_at\":\"2022-11-20T16:21:03.000000Z\"}}', NULL, '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(17, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":3,\"case_no\":3,\"complainant_id\":5,\"respondent_id\":6,\"created_at\":\"2022-11-20T16:21:03.000000Z\",\"updated_at\":\"2022-11-20T16:21:03.000000Z\"}}', NULL, '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(18, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":3,\"file_address\":\"1668961263.png\",\"person_id\":5,\"created_at\":\"2022-11-20T16:21:03.000000Z\",\"updated_at\":\"2022-11-20T16:21:03.000000Z\"}}', NULL, '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(19, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":4,\"case_title\":\"Tan vs Santos\",\"complaint_desc\":\"The policeman was demoted after they received the complaint of a certain Ryan Torres, who accused that the policeman searched his house and arrested him without proper warrants issued by the court on January 19, 2019. The policeman denied the charges, saying they were on foot patrol when they received a report that Santos was carrying a firearm.\\r\\n\\r\\nTan said he found a nozzle of a suspected firearm inside the sling bag at Santos sarisari store. This prompted the police officer to search inside Santos residence.\\r\\n\\r\\nPolice officers then arrested Santos after they discovered a firearm and suspected narcotics inside the victim house. Santos, however, said the gun and illegal drugs were planted evidence.\",\"relief_desc\":\"The police officer must be demoted over a grave misconduct case, which stemmed from complaints of unlawful arrest and conduct of search without proper warrants, the barangay hall said on Friday.\\r\\n\\r\\nPolice officer Tan must receive a penalty of one rank demotion based on a decision of the People Law Enforcement Board District 1 of Manila City.\",\"date_of_incident\":\"2019-01-19 00:00:00\",\"date_reported\":\"2022-11-21 00:34:20\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:34:20.000000Z\",\"updated_at\":\"2022-11-20T16:34:20.000000Z\"}}', NULL, '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(20, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":4,\"article_no\":269,\"case_no\":4,\"created_at\":\"2022-11-20T16:34:20.000000Z\",\"updated_at\":\"2022-11-20T16:34:20.000000Z\"}}', NULL, '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(21, 'Account', 'Person created', 'App\\Models\\Person', 'created', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":7,\"salutation\":\"Mr.\",\"first_name\":\"Marco\",\"middle_name\":\"Reyes\",\"last_name\":\"Tan\",\"created_at\":\"2022-11-20T16:34:20.000000Z\",\"updated_at\":\"2022-11-20T16:34:20.000000Z\"}}', NULL, '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(22, 'Account', 'Person created', 'App\\Models\\Person', 'created', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":8,\"salutation\":\"Mr.\",\"first_name\":\"Ryan\",\"middle_name\":\"Ramos\",\"last_name\":\"Santos\",\"created_at\":\"2022-11-20T16:34:20.000000Z\",\"updated_at\":\"2022-11-20T16:34:20.000000Z\"}}', NULL, '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(23, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":4,\"case_no\":4,\"complainant_id\":7,\"respondent_id\":8,\"created_at\":\"2022-11-20T16:34:20.000000Z\",\"updated_at\":\"2022-11-20T16:34:20.000000Z\"}}', NULL, '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(24, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":4,\"file_address\":\"1668962060.png\",\"person_id\":7,\"created_at\":\"2022-11-20T16:34:20.000000Z\",\"updated_at\":\"2022-11-20T16:34:20.000000Z\"}}', NULL, '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(25, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":5,\"case_title\":\"Mendoza vs Aquino\",\"complaint_desc\":\"Michael Santos Mendoza was born on December 18, 1988. He alleged that at around 12 midnight on October 31, 2018, he was on his way home to Barangay 385, Quiapo, Manila, when he encountered a petitioner accompanied by Rodjun Aquino. Mendoza, seemingly annoyed by Aquino, brought Mendoza near the church and hit Mendoza right shoulder with a stone and punched him on the right cheek.\\r\\n\\r\\nDr. Tanyag conducted a medical examination on Mendoza. The examination showed that Mendoza suffered from confluent abrasion on the left shoulder and soft tissue contusion in the deltoid area and bore a soft tissue contusion on the left periorbital area and on the right occipital parietal area of the head.\",\"relief_desc\":\"The RTC must found petitioner guilty beyond reasonable doubt of Other Acts of Child Abuse, as defined and penalized under Sec. 10, par. of R.A. No. 7610. Accordingly, it sentenced petitioner to suffer the indeterminate penalty of four years, nine months and eleven days of prision correccional, as minimum, to six years and eight months and one day of prision.\",\"date_of_incident\":\"2018-10-31 00:00:00\",\"date_reported\":\"2022-11-21 00:35:22\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:35:22.000000Z\",\"updated_at\":\"2022-11-20T16:35:22.000000Z\"}}', NULL, '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(26, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":5,\"article_no\":266,\"case_no\":5,\"created_at\":\"2022-11-20T16:35:22.000000Z\",\"updated_at\":\"2022-11-20T16:35:22.000000Z\"}}', NULL, '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(27, 'Account', 'Person created', 'App\\Models\\Person', 'created', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":9,\"salutation\":\"Mr.\",\"first_name\":\"Michael\",\"middle_name\":\"Santos\",\"last_name\":\"Mendoza\",\"created_at\":\"2022-11-20T16:35:22.000000Z\",\"updated_at\":\"2022-11-20T16:35:22.000000Z\"}}', NULL, '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(28, 'Account', 'Person created', 'App\\Models\\Person', 'created', 10, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":10,\"salutation\":\"Mr.\",\"first_name\":\"Rodjun\",\"middle_name\":\"Casto\",\"last_name\":\"Aquino\",\"created_at\":\"2022-11-20T16:35:22.000000Z\",\"updated_at\":\"2022-11-20T16:35:22.000000Z\"}}', NULL, '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(29, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":5,\"case_no\":5,\"complainant_id\":9,\"respondent_id\":10,\"created_at\":\"2022-11-20T16:35:22.000000Z\",\"updated_at\":\"2022-11-20T16:35:22.000000Z\"}}', NULL, '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(30, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":5,\"file_address\":\"1668962122.png\",\"person_id\":9,\"created_at\":\"2022-11-20T16:35:22.000000Z\",\"updated_at\":\"2022-11-20T16:35:22.000000Z\"}}', NULL, '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(31, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":6,\"case_title\":\"Oliva vs Rivera\",\"complaint_desc\":\"Authorities arrested Rivera involved in an online scam in separate operations in the cities of Paranaque and Manila.\\r\\nIn a report submitted to Camp Crame Wednesday, Maj. Gen. Sinas, National Capital Region Police Office chief, said Daniel Sanchez Rivera, 29, was arrested in Manila City on Tuesday afternoon.\\r\\nRiverais reportedly engaged in a cryptocurrency trading scam and is being sought by some complainants in the Philippines and Singapore.\",\"relief_desc\":\"He must face charges of estafa in relation to Republic Act 10175 or the Cybercrime Prevention Act of 2012.\\r\\nThe suspect was brought to the Manila City Police Station for documentation prior to the procedural return of the warrant of arrest to the Manila City Regional Trial Court Branch 117 where he is facing estafa charges in relation to RA 10175 or the Cybercrime Prevention Act of 2012.\",\"date_of_incident\":\"2016-09-25 00:00:00\",\"date_reported\":\"2022-11-21 00:36:25\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:36:25.000000Z\",\"updated_at\":\"2022-11-20T16:36:25.000000Z\"}}', NULL, '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(32, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":6,\"article_no\":315,\"case_no\":6,\"created_at\":\"2022-11-20T16:36:25.000000Z\",\"updated_at\":\"2022-11-20T16:36:25.000000Z\"}}', NULL, '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(33, 'Account', 'Person created', 'App\\Models\\Person', 'created', 11, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":11,\"salutation\":\"Ms.\",\"first_name\":\"Chloe\",\"middle_name\":\"Torres\",\"last_name\":\"Oliva\",\"created_at\":\"2022-11-20T16:36:25.000000Z\",\"updated_at\":\"2022-11-20T16:36:25.000000Z\"}}', NULL, '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(34, 'Account', 'Person created', 'App\\Models\\Person', 'created', 12, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":12,\"salutation\":\"Mr.\",\"first_name\":\"Daniel\",\"middle_name\":\"Sanchez\",\"last_name\":\"Rivera\",\"created_at\":\"2022-11-20T16:36:25.000000Z\",\"updated_at\":\"2022-11-20T16:36:25.000000Z\"}}', NULL, '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(35, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":6,\"case_no\":6,\"complainant_id\":11,\"respondent_id\":12,\"created_at\":\"2022-11-20T16:36:25.000000Z\",\"updated_at\":\"2022-11-20T16:36:25.000000Z\"}}', NULL, '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(36, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":6,\"file_address\":\"1668962185.png\",\"person_id\":11,\"created_at\":\"2022-11-20T16:36:25.000000Z\",\"updated_at\":\"2022-11-20T16:36:25.000000Z\"}}', NULL, '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(37, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":7,\"case_title\":\"Aguilar vs Dizon\",\"complaint_desc\":\"On March 1, 2015, Grace Dizon was charged in the Municipal Court of Manila City with the crime of trespass to dwelling. That on or about February 21, 2015, in the City of Manila, Philippines, and within the jurisdiction of this Court, the said accused did then and there willfully, unlawfully, and feloniously enter the dwelling of Lucas Morales Aguilar without his knowledge or consent.\",\"relief_desc\":\"On February 21, 2015, on the complaint of complainant Lucas Morales Aguilar, the Prosecuting Officer, Special Counsel Vicente Largo must file an information, docketed as Criminal Case No. 6751, for Trespass to Dwelling, against the accused Grace Dizon.\",\"date_of_incident\":\"2015-02-21 00:00:00\",\"date_reported\":\"2022-11-21 00:37:24\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:37:24.000000Z\",\"updated_at\":\"2022-11-20T16:37:24.000000Z\"}}', NULL, '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(38, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":7,\"article_no\":280,\"case_no\":7,\"created_at\":\"2022-11-20T16:37:24.000000Z\",\"updated_at\":\"2022-11-20T16:37:24.000000Z\"}}', NULL, '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(39, 'Account', 'Person created', 'App\\Models\\Person', 'created', 13, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":13,\"salutation\":\"Mr.\",\"first_name\":\"Lucas\",\"middle_name\":\"Morales\",\"last_name\":\"Aguilar\",\"created_at\":\"2022-11-20T16:37:24.000000Z\",\"updated_at\":\"2022-11-20T16:37:24.000000Z\"}}', NULL, '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(40, 'Account', 'Person created', 'App\\Models\\Person', 'created', 14, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":14,\"salutation\":\"Ms.\",\"first_name\":\"Grace\",\"middle_name\":\"Tolentino\",\"last_name\":\"Dizon\",\"created_at\":\"2022-11-20T16:37:24.000000Z\",\"updated_at\":\"2022-11-20T16:37:24.000000Z\"}}', NULL, '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(41, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":7,\"case_no\":7,\"complainant_id\":13,\"respondent_id\":14,\"created_at\":\"2022-11-20T16:37:24.000000Z\",\"updated_at\":\"2022-11-20T16:37:24.000000Z\"}}', NULL, '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(42, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":7,\"file_address\":\"1668962244.png\",\"person_id\":13,\"created_at\":\"2022-11-20T16:37:24.000000Z\",\"updated_at\":\"2022-11-20T16:37:24.000000Z\"}}', NULL, '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(43, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":8,\"case_title\":\"Valdez vs Bautista\",\"complaint_desc\":\"In December 2017, Garcia Bautista and her husband Felix Mathias Yulo were illegally accosted and harassed by the police officerRoel Valdez. While driving along Barangay Crossing in Arlegui, they were signaled to halt for a vehicular search by the said cop which the Brgy.  found to be election related.\",\"relief_desc\":\"The National Police Commission must direct the implementation of the order to dismiss the policeman in Manila City found guilty of the unlawful arrest and harassment of incumbent Mayor Ella Perez Bautista during  in 2017.\\r\\nAccessory penalties must include cancellation of police eligibility, forfeiture of retirement benefits except for accrued leave credits, and perpetual disqualification from holding public office.\",\"date_of_incident\":\"2021-12-08 00:00:00\",\"date_reported\":\"2022-11-21 00:38:35\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:38:35.000000Z\",\"updated_at\":\"2022-11-20T16:38:35.000000Z\"}}', NULL, '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(44, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":8,\"article_no\":269,\"case_no\":8,\"created_at\":\"2022-11-20T16:38:35.000000Z\",\"updated_at\":\"2022-11-20T16:38:35.000000Z\"}}', NULL, '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(45, 'Account', 'Person created', 'App\\Models\\Person', 'created', 15, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":15,\"salutation\":\"Mr.\",\"first_name\":\"Roel\",\"middle_name\":\"Arroyo\",\"last_name\":\"Valdez\",\"created_at\":\"2022-11-20T16:38:35.000000Z\",\"updated_at\":\"2022-11-20T16:38:35.000000Z\"}}', NULL, '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(46, 'Account', 'Person created', 'App\\Models\\Person', 'created', 16, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":16,\"salutation\":\"Mr.\",\"first_name\":\"Felix\",\"middle_name\":\"Gonzales\",\"last_name\":\"Bautista\",\"created_at\":\"2022-11-20T16:38:35.000000Z\",\"updated_at\":\"2022-11-20T16:38:35.000000Z\"}}', NULL, '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(47, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":8,\"case_no\":8,\"complainant_id\":15,\"respondent_id\":16,\"created_at\":\"2022-11-20T16:38:35.000000Z\",\"updated_at\":\"2022-11-20T16:38:35.000000Z\"}}', NULL, '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(48, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":8,\"file_address\":\"1668962315.png\",\"person_id\":15,\"created_at\":\"2022-11-20T16:38:35.000000Z\",\"updated_at\":\"2022-11-20T16:38:35.000000Z\"}}', NULL, '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(49, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":9,\"case_title\":\"Ortiz vs Tamayo\",\"complaint_desc\":\"That was about 4 in the afternoon of 17th September 2012 at barangay Centro Norte, Sto. Nino, Manila and within the jurisdiction of this Honorable Court, the above named accused, with ill motive, did then and there willfully, unlawfully, and feloniously, uttered defamatory remarks against the honor and reputation of the undersigned complaint Mrs. Zoey Arellano Ortiz, the following words and or phrases address to the undersigned complainant UKININAM, PUTA, AWAN ADADAL MO which if translated in the English language would mean, VULVA OF YOUR MOTHER, PROSTITUTE, ILLITERATE.\",\"relief_desc\":\"The MCTC must found Tamayo guilty beyond reasonable doubt of the crime of Grave Oral Defamation, and accordingly, sentenced her to suffer the penalty of imprisonment of one year and one day, as minimum, to one year and eight months, as maximum, of prision correctional and ordered to pay Ortiz the amount of P20,000.00 as moral damages, as well as the costs of suit.\",\"date_of_incident\":\"2022-09-11 00:00:00\",\"date_reported\":\"2022-11-21 00:39:45\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:39:45.000000Z\",\"updated_at\":\"2022-11-20T16:39:45.000000Z\"}}', NULL, '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(50, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":9,\"article_no\":364,\"case_no\":9,\"created_at\":\"2022-11-20T16:39:45.000000Z\",\"updated_at\":\"2022-11-20T16:39:45.000000Z\"}}', NULL, '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(51, 'Account', 'Person created', 'App\\Models\\Person', 'created', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":17,\"salutation\":\"Mrs.\",\"first_name\":\"Zoey\",\"middle_name\":\"Arellano\",\"last_name\":\"Ortiz\",\"created_at\":\"2022-11-20T16:39:45.000000Z\",\"updated_at\":\"2022-11-20T16:39:45.000000Z\"}}', NULL, '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(52, 'Account', 'Person created', 'App\\Models\\Person', 'created', 18, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":18,\"salutation\":\"Mr.\",\"first_name\":\"Ezekiel\",\"middle_name\":\"Atienza\",\"last_name\":\"Tamayo\",\"created_at\":\"2022-11-20T16:39:45.000000Z\",\"updated_at\":\"2022-11-20T16:39:45.000000Z\"}}', NULL, '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(53, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":9,\"case_no\":9,\"complainant_id\":17,\"respondent_id\":18,\"created_at\":\"2022-11-20T16:39:45.000000Z\",\"updated_at\":\"2022-11-20T16:39:45.000000Z\"}}', NULL, '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(54, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":9,\"file_address\":\"1668962385.png\",\"person_id\":17,\"created_at\":\"2022-11-20T16:39:45.000000Z\",\"updated_at\":\"2022-11-20T16:39:45.000000Z\"}}', NULL, '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(55, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 10, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":10,\"case_title\":\"Pineda vs Acosta\",\"complaint_desc\":\"That on or about May 15, 2012, and for some time subsequent thereto, in the Barangay 385 Quiapo, Manila, Philippines, and within the jurisdiction of this Honorable Court, the said accused by means of deceit and false promise of marriage, did then and there willfully, unlawfully and feloniously seduce and have sexual intercourse several times with Jamie Abad Pineda, a virgin over 12 but under 18 years of age, resulting in pregnancy with abortion thereafter.\",\"relief_desc\":\"Mr. John Zamora Acosta must be convicted by the Municipal Court of Manila City of the crime of simple seduction, upon complaint of Ms. Jamie Pineda, and must be sentenced to imprisonment for two months and one day.\",\"date_of_incident\":\"2022-04-15 00:00:00\",\"date_reported\":\"2022-11-21 00:41:22\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:41:22.000000Z\",\"updated_at\":\"2022-11-20T16:41:22.000000Z\"}}', NULL, '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(56, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 10, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":10,\"article_no\":338,\"case_no\":10,\"created_at\":\"2022-11-20T16:41:22.000000Z\",\"updated_at\":\"2022-11-20T16:41:22.000000Z\"}}', NULL, '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(57, 'Account', 'Person created', 'App\\Models\\Person', 'created', 19, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":19,\"salutation\":\"Mrs.\",\"first_name\":\"Jamie\",\"middle_name\":\"Abad\",\"last_name\":\"Pineda\",\"created_at\":\"2022-11-20T16:41:22.000000Z\",\"updated_at\":\"2022-11-20T16:41:22.000000Z\"}}', NULL, '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(58, 'Account', 'Person created', 'App\\Models\\Person', 'created', 20, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":20,\"salutation\":\"Mr.\",\"first_name\":\"John\",\"middle_name\":\"Zamora\",\"last_name\":\"Acosta\",\"created_at\":\"2022-11-20T16:41:22.000000Z\",\"updated_at\":\"2022-11-20T16:41:22.000000Z\"}}', NULL, '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(59, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 10, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":10,\"case_no\":10,\"complainant_id\":19,\"respondent_id\":20,\"created_at\":\"2022-11-20T16:41:22.000000Z\",\"updated_at\":\"2022-11-20T16:41:22.000000Z\"}}', NULL, '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(60, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 10, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":10,\"file_address\":\"1668962482.png\",\"person_id\":19,\"created_at\":\"2022-11-20T16:41:22.000000Z\",\"updated_at\":\"2022-11-20T16:41:22.000000Z\"}}', NULL, '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(61, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 11, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":11,\"case_title\":\"Union vs Tamondong\",\"complaint_desc\":\"Union bank filed two complaints for sum of money with prayer for a writ of replevin against spouses Eddie and Eliza Tamondong and a John Doe. The first complaint was filed before the RTC, Branch 109, Pasay City on April 13, 1998. The second complaint was filed on March 15, 2000 and was raffled in the MeTC, Branch 47, Pasay City. In both cases, Desi Tomas executed and signed the Certification against Forum Shopping.\",\"relief_desc\":\"The petitioners prayed that the ruling of the MeTC Makati City be annulled and set aside on the ground of grave abuse of discretion. They also cited the rulings in US vs. Canet and Ilusorio v. Bildner which state that venue and jurisdiction should be in the place where the false document was presented\",\"date_of_incident\":\"2022-11-04 00:00:00\",\"date_reported\":\"2022-11-21 00:42:44\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:42:44.000000Z\",\"updated_at\":\"2022-11-20T16:42:44.000000Z\"}}', NULL, '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(62, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 11, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":11,\"article_no\":175,\"case_no\":11,\"created_at\":\"2022-11-20T16:42:44.000000Z\",\"updated_at\":\"2022-11-20T16:42:44.000000Z\"}}', NULL, '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(63, 'Account', 'Person created', 'App\\Models\\Person', 'created', 21, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":21,\"salutation\":\"Mr.\",\"first_name\":\"Bank\",\"middle_name\":\"PH\",\"last_name\":\"Union\",\"created_at\":\"2022-11-20T16:42:44.000000Z\",\"updated_at\":\"2022-11-20T16:42:44.000000Z\"}}', NULL, '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(64, 'Account', 'Person created', 'App\\Models\\Person', 'created', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":22,\"salutation\":\"Mrs.\",\"first_name\":\"Eliza\",\"middle_name\":\"Reyes\",\"last_name\":\"Tamondong\",\"created_at\":\"2022-11-20T16:42:44.000000Z\",\"updated_at\":\"2022-11-20T16:42:44.000000Z\"}}', NULL, '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(65, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 11, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":11,\"case_no\":11,\"complainant_id\":21,\"respondent_id\":22,\"created_at\":\"2022-11-20T16:42:44.000000Z\",\"updated_at\":\"2022-11-20T16:42:44.000000Z\"}}', NULL, '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(66, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 11, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":11,\"file_address\":\"1668962564.png\",\"person_id\":21,\"created_at\":\"2022-11-20T16:42:44.000000Z\",\"updated_at\":\"2022-11-20T16:42:44.000000Z\"}}', NULL, '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(67, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 12, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":12,\"case_title\":\"Binon vs Sario\",\"complaint_desc\":\"On June 23, 2021, a file of complaint was placed due to illegal use of a Police Uniform by Alfed Mora Sario. According to complainant Charles Udon Binon, the respondent was forcing him to pay an amount of Php 2,500.00 due to not wearing a face mask in public. Binon added that Sario even made a scene at the public market. He was drinking water when he removed his face mask, then a Police Officer named Sario came to him and asked to pay a fine. Binon insisted on his reason and asked the Police Officer to go to the police station but Sario declined. He was asking for an Identification but Sario cannot give one. One of the strangers came and said that he is not a police officer.\",\"relief_desc\":\"Charles U. Binon is hereby asking to take immediate action to what Sario did. This is a crime, and he should be placed behind bars, Binon added. This case will be further inspected first by the barangay then if it is out of the Barangays jurisdiction, it will be passed to the Police.\",\"date_of_incident\":\"2021-06-23 00:00:00\",\"date_reported\":\"2022-11-21 00:43:37\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:43:37.000000Z\",\"updated_at\":\"2022-11-20T16:43:37.000000Z\"}}', NULL, '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(68, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 12, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":12,\"article_no\":179,\"case_no\":12,\"created_at\":\"2022-11-20T16:43:37.000000Z\",\"updated_at\":\"2022-11-20T16:43:37.000000Z\"}}', NULL, '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(69, 'Account', 'Person created', 'App\\Models\\Person', 'created', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":23,\"salutation\":\"Mr.\",\"first_name\":\"Charles\",\"middle_name\":\"Udon\",\"last_name\":\"Binon\",\"created_at\":\"2022-11-20T16:43:37.000000Z\",\"updated_at\":\"2022-11-20T16:43:37.000000Z\"}}', NULL, '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(70, 'Account', 'Person created', 'App\\Models\\Person', 'created', 24, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":24,\"salutation\":\"Mr.\",\"first_name\":\"Alfred\",\"middle_name\":\"Mora\",\"last_name\":\"Sario\",\"created_at\":\"2022-11-20T16:43:37.000000Z\",\"updated_at\":\"2022-11-20T16:43:37.000000Z\"}}', NULL, '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(71, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 12, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":12,\"case_no\":12,\"complainant_id\":23,\"respondent_id\":24,\"created_at\":\"2022-11-20T16:43:37.000000Z\",\"updated_at\":\"2022-11-20T16:43:37.000000Z\"}}', NULL, '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(72, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 12, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":12,\"file_address\":\"1668962617.png\",\"person_id\":23,\"created_at\":\"2022-11-20T16:43:37.000000Z\",\"updated_at\":\"2022-11-20T16:43:37.000000Z\"}}', NULL, '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(73, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 13, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":13,\"case_title\":\"Conrad vs Lopez\",\"complaint_desc\":\"On the 27th day of April 2022, Shane Diez Conrad filed a complaint against Venjo Sicat Lopez at the Barangay. According to Conrad, Lopez surprisingly came to her when she was just standing at the park. She was waiting for her friend to come but then Lopez started to arouse her by forcing her to give her phone number and name. When Conrad declined. Lopez grabbed Conrads arms and forcefully asked for the number. Some of the tricycle drivers came to Conrad for rescue. \\r\\n\\r\\nAccording to the tricycle drivers, they did not notice the incident immediately. They thought Lopez was her boyfriend. When they saw the grabbing or arms made by Lopez, they went to her.\",\"relief_desc\":\"According to the complainant, Shane Diez Conrad is asking for a serious offense for the respondent. Conrad then asked for a payment to have a medical check up for her arms. Moreover, she also asked for payment for emotional stress the incident caused her. There will be a discussion for this relief asked.\",\"date_of_incident\":\"2022-04-27 00:00:00\",\"date_reported\":\"2022-11-21 00:44:40\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:44:40.000000Z\",\"updated_at\":\"2022-11-20T16:44:40.000000Z\"}}', NULL, '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(74, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 13, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":13,\"article_no\":338,\"case_no\":13,\"created_at\":\"2022-11-20T16:44:40.000000Z\",\"updated_at\":\"2022-11-20T16:44:40.000000Z\"}}', NULL, '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(75, 'Account', 'Person created', 'App\\Models\\Person', 'created', 25, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":25,\"salutation\":\"Mrs.\",\"first_name\":\"Shane\",\"middle_name\":\"Diez\",\"last_name\":\"Conrad\",\"created_at\":\"2022-11-20T16:44:40.000000Z\",\"updated_at\":\"2022-11-20T16:44:40.000000Z\"}}', NULL, '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(76, 'Account', 'Person created', 'App\\Models\\Person', 'created', 26, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":26,\"salutation\":\"Mr.\",\"first_name\":\"Venjo\",\"middle_name\":\"Sicat\",\"last_name\":\"Lopez\",\"created_at\":\"2022-11-20T16:44:40.000000Z\",\"updated_at\":\"2022-11-20T16:44:40.000000Z\"}}', NULL, '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(77, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 13, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":13,\"case_no\":13,\"complainant_id\":25,\"respondent_id\":26,\"created_at\":\"2022-11-20T16:44:40.000000Z\",\"updated_at\":\"2022-11-20T16:44:40.000000Z\"}}', NULL, '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(78, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 13, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":13,\"file_address\":\"1668962680.png\",\"person_id\":25,\"created_at\":\"2022-11-20T16:44:40.000000Z\",\"updated_at\":\"2022-11-20T16:44:40.000000Z\"}}', NULL, '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(79, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 14, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":14,\"case_title\":\"Quijano vs Barang\",\"complaint_desc\":\"Despite the QR code security feature of the new quarantine passes to prevent counterfeiting, at least 46 fake passes were confiscated by police authorities at a checkpoint in Barangay Capitol Site, Cebu City yesterday.\\r\\n\\r\\nPolice Major Elisandro Quijano, commander of Abellana Police Station, said the number may increase as soon as the consolidated reports from all quarantine control points are in. No arrests were made for humanitarian reasons, but the bearers were warned that they will be charged if they are caught again in possession of a fake quarantine pass.\\r\\n\\r\\nGenuine quarantine passes are identified not by scanning the QR code sticker but by manual visual examination.\\r\\n\\r\\nQuijano said that fake ones are determined by comparing them to the printed and laminated original quarantine pass provided to them by the Cebu City government. Cebu City mayor Edgardo Labella explained that the printing of the new passes was based on the data provided by the Department of Health.\",\"relief_desc\":\"We will release them and request that they return to their homes for the sake of humanity, but we will still prosecute them for violating Articles 175.\",\"date_of_incident\":\"2021-06-17 00:00:00\",\"date_reported\":\"2022-11-21 00:45:45\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:45:45.000000Z\",\"updated_at\":\"2022-11-20T16:45:45.000000Z\"}}', NULL, '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(80, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 14, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":14,\"article_no\":175,\"case_no\":14,\"created_at\":\"2022-11-20T16:45:45.000000Z\",\"updated_at\":\"2022-11-20T16:45:45.000000Z\"}}', NULL, '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(81, 'Account', 'Person created', 'App\\Models\\Person', 'created', 27, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":27,\"salutation\":\"Mr.\",\"first_name\":\"Elisandro\",\"middle_name\":\"Santos\",\"last_name\":\"Quijano\",\"created_at\":\"2022-11-20T16:45:45.000000Z\",\"updated_at\":\"2022-11-20T16:45:45.000000Z\"}}', NULL, '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(82, 'Account', 'Person created', 'App\\Models\\Person', 'created', 28, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":28,\"salutation\":\"Mr.\",\"first_name\":\"Alfred\",\"middle_name\":\"Sandugan\",\"last_name\":\"Barang\",\"created_at\":\"2022-11-20T16:45:45.000000Z\",\"updated_at\":\"2022-11-20T16:45:45.000000Z\"}}', NULL, '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(83, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 14, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":14,\"case_no\":14,\"complainant_id\":27,\"respondent_id\":28,\"created_at\":\"2022-11-20T16:45:45.000000Z\",\"updated_at\":\"2022-11-20T16:45:45.000000Z\"}}', NULL, '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(84, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 14, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":14,\"file_address\":\"1668962745.png\",\"person_id\":27,\"created_at\":\"2022-11-20T16:45:45.000000Z\",\"updated_at\":\"2022-11-20T16:45:45.000000Z\"}}', NULL, '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(85, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 15, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":15,\"case_title\":\"Marollano vs Officers\",\"complaint_desc\":\"The Commission on Human Rights Negros Oriental field office is preparing charges against some policemen in the municipality of Vallehermoso, Negros Oriental in what appears to be an unlawful arrest of a person accused of being a drug suspect.\\r\\n\\r\\n In a press conference Monday, CHR special investigator Dr. Jess Canete identified the complainant as Charlie Sta. Ana Marollano, 36 years old, married and resident of Barangay Tagbino, Vallehermoso town, who had sought his help claiming to have been a victim of an alleged conspiracy.\\r\\n\\r\\n According to Dr. Canete, Marollano was arrested last July 16 and placed under detention for 19 days until the prosecutor dismissed the case the police had filed for illegal possession of shabu, the suspect was ordered released Saturday, August 5.\",\"relief_desc\":\"Meanwhile, Dr. Canete has requested on Sunday the Philippine National Police Regional Office 18 or the Negros Island Region for the immediate relief of these policemen.\",\"date_of_incident\":\"2022-08-05 00:00:00\",\"date_reported\":\"2022-11-21 00:47:03\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:47:03.000000Z\",\"updated_at\":\"2022-11-20T16:47:03.000000Z\"}}', NULL, '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(86, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 15, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":15,\"article_no\":269,\"case_no\":15,\"created_at\":\"2022-11-20T16:47:03.000000Z\",\"updated_at\":\"2022-11-20T16:47:03.000000Z\"}}', NULL, '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(87, 'Account', 'Person created', 'App\\Models\\Person', 'created', 29, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":29,\"salutation\":\"Mrs.\",\"first_name\":\"Charlie\",\"middle_name\":\"Sta Ana\",\"last_name\":\"Marollano\",\"created_at\":\"2022-11-20T16:47:03.000000Z\",\"updated_at\":\"2022-11-20T16:47:03.000000Z\"}}', NULL, '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(88, 'Account', 'Person created', 'App\\Models\\Person', 'created', 30, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":30,\"salutation\":\"Mr.\",\"first_name\":\"Police\",\"middle_name\":\"Negros Occidental\",\"last_name\":\"Officers\",\"created_at\":\"2022-11-20T16:47:03.000000Z\",\"updated_at\":\"2022-11-20T16:47:03.000000Z\"}}', NULL, '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(89, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 15, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":15,\"case_no\":15,\"complainant_id\":29,\"respondent_id\":30,\"created_at\":\"2022-11-20T16:47:03.000000Z\",\"updated_at\":\"2022-11-20T16:47:03.000000Z\"}}', NULL, '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(90, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 15, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":15,\"file_address\":\"1668962823.png\",\"person_id\":29,\"created_at\":\"2022-11-20T16:47:03.000000Z\",\"updated_at\":\"2022-11-20T16:47:03.000000Z\"}}', NULL, '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(91, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 16, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":16,\"case_title\":\"Manebali vs Mien\",\"complaint_desc\":\"Wilfredo Christian P. Mien is the registered owner of a blue Honda motorcycle, 2004 model. According to the prosecution, Christian used his motorcycle on December 10, 2010, at about 6 a.m., when he went to work at St. John Hospital in Panganiban Drive, Naga City. He parked his motorcycle in front of the hospital, in the parking area of the Nazareno Drug Store.\\r\\n\\r\\nAfter finishing his shift at about 2 p.m., Christian discovered that his motorcycle was no longer in its parking spot. Unable to find his motorcycle, Christian went to the Philippine National Police Naga City Police Office, Police Precinct No. 2 to report that his motorcycle was stolen. The police recorded the incident in the Daily Record of Events.\",\"relief_desc\":\"The trial court failed to obtain jurisdiction over the people of Marvin co accused, including Albert, the person in whose possession the motorcycle was found. Nonetheless, in its judgment 34 promulgated on December 5, 2014, the trial court found Marvin guilty beyond reasonable doubt of the crime of carnapping, punishable under R.A. No. 6539.\",\"date_of_incident\":\"2019-03-20 00:00:00\",\"date_reported\":\"2022-11-21 00:48:23\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:48:23.000000Z\",\"updated_at\":\"2022-11-20T16:48:23.000000Z\"}}', NULL, '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(92, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 16, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":16,\"article_no\":269,\"case_no\":16,\"created_at\":\"2022-11-20T16:48:23.000000Z\",\"updated_at\":\"2022-11-20T16:48:23.000000Z\"}}', NULL, '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(93, 'Account', 'Person created', 'App\\Models\\Person', 'created', 31, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":31,\"salutation\":\"Mr.\",\"first_name\":\"Marvin\",\"middle_name\":\"Porteria Y\",\"last_name\":\"Manebali\",\"created_at\":\"2022-11-20T16:48:23.000000Z\",\"updated_at\":\"2022-11-20T16:48:23.000000Z\"}}', NULL, '2022-11-20 16:48:23', '2022-11-20 16:48:23');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(94, 'Account', 'Person created', 'App\\Models\\Person', 'created', 32, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":32,\"salutation\":\"Mr.\",\"first_name\":\"Wilfredo Christian\",\"middle_name\":\"Pasang\",\"last_name\":\"Mien\",\"created_at\":\"2022-11-20T16:48:23.000000Z\",\"updated_at\":\"2022-11-20T16:48:23.000000Z\"}}', NULL, '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(95, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 16, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":16,\"case_no\":16,\"complainant_id\":31,\"respondent_id\":32,\"created_at\":\"2022-11-20T16:48:23.000000Z\",\"updated_at\":\"2022-11-20T16:48:23.000000Z\"}}', NULL, '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(96, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 16, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":16,\"file_address\":\"1668962903.png\",\"person_id\":31,\"created_at\":\"2022-11-20T16:48:23.000000Z\",\"updated_at\":\"2022-11-20T16:48:23.000000Z\"}}', NULL, '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(97, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":17,\"case_title\":\"Dumaua vs Ramos\",\"complaint_desc\":\"This case stemmed from an Information filed before the Municipal Circuit Trial Court of Sto. Nino, Cagayan Province charging Ramos of the crime of Grave Oral Defamation.\",\"relief_desc\":\"In a Decision dated September 4, 2014, the RTC affirmed the MCTC ruling in toto It found that the prosecution has indeed established the fact that Ramos uttered defamatory statements of a serious and insulting nature against Dumaua through the positive testimonies not only of the latter.\\r\\n\\r\\nDissatisfied, Ramos filed a petition for review under Rule 42 of the Rules of Court before the CA\",\"date_of_incident\":\"2016-03-19 00:00:00\",\"date_reported\":\"2022-11-21 00:49:30\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:49:30.000000Z\",\"updated_at\":\"2022-11-20T16:49:30.000000Z\"}}', NULL, '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(98, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":17,\"article_no\":364,\"case_no\":17,\"created_at\":\"2022-11-20T16:49:30.000000Z\",\"updated_at\":\"2022-11-20T16:49:30.000000Z\"}}', NULL, '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(99, 'Account', 'Person created', 'App\\Models\\Person', 'created', 33, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":33,\"salutation\":\"Mrs.\",\"first_name\":\"Patrocinia\",\"middle_name\":\"Mosa\",\"last_name\":\"Dumaua\",\"created_at\":\"2022-11-20T16:49:30.000000Z\",\"updated_at\":\"2022-11-20T16:49:30.000000Z\"}}', NULL, '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(100, 'Account', 'Person created', 'App\\Models\\Person', 'created', 34, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":34,\"salutation\":\"Mrs.\",\"first_name\":\"Digna\",\"middle_name\":\"Reyes\",\"last_name\":\"Ramos\",\"created_at\":\"2022-11-20T16:49:30.000000Z\",\"updated_at\":\"2022-11-20T16:49:30.000000Z\"}}', NULL, '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(101, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":17,\"case_no\":17,\"complainant_id\":33,\"respondent_id\":34,\"created_at\":\"2022-11-20T16:49:30.000000Z\",\"updated_at\":\"2022-11-20T16:49:30.000000Z\"}}', NULL, '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(102, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":17,\"file_address\":\"1668962970.png\",\"person_id\":33,\"created_at\":\"2022-11-20T16:49:30.000000Z\",\"updated_at\":\"2022-11-20T16:49:30.000000Z\"}}', NULL, '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(103, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 18, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":18,\"case_title\":\"Darong vs Paera\",\"complaint_desc\":\"As punong barangay of Mampas, Bacong, Negros Oriental, petitioner Santiago Paera allocated his constituents use of communal water coming from a communal tank by limiting distribution to the residents of Mampas, Bacong. The tank sits on a land located in the neighboring barangay of Mampas, Valencia and owned by complainant Vicente Darong father of complainant Indalecio Darong. Despite petitioner scheme, Indalecio continued drawing water from the tank. On 7 April 1999, a petitioner reminded Indalecio of the water distribution scheme and cut Indalecio access.\\r\\n\\r\\nThe following day, petitioner inspected the tank after constituents complained of water supply interruption. Petitioner discovered a tap from the main line which he promptly disconnected. To stem the flow of water from the ensuing leak, a petitioner, using a borrowed bolo, fashioned a wooden plug. It was at this point when Indalecio arrived. What happened next is contested by the parties.\",\"relief_desc\":\"To limit his liability to one count of Grave Threats, petitioner tries to fit the facts of the case to the concept of which envisages a single crime committed through a series of acts arising from one criminal intent or resolution. To fix the penalty for his supposed single continued crime, petitioner invokes the rule for complex crime under Article 48 of the RPC imposing the penalty for the most serious crime, applied in its maximum period.\",\"date_of_incident\":\"2021-05-30 00:00:00\",\"date_reported\":\"2022-11-21 00:50:46\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:50:46.000000Z\",\"updated_at\":\"2022-11-20T16:50:46.000000Z\"}}', NULL, '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(104, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 18, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":18,\"article_no\":286,\"case_no\":18,\"created_at\":\"2022-11-20T16:50:46.000000Z\",\"updated_at\":\"2022-11-20T16:50:46.000000Z\"}}', NULL, '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(105, 'Account', 'Person created', 'App\\Models\\Person', 'created', 35, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":35,\"salutation\":\"Mr.\",\"first_name\":\"Vicente\",\"middle_name\":\"Coim\",\"last_name\":\"Darong\",\"created_at\":\"2022-11-20T16:50:46.000000Z\",\"updated_at\":\"2022-11-20T16:50:46.000000Z\"}}', NULL, '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(106, 'Account', 'Person created', 'App\\Models\\Person', 'created', 36, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":36,\"salutation\":\"Mr.\",\"first_name\":\"Santiago\",\"middle_name\":\"Perez\",\"last_name\":\"Paera\",\"created_at\":\"2022-11-20T16:50:46.000000Z\",\"updated_at\":\"2022-11-20T16:50:46.000000Z\"}}', NULL, '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(107, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 18, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":18,\"case_no\":18,\"complainant_id\":35,\"respondent_id\":36,\"created_at\":\"2022-11-20T16:50:46.000000Z\",\"updated_at\":\"2022-11-20T16:50:46.000000Z\"}}', NULL, '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(108, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 18, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":18,\"file_address\":\"1668963046.png\",\"person_id\":35,\"created_at\":\"2022-11-20T16:50:46.000000Z\",\"updated_at\":\"2022-11-20T16:50:46.000000Z\"}}', NULL, '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(109, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 19, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":19,\"case_title\":\"Sucat vs Calaoagan\",\"complaint_desc\":\"That on or about the 31st day of October, 2004, at around 12 midnight, in Brgy. Poblacion, Municipality of Rosales, Province of Pangasinan, and within the jurisdiction of this Honorable Court, the above named accused, did then and there, willfully unlawfully and feloniously and for no apparent reason, physically maltreat the complainant BBB, a minor of about 17 years of age by punching his face and head, thus place him in an embarrassing and shameful situation in the eyes of the public.\",\"relief_desc\":\"In its November 5, 2012, Decision, the RTC found petitioner guilty beyond reasonable doubt of two counts of Other Acts of Child Abuse, as defined and penalized under Sec. 10, par.\",\"date_of_incident\":\"2022-04-23 00:00:00\",\"date_reported\":\"2022-11-21 00:51:48\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:51:48.000000Z\",\"updated_at\":\"2022-11-20T16:51:48.000000Z\"}}', NULL, '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(110, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 19, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":19,\"article_no\":266,\"case_no\":19,\"created_at\":\"2022-11-20T16:51:48.000000Z\",\"updated_at\":\"2022-11-20T16:51:48.000000Z\"}}', NULL, '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(111, 'Account', 'Person created', 'App\\Models\\Person', 'created', 37, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":37,\"salutation\":\"Mr.\",\"first_name\":\"Dain\",\"middle_name\":\"Lopan\",\"last_name\":\"Sucat\",\"created_at\":\"2022-11-20T16:51:48.000000Z\",\"updated_at\":\"2022-11-20T16:51:48.000000Z\"}}', NULL, '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(112, 'Account', 'Person created', 'App\\Models\\Person', 'created', 38, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":38,\"salutation\":\"Mr.\",\"first_name\":\"Jeffrey\",\"middle_name\":\"Sanya\",\"last_name\":\"Calaoagan\",\"created_at\":\"2022-11-20T16:51:48.000000Z\",\"updated_at\":\"2022-11-20T16:51:48.000000Z\"}}', NULL, '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(113, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 19, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":19,\"case_no\":19,\"complainant_id\":37,\"respondent_id\":38,\"created_at\":\"2022-11-20T16:51:48.000000Z\",\"updated_at\":\"2022-11-20T16:51:48.000000Z\"}}', NULL, '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(114, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 19, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":19,\"file_address\":\"1668963108.png\",\"person_id\":37,\"created_at\":\"2022-11-20T16:51:48.000000Z\",\"updated_at\":\"2022-11-20T16:51:48.000000Z\"}}', NULL, '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(115, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 20, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":20,\"case_title\":\"Esteves vs Sapi\",\"complaint_desc\":\"According to the prosecution, at about 7 a.m. of January 15, 2018, a concerned citizen called a certain PO3 Esteves, police radio operator of the Nagcarlan Police Station, informing him that a certain alias Baho, who was later identified as Veridiano, was on the way to San Pablo City to obtain illegal drugs.\\r\\n\\r\\nAt the police station, PO1 Cabello turned over the seized tea bag to PO1 Solano, who also placed his initials. PO1 Solano then made a laboratory examination request, which he personally brought with the seized tea bag to the Philippine National Police Crime Laboratory. The contents of the tea bag tested positive for marijuana.\",\"relief_desc\":\"In the present case, the extensive search conducted by the police officers exceeded the allowable limits of warrantless searches. They had no probable cause to believe that the accused violated any law except for the tip they received. They did not observe any peculiar activity from the accused that may either arouse their suspicion or verify the tip. Moreover, the search was flawed at its inception. The checkpoint was set up to target the arrest of the accused.\",\"date_of_incident\":\"2019-01-05 00:00:00\",\"date_reported\":\"2022-11-21 00:52:55\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:52:55.000000Z\",\"updated_at\":\"2022-11-20T16:52:55.000000Z\"}}', NULL, '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(116, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 20, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":20,\"article_no\":269,\"case_no\":20,\"created_at\":\"2022-11-20T16:52:55.000000Z\",\"updated_at\":\"2022-11-20T16:52:55.000000Z\"}}', NULL, '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(117, 'Account', 'Person created', 'App\\Models\\Person', 'created', 39, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":39,\"salutation\":\"Mr.\",\"first_name\":\"Brian\",\"middle_name\":\"Danay\",\"last_name\":\"Esteves\",\"created_at\":\"2022-11-20T16:52:55.000000Z\",\"updated_at\":\"2022-11-20T16:52:55.000000Z\"}}', NULL, '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(118, 'Account', 'Person created', 'App\\Models\\Person', 'created', 40, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":40,\"salutation\":\"Mr.\",\"first_name\":\"Mario\",\"middle_name\":\"Veridiano Y\",\"last_name\":\"Sapi\",\"created_at\":\"2022-11-20T16:52:55.000000Z\",\"updated_at\":\"2022-11-20T16:52:55.000000Z\"}}', NULL, '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(119, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 20, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":20,\"case_no\":20,\"complainant_id\":39,\"respondent_id\":40,\"created_at\":\"2022-11-20T16:52:55.000000Z\",\"updated_at\":\"2022-11-20T16:52:55.000000Z\"}}', NULL, '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(120, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 20, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":20,\"file_address\":\"1668963175.png\",\"person_id\":39,\"created_at\":\"2022-11-20T16:52:55.000000Z\",\"updated_at\":\"2022-11-20T16:52:55.000000Z\"}}', NULL, '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(121, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 21, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":21,\"case_title\":\"Lopez vs Angkong\",\"complaint_desc\":\"Ms. Daisy Masukat Angkong asked the Brgy. Tanod Arnel Lopez on November 27, 2021 whether she could get her daughter Kate a barangay certificate so she could fulfill a school requirement. Kate does not have a legal ID, so Brgy. Tanod Arnel Lopez requested Kates birth certificate. When Brgy. Tanod Arnel Lopez viewed the birth certificate, she immediately recognized it was fake.\",\"relief_desc\":\"For the benefit of Kate, we continue to provide her with the Barangay Certificate she needs, but we will continue to pursue a case against her mother Ms. Daisy Masukat Angkong for breaking Article 175.\",\"date_of_incident\":\"2021-11-27 00:00:00\",\"date_reported\":\"2022-11-21 00:54:27\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:54:27.000000Z\",\"updated_at\":\"2022-11-20T16:54:27.000000Z\"}}', NULL, '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(122, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 21, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":21,\"article_no\":175,\"case_no\":21,\"created_at\":\"2022-11-20T16:54:27.000000Z\",\"updated_at\":\"2022-11-20T16:54:27.000000Z\"}}', NULL, '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(123, 'Account', 'Person created', 'App\\Models\\Person', 'created', 41, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":41,\"salutation\":\"Mr.\",\"first_name\":\"Arnel\",\"middle_name\":\"Sinag\",\"last_name\":\"Lopez\",\"created_at\":\"2022-11-20T16:54:27.000000Z\",\"updated_at\":\"2022-11-20T16:54:27.000000Z\"}}', NULL, '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(124, 'Account', 'Person created', 'App\\Models\\Person', 'created', 42, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":42,\"salutation\":\"Ms.\",\"first_name\":\"Daisy\",\"middle_name\":\"Masukat\",\"last_name\":\"Angkong\",\"created_at\":\"2022-11-20T16:54:27.000000Z\",\"updated_at\":\"2022-11-20T16:54:27.000000Z\"}}', NULL, '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(125, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 21, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":21,\"case_no\":21,\"complainant_id\":41,\"respondent_id\":42,\"created_at\":\"2022-11-20T16:54:27.000000Z\",\"updated_at\":\"2022-11-20T16:54:27.000000Z\"}}', NULL, '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(126, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 21, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":21,\"file_address\":\"1668963267.png\",\"person_id\":41,\"created_at\":\"2022-11-20T16:54:27.000000Z\",\"updated_at\":\"2022-11-20T16:54:27.000000Z\"}}', NULL, '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(127, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":22,\"case_title\":\"Ferrer vs Garcia\",\"complaint_desc\":\"On that morning of February 1, 2010, the defendant came to our residence and forcefully entered our house. On that said date and incident, the defendant had shouted at my wife Ms. Andrea and told her I will kill you while pointing his to my wife. On the afternoon of the date while we were walking in front of the Barangay Hall, the defendant had brought the knife and pointed it at us while shouting That is right, you are going to hit me for a while so that your chin will calm down. The defendant is a resident of this barangay, Barangay 385, and the complainants are likewise located in the same barangay\",\"relief_desc\":\"The respondent Mr. Ryan Cris Miguel Garcia be made to appear before the Lupong of Barangay 385. That after the notice and hearing, respondents are directed to avoid contact with the complainants.\",\"date_of_incident\":\"2020-02-01 00:00:00\",\"date_reported\":\"2022-11-21 00:55:39\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:55:39.000000Z\",\"updated_at\":\"2022-11-20T16:55:39.000000Z\"}}', NULL, '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(128, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":22,\"article_no\":285,\"case_no\":22,\"created_at\":\"2022-11-20T16:55:39.000000Z\",\"updated_at\":\"2022-11-20T16:55:39.000000Z\"}}', NULL, '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(129, 'Account', 'Person created', 'App\\Models\\Person', 'created', 43, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":43,\"salutation\":\"Ms.\",\"first_name\":\"Andrea\",\"middle_name\":\"Javier\",\"last_name\":\"Ferrer\",\"created_at\":\"2022-11-20T16:55:39.000000Z\",\"updated_at\":\"2022-11-20T16:55:39.000000Z\"}}', NULL, '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(130, 'Account', 'Person created', 'App\\Models\\Person', 'created', 44, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":44,\"salutation\":\"Mr.\",\"first_name\":\"Ryan\",\"middle_name\":\"Miguel\",\"last_name\":\"Garcia\",\"created_at\":\"2022-11-20T16:55:39.000000Z\",\"updated_at\":\"2022-11-20T16:55:39.000000Z\"}}', NULL, '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(131, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":22,\"case_no\":22,\"complainant_id\":43,\"respondent_id\":44,\"created_at\":\"2022-11-20T16:55:39.000000Z\",\"updated_at\":\"2022-11-20T16:55:39.000000Z\"}}', NULL, '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(132, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":22,\"file_address\":\"1668963339.png\",\"person_id\":43,\"created_at\":\"2022-11-20T16:55:39.000000Z\",\"updated_at\":\"2022-11-20T16:55:39.000000Z\"}}', NULL, '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(133, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":23,\"case_title\":\"Lopez vs Salvador\",\"complaint_desc\":\"On March 23, 2021, Dr. Anne Corpuz Salvador, a 41 year old at Brgy. 385, was detained today for her attempt to sell COVID 19 vaccination cards and homeoprophylaxis immunization pellets by pretending that clients had received the Food and Drug Administration approved Moderna vaccine. An anonymous report claims that Dr. Anne Corpuz Salvador is fabricating fraudulent vaccination records.\",\"relief_desc\":\"By exploiting anxieties and disseminating false information regarding FDA approved vaccinations, as well as by hawking phony cures that threaten people lives, Dr. Anne Corpuz Salvador deceived and harmed the public. Even worse, she made phony COVID19 vaccination cards and gave her clients the goahead to falsely mark that they had had a shot, allowing them to get around efforts to stop the diseases spread. During this time of national disaster, Barangay 385 is dedicated to defending the populace from fraudsters. The council opted not to involve the police because it is a deceitful activity.\",\"date_of_incident\":\"2021-03-23 00:00:00\",\"date_reported\":\"2022-11-21 00:56:41\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:56:41.000000Z\",\"updated_at\":\"2022-11-20T16:56:41.000000Z\"}}', NULL, '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(134, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":23,\"article_no\":175,\"case_no\":23,\"created_at\":\"2022-11-20T16:56:41.000000Z\",\"updated_at\":\"2022-11-20T16:56:41.000000Z\"}}', NULL, '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(135, 'Account', 'Person created', 'App\\Models\\Person', 'created', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":45,\"salutation\":\"Mr.\",\"first_name\":\"Arnel\",\"middle_name\":\"Mosa\",\"last_name\":\"Lopez\",\"created_at\":\"2022-11-20T16:56:41.000000Z\",\"updated_at\":\"2022-11-20T16:56:41.000000Z\"}}', NULL, '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(136, 'Account', 'Person created', 'App\\Models\\Person', 'created', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":46,\"salutation\":\"Mrs.\",\"first_name\":\"Ann\",\"middle_name\":\"Corpuz\",\"last_name\":\"Salvador\",\"created_at\":\"2022-11-20T16:56:41.000000Z\",\"updated_at\":\"2022-11-20T16:56:41.000000Z\"}}', NULL, '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(137, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":23,\"case_no\":23,\"complainant_id\":45,\"respondent_id\":46,\"created_at\":\"2022-11-20T16:56:41.000000Z\",\"updated_at\":\"2022-11-20T16:56:41.000000Z\"}}', NULL, '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(138, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":23,\"file_address\":\"1668963401.png\",\"person_id\":45,\"created_at\":\"2022-11-20T16:56:41.000000Z\",\"updated_at\":\"2022-11-20T16:56:41.000000Z\"}}', NULL, '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(139, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 24, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":24,\"case_title\":\"Duga vs Langaig\",\"complaint_desc\":\"That on or about 240 in the afternoon of this date, a cell phone call received by this station coming from the above named victim to report the above captioned case. Investigation disclosed that at around 730 in the morning of this date, the above named victim left her rented room to her newly boarded mate identified as Prince Khyler Langaig and went to her work at Dalton pawnshop. However, at around 1155 in the morning of the same date, one of the victims board mates identified as Rosalie Terana Pastolero informed her that her belongings inside her rented room were scattered on the floor. Then and there, the above named victim immediately returned home. Arriving at her boarding house, she discovered that some of her branded clothes were missing. Above named victim immediately located her board mate Prince Khyler Langaig but she could not be found anymore. She also checked the room of her board mate however all belongings of the latter were no longer inside his rented room and believed to be absconded with the above mentioned stolen items. Motive of the said incident is for personal gained\",\"relief_desc\":\"Case of theft is now being readied against the above named suspect through regular filing in court.\",\"date_of_incident\":\"2018-05-12 00:00:00\",\"date_reported\":\"2022-11-21 00:57:41\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:57:41.000000Z\",\"updated_at\":\"2022-11-20T16:57:41.000000Z\"}}', NULL, '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(140, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 24, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":24,\"article_no\":309,\"case_no\":24,\"created_at\":\"2022-11-20T16:57:41.000000Z\",\"updated_at\":\"2022-11-20T16:57:41.000000Z\"}}', NULL, '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(141, 'Account', 'Person created', 'App\\Models\\Person', 'created', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":47,\"salutation\":\"Ms.\",\"first_name\":\"Gwen\",\"middle_name\":\"Cabang\",\"last_name\":\"Duga\",\"created_at\":\"2022-11-20T16:57:41.000000Z\",\"updated_at\":\"2022-11-20T16:57:41.000000Z\"}}', NULL, '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(142, 'Account', 'Person created', 'App\\Models\\Person', 'created', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":48,\"salutation\":\"Mr.\",\"first_name\":\"Prince\",\"middle_name\":\"Khyler\",\"last_name\":\"Langaig\",\"created_at\":\"2022-11-20T16:57:41.000000Z\",\"updated_at\":\"2022-11-20T16:57:41.000000Z\"}}', NULL, '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(143, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 24, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":24,\"case_no\":24,\"complainant_id\":47,\"respondent_id\":48,\"created_at\":\"2022-11-20T16:57:41.000000Z\",\"updated_at\":\"2022-11-20T16:57:41.000000Z\"}}', NULL, '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(144, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 24, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":24,\"file_address\":\"1668963461.png\",\"person_id\":47,\"created_at\":\"2022-11-20T16:57:41.000000Z\",\"updated_at\":\"2022-11-20T16:57:41.000000Z\"}}', NULL, '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(145, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 25, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":25,\"case_title\":\"Puerto vs Canon\",\"complaint_desc\":\"The victim was identified as Rodney Madayos Puerto, 25, a single helper and resident of 1st Blk Callejo Subd., Brgy Gen. Paulino Santos, Koronadal City. He sustained multiple stab wounds to various parts of his body and was rushed by responding City Fire ambulance personnel, led by F03 Palalimpa, to South Cotabato Province on or about January 21, 2018, at about 330 in the morning. While being detained by staff at this station, the suspect, Alan Perez Canon, 35 years old, a single tricycle driver, and a resident of Prk Nursery, Brgy Maibo, Tantangan South Cotabato, was found to be in possession of two stainless kitchen knives that were approximately twelve inches long without its handle and eighteen inches long with its handle each. According to the investigation, the aforementioned victim and the aforementioned suspect were out drinking with their respective friends and companions at the video ok store in Brgy. Zone I of this city when the aforementioned suspect, acting on his own initiative, deliberately stabbed the aforementioned victim, striking him in various locations on his body. Unsatisfied, the aforementioned suspect followed the aforementioned victim to the area of this station, where officers from this office were able to detain him. This incident was motivated by personal animosity.\",\"relief_desc\":\"A case of frustrated murderis now being readied against the apprehended suspect Mr. Alan Perez Canon for filing thru inquest proceedings at the City Prosecutor office, Hall of Justice, Koronadal City.\",\"date_of_incident\":\"2022-01-01 00:00:00\",\"date_reported\":\"2022-11-21 00:59:01\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T16:59:01.000000Z\",\"updated_at\":\"2022-11-20T16:59:01.000000Z\"}}', NULL, '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(146, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 25, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":25,\"article_no\":265,\"case_no\":25,\"created_at\":\"2022-11-20T16:59:01.000000Z\",\"updated_at\":\"2022-11-20T16:59:01.000000Z\"}}', NULL, '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(147, 'Account', 'Person created', 'App\\Models\\Person', 'created', 49, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":49,\"salutation\":\"Mr.\",\"first_name\":\"Rodney\",\"middle_name\":\"Madayos\",\"last_name\":\"Puerto\",\"created_at\":\"2022-11-20T16:59:01.000000Z\",\"updated_at\":\"2022-11-20T16:59:01.000000Z\"}}', NULL, '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(148, 'Account', 'Person created', 'App\\Models\\Person', 'created', 50, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":50,\"salutation\":\"Mr.\",\"first_name\":\"Alan\",\"middle_name\":\"Perez\",\"last_name\":\"Canon\",\"created_at\":\"2022-11-20T16:59:01.000000Z\",\"updated_at\":\"2022-11-20T16:59:01.000000Z\"}}', NULL, '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(149, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 25, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":25,\"case_no\":25,\"complainant_id\":49,\"respondent_id\":50,\"created_at\":\"2022-11-20T16:59:01.000000Z\",\"updated_at\":\"2022-11-20T16:59:01.000000Z\"}}', NULL, '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(150, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 25, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":25,\"file_address\":\"1668963541.png\",\"person_id\":49,\"created_at\":\"2022-11-20T16:59:01.000000Z\",\"updated_at\":\"2022-11-20T16:59:01.000000Z\"}}', NULL, '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(151, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 26, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":26,\"case_title\":\"Oberio vs Unidentified\",\"complaint_desc\":\"Investigation disclosed that at around 3 oclock in the afternoon of this date, Johnny Lamason Bote, 24 y.o live in partner of the victim, left and parked the said motorcycle at the designated parking area and entered to Koronadal City Public Market purposely to fetch his live in partner. Moments later, when they are about to go home and went back to\\r\\nget their motorcycle, same discovered that it was no longer at the exact\\r\\narea where he parks and left it, probably stolen by unidentified suspect.\",\"relief_desc\":\"Flash Alarm already disseminated for the possible recovery and apprehension of the suspect involved.\",\"date_of_incident\":\"2022-07-29 00:00:00\",\"date_reported\":\"2022-11-21 01:00:32\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T17:00:32.000000Z\",\"updated_at\":\"2022-11-20T17:00:32.000000Z\"}}', NULL, '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(152, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 26, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":26,\"article_no\":309,\"case_no\":26,\"created_at\":\"2022-11-20T17:00:32.000000Z\",\"updated_at\":\"2022-11-20T17:00:32.000000Z\"}}', NULL, '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(153, 'Account', 'Person created', 'App\\Models\\Person', 'created', 51, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":51,\"salutation\":\"Ms.\",\"first_name\":\"Nalyn\",\"middle_name\":\"Daguat\",\"last_name\":\"Oberio\",\"created_at\":\"2022-11-20T17:00:32.000000Z\",\"updated_at\":\"2022-11-20T17:00:32.000000Z\"}}', NULL, '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(154, 'Account', 'Person created', 'App\\Models\\Person', 'created', 52, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":52,\"salutation\":\"Mr.\",\"first_name\":\"Unidentified\",\"middle_name\":\"Unidentified\",\"last_name\":\"Unidentified\",\"created_at\":\"2022-11-20T17:00:32.000000Z\",\"updated_at\":\"2022-11-20T17:00:32.000000Z\"}}', NULL, '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(155, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 26, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":26,\"case_no\":26,\"complainant_id\":51,\"respondent_id\":52,\"created_at\":\"2022-11-20T17:00:32.000000Z\",\"updated_at\":\"2022-11-20T17:00:32.000000Z\"}}', NULL, '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(156, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 26, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":26,\"file_address\":\"1668963632.png\",\"person_id\":51,\"created_at\":\"2022-11-20T17:00:32.000000Z\",\"updated_at\":\"2022-11-20T17:00:32.000000Z\"}}', NULL, '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(157, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 27, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":27,\"case_title\":\"Pangilinan vs Paera\",\"complaint_desc\":\"Nicko Pangilinan, a 33 year old who is currently married to Angel Pangilinan was caught in the act of Adultery to which the complainant caught her husband engaged in sexual activity with another spouse who is also married and has 3 kids who was seen on top of the complainee in a private property which was owned by Mr. Pangilinan. The act was caught when she followed her husband due to previous arguments that made the complainant follow the complainee to determine the cause of unfaithfulness. An anonymous tip also claimed that Mr. Pangilinan was also seen dating another woman on different occasions.\",\"relief_desc\":\"Due to unfaithfulness and dishonest actions made by Mr. Pangilinan which clearly affected Mrs. Pangilinan mentally, physically, and emotionally unstable.\",\"date_of_incident\":\"2022-11-05 00:00:00\",\"date_reported\":\"2022-11-21 01:01:38\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T17:01:38.000000Z\",\"updated_at\":\"2022-11-20T17:01:38.000000Z\"}}', NULL, '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(158, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 27, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":27,\"article_no\":318,\"case_no\":27,\"created_at\":\"2022-11-20T17:01:38.000000Z\",\"updated_at\":\"2022-11-20T17:01:38.000000Z\"}}', NULL, '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(159, 'Account', 'Person created', 'App\\Models\\Person', 'created', 53, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":53,\"salutation\":\"Ms.\",\"first_name\":\"Angel\",\"middle_name\":\"Mosa\",\"last_name\":\"Pangilinan\",\"created_at\":\"2022-11-20T17:01:38.000000Z\",\"updated_at\":\"2022-11-20T17:01:38.000000Z\"}}', NULL, '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(160, 'Account', 'Person created', 'App\\Models\\Person', 'created', 54, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":54,\"salutation\":\"Mr.\",\"first_name\":\"Nicko\",\"middle_name\":\"Pasang\",\"last_name\":\"Paera\",\"created_at\":\"2022-11-20T17:01:38.000000Z\",\"updated_at\":\"2022-11-20T17:01:38.000000Z\"}}', NULL, '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(161, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 27, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":27,\"case_no\":27,\"complainant_id\":53,\"respondent_id\":54,\"created_at\":\"2022-11-20T17:01:38.000000Z\",\"updated_at\":\"2022-11-20T17:01:38.000000Z\"}}', NULL, '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(162, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 27, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":27,\"file_address\":\"1668963698.png\",\"person_id\":53,\"created_at\":\"2022-11-20T17:01:38.000000Z\",\"updated_at\":\"2022-11-20T17:01:38.000000Z\"}}', NULL, '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(163, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 28, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":28,\"case_title\":\"Guiapal vs Unidentified\",\"complaint_desc\":\"That on or about 150 in the afternoon of this date, the above named victim personally appeared herein to report the above captioned case. Investigation disclosed that at around 1230 in the afternoon of December 24, 2017, above named victim parked and left unattended her driven motorcycle at the parking area of SOCOMEDICS and went inside purposely to visit the niece of her friend who was confined at the said hospital. However, when she went out at around 120 in the afternoon of the same date, she was shocked when she discovered that her MC was no longer at the exact place where she parked the same and believed to be stolen by an unidentified suspect.\",\"relief_desc\":\"Flash alarm was disseminated to the neighboring area which resulted in the recovery of the above mentioned stolen motorcycle abandoned in front of LBC Alunan Avenue, Brgy Zone IV, this City at around 155 PM of this date.\",\"date_of_incident\":\"2017-12-24 00:00:00\",\"date_reported\":\"2022-11-21 01:02:36\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T17:02:36.000000Z\",\"updated_at\":\"2022-11-20T17:02:36.000000Z\"}}', NULL, '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(164, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 28, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":28,\"article_no\":357,\"case_no\":28,\"created_at\":\"2022-11-20T17:02:36.000000Z\",\"updated_at\":\"2022-11-20T17:02:36.000000Z\"}}', NULL, '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(165, 'Account', 'Person created', 'App\\Models\\Person', 'created', 55, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":55,\"salutation\":\"Mr.\",\"first_name\":\"Bainot\",\"middle_name\":\"Macasayon\",\"last_name\":\"Guiapal\",\"created_at\":\"2022-11-20T17:02:36.000000Z\",\"updated_at\":\"2022-11-20T17:02:36.000000Z\"}}', NULL, '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(166, 'Account', 'Person created', 'App\\Models\\Person', 'created', 56, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":56,\"salutation\":\"Mr.\",\"first_name\":\"Unidentified\",\"middle_name\":\"Unidentified\",\"last_name\":\"Unidentified\",\"created_at\":\"2022-11-20T17:02:36.000000Z\",\"updated_at\":\"2022-11-20T17:02:36.000000Z\"}}', NULL, '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(167, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 28, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":28,\"case_no\":28,\"complainant_id\":55,\"respondent_id\":56,\"created_at\":\"2022-11-20T17:02:36.000000Z\",\"updated_at\":\"2022-11-20T17:02:36.000000Z\"}}', NULL, '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(168, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 28, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":28,\"file_address\":\"1668963756.png\",\"person_id\":55,\"created_at\":\"2022-11-20T17:02:36.000000Z\",\"updated_at\":\"2022-11-20T17:02:36.000000Z\"}}', NULL, '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(169, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 29, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":29,\"case_title\":\"Navajo vs Jore\",\"complaint_desc\":\"A victim of a stabbing incident was taken to the South Cotabato Provincial Hospital on or around the morning of this day, according to Richie Cabaoan, a PSU member who is on duty there. Personnel from this station immediately headed to the previously mentioned hospital. A preliminary investigation identified the victim as Ryan Paldas Navajo, age 31, a married vulcanizer, and a resident of Prk Tuburan, Brgy Sta Cruz, Koronadal City. He had suffered a single stab wound to the left side of his neck and was being treated at the aforementioned hospital by Dr. Jerome Napoles, the attending physician at the hospital. Jogel Almania Jore, a 37yearold single carpenter from Navarro Street in Brgy. Gen. Paulino Santos, Koronadal City, and Rudy Zabala Villanueva, a 23 year old single laborer from the same neighborhood, were detained by staff members of this station during follow up. They were in the area of Koronadal City Police when the aforementioned suspects attempted to put in to record the incident under the pretense However, the witnesses who saw them may have recognized them as the culprits in the aforementioned stabbing incident, in which one Ryan Navajo was actually the true victim. The incident was motivated by personal animosity and intoxication.\",\"relief_desc\":\"Apprehended suspects were placed under custody of this station while a case of attempted homicide is being readied against them for filing thru inquest proceeding at City prosecutor office, Hall of Justice, Brgy Zone III, Koronadal City.\",\"date_of_incident\":\"2018-01-18 00:00:00\",\"date_reported\":\"2022-11-21 01:03:38\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T17:03:38.000000Z\",\"updated_at\":\"2022-11-20T17:03:38.000000Z\"}}', NULL, '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(170, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 29, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":29,\"article_no\":252,\"case_no\":29,\"created_at\":\"2022-11-20T17:03:38.000000Z\",\"updated_at\":\"2022-11-20T17:03:38.000000Z\"}}', NULL, '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(171, 'Account', 'Person created', 'App\\Models\\Person', 'created', 57, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":57,\"salutation\":\"Mr.\",\"first_name\":\"Ryan\",\"middle_name\":\"Paldas\",\"last_name\":\"Navajo\",\"created_at\":\"2022-11-20T17:03:38.000000Z\",\"updated_at\":\"2022-11-20T17:03:38.000000Z\"}}', NULL, '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(172, 'Account', 'Person created', 'App\\Models\\Person', 'created', 58, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":58,\"salutation\":\"Mr.\",\"first_name\":\"Jogel\",\"middle_name\":\"Almania\",\"last_name\":\"Jore\",\"created_at\":\"2022-11-20T17:03:38.000000Z\",\"updated_at\":\"2022-11-20T17:03:38.000000Z\"}}', NULL, '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(173, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 29, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":29,\"case_no\":29,\"complainant_id\":57,\"respondent_id\":58,\"created_at\":\"2022-11-20T17:03:38.000000Z\",\"updated_at\":\"2022-11-20T17:03:38.000000Z\"}}', NULL, '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(174, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 29, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":29,\"file_address\":\"1668963818.png\",\"person_id\":57,\"created_at\":\"2022-11-20T17:03:38.000000Z\",\"updated_at\":\"2022-11-20T17:03:38.000000Z\"}}', NULL, '2022-11-20 17:03:39', '2022-11-20 17:03:39'),
(175, 'Blotter Case', 'Blotter case created', 'App\\Models\\Blotter', 'created', 30, 'App\\Models\\User', 1, '{\"attributes\":{\"case_no\":30,\"case_title\":\"Pamplona vs Dizon\",\"complaint_desc\":\"That on or about 140 in the afternoon of this date, the above named victim and above named driver personally appeared herein to report the above captioned case. Investigation disclosed that at around 115 in the afternoon of this date, the above named driver parked unlocked and left unattended his motorcycle at the motorcycle parking area of the said hardware and went inside purposely to buy a welding rod. However, when he went out at around 125 in the afternoon of the same date, he was shocked when he discovered that his motorcycle was no longer at the exact place where he parked the same and believed to be stolen by an unidentified suspect. Motive of the said incident is for personal gain.\",\"relief_desc\":\"The possibility of apprehending the involved person and recovering the stolen motorcycle led to the prompt distribution of a flash alarm.\",\"date_of_incident\":\"2018-01-20 00:00:00\",\"date_reported\":\"2022-11-21 01:04:46\",\"processed_by\":1,\"compliance\":0,\"date_of_execution\":null,\"remarks\":\"\",\"created_at\":\"2022-11-20T17:04:46.000000Z\",\"updated_at\":\"2022-11-20T17:04:46.000000Z\"}}', NULL, '2022-11-20 17:04:46', '2022-11-20 17:04:46'),
(176, 'Blotter Case', 'Incident case created', 'App\\Models\\Incident_Case', 'created', 30, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":30,\"article_no\":281,\"case_no\":30,\"created_at\":\"2022-11-20T17:04:46.000000Z\",\"updated_at\":\"2022-11-20T17:04:46.000000Z\"}}', NULL, '2022-11-20 17:04:46', '2022-11-20 17:04:46'),
(177, 'Account', 'Person created', 'App\\Models\\Person', 'created', 59, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":59,\"salutation\":\"Ms.\",\"first_name\":\"Hazel\",\"middle_name\":\"Gayosa\",\"last_name\":\"Pamplona\",\"created_at\":\"2022-11-20T17:04:46.000000Z\",\"updated_at\":\"2022-11-20T17:04:46.000000Z\"}}', NULL, '2022-11-20 17:04:46', '2022-11-20 17:04:46'),
(178, 'Account', 'Person created', 'App\\Models\\Person', 'created', 60, 'App\\Models\\User', 1, '{\"attributes\":{\"person_id\":60,\"salutation\":\"Ms.\",\"first_name\":\"Digna\",\"middle_name\":\"Veridiano Y\",\"last_name\":\"Dizon\",\"created_at\":\"2022-11-20T17:04:46.000000Z\",\"updated_at\":\"2022-11-20T17:04:46.000000Z\"}}', NULL, '2022-11-20 17:04:46', '2022-11-20 17:04:46'),
(179, 'Blotter Case', 'Case involved created', 'App\\Models\\Case_Involved', 'created', 30, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":30,\"case_no\":30,\"complainant_id\":59,\"respondent_id\":60,\"created_at\":\"2022-11-20T17:04:46.000000Z\",\"updated_at\":\"2022-11-20T17:04:46.000000Z\"}}', NULL, '2022-11-20 17:04:46', '2022-11-20 17:04:46'),
(180, 'Account', 'Person signature created', 'App\\Models\\Person_Signature', 'created', 30, 'App\\Models\\User', 1, '{\"attributes\":{\"file_id\":30,\"file_address\":\"1668963886.png\",\"person_id\":59,\"created_at\":\"2022-11-20T17:04:46.000000Z\",\"updated_at\":\"2022-11-20T17:04:46.000000Z\"}}', NULL, '2022-11-20 17:04:46', '2022-11-20 17:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `amicable_settlements`
--

CREATE TABLE `amicable_settlements` (
  `settlement_id` bigint(20) UNSIGNED NOT NULL,
  `date_agreed` datetime DEFAULT NULL,
  `agreement_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arbitration_agreements`
--

CREATE TABLE `arbitration_agreements` (
  `agreement_id` bigint(20) UNSIGNED NOT NULL,
  `hearing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_made` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arbitration_awards`
--

CREATE TABLE `arbitration_awards` (
  `award_id` bigint(20) UNSIGNED NOT NULL,
  `date_agreed` datetime DEFAULT NULL,
  `award_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `made_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blotter_report`
--

CREATE TABLE `blotter_report` (
  `case_no` bigint(20) UNSIGNED NOT NULL,
  `case_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaint_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relief_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_incident` datetime DEFAULT NULL,
  `date_reported` datetime DEFAULT NULL,
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `compliance` tinyint(1) NOT NULL,
  `date_of_execution` datetime DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blotter_report`
--

INSERT INTO `blotter_report` (`case_no`, `case_title`, `complaint_desc`, `relief_desc`, `date_of_incident`, `date_reported`, `processed_by`, `compliance`, `date_of_execution`, `remarks`, `created_at`, `updated_at`) VALUES
(2022001, '6ycuRvlc4lfu37OQnUD5Wi6Nl9A0rQx+ahMJiCV1YSo=', 'Lvg1c9BYSFQDTCrYb4bteJ2CYAkwsv9QntE5pV8RUw9M6TZhf/67zOrVoA4nJlTrRahGFmvIjog3li34jn440FgJF/7yeN09SYZzr0WYpJ2rii6qiOvE5tFt+OKz8wkK/8oMddqpOeGIR315xdyfm6wZqbkIxa+tF7wGUYwYiL+UQEu8JsP65gs5QC2EuR2n7EWSDqCtwVc5bPoOi47F360xqEj3whEhHJ842ftCMraXc/8IAbGIMRNmojho6SPJhZnm7z4dmVfVDnSRHUyaU7KkP8fMdKujZpMbBLHTSCY1m/X7pKQD9tOavxcUe9glg5xLeuDG0GTNX4Mwq2XWiDbzCEDWXckzM4NpO6lbS7+Q0Q5jlngiF3HiNd6tDvR9om4+W7wlSnnj2RtwvNUVbwWjRfqEu08PnG0HNSySx4I=', 'k8f5pLyiGMU/noOwKRw4UEqkbQX6gcwHiJS+bW+9cvKf2Uis+WFBFJJ09Hd3uVu5o9H/yb1DEI32QlQSYGp1qe37xu3nDtZXRuMnVXDnm0pZVCctr5UxLIWUpGWV2cFvt93HkpajMrM1IvrAm3IVmX5EbPw4cGJy51XYcIJhK/xWqG5mKrWaP04VjlnpyFhdpB5aCN8u4q76I5lbkgetxeheXZ/VPmCmTn6zUg3LBcZUOWGMhf0zYYRXTBOpXL41', '2020-06-18 00:00:00', '2022-11-21 00:18:00', 1, 0, NULL, '', '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(2022002, 'EaUp4MGEFVmVGQXzPAOHoFOs4zudLEGwq36QbdbuVF4=', 'JZpZEp2fwTsdqzPc8dTCP6l++d9lexR3yfnm7Z9mJ2+A1OsHcJmoXTGbxJpj50RX2EhnfyUGD3EU07j3MN6+iwAlaLrR0kMUQTx8qTmezgbCeYogQbqPnkW1nvPbdG0PyN3dcTQruLkVrNvha1L+OMOoqqkjApFO96Cwwz5Xw8aT1M0F/ewPBCRqySHjhETEPF0ZP6sfxgwRSLKIY5cqAjvazaKSkoDaUmd8NFVgTTTsMR0lSqmP6+YdqFvhp0zCn+TsDjGT0gzHh104rlJVZC211grw8yn6yRbnLNEHPb5XNtji8ka9jlCIJ362WkeELaQy7L/0WkKsoiZ9ERkkOeM85N+hAva3/L64y6EhSIqAqalDOaMmLisnOOlpK1u4QduwYVCtEk+yipgwfEh6Mdym/Z1lgck0NujMFlh6bmP6+2KW0xBSb8qLI0jG0N2m9baJiBWstRWSEGUnLpjo+eV2riGR8+kfhlFt3E39dTBKTXm7OgRCEBmNI2fuE+ABs4kCsS2uSW4ihnwO0CQLNfCMwFUVukqFHH0ABvPqE/3aa33xuRvmPURiLFFWdfRHoEuNZ4+A2hVd1Ex0vanKRArBB52hqO9MMJPy9n53UEuCpUiB7l9oqO2PVbL6Uj7PvZnPfse09mECYh8QqVovodIV3VKFdiu+ma1bU8MSWS/9tHtlke4pgdXPRvUHOWnMYk7V6jWSn8czXl+4l08H3w==', 'ophietjAup5l9IsUrJG0oViS2L8j4jq7XWEOqeqD9BqZ8xTAnxOxRDNUuBSMeyFH3uHk6DZGVK4A1zoILP+emuvYXFv5+dObMt/p/toqIr1zAAyPXouUAv6uo1dDBJAJwelBPdXL7dw9e0VSK57Czl3ogpwPfniY5sf8DpQi/wgmb+7hO0Bl6Rqt2/Pt9iBU4obdgS7mCPgbDn3csTnvxrd2bjP3c5vh+U4rzabyismlNyemzgRIpcSm7q5CCegAV+Kcxw/PPgBgdxjr/dV+Cu61C/MwrHEMx69uG8u+112I49tGO1s45iajyiPmoLvG', '2021-04-01 00:00:00', '2022-11-21 00:19:59', 1, 0, NULL, '', '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(2022003, 'VOFuL2P48lRKakK1awOUKvddGEiIq7Wv2taxEobzt7g=', 'OkZ4PAAiIMYrJxz5LFcKiMr0O/QvRVkn5h5Qe7WfZoflo9zycJiiKuq4DfST1+jhGQqh2t5+k+cw0nQW6Jz0YHb9s03J1Epz/+nM2aSQpLUAq5WydhaXR20eKqFI8AFgPA1GJw5fjy3NGil5hQ9juU9RSQpe2083OgvxGaw+xTm+/KFyXNNfHZLj5Jk75ohhIStxzG1TzP1CrEFPHdv++/LHL23bZQL2C0l64BwEYdV0AuXR2OhAm2Qq4Yi+od07ZdM+zll4ryU+7/VbwtA1Apl1cTBTZUlh2Gm0Yg3Z+YW9ZqoH/0ZjGD3uTnmmo6p53IzRaGmPLdHR0Iuh9zZJUQhSt7bo5zMY1+Ko8By45NAFmimv34upKXiFC3F62qXDU1uXarGTIDpGKnDkv9Va0s5WJVT4ZJnJVOk6ktt1TG9KGabaO2/kopeDdMgwYKYIOfVvkKAkEFcwvqNnMoEau67WthcFdT631vNifDcUTwrfuSmXSqP2kjS7lInnGkv0yics9IRGQh3/SXe8ZK8Xtw==', '/Q4qHGA1csMhDGwhs3c35pNgQWpCwJKbeZHXRU611GkIC/d5JsW6BF/EbtMXPF2hiZImh+d2QsK2lmv+vVNvxZtJ/KGSnjZwRXiB/NI4EIlIE3pjs/Q9RKNcPp69Og1uhxtq2UHyhw0iYxlIpcv7fy88Hu5m72mcV/yoLfp0d4rS7oI94aWI6FLaMb6MQZkLK5eC6H116RFPJj+NbqZOMs1dQKG407kzecooTckwewOsjJRBC0NQHWzvdvHoVmTI', '2022-10-26 00:00:00', '2022-11-21 00:21:03', 1, 0, NULL, '', '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(2022004, 'rhUoSuaAUahwiUnddLVV9TecPLzLyXAtxP7AIyWeTgU=', 'WGlwTC1koSLhAUKGuoP79K7JBPgky9YC1gXEBOtxRzIup4fEeDyTBhR8yxomuJQxnfvvF04dItM7Neq+7qKxHCRXzIl62fJm/d85RtFtWZsLV4Pwtgr4uYsYbDLR7cITKnRKciso6dKsniYMyVYLKWi9KBTHQpxIpPW78jSzIe2Jx5DG7dWyABkB+qvgWrHtVkfSbtPlRlWmrAmJVwuL7ylwAxZisomNHeKJy/pfgBBpYK13XlkLdnpWnup0WF2qclMFb3Y5GqcESNAfGORG4lPOg4U8BDRINwc2fhVYQ+YAMQUCbBFk4bmQLpBO981s8k8fYECHE6rLdExH12NNNDf3RhBUtV3jxXnZqGJXTn+e02MjPd32BCT7DbOnCRecnuw/GGaZKJpsVSgVvRuO7vvFMt96bT367/hIBtMRkYhiBfSCrBlW5Cl2kJI8jIrNI2Cb0WBkAPwcrB/uuF1mLwPpa7/jE+3H+uW0+nx1+QAglbsZlUyV6uch6SiI6COQux4EYdCIfXRycj+cOeRTWhelLs3w08cFSkyeig9ZAj0hP77BaUyhBqVQYI7HvOs9TWnpC1Dn+4EnBJj8o+wWvyQb9Y47OtBpbdXFSCZJzDgMsM8x6KMbUhoL1Rq55F6nMdi1CSi0BG7vpEppq3MgQiS16Gk8kCC9bV0/ALdkU+PK03ddmiCpeO2YoBmVABW9cUej9CABJ+23MrjCXtiri+BC7akXb1GDDcuwEXLRfRxX4JloxD1D3OdEiSOAdJVhmund8EGAWwGd+4bQf0g7cHbow01oxD4kMyp4uCfv0JII7mZM4M1N07PBpLZenjblO+tDSkOrIlUtFac0p3HZukVvGjMuXGYAWvqELt6Mu+TxhMP2f+yNw7nIKvuD/ubmYK8setbS3MNef1f0QvsdjKq0L+FNAhoZIlA64leEZ/mxiZ1ThzE+0drFV0mXh3rOu9iTVCkZuvop0S7KPLQ0EA==', 'WGlwTC1koSLhAUKGuoP79Hc9/rYkUa7z/CajyxmNNLQgn/n7cXEzuYenVbbkeYtttg0GwDGbHMS/gQVSAC3xWj9Xe0QJ8byoQ1PAN9twsgkQci2fe3BH5zFEd9ivWF6QeqgK8YI3D3fLovgOJfl5fZACd47rlsNKNzLWX9U+b++0Bpf1hr5NxHyfw9ZiooS5Be2AC18IyCTA713FcFa2ZJl9U3Ii7MC6C6k2pRXwxACeYRr+m0nTFtjK41Y+oYkIS1+k4EegOMtEIKDBQRMU5mzjIAsrW7a/xCiQmjRK9RPK7XfK139HJGqQyYIr5HgoLaS5aH8/zqVsyZ6XWq6FbQCeSuOcHq3QR0tRRhsDJ+aiSOoLzpVwLhEbf6ziQE6ePSzoh/vTCzDA4Z79oaCzdktav1ZoLQFikSpS8CldU+9TNgk4Bt6CaDcTaK6CvY8ULo21pXcHCGPqY7WTl4HS0ijriH/pMRSPKfRUiUb0Kxg=', '2019-01-19 00:00:00', '2022-11-21 00:34:20', 1, 0, NULL, '', '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(2022005, 'YThiEyxghnzsWNl/Ctj63sHbuEn+pFgsLQwUKfCZCps=', 'w1BEi4FcTnc/jVp3104Vy1C4aV0uimdPyIGX3oGI/iVr56TXV4ptj9u4g/qHPRPJSE1IMuKB6nYpoiD07Hjut+lCCgmNZFvaA5PSPSon73vBuGTl8PFk7Y8jtBIeLAdALf53/6930yxS9as44bvPx01fJgF5+Pzdy4Oth9QE108UQ30gI7GRVY/aNymCfoiJCO5GyVxFo73yOkFUcVT+HDxdGT+rH8YMEUiyiGOXKgKStYEcTtxvCdoIPn4YJ+TdlhXFKe9CUGC+Z9hkGQWNGKkBQ6h/AjxzTr0ILvk4Zapnke3v/mJ9KhlrnDQg78gCIv43oVubYGLGVjRVfAmY4mnFbA5UZPXX8gIwZsRH0IOhunX9pCMHvVs7haZ/TTkzj/S2T09GKp6R733DIbMECyKSERJPuFJI9A0wo3GpCEjjf2y7E5E/H1ZTbHgzO+O1UD0lmDBk53BxILInh6Q3Wnims0TvmLjzSTHgsqDFSCsm6LafT5IVDPsL9jnTJcmzP/10vFpb3lbB6Aj5Y5xr8teC5mwFly80J56ih2lf748qFw7/ntydnsaCrhjtWz2mX5Why+GuoBwPAUJgPkN1FFTmPkYeqRsva4xDsKs2TwT4t7Xy/hXfkVD2M/xoQjlvrULPVzUZ1w9uzfHd91p+tQa2zMluqDvbw/2OCuASngNq5eqZcv9v+pdIrlM+MB75crpmOl3hbT40TJTbfKnsBFhbkIm4znc7IljarsaIJVyz3mFyWgxpiRnMW6Wtl7E6vbRXo/8JihOcCR32DWgNoBLcBvaP5P70aN+oIcVim8sMLx47BqaMEqiSDRJS7H1MgOPHKfpnqL3CJBVcBXWZimC0ZwtB/Ru4c2HjocYFbel/aXZNelBV05MgAs4vmdoHSHzR19XUUmnzbfc8XtjLTcDP4MjDXSuzy8789YJlsYe72JNUKRm6+inRLso8tDQQ', 'WGlwTC1koSLhAUKGuoP79CAcSjQi/sR9z97oQE9bFroRGVIM4RSS1V3G+D9yYg8l1cmmp0yFaMA5ZIw5NZayoB1/fXZGrJ2JIoIRgY3kG402VVEGaJL2Echiyu5Ok+BGQtSO0C2fET7kq633N0SyWtFvri2+ZfrSDCte+Snwk0n3t5v2Cgnpqr74+BH2Q/6C/8liOx60hrVnbixkHwz4oQeDWusLEDzBw5cAgeNwYyq7ZtgB6dW4S+Wcg2z35SWRh7Sc2UO02HUIUcAQh53Go1YPcP3gPh+Mx96CBKvR5OjXopzHzJwB1RwEp7Bgr88LBqaTRqA6PKmfLE9VuWNacW9C38xBO/yy9AfGo7sUo/RstMfLJZwfKX4gFa8KXgecHFelamyYNylXnxEXDi/DIPxQJ0uVHh6UztPEA3HuOzy/zsiCTmh3jUJNhIem5mq/BginkvTtl8RYC6eKCVfRR/4BIVUnPOjtr8TZ/WsNh0QibeWWRQKTeKShePdH/6NN', '2018-10-31 00:00:00', '2022-11-21 00:35:22', 1, 0, NULL, '', '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(2022006, '+VILWtQxEYhVesOFaF7ES65UacrBnj3Fm4tcjAgWx/8=', 'pWGkoraj8ZpkH/yXMOR0XvWi4qzVv9jzcq/jhdKjJDnOvE6Bp6c9A/XGL4nfjZexwowaONKb/tDSb0AROPx2WHnjE+63TeLRKSvc9FJp36bMVyaZXIWpKM6TU8eakNhnx5WvukZPZ0lq5WiC4afIcWvrFK9WHe9f/xDw69UI9WKMGtzIRlmJCd7o7BY6rJ8AzlqKAAf0ENW4EUUZRdr3gx6cEJ/5xv5uIzaBNI/59+6X6Hc5WsntDL2XeUM2XOnzvXEEzBDe9g5C7X3l8nURXgaPP5TUOlUw5yqXdhpBz3sfV9lNa9yCeaZ7fUqZzRBcVRUSHx/JcUFkXTxn3SX7j3nacgqlC0e2Yh/8vnGsXfuTWRGOmnlkfOIr4SO4uM5v8JvedI6BAyktchQn4qWJV/pkwbIRoP5qfZfGxyMoTtGhv2G3kXxboFBr9nmKaq5Z34z1Bom3yZCtGwnPcsB+32eoaOErtHgK/xb68tl77J9eoyfgdaBzDhbrvRRpIwwNTSRl/TscGfnhFKID/U6K2xOLFaMy51A6xxkTebsFYVz08Y5bMB3tlviSto5+n4tq+oojnZxFN3jjGysn456hyrvMQcSc4QS9zURprYus7Yw=', 'dug9XuhvVLWM9ojnjc1aPGxJZ1UO+yVI/fddgLyy4yb1NkkSQ6t/sEICKo9sXgkMETRCAZcblwO9Wug/gLuCU5nbMPS1vXnMDKoavW5PjUbP30sFgGYV0gEvyoToal5nHNf08x8UUg1+nPyyLS8IrwhDD/U1KGKg4w5aor2L3Loyqd+Y8+zaPkicNJEQrothXY2wLTDFgTKlUZMGT4x+81lPIFiqX1BxjIUzViNrxS8A06xMVgMcvqoGa7qqmiuOfTe85NMaBBTIGTDsI6liccmYOlKyp1o12OjcfPx5Ap2EziYE8a+qpmu2sQMqT4Nk75v4miTEuE9uG8QxliTScqvkzNnvxLkgmu4Q/GcNsqFe7Dd0JCQWDolh5PNl/H9+RFm1ekizmRzZ0cWDSFJgjiQqayqRGyUwoeBuQPOZ6at86B+hK4C6d5OTb1cYygz7D8GanxqReA5mdFWt6ZHmlT9SwP36LHpg0CW1tRx5icTpSHphq5bJ5LoNeWl0LzsaDOZVxYpcRUbKqdnHYzHHEQCWEGJ+3LicOTN3XcDIn9o=', '2016-09-25 00:00:00', '2022-11-21 00:36:25', 1, 0, NULL, '', '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(2022007, 'jbECHYXM8dnuN4A67sB7eVXMYt3LHmkqo/h1A/Ch3Sc=', 'JZpZEp2fwTsdqzPc8dTCP5xEHZbDSv4TC43cNoRVMyTd9It0mgfCuXyoN/8u8KDw59/4QWjNAV0kQxY8A/wbiElDm+jdBKUXCB2KUuUdPBcHi6OaYluRZqhLab9JloqeOj2leQpEScUW4B/tIHNgj+sO1UuBUSM5lYu4cMRfj6kPsg1FhsqANOBkelniZSpcF3N5zgWSZaJWDbY6pwxP2LWkp5RC47IVXoQnHjtWLpQVWfH4f7h+y47TDct0gNoHMoYw8WJu4oQXLmSR2pyJlI9JX8C9kPjySeYQdzrznL7C2zww/ECpkw00nqM5R4hA+3FZajlTJZTgNmQqA8MHv/Ski1PLa0HZc3ZxRM7rWAj3bYqD+REUBsFFqfKadzNHpuzRO161/9VTE29o6OYOowFfgBJOhgSETL3rTcZa2+PPiVaNBaxirU2BNiWTcA5GqGnsiMBrNlp/CeEOW2pUuec9/VHKZUtpjLVsb//fxO18MaH88TW8/URo+ESrHhzf7kynov7yyCR32pmfh22mGbvYk1QpGbr6KdEuyjy0NBA=', 'JZpZEp2fwTsdqzPc8dTCP7wmM1IqZi5OPi5C+nJwDUT8dqncp5fQp1SWzAb2J2z5DOqaHAtqubQcQTeo1u4YZ3XucgJ5C+AqftJXgK0/XSvG9e5oFY0Po+ZlA476uwfkLv3DOWncgcw7G4iPjbhEAx6jQYvCXQ95lyyRHKbBtbilL6DMKhA6fmzQSChWPicGCgxMegeiZz6+AkGAxh8PAI1IbKbDSemy+c5J9XvHVeP/mGrdSn8ZKiOT4+hb6qe2uVatoPnOr6x3khCM3sypacqBcCBiG9nQu0V7SgrQSpabwoKiVnVirDI+CURO9pLGD66Fe2v+Gunyom/pLnH9kBnKfqyXzzuppeKgORTtgRs=', '2015-02-21 00:00:00', '2022-11-21 00:37:24', 1, 0, NULL, '', '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(2022008, '3rsoIsXqfpitki3IJu7r1UmtKBpm0d5WXVCJLQjeZlU=', 'k8f5pLyiGMU/noOwKRw4UGkQKAZ0wGCTeRiHD19nnFw8RGqWStBCI61M7RtgLb/VFRXcl5O+uAFfOO4GVwJZbcrMrm7EScL9iXchd6VKRKMPJ+cKkmh17kPBDn6PZnL8oJB+lwXDLgmHBVvW/IHQ3UlTGWt0bb4sI17WOwwyQY/daZCkvNCBpNxKHvwABgGpvkEZBUv74w6EdOTQc4YEn33Bc/diP0smDdpd3X9TTnNvakkQj50KscuJ0CoXDU4ZJ7MMTfIWOkR6zt7XuH/ZvpEpMDU98hY1pXBPkrqhrUDEb5HT4znVD1e2BEtn7EEyn14tZBt6TGqB3JzWoyUOWuPNFmQzvu3O4bfOhdlO+Hs5U3VsLrlQlFqne6kEdDugsJUrRJmushIkJVUgqU9KQwaPxMM5kvy20Or83VPy/gQ=', 'WGlwTC1koSLhAUKGuoP79IcdIQty0XsEtW/IyxpkO8vRLHZyONuTpuo7wQbE14aFbm8/IU0Y4nsfSF00HB2X5PQ+kfp5If3RE8J3q+Q31Xh4E2wtv6/pWgwdvRe6w5w2dNC0Lty6Xx0RftZ0vX+bwtTBQAjFBbnUIv4G4CvgBqKd5V6rJNBS4b9wxYoDtSfKnsAm4Cl4OIDDSm/SwYIg7A88HGzec799MObcV2YEeM10sUE6T4gPydqUGeNwibDMx0+sVSsVGCguDxcMMQvLW8eI3B8O1nkSBmeTlAmFEmcBtKaTOk/hLvJfzmUjs+52hI42qHHi5n70Gb+EhmCZ6k7/jG9lX9STGOV6Nvy8/7W3fClh8G7ToWl22C7I6feTk8xjasiBJCepVtcSs3NUR+7ssL96yexdub28aF2L/gPg9yUxQY91a6nu0wKBiMAK5abmojw+4S7y7CM+dJUjaY/EhYvmMOxMILWWsRxmwA3F3ZBKWgIYpxP48wzPWv7hD8dIxqRWoEla14nmQOGzvty9dTed2A3PSkJhC6gly0JfUpxCWkhJ/GRBr95XGVkQ', '2021-12-08 00:00:00', '2022-11-21 00:38:35', 1, 0, NULL, '', '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(2022009, 'zeozfBpcbO0JbbiIYQNs+EfNgsbwj6ErQGK5B64rN7I=', 'SHJ7hR18CO9/0hnB4DOyNJZ0xQ7wcZjs8AkuDauDjtpI+hcUcTqzfm70eqq46gI8djwZJ2gB/mLeZNAQvWffymw0sUToV0TP9uIrokoMIluUJ51R74YcxW64loAK2Vvi5Kkf/vIYGe9f5e7tpD2o9QiBsqsSlsCycTyI6sUVgiQKRUk339jGtzM5En/DOleSQzRJSL9X951G2yWWl7/gS9dcSAwZrH5jaMy5/ecQxk5PeTLy4hNvFZSRYRIc5EEpkpb7KPNrsKWbc2klMdyExTFg4TmvTY6OaFOdrpWIujWfbTpc77UrwRkqv1TGYYrblwvrT20vmm2bvoHEbbUQqf3Y+FRn2ZhETPDmyUkCM+3l13lXZZFl42/9sP8EKY3Jj7CN9phPII3MUVR5LsPGP9lvrC16GbFRQvcGaJ5m1KjNQFc3T2MNTdsSnIBBxw37J+3rbuFwoTf2/yuSo5IBMXraUn7JSK2OKLEIiknas3lk9/Ulc+YJ6FX0kuEB55UBMGIWQYBsQTOrNBpX0Vpq0UWjf8scztK1gRSYHuHdB2OXt43Nrww5MIYNacNG8jZ70F41H7AEsxWUJNxb9exZkGY0RQZzdA9pDSYON3y13sR3w0p2dledX8Z6NSmuGJbzDGIo7LO1bFrHz+uj00WzGKlxDdRmRl86k4+QvqbQneF9jSE5l6RWK6Mw6g/WB3XtarFIMdFUKJDBkz1Vfr+x63dR3sg+WrHbpy5D5SeR3tYy6dobeZblkLh6mIy19tfmHhQgLgKgePZE/y1hvvMNEQ==', 'WGlwTC1koSLhAUKGuoP79LXjbhviftf1S2ZLSuSfAtL5ffFJt6wz0fEQCImeryf642zIwDIIomjI6XCFaEOgzP7dhiWFjX1UQBSJ36XeNpGLbIF85AvyRmeb0E2HjuyYBWOPYa5wAs2D0uVxYTXft3CXFeMKR+qZXQ+tMlava0bJ4O8DhH6kCl5Fc8SJulxslrFao/NlRPe0ufwte4QyURuVUNb8ewRwXOqZF9jKpzKHn0U1b3ahlO7I96WDLFtWkgcICGVLs2mrEDGbqeiYgC94dGNhySaevaHjwnGlTJI4qUUho15iLo3uxkBEZunQI0XF0I877KB/9NuaOnU3ocwVBbgT83i13h6uIJgTd1Vkuwc6tXz0c1dhbT1uQRRPJSrPAb48kNp/6GBaoKu8j2D5en5mmX/k4EmvUofoXjdGmVNUQ/yvKLweFDer9bQ1zXWBimpUw+idy2zRR8iJ4MqYguE7PuioGSi9oqf8iQ/UtKo8EwY5/HgBcC6yvHWm', '2022-09-11 00:00:00', '2022-11-21 00:39:45', 1, 0, NULL, '', '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(2022010, 'SNOtCJtXwIvTZyKF2lEhpkjbcUccWmh/SS31bm9aaU4=', 'SHJ7hR18CO9/0hnB4DOyNAHLOgqF4zKZNBKDRyQf3EEpt0tueeLLrzgMJxVOwFBN0CIAYNq+298hWf35nIGs6SifJaHvkCev5NAKvAPgobbqb7zLq2viijjxHngZFWVafN3C4G2Qj924wngisPJt0UlY1VFU6qiowN8C6N2I3VhTmXjjY9hRn35oJ1wZtZDXXvHsXSqv63UCbNWhjcFO0et81Dc14q46snGiHdOD5S/7cVlqOVMllOA2ZCoDwwe/vHUeUu6hCuQ4KLVUyNyGny07SCh809AzboJKV+UTRojHZrIV14ENmi1ztdCaw93VQvCCI14YRS2BIowgfqAacUDlN4Wh4H9l2Huo4WcT2oLQyQ3fZ5s9zh1SRtVZj0r12e6kJlYCsYB3azHLczkn9rgWh6k/x+2J4vinYprz8gyUgz+Z9g1/TebJQVt4hc6pYTimzFRlKzOrzdY7L4EOVDmqgjOPR6sOU/gUQel8lBDHRAV+0fGWbgQ3CYYqPTttmW4PKv1bVM99SZ1mxi27aO+v9Uul+dHyqa3XDAUcXTDjfK+Ng1+LLz3nDT4tPplJDWlrcCxh1FQq7nNL2uDpxsV1ejNnAt2UshHRGAwtcRFIKbqFeKNSJQSHW29gKBD5', 'FDqYAH0sclEvoLCXORKps4QXHMzLi8jAhjp7wlEPbnRPB23UIkyB4svOUhG6VDs+5uaM4C5+0IM4lWjTx5CWDS7qjqLIOt0WEbZ7P9yuzk+jDiQZTyji+ggSJuaHMNanP/zum6gEECgEHvR+FSkO/XbmMrWfRXqkhMXbOxELrtqrL8CbAgMHFkyaFviTxKUhd/3/Es0RA/A9ZEIa1/+4X8UHiehuvqaqzjAl3nPCnScHQDLYU/UmaB9ZIJIqLG1jcBEBDisjftby115vdKdgXhE9Z0Vhbq+QkURqEeBwnzgRPT3hgMan04C3i+zZMOpx', '2022-04-15 00:00:00', '2022-11-21 00:41:22', 1, 0, NULL, '', '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(2022011, 'T7cWVrxmdE1Dsmh1eZbLtYEpCxSMiV+D07am3WqQ3GQ=', 'T7cWVrxmdE1Dsmh1eZbLtQOv0qOCpc2eppMKcNNrRIZHyda74k/nZWxOdHAyXDkyUoSZIeV+nfPuiPf34Y8IK12KaQsYU1On7C7ZQml3TqdnSMRJvylsJ3Gd7LcL2fFU7/LG+AJVEG/uUimPNNLAHPhNh5Gr5p/hD8OXA0WGFoslFHTAJ5QYQf5WlsKKoR78QHeZacF3dtdonUAKjy76gBOjYW60Ed+QF18pAWfA0x3r+pHF87LP1kL0ELQlGwW9oVlUcCcj7VZmwjVBlhf8pDOnOTzWPwon8kSZdV8Jcz/p6COVURHcvvl+TZHsJnEUkTThVmng50B3AbEJKn5qrvuEKlwzUq0YQGAX0vo7cK50MtxwVX3Mbj+n15Bqtt1saF/EUTzTWFHY/fasLu7phmHmYbRjth7cde7bDoq4b8FysRk3dlU1iAIT9SdAFKH2GhfJL90GenwJekjO7APRwWkR+iAFZGZLrYnzNzbg75S0F2d2JvVjsLh7cEWVjTm7ahJD0vbvsP/UzoJ3RQCoMZtONewbPX7bT1VpgCv+TNWrZRdRbe2NIi7YMoCts8xf', 'WGlwTC1koSLhAUKGuoP79IHAL5Qq6ANZ/ar3o09jdtdUX4CTtfIFwRp0GwLnBjumhkxOWSi7y83FUUfb8lcTFdZpRbcomp3bs97P8YYzdIl53X5xBSjuz+Dn0H5fwsS/OcAZANsuLHWUWQVZssu94HXVelofxl2E8cqY8ZkO1ziK3HuPBl/RlXAsrKDT+Qrjhu0nDGTMo56puHJMNKWRXtJYWuUZl6WbasxEFJyYL5yUNM3jis6yOZxZIsQ9+Na3G+tn2AMzvvVxkoe0WYcbWbqvZLwVKj9P5P3ChvrEdtqWmRUFIk8aFiSGgZ8V4FXo7cjgxDVzpBae/hkKG/6MEV+/wG9vnromFtozQ8Fjkpmwj5BBYbu9g8y4rcJvBQ0Q/DvyZB0HXZhUTYz6H952Jstup5qjjWT7HewDWN3mVag=', '2022-11-04 00:00:00', '2022-11-21 00:42:44', 1, 0, NULL, '', '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(2022012, 'xEcPhy+s6tBtx+UJ21e/UkoWbbffQd+n3504Iaxy1K0=', 'JZpZEp2fwTsdqzPc8dTCP644SyYZ6l7LBd/aJNx22XvgahgvEAYgYOHPCh/fg6tkYkauZirHX+vh/nz33d0N2VcaTnBfbvQCLCPL0uhVFemAlX2JCBLgH4CE+DNAVp/SJX8hZSLatQq0FkQ6wU9YpI+5myuiyRdsHTXeEYSMcuUy1MGKsyspKZ/bHwepABKXIMRxtsmn9nypKHWkqr5sC31gIYOIOsjL7iKPoHTmfkckuE3B6z4CFQP0oXYrkaLVZ2iNjowl6v6bfIQ8VTPwM5VxtynwzrF2KhEUwQ8iXOPP1SLx+4YFxFwkhAde2PE8Clx3zoQmCoi7giXMqeqf7eHKUwg3TrvaMhGlD944Zm4WTtoNTpWH+CZdWuckEtQXc+Fvm2xZQarbdb6Wy6uX6oIT/pgJt7VhrokdtUIMeDgYeLpL66h5oMmczv0iSQGg3qqPIQ0gxofkmelTb8aGIm8kkG2LFCgQvMey7aJw1hgLy6nHzniDHFtefY0QZfw0+HZNE88LxSIIexUw8ql1ajeYAWg558n68OVgyiw6cxjxTVSVXxtxjiDFXo5SO8pE3pk58fbop/eGSBThq8gt9qb4rbHzVdkTVh07yeYR87SPIdDD6tZ5K3oPp1S+b0eqkZz7Keh74+2Ibcguig1HQg9clGDiYOxuSYzTrgUDUnFOiaKEFrYg3cbdh4FzhUfzHbubsxzXlftrbtRV5+e2IjCYb59NHeXjjZ9SB/hbMINk3Q9mw4SQ6yBt0BsTeTUHD4YK6H880SB1RWY2W4qTmVp7zJTv6vy280FqCRnTtTaMhICJBwBR/ZDB7xi2imyEM7F5hAq1KjANzy5QWii+waJi7ijWicW0E4+4ecV7CnQKh779CVQrXwHONknBV84JqOuNK9w6GE/7eUBbSV/X8KdJr4mDWT/MWGvmyGpfxXA=', 'E4nPnFb5cT91k0RwfuOvqSOmS1pfoEq1+KJn0VbVYLnUXF/S8QSakpFA8rbAAYOqNm5IEZuLkJ7SMpV/3fQngE9kp0u9QNCezB3TjkLBJXitt+C/ITNaAJMIUr6BviapwaKuxhBDAp+UPPT9DzZUke0ezI33Zv9z+rm+xsFw5OND18zJ7K9IwIN6Ji8s+iub1T+Ps74hFk1SXPF9E3quE2Rgvr4yuFVRnu57GWjvVcvFoU00y7ZLJfu+6f+nj/WzdwIooYxivQwmKO5PXMLZMMNx1MKdettlX1un/Ekx9FsJLqaoTKQEe1NNjI839PPm5jGLLhfzXBDEONHgGxsXszB8M7qRha163Joow52eC4OSQMRAoUgMk7vAqZmViSprtW1MeIQZxMAFc0J2fXJodA==', '2021-06-23 00:00:00', '2022-11-21 00:43:37', 1, 0, NULL, '', '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(2022013, '3PPbrCboLBE4GuBXKOwfnmn4VwL4FCq5UH3QmMmdKZ0=', 'JZpZEp2fwTsdqzPc8dTCP8Ed4fFDh3FOO1hiPEmPGDqPfktEQ8iHabjUKjS9XYgjdX2LloYFgtz+LTGs0H6Bah2ivA7OKNjRmyaD6z/ti46/k95PHUbwLvcW0EP+noRx8VTWEeiQyDDvrU1Y3T+Z1oVtqcrFKUnVXKbq3rAf3gO90xooPIuRQeEdCyEowO/zPm8JeDh565971Ac4MrLkwrLufHxccr8wstXvD/aRZTDUtqcvvW/xHV+d4myaMz/oUU8jLxU/Murlxx+Rrcv1N5XBN0Vde5bnY0xwbWqg4UwRG3kNlcS2mKi4Y1nhXs+WYs6LjagxsAFWPM8Cw3bXHFZ+WHCWpuKSRLDi0wk+TAETrkZQWYx//d13B9H4Awgz8N+NoWk4ZIo6z8oJtR68nSpqiHyWMmj9WgacvtHmWs2rMICehupBjG4J1WgHSkErdpFwo0QUQ1cW8o+V8YbhSFqL006tjcMhaFzM85C/NAiVkrdaqT8BQ7GNyQuLJB7FpCVJT+hDq8/ZmUt5qsi049bz+zHmHUJ6xBuneyXJYe+N8jVP1RZ4E974eNgfkAcyrrLCidruOyEFFkIf70ceMOjKN5WUS3LQM/73oOMMYlPOGCJrCbSqBY48ORi53lgJTaQw1YpwJ44ztqANEr1i0mAky51DaD40l7j0KcIuM52REwakBug2CilTdO8B6/n/6QD2EM0OUGUxWHBgr2tqb17eWrH9SEZRR9egHyC6+iyfhjvCR7z4QXzF5wrNp2m0n7MjYvMDUHYj3lk8rGCH1yNFC4fC0FKra7XkBHCfHQrUkzG4LKF6VLmqVGmTcLAQ3c52FHwSOG6R6AUwsDxjjhhdgiSd/YBPiZdglUIaHzTQipOAEQq0BRXMFwZYDAsFhhB8uDpnPimSgEUQPhGlyA==', 'OkZ4PAAiIMYrJxz5LFcKiDsa8nipdRLzQesAN0rSSpFUhZfKGQ0S3fOATAyNvSTEqTIhDSrXoCjlA3RFmqPpK1R8NJFf05K5zjf+ysQiHNJ2qwDuNHKvUWJbt5Nl0i73hdJgc8QO5Q9T22M5VSZSbt9z09w8sOWLnRRIq0+KBxTSgrdupiT94lXei2Z6Q16aECVWGFN5SGZf1QkflGzSP1LmgFsdHkEX+VdaIzg8wo20MNBoJDkP2iuJOxMa25u7QrEWTVPeDHpmTNRkvcSv4rUANUXTUwJEUuOjniLAScM7xxOlkH1Iolkh8Dzgl1QPUzLvMoOTyg38Az7cvffJZj6S8tSeYavSQm35hRUhZvc0WmPqRJ2kBcm6qBebTmgpOXcDK7K0MyTuwgnQMWysi5+tNbldyKBQqTKvzd0Wawc=', '2022-04-27 00:00:00', '2022-11-21 00:44:40', 1, 0, NULL, '', '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(2022014, 'CvqVjG5zd9ZouBuR0RCKB1uJ2aYYmWIvbh4wr3qhy04=', 'E5UpQUtEB3VsqKdDIdg2bhkX8rMy48x1rQmIpXbefTD+eFTgLmwTUyCEh0lBUwgYBwBTlxtHBz2ooyNr+FVakl08xhcp0i62VDEINF5srr506Ld3Iw7f9HGt1AwD9ZsmAcPzvEEG36lICogfJH+jfG5y3k/kGEn4QQdeA5NZ173backtAwK2J1RhJrI8xYwdu2QYDct+8MaLP2HY9UEUiowTRbchEiuy8/QazYq06qkIqDUKkXkKKo07AALnCGnX864f9BP/HXRO/kOv+7xkMgsSUlAo89lJbxLS1lFTYmOf9cjzVksv3fVEyCHknOp1lGHgj53k9Z8sOBY0g75ADKE4p4YmF1TessLlFF1xYs3BNTMvK608W46sUWEkiTiXK9aPuG2GKalQReJ1xkIlxRebDjte0DbKCIgpUs1AdSi8oflSjkkAk08tXvhTdncj+aIvHkH2ARRwnNG9lAbqKxXPCEi5+1uQ7V3LveyxYTKLeCd7iRY5uLmCl4PErbwJyLhfTbVUe/zo4ypbTmziaaoepGK/V/Bf773euRLZ7GvWUQOvPwEN1zHf7anjAM0aXzTq7IJDPG/a08ZR6F5s2Umcz6nRg81PNjUDfveshewwOVj2vR4JDsLtdNgMiohD9Q7vJQ/SkxqkIgFVJ0iBzgw21QalgcnU2JCp6DQDYe19qbFMUM2otuVCGcHMU2RXDI8Joc5hI59jJqnW/zYjwhnvEKPzUbJOuWfMVtm7MXvQ/5aiqlLrrFN2DVxZ8DT3TPa0kdvalRFGud0f2f2LMY0s2KvhzVhdbpC6ZRgWHt36UJhbpCoZEh9CC07MFrEzbE/Qta+HcSxv/n9hA8MEUpKa7J97Vha4nwS4N1IiL0DtU++feDMpPXAQTRGGmMy8NzvBSNXUcAdrJjlByo1imWCY5Lwu3Crt4Fa6O5VTscMWI4+2mkUTJHgynwF4QbVYJtYTgtMzGH/Fg+zrSn02p8ISPEg+JlvPHaPP86kQUYwozs0sCELKbNrx6TRFHJfVXh+h35lg2pckegcyAVshqfNptEA+TyO5yAf7ux9Rx+EJZX4rGltKm9iJ+fp44ZpRwUGpwcNdwS67zaf7wfHzmPyOGqerOce2zea3kHLP93rZxxxSH7Ox4OnNRu+wbmDtCnIcekD45HlTzoYXYtrhxwf4sffVNQuWhcWdoP3wfAOERoq3qO504MXfqwXB+irHiNTcJFEPb/v2amsvb1LZmePCY05A4E/JQ98MYXwvxXAfSKOfAZ7WWuq4kudXsxn9JkR4nUolpUq18eKA9vRuhkAO0RvbSetdSMioZFjzSCD03J9lQeslzdfDwhRPwdBj', 'NowhvPEqRG8L6kIEVJ7cRmSrMk/5DWxGSnfn6iz5g4GYssRr6uQSewylaVGzCFU88hZz1fdZqMPNIv4UwA00cBp7kDsyb03zR5T7uGbXSAEg+uFIDh1ok2wAF2A3DL59TtnOa+FKq46g5u7u2Gxad6gM7ea0llXDDmliA+/NAhl49mcfRZVRX2BFUxGYE/KWju6WVRsmJ2HD4ty+Iowhr3wKalA0mxZA4oXhoxh6WgA=', '2021-06-17 00:00:00', '2022-11-21 00:45:45', 1, 0, NULL, '', '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(2022015, 'E4ZpnhkbkvGmDboGMOIAhyK6/qM5npUISACTXeQaWYfGXo53nrOV+JNIFSoLuD3i', 'WGlwTC1koSLhAUKGuoP79DRjcXvz3lj6N5me8iC50fq7DjSBOy3+va+P2jLEmJ9A/7C8mGQGH/BUUMJQk5xRmyvEveGM0sN/WaDh+OO/heA5AF9kj+pkdTa1AV9Mvhz9auEHcnx6mP9FE8PTyFSpzM5R6jiBCD9EUDpTE3ga42m+GWwQN3JmvYeN3eR+ChQcR45N1UQaIwD0HfkKgt/Zu9iBJ4jiF8mmzAqyTaurEQBYsel8nC5sDbnSztcoq/2F8mR68fhjixLIR4RB2xZlyEA05tx3oNh2/XY7V0ZW4OvrLMU3h12vAxoqEyJ32e3gAfoD0J8LurQrHM+jcfjzQ2bvUNawR/XGgYDq9bTU19Wh69Ox5LIaFSHiVcsbNtm07yO5AshT/r/EQMTI2opM2e2fswfwRYfF73l0DoUosSJasjquB6hVTrJa5ozRRmFwxzlcg6LS/8ASVFwj/7ntLqn4ikoCl2KSgjrHM+fh6HU2Tcd2KJ41WDDdefX8WbkUNejDl3VqegNOsmOoCU4+QMaqN2xJ4UK3BQETTKq8Tm//dfRiEHZXtHA+wKIwIZXIBAbLhMwaYDFzMEzSkYyogPIcsU4F69S5ayT4z1K3k6XbzgBoiyMqE5NMxJX69u5HQ9GCwF4WKiRt5Gp8pSnPG6VAtEJ2dtoBBjVr09D1o24giAXmuafnRovQXdhZoywQ51ePuXK2fggBWvmKWsy0CtObZbdDoVJdbRAMYJ61EtMFxKGjiJZMwT7tRyV7rm/cmaBaax0A7wk44m0kFgDsjjCDEtthPTr9u0VkmfGiiZneONEQ5UgsHN42nixvexwsKbGCiJ+Ep30404udwetxDC9arU4e0Q8dG5H7eIOYLF6R7m44mSUYavlRAAPejm86sUExq/VKbvRExtU5j6JMNB1RkogJFOJpiZBGUZGj8jyLTcitLD/f2p4z5dcgojAnA3LGk2lz6vu4GBYn3NMBDRoK0TYXF1IVVaddo1cUn1z3dhJkssSgX+oqw2/G1HAsCaojMabeC0L41Om2jPL+rquStvp6jwUeHI9F0FE1h0U=', 'Jax7TCDOs7dH7qDdLp9Dw7m/jO6vxZ3QiPiiJjgHwbz6XHkVtIKOzVTpoXxpTsYvNU3ONQcXc6tkb642uNSkPnk2JmkE1MOA8A9vS0psed9YF+zUuKi6WKsDLmr4aG9NqQpq+WvhaFrmZ+cUfpzLkv3obwl2C6bdgV+2WWd0r0NwqT3hAjoxmvimbDxm/rN9rTgW/7qhMaj2u7Yaa8XwFZbsokuxdvlLHXbHbt7GQ6GY2f5a6efz0NRuneF+bXwS', '2022-08-05 00:00:00', '2022-11-21 00:47:03', 1, 0, NULL, '', '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(2022016, 'o5DtSRj2QUUlfkNejTjuL0XYdvC79YDiM2EjLLFALj8=', 'wutuoi3y6WwnTPP6JWHF5+HqL8tyoiIQJKQQuMgTj8kaVAbd1A6cIwUeA3K5IyFyDA5UWw8PHEAWmM5hVVeYCJBsvCYgShATlBa2+FX3/a/aqOy5s+ZcDxKN4j4wkqcXOTGDLuoi6sjnVvm6tgtdD9x77ABPahHTYz3G6n/UuFQJ3MAuVfMAEyylehtbICQgZtohkZ1hRCtUGtX5T8ifyf2E/HXzLp6X8U83lj1+2p6zK3ftieEu2f4yjHC1HfsKp/Lk96EQMZ5WCsa5yhL1w+NG60arg9oQmwESn00uFTEdyN9mQBq5E0Bx8NftapY4SvwLrjymU+3bIq2I/PkwubNI0Xg0rCPNuVY8AJ+hdtM+zdYEKos8Tz5E6oh0wWrlly0sRuvopCEzh5P91vFBh2d109G2OSd60XQRUw0THSYKAZCuGUhCeQdqcWAOHIomQnFFheaEUUjojf77Gzx31todQS8OuC6pu3tlPfkwJIYRHNGPWOq2cUinEqXOOyUctIBTh0aZuONyRrCj0A2AMRCW0Z+WQOwffzetl1kK8SyLYZ3XtIXCXpxi1CmDPaRUEJ+vZdaM5Ot4GKiILJdagi9SOPCwFBi3Yj9fkt9NziyFVOa0KEdL8ojEh5FNdjumb5XBpLs5nHC1rRR7AZueJz4rXaYKZb3eQNbGZtnxsJfiTOSIY3Cn+gr9wsQXAMa10cf8X/j8c1e2/0EXVsVxNE4qVVyONBiP8SRb/e0FodafpPUEmKoJczh6uy/OjNXa+EPtumJVy1wovaoY53+q9OL5zdI/VC4rf45CNNwVUEuPX6xycTsU7jJF4vZsPrjfxujt/1t4MIRGpNwVuIqG8y9SOPCwFBi3Yj9fkt9Nziy03TlP/WtYUzgK22+zmfROUmx+NL59mS41dt+gEH97XErl6VfDMV5iNYyL9M791ldMjGCJtoiIa7kNAp3xYl2p5CrPSPkQ0/fUrpJMQp1aTg==', 'WGlwTC1koSLhAUKGuoP79PN7IJNIexs6Q7RW8FleaeE1cCKmhVVbNbkz/1wFiOiOpXnXXYuYSjTfdckJyBDWx+Kp9Fs+UboCmkSusODtwVKzHhxlMZHpT+5ENEyMLF/MGPZwlrNQFwOKOLg9BAjAGWN8WHdadihHuxpdh1JHxuHKdSmL1/nJW9VLrZMHmA3QfBpA5jc+Ibsv1IQVudMea2Qb1m6hR+/nSgPVyg5VUP5toulYO2zTeGA4Lc1cFhcfhRPsvRK34oPiPP3qGufG1pLuRNx2xeNix6SCeOkmuO8pOpxq1EC3CV8JHCf4zaDVZEcpXsrhMDc5iUZNo2pBsMYMVRKojbwvyUKaoQcjhU6Lz5PUUqv//aWRm0nDh57b98M1O55pIWe+9I7+noOj2RpxFNxT+0xGvGuXZqWBUlkX/UCAiuNfIqCcmBMYUd4hf+gf6XpekrkCiDSvRcB7IfVrW1jkkA2eQENO/qePWFA=', '2019-03-20 00:00:00', '2022-11-21 00:48:23', 1, 0, NULL, '', '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(2022017, 'AyVyBrekuLyLgx/WCS3Sf/We4IUnPi3vZtvDvl+4Jc0=', 'e0VjvyAFX5EnCuvCPag4GZJ/o5Lx8fMYkt+d23IjgulO4IIGhTkjFcvtn6V2o6bJy6BiKqdIqjpXc0jpUjL4mUrQXJyfWO1ISjrC8J8A85wT11BvLUVB+BuRC09vRsQ59Jmzc7H4rsN2L+PZNlUnxogVb/vrZxr8JmioT7FZROZoBWSBocFFFZDHLzYDeFYd5lY3NTdgpYfvMKGOLZu+IFTj7VQ95TTzEiZrlvfdyFkk9p9YVL6hoTYSHJzsNFQO', 'k8f5pLyiGMU/noOwKRw4UCzZRqEv/Eba8Dy+xsLvQbXNDdhMWPRfBA/7EWIKglAOfgbeRNXEcA1E6abieJlH8yqh7fzTd4SlSTcW6r+VcotefN0FpqBSxcZYmTBVzbWV6HsiPx98kAer83rqunH1r1kS6JsnCL6sKm6l4e3U59FAqL/VIyS3nF9oOgJVFhJxBXXzycML2j9lU2IijLtc3u3ERSZ4iA3ZCKzM+2mKCE+8yhEc/HR5ROwt6pGH28DmHsba7Umtgh556e4o1db8xjja2Gfoz6E5zs3kjemo04d/13pxpiQJqcaTJt28WJZm3X7YXtW2NXhKrhuf1LSttqepKP37bkmdCRBXLkLvsIpfL4GeIWCO3qO/7TB/uUEWcL4d5ndJI+YBf07zUCC4xgFV6uWwi9hDzNeudDC3QuqRtsg82dh2dxzlzFsMqkAzssMeje7k1ucSOyhISqgIKfKQysgDo9UWOTNqPWtNzhCr0wZE3dzMYSFgygTOtWEj/OsCfjj0vY42MJMdi+fu0HJsugIapBm9GtRgZ8WMTWw=', '2016-03-19 00:00:00', '2022-11-21 00:49:30', 1, 0, NULL, '', '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(2022018, 'yTrm1RY0I2YF03wd88dfeOUW2IduKLXR9LyAzIn/QhU=', 'HPEnQick6FPhVK8iTdl6Rc2ZcraXtyKXAMtpBAyl+oIxacsTTooZYmSsOmJS8l7k/hMu9UWxb6RE25bxoWQhxVUy6YOGX1eqH30v6kOKpMKEABzc9uEgONDE+rwxoVb603/FTp8JyKHSab8gYfAXi00PoHWK2dMdxnBclfCBWayqhXCpExwbjO3EUPkDdaZVTjgomOBUjKHfXS7sobrvsVQU3A4237vevSYFAoZSwweHbrZxyPYyA17XXK9xIaK/I2xClcDRQDQek5B8BgsTFG6dBnSLct1vLyfXXjFT34tgRJk99hCij0j82K8B4/aGx/RWtqIejT6TU9aI+h11Oj+iUNB3/IWNtKVZtR2wxgJ3jI90Q1ooLU2phiU+1FphlVrVggA1HAA8dA97jJeAvcMFBAmu9mswtQ/LV2YLrQUNpsv3eMb0OOQG1fC2txGyKW2a5aTqenldQ+zt50pW958xsh7/W5KP3H6+8bjtyErkOorngzqFQvvxjeN26O1Zx7+k+GCHQvLm22yGdB+XVqy/H/kwRmmj4vCWnMWq9vU3NG9/21LbfJ6IzT/RG9f068alFe2rh8+B5/H4UmPK5uXOdH3nx3DZH56yvl7eFGnYUlOcJtPey45XbBZExUSX/B1WB98DiJVJxPsR7GVCqC/CHMV+m/H7iW7thHQ22Jsjxh8rWl66ko83dHwxTEfVreAhoCmsjxLHaBi6lx/Sa2O2r8CGf5SK9KPaZVMqAufB0Qb3YXc5LNOy5g8YX6gFL5MTBN5Obl344BAT1G8hr5PLex/Fj5WBYMiMlqGtibqqSip1opoppDbB/a/gvZj4ED1OTFKT6frEDGrbSKVzIntYeP+LVLodADTO+RtVZyrkvIQEnuRda52O4684A5ieuqgNU5nHpqOFT0KjzWS6JYQlLmM07mX2U2K7KRWqVoLTJHE3lKiSkEhdKiKYHbgSnrwkShdp1w9y4Kk0kJ3rGmKql4SoqdcJLNqkrcocgNhgK6eTOP1Z6XSK3YUMWQBj38V/Bl+F6rLr4A5rGP8tdePCqg/2llq4NHHA/y2He9AF80yjkzVi+d0gr3ttB8RxC3rB2sg4HgBRM09aZCHpZOV7TdOzH8j2A9DpdDUbhWqdUZvTy0XU76R1t/INHXW9x706QUoH6JF5Ik8jEVKFGJ/s09vHZcRAR0WcLrtAyRZfE+PEiRgGySpm51xPvzWwjkiqIrlEAu2SFck86ffcNRji/zfjW/SiGlX2+a7sB4s7nJaJoE1o57lY3pCYMYdnuHyM0msIQRced5HFhvHapg==', 'k2Jwtcz4U9+2HPK3+uX+UzgljmbjBIFD1vRMlAED644Tsnhh2+1BAE845T6GUuMSNzbIf48pNv8hE3f04/kVxXmKq3vxj1qiwgRDyU1bfJZtJa75Wwa6ewvSS+bwZVPT0rY8FXV7IC9ae9ba9sNTXeKAhetWSsSN9s+2z5OUNbWjLKtK3OfFQFHrhZo6X39mLMEcKde+Mqi0AbHsgy37U42L+jZ3Dn9yjNobCXz3Kl3+9H9rvD+p06oZe2KY9w1IbJ+cSRvtuM0qg9gQCaQJNh6Ft4xJyO+v7hdIfr4B8ogseC/o+GUNQlF+mOeHya+1kwUENwkfpwfYNYJAeNqwho8SKkEze0+6JpnB4TxcsOaXaWQXJb9Birbgq3D3NK9swhK//c6rOSWBwh3Dx/IjLe6hEqC8V1DMKJ6VWVDMwhZLggrnaQO9BHNCM++KWERZFEX3777KrBLaKsFnHGEe3OVfG2HdwN+xV0TxmZIQOkR6dQbrhNOPUeGsJ47Ghr1QwYeUGqM1yFLHI1tYqdH8DrF5BxFFsSh+7PRSH5nIt04nDBxIN1AsKvkApgtAhYiCtYDtf8jD25pqQiKkOERKrF9CDt1tNPAshgbHj3xrHns=', '2021-05-30 00:00:00', '2022-11-21 00:50:46', 1, 0, NULL, '', '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(2022019, 'Pyi4oR/dIpjDRGWrCRpu1ViWItMulh0tl9p+/QWYNCE=', 'SHJ7hR18CO9/0hnB4DOyNFfd6AGhG0KpgAlwsAIvPBoydgHUeFIdHujALIK6FGrK/EUDT0t25Yo3pRGdJo2m27TNyCkQyckwtyvUO+ENwZs3vXX/YSzcgNKG4UKbQ0RWlP6NcVfl2hn7hMWap7SUAJ26ia/0lHn2tuX6dbmIbzBEKn09YWCooeWiypMxjlwi33KLmM0IoUxodg88PBn7kxGVKwu1zq6KDlvRcAOFyQ93XVFu2C4KtFrhpOo9tJRkI4Gc12owgAB5YNujbSD419gPJHPNu5V+V1x7fYpiYZMif/F7NKMGBgBeBXFyCgnfHvoj4gX3neewXjkSovpXe73I11R1q8A0nsqdGb847HRREcKuI1x028WG/gcXt781hoQUPtdOCw9WvabdX7IIkb4JQEX26wlMfJ0vDODbGN7KtkTGYp26e4eFOxeEUPNSgVYQ+gqbWlTgT2e8H3Sm4GYQKRBTMQHqrnTIoDPtkpgEEwGTJX3014RgX0+/AHTlc9ZR4kJ8fN/XUs47KJpY8LY9baHlv25cuwgbaQ9jXm5jKZPJGTLMnNSwCDEdt4PBc4ZJX76AjuJmM7ykpRDP5nO1aSmjVDj6fUuIQBvEWlYOjWyKS2GygpEtwtYIzfq59I8cSOWoNYO+3h2ukpNojAmoMG9vi1vI3xGt4KID/o0=', 'k8f5pLyiGMU/noOwKRw4UIyEWajK814Ibg+nnaTBLb1Y4fNNPAqWTHd7P0Hm9yFK3EClWhjpSfLwHHGUxgejfUVzi1ea7c4c0uWsNVbMv9QwywtF/dQtTiR5cU0TB5cngQ2AiPITOEK4138t8IfHNHZH7oaKz6wE7JyymjrwU4Kw0eRvqPXqN3YZvhlumDIPVy9PLicQ3cm9xexXmL7JSpezZ03vCZjS7rr+X1J4S5xa39GMMMAvJb8XKg558xZ9u9iTVCkZuvop0S7KPLQ0EA==', '2022-04-23 00:00:00', '2022-11-21 00:51:48', 1, 0, NULL, '', '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(2022020, 'IF/pb1UpKyLB7WIqOXsYBXVmKTUaj0ZImTBaQ7VsmsM=', 'OkZ4PAAiIMYrJxz5LFcKiGiNb+5clmnnAeAKh9J6bH+Gxb2xXbEfOptrdQAOsp0iBs7hT3w5h0kqqXFMLNIAOHwCVKKqvN9mJSx+eWumozqzoej0T90TrZeZt2NxbjsA2vS2M3r3weYEyqi9IN1DYxsZ8Flfp6F5YUKjc7nIH8l3D+DD/DH6GcALMS4I8FCYLUtmO8nrLN+kF/3lXbZZm1yRFsLsNgZNRB3MZ/llWJOHpfWEY4n6hPa53eAK/jeBFpte+wQmNW/GWMTdwztzSR2KCnFrOj7UPzjBhN2CfNhD4QCEhlOv2i5oP+EqkMAPX+GBYmxxhOaRqrhs+Gttp0AfW6WGLddbMh3Nw4Kx/CHPdTYuuxiUxZNRq2Kd+nLEFaKyCP1pVpiFYdT0tGXTd0/jADgChBrAjivCDkuz+4PziQ8z6XEFdMGFkBzjuruf+vmmQjjkt/txO6cC8OsFtLQwg7qZGeuUVS0gaTl9xjhRkrYlvQ4dTcAZiFy0Y9XnJ8Kc0UJyWEddTz3vf/vZLYIimQ5avoERzBEXtrzY+ok2jre1+EkIi5nWRX5pyuN7WW3bA2E3akIrleHMP1+Pw15TpmSzdLIGhlNnZaBXgLlmXm+vPns9Vn5EhjLwHNYCqT7hRp8Qc7/JIjYxDKrLUK9+eU491e6sP4OwuS7QXNKNO+Miqy6WE3A4zXptItBnCXGsT6tuCWzLnVvRvndSx04qVVyONBiP8SRb/e0FodafpPUEmKoJczh6uy/OjNXajKZ+nssow1SHDZnCddFxItuWfvfpd6mK0vh0WxTm5OorM0wde+K7hcQ8VVepYxpCJyeOMpylOc/s9BXq/UqyO7qVEIVHHhmnvlXOcsMTk+A=', 'k8f5pLyiGMU/noOwKRw4UELVuixECWnXBiT2UB7lwD8RsXCxcDP50IjuKV43MWKEHCqQxKTgvoJHuu0Unao7YQzOvZwn9fjy1Gdl6wdEEAJx7pb/Cba+IlzsNt2lszWgQxRaYp/Ki43QEhAgqhuy1wKD4wvMCeVja/obQYdtLY0rrjrYyhy2No9hefbPsXg4ptJFwxZHtsLAqLmrhxG4qfpQzg7ZxfV0BfBScK/nSu931pdYvRvK1rbVeAG0I+Tw8qIPoQak1c2E48d0N1eLpRZ7tQWkxHR+Y0MibP1/iiRSTOoVIx/2dhKq4ovn2ZLyRR3BGLP01EraVcss3Qar/DUU7xKWPxkyc43aN/Mo4ZgGZ63nLwk5u1pueGJGexI1NUTk1TskAL+H/QVuKMspjrDWCjCAjxFS8mf6ZXtVe7rqH+0VEacbP7VZO9vP5k8W4Djmzd+NGPWKWLKcQXN9IN6tzIm4Gxa70HRDaWz9aA2czmyLAMh7EQX+2mxPYo9tyO1cyghLOVDPEegaK1hB9zuk9kHl5BUPnnk/pkyA76jRPbjNvUl8VSCrlblIOzrib4+ugIB3J328NqSmxwchPGCgqbVAtUd7w8E3XFYozIu/iwDoh/umPxahqi+Q0hBc', '2019-01-05 00:00:00', '2022-11-21 00:52:55', 1, 0, NULL, '', '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(2022021, '6ycuRvlc4lfu37OQnUD5WmHx/WViUzBmjEoiEolKu4E=', 'Lvg1c9BYSFQDTCrYb4bteGp3KsWgXmf2MTRYfrgj2I+bXh3wX2+X8UzczKVzHVIFATJ2RYPIyAtXfER9xW3Z61nNX1wVVZ3ALJoeHpH8hw1a1hM/V9OrLXm/UongwPsJk7wfEAnYy8SOtlBIjvUSO+HfDCuVZ/e/MpBNFOjncIKnJcCqwZ9ykf+ZTJPh4BwLQfYFlOy6QuvXUYwgCSAQej2KR48MjkzUbLOZ2j29nFWOkPmIeQQmq53CTMf3COGr1hxw8yBXMP+Gs+pIdpgREF/uOyrfp1ZuGcKpcVdZ3KU9/KW0tV1Xafnzpreg9Dq+n4j1lWRQdoPYTNHMc527Fnine/baSOGI0Yp5i4ilKoQ9nq0kbXRAUs68EG0kj/wGfXjcXDnWw+2nscOvurXr1Z+I9ZVkUHaD2EzRzHOduxZLDjNf2A0+zpPDtZhkIGjME2jV8TarKBF+L2tJ+jMhDe6zTfUZNZATtutGq+pKPJuBHlb5xxq0gw+DdRWOYhgWIYsyt1WhoPgBKe7bPgsXjg==', 'kaykrSg0BifrS0Pl2cvTVvg738Wrd7T0XL5cjHJx82s861BV6F2GO56iokVGuVSu1tzQnFSWT1mmc8ajPD2dm8cbsE10ZQ5G0EyWYK7wnzFMq+XHUMcMgbUT9mXQF1WL+L2CWdDC3nuQb3LwikqTRmdKAJ6FIXWcZapEm4aO3mHYo9i0Uab5DiFKtKS4XUXPXzPs1G7DC3iueCzraCzmq0feplmAqynMvRPUkBVoSNaVLgJB+RuntWvnh0OffstsBfHVLBr/BQIgHIAWwD9ctiWioqAeJkZfLhn+G0X1LTg=', '2021-11-27 00:00:00', '2022-11-21 00:54:27', 1, 0, NULL, '', '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(2022022, '261VdZfR18W8TASSh2eVAeauwOT529nWTvXe4Iu7c0E=', 'JZpZEp2fwTsdqzPc8dTCP3xt7MtnlZ7TREOEI6YX4aaHeMMAWxCLp4vLtfP4NE/AcMhikD2xuxgZlrWDhHY2FA8fcGhHQ2FhT/K18ciue0djW520scLZg0FpLa5f/hS6rzQbaUNDQpnbLbFSAl+bCORqhkNbWvNqOpq2o48pnZXtRNt/Rkm9tVyI3gHeBGMLofVtkq6WgZy1/pRJQkqGI41CkZyGsJSXaBnzautHNY9/T9TyAz+hjP3ZRRgiGi5NTMthap5uGg+V6Vrihi8CDubb/bHpYFeOh9j9XhZwB3QFWAumUEHl4Ta/jF2pSRSbBCCpGCy+ptnN8SyZCSChjIrrs6Os05T3txdepWVumyX32jKZfdsEKjcQT2XKReTUzzm+luaRZNavOj3+OFhmZqhnmbnbcN4qcdrUH7KMWMELKaRwvDgyptF7nDsAfqaas9wOBrysolbrgcCyFxnniVLP5FmE3udTo71SNUn7xJh661sf5N9i0ITeMh+iFvqHgo9hvI6GX7oWeF0rbLqG6lpzDq3pBQGIryKrKwVZt6s5JZG2sLb7ashC4m3kIdyMd3y0ffEteWgjr/Yc5AYah+oJZTQx4CtP5NbmFjrJK3jIkLOZVkHYTQIOW+jnrok2SDfuDHLYM9jSMmIX2KSDZNLBD2yKHwSM5QTGgi7q3l+P5kPIEfivNHo34uxQM5+OouNcAeKDJewa9p0GmNku/uZEIPJjTSxqwxe+ZDGdWW7+r3sMSv73g7CfqvZqlFKFI1mWEVmg00Ny8xoAleGABqa6oa/UKpcycUpK6N66rNTsIds9jdV+BCSUl+xWnKLs', 'WGlwTC1koSLhAUKGuoP79CRaBKqTKjZjbWzexa5l92ubjOBY+Sy7eC1k1JijGmAPeTukQ0dqLoyRXP1w6dg+ztTZW3TyXjnQ0H3Prb/d/6FJ7piM893Ty2wdKfgVSzNFejgZROPhYg0sA7TOeasmmK8m4callTpIQInkmTogwtXvzJV5Y+YdT6mSubgwqU3Fwo3JV8PLt+MBcEfRupmEiShIVyVr9D3Z6iUngYixND/9o6c5w1GYo9mwpB6w539A5Ki0CDjZdKzPCdAPlatVsrvYk1QpGbr6KdEuyjy0NBA=', '2020-02-01 00:00:00', '2022-11-21 00:55:39', 1, 0, NULL, '', '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(2022023, '6ycuRvlc4lfu37OQnUD5WjDtAkGwJpI3XUT6faa5SiM=', 'JZpZEp2fwTsdqzPc8dTCP1suScaF9/2c75UchBst0MvjfSybbBJQz5QeNlI5/iZrp482tco7sAvgilYBft6Yjzcc57A6HI8bLWREVvMozt9RfXt7BJUcFNtBxlMhFSVD5KzZ/swSrWSwfOy7a9PsFzQv1CdyzkhITcExEqLeVbB0xT02Fl+NsXkH6ABRfXG99yRS88LlUtu+W8ktynXV0mJyNhSrLLxFd0JGj+58ilrmW3aBjYNBMY0YGw70jOFi41LJX+NJNGhoZSp8x8p20ZMSOOn3PrWs5Pn0Ch1oQtpNILWBvOeMHsJisx3ZGlAtYMuX1dCWD8C9RczpqHzDjAxHUWZiWK+cgMhx2Oxm5RkEtQZbXhfNsRA9JA3cMxZf+X4MBgnXpXqDrS+uP4VzKkycZt5URorcQecikAnzJcDURreFy8oE6wRYyqN/E3mBTAXuaJxrR4hCMfFxk/ZPGl9F/L3oP6kQo8eNyXpXDCnAFOrpz2mugMuriuXvrX6HR17jwrgnRoxu/5O1tdkau7vYk1QpGbr6KdEuyjy0NBA=', '1We69unNAexvn3mEfwI/LVY62Jb7EOl7Gl+82Xf4duHvVFuErAxD1OCPM5+UpeXi7tFQTWzovhcwnajxTVTBeiq4aLy5TRba7Uxxpe08mEf1dCH7fzI9oTuo3eMBNc4syiFdikXNhhGX2oqXmVOqwcMhBJXtxJLUSwNr+lTV12JlcKhpvBwTyOMoBZCTuKGBTfeEetFP68GFPTgZ+csMjIESG7lvQ8cj8FCJgCFqcIaRAmlJF+T080PWwcFnqXP4ThFVPT2Bm8NYwW0g5WuVG8IQOVqL6236VdZP6vs/hR/SrqawEtXQ+QFObC7uFWNK8H/h6/noVxKKXMPl5oZb9u7Wt1a6lzkhepTlhcGUPyMtXBtfVaOC2+lwD/xZsgP+Db5jmCuDlbY8O8I+05ruLZz9EyQvtzyla2EFd1cDnyMgoxtX+/GftxNrrT3tIZw9aEb9dyFwt8QnVkfVohE9m6T1bM91iyTwiQ8sbUiU+GJFnUx8l4UkmlXRQwUxEQwVG9UDEmkfFjbmb1OQt4kolWwHb1n7jsi67A5N90teGXachrRjU/+rUFqi5Ah+oaGotfAOfRVtMXN92Ohoifd80l8VGsDUbys/KC8kt272d1nVJgpb52mSo8oKouiA7vuTtqy3HH3IifgQHVHv1JhlSRrQQMsGwZJC0Q+A1a+QzmO5PG+RSKH4Ql9ccRfOH7L9+uGRidoaV4QeFvXh6mXxBJSPaHaBtZSWPG60cOIFfWBwrs4y5QJnf0tt5nx7AF9W9XpD6iYFDSobyzoRhoiikGFNio+1jUkJHaCMLCmhBeqGEHy4Omc+KZKARRA+EaXI', '2021-03-23 00:00:00', '2022-11-21 00:56:41', 1, 0, NULL, '', '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(2022024, 'PRmBPw7+qyOxussfFjj/o0qaeDDlz0A9hfNrflM5Uo8=', 'SHJ7hR18CO9/0hnB4DOyNLxDaSYAo5yf+PQwZJOKKDtuFCvf9kqo7nTGzTSPtzg6sCbFdHha8x1oZquunZfdqfZ+lPeVu5EyyKRd7u/dUuBoVbQypkpMtG8b/Gp1PMkSOt3k8hZIK0F0D3EDrMdT22QslBx233LJXcdJgYaQukcPZCBiNr650eVc+urJn5IvUvdUPWmrW/LfH6rMATAQ2B8bqr7sdbf1nudIhEpHqWSLT2GSX6mrEA22ka9JjN/AI3vqUWS1WdE/7FzqX0L+MjtNt8iba4lO8r+Ca1OWAy7Av2/wUvXrLbqgjJZgBsS6lajrq6tCvJMaOjqjYtSWv9t4m/+THi2N0eRJ5ltBFqfzFwCxrG4Qv+v1joTtNMY11li4C2YDD2d4cZsvSakE/zbb/oTBChifaWObq0uaqCmPIN4woNXrodv3usT5TkOM1iuoNMGZuHQsCMWVxVD01ywHrgpDh0Bo/NhksF8EaPnGrKNEtFLbwu3kpyUTFDtuilvhtd5UL8ziKXGyuPEPyxNG+eYuV2UREenc1g9kQc6MiUJq+U6kxCeaEfpFBuKv+cJLkkBp8b7zGBq3xSRrWUT77mdUMESHFn9YxvCq+X32yTOPc7AY/rPDsxpXt3JvSzO9AgGVgZaJVehAiX4+BAUjHYigwTMfNH9mDpJDJ/KrnTwRJuWQm7VL1OuBM4zRAy/OPC08VEBbNKdWQ3dzFZwd64qQCFt3JA5cXItUjoCurle9NxkuO5kKjssJ0dqz00IPDsYMb/E4M0Pmrzhz8HZ4muANZm3VkaPbAvFvHHbUSnDPxqzrRCGeTyfEHWnaNZGreyOvE+Wp9OV67GshtI+r1I9fLJNcmJPI1APANH73ooNqm82LCHla8n4mRVM2Sj/4KN0IPQjD3BIP/Ep0Jea+4ig/GE7fGL95VlwpbGL+td8WKwsmQNqTUN6AuzSlKgTXCPhdktPsTxkVtMdUCkUqjOpX9Z9Mb46gQRCHRkTKbRwBKye1qzmX0spbel7vTFO0tgH9kGPlpfE2hZkcH4+FVALjiSfiJo93/PppRztif1C5rKM9yDmHkMeAUEbS1ajUXCQb0phESnQd2LD8+zLGiXRN+ylKV/TvX5Ejcg0l+AyWIbevWpxG7n0/Au2D4KOLtXhPLAEb0YQpnvfxhICkr59n9htuSJqfQwN6fj/5DljWi2IxDjiAc2UIhd2yBg99VJkn0wq3peCxbu0CfhkjmVMvbSd88MrOAII51MS3ndc8oPOwaDW8f5bxBOCLdVMCFWPq9PP3XKDj+xFtK6i49PgrFaWwp6/5paR/18+a529ECbxJcjKhcV+XpWtk8j9Qwnv9nUzZPRRQWhm9n5cahXFaslFaqVmRicC1X+aHaGUwQPa2ZyUFsXZj95l85VXcXWUwV9WUX5p7DSqrx2RscRUSQm+BKGshQinUszkRbTFkAtj1QhvP8wyBfThaaUwWHOlHrkgAWeodE0MFBA==', 'dXXD5rOOxNPDeENlmE30yQve5hJMh8dff00EjTPS9Uecz1EA1mNDK/1xlAMMFaArrmvgR3E7ag7RDNRShFQ2ylwwxpSXWIqjJqiwNVXdezdGYrAthfdOfpFutZCMY6/NjFkwFPNVSA9XhfBCHZ5nvrvYk1QpGbr6KdEuyjy0NBA=', '2018-05-12 00:00:00', '2022-11-21 00:57:41', 1, 0, NULL, '', '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(2022025, 'p2kxKU5iqETc2Sz1OOywiQ75Kh1Q1Y+zzZfGqfDWoL8=', 'WGlwTC1koSLhAUKGuoP79PMITJoEpV70B0ElKHJPw4vUjmdhnBA81OETVbc1t3tNcLGY8L8xIPAv4GWB/XpXXjtEZ5mLTsayu7F9gvMyCmv6GQWvRbLMuxgh8ZeDWBTYGynfztg95qZ3X3hCvmLaJo8N5U/anFwzTwVYEmVAUSCn+7QpLbTGor3C8nZk2Zr+tsugcL1ejLe7UF622IhZ1n6la2KIVFKxR2MS+CeP544aN85jKyUryzRdbzKiga4KZKT6zokDvNqeUav1BsuBIm1gU3qd7l5UVPHMAUaQIiBD624a1LzaEwMTrdPychYeiL/5oUPRHb7LnlZEFqTNhO37+qe5x9fF9W/aLYgVg9jy6HuRICHJfd1B2sosFh4XTSggUZx+UcNe0hlTUjuKvJ03W5mWSA8YVwkdVOamDIMkw8v0obG26MT+ggaOo1FlCeIqNo9/bi7w5f4vISDKqR1kepRXKyioX3krOY9VuIpSH42B8PyLsvuTLZmn4tJu2/qUYVmgTkcZGeB6AvaFi+JstE1N/LUHFeCHERaQeVGbi8sPRvtZoAuSf0Obq4Si9oC9e89ikPYkIlrHC1mGO88sL5v30ZnV6pTgovJEbBmZy5FqP+aO//dTF0n/6ln6iZvKEt+gO+SaahoWZZGRIMSN8W2BWexqnVpZYCsKQzeHQn6IaigJ/iLDtsVr2HHvyzgEEOnwmozIxGGD24mwQ73zBV1AZWwg3LhNWTiGtMqIJTt6HGIlBZzdQqxw8A/DUTa6AJ6EvaRWtCiXKAYX4gTOyWQ2b4hOEEZNw3tp8Fb17cFoC6gIn/7vzSeIs0xL4ou/Y5w+QDZ7MzENl7H58Dkt85oTnXf7jqvJMmknSVLQZb4sGPp51TcKecHWllVXzGIIOAXk7hjxjKEetpiy+Qfvr+iQnG8UiUqPt0gsOy7D+b5pHLeOKpbZZuogmsv1aaEzixh3csL2BjuIOEaHWeWlF+v5yNdipTTTGb3yHFotSNg64rCAi0//URw95Ysk40QmWraIQiMMm3uD9ZLEZgBxTJA82rBAmXsssb9cqmuhzQ+Dthfiz+pX5G/UmTAHiVezerdL8/UDFmBZeDc2KBHkKufPg6RYtkU3o1WLuGAuq0klgUE2Cq/cYj5Q/0UaLOQc32ULlpShdFsq5N4g1uXwCn6p7sf2QtGYPHZfC14Rj6Tq6BbcjYU5ce7PFWYgwn5eVGIEnqSyNMStm8vZrJ5azqVXpp9oYrb/clmH5S7z8QNTuYQlFGIy1DFozOrN5zO11uYvb9qyHt1qYMRXqaoAjYgLAWl8gAZ/6+T8Y2y96EQZHpAE5K6GFuGZ7aDzVrQixQCljyvIVq6EfXD3qco3tZOLwGoQf3O5CAGjGBkVFEYJy4KMOIt7WKmb/lPD5gbkh7a0DxiS5Eaqm8oS+LpM11aXhvxUtXpgqJNUGQrnLYEHea8cV8EpjzPRC4CEYZNVncE9xvjF7ZKOU5CfEXLmm7VvsQf0tAc2m7HfomnDOe2MQtcnmuUu1uDxvkmH0zNbaJJu9+BmuOsPTk+gwrzG1gcX0cRxt2NYlxkqJUf3ktIbS0xQQ5qjleRHqDKusmPBKozUdnj6l/VP4FGpk2VBrZCQ91V7FEAd7RwiycxHe86lgYS8eimYFZ/wjVMACzyJUO51WJ5OEXKbEO5VUEBsiOA5AtQq/kFIbR7tR1WnaVUTmNhXxNQ0I2WL19iz1xPYqyP8PXGTSTqC8yJ1X29xKcv9fyEGnx2sx1n/cew=', 'zvdpkat994wqfDxwOihSXVP+dzy5HfO9kJdKxSLc1FtJUDs45jbB9p9k8zWkCfTnBfrPGdfyEKFDG0Lvu9OA/B31BFDuoDRBPZEpCV51jVCsHCLjabUQlOENbNDt9Uj/DNyIZh1iFG3P50Zuk+KiQyIxgoRUIPvWVuwHs+VXX2izgN/JC815L3Wsou58Yn/E160EKQSTsa52t9o6Q1ojuC1Lk6+hN2KFYW3gqTexjvIXQjlss5JadSdhXoIB+4o82hWnz1Vs5r1pxcUIerFZLRW0S8Zktt/3DScKzYZDbm4=', '2022-01-01 00:00:00', '2022-11-21 00:59:01', 1, 0, NULL, '', '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(2022026, 'wNMv5yLeocYBp8A8zTRfSK3LgW3m9o7TZZL4BE4ZQ2W2AJ3PtNXesU/bJo0gJvBW', 'menHJUknGi2FVNNwKGsKSNCwE1Ifbd+MdHYm0RVssq2gmqbs530EHJalyg2FP8TR41Y4E1JI5IylGM0SNy9vlV7miNaWoB716mFGHgRoGo2ClQP92CK1RUfISJx/rpr0OF5MciB3VN+CFmYoenxp8eAK1M42H1fGg4FNOTpFXfh1sf4EOnUZu7FYLGA1U1JogtxLrwEQy5GyDIqQYcHtfeuxMNUCkg+xyspGcubKoSfXoLS7SkLCsqfJqEQpSCuW88sw9+bBG8iW+C5mlnJCaMZMYni1bdsC2SL50pZztU/Sx8F+YFteT+ThaleMcfu7nREg5+5i507pFkP8iA8uRNXRjRRIWvDspXcPEDjiMxh2KqNmIUmcaEFidfgKwqevglSgBJRByIpzMaCZajVAghMPzl28OmfAYbWIlKYgHzg5hPV9cyChPyzpwZqAh9I+rh0whMduygHTHA7Y9BffMSSflmomdn7pE//BAfOcZV7G5ScdkMzgLXtNEwJ/rOc+N3+s5E51vrJa4rWbib9mxLOyDta7UIa4AKiPIHMNzu+uPdyx5AF4R5t9uBDi6iGa1jeCML5MPF86X6YoR5d0pTynxVuR02F7RRsU+AtH4vDI5eZl8QBGBqpC+rGWLmF6H4ijfGfoWMmpJnHSbY/SOa6aqe2vSVb5KJ8jAi2cQXyGEHy4Omc+KZKARRA+EaXI', '4yTmu8KAysVxT7ijl0R0CwXQE+oHDstcR2qkDMWcGLo6w0l343gWJiCNgax8q3YJUAZlyuHR6tl8MjRqfHiVxTjIurouuFmOQM3oEoDKgeN+r8e7EoVQBVFMTyW5fvqDlmJI56XE20TmJdodJy3Dl4YQfLg6Zz4pkoBFED4Rpcg=', '2022-07-29 00:00:00', '2022-11-21 01:00:32', 1, 0, NULL, '', '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(2022027, 'l/8m+aBF20rcJFBbLL6T5VTVI/0R0tsM690jd0R+b2e72JNUKRm6+inRLso8tDQQ', 'A9QRKlTWuZl/5gT+BkeKI+bJyx58V/JC/jg7dkwOcN4fMFE2+bJKkxyj6/FmZQT7kKQrMuxRIzEdyBPl6UtEULblHJcy4y/KD9D6jYYpzSyrvuaypFhVw5n9rVGYiWWQYAzgKkeKKbgMDUD48uagWg9eRH5aRB9W6Zlszq2pAStPJQPfgLQQyXkzySQonoRZ6q9r086+2OCkLbkdVr7nlMG+c+9K4VzFEL8MMhsshdkP5ybSnrK8HXWdptUza0PuKKXDNR42VWmrekGZficJpsw3MgtfQ8LNoMWjTj2JCorhOZqzI5paqG7ETly29LgM+26DHajIQQ1eQaRoUSYSV8JMGitwKC3/kNLRMvqQhHVVjvjVCaIOyp69mwFIQMb/5hdB0fZE5ldHfu6VUVtdy0fbxd1b6QhmQaMDpCVpEMGZ1siTka1y4bZYQShHAAtWrtTCmBvif7onhUkyKK5iR04FoKRu9DdAh3MsJh+NX04fgg4q5LJVGThyti9LeoWSFMThhzmBR5UfHAeIuC7J3vQWR6I2IoCx/sxI09MWoOwyGLY1ieSXQl73/zTA0Z6pPHVVKsYCHYTMR/zymtsSGY8dzUjh6HgJcJieDWcUEgazSVf/PSg/JJe66Ts+giIdfjbbHQkGLFd3Yr+AY0AwHt75hk9Qo7LhZzzPviN4fiw4aU/XeaquvJ88thpFEGVhN7IRjfM1pEF7RmIhC43/7BROrGWescCzdE3AGJVx8CuUzKRMAwpN9Yp4RbpVyZs3819BZ9RBPRckUsDuJTY14vAOP1Jqq0dg+3oXe+ayRjfsZHXx8nDWjIAxouvM8gMG', 'UTew8Nz2VIAZjAXZCV9Ll/8JEZnzjoZkpMstwuLBoR2m7YGdVddNlovotWaxPUU+peYA2W8XiazI9s7gZsM/qRROrGWescCzdE3AGJVx8CuTcmaPGtUEvK8WqUbXPWNDfgK5nX+bQFv+ELhcJA/+EFSWTj9CfqjuiOkPVOd0mRt8rQ9hkPfFIqN69R+uQqBRETsKq4hhvsWb6RZYZTj3JInhq8QAP3g6qEpkgxxZWDw=', '2022-11-05 00:00:00', '2022-11-21 01:01:38', 1, 0, NULL, '', '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(2022028, 'FUxexA9F+8eea72PeyCQ2BPy3S+Ux0xmtf/Gmj0OXBfJoB7bIx2IYOO7g7BKQiea', 'SHJ7hR18CO9/0hnB4DOyNAnOGBIaXm0Xf5hgizxV1IBuFCvf9kqo7nTGzTSPtzg6sCbFdHha8x1oZquunZfdqewFh/RSt1GABRUFKLMC2300uWJoI1RXKd5BVklDT0bTwaWicFlp/X5+lEAisD9VMzwoc/zZJs1x9XSEEkqy0JvxQMJm6CokCit3/OIBLyRkwWkRBVQqGYZZYVqreWDXEyjMBT1KbMGvGf45a+FElPTYc9+nAvPhIwip3sTJ4kJXYH4r4c3qjevYC+MX8biqJtgchOsOHmf87d0GgT9f9csDvHK43Po8fZraNemh3Kr6wZ7BD+kMR+BSET/eLFAIJtEQ/NncO+Wm5AybxmSgxybvq7D2+1s8si6pSZy3PEVwTiwDk6LfnPw2d2KXb6ox/foQN+MHzLjkm5qaAs6QYHmsLaAdv7cjlL8DYg0uKe5zTAOHunXJYiXs4QKj2KOdSVAL3dX6YeJnypa/WMBKI+X7OHXK7h86PpQHAFbHzf9fmb7bWJAnrB0Yj2TR+MhBdkK1FHqdYe9piizRKexZoi98tNuuw8u8ietUMkMnSiPfDmHv/MqCEueA7B03LkyQ2ZkM85f9geHQxXtE2xyAqWfnVqFC97faAOoMxbTvcXijXBJVwjZt2ZrU1WzHy7iSMdcq5TrgGd0nrUvZ79Px0njByL7qUhMhe82FEGsr9Tki1jdljx0nyaUX5EMvIzQMVgarRWnb+7k70F5JHUS404HFeijfLCgXsLrOCLLMS035vFt1vwjWQx15GJhU/ZuH8iUvjV+nIb5hoQ+IfMVb60mS6V9ffdRnA97zxozqUKWseLZyYjd7B3eQ0FnM8rHXhCtvQK052Nng+b6QAjEsjbNeVlmmGYRaEx450N1enXl/', '4yTmu8KAysVxT7ijl0R0C7+2pTfTVhFkJLZTLTsoNXl1OySn4TjGEKGqBkwDD5qhDVV9nl61dnuTJrncP7k4ZKHhRWCWV0217OFOCW+wtunOhKIHfnUsPNLPHDsRKZMZ0On5Qn+WSj6416eTerkpTp7LBEtPaSskYI3ixx6E4xFK9M9YRCtva2SZk1Qm0SBZqe7fJUKesYi7Qd48Ggec7AOaJjuhOelCrlCUe7ryQy81iX0Y2htNBK6uYvlkoWosGy5b9ybffmQTcY97MDMIdPsnDgMs3BDB/nr+uOa/n6pFJVr9078cYCwmFW5doxdm', '2017-12-24 00:00:00', '2022-11-21 01:02:36', 1, 0, NULL, '', '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(2022029, 'UrKW06RyHvSLp+0mBnwcMdxJkV3Ddjgl4wqJ02K213Y=', '6ojzyAgdxvI5o5KHps1OcdwOj1oijFwaaoMLKjbwbRGJzLy+n/rJRXdLaCO4Rq3FyZGiL6LAW8ltvWOBOQWv+Ybv0CaNZnFwM4Y5y5nrnL17i8/qaCZEbIGY5Rs6xQfQuaO1dAPtqrY44D/UW4HAkV4FN41/X/TtjpgOptW5PD0mWeo4+YvRfKF+tvfOFsmXiI4yuevmMrtf5IKO/jzpdVyLiOnuqxeGXprb8AMeQ8F2XNdj10HoCS+LH5dkkBsuh8rXUSY/pwokLDaafpfVLbGhqv9QpV0y0Kela3hOl5Y3nrloATXT5uWKVlWab1qlB1CPM2G3zWH/88o1WObyQ6vByYmwJqH9to//x5ymmDQ0a/igMGE7DvtJ6KUJ9F4ObdaAVdZhcl9SxPb7EPucdz5gAtZPfMDUhNqJI9i0UcPZgk9fHlFjfTQBhnSPZgqJvlW38reluR71MdP/bKt3Gbul9e+lZkcmrYRh0sKc8zzdCn7FPLMtx6QcVM/cqjdIh0J+iGooCf4iw7bFa9hx73YilGsQYvtJooKAZkQIUnxOs79DhwsSLcvdUNme67+F/o042S502yhZWfOojP+MuzHQ9Q8DKZveI+FhpyzW5Fzs/jKh/77lKO1dyHCP79IUl8VgFT8Pl+UvaNWAw66DRAWpDejoJQIhGO7BQu1cq9L0eUctolMRcxhmKmreu7eR4tSDlq95ivFHDbmvXL9Wh0sHWh3wUptP3toE0v7CTW55/ZCtdptO1IgL4vuo7mEU0NT0yab05fo9SVhktNu160NMJFo7n4GH7y7wNNsUUBET5nRGy3Q1wBfcHOkozVppVM2RW98D4NFZi87M/uO5rqOPavdAEgM5FZI/U0Qbh0e5PcDJKSG9LlB+HnoPbKVWlqvc0urBJSdemEMiu6hmns1TCiPYs4B/2wvWclO7Oe30pSA2+cQvAejiydq0IvZR2bCQH8b+0gnkZToPbydPqCoJsCQirXDYQrrqybkfPitgOxuUY9HaC208zAtzuo71gx3qkKwi94oM30iSO2DjyfoaNpP+aP3wnu6jewPpi86jyb6BezB4udXKz+cseeWYVfY71ecLdJMLXLdKtFVfdq+Aa/CAVHiqQqTxO4CX+0uHo4S08UMRQmeyQjt/NtKR2xxJYf0Il+5ZGYOWdiLzaNGVry3sxiFc5X6N/7KgE9xHt8rEOUXV749Px2bn8UQPAAgUgHwQS9HmZESFYmlbGFvl8KCT4F4IKccfi5yeO03dKlL9QFMdCeyl2f4fP8b5CpiFSa+Zf3FOeqEEHyShY022mWOCPZEcdCvt1lsmDehtMaKh+cGTF+/vcKpsdyocPTv6mH2T3Xmzl5RG3CD2NKjFTRymRos76UxcVqN65vflbMr5xiwE3cAJ4loOlHSXxmLsEgEkmxmeDdZhG3ZeBpKN1NF/eLNUIEztFFrCNhKApfHmi92ggAt2emTdiZ65Fl4wq0y2OK34j2U/d5M0bVqQEMFxTlKyVfdHZ92gRbFnnrT6HaCgt+swKcROwrFlXueHXtnJWAKmNvGYfq06aHGEW5MgkyuoIr393BDbJP8TpUZn2l86Wj5J+J0TMthyShKejstvag3Se4PxJjn1akqLK77cMVbmUDYLHSCmJFacl5uUzMsB+eX8nXzv/84wJ0Ukn+mWDCsSFpQgBO3jXrHTpvgnxIx4LpZJEGox7zQ=', 'ElPrbpkb0gZr2Nb4oJdd85szAO0DmmOCvqx4EMKHShxZNEUz/3iiqLl0a+O85ZcoVt02GTw5W76FI6CxIpaLdQcwBX5rMJz9/tdKk9KxFCkJ9JENmj3SLejfdrxkPZLhxcS1sYozoHS1/iZvvvRFPYmPxCIoV5BwTjbwuyNsxllwE+r4NMdbFnziWKF+N87gI/FuYeC8kVzRnwyO/tqynWfsTrfHYZ/phijX5yc8L9It0QFKzaK3pkz/OsNKHiBHgSiPd7aiY88W8OMiV/DvCFZMh5bS7Vb32q5D6GQmVpn98P8PUiR/hnVFrFdD0uhIVxCxeQVk7P2GUuSRWiue1w==', '2018-01-18 00:00:00', '2022-11-21 01:03:38', 1, 0, NULL, '', '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(2022030, '+JhFv3Ew2+xidG4LKLF/sm44Q82Bahr0R1GVtKcWsG8=', 'SHJ7hR18CO9/0hnB4DOyNDNEJIMYtP7SYu8kXevrvE1uFCvf9kqo7nTGzTSPtzg6sCbFdHha8x1oZquunZfdqewFh/RSt1GABRUFKLMC232nx//jeP1kLa3x+Qy8t7g5VqrBY/vc+hzL+E3o8SR7PPtPw9hxj0ALzfPVNhNjUmP2fkTHNy4ZOCbi1drIdwx1TouxhSp6FOJpi02nhsG1ZZlLC+IxOVRK4YWqbNcUra04Neg3nywWKQz/4avr0fU+eud6i+nPxMJxp0STtS6N7ftYxW5pXAOaqQT5bbahXx9+/8Pk9a9TsAH9JrmL6Yq+BXovZX+Ra2d/7if3dE9dG1aqwWP73Pocy/hN6PEkezyxezmsLswqyHxlSzWfmwc887TowhqepvccJ3jZwoX9wrnyKT3AYs8mJRjDVoT1w9GOlpX0YR60pJPPPSIyXxsGOvmstY4ASNczLP5GL+tYsUL5VxC3lxCa/n2uk6RRvdV8YoycSgrmqHwgSToyZuInhiQbpCy3PbDpjcCVPW8Cs0jf3cGn3n7n4CGCPdNUxlngqKN7Aiu/YddcLbEcly2U9OZ1WzUwQfSIT3pzpdHWxrOI07hxd6PBorbLZdFO/TVI+hcUcTqzfm70eqq46gI86kQ2/Jm/XyTA/Il6BkXm6ro5JJf5aOOkTbpKZOMZhpULJWV/3qIpCBWW9qsXbFxipa20oZhwqWZspGmMUOE3Sssq9dsafNyR5v012A3iAarFtQj2d3AgoKtf8r0kePKYCk27VB4mQ0NfDvCPdXNAl1DrRhCoTHwAHNdDuwF9KoWjqtGLakfXRI+KbfkItdPErQxly5w2T1SlnW5E+FJw5Geu5Yc4P4tdBEk90Xbu3pUg5prm7hBtKg7mGuJTWH/iS+Dcz5Uoge+bwVDo3oMbTD8RDgF7udWkz4HV+40xsd0qn8wNVRlwhyrHuW4eBWth', 'WGlwTC1koSLhAUKGuoP79LS7GQZ8g9/M3P3QxSpF52c6BmRwIdSVbooka4+1tFPk1FXFl3dBaYMmfxowB+Z+80j4annivBN2Wm02YYeFthBWn35NZY7RhBzum6C0TfxUgndVJuGE3FDPzVLW5KNk9168AU2ICPohJHJp9U/aD8MamhcMlhjfTWa2xvlWZ0/whKjOWXc6yVrhkD4+EYRvIQ==', '2018-01-20 00:00:00', '2022-11-21 01:04:46', 1, 0, NULL, '', '2022-11-20 17:04:46', '2022-11-20 17:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `case_hearings`
--

CREATE TABLE `case_hearings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` bigint(20) UNSIGNED DEFAULT NULL,
  `hearing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_involved`
--

CREATE TABLE `case_involved` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` bigint(20) UNSIGNED DEFAULT NULL,
  `complainant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `respondent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_involved`
--

INSERT INTO `case_involved` (`id`, `case_no`, `complainant_id`, `respondent_id`, `created_at`, `updated_at`) VALUES
(1, 2022001, 1, 2, '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(2, 2022002, 3, 4, '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(3, 2022003, 5, 6, '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(4, 2022004, 7, 8, '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(5, 2022005, 9, 10, '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(6, 2022006, 11, 12, '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(7, 2022007, 13, 14, '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(8, 2022008, 15, 16, '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(9, 2022009, 17, 18, '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(10, 2022010, 19, 20, '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(11, 2022011, 21, 22, '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(12, 2022012, 23, 24, '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(13, 2022013, 25, 26, '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(14, 2022014, 27, 28, '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(15, 2022015, 29, 30, '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(16, 2022016, 31, 32, '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(17, 2022017, 33, 34, '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(18, 2022018, 35, 36, '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(19, 2022019, 37, 38, '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(20, 2022020, 39, 40, '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(21, 2022021, 41, 42, '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(22, 2022022, 43, 44, '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(23, 2022023, 45, 46, '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(24, 2022024, 47, 48, '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(25, 2022025, 49, 50, '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(26, 2022026, 51, 52, '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(27, 2022027, 53, 54, '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(28, 2022028, 55, 56, '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(29, 2022029, 57, 58, '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(30, 2022030, 59, 60, '2022-11-20 17:04:46', '2022-11-20 17:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `court_actions`
--

CREATE TABLE `court_actions` (
  `court_action_id` bigint(20) UNSIGNED NOT NULL,
  `date_filed` datetime DEFAULT NULL,
  `case_no` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hearings`
--

CREATE TABLE `hearings` (
  `hearing_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_meeting` datetime DEFAULT NULL,
  `date_filed` datetime DEFAULT NULL,
  `settlement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `award_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hearing_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hearing_notices`
--

CREATE TABLE `hearing_notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hearing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hearing_types`
--

CREATE TABLE `hearing_types` (
  `hearing_type_id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hearing_types`
--

INSERT INTO `hearing_types` (`hearing_type_id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Mediation', NULL, NULL),
(2, 'Conciliation', NULL, NULL),
(3, 'Arbitration', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `incident_case`
--

CREATE TABLE `incident_case` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_no` bigint(20) UNSIGNED DEFAULT NULL,
  `case_no` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incident_case`
--

INSERT INTO `incident_case` (`id`, `article_no`, `case_no`, `created_at`, `updated_at`) VALUES
(1, 175, 2022001, '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(2, 179, 2022002, '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(3, 155, 2022003, '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(4, 269, 2022004, '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(5, 266, 2022005, '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(6, 315, 2022006, '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(7, 280, 2022007, '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(8, 269, 2022008, '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(9, 364, 2022009, '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(10, 338, 2022010, '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(11, 175, 2022011, '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(12, 179, 2022012, '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(13, 338, 2022013, '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(14, 175, 2022014, '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(15, 269, 2022015, '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(16, 269, 2022016, '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(17, 364, 2022017, '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(18, 286, 2022018, '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(19, 266, 2022019, '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(20, 269, 2022020, '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(21, 175, 2022021, '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(22, 285, 2022022, '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(23, 175, 2022023, '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(24, 309, 2022024, '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(25, 265, 2022025, '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(26, 309, 2022026, '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(27, 318, 2022027, '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(28, 357, 2022028, '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(29, 252, 2022029, '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(30, 281, 2022030, '2022-11-20 17:04:46', '2022-11-20 17:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `kp_cases`
--

CREATE TABLE `kp_cases` (
  `article_no` bigint(20) UNSIGNED NOT NULL,
  `case_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kp_cases`
--

INSERT INTO `kp_cases` (`article_no`, `case_name`, `created_at`, `updated_at`) VALUES
(154, 'Unlawful use of means of publication and unlawful utterances.', '2022-08-15 02:07:42', '2022-08-15 02:07:42'),
(155, 'Alarms and scandals.', '2022-08-15 02:09:12', '2022-08-14 16:00:00'),
(175, 'Using false certificates.', '2022-08-15 02:10:06', '2022-08-15 02:10:06'),
(178, 'Using fictitious names and concealing true names.', NULL, NULL),
(179, 'Illegal use of uniforms and insignias.', NULL, NULL),
(252, 'Physical injuries inflicted in a tumultuous affray.', '2022-11-03 13:31:16', '2022-11-03 13:31:16'),
(253, 'Giving assistance to consummated suicide.', '2022-11-20 16:23:19', '2022-11-20 16:23:19'),
(260, 'Responsibility of participants in a duel if only physical injuries are inflicted or  no physical injuries have been inflicted.', '2022-11-20 16:23:33', '2022-11-20 16:23:33'),
(265, 'Less serious physical injuries.', '2022-11-20 16:23:44', '2022-11-20 16:23:44'),
(266, 'Slight physical injuries and maltreatment.', '2022-11-20 16:23:56', '2022-11-20 16:23:56'),
(269, 'Unlawful arrest', '2022-11-20 16:24:09', '2022-11-20 16:24:09'),
(271, 'Inducing a minor to abandon his/her home.', '2022-11-20 16:24:20', '2022-11-20 16:24:20'),
(275, 'Abandonment of a person in danger and abandonment of one’s own victim.', '2022-11-20 16:24:32', '2022-11-20 16:24:32'),
(276, 'Abandoning a minor (A child under seven [7] years old)', '2022-11-20 16:24:43', '2022-11-20 16:24:43'),
(277, 'Abandonment of a minor by persons entrusted with his/her custody; indifference  of parents.', '2022-11-20 16:24:53', '2022-11-20 16:24:53'),
(280, 'Qualified trespass to dwelling (Without the use of violence and intimidation).', '2022-11-20 16:25:25', '2022-11-20 16:25:25'),
(281, 'Other forms of trespass.', '2022-11-20 16:25:35', '2022-11-20 16:25:35'),
(283, 'Light threats.', '2022-11-20 16:25:48', '2022-11-20 16:25:48'),
(285, 'Other light threats.', '2022-11-20 16:26:04', '2022-11-20 16:26:04'),
(286, 'Grave coercion.', '2022-11-20 16:26:46', '2022-11-20 16:26:46'),
(287, 'Light coercion.', '2022-11-20 16:27:03', '2022-11-20 16:27:03'),
(288, 'Other similar coercions (Compulsory purchase of merchandise and payment of  wages by means of tokens).', '2022-11-20 16:27:15', '2022-11-20 16:27:15'),
(289, 'Formation, maintenance, and prohibition of combination of capital or labor  through violence or threats.', '2022-11-20 16:27:37', '2022-11-20 16:27:37'),
(290, 'Discovering secrets through seizure and correspondence.', '2022-11-20 16:27:50', '2022-11-20 16:27:50'),
(291, 'Revealing secrets with abuse of authority.', '2022-11-20 16:28:03', '2022-11-20 16:28:03'),
(309, 'Theft (If the value of the property stolen does not exceed P50.00).', '2022-11-20 16:28:18', '2022-11-20 16:28:18'),
(310, 'Qualified Theft (If the amount does not exceed P500).', '2022-11-20 16:28:35', '2022-11-20 16:28:35'),
(312, 'Occupation of real property or usurpation of real rights in property.', '2022-11-20 16:28:46', '2022-11-20 16:28:46'),
(313, 'Altering boundaries or landmarks', '2022-11-20 16:28:57', '2022-11-20 16:28:57'),
(315, 'Swindling or estafa (If the amount does not exceed P200.00).', '2022-11-20 16:29:11', '2022-11-20 16:29:11'),
(316, 'Other forms of swindling.', '2022-11-20 16:29:21', '2022-11-20 16:29:21'),
(317, 'Swindling a minor.', '2022-11-20 16:29:32', '2022-11-20 16:29:32'),
(318, 'Other deceits.', '2022-11-20 16:29:42', '2022-11-20 16:29:42'),
(319, 'Removal, sale, or pledge of mortgaged property.', '2022-11-20 16:29:52', '2022-11-20 16:29:52'),
(328, 'Special cases of malicious mischief (If the value of the damaged property does  not exceed P1,000.00).', '2022-11-20 16:30:03', '2022-11-20 16:30:03'),
(329, 'Other mischiefs (If the value of the damaged property does not exceed  P1,000.00).', '2022-11-20 16:30:37', '2022-11-20 16:30:37'),
(338, 'Simple seduction.', '2022-11-20 16:30:49', '2022-11-20 16:30:49'),
(339, 'Acts of lasciviousness with the consent of the offended party.', '2022-11-20 16:30:59', '2022-11-20 16:30:59'),
(356, 'Threating to publish and offer to prevent such publication for compensation.', '2022-11-20 16:31:12', '2022-11-20 16:31:12'),
(357, 'Prohibiting publication of acts referred to in the course of official proceedings.', '2022-11-20 16:31:23', '2022-11-20 16:31:23'),
(363, 'Incriminating innocent persons.', '2022-11-20 16:31:36', '2022-11-20 16:31:36'),
(364, 'Intriguing against honor.', '2022-11-20 16:31:54', '2022-11-20 16:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_08_10_022413_create_user_type', 1),
(2, '2013_08_10_022430_create_personnel_position', 1),
(3, '2013_08_12_000439_create_storage', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_08_10_023008_create_sessions_table', 1),
(10, '2022_08_15_012049_create_kp_cases', 2),
(15, '2022_08_17_122428_create_person_signature', 4),
(17, '2022_08_14_040253_create_person', 6),
(18, '2022_08_15_012645_blotter_report', 7),
(19, '2022_08_15_014857_incident_case', 8),
(20, '2022_08_15_035824_create_case_involved', 9),
(21, '2022_08_17_123427_create_person_signature', 10),
(22, '2022_09_13_080406_create_notice_type', 11),
(23, '2022_09_13_080814_create_notices_table', 12),
(24, '2022_09_30_183721_create_witnesses', 13),
(25, '2022_09_31_232313_create_arbitration__awards_table', 14),
(26, '2022_10_03_222725_create_amicable_settlements_table', 14),
(27, '2022_10_03_223344_create_hearing_types_table', 14),
(28, '2022_10_03_223538_create_hearings_table', 14),
(29, '2022_10_03_230531_create_arbitration__agreements_table', 14),
(30, '2022_10_03_233020_create_hearing_notices_table', 14),
(31, '2022_10_03_233044_create_case_hearings_table', 14),
(32, '2022_10_16_212323_create_court_actions_table', 15),
(33, '2022_10_19_095417_add_status_to_users_table', 16),
(34, '2022_10_20_152259_create_activity_log_table', 17),
(35, '2022_10_20_152300_add_event_column_to_activity_log_table', 17),
(36, '2022_10_20_152301_add_batch_uuid_column_to_activity_log_table', 17),
(37, '2022_10_24_213215_create_reports_table', 18),
(38, '2022_10_26_230707_add_status_to_reports_table', 19),
(39, '2022_11_04_211713_add_test_to_reports_table', 20),
(40, '2022_11_09_122938_add_street_to_reports_table', 21),
(41, '2022_11_18_180454_create_contact_forms_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` bigint(20) UNSIGNED NOT NULL,
  `notified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `date_of_meeting` datetime DEFAULT NULL,
  `case_no` bigint(20) UNSIGNED DEFAULT NULL,
  `notice_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notified` tinyint(1) DEFAULT NULL,
  `date_filed` datetime DEFAULT NULL,
  `date_notified` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notice_type`
--

CREATE TABLE `notice_type` (
  `notice_type_id` bigint(20) UNSIGNED NOT NULL,
  `notice_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_type`
--

INSERT INTO `notice_type` (`notice_type_id`, `notice_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Hearing', '2022-09-13 08:46:39', '2022-09-13 08:46:39'),
(2, 'Summon', '2022-09-13 08:46:53', '2022-09-13 08:46:53'),
(3, 'Subpoena', '2022-09-13 08:47:06', '2022-09-13 08:47:06'),
(4, 'Pangkat Notice', '2022-09-13 08:47:33', '2022-09-13 08:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `salutation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `salutation`, `first_name`, `middle_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', 'OlY4sQuYMltuh1CoyNdwitBGAGs9Wawz5N9SXrY7cGk=', 'H7SeGDOb+sc0tIpmCz84bTYkG9/bbPgeAT/7m6DbY+M=', '6ycuRvlc4lfu37OQnUD5Wvvq3vRcGpthkEUh3Ivi6YI=', '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(2, 'Ms.', 'Qo+tQ71pFIv8cFV16G4M5rvYk1QpGbr6KdEuyjy0NBA=', 'b8hmMH2Ud1gfJL2g8OKLsRfVL6ZghCnALxV1TOUBXL8=', 'IqhburdG3pWie9Yyfpvl0r9uP8liVYbl0nsN5xfAQQU=', '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(3, 'Mr.', 'hZqfX0gjYl5nLLNdRPcamj90LYPv/9M0udWFggZC7b8=', 'YThiEyxghnzsWNl/Ctj63ptmpyPHuK/XGFGCuCcQu+M=', 'EaUp4MGEFVmVGQXzPAOHoHbzIyk69RI0GdXG/7ugTlY=', '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(4, 'Ms.', 'E4ZpnhkbkvGmDboGMOIAh2Oe7Jz/Pg4h8jvg2F/HFQg=', 'Vc+42Z5pR7PCSubJaNkYygogBseMQGp1cW1zH9UVgmQ=', 'ophietjAup5l9IsUrJG0oUuhb1YAi+cNsnVyqXvYrzE=', '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(5, 'Mr.', '/Q4qHGA1csMhDGwhs3c35rRweAmSUbgSlB0RnYumQXk=', 'mObjXCNcttLDtKdNWqA9owogBseMQGp1cW1zH9UVgmQ=', 'VOFuL2P48lRKakK1awOUKpxTV1C+ZbAq1uosL++SQUI=', '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(6, NULL, 'Ng5phIYX2K7PwHQAt+7frrvYk1QpGbr6KdEuyjy0NBA=', 'osu4TCmtPONFKgB7hVwQPehTjA4pCeU9yzOkDnmQLrw=', 'v9TMEG1zb8sx0XXZV8CQafiqt7GvVGJdnQNVKbjdmQE=', '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(7, 'Mr.', 'E4ZpnhkbkvGmDboGMOIAhyGBopBwvAf/ybx/Qq+xHMw=', 'yrWIJ1cv8lRbStl2Vr7lLwtPeMeLeWp3Vx3Q0CaHw1U=', 'rhUoSuaAUahwiUnddLVV9bvYk1QpGbr6KdEuyjy0NBA=', '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(8, 'Mr.', '+7bCv02gMKVByAUaIFIODL+x0uSklgsSQZXB7Nwx8SI=', '0xrIK3HaA8CUE5v5+2iFXkDgl3dtTc88V/6npf8OE7g=', '8TlUZH51fOkfmo+9LFtON3uWtZ4MiFt/jsvFeCQIEHE=', '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(9, 'Mr.', 'w1BEi4FcTnc/jVp3104Vy7G0hLYhXOeqxXhL9rQA7Jk=', '8TlUZH51fOkfmo+9LFtON3uWtZ4MiFt/jsvFeCQIEHE=', 'YThiEyxghnzsWNl/Ctj63ptmpyPHuK/XGFGCuCcQu+M=', '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(10, 'Mr.', 'C7ieDmcgWC0GkRAeXG7ffSziUn7Dq1nRB1tgA+5zUGc=', 'dXXD5rOOxNPDeENlmE30yVdAzfwQL6yFf96D1YKLUyc=', 'R7L/DcLj5bThR3N6t2U68xbZ30Q5sNCOz6ppl4/dr3Q=', '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(11, 'Ms.', '4ZITpyeFKQgXaG1DdZsR1P6P9aVnNbH9NxWq2A0hpb8=', 'cpJ3amh6a9T2u2FiiuyqKRJDKbfDjNqPpFtVGIcfcXY=', '+VILWtQxEYhVesOFaF7ES3Y7wZFWOeTXu30iEh99d2Q=', '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(12, 'Mr.', '+2u6x/iYW7FIwUwQLZJujZHxQQJvxJLgIdcde8fQ1EI=', '8TlUZH51fOkfmo+9LFtONz9wexAf6oNqSsoeKs4Epp0=', '6Q5fJtAfUrDeFA4cSLiADvn+MFZaT8SMo3HA3g9NzWo=', '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(13, 'Mr.', '7QViNWNOCfsC69vAMrlNRJlTW7LDQlzIflmGFBhRBvs=', 'gUlIumqO2qVfbROqdQW3mcqA613pgc3P5VB2qkmR2k0=', 'jbECHYXM8dnuN4A67sB7eRfnsA0p/BsMLt3u929bNDs=', '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(14, 'Ms.', '4RYqzkKifx2clJzRUYN/+oUvM9XKwdEp6QhXib8GPR8=', 'DONNs+/fTX/rfPuCt83FzTpvR5ItJXwLDRx2kReDKfw=', 'bC9t6y6nGdYG+Eq1pk8bFJyT6WO2Q5oUWhTTM2G+3d8=', '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(15, 'Mr.', 'SkPjIHi8fEX+srShGtBkUjqHH/VbUsXMc37qTFVJITc=', 'yk/R4nh5qOEOdWuHV7NfNDQdGT2HV9WlwsxiiDf54EA=', '3rsoIsXqfpitki3IJu7r1cv09cgyU0xMJDM0fi/RqU4=', '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(16, 'Mr.', '5FnpvM1p0EdlH2mIvM/jMvzvctloyXzmW4LhTkQiDM8=', 'IgiomyvQVA72JNjgRMTz/CEXj9GL7kC6XS21I5cTIes=', 'kRl7n7+TnHwezjaC8L8dcA2OebtPROw6s4cyux45XlQ=', '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(17, 'Mrs.', '9mtuRGZGBPHJsTm7Oy7j251azHPdTsHO0xDiInUsUVQ=', 'bbUsVa121lZcqOb8aRv/wEZGA7Eyk7iPTJ3/CqLfmAc=', 'zeozfBpcbO0JbbiIYQNs+NLlsKBuifq6ZACLbUyT/BQ=', '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(18, 'Mr.', 'Zwm66mc7ZzJMyNjwDnQ5vrMcm3qBtfbWE2YbtgV7lAU=', 'uxCqUGgq8ZlvR49K0th7p4xcMJ6YSFkZtMl9C1+TLrE=', '/dgNKU/39g8Twe6B5HgdrdfxkZhiSnFnCdLLqEZ1mOY=', '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(19, 'Mrs.', '/Q4qHGA1csMhDGwhs3c35iTkj6bRl4vj39tP0y38DpM=', 'EmViny8NutcNmTndvtb+zqxNzCs4JNz1fTYFxQ0pMI4=', 'SNOtCJtXwIvTZyKF2lEhpjAh07Rmdaomg5MS10+BkCw=', '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(20, 'Mr.', 'onnoC4PKeMAPukfkrp4Esr+x0uSklgsSQZXB7Nwx8SI=', 'T2HKEOmxtFu0W2xyeYc+R37tNnMIYjfzvAgrLO0/F+o=', 'eAuS8JmWsf3qWyab9rFWMHDbzw8b8ZE2eD1GpqhuGFc=', '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(21, 'Mr.', 'zYXFfOI3YcjESIvkWamvawyQ5EQUgYtSYiJWF+FceqM=', 'ol46Gg50V7+cempsRjRP2g==', 'T7cWVrxmdE1Dsmh1eZbLtZyT6WO2Q5oUWhTTM2G+3d8=', '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(22, 'Mrs.', 'r2Tf/aU/3lRIqIhkQZSSaUQjrNJ74zhh+IwIw5UQGaM=', 'yrWIJ1cv8lRbStl2Vr7lLwtPeMeLeWp3Vx3Q0CaHw1U=', '/dgNKU/39g8Twe6B5HgdrZ8DUaZz0LYB9PM7vxHDZ2A=', '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(23, 'Mr.', 'E4nPnFb5cT91k0RwfuOvqXx5qtYWX3t0vrmxLFN5Sl0=', 'RbY4DgyyfUo0vlMYpulenb+x0uSklgsSQZXB7Nwx8SI=', 'xEcPhy+s6tBtx+UJ21e/UpyT6WO2Q5oUWhTTM2G+3d8=', '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(24, 'Mr.', 'faqJTEYpeWX7dZ0m28PORjYn/Y6XjDcGng2xp+8OMrs=', 'gUlIumqO2qVfbROqdQW3mTYkG9/bbPgeAT/7m6DbY+M=', 'NagRP4CYrHxeXPaf77ODzvIcdMxWiajTTyc5Ryjy2w4=', '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(25, 'Mrs.', 'Iw0ZO24hbH8TuDjRIchuOM0LdYf2ZtrFLg3zHIIcfaA=', 'WKYwI683eqmydUph2KGrOQogBseMQGp1cW1zH9UVgmQ=', '3PPbrCboLBE4GuBXKOwfnhsm2AUgMGSJ/0/lIHa15jg=', '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(26, 'Mr.', 'rHhpvkPgOCBkKeCTH/0yNihQ2b8udSn68Nb37EjrdZw=', 'DKD8v9igYnd3ebLjPb6S8BO7Zn97iz28kgFREpQ4yKs=', '6ycuRvlc4lfu37OQnUD5Wvvq3vRcGpthkEUh3Ivi6YI=', '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(27, 'Mr.', 'r2Tf/aU/3lRIqIhkQZSSaUubEDy71QopRiFMu0AYeLc=', '8TlUZH51fOkfmo+9LFtON3uWtZ4MiFt/jsvFeCQIEHE=', 'CvqVjG5zd9ZouBuR0RCKBwHwTnvMixkTxWAlCGQoGvs=', '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(28, 'Mr.', 'faqJTEYpeWX7dZ0m28PORjYn/Y6XjDcGng2xp+8OMrs=', '8TlUZH51fOkfmo+9LFtON/tYml9I5r2F6AsBYp8ng2Q=', 'Fe/6WDiMBnFis+W1t9hdoHVc3cXuUHerkGNibcfLFgA=', '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(29, 'Mrs.', 'E4nPnFb5cT91k0RwfuOvqSd3mbR5cgmuS+VWjYddZ2Y=', 'gJaS9r+w5PhV8o/5N2L4TyaGQQ35f1smU6bA+F3OCdo=', 'E4ZpnhkbkvGmDboGMOIAh08pUGuwJ02YgpNxYnvdPjA=', '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(30, 'Mr.', 'sSNyPmKN3XIDtyRLp7RFkSIckIAesFVtN9syH6vatWw=', '4RPyPDLsS34sqC26HYD6G5dkIoWEWoOcCsnyR68FSFQ=', 't0rYmXi5cNhFkJuxV35PkTH0qsbKpKFbBzmSpKfDwwI=', '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(31, 'Mr.', 'E4ZpnhkbkvGmDboGMOIAh4r17RBhulm//reI6c5qycQ=', '2HO+UOHjroECQhstAbPcNsEWQ1iqwkNOHFy3UmlbkLw=', 'o5DtSRj2QUUlfkNejTjuL4lYD2WsAUjf8TMklt+b3E4=', '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(32, 'Mr.', 'wutuoi3y6WwnTPP6JWHF57UonBgChR0N/551PkI7JjA=', 'S9uKwnPIuiCPYmmz60iHq3Vc3cXuUHerkGNibcfLFgA=', 'y21cMJbM73wVmmgQYPJvXb+x0uSklgsSQZXB7Nwx8SI=', '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(33, 'Mrs.', 'RyxQ6GNo83I4wOFLlZk0CWe6JXVf1dYOHniDNC80U0E=', 'RM1ZSYcaSDsBbKK6Vy5oZzYkG9/bbPgeAT/7m6DbY+M=', 'AyVyBrekuLyLgx/WCS3Sf/2qIJ6oi7BceB1crFFwnwo=', '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(34, 'Mrs.', 'AFZtWbYRQQSTP2fM8TqbUkhC9zdjaTIFEee9bcYl6hY=', 'yrWIJ1cv8lRbStl2Vr7lLwtPeMeLeWp3Vx3Q0CaHw1U=', '0xrIK3HaA8CUE5v5+2iFXkDgl3dtTc88V/6npf8OE7g=', '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(35, 'Mr.', 'xuo27gijNAcS+51GknuqkatdftM2ZQ0Mei9QuzAOrhY=', 'wc5t0uV3F0rSreqeKPK5Qd62CdfWvS4iP5keFUB6IFk=', 'yTrm1RY0I2YF03wd88dfeCj2jijfozLVRYPygyT1qSU=', '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(36, 'Mr.', '8TlUZH51fOkfmo+9LFtON2irnSdHu50UDLx79q6cYjQ=', 'hX8Jmj7Gyv+piC5EHo/68/vq3vRcGpthkEUh3Ivi6YI=', 'PCnCyjS2ByzRFHsg8IColeQQZ9Ltu1j4K7RWXIwfuks=', '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(37, 'Mr.', 'vDU2TtpicG1zjDPa9j50jr+x0uSklgsSQZXB7Nwx8SI=', '6ycuRvlc4lfu37OQnUD5Wq9hol49E1W0/7x/Un5r4ek=', 'Pyi4oR/dIpjDRGWrCRpu1RO7Zn97iz28kgFREpQ4yKs=', '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(38, 'Mr.', '59gg+Y6BxcYSDqJ7yZRU42hVbMNQv8E9htOvhY3w9nM=', '8TlUZH51fOkfmo+9LFtON1CckrYiHbsNlcZJ8EW2YB4=', '3RHhGYceBnNx9zp8kg7WgTyomgSZqsaAttqo2FUCf+w=', '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(39, 'Mr.', 'Z1gUVlncQMT5tKFKUGlu3K9hol49E1W0/7x/Un5r4ek=', '+2u6x/iYW7FIwUwQLZJujd9ehap14rUs79gl8R5sqYY=', 'IF/pb1UpKyLB7WIqOXsYBVVsSKHw/fkokh62XJxK4Wg=', '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(40, 'Mr.', 'E4ZpnhkbkvGmDboGMOIAh/IcdMxWiajTTyc5Ryjy2w4=', 'KLXiHJuXhtyQt6OY38SdHvoyOYSK817LNviQKu4Diuo=', 'ZIF2SYlicsi2pzzIN8qjW0rdZ4feqyKzHtyjCkaAzB0=', '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(41, 'Mr.', 'OlY4sQuYMltuh1CoyNdwitBGAGs9Wawz5N9SXrY7cGk=', 'BusfXsUrX6hMIbqrHyY0eH0FtfiOwQIsrc3gjs7CSao=', '6ycuRvlc4lfu37OQnUD5Wvvq3vRcGpthkEUh3Ivi6YI=', '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(42, 'Ms.', 'vDU2TtpicG1zjDPa9j50jhLxsu9f3bqSH37G8PjaJNA=', 'H7SeGDOb+sc0tIpmCz84bYh3w8Ti/8Z0JI3z6qjEpJE=', 'BlRxQ9Hk9IK4+HFAOdM52LdeUVDQ9nVhnHbKldqnrRU=', '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(43, 'Ms.', 'xt4qwiYHYzqc+LT2I82WkG896SFRSzHiWCKC5BWDBas=', 'yDkcR7CBtXk0kN4msxotel75q4GqcueOYY7DpvcUyNI=', '261VdZfR18W8TASSh2eVAZjbP7VTS2koNT+vPBrc8PI=', '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(44, 'Mr.', '+7bCv02gMKVByAUaIFIODL+x0uSklgsSQZXB7Nwx8SI=', '7w2oCEYH24IZQJXHY6F/ebcEYmT4of+uiIQvmj7CTDw=', 'IqhburdG3pWie9Yyfpvl0r9uP8liVYbl0nsN5xfAQQU=', '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(45, 'Mr.', 'OlY4sQuYMltuh1CoyNdwitBGAGs9Wawz5N9SXrY7cGk=', 'RM1ZSYcaSDsBbKK6Vy5oZzYkG9/bbPgeAT/7m6DbY+M=', '6ycuRvlc4lfu37OQnUD5Wvvq3vRcGpthkEUh3Ivi6YI=', '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(46, 'Mrs.', 'Qo+tQ71pFIv8cFV16G4M5rvYk1QpGbr6KdEuyjy0NBA=', 'BhgpPv/I1DiscO+Ejeuv/Sk3LIW5zu12TBovGy4bFl8=', '21zZSYC1BlWvUFmDXuEpyEvGcKDlUpijxOlQkKzPsDQ=', '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(47, 'Ms.', 'fnyv5uryIme2IcBGvK+VnL+x0uSklgsSQZXB7Nwx8SI=', '1vp2q0xnx5RttltN+OZbIXVc3cXuUHerkGNibcfLFgA=', 'PRmBPw7+qyOxussfFjj/ozYkG9/bbPgeAT/7m6DbY+M=', '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(48, 'Mr.', 'ljsne4/vnEnfAmW7Hu78q52AGvk3sEFj1/+poQIGqrs=', 'uNP4STL5q8eXUJ2QG6odu4DIoIrsMp3vHL3Mn6snEs8=', 'G8JjrkToRvGlvwdyd9ziUVyFBGI37q6v2FNeLI/GICA=', '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(49, 'Mr.', 'C7ieDmcgWC0GkRAeXG7ffWDclL2VBeUpJ/7iO+ncUKw=', '0XADmRvrA2zCnTc6/rItyZW9y5ecKxFp6cq99l8Ase0=', 'p2kxKU5iqETc2Sz1OOywiTRZ5OPEulsTKiLasy/n1Gs=', '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(50, 'Mr.', 'JMwoV+ALt0iyW6IpitEOvr+x0uSklgsSQZXB7Nwx8SI=', 'hX8Jmj7Gyv+piC5EHo/68/vq3vRcGpthkEUh3Ivi6YI=', 'LocBISDUdJrU2HNZlM5eB5yT6WO2Q5oUWhTTM2G+3d8=', '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(51, 'Ms.', 'xTh5WU8WytPAIXLA2inss09okeFr8ZJE4vMbOXedVKI=', 'MdRW/YkvzDOOoxIdBmCQyldJxDpZGAaa2iLcL48OpAA=', 'wNMv5yLeocYBp8A8zTRfSGnGzuVgIJRcuxRtbfc4Hao=', '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(52, 'Mr.', 'T7cWVrxmdE1Dsmh1eZbLtQOkxtnC1hepw0kS05ikYe4=', 'T7cWVrxmdE1Dsmh1eZbLtQOkxtnC1hepw0kS05ikYe4=', 'T7cWVrxmdE1Dsmh1eZbLtQOkxtnC1hepw0kS05ikYe4=', '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(53, 'Ms.', 'BlRxQ9Hk9IK4+HFAOdM52NBGAGs9Wawz5N9SXrY7cGk=', 'RM1ZSYcaSDsBbKK6Vy5oZzYkG9/bbPgeAT/7m6DbY+M=', 'l/8m+aBF20rcJFBbLL6T5UwmTLe8YFentj719nH7Vy8=', '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(54, 'Mr.', 'A9QRKlTWuZl/5gT+BkeKI3ckhJ/iFW5zAXIaEeanhqA=', 'S9uKwnPIuiCPYmmz60iHq3Vc3cXuUHerkGNibcfLFgA=', 'PCnCyjS2ByzRFHsg8IColeQQZ9Ltu1j4K7RWXIwfuks=', '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(55, 'Mr.', 'i41/e/V31j63L3ywXR+6oBoMjPyxtfJF1DpJOrwRR54=', '1IVSWfWly63PvJ+2Tjqu2e6UlAteJ9Cl4LLTGJl+owE=', 'FUxexA9F+8eea72PeyCQ2DK0b9SmLrw0pBcSTZ9+lXo=', '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(56, 'Mr.', 'T7cWVrxmdE1Dsmh1eZbLtQOkxtnC1hepw0kS05ikYe4=', 'T7cWVrxmdE1Dsmh1eZbLtQOkxtnC1hepw0kS05ikYe4=', 'T7cWVrxmdE1Dsmh1eZbLtQOkxtnC1hepw0kS05ikYe4=', '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(57, 'Mr.', '+7bCv02gMKVByAUaIFIODL+x0uSklgsSQZXB7Nwx8SI=', 'WzOlJHMwK3vxc8K0gPTcvNwhr0P1Ji1OawcxTQA2Pps=', 'UrKW06RyHvSLp+0mBnwcMQTMeBvFO4jQP4zm+hKtiVE=', '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(58, 'Mr.', '/skQh9r0gXUH4gMSIokDetBGAGs9Wawz5N9SXrY7cGk=', 'XzLGVpOi2EoDFdlXi3RGXILrv/a5SWuH1dDrJ6ZVdU8=', 'HQBveaD/ydtnkoAkomHxD3bUKaWgfJ3j7J4yrZ5MxxQ=', '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(59, 'Ms.', 'vxVoYceieyVjQK6pdKkZotBGAGs9Wawz5N9SXrY7cGk=', '2FE1hzCCxUtcUdZkdA2tqWy4k35M/EWni6eUEh8r/hE=', '+JhFv3Ew2+xidG4LKLF/svfQwwQB9tc6mdlANn292sM=', '2022-11-20 17:04:46', '2022-11-20 17:04:46'),
(60, 'Ms.', 'AFZtWbYRQQSTP2fM8TqbUkhC9zdjaTIFEee9bcYl6hY=', 'KLXiHJuXhtyQt6OY38SdHvoyOYSK817LNviQKu4Diuo=', 'bC9t6y6nGdYG+Eq1pk8bFJyT6WO2Q5oUWhTTM2G+3d8=', '2022-11-20 17:04:46', '2022-11-20 17:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_position`
--

CREATE TABLE `personnel_position` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personnel_position`
--

INSERT INTO `personnel_position` (`id`, `position_name`, `created_at`, `updated_at`) VALUES
(1, 'Punong Barangay', '2022-08-12 01:24:16', '2022-08-12 01:24:16'),
(2, 'Secretary', '2022-08-12 01:24:31', '2022-08-12 01:24:31'),
(3, 'Sangguniang Barangay Member', '2022-08-12 01:24:41', '2022-08-12 01:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `person_signature`
--

CREATE TABLE `person_signature` (
  `file_id` bigint(20) UNSIGNED NOT NULL,
  `file_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `person_signature`
--

INSERT INTO `person_signature` (`file_id`, `file_address`, `person_id`, `created_at`, `updated_at`) VALUES
(1, '1668961080.png', 1, '2022-11-20 16:18:00', '2022-11-20 16:18:00'),
(2, '1668961199.png', 3, '2022-11-20 16:19:59', '2022-11-20 16:19:59'),
(3, '1668961263.png', 5, '2022-11-20 16:21:03', '2022-11-20 16:21:03'),
(4, '1668962060.png', 7, '2022-11-20 16:34:20', '2022-11-20 16:34:20'),
(5, '1668962122.png', 9, '2022-11-20 16:35:22', '2022-11-20 16:35:22'),
(6, '1668962185.png', 11, '2022-11-20 16:36:25', '2022-11-20 16:36:25'),
(7, '1668962244.png', 13, '2022-11-20 16:37:24', '2022-11-20 16:37:24'),
(8, '1668962315.png', 15, '2022-11-20 16:38:35', '2022-11-20 16:38:35'),
(9, '1668962385.png', 17, '2022-11-20 16:39:45', '2022-11-20 16:39:45'),
(10, '1668962482.png', 19, '2022-11-20 16:41:22', '2022-11-20 16:41:22'),
(11, '1668962564.png', 21, '2022-11-20 16:42:44', '2022-11-20 16:42:44'),
(12, '1668962617.png', 23, '2022-11-20 16:43:37', '2022-11-20 16:43:37'),
(13, '1668962680.png', 25, '2022-11-20 16:44:40', '2022-11-20 16:44:40'),
(14, '1668962745.png', 27, '2022-11-20 16:45:45', '2022-11-20 16:45:45'),
(15, '1668962823.png', 29, '2022-11-20 16:47:03', '2022-11-20 16:47:03'),
(16, '1668962903.png', 31, '2022-11-20 16:48:23', '2022-11-20 16:48:23'),
(17, '1668962970.png', 33, '2022-11-20 16:49:30', '2022-11-20 16:49:30'),
(18, '1668963046.png', 35, '2022-11-20 16:50:46', '2022-11-20 16:50:46'),
(19, '1668963108.png', 37, '2022-11-20 16:51:48', '2022-11-20 16:51:48'),
(20, '1668963175.png', 39, '2022-11-20 16:52:55', '2022-11-20 16:52:55'),
(21, '1668963267.png', 41, '2022-11-20 16:54:27', '2022-11-20 16:54:27'),
(22, '1668963339.png', 43, '2022-11-20 16:55:39', '2022-11-20 16:55:39'),
(23, '1668963401.png', 45, '2022-11-20 16:56:41', '2022-11-20 16:56:41'),
(24, '1668963461.png', 47, '2022-11-20 16:57:41', '2022-11-20 16:57:41'),
(25, '1668963541.png', 49, '2022-11-20 16:59:01', '2022-11-20 16:59:01'),
(26, '1668963632.png', 51, '2022-11-20 17:00:32', '2022-11-20 17:00:32'),
(27, '1668963698.png', 53, '2022-11-20 17:01:38', '2022-11-20 17:01:38'),
(28, '1668963756.png', 55, '2022-11-20 17:02:36', '2022-11-20 17:02:36'),
(29, '1668963818.png', 57, '2022-11-20 17:03:38', '2022-11-20 17:03:38'),
(30, '1668963886.png', 59, '2022-11-20 17:04:46', '2022-11-20 17:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_of_incident` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `narrative` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date_of_incident`, `type`, `street`, `location`, `persons`, `narrative`, `created_at`, `updated_at`, `remarks`, `status`) VALUES
(1, '2022-11-21 00:00:00', 'uyngXFPNew3J0OCMehESZBCG6ydaMGuFmXmKnOdbX8A=', 'Arlegui St.', '6Ea7j8ZiJhlL8b2CSz5InL/uWRz+Fo5e9W7qwcs1XuWIS94HDG69g8HKCTOsTPDQ', '+2u6x/iYW7FIwUwQLZJujfznC/PncKUzhDNA5cfMS63/CcW+Q3rQ1V3/vJ0Czrbp710Q6NEN8KToJZk3g9tiN13E6igqJR0vKWj/dQnKJMrHs7wvDipLGX5R4VZAJbDo', '+i2+qSoicLd69ELZ6K1KyMIoGqqRDc+8l4sW/STcfqc1pFesZRv50+83LcZqlqvnUBnnUlpu/470e/O7z/ehjKIedPjQWtCR5sAueLiOhpkVOJLhkS61C7mUMDLr9TSIZBGaygqdPkvbWlYipdCJ4EiA7zkY9+WLjh9qYnHPgIZ66w4fHezzJvRwF5+EfBvCm5wS6NuvX+3lra9Y/aIxxrtBJQJYKD/a5KA+XcgmdZ0PLQsSbQ3nOmVH9qe5+xgqsaOzdpxXBVoWr66plYY3ebNYOcdG485dhhRCTbogYca/5iynTPBfUM5weY21IrIO4uq+JhpQH86ugblKWdzkM7pLuh9gNnmvcFfQzFeytHk=', '2022-11-18 16:00:00', '2022-11-19 08:45:00', NULL, 'PENDING'),
(2, '2022-02-11 00:00:00', 'uyngXFPNew3J0OCMehESZBCG6ydaMGuFmXmKnOdbX8A=', 'Arlegui St.', 'jaDb21UU5o9q8uTucfKXZdGAAssw5euMjYSnYN7iYyjQUBtDu1UobjVkQQ0VzrY04wDqsFAhz5C1yxcp8gkm2gORBWHrzoq6OHjn6fu2OkE=', 'E4ZpnhkbkvGmDboGMOIAh7jFfmPobOFxddcfEeEg9TsRNQqYtimbLes1p0qCHXFyGzDhn5djifYBaqYjCsIbNZBto8yCAfbqL/QXHOgagQFvU9lwYca7LDWIf0OC0y3+zr+veFAdm/90LZHuKclbDlusMAvSD0IzimqSzKQ+M2brERHmAIPfQDRwSW8ZaOfp', '6YVPY7X4XVVGQ18Y9UyJdKYa5kgsLfQ8mbXxE2EI9MmODX1ngGsjrG16bmZynaxGiMV2txGXJKdl4Br5yclUfzqKT1m0Mb49AplOzcz7MAzxBgBiDptvJJZfoxrtBqXK2Ec5fJFbil8huhEmSIMxgH9y8bCCQoPaPo1FGpQbwZJDBOE2ebCdoxilfFzofmq1ZBGaygqdPkvbWlYipdCJ4HF6yygji9tAYn+CubYfJ7SH1JPbvQwWiiHiM6vatpIMsZ3Pnn6xM+nyHeS4HXI3ls47CMqhax3yuocuCAL/PP+efl7ODQEAjwX2rWdYMrLIdHF+qh2sUHTOZFYmndMyCC5jcAMJnb3uJdPOjVeQdAc9JM7ZAfILoBjaE0DM7DNFii+3gG8yLvbma3xMTEEyW3JaZBal4aSIh8F5HL51hp/lmZetPAgq7n9Xz0i/lY1c54QlKw7vifraDftThAhDg0bMkaaj2Tgs2w6WnR0YiLTwF78zNstFphZ56HHu+Am0coY4UDcWWFX2wW4PiCUAkT0GwCvMvVJvd5QCtAb8/bPQrwNjRKv+euSCUg91WO9N', '2022-11-18 16:00:00', '2022-11-19 08:47:56', NULL, 'PENDING'),
(3, '2022-03-01 00:00:00', 'IexTBamxYFXOMbc3B1tOUWqjvmsBGhRg6FwWm27zAAI=', 'Arlegui St.', '4n0Ntlnbmb0ddkIf3xb0C7/uWRz+Fo5e9W7qwcs1XuWIS94HDG69g8HKCTOsTPDQ', 'DhTwE8nVpqYAapTeU9zVItR+iU9eTs3j+k4Yh7h0HLqWOF9H6rBsWkNEGCmtBblcnmTPGnf5kNxNf3zWZb1RoODryZOeeJiedKGIW8e/HcQ=', 'KQxwDMdg5Ypa5E0zzTvIICGbZb+sSQ8kmpbamISvSeRLae+wvDFNR8NSsFt3XELMp5liMsfv30+vGduJSOnchHM0sf1MTCnHMbngUxhNhdY0ETipl2uPafEqzjRB9RnZnqCxu2Ct2YFnOV6ud+zNMe66r4ILTxMqqshTp/8JPYlWklWqZYgo75TdDF0mI2yhf2LCN/1ZTOwM5/+IPRMwMvK+bcaRAVUVWr/8JS7drZmuizw0HcHcOEOgh0Ege8+A/FG+knEG7PYpAxVAW/6FJfFX29nz4cibQCDDUOQSvKnxCQQ6YGe0zCPPJkvImG9asAHwk6ueMRkzKD05mTprXg==', '2022-11-18 16:00:00', '2022-11-19 08:48:56', NULL, 'PENDING'),
(4, '2022-03-17 00:00:00', 'IexTBamxYFXOMbc3B1tOUWqjvmsBGhRg6FwWm27zAAI=', 'Arlegui St.', 'u8L1/hbc7mGRbESkb2eg9L/uWRz+Fo5e9W7qwcs1XuWIS94HDG69g8HKCTOsTPDQ', 'OyBqJqAZ+anmJJ2eDfqqx7T8U8oKPGLkGqAj5NWCyJVCVU4Gfz0G7MifZNDeLnThxH379Jnjqd//YoH3ltusu7vYk1QpGbr6KdEuyjy0NBA=', 'SNOtCJtXwIvTZyKF2lEhpgX5RFVMJcV7VOHWi1jyz03P17qvNV/b3uqJhTab3IOET64cUIdgn3kaVyNMdfw7RMnkezU0PTx00BWpnYZRgkqBdqU7Ma0FQ9Ztxcgl5p8spcGSQxcaVgzxNNvlFBG64kcldYCT7DodP0QluG0UypOcg0Fz1wb3SzJN12nzilBEYfq7DShOIvAc5eFkOIH1zyd+mSe2Zgx4919kZRJuAa0ICxWL1ajz2Wu57PgjoQ8JIiwCHrh830gq8zDZfnDHB7EPu/kxj2zQESWxZBvO5DHFaXQhVJH3Ov7psWAv5QdyzKTHckotK85V7AaLZ4DIbW6NtPTwVr/SoDAYDNVg9IkPpsBxK6qTv3OMKIXdKinjuhz04l27Q4fHUWDQWDr3S+7j9B9gfgjOsNQaMGwHblE=', '2022-11-18 16:00:00', '2022-11-19 08:49:38', NULL, 'PENDING'),
(5, '2022-08-01 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Arlegui St.', 'i7idY/Ch8BxrLVeHUd2Bo7/uWRz+Fo5e9W7qwcs1XuWIS94HDG69g8HKCTOsTPDQ', '7QJ7ZAwIEi5bFIkw3pD3vMMisCsYj7aEcKxbfoJQZY1YtphphGLZFpV+AOujFVJfM1fhBo1IWMqk4QUoxYWTL9NvmNOTT4jickr6p/gN9Gw=', '6YVPY7X4XVVGQ18Y9UyJdPgcg91oAOjo4C6UZKDLqal2ReYtvd50C+S6fFtsJTSjil42uxoyu4ZGp3Uhm1EzkoM4cWIwTG3rWz31TSLUWKYnHArq1KeIMKySGun4ZiV3Wc76P4tsaPX6fN0HxYQUliENwWaeWpR29E+htMpn4ZLP8qQT5JmhdAVzeM7iB1RAuQNXq6SjyRDu+pJ7lPYjuMxb8CCml+UqSQe62ewbngewnX/UBKJjBWKwDsBiBAuc5mw5rbqbzY56RORWY5ejaI8jDtF0iR+RbLFuYVSmXzF98P4A/s2Y+QbSGpXsWPdlYT1OALJ7rFWyvrt6G+7G4yIS0RdFmSg1ITo3oGHSpEduzsKbsck1udEnDGN52J5O', '2022-11-18 16:00:00', '2022-11-19 08:51:59', NULL, 'PENDING'),
(6, '2022-03-26 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Arlegui St.', 'AcqGEpdyamFN5uSoZLqssL/uWRz+Fo5e9W7qwcs1XuWIS94HDG69g8HKCTOsTPDQ', 'EaUp4MGEFVmVGQXzPAOHoO8JtnOmb7zIudbHwURPMHm0KiX7NA0dxXtJrrSTbK4eXe6zvI8g8pvDKMcoAeRidyKGwxafz8oyFlgw8A2k32M=', 'SNOtCJtXwIvTZyKF2lEhptjXt03qGKUuOj1e1aXAuSC1bz7I1X3fksaki0sjkD7rRNGlQ/syRSA48OMx9vZCBV+xP5OE0a7aUzqZvrtfNR4Z3IcYCqASO7QSFL+i2RQvkDE76SRnFsiqXk8YAbLhc281GuiZRWJHeF2sjaTrFpcLsh/iQDRsojseRcTf7yKKfabq+t3EPy03mHjMbETz69eCz+OBrf4nPPgYrpbXq4Qpw1dRLE4X53ijxYHWzjoDA3j23cB3h4GAkFzR4c5jj4YQfLg6Zz4pkoBFED4Rpcg=', '2022-11-18 16:00:00', '2022-11-19 08:54:49', NULL, 'PENDING'),
(7, '2022-01-01 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Arlegui St.', '/St8CFmpIOpVHYpGVEM8aL/uWRz+Fo5e9W7qwcs1XuWIS94HDG69g8HKCTOsTPDQ', 'Z1gUVlncQMT5tKFKUGlu3KIFEDf21HOLSy0lgyWv9tLE2CQrB0AfKRwRXxu1svpIJZq38sdIRUtBfSTw+9iRoA==', 'tSt/AB8utKXwH2ge/S0Nn38sxs+L5qKtgLqPKvHSi7dsbg6KOecT2KpFRBk7YhmoYgk68SzPoKiP5gD3HrNBBhkoUXiRt5Gb+5Ke295yu9whF17CwSu4Ql6UqTwjjb4PM65uuJauxkW6/g4IDsfJMXZwXo7vBg/pW9Tm++VDVQEfEkNbeUwBjVNS0INiUNILXm13a7YZOLtIzM60RYZCVkG5HUxk3j74KscCws1whRp7Zrxrpc+1fRazN4uesusJsx11dyKo6ZSxsJ3bG9dCN+DfTM6PbnAx8nzTwEk4xJJu5rJTAH7YtPJMfumslxtZ00gkkqSYOpfzmPt1PvalescjIpCD5Al0nD5qUD5SODt3LTjzPmV2E5gi2UEsxKN1IpR4wihL7Yl29ygfnFsktlUBQOw/qdaNoaIPngMEhJgZAR1Fgo0NNqiq/ArLVd9i7z2qO4wWF15QPrbNlTuTdTV3rV+iqeYBuEkDuHpf6qU=', '2022-11-18 16:00:00', '2022-11-19 08:55:25', NULL, 'PENDING'),
(8, '2022-05-24 00:00:00', 'AmAKrHMRv5bRGhbXfJl2JgeZPKIPb7C5ce62+jnexGc=', 'Castillejos St.', 'AXXpVLkUBSrBOpkgU2aD8hAszT/FSiMISBtrIdvekbCRQ7jLsiEKRpTr5DkJYoNuu9iTVCkZuvop0S7KPLQ0EA==', 'qVm0keSE1abolw7zIxxcdxU1FhLycm8p0L4lJ3TGBC/ejYO8GDJ/4JzmIK/oVQwj2aLuDbaA2Ux5Z4jD0bsVRFlcGRBHtB7i75Vg1XEqx4M=', 'H7SeGDOb+sc0tIpmCz84be5EH+Ojnv2MqgbjUSxU5JUq4QPfThoHnVLSq3W9pRyh/NEMACjjaKCaR7d80NtIgmoifEflqY//2AcYMN+/vzymXdnMMFjlxse7p7BLjxLLH7EdiAMZauCl3WEUR2YPJHHlLbFpjLwJtlRYLvSATKU3KCAYcjroWgGX95IldLLQYyIA+8ZYGWCjyugn57kskw==', '2022-11-18 16:00:00', '2022-11-19 08:56:03', NULL, 'PENDING'),
(9, '2022-09-30 00:00:00', 'AmAKrHMRv5bRGhbXfJl2JgeZPKIPb7C5ce62+jnexGc=', 'Castillejos St.', 'BPUaoYrQpn+pwYuZfs4hjBAszT/FSiMISBtrIdvekbCRQ7jLsiEKRpTr5DkJYoNuu9iTVCkZuvop0S7KPLQ0EA==', '+VILWtQxEYhVesOFaF7ES2b1uVHkqDcku5oBRGZXBRgar0qsrTyrMp3y+6W/BPkRaqDPGx3OUC85jXQjR5+BWdNvmNOTT4jickr6p/gN9Gw=', '6YVPY7X4XVVGQ18Y9UyJdMjKEMwjGRbTsNB1sFkzEqHujjqaxnh60ffA9hQ3FUqHaVkixYyaKv2B+A5x5HcnQI/ZCMHUXv8tN49e10cn3nZeU69XdUgjnq3uTPFDXqYYL+uUd9wMXenWPlRCfvMEwWlQaftmlw0SdQHcCVmnd2ZVyVk4OBF/tlz6066KrKbq', '2022-11-18 16:00:00', '2022-11-19 08:56:57', NULL, 'PENDING'),
(10, '2022-11-12 00:00:00', 'AmAKrHMRv5bRGhbXfJl2JgeZPKIPb7C5ce62+jnexGc=', 'Castillejos St.', '5mjWtGIZCWttQoVkvye6tBZShrU+rjrOk4q8LsLQvF0Tw7SihHMGx08hOIgWp/9t', 'qjI0EZhp8SBMy9DDJUTubtqK7fZniqKLEnah/x3xBX4Dg13UtlrMZm6ZpaHHJbJrJ23vytGdqptlHch4j/lOi9q1IFbOg02jpfpBcgyr6m8=', 'H7SeGDOb+sc0tIpmCz84bTV0Ys8QyOzi/g0aW/qnGVGDsFjL0JI0depdH9NrLD9TGj+AGXrfhqrwMVouAQdw+Tfg0imvzZHQAW6g+GeddVN53uumN7oAzZJO1Giz4loY4QCcXq5uDnCHNGQftzFcUrtfIU1jdfi9SWvBNUiAV5U5yMFcq+amRNie7nEhVI/+', '2022-11-18 16:00:00', '2022-11-19 08:57:21', NULL, 'PENDING'),
(11, '2022-02-16 00:00:00', 'IexTBamxYFXOMbc3B1tOUQSjm2oANiROUZSQKNFadqG72JNUKRm6+inRLso8tDQQ', 'Castillejos St.', '00Zmj/MGEdSxPnFmB8xnmxZShrU+rjrOk4q8LsLQvF0Tw7SihHMGx08hOIgWp/9t', 'F4ZUaS2CtMkQZq6BMbYKP/iEkRM67JKBsc6J2FxyKw61aKbuJxR7U4bgLInCZcv0LFcRjtoYznrLoUm6lhdZxsD+HVeTueuWg4MTwn5qZ1A=', 'M96/CEnQcg9rGfrdtpSWuooFdpTrvaikRT9Bm2CCk13vIKjww73sAOl0IoABlQd3ZZ5fCwcYdIRz+mJ52ReRqPnKPozXzYpX3mkRg/GGMJsKeQ1izbYj0hTDfY807g0QW8vlO9n80klZ7MmmbbKU2gnNDh5qVF3I3xidA3c5b7yV7fFnX69yyVpBuDMdhHQj', '2022-11-18 16:00:00', '2022-11-19 08:57:53', NULL, 'PENDING'),
(12, '2022-06-23 00:00:00', 'IexTBamxYFXOMbc3B1tOUQSjm2oANiROUZSQKNFadqG72JNUKRm6+inRLso8tDQQ', 'Castillejos St.', '+f9c39nPptBJ0ke7fqWO2xZShrU+rjrOk4q8LsLQvF0Tw7SihHMGx08hOIgWp/9t', 'QznSQFeNwyc4Jv8cK9cztI2qF92ThTtCv4zd284B6Mp1ijOVrXs4Ka9vbCGWiQS+g0UPnz84y/O6y4IsyruQKBld25xJtr4Yqf2NCz0Xk/M=', '0XADmRvrA2zCnTc6/rItyZRCubnCjCpmQNzFdsWt/4GbIhyhyECf8t4fLLk9hT147q+i8rPzJgCpviHcyaCEXY0UWJiw7mJQTcCzvqNBvRhh+wOs9a1ZP8Q6PtChlXZD3i43NrvxzG33BjQKXvjNPleDq72kq6BQZujk982korXFCv+2W+fHu9ph9V79vq0Au9iTVCkZuvop0S7KPLQ0EA==', '2022-11-18 16:00:00', '2022-11-19 08:58:35', NULL, 'PENDING'),
(13, '2022-07-30 00:00:00', 'IexTBamxYFXOMbc3B1tOUQSjm2oANiROUZSQKNFadqG72JNUKRm6+inRLso8tDQQ', 'Castillejos St.', 'sCDw21rNqawqnhts2x9yuBAszT/FSiMISBtrIdvekbCRQ7jLsiEKRpTr5DkJYoNuu9iTVCkZuvop0S7KPLQ0EA==', 'la/hSCjNdzMlRmsGVIteIYISRe2arU4dFelSwHvQjo/mvBo1oyuVTUSQ3DGeAK9aT5e8fk27aQ377UjCBROfcyKGwxafz8oyFlgw8A2k32M=', 'WzOlJHMwK3vxc8K0gPTcvM8JRjvBBzfX076cOj20RBiHNHROj/FMYmmyoClVtBYC2WbfeMPZLQNU+PBL7+Ru182Rj01tcUseFu4zPLuQ5Wb/81aElcftCf57LTE+9EBMogAPjdXvlgBjmyzM6ffcs+IApTxRLPzkM1z8JQOXFcbGTnTaYU2yg6cNRAwBs4JNZaHlWWhO3oetliZCgFrkJmOi/Y4mdnTQt8Zxko5LOC0YlTXgqCNm55+fbrzsosR6Jk+9xhvW0w7DUp3Zg/Urjw==', '2022-11-18 16:00:00', '2022-11-19 08:59:06', NULL, 'PENDING'),
(14, '2022-08-19 00:00:00', 'rPLgCJZYDhWbvZhimib0zhVuxK3Dt20zGoZ/WSuFZKc=', 'Castillejos St.', 'nweJgeoqzhpO3/yIOKvh+xAszT/FSiMISBtrIdvekbCRQ7jLsiEKRpTr5DkJYoNuu9iTVCkZuvop0S7KPLQ0EA==', 'up4HgwV8TMa/LodfFYts47VnfbvF7swZHXciI/7Kzt++TMrsnyySQ33riBGN5+BSEFNUGHYjYUkgspuoTuEi82wM+KMnViyR/ezAawCALkI=', '6BC8w67m3H62DzbbeMAkXlvsKuHa6qSz1SPhxeNNzBI5KQEDO5ju5YRihkvWQcmbESKsTnSUyyOyG/qGWO+BXpA+uiiqJW9scg6QGDj93eJ1hwtrjivhMP4Zz0U79Nj/A6qpS/Ab1B8IrbQcjmrasude2sdbCfVa8OvjRxqeNEOdnu3jw6maNJFoZzFIKDgVoaLgvU8GbQQ3zTXVWislLXnzcxRMwpFYLIBtx0hTB3Q28+Tj/+ZvrZNX5kvBAA/IAYfAWRVwJuWnZ5bwTDA5mQ==', '2022-11-18 16:00:00', '2022-11-19 08:59:33', NULL, 'PENDING'),
(15, '2022-06-10 00:00:00', 'rPLgCJZYDhWbvZhimib0zhVuxK3Dt20zGoZ/WSuFZKc=', 'Duque St.', '66kYZeUd2DrAgaJDHW6cBfg0QHXW/FtM5nslvZPDTHrWuzPPB4bShAInrKvpDOAU', 'F4ZUaS2CtMkQZq6BMbYKP/iEkRM67JKBsc6J2FxyKw61aKbuJxR7U4bgLInCZcv0LFcRjtoYznrLoUm6lhdZxsD+HVeTueuWg4MTwn5qZ1A=', 'DzPwiluDF3HGu84cYDBV0klx2cu1jmMQpZh29GNfhO4wRkJ8qD6+CGS++uZdnMS3m3eXxfDTTozwGtvfSmxj8ZK6WdTHmrkMJbIUI93TYwcN1jFsmAQZwwrfiKfPVMHa/BVaeRbp6NzTKPU4vGt5xcZTxiIBDmSU5+WrRKT9rbdMCiQFWR78pXDBLyvAXe3UqBdCrttSqBUXKoZMyGI3KoxXPo74bJLDnwM0++FU2kGMHU1cOaBYg7SsWSW1Q7b9UamS9Q5NTuN6qNUNia10evJBnNKy922nfn492UUTZrA=', '2022-11-18 16:00:00', '2022-11-19 09:00:01', NULL, 'PENDING'),
(16, '2022-02-18 00:00:00', 'PhhAfmIrt1z5IgM66uuiOxg32f7uvuvIvO4wPsoIe+E=', 'Duque St.', 'QEC7MaDy5rhJ4k+35nkJHsHL4K88EAjV3sestVFFZrU/ue+quQFXxWHAFK/thOKT', '5QmHfTG2jjAeBVuYnRC0K3K+cNuUVfd73Sx2pKqkpzr+EsbgUtTwgzxbGJtZaJEEZRBW5OmrfJC6ScWNZaAEVEq9g07e7akThzU+orK9bcc=', '6YVPY7X4XVVGQ18Y9UyJdIlM2aLp+qhMUXf43Chi3kRSjquStKd5rNGE1msUGpijqBGvy/xE/gjGb1/LqpOf0RZ8pQRmukvi4EBILRPzBrlOLh/UqMndXca/f9wDL+q7tqIOouqumAa/3o39crhk6TFirdXF5dg9x+DM+NwkLN9WqPzFPZ1pf8V591R9v7qNpsu25Xc3HvqUi+qjPw+57CLHKw4uztVqLzg74nNaBzI=', '2022-11-18 16:00:00', '2022-11-19 09:01:18', NULL, 'PENDING'),
(17, '2022-02-24 00:00:00', 'PhhAfmIrt1z5IgM66uuiOxg32f7uvuvIvO4wPsoIe+E=', 'Duque St.', 's6lqZJT1VuogiesOB/ZkWFaPG8lC9Ep7vs2xkpgvRVM/ue+quQFXxWHAFK/thOKT', 'mKr6N3y22Gwj4M3EE0VVzJMtQ+0OkCWnSiTni2vE+eZRs7rxNYa5A6E/9YZpoZtQMMVs30fnqKuptrxTUzFRbrvYk1QpGbr6KdEuyjy0NBA=', '6YVPY7X4XVVGQ18Y9UyJdICFN91P2ii7I/XHkmNsYMYc7B+O3u/uc0OFB8jdCIfHkhkaDymJtsIX4vrcrt+MSj+pgHD7QvQTJYgqIVhZfPEb0Xa+6Uifc0POOdXwZwlhWaWHdkXaI+OW+LZS6SecWkxOLjHn7g7HTs1yP/84oxkSxFyT9Z2tFuz94P9P4gkO/xRrRdAEG+olp8ypLfynAQ==', '2022-11-18 16:00:00', '2022-11-19 09:01:51', NULL, 'PENDING'),
(18, '2022-11-11 00:00:00', 'PhhAfmIrt1z5IgM66uuiOxg32f7uvuvIvO4wPsoIe+E=', 'Duque St.', 'pDJZbRizWlLbAQ1OciueuPg0QHXW/FtM5nslvZPDTHrWuzPPB4bShAInrKvpDOAU', 'o5DtSRj2QUUlfkNejTjuL78ZO8jpEtGDjY2jvkuCjrkHYjZDuW9UTtUBy7Qb7xC1HYek7yBdz+jGGFRhepE5oEq9g07e7akThzU+orK9bcc=', 'EuXyH9QGAH79f8fyvn/Cnx7wkpFQUNaVI1OK1get7z44I2erXxl9JJ8d3p0+nqMC8j3YyQ6bV338iPou8aFWTDzYDa6Xpnty8K5tVYTcTCEIFT3PrYOvAQmfK949kYBdpjES2ghleXtjJ26i5gJ2bcBxuwbLfBSiAAGBp0l1Ly0=', '2022-11-18 16:00:00', '2022-11-19 09:02:16', NULL, 'PENDING'),
(19, '2022-10-02 00:00:00', 'BxgdxXUDWUnilgL6lSVhFvrJiu1qfDjzS30nuv6xKGM=', 'Duque St.', 'FlsWxynkrnRby3C1ERExKPg0QHXW/FtM5nslvZPDTHrWuzPPB4bShAInrKvpDOAU', 'ViO2KRPJiJEPi7D+P1u7k/ViDJyjOOITjL0bfp9dQblEV/SREe1XsY4jePgrh0vsDSm99zq7H3amKZSCTAjq7MD+HVeTueuWg4MTwn5qZ1A=', 'WzOlJHMwK3vxc8K0gPTcvB6p03ZWR5FHQ+b4eq1wKYnZQCPwnMiM8DqHThqySdZovICu8A5MRVOGbZNlstN1u1CGQsFCajSUQVA5zzQPOSRBih3CeXcJB3XZgvUTaUaVIHjHwki9nh/2lScmuDBBxdUo3Qj6bA8Uckg32IH07yQpAXdYwmhqUZWkMsLMiJ/q', '2022-11-18 16:00:00', '2022-11-19 09:02:50', NULL, 'PENDING'),
(20, '2022-09-07 00:00:00', 'BxgdxXUDWUnilgL6lSVhFvrJiu1qfDjzS30nuv6xKGM=', 'Duque St.', 's6lqZJT1VuogiesOB/ZkWPg0QHXW/FtM5nslvZPDTHrWuzPPB4bShAInrKvpDOAU', 'o5DtSRj2QUUlfkNejTjuL7PSingfuzznXqVHDzZotg+c8y02+YJ1qlY+grHEhuHJl0jWtg0XuzVftU4MGS7DNN/hothevD0udDtgjhZOxig=', '6YVPY7X4XVVGQ18Y9UyJdC1plv8LOUnpPSERXZV+fzFkDPMpgY/PhbUkXrNHL6FeuOtvb4ixBMH9llljxTiHsWK/avZHPhRkK2dUd9RQeT8zwbdaWuvKGDubp9kuqxxNcMu2iATRry9vOQ77fAbC+Q==', '2022-11-18 16:00:00', '2022-11-19 09:03:16', NULL, 'PENDING'),
(21, '2022-10-10 00:00:00', 'uyngXFPNew3J0OCMehESZBCG6ydaMGuFmXmKnOdbX8A=', 'Farnecio St.', 'JcBzztUFqQh8N4RbTKj17REu1u3fXUpu5UgcPUY3wntp5MvEXLThQ7hrLOMBUVba', 'gHsfu1BSxAzwVQwN/5lr7vxY/GHLCGO6godlfweGnrYPmX0XWIwSlMsgVR3CgAFugmuGmt4qXj6QWSk5iFCojrQqJfs0DR3Fe0mutJNsrh7xgEwByS7c5Ta6Vk0aWbnR3+Gi2F68PS50O2COFk7GKA==', 'P/0CrFfXSn6X8daAudaouj3chIZv1Jinpy6oN2O2zsEwSe6RqOdRad6rG3fsMeSEtY4oIunqh12Z8s+TdDKmZ7FHpLH322iJELQTJv3xC83HiAL+x6Aa6Sb37cg6lyMBOco7RbgnhZ8sYPpevMaZfbAzUvFdkhpfQB+k3EHFHDxkD2u/NsUK3IdLagatHiEu80QgnrX1/es52i9B6GmoyCDwdicojBY6sEtfzd3JdVeyyJAExuEyXeaCUmTqrENU8C0d4OM79cLK/IXw+pVy6lvpAT2zdwJRTMzJVogADj9MQhsx4G8fcGLMBSa9xpzN', '2022-11-18 16:00:00', '2022-11-19 09:05:36', NULL, 'PENDING'),
(22, '2022-07-08 00:00:00', 'IexTBamxYFXOMbc3B1tOUWqjvmsBGhRg6FwWm27zAAI=', 'Fraternal St.', 'y1YWD72NdfLQUbGVzA90ZtFQ80raeusWhWQLG1F7hy6TiN2o8Z8VVX5oxa6AQlJMu9iTVCkZuvop0S7KPLQ0EA==', 'G8JjrkToRvGlvwdyd9ziURDXUi+iaBI4g7PXuHrbKq2QRUwD2R/YIHcKKO02GccF+PXdP9h64n+xGYEDkeeNtt9xGxVguQUjYF9nrSFJpTOxPdld+QSc8NnlaQy2L3ql', 'BlRxQ9Hk9IK4+HFAOdM52OOxnE5Dy9sLl9orWTLV+L6PslwZiFFGBym6YZeaKEA1h8S8xWjCUstF1cgzM7ZPh+9WbbgY45gzud1FR+4u8sEQmohY5X+WBLcHo/ZTx/mCHpMci3OF1KQ5HRtVqeem9rYszNMsZJ5gOkym5O7kuHDFEmV0xaEiU7g/pXk50QPLnrFiwj4GCml6TM1b8QqkpnbZaRRAoAKDAHOU74p1q+SHLnRc9CqN1Ul5Ws+prv+i3VkiyAskvHWSpQrg2wDrXcfDWau2UKTfiDZg5uVx4V43a5obDgQMS4Ua6Baajtw96eQJGvZJVNI0BDNBqGdnEuBLQD9baCzDi5EkNk8ervo=', '2022-11-18 16:00:00', '2022-11-19 09:06:10', NULL, 'PENDING'),
(23, '2022-02-18 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Pascual Casal St.', 'yLN4l5WfBYHrC5tH85EYP7QxlKBXyDdOadeOYeaXe7SRaGfKWZfCymmw0jlnOToS', 'n6+Fi+TDu2ggMhBt/TEZ83JqlQ4fqDMUsJGkJtm96jDA6rTKMWBHSrxzgPrAiVkcgDj/sgQ0+dMqtp8WY3tyZhSA5qK2k8cAFlK/XzBy/ApKvYNO3u2pE4c1PqKyvW3H', 'LYlpfqDhMrvr8huF3Rm2TysObyibjmLuLEE1V4CpaXmZOg61f4h2xmDfGEOyAfbIx2xAxfnVpuBSY2qqwxEgQpuTQoYNJ7PhT5yyg9OQxZiMcOMYSJYFZrqtLDDo/ipIoYbtr+5BI5qdxXxQVpsn5ett6KUGmdYfChglD8ydQa6qmCpqbtrhiLfjYlOJwJqs8UA/j8kFFAhVZbK5gg20xqKrK7on2Eb6oCenxY2HzQk=', '2022-11-18 16:00:00', '2022-11-19 09:06:42', NULL, 'PENDING'),
(24, '2022-11-28 00:00:00', 'IexTBamxYFXOMbc3B1tOUQSjm2oANiROUZSQKNFadqG72JNUKRm6+inRLso8tDQQ', 'Farnecio St.', 'mfoS5Bll77P10QqJf0InoREu1u3fXUpu5UgcPUY3wntp5MvEXLThQ7hrLOMBUVba', 'E4ZpnhkbkvGmDboGMOIAh3l0SLl23loWpC52LEFRmeubEdJenwpwtFKXltM5k8Ba26xG/RHDTeVfXLR/7RWPdktAGRdgh/iaNkuO3sS/CCs=', 'DKpfpkYkDes8WPhlMW/wxAMVtfTLa61sSRvfU/Ft3nwCAaWUN5rGKUdlEJg1M2u/uDUkqkRNjOZeI2qIPT40Rr4ageKR2WRfvP+CPuajEob5rMAXkw3XPz+hX0Ow9mwZ7E0gpo+6E3u+0lg3/8D7VUYXLlhYgtuxZExa9EwboYGI37+gbHpmeCDsmjjte8Zh40DISjmO5rltFQTVdT+PkJZKVaAC5MmDrkylhWnG253rFgc07IlW/Azkiq9/GlPqkxQCzvDImd1J3cpWXX7syu+zS9Be31NaVoPdNqqdwEc=', '2022-11-18 16:00:00', '2022-11-19 09:07:31', NULL, 'PENDING'),
(25, '2022-01-21 00:00:00', 'PhhAfmIrt1z5IgM66uuiOxg32f7uvuvIvO4wPsoIe+E=', 'Fraternal St.', '8pRugQVsG3iMpTwlqqicOtFQ80raeusWhWQLG1F7hy6TiN2o8Z8VVX5oxa6AQlJMu9iTVCkZuvop0S7KPLQ0EA==', 'ElIJEBJmkEjeIYVfxxIybxUzJ5cZL3ntbQipr53EQ9BQtEEKAdHIRcIgarwHw6nLctEVW8oSKw7TB8wvTUgGebqieY2X+M3WtLeAI42llNE=', 'XQk52KyavpjGh08BaITAqJo+tL4c8tu/KGDipeu0qZOeFTzGmfpc19zr0fqt4kUh+sBsXnJCDwBrhA9I2FSaXszcqdsh01d5Bobx/HdnEsC+KyY5nE2TjfZTDoC/Gvvx3AnOIpPwNQZ2OhJa3sd2HBNGazLyr+rbyzNUVGE6APLLxEeRRzoK1t6e86tezGaBCwZPFO+wwC9PA54oWndjKl6fEpUuCoqoUTUFGFyVC1WGEHy4Omc+KZKARRA+EaXI', '2022-11-18 16:00:00', '2022-11-19 09:08:30', NULL, 'PENDING'),
(26, '2022-03-17 00:00:00', 'IexTBamxYFXOMbc3B1tOUWqjvmsBGhRg6FwWm27zAAI=', 'Farnecio St.', 'RpXwYUlkNVN79zRDW8rFGhEu1u3fXUpu5UgcPUY3wntp5MvEXLThQ7hrLOMBUVba', 'Jfa1aCCd3uPw5wBxmXM8o9Ha0j71vUnzbhogXXTLvV1ROK4/eLWXNa1jR4cpR/c+J/hHsjRd52OrWBr6sUXmyzJkTHJBK4htGB04EQKXZcEnq2/zAhEu4VXnQ5vArrbkwP4dV5O565aDgxPCfmpnUA==', 'JMwoV+ALt0iyW6IpitEOvgpHgYssAliwbRr0CV0IQn66RnYPq5SbxCu2B5pT/Th/dWL6AJAEZoT0UmdhgAE+Vc2xg8yLOdfDKBDp3rzKD03S9oJSjbYe7uLn10akVjPEIANiOzWLnqxmrg/mAdzR8JLcSDo+HIasgouTTJzlSQc6JrUiTlCs/c5h4SrpN5QN+cgjICUH9y6A7ar1cnbQRDPczA1sDwjecLdqT/DElbMjlJx6aIVqVfIH3QjHKGAifuK5TsO2n2HAxg7DboKVszGH80P+A2EHvqT8yDyKyLNDe1Va/sSqvJBYw/6aOgcA2DwfX81ucO2t1pqqINlgR5irIeIyRbDzTF58sH9O7ANxVD5txghvHQD9nPZFwV9G+zdHKcWYouOjw2+FDuwOZ/ynmNY+dchAvWzg4yLJsjo=', '2022-11-18 16:00:00', '2022-11-19 09:09:26', NULL, 'PENDING'),
(27, '2022-10-31 00:00:00', 'rPLgCJZYDhWbvZhimib0zhVuxK3Dt20zGoZ/WSuFZKc=', 'Fraternal St.', 'xef/8kwlMa0+V/If5TjctNFQ80raeusWhWQLG1F7hy6TiN2o8Z8VVX5oxa6AQlJMu9iTVCkZuvop0S7KPLQ0EA==', 'FDqYAH0sclEvoLCXORKpszymgOpJOVizZdei+cgG7bvwRjhHI1tWcRmMaV5cPEpElalUaH48i/5wPtmBvWtEMTtEvDLMk0J+AHW0QDmDMmrqnBxzSqQX3cdv0sWQ/6nPuJlt7R9b6cyAc8OIdFWAj7vYk1QpGbr6KdEuyjy0NBA=', 'iZPr6H5FNl4nLyQ+cabyRt7LvWuuPPTQDYjsNA4CQLo7bOZk0696aOKMX+xMfD+xyJw01KJYJsiEcZeCom+DxF39hr/6bwTm7rYe9/XMuVDeU/hpGHnXEnKC2Vef2t1i7Ye2SDjB0cRjrVwizABUKjdMgZIBhvD+of3IoEPmY4k4Vs3/s1DDhRgbyU+GDOID', '2022-11-18 16:00:00', '2022-11-19 09:10:05', NULL, 'PENDING'),
(28, '2022-10-06 00:00:00', 'uyngXFPNew3J0OCMehESZBCG6ydaMGuFmXmKnOdbX8A=', 'Pascual Casal St.', '7VKfxzcpahCcuI1tygAv+kfUkyNbaPujlfOmq8G6nyNp5MvEXLThQ7hrLOMBUVba', 'J5eZNH2Nq6QKePeEbXIAq5OmqB3b1YJmw/yj686Ps86qGamcGd96ioJnXSb9iaiFxRv+OApQk5ZJgKyRdZqD6mfgM4q61ARdT+V9bH9C7d0=', 'GM/nbq++RyBlwS8NvhPbBwc/vVMwvYk2PAFpwm7XW4rBBwAtNozKasF0B25ICRmdEhYRohNVMQ0uZRaCEeNcQt4OG7gMnxHbQ1RjYo33YpgM3RqzKmCJSg++r/dev4hy6JEIVPM/bcVhmQ9RWXVsrMXN0jPFmzuc8vMCJdyzk0z9EvbkhT7M/ellC+T7uST9lLUyL1N11+5sKYZvAtuHU5HROnzB3Kt4Vks1kgEPkDdVSPsCkqPCXMSGt1rIlZ+pVItPWZC7FfY0FqjKh1cI8w==', '2022-11-18 16:00:00', '2022-11-19 09:10:44', NULL, 'PENDING'),
(29, '2022-06-05 00:00:00', 'IexTBamxYFXOMbc3B1tOUQSjm2oANiROUZSQKNFadqG72JNUKRm6+inRLso8tDQQ', 'Pascual Casal St.', 'JcBzztUFqQh8N4RbTKj17aXNKCN94dJqpI0/noxYRshp5MvEXLThQ7hrLOMBUVba', 'EaUp4MGEFVmVGQXzPAOHoDVFRSEKC3GLA/2rYKTTUfSyDJhtlcYYIALohnbbCDHiJzjVwSD8Bc6py9bf4gcABkflptKXLhALA4oYOnP/9mPatSBWzoNNo6X6QXIMq+pv', 'PXtA69tzJjqzNtVluxLAcfKJiQwUpyCpwgaAn2IPmcNtaGBF90cpP1JmQYjycVFB/YQDT5KPQqO1eNAUGyLanGfJj4oyFQJj9aZshXC0UqeXbiNAK+aHTYAQUX6wKE913YZrd6JcORIyzsQwEvy0Ehv0N0MRjoKEub2+mGmA5dehb+S4eAY6FHYloD8OPQz1aBJ3RCbB2zLD43x4mvXkaA==', '2022-11-18 16:00:00', '2022-11-19 09:11:11', NULL, 'PENDING'),
(30, '2022-07-14 00:00:00', 'BxgdxXUDWUnilgL6lSVhFvrJiu1qfDjzS30nuv6xKGM=', 'Pascual Casal St.', 'JcBzztUFqQh8N4RbTKj17Rz+EVWssOLgWDQWosT1uUJp5MvEXLThQ7hrLOMBUVba', 'E4ZpnhkbkvGmDboGMOIAh7DsgwMBoVMSiWJBsLcAwsxsDPijJ1Yskf3swGsAgC5C', '5o0K2I1ZkmsPg5Aly/gKYe8DHdNt9ytywRZIND6E0ixEMzc7/AqghigukfUhO2hkbhL/smlVjvo8CqRXFYKlb9joruEOqGzy0k7Alu4QJ3LvBDwOmMu3scoI3fLt0U+7Hw/3fyBiGDGsVXKlc45kZBQHez7Z8HAi2ZfqzTvzA22N/mvvAvF2ewN0o4bvWJxyUogrrxjBIVT2gg26exZVpFjjz3u5thejNjSmYxZXvOQ=', '2022-11-18 16:00:00', '2022-11-19 09:11:48', NULL, 'PENDING'),
(31, '2022-04-13 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Farnecio St.', '4JuoFjn6S9xHgwFzMBe+PBEu1u3fXUpu5UgcPUY3wntp5MvEXLThQ7hrLOMBUVba', '4fhKXzYtvmEp6EqQYw3XaCUrwiDg8oJAkETjvFTCDdI++Dx9uA9S/tZ0WbyBNuoXGUG9u8XvjG4NudU7jrJ1G2v2ioaP9mVhXxeDauJAH6R4q3P+EiZ69xPRet/s1lMVGglxDTowC5BV1hZ9UAipnw==', 'KQxwDMdg5Ypa5E0zzTvIIFQl/tCgAvzyQiLs9PQlFqeM7Pv2Yg5/zAm8S/T2jFIpMjZsgCoJuS/MgFUAFSyOuUktT5CRY3wwSxXMJW+dTjiAHkbZQdRYWvHG6nWdF1ShoWBIqSNAatMXqgnZOM/zw8MWTahYcoX5FrTBaettUt8BE6mnT8mGvuMGF3fJncHiz8Ee6+b4dQpwfWtmOr1qD4rMaoca41PZhTU/lyU5bEIP9hhOa381EyXChj+8Wp3ZGDkoZxwYY14Ju70vcoVIETqLQrl3r19JbQyFBtCE0XURPyBZNaLBzPxRyk9yIJzV', '2022-11-18 16:00:00', '2022-11-19 09:12:44', NULL, 'PENDING'),
(32, '2022-08-31 00:00:00', 'BxgdxXUDWUnilgL6lSVhFvrJiu1qfDjzS30nuv6xKGM=', 'Fraternal St.', '6zBKPo8McQuFCO4+hFb/s/TuxB7Rxvz6NJQR7pYz5gFtgEBQoZWFzpBOZ0ew8aPQNiQb39ts+B4BP/uboNtj4w==', 'k4T90l0u8tJ0gpB2JwmHSceYzIjeDBnMeL+PeXhbFu/oHJoXhMJcSiRbCBL+1g7engzqqiX9++tCeObLWaHaUw==', 'oSpScVAAjTg6khDmua6FkIY7fBgxos4jaUwKUndNKMGiE/h/oZ1ZIjDnr8N32vpjxWaQlDOHfsrjelrQH2Kjw9k0oG1si67CGrY0frzT6eQj78OuVLB20THUC9PQRr9B5okZASAmhnu/ZjFLmkgwG/oXZ/+V8nVH2eIng3yEc+IXgvvABPxxpxNRz4xlt6Lizvq1DWk57fDDmo6EktavJkcymfnsoiLwEs74SmnPNz8ejD36SGgbV7RUF80cE0cL7nWa2SRhP5TxKWoAwCty40TAB1Yi/iBlv0iOMREsaTQ=', '2022-11-18 16:00:00', '2022-11-19 09:13:31', NULL, 'PENDING'),
(33, '2022-02-10 00:00:00', 'rPLgCJZYDhWbvZhimib0zhVuxK3Dt20zGoZ/WSuFZKc=', 'Farnecio St.', 'EQAnFUTPSwVnmJscWqJG7W2JbVmnp618Ps3E776dlk+TiN2o8Z8VVX5oxa6AQlJMu9iTVCkZuvop0S7KPLQ0EA==', 'hQsz9b5EoG6rBU6Z4v8y0SmLNkWLVZ2bl1LHm3U4ePJiVm8pAj1VtrWBODcrwIhZdyL78RGIwb9lWcYyNv3bKjS4IGU4eu6jWnqdoYMJ1qAZXducSba+GKn9jQs9F5Pz', 'JMwoV+ALt0iyW6IpitEOvlSZr5lyz6cCURt+N9MqmjZtDL1uyJhCUZAHfOQam9yoDn8vtSdZsix6I6Yfigl7Ro6JgD6Y19T6gufa7GWxjX0C7zrLkBJ934mTw9laAMtDfFzXav/Q2bcyguznamKgrBECxSSzCZ5DyJGj4ydJVT0nbCs4YyreutkZQBhkODQQO+XSeSHk+inRWhPPbD+Y20KTRZFfNU2E0db/sUEkmc7roqO6M+uw7Nbpt0BLYc07LBYMizUx43SdJwdrCMAiWtp3Bc8t4f72CMaDGHI7dOgC974ibr7HCi35ZQkg1JTWCz1NTb3fxPOIribj9x2W7w==', '2022-11-18 16:00:00', '2022-11-19 09:14:09', NULL, 'PENDING'),
(34, '2022-04-02 00:00:00', 'uyngXFPNew3J0OCMehESZBCG6ydaMGuFmXmKnOdbX8A=', 'Fraternal St.', '0xtcyxDNUGdgBCI8E0e4T/TuxB7Rxvz6NJQR7pYz5gFtgEBQoZWFzpBOZ0ew8aPQNiQb39ts+B4BP/uboNtj4w==', 'J5eZNH2Nq6QKePeEbXIAqwya12irB3hNxtO+RVIaylPexZoW5VWs6UTgySykf7nye0BuOiEDCdHEOuYUZordXKYxYIxHa+XnfyKjGPSfvcC8VwIqnbZcSUfuUUci10i281WOVYOGIfEeQTCCLOydjI1jfGZd1MFz+9RUVfruxWHnu4LPAgvH5JwzXqhW0Qoh', 'erewEZ/8GzbcoG/LD8p1oibqDqMmyw3Qd6oaDJK62uSEe76fctx8fRKbLri3N98cpimiy3xTfin1smNruUsgTgHxpzkdvUjWszXysyMkqvWUofdlfpk1nzZLjnrSJaCyLiPrAVjIobL22SD1mSXkvzjWpKwa3bTe7YygBBN0qYo3V6wDJndJzHdNgW31Eu4JXnSWl++cq0oXCs+dSyZGrYnPYDpiG9z61942v9Fq33k=', '2022-11-18 16:00:00', '2022-11-19 09:14:36', NULL, 'PENDING'),
(35, '2022-06-15 00:00:00', 'BxgdxXUDWUnilgL6lSVhFvrJiu1qfDjzS30nuv6xKGM=', 'Pascual Casal St.', 'c/EpR3ABE3ii5zafPsP5PE3OAKjugw9Wfeyuf9/y9zpp5MvEXLThQ7hrLOMBUVba', '/O+Rk0vyCBJaeFjoPKK49x57PDx+b4rSwl6HJcPIKeSIpbn7pxfy+XgUbX5j+mxBabyIf+/GqvYkK6TUTNJdoue7gs8CC8fknDNeqFbRCiE=', 'Ng0DXt6eNDQsKxg3HruLG+N/+31fipNK/VMtroRnTcc/MtXDupx9ZEilU9lHy47DyhDF3w5lC+3SH8RYK6IPZGX96eKM91UpFpFb+C1o3bi4KmpHsLH9V3qRWH0P2aHEK7LbVbqWApZdYuSjgCRH1YBLD1Pj+/RHnrmgiy+wdxMuW2TSyD5MCaINJ9VJXWorXdkSMTq+nlCtE0LIIousyjMX7ggD07jmZ8iuXM4EM/KOinfU/gfSTjowlKbzPVKl', '2022-11-18 16:00:00', '2022-11-19 09:34:32', NULL, 'PENDING'),
(36, '2022-01-24 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Farnecio St.', 'o/yltAjKWoFMciExu8Z7jMbauUZpUlj1qE7JhJ6bwVXXHwp8vk+cN9XymbhzwZxFa0Eiczcx1+Ou9Zp3CwiZ43IVJwH63HLAoDPTlKbx+Kk=', 'MybJFMsUAH0Isi60utpFLl9gGkjDwJa25p3iTE2HCUHFCUvFROSPaWup++wOhwmyEvqT6k/nBOr9WTpAoAjYc8ybPRU8Sc1UabPUbBQ6mkjA/h1Xk7nrloODE8J+amdQ', 'tSt/AB8utKXwH2ge/S0NnwA/EP67HdDFY1ampdiMLLEOfy+1J1myLHojph+KCXtGkS7aWsmx8n453G4pGxvH3/XUwRh/Wz6FyBed+lwLaVqlyp1delGYuXIsq6tNBWJJDnc7mTHhWh8PTT8eWwJ7YjQRm4IC6ns+89M3Gq8qLl811Z2E2wdaLuWe4PBgorXac9WpJ62so5F0X5gMBVf1VyOwEVk3EKVm2luPcIADbyAOau/1g8Qe5QvUWaR1kBeqOehzeJvKe92llyN77/PJ4Q==', '2022-11-18 16:00:00', '2022-11-19 09:35:02', NULL, 'PENDING'),
(37, '2022-11-06 00:00:00', 'IexTBamxYFXOMbc3B1tOUWqjvmsBGhRg6FwWm27zAAI=', 'Fraternal St.', 'c/EpR3ABE3ii5zafPsP5PObEzBOExWbvfAlCJNMiePJtgEBQoZWFzpBOZ0ew8aPQNiQb39ts+B4BP/uboNtj4w==', 'f/+fhe82r71EvUtlEhnJwijvrXu/fJ1rpYw2fJg4WaNn4S2bTd8qfaQtK3HpuxTvmUK4iaMSsNDxa35hq21j0KuF8qWvBGTEMBjPfJVSVJDA/h1Xk7nrloODE8J+amdQ', 'ufupfEeKcP94sRwcxoSEmYX4YREl+Z9D32eoza5uvDHOnPG/BuJZVA2M9x92bTRZyn9yyrdbZj9MCwSYr3EC/OmdOLBN+sidngRc3AwT5t57ax9RcP2gF1djDcMQHPETB73eeuzp6yitpY7e/QqYVWfL+MWCs/Y5A3cthBbmMRoY3/DA03WY8AzujjtxF/GExQqh77lApLi6Lw/c4e8ktw==', '2022-11-18 16:00:00', '2022-11-19 09:35:46', NULL, 'PENDING'),
(38, '2022-05-30 00:00:00', 'IexTBamxYFXOMbc3B1tOUQSjm2oANiROUZSQKNFadqG72JNUKRm6+inRLso8tDQQ', 'Pascual Casal St.', 'F90/m2VPk5IoSGZnQVdz5qpOLeDIR7jC3q9QmIl4qwxp5MvEXLThQ7hrLOMBUVba', '+2u6x/iYW7FIwUwQLZJujU+lLE7fwJrkGqSAu2J3UAZKyu0cWvy07QeIfjQ0lRyQlxdDirUA/8ZPNuU1sfvEDuUf/zebwbL0TrrFtjTGAUE1wFQabh61kJLqPO5CNy3omtQM3ofOW3bn0zj/wnu/fwDK04rr/qWUUOVaWvYh3rzA/h1Xk7nrloODE8J+amdQ', 'Ng0DXt6eNDQsKxg3HruLG584ybqjCM7eTWJ2n7jZ/RXBWAAldr7Xhk/N2dUTjQt3tDBEx31qHSz/CwCDdJbkPzLOYksiLFjKHhqj6RbPGgrycOgxlvD1lq2ZDuYGAd9cc5rRBjdtmx4CaGIhx4OW7osU9uUrBwwodKYOYM6kNKP86/DQRGTKeTCuC0hvtTdcjGH18yBoDz2Ubp2cV2gyHNHs+WZBJ1OFPkt2+7zAU4QzFs1KFEhsBEh8IeVKYJMSuYRId50UWgLXJOeHThCDf2i+jAis8FpkLfYSVz9yn6m72JNUKRm6+inRLso8tDQQ', '2022-11-18 16:00:00', '2022-11-19 09:36:17', NULL, 'PENDING'),
(39, '2022-03-15 00:00:00', 'BxgdxXUDWUnilgL6lSVhFvrJiu1qfDjzS30nuv6xKGM=', 'Farnecio St.', '8PyUcuam/bMuKp9EsD+C3o0HNnVATWjg9WfDSvO9MiCTiN2o8Z8VVX5oxa6AQlJMu9iTVCkZuvop0S7KPLQ0EA==', 'o5DtSRj2QUUlfkNejTjuLzXaRACcq6Ms4fPJrSfyQ+GzteEJ7yLrkgo8TaZMbcbpLO7v3n5/327CwWG5cyGZbVlcGRBHtB7i75Vg1XEqx4M=', 'Ng0DXt6eNDQsKxg3HruLG8nFyvgXi04U9yp6QH2MA8ogSROA08ntA5XrY0RSvp4e2Lowe2F7Bqa8qR78fZd+VuKAPAn02n3LjUZT2O9bZ1+jg9LxpMYobjj2GuydsiFXkYFXdd0eeRAi3zcv87BNJFl4gDFb+BkEdRx83FZvaOPx4prmi/zfRqlxrUnLzSyc', '2022-11-18 16:00:00', '2022-11-19 09:37:05', NULL, 'PENDING'),
(40, '2022-01-29 00:00:00', 'AmAKrHMRv5bRGhbXfJl2JgeZPKIPb7C5ce62+jnexGc=', 'Fraternal St.', 'yfK8Yeu3kqTrGQ6VxlSgmvTuxB7Rxvz6NJQR7pYz5gFtgEBQoZWFzpBOZ0ew8aPQNiQb39ts+B4BP/uboNtj4w==', 'rsaSWa2Wy646B/qRDe+V3gE4HlZpFU3AtOjbiVXS2aLsPKFRzBNQ4uVsRLkX88kxgUkKrNZrsBGAKAecI08I+PhVeV0fNL8yvzv8dRBHSV7TnmJC5MdTYo9MMQJqB47w', '+i2+qSoicLd69ELZ6K1KyLvRzXET6zU8kGcLePONzLyvRLIkisONtZCoT1UTsCA0sFkyL/H7xArV4YE2C9m2r2IiDEp2kIf1bQrsZr88/v+9d7b07ZixMeBGg3iCzbVr8Npvi9ycQYmvsrfIdg6CVkPK6BtLjFXYBKqxk3soxPcZYKs8Av4dS20Rn/VNdGFgovDRU8PHpNba++LmP9yLzg9QENUwcJNxKID7Iu/ryu40gOv9mVlfKbnvF69u6IiwEG6ytTEFKvNJPP/8RJvcRM++k/FV3EdO0c8uOaNrmVBH84PxjdLrV6Gc1diHJTYYZaUV3Ed/ftGkIGmI7DVLdrSM4pIt+kJqH+sUUnLPKJL/U7KuFrZ/5AGDfFKqFxSl', '2022-11-18 16:00:00', '2022-11-19 09:37:41', NULL, 'PENDING'),
(41, '2022-03-03 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Pax St.', 'SX6rWI3VnbCXDA5q2V8VFy9ZXGuDB4tXVZFHei75QCirl/2E4Y2F7IEaiDnUi7jU', 'MhpDwKlIcuNYyss6UaVflTFWRyb+DXysDqjYu2B8zJERrizbBzZMM9LS9hzXDxk63wPCAK8k2n6b7gX0OJdF+6/JrLt8uzLKX4l78CNU64EcvG6LYCC0i9Dv8g3cpJD40n0aKI7czm0v7ctPDZBg9g==', 'J5eZNH2Nq6QKePeEbXIAq5l2EDQfjAANM1p6SkKNdqccpNWplcCCnUG2pBY9qq0cO4hwPS+4XwgHUxvPvuwejx1NBZmycXAua538CxgT2U9xHPX55/GDMYp3snkDr68NeZT/cAsfKkDE7Jrf9TLEe2XQ2IT71TyphdZ7KN+vU0l3w3UmtyftzRUSXSMoxS/+3rcTyVnOeupWo20+APPw/4KqYW8n0e3u1JPzip4OWVNGf59tkEd1F/h09cdZfzsE4jD2OSr8QRVKVFmBENypE6ABRciCNMA8ywFq7C+IZjw=', '2022-11-18 16:00:00', '2022-11-19 09:38:40', NULL, 'PENDING'),
(42, '2022-01-28 00:00:00', 'BxgdxXUDWUnilgL6lSVhFvrJiu1qfDjzS30nuv6xKGM=', 'Pax St.', 'RpXwYUlkNVN79zRDW8rFGvcvu8W43D02nPEFSwCHnNCrl/2E4Y2F7IEaiDnUi7jU', 'WIHQmWx5bTAi7QR8FNSA6ey1isSZOjIUruLJ872Jvk9YZy3OyTv4nDzz1QRi7jMn0XIFAuSMdepwmE2XEZ1IUdrMbpbHKwFUNVbCV2lcGL8HfZVqLnrBUyXFIRDE1OVGuciQ9u9bm8n2swnezl5gsZfRGbSwJouQWYyL2PKv+1M=', 'GM/nbq++RyBlwS8NvhPbB2UP4G/Zb38co4SZprjP0ZT9BZz8v6JsD9XU6BrmjnYcLTNU9Rnofq4sW0BdduopvSH7fBsmbuuvEyDqrPbqsMEjMAyFSq4wHMzuF06xAKnpmDku8fWvsX98+4KyKmjoXe0NCstrmWboqHYfvXytKMJRJFtIbfSagm7W/iuKxbpYWkU7nmrB+Mx3M4KsRKUfACwIcAbmc7ydc5JB6FGVjdgh4kP6cV5zgtWwT9d6fw6dl03y5DosTC2f/pfLjTPz1p98vIwpxHxxWu2BpHzhPC8=', '2022-11-18 16:00:00', '2022-11-19 09:39:14', NULL, 'PENDING'),
(43, '2022-04-08 00:00:00', 'AmAKrHMRv5bRGhbXfJl2JgeZPKIPb7C5ce62+jnexGc=', 'Pax St.', 'PSQBTFR+4GAgSwLN/ZWP4i9ZXGuDB4tXVZFHei75QCirl/2E4Y2F7IEaiDnUi7jU', 'VaXulsvz5kRoQlxU0Bj5jvezn5TBaAIgbQjmQF/TFBFt5k4f1+AQHYnV97DJ/HChy7lnKxS73NPQJIhFKekLJqcuLclsklVTbGRsyKn5how=', '+i2+qSoicLd69ELZ6K1KyDSibRWGmEC2lpjFQ+YH3k0/sDJWCdQ7AAUo0m1tcLu1ew+b6wvJU0lfp++pSGA3wMP86WACOsqzqYqJ9ILYhStcmVUzFqLe9fHKzzTp3tb9EVqwzSQ09w9keS3qmwHorzkV6BMv85ekB9Y+gLtJuoz2BYYy9nPKleKEG+W4hN7gZcOsjye7WuZx94I+7k11fA==', '2022-11-18 16:00:00', '2022-11-19 09:39:43', NULL, 'PENDING'),
(44, '2022-10-25 00:00:00', 'rPLgCJZYDhWbvZhimib0zhVuxK3Dt20zGoZ/WSuFZKc=', 'Pax St.', 'w5+iKI+MiBrXtwPiW1CCPy6rlT2Bf8QbbXBRQXjgX82rl/2E4Y2F7IEaiDnUi7jU', 'Cdxc6IC+dzyZPALTGHQ9g0NuKB9fj5JIR5W8G57QbDH8nNfP/Jik80CdvMGrzMq0jLk1fWV/ihfLb2R0DYji3h9Uax4RNuIZCDTyFRrNWZsSaGhCYywNS0xmzfB9nwaroCufIBCBlkqbzeeRxVb4aOca9uV6VXtg1tPWLPSRDsbA/h1Xk7nrloODE8J+amdQ', 'rhUoSuaAUahwiUnddLVV9bn2Ph17QjVB+FPRV4Fc6Xrehq+K6V6OBmir12deFTU8BvnN7fdjqeEENvc2EheTJe6OOdlQzg9hePLSVtHYunDBJHC674iLo1O6mTEi+g3N2JBcy7+v1Eivmgrt3WaL8yXJ/+rBsyejsfaZZPX6h7wRHk+234nBuV/sd51oXPBnG9zV14UmmWuRen2WeWiXy+0zQiQAqMm+VX3f8mq0Ync2Ph0op7voR2toh8oSK1ZXOFDQUyXJlFojLLChJTdUhhNM5Xc/ApiTZQMX+PzbLrvxY1JX8Nh6s/1t4AFGoH3xu9iTVCkZuvop0S7KPLQ0EA==', '2022-11-18 16:00:00', '2022-11-19 09:40:14', NULL, 'PENDING'),
(45, '2022-09-03 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Pax St.', 'SX6rWI3VnbCXDA5q2V8VFy9ZXGuDB4tXVZFHei75QCirl/2E4Y2F7IEaiDnUi7jU', 'rTpKASmD5/BQ6mjbXlBJicb/RVp8rjryt2Ng4POGeOYTlVSQtj1ULjuLddwxNGq+rV+ZnESz805TRYfsgN6XJNTAegIGAdK2Pmd3P5PPtNI=', 'ufupfEeKcP94sRwcxoSEmXI0LEt0pJbe5oUf6zTS5/9lqzhQ5hvx1hacMI6JmxbeFHH3psCx4mLm21gykQUlxRM6u387EHS++5ui280bJVTPjnnm0uUnrEw58wbXFDOkiTawDhsHAQ3e/2O9Coxd6zdIUQdj4fK7OH0TForDbKj4ZMJAM/Hr4aHrSTMW3B55rQsWHjI3J/bwk9CZutTWYW2g6S2jFk8CGkzSYAbe/6Szyjv0GZY64EWF3WzIIcEBYyPAbThVGoTdmQ5zP3Vefg==', '2022-11-18 16:00:00', '2022-11-19 09:41:08', NULL, 'PENDING'),
(46, '2022-08-13 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Pax St.', 'ScXbGDPNgWSXNH5k8AikxPcvu8W43D02nPEFSwCHnNCrl/2E4Y2F7IEaiDnUi7jU', 'Z1gUVlncQMT5tKFKUGlu3PTmXrz+oQYEQVG5B+uE7zQ8ZPBvkoZt94HfdTSB5WLjSN978Z9Oz4hw6ZXU1h+zUB0qf1W37A7TCHo3KaXfDRod1iFS9W5N2WHT/d2iOduffdt8dAAY0BcwD2EYlmVuHA==', 'LYlpfqDhMrvr8huF3Rm2T32lyouIq8/knkKeUCveWlG6ygfdQzw1W1M7sRmty9NJI02NJhSJxmXpx77THGsujpizW6DLa+r6wEVVwCCygtfPj2POBqxykLU1PZkc35SSpE6H45z7Iiz5rnec3OOBqcXbPguCT3bqu/cCjPM8eXNkK+lGCNhlxsBfbtKehaFeZBHDEZLM6As0wfwuzyGqN0ZUCPiJMfo+TgVUk/f4J9znWcj4NMnb5+e7GnmrEY9AEapgUwo7qtLb7pWg6E8+KQ==', '2022-11-18 16:00:00', '2022-11-19 09:41:49', NULL, 'PENDING'),
(47, '2022-02-18 00:00:00', 'PhhAfmIrt1z5IgM66uuiOxg32f7uvuvIvO4wPsoIe+E=', 'Pax St.', 'SX6rWI3VnbCXDA5q2V8VFy9ZXGuDB4tXVZFHei75QCirl/2E4Y2F7IEaiDnUi7jU', 'GqSd3PWijbtic+ruEH1GYYJIDC54/31YEalUFrrCo7s033z6t7eYWF93BmG8W5IAudFDT84q3KHmWZRbszlCoPeSHxR5YjSW2bgWnhx6OstlePbWYI35boCjHFPWnqLF', 'JMwoV+ALt0iyW6IpitEOvrEkM1PGXAELBBs0qAtwmmaNANolVCpHOQCmDaNHDtoIakHgBt+fXZQ1A+N2YoUDJCXgmJPBj45KX65HrP4pxZWr54rwuVmHOnGr8R4lC0PL5yocqvuckmdO5oe4EI+CEiCtheuSiafrz9SOwFCkUFgpPAYFYDbjbQPjWsrgy6LRR5YCAw7E5mSZUPsgOl7YrbvYk1QpGbr6KdEuyjy0NBA=', '2022-11-18 16:00:00', '2022-11-19 09:42:16', NULL, 'PENDING'),
(48, '2022-06-20 00:00:00', 'uyngXFPNew3J0OCMehESZBCG6ydaMGuFmXmKnOdbX8A=', 'Pax St.', 'mfoS5Bll77P10QqJf0InoUNKYOmRnkvA6EcWVERXfmKrl/2E4Y2F7IEaiDnUi7jU', 'F4ZUaS2CtMkQZq6BMbYKP3QiUcLU8goUUuTBD65/lLBsx0z4EwPNASqwji3kRgujsgExu6Z9k07tG6nHln6128M+1kGS3fJ12tKzW3YSrn0=', 'JMwoV+ALt0iyW6IpitEOvjtc/tI99sW1iOrNuUHvYIy5yCmXcaGfz8Qme6BH/7lznfZfHihdnAs50/4OHTlE7nXXrpEJyu21wFV2sWdMM9ZwUOfs9JqeeGQ0/8zFdEvjmLJTA1zPtiiJlnXzhghvZAYGSU9YyIPEhsX9w373SxBtiEdJ1u0tC+xx2naer06+AprKriotL6Rdmq2/mp766XCWGwYRI8E+lhF5xJootvXbOU7LjBNppQ5pibQYkn8ZKdr89ZMlb+UqA1dIGKbsWe2c9CxGId6m6+ES/nRFQXA=', '2022-11-18 16:00:00', '2022-11-19 09:42:40', NULL, 'PENDING'),
(49, '2022-10-02 00:00:00', 'AmAKrHMRv5bRGhbXfJl2JgeZPKIPb7C5ce62+jnexGc=', 'Vergara St.', 'JUIeWF7vTgAojd/oxG00pU8wUnVjMR5yshf6h3CUDhtp5MvEXLThQ7hrLOMBUVba', 'gEmDRULSMdDEEukNuuHJyogpDo00NTnAnJNRhWkkUmTjVD5CFPv6+evWb+5jk/oxD3LwarKqeM3IqNhuBL3NGNTAegIGAdK2Pmd3P5PPtNI=', 'Sh0s3/Bz2zAfldhdENve92ZDnXB+Us9lxFv7itIItfNeGQjrEMrnnZqi6U2/I9rTatEju/zZ+UpR/oxUHDBX0a+8RER3Hse//j1lLq9lSEkggD14/8Z/aDGCFeapFedUK/7uJXgO+uUdLGkSivq0OHQubrydwVPuwsvOqZr+oLJFJvPfIE111Dgkglr0Vnxkscih1wM/Hg21zQdHrrnlLwdi5L8t7dnj6xZ/XT4ItuTJlWXLDQOfvfFC+KO8sjAykI6e8aQcLTdXbkFBfjZkpJC5EDbT0ebYMnLyqO0kbSSRH6+DRXsCO4ZxiuHb84LQ1P8RGkBTIqRlTGt1CFQJsfAMkCWgOKCXuEJpPT/IaY4CN6fHU2uAZXT5aes9rxFkc/KJI6ajEcyYX6ZTbXIKrlh4aL+iO18Vk0MnMXRnwinuwTWdHYSsXbybZbD0sMoY', '2022-11-18 16:00:00', '2022-11-19 09:43:12', NULL, 'PENDING'),
(50, '2022-07-29 00:00:00', 'BxgdxXUDWUnilgL6lSVhFvrJiu1qfDjzS30nuv6xKGM=', 'Vergara St.', 'U74iPkgB4OFOSHnFO/E4momuCZEeOzddRE61kVwHD/Jp5MvEXLThQ7hrLOMBUVba', 'Ywu2wl5+wQ9+RkCoaL90YciVVCViB6CAUNMGE13MOYmIRFCw9kMrF9YjM9lXWzhKamTdjkLdjzWoNXwow1RlBFs09DfXlbVxZ5w41LI3xO43fWzBsOaqZYsZYJJ+EYB5rTL5zWdMolEnVXCxMTftMw==', 'Ng0DXt6eNDQsKxg3HruLGyMT4SQaSpTdEfDB+X/oz5E/MtXDupx9ZEilU9lHy47DhnW7gA0T+5ktvWmEPuHecJ94yoEqcXRcLXlYvTKMrli5wm+AUzImfxTjVAo9+Hph1tNEzLjuqcQ9At66MmvDb31hg3aaZvZ5UdwhEGsYQHjgrULIA8FQsK0kz/PzhnoKw+qU2eStcxPXuDwujpEBt7LLfBXnJNyaR+eGkUWdtNjs5nC5BZcYouPhDVTx4feoFmT6VDs0NavO9RHKLS15Iw==', '2022-11-18 16:00:00', '2022-11-19 09:43:43', NULL, 'PENDING'),
(51, '2022-04-15 00:00:00', 'BxgdxXUDWUnilgL6lSVhFvrJiu1qfDjzS30nuv6xKGM=', 'Vergara St.', 'WarQlwlKk7b/VX9RN+5ck6ZEgm5/A9Bg1DAIjxlIzWFp5MvEXLThQ7hrLOMBUVba', 'ntvu6LB10EYtEwj6+3ROJY28t1IqEbc9j7tTmMcISjMyyfM1M9xbD9RBV+4YdSsrHUp/eeBhzko0wcRSI3jM1kRDnJWFYTTfktLE18DjVD/MqgTMPnSfp2hvRRUxU6S7r40hGRrgVEaGk2qBf0PMHP5mvFtLxd+V8lonwcxp73JKvYNO3u2pE4c1PqKyvW3H', 'JMwoV+ALt0iyW6IpitEOvo000vZKFge9IGfyN5bdM7/gOQRC51bw3qCOYQyEKOrj9QLAWfZBHmv7W8SmXA5Auol8WlbDLAr/oHZ3j1rqdRwCAk1jUmPvUufLjogAWyNONfcbLkIME0cIKznTOxBB85G9GfPDAxtbMauANT5nGxnfaIxJRRm8LC3VPWKhKuTSwSqfseC9AiXIIjzzcYznvs7OtGhqGj/39Z/EWk49hIGM4IbkkjwKeo/7YfaagACnRP2b6uMd2JtPbzxZmH//GMdkGVr/74mTnCLprr34zsD73JVXOlW8NOnAB1Q2N5KwbLYIaiCoYwjc1s8OZMGN5Q==', '2022-11-18 16:00:00', '2022-11-19 09:44:11', NULL, 'PENDING'),
(52, '2022-10-22 00:00:00', 'IexTBamxYFXOMbc3B1tOUWqjvmsBGhRg6FwWm27zAAI=', 'Vergara St.', 'PSQBTFR+4GAgSwLN/ZWP4npfkBwLpR5CzJGXbG5VsdNp5MvEXLThQ7hrLOMBUVba', 'hI+zr5w7LdmmeLkpDbx6lLH5+GE9hmnCfaApx92mHoEyytRmMpzuLgk9gd69xi8wvi3yvSVAjX9qXDquSBqGvpFMnnFoDzEpneNnJyIZ9I8kGqX9Js5pfwlCbgiU/6R/', 'JMwoV+ALt0iyW6IpitEOvnMgPyAfAaLeZJ5SagXaS4vRXA+DTTFBGhlK6mLvdxi6xb/q6o+4Ap6cwtVwIGLanqTZpeSmZoQx7bH4ZWFA8tZp9JtU2hEqW4m1pMOcA02U3kbqPfY3i+YSXYcUpzP1ouKP7woo+CfsorTOtEbT6mCNvgLQXFUuJFsDtQJf3t+RlKckQ2ALpcG9vJ1+fDoCOBCrCAtkZlnG13pSz7W/J544Ol9TNhPY0zAsLI62lJsVeuMXnxz25KziRc10v+NBy8T16ZvCKfmzpWvDp6OE3ZRlPq9nNVYjRJrUK8f0bu5HPA1Diz37TJA9qNbpj1UmJG5mvURVmkf/fCaNHRfq72zCmI1wml59/VghvFgXmMT9', '2022-11-18 16:00:00', '2022-11-19 09:45:15', NULL, 'PENDING'),
(53, '2022-12-03 00:00:00', 'ddBiIfSo8Dg5hnScmGaCsOhuoEt5bh4keu9MrxPCc6s=', 'Vergara St.', 'eBpYIF7jFgFxjl1rOdVQEaH8ER8lQsXoi6ftfQzIxqBp5MvEXLThQ7hrLOMBUVba', 'WqsW+ZQsSI6RtZ1IfHChJHKPKUxcid7Y8fpPjRejqduK/WfgxeoG+VSCqn0tfyjdnwNzI/6onMNn7IRLRIJ/dPsqZOL7syFsYlSP5qswwawdKn9Vt+wO0wh6Nyml3w0aWN9RlyD5SlIpi4eYY5l11D92MjYP1flUUEesqczW3Wg=', 'la/hSCjNdzMlRmsGVIteIe3AtyY5kHYLarobsJBjggXRlUVZ8BP89qAiYMe442r5+CzZGwZgx+xBUpzM9/DLBe00XVt0k+kB1bcEFCU2dvWDZBURtW5GILSsR4jJHTyHP8qFvYl6cqQ//oS/y7F/tkWZGh/SKwv8IJYCTYK7XykQ+OtrxZjSbqYxMlHGc0Ew3axVVL0ZeStNp42MO6xux12JANrSVy78HaGFKHZ53/Eya2bDvyrA5bKF+HA0v6p1nFWwG4HhLMJmjm3GTIKZ44DVV3aXROihipkpChfi3QNzzXPjHBTc7SAGAMFCyeKwc1QHDuUrunPJv3Lt54WjE/Mcl34meVqEC05/3Go66TtEwr1Rmwit1pLoxA8rUg2YaUB+FkchyNIhNchVpbCSvFrWdol1F5E0eQDCjhT7FBIgw2wDJ6oAoUFj9HTjlu0/8m+v/zxTrdBDqFNE9frQpCWSgjXpqqFdizFZmiMOo2P2lauZ2FlPrnQPRCu0S5J2', '2022-11-18 16:00:00', '2022-11-19 09:45:48', NULL, 'PENDING'),
(54, '2022-02-14 00:00:00', 'rPLgCJZYDhWbvZhimib0zhVuxK3Dt20zGoZ/WSuFZKc=', 'Vergara St.', 'JUIeWF7vTgAojd/oxG00paZEgm5/A9Bg1DAIjxlIzWFp5MvEXLThQ7hrLOMBUVba', 'Cdxc6IC+dzyZPALTGHQ9g6fUa9YaC4Fd2eQEjURHsrsWNXBb07aIMauho/8USvEITyGbLw78dIuKbNW7izRKGD5Lak5sIi843dsKpRyiMklO4IHySUQBaR6Opgut6hFP', 'wmXDQjIHoJhK4XKeJNowmdr2QmRpb+YI2/ZyYGm4Lj/q2qqPW3/yYyqP8myiAZRSuq/REBo5PibyHnzCUdKdOcDzbzkCeDiQ1rzmzecttorW1jIULZKsUlDHFoo8DkvJN+Iq2Z5M2y0nUvLNO3b7LNoxrTaUb/k6v0GbsC/D+B4MzwVvX0rSt0JhrAq1T7vSKifXN9NtGd0wyy72HRrnsryD1rbf+BB9Eg1KvzsBQYMRPT3hgMan04C3i+zZMOpx', '2022-11-18 16:00:00', '2022-11-19 09:46:18', NULL, 'PENDING'),
(55, '2022-04-16 00:00:00', 'AmAKrHMRv5bRGhbXfJl2JgeZPKIPb7C5ce62+jnexGc=', 'Vergara St.', 'mfoS5Bll77P10QqJf0InoU/wAALptelCBJntAzRpJP1p5MvEXLThQ7hrLOMBUVba', '42ZEBlUtuggCtNBYgWTB0sANIUeOs5CeQwghRCmjWk2Jj2w9y26ADXP3FgyU5W+k82Z+IwBFrPoccFIa76hyPwgNee3inmJoMPAR/5Xi4Z2fa6Xd0mCKSUDFoLv6VWT7ZiIJCynM0MtFIeTgjbyoDg==', 'F8dmAeB9U12tKvPCG04F4w+qWZZInzBkZrOvDHfszOp9t2WdCiSyiS3AK1zZNCNJokkgz8wGkUaieQpvYdMfsYaNDRT5DjkPRAuTWMLfux4jhusLg0mulWLBZMJgttd8BRYeNsvG8Z81gaFNHxOPyZ9zf2F3weYzrJPLkOzDa+6OLkbq1tzLlFUF31UEWM0Vz+WXIelPtmoWVk9CJ+UduP8/JreiaxUMbdm+ndk16LrMW6RCBneo8fLJDw3+706c', '2022-11-18 16:00:00', '2022-11-19 09:46:50', NULL, 'PENDING'),
(56, '2022-07-14 00:00:00', 'uyngXFPNew3J0OCMehESZBCG6ydaMGuFmXmKnOdbX8A=', 'Vergara St.', '8PyUcuam/bMuKp9EsD+C3omuCZEeOzddRE61kVwHD/Jp5MvEXLThQ7hrLOMBUVba', 'F4ZUaS2CtMkQZq6BMbYKP2Nv8ScTHA8YqUH1pfaddo62hWVuCKaJlLFr1AxpfHqizpKUuxN9PyJWrIqYznwxg7ouDtNd5/rXUwTTg6aHc8nIMM3VRQh9keR/22PGsWIYqj8XlH/ZEJ7yKUg/Jt9gHo8A/4nrk64pDX2oVy8DAys=', '1mddIsT2aAA7vp0VLCnUbwbPqn58Bepj054B84DP62xud5gnzZ03oI50n24uTqx2Xv3TSPVNPC+J42PfMa95EjrqbLlbJyYSdZe6+TPlj3poopccRaraMXXwkav+ZexVnTkL91BF5GQhKNZSMDEHGVHBB8nQmzML5yB5iPCGylOqis3o0GyXxSYH8DTkpERmh2OYWTD1dFNlWpM88eP+w9ch9ZT0Wo5QmH88YCAimcBTknK8Ax1bnSKigK6dzlnq9NfJ0TqWRkuwVksSfdf6kzQPSYJawskYEJOiUZQ0iOp8Dq3kIv5Hs758Kbg0K8T0', '2022-11-18 16:00:00', '2022-11-19 09:47:21', NULL, 'PENDING'),
(57, '2022-04-16 00:00:00', 'IexTBamxYFXOMbc3B1tOUQSjm2oANiROUZSQKNFadqG72JNUKRm6+inRLso8tDQQ', 'Vergara St.', 'Wba31Uu6aHjbUIblaRYMOlZ1QnsRk1IN+YqjooQQNj9p5MvEXLThQ7hrLOMBUVba', 'r2Tf/aU/3lRIqIhkQZSSaRdaw7VaF/rXghfO8jQ+ubUZrAm/3ynWnCyD97/gUWettISMhBVZ6H4zu6wb99rppODryZOeeJiedKGIW8e/HcQ=', 'JMwoV+ALt0iyW6IpitEOvpdQLOklLZnTBFuDPQEiw+ABTejBg8gRQOXgXPc3RBYBiX3eKkqVfXxKNousrKEdY/2QRGIZzmtGo/xZ5JoyOyWuPkwaCvamxIPkZFdjr9iYTSFSGa99nMiVEzH0vmat0IQ5VxLl1qIwS7IuH2TfPgDwjVtmFW95++nRl6acm/cA+VzIFCMYy5mQiTKQ/Vl1CWJKJJId1y7Fy4TQUFLzNPdVOnntwWgJofzrDskP2PGJ0aW260NV5UKNwk8cgftxld5ZlLpKfLiAeUU56ykDli8=', '2022-11-18 16:00:00', '2022-11-19 09:47:45', NULL, 'PENDING'),
(58, '2022-09-20 00:00:00', 'AmAKrHMRv5bRGhbXfJl2JgeZPKIPb7C5ce62+jnexGc=', 'Vergara St.', '5KA59YRYmYtbYDTKxoy0tlZ1QnsRk1IN+YqjooQQNj9p5MvEXLThQ7hrLOMBUVba', '1mddIsT2aAA7vp0VLCnUb0uWNnfosxT5qPrm06L6cz1wxL/0erIz+1NIYGtpA3iqWeA0nXC1pazWHHp60XsVTyqZlsAJjS/b1b8SLLd4VtdueEPnctS4ey3W1P35VhS+gc/fDl0n28+sp2+X9+7zyA==', 'J5eZNH2Nq6QKePeEbXIAq6gSb8VVdZU/rooaH5dtBnv/VnV3ySDtNe21vNKjcatMib0+1pI9TdOsXuhxbzsys9Qe1jIdt2NTDYV3jQaE83Nffxz3G+2wlnSFtY/LdXYnERrJymQbOORC55/vmZnz/XA6gbbFMZWOybOaDLatvYCzMGFfoNrTFTbnDICh7QrG', '2022-11-18 16:00:00', '2022-11-19 09:48:10', NULL, 'PENDING'),
(59, '2022-10-09 00:00:00', 'IexTBamxYFXOMbc3B1tOUWqjvmsBGhRg6FwWm27zAAI=', 'Vergara St.', 'EhBIq3D3MKNjsg9EssOjJ0/wAALptelCBJntAzRpJP1p5MvEXLThQ7hrLOMBUVba', 'mIPzdZOJ3l7zAniUatVNG9IKQNwBwW//Vtt6JJKzdT5++DukVScazRdb6O6CTi3+3e45fioUd3Hr8+ppi4ifU3XulhKt9LgjbKYH1dMaIvD2EAyJt1VMyGu8mERRNbla', '5o0K2I1ZkmsPg5Aly/gKYbpg98chC3pYtLWFnNdFecWQAisaQchKqedczebZp246TjVz/37/Oa+cyZZRESZtkutmBr/FPNh7xPVNu2poA8tqOhCcXfmtkEq2aftNao8cGf0L+GC5CoreNInb2vrxbLWrPdpP2OM9HksZXT/iAGoiCJi8oSvT/0M+lxNMkP+SAguXZ611ZTVZJw/Q8xQQgO4Pr0KYtUmQbInvl3Yl2RY=', '2022-11-18 16:00:00', '2022-11-19 09:49:04', NULL, 'PENDING'),
(60, '2022-11-25 00:00:00', 'AmAKrHMRv5bRGhbXfJl2JgeZPKIPb7C5ce62+jnexGc=', 'Vergara St.', 'EhBIq3D3MKNjsg9EssOjJ08wUnVjMR5yshf6h3CUDhtp5MvEXLThQ7hrLOMBUVba', 'Rt9JFFTOO9ak54uSyvHYAlE7x8p4CG5XmLvsvHHgmzOEo9mwZpZruaaY9CNmf2F+6X7ezhZzFqulr7NGDlFY6T92MjYP1flUUEesqczW3Wg=', 'JMwoV+ALt0iyW6IpitEOvhJySKt/UZIFLKBCOmgkzpH/bZseLSu3bmmzaNyDEYZZBoxVVtQLzdLJ7YHmLks6hCTqJ0QYaODOD2YfDZT6kx+F656FKOr/CR1gW4iPujDfLbzYevMlhLzfDpjRKfav8XmfRzdShrAPfzcnGM6sIVwO7SJrExDQ7y54tU7e/sAQh5N6P/Vkwk1fGWajeMnkAF1QSHYDMXLyMSmorFPwk3Y=', '2022-11-18 16:00:00', '2022-11-19 09:49:35', NULL, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9wFPOcPKrfCQaWR3RtDeIHEAUq3TZb8IYUCT8bCy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVU54ak83OUFCa0x4VmhZaHVRaTZHS0ZUaW5PQlZQNjBsRWdjdDYyUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1669079263),
('j1rCT7vYvgsnjPjgz0yeOJANZDazcrZEAGfsA2y9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYVNhUnZudzAwM1gyckpVY2pBdGpmTFdQNXZGSFY1aEZhODZyMGFDeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1669097851),
('Yghgt3YdsUpJoxxmWWf9J1AnYN3LOzJPZA0VERzK', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS0xZQWZESm1mbmJlTDMwYTlEemhtNzJtUXJqRm9FeU5pT25zRUEyTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ibG90dGVyL3Nob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1669080555);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_by` bigint(20) UNSIGNED DEFAULT NULL,
  `user_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `signature` bigint(20) UNSIGNED DEFAULT NULL,
  `year_of_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `registered_by`, `user_type_id`, `position_id`, `signature`, `year_of_office`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Ma. Aileen Frances A. Zarate', 'mharmicu@gmail.com', '2022-08-11 16:27:05', '$2y$10$aDaZTZlWIRHf0/NAGEKxuOQa3roJznOdLYK0d7lWM/rb94auSRsSu', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2022-08-11 16:26:19', '2022-11-04 11:56:27', 1),
(2, 'Angel De Jesus', 'msammanali@tip.edu.ph', '2022-09-22 06:47:13', '$2y$10$5ZjkEXxlscXDUU1cxbCY8uGQWB8ZhO.K1LXy1BW6r.SpTpqAdidI2', NULL, NULL, NULL, 'u6W9FuzsxPaGwHgOeqYtA33Z4fQyoQrHGR7ngityMgjmxPZZWoLlnQ4h3nlp', 1, 2, 3, NULL, NULL, NULL, NULL, '2022-09-22 06:46:53', '2022-10-22 09:49:02', 1),
(7, 'Rosalyn Dalton Jacobs', 'karehosime@mailinator.com', NULL, 'Laravel0908!', NULL, NULL, NULL, NULL, 1, 2, 2, NULL, NULL, NULL, NULL, '2022-10-22 09:47:13', '2022-11-04 05:43:15', 0),
(8, 'Carson Audrey Rios Herring', 'pykehocu@mailinator.com', NULL, 'Laravel0908!', NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, '2022-11-01 07:43:49', '2022-11-01 07:43:49', 1),
(12, 'Lucas Rooney Higgins Wilson', 'dexyzi@mailinator.com', NULL, '$2y$10$ou.akK0mhdjN5XYo.Zpn2ePN/TsavXveUJGojzgzDf/i3bir1s56u', NULL, NULL, NULL, NULL, 1, 1, 2, NULL, NULL, NULL, NULL, '2022-11-01 07:57:29', '2022-11-01 07:57:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Lupon', '2022-08-12 01:23:31', '2022-08-12 01:23:31'),
(2, 'Sangguniang Barangay', '2022-08-12 01:23:52', '2022-08-12 01:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `witnesses`
--

CREATE TABLE `witnesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` bigint(20) UNSIGNED DEFAULT NULL,
  `witness_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `amicable_settlements`
--
ALTER TABLE `amicable_settlements`
  ADD PRIMARY KEY (`settlement_id`);

--
-- Indexes for table `arbitration_agreements`
--
ALTER TABLE `arbitration_agreements`
  ADD PRIMARY KEY (`agreement_id`),
  ADD KEY `arbitration_agreements_hearing_id_foreign` (`hearing_id`);

--
-- Indexes for table `arbitration_awards`
--
ALTER TABLE `arbitration_awards`
  ADD PRIMARY KEY (`award_id`),
  ADD KEY `arbitration_awards_made_by_foreign` (`made_by`);

--
-- Indexes for table `blotter_report`
--
ALTER TABLE `blotter_report`
  ADD PRIMARY KEY (`case_no`),
  ADD KEY `blotter_report_processed_by_foreign` (`processed_by`);

--
-- Indexes for table `case_hearings`
--
ALTER TABLE `case_hearings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_hearings_case_no_foreign` (`case_no`),
  ADD KEY `case_hearings_hearing_id_foreign` (`hearing_id`);

--
-- Indexes for table `case_involved`
--
ALTER TABLE `case_involved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_involved_case_no_foreign` (`case_no`),
  ADD KEY `case_involved_complainant_id_foreign` (`complainant_id`),
  ADD KEY `case_involved_respondent_id_foreign` (`respondent_id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_actions`
--
ALTER TABLE `court_actions`
  ADD PRIMARY KEY (`court_action_id`),
  ADD KEY `court_actions_case_no_foreign` (`case_no`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hearings`
--
ALTER TABLE `hearings`
  ADD PRIMARY KEY (`hearing_id`),
  ADD KEY `hearings_settlement_id_foreign` (`settlement_id`),
  ADD KEY `hearings_award_id_foreign` (`award_id`),
  ADD KEY `hearings_hearing_type_id_foreign` (`hearing_type_id`);

--
-- Indexes for table `hearing_notices`
--
ALTER TABLE `hearing_notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hearing_notices_notice_id_foreign` (`notice_id`),
  ADD KEY `hearing_notices_hearing_id_foreign` (`hearing_id`);

--
-- Indexes for table `hearing_types`
--
ALTER TABLE `hearing_types`
  ADD PRIMARY KEY (`hearing_type_id`);

--
-- Indexes for table `incident_case`
--
ALTER TABLE `incident_case`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incident_case_article_no_foreign` (`article_no`),
  ADD KEY `incident_case_case_no_foreign` (`case_no`);

--
-- Indexes for table `kp_cases`
--
ALTER TABLE `kp_cases`
  ADD PRIMARY KEY (`article_no`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `notices_notified_by_foreign` (`notified_by`),
  ADD KEY `notices_case_no_foreign` (`case_no`),
  ADD KEY `notices_notice_type_id_foreign` (`notice_type_id`);

--
-- Indexes for table `notice_type`
--
ALTER TABLE `notice_type`
  ADD PRIMARY KEY (`notice_type_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `personnel_position`
--
ALTER TABLE `personnel_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person_signature`
--
ALTER TABLE `person_signature`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `person_signature_person_id_foreign` (`person_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`),
  ADD KEY `users_position_id_foreign` (`position_id`),
  ADD KEY `users_signature_foreign` (`signature`),
  ADD KEY `registered_by` (`registered_by`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `witnesses`
--
ALTER TABLE `witnesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `witnesses_case_no_foreign` (`case_no`),
  ADD KEY `witnesses_witness_id_foreign` (`witness_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `amicable_settlements`
--
ALTER TABLE `amicable_settlements`
  MODIFY `settlement_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arbitration_agreements`
--
ALTER TABLE `arbitration_agreements`
  MODIFY `agreement_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arbitration_awards`
--
ALTER TABLE `arbitration_awards`
  MODIFY `award_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blotter_report`
--
ALTER TABLE `blotter_report`
  MODIFY `case_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022031;

--
-- AUTO_INCREMENT for table `case_hearings`
--
ALTER TABLE `case_hearings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_involved`
--
ALTER TABLE `case_involved`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `court_actions`
--
ALTER TABLE `court_actions`
  MODIFY `court_action_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hearings`
--
ALTER TABLE `hearings`
  MODIFY `hearing_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hearing_notices`
--
ALTER TABLE `hearing_notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hearing_types`
--
ALTER TABLE `hearing_types`
  MODIFY `hearing_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incident_case`
--
ALTER TABLE `incident_case`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kp_cases`
--
ALTER TABLE `kp_cases`
  MODIFY `article_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_type`
--
ALTER TABLE `notice_type`
  MODIFY `notice_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnel_position`
--
ALTER TABLE `personnel_position`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `person_signature`
--
ALTER TABLE `person_signature`
  MODIFY `file_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `witnesses`
--
ALTER TABLE `witnesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arbitration_agreements`
--
ALTER TABLE `arbitration_agreements`
  ADD CONSTRAINT `arbitration_agreements_hearing_id_foreign` FOREIGN KEY (`hearing_id`) REFERENCES `hearings` (`hearing_id`) ON DELETE CASCADE;

--
-- Constraints for table `arbitration_awards`
--
ALTER TABLE `arbitration_awards`
  ADD CONSTRAINT `arbitration_awards_made_by_foreign` FOREIGN KEY (`made_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blotter_report`
--
ALTER TABLE `blotter_report`
  ADD CONSTRAINT `blotter_report_processed_by_foreign` FOREIGN KEY (`processed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `case_hearings`
--
ALTER TABLE `case_hearings`
  ADD CONSTRAINT `case_hearings_case_no_foreign` FOREIGN KEY (`case_no`) REFERENCES `blotter_report` (`case_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `case_hearings_hearing_id_foreign` FOREIGN KEY (`hearing_id`) REFERENCES `hearings` (`hearing_id`) ON DELETE CASCADE;

--
-- Constraints for table `case_involved`
--
ALTER TABLE `case_involved`
  ADD CONSTRAINT `case_involved_case_no_foreign` FOREIGN KEY (`case_no`) REFERENCES `blotter_report` (`case_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `case_involved_complainant_id_foreign` FOREIGN KEY (`complainant_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `case_involved_respondent_id_foreign` FOREIGN KEY (`respondent_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE;

--
-- Constraints for table `court_actions`
--
ALTER TABLE `court_actions`
  ADD CONSTRAINT `court_actions_case_no_foreign` FOREIGN KEY (`case_no`) REFERENCES `blotter_report` (`case_no`) ON DELETE CASCADE;

--
-- Constraints for table `hearings`
--
ALTER TABLE `hearings`
  ADD CONSTRAINT `hearings_award_id_foreign` FOREIGN KEY (`award_id`) REFERENCES `arbitration_awards` (`award_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hearings_hearing_type_id_foreign` FOREIGN KEY (`hearing_type_id`) REFERENCES `hearing_types` (`hearing_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hearings_settlement_id_foreign` FOREIGN KEY (`settlement_id`) REFERENCES `amicable_settlements` (`settlement_id`) ON DELETE CASCADE;

--
-- Constraints for table `hearing_notices`
--
ALTER TABLE `hearing_notices`
  ADD CONSTRAINT `hearing_notices_hearing_id_foreign` FOREIGN KEY (`hearing_id`) REFERENCES `hearings` (`hearing_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hearing_notices_notice_id_foreign` FOREIGN KEY (`notice_id`) REFERENCES `notices` (`notice_id`) ON DELETE CASCADE;

--
-- Constraints for table `incident_case`
--
ALTER TABLE `incident_case`
  ADD CONSTRAINT `incident_case_article_no_foreign` FOREIGN KEY (`article_no`) REFERENCES `kp_cases` (`article_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `incident_case_case_no_foreign` FOREIGN KEY (`case_no`) REFERENCES `blotter_report` (`case_no`) ON DELETE CASCADE;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_case_no_foreign` FOREIGN KEY (`case_no`) REFERENCES `blotter_report` (`case_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `notices_notice_type_id_foreign` FOREIGN KEY (`notice_type_id`) REFERENCES `notice_type` (`notice_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notices_notified_by_foreign` FOREIGN KEY (`notified_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `person_signature`
--
ALTER TABLE `person_signature`
  ADD CONSTRAINT `person_signature_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `registered_by` FOREIGN KEY (`registered_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `personnel_position` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_signature_foreign` FOREIGN KEY (`signature`) REFERENCES `storage` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `witnesses`
--
ALTER TABLE `witnesses`
  ADD CONSTRAINT `witnesses_case_no_foreign` FOREIGN KEY (`case_no`) REFERENCES `blotter_report` (`case_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `witnesses_witness_id_foreign` FOREIGN KEY (`witness_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
