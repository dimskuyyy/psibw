-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2023 pada 07.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psibw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambilkuliah`
--

CREATE TABLE `ambilkuliah` (
  `id_ambilmk` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `mata_kuliah` varchar(80) NOT NULL,
  `dosen` varchar(200) NOT NULL,
  `jenis_kelas` varchar(15) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `ruangan` varchar(15) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ambilkuliah`
--

INSERT INTO `ambilkuliah` (`id_ambilmk`, `kode`, `mata_kuliah`, `dosen`, `jenis_kelas`, `hari`, `waktu`, `ruangan`, `sks`) VALUES
(2, '0401307', 'Komunikasi Interpersonal', 'Reny Medikawati Taufiq, S.Kom., M.T', 'Reguler', 'Rabu', '10:00-12:40', 'GR705', 3),
(3, 'PAS11001', ' Matematika Diskrit', 'Drs.SUKAMTO, M.Kom', 'Reguler', 'Senin', '07:30-09:00', '101', 3),
(4, 'PAS12010', 'Bahasa Inggris', 'Dr.Ibnu Daqiqil id, S.Kom, M.T.I', 'Reguler', 'Selasa', '07:30-09:01', '203', 2),
(5, 'UNR1003', 'Budaya Melayu', 'DraMUNJIATUN, M.Pd,', 'Reguler', 'Rabu', '07:30-09:02', '301', 2),
(6, 'UNR1004', 'Ilmu Lingkungan & Mitigasi Bencana', 'DrVANDA JULITA YAHYA, M.Si', 'Reguler', 'Kamis', '07:30-09:03', '204', 2),
(7, 'UNR1005', 'Kewirausahaan', 'SUJARWATI, S.Si, M.Si', 'Reguler', 'Jumat', '07:30-09:04', '309', 2),
(8, 'MSI1201', 'Konsep Basis Data', 'AL AMINUDDIN, S.T.,M.Sc', 'Reguler', 'Senin', '07:30-09:05', '205', 3),
(9, 'UNR1001', 'Literasi Digital', 'HENDRA TAUFIK, S.T., M.Sc', 'Reguler', 'Selasa', '07:30-09:06', '108', 1),
(10, 'MSI1203', 'Pemrograman Berorientasi Objek', 'AIDIL FITRIANSYAH, S. Kom, M.Kom', 'Reguler', 'Rabu', '07:30-09:07', '303', 3),
(11, 'UXN1007', 'Pendidikan Pancasila', 'SUPRIADI, M.Pd', 'Reguler', 'Kamis', '07:30-09:08', '301', 2),
(12, 'MSI1204', 'Sistem Operasi', 'RIKI ARIO NUGROHO, S.Si., M.Kom', 'Reguler', 'Jumat', '07:30-09:09', '101', 3),
(13, 'PAS22122', 'Evaluasi Antarmuka Pengguna', 'FATAYAT, SKom, M.Kom', 'Bersyarat', 'Selasa', '07:30-09:10', '203', 3),
(14, 'PAS22018', 'Keamanan Sistem Informasi', 'ALFIRMAN, S.Kom, M.Kom', 'Reguler', 'Rabu', '07:30-09:11', '305', 3),
(15, 'UXN12116', 'Kewarganegaraan', 'Jaya Paldi, M.Pd', 'Reguler', 'Kamis', '07:30-09:12', '108', 2),
(16, 'MSI2202', 'Komputasi Awan', 'TISHA MELIA, B.Sc., M.Sc., Ph.D.', 'Bersyarat', 'Jumat', '07:30-09:13', '105', 3),
(17, 'PAS22016', 'Manajemen & Administrasi Basis Data', 'RONI SALAMBUE, S.Kom., M.Si', 'Bersyarat', 'Kamis', '07:30-09:14', '205', 3),
(18, 'PAS22019', 'Pemodelan Proses Bisnis', 'YANTI ANDRIYANI, ST, M.TI, Ph.D', 'Bersyarat', 'Jumat', '07:30-09:15', '306', 3),
(19, 'MSI2207', 'Pemrograman Bahasa Alami', 'ZUL INDRA, S.T., M.Sc.', 'Bersyarat', 'Senin', '07:30-09:16', '308', 3),
(20, 'PAS22020', 'Pengembangan Sistem Informasi Berbasis Web', 'ZAIFUL BAHRI, S.Si, M.Kom', 'Reguler', 'Selasa', '07:30-09:17', '309', 3),
(21, 'PAS22017', 'Proses Bisnis Elektronik', 'Dr.ELFIZAR, S.Si., M.Kom', 'Reguler', 'Rabu', '07:30-09:18', '102', 3),
(22, 'MSI2205', 'Rekayasa Proses Bisnis', 'YANTI ANDRIYANI, ST, M.TI, Ph.D', 'Reguler', 'Kamis', '07:30-09:19', '302', 3),
(23, 'MSI2204', 'Sistem Cerdas', 'DR.RAHMAD KURNIAWAN, S.T.,M.I.T.', 'Reguler', 'Jumat', '07:30-09:20', '301', 3),
(24, 'MSI2206', 'Sistem Informasi Geografis', 'GITA SASTRIA, ST, MIT', 'Bersyarat', 'Senin', '07:30-09:21', '203', 3),
(25, 'PAS32034', 'Etika Profesi Sistem Informasi', 'Dr.ELFIZAR, S.Si., M.Kom', 'Bersyarat', 'Selasa', '07:30-09:22', '102', 2),
(26, 'PAS32036', 'Manajemen Proyek Sistem Informasi', 'EVFI MAHDIYAH, S.Kom, MIT', 'Bersyarat', 'Rabu', '07:30-09:23', '304', 3),
(27, 'MIP11085', 'Metodelogi Penelitian', 'RONI SALAMBUE, S.Kom., M.Si', 'Bersyarat', 'Kamis', '07:30-09:24', '301', 3),
(28, 'PAS32035', 'Perancangan Strategis Sistem Informasi', 'YANTI ANDRIYANI, ST, M.TI, Ph.D', 'Bersyarat', 'Jumat', '07:30-09:25', '306', 3),
(29, 'PAS32139', 'Sistem Informasi Geografis Terdistribusi Lanjut', 'Dr.Ibnu Daqiqil id, S.Kom, M.T.I', 'Bersyarat', 'Selasa', '07:30-09:26', '303', 3),
(30, 'PAS43041', 'Kerja Praktek', 'DrsSUKAMTO, M.Kom', 'Reguler', 'Rabu', '07:30-09:27', '102', 4),
(31, 'PAS44043', 'Kuliah Kerja Nyata', 'DrsSUKAMTO, M.Kom', 'Reguler', 'Kamis', '07:30-09:28', '101', 4),
(32, 'PAS44044', 'Skripsi', 'DrsSUKAMTO, M.Kom', 'Reguler', 'Jumat', '07:30-09:29', '103', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `agama` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `dosen_prodi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `nama`, `jenis_kelamin`, `agama`, `tanggal_lahir`, `dosen_prodi`, `status`, `alamat`) VALUES
(2, 1234567890, 'Syiamu Nanda Saputra., S.IKom', 1, 1, '1998-01-22', 603124, 1, 'Jl. Handayani No.43\r\n'),
(3, 2147483647, 'Colorado Nelson, PHD', 1, 3, '2002-05-08', 603124, 3, 'Ap #109-3372 Tempus Rd.'),
(4, 1170072785, 'Jameson Sosa, S.Kom., M.Kom', 0, 3, '2000-11-29', 603125, 2, '339-4682 Primis Avenue'),
(5, 1421548112, 'Gemma Gregory, PHD', 1, 3, '2003-04-30', 603124, 1, '7295 Sed Ave'),
(6, 1343448443, 'Ulla Pittman, S.Kom., M.Kom', 0, 4, '2002-07-07', 603124, 2, 'Ap #683-8802 In Ave'),
(7, 2147483647, 'Galena Hinton, S.Kom., M.T', 0, 4, '2000-02-05', 603124, 1, '643-6618 Facilisis Av.'),
(8, 2147483647, 'Michael Stephens, MIT', 1, 4, '2003-08-02', 603124, 2, '5559 Ipsum. Avenue'),
(9, 1601454549, 'Josiah Joyce, S.Kom., M.T', 1, 5, '2002-06-28', 603125, 1, '889-7978 Congue, Street'),
(10, 1428567305, 'Grady Hernandez, S.Kom., M.Cs', 1, 3, '2001-08-28', 603125, 2, 'Ap #233-1273 Iaculis St.'),
(11, 1264878859, 'Ruth Livingston, S.Kom., M.Cs', 1, 3, '2003-11-22', 603124, 1, 'Ap #843-4327 Elit, St.'),
(12, 2147483647, 'Deacon Rivera, MIT', 1, 5, '2003-06-20', 603124, 3, '695-5052 Morbi Rd.'),
(13, 1749711502, 'Elizabeth Dodson, S.Kom., M.T', 0, 2, '2003-05-12', 603124, 2, 'Ap #108-8537 Eu, Avenue'),
(14, 1098454495, 'Nasim Cameron, S.Kom., M.Cs', 0, 4, '2000-04-19', 603125, 2, '577-7910 Consequat St.'),
(15, 2147483647, 'Chanda Kirkland, PHD', 0, 5, '2003-01-29', 603124, 3, '705-5096 Ad Ave'),
(16, 2025599005, 'Ryder Mcknight, S.Kom., M.Cs', 0, 3, '2001-11-26', 603125, 2, 'P.O. Box 638, 2734 Purus, Ave'),
(17, 2147483647, 'Emerson Parker, S.T., M.Cs', 1, 2, '2000-09-02', 603125, 2, '742-9236 Natoque St.'),
(18, 1272738290, 'Walker Burke, MIT', 1, 2, '2000-06-17', 603124, 2, 'Ap #191-2066 Est St.'),
(19, 2147483647, 'Reuben Booker, MIT', 1, 2, '2001-02-23', 603125, 1, 'Ap #670-1368 Erat St.'),
(20, 2147483647, 'Lee Mejia, MIT', 0, 1, '2002-05-15', 603124, 2, 'Ap #298-4079 Erat Street'),
(21, 1639758249, 'Philip Salinas, S.Kom., M.Cs', 1, 5, '2002-10-27', 603124, 2, 'Ap #901-947 Porta Av.'),
(22, 1709523334, 'Chelsea Buck, PHD', 1, 3, '2001-06-05', 603124, 3, '184 Nec Avenue'),
(23, 1670768644, 'Joseph Lee, S.Kom., M.Kom', 0, 2, '2001-02-17', 603124, 2, 'Ap #504-3207 Metus. St.'),
(24, 2147483647, 'Kyle Clements, S.Kom., M.T', 1, 3, '2002-01-09', 603125, 3, 'P.O. Box 281, 1109 Euismod Ave'),
(25, 2147483647, 'Yetta Landry, S.Kom., M.Cs', 0, 1, '2000-07-17', 603125, 2, '130-8779 Dolor Road'),
(26, 1861733902, 'Jaime Keller, PHD', 0, 3, '2003-05-19', 603125, 1, '342-4526 Morbi Road'),
(27, 2147483647, 'Paul Robles, S.Kom., M.T', 1, 3, '2002-05-02', 603125, 3, 'P.O. Box 241, 2045 Dolor, Avenue'),
(28, 2147483647, 'Buckminster Haynes, S.Kom., M.Kom', 1, 2, '2002-11-09', 603124, 2, '686-493 Vestibulum Av.'),
(29, 1087892412, 'Griffin Sweeney, PHD', 1, 4, '2000-05-04', 603124, 2, '585-1836 Fermentum Ave'),
(30, 1786001707, 'Adam Logan, S.T., M.Cs', 0, 5, '2003-04-30', 603125, 2, 'Ap #709-2985 Et Rd.'),
(31, 1595880307, 'Karleigh Phillips, S.Kom., M.T', 1, 2, '2002-04-15', 603124, 3, 'Ap #848-8592 Non St.'),
(32, 2147483647, 'Jeremy House, S.Kom., M.T', 0, 4, '2001-12-25', 603124, 3, 'Ap #458-2471 Natoque St.'),
(33, 2147483647, 'Oscar Mcdonald, S.Kom., M.Cs', 1, 5, '2001-07-09', 603124, 2, '489-8126 Maecenas Avenue'),
(34, 2033540167, 'Jakeem Cochran, S.T., M.Cs', 0, 4, '2002-02-18', 603125, 1, '229-4620 Est St.'),
(35, 2147483647, 'Tate Nolan, S.Kom., M.Kom', 1, 4, '2000-07-19', 603124, 1, 'Ap #153-3371 Nascetur Ave'),
(36, 1937988592, 'Brock Irwin, PHD', 0, 1, '2002-02-09', 603125, 1, 'Ap #871-5653 Sagittis Ave'),
(37, 2018736375, 'Maia Gutierrez, S.Kom., M.Cs', 0, 3, '2003-04-10', 603124, 2, '612-9553 Et Rd.'),
(38, 1536763945, 'Hoyt Donovan, S.Kom., M.Cs', 1, 1, '2002-12-04', 603125, 2, 'Ap #350-8637 Lectus. St.'),
(39, 1540322858, 'Merrill Guerrero, S.Kom., M.Cs', 1, 4, '2002-03-09', 603125, 1, 'Ap #617-4685 Erat Rd.'),
(40, 2009836265, 'Amber Nolan, S.T., M.Cs', 1, 5, '2002-09-25', 603125, 3, 'Ap #156-1364 Suscipit, Ave'),
(41, 2147483647, 'Ivana Drake, S.Kom., M.Kom', 1, 4, '2000-07-17', 603125, 1, 'P.O. Box 822, 7863 In Avenue'),
(42, 2147483647, 'Ciara Cross, S.Kom., M.T', 1, 5, '1999-11-14', 603124, 2, '345-4817 Netus Road'),
(43, 1945075631, 'Lacey Barton, PHD', 1, 4, '2001-11-25', 603124, 1, 'Ap #924-4519 Felis Av.'),
(44, 1980082036, 'Lavinia Garcia, S.Kom., M.T', 1, 5, '2001-11-30', 603125, 3, 'Ap #760-1471 Id, Road'),
(45, 1785068793, 'Rosalyn Graves, S.T., M.Cs', 0, 1, '2001-09-15', 603125, 1, 'Ap #767-2935 Feugiat. Avenue'),
(46, 1716419694, 'Herman Hess, S.T., M.Cs', 0, 2, '2001-05-07', 603125, 3, 'Ap #466-8438 Ornare Rd.'),
(47, 2147483647, 'Sylvester Soto, PHD', 0, 4, '2001-09-25', 603125, 3, '684 Lorem Rd.'),
(48, 2147483647, 'Cedric Hampton, MIT', 0, 4, '2002-04-21', 603125, 2, '733-4876 Ligula. Ave'),
(49, 1659381720, 'Deacon Tucker, S.Kom., M.Kom', 0, 1, '2000-06-24', 603125, 2, '263-3336 Cras Rd.'),
(50, 1727871381, 'Barrett Chan, S.T., M.Cs', 0, 5, '2001-06-12', 603124, 2, '2210 Erat Street'),
(51, 1434152083, 'Maile Mcintosh, S.Kom., M.T', 0, 4, '2003-05-21', 603125, 1, 'P.O. Box 696, 1274 Parturient Rd.'),
(52, 2147483647, 'Maite Crosby, S.Kom., M.Kom', 0, 1, '2001-03-25', 603124, 3, 'Ap #481-4550 Pharetra Rd.'),
(53, 1682551369, 'Maxwell Tucker, S.Kom., M.Kom', 1, 5, '2002-04-23', 603124, 1, 'Ap #539-4620 At, Street'),
(54, 1188236767, 'William Blankenship, PHD', 0, 2, '2000-10-20', 603124, 1, 'P.O. Box 742, 2914 Magna Rd.'),
(55, 2147483647, 'Walter Dejesus, MIT', 0, 5, '2000-04-29', 603124, 2, '510-9301 Vivamus Street'),
(56, 2147483647, 'Mohammad Sweeney, PHD', 0, 3, '2003-10-15', 603125, 3, '923-3614 Lobortis Rd.'),
(57, 1004959350, 'Colton Griffin, S.Kom., M.Kom', 0, 2, '2001-10-25', 603124, 2, 'Ap #184-7948 Lacinia St.'),
(58, 1186863529, 'Jason Gibson, S.T., M.Cs', 1, 3, '2002-10-26', 603125, 2, '735-4642 Vel Av.'),
(59, 2147483647, 'Xandra Wiggins, S.Kom., M.Cs', 1, 3, '2003-08-23', 603124, 2, '662-2928 Lacus. St.'),
(60, 2147483647, 'Garrett Hinton, PHD', 0, 4, '2002-05-24', 603124, 2, 'Ap #874-5185 A Rd.'),
(61, 2147483647, 'Kenyon Hopper, S.Kom., M.Kom', 1, 3, '2001-08-16', 603125, 3, 'P.O. Box 757, 2030 Diam Ave'),
(62, 1191241031, 'Emma Patterson, S.Kom., M.Cs', 0, 4, '2000-06-02', 603125, 1, '601-8929 Elit Rd.'),
(63, 1867749142, 'Margaret Carrillo, S.Kom., M.Cs', 1, 2, '2000-08-09', 603125, 2, 'Ap #879-144 Quis Av.'),
(64, 2147483647, 'Alice Alford, S.Kom., M.T', 0, 2, '2000-07-03', 603125, 1, '630-3833 Sit Rd.'),
(65, 2061398525, 'Marvin Owen, S.Kom., M.Kom', 0, 3, '2002-04-07', 603125, 2, '736-8741 Velit St.'),
(66, 1175343670, 'Jeremy Mosley, S.Kom., M.Kom', 0, 1, '2001-12-16', 603125, 2, '311-7235 Odio. St.'),
(67, 1860864817, 'Leah Hart, S.T., M.Cs', 1, 4, '2000-03-06', 603125, 2, 'P.O. Box 954, 9583 Donec Street'),
(68, 1965000391, 'Trevor Kane, S.Kom., M.T', 0, 4, '2003-06-11', 603125, 1, '5363 Congue Rd.'),
(69, 2147483647, 'Rashad Riddle, PHD', 0, 3, '2002-10-28', 603124, 2, '665-2809 Mauris Avenue'),
(70, 2147483647, 'Carlos Goodwin, PHD', 1, 2, '2002-07-31', 603124, 2, '3408 Nunc St.'),
(71, 2147483647, 'Kenneth Holloway, S.Kom., M.Kom', 1, 2, '2002-05-18', 603125, 3, '313-2479 Libero. Avenue'),
(72, 2147483647, 'Henry Carver, PHD', 1, 2, '2000-12-19', 603124, 2, '334-4619 Commodo St.'),
(73, 2147483647, 'Gannon Figueroa, S.T., M.Cs', 0, 2, '2001-12-15', 603125, 2, '4622 Vestibulum Street'),
(74, 2147483647, 'Edan Brewer, MIT', 0, 2, '2001-08-13', 603124, 2, '493-7334 In Av.'),
(75, 1945885431, 'Keith Hansen, S.Kom., M.T', 1, 2, '2002-09-29', 603124, 1, '3982 Ornare Av.'),
(76, 1872037744, 'Emma Woodward, S.Kom., M.Kom', 0, 3, '2003-05-05', 603124, 3, '938-1835 Feugiat Avenue'),
(77, 1062941280, 'Naomi Levine, S.Kom., M.Cs', 0, 3, '2000-08-22', 603124, 2, 'Ap #897-7823 Metus St.'),
(78, 1506260768, 'Courtney Sellers, S.T., M.Cs', 1, 4, '2003-02-22', 603125, 1, '872-8977 Et Street'),
(79, 2147483647, 'Flavia Rivera, S.Kom., M.T', 0, 4, '2002-07-01', 603125, 2, '288-7210 Erat. Av.'),
(80, 2057012834, 'Yvette Cooke, MIT', 1, 3, '2001-07-13', 603124, 3, 'Ap #955-2959 Nullam Rd.'),
(81, 1401137540, 'Nasim Warren, S.Kom., M.Cs', 0, 5, '2003-03-23', 603125, 1, '117-9170 Risus. Av.'),
(82, 2147483647, 'Tamekah Dickson, S.T., M.Cs', 1, 3, '2003-07-24', 603124, 3, '757-1543 Vivamus Av.'),
(83, 1340131466, 'Candice Kennedy, MIT', 0, 2, '2001-04-16', 603124, 1, '7252 Eget, St.'),
(84, 2111644941, 'Dale Wilson, S.Kom., M.Kom', 1, 4, '2000-12-26', 603124, 3, '5061 Dui, Road'),
(85, 1757140066, 'Quin Castro, PHD', 0, 3, '2002-11-06', 603124, 1, '621-8063 Pretium St.'),
(86, 2088783640, 'Joel Fitzpatrick, S.Kom., M.T', 0, 3, '2000-06-29', 603124, 1, '508-9667 Sed Av.'),
(87, 1487643578, 'Shannon Madden, S.Kom., M.Cs', 1, 3, '2002-08-10', 603125, 2, '3656 Cras Av.'),
(88, 2147483647, 'Chanda Walton, S.Kom., M.Kom', 1, 2, '2000-10-27', 603125, 2, 'P.O. Box 613, 6437 Pede. Ave'),
(89, 2086761142, 'Wynter Beasley, S.T., M.Cs', 0, 1, '2003-07-18', 603124, 2, '621-2687 Penatibus Avenue'),
(90, 1262496993, 'Hector Winters, S.Kom., M.Cs', 1, 2, '2002-02-23', 603124, 2, '566-5089 Fusce Rd.'),
(91, 1989287642, 'Teegan Williamson, MIT', 1, 2, '2002-01-16', 603125, 2, '9616 Varius St.'),
(92, 1931358987, 'Galvin Castillo, PHD', 1, 1, '2001-06-30', 603124, 1, 'P.O. Box 405, 9959 Lorem Rd.'),
(93, 1753590838, 'Alan Black, S.Kom., M.T', 1, 5, '2003-12-23', 603124, 1, 'Ap #261-4467 Sem Rd.'),
(94, 1941459491, 'Rudyard Wilson, S.T., M.Cs', 0, 4, '2001-12-10', 603124, 2, 'Ap #677-8131 Quisque Av.'),
(95, 1245457561, 'Michael Mueller, S.Kom., M.T', 1, 3, '2002-08-04', 603125, 1, 'Ap #646-8106 Pede Rd.'),
(96, 1809001171, 'Griffith Douglas, S.Kom., M.T', 0, 5, '2000-09-14', 603125, 3, '905-9020 Risus, Street'),
(97, 1441967540, 'Nicole Travis, S.Kom., M.Cs', 0, 2, '2000-09-04', 603124, 3, 'Ap #709-9566 Velit Road'),
(98, 1366171093, 'Janna Mcdaniel, S.Kom., M.Kom', 0, 2, '2002-12-11', 603124, 3, 'P.O. Box 956, 5030 Neque. Rd.'),
(99, 1366900189, 'Edan Burt, PHD', 0, 5, '2003-02-26', 603125, 2, 'Ap #874-7104 Cursus, St.'),
(100, 1833854647, 'Colin Ramirez, S.T., M.Cs', 1, 5, '2003-09-18', 603125, 1, '916-9584 In, Av.'),
(101, 1823337474, 'Melissa Mckinney, PHD', 0, 2, '2001-06-16', 603124, 1, '576-9158 Consectetuer Av.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matkul` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `mata_kuliah` varchar(80) NOT NULL,
  `dosen` varchar(200) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `jenis_kelas` varchar(20) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matkul`, `kode`, `mata_kuliah`, `dosen`, `kelas`, `jenis_kelas`, `sks`, `semester`) VALUES
(4, 'PAS11001', ' Matematika Diskrit', 'Drs.SUKAMTO, M.Kom', 'A;B', 'Reguler', 3, 3),
(5, 'PAS12010', 'Bahasa Inggris', 'Dr.Ibnu Daqiqil id, S.Kom, M.T.I; TISHA MELIA, B.Sc., M.Sc., Ph.D.', 'A;B', 'Reguler', 2, 1),
(6, 'UNR1003', 'Budaya Melayu', 'DraMUNJIATUN, M.Pd;DraMUNJIATUN, M.Pd;DrsEMRIZAL MAHIDIN TAMBUSAI, M.Si ', 'A;B;C', 'Reguler', 2, 2),
(7, 'UNR1004', 'Ilmu Lingkungan & Mitigasi Bencana', 'DrVANDA JULITA YAHYA, M.Si;DrSITI FATONAH, MP;DrDELITA ZUL, M.Si', 'A;B;C', 'Reguler', 2, 2),
(8, 'UNR1005', 'Kewirausahaan', 'SUJARWATI, S.Si, M.Si;DrYULMINARTI, M.Si;DrsKHAIRIJON, MS', 'A;B;C', 'Reguler', 2, 2),
(9, 'MSI1201', 'Konsep Basis Data', 'AL AMINUDDIN, S.T.,M.Sc', 'A;B;C', 'Reguler', 3, 1),
(10, 'UNR1001', 'Literasi Digital', 'HENDRA TAUFIK, S.T., M.Sc;ANNE MUDYA YOLANDA, S.Stat., M.Si.', 'A-21', 'Reguler', 1, 2),
(11, 'MSI1203', 'Pemrograman Berorientasi Objek', 'AIDIL FITRIANSYAH, S. Kom, M.Kom', 'A;B;C', 'Reguler', 3, 2),
(12, 'UXN1007', 'Pendidikan Pancasila', 'SUPRIADI, M.Pd;MUHADI FEBRO, MM;ADE VERAWATI,M.Pd', 'A;B;C', 'Reguler', 2, 1),
(13, 'MSI1204', 'Sistem Operasi', 'RIKI ARIO NUGROHO, S.Si., M.Kom;ALFIRMAN, S.Kom, M.Kom', 'A;B', 'Reguler', 3, 2),
(14, 'PAS22122', 'Evaluasi Antarmuka Pengguna', 'FATAYAT, SKom, M.Kom', 'A;B;C', 'Bersyarat', 3, 3),
(15, 'PAS22018', 'Keamanan Sistem Informasi', 'ALFIRMAN, S.Kom, M.Kom;ZUL INDRA, S.T., M.Sc.', 'A;B', 'Reguler', 3, 4),
(16, 'UXN12116', 'Kewarganegaraan', 'Jaya Paldi, M.Pd,', 'A;B', 'Reguler', 2, 1),
(17, 'MSI2202', 'Komputasi Awan', 'TISHA MELIA, B.Sc., M.Sc., Ph.D.', 'A;B', 'Bersyarat', 3, 4),
(18, 'PAS22016', 'Manajemen & Administrasi Basis Data', 'RONI SALAMBUE, S.Kom., M.Si', 'A;B;C', 'Bersyarat', 3, 5),
(19, 'PAS22019', 'Pemodelan Proses Bisnis', 'YANTI ANDRIYANI, ST, M.TI, Ph.D', 'A;B', 'Bersyarat', 3, 4),
(20, 'MSI2207', 'Pemrograman Bahasa Alami', 'ZUL INDRA, S.T., M.Sc.', 'A;B', 'Bersyarat', 3, 4),
(21, 'PAS22020', 'Pengembangan Sistem Informasi Berbasis Web', 'ZAIFUL BAHRI, S.Si, M.Kom', 'A;B;C', 'Reguler', 3, 4),
(22, 'PAS22017', 'Proses Bisnis Elektronik', 'Dr.ELFIZAR, S.Si., M.Kom', 'A;B', 'Reguler', 3, 6),
(23, 'MSI2205', 'Rekayasa Proses Bisnis', 'YANTI ANDRIYANI, ST, M.TI, Ph.D', 'A;B', 'Reguler', 3, 3),
(24, 'MSI2204', 'Sistem Cerdas', 'DRRAHMAD KURNIAWAN, S.T.,M.I.T.; Dr.Ibnu Daqiqil id, S.Kom, M.T.I', 'A;B', 'Reguler', 3, 4),
(25, 'MSI2206', 'Sistem Informasi Geografis', 'GITA SASTRIA, ST, MIT', 'A;B', 'Bersyarat', 3, 4),
(26, 'PAS32034', 'Etika Profesi Sistem Informasi', 'Dr.ELFIZAR, S.Si., M.Kom;SONYA MEITARICE, M.Sc', 'A;B', 'Bersyarat', 2, 7),
(27, 'PAS32036', 'Manajemen Proyek Sistem Informasi', 'EVFI MAHDIYAH, S.Kom, MIT;DRRAHMAD KURNIAWAN, S.T.,M.I.T.', 'A;B;C;D', 'Bersyarat', 3, 7),
(28, 'MIP11085', 'Metodelogi Penelitian', 'RONI SALAMBUE, S.Kom., M.Si; DRRAHMAD KURNIAWAN, S.T.,M.I.T.', 'A;B;C', 'Bersyarat', 3, 6),
(29, 'PAS32035', 'Perancangan Strategis Sistem Informasi', 'YANTI ANDRIYANI, ST, M.TI, Ph.D;JOKO RISANTO, S. Kom, M.Kom', 'B', 'Bersyarat', 3, 6),
(30, 'PAS32139', 'Sistem Informasi Geografis Terdistribusi Lanjut', 'Dr.Ibnu Daqiqil id, S.Kom, M.T.I', 'A;B', 'Bersyarat', 3, 7),
(31, 'PAS43041', 'Kerja Praktek', 'DrsSUKAMTO, M.Kom', 'A;B;C', 'Reguler', 4, 6),
(32, 'PAS44043', 'Kuliah Kerja Nyata', 'DrsSUKAMTO, M.Kom', 'A;B;C', 'Reguler', 4, 4),
(33, 'PAS44044', 'Skripsi', 'DrsSUKAMTO, M.Kom', 'A;B;C', 'Reguler', 6, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_web`
--

CREATE TABLE `mhs_web` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` char(1) NOT NULL,
  `prodi` varchar(6) NOT NULL,
  `status` char(1) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs_web`
--

INSERT INTO `mhs_web` (`id_mahasiswa`, `nim`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `prodi`, `status`, `alamat`) VALUES
(5, '2103135902', 'M. Athallah Dzikri Alhady', '1', '2003-08-12', '1', '603124', '1', 'Jl. Delima no. 55'),
(24, '210401136', 'Dimas Fauzan', '1', '2023-06-14', '4', '603124', '2', 'Jl. Handayani No.43 Labuhbaru Barat, Payung Sekaki, Pekanbaru, Riau'),
(27, '210401128', 'Syifa Kayla Nabila', '0', '2023-06-12', '1', '603124', '1', 'Jalan Mana aja boleh'),
(28, '210401111', 'Ananda Rahma Putri', '0', '2023-06-18', '1', '603125', '1', 'Jl mananya aku lupa'),
(323, '210400266', 'Ke Wei Teng', '0', '2003-04-17', '4', '603125', '2', 'Ap #761-4418 Cursus Ave'),
(324, '210400272', 'Orion Subramanian', '0', '2000-10-28', '4', '603125', '5', 'Ap #285-2304 Mollis Road'),
(325, '210400986', 'Imran Hwee', '1', '2000-07-31', '4', '603124', '5', 'P.O. Box 111, 2221 Convallis Street'),
(326, '210400024', 'Oswald Hausmann', '0', '2001-12-27', '3', '603125', '3', 'Ap #910-8730 Metus. Av.'),
(327, '210400996', 'Lars Vogt', '1', '2000-05-20', '2', '603125', '4', 'Ap #960-6473 Vel Rd.'),
(328, '210400862', 'Max Peters', '0', '2001-02-05', '1', '603124', '2', 'Ap #593-9527 Scelerisque Av.'),
(329, '210400907', 'Eike Werner', '0', '2002-01-18', '1', '603125', '3', '157-9429 Non St.'),
(330, '210400760', 'Nils Dietrich', '0', '2003-10-08', '5', '603125', '3', 'P.O. Box 414, 9585 Nulla Avenue'),
(331, '210400830', 'Swami Ko', '1', '2002-03-20', '5', '603124', '3', '8431 Cras Road'),
(332, '210400883', 'Bernhard Meyer', '1', '2002-07-14', '4', '603125', '2', '642-8018 Justo. Street'),
(333, '210400542', 'Nathaniel Kai', '1', '2000-06-23', '1', '603125', '2', '509-2845 Mus. Rd.'),
(334, '210400515', 'Lars Simon', '1', '2003-12-30', '2', '603125', '5', 'Ap #481-8872 Est Street'),
(335, '210400781', 'Nathaniel Kee', '1', '2001-06-23', '4', '603124', '2', 'P.O. Box 744, 6198 Quis Rd.'),
(336, '210400594', 'Daniel Ong', '1', '2002-09-18', '4', '603124', '2', '259-3735 Lorem St.'),
(337, '210400505', 'Thorsten Peters', '1', '2000-05-29', '4', '603125', '4', 'P.O. Box 359, 8801 Aliquam Avenue'),
(338, '210400981', 'Elroy Pang', '0', '2001-06-07', '5', '603124', '5', '361-3112 Cras St.'),
(339, '210400966', 'Johannes Schulz', '0', '2002-06-07', '4', '603125', '2', '912-5029 Risus. St.'),
(340, '210400136', 'Sharan Bi', '0', '2001-05-13', '3', '603124', '1', '9764 In St.'),
(341, '210400939', 'Chen Mai', '0', '2003-05-08', '3', '603124', '1', '757-4990 Sapien, Avenue'),
(342, '210401161', 'Christopher Neumann', '1', '2000-01-05', '2', '603125', '3', '580-8430 Auctor Street'),
(343, '210400458', 'Khey Won', '0', '2000-05-05', '4', '603125', '3', '495-895 Quis Av.'),
(344, '210400370', 'Joseph Lim', '0', '2003-07-20', '1', '603125', '3', 'Ap #952-7269 Dignissim Rd.'),
(345, '210400648', 'Adam Wu', '0', '2000-10-01', '5', '603125', '2', '170-9572 Lobortis Ave'),
(346, '210400405', 'Sepp Peters', '1', '2000-12-29', '5', '603124', '5', 'P.O. Box 171, 2140 Lectus St.'),
(347, '210400631', 'Manuel Merkle', '0', '2003-04-04', '4', '603125', '5', 'Ap #218-4486 Mollis. Road'),
(348, '210400774', 'Joseph Nguyen', '1', '2001-05-31', '4', '603124', '3', 'P.O. Box 474, 2939 Nullam St.'),
(349, '210400094', 'Oswald Sauer', '1', '2001-01-31', '1', '603124', '3', 'Ap #185-8394 Nunc Rd.'),
(350, '210400742', 'Boris Bruckmann', '1', '2002-07-03', '4', '603125', '1', '572-4169 Sit Avenue'),
(351, '210400411', 'Rainer Koch', '1', '2000-11-10', '1', '603125', '3', 'Ap #244-2469 Ligula. Rd.'),
(352, '210400168', 'Thane Tanaka', '1', '2002-02-04', '1', '603124', '4', 'P.O. Box 410, 9364 Nunc Street'),
(353, '210400397', 'Alv Yap', '0', '2001-10-02', '2', '603125', '1', '576-762 Vel Av.'),
(354, '210400860', 'Alexander Martin', '1', '2003-02-05', '4', '603124', '2', 'Ap #251-5053 Fusce Rd.'),
(355, '210401175', 'Ken Loke', '1', '2002-05-15', '3', '603124', '4', '682-1176 Sagittis. Ave'),
(356, '210400433', 'Joshua Ko', '1', '2002-02-14', '2', '603125', '5', 'Ap #708-3143 Curabitur Street'),
(357, '210400379', 'Nicholas Qu', '0', '2003-10-04', '2', '603125', '4', 'Ap #266-5397 Lorem Av.'),
(358, '210400176', 'Kai Merkle', '1', '2003-03-04', '5', '603125', '1', '996 Mauris Ave'),
(359, '210400847', 'Björn Sauer', '0', '1999-11-19', '4', '603124', '6', '400-1226 Aenean Ave'),
(360, '210400957', 'Wilhelm Hahn', '0', '2002-01-08', '2', '603125', '5', 'Ap #678-1327 Etiam St.'),
(361, '210400278', 'Peisen Hua', '1', '2002-09-13', '4', '603125', '5', 'P.O. Box 992, 6827 Eget Ave'),
(362, '210400712', 'Nathaniel Mai', '0', '2001-01-21', '3', '603125', '3', 'Ap #861-1957 Sapien. Rd.'),
(363, '210400658', 'Franz Fuchs', '1', '2003-03-28', '5', '603125', '5', 'Ap #938-532 Ac, Avenue'),
(364, '210400305', 'Lee Hwang', '0', '2002-05-03', '3', '603125', '2', '6633 Elit, St.'),
(365, '210400958', 'Joseph Fok', '1', '2000-07-09', '4', '603124', '4', '2505 Sem Avenue'),
(366, '210400420', 'Edison Zhu', '0', '2000-01-13', '2', '603124', '3', 'P.O. Box 217, 7500 Dignissim St.'),
(367, '210400690', 'Jonas Karlmann', '1', '2000-03-31', '2', '603124', '3', 'Ap #646-5511 Blandit Street'),
(368, '210400741', 'Olaf Simon', '0', '2002-03-27', '2', '603125', '2', 'Ap #146-8136 Enim. Avenue'),
(369, '210400811', 'Lyon Pong', '0', '2001-02-06', '4', '603124', '5', '7764 Et Av.'),
(370, '210400650', 'Dustin Fiedler', '0', '2000-08-19', '3', '603124', '3', '548-159 Ligula Road'),
(371, '210401008', 'Ace Zhuang', '0', '2002-05-11', '4', '603125', '3', 'Ap #471-7149 Cum Road'),
(372, '210400692', 'Nish Gupta', '0', '2001-10-03', '3', '603124', '4', 'P.O. Box 906, 2796 Condimentum St.'),
(373, '210400626', 'Keefe Ho', '1', '2001-03-03', '1', '603125', '2', 'Ap #314-4454 Sed Road'),
(374, '210400356', 'Ace Jin', '1', '2002-03-01', '5', '603124', '6', 'Ap #598-3159 Sed Street'),
(375, '210400049', 'Ke Wei Law', '1', '2001-01-14', '4', '603125', '2', 'Ap #903-1118 Vulputate Avenue'),
(376, '210400326', 'Ace Goh', '1', '2000-06-26', '3', '603124', '5', 'Ap #264-6937 Vel Road'),
(377, '210400196', 'Berthold Pfeiffer', '0', '2001-06-15', '3', '603125', '4', 'Ap #464-4984 Est. Rd.'),
(378, '210400593', 'Daniel Song', '0', '2003-03-25', '2', '603125', '1', 'Ap #356-2065 Mattis Ave'),
(379, '210400976', 'Ernst Becker', '0', '2001-03-15', '3', '603124', '6', '906-9649 Eget, Avenue'),
(380, '210400536', 'Joshua Jin', '0', '2003-08-12', '4', '603125', '6', 'Ap #564-7906 Augue Rd.'),
(381, '210401048', 'Ryan Kong', '1', '2001-08-11', '2', '603125', '4', '440-9192 Semper Street'),
(382, '210400076', 'Reinhard Seidel', '0', '2001-12-07', '5', '603125', '4', '345-3602 Consequat Rd.'),
(383, '210401176', 'Keefe Leng', '0', '2002-11-05', '1', '603125', '4', 'P.O. Box 672, 4861 Posuere, Street'),
(384, '210401077', 'Christopher Tan', '1', '2002-03-23', '3', '603124', '1', 'P.O. Box 812, 8775 Lorem Street'),
(385, '210400944', 'Valentin Obermeyer', '0', '2001-09-27', '2', '603125', '2', '296-6504 Quam St.'),
(386, '210401113', 'Leonard Pohl', '1', '2002-11-09', '3', '603125', '3', '405-2950 Non Rd.'),
(387, '210400959', 'Anton Grün', '0', '2001-06-07', '1', '603125', '3', '664-1708 Etiam St.'),
(388, '210400074', 'Clemens Singh', '1', '2002-06-23', '4', '603125', '3', 'Ap #436-2115 Id, St.'),
(389, '210401178', 'Low Bi', '1', '2002-12-28', '2', '603125', '1', 'Ap #529-1307 Dolor. Rd.'),
(390, '210400303', 'Nathaniel Leow', '1', '2002-08-08', '4', '603125', '6', 'Ap #902-1492 Aliquam St.'),
(391, '210400069', 'Ken Choo', '1', '2003-02-22', '2', '603125', '1', 'Ap #763-6057 Auctor, Avenue'),
(392, '210401166', 'Johannes Schumann', '1', '2000-06-09', '4', '603125', '3', 'Ap #864-6116 In Rd.'),
(393, '210400592', 'Low Mai', '1', '2002-07-08', '3', '603125', '4', '4383 Commodo Rd.'),
(394, '210400068', 'Austin Qin', '1', '2003-11-02', '1', '603124', '3', '1091 Donec Road'),
(395, '210400156', 'Alex Yuan', '1', '2003-11-02', '5', '603124', '5', '824-2854 Risus. Street'),
(396, '210400454', 'Tyris Alsagoff', '1', '2003-04-13', '4', '603124', '1', '1687 Donec Avenue'),
(397, '210400011', 'Javier Sheng', '1', '2000-01-12', '5', '603125', '4', '929-8388 Ornare. Ave'),
(398, '210400018', 'Alexander Singer', '1', '2002-03-24', '3', '603124', '1', 'Ap #490-4363 Ante Road'),
(399, '210400441', 'Sean Shi', '0', '2003-09-09', '3', '603125', '4', '675-5939 Diam Ave'),
(400, '210400906', 'Gabriel Ngai', '0', '2003-09-25', '3', '603125', '4', 'P.O. Box 891, 8659 Morbi Road'),
(401, '210400422', 'Wendelin Frick', '1', '2000-07-02', '4', '603124', '5', 'P.O. Box 992, 196 Netus St.'),
(402, '210400984', 'Bruno Schubert', '0', '2000-01-20', '3', '603125', '1', '1503 Auctor Street'),
(403, '210400194', 'Tyris Lou', '1', '2002-06-15', '1', '603124', '6', '817-6551 Nonummy Ave'),
(404, '210400147', 'Drew Shen', '0', '2001-04-14', '2', '603125', '5', '694-377 Phasellus Avenue'),
(405, '210400495', 'Elroy Mun', '0', '2003-10-04', '4', '603124', '5', 'Ap #895-4063 Nunc. Rd.'),
(406, '210400451', 'Koh Zhu', '0', '2003-12-27', '2', '603125', '2', '897-4753 Ac Street'),
(407, '210400555', 'Richard Obermeyer', '0', '2002-09-16', '3', '603124', '5', 'Ap #790-4812 Vivamus Av.'),
(408, '210400336', 'Waldemar Wagner', '1', '2000-10-05', '2', '603125', '4', 'Ap #943-2034 Fringilla St.'),
(409, '210400835', 'Waldemar Seidel', '1', '2000-06-02', '5', '603124', '4', '9284 Mi Av.'),
(410, '210400446', 'Alv Yao', '1', '2003-03-19', '2', '603125', '3', 'Ap #324-6756 Iaculis Ave'),
(411, '210400512', 'Max Pfarrer', '0', '2001-02-08', '2', '603124', '2', '625-3380 Lacus. Av.'),
(412, '210400748', 'Gregor Jung', '0', '2000-04-18', '3', '603125', '4', 'Ap #706-7107 Laoreet Street'),
(413, '210400795', 'Joshua Seng', '0', '2003-04-02', '3', '603124', '2', 'Ap #596-7556 Tristique Av.'),
(414, '210401014', 'Tony Jia', '1', '2003-05-04', '4', '603124', '6', '209-1609 Tristique St.'),
(415, '210400898', 'Sepp Schmidt', '1', '2003-09-10', '5', '603125', '2', 'Ap #156-9557 Eu Street'),
(416, '210401120', 'Samuel Meier', '0', '2001-05-15', '2', '603124', '5', '699-346 Ac Street'),
(417, '210401160', 'Daniel Lye', '0', '2003-08-06', '2', '603124', '2', 'P.O. Box 162, 8145 Egestas. Ave'),
(418, '210400872', 'Chun Hwee Yap', '1', '2003-09-27', '4', '603124', '2', '754-7022 Donec Road'),
(419, '210400825', 'Lothar Martin', '1', '2002-05-26', '4', '603125', '6', 'Ap #713-5590 Fusce Ave'),
(420, '210400208', 'Nish Cheah', '0', '2001-08-11', '1', '603125', '3', '917-7255 A, Road');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ambilkuliah`
--
ALTER TABLE `ambilkuliah`
  ADD PRIMARY KEY (`id_ambilmk`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `mhs_web`
--
ALTER TABLE `mhs_web`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ambilkuliah`
--
ALTER TABLE `ambilkuliah`
  MODIFY `id_ambilmk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `mhs_web`
--
ALTER TABLE `mhs_web`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
