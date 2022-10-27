-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 08:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_info`
--

CREATE TABLE `academic_info` (
  `sid` int(11) NOT NULL,
  `rno` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `sem` int(10) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_info`
--

INSERT INTO `academic_info` (`sid`, `rno`, `age`, `sem`, `student_id`) VALUES
(17, 12345, 14, 5, 52),
(18, 123, 23, 2, 49);

-- --------------------------------------------------------

--
-- Table structure for table `eventnews`
--

CREATE TABLE `eventnews` (
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` int(11) NOT NULL,
  `eventnewsimage` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventnews`
--

INSERT INTO `eventnews` (`event_id`, `title`, `description`, `category`, `eventnewsimage`, `date`, `tid`) VALUES
(4, 'College Educational  Tour ', 'asdad asd asd asd a sd as d asd a ds a sda da\r\ndasd asd  a d asd a sd asdasdad  asd a sd as d ads asd a sd asd  asd asd a sd ad a sda sdasd a d ads asd a sd a sd as d ads ad a d ad  asd a sd a sd asd sd ad ad a sdada', 1, 'boarding-pass.jpg', '2023-06-22', 2),
(11, 'asdjasdhasd ajhsdkja dkjh asdkjhakhsd kjahsdkj hakjsdhakjsdhjakhsdahd ', 'asdjajsd ajhsdkjas djasdjkasdh kjahsdjhad', 2, 'WhatsApp Image 2022-07-01 at 9.41.56 PM.jpeg', '2022-07-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notesupload`
--

CREATE TABLE `notesupload` (
  `notes_id` int(11) NOT NULL,
  `notes_title` varchar(255) NOT NULL,
  `notes_desc` varchar(500) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `notesname` varchar(500) NOT NULL,
  `semester` int(255) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notesupload`
--

INSERT INTO `notesupload` (`notes_id`, `notes_title`, `notes_desc`, `teacher_name`, `notesname`, `semester`, `teacher_id`) VALUES
(6, 'asdasd asd asd asd asd ', 'asd asd asda asd asd ', ' rajeep patel     ', '6 Lec - Computer Based Information System.pdf', 3, 0),
(7, 'asdas asd asd asd ', 'sd asd asd asd asd ', ' rajeep patel     ', 'Project Report Format With Cover & Certificate For BCA6.docx', 3, 0),
(8, 'asd', 'asdadadasd', ' Yash Prajapat ', '881037115419193_signed.pdf', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `pid` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `linkdin` varchar(255) NOT NULL,
  `about` varchar(500) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`pid`, `skill`, `location`, `linkdin`, `about`, `profile`, `resume`, `student_id`) VALUES
(7, '           java , python,html,css,javascript', '           sadasdadasd asdasd asd addad ', '           https://www.youtube.com/', '                                                                asdad asd as asdad hello my name is shivam ojha                                                                   ', 'WhatsApp Image 2022-07-01 at 9.41.54 PM (1).jpeg', '6 Lec - Computer Based Information System.pdf', 49),
(8, 'java , python,html,css,javascript', 'asdasdasda asdasdasd asdasd', 'https://www.youtube.com/', 'asdas asd asda asd ad sasdasd asdasd as asdasd', 'WhatsApp Image 2022-07-01 at 9.41.57 PM (1).jpeg', 'javatpoint.com-Artificial Intelligence.pdf', 48),
(13, '     java , python,html,css,javascript,c++', '   chopasni houseing board rajasthan ', '   https://www.youtube.com/', '        xzczsc sfsa asd asd asd asda sasd as asdasd        ', 'WhatsApp Image 2022-07-01 at 9.41.56 PM (1).jpeg', ' BCA Practical Summer 2022.pdf', 50),
(16, '  java , python,html,css,javascript', ' ramnager jodhpur', '  https://www.youtube.com/', '         ad asda dad                                        ', 'Worst Art.png', 'mbaknol.com-Types of Systems.pdf', 52);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `uname`, `email`, `password`, `phoneno`) VALUES
(45, 'shivam', '   shivam67', 'shivam@7414', '81dc9bdb52d04dc20036dbd8313ed055', ' 1234567'),
(46, 'yash parajpat', ' yash', 'yash@7414', '202cb962ac59075b964b07152d234b70', ' 12345'),
(47, 'rajdeep', ' rajdeep123', 'yash@7414', '202cb962ac59075b964b07152d234b70', ' 12345'),
(48, 'Sunil Suthar', 'sunil', 'sunil@123', '81dc9bdb52d04dc20036dbd8313ed055', ' 12345'),
(49, '123', '1234', 'yash@74143', '81dc9bdb52d04dc20036dbd8313ed055', '12345'),
(50, 'sudeep', 'sudeep12', 'sudeep@123', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890'),
(52, 'rohan', 'rohan123', 'yash@7414', '202cb962ac59075b964b07152d234b70', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `password`, `image`) VALUES
(1, 'rajeep patel     ', '12345', 'photo_2022-05-16_17-02-42.jpg'),
(2, 'Yash Prajapat ', '12345', 'blue-eyes-eye-sticker-by-rajon-ahmed-eye-pupil-vector-115630245350mjmzcqfcm.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_info`
--
ALTER TABLE `academic_info`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `eventnews`
--
ALTER TABLE `eventnews`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `teacherid` (`tid`);

--
-- Indexes for table `notesupload`
--
ALTER TABLE `notesupload`
  ADD PRIMARY KEY (`notes_id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_info`
--
ALTER TABLE `academic_info`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `eventnews`
--
ALTER TABLE `eventnews`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notesupload`
--
ALTER TABLE `notesupload`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventnews`
--
ALTER TABLE `eventnews`
  ADD CONSTRAINT `teacherid` FOREIGN KEY (`tid`) REFERENCES `teacher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
