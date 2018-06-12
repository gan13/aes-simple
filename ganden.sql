-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2018 at 05:22 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ganden`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(10) NOT NULL AUTO_INCREMENT,
  `users_name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_users` varchar(50) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `users_name`, `password`, `nama_users`, `prodi`, `angkatan`, `create_time`) VALUES
(1, '12', 'a1HUMd9dfxQcvs7M957fPdhhw7QGnwsRZho+76y7qRg=dv2SEyOkDVsAkuc=', 'asa', 'Teknik Informatika', '2016', '2018-05-30 03:04:03'),
(2, '12345', 'WZRHGrsBESr8wYFZ9sx0tPURuZgG2lmzyvWpwXPKz8U=+/9cQ5NCDluixkAUCXjfvUU=', 'Nama Lengkap', 'Teknik Informatika', '2010', '2018-05-30 04:13:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
