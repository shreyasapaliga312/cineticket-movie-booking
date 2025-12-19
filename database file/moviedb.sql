-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 06:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `mid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `seat` int(11) NOT NULL,
  `seatnums` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `cid`, `mid`, `tid`, `sid`, `bdate`, `seat`, `seatnums`, `amount`) VALUES
(5, 'aditi@gmail.com', 104, 1, 1, '2020-09-09', 4, 'A1,A2,F7,F8', 400),
(6, 'aditi@gmail.com', 104, 1, 1, '2020-09-10', 4, 'A3,A4,C3,C4', 400),
(7, 'avi@gmail.com', 103, 1, 1, '0000-00-00', 2, 'D4,D5', 200),
(8, 'avi@gmail.com', 103, 1, 1, '2020-09-17', 3, 'A6,C6,E6', 300),
(9, 'rajesh@gmail.com', 102, 1, 1, '2020-09-09', 3, 'A1,C1,E1', 300),
(10, 'raj@gmail.com', 105, 1, 1, '2020-09-09', 3, 'A1,C1,E1', 300),
(11, 'raj@gmail.com', 104, 1, 1, '2020-09-09', 3, 'C1,E1,F1', 300),
(12, 'raj@gmail.com', 104, 1, 1, '2020-09-09', 2, 'A8,B8', 200),
(13, 'test@gmail.com', 101, 1, 1, '2020-09-09', 2, 'A1,B1', 200),
(14, 'test@gmail.com', 104, 1, 1, '2020-09-09', 2, 'A1,B1', 200),
(15, 'test@gmail.com', 104, 1, 1, '0000-00-00', 4, 'D7,D8,E7,E8', 400),
(16, 'test@gmail.com', 107, 1, 1, '2020-09-08', 4, 'A1,A2,B1,B2', 400),
(17, 'test@gmail.com', 107, 1, 1, '2020-09-08', 4, 'A7,A8,B7,B8', 400),
(18, 'pradeep@gmail.com', 107, 1, 1, '2020-09-11', 3, 'A3,A4,A5', 300),
(19, 'aditi@gmail.com', 107, 1, 1, '2020-09-14', 2, 'F1,F2', 200),
(20, 'anil@gmail.com', 107, 1, 1, '0000-00-00', 2, 'F7,F8', 200),
(21, 'aditi@gmail.com', 104, 1, 1, '2020-09-10', 2, 'B3,B4', 200),
(22, 'anil@gmail.com', 106, 2, 4, '2020-09-21', 4, 'A3,A4,A5,A6', 400),
(23, 'anita@gmail.com', 106, 1, 4, '2020-09-21', 2, 'A1,A2', 200);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `uname`, `email`, `phone`, `gender`) VALUES
(1, 'Aditi  Jindal', 'aditi@gmail.com', '8888888888', 'Female'),
(2, 'Amit Kumar', 'amit@gmail.com', '9898989898', 'Male'),
(3, 'New User', 'user@gmail.com', '9898989898', 'Male'),
(4, 'Avinash', 'avi@gmail.com', '9989898989', 'Male'),
(5, 'Rajesh Kumar', 'rajesh@gmail.com', '9999999999', 'Male'),
(6, 'Rajeev Verma', 'raj@gmail.com', '9999999999', 'Male'),
(7, 'Test User', 'test@gmail.com', '9898989898', 'Male'),
(10, 'Anand', 'aditi@gmail.com', '9898989898', 'Male'),
(11, 'Pradeep Khulbe', 'pradeep@gmail.com', '9898989898', 'Male'),
(12, 'Komal Bansal', 'komal@gmail.com', '9898989889', 'Female'),
(13, 'Anil Kapoor', 'anil@gmail.com', '9898989898', 'Male'),
(14, 'Anita Goel', 'anita@gmail.com', '9999999999', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mid` int(11) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `reldate` date NOT NULL,
  `director` varchar(100) NOT NULL,
  `actor` varchar(100) NOT NULL,
  `actress` varchar(100) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `poster` varchar(100) NOT NULL,
  `certificate` varchar(50) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `banner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mid`, `mname`, `reldate`, `director`, `actor`, `actress`, `trailer`, `poster`, `certificate`, `descr`, `banner`) VALUES
(101, 'Jurassic World 2', '2019-10-16', 'New Director', 'Anand Singh', 'New Actress', '<iframe width=\"956\" height=\"538\" src=\"https://www.youtube.com/embed/vn9mMeWcgoM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/101.jpg', 'UA', 'Amazing movie of dinosours real looking dinosource and adventurous', 'banners/101.jpg'),
(102, 'Stuart Little 2', '2020-09-04', 'Rob Minkof', 'A Rat', 'A Sparrow', '<iframe width=\"956\" height=\"538\" src=\"https://www.youtube.com/embed/IDbsJeOgItw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/102.jpg', 'UA', 'Funny and full of comedy of a rat named Stuart adopted by a family and a sparrow.', 'banners/102.jpg'),
(103, 'Iron Man 3', '2020-03-09', 'Shane Black', 'Robert Downey Jr.,  Don Cheadle', 'Gwyneth Paltrow', '<iframe width=\"956\" height=\"538\" src=\"https://www.youtube.com/embed/oYSD2VQagc4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/103.jpg', 'UA', 'Very nice movie of Iron Man', 'banners/103.jpg'),
(104, 'Terminator Dark fate', '2015-05-14', 'Alen Tailer', 'Arnold Schwarzenegger, ', ' Linda Hamilton', '<iframe width=\"861\" height=\"538\" src=\"https://www.youtube.com/embed/k64P4l2Wmeg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/104.jpg', 'UA', 'Thriller and action movie based on Machines. Very good performance of Arnold', 'banners/104.jpg'),
(105, 'X Men', '2020-09-21', 'Bryan Singer', 'Hugh Jackman, Patrick Stewart', 'Ian Mckellen', '<iframe width=\"956\" height=\"538\" src=\"https://www.youtube.com/embed/VNxwlx6etXI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/105.jpg', 'UA', 'Mutant movie with special power people', 'banners/105.jpg'),
(106, 'Jumanji The next level', '2020-06-12', 'Jake Kasdan', 'Serdarius Blain, Alex Wolff, Karen Gillan', 'Serdarius Blain', '<iframe width=\"956\" height=\"538\" src=\"https://www.youtube.com/embed/rBxcF-r9Ibs\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/106.jpg', 'A', 'Best comedy movie', 'banners/106.jpg'),
(107, 'Bahubali the beginning', '2019-10-16', 'SS Rajamouli', 'Prabhas, Rana Daggubati,', 'Anushka Shetty', '<iframe width=\"861\" height=\"538\" src=\"https://www.youtube.com/embed/sOEg_YZQsTI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/107.jpg', 'UA', 'Best Mahesmati and Amrendra Bahulbali movie', 'banners/107.jpg'),
(108, 'Good News', '2020-09-10', 'Raj Mehta', 'Akshay Kumar,', 'Kareena Kapoor Khan', '<iframe width=\"956\" height=\"538\" src=\"https://www.youtube.com/embed/r9VJpqoAr84\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/108.jpg', 'U', 'Good News by Akshay kumar full of comedy', 'banners/108.jpg'),
(110, 'Super man - Man of Steel', '2019-11-29', 'Jake Kasdan', 'Henry Cavill, Amy Adams, Michael Shannon', 'Not Know', '<iframe width=\"871\" height=\"490\" src=\"https://www.youtube.com/embed/T6DJcgm3wNY\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/110.jpg', 'U', 'Very nice action movie of Super man', 'banners/110.jpg'),
(111, 'Ghost Rider', '2020-09-18', 'Mark Steven Johnson', 'Nicolas Cage', 'Eva Mendes', '<iframe width=\"1045\" height=\"496\" src=\"https://www.youtube.com/embed/tp12CD2A4NA\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'posters/111.jpg', 'U', 'Ghost Rider.\" Long ago, superstar motorcycle stunt rider Johnny Blaze made a deal with the devil to protect the ones he loved most: his father and his childhood sweetheart, Roxanne (Eva Mendes). Now, the devil has come for his due. By day, Johnny is a die', 'banners/111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `showname` varchar(50) NOT NULL,
  `showtime` varchar(10) NOT NULL,
  `endtime` varchar(10) NOT NULL,
  `tid` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `showname`, `showtime`, `endtime`, `tid`, `amount`) VALUES
(1, 'First Show', '09:00', '11:00', 1, 100),
(2, 'Matinee Show', '12:00', '1:00', 1, 120),
(4, 'Noon Show', '14:00', '16:00', 2, 50),
(5, 'Night Show', '21:00', '23:00', 4, 120);

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `tid` int(11) NOT NULL,
  `tname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`tid`, `tname`, `location`, `seats`) VALUES
(1, 'Crown Plaza', 'Noida', 150),
(2, 'Gold Cinema', 'New Delhi', 200),
(4, 'Maharaja Cinema', 'Noida', 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(30) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `uname`, `pwd`, `role`) VALUES
('aditi@gmail.com', 'Aditi  Jindal', 'anand', 'customer'),
('admin', 'Super User', 'admin', 'admin'),
('amit@gmail.com', 'Amit Kumar', 'anand', 'customer'),
('anil@gmail.com', 'Anil Kapoor', 'anand', 'customer'),
('anita@gmail.com', 'Anita Goel', 'anand', 'customer'),
('avi@gmail.com', 'Avinash', 'anand', 'customer'),
('komal@gmail.com', 'Komal Bansal', 'anand', 'customer'),
('pradeep@gmail.com', 'Pradeep Khulbe', 'anand', 'customer'),
('raj@gmail.com', 'Rajeev Verma', 'anand', 'customer'),
('rajesh@gmail.com', 'Rajesh Kumar', 'anand', 'customer'),
('test@gmail.com', 'Test User', 'anand', 'customer'),
('user@gmail.com', 'New User', 'anand', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
