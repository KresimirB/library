-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 10:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knjige`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `naziv` varchar(150) COLLATE utf8_bin NOT NULL,
  `autor` varchar(200) COLLATE utf8_bin NOT NULL,
  `izdavač` varchar(150) COLLATE utf8_bin NOT NULL,
  `datum_od` date NOT NULL,
  `datum_do` date NOT NULL,
  `godina` int(11) NOT NULL,
  `izdano` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `naziv`, `autor`, `izdavač`, `datum_od`, `datum_do`, `godina`, `izdano`, `iduser`) VALUES
(1, 'Pride and Prejudice', 'Jane Austen', 'Greygardens', '2022-03-09', '2022-03-17', 1813, 1, 1),
(2, 'The Great Gatsby', 'F. Scott Fitzgerald ', 'Joe T,', '2022-03-16', '2022-03-09', 1925, 0, 1),
(3, 'One Hundred Years of Solitude', 'Gabriel García Márquez', 'Andre C', '2022-03-02', '2022-03-09', 1967, 1, 2),
(4, 'In Cold Blood ', 'Truman Capote', 'Kgjephcott,', '2022-03-01', '2022-03-10', 1965, 0, 10),
(5, 'Wide Sargasso Sea', 'Jean Rhys', 'Eric A', '2022-03-16', '2022-03-23', 1966, 0, 10),
(6, 'Brave New World', 'Aldous Huxley', 'David G', '2022-03-02', '2022-03-04', 1932, 0, 1),
(7, 'I Capture The Castle', 'Dodie Smith', 'Helen Y', '2022-03-03', '2022-03-04', 1948, 0, 10),
(8, 'Jane Eyre ', 'Charlotte Bronte', 'Sarah F', '2022-03-03', '2022-03-04', 1847, 0, 10),
(9, 'Crime and Punishment', 'Fyodor Dostoevsky', 'Angie V', '2022-03-11', '2022-03-09', 1866, 0, 10),
(10, 'The Secret History', 'Donna Tartt', 'AnamiAndBooks', '2022-03-05', '2022-03-19', 1992, 0, 10),
(11, 'The Call of the Wild', 'Jack London', 'Helen D', '2022-03-18', '2022-04-03', 1903, 0, 10),
(12, 'The Chrysalids ', 'John Wyndham', 'Hollie B', '2022-03-04', '2022-03-25', 1955, 0, 10),
(13, 'Persuasion', 'Jane Austen', 'Dartmouth_Diva', '2022-03-10', '2022-03-27', 1818, 0, 10),
(14, 'Moby-Dick', 'Herman Melville', 'David H', '2022-03-04', '2022-03-26', 1851, 0, 10),
(15, 'The Lion, the Witch and the Wardrobe', 'C.S. Lewis', 'Adisha K', '2022-03-18', '2022-04-02', 1950, 0, 10),
(16, 'To the Lighthouse ', 'Virginia Woolf', 'Halcyonbookdays', '2022-03-10', '2022-03-11', 1927, 0, 10),
(17, 'The Death of the Heart ', 'Elizabeth Bowen', 'Heather O', '2022-03-11', '2022-04-01', 1938, 0, 10),
(18, 'Tess of the dUrbervilles', 'Thomas Hardy', 'Abbie H', '2022-03-10', '2022-03-17', 1891, 0, 10),
(21, 'Frankenstein', 'Mary Shelley', 'Julie A', '2022-03-04', '2022-03-25', 1823, 0, 10),
(22, 'The Master and Margarita ', 'Mikhail Bulgakov', 'Eggfrieddog', '2022-03-04', '2022-03-18', 1966, 0, 10),
(23, 'The Go-Between ', 'L. P. Hartley', 'Rapsodiafestiva', '2022-03-04', '2022-03-31', 1953, 0, 10),
(24, 'One Flew Over the Cuckoos Nest ', 'Ken Kesey', 'Darren B,', '2022-03-03', '2022-03-12', 1962, 0, 10),
(25, 'Nineteen Eighty-Four', 'George Orwell', 'Donna J', '2022-03-19', '2022-03-30', 1949, 0, 10),
(26, 'Buddenbrooks ', 'Thomas Mann', 'Peter L', '2022-03-10', '2022-03-21', 1901, 0, 10),
(33, 'The Grapes of Wrath', 'John Steinbeck', 'Morven', '2022-03-04', '2022-03-17', 1939, 0, 10),
(34, 'Beloved ', 'Toni Morrison', 'LittleReigate,', '2022-03-11', '2022-03-25', 1987, 0, 10),
(35, 'The Code of the Woosters ', ' P. G. Wodehouse', 'Matt F', '2022-03-11', '2022-03-17', 1938, 0, 10),
(36, 'Dracula', 'Bram Stoker', 'Rob K', '2022-03-11', '2022-03-31', 1897, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(150) COLLATE utf8_bin NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `password`, `name`, `level`) VALUES
(1, 'vedra', '1', 'Vedrana admin', 0),
(2, 'korisnik', '1', 'Korisnik', 1),
(3, 'test', '1', 'Testni Registracija', 1),
(4, 'admin2', '1', 'Admin2', 0),
(5, 'akozul', '1', 'Ante Kožul', 1),
(6, 'gkrnjevic', '1', 'Goran Krnjević', 1),
(7, 'aljubic', '1', 'Antonijo Ljubić', 1),
(8, 'ddinkic', '1', 'Dario Dinkić', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
