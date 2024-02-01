-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 04:56 PM
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
-- Database: `bus_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL DEFAULT 'admin123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'admin1', 'admin123'),
(2, 'admin2', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `registration_number` varchar(100) CHARACTER SET latin1 NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `verify_token` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT 'git123',
  `student_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `bus_allocated` int(11) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `year_of_engineering` int(10) NOT NULL,
  `department` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  `stop` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fees` bigint(50) NOT NULL,
  `paid_fees` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date_of_fees_paid` date DEFAULT NULL,
  `next_date_to_pay_fees` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `registration_number`, `student_email`, `verify_token`, `password`, `student_name`, `bus_allocated`, `phone`, `year_of_engineering`, `department`, `location`, `stop`, `fees`, `paid_fees`, `date_of_fees_paid`, `next_date_to_pay_fees`) VALUES
(1, 'EN20165412', 'en20165412@git-india.edu.in', '2051d12bfed902ed879b8c41e44185f9', 'git123', 'omkar ghorpade', 3, 9114759612, 3, 'computer', 'Chiplun', 'markandi', 1400, 'yes', '2022-10-17', '2022-11-10'),
(2, 'EN20169841', 'en20169841@git-india.edu.in', '2a3c291884114dc86c243394409484bc', 'git123', 'sujeet ghadge', 1, 9114759646, 3, 'mechanical', 'khed', 'khed', 1400, 'yes', '2022-10-16', '2022-10-29'),
(3, 'EN20140555', 'en20140555@git-india.edu.in', 'cd654dcdc5c86b3ae1aa2da9821971d9', 'git123', 'Yash Chawan', 3, 9604017193, 3, 'computer', 'chiplun', 'powerhouse', 1400, 'yes', '2022-11-01', '2022-12-01'),
(4, 'EN20169879', 'vinitchavan1234@gmail.com', '126e560f55d729776c686ae32e7f6e29', 'git123', 'vinit chavan', 3, 9112706329, 3, 'computer', 'chiplun', 'powerhouse', 1400, 'yes', '2023-01-07', '2023-02-07'),
(5, 'EN20131572', 'en20131572@git-india.edu.in', '8765df12eac9f345e5e2507488065814', 'git123', 'Rohit Gawas', 3, 9112726571, 3, 'chemical', 'Chiplun', 'Chincha Naka', 1400, 'yes', '2023-01-07', '2023-02-07'),
(6, 'EN20169860', 'en20169860@git-india.edu.in', '07268a335b42e423fc494c9da8e3d9bb', 'git123', 'shubham vilankar', 2, 9114759675, 3, 'computer', 'Bahadurshek', 'Bahadurshek', 1400, 'yes', '2023-01-07', '2023-02-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_email` (`registration_number`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
