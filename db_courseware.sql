-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 08:31 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_courseware`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `topic`, `description`) VALUES
(30, 'JSP Life Cycle', 'Introduction of the lesson'),
(31, 'JSP Architecture', 'Model patterns '),
(33, 'JSP Environment', 'Environment setup & configuration');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `reference_id` int(11) NOT NULL,
  `reference` varchar(250) NOT NULL,
  `subtopic_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`reference_id`, `reference`, `subtopic_id`) VALUES
(95, 'Angus, J. (2006). Gorilla, gorilla, gorilla [wood veneers, nylon]. Art Gallery of Western Australia.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `subtopic_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `file` varchar(120) NOT NULL,
  `file_type` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `created_at` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `subtopic_id`, `image`, `title`, `file`, `file_type`, `size`, `created_at`) VALUES
(41, 1, 'word.png', 'Define Phases.docx', '1603474339_95cb29b31d9cb703fb38.docx', 'Word', '7', 'Mar 9, 2016'),
(48, 1, 'word.png', 'Phases.docx', '1603519931_ecb2f7c55d663dbaeb77.docx', 'Word', '11', 'Mar 9, 2016'),
(49, 1, 'pdf.png', 'Object Oriented Programming.pdf', '1603519946_64c0fd9f46ae7b6a0b66.pdf', 'PDF', '2', 'Mar 9, 2016');

-- --------------------------------------------------------

--
-- Table structure for table `subtopic`
--

CREATE TABLE `subtopic` (
  `subtopic_id` int(11) NOT NULL,
  `course_id` varchar(250) NOT NULL,
  `sub_topic` varchar(250) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtopic`
--

INSERT INTO `subtopic` (`subtopic_id`, `course_id`, `sub_topic`, `content`) VALUES
(1, '30', 'Phases\r\n', '1.Translation of JSP page to Servlet\r\n2.Compilation of JSP page(Compilation of JSP into test.java)\r\n3.Classloading (test.java to test.class)\r\n4.nstantiation(Object of the generated Servlet is created)\r\n5.Initialization(jspInit() method is invoked by the container)\r\n6.Request processing(_jspService()is invoked by the container)\r\n7.JSP Cleanup (jspDestroy() method is invoked by the container)'),
(2, '30', 'Methods and Process', ''),
(3, '31', 'Defination of JSP Architecture', '    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam perferendis quibusdam ea laborum necessitatibus. Debitis itaque deleniti pariatur amet excepturi doloremque facere illum quas optio veniam libero ea explicabo blanditiis, quisquam aliquam ut quaerat fugit ipsa quae tenetur enim sint at? Nostrum, harum cumque? Explicabo quod possimus ad corrupti quis.'),
(4, '31', 'Conceptual Figure', '    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam perferendis quibusdam ea laborum necessitatibus. Debitis itaque deleniti pariatur amet excepturi doloremque facere illum quas optio veniam libero ea explicabo blanditiis, quisquam aliquam ut quaerat fugit ipsa quae tenetur enim sint at? Nostrum, harum cumque? Explicabo quod possimus ad corrupti quis.'),
(5, '33', 'Setting up JDK\r\n', '    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam perferendis quibusdam ea laborum necessitatibus. Debitis itaque deleniti pariatur amet excepturi doloremque facere illum quas optio veniam libero ea explicabo blanditiis, quisquam aliquam ut quaerat fugit ipsa quae tenetur enim sint at? Nostrum, harum cumque? Explicabo quod possimus ad corrupti quis.'),
(6, '33', 'Setting up Web Server\r\n', '    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam perferendis quibusdam ea laborum necessitatibus. Debitis itaque deleniti pariatur amet excepturi doloremque facere illum quas optio veniam libero ea explicabo blanditiis, quisquam aliquam ut quaerat fugit ipsa quae tenetur enim sint at? Nostrum, harum cumque? Explicabo quod possimus ad corrupti quis.'),
(7, '33', 'Starting Tomcat Server\r\n', '    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam perferendis quibusdam ea laborum necessitatibus. Debitis itaque deleniti pariatur amet excepturi doloremque facere illum quas optio veniam libero ea explicabo blanditiis, quisquam aliquam ut quaerat fugit ipsa quae tenetur enim sint at? Nostrum, harum cumque? Explicabo quod possimus ad corrupti quis.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`reference_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `subtopic`
--
ALTER TABLE `subtopic`
  ADD PRIMARY KEY (`subtopic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `subtopic`
--
ALTER TABLE `subtopic`
  MODIFY `subtopic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
