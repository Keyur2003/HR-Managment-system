-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 04:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `emp_id` varchar(5) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `ifsc` varchar(15) NOT NULL,
  `account_number` varchar(25) NOT NULL,
  `holder_name` varchar(20) NOT NULL,
  `pan_no` int(11) NOT NULL,
  `pf_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`emp_id`, `bank_name`, `ifsc`, `account_number`, `holder_name`, `pan_no`, `pf_no`) VALUES
('', '', '', '', '', 0, 0),
('1', 'State Bank of India', 'ABC343434343434', '1212121212121213', 'Miral Joshi', 1234567890, 12332211),
('2', 'State Bank of India', '', '123123123123', '', 1234567890, 1312),
('3', 'Axis Bank', '', '343434343434', '', 987656789, 12332211),
('5', 'SBI', '', '345543345543', '', 2147483647, 1312);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `user_role` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `username`, `password`, `user_role`) VALUES
(1, 'mjosh', 'miral', '2'),
(2, 'jbhimani', 'jatan', '2'),
(3, 'djaviya', 'disney', ''),
(4, 'admin', 'admin', '1'),
(5, 'umang', 'umang', '');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`) VALUES
(1, 'Top Manager'),
(2, 'Project Manager'),
(3, 'Php Developer'),
(9, 'Intern'),
(23, 'Android Developer');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `emp_id` int(11) NOT NULL,
  `identity` text NOT NULL,
  `resume` text NOT NULL,
  `transcript` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`emp_id`, `identity`, `resume`, `transcript`) VALUES
(1, '            Payslip-January-2022.pdf', '            Payslip-January-2022.pdf', '            Payslip-January-2022.pdf'),
(2, ' ', ' ', ' '),
(3, '   ', '   ', '   '),
(5, ' 20CE007_SI2022_Report.pdf', ' php_certificate.pdf', ' SI 2022_Report Format_Development Project.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `holiday_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `date`, `holiday_name`) VALUES
(1, '2022-03-19', 'Holi'),
(2, '2022-01-14', 'MAKAR SANKRANTI'),
(3, '2022-01-26', 'REPUBLIC DAY'),
(4, '2022-08-12', 'RAKSHABANDAHAN'),
(5, '2022-08-15', 'INDEPENDENCE DAY'),
(6, '2022-10-02', 'GANDHI JAYANTI'),
(7, '2022-10-05', 'DUSSEHRA'),
(8, '2022-10-25', 'DEEPAWALI'),
(9, '2022-10-26', 'VIKRAM SAMWAT NEW YEAR DAY/GOWARDHAN PUJA'),
(10, '2022-10-27', 'BHAI BIJ'),
(11, '2022-12-25', 'CHRISTMAS');

-- --------------------------------------------------------

--
-- Table structure for table `master_leave`
--

CREATE TABLE `master_leave` (
  `emp_id` int(11) NOT NULL,
  `pl` int(11) NOT NULL,
  `cl` int(11) NOT NULL,
  `sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_leave`
--

INSERT INTO `master_leave` (`emp_id`, `pl`, `cl`, `sl`) VALUES
(1, 6, 2, 2),
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `past_experience`
--

CREATE TABLE `past_experience` (
  `emp_id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `company_designation` text NOT NULL,
  `from` text NOT NULL,
  `to` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `past_experience`
--

INSERT INTO `past_experience` (`emp_id`, `company_name`, `company_designation`, `from`, `to`) VALUES
(1, 'a:1:{i:0;s:9:\"EIGHTTECH\";}', 'a:1:{i:0;s:6:\"Intern\";}', 'a:1:{i:0;s:10:\"2022-05-16\";}', 'a:1:{i:0;s:10:\"2022-06-26\";}'),
(2, 'a:1:{i:0;s:0:\"\";}', 'a:1:{i:0;s:0:\"\";}', 'a:1:{i:0;s:0:\"\";}', 'a:1:{i:0;s:0:\"\";}'),
(3, 'a:1:{i:0;s:0:\"\";}', 'a:1:{i:0;s:0:\"\";}', 'a:1:{i:0;s:0:\"\";}', 'a:1:{i:0;s:0:\"\";}'),
(5, 'a:1:{i:0;s:0:\"\";}', 'a:1:{i:0;s:0:\"\";}', 'a:1:{i:0;s:0:\"\";}', 'a:1:{i:0;s:0:\"\";}');

-- --------------------------------------------------------

--
-- Table structure for table `requestforleave`
--

CREATE TABLE `requestforleave` (
  `id` int(11) NOT NULL,
  `leave_id` int(10) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `days` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestforleave`
--

INSERT INTO `requestforleave` (`id`, `leave_id`, `emp_id`, `from_date`, `to_date`, `days`, `message`) VALUES
(1, 2, 1, '2022-06-15', '2022-06-16', 2, 'hello'),
(2, 3, 1, '2022-06-10', '2022-06-11', 2, 'sl'),
(3, 1, 1, '2022-06-18', '2022-06-19', 2, 'pl'),
(4, 3, 2, '2022-06-24', '2022-06-25', 2, 'sl j'),
(5, 2, 2, '2022-06-04', '2022-06-05', 2, 'cl j'),
(6, 1, 2, '2022-06-04', '2022-06-05', 2, 'pl j'),
(7, 1, 1, '2022-06-08', '2022-06-10', 3, 'pl 3 m'),
(8, 1, 1, '2022-06-16', '2022-06-18', 3, 'hello'),
(9, 1, 2, '2022-06-07', '2022-06-09', 3, 'Bday'),
(10, 3, 1, '2022-07-30', '2022-07-31', 2, 'hello'),
(11, 1, 1, '2022-10-12', '2022-10-13', 1, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `requeststatus`
--

CREATE TABLE `requeststatus` (
  `rid` int(11) NOT NULL,
  `approved_id` int(11) NOT NULL,
  `rejected_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requeststatus`
--

INSERT INTO `requeststatus` (`rid`, `approved_id`, `rejected_id`) VALUES
(1, 0, 7),
(2, 1, 0),
(3, 4, 0),
(4, 2, 0),
(5, 3, 0),
(6, 5, 0),
(7, 6, 0),
(8, 8, 0),
(9, 0, 9),
(10, 0, 10),
(11, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_data`
--

CREATE TABLE `request_data` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_data`
--

INSERT INTO `request_data` (`id`, `emp_id`, `month`, `year`, `amount`) VALUES
(1, 1, 'May', 2022, 10000),
(2, 2, 'May', 2022, 20000),
(3, 1, 'June', 2022, 15280),
(4, 1, 'May', 2022, 23000),
(5, 3, '0', 0, 12345),
(8, 1, 'Jul', 2022, 12000),
(9, 1, 'Jan', 2021, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `uid` int(11) NOT NULL,
  `profile_img` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `m_name` varchar(15) NOT NULL,
  `dateofbirth` date NOT NULL,
  `join_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `age` varchar(11) NOT NULL,
  `curaddress` text NOT NULL,
  `peraddress` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` varchar(11) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `state` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `emergency_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`uid`, `profile_img`, `username`, `firstname`, `m_name`, `dateofbirth`, `join_date`, `status`, `lastname`, `age`, `curaddress`, `peraddress`, `city`, `pincode`, `contact`, `state`, `designation`, `emergency_no`) VALUES
(1, 'images.jpg', 'mjosh', 'Miral', 'Jatin', '2003-06-08', '2022-06-01', 'Active', 'Joshi', '19', 'Rajkot', 'Rajkot', 'Rajkot', '360005', '6353546785', 'Gujarat', 'Php Developer', '6353546785'),
(2, '', 'jbhimani', 'Jatan', 'Bhavesh', '0000-00-00', '2022-06-02', 'Inactive', 'Bhimani', '0', '', '', '', '0', '0', '', 'Intern', '0'),
(3, '', 'djaviya', 'Disney', 'Jayesh', '0000-00-00', '2022-06-01', 'Inactive', 'Javiya', '', '', '', '', '', '', '', 'Intern', ''),
(5, 'Untitled design (8).png', 'umang', 'Umang', 'Bhaveshbhai', '0000-00-00', '2022-07-14', 'Active', 'Bariya', '', '', '', '', '', '', '', 'Frontend Developer', '');


-- create attendence table
CREATE TABLE `attendence` (
  `id` int(11) PRIMARY key AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_leave`
--
ALTER TABLE `master_leave`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `past_experience`
--
ALTER TABLE `past_experience`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `requestforleave`
--
ALTER TABLE `requestforleave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Test` (`leave_id`);

--
-- Indexes for table `requeststatus`
--
ALTER TABLE `requeststatus`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `request_data`
--
ALTER TABLE `request_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `past_experience`
--
ALTER TABLE `past_experience`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requestforleave`
--
ALTER TABLE `requestforleave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requeststatus`
--
ALTER TABLE `requeststatus`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request_data`
--
ALTER TABLE `request_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
