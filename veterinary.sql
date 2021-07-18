-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 02:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veterinary`
--

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `quoteId` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(80) NOT NULL,
  `petType` varchar(20) NOT NULL,
  `petGender` varchar(10) NOT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`quoteId`, `name`, `contact`, `email`, `petType`, `petGender`, `message`) VALUES
('210717194548', 'Janice', '0124568753', 'janicetan@gmail.com', 'dog', 'not sure', 'neuter price for puppy, thanks.'),
('210717194629', 'tan', '0123456789', 'tan.kl1997@gmail.com', 'dog', 'female', 'full body check rate'),
('210718131630', 'Atirah', '0176542384', 'atirahbtmhd@gmail.com', 'cat', 'female', 'I would like to know the price for cat grooming. Thank you.'),
('210718133052', 'Namjoon', '0167512365', 'namjoon@gmail.com', 'dog', 'male', 'grooming'),
('210718171759', 'Jason', '0174562135', 'jason@gmail.com', 'hamster', 'male', ''),
('210718191705', 'Tan', '0174521365', 'tan@gmail.com', 'cat', 'female', 'price for dental care.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testId` varchar(12) NOT NULL,
  `name` varchar(20) NOT NULL,
  `rate` int(1) NOT NULL,
  `comment` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testId`, `name`, `rate`, `comment`) VALUES
('210718021118', 'Hisham', 5, 'Superb service.\r\nFriendly staff.\r\nWe came at peak time, quite a long queue. But definitely worth the wait for our Mr Meowgi.\r\nDefinitely a recommended vet clinic.'),
('210718021130', 'Yamin', 5, 'First time here. Staff and doctor friendly. Good service.'),
('210718021229', 'Jeffery', 5, 'Took my dog for some medical attention. A very professional vet at a reasonable price.\r\n'),
('210718021604', 'Dylan', 5, 'i came in to have a stray dog checked, it couldn\'t walk nor stand and super dirty amd stinky, all soiled. Although they close at 10pm, they were not rushing through to complete the consultation, it all ended at 10.25pm. Fee was not raised even though they had to stay longer. This shows how kimd heartedness overides anything else. I do appreciate the attention, care , and advice they gave. These veterinarians and receptionist really work out of compassion amd love for animals. Thank you so much for not ripping me off, from helping out this stray dog. very understanding team here.'),
('210718025945', 'Maria', 1, 'Bring my stray cat for 2 times and the result was terrible. Both of my cat died. They had charged me with very high price even my 2 cats died. This clinic can only do minor case. They cannot perform in major case. Vet here only talk much (especially the woman vet) and their receptionist was rude. I was standing in front of her to register, and she just talk as if i come to the clinic with free charges. What a rude woman!! Her face seem annoyed to entertain customer.\r\nDo not go to this clinic!'),
('210718030019', 'Azzar', 5, 'Took my cat for fleas treatment & skin irritation for the 1st time here. The reception staff welcome us well. The vet & the assistant were very polite, nice & gentle with my cat- Bushy. The vet seems very concerned about my cat problems & she taught me how to take care of the problems ,. answered my questions very well and she keep telling me what to do to make sure i understand. Overall, satisfied with the service & will repeat for next time. Price wise - reasonable. Environment - very clean & not smelly, unlike the other clinic i been b4 nearby there. Good job u guys.'),
('210718130604', 'Aemit', 4, 'Although the clinic was a little bit small... But full facilities.\r\nIncluding x-ray....'),
('210718171851', 'Atif', 5, 'Answered my questions regarding the pet even before I went to the vet. I just had to make sure if it\'s necessary to bring the stray cat there or I can actually treat the wounds myself. So I consulted them through whatsapp first. Their response are fast and helpful.\r\n'),
('210718191803', 'Tan', 5, 'Best clinic ever!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`quoteId`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
