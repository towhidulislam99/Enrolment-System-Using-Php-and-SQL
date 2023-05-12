-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 05:19 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `location`) VALUES
(1, 'CSE', '3rd Floor 302'),
(2, 'ECE', '1st Floor Room No:105'),
(3, 'BBA', '4th Floor Room No: 407'),
(4, 'Economics', 'New Building, 5th Floor, Room No: 525'),
(5, 'Tourism and hospitality management', '5th floor Room No: 512');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `id` int(10) NOT NULL,
  `s_roll` varchar(11) NOT NULL,
  `ex_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `Tutionfee` varchar(255) NOT NULL,
  `ex_fee` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` timestamp(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`id`, `s_roll`, `ex_name`, `department`, `Tutionfee`, `ex_fee`, `due`, `status`, `datetime`) VALUES
(1, '2000555', 'Board Exam', 'BBA', '18000', '500', '100', 'Unpaid', '2019-08-03 16:41:41.72402'),
(2, '2000556', 'Incourse', 'CSE', '15000', '500', '100', 'Unpaid', '2019-08-07 06:58:41.66934');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `datetime` timestamp(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `username`, `email`, `password`, `photo`, `status`, `datetime`) VALUES
(1, 'Shourove Jamil Biswhs', 'jamil2424', 'jamil24@gmail.com', '123456', 'jamil2424.jpg', 'active', '0000-00-00 00:00:00.00000'),
(4, 'test', 'test1111', 'test@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', 'test1111.jpg', 'inactive', '2019-08-07 03:42:52.87536');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `mothername` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `roll` int(6) NOT NULL,
  `semister` varchar(3) NOT NULL,
  `address` varchar(20) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `session` varchar(255) NOT NULL,
  `Date time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `fathername`, `mothername`, `department`, `roll`, `semister`, `address`, `pcontact`, `photo`, `session`, `Date time`) VALUES
(18, 'Md. Towhidul Islam ', 'Md. Nurul Islam Talukder', 'Nazmunnahar', 'CSE', 2000555, '4th', 'Kazipara, Mirpur, Dh', '01779714581', '2000555.jpg', '2015-16', '2019-08-02 08:48:37'),
(20, 'Ahamed Afridi', 'Shahadt Hossain', 'Rabeya Begum', 'CSE', 2000577, '5th', 'Kamlapur, Dhaka', '01911111222', '2000577.jpg', '2015-16', '2019-08-19 05:18:52'),
(21, 'Sayed Abdullh Al Moein', 'Moein Ahmed', 'Fatema Begum', 'CSE', 2000569, '2nd', 'Azimpur , Dhaka', '01853755042', '2000569.PNG', '2015-16', '2019-08-19 05:20:44'),
(22, 'Shrouve Jamil Biswhs', 'Jamil Biswas', 'Kahinur Begum', 'CSE', 2000565, '4th', 'Mirpur, Dhaka', '01757017318', '2000565.jpg', '2015-16', '2019-08-19 05:22:25'),
(23, 'Mehedi Hassan', 'Akbar Khan', 'Saleha Begum', 'CSE', 2000576, '3rd', 'Sukrabad Dhanmondi, ', '01984490120', '2000576.jpg', '2015-16', '2019-08-19 05:24:23'),
(24, 'Rahat Asrafi', 'Abdus Samad', 'SHAHANAZ BEGUM', 'CSE', 2000575, '5th', 'Azimpur Dhaka', '01797051959', '2000575.jpg', '2015-16', '2019-08-19 05:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `t_name` varchar(255) DEFAULT NULL,
  `t_department` varchar(255) DEFAULT NULL,
  `t_phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `t_name`, `t_department`, `t_phone`, `photo`) VALUES
(4, 'Mehedi Alam Siddiqui', 'CSE', '01727655777', 'Mehedi Alam Siddiqui.jpg'),
(5, 'Minhaz E Mowla', 'CSE', '01911111444', 'Minhaz E Mowla.jpg'),
(8, 'Mahmudul Hassan Rizvi', 'CSE', '01617907101', 'Mahmudul Hassan Rizvi.jpg'),
(9, 'Rakib Hassan', 'CSE', '01911111111', 'Rakib Hassan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `Username`, `password`, `photo`, `status`, `datetime`) VALUES
(24, 'Towhidul Islam', 'atopar.towhid@yahoo.com', 'towhid000', '1bbd886460827015e5d605ed44252251', 'towhid000.jpg', 'active', '2019-07-26 11:08:44'),
(25, 'test', 'test@gmail.com', 'test1111', 'dd4b21e9ef71e1291183a46b913ae6f2', 'test1111.jpg', 'active', '2019-08-04 06:22:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s_roll` (`s_roll`) USING BTREE;

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Roll` (`roll`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
