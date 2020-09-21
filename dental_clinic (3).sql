-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 10:37 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `doctor_id`, `patient_id`, `status`) VALUES
(2, '0000-00-00', 22, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `mobilenumber` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `national_id` int(14) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `fullname`, `mobilenumber`, `title`, `national_id`, `address`) VALUES
(22, 42, 'faoruz', 1111111111, 'dr', 22, 'maadi'),
(23, 43, 'sara elbedeawi', 1001578070, 'dr', 12345678, 'obour');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availability`
--

CREATE TABLE `doctor_availability` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `weekday` text NOT NULL,
  `hour_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor_availability`
--

INSERT INTO `doctor_availability` (`id`, `doctor_id`, `weekday`, `hour_value`) VALUES
(1, 23, 'monday', 13),
(2, 23, 'monday', 14),
(3, 23, 'monday', 15),
(4, 23, 'monday', 16),
(5, 23, 'monday', 17),
(6, 23, 'monday', 18),
(7, 23, 'monday', 19),
(8, 23, 'monday', 20),
(9, 23, 'monday', 21),
(10, 23, 'tuesday', 13),
(11, 23, 'tuesday', 14),
(12, 23, 'tuesday', 15),
(13, 23, 'tuesday', 16),
(14, 23, 'tuesday', 17),
(15, 23, 'tuesday', 18),
(16, 23, 'tuesday', 19),
(17, 23, 'tuesday', 20);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_speciality`
--

CREATE TABLE `doctor_speciality` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor_speciality`
--

INSERT INTO `doctor_speciality` (`id`, `doctor_id`, `speciality_id`) VALUES
(1, 23, 1),
(2, 23, 2),
(3, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hours_value`
--

CREATE TABLE `hours_value` (
  `value` int(11) NOT NULL,
  `hour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hours_value`
--

INSERT INTO `hours_value` (`value`, `hour`) VALUES
(8, '08:00AM--09:00AM'),
(9, '09:00AM--10:00AM'),
(10, '10:00AM--11:00AM'),
(11, '11:00AM--12:00PM'),
(12, '12:00PM--01:00PM'),
(13, '01:00PM--02:00PM'),
(14, '02:00PM--03:00PM'),
(15, '03:00PM--04:00PM'),
(16, '04:00PM--05:00PM'),
(17, '05:00PM--06:00PM'),
(18, '06:00PM--07:00PM'),
(19, '07:00PM--08:00PM'),
(20, '08:00PM--09:00PM'),
(21, '09:00PM--10:00PM'),
(22, '10:00PM--11:00PM'),
(23, '11:00PM--12:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `reply` text NOT NULL,
  `status` int(2) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `message`, `reply`, `status`, `patient_id`) VALUES
(8, 'omar', 'yesssssss', 1, 12),
(9, 'liiiiiiiii', 'looooooo', 1, 12),
(10, '$from', 'hehehehehe', 1, 12),
(13, 'John', 'johnaa', 1, 12),
(14, 'btngan ', 'gazar\n', 1, 12),
(15, 'gooo', 'yea', 1, 12),
(16, 'i want to make a reservation', 'of course', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `mobilenumber` text NOT NULL,
  `address` text NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `fullname`, `mobilenumber`, `address`, `age`) VALUES
(12, 41, 'sara', '0100000000000', 'obour', 20);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `img` blob NOT NULL,
  `caption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `patient_id`, `doctor_id`, `img`, `caption`) VALUES
(1, 12, 22, 0x756e646f6e652e4a5047, ''),
(2, 12, 22, 0x494d475f333438352e4a5047, ''),
(3, 12, 22, 0x494d475f333438352e4a5047, '%image_text'),
(4, 12, 22, 0x494d475f333537312e4a5047, '%image_text'),
(12, 12, 22, 0x494d475f333537312e4a5047, 'oooo'),
(15, 12, 22, 0x494d475f333537312e4a5047, 'oooo'),
(17, 12, 22, 0x494d475f333537312e4a5047, 'oooo'),
(18, 12, 22, 0x494d475f333537312e4a5047, 'oooo'),
(19, 12, 22, 0x494d475f333537312e4a5047, 'oooo'),
(20, 12, 22, 0x494d475f333530392e4d4f56, 'liii'),
(21, 12, 22, 0x494d475f333735332e4a5047, 'yessssssssssss'),
(22, 12, 22, 0x494d475f333537312e4a5047, 'a8ehh'),
(23, 12, 22, 0x494d475f333735332e4a5047, 'dd'),
(24, 12, 22, 0x494d475f333530392e4d4f56, 'ppppppppppppppp'),
(25, 12, 22, '', 'oooooop'),
(26, 12, 22, 0x494d475f333530392e4d4f56, 'p'),
(27, 12, 22, 0x494d475f333530392e4d4f56, 'p'),
(28, 12, 22, 0x494d475f333530392e4d4f56, 'p');

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL,
  `service` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`id`, `service`, `price`) VALUES
(1, 'Checkup', 70),
(2, 'Hygiene Appointment', 95),
(3, 'Dental Gold Fillings', 400),
(4, 'Dental Porcelain Fillings', 500),
(5, 'Dental Silver Fillings', 300),
(6, 'Dental Implant', 1000),
(7, 'Tooth Extraction', 120),
(8, 'Upper Wisdom Removal', 150),
(9, 'Lower Wisdom Removal', 250),
(10, 'Root Canal Treatment', 700),
(11, 'Veneer', 295),
(12, 'Deep Tooth Whitening', 395);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `name`) VALUES
(1, 'Dental Public Health '),
(2, 'Endodontics '),
(3, 'Oral and Maxillofacial Surgery '),
(4, 'Oral Medicine and Pathology '),
(5, 'Oral & Maxillofacial Radiology \r\n'),
(6, 'Orthodontics and Dentofacial Orthopedics '),
(7, 'Pediatric Dentistry \r\n'),
(8, 'Periodontics ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`) VALUES
(41, 'sara@gmail.com', '12345', 1),
(42, 'sara.elbedeawy@live.com', '1234', 1),
(43, 'saraa@gmail.com', '12345', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `hour_value` (`hour_value`);

--
-- Indexes for table `doctor_speciality`
--
ALTER TABLE `doctor_speciality`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`,`speciality_id`),
  ADD KEY `speciality_d` (`speciality_id`);

--
-- Indexes for table `hours_value`
--
ALTER TABLE `hours_value`
  ADD PRIMARY KEY (`value`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `doctor_speciality`
--
ALTER TABLE `doctor_speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `price_list` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  ADD CONSTRAINT `doctor_availability_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doctor_availability_ibfk_2` FOREIGN KEY (`hour_value`) REFERENCES `hours_value` (`value`);

--
-- Constraints for table `doctor_speciality`
--
ALTER TABLE `doctor_speciality`
  ADD CONSTRAINT `doctor_speciality_ibfk_2` FOREIGN KEY (`speciality_id`) REFERENCES `specialties` (`id`),
  ADD CONSTRAINT `doctor_speciality_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
