-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2013 at 08:56 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phphomeproject-12-28-2013`
--

-- --------------------------------------------------------

--
-- Table structure for table `homeproject_projects`
--

CREATE TABLE IF NOT EXISTS `homeproject_projects` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `pathname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `homeproject_projects`
--

INSERT INTO `homeproject_projects` (`id`, `name`, `about`, `pathname`) VALUES
(1, 'My Project', 'This is an example project that demonstrates\r\nhow a project is managed inside\r\nthis re-usable project management\r\napplication.', 'myproject');

-- --------------------------------------------------------

--
-- Table structure for table `homeproject_releasefiles`
--

CREATE TABLE IF NOT EXISTS `homeproject_releasefiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  `version_id` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `homeproject_releasetypes`
--

CREATE TABLE IF NOT EXISTS `homeproject_releasetypes` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `homeproject_releasetypes`
--

INSERT INTO `homeproject_releasetypes` (`id`, `type`) VALUES
(1, 'Tarball'),
(2, 'Debian Package'),
(3, 'Windows ZIP');

-- --------------------------------------------------------

--
-- Table structure for table `homeproject_releaseversions`
--

CREATE TABLE IF NOT EXISTS `homeproject_releaseversions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `version` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `homeproject_releaseversions`
--

INSERT INTO `homeproject_releaseversions` (`id`, `project_id`, `version`) VALUES
(1, 1, '0.1'),
(2, 1, '0.2');

-- --------------------------------------------------------

--
-- Table structure for table `homeproject_screenshots`
--

CREATE TABLE IF NOT EXISTS `homeproject_screenshots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
