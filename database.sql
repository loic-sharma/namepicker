CREATE DATABASE `namepicker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `namepicker`;

-- --------------------------------------------------------

-- 
-- Table structure for table `classes`
-- 

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `students` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;