-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 05:10 PM
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
-- Database: bloodbank
--

-- --------------------------------------------------------

--
-- Table structure for table admindata
--

CREATE TABLE admindata (
  email varchar(30) NOT NULL,
  passwords varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table admindata
--

INSERT INTO admindata (email, passwords) VALUES
('maitri@gmail.com', 'maitri123'),
('shiv@gmail.com', 'shiv123');

-- --------------------------------------------------------

--
-- Table structure for table donation
--

CREATE TABLE donation (
  id int(15) NOT NULL,
  donorname varchar(50) NOT NULL,
  Gender varchar(10) NOT NULL,
  age int(5) NOT NULL,
  BloodGroup varchar(10) NOT NULL,
  unit int(11) NOT NULL DEFAULT 1,
  DonationDate date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table donation
--

INSERT INTO donation (id, donorname, Gender, age, BloodGroup, unit, DonationDate) VALUES
(1, 'payal patel', 'male', 23, 'AB-', 1, '2023-11-15'),
(15, 'siddhi Patel', 'female', 22, 'AB+', 1, '2023-11-23');

-- --------------------------------------------------------

--
-- Table structure for table donationhistory
--

CREATE TABLE donationhistory (
  id int(11) NOT NULL,
  dname varchar(50) NOT NULL,
  age int(3) NOT NULL,
  gender varchar(10) NOT NULL,
  bloodgroup varchar(10) NOT NULL,
  unit int(11) NOT NULL,
  DonationDate date NOT NULL,
  statuss varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table donationhistory
--

INSERT INTO donationhistory (id, dname, age, gender, bloodgroup, unit, DonationDate, statuss) VALUES
(1, 'tandel Dhruvi', 22, 'female', 'B+', 1, '2023-09-23', 'Added'),
(2, 'zankhna', 24, 'female', 'AB+', 1, '2023-09-29', 'Added'),
(3, 'hjtandel', 19, 'male', 'A+', 1, '2023-09-22', 'Added'),
(4, 'sahil patel', 22, 'male', 'B+', 1, '2023-10-06', 'Added'),
(5, 'Harsh Tandel', 24, 'male', 'A+', 1, '2023-09-30', 'Added');

-- --------------------------------------------------------

--
-- Table structure for table donordata
--

CREATE TABLE donordata (
  id int(11) NOT NULL,
  username varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  passwords varchar(20) NOT NULL,
  Age int(3) NOT NULL,
  Phone varchar(15) NOT NULL,
  gender varchar(10) NOT NULL,
  bloodgroup varchar(5) NOT NULL,
  DonationDate date DEFAULT NULL,
  city varchar(20) NOT NULL,
  area varchar(30) NOT NULL,
  height decimal(5,2) NOT NULL,
  weight decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table donordata
--

INSERT INTO donordata (id, username, email, passwords, Age, Phone, gender, bloodgroup, DonationDate, city, area, Height, Weight) VALUES
(1, 'Aditi Shah', 'aditi11@gmail.com', 'aditi1122', 20, '8867473749', 'female', 'A-', '2023-05-29', 'Valsad', 'Mograwadi', 5.4, 55),
(2, 'Neha Patel', 'neha20@gmail.com', 'neha123', 21, '9099876768', 'female', 'AB-', '2023-05-15', 'Dungari', 'Jespor', 5.5, 58),
(3, 'Riya Surti', 'riya32@gmail.com', 'r1234', 21, '6756476769', 'female', 'B+', '2023-05-28', 'Surat', 'Udhna', 5.3, 52),
(4, 'Priya Patel', 'priya16@mail.com', 'priya123', 20, '9966545546', 'female', 'AB+', '2023-05-23', 'Valsad', 'Tithal', 5.6, 60),
(5, 'Jaya Tandel', 'jaya@gmail.com', 'jaya123', 20, '7389894867', 'female', 'A+', '2023-05-30', 'Valsad', 'Bhadeli', 5.4, 56),
(6, 'Shivani Patel', 'shivani27@gmail.com', 'shivani', 21, '8789789778', 'female', 'B-', '2023-06-21', 'Valsad', 'Mograwadi', 5.7, 57),
(7, 'Anjali Jadav', 'anjali7@gmail.com', 'anjali007', 20, '9987989897', 'female', 'AB-', '2023-09-22', 'Surat', 'Kim', 5.3, 54),
(8, 'Rashmi Patel', 'rashmi33@gmail.com', 'rashmi789', 21, '7787989897', 'female', 'A-', '2024-09-07', 'Bardoli', 'Baben', 5.4, 56),
(9, 'Harshita Tandel', 'harshita@gmail.com', 'harshita123', 22, '8867473749', 'female', 'A+', '2024-09-07', 'Vapi', 'Gunjan', 5.5, 57),
(10, 'Divya Patel', 'divya20@mail.com', 'divya1234', 20, '8877878998', 'female', 'AB+', '2024-09-13', 'Surat', 'Adajan', 5.4, 55),
(11, 'Sakshi Khatik', 'sakshi@mail.com', 'sakshi1234', 20, '9867788788', 'female', 'B+', '2024-09-13', 'Valsad', 'Tithal', 5.2, 52),
(12, 'Sanya Yadav', 'sanya@mail.com', 'sanya1234', 21, '6565656566', 'female', 'B+', '2024-09-06', 'Vapi', 'Namdha', 5.6, 59);

-- --------------------------------------------------------

--
-- Table structure for table inbox
--

CREATE TABLE inbox (
  UserName varchar(50) NOT NULL,
  PhoneNO varchar(20) NOT NULL,
  Email varchar(50) NOT NULL,
  Massage varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table inbox
--

INSERT INTO inbox (UserName, PhoneNO, Email, Massage) VALUES
('Harsh Tandel', '7389894867', 'harsh@mail.com', 'ghfdhgdhthgfhd'),
('Shiv Patel', '9898989888', 'shiv27@gmail.com', 'To change Address Dungari TO Valsad ');

-- --------------------------------------------------------

--
-- Table structure for table requesthistory
--

CREATE TABLE requesthistory (
  UID int(10) NOT NULL,
  R_EMAIL varchar(50) NOT NULL,
  P_NAME varchar(50) NOT NULL,
  P_GENDER varchar(10) NOT NULL,
  P_BLOODGRP varchar(10) NOT NULL,
  UNITS int(10) NOT NULL,
  REQUEST_DATE date NOT NULL,
  STATUSS varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table requesthistory
--

INSERT INTO requesthistory (UID, R_EMAIL, P_NAME, P_GENDER, P_BLOODGRP, UNITS, REQUEST_DATE, STATUSS) VALUES
(1, 'divya@gmail.com', 'Aarti Patel', 'female', 'A+', 1, '2023-05-22', 'Approved'),
(2, 'aarti123@gmail.com', 'Anita Sharma', 'female', 'AB+', 2, '2023-05-22', 'Approved'),
(3, 'anita4567@gmail.com', 'Sneha Patel', 'female', 'AB+', 2, '2023-05-22', 'Approved'),
(4, 'tejas@gmail.com', 'Rita Joshi', 'female', 'AB-', 2, '2023-06-22', 'Approved'),
(5, 'rita123@gmail.com', 'Neeta Sharma', 'female', 'AB-', 3, '2024-06-22', 'Approved'),
(6, 'neeta789@gmail.com', 'Maya Verma', 'female', 'O+', 3, '2024-06-28', 'Approved'),
(7, 'maya101@gmail.com', 'Pooja Gupta', 'female', 'O-', 4, '2023-12-28', 'Approved'),
(8, 'pooja202@gmail.com', 'Sonia Rani', 'female', 'O-', 4, '2023-12-28', 'Approved'),
(9, 'sonia303@gmail.com', 'Sushma Patel', 'female', 'O-', 4, '2024-1-28', 'Approved'),
(10, 'sushma404@gmail.com', 'Kavita Mehta', 'female', 'B+', 3, '2024-03-28', 'Decline'),
(11, 'kavita505@gmail.com', 'Aishwarya Rao', 'female', 'B-', 3, '2024-09-12', 'Approved'),
(12, 'aishwarya606@gmail.com', 'Anjali Singh', 'female', 'O-', 4, '2024-09-13', 'Decline');

-- --------------------------------------------------------

--
-- Table structure for table requests
--

CREATE TABLE requests (
  R_ID int(11) NOT NULL,
  R_EMAIL varchar(50) NOT NULL,
  P_NAME varchar(50) NOT NULL,
  P_GENDER varchar(10) NOT NULL,
  P_BLOODGRP varchar(10) NOT NULL,
  RUNITS int(2) NOT NULL,
  REQUEST_DATE date NOT NULL DEFAULT current_timestamp(),
  DOCUMENT varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table requests
--

INSERT INTO requests (R_ID, R_EMAIL, P_NAME, P_GENDER, P_BLOODGRP, RUNITS, REQUEST_DATE, DOCUMENT) VALUES
(15, 'siddhi@mail.com', 'siddhi Patel', 'male', 'B+', 2, '2024-6-26', 'upload/medical-expenses-for-hospitals-2.png');

-- --------------------------------------------------------

--
-- Table structure for table totalunit
--

CREATE TABLE totalunit (
  BloodType varchar(5) NOT NULL,
  TotalUnit int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table totalunit
--

INSERT INTO totalunit (BloodType, TotalUnit) VALUES
('AB+', 42),
('AB-', 31),
('A+', 44),
('A-', 38),
('B+', 45),
('B-', 30),
('O+', 33),
('O-', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table admindata
--
ALTER TABLE admindata
  ADD PRIMARY KEY (email);

--
-- Indexes for table donordata
--
ALTER TABLE donordata
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY email (email);

--
-- Indexes for table inbox
--
ALTER TABLE inbox
  ADD PRIMARY KEY (Email);

--
-- Indexes for table requests
--
ALTER TABLE requests
  ADD UNIQUE KEY R_EMAIL (R_EMAIL);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table donordata
--
ALTER TABLE donordata
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;