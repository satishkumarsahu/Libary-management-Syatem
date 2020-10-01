-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 01:15 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'COMMERCE'),
(2, 'COMPUTER SCIENCE'),
(3, 'LANGUAGE'),
(4, 'MANAGEMENT');

-- --------------------------------------------------------

--
-- Table structure for table `manage_books`
--

CREATE TABLE `manage_books` (
  `id` varchar(1000) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `copies` int(100) NOT NULL,
  `pub` varchar(255) NOT NULL,
  `pub_date` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_books`
--

INSERT INTO `manage_books` (`id`, `isbn`, `name`, `author`, `category`, `copies`, `pub`, `pub_date`) VALUES
('1', '9778576487658', 'Cryptography And Internet Security', 'Chitra Ravi', 'COMPUTER SCIENCE', 6, 'Subhas', 2017),
('2', '9785764893769', 'System Programming', 'Vidya', 'COMPUTER SCIENCE', 3, 'SKYWARD', 2016),
('3', '9785795719745', 'Web Programming', 'Chitra Ravi', 'COMPUTER SCIENCE', 5, 'Subhas', 2017),
('4', '9857648759836', 'Theory Of Computation', 'Sarakutty', 'COMPUTER SCIENCE', 4, 'SKYWARD', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `new_book`
--

CREATE TABLE `new_book` (
  `id` int(11) NOT NULL,
  `mem_id` varchar(100) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `issued_date` varchar(255) NOT NULL,
  `tosub` varchar(255) NOT NULL,
  `submit_date` varchar(255) NOT NULL,
  `charge` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pub` varchar(255) NOT NULL,
  `year` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_book`
--

INSERT INTO `new_book` (`id`, `mem_id`, `mem_name`, `issued_date`, `tosub`, `submit_date`, `charge`, `name`, `pub`, `year`) VALUES
(1, '2', 'SATISH', '2017-04-27', '2017-04-27', '', '', 'Cryptography And Internet Security', 'SKYWARD', 2016),
(2, '3', 'MOHAN', '2017-04-26', '2017-04-26', '2017-04-26', '0', 'Cryptography And Internet Security', 'SKYWARD', 2016),
(3, '2', 'SATISH', '2017-04-26', '2017-04-26', '', '', 'Cryptography And Internet Security', 'SKYWARD', 2016),
(4, '4', 'SAMSON', '2017-04-26', '2017-04-30', '2017-04-28', '0', 'Cryptography And Internet Security', 'SKYWARD', 2016),
(5, '4', 'SAMSON', '2017-04-26', '2017-04-30', '2017-04-28', '0', 'Cryptography And Internet Security', 'SKYWARD', 2016),
(114, '1', 'HARISH', '2017-04-28', '2017-04-30', '2017-04-30', '0', 'Web Programming', 'Subhas', 2017),
(115, '4', 'SAMSON', '2017-04-28', '2017-04-30', '2017-04-28', '0', 'Cryptography And Internet Security', 'SKYWARD', 2016),
(116, '4', 'SAMSON', '2017-04-26', '2017-04-28', '', '', 'Theory Of Computation', 'SKYWARD', 2016),
(117, '2', 'SATISH', '2017-04-30', '2017-04-30', '', '', 'Web Programming', 'Subhas', 2017),
(118, '1', 'HARISH', '2017-04-30', '2017-04-30', '2017-04-30', '0', 'Web Programming', 'Subhas', 2017),
(119, '2', 'SATISH', '2017-04-26', '2017-04-26', '', '', 'Cryptography And Internet Security', 'SKYWARD', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `staff_reg`
--

CREATE TABLE `staff_reg` (
  `id` int(100) NOT NULL,
  `staff_id` bigint(255) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_reg`
--

INSERT INTO `staff_reg` (`id`, `staff_id`, `staff_name`, `status`, `dept`, `email`, `phone`) VALUES
(0, 1001, 'MANOHAR', 'Teaching', 'Commerce', 'manohar73@gmail.com', '9667839845'),
(0, 1002, 'SHANKAR', 'Teaching', 'Computer Science', 'shankarlive@gmail.com', '9557498735'),
(0, 1003, 'PAULINE', 'Teaching', 'Commerce', 'pauline1@gmail.com', '9887658934'),
(0, 1004, 'SENTHIL', 'Teaching', 'Computer Science', 'senthil123@gmail.com', '9778598467');

-- --------------------------------------------------------

--
-- Table structure for table `stud_reg`
--

CREATE TABLE `stud_reg` (
  `id` int(100) NOT NULL,
  `stud_id` bigint(255) NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `caste` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_reg`
--

INSERT INTO `stud_reg` (`id`, `stud_id`, `stud_name`, `course`, `caste`, `email`, `phone`, `image`) VALUES
(0, 1, 'HARISH', 'BCA', 'SC', 'harishav96gmail.com', '9449831724', ''),
(0, 2, 'SATISH', 'BCA', 'ST', 'satishk1@gmail.com', '9738384253', ''),
(0, 3, 'MOHAN', 'BCOM', 'SC', 'mohan01@gmail.com', '9885637649', ''),
(0, 4, 'SAMSON', 'BCOM', 'ST', 'samson01gmail.com', '8996489463', ''),
(0, 5, 'vfsdfds', 'BCA', 'SC', 'harish@gmail.com', '9449876456', ''),
(0, 6, 'vcxvx', 'BCA', 'SC', 'harish@gmail.com', '9558749873', '');

-- --------------------------------------------------------

--
-- Table structure for table `userpass`
--

CREATE TABLE `userpass` (
  `id` int(100) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpass`
--

INSERT INTO `userpass` (`id`, `user`, `pass`) VALUES
(1, 'harish', 'harishav'),
(2, 'satish', 'satish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_name`);

--
-- Indexes for table `manage_books`
--
ALTER TABLE `manage_books`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `new_book`
--
ALTER TABLE `new_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_reg`
--
ALTER TABLE `staff_reg`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stud_reg`
--
ALTER TABLE `stud_reg`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `userpass`
--
ALTER TABLE `userpass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_book`
--
ALTER TABLE `new_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `staff_reg`
--
ALTER TABLE `staff_reg`
  MODIFY `staff_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
--
-- AUTO_INCREMENT for table `stud_reg`
--
ALTER TABLE `stud_reg`
  MODIFY `stud_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userpass`
--
ALTER TABLE `userpass`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
