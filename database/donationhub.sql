-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 09:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donationhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(7) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `fullname`, `email`, `password`, `contactno`, `dob`, `gender`, `image`) VALUES
(23, 'Mohini Soni', 'mohinisoni04@gmail.com', '$2y$10$a03yLZPmtghUm.z3MjNjR.uX2zwEAlALb2vnprPMeqa19u27h/PxK', 7987577104, '1996-05-11', 'female', 'image/admin/1552280743_IMG-20180422-WA0084.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `area_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `c_id`, `area_name`) VALUES
(1, 1, 'new bus-stand'),
(3, 2, 'santram mandir'),
(4, 3, 'sayaji gunj'),
(5, 3, 'Atladra'),
(6, 3, 'Alkapuri'),
(7, 3, 'Gotri Road'),
(8, 3, 'Makarpura'),
(9, 3, 'Wagodia'),
(10, 3, 'Harni road'),
(11, 3, 'Kareli Baug'),
(12, 3, 'Chhani'),
(13, 3, 'Gorwa'),
(14, 3, 'Manjalpur'),
(15, 3, 'Tarsali'),
(16, 3, 'Laxmipura'),
(17, 3, 'Gokul nagar'),
(18, 1, 'Anand-Sojitra road'),
(19, 1, 'Adenwala building,anand'),
(20, 1, 'Anand-maghrol road,anand'),
(21, 1, 'G.P.O road,anand'),
(22, 1, 'Ganesh chokdi,anand'),
(23, 1, 'ismaile nagar,anand'),
(24, 1, 'Khwaja nagar,anand'),
(25, 1, 'Laksh prime,anand'),
(26, 1, 'Mahadev char rasta,anand'),
(27, 1, 'Mangalpura,anand'),
(28, 1, 'Mathiya chora,anand'),
(29, 1, 'Mayfair road,anand'),
(30, 1, 'NH-8 chikhodra crossing,anand'),
(31, 1, 'NH-8,anand'),
(32, 1, 'Old Bus Stand,anand'),
(33, 1, 'Borsad chokdi,anand'),
(34, 1, 'popati nagar,anand'),
(35, 1, 'palavasna,anand'),
(36, 1, 'palavasna circle,anand'),
(37, 1, 'Railway Station,anand'),
(38, 1, 'Railway station road,anand'),
(39, 1, 'Sardar gunj,anand'),
(40, 1, 'Samarkha chokdi,anand'),
(41, 1, 'Shashtri street,anand'),
(42, 1, 'Super market,anand'),
(43, 1, 'Tanki gali,anand'),
(44, 1, 'Townhall,anand'),
(45, 1, 'Vandemataram k-dip cpmplex,anand'),
(46, 1, 'Vithal Udhyodnagar,anand'),
(47, 2, 'Akhdol,nadiad'),
(48, 2, 'Alindra,nadiad'),
(49, 2, 'Aljada,nadiad'),
(50, 2, 'Andhaj,nadiad'),
(51, 2, 'Arajanpur kot,nadiad'),
(52, 2, 'Arera,nadiad'),
(53, 2, 'Bamroli,nadiad'),
(54, 2, 'Bhumel,nadiad'),
(55, 2, 'Bilodra,nadiad'),
(56, 2, 'chalali,nadiad'),
(57, 2, 'Dabhan,nadiad'),
(58, 2, 'Dantali,nadiad'),
(59, 2, 'Davda,nadiad'),
(60, 2, 'Davapura,nadiad'),
(61, 2, 'Degam,nadiad'),
(62, 2, 'Dumral,nadiad'),
(63, 2, 'Erandiyapura,nadiad'),
(64, 2, 'Fatepur,nadiad'),
(65, 2, 'Gangapur,nadiad'),
(66, 2, 'Gutal,nadiad'),
(67, 2, 'Hathaj,nadiad'),
(68, 2, 'Hathnoli,nadiad'),
(69, 2, 'Javol,nadiad'),
(70, 2, 'Kaloli,nadiad'),
(71, 2, 'Kamla,nadiad'),
(72, 2, 'Kanjoda,nadiad'),
(73, 2, 'Keriavi,nadiad'),
(74, 2, 'Maholel,nadiad'),
(75, 2, 'Manjipura,nadiad'),
(76, 2, 'Marida,nadiad'),
(77, 2, 'Mitral,nadiad'),
(78, 2, 'Monghroli,nadiad'),
(79, 2, 'Nanavaga,nadiad'),
(80, 2, 'Narsanda,nadiad'),
(81, 2, 'Navagam,nadiad'),
(82, 2, 'Palaiya,nadiad'),
(83, 2, 'Palana,nadiad'),
(84, 2, 'Paldi,nadiad'),
(85, 2, 'Pij,nadiad'),
(86, 2, 'Piplag,nadiad'),
(87, 2, 'Piplata,nadiad'),
(88, 2, 'Rajnagar,nadiad'),
(89, 2, 'Rampura,nadiad'),
(90, 2, 'Salun talpad,nadiad'),
(91, 2, 'Salun vanto,nadiad'),
(92, 2, 'Silod,nadiad'),
(93, 2, 'Sodpur,nadiad'),
(94, 2, 'Surasamal,nadiad'),
(95, 2, 'Thaledi,nadiad'),
(96, 2, 'Tundel,nadiad'),
(97, 2, 'Uttarsanda,nadiad'),
(98, 2, 'Vadtal,nadiad'),
(99, 2, 'Valetva,nadiad'),
(100, 2, 'Valla,nadiad'),
(101, 2, 'Vaso,nadiad'),
(102, 2, 'Vina,nadiad'),
(103, 2, 'Yoginagar,nadiad'),
(104, 2, 'Zarol,nadiad'),
(105, 1, 'Motikaka Ni Chali');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donors`
--

CREATE TABLE `blood_donors` (
  `b_id` int(10) NOT NULL,
  `donor_id` int(10) NOT NULL,
  `pic` text NOT NULL,
  `admin_accept` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_donors`
--

INSERT INTO `blood_donors` (`b_id`, `donor_id`, `pic`, `admin_accept`, `date`) VALUES
(1, 3, 'images/Confirmation/1553528419_IMG_20150917_125030.jpg', 1, '2018-03-20'),
(3, 5, 'images/Confirmation/1553528419_IMG_20150917_125030.jpg', 1, '2018-09-23'),
(4, 5, 'images/Confirmation/1553762612_Screenshot (81).png', 1, '2019-03-28'),
(5, 5, 'images/Confirmation/1553838298_ad2.jpeg', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`c_id`, `c_name`) VALUES
(1, 'Anand'),
(2, 'Nadiad'),
(3, 'Vadodara');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `msg`) VALUES
(1, 'Mohini Soni', 'mohinisoni04@gmail.com', 'I am so happy, to see this that you are working for society.'),
(2, 'Mohini Soni', 'mohinisoni04@gmail.com', 'I am so happy, to see this that you are working for society.'),
(3, 'Vrajesh Thakkar', 'thakkarvrajesh14@gmail.com', 'Hello...can i join your hub...?');

-- --------------------------------------------------------

--
-- Table structure for table `donor_register`
--

CREATE TABLE `donor_register` (
  `donor_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `area_name` varchar(20) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `admin_accept` int(10) NOT NULL,
  `pic` text NOT NULL,
  `verified` varchar(255) NOT NULL DEFAULT 'not verified',
  `blood_reward` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_register`
--

INSERT INTO `donor_register` (`donor_id`, `firstname`, `email`, `password`, `contactno`, `address`, `city`, `area_name`, `bloodgroup`, `gender`, `birthdate`, `admin_accept`, `pic`, `verified`, `blood_reward`) VALUES
(3, 'Khantil Patel', 'kachhiakhantil1999@gmail.com', 'Kpatel@12', 8767584839, '12,B Vishnu Colony', '1', '1', 'A-', 'Male', '2019-03-20', 1, 'images/donor/1552404421_IMG-20180211-WA0039.jpg', 'verified', 1),
(5, 'Saloni Sindhi', 'salonisindhi1999@gmail.com', 'Saloni@12', 9157037930, '11,A near manjipura area', '2', '75', 'O+', 'Female', '1999-07-31', 1, 'images/donor/1552404080_20150719-193650.jpg', 'verified', 2),
(6, 'Vrajesh Thakkar', 'thakkarvraj143@gmail.com', 'Vrajesh@123', 8767675654, 'Gosai Faliyu', '1', '28', 'A+', 'Male', '1997-03-14', 1, 'images/donor/1551883337_GBWA-20180314073750.jpg', 'verified', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_handler`
--

CREATE TABLE `event_handler` (
  `eh_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `volunteer_id` int(10) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `handler_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_handler`
--

INSERT INTO `event_handler` (`eh_id`, `event_id`, `volunteer_id`, `user`, `pass`, `handler_status`) VALUES
(3, 34, 4, 'Payal', 'Payal12', 1),
(4, 34, 7, 'ww', '23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_register`
--

CREATE TABLE `event_register` (
  `event_reg_id` int(10) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_volunteer`
--

CREATE TABLE `event_volunteer` (
  `event_vol_id` int(11) NOT NULL,
  `eh_id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'not accept'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_volunteer`
--

INSERT INTO `event_volunteer` (`event_vol_id`, `eh_id`, `volunteer_id`, `user_name`, `password`, `status`) VALUES
(8, 3, 7, NULL, NULL, 'not accept'),
(9, 3, 5, NULL, NULL, 'not accept'),
(10, 3, 2, 'SD_2', '2019-03-20', 'not accept');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL,
  `event_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `event_id`, `photo`, `description`) VALUES
(28, 34, '../images/gallery/1554745930_2011-november-0030.jpg', 'we see poor children happy'),
(29, 34, '../images/gallery/1554745930_525446666.jpg', 'we see poor children happy');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `donate_id` int(10) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `donate_type` varchar(20) NOT NULL,
  `sub_categories` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` varchar(20) NOT NULL,
  `area` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `volunteer_accept` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`donate_id`, `donor_id`, `donate_type`, `sub_categories`, `date`, `quantity`, `area`, `city`, `volunteer_accept`) VALUES
(3, 5, 'Cloth', 'Women', '2019-03-22 08:25:24', '12', '75', '2', 0),
(4, 5, 'Cloth', 'Child', '2019-04-09 04:49:06', '10', '1', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sub_type` varchar(255) NOT NULL,
  `quantity` varchar(10) NOT NULL DEFAULT '-',
  `vol_accept` int(10) NOT NULL,
  `donor_accept` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `name`, `email`, `gender`, `contact`, `city`, `area`, `address`, `type`, `sub_type`, `quantity`, `vol_accept`, `donor_accept`) VALUES
(9, 'Ruchi Patel', 'pruchi07@gmail.com', 'Female', 7041970709, '1', '1', 'Patel colony Anand', 'Blood', 'A+', '', 1, 0),
(10, 'Mohini Soni', 'ashu@gmail.com', 'Female', 9876543245, '1', '18', 'vfghf', 'Food', 'Dry', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`) VALUES
(1, 'Food'),
(5, 'Tree'),
(6, 'Cloth'),
(7, 'Blood');

-- --------------------------------------------------------

--
-- Table structure for table `sub_services`
--

CREATE TABLE `sub_services` (
  `sub_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_services`
--

INSERT INTO `sub_services` (`sub_id`, `id`, `sub_cat_name`) VALUES
(1, 1, 'Dry'),
(2, 1, 'Liquid'),
(3, 6, 'Women'),
(4, 6, 'Men'),
(5, 6, 'Child'),
(6, 7, 'A+'),
(7, 7, 'A-'),
(8, 7, 'B+'),
(9, 7, 'B-'),
(10, 7, 'O+'),
(11, 7, 'O-'),
(12, 7, 'AB+'),
(13, 7, 'AB-'),
(14, 5, 'Tulsi');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_event`
--

CREATE TABLE `upcoming_event` (
  `event_id` int(10) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `color` varchar(255) NOT NULL,
  `border_color` varchar(255) NOT NULL,
  `event_place` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upcoming_event`
--

INSERT INTO `upcoming_event` (`event_id`, `event_name`, `event_date`, `end_date`, `color`, `border_color`, `event_place`, `description`, `pic`) VALUES
(34, 'Sweet Distribution', '2019-04-13 20:00:00', '2019-04-13 21:00:00', '#ff00ff', '#ff00ff', 'Nadiad', 'We see the happiness of small children.', 'image/event/1554745643_10410943_1536413906576327_7533414068352711562_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_register`
--

CREATE TABLE `volunteer_register` (
  `volunteer_id` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `admin_accept` int(10) NOT NULL,
  `pic` text NOT NULL,
  `verified` varchar(255) NOT NULL DEFAULT 'not verified',
  `is_handler` int(11) NOT NULL DEFAULT 0,
  `is_event_volunteer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer_register`
--

INSERT INTO `volunteer_register` (`volunteer_id`, `firstname`, `email`, `password`, `contactno`, `address`, `city`, `area_name`, `bloodgroup`, `gender`, `birthdate`, `admin_accept`, `pic`, `verified`, `is_handler`, `is_event_volunteer`) VALUES
(1, 'Mohini Soni', 'mohinisoni04@gmail.com', 'Mohu@123', 8767584839, '165 B Raja Ram Nagar Dewas', '1', '1', 'a-', 'male', '2019-03-20', 1, 'images/volunteer/1552974837_10410943_1536413906576327_7533414068352711562_n.jpg', 'verified', 0, 0),
(2, 'Vrajesh Thakkar', 'thakkarvrajesh14@gmail.com', 'Vrajesh@123', 7685645345, 'Gosai Falyu nanu area', '1', '1', 'A+', 'Male', '2019-03-20', 1, 'images/volunteer/1553007305_10410943_1536413906576327_7533414068352711562_n.jpg', 'verified', 0, 1),
(4, 'Payal Patel', 'payupatel812@gmail.com', 'Payal@12', 8767584839, 'Bakrol Colony', '1', '1', 'b+', 'female', '1996-12-08', 1, 'images/volunteer/testimonial-1.jpg', 'verified', 1, 0),
(5, 'Viren Sheth', '59viren@gmail.com', 'Viren@123', 6758465743, '12,Adarsh Nagar', '3', '16', 'A-', 'Male', '2019-03-29', 0, 'images/volunteer/testimonial-2.jpg', ' verified', 0, 1),
(7, 'Bipin Thakkar', 'thakkarbipin18@gmail.com', 'Bipin@123', 6758465743, 'Gosai Faliyu', '1', '28', 'A+', 'Male', '1966-06-18', 1, 'images/volunteer/1553518716_Screenshot (80).png', 'verified', 1, 1),
(8, 'Rahul Sen', 'kachhiakhantil1999@gmail.com', 'Rahul@123', 8767584839, '165,B Raja Ram Nagar', '1', '1', 'o+', 'male', '1996-04-12', 0, 'images/volunteer/1554783926_testimonial-2.jpg', 'not verified', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `fk_area_id` (`c_id`);

--
-- Indexes for table `blood_donors`
--
ALTER TABLE `blood_donors`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `fk_donor` (`donor_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_register`
--
ALTER TABLE `donor_register`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `event_handler`
--
ALTER TABLE `event_handler`
  ADD PRIMARY KEY (`eh_id`),
  ADD KEY `volunteer_id` (`volunteer_id`),
  ADD KEY `fk_event_id` (`event_id`);

--
-- Indexes for table `event_register`
--
ALTER TABLE `event_register`
  ADD PRIMARY KEY (`event_reg_id`),
  ADD KEY `fk_name` (`donor_id`),
  ADD KEY `fk2_name` (`event_id`);

--
-- Indexes for table `event_volunteer`
--
ALTER TABLE `event_volunteer`
  ADD PRIMARY KEY (`event_vol_id`),
  ADD KEY `fk_eh_id` (`eh_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event` (`event_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`donate_id`),
  ADD KEY `fk_grade_id` (`donor_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `fk_id` (`id`);

--
-- Indexes for table `upcoming_event`
--
ALTER TABLE `upcoming_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `volunteer_register`
--
ALTER TABLE `volunteer_register`
  ADD PRIMARY KEY (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `blood_donors`
--
ALTER TABLE `blood_donors`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donor_register`
--
ALTER TABLE `donor_register`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_handler`
--
ALTER TABLE `event_handler`
  MODIFY `eh_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_register`
--
ALTER TABLE `event_register`
  MODIFY `event_reg_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_volunteer`
--
ALTER TABLE `event_volunteer`
  MODIFY `event_vol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `donate_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_services`
--
ALTER TABLE `sub_services`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `upcoming_event`
--
ALTER TABLE `upcoming_event`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `volunteer_register`
--
ALTER TABLE `volunteer_register`
  MODIFY `volunteer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `city` (`c_id`);

--
-- Constraints for table `blood_donors`
--
ALTER TABLE `blood_donors`
  ADD CONSTRAINT `fk_donor` FOREIGN KEY (`donor_id`) REFERENCES `donor_register` (`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_handler`
--
ALTER TABLE `event_handler`
  ADD CONSTRAINT `fk_event_id` FOREIGN KEY (`event_id`) REFERENCES `upcoming_event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_register`
--
ALTER TABLE `event_register`
  ADD CONSTRAINT `fk2_name` FOREIGN KEY (`event_id`) REFERENCES `upcoming_event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_name` FOREIGN KEY (`donor_id`) REFERENCES `donor_register` (`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`event_id`) REFERENCES `upcoming_event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `fk_grade_id` FOREIGN KEY (`donor_id`) REFERENCES `donor_register` (`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
