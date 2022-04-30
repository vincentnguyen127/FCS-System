-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2022 at 04:19 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `dob` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `middle_name`, `email`, `password`, `dob`, `created_at`) VALUES
(1, 'vincent', 'nguyen', 'x', 'tommynguyen12791@gmail.com', '123456789', '2022-04-04', '2022-04-24 16:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(6) UNSIGNED NOT NULL,
  `service` varchar(100) NOT NULL,
  `other` varchar(100) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `physician_schedule_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `service`, `other`, `patient_Id`, `physician_schedule_id`, `created_at`) VALUES
(1, 'Annual Check Up', 'Early detection of illnesses often', 1, 3, '2022-04-17 13:57:49'),
(30, 'Skin Disorders', 'NA', 1, 5, '2022-04-17 15:33:47'),
(31, 'Nephrology', 'Don\'t feel like eating', 1, 6, '2022-04-17 15:35:04'),
(32, 'Internal Medicine', 'Take another prescription as discussed with doctor', 1, 7, '2022-04-17 15:35:04'),
(33, 'DOT Physical Exams', 'AS SOON AS POSSIBLE', 31, 8, '2022-04-17 15:35:04'),
(34, 'Immigration Physical Exams', 'NA', 31, 9, '2022-04-17 15:35:04'),
(35, 'Annual Check Up', 'Lose weight a lot', 31, 10, '2022-04-17 15:35:04'),
(36, 'Skin Disorders', 'Face has a lot of pimples ', 31, 11, '2022-04-17 15:35:04'),
(37, 'Nephrology', 'Need to check up to see anything early symtomps', 31, 12, '2022-04-17 15:35:04'),
(38, 'Internal Medicine', 'The previous prescription makes me to fall asleep harder', 31, 13, '2022-04-17 15:35:04'),
(39, 'DOT Physical Exams', 'NA', 34, 14, '2022-04-17 15:35:04'),
(40, 'Immigration Physical Exams', 'Pickup documents', 35, 15, '2022-04-17 15:35:04'),
(41, 'Immigration Physical Exams', 'Add more documents to the folder', 34, 16, '2022-04-17 15:35:04'),
(42, 'Annual Check Up', 'Need some vitamins', 33, 17, '2022-04-17 15:35:04'),
(59, 'checkup', '', 1, 22, '2022-04-25 15:24:39'),
(60, 'checkup', '', 1, 17, '2022-04-25 15:28:26'),
(61, 'checkup', '', 1, 1, '2022-04-25 15:31:34'),
(62, 'checkup', '', 1, 16, '2022-04-26 23:59:37'),
(70, 'checkup', '', 1, 15, '2022-04-27 11:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phone_number` varchar(125) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `first_name`, `last_name`, `middle_name`, `email`, `password`, `address`, `phone_number`, `dob`, `gender`, `added_on`) VALUES
(1, 'Mike', 'Nguyen', '', 'vnguyen84@gwmail.com', '123456789', '9447 Fairfax BLVD, apt 101', '5712222525', '1222-05-05', 'Male', '2022-04-24 19:02:58'),
(31, 'Vincent', 'Nguyen', '', 'tommynguyen1273491@gmail.com', '123456789', '94474 fairfax blvd', '571-225-5152', '1995-04-11', 'Male', '2022-04-13 00:00:00'),
(33, 'Christina', 'Huynh', '', 'christinah@gwu.edu', '123456789', '2121 I St NW, Washington, DC 20052', '701-222-333', '1997-08-18', 'Female', '2022-04-13 00:00:00'),
(34, 'Chike', 'Ijemba', '', 'chike@gmail.com', '123456789', '5555 Leesburg Pike, Alexandria, VA 22333', '577-000-3321', '1980-04-25', 'Male', '2022-04-13 00:00:00'),
(35, 'Getinet', 'Bogale-Alemayehu', '', 'getinet@gmail.com', '1234456789', '2121 Rich Demond St, McLean, VA 22111', '874-513-1213', '1991-02-11', 'Male', '2022-04-17 15:00:12'),
(36, 'Thuy', 'Truong', '', 'thuy@gmail.com', '1234456789', '4423 Columbia Pike, McLean, VA 12122', '745-512-1354', '1996-07-19', 'Female', '2022-04-17 15:00:14'),
(43, 'Michael', 'Smith', 'Liam', 'michael@gmail.com', '123456789', '94474 fairfax blvd ', '651-635-2216', '1965-07-03', 'Male', '2022-04-17 15:07:12'),
(44, 'Angelique', 'Ellis', 'Zena', 'Angelique@gmail.com', '123456789', '5121 Duke St, Arlington, VA 23411', '222-5465-416', '1970-09-05', 'Female', '2022-04-17 15:07:41'),
(45, 'Bradley', 'Davis', 'Noah', 'bradley@gmail.com', '123456789', '909 Pike St, Apt 1202, Huntingdon, PA 16652', '814-214-8796', '1974-01-01', 'Male', '2022-04-17 15:07:41'),
(46, 'Lindsay', 'Cooper', 'Monroe', 'lindsay@gmail.com', '123456789', '999 Washington NW, Washington D.C. 22111', '703-143-5749', '2000-12-25', 'Female', '2022-04-17 15:07:41'),
(47, 'Veronica', 'Mason', 'Penn', 'veronica@gmail.com', '123456789', '148 Randolph Rd, Apt 112, Fairfax, VA 21321', '451-517-7788', '1999-02-15', 'Female', '2022-04-17 15:07:41'),
(48, 'Alex', 'Brown', 'Lucas', 'alex@gmail.com', '12345679', '8921 Oliver Street, Bethesda, MD 31211', '512-547-6661', '2001-06-30', 'Male', '2022-04-17 15:09:08'),
(50, 'Savannah', 'Cassidy', 'Everly', 'savannah@gmail.com', '12345679', '784 Moore St, Fairfax, VA 12141', '841-541-2131', '1994-10-15', 'Female', '2022-04-17 15:09:14'),
(52, 'Vincent', 'Nguyen', '', 'vnguyen841@gwmail.gwu.edu', '123456789', '9447 Fairfax BLVD, apt 102', '5712255157', '2022-04-13', 'Male', '2022-04-27 01:06:20'),
(53, 'Vincent', 'Nguyen', '', 'vnguyen8411@gwmail.gwu.edu', '123456789', '9447 Fairfax BLVD, apt 102', '5712255157', '2022-04-13', 'Male', '2022-04-27 01:07:29'),
(54, 'Vincent', 'Nguyen', '', 'vnguyen841111@gwmail.gwu.edu', '123456789', '9447 Fairfax BLVD, apt 102', '5712255157', '2022-04-13', 'Male', '2022-04-27 01:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `physician`
--

CREATE TABLE `physician` (
  `id` int(25) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `phone_number` varchar(125) NOT NULL,
  `dob` date NOT NULL,
  `speciality` varchar(125) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `physician`
--

INSERT INTO `physician` (`id`, `first_name`, `last_name`, `middle_name`, `email`, `password`, `degree`, `phone_number`, `dob`, `speciality`, `created_at`) VALUES
(1, 'Vincent ', 'Nguyen', '', 'vnguyen84@gwmail.com', '123456789', 'degree', '571-225-5152', '1954-04-18', 'abc', '2022-04-17 13:56:30'),
(5, 'Mike', 'K', '', 'hungtran@gmail.com', '123456798', 'Doctor of Medicine ', '521-547-7832', '1996-04-05', 'Medicine', '2022-04-17 15:23:09'),
(8, 'Ivan', 'Morales', 'Tiah', 'ivan8@gmail.com', '123456798', 'Doctor of Pharmacist', '741-566-2222', '1975-01-31', 'Pharmacist', '2022-04-17 15:24:30'),
(9, 'Lam', 'Nguyen', 'Bui', 'lam9@gmail.com', '123456798', 'Pre-med and Nursing', '687-912-3214', '1981-02-24', 'Testing', '2022-04-17 15:24:30'),
(10, 'Alley', 'Peacock', 'Huley', 'alley10@gmail.com', '123456798', 'M.S. in Biology', '717-541-6413', '1980-12-31', 'Physical Exam', '2022-04-17 15:24:30'),
(11, 'Hubley', 'Kinney', 'Tela', 'hubley11@gmail.com', '123456798', 'Biology', '810-654-0418', '1978-10-01', 'Physical Exams', '2022-04-17 15:24:30'),
(12, 'Phuong', 'Tran', 'Thi', 'phuong12@gmail.com', '123456798', 'Biochemistry', '513-987-6541', '1986-07-05', 'Blood Test', '2022-04-17 15:24:30'),
(13, 'Teresa', 'Tran', 'Hoang', 'teresa13@gmail.com', '123456798', 'M.S. in Physics and Biology', '777-421-3205', '1996-09-24', 'NA', '2022-04-17 15:24:30'),
(14, 'Miguel', 'Rulba', 'Ased', 'miguel14@gmail.com', '123456798', 'Nursing', '751-123-4561', '1988-07-19', '', '2022-04-17 15:24:30'),
(15, 'William', 'Nguyen', 'Okla', 'william15@gmail.com', '123456798', 'Chemistry', '621-846-8792', '1989-02-14', 'Blood test, laboratory equipment ', '2022-04-17 15:24:30'),
(16, 'Nandar', 'The', 'Su', 'nandar16@gmail.com', '123456789', 'Biochemistry', '571-000-1111', '1991-11-11', 'Laboratory ', '2022-04-17 15:25:20'),
(17, 'Rush', 'Noah', '', 'rush17@gmail.com', '123456789', 'Nursing', '571-210-1489', '1987-07-17', '', '2022-04-17 15:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `physician_schedule`
--

CREATE TABLE `physician_schedule` (
  `id` int(25) NOT NULL,
  `physician_id` int(25) NOT NULL,
  `appt_date` date NOT NULL,
  `start_time` time NOT NULL,
  `appt_end_time` time NOT NULL,
  `appt_day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `appt_status` enum('Completed','Booked','Cancel','In Process','Reviewed') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `physician_schedule`
--

INSERT INTO `physician_schedule` (`id`, `physician_id`, `appt_date`, `start_time`, `appt_end_time`, `appt_day`, `appt_status`, `created_at`) VALUES
(1, 1, '2022-04-27', '09:00:00', '09:30:00', 'Monday', 'Booked', '2022-04-24 19:11:00'),
(3, 3, '2022-04-25', '09:00:00', '10:00:00', 'Monday', 'Completed', '2022-04-17 13:56:57'),
(5, 5, '2022-04-26', '06:00:00', '07:00:00', 'Tuesday', 'Cancel', '2022-04-17 15:28:34'),
(6, 5, '2022-04-27', '09:45:00', '19:30:00', 'Wednesday', 'Reviewed', '2022-04-17 15:29:42'),
(7, 1, '2022-04-28', '16:30:00', '18:00:00', 'Thursday', 'Completed', '2022-04-17 15:29:42'),
(8, 6, '2022-04-29', '10:00:00', '15:00:00', 'Friday', 'Booked', '2022-04-17 15:29:42'),
(9, 7, '2022-05-02', '12:45:00', '20:15:00', 'Monday', 'In Process', '2022-04-17 15:29:42'),
(10, 8, '2022-05-11', '09:00:00', '16:00:00', 'Wednesday', 'Booked', '2022-04-17 15:29:42'),
(11, 9, '2022-04-12', '15:00:00', '20:00:00', 'Tuesday', 'Reviewed', '2022-04-17 15:29:42'),
(12, 10, '2022-06-09', '09:00:00', '13:00:00', 'Thursday', 'Cancel', '2022-04-17 15:29:42'),
(13, 11, '2022-05-27', '09:00:00', '15:30:00', 'Friday', 'In Process', '2022-04-17 15:29:42'),
(14, 12, '2022-05-28', '09:00:00', '12:00:00', 'Saturday', 'In Process', '2022-04-17 15:29:42'),
(15, 13, '2022-05-25', '09:00:00', '15:00:00', 'Wednesday', 'Cancel', '2022-04-17 15:29:42'),
(16, 14, '2022-04-29', '09:00:00', '16:00:00', 'Friday', 'In Process', '2022-04-17 15:29:42'),
(17, 15, '2022-06-13', '09:00:00', '16:00:00', 'Monday', 'In Process', '2022-04-17 15:29:42'),
(26, 1, '2022-04-29', '09:00:00', '16:00:00', 'Friday', 'In Process', '2022-04-17 15:29:42'),
(27, 1, '2022-06-13', '09:00:00', '16:00:00', 'Monday', 'In Process', '2022-04-17 15:29:42'),
(28, 1, '2022-04-27', '09:41:00', '10:41:00', 'Wednesday', 'In Process', '2022-04-27 07:41:14'),
(29, 6, '2022-05-23', '09:00:00', '16:00:00', 'Friday', 'In Process', '2022-04-17 15:29:42'),
(30, 8, '2022-06-25', '09:00:00', '16:00:00', 'Monday', 'In Process', '2022-04-17 15:29:42'),
(31, 1, '2022-05-17', '09:41:00', '10:41:00', 'Wednesday', 'In Process', '2022-04-27 07:41:14'),
(32, 1, '2022-04-27', '00:46:00', '00:47:00', 'Wednesday', 'In Process', '2022-04-27 11:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(6) UNSIGNED NOT NULL,
  `rating` varchar(100) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `feedback` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `appointment_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating`, `headline`, `feedback`, `created_at`, `appointment_id`) VALUES
(11, 'Excellent', 'Doctors spend more time with me', 'Dr. Hung Tran is an excellent doctor! He’s very understanding and listens to your concerns. He takes time with the patient to help them with their health issues!', '2022-04-13 15:32:12', 1),
(12, 'Excellent', 'Problem Resolved', 'I always have a good time with Fairfax Clinic. Dr. Vincent Nguyen and all the nurses are very professional.', '2022-04-17 19:50:58', 1),
(13, 'Good', '2nd time at Fairfax Clinic', 'My experience is so far good. The nurses took a long time with my prescriptions.', '2022-04-17 19:51:39', 30),
(14, 'Fair', 'This time is a bit unpleasant', 'I had an appointment with Dr. Peacock; however, the front desk staff said no appointment was booked. So I had to wait in line for an hour.', '2022-04-17 19:51:39', 31),
(15, 'Good', 'Good', 'Everything works well.', '2022-04-17 19:51:39', 50),
(16, 'Excellent', 'Deeply understand my health', 'Dr. Teresa Tran explained many things so I can be well aware of my health - very helpful', '2022-04-17 19:51:39', 33),
(17, 'Excellent', 'Highly recommended!', 'My doctor always answered all my questions ', '2022-04-17 19:51:39', 34),
(18, 'Good', 'The online management system got well improved', 'Thanks to Dr. Rulba for giving effective prescriptions and listening to my requests/questions.', '2022-04-17 19:51:39', 35),
(19, 'Good', 'Thank You', 'Dr. Noah addressed all early symptoms I might have in my lungs. He got me some vitamins and they so far work well for me.', '2022-04-17 19:51:39', 36),
(20, 'Good', 'Good', 'Thank you, doctor!', '2022-04-17 19:51:39', 37),
(21, 'Excellent', 'Best service', 'I highly recommend Fairfax Clinic because all the staff is responsive and friendly. They take time to listen to my health concerns.', '2022-04-17 19:51:39', 38),
(22, 'Excellent', 'Improvement', 'Best service and staff', '2022-04-17 19:51:39', 39),
(23, 'Excellent', 'Happy service', 'The offices are always clean. Doctors and staff are super friendly.', '2022-04-17 19:51:39', 40),
(26, 'Excellent', 'fff', 'ffff', '2022-04-24 17:45:59', 36),
(27, 'Excellent', 'ddd', 'ddd', '2022-04-24 17:48:39', 36),
(28, 'Excellent', 'ddd', 'ddd', '2022-04-24 17:49:02', 36),
(29, 'Good', 'bla bla ', 'dsfdsfdsfsd', '2022-04-24 23:06:03', 36),
(30, 'Good', 'good', 'very good ', '2022-04-24 23:08:44', 32),
(34, 'Excellent', 'no', 'no', '2022-04-25 19:33:01', 32),
(35, 'Excellent', 'great', '', '2022-04-27 04:29:46', 31),
(36, 'Excellent', 'great', 'group e should receive an a', '2022-04-27 15:35:07', 32),
(37, 'Excellent', 'great', 'an a for group e thanks professor Shuba', '2022-04-27 15:40:16', 32),
(38, 'Excellent', 'great', 'an A for group e thank you prof. Shuba :3', '2022-04-27 15:45:25', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `physician`
--
ALTER TABLE `physician`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `physician_schedule`
--
ALTER TABLE `physician_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `physician`
--
ALTER TABLE `physician`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `physician_schedule`
--
ALTER TABLE `physician_schedule`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
