-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2018 at 04:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buzzibarter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `adm_name`, `email_id`, `password`) VALUES
(1, 'Harshvardhan', 'harsh@admin.com', '12345'),
(2, 'Riya', 'riya@admin.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `application_name` varchar(60) NOT NULL,
  `application_topic` varchar(300) NOT NULL,
  `application_description` varchar(600) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_type` enum('Android','Windows','iOS') NOT NULL,
  `starting_bid` int(11) NOT NULL,
  `upload_date` varchar(30) NOT NULL,
  `last_date` varchar(30) NOT NULL,
  `api_key` varchar(300) NOT NULL,
  `verified` enum('Not Verified','Verified') NOT NULL,
  `publish` enum('Publish','Unpublish') NOT NULL,
  PRIMARY KEY (`application_id`),
  KEY `category_id` (`category_id`,`sub_category_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `application_name`, `application_topic`, `application_description`, `category_id`, `sub_category_id`, `user_id`, `application_type`, `starting_bid`, `upload_date`, `last_date`, `api_key`, `verified`, `publish`) VALUES
(1, 'St. Xaviers High School', 'School application', 'School Student Application', 1, 1, 7, 'Android', 1000, '2018-03-08', '2018-05-09', '', 'Not Verified', 'Publish'),
(2, 'Netflix', 'Online MOvie Streaming', 'The following application is created to give huge access to the website user. This application contains many movies and TV Shows.', 12, 10, 8, 'Android', 5000, '2018-04-10', '2018-04-25', 'https://play.google.com/store/apps/details?id=com.netflix.mediaclient', 'Verified', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE IF NOT EXISTS `bidding` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('pending','rejected','short_listed') NOT NULL,
  `created_date` varchar(30) NOT NULL,
  `modified_date` varchar(30) NOT NULL,
  PRIMARY KEY (`bid_id`),
  KEY `user_id` (`user_id`,`listing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`bid_id`, `user_id`, `listing_id`, `amount`, `status`, `created_date`, `modified_date`) VALUES
(37, 7, 4, 1501, 'short_listed', '2018-04-01', '2018-04-01'),
(38, 8, 5, 1001, 'pending', '2018-04-02', '2018-04-02'),
(39, 1, 5, 1002, 'pending', '2018-04-02', '2018-04-02'),
(40, 1, 4, 1503, 'pending', '2018-04-02', '2018-04-02'),
(41, 6, 5, 1005, 'short_listed', '2018-04-03', '2018-04-03'),
(42, 8, 5, 1010, 'short_listed', '2018-04-04', '2018-04-04'),
(50, 6, 9, 2600, 'pending', '2018-04-10', '2018-04-10'),
(51, 11, 9, 2650, 'short_listed', '2018-04-10', '2018-04-10'),
(52, 7, 9, 2700, 'pending', '2018-04-10', '2018-04-10'),
(53, 6, 9, 2750, 'short_listed', '2018-04-10', '2018-04-10'),
(54, 7, 10, 1750, 'pending', '2018-04-10', '2018-04-10'),
(55, 6, 11, 5100, 'short_listed', '2018-04-10', '2018-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  `created_date` varchar(25) NOT NULL,
  `modified_date` varchar(25) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_date`, `modified_date`) VALUES
(11, 'Education1', '2018-03-31', '2004'),
(12, 'Entertainment', '2018-03-31', '2018-03-31'),
(13, 'Social Media', '2018-03-31', '2018-03-31'),
(14, 'Informational', '2018-03-31', '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `created_date` varchar(25) NOT NULL,
  `modified_date` varchar(25) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `state_id` (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `state_id`, `city`, `created_date`, `modified_date`) VALUES
(11, 9, 8, 'Surat', '2018-03-31', '2018-03-31'),
(12, 9, 9, 'Bikaner', '2018-03-31', '2018-03-31'),
(13, 11, 11, 'Sidney', '2018-03-31', '2018-03-31'),
(14, 11, 12, 'Melbourne', '2018-03-31', '2018-03-31'),
(15, 10, 10, 'Johanesburg', '2018-03-31', '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(20) NOT NULL,
  `created_date` varchar(25) NOT NULL,
  `modified_date` varchar(25) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `created_date`, `modified_date`) VALUES
(9, 'India', '2018-03-31', '2004'),
(10, 'South Africa', '2018-03-31', '2018-03-31'),
(11, 'Australia', '2018-03-31', '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_name` varchar(200) NOT NULL,
  `domain_topic` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `domain_description` varchar(600) NOT NULL,
  `starting_bid` int(11) NOT NULL,
  `upload_date` varchar(30) NOT NULL,
  `last_date` varchar(30) NOT NULL,
  `verified` enum('Verified','Not Verified') NOT NULL,
  `publish` enum('Unpublish','Publish') NOT NULL,
  PRIMARY KEY (`domain_id`),
  KEY `category_id` (`category_id`,`sub_category_id`),
  KEY `sub_category_id` (`sub_category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`domain_id`, `domain_name`, `domain_topic`, `category_id`, `sub_category_id`, `user_id`, `domain_description`, `starting_bid`, `upload_date`, `last_date`, `verified`, `publish`) VALUES
(1, 'www.w3schools.com', 'online studies', 1, 1, 7, 'ONline classrooms', 1000, '2018-03-08', '2018-04-09', 'Verified', 'Publish'),
(2, 'www.garysheng.com', 'Personal Information', 14, 14, 8, 'This is the personal domain created for Gary Sheng. The sole purpose of this domain is to give details about Mr. Gary Sheng, an citizen of China. Now he sold this domain to me. And i am not using it to want to sell this domain.', 1701, '2018-04-10', '2018-05-01', 'Verified', 'Unpublish');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE IF NOT EXISTS `listing` (
  `listing_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `listing_type` varchar(50) NOT NULL,
  PRIMARY KEY (`listing_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`listing_id`, `pro_id`, `listing_type`) VALUES
(4, 3, 'Website'),
(5, 1, 'Domain_name'),
(6, 6, 'Website'),
(7, 2, 'Website'),
(8, 4, 'Website'),
(9, 7, 'Website'),
(10, 2, 'Domain_name'),
(11, 2, 'Application');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE IF NOT EXISTS `site_setting` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(50) NOT NULL,
  `value` varchar(300) NOT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`field_id`, `field`, `value`) VALUES
(1, 'Title', 'Buzzibarter'),
(2, 'URL', 'www.buzzibarter.com'),
(3, 'Facebook', 'www.facebook.com/buzzibarter'),
(4, 'Instagram', 'www.instagram.com/buzzibarter'),
(5, 'Contact_no', '8780772624');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(20) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_date` varchar(25) NOT NULL,
  `modified_date` varchar(25) NOT NULL,
  PRIMARY KEY (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state`, `country_id`, `created_date`, `modified_date`) VALUES
(8, 'Gujarat', 9, '2018-03-31', '2018-03-31'),
(9, 'Rajasthan', 9, '2018-03-31', '2018-03-31'),
(10, 'Baunga', 10, '2018-03-31', '2018-03-31'),
(11, 'Queensland', 11, '2018-03-31', '2018-03-31'),
(12, 'Victoria', 11, '2018-03-31', '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(20) NOT NULL,
  `created_date` varchar(25) NOT NULL,
  `modified_date` varchar(25) NOT NULL,
  PRIMARY KEY (`sub_category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `created_date`, `modified_date`) VALUES
(9, 11, 'Web Development', '2018-03-31', '2018-03-31'),
(10, 12, 'Movies', '2018-03-31', '2018-03-31'),
(11, 12, 'Music Streaming', '2018-03-31', '2018-03-31'),
(12, 13, 'Chatting', '2018-03-31', '2018-03-31'),
(13, 13, 'BlogSpot', '2018-03-31', '2018-03-31'),
(14, 14, 'Personal Information', '2018-03-31', '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `mobile_no` double NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `email_verified` enum('No','Yes') NOT NULL,
  `phone_verified` enum('No','Yes') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `address`, `city`, `state`, `country`, `mobile_no`, `email_id`, `password`, `photo`, `email_verified`, `phone_verified`) VALUES
(1, 'Moxesh', 'Vesu', 'Surat', 'Gujarat', 'India', 9876543210, 'moxmehta90@gmail.com', '12345', 'uploads/mox.jpg', 'No', 'No'),
(6, 'Prachi Parekh', 'Shrungal Residency', 'Surat', 'Gujarat', 'India', 9876543210, 'prachiparekh0406@gmail.com', '12345', 'uploads/prachi.jpg', 'No', 'No'),
(7, 'Riya Mistry', 'Rustampura', 'Surat', 'Gujarat', 'India', 8758636102, 'riyamistry41097@gmail.com', '12345', 'uploads/2016-03-26-16-52-40-033.jpg', 'No', 'No'),
(8, 'Harshvardhan Ojha', 'Manav Palace Saroli', 'Bikaner', 'Rajasthan', 'India', 7623077623, 'ojhaharsh7@gmail.com', '12345', 'uploads/harsh.jpg', 'No', 'No'),
(11, 'Harshvardhan Ojha', 'surat', 'Surat', 'Gujarat', 'India', 8780772624, 'ojhaharshvardhan44@gmail.com', '12345', 'uploads/Firefox_Screenshot_2018-04-06T17-37-34.314Z.png', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE IF NOT EXISTS `website` (
  `website_id` int(11) NOT NULL AUTO_INCREMENT,
  `website_topic` varchar(100) NOT NULL,
  `website_description` varchar(1000) NOT NULL,
  `domain_name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `starting_bid` int(11) NOT NULL,
  `upload_date` varchar(30) NOT NULL,
  `last_date` varchar(30) NOT NULL,
  `domain_including` varchar(10) NOT NULL,
  `custom_updates` varchar(10) NOT NULL,
  `custom_update_price` int(11) NOT NULL,
  `services` varchar(40) NOT NULL,
  `client_database` varchar(10) NOT NULL,
  `verified` enum('Verified','Not Verified') NOT NULL,
  `publish` enum('Unpublish','Publish') NOT NULL,
  `demo_url` varchar(5) NOT NULL,
  PRIMARY KEY (`website_id`),
  KEY `category_id` (`category_id`,`sub_category_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`website_id`, `website_topic`, `website_description`, `domain_name`, `category_id`, `sub_category_id`, `user_id`, `starting_bid`, `upload_date`, `last_date`, `domain_including`, `custom_updates`, `custom_update_price`, `services`, `client_database`, `verified`, `publish`, `demo_url`) VALUES
(1, 'Buzzibarter', 'selling', 'www.buzzibarter.com', 0, 5, 7, 500, '08/03/2018', '2018-03-11', 'Yes', 'Yes', 300, 'Never', 'No', 'Not Verified', 'Unpublish', 'No'),
(2, 'Facebook', 'chatting and sharing thoughts', 'www.facebook.com', 2, 3, 7, 1000, '08/03/2018', '2018-04-10', 'No', 'Yes', 500, 'Never', 'Yes', 'Verified', 'Publish', 'Yes'),
(3, 'Netflix', 'Online Movies & TV Shows', 'www.netflix.com', 2, 3, 8, 1500, '2018-03-21', '2018-03-31', 'No', 'No', 0, 'Never', 'No', 'Verified', 'Publish', 'Yes'),
(4, 'W3Schools', 'sdfssf sdfsfsgfgtgtb zdvfg ddddddddddddddddd fdddddddddddhggggggggsssssssssggbbbbbbb', 'www.w3schools.com', 1, 1, 8, 6000, '2018-03-21', '2018-04-12', 'Yes', 'No', 0, '3', 'Yes', 'Verified', 'Publish', 'Yes'),
(5, 'G.D. Goenka International School', 'This is the advanced coded website of G.D. Goenka International School. This website is very fast and can be useful for any other school.', 'www.gdgoenkasurat.com', 1, 1, 1, 11000, '2018-03-26', '2018-04-19', 'Yes', 'Yes', 500, '12', 'Yes', 'Verified', 'Unpublish', 'Yes'),
(6, 'Alchemy School', 'Official Website of Alchemy School. This website contains useful for any other useful. As we have got the new design so we are now selling old one.', 'www.alchemyschool.org', 1, 1, 6, 5000, '2018-03-27', '2018-04-18', 'No', 'No', 0, '3', 'No', 'Verified', 'Unpublish', 'Yes'),
(7, 'Instagram', 'Following website is about sharing memories among the world. In this website people can share their opinions with the medium of sharing the pictures and videos of the following event or memories.', 'www.instagram.com', 13, 13, 8, 2500, '2018-04-10', '2018-04-30', 'Yes', 'No', 0, 'Never', 'Yes', 'Verified', 'Unpublish', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE IF NOT EXISTS `winner` (
  `winner_id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `win_date` varchar(25) NOT NULL,
  PRIMARY KEY (`winner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`winner_id`, `listing_id`, `bid_id`, `user_id`, `win_date`) VALUES
(10, 5, 42, 8, '2018-04-04'),
(11, 4, 37, 7, '2018-04-04'),
(12, 9, 51, 11, '2018-04-10'),
(13, 11, 55, 6, '2018-04-10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `city_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
