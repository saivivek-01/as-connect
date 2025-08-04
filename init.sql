-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2025 at 04:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `alumniId` int(11) NOT NULL,
  `achievementTitle` varchar(1000) NOT NULL,
  `significance` varchar(1000) NOT NULL,
  `achievementDescription` varchar(5000) NOT NULL,
  `imageName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `alumniId`, `achievementTitle`, `significance`, `achievementDescription`, `imageName`) VALUES
(1, 1, 'chandana won highest package of decade', 'skanda cinema remake', 'chandana got the highest package of 2.45 cr beating prinyanka with 2.44 cr', '4834de69-f99f-4af5-8fba-b3f70757f312.JPG'),
(2, 6, 'Sasank got a Job in Accenture', 'Getting a job is a big achievement', 'Sasank, who have studied in PVP Siddhartha Institute of Technology, got a job of Role Packaged App Developer in Accenture, through Placement Drive of the College. He has Joined in the job on 17th July 2024.', '17528.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `alumniCityVisit`
--

CREATE TABLE `alumniCityVisit` (
  `id` int(11) NOT NULL,
  `alumniId` int(11) NOT NULL,
  `alumniName` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `alumniCityLocation` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `timing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumniCityVisit`
--

INSERT INTO `alumniCityVisit` (`id`, `alumniId`, `alumniName`, `city`, `alumniCityLocation`, `startDate`, `endDate`, `timing`) VALUES
(1, 6, 'Mutyala Sai Sasank ', 'Banglore', 'Brookfield', '2024-10-22', '2024-10-31', '13:00 to 15:00'),
(2, 1, 'vivek ', 'Mumbai', 'Brookfield', '2024-11-02', '2024-11-09', '13:00 to 15:00'),
(3, 1, 'vivek ', 'Noida', 'Brookfield', '2024-10-26', '2024-11-09', '11:00 to 13:00');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_domains`
--

CREATE TABLE `alumni_domains` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `domains` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni_domains`
--

INSERT INTO `alumni_domains` (`id`, `email`, `domains`) VALUES
(1, 'asdfghjkl@gmail.com', 'Data Analyst'),
(2, 'villainvivek@gmail.com', 'Product Manager'),
(3, 'asdfghjkl@gmail.com', 'Data Analyst'),
(4, 'asdfghjkl@gmail.com', 'Accountant'),
(5, 'asdfghjkl@gmail.com', 'Data Analyst'),
(6, 'asdfghjkl@gmail.com', 'Software Developer'),
(7, 'asdfghjkl@gmail.com', 'Accountant'),
(10, 'qwertyuiop@gmail.com', 'Software Developer'),
(11, 'qwertyuiop@gmail.com', 'Accountant'),
(12, 'chandana@gmail.com', 'Data Analyst'),
(13, 'chandana@gmail.com', 'Bussiness Development'),
(14, 'zxcvbnm@gmail.com', 'Data Analyst'),
(15, 'sasankmallavalli229@gmail.com', 'Software Developer'),
(16, 'sasankmallavalli229@gmail.com', 'Software Tester'),
(17, 'sasankmallavalli229@gmail.com', 'Career Specialist'),
(18, 'sasankmallavalli229@gmail.com', 'Prompt Engineer'),
(19, 'sasankmallavalli229@gmail.com', 'Bussiness Development'),
(20, 'vivekk@gmail.com', 'Software Developer'),
(21, 'vivekk@gmail.com', 'Software Tester'),
(22, 'vivekk@gmail.com', 'Career Specialist'),
(23, 'vivekk@gmail.com', 'Bussiness Development');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_record`
--

CREATE TABLE `alumni_record` (
  `id` int(11) NOT NULL,
  `firstname` varchar(124) NOT NULL,
  `lastname` varchar(124) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `studentID` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `qualification` varchar(7) NOT NULL,
  `occupation` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni_record`
--

INSERT INTO `alumni_record` (`id`, `firstname`, `lastname`, `gender`, `email`, `phone`, `contact`, `studentID`, `year`, `linkedin`, `qualification`, `occupation`, `password`) VALUES
(1, 'vivek', 'vivek', 'Male', 'asdfghjkl@gmail.com', '1234567890', '1234567890', '1234567890', 2003, 'asdfghjkl', 'M.S', 'manager', '$2y$10$ovb7yEvYmO80Aim8ousDaeKUsiSXvwXhsloRoVuSN9TfmJsK2Jmy6'),
(3, 'qwertyuiop', 'qwertyuiop', 'Male', 'qwertyuiop@gmail.com', '0987654321', '0987654321', '1234567890', 2010, 'qwertyuiopasdfghjklzxcvbnm', 'M.Tech', 'accountant', '$2y$10$pdOa6DfnJJNfl5tIDnWQQORH/ViOJo3KfKsuL7gXl9myperHETQDm'),
(4, 'chandana', 'chandana', 'Female', 'chandana@gmail.com', '9876543210', '0987654321', '22481A05H2', 2024, 'asdfghjkl', 'PhD', 'jasdfghj', '$2y$10$aq0vd1fI.HyCt51T3QtMkuNbvFb/InGKrEEEEr8L2r76Horh5TEEG'),
(5, 'asdfghjkl', 'asdfghjkl', 'LGBTQA+', 'zxcvbnm@gmail.com', '1234567890', '1234567890', '1234567890', 2004, 'asdfghjkl', 'PhD', 'asdfgbgy', '$2y$10$vJvd3OChJO6nMUm24uj5b.CawKQYgio7BntdBk/9eI/EVllAobO6u'),
(6, 'Mutyala Sai Sasank', 'Mallavalli', 'Male', 'sasankmallavalli229@gmail.com', '9121368199', '9121368199', '20501A05A6', 2024, 'https://linkedin.com/mutyala-sai-sasank-mallavalli-612272227', 'PhD', 'Packaged App Developer', '$2y$10$/JpGI3FjSLvgkF5ExF.VKOeM0fn304qGJktJxP4lJdrAT1wz4549y'),
(7, 'vivekk', 'vivekk', 'Male', 'vivekk@gmail.com', '6309609988', '6309609988', '22481a05d7', 2024, 'mallavallisaivivek', 'B.Tech', 'Cloud Engineer', '$2y$10$TGk80lbBdm.BRa6RsoTGX.kiulezL3nYUhFzLqVeCYmDQCLM1balO');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `alumniId` int(11) NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `blogDescription` varchar(500) NOT NULL,
  `blogType` varchar(255) NOT NULL,
  `blogLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `alumniId`, `blogTitle`, `blogDescription`, `blogType`, `blogLink`) VALUES
(1, 6, 'Sasank Came Home after His Training', 'Sasank, who is an Accenture Employee, Successfully completed his training phase in Accenture. He was allocated a Training over Java Full Stack. And he has completed it with a great merit. Now he is in the Bench Zone and is awaiting for the Project Calls.', 'Career', 'https://sasank-229.github.io/sasankmallavalli');

-- --------------------------------------------------------

--
-- Table structure for table `discussionRoom`
--

CREATE TABLE `discussionRoom` (
  `id` int(11) NOT NULL,
  `alumniId` int(11) NOT NULL,
  `roomTopic` varchar(255) NOT NULL,
  `roomPlatform` varchar(255) NOT NULL,
  `roomLink` varchar(255) NOT NULL,
  `roomDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussionRoom`
--

INSERT INTO `discussionRoom` (`id`, `alumniId`, `roomTopic`, `roomPlatform`, `roomLink`, `roomDate`, `startTime`, `endTime`) VALUES
(1, 6, 'How to come Home from the Work Place', 'Google Meet', 'https://meet.google.com', '2024-10-22', '11:00:00', '12:00:00'),
(2, 1, 'How to come Home from the Work Place', 'Google Meet', 'https://meet.google.com', '2024-10-19', '02:15:00', '03:17:00'),
(3, 1, 'hello world', 'Skype', 'https://meet.google.com', '2024-11-01', '04:26:00', '05:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `alumniId` int(11) NOT NULL,
  `eventTitle` varchar(255) NOT NULL,
  `eventDescription` varchar(500) NOT NULL,
  `eventDate` date NOT NULL,
  `extraInfo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `alumniId`, `eventTitle`, `eventDescription`, `eventDate`, `extraInfo`) VALUES
(1, 1, 'south zone Basketball tournament', 'south zone basket ball tournament is going to be held at SRKR Engineering college Bhimavaram', '2024-10-26', 'central Zone selections will also take place at the tournament'),
(3, 6, 'Sasank Arrived Home', 'Sasank arrived to his hometown after a gap of 3 months', '2024-10-22', 'Sasank Got a Job in Accenture. He is relocated to Bengaluru on the date of 17th July 2024. Now as of His Training is Completed, he returned to his hometown for a few days.'),
(4, 7, 'CTS pre placement talk', 'the cognigent technology solutions is conducting a pre placement talk at SR gudlavalleru Engineering college for the eligible students', '2025-07-29', 'every eligible student must attend');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_record`
--

CREATE TABLE `faculty_record` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_record`
--

INSERT INTO `faculty_record` (`id`, `email`, `password`) VALUES
(1, 'asdfghjkl@gmail.com', '$2y$10$hmpUp4YPDPemTOKVR2KW0uvDhE/8pXMKRklx0F/1d1Phhblpsg/g.'),
(2, 'vivek@gmail.com', '$2y$10$LzAA7KirLg0LHaH1CdiwoOmQehJ/UbVUi5dpFdlEdjtNJz3J8mVeq'),
(3, 'sasankmallavalli229@gmail.com', '$2y$10$U6W8RqslQ/OL4L10NVBSw.yk3mj7cSMmi4IpH/huW.Q7/eMKyXssO'),
(4, 'subramanyamgec@gmail.com', '$2y$10$pntXQrBevGr9ozIFRMFZX.0hk7IUbd6q0J0oX3F9CU7PYDnpnNU9G');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `alumniId` int(11) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobCompany` varchar(255) NOT NULL,
  `jobLocation` varchar(255) NOT NULL,
  `jobType` varchar(255) NOT NULL,
  `jobDomain` varchar(255) NOT NULL,
  `jobLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `alumniId`, `jobTitle`, `jobCompany`, `jobLocation`, `jobType`, `jobDomain`, `jobLink`) VALUES
(1, 6, 'Packaged App Developer', 'Accenture', 'Bengaluru', 'Full-Time', 'Software', 'https://www.accenture.com/in-en'),
(2, 1, 'Packaged App Developer', 'Accenture', 'Bengaluru', 'Full-Time', 'Administration', 'https://www.accenture.com/in-en');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `alumniId` int(11) NOT NULL,
  `newsTitle` varchar(255) NOT NULL,
  `newsDescription` varchar(255) NOT NULL,
  `newsDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `alumniId`, `newsTitle`, `newsDescription`, `newsDate`) VALUES
(1, 6, 'Sasank has arrived ', 'Sasank has arrived to his home town after his completion of his Training', '2024-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

CREATE TABLE `student_record` (
  `id` int(11) NOT NULL,
  `firstname` varchar(125) NOT NULL,
  `lastname` varchar(125) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `studentID` varchar(10) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `year` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`id`, `firstname`, `lastname`, `gender`, `email`, `phone`, `studentID`, `branch`, `year`, `password`) VALUES
(3, 'asdfghjkl', 'asdfghjkl', 'Male', 'asdfghjkl@gmail.com', '1234567890', '1234567890', 'Mechanical Engineering (ME)', 2, '$2y$10$3At9DjRW.Fziv7BG1YsbwOOGQ7KhBd5nromFcfN32QnaM7RwQh5g6'),
(4, 'vivekk', 'vivekk', 'Male', 'vivekk@gmail.com', '6309609988', '22481a05d7', 'Computer Science and Engineering (CSE)', 4, '$2y$10$JjU9gPjXIe3lBucGsCm2gOi.iT/1HnSQ7ytkiRkdK3tJLmamhn7fW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumniCityVisit`
--
ALTER TABLE `alumniCityVisit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni_domains`
--
ALTER TABLE `alumni_domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni_record`
--
ALTER TABLE `alumni_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussionRoom`
--
ALTER TABLE `discussionRoom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_record`
--
ALTER TABLE `faculty_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_record`
--
ALTER TABLE `student_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `alumniCityVisit`
--
ALTER TABLE `alumniCityVisit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alumni_domains`
--
ALTER TABLE `alumni_domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `alumni_record`
--
ALTER TABLE `alumni_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discussionRoom`
--
ALTER TABLE `discussionRoom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty_record`
--
ALTER TABLE `faculty_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
