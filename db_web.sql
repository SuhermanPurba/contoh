-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 03:24 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `matkul` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jur` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `semester`, `matkul`, `nama`, `nip`, `username`, `password`, `jur`, `email`, `notel`) VALUES
(2, '1', 'Struktur Data', 'ridho', '1234567', 'ridho', 'ridho123', 'teknik informatika', 'ridho@gmail.com', '0812345677'),
(3, '2', 'Basis Data', 'inka', '123142', 'inka', 'inka123', 'ternak lele', 'asdaief@yahsdfn.com', '1247035985'),
(4, '3', 'Sistem Digital', 'Fuad', '1238977', 'fuad', 'fuad123', 'Teknik informatika', 'fuad@ymail.com', '09124702347');

--
-- Triggers `dosen`
--
DELIMITER $$
CREATE TRIGGER `delete_user` AFTER DELETE ON `dosen` FOR EACH ROW DELETE FROM user WHERE nama = OLD.nama
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_user` AFTER INSERT ON `dosen` FOR EACH ROW insert into user values (null, NEW.nama, NEW.username, NEW.password, 'dosen')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_kuisioner`
--

CREATE TABLE `hasil_kuisioner` (
  `id_soal` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_dosen` int(25) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_kuisioner`
--

INSERT INTO `hasil_kuisioner` (`id_soal`, `username`, `id_dosen`, `nilai`) VALUES
(6, 'adya', 3, 1),
(7, 'adya', 3, 2),
(8, 'adya', 3, 3),
(6, 'nurul', 2, 5),
(7, 'nurul', 2, 5),
(8, 'nurul', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_soal` int(11) NOT NULL,
  `pertanyaan` varchar(500) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`id_soal`, `pertanyaan`, `jenis`) VALUES
(6, 'apa kabar?', 'mengajar'),
(7, 'apakah dosen bla bla bal?', 'tingkah_laku'),
(8, 'anbdhhfhj', 'menguasai');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `semester` varchar(2) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jur` varchar(255) NOT NULL,
  `jenjang` varchar(100) NOT NULL,
  `angkatan` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `semester`, `nama`, `nim`, `username`, `password`, `jur`, `jenjang`, `angkatan`) VALUES
(1, '2', 'adya', '11180910000016', 'adya', 'adya123', 'teknik informatika', 's1', '2018'),
(2, '1', 'nurul', '128545841', 'nurul', 'nurul123', 'TI', 'S1', '2064'),
(3, '3', 'jaja', '4578897', 'jaja', 'jaja123', 'gku', 's4', '2896'),
(4, '3', 'fazza', '21874019239', 'fazza', 'fazza123', 'Teknik Informatika', 's5', '2019');

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `delete_user1` AFTER DELETE ON `mahasiswa` FOR EACH ROW DELETE FROM user WHERE nama = OLD.nama
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_user1` AFTER INSERT ON `mahasiswa` FOR EACH ROW insert into user values (null, NEW.nama, NEW.username, NEW.password, 'mahasiswa')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'inka', 'admin', 'admin123', 'admin'),
(2, 'ridho', 'ridho', 'ridho123', 'dosen'),
(3, 'adya', 'adya', 'adya123', 'mahasiswa'),
(4, 'inka', 'inka', 'inka123', 'dosen'),
(5, 'Fuad', 'fuad', 'fuad123', 'dosen'),
(6, 'nurul', 'nurul', 'nurul123', 'mahasiswa'),
(7, 'jaja', 'jaja', 'jaja123', 'mahasiswa'),
(8, 'fazza', 'fazza', 'fazza123', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
