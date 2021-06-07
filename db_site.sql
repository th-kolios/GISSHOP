-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 01 Ιουλ 2017 στις 16:39:39
-- Έκδοση διακομιστή: 5.7.9
-- Έκδοση PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `db_site`
--
CREATE DATABASE IF NOT EXISTS `db_site` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_site`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `connections`
--

DROP TABLE IF EXISTS `connections`;
CREATE TABLE IF NOT EXISTS `connections` (
  `id_stn1` int(11) NOT NULL,
  `id_stn2` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id_stn1`,`id_stn2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `connections`
--

INSERT INTO `connections` (`id_stn1`, `id_stn2`, `cost`, `time`) VALUES
(32, 33, 1, 0),
(21, 32, 8, 1),
(20, 21, 3, 1),
(30, 31, 1, 0),
(20, 30, 4, 2),
(21, 27, 1, 0),
(20, 35, 1, 0),
(18, 26, 1, 0),
(18, 20, 2, 1),
(18, 21, 2, 1),
(21, 30, 10, 1),
(18, 22, 3, 1),
(22, 29, 1, 0),
(22, 24, 1, 1),
(23, 24, 1, 1),
(24, 28, 1, 0),
(21, 24, 5, 1),
(24, 25, 3, 1),
(21, 25, 10, 1),
(25, 30, 15, 1),
(25, 34, 1, 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `packets`
--

DROP TABLE IF EXISTS `packets`;
CREATE TABLE IF NOT EXISTS `packets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(400) NOT NULL,
  `reciever` varchar(400) NOT NULL,
  `address` varchar(400) NOT NULL,
  `city` varchar(100) NOT NULL,
  `id_stn_send` int(11) NOT NULL,
  `id_stn_recieve` int(11) NOT NULL,
  `type_route` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `packets`
--

INSERT INTO `packets` (`id`, `sender`, `reciever`, `address`, `city`, `id_stn_send`, `id_stn_recieve`, `type_route`) VALUES
(38, 'werwer', 'werwer', 'werwer', 'werwer', 27, 29, 'Minimum Cost'),
(37, 'werewr', 'werewr', 'werwerw', 'werewr', 27, 29, 'Minimum Cost'),
(36, 'werewr', 'werewr', 'werewr', 'werew', 27, 29, 'Minimum Cost'),
(35, 'werwerw', 'werwerewr', 'werwerwer', 'werwerw', 27, 31, 'Minimum Cost');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `roots`
--

DROP TABLE IF EXISTS `roots`;
CREATE TABLE IF NOT EXISTS `roots` (
  `id_route` int(11) NOT NULL AUTO_INCREMENT,
  `id_packet` int(11) NOT NULL,
  `id_stn` int(11) NOT NULL,
  `date_arrived` datetime NOT NULL,
  `status` varchar(400) NOT NULL,
  PRIMARY KEY (`id_route`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `roots`
--

INSERT INTO `roots` (`id_route`, `id_packet`, `id_stn`, `date_arrived`, `status`) VALUES
(77, 38, 29, '2017-07-01 18:52:05', ''),
(76, 38, 22, '2017-07-01 18:52:05', ''),
(75, 38, 18, '2017-07-01 19:08:29', 'Arrived'),
(74, 38, 21, '2017-07-01 18:52:05', ''),
(73, 38, 27, '2017-07-01 18:52:05', 'Accepted'),
(72, 37, 29, '2017-07-01 18:51:33', ''),
(71, 37, 22, '2017-07-01 18:51:33', ''),
(70, 37, 18, '2017-07-01 18:51:33', ''),
(69, 37, 21, '2017-07-01 18:51:33', ''),
(68, 37, 27, '2017-07-01 18:51:33', 'Accepted'),
(67, 36, 29, '2017-07-01 18:51:20', ''),
(66, 36, 22, '2017-07-01 18:51:20', ''),
(65, 36, 18, '2017-07-01 18:51:20', ''),
(64, 36, 21, '2017-07-01 18:51:20', ''),
(63, 36, 27, '2017-07-01 18:51:20', 'Accepted'),
(62, 35, 31, '2017-07-01 18:50:30', ''),
(61, 35, 30, '2017-07-01 18:50:30', ''),
(60, 35, 20, '2017-07-01 18:50:30', ''),
(59, 35, 21, '2017-07-01 18:50:30', ''),
(58, 35, 27, '2017-07-01 18:50:30', 'Accepted'),
(57, 31, 27, '2017-07-01 11:58:54', 'Delivered');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `stations`
--

DROP TABLE IF EXISTS `stations`;
CREATE TABLE IF NOT EXISTS `stations` (
  `id_station` int(11) NOT NULL AUTO_INCREMENT,
  `station_name` varchar(200) NOT NULL,
  `latitude` double(20,10) NOT NULL,
  `longititude` double(20,10) NOT NULL,
  `city` varchar(200) NOT NULL,
  `station_type` varchar(200) NOT NULL,
  PRIMARY KEY (`id_station`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `stations`
--

INSERT INTO `stations` (`id_station`, `station_name`, `latitude`, `longititude`, `city`, `station_type`) VALUES
(28, 'Θεσσαλονίκη-Κατάστημα', 40.6347988440, 22.9353332520, 'Θεσσαλονίκη', 'Station'),
(24, 'Θεσσαλονίκη-Hub', 40.6092611039, 22.9882049561, 'Θεσσαλονίκη', 'Hub'),
(25, 'Αλεξανδρούπολη-Hub', 40.8468006463, 25.8750343323, 'Αλεξανδρούπολη', 'Hub'),
(26, 'Πάτρα-Κατάστημα', 38.2387194398, 21.7309570312, 'Πάτρα', 'Station'),
(27, 'Αθήνα-Κατάστημα', 37.9820924092, 23.7442016602, 'Αθήνα', 'Station'),
(18, 'Πάτρα-Hub', 38.2282019777, 21.7429733276, 'Πάτρα', 'Hub'),
(20, 'Καλαμάτα-Hub', 37.0420244164, 22.1209716797, 'Καλαμάτα', 'Hub'),
(21, 'Αθήνα-Hub', 37.9636887533, 23.7318420410, 'Αθήνα', 'Hub'),
(22, 'Ιωάννινα-Hub', 39.6617422253, 20.8451843262, 'Ιωάννινα', 'Hub'),
(23, 'Λάρισσα-Hub', 39.5940486282, 22.4491882324, 'Λάρισσα', 'Hub'),
(29, 'Ιωάννινα-Κατάστημα', 39.6704635336, 20.8578872681, 'Ιωάννινα', 'Station'),
(30, 'Ηράκλειο-Hub', 35.3268904759, 25.1442718506, 'Ηράκλειο', 'Hub'),
(31, 'Ηράκλειο-Κατάστημα', 35.3274506849, 25.0914001465, 'Ηράκλειο', 'Station'),
(32, 'Μυτιλήνη-Hub', 39.0922325426, 26.5587615967, 'Μυτιλήνη', 'Hub'),
(33, 'Μυτιλήνη-Κατάστημα', 39.1036895526, 26.5508651733, 'Μυτιλήνη', 'Station'),
(34, 'Αλεξανδρούπολη-Κατάστημα', 40.8556302081, 25.8185577393, 'Αλεξανδρούπολη', 'Station'),
(35, 'Καλαμάτα-Κατάστημα', 37.0250321516, 22.1223449707, 'Καλαμάτα', 'Station');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type_user` varchar(200) NOT NULL,
  `id_station` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type_user`, `id_station`) VALUES
(9, 'admin', '1234', 'admin', 0),
(11, 'user2', 'user2', 'user', 27),
(12, 'user3', 'user3', 'user', 26),
(13, 'user4', 'user4', 'user', 18),
(14, 'user5', 'user5', 'user', 21);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
