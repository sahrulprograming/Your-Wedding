-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2021 pada 09.34
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yourwedding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `ID_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`ID_admin`, `nama_lengkap`, `jenis_kelamin`, `username`, `email`, `password`, `foto`) VALUES
(1, 'sahrul saefulah', 'L', 'sahrul3001', 'sahrul@gmail.com', '$2y$10$kW4i6NvdY./oe3IhCFIGGeu.uxmQNOEpxpx3nEfSWKpiS5DREf1lS', 'default-L.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `IDBT` int(11) NOT NULL,
  `IDU` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `hubungan` varchar(35) NOT NULL,
  `kehadiran` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`IDBT`, `IDU`, `nama`, `hubungan`, `kehadiran`) VALUES
(1, 1, 'MUHAMMAD SAHRUL SAEFULAH', 'teman', 'hadir'),
(2, 16, 'sahrul saefulah', 'teman', 'hadir'),
(3, 17, 'MUHAMMAD SAHRUL SAEFULAH', 'sahabat', 'hadir'),
(4, 17, 'Bpk Muhammad Ridwan', 'tamu', 'hadir'),
(5, 17, 'ALDIAN VARONITTI', 'sahabat', 'hadir'),
(6, 17, 'Sahrul', 'sahabat', 'hadir'),
(7, 18, 'yesicha Audria', 'mantan', 'hadir'),
(8, 6, 'Sahrul saefulah', 'teman', 'hadir'),
(9, 11, 'MUHAMMAD SAHRUL SAEFULAH', 'tamu', 'hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `IDC` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `email` varchar(125) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`IDC`, `foto`, `email`, `nama_lengkap`, `jenis_kelamin`, `password`) VALUES
(22111001, 'default-P.png', 'demo@gmail.com', 'demo', 'P', '$2y$10$dVMsM.gdD9itL8cUb7nKw.IFAU4QLC6QPsntgFs2ZjPlvPnPJor0m'),
(22111002, 'default-L.png', 'naufal@gmail.com', 'naufal', 'L', '$2y$10$.YvYDUYOoCMmZIb4K/6WiuKXpad1sGqd2No0Xke7jCmMnoaxvRASK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_undangan`
--

CREATE TABLE `data_undangan` (
  `IDDU` int(11) NOT NULL,
  `IDC` int(11) DEFAULT NULL,
  `foto_Background` text NOT NULL,
  `kata_pengantar` text NOT NULL,
  `video` text NOT NULL,
  `alamat_kirim_kado` text NOT NULL,
  `embed_alamat_kirim_kado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_undangan`
--

INSERT INTO `data_undangan` (`IDDU`, `IDC`, `foto_Background`, `kata_pengantar`, `video`, `alamat_kirim_kado`, `embed_alamat_kirim_kado`) VALUES
(1, 22111001, 'background-default', 'Dengan memohon rahmat & ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/I dalam acara pernikahan dan resepsi putra-putri kami ', 'https://www.youtube.com/watch?v=eru_H6-7CSw', 'Jalan Mawar kelurahan bahagia kecamatan selamat kabupaten sentosa propinsi sejahtera', ''),
(51, 22111002, '', 'Dengan memohon rahmat & ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/I dalam acara pernikahan dan resepsi putra-putri kami ', 'https://youtu.be/iAfzVpmZZSY', 'https://g.page/HiltonBandung?share', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(58, 22111002, '', 'Dengan memohon rahmat & ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/I dalam acara pernikahan dan resepsi putra-putri kami ', 'https://youtu.be/iAfzVpmZZSY', 'hgfds', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(61, 22111002, '', 'Dengan memohon rahmat & ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/I dalam acara pernikahan dan resepsi putra-putri kami ', 'https://youtu.be/iAfzVpmZZSY', 'https://goo.gl/maps/s2wFg8cmvjBsWXtu9', 'src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.706201619785!2d106.61472625058643!3d-6.170080362161959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ff3a713e0d39%3A0xd19baf967dc2bf3d!2shotel!5e0!3m2!1sid!2sid!4v1638448651736!5m2!1sid!2sid\"'),
(62, 22111002, '', 'Dengan memohon rahmat & ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/I dalam acara pernikahan dan resepsi putra-putri kami ', 'https://youtu.be/iAfzVpmZZSY', 'JL JAWA / JLN SUMBAWA DALAM blok F3 no 16', 'src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.706201619785!2d106.61472625058643!3d-6.170080362161959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ff3a713e0d39%3A0xd19baf967dc2bf3d!2shotel!5e0!3m2!1sid!2sid!4v1638448651736!5m2!1sid!2sid\"'),
(63, 22111002, '', 'Dengan memohon rahmat & ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/I dalam acara pernikahan dan resepsi putra-putri kami ', 'https://youtu.be/iAfzVpmZZSY', 'aaaa', 'src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet_admin`
--

CREATE TABLE `dompet_admin` (
  `id_dompet` int(11) NOT NULL,
  `nama_dompet` varchar(35) NOT NULL,
  `nomer` varchar(25) NOT NULL,
  `atas_nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dompet_admin`
--

INSERT INTO `dompet_admin` (`id_dompet`, `nama_dompet`, `nomer`, `atas_nama`) VALUES
(1, 'dana', '245678927552', 'admin your wedding'),
(2, 'OVO', '421678982753', 'admin your wedding'),
(3, 'bank mandiri', '345267819', 'admin your wedding'),
(4, 'bank BCA', '123456789', 'admin your wedding'),
(7, 'Gopay', '09876544567', 'admin your wedding');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `IDG` int(11) NOT NULL,
  `foto` text NOT NULL,
  `IDDU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`IDG`, `foto`, `IDDU`) VALUES
(1, 'foto1.jpg', 1),
(2, 'foto2.jpg', 1),
(3, 'foto3.jpg', 1),
(4, 'foto4.jpg', 1),
(5, 'foto5.jpg', 1),
(39, '1636437391.jpg', 51),
(40, '16364373911.jpg', 51),
(41, '16364373912.jpg', 51),
(42, '16364373913.jpg', 51),
(43, '16364373914.jpg', 51),
(44, '16364373915.jpg', 51),
(113, '1638462924.jpg', 61),
(114, '16384629241.jpg', 61),
(115, '16384629242.jpg', 61),
(116, '16384629243.jpg', 61),
(117, '16384629244.jpg', 61),
(118, '1638462925.jpg', 61),
(119, '1638509998.jpg', 62),
(120, '16385099981.jpg', 62),
(121, '16385099982.jpg', 62),
(122, '16385099983.jpg', 62),
(123, '16385099984.jpg', 62),
(124, '16385099985.jpg', 62),
(125, '1638510176.jpg', 63),
(126, '16385101761.jpg', 63),
(127, '16385101762.jpg', 63),
(128, '16385101763.jpg', 63),
(129, '16385101764.jpg', 63),
(130, '16385101765.jpg', 63);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `IDAkses` int(11) NOT NULL,
  `role` varchar(45) NOT NULL,
  `controller_akses` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`IDAkses`, `role`, `controller_akses`) VALUES
(1, 'administrator', 'administrator'),
(2, 'customer', 'customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_publish`
--

CREATE TABLE `harga_publish` (
  `IDHP` int(11) NOT NULL,
  `judul_durasi` varchar(45) NOT NULL,
  `durasi_hari` int(11) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harga_publish`
--

INSERT INTO `harga_publish` (`IDHP`, `judul_durasi`, `durasi_hari`, `harga`, `keterangan`) VALUES
(1, '1 minggu', 7, 50000, 'publish berlaku 7 hari setelah habis maka tidak bisa di lihat orang lain'),
(2, '1 bulan', 30, 100000, 'Durasi Publish berlaku selama 30 hari jika melewati, undangan tidak akan bisa di lihat orang lain'),
(3, '6 bulan', 180, 350000, 'Durasi Publish berlaku selama 180 hari jika melewati, undangan tidak akan bisa di lihat orang lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_akad`
--

CREATE TABLE `j_akad` (
  `IDJA` int(11) NOT NULL,
  `IDDU` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` text NOT NULL,
  `lokasi_embed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `j_akad`
--

INSERT INTO `j_akad` (`IDJA`, `IDDU`, `tanggal`, `jam`, `lokasi`, `lokasi_embed`) VALUES
(1, 1, '2021-12-23', '10:00:00', 'Masjid Jami at-taqwa jalan mawar', ''),
(20, 51, '2021-12-01', '02:20:56', 'https://g.page/HiltonBandung?share', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(27, 58, '2021-12-07', '10:05:00', 'https://g.page/HiltonBandung?share', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(30, 61, '2021-12-24', '23:33:00', 'https://goo.gl/maps/s2wFg8cmvjBsWXtu9', 'src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.706201619785!2d106.61472625058643!3d-6.170080362161959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ff3a713e0d39%3A0xd19baf967dc2bf3d!2shotel!5e0!3m2!1sid!2sid!4v1638448651736!5m2!1sid!2sid\"'),
(31, 62, '2021-12-03', '12:38:00', 'https://g.page/HiltonBandung?share', 'src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\"'),
(32, 63, '2021-12-03', '12:42:00', 'fsghjak', 'src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_resepsi`
--

CREATE TABLE `j_resepsi` (
  `IDJR` int(11) NOT NULL,
  `IDDU` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` text NOT NULL,
  `lokasi_embed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `j_resepsi`
--

INSERT INTO `j_resepsi` (`IDJR`, `IDDU`, `tanggal`, `jam`, `lokasi`, `lokasi_embed`) VALUES
(1, 1, '2021-12-23', '14:00:00', 'Jalan Mawar No 16 kelurahan bahagia kecamatan selamat kabupaten sentosa propinsi sejahtera', '0'),
(11, 51, '2021-11-20', '13:00:00', 'https://g.page/HiltonBandung?share', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(18, 58, '2021-12-10', '10:30:00', 'https://g.page/HiltonBandung?share', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(21, 61, '2021-12-31', '10:34:00', 'https://goo.gl/maps/s2wFg8cmvjBsWXtu9', 'src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.706201619785!2d106.61472625058643!3d-6.170080362161959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ff3a713e0d39%3A0xd19baf967dc2bf3d!2shotel!5e0!3m2!1sid!2sid!4v1638448651736!5m2!1sid!2sid\"'),
(22, 62, '2021-12-29', '12:39:00', 'https://g.page/HiltonBandung?share', 'src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\"'),
(23, 63, '2021-12-03', '12:42:00', 'https://g.page/HiltonBandung?share', 'src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8116197652694!2d107.59558885037805!3d-6.913113769556222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66a9e40f8cd%3A0xf85c3bc286fb3a55!2sHilton%20Bandung!5e0!3m2!1sid!2sid!4v1636436726319!5m2!1sid!2sid\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `IDK` int(11) NOT NULL,
  `IDU` int(11) NOT NULL,
  `nama_pengirim` varchar(45) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_dikirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`IDK`, `IDU`, `nama_pengirim`, `pesan`, `tanggal_dikirim`) VALUES
(9, 2, 'sahrul saefulah', 'semoga sakinah mawaddah warohmah', '2021-11-09 03:34:20'),
(10, 9, 'sahrul', 'ggwp', '2021-11-09 12:26:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mempelai_pria`
--

CREATE TABLE `mempelai_pria` (
  `IDMP` int(11) NOT NULL,
  `IDDU` int(11) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `profile_singkat` text NOT NULL,
  `ortu` varchar(65) NOT NULL,
  `nama_panggilan` varchar(35) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mempelai_pria`
--

INSERT INTO `mempelai_pria` (`IDMP`, `IDDU`, `nama_lengkap`, `profile_singkat`, `ortu`, `nama_panggilan`, `foto`) VALUES
(1, 1, 'john samuel', 'merupakan lulusan sarjana Universitas Bina Sarana Informatika, Sekarang Bekerja Sebagai Direktur Pertamina Cabang Jawa Barat', 'bpk tono & ibu arsih', 'john', 'default-L.png'),
(16, 51, 'Mochamad Naufal', '', 'bpk susanto & ibu yulia', 'Naufal', '1636437391.jpeg'),
(23, 58, 'dfghjk', '', 'bpk fghjkl & ibu ghjk', 'aa', '1638276742.png'),
(26, 61, 'Tono sutisna', '', 'bpk adfghj & ibu fghjk', 'Tono', '1638462924.jpeg'),
(27, 62, 'sgahjk', '', 'bpk ghjkl; & ibu vbjkl;', 'fghjkl', '1638509998.jpeg'),
(28, 63, 'sdfghjkl', '', 'bpk xchjkl; & ibu ghjkl', 'fghjkl;', '1638510176.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mempelai_wanita`
--

CREATE TABLE `mempelai_wanita` (
  `IDMW` int(11) NOT NULL,
  `IDDU` int(11) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `profile_singkat` text NOT NULL,
  `ortu` varchar(65) NOT NULL,
  `nama_panggilan` varchar(25) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mempelai_wanita`
--

INSERT INTO `mempelai_wanita` (`IDMW`, `IDDU`, `nama_lengkap`, `profile_singkat`, `ortu`, `nama_panggilan`, `foto`) VALUES
(1, 1, 'merlin nasetion', 'merupakan lulusan sarjana Universitas Bina Sarana Informatika, Sekarang Bekerja Sebagai Asisten Direktur Pertamina Cabang Jawa Barat', 'bpk jojo & ibu minah', 'merlin', 'default-P.png'),
(12, 51, 'Rosmawati', '', 'bpk Isacc & ibu Elizabeth', 'Rosma', '16364373911.jpeg'),
(19, 58, 'fghjkl;', '', 'bpk cghjk & ibu cfghjkl', 'cvghjkl', '16382767421.png'),
(22, 61, 'mursinah', '', 'bpk fghjk & ibu ghjk', 'mursinah', '16384629241.jpeg'),
(23, 62, 'dfghjkl;', '', 'bpk ghjkl & ibu fghjkl;', 'ghjkl;', '1638509998.png'),
(24, 63, 'dfghjkl;', '', 'bpk chjkl; & ibu cfghjkl;', 'cj./', '16385101761.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_pembayaran` int(11) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `bukti_bayar` text NOT NULL,
  `total_bayar` double NOT NULL,
  `status_lunas` varchar(25) NOT NULL,
  `invoice` varchar(30) NOT NULL,
  `id_dompet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no_pembayaran`, `tanggal_upload`, `bukti_bayar`, `total_bayar`, `status_lunas`, `invoice`, `id_dompet`) VALUES
(8, '2021-11-30', '1638259359.png', 350000, 'lunas', 'INV/20211130/1638255201', 2),
(9, '2021-11-30', '1638270583.png', 50000, 'lunas', 'INV/20211130/1638270583', 2),
(10, '2021-11-29', '1638277134.jpg', 100000, 'lunas', 'INV/20211130/1638277134', 3),
(11, '2021-11-30', '1638277155.jpg', 100000, 'lunas', 'INV/20211130/1638277155', 4),
(12, '2021-12-02', '1638463089.png', 350000, 'lunas', 'INV/20211202/1638463062', 2),
(13, '2021-12-03', '1638510068.png', 50000, 'menunggu', 'INV/20211203/1638510068', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `publishing`
--

CREATE TABLE `publishing` (
  `invoice` varchar(30) NOT NULL,
  `IDHP` int(11) NOT NULL,
  `IDU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `publishing`
--

INSERT INTO `publishing` (`invoice`, `IDHP`, `IDU`) VALUES
('INV/20211202/1638463062', 1, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `template`
--

CREATE TABLE `template` (
  `ID_Template` int(11) NOT NULL,
  `nama_template` varchar(35) NOT NULL,
  `tema` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `template`
--

INSERT INTO `template` (`ID_Template`, `nama_template`, `tema`) VALUES
(1, 'template-1', 'bg-1.png'),
(2, 'template-2', 'bg-2.png'),
(3, 'template-3', 'bg-3.png'),
(4, 'template-4', 'bg-4.png'),
(5, 'template-5', 'bg-5.png'),
(6, 'template-6', 'bg-6.png'),
(7, 'template-7', 'bg-7.png'),
(8, 'template-8', 'bg-8.png'),
(9, 'template-9', 'bg-9.png'),
(10, 'template-10', 'bg-10.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan`
--

CREATE TABLE `undangan` (
  `IDU` int(11) NOT NULL,
  `url` varchar(25) NOT NULL,
  `IDDU` int(11) NOT NULL,
  `IDC` int(11) DEFAULT NULL,
  `ID_Template` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `mulai_publish` date DEFAULT NULL,
  `selesai_publish` date DEFAULT NULL,
  `dilihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `undangan`
--

INSERT INTO `undangan` (`IDU`, `url`, `IDDU`, `IDC`, `ID_Template`, `status`, `mulai_publish`, `selesai_publish`, `dilihat`) VALUES
(1, 'john_merlin', 1, 22111001, 1, 'publish', NULL, NULL, 2),
(2, 'john_merlin', 1, 22111001, 2, 'publish', NULL, NULL, 0),
(3, 'john_merlin', 1, 22111001, 3, 'publish', NULL, NULL, 0),
(4, 'john_merlin', 1, 22111001, 4, 'publish', NULL, NULL, 0),
(5, 'john_merlin', 1, 22111001, 5, 'publish', NULL, NULL, 0),
(6, 'john_merlin', 1, 22111001, 6, 'publish', NULL, NULL, 0),
(7, 'john_merlin', 1, 22111001, 7, 'publish', NULL, NULL, 0),
(8, 'jon_merlin', 1, 22111001, 8, 'publish', NULL, NULL, 0),
(9, 'john_merlin', 1, 22111001, 9, 'publish', NULL, NULL, 0),
(10, 'john_merlin', 1, 22111001, 10, 'publish', NULL, NULL, 0),
(11, 'Tono_mursinah', 61, 22111002, 2, 'publish', '2021-12-02', '2021-12-09', 36),
(20211134, 'fghjkl;_cj./', 63, 22111002, 1, '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `virtual_account`
--

CREATE TABLE `virtual_account` (
  `IDVA` int(11) NOT NULL,
  `IDDU` int(11) NOT NULL,
  `nomer_VA` varchar(35) NOT NULL,
  `nama_VA` varchar(35) NOT NULL,
  `A/N` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `virtual_account`
--

INSERT INTO `virtual_account` (`IDVA`, `IDDU`, `nomer_VA`, `nama_VA`, `A/N`) VALUES
(1, 1, '0123456789', 'dana', 'demo'),
(2, 1, '098753677182', 'OVO', 'demo'),
(3, 1, '32456789266', 'bank mandiri', 'demo'),
(4, 1, '123456789', 'bank BCA', 'demo'),
(11, 51, '86672892', 'BCA', 'Naufal Setiawan'),
(26, 58, '45678', 'aaaa', 'sdfghjk'),
(30, 61, '0824567336728', 'OVO', 'Mursinah'),
(31, 61, '323456788', 'BCA', 'Tono'),
(32, 61, '118246743020', 'Mandiri', 'Tono'),
(34, 62, '02345678', 'BCA', 'aaaa'),
(35, 63, '0345678', 'Dana', 'dfhjkl');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_komentar_hari_ini`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_komentar_hari_ini` (
`IDK` int(11)
,`IDU` int(11)
,`IDC` int(11)
,`nama_pengirim` varchar(45)
,`pesan` text
,`tanggal_dikirim` datetime
,`url` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_komentar_minggu_ini`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_komentar_minggu_ini` (
`IDK` int(11)
,`IDU` int(11)
,`IDC` int(11)
,`nama_pengirim` varchar(45)
,`pesan` text
,`tanggal_dikirim` datetime
,`url` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_semua_komentar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_semua_komentar` (
`IDU` int(11)
,`IDC` int(11)
,`nama_pengirim` varchar(45)
,`pesan` text
,`tanggal_dikirim` datetime
,`url` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_total_tamu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_total_tamu` (
`nama` varchar(45)
,`IDC` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_transaksi` (
`no_pembayaran` int(11)
,`invoice` varchar(30)
,`IDHP` int(11)
,`IDU` int(11)
,`url` varchar(25)
,`IDC` int(11)
,`status_lunas` varchar(25)
,`bukti_bayar` text
,`tanggal_upload` date
,`id_dompet` int(11)
,`total_bayar` double
,`judul_durasi` varchar(45)
,`durasi_hari` int(11)
,`nama_dompet` varchar(35)
,`atas nama` varchar(45)
,`nomer` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_undangan_saya`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_undangan_saya` (
`IDU` int(11)
,`url` varchar(25)
,`IDDU` int(11)
,`IDC` int(11)
,`ID_Template` int(11)
,`status` varchar(35)
,`nama_template` varchar(35)
,`tema` varchar(45)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_komentar_hari_ini`
--
DROP TABLE IF EXISTS `v_komentar_hari_ini`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_komentar_hari_ini`  AS SELECT `k`.`IDK` AS `IDK`, `k`.`IDU` AS `IDU`, `u`.`IDC` AS `IDC`, `k`.`nama_pengirim` AS `nama_pengirim`, `k`.`pesan` AS `pesan`, `k`.`tanggal_dikirim` AS `tanggal_dikirim`, `u`.`url` AS `url` FROM (`komentar` `k` join `undangan` `u` on(`k`.`IDU` = `u`.`IDU`)) WHERE date_format(`k`.`tanggal_dikirim`,'%Y-%m-%d') = curdate() ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_komentar_minggu_ini`
--
DROP TABLE IF EXISTS `v_komentar_minggu_ini`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_komentar_minggu_ini`  AS SELECT `k`.`IDK` AS `IDK`, `k`.`IDU` AS `IDU`, `u`.`IDC` AS `IDC`, `k`.`nama_pengirim` AS `nama_pengirim`, `k`.`pesan` AS `pesan`, `k`.`tanggal_dikirim` AS `tanggal_dikirim`, `u`.`url` AS `url` FROM (`komentar` `k` join `undangan` `u` on(`k`.`IDU` = `u`.`IDU`)) WHERE `k`.`tanggal_dikirim` between current_timestamp() + interval -7 day and current_timestamp() + interval -1 day ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_semua_komentar`
--
DROP TABLE IF EXISTS `v_semua_komentar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_semua_komentar`  AS SELECT `k`.`IDU` AS `IDU`, `u`.`IDC` AS `IDC`, `k`.`nama_pengirim` AS `nama_pengirim`, `k`.`pesan` AS `pesan`, `k`.`tanggal_dikirim` AS `tanggal_dikirim`, `u`.`url` AS `url` FROM (`komentar` `k` join `undangan` `u` on(`k`.`IDU` = `u`.`IDU`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_total_tamu`
--
DROP TABLE IF EXISTS `v_total_tamu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_tamu`  AS SELECT `bt`.`nama` AS `nama`, `u`.`IDC` AS `IDC` FROM (`buku_tamu` `bt` join `undangan` `u` on(`bt`.`IDU` = `u`.`IDU`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS SELECT `pm`.`no_pembayaran` AS `no_pembayaran`, `p`.`invoice` AS `invoice`, `p`.`IDHP` AS `IDHP`, `p`.`IDU` AS `IDU`, `u`.`url` AS `url`, `u`.`IDC` AS `IDC`, `pm`.`status_lunas` AS `status_lunas`, `pm`.`bukti_bayar` AS `bukti_bayar`, `pm`.`tanggal_upload` AS `tanggal_upload`, `pm`.`id_dompet` AS `id_dompet`, `pm`.`total_bayar` AS `total_bayar`, `hp`.`judul_durasi` AS `judul_durasi`, `hp`.`durasi_hari` AS `durasi_hari`, `da`.`nama_dompet` AS `nama_dompet`, `da`.`atas_nama` AS `atas nama`, `da`.`nomer` AS `nomer` FROM ((((`publishing` `p` join `harga_publish` `hp` on(`p`.`IDHP` = `hp`.`IDHP`)) join `undangan` `u` on(`p`.`IDU` = `u`.`IDU`)) join `pembayaran` `pm` on(`p`.`invoice` = `pm`.`invoice`)) join `dompet_admin` `da` on(`pm`.`id_dompet` = `da`.`id_dompet`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_undangan_saya`
--
DROP TABLE IF EXISTS `v_undangan_saya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_undangan_saya`  AS SELECT `u`.`IDU` AS `IDU`, `u`.`url` AS `url`, `u`.`IDDU` AS `IDDU`, `u`.`IDC` AS `IDC`, `u`.`ID_Template` AS `ID_Template`, `u`.`status` AS `status`, `t`.`nama_template` AS `nama_template`, `t`.`tema` AS `tema` FROM (`undangan` `u` join `template` `t` on(`u`.`ID_Template` = `t`.`ID_Template`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indeks untuk tabel `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`IDBT`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`IDC`);

--
-- Indeks untuk tabel `data_undangan`
--
ALTER TABLE `data_undangan`
  ADD PRIMARY KEY (`IDDU`),
  ADD KEY `data_undangan_ibfk_1` (`IDC`);

--
-- Indeks untuk tabel `dompet_admin`
--
ALTER TABLE `dompet_admin`
  ADD PRIMARY KEY (`id_dompet`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`IDG`),
  ADD KEY `galery_ibfk_1` (`IDDU`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`IDAkses`);

--
-- Indeks untuk tabel `harga_publish`
--
ALTER TABLE `harga_publish`
  ADD PRIMARY KEY (`IDHP`);

--
-- Indeks untuk tabel `j_akad`
--
ALTER TABLE `j_akad`
  ADD PRIMARY KEY (`IDJA`),
  ADD KEY `j_akad_ibfk_1` (`IDDU`);

--
-- Indeks untuk tabel `j_resepsi`
--
ALTER TABLE `j_resepsi`
  ADD PRIMARY KEY (`IDJR`),
  ADD KEY `j_resepsi_ibfk_1` (`IDDU`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`IDK`),
  ADD KEY `komentar_ibfk_1` (`IDU`);

--
-- Indeks untuk tabel `mempelai_pria`
--
ALTER TABLE `mempelai_pria`
  ADD PRIMARY KEY (`IDMP`),
  ADD KEY `mempelai_pria_ibfk_1` (`IDDU`);

--
-- Indeks untuk tabel `mempelai_wanita`
--
ALTER TABLE `mempelai_wanita`
  ADD PRIMARY KEY (`IDMW`),
  ADD KEY `mempelai_wanita_ibfk_1` (`IDDU`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`);

--
-- Indeks untuk tabel `publishing`
--
ALTER TABLE `publishing`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `publishing_ibfk_1` (`IDHP`),
  ADD KEY `publishing_ibfk_2` (`IDU`);

--
-- Indeks untuk tabel `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`ID_Template`);

--
-- Indeks untuk tabel `undangan`
--
ALTER TABLE `undangan`
  ADD PRIMARY KEY (`IDU`),
  ADD KEY `IDC` (`IDC`),
  ADD KEY `ID_Template` (`ID_Template`),
  ADD KEY `undangan_ibfk_1` (`IDDU`);

--
-- Indeks untuk tabel `virtual_account`
--
ALTER TABLE `virtual_account`
  ADD PRIMARY KEY (`IDVA`),
  ADD KEY `virtual_account_ibfk_1` (`IDDU`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `IDBT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_undangan`
--
ALTER TABLE `data_undangan`
  MODIFY `IDDU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `dompet_admin`
--
ALTER TABLE `dompet_admin`
  MODIFY `id_dompet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `IDG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `IDAkses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `harga_publish`
--
ALTER TABLE `harga_publish`
  MODIFY `IDHP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `j_akad`
--
ALTER TABLE `j_akad`
  MODIFY `IDJA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `j_resepsi`
--
ALTER TABLE `j_resepsi`
  MODIFY `IDJR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `IDK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mempelai_pria`
--
ALTER TABLE `mempelai_pria`
  MODIFY `IDMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `mempelai_wanita`
--
ALTER TABLE `mempelai_wanita`
  MODIFY `IDMW` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `template`
--
ALTER TABLE `template`
  MODIFY `ID_Template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `undangan`
--
ALTER TABLE `undangan`
  MODIFY `IDU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20211135;

--
-- AUTO_INCREMENT untuk tabel `virtual_account`
--
ALTER TABLE `virtual_account`
  MODIFY `IDVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_undangan`
--
ALTER TABLE `data_undangan`
  ADD CONSTRAINT `data_undangan_ibfk_1` FOREIGN KEY (`IDC`) REFERENCES `customer` (`IDC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `j_akad`
--
ALTER TABLE `j_akad`
  ADD CONSTRAINT `j_akad_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `j_resepsi`
--
ALTER TABLE `j_resepsi`
  ADD CONSTRAINT `j_resepsi_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`IDU`) REFERENCES `undangan` (`IDU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mempelai_pria`
--
ALTER TABLE `mempelai_pria`
  ADD CONSTRAINT `mempelai_pria_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mempelai_wanita`
--
ALTER TABLE `mempelai_wanita`
  ADD CONSTRAINT `mempelai_wanita_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `publishing`
--
ALTER TABLE `publishing`
  ADD CONSTRAINT `publishing_ibfk_1` FOREIGN KEY (`IDHP`) REFERENCES `harga_publish` (`IDHP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publishing_ibfk_2` FOREIGN KEY (`IDU`) REFERENCES `undangan` (`IDU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `undangan`
--
ALTER TABLE `undangan`
  ADD CONSTRAINT `undangan_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `undangan_ibfk_2` FOREIGN KEY (`IDC`) REFERENCES `customer` (`IDC`),
  ADD CONSTRAINT `undangan_ibfk_3` FOREIGN KEY (`ID_Template`) REFERENCES `template` (`ID_Template`);

--
-- Ketidakleluasaan untuk tabel `virtual_account`
--
ALTER TABLE `virtual_account`
  ADD CONSTRAINT `virtual_account_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
