-- phpMyAdmin SQL Dump
-- version 2.10.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 10, 2010 at 08:27 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `ununbd`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `id_admin_group` int(10) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `passwd` varchar(70) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(80) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` enum('ACTIVE','INACTIVE','PENDING') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`id`, `id_admin_group`, `username`, `passwd`, `firstname`, `lastname`, `address`, `city`, `mobile`, `email`, `create_date`, `status`) VALUES 
(1, 1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Ariful', 'Islam', 'Mirpur-12', 'Dhaka', '+8801552344105', 'arif.look@gmail.com', '2010-03-09 06:12:28', 'ACTIVE'),
(2, 2, 'alpha', 'e10adc3949ba59abbe56e057f20f883e', 'Beta', 'Alip', 'Utrra sector  6 ', 'Dhaka', '13464666546', 'alpha@gmail.com', '2010-03-09 06:25:57', 'ACTIVE');

-- --------------------------------------------------------

-- 
-- Table structure for table `admin_group`
-- 

DROP TABLE IF EXISTS `admin_group`;
CREATE TABLE `admin_group` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `admin_group`
-- 

INSERT INTO `admin_group` (`id`, `title`, `comment`) VALUES 
(1, 'super admin', 'access over every options'),
(2, 'content admin', 'access over static content'),
(3, 'banner admin', 'access over banners'),
(4, 'feedback admin', 'access overy user feedback'),
(5, 'admin', 'backend admin'),
(6, 'news admin', 'access only media and news'),
(7, 'job admin', 'access over job');

-- --------------------------------------------------------

-- 
-- Table structure for table `feedback`
-- 

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL auto_increment,
  `full_name` varchar(80) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `feedback`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `food_category`
-- 

DROP TABLE IF EXISTS `food_category`;
CREATE TABLE `food_category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `food_category`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `food_list`
-- 

DROP TABLE IF EXISTS `food_list`;
CREATE TABLE `food_list` (
  `id` int(11) NOT NULL auto_increment,
  `id_food_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `last_update` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `food_list`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `photo_album`
-- 

DROP TABLE IF EXISTS `photo_album`;
CREATE TABLE `photo_album` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(80) NOT NULL,
  `last_update` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `photo_album`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `photo_gallery`
-- 

DROP TABLE IF EXISTS `photo_gallery`;
CREATE TABLE `photo_gallery` (
  `id` int(11) NOT NULL auto_increment,
  `id_photo_album` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `photo_gallery`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `reservation`
-- 

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL auto_increment,
  `id_users` int(11) NOT NULL,
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `reservation`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `reservation_tables`
-- 

DROP TABLE IF EXISTS `reservation_tables`;
CREATE TABLE `reservation_tables` (
  `id` int(11) NOT NULL auto_increment,
  `id_reservation` int(11) NOT NULL,
  `id_time_slot` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `reservation_tables`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `static_page`
-- 

DROP TABLE IF EXISTS `static_page`;
CREATE TABLE `static_page` (
  `id` int(11) NOT NULL auto_increment,
  `section` varchar(60) NOT NULL,
  `page_content` text NOT NULL,
  `last_update` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `static_page`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `system_settings`
-- 

DROP TABLE IF EXISTS `system_settings`;
CREATE TABLE `system_settings` (
  `variable` varchar(40) NOT NULL,
  `value` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  UNIQUE KEY `variable` (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `system_settings`
-- 

INSERT INTO `system_settings` (`variable`, `value`, `last_update`) VALUES 
('total_table', '20', '2010-05-09 02:49:45');

-- --------------------------------------------------------

-- 
-- Table structure for table `time_slot`
-- 

DROP TABLE IF EXISTS `time_slot`;
CREATE TABLE `time_slot` (
  `id` int(11) NOT NULL auto_increment,
  `start_time` timestamp NULL default NULL,
  `end_time` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `time_slot`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `address` varchar(255) NOT NULL,
  `last_update` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `user_name`, `user_password`, `full_name`, `contact`, `email`, `address`, `last_update`) VALUES 
(1, 'arif', 'arif', 'S. M. ARIFUL ISLAM', '+8801552344105', 'arif.look@gmail.com', '6/13, Block#C, Mirpur-12, Dhaka-1216', '2010-05-10 00:59:38'),
(13, 'arif2', 'arif', 'S. M. ARIFUL ISLAM', '+8801552344105', 'arif.look@gmail.com', '6/13, Block#C, Mirpur-12, Dhaka-1216', '2010-05-10 01:24:23');
