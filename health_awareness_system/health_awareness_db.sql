-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2026 at 05:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_awareness_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `causes` text NOT NULL,
  `symptoms` text NOT NULL,
  `prevention` text NOT NULL,
  `treatment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `disease_name`, `causes`, `symptoms`, `prevention`, `treatment`) VALUES
(1, 'Malaria', 'Malaria is caused by parasites transmitted through mosquito bites.', 'Fever, headache, chills, joint pains and body weakness.', 'sleep under mosquito nets, mosquito repellant spray, mosquito coin and remove/manage stagnant water.', 'seek medical attention and use prescribed antimalarial medication as prescribed.'),
(2, 'Cholera', 'consumption of contaminated food and water', 'severe diarrhea, lost of appetite and dehydration', 'Practice drinking of clean water and proper sanitation.', 'oral rehydration and medical treatment'),
(6, 'Typhoid', 'Typhoid is caused by Salmonella Typhi bacteria, usually spread through contaminated food and water.', 'High fever, headache, stomach pain, weakness, loss of appetite, and diarrhea or constipation.', 'Drink safe water, wash hands regularly, maintain good sanitation, and eat properly cooked food.', 'Typhoid can be treated with antibiotics prescribed by a healthcare professional and adequate hydration.'),
(7, 'Diabetes', 'is caused by the body’s inability to produce enough insulin or use it effectively. This causes glucose (sugar) to build up in the bloodstream instead of fueling the cells. The root causes and mechanisms depend on the type of diabetes.', 'Increased thirst (polydipsia) and dry mouth.\r\nFrequent urination.\r\nFatigue.\r\nBlurred vision.\r\nUnexplained weight loss.', 'Lose a Modest Amount of Weight: Clinical trials show that losing just 5% to 7% of your body weight—about 10 to 14 pounds for a 200-pound person—can dramatically lower your risk. \r\n\r\nEmory Healthcare\r\n +1\r\nGet Regular Exercise: Aim for at least 150 minutes of moderate aerobic activity per week (such as brisk walking or swimming). Consistent movement helps your cells use insulin more effectively to manage blood sugar. \r\n\r\nMayo Clinic\r\n +1\r\nLimit Sugars and Refined Carbs: Cut down on sugary drinks, white bread, and sweets. Instead, opt for fiber-rich complex carbohydrates like vegetables, whole grains, and beans, which help prevent blood sugar spike', 'Monitoring your blood sugar (glucose) is key to determining how well your current treatment plan is working. Oral diabetes medications (taken by mouth) help manage blood sugar levels in people who have diabetes but still produce some insulin mainly people with Type diabetes and prediabetes.');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`id`, `hospital_name`, `phone_number`, `location`) VALUES
(1, 'Connaught Hospital', '+232 76 123456', 'Freetown'),
(2, '34 Military Hospital', '+232 77 654321', 'Wilberforce, Freetown');

-- --------------------------------------------------------

--
-- Table structure for table `health_tips`
--

CREATE TABLE `health_tips` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health_tips`
--

INSERT INTO `health_tips` (`id`, `title`, `content`) VALUES
(1, 'Drink safe water', 'Always drink clean and treated water to prevent waterborne diseases'),
(2, 'Wash hands regularly', 'wash your hands with soap and clean water before eating and before and after using the toilet.'),
(3, 'Exercise regularly', 'Frequent exercise is essential for body as it aids in the smooth functioning of organs and prevent sickness. ');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `correct_answer` char(1) NOT NULL,
  `option_d` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `question`, `option_a`, `option_b`, `option_c`, `correct_answer`, `option_d`) VALUES
(1, 'What is the main cause of malaria?', 'Dirty water', 'Mosquito bites', 'Cold weather', 'B', 'Stress'),
(2, 'How can cholera be prevented?', 'Drink contaminated water', 'Avoid handwashing', 'Practice good hygiene', 'C', 'Eat spoiled food');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date_taken` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `score`, `date_taken`) VALUES
(1, 1, 2, '2026-06-11 22:22:24'),
(2, 1, 0, '2026-06-11 22:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Test User', 'test@gmail.com', '123456'),
(2, 'Joy Bangura', 'joybangs@gmail.com', '4567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_tips`
--
ALTER TABLE `health_tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `health_tips`
--
ALTER TABLE `health_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
