-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2009 at 09:33 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `dwardle_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `dwl_group`
--

CREATE TABLE IF NOT EXISTS `dwl_group` (
  `id` int(11) NOT NULL auto_increment,
  `group_name` varchar(25) default NULL,
  `group_description` varchar(180) default NULL,
  `group_status` enum('active','inactive') default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dwl_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `dwl_groups`
--

CREATE TABLE IF NOT EXISTS `dwl_groups` (
  `group_id` int(11) default NULL,
  `user_id` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dwl_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `dwl_nav`
--

CREATE TABLE IF NOT EXISTS `dwl_nav` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(15) default NULL,
  `slug` varchar(50) default NULL,
  `link` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dwl_nav`
--

INSERT INTO `dwl_nav` (`id`, `name`, `slug`, `link`) VALUES
(1, 'Home', 'user/index', 'index'),
(2, 'Login', 'user/login', 'login'),
(3, 'Register', 'user/register', 'register'),
(4, 'Forgot Password', 'user/forgotpw', 'forgotpw');

-- --------------------------------------------------------

--
-- Table structure for table `dwl_sessions`
--

CREATE TABLE IF NOT EXISTS `dwl_sessions` (
  `session_id` varchar(40) NOT NULL default '',
  `ip_address` varchar(16) default NULL,
  `user_agent` varchar(50) default NULL,
  `last_activity` int(10) unsigned default NULL,
  `user_data` text,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dwl_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `dwl_settings`
--

CREATE TABLE IF NOT EXISTS `dwl_settings` (
  `id` int(11) NOT NULL auto_increment,
  `site_title` varchar(10) default NULL,
  `site_description` varchar(200) default NULL,
  `created_on` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dwl_settings`
--

INSERT INTO `dwl_settings` (`id`, `site_title`, `site_description`, `created_on`) VALUES
(1, 'Dwardle', 'Your life, your world.', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dwl_stalkers`
--

CREATE TABLE IF NOT EXISTS `dwl_stalkers` (
  `user_id` int(11) default NULL,
  `stalker_id` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dwl_stalkers`
--


-- --------------------------------------------------------

--
-- Table structure for table `dwl_users`
--

CREATE TABLE IF NOT EXISTS `dwl_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(25) default NULL,
  `email` varchar(155) default NULL,
  `password` varchar(43) default NULL,
  `salt` varchar(45) default NULL,
  `first_name` varchar(40) default NULL,
  `last_name` varchar(80) default NULL,
  `registered` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dwl_users`
--
