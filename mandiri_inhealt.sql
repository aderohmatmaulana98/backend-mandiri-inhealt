-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2022 pada 02.27
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mandiri_inhealt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skill`
--

INSERT INTO `skill` (`skill_id`, `skill_name`) VALUES
(2, 'html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skill_level`
--

CREATE TABLE `skill_level` (
  `skill_level_id` int(11) NOT NULL,
  `skill_level_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skill_level`
--

INSERT INTO `skill_level` (`skill_level_id`, `skill_level_name`) VALUES
(1, 'beginer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(80) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `bod` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `address`, `bod`, `email`) VALUES
('ade_rohmat', '25d55ad283aa400af464c76d713c07ad', 'Ade', 'Bantul', '1999-09-01', 'aderohmatmaulana22@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_skills`
--

CREATE TABLE `user_skills` (
  `user_skills_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `skill_level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_skils`
--

CREATE TABLE `user_skils` (
  `user_skills_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `skill_level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_skils`
--

INSERT INTO `user_skils` (`user_skills_id`, `username`, `skill_id`, `skill_level_id`) VALUES
(1, 'ade_rohmat', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indeks untuk tabel `skill_level`
--
ALTER TABLE `skill_level`
  ADD PRIMARY KEY (`skill_level_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`user_skills_id`),
  ADD KEY `username` (`username`),
  ADD KEY `skill_id` (`skill_id`) USING BTREE,
  ADD KEY `skill_level_id` (`skill_level_id`);

--
-- Indeks untuk tabel `user_skils`
--
ALTER TABLE `user_skils`
  ADD PRIMARY KEY (`user_skills_id`),
  ADD KEY `username` (`username`),
  ADD KEY `skill_id` (`skill_id`) USING BTREE,
  ADD KEY `skill_level_id` (`skill_level_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user_skils`
--
ALTER TABLE `user_skils`
  ADD CONSTRAINT `user_skils_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skils_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
