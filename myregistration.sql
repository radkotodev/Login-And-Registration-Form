-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 дек 2019 в 11:40
-- Версия на сървъра: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myregistration`
--

-- --------------------------------------------------------

--
-- Структура на таблица `coureworks`
--

CREATE TABLE `coureworks` (
  `courseworkID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `coureworks`
--

INSERT INTO `coureworks` (`courseworkID`, `name`, `studentID`, `date`) VALUES
(0, 'Курсова ', NULL, '2019-01-01');

-- --------------------------------------------------------

--
-- Структура на таблица `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура на таблица `myusers`
--

CREATE TABLE `myusers` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fnumber` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `course` int(4) NOT NULL,
  `education` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `myusers`
--

INSERT INTO `myusers` (`ID`, `username`, `fnumber`, `name`, `sname`, `lname`, `email`, `password`, `specialty`, `course`, `education`) VALUES
(10, 'z3raks@mail.bg', '1601261103', 'Radko', 'Georgiev', 'Todev', 'gogoeftimov@abv.bg', 'a48b95654dc185994c34e67986ecfdc2', 'Информатика', 4, ''),
(14, 'radkooo', '1111111111', 'Hristo', 'Galabov', 'Kovachev', 'hristoo@mail.bg', '798e211247476d65f4fd4bd9ea25e0f7', 'Информатика', 3, 'redovno'),
(15, 'z3raks', '1231231232', 'Василка', 'Георгиевa', 'Тодевa  ', 'gogoeftimovvv@abv.bg', '4e5f896e68eec5e7f59f732e60774572', 'Биология', 1, 'redovno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coureworks`
--
ALTER TABLE `coureworks`
  ADD PRIMARY KEY (`courseworkID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `myusers`
--
ALTER TABLE `myusers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `myusers`
--
ALTER TABLE `myusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `coureworks`
--
ALTER TABLE `coureworks`
  ADD CONSTRAINT `coureworks_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `myusers` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
