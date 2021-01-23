-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2021 pada 10.02
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tesis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_devisi`
--

CREATE TABLE `tb_devisi` (
  `ID` int(11) NOT NULL,
  `KODE` varchar(20) NOT NULL,
  `DEVISI` varchar(225) NOT NULL,
  `STATUS` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_devisi`
--

INSERT INTO `tb_devisi` (`ID`, `KODE`, `DEVISI`, `STATUS`) VALUES
(1, 'QSI-0001', 'IT PRODUCT SPECIALIST', 2),
(2, 'QSI-0002', 'IT MOBILE APPS', 2),
(3, 'QSI-0003', 'IT IMAGING PRODCUT', 2),
(4, 'QSI-0004', 'IT SUPPORT', 2),
(5, 'QSI-0005', 'PRODUCT MANGER OWNER', 2),
(6, 'QSI-0006', 'BUSINESS ANALYST', 2),
(7, 'QSI-0007', 'IT PRINTING', 2),
(8, 'QSI-0008', 'UI/UX', 2),
(10, 'QSI-0009', 'TEST', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_image`
--

CREATE TABLE `tb_image` (
  `ID` int(11) NOT NULL,
  `ID_KARYAWAN` int(12) NOT NULL,
  `NAME_IMAGE` varchar(225) NOT NULL,
  `RGB_IMAGE` varchar(220) NOT NULL,
  `GRAY_IMAGE` varchar(220) NOT NULL,
  `CROP_IMAGE` varchar(220) NOT NULL,
  `SIZE_IMAGE` int(20) NOT NULL,
  `DIRECTORY_IMAGE` varchar(100) NOT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_image`
--

INSERT INTO `tb_image` (`ID`, `ID_KARYAWAN`, `NAME_IMAGE`, `RGB_IMAGE`, `GRAY_IMAGE`, `CROP_IMAGE`, `SIZE_IMAGE`, `DIRECTORY_IMAGE`, `CREATED_DATE`) VALUES
(1, 19185, 'Muhamad Maulana.jpeg', 'asset/_upload/RGB/Muhamad Maulana.jpeg', '', '', 44548, '', '2021-01-17 05:32:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jam_absen`
--

CREATE TABLE `tb_jam_absen` (
  `ID` int(11) NOT NULL,
  `JAM_MASUK` time(6) NOT NULL,
  `JAM_PULUANG` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `ID` int(11) NOT NULL,
  `NIK` int(12) NOT NULL,
  `FRISTNAME` varchar(225) NOT NULL,
  `LASTNAME` varchar(225) NOT NULL,
  `TEMPAT_LAHIR` varchar(225) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `JENIS_KELAMIN` varchar(50) NOT NULL,
  `AGAMA` varchar(50) NOT NULL,
  `ALAMAT` text NOT NULL,
  `NOMOR_HANDPHONE` int(12) NOT NULL,
  `EMAIL` varchar(225) NOT NULL,
  `DEVISI` varchar(50) NOT NULL,
  `JABATAN` varchar(50) NOT NULL,
  `TANGGAL_BAERGABUNG` date NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `TANGGAL_CRATED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`ID`, `NIK`, `FRISTNAME`, `LASTNAME`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `AGAMA`, `ALAMAT`, `NOMOR_HANDPHONE`, `EMAIL`, `DEVISI`, `JABATAN`, `TANGGAL_BAERGABUNG`, `STATUS`, `TANGGAL_CRATED`) VALUES
(1, 19185, 'Muhamad Maulana', 'Rachman', 'Jakarta', '1992-12-30', 'Laki-Laki', 'Islam', 'Jakarta Timur', 2147483647, 'muhamadmaulanarachman@gmail.com', 'IT PRODUCT SPECIALIST', 'Programmer', '2021-01-07', '2', '2021-01-17 05:32:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `ID` int(10) NOT NULL,
  `FRISTNAME` varchar(225) NOT NULL,
  `LASTNAME` varchar(225) NOT NULL,
  `PASSWORD` varchar(225) NOT NULL,
  `CONFIRM_PASSWORD` varchar(225) NOT NULL,
  `EMAIL` varchar(225) NOT NULL,
  `IMAGE` varchar(225) NOT NULL,
  `USERMANAGER` int(2) NOT NULL,
  `ADMINISTRATOR` int(2) NOT NULL,
  `DEVELOPER` int(2) NOT NULL,
  `DATA_ADMINISTRATOR` int(2) NOT NULL,
  `REPORTING` int(2) NOT NULL,
  `READONLY` int(2) NOT NULL,
  `PROJECTCREATOR` int(2) NOT NULL,
  `DATE_CREATED` datetime NOT NULL,
  `STATUS` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`ID`, `FRISTNAME`, `LASTNAME`, `PASSWORD`, `CONFIRM_PASSWORD`, `EMAIL`, `IMAGE`, `USERMANAGER`, `ADMINISTRATOR`, `DEVELOPER`, `DATA_ADMINISTRATOR`, `REPORTING`, `READONLY`, `PROJECTCREATOR`, `DATE_CREATED`, `STATUS`) VALUES
(7, 'Muhamad Maulana', 'Rachman', '$2y$10$KM.F3sNCGg9F4swZwypyse5Ro6zLtxwb5A8DxgVB3nS6/ET31jnl.', '$2y$10$KM.F3sNCGg9F4swZwypyse5Ro6zLtxwb5A8DxgVB3nS6/ET31jnl.', 'muhamadmaulanarachman@gmail.com', 'asset/_images/undraw_profile.svg', 1, 1, 1, 1, 1, 1, 1, '2021-01-09 05:46:10', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_log`
--

CREATE TABLE `tb_user_log` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `expired` datetime NOT NULL,
  `token` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `useragent` varchar(150) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user_log`
--

INSERT INTO `tb_user_log` (`id`, `tanggal`, `expired`, `token`, `username`, `ip`, `useragent`, `status`) VALUES
(24, '2021-01-09 05:46:54', '2021-01-09 05:46:54', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 9),
(25, '2021-01-09 05:47:12', '2021-01-09 11:47:12', 'ca3ceff17c0d7190af1ea3534d58faf19c63a91a', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(26, '2021-01-09 06:44:52', '2021-01-09 06:45:34', 'e22236a16c951c5b72be31a183cca6492ec418ed', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(27, '2021-01-09 06:45:40', '2021-01-09 12:45:40', 'a7121f375b8fbc521e7e3d4db81495dea6199a14', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(28, '2021-01-09 12:40:12', '2021-01-09 12:40:25', '78b3156caec29551bf81cde7c1a7935ddb3016f2', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(29, '2021-01-09 12:41:10', '2021-01-09 18:41:10', '9e17018fba93f2220f38674696547c0bdb083ddd', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(30, '2021-01-09 13:17:30', '2021-01-09 17:14:07', '4faf8e9c4d9ad5ef7d8bda4d890ab7fce1d9c457', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(31, '2021-01-09 17:14:17', '2021-01-09 23:14:17', 'c53f2033ea8e9e655371d4b43acc63233abf94fa', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(32, '2021-01-09 22:44:58', '2021-01-09 23:21:58', '7d1b29823de358efd0a0d1699d44a72c6c5b7cf2', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(33, '2021-01-09 23:22:06', '2021-01-09 23:22:06', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 9),
(34, '2021-01-09 23:22:20', '2021-01-09 23:22:20', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 9),
(35, '2021-01-09 23:22:34', '2021-01-09 23:29:47', 'e940eee336d5efa81bb8d70a20b501e87f94c17f', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(36, '2021-01-09 23:29:54', '2021-01-09 23:29:54', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 9),
(37, '2021-01-09 23:30:21', '2021-01-09 23:30:21', 'aee61e1218113b66bd2c5a2a89e9d5144f4d02c4', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(38, '2021-01-09 23:34:23', '2021-01-09 23:34:57', '2fc4a9bcf719d2bc78421cec437f118492da3709', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(39, '2021-01-09 23:35:05', '2021-01-09 23:35:21', '1c9e573cb4cfaf178c8b4db32ee473a6149c6827', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(40, '2021-01-09 23:35:39', '2021-01-09 23:37:03', '46011d9c22a7abda7ab428eb0670d55aa7c907d0', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(41, '2021-01-09 23:37:10', '2021-01-09 23:38:40', 'e55cbda6b335135f64f63fabd392c4d0985a59a2', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(42, '2021-01-09 23:38:54', '2021-01-09 23:38:54', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 9),
(43, '2021-01-09 23:39:11', '2021-01-09 23:40:42', '9fc9214abe578f71022dfeeff58a36e0c361fcc3', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(44, '2021-01-09 23:40:49', '2021-01-09 23:41:29', '3a3c601405f2d0aa3c431ba4100c4d1dde0f6129', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(45, '2021-01-09 23:41:45', '2021-01-09 23:45:29', '6a72e7656883fa1be3f616012a03640df3d28bd6', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(46, '2021-01-09 23:48:41', '2021-01-09 23:48:41', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 9),
(47, '2021-01-09 23:48:58', '2021-01-09 23:49:04', '37d862362ebc51cb24a7063f5cb58024fb374cfa', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(48, '2021-01-10 11:47:06', '2021-01-10 11:47:06', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 9),
(49, '2021-01-10 11:47:17', '2021-01-10 11:47:17', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 9),
(50, '2021-01-10 11:51:40', '2021-01-10 17:51:40', 'ad3c977346ac0104c9a16a65a285141569eaf00d', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(51, '2021-01-11 15:11:16', '2021-01-11 15:41:31', 'f3e750d8cb64972b164ff4f25afdad39cfc1604e', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(52, '2021-01-11 15:51:08', '2021-01-11 21:51:08', 'abbd6151847657a703264509d5dcc7569251386c', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(53, '2021-01-14 10:15:41', '2021-01-14 16:15:41', 'e9236c32e73b99439d343f5eeeb600b6027388ac', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(54, '2021-01-15 14:31:34', '2021-01-15 17:29:52', 'fa520d0dd7acfcb453c24bcb92fd3848270f9e36', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(55, '2021-01-16 11:42:43', '2021-01-16 17:42:43', '88b9726fb91dfc5c944d4e9bf4f17b7c9d05a6c6', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(56, '2021-01-17 04:45:20', '2021-01-17 10:45:20', 'bc98cb739ffe54279a39387f94e4064b129e055c', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(57, '2021-01-18 05:06:47', '2021-01-18 11:06:47', '258f9de64d5e0f57a2ccc8624e1df9c125bf4fd8', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(58, '2021-01-21 14:53:09', '2021-01-21 14:53:09', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 9),
(59, '2021-01-21 14:53:15', '2021-01-21 20:53:15', 'd4f0f53a7596c2cffcc5da98895e0fa1bc44c67c', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_devisi`
--
ALTER TABLE `tb_devisi`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_jam_absen`
--
ALTER TABLE `tb_jam_absen`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_user_log`
--
ALTER TABLE `tb_user_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_devisi`
--
ALTER TABLE `tb_devisi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jam_absen`
--
ALTER TABLE `tb_jam_absen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user_log`
--
ALTER TABLE `tb_user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
