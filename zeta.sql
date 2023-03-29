-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2023 at 01:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `healthworker`
--

CREATE TABLE `healthworker` (
  `id` int(11) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `email` varchar(300) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `healthworker`
--

INSERT INTO `healthworker` (`id`, `fullname`, `email`, `image`, `password`, `date`) VALUES
(1, 'kjhg', 'kjhg@lkj.co', '', 'feefefefef.kjk', '2022-11-30 23:38:00'),
(2, 'neo stalwart', 'otokitivictor@gmail.com', '', '$2y$10$l2NHpd47IkcL6xcO.nTive8fUctmodkRvIVLpuRtjlkPshkuCBliG', '2022-12-02 15:30:17'),
(3, 'izakerbel', 'izakerbel@gmail.com', NULL, '$2y$10$fshhYDhy2NQf9qSzjUsQHO.cnpDHA.c5z89158gN9XT44S2mo5hIG', '2023-03-28 22:55:47'),
(4, 'Emmanuel', 'emmanuel@gmail.com', NULL, '$2y$10$AXCgsgvbzK97GMfXow4.Eu967Df3h8ro21M1C/.l4..mzksFUkX2y', '2023-03-28 22:56:29'),
(5, 'Igwe', 'igwee@gmail.com', NULL, '$2y$10$CBO295yZQHSGsXQC0vpSvOI0LqtaaPtsyr./J7qug4LYiebeDoy5G', '2023-03-28 22:57:26'),
(6, 'Titular', 'titular@gmail.com', NULL, '$2y$10$bV/GxvvhDAJtK8nEbYjbEusMS9ULUgj6v4w2S8E0.cqLB4cRoOhnG', '2023-03-28 22:58:51'),
(7, 'Aladelade', 'aladelade@gmail.com', NULL, '$2y$10$i3UYdcIFsX5UAot1eoe0..5LWPBbh46IWaVjBZxEW6g1ZzgF9XICK', '2023-03-28 22:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `othername` varchar(200) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `next_of_kin` varchar(120) NOT NULL,
  `nok_address` varchar(800) NOT NULL,
  `nok_phone` varchar(40) NOT NULL,
  `nok_relation` varchar(60) NOT NULL,
  `type_of_vaccine` varchar(30) NOT NULL,
  `vaccine_start` varchar(20) NOT NULL,
  `vaccine_end` varchar(20) DEFAULT NULL,
  `vaccine_ref` varchar(250) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `firstname`, `lastname`, `othername`, `dob`, `gender`, `address`, `phone`, `next_of_kin`, `nok_address`, `nok_phone`, `nok_relation`, `type_of_vaccine`, `vaccine_start`, `vaccine_end`, `vaccine_ref`, `status`, `created_at`, `updated_at`) VALUES
(3, 'pat7644', 'alabi', 'yellow', 'musa', '1995-01-18', 'Male', 'abusoro off olufoam akure', '08169421019', 'jdjd', 'abusoro off olufoam akure', '08155528159', 'Husband', 'Rytonm 099', '2022-11-17', '2022-12-14', '', 'null/partially', 'Sun-Dec-2022 1505:28', '2022-12-04 14:05:29'),
(4, 'pat2876', 'kdkdkd', 'kdddkd', 'eknkrner', '12/4/303', 'Male', 'kkdkkdn dknfdkf dknfkdfnd', '090494484484', 'kdkndkd', 'kdkndid dknfkdnd', '0909449994844', 'Sister', 'Johnson &amp; Johnson + Asyer', '2023-03-29', '2023-04-18', 'VAC-202379890743-244907', 'Fully Vaccinated', '2023-03-28', '2023-03-28 07:17:17'),
(5, 'pat7660', 'lisbon', 'james', 'stollow', '12/2/1990', 'Female', 'kingston college, duaris', '0909484884848', 'Austin clone', 'kingston state house', '09048844848484', 'Sister', 'Johnson &amp; Johnson + Asyer', '2023-03-30', '2023-04-19', NULL, 'Partially Vaccinated', '2023-03-29', '2023-03-28 23:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `patient_log`
--

CREATE TABLE `patient_log` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_log`
--

INSERT INTO `patient_log` (`id`, `patient_id`, `email`, `password`, `date`) VALUES
(1, 'pat2876', 'vhk@gmail.com', '$2y$10$ok6sHK120dohBHsbrR.DMuynpu/z6761nrTdI5nuhU9XqFyWqJmz2', '2023-03-28 06:01:25'),
(7, 'pat7660', 'vik@gmail.com', '$2y$10$yueJNECJ.ZUhei8uPfXgxuabthfS/Pj5AU9xR653rUzh6Yd6PbxJq', '2023-03-28 23:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` int(11) NOT NULL,
  `vaccine` varchar(200) NOT NULL,
  `description` varchar(900) NOT NULL,
  `doze` int(8) NOT NULL,
  `duration` int(8) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `healthworker`
--
ALTER TABLE `healthworker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_log`
--
ALTER TABLE `patient_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `healthworker`
--
ALTER TABLE `healthworker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_log`
--
ALTER TABLE `patient_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
