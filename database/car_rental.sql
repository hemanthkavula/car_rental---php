-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 09:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `city_id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `agency_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id`, `city_id`, `email`, `password`, `phone`, `agency_name`, `address`) VALUES
(1, 4, 'savaaricarrental@gmail.com', '123456', '9045450000', 'Savaari Car Rentals', 'Flat No. 311, 3rd floor building, Model House, Saibaba Temple Rd, Dwarakapuri, Punjagutta, Hyderabad, Telangana 500082'),
(2, 4, 'siddartha@gmail.com', '123456', '9849302782', 'Sidhartha Car Rentals', 'Shop No. 4-1-466, Sidhartha Complex, Bank St, Koti, Hyderabad, Telangana 500001'),
(3, 4, 'reddy@gmail.com', '123456', '9666326033', 'Reddy Car Travels Pvt.Ltd', '1-9-290/2/2 Flat 103 Tirumala Residency, opp. Janapriya Apartment, Vidyanagar, Hyderabad, Telangana 500044'),
(4, 1, 'suresh@gmail.com', '123456', '8500733008', 'suresh car rental', '2-42/5, bangalore'),
(5, 1, 'nithinm@gmail.com', '123456', '8796483547', 'Nithin car rental', '5-42/8, near dmart, bangalore'),
(6, 1, 'bhargav@gmail.com', '123456', '7986485210', 'bhargav car rental', '4-56/3, near reliance store, bangalore'),
(7, 2, 'ganesh@gmail.com', '123456', '8645792453', 'ganesh car rental', '3-42/1, near red fort, Delhi'),
(8, 2, 'divakar@gmail.com', '123456', '9876452453', 'divakar car rental', '5-35/9, delhi'),
(9, 2, 'pavan@gmail.com', '123456', '7954683512', 'pavan car rental', '4-69/32, delhi'),
(10, 3, 'kalyan@gmail.com', '123456', '9875486214', 'kalyan car rental', '2-35/7, mumbai'),
(11, 3, 'saikumar@gmail.com', '123456', '7954632114', 'Sai kumar car rental', '2-35/9, near dmart, mumbai'),
(12, 3, 'sesha@gmail.com', '123456', '7745648213', 'sesha car rental', '3-56/8, near reliance mart, mumbai'),
(13, 5, 'swaroop@gmail.com', '123456', '8899775462', 'swaroop car rental', '3-45/9, near dmart, chennai'),
(14, 5, 'praveen@gmail.com', '123456', '8877554692', 'praveen car rental', '4-3/5, near chennai biryani point, chennai'),
(15, 5, 'vinay@gmail.com', '123456', '9875642345', 'vinay car rental', 'near reliance mart, chennai');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `booking_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `city_id` int(100) NOT NULL,
  `agency_id` int(100) NOT NULL,
  `car_id` int(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days` int(100) NOT NULL,
  `total_rent` int(100) NOT NULL,
  `paidornot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `user_id`, `city_id`, `agency_id`, `car_id`, `start_date`, `end_date`, `days`, `total_rent`, `paidornot`) VALUES
(1, 7258355, 3, 4, 1, 1, '2023-01-13', '2023-01-15', 3, 18000, 'Paid'),
(2, 74460849, 3, 1, 5, 8, '2023-01-14', '2023-01-21', 8, 44000, 'Paid'),
(3, 72175736, 4, 4, 2, 4, '2023-01-12', '2023-01-13', 2, 11000, 'Paid'),
(4, 4800154, 4, 4, 3, 6, '2023-01-13', '2023-01-14', 2, 10000, 'Paid'),
(5, 28489292, 5, 1, 4, 7, '2023-01-13', '2023-01-14', 2, 12000, 'Paid'),
(6, 80841450, 5, 2, 7, 13, '2023-01-15', '2023-01-16', 2, 12000, 'Paid'),
(7, 80772848, 5, 3, 11, 23, '2023-01-17', '2023-01-20', 4, 24000, 'Paid'),
(8, 75858980, 5, 5, 13, 25, '2023-01-22', '2023-01-23', 2, 12000, 'Paid'),
(9, 25072121, 5, 4, 1, 1, '2023-01-26', '2023-01-28', 3, 18000, 'Paid'),
(10, 1258314, 3, 1, 6, 10, '2023-01-26', '2023-01-28', 3, 19500, 'Paid'),
(11, 90470802, 3, 2, 9, 16, '2023-01-25', '2023-01-25', 1, 5500, 'Paid'),
(12, 26067493, 3, 3, 12, 21, '2023-01-12', '2023-01-12', 1, 6500, 'Paid'),
(13, 28129990, 3, 4, 2, 3, '2023-01-28', '2023-01-31', 4, 26000, 'Paid'),
(14, 94094493, 3, 5, 15, 27, '2023-01-14', '2023-01-16', 3, 19500, 'Paid'),
(15, 28313967, 4, 2, 8, 15, '2023-01-13', '2023-01-13', 1, 6500, 'Paid'),
(16, 49019763, 4, 3, 10, 19, '2023-01-20', '2023-01-22', 3, 18000, 'Paid'),
(17, 14335144, 4, 5, 14, 26, '2023-01-27', '2023-01-31', 5, 30000, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'bangalore'),
(2, 'delhi'),
(3, 'mumbai'),
(4, 'hyderabad'),
(5, 'chennai');

-- --------------------------------------------------------

--
-- Table structure for table `rentcars`
--

CREATE TABLE `rentcars` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `agency_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `model` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `seating` int(100) NOT NULL,
  `rent` int(11) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentcars`
--

INSERT INTO `rentcars` (`id`, `city_id`, `agency_id`, `name`, `model`, `number`, `seating`, `rent`, `description`) VALUES
(1, 4, 1, 'Maruthi Suzuki', 'swift', 'ap07df7573', 5, 6000, 'The Maruti Swift has 1 Petrol Engine and 1 CNG Engine on offer. The Petrol engine is 1197 cc while the CNG engine is 1197 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Swift has a mileage of 23.2 kmpl to 30.9 km/kg . The Swift is a 5 seater 4 cylinder car and has length of 3845mm, width of 1735 and a wheelbase of 2450.'),
(2, 4, 1, 'Mahindra', 'Thar', 'ap09fd6543', 6, 6000, 'Safety is taken care of by dual front airbags, ABS with EBD, brake assist, ESP, hill hold, hill descent control, rear parking sensors and ISOFIX. It also features a tyre pressure monitoring system and tyre position indicator which should prove handy, especially off road. Oddly, there’s no rear camera.'),
(3, 4, 2, 'Tata', 'Nexon', 'ap09fr6789', 5, 6500, 'The Tata Nexon has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1497 cc while the Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Nexon has a mileage of 22.07 kmpl & Ground clearance of Nexon is 209. The Nexon is a 5 seater 4 cylinder car and has length of 3993, width of 1811 and a wheelbase of 2498.'),
(4, 4, 2, 'Hyundai', 'creta', 'ap07er4365', 5, 5500, 'The Hyundai Creta has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1497 cc and 1353 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Creta has a mileage of 16.8 kmpl . The Creta is a 5 seater 4 cylinder car and has length of 4300mm, width of 1790mm and a wheelbase of 2610mm.'),
(5, 4, 3, 'Toyota', 'Fortuner', 'ap07df4543', 5, 6000, 'The Toyota Fortuner has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 2755 cc while the Petrol engine is 2694 cc . It is available with Automatic & Manual transmission.Depending upon the variant and fuel type the Fortuner has a mileage of 10.0 kmpl . The Fortuner is a 7 seater 4 cylinder car and has length of 4795mm, width of 1855mm and a wheelbase of 2745mm.'),
(6, 4, 3, 'Tata ', 'Punch', 'ap07fg3232', 4, 5000, 'The Tata Punch has 1 Petrol Engine on offer. The Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Punch has a mileage of 18.82 to 18.97 kmpl . The Punch is a 5 seater 3 cylinder car and has length of 3827mm, width of 1742 and a wheelbase of 2445.'),
(7, 1, 4, 'Maruthi Suzuki', 'swift', 'ap07fr5678', 5, 6000, 'The Maruti Swift has 1 Petrol Engine and 1 CNG Engine on offer. The Petrol engine is 1197 cc while the CNG engine is 1197 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Swift has a mileage of 23.2 kmpl to 30.9 km/kg . The Swift is a 5 seater 4 cylinder car and has length of 3845mm, width of 1735 and a wheelbase of 2450.'),
(8, 1, 5, 'Hyundai', 'creta', 'ap07rt5678', 5, 5500, 'The Hyundai Creta has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1497 cc and 1353 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Creta has a mileage of 16.8 kmpl . The Creta is a 5 seater 4 cylinder car and has length of 4300mm, width of 1790mm and a wheelbase of 2610mm.'),
(9, 1, 4, 'Mahindra', 'Thar', 'ap09fd4323', 6, 6000, 'Safety is taken care of by dual front airbags, ABS with EBD, brake assist, ESP, hill hold, hill descent control, rear parking sensors and ISOFIX. It also features a tyre pressure monitoring system and tyre position indicator which should prove handy, especially off road. Oddly, there’s no rear camera.'),
(10, 1, 6, 'Tata', 'Nexon', 'ap07gh5432', 5, 6500, 'The Tata Nexon has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1497 cc while the Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Nexon has a mileage of 22.07 kmpl & Ground clearance of Nexon is 209. The Nexon is a 5 seater 4 cylinder car and has length of 3993, width of 1811 and a wheelbase of 2498.'),
(11, 1, 6, 'Toyota', 'Fortuner', 'ap07eh5689', 5, 6000, 'The Toyota Fortuner has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 2755 cc while the Petrol engine is 2694 cc . It is available with Automatic & Manual transmission.Depending upon the variant and fuel type the Fortuner has a mileage of 10.0 kmpl . The Fortuner is a 7 seater 4 cylinder car and has length of 4795mm, width of 1855mm and a wheelbase of 2745mm.'),
(12, 1, 5, 'Tata ', 'Punch', 'ap07gf6545', 4, 5000, 'The Tata Punch has 1 Petrol Engine on offer. The Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Punch has a mileage of 18.82 to 18.97 kmpl . The Punch is a 5 seater 3 cylinder car and has length of 3827mm, width of 1742 and a wheelbase of 2445.'),
(13, 2, 7, 'Maruthi Suzuki', 'swift', 'ap07tf7573', 5, 6000, 'The Maruti Swift has 1 Petrol Engine and 1 CNG Engine on offer. The Petrol engine is 1197 cc while the CNG engine is 1197 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Swift has a mileage of 23.2 kmpl to 30.9 km/kg . The Swift is a 5 seater 4 cylinder car and has length of 3845mm, width of 1735 and a wheelbase of 2450.'),
(14, 2, 7, 'Mahindra', 'Thar', 'ap09fd6556', 6, 6000, 'Safety is taken care of by dual front airbags, ABS with EBD, brake assist, ESP, hill hold, hill descent control, rear parking sensors and ISOFIX. It also features a tyre pressure monitoring system and tyre position indicator which should prove handy, especially off road. Oddly, there’s no rear camera.'),
(15, 2, 8, 'Tata', 'Nexon', 'ap09fr6786', 5, 6500, 'The Tata Nexon has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1497 cc while the Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Nexon has a mileage of 22.07 kmpl & Ground clearance of Nexon is 209. The Nexon is a 5 seater 4 cylinder car and has length of 3993, width of 1811 and a wheelbase of 2498.'),
(16, 2, 9, 'Hyundai', 'creta', 'ap07er4234', 5, 5500, 'The Hyundai Creta has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1497 cc and 1353 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Creta has a mileage of 16.8 kmpl . The Creta is a 5 seater 4 cylinder car and has length of 4300mm, width of 1790mm and a wheelbase of 2610mm.'),
(17, 2, 8, 'Toyota', 'Fortuner', 'ap07df6790', 5, 6000, 'The Toyota Fortuner has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 2755 cc while the Petrol engine is 2694 cc . It is available with Automatic & Manual transmission.Depending upon the variant and fuel type the Fortuner has a mileage of 10.0 kmpl . The Fortuner is a 7 seater 4 cylinder car and has length of 4795mm, width of 1855mm and a wheelbase of 2745mm.'),
(18, 2, 9, 'Tata ', 'Punch', 'ap07fg5443', 4, 5000, 'The Tata Punch has 1 Petrol Engine on offer. The Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Punch has a mileage of 18.82 to 18.97 kmpl . The Punch is a 5 seater 3 cylinder car and has length of 3827mm, width of 1742 and a wheelbase of 2445.'),
(19, 3, 10, 'Maruthi Suzuki', 'swift', 'ap07tf5432', 5, 6000, 'The Maruti Swift has 1 Petrol Engine and 1 CNG Engine on offer. The Petrol engine is 1197 cc while the CNG engine is 1197 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Swift has a mileage of 23.2 kmpl to 30.9 km/kg . The Swift is a 5 seater 4 cylinder car and has length of 3845mm, width of 1735 and a wheelbase of 2450.'),
(20, 3, 11, 'Mahindra', 'Thar', 'ap09fd6565', 6, 6000, 'Safety is taken care of by dual front airbags, ABS with EBD, brake assist, ESP, hill hold, hill descent control, rear parking sensors and ISOFIX. It also features a tyre pressure monitoring system and tyre position indicator which should prove handy, especially off road. Oddly, there’s no rear camera.'),
(21, 3, 12, 'Tata', 'Nexon', 'ap09fr6798', 5, 6500, 'The Tata Nexon has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1497 cc while the Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Nexon has a mileage of 22.07 kmpl & Ground clearance of Nexon is 209. The Nexon is a 5 seater 4 cylinder car and has length of 3993, width of 1811 and a wheelbase of 2498.'),
(22, 3, 10, 'Hyundai', 'creta', 'ap07er4267', 5, 5500, 'The Hyundai Creta has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1497 cc and 1353 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Creta has a mileage of 16.8 kmpl . The Creta is a 5 seater 4 cylinder car and has length of 4300mm, width of 1790mm and a wheelbase of 2610mm.'),
(23, 3, 11, 'Toyota', 'Fortuner', 'ap07df6780', 5, 6000, 'The Toyota Fortuner has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 2755 cc while the Petrol engine is 2694 cc . It is available with Automatic & Manual transmission.Depending upon the variant and fuel type the Fortuner has a mileage of 10.0 kmpl . The Fortuner is a 7 seater 4 cylinder car and has length of 4795mm, width of 1855mm and a wheelbase of 2745mm.'),
(24, 3, 12, 'Tata ', 'Punch', 'ap07fg5445', 4, 5000, 'The Tata Punch has 1 Petrol Engine on offer. The Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Punch has a mileage of 18.82 to 18.97 kmpl . The Punch is a 5 seater 3 cylinder car and has length of 3827mm, width of 1742 and a wheelbase of 2445.'),
(25, 5, 13, 'Maruthi Suzuki', 'swift', 'ap07tf5478', 5, 6000, 'The Maruti Swift has 1 Petrol Engine and 1 CNG Engine on offer. The Petrol engine is 1197 cc while the CNG engine is 1197 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Swift has a mileage of 23.2 kmpl to 30.9 km/kg . The Swift is a 5 seater 4 cylinder car and has length of 3845mm, width of 1735 and a wheelbase of 2450.'),
(26, 5, 14, 'Mahindra', 'Thar', 'ap09fd6575', 6, 6000, 'Safety is taken care of by dual front airbags, ABS with EBD, brake assist, ESP, hill hold, hill descent control, rear parking sensors and ISOFIX. It also features a tyre pressure monitoring system and tyre position indicator which should prove handy, especially off road. Oddly, there’s no rear camera.'),
(27, 5, 15, 'Tata', 'Nexon', 'ap09fr6765', 5, 6500, 'The Tata Nexon has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1497 cc while the Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Nexon has a mileage of 22.07 kmpl & Ground clearance of Nexon is 209. The Nexon is a 5 seater 4 cylinder car and has length of 3993, width of 1811 and a wheelbase of 2498.'),
(28, 5, 13, 'Hyundai', 'creta', 'ap07er5654', 5, 5500, 'The Hyundai Creta has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1497 cc and 1353 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Creta has a mileage of 16.8 kmpl . The Creta is a 5 seater 4 cylinder car and has length of 4300mm, width of 1790mm and a wheelbase of 2610mm.'),
(29, 5, 15, 'Toyota', 'Fortuner', 'ap07rt6780', 5, 6000, 'The Toyota Fortuner has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 2755 cc while the Petrol engine is 2694 cc . It is available with Automatic & Manual transmission.Depending upon the variant and fuel type the Fortuner has a mileage of 10.0 kmpl . The Fortuner is a 7 seater 4 cylinder car and has length of 4795mm, width of 1855mm and a wheelbase of 2745mm.'),
(30, 5, 14, 'Tata ', 'Punch', 'ap07fg7679', 4, 5000, 'The Tata Punch has 1 Petrol Engine on offer. The Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Punch has a mileage of 18.82 to 18.97 kmpl . The Punch is a 5 seater 3 cylinder car and has length of 3827mm, width of 1742 and a wheelbase of 2445.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `agency_id`, `user_name`, `content`) VALUES
(1, 1, 'Ashutosh Gowariker', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(2, 2, 'Karan Johar', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(3, 3, 'Zoya Akhtar', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(4, 4, 'Farhan Akhtar', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(5, 5, 'Anurag Kashyap', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(6, 6, 'Mira Nair', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(7, 7, 'Meghna Gulzar', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(8, 8, 'Farah Khan', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(9, 9, 'Rajkumar Hirani', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(10, 10, 'Sanjay Leela Bhansali', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(11, 11, 'Sanjay Leela Bhansali', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(12, 12, 'Sanjay Leela Bhansali', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(13, 13, 'Sanjay Leela Bhansali', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(14, 14, 'Sanjay Leela Bhansali', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.'),
(15, 15, 'Sanjay Leela Bhansali', 'You just have to arrive at the place, it\'s fully furnished and stocked with all basic amenities and services and even your friends are welcome.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `phone`, `address`) VALUES
(3, 'hemanthchowdarykavula@gmail.com', '123456', 'Kavula Hemanth Chowdary', '9381532028', '2-42/1, BK Palem, Kakumanu'),
(4, 'adithyakumar620@gmail.com', '123456', 'adithya kumar', '8688442885', 'narasaraopet,guntur,ap'),
(5, 'divya@gmail.com', '123456', 'divya sri', '8796451456', 'hyderabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentcars`
--
ALTER TABLE `rentcars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`),
  ADD KEY `rentcars_ibfk_1` (`city_id`),
  ADD KEY `agency_id` (`agency_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`agency_id`);

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
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rentcars`
--
ALTER TABLE `rentcars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentcars`
--
ALTER TABLE `rentcars`
  ADD CONSTRAINT `rentcars_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
