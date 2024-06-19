-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 10:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `CarID` varchar(10) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `PickUp` varchar(50) NOT NULL,
  `DropOff` varchar(50) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `CarID`, `start`, `end`, `PickUp`, `DropOff`, `TotalPrice`, `userID`) VALUES
(81, 'DX-3053', '2024-02-29 14:22:00', '2024-03-09 14:23:00', 'Colombo', 'Kegall', 19442, 22),
(82, 'ABC - 1234', '2024-04-06 09:02:00', '2024-04-06 13:02:00', 'Homagama', 'Colombo', 1800, 27),
(83, 'YZA - 8901', '2024-03-05 14:45:00', '2024-03-26 14:45:00', 'Colombo', 'Kurunegala', 216720, 30),
(84, 'VWX - 4567', '2024-03-15 14:46:00', '2024-03-30 14:46:00', 'Kurunegala', 'Anuradhapura', 66600, 30),
(85, 'ABC - 1234', '2024-03-09 09:32:00', '2024-03-09 11:32:00', 'Malabe', 'Colombo', 20000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `CarID` varchar(10) NOT NULL,
  `DriverId` varchar(20) NOT NULL,
  `brand` varchar(15) NOT NULL,
  `Model` varchar(10) NOT NULL,
  `Type` enum('Economy','Semi luxury','Luxury') DEFAULT NULL,
  `SeatingCapacity` int(1) NOT NULL,
  `TransmissionType` enum('Auto','Manual') NOT NULL,
  `hourlyRate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`CarID`, `DriverId`, `brand`, `Model`, `Type`, `SeatingCapacity`, `TransmissionType`, `hourlyRate`) VALUES
('BCD - 2345', '200222222222', 'Nissan', 'Sunny', 'Economy', 5, 'Auto', 190),
('CAB-1234', '200200000000', 'Suzuki', 'Maruthi', 'Economy', 4, 'Manual', 100),
('CAB-4321', '200200000000', 'Vega', 'EVX', 'Luxury', 4, 'Auto', 500),
('CAD 7410', '200388600185', 'Honda', 'check', 'Luxury', 12, 'Auto', 14500),
('DEF - 9012', '200200000000', 'Kia', 'Soul', 'Semi luxury', 5, 'Manual', 290),
('DX-3053', '200200000000', 'Tata', 'Nano', 'Economy', 4, 'Manual', 90),
('EFG - 6789', '123456789012', 'Mitsubishi', 'Lancer', 'Economy', 5, 'Manual', 155),
('FGH - 2345', '123456789012', 'Ford', 'F-150', 'Luxury', 3, 'Auto', 410),
('gfg', 'ADMIN', 'check', 'vb', 'Luxury', 2, 'Auto', 1),
('GHI - 3456', '200211111111', 'Subaru', 'Outback', 'Luxury', 5, 'Manual', 400),
('HIJ - 0123', '200222222222', 'Honda', 'City', 'Semi luxury', 5, 'Auto', 260),
('HIJ - 4567', '200211111111', 'Nissan', 'Kicks', 'Semi luxury', 5, 'Auto', 275),
('JKL - 2345', '200222222222', 'Chevrolet', 'Malibu', 'Luxury', 5, 'Auto', 445),
('JKL - 7890', '200200000000', 'Mazda', 'CX-5', 'Luxury', 5, 'Manual', 460),
('KLM - 8901', '200222222222', 'Suzuki', 'Vitara', 'Semi luxury', 5, 'Auto', 265),
('MNO - 2345', '200222222222', 'Volkswagen', 'Jetta', 'Luxury', 5, 'Manual', 475),
('MNO - 6789', '200200000000', 'BMW', '3 Series', 'Luxury', 5, 'Auto', 490),
('NOP - 2345', '200211111111', 'Toyota', 'Vios', 'Semi luxury', 5, 'Auto', 190),
('NOP - 8901', '123456789012', 'Suzuki', 'Ciaz', 'Semi luxury', 5, 'Auto', 240),
('PQR - 0123', '200200000000', 'Nissan', 'Altima', 'Luxury', 5, 'Auto', 415),
('PQR - 6789', '123456789012', 'Lexus', 'RX', 'Luxury', 5, 'Manual', 435),
('QRS - 2345', '200222222222', 'Nissan', 'Teana', 'Semi luxury', 5, 'Auto', 280),
('STU - 0123', '200200000000', 'Suzuki', 'Alto 800', 'Economy', 5, 'Manual', 160),
('STU - 4567', '200222222222', 'Audi', 'A4', 'Luxury', 5, 'Auto', 500),
('TUV - 6789', '200233333333', 'Mitsubishi', 'Galant', 'Luxury', 5, 'Auto', 480),
('VWX - 4567', 'uoc', 'Toyota', 'Corolla', 'Economy', 5, 'Auto', 185),
('VWX - 8901', '200211111111', 'Mercedes-Benz', 'C-Class', 'Luxury', 5, 'Auto', 510),
('WXY - 0123', '200222222222', 'Honda', 'Accord', 'Luxury', 5, 'Auto', 420),
('XYZ - 5678', '200233333333', 'Hyundai', 'Elantra', 'Luxury', 5, 'Auto', 400),
('YZA - 2345', '200211111111', 'Tesla', 'Model 3', 'Luxury', 5, 'Auto', 440),
('YZA - 8901', 'uoc', 'Honda', 'Civic', 'Luxury', 5, 'Manual', 430);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `telephone`, `subject`, `message`) VALUES
(1, 'Madara ', 'mada123@gmail.com', '0719589692', 'Inquiry', 'I need to get info about images'),
(2, 'Dinu', 'mada123@gmail.com', '0719589692', 'Inquiry', 'I need to get info about images'),
(3, 'Check 1', 'hjws@hkj.com', '34567', 'dfghj', 'sdfbnm'),
(4, 'Manu', 'manulakshan23@gmail.com', '0767894561', 'Inquiry', 'Complaint about management'),
(5, 'MADARAA', 'madara@gmail.com', '0719589692', 'yguigi', 'hjhvjj'),
(6, 'yuyu', '54e5ruy@gmail.com', '0719589692', 'hjbhjb', 'bvvbjh');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `username` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `idea` text NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`username`, `name`, `idea`, `suggestions`) VALUES
('madara22', 'madara', 'aiudhuoifui', 'ufhuifhIU'),
('Madara23013', 'Damithri Madara Meegama', 'kjfjaknjk', 'fjnajkbkfjabfhjb a');

-- --------------------------------------------------------

--
-- Table structure for table `hub`
--

CREATE TABLE `hub` (
  `id` varchar(12) NOT NULL,
  `name` text NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('M','F','OTHER') NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hub`
--

INSERT INTO `hub` (`id`, `name`, `mobile`, `dob`, `gender`, `pass`) VALUES
('123456789012', 'Sri Mathulan', '0112224448', '2002-10-17', 'M', 'mathulan'),
('200200000000', 'Himantha Marasinghe', '0717483647', '2002-06-04', 'M', 'himantha'),
('200211111111', 'Madara Meegama', '0115656789', '2002-08-14', 'F', 'madara'),
('200222222222', 'Mandinu Maneth', '0701234567', '2002-05-18', 'M', 'mandinu'),
('200233333333', 'Madushika Nethmini', '0779876543', '2002-10-19', 'F', 'madushika'),
('uoc', 'UOC', '0123456789', '1921-01-01', 'M', 'ucsc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `tp` varchar(12) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `Name`, `pwd`, `Email`, `tp`, `Address`) VALUES
(22, 'Himantha', '$2y$10$uRw2UV/isogpN23Mv/t39.sF8YmueOT0cSat.JMSNYiyQaZizcerK', 'himantha@mail.com', '0702955010', 'No. 112,Godawela, Polgahawela.'),
(25, 'Chathuni', '$2y$10$F5p26bXg4.WbCvPUFDpGDeIKnokGbjSQ7oZPurD4ZOcoYChc8CMVi', 'chathuni123@gmail.co', '0112855658', 'Kandy'),
(26, 'Madara', '$2y$10$wm8bVrzQwtfxDhunzxs0n.l6vV.JmVVS7vdCF3czUQm8Z5wY62LJO', 'madara123@gmail.com', '0112855658', 'Homagama'),
(27, 'Dinu', '$2y$10$5q3rxLRE5xx1IpFE05ffKOizIGK803CjMvLnjykMT0hkYPKkUoNs.', 'dinu123@gmail.com', '0719589692', 'Homagama'),
(30, 'UCSC', '$2y$10$mcieTRrLbtmocM35LaNaS.OEkioYVFP2c/zymwdYhVuaxmd6070GO', 'uoc', '0112855658', 'UOC, Colombo 7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Age`, `Password`) VALUES
(1, 'madara meegama', 'mada123@gmail.com', 20, '1234'),
(2, 'Himantha Marasinghe', 'himantha@mail.com', 21, 'himantha'),
(5, 'uoc22', 'uoc', 21, 'ucsc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`CarID`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hub`
--
ALTER TABLE `hub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
