-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2016 at 08:14 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsikho`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE `tbl_album` (
  `mdtsid` int(10) NOT NULL,
  `picurl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `bookingid` int(10) NOT NULL,
  `customerid` int(10) NOT NULL,
  `csid` int(10) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `training_to` varchar(100) NOT NULL,
  `training_from` varchar(100) NOT NULL,
  `picuppoint` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`bookingid`, `customerid`, `csid`, `booking_date`, `training_to`, `training_from`, `picuppoint`, `invoice`) VALUES
(25, 7, 1, '17-06-2016', '18-06-2016', '23-06-2016', 'Gas Circle,Adajan', ''),
(26, 7, 9, '17-06-2016', '18-06-2016', '23-06-2016', 'Gas Circle,Adajan', ''),
(27, 7, 18, '17-06-2016', '18-06-2016', '25-06-2016', 'Ring Road', 'Zahur_27.pdf'),
(28, 7, 12, '17-06-2016', '18-06-2016', '25-06-2016', 'Gas Circle,Adajan', 'Zahur_28.pdf'),
(29, 7, 19, '17-06-2016', '18-06-2016', '25-06-2016', 'Ring Road', 'Zahur_29.pdf'),
(30, 7, 15, '17-06-2016', '18-06-2016', '25-06-2016', 'Gas Circle,Adajan', 'Zahur_30.pdf'),
(31, 1, 8, '17-06-2016', '18-06-2016', '23-06-2016', 'Gas Circle,Adajan', 'Dhiral_31.pdf'),
(32, 4, 7, '17-06-2016', '18-06-2016', '23-06-2016', 'Gas Circle,Adajan', 'Parvez Khan_32.pdf'),
(33, 1, 18, '23-06-2016', '26-06-2016', '03-07-2016', 'Ring Road', 'Dhiral_33.pdf'),
(34, 1, 4, '23-06-2016', '24-06-2016', '29-06-2016', 'Gas Circle,Adajan', 'Dhiral_34.pdf'),
(35, 1, 2, '24-06-2016', '25-06-2016', '30-06-2016', 'VNSGU,VEsu', 'Dhiral_35.pdf'),
(36, 1, 6, '24-06-2016', '25-06-2016', '30-06-2016', 'Bhatar,surat', 'Dhiral_36.pdf'),
(37, 1, 16, '24-06-2016', '27-06-2016', '04-07-2016', 'Ring Road', 'Dhiral_37.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branchid` int(10) NOT NULL,
  `branchname` varchar(100) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cityid` int(10) NOT NULL,
  `status` enum('active','block') NOT NULL DEFAULT 'active',
  `mdtsid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branchid`, `branchname`, `contactno`, `emailid`, `address`, `cityid`, `status`, `mdtsid`) VALUES
(1, 'Tiranga Patia', '9924681111', 'tirangapatia@gmail.com', 'Parvat Paitya,surat', 1, 'active', 1),
(2, 'Tiranga Vesu', '9924681111', 'tirangavesu@gmail.com', 'Vesu,surat', 1, 'active', 1),
(6, 'Tiranga Motor Driving Training School', '9876543210', 'tirangaadajan@gmail.com', 'Adajan', 2, 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car`
--

CREATE TABLE `tbl_car` (
  `carid` int(10) NOT NULL,
  `carname` varchar(100) NOT NULL,
  `carnumber` varchar(100) NOT NULL,
  `carpic` varchar(100) NOT NULL,
  `rcbookpic` varchar(100) NOT NULL,
  `mdtsid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_car`
--

INSERT INTO `tbl_car` (`carid`, `carname`, `carnumber`, `carpic`, `rcbookpic`, `mdtsid`) VALUES
(1, 'Maruti Wagon R', 'GJ-05-AU-9587', 'pic/carpic/IMG_37042349347786.jpeg', 'pic/rcbookpic/AstralVoyage.jpg', 1),
(2, 'Skoda Rapid', 'GJ-05-JA-5595', 'pic/carpic/IMG_89468537474139.jpeg', 'pic/rcbookpic/FlighttoAquarius.jpg', 1),
(3, 'Maruti Wagon R LXI', 'GJ-05-AU-9587', 'pic/carpic/IMG_12557291809149.jpeg', 'pic/rcbookpic/EarthAngel.jpg', 1),
(4, 'Hyndai Santro', 'GJ-05-JA-9876', 'pic/carpic/IMG-20140714-WA0029.jpg', 'pic/rcbookpic/LadyoftheLake.jpg', 2),
(5, 'Maruti Ertiga', 'GJ-05-JB-6654', 'pic/carpic/IMG_151775033727191.jpeg', 'pic/rcbookpic/LadyoftheLake.jpg', 2),
(6, 'Maruti Dezire', 'GJ-05-JC-5555', 'pic/carpic/IMG_22075608915462.jpeg', 'pic/rcbookpic/AstralVoyage.jpg', 1),
(7, 'swift Dzire', 'GJ-05-JB-2855', 'pic/carpic/IMG_22575191781050.jpeg', 'pic/rcbookpic/DreamsofAtlantis.jpg', 1),
(8, 'Hyndai I20', 'GJ-05-JC-1234', 'pic/carpic/IMG_37543382848004.jpeg', 'pic/rcbookpic/LadyoftheLake.jpg', 1),
(9, 'Mahindra XUV 5oo', 'GJ-05-JA-3456', 'pic/carpic/IMG_22575191781050.jpeg', 'pic/rcbookpic/MerAngel.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_schedule`
--

CREATE TABLE `tbl_car_schedule` (
  `csid` int(10) NOT NULL,
  `carid` int(10) NOT NULL,
  `scheduleid` int(10) NOT NULL,
  `mdtsid` int(10) NOT NULL,
  `noofday` int(10) NOT NULL,
  `price` int(100) NOT NULL,
  `status` enum('active','block') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_car_schedule`
--

INSERT INTO `tbl_car_schedule` (`csid`, `carid`, `scheduleid`, `mdtsid`, `noofday`, `price`, `status`) VALUES
(1, 1, 23, 1, 6, 3000, 'active'),
(2, 2, 24, 1, 6, 3500, 'active'),
(3, 1, 24, 1, 0, 2500, 'active'),
(4, 2, 25, 1, 6, 5000, 'active'),
(5, 2, 27, 1, 6, 6000, 'block'),
(6, 3, 27, 1, 6, 5000, 'active'),
(7, 1, 26, 1, 6, 5000, 'active'),
(8, 1, 27, 1, 6, 4000, 'active'),
(9, 1, 25, 1, 6, 2500, 'active'),
(10, 6, 27, 1, 6, 4500, 'active'),
(11, 3, 25, 1, 6, 4500, 'active'),
(12, 1, 29, 1, 8, 3500, 'active'),
(13, 7, 24, 1, 7, 4500, 'active'),
(14, 7, 28, 1, 7, 5000, 'active'),
(15, 3, 28, 1, 8, 4500, 'active'),
(16, 4, 31, 2, 8, 3500, 'active'),
(17, 4, 30, 2, 7, 3500, 'active'),
(18, 5, 30, 2, 8, 3500, 'active'),
(19, 5, 32, 2, 8, 4500, 'active'),
(20, 2, 33, 1, 8, 4000, 'active'),
(21, 7, 29, 1, 7, 5500, 'active'),
(22, 2, 26, 1, 8, 5000, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(10) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `stateid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `cityname`, `stateid`) VALUES
(1, 'Ahemdawad', 1),
(2, 'Surat', 1),
(3, 'Vadodara', 1),
(4, 'Rajkot', 1),
(5, 'Bhavnagar', 1),
(6, 'Mahesana', 1),
(7, 'Mumbai', 2),
(8, 'Pune', 2),
(9, 'Nagpur', 2),
(10, 'Nashik', 2),
(11, 'Jaipur', 3),
(12, 'Udaipur', 3),
(13, 'Ajmer', 3),
(14, 'Jodhpur', 3),
(15, 'Pushkar', 3),
(16, 'Amritsar', 4),
(17, 'Jalandhar', 4),
(18, 'Ludhiyana', 4),
(19, 'Bhatinda', 4),
(20, 'Mohali', 4),
(21, 'Patiyala', 4),
(22, 'Lucknow', 5),
(23, 'Meerut', 5),
(24, 'Varanasi', 5),
(25, 'Allahbad', 5),
(26, 'Kanpur', 5),
(27, 'Agra', 5),
(28, 'Jhasi', 5),
(29, 'Vishakhapatnam', 6),
(30, 'Hyderabad', 6),
(31, 'Tirupati', 6),
(32, 'Vijayawada', 6),
(33, 'Thiruvananthapuram', 7),
(34, 'Kochi', 7),
(35, 'Kozhikode', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complain`
--

CREATE TABLE `tbl_complain` (
  `complainid` int(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `complain` varchar(100) NOT NULL,
  `status` enum('active','attended') NOT NULL DEFAULT 'active',
  `customerid` int(10) NOT NULL,
  `solution` varchar(100) NOT NULL,
  `complain_date` varchar(100) NOT NULL,
  `attended_date` varchar(100) NOT NULL,
  `mdtsid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_complain`
--

INSERT INTO `tbl_complain` (`complainid`, `subject`, `complain`, `status`, `customerid`, `solution`, `complain_date`, `attended_date`, `mdtsid`) VALUES
(1, 'test', 'Particular Motor Driving Training School is not providing best service.', 'attended', 3, '', '09-05-2016', '10-05-2016', 1),
(2, 'test', 'Facing Problem fetching data in wrong ', 'attended', 2, '', '09-05-2016', '10-05-2016', 1),
(3, 'test', 'get wrong data from the system', 'attended', 2, '', '09-05-2016', '10-05-2016', 1),
(4, 'test', 'someone try to hack my details', 'attended', 1, 'Nobody can access your personal details.', '09-05-2016', '24-05-2016', 1),
(5, 'test', 'Hello world', 'attended', 2, '', '09-05-2016', '10-05-2016', 1),
(6, 'test', 'world hello', 'attended', 4, '', '09-05-2016', '10-05-2016', 1),
(7, 'test', 'problems begin from the user side', 'active', 4, '', '09-05-2016', '', 1),
(8, 'test', 'there is some problem.', 'active', 5, '', '09-05-2016', '', 1),
(11, 'test', 'some one give me wrong guidance', 'active', 5, '', '09-05-2016', '', 1),
(12, 'test', 'some one is trying to access my details', 'attended', 1, '', '09-05-2016', '10-05-2016', 1),
(13, 'test', 'this is so curl to manage ', 'active', 3, '', '09-05-2016', '', 1),
(14, 'test', 'person are not active', 'attended', 4, 'we will see that.', '09-05-2016', '09-05-2016', 1),
(15, 'test', 'some time it take more time.', 'active', 5, '', '09-05-2016', '', 1),
(16, 'test', 'we need some action against them.', 'active', 2, '', '09-05-2016', '', 1),
(17, 'test', 'hello world', 'attended', 2, 'world hello', '09-05-2016', '09-05-2016', 1),
(19, 'test', 'want to increase my time', 'attended', 1, 'solution', '09-05-2016', '24-06-2016', 1),
(20, 'test', 'want to dont display timing', 'attended', 4, 'tet', '09-05-2016', '23-06-2016', 1),
(21, 'Testing', 'Testing', 'attended', 1, 'Testing', '17-06-2016', '17-06-2016', 1),
(22, 'Testing', 'testing', 'attended', 1, 'Testing Done', '23-06-2016', '23-06-2016', 1),
(23, 'test', 'test', 'active', 1, '', '24-06-2016', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cityid` int(10) NOT NULL,
  `regdate` varchar(100) NOT NULL,
  `licensepic` varchar(100) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `status` enum('active','block') NOT NULL DEFAULT 'block'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `dob`, `email`, `password`, `contactno`, `address`, `cityid`, `regdate`, `licensepic`, `profilepic`, `status`) VALUES
(1, 'Dhiral', '1996/06/30', 'dhiralkaniya789@gmail.com', 'funny143', '9033250554', 'adajan', 1, '16-05-2016', 'pic/576baceabaaa9.jpg', 'pic/575d107e8f837.jpg', 'active'),
(2, 'Mitesh Thakor', '1996/03/05', 'montuthakor6699@gmail.com', '123456', '8866256876', 'gopipura', 1, '16-05-2016', 'pic/576bae620365a.jpg', 'pic/576bae5746c1b.jpg', 'active'),
(3, 'Femina Asmani', '1995/06/14', 'feminaasmani@gmail.com', '123456', '9876543210', 'Tadwadi', 1, '17-05-2016', 'pic/576bae8297809.jpg', 'pic/576bae9063a72.jpg', 'active'),
(4, 'Parvez Khan', '1995/11/11', 'parvezprk@gmail.com', '123456', '9876543210', 'Rustampura', 1, '18-05-2016', 'pic/576baf460e2cf.jpg', 'pic/576baf670486b.jpg', 'active'),
(5, 'Shaaz Manjiyani', '1995/05/22', 'shaaz.majiyani@gmail.com', '123456', '987654321', 'Delhi Gate', 9, '19-05-2016', 'pic/576bafdff3c21.jpg', 'pic/576bafd1675f6.jpg', 'block'),
(6, 'Kinajl', '05-05-1996', 'kinjalaariwala@gmail.com', '123456', '9876543210', 'adajan', 1, '16-05-2016', 'pic/576bb03458ea8.jpg', 'pic/576bb00f08366.jpg', 'block'),
(7, 'Zahur', '10-09-1995', 'zahur@gmail.com', '123456', '', 'Ring Road,surat.', 9, '28-05-2016', 'pic/576bb34b67d94.jpg', 'pic/57496cdabb667.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `documentid` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `document` varchar(100) NOT NULL,
  `customerid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecarvideos`
--

CREATE TABLE `tbl_ecarvideos` (
  `video_id` int(11) NOT NULL,
  `video_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_description` text COLLATE utf8_unicode_ci NOT NULL,
  `video_tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','block') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'block',
  `mdtsid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_ecarvideos`
--

INSERT INTO `tbl_ecarvideos` (`video_id`, `video_title`, `video_description`, `video_tags`, `video_path`, `status`, `mdtsid`) VALUES
(1, 'Temp Upload', 'This video is upload for testing purpose only', 'Temp', 'https://www.youtube.com/embed/mS2vw-Wi03w"', 'active', 1),
(2, 'Temp Video', 'This video is uploaded for training purpose only', 'Hello', 'https://www.youtube.com/embed/sMAyL1uqGj', 'active', 1),
(3, 'Temp1', 'this video is uploaded for testing purpose only', 'sad', 'https://www.youtube.com/embed/sMAyL1uqGjw', 'block', 1),
(4, 'temp', 'temp', 'temp', 'https://www.youtube.com/embed/Od247Gwbfu0', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faqid` int(10) NOT NULL,
  `question` varchar(10000) NOT NULL,
  `answer` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faqid`, `question`, `answer`) VALUES
(3, 'How can i add new record ?', 'You can click on + sign and can add record.'),
(4, 'which type of Driving license is required ?', 'Minimum LMV(Light Motor Vehicle) license is required for customer. '),
(5, 'Why registration is process is required for customer ?', 'Registration process is required because after registration of customer carshikho can verify the valid customer and it allows and approve for Motor Driving Training.'),
(8, 'Why the verification of video is needed by admin?', 'MDTS can not post directly on the system. First it can post video on System after admin verify it and then it will be visible for users.'),
(9, 'What is customer care service number ?', 'Customer care number of Carshikho will be available shortly.'),
(10, 'Is Customer required car for carTraining?', 'No customer can book training to Motor Driving Training School and can do Car Training.'),
(11, 'How can manage car ?', 'MDTS have to login and then go to set schedule department there you can manages the car'),
(12, 'Can we use this website in andriod and ISO ?', 'Additional features of Andriod and ISO will be upload soon.'),
(13, 'Can customer will take refund from the Carshikho ?', 'Once customer make payment then he/she can not take refund from the Carshikho.'),
(14, 'Can MDTS delete a cars ?', 'MDTS can not delete particular car. Because it in past days particular car having schedule and appointment.'),
(15, 'Can Customer generated complain ?', 'If Customer does not get satisfied with the MDTS services then he/she raise or generate complain against particular MDTS.'),
(16, 'Will MDTS having rights to show details of customer ?', 'MDTS having rights to show limited details of the customer who booked training of its.'),
(17, 'What is full form MDTS ?', 'Motor Driving Training School.'),
(18, 'Is there any type pic up point ?', 'Yes according to your requirement pic up point is available. '),
(19, 'How can we contact to the admin ?', 'You can mail on info@carshikho.co.in for the admin.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedbackid` int(10) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedbackid`, `feedback`, `emailid`, `date`) VALUES
(1, 'it is very help full for new car learner', 'dhiralkaniya789@gmail.com', '05-05-2016'),
(2, 'Providing best motor driving training school in surat', 'shaazmanjiyani@gmail.com', '06-05-2016'),
(3, 'Website was too awesome. This is use to make safe India.', 'vnsutaria@gmail.com', '26-05-2016'),
(4, 'abcd', 'kk@gmail.com', '26-05-2016'),
(5, 'Hello How r u?', 'dhiralkaniya789@gmail.com', '22-06-2016'),
(6, 'Testing', 'dhiralkaniya789@gmail.com', '23-06-2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mdts`
--

CREATE TABLE `tbl_mdts` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cityid` int(10) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `regdate` varchar(100) NOT NULL,
  `licensepic` varchar(100) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `status` enum('active','block') NOT NULL DEFAULT 'block'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mdts`
--

INSERT INTO `tbl_mdts` (`id`, `name`, `address`, `cityid`, `contactno`, `email`, `password`, `regdate`, `licensepic`, `profilepic`, `status`) VALUES
(1, 'Tiranga Motor Driving School', 'Ring Road,Nr Civil Char Rasta,Surat.', 1, '9033250554', 'tiranga5555@gmail.com', '11115555', '16-05-2016', 'pic/licpic/576bb39dc0829.jpg', 'pic/profilepic/576ce5a614d74.jpg', 'active'),
(2, 'Dhiral Motor Driving Training School', 'Adajan', 1, '9033250554', 'dhiralkaniya@gmail.com', 'funny143', '16-05-2016', 'pic/licpic/576bb1316c95c.jpg', 'pic/profilepic/b1.jpg', 'active'),
(3, 'Modi Motor Driving Training School', 'salabutpura', 1, '9876543210', 'modimotor@gmail.com', '123456', '16-05-2016', 'pic/licpic/576bb3166164b.jpg', 'pic/profilepic/576bb2f39be80.jpg', 'active'),
(4, 'Shradhha Motor Driving Training School', 'adajan', 1, '1234567890', 'shradhamotor@gmail.com', '123456', '16-05-2016', 'pic/licpic/576bb3e5b3534.jpg', 'pic/profilepic/576bb3dc3a3f6.jpg', 'active'),
(5, 'Venky Driving School', 'Sidhi Sheri,salabutpura,surat', 2, '9876543210', 'vsutaria72@gmail.com', '123456', '27-05-2016', 'pic/licpic/57481d499aa86.jpg', 'pic/profilepic/57481d499aa94.jpg', 'active'),
(7, 'akhil', 'udhna', 4, '1478963250', 'akhil@gmail.com', '123456', '27-05-2016', 'pic/licpic/57481e95e0717.jpg', 'pic/profilepic/57481e95e0725.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `paymentid` int(10) NOT NULL,
  `bookingid` int(10) NOT NULL,
  `paymenttype` varchar(100) NOT NULL,
  `status` enum('successful','unsuccessful') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_picuppoint`
--

CREATE TABLE `tbl_picuppoint` (
  `picid` int(10) NOT NULL,
  `picuppoint` varchar(100) NOT NULL,
  `mdtsid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_picuppoint`
--

INSERT INTO `tbl_picuppoint` (`picid`, `picuppoint`, `mdtsid`) VALUES
(1, 'Gas Circle,Adajan', 1),
(2, 'VNSGU,VEsu', 1),
(3, 'Ring Road', 2),
(4, 'Majura Gate', 2),
(5, 'Podar Arcade,Varachha', 3),
(6, 'Sumul Dairy,Katargam', 3),
(7, 'Varacha,surat', 1),
(8, 'Bhatar,surat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schid` int(10) NOT NULL,
  `mdtstime` varchar(100) NOT NULL,
  `mdtsid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schid`, `mdtstime`, `mdtsid`) VALUES
(23, '8:00am to 9:00am', 1),
(24, '9:00am to 10:00am', 1),
(25, '05:00pm to 06:00pm', 1),
(26, '10:00am to 11:30am', 1),
(27, '09:00am to 12:00am', 1),
(28, '07:00am to 08:00am', 1),
(29, '03:30pm to 04:30pm', 1),
(30, '08:00am to 09:00am', 2),
(31, '09:00am to 10:00am', 2),
(32, '10:00am to 11:00am', 2),
(33, '01:00pm to 02:00pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(10) NOT NULL,
  `statename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `statename`) VALUES
(1, 'Gujarat'),
(2, 'Maharastra'),
(3, 'Rajsthan'),
(4, 'Punjab'),
(5, 'Uttarprades'),
(6, 'Andhra Pradesh'),
(7, 'Kerala'),
(8, 'Tamilnadu'),
(9, 'Madhyapradesh'),
(10, 'Goa'),
(11, 'Jammu Kashmir'),
(12, 'Delhi'),
(13, 'Bihar'),
(14, 'ChattisGath'),
(15, 'Chandigatrh'),
(16, 'Damman and Diu'),
(17, 'Himachal Pradesh'),
(18, 'Haryana'),
(19, 'Jharkhand'),
(20, 'Karnataka'),
(21, 'Meghalaya'),
(22, 'Manipur'),
(23, 'Mizoram'),
(24, 'Odisha'),
(25, 'Punjab'),
(26, 'Pondicherry'),
(27, 'Tamil Nadu'),
(28, 'Tripura'),
(29, 'Telangana'),
(30, 'Uttarakhand'),
(31, 'West Bangal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `questionid` int(10) NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`questionid`, `question`, `option1`, `option2`, `option3`, `option4`, `img`, `answer`) VALUES
(2, 'A circular blue sign with a red border and two red diagonal lines crossing it means what?', 'No Stopping', 'No U-turn', 'No U-turn', 'Give Way', 'icon/5768e93b5807b.jpg', '2'),
(3, 'Test', 'Test1', 'Test3', 'Test3', 'Tes4', '', '3'),
(4, 'The following sign represents', 'Stop', 'Hospital Ahead', 'Hospital Ahead', 'Question Ahead', '', '1'),
(5, 'You are approaching a narrow bridge,another vehicle is about enter the bridge  from  opposite side ,', 'Increase the speed and try to cross bridge as fast as possible.', 'Wait till the other vehicle crosses the bridge and  then process', 'Wait till the other vehicle crosses the bridge and  then process', 'Do Whatever You want', '', '3'),
(6, 'When a vehicle is involved in an accident causing injury to any person', 'Take the vehicle to the nearest police station and report the acciden', 'Take all reasonable steps to secure medical attention to the injured and report to the nearest polic', 'Take all reasonable steps to secure medical attention to the injured and report to the nearest polic', 'Stop the vehicle and report to the police station', '', '3'),
(7, ' Fog lamps are used', 'During Night', 'When the opposite vehicle is not using dim light', 'When the opposite vehicle is not using dim light', 'Do Nothing', '', '2'),
(8, 'Driver of a\r\nvehicle may\r\novertake\r\n', 'while driving\r\ndown hill\r\n', 'When the\r\ndriver of the\r\nvehicle ahead\r\nshows the\r\nsignal to\r\novertake', 'When the\r\ndriver of the\r\nvehicle ahead\r\nshows the\r\nsignal to\r\novertake', 'No', '', '3'),
(9, 'When the\r\nyellow light at\r\nan intersection\r\nappear on the\r\nsignal light, the\r\ndriver of a\r\napproachi', 'Ensure safety\r\nand drive away', 'Sound horn\r\nand proceed', 'Sound horn\r\nand proceed', 'Nothing', '', '2'),
(10, 'More than two\r\npersons on a two\r\nwheeler is', 'Allowed in\r\nunavoidable\r\ncircumstances', 'Allowed when\r\nthe traffic is\r\nless\r\n', 'Allowed when\r\nthe traffic is\r\nless\r\n', 'Do Nothing', 'icon/576bb66703660.jpg', '2'),
(11, 'You want to\r\novertake a\r\nvehicle near a\r\nhospital. You.', 'will blow the\r\nhorn\r\ncontinuously\r\n', 'blow the horn\r\nonly\r\nintermittently', 'blow the horn\r\nonly\r\nintermittently', 'will not blow\r\nhorn\r\n', '', '4'),
(12, ' On a road\r\ndesignated as\r\none way', 'Parking is\r\nprohibited\r\n', 'Should not\r\ndrive in\r\nreverse gear', 'Should not\r\ndrive in\r\nreverse gear', 'No Option', 'icon/5768e697bb0d3.jpg', '3'),
(13, 'Testing', 'Option 1', 'Option 3', 'Option 3', 'Option 4', 'icon/576902b500551.jpg', '1'),
(14, 'Testing 2', 'Option 1', 'Option 3', 'Option 3', 'Option 4', '', '2'),
(15, 'Testing 3', 'Option 1', 'Option 3', 'Option 3', 'Option 4', '', '3'),
(16, 'Testing 4', 'Option 1', 'Option 3', 'Option 3', 'Option 4', '', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD KEY `mdtsid` (`mdtsid`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `csid` (`csid`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branchid`),
  ADD KEY `branchid` (`branchid`),
  ADD KEY `cityid` (`cityid`,`mdtsid`),
  ADD KEY `mdtsid` (`mdtsid`);

--
-- Indexes for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD PRIMARY KEY (`carid`),
  ADD KEY `mdtsid` (`mdtsid`);

--
-- Indexes for table `tbl_car_schedule`
--
ALTER TABLE `tbl_car_schedule`
  ADD PRIMARY KEY (`csid`),
  ADD KEY `carid` (`carid`,`scheduleid`),
  ADD KEY `scheduleid` (`scheduleid`),
  ADD KEY `carid_2` (`carid`),
  ADD KEY `mdtsid` (`mdtsid`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stateid` (`stateid`);

--
-- Indexes for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  ADD PRIMARY KEY (`complainid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `mdtsid` (`mdtsid`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`documentid`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `tbl_ecarvideos`
--
ALTER TABLE `tbl_ecarvideos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faqid`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `tbl_mdts`
--
ALTER TABLE `tbl_mdts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`cityid`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `scheduleid` (`bookingid`);

--
-- Indexes for table `tbl_picuppoint`
--
ALTER TABLE `tbl_picuppoint`
  ADD PRIMARY KEY (`picid`),
  ADD KEY `mdtsid` (`mdtsid`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schid`),
  ADD KEY `mdtsid` (`mdtsid`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`questionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `bookingid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branchid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_car`
--
ALTER TABLE `tbl_car`
  MODIFY `carid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_car_schedule`
--
ALTER TABLE `tbl_car_schedule`
  MODIFY `csid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  MODIFY `complainid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `documentid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ecarvideos`
--
ALTER TABLE `tbl_ecarvideos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faqid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedbackid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_mdts`
--
ALTER TABLE `tbl_mdts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `paymentid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_picuppoint`
--
ALTER TABLE `tbl_picuppoint`
  MODIFY `picid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `questionid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD CONSTRAINT `album_mdts` FOREIGN KEY (`mdtsid`) REFERENCES `tbl_mdts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `booking_customer` FOREIGN KEY (`customerid`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cs_booking` FOREIGN KEY (`csid`) REFERENCES `tbl_car_schedule` (`csid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD CONSTRAINT `branch_city` FOREIGN KEY (`cityid`) REFERENCES `tbl_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mdts_branch` FOREIGN KEY (`mdtsid`) REFERENCES `tbl_mdts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD CONSTRAINT `mdts_car` FOREIGN KEY (`mdtsid`) REFERENCES `tbl_mdts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_car_schedule`
--
ALTER TABLE `tbl_car_schedule`
  ADD CONSTRAINT `car_carsch` FOREIGN KEY (`carid`) REFERENCES `tbl_car` (`carid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mdts_carsch` FOREIGN KEY (`mdtsid`) REFERENCES `tbl_mdts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sch_carsch` FOREIGN KEY (`scheduleid`) REFERENCES `tbl_schedule` (`schid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `state_city` FOREIGN KEY (`stateid`) REFERENCES `tbl_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  ADD CONSTRAINT `complain_customer` FOREIGN KEY (`customerid`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `complain_mdts` FOREIGN KEY (`mdtsid`) REFERENCES `tbl_mdts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `city_customer` FOREIGN KEY (`cityid`) REFERENCES `tbl_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_mdts`
--
ALTER TABLE `tbl_mdts`
  ADD CONSTRAINT `mdts_city` FOREIGN KEY (`cityid`) REFERENCES `tbl_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `payement_booking` FOREIGN KEY (`bookingid`) REFERENCES `tbl_booking` (`bookingid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD CONSTRAINT `mdts_schedule` FOREIGN KEY (`mdtsid`) REFERENCES `tbl_mdts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
