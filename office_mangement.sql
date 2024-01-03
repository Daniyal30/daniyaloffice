-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 06:54 PM
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
-- Database: `office_mangement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `name`, `email`, `city`, `age`, `attendance`, `Date`) VALUES
(31, 'maryam', 'maryam@gmail.com', 'hyderabad', 20, 'present', '2023-11-30'),
(33, 'ali', 'ali@gmail.com', 'karachi', 14, 'absent', '2023-12-01'),
(34, 'daniyal', 'daniyal@gmail.com', 'Hyderabad', 12, 'present', '2023-12-01'),
(35, 'reehana', 'reehana@gmail.com', 'faisalabad', 28, 'absent', '2023-12-01'),
(36, 'hassnain', 'hassnain@gmail.com', 'peshawaar', 19, 'present', '2023-12-01'),
(37, 'saqlain', 'saqlain@gmail.com', 'hyderabad', 11, 'absent', '2023-12-01'),
(38, 'maryam', 'maryam@gmail.com', 'hyderabad', 20, 'present', '2023-12-03'),
(39, 'maryam', 'maryam@gmail.com', 'hyderabad', 20, 'present', '2023-12-04'),
(40, 'daniyal', 'daniyal@gmail.com', 'Hyderabad', 12, 'present', '2023-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `age`, `city`, `image`, `password`) VALUES
(6, 'ali', 'ali@gmail.com', 14, 'karachi', '../images/face16.jpg', '86318e52f5ed4801abe1d13d509443de'),
(7, 'hassnain', 'hassnain@gmail.com', 19, 'peshawaar', '../images/face19.jpg', '0fb2875f73ccb5cd76ea052501da91f5'),
(11, 'maryam', 'maryam@gmail.com', 20, 'hyderabad', '../images/face6.jpg', '8a16a1b13939aa7034128948c0c61591'),
(13, 'daniyal', 'daniyal@gmail.com', 12, 'Hyderabad', '../images/face1.jpg', '406151020673ff358e37df48f73bda66');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `posted_date` date NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `title`, `posted_date`, `message`) VALUES
(1, 'test', '2023-12-15', 'hello'),
(2, 'new', '2023-12-16', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates facilis tenetur accusamus fugit maiores? Vero sint dignissimos placeat magnam ipsam!'),
(3, 'test', '2023-12-14', 'Dear Trainee,\r\n\r\n \r\n\r\nThis is to inform that Graded Quiz No. 3 of the Video Editing, Animation and Vlogging course will be opened on December 18, 2023 (12:00 AM) and last date to attempt quiz will be ');

-- --------------------------------------------------------

--
-- Table structure for table `office_leave`
--

CREATE TABLE `office_leave` (
  `id` int(11) NOT NULL,
  `employees_name` varchar(100) NOT NULL,
  `leave_title` varchar(255) NOT NULL,
  `emp_leave` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_leave`
--

INSERT INTO `office_leave` (`id`, `employees_name`, `leave_title`, `emp_leave`, `date`, `status`) VALUES
(1, 'maryam', 'test', 'test leave for the employee', '2023-12-12', 'verify'),
(2, 'maryam', 'lfdskfdsa', 'hi', '2023-12-12', 'pending'),
(3, 'daniyal', 'leave test', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, deserunt!', '2023-12-13', 'verify');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `employees_id` int(11) NOT NULL,
  `performance` varchar(200) NOT NULL DEFAULT 'in-progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `employees_id` int(11) NOT NULL,
  `performance_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `attendence_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `employees_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'in-process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task_title` varchar(100) NOT NULL,
  `task_descripttion` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `assign_to` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_title`, `task_descripttion`, `start_date`, `end_date`, `assign_to`, `status`) VALUES
(1, 'test_task', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum, molestias possimus? Eius aliquid deleniti ratione sit consequuntur cum velit magnam?', '2023-12-03', '2023-12-03', 'maryam', 'Completed'),
(2, 'tasl 2', 'how are you', '2023-12-03', '2023-12-03', 'daniyal', 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_leave`
--
ALTER TABLE `office_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `office_leave`
--
ALTER TABLE `office_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
