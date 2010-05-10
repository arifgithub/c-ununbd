-- phpMyAdmin SQL Dump
-- version 2.10.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 09, 2010 at 03:13 AM
-- Server version: 5.0.75
-- PHP Version: 5.2.6-3ubuntu4.5

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
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `insert_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `admin`
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
  `start_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL default '0000-00-00 00:00:00',
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
  `last_update` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `users`
-- 

