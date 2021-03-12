-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2021 pada 11.31
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_api`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_check`
--

CREATE TABLE `tb_data_check` (
  `ID` int(11) NOT NULL,
  `CLIENT_TYPE` varchar(225) NOT NULL,
  `POLICY_HOLDER_NAME` varchar(225) NOT NULL,
  `LIFE_ASSURED` varchar(225) NOT NULL,
  `POLICY_HOLDER_DATE_OF_BIRTH` varchar(225) NOT NULL,
  `POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED` varchar(225) NOT NULL,
  `POLICY_NUMBER` varchar(225) NOT NULL,
  `CURRENCY_1` varchar(225) NOT NULL,
  `SUM_ASSURED` varchar(225) NOT NULL,
  `CURRENCY_2` varchar(225) NOT NULL,
  `PREMIUM_AMOUNT` varchar(225) NOT NULL,
  `PAYMENT_FREQUENCY` varchar(225) NOT NULL,
  `CODE_PAYMENT_METHOD` varchar(225) NOT NULL,
  `AGENT_NAME` varchar(225) NOT NULL,
  `POLICY_HOLDER_PHONE_NUMBER` varchar(225) NOT NULL,
  `EMAIL_POLICY_HOLDER_NAME` varchar(225) NOT NULL,
  `COMPONENT_DESCRIPTION` varchar(225) NOT NULL,
  `CYCLE_DATE` varchar(225) NOT NULL,
  `ISSUED_DATE` varchar(225) NOT NULL,
  `STATUS_FLAG` varchar(225) NOT NULL,
  `CREATED_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `CHECKED_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_check`
--

INSERT INTO `tb_data_check` (`ID`, `CLIENT_TYPE`, `POLICY_HOLDER_NAME`, `LIFE_ASSURED`, `POLICY_HOLDER_DATE_OF_BIRTH`, `POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED`, `POLICY_NUMBER`, `CURRENCY_1`, `SUM_ASSURED`, `CURRENCY_2`, `PREMIUM_AMOUNT`, `PAYMENT_FREQUENCY`, `CODE_PAYMENT_METHOD`, `AGENT_NAME`, `POLICY_HOLDER_PHONE_NUMBER`, `EMAIL_POLICY_HOLDER_NAME`, `COMPONENT_DESCRIPTION`, `CYCLE_DATE`, `ISSUED_DATE`, `STATUS_FLAG`, `CREATED_DATE`, `CHECKED_DATE`) VALUES
(1, 'P', 'YANUAR HAMZAH', 'YANUAR HAMZAH', '09/07/2002', '09/07/2002', '1916315', 'IDR', '100000000', 'IDR', '99990', 'Monthly', 'D', 'MAUL', '82230651166', 'hamzah.yanuar@gmail.com', 'Zurich Proteksi 8', '20200101', '19/11/2020', 'CHECKED', '2021-03-12 03:32:54', '2021-03-12 03:33:02'),
(2, 'P', 'GIGIH SU GIGIH', 'GIGIH SU GIGIH', '06/12/1962', '20/11/1969', '1916567', 'IDR', '155000000', 'IDR', '4301250', 'Annual', 'C', 'ADIT', '811440973', 'yanuar.hamzah@quadran-si.id', 'Zurich Proteksi 8', '20200101', '19/11/2020', 'CHECKED', '2021-03-12 03:32:54', '2021-03-12 03:33:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_expired`
--

CREATE TABLE `tb_data_expired` (
  `ID` int(40) NOT NULL,
  `UID` varchar(40) DEFAULT NULL,
  `CLIENT_TYPE` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_NAME` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_NAME_ROW_2` varchar(225) DEFAULT NULL,
  `LIFE_ASSURED` varchar(225) DEFAULT NULL,
  `LIFE_ASSURED_ROW_2` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_DATE_OF_BIRTH` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED` varchar(225) DEFAULT NULL,
  `POLICY_NUMBER` varchar(225) DEFAULT NULL,
  `CURRENCY_1` varchar(225) DEFAULT NULL,
  `SUM_ASSURED` varchar(225) DEFAULT NULL,
  `CURRENCY_2` varchar(225) DEFAULT NULL,
  `PREMIUM_AMOUNT` varchar(225) DEFAULT NULL,
  `CODE_FREQUENCY` varchar(225) DEFAULT NULL,
  `PAYMENT_FREQUENCY` varchar(225) DEFAULT NULL,
  `CODE_PAYMENT_METHOD` varchar(225) DEFAULT NULL,
  `PAYMENT_METHOD` varchar(225) DEFAULT NULL,
  `AGENT_NAME` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_PHONE_NUMBER` varchar(225) DEFAULT NULL,
  `EMAIL_POLICY_HOLDER_NAME` varchar(225) DEFAULT NULL,
  `COMPONENT_DESCRIPTION` varchar(225) DEFAULT NULL,
  `CODE_COMPONENT_DESCRIPTION` varchar(25) DEFAULT NULL,
  `LANDING_PAGE` varchar(225) DEFAULT NULL,
  `ISSUED_DATE` varchar(225) DEFAULT NULL,
  `CYCLE_DATE` varchar(225) DEFAULT NULL,
  `PARSED_AT` timestamp NULL DEFAULT NULL,
  `GENERATED_AT` timestamp NULL DEFAULT NULL,
  `STATUS_FLAG` varchar(225) DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  `EXPIRED_DATE` timestamp NULL DEFAULT NULL,
  `EXPIRED_STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_expired`
--

INSERT INTO `tb_data_expired` (`ID`, `UID`, `CLIENT_TYPE`, `POLICY_HOLDER_NAME`, `POLICY_HOLDER_NAME_ROW_2`, `LIFE_ASSURED`, `LIFE_ASSURED_ROW_2`, `POLICY_HOLDER_DATE_OF_BIRTH`, `POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED`, `POLICY_NUMBER`, `CURRENCY_1`, `SUM_ASSURED`, `CURRENCY_2`, `PREMIUM_AMOUNT`, `CODE_FREQUENCY`, `PAYMENT_FREQUENCY`, `CODE_PAYMENT_METHOD`, `PAYMENT_METHOD`, `AGENT_NAME`, `POLICY_HOLDER_PHONE_NUMBER`, `EMAIL_POLICY_HOLDER_NAME`, `COMPONENT_DESCRIPTION`, `CODE_COMPONENT_DESCRIPTION`, `LANDING_PAGE`, `ISSUED_DATE`, `CYCLE_DATE`, `PARSED_AT`, `GENERATED_AT`, `STATUS_FLAG`, `CREATED_AT`, `EXPIRED_DATE`, `EXPIRED_STATUS`) VALUES
(0, 'fB8jP1KZ3zeJdli', 'P', 'YANUAR HAMZAH', '', 'YANUAR HAMZAH', '', '09/07/2002', '09/07/2002', '1916315', 'Rp', '100.000.000', 'Rp', '99.990', 'B', 'Monthly', 'D', 'Auto Debit Rekening Bank', 'MAUL', '82230651166', 'hamzah.yanuar@gmail.com', 'Zurich Proteksi 8', 'ZP8', 'http://localhost/LDP-ZURICH/?uid=ZkI4alAxS1ozemVKZGxp', '19/11/2020', '20200101', '2021-03-12 03:33:06', '2021-03-12 03:33:09', 'EXPORT', '2021-03-12 03:32:54', '2021-04-16 03:33:06', 'FALSE'),
(0, 'HrUt44fFRgNW5ga', 'P', 'GIGIH SU GIGIH', '', 'GIGIH SU GIGIH', '', '06/12/1962', '20/11/1969', '1916567', 'Rp', '155.000.000', 'Rp', '4.301.250', 'T', 'Annual', 'C', 'Transfer Bank', 'ADIT', '811440973', 'yanuar.hamzah@quadran-si.id', 'Zurich Proteksi 8', 'ZP8', 'http://localhost/LDP-ZURICH/?uid=SHJVdDQ0ZkZSZ05XNWdh', '19/11/2020', '20200101', '2021-03-12 03:33:06', '2021-03-12 03:33:09', 'EXPORT', '2021-03-12 03:32:54', '2021-04-16 03:33:06', 'FALSE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_purl`
--

CREATE TABLE `tb_data_purl` (
  `ID` int(40) NOT NULL,
  `UID` varchar(40) DEFAULT NULL,
  `CLIENT_TYPE` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_NAME` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_NAME_ROW_2` varchar(225) DEFAULT NULL,
  `LIFE_ASSURED` varchar(225) DEFAULT NULL,
  `LIFE_ASSURED_ROW_2` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_DATE_OF_BIRTH` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED` varchar(225) DEFAULT NULL,
  `POLICY_NUMBER` varchar(225) DEFAULT NULL,
  `CURRENCY_1` varchar(225) DEFAULT NULL,
  `SUM_ASSURED` varchar(225) DEFAULT NULL,
  `CURRENCY_2` varchar(225) DEFAULT NULL,
  `PREMIUM_AMOUNT` varchar(225) DEFAULT NULL,
  `CODE_FREQUENCY` varchar(225) DEFAULT NULL,
  `PAYMENT_FREQUENCY` varchar(225) DEFAULT NULL,
  `CODE_PAYMENT_METHOD` varchar(225) DEFAULT NULL,
  `PAYMENT_METHOD` varchar(225) DEFAULT NULL,
  `AGENT_NAME` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_PHONE_NUMBER` varchar(225) DEFAULT NULL,
  `EMAIL_POLICY_HOLDER_NAME` varchar(225) DEFAULT NULL,
  `COMPONENT_DESCRIPTION` varchar(225) DEFAULT NULL,
  `CODE_COMPONENT_DESCRIPTION` varchar(25) DEFAULT NULL,
  `LANDING_PAGE` varchar(225) DEFAULT NULL,
  `ISSUED_DATE` varchar(225) DEFAULT NULL,
  `CYCLE_DATE` varchar(225) DEFAULT NULL,
  `PARSED_AT` timestamp NULL DEFAULT NULL,
  `GENERATED_AT` timestamp NULL DEFAULT NULL,
  `STATUS_FLAG` varchar(225) DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  `EXPIRED_DATE` timestamp NULL DEFAULT NULL,
  `EXPIRED_STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_purl`
--

INSERT INTO `tb_data_purl` (`ID`, `UID`, `CLIENT_TYPE`, `POLICY_HOLDER_NAME`, `POLICY_HOLDER_NAME_ROW_2`, `LIFE_ASSURED`, `LIFE_ASSURED_ROW_2`, `POLICY_HOLDER_DATE_OF_BIRTH`, `POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED`, `POLICY_NUMBER`, `CURRENCY_1`, `SUM_ASSURED`, `CURRENCY_2`, `PREMIUM_AMOUNT`, `CODE_FREQUENCY`, `PAYMENT_FREQUENCY`, `CODE_PAYMENT_METHOD`, `PAYMENT_METHOD`, `AGENT_NAME`, `POLICY_HOLDER_PHONE_NUMBER`, `EMAIL_POLICY_HOLDER_NAME`, `COMPONENT_DESCRIPTION`, `CODE_COMPONENT_DESCRIPTION`, `LANDING_PAGE`, `ISSUED_DATE`, `CYCLE_DATE`, `PARSED_AT`, `GENERATED_AT`, `STATUS_FLAG`, `CREATED_AT`, `EXPIRED_DATE`, `EXPIRED_STATUS`) VALUES
(0, 'fB8jP1KZ3zeJdli', 'P', 'YANUAR HAMZAH', '', 'YANUAR HAMZAH', '', '09/07/2002', '09/07/2002', '1916315', 'Rp', '100.000.000', 'Rp', '99.990', 'B', 'Monthly', 'D', 'Auto Debit Rekening Bank', 'MAUL', '82230651166', 'hamzah.yanuar@gmail.com', 'Zurich Proteksi 8', 'ZP8', 'http://localhost/LDP-ZURICH/?uid=ZkI4alAxS1ozemVKZGxp', '19/11/2020', '20200101', '2021-03-12 03:33:06', '2021-03-12 03:33:09', 'EXPORT', '2021-03-12 03:32:54', '2021-04-16 03:33:06', 'FALSE'),
(0, 'HrUt44fFRgNW5ga', 'P', 'GIGIH SU GIGIH', '', 'GIGIH SU GIGIH', '', '06/12/1962', '20/11/1969', '1916567', 'Rp', '155.000.000', 'Rp', '4.301.250', 'T', 'Annual', 'C', 'Transfer Bank', 'ADIT', '811440973', 'yanuar.hamzah@quadran-si.id', 'Zurich Proteksi 8', 'ZP8', 'http://localhost/LDP-ZURICH/?uid=SHJVdDQ0ZkZSZ05XNWdh', '19/11/2020', '20200101', '2021-03-12 03:33:06', '2021-03-12 03:33:09', 'EXPORT', '2021-03-12 03:32:54', '2021-04-16 03:33:06', 'FALSE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_zurich`
--

CREATE TABLE `tb_data_zurich` (
  `ID` int(40) NOT NULL,
  `UID` varchar(40) DEFAULT NULL,
  `CLIENT_TYPE` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_NAME` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_NAME_ROW_2` varchar(225) DEFAULT NULL,
  `LIFE_ASSURED` varchar(225) DEFAULT NULL,
  `LIFE_ASSURED_ROW_2` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_DATE_OF_BIRTH` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED` varchar(225) DEFAULT NULL,
  `POLICY_NUMBER` varchar(225) DEFAULT NULL,
  `CURRENCY_1` varchar(225) DEFAULT NULL,
  `SUM_ASSURED` varchar(225) DEFAULT NULL,
  `CURRENCY_2` varchar(225) DEFAULT NULL,
  `PREMIUM_AMOUNT` varchar(225) DEFAULT NULL,
  `CODE_FREQUENCY` varchar(225) DEFAULT NULL,
  `PAYMENT_FREQUENCY` varchar(225) DEFAULT NULL,
  `CODE_PAYMENT_METHOD` varchar(225) DEFAULT NULL,
  `PAYMENT_METHOD` varchar(225) DEFAULT NULL,
  `AGENT_NAME` varchar(225) DEFAULT NULL,
  `POLICY_HOLDER_PHONE_NUMBER` varchar(225) DEFAULT NULL,
  `EMAIL_POLICY_HOLDER_NAME` varchar(225) DEFAULT NULL,
  `COMPONENT_DESCRIPTION` varchar(225) DEFAULT NULL,
  `CODE_COMPONENT_DESCRIPTION` varchar(25) DEFAULT NULL,
  `LANDING_PAGE` varchar(225) DEFAULT NULL,
  `ISSUED_DATE` varchar(225) DEFAULT NULL,
  `CYCLE_DATE` varchar(225) DEFAULT NULL,
  `PARSED_AT` timestamp NULL DEFAULT NULL,
  `GENERATED_AT` timestamp NULL DEFAULT NULL,
  `STATUS_FLAG` varchar(225) DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  `EXPIRED_DATE` timestamp NULL DEFAULT NULL,
  `EXPIRED_STATUS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_zurich`
--

INSERT INTO `tb_data_zurich` (`ID`, `UID`, `CLIENT_TYPE`, `POLICY_HOLDER_NAME`, `POLICY_HOLDER_NAME_ROW_2`, `LIFE_ASSURED`, `LIFE_ASSURED_ROW_2`, `POLICY_HOLDER_DATE_OF_BIRTH`, `POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED`, `POLICY_NUMBER`, `CURRENCY_1`, `SUM_ASSURED`, `CURRENCY_2`, `PREMIUM_AMOUNT`, `CODE_FREQUENCY`, `PAYMENT_FREQUENCY`, `CODE_PAYMENT_METHOD`, `PAYMENT_METHOD`, `AGENT_NAME`, `POLICY_HOLDER_PHONE_NUMBER`, `EMAIL_POLICY_HOLDER_NAME`, `COMPONENT_DESCRIPTION`, `CODE_COMPONENT_DESCRIPTION`, `LANDING_PAGE`, `ISSUED_DATE`, `CYCLE_DATE`, `PARSED_AT`, `GENERATED_AT`, `STATUS_FLAG`, `CREATED_AT`, `EXPIRED_DATE`, `EXPIRED_STATUS`) VALUES
(1, 'fB8jP1KZ3zeJdli', 'P', 'YANUAR HAMZAH', '', 'YANUAR HAMZAH', '', '09/07/2002', '09/07/2002', '1916315', 'Rp', '100.000.000', 'Rp', '99.990', 'B', 'Monthly', 'D', 'Auto Debit Rekening Bank', 'MAUL', '82230651166', 'hamzah.yanuar@gmail.com', 'Zurich Proteksi 8', 'ZP8', 'http://localhost/LDP-ZURICH/?uid=ZkI4alAxS1ozemVKZGxp', '19/11/2020', '20200101', '2021-03-12 03:33:06', '2021-03-12 03:33:09', 'EXPORT', '2021-03-12 03:32:54', '2021-04-16 03:33:06', 'FALSE'),
(2, 'HrUt44fFRgNW5ga', 'P', 'GIGIH SU GIGIH', '', 'GIGIH SU GIGIH', '', '06/12/1962', '20/11/1969', '1916567', 'Rp', '155.000.000', 'Rp', '4.301.250', 'T', 'Annual', 'C', 'Transfer Bank', 'ADIT', '811440973', 'yanuar.hamzah@quadran-si.id', 'Zurich Proteksi 8', 'ZP8', 'http://localhost/LDP-ZURICH/?uid=SHJVdDQ0ZkZSZ05XNWdh', '19/11/2020', '20200101', '2021-03-12 03:33:06', '2021-03-12 03:33:09', 'EXPORT', '2021-03-12 03:32:54', '2021-04-16 03:33:06', 'FALSE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_error`
--

CREATE TABLE `tb_error` (
  `ID` int(40) NOT NULL,
  `NUMBER_POLICY` varchar(225) DEFAULT NULL,
  `DESCRIPTION` varchar(225) DEFAULT NULL,
  `CYCLE_DATE` varchar(225) DEFAULT NULL,
  `STATUS` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_import`
--

CREATE TABLE `tb_import` (
  `id` int(10) NOT NULL,
  `File_Import` varchar(20) NOT NULL,
  `File_Export` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log`
--

CREATE TABLE `tb_log` (
  `id` int(11) NOT NULL,
  `account` varchar(100) NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `reamrk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sftp`
--

CREATE TABLE `tb_sftp` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sftp`
--

INSERT INTO `tb_sftp` (`id`, `name`, `hostname`, `username`, `password`, `port`) VALUES
(1, 'Prodcutin Zurich', '192.168.10.4', 'zurich-eov', 'Zur1ch_rD$2020', '22'),
(2, 'UAT Zurich', 'sftp.rds.co.id', 'zuricheov-uat', 'zurichbuatuateoV', '22');

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
(59, '2021-01-21 14:53:15', '2021-01-21 20:53:15', 'd4f0f53a7596c2cffcc5da98895e0fa1bc44c67c', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 1),
(60, '2021-02-24 11:09:51', '2021-02-24 17:09:51', '01487ee40bb7ef99b023064bf7ff3eaf587190a4', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 1),
(61, '2021-02-26 11:53:04', '2021-02-26 17:53:04', 'c176bb0b22f132f7678e124012253106f5364e82', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1),
(62, '2021-02-26 12:08:11', '2021-02-26 12:08:11', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 9),
(63, '2021-02-26 12:08:17', '2021-02-26 18:08:17', 'c51e256211e6de1195ee516577d423b9b40e6471', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1),
(64, '2021-02-26 15:56:18', '2021-02-26 15:56:18', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 9),
(65, '2021-02-26 15:56:25', '2021-02-26 21:56:25', 'd5c34fce5889991aabbfddb0ee55fd295e36048e', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1),
(66, '2021-02-27 13:23:28', '2021-02-27 19:23:28', '7a6c95fbd8dfc75100c8aa0db7a6504502587382', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1),
(67, '2021-03-02 10:57:27', '2021-03-02 10:57:27', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 9),
(68, '2021-03-02 10:57:33', '2021-03-02 16:57:33', '39e4d1d508f8b36eb2eb86b871b8d1f49b1caa9f', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1),
(69, '2021-03-04 03:02:13', '2021-03-04 09:02:13', '70e188687051a36c1eee88beddf69c7b9d7d8328', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1),
(70, '2021-03-05 04:40:53', '2021-03-05 04:40:53', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', 9),
(71, '2021-03-05 04:41:09', '2021-03-05 10:41:09', '8854a937b46e6a03df0beea45aa543f57f7226d4', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', 1),
(72, '2021-03-05 06:57:07', '2021-03-05 12:57:07', '31fa964e325929ef023bf7848e1814bc4e1cd106', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', 1),
(73, '2021-03-08 05:27:41', '2021-03-08 05:27:41', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', 9),
(74, '2021-03-08 05:28:18', '2021-03-08 11:28:18', '99d95ccd8fb5ccae9bebf5c7efdba008d1701c73', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', 1),
(75, '2021-03-08 06:56:54', '2021-03-08 12:56:54', 'e50356ad3b4747bca78ed73ee0a3bd2284500c3c', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 1),
(76, '2021-03-09 06:21:33', '2021-03-09 12:21:33', '9b0221a2d82dbfcb61236194f9058c120b6b5df4', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 1),
(77, '2021-03-09 08:15:27', '2021-03-09 14:15:27', '7f6a4fa71f2c6dd087a1246826897ba37c2c4495', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 1),
(78, '2021-03-09 15:12:16', '2021-03-09 21:12:16', 'd7579563a318e42637eb750afa392dc84ac1cab8', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 1),
(79, '2021-03-11 09:18:05', '2021-03-11 15:18:05', 'fc0f2bf5446fd769bbd76065105e94d5758efece', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 1),
(80, '2021-03-12 09:07:11', '2021-03-12 09:07:11', '', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 9),
(81, '2021-03-12 09:07:17', '2021-03-12 15:07:17', '14f467a837f88aeaef3ed0e33f2355b91fa4eaaf', 'muhamadmaulanarachman@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_data_check`
--
ALTER TABLE `tb_data_check`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_data_zurich`
--
ALTER TABLE `tb_data_zurich`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_import`
--
ALTER TABLE `tb_import`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sftp`
--
ALTER TABLE `tb_sftp`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `tb_data_check`
--
ALTER TABLE `tb_data_check`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_data_zurich`
--
ALTER TABLE `tb_data_zurich`
  MODIFY `ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_import`
--
ALTER TABLE `tb_import`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sftp`
--
ALTER TABLE `tb_sftp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user_log`
--
ALTER TABLE `tb_user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
