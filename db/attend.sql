-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 06:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attend`
--

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE `study` (
  `ids` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `study`
--

INSERT INTO `study` (`ids`, `name`, `email`, `address`, `grade`, `picture`) VALUES
(5, 'andhikaas', 'dhikaaaaa', 'dhika', '11', '133444eab461b79e64d927baceddbe7d.jpg'),
(8, 'mutiara', 'mut@gmail.com', 'jl dkk', '12', '648dddce8fac3.jpg'),
(17, 'acheeeeeeeeeeeeeeeeeeeeel', 'achel', 'achel', '11', '648dde2358dfa.jpg'),
(18, 'ryan', 'ryan', 'rya', '11', '648dddeb94a69.jpg'),
(37, 'rid', 'rid', 'rid', '10', '648dde3a7a0e5.jpg'),
(39, 'aku capek yaampunnnnnnnnnnnnnnnn tolong akuuuuuuuu', 'aaaaaaaaaaaaaaaaaaa', 'stres', '11', '648dddff37b83.jpg'),
(69, 'satu', 'satu', 'satu', '11', '648dde2ba98ac.jpg'),
(70, 'dua', 'dau', 'dau', '11', '648bdf2823f51.jpg'),
(71, 'tiga', 'tiga', 'tiga', '11', '648bdcb1171c1.jpg'),
(72, 'empat', 'empat', 'empat', '11', '648ddd64917b8.jpg'),
(74, 'tes', 'tes', 'tes', '12', '648ddf05134e8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `usern` varchar(50) NOT NULL,
  `passw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usern`, `passw`) VALUES
(27, 'find', '$2y$10$VVFz0DLcWewTY8lzcPTxK./b0aKKcL5YaK2B3cNhCdUX96jzFk7hG'),
(28, 'hai', '$2y$10$OWs2r3cTok1WNg2QFEK/o.Xos.LqZT9lb/1nL4msnhfBJl0GG5gqu'),
(29, 'maaf', '$2y$10$czTuw/yGX7GVGRjrlRP91uOnT7t69YtrvYr0t3GwsICPlcD7xVdDG'),
(30, 'sua', '$2y$10$kVc21Yjm7TeagFqt3I3EcO1kmzNloTCr4Zz4bXBFyx.lXT5/doAiS'),
(31, 'oke', '$2y$10$eXhsjbqSlPISSq963ORgXua/q0P5nWzcHeYQXfZUA9KxWSnGbP/.S'),
(32, 'soi', '$2y$10$8AvAl.4zH2bqurIt0VTVt.K7PKbYP9yV10/nYMkcXZQvhgNfQQ0Vi'),
(33, 'c', '$2y$10$pHSWVQ2t2/fzuk6XFI1hR.btXzbgjkyuRf2fr81XBXuv8Z59hROAq'),
(34, 'dhika', '$2y$10$acD1IBFpQy9xHuOOr7yDKO6b2PXl9TkPz4XX6EqzBaIPi27EwHHUu'),
(35, 'ryan', '$2y$10$okV5PqnfVrFkk5DV1T/EGe5oabqvvHa5REGviYPF072X4Rd6nMSg6'),
(36, 'ridwan', '$2y$10$I0vqWJlfKwUZNyaz/Qbj1.I3aT3WoG9IsHzs.GblBagCaw5gw2Tze'),
(37, 'f', '$2y$10$j8YTHUuYqrylwJMKEYVuAODxhQ7/GbFgVHeXxM3k8BrRbI61l/3E2'),
(38, 'p', '$2y$10$t6S36H7YIq8y.Z556QY..uQP7cP8lWWqvVSkrk0852Vah.pqP09kq'),
(39, 'user', '$2y$10$LSRuhVlKVQxuzXRkWYZ0/u11mKFRRBdkA0wI/sbo.83uuCi7m/JhO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `study`
--
ALTER TABLE `study`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
