-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2021 pada 06.03
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
  `IDDU` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `hubungan` varchar(35) NOT NULL,
  `kehadiran` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`IDBT`, `IDDU`, `nama`, `hubungan`, `kehadiran`) VALUES
(1, 1, 'MUHAMMAD SAHRUL SAEFULAH', 'teman', 'hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `IDC` int(11) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `email` varchar(125) NOT NULL,
  `foto` text DEFAULT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`IDC`, `nama_lengkap`, `jenis_kelamin`, `email`, `foto`, `password`) VALUES
(22111001, 'demo', 'P', 'demo@gmail.com', 'default-P.png', '$2y$10$dVMsM.gdD9itL8cUb7nKw.IFAU4QLC6QPsntgFs2ZjPlvPnPJor0m'),
(22111002, 'naufal', 'L', 'naufal@gmail.com', 'default-L.png', '$2y$10$.YvYDUYOoCMmZIb4K/6WiuKXpad1sGqd2No0Xke7jCmMnoaxvRASK');

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
  `alamat_kirim_kado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_undangan`
--

INSERT INTO `data_undangan` (`IDDU`, `IDC`, `foto_Background`, `kata_pengantar`, `video`, `alamat_kirim_kado`) VALUES
(1, 22111001, 'background-default', 'Dengan memohon rahmat & ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/I dalam acara pernikahan dan resepsi putra-putri kami ', 'video-defaut', 'Jalan Mawar kelurahan bahagia kecamatan selamat kabupaten sentosa propinsi sejahtera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet_admin`
--

CREATE TABLE `dompet_admin` (
  `id_dompet` int(11) NOT NULL,
  `nama_dompet` varchar(35) NOT NULL,
  `nomer` varchar(25) NOT NULL,
  `A/N` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dompet_admin`
--

INSERT INTO `dompet_admin` (`id_dompet`, `nama_dompet`, `nomer`, `A/N`) VALUES
(1, 'dana', '245678927552', 'admin your wedding'),
(2, 'OVO', '421678982753', 'admin your wedding'),
(3, 'bank mandiri', '345267819', 'admin your wedding'),
(4, 'bank BCA', '123456789', 'admin your wedding');

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
(5, 'foto5.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_publish`
--

CREATE TABLE `harga_publish` (
  `IDHP` int(11) NOT NULL,
  `durasi_hari` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `judul_durasi` varchar(45) NOT NULL,
  `Harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_akad`
--

CREATE TABLE `j_akad` (
  `IDJA` int(11) NOT NULL,
  `IDDU` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `j_akad`
--

INSERT INTO `j_akad` (`IDJA`, `IDDU`, `tanggal`, `jam`, `lokasi`) VALUES
(1, 1, '2021-12-23', '10:00:00', 'Masjid Jami at-taqwa jalan mawar'),
(7, 1, '2021-05-11', '00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_resepsi`
--

CREATE TABLE `j_resepsi` (
  `IDJR` int(11) NOT NULL,
  `IDDU` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `j_resepsi`
--

INSERT INTO `j_resepsi` (`IDJR`, `IDDU`, `tanggal`, `jam`, `lokasi`) VALUES
(1, 1, '2021-12-23', '14:00:00', 'Jalan Mawar No 16 kelurahan bahagia kecamatan selamat kabupaten sentosa propinsi sejahtera');

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
(6, 1, 'sahrul saefulah', 'halo', '2021-11-06 08:55:01'),
(7, 1, 'naufal', 'juga', '2021-11-06 08:55:20');

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
(1, 1, 'john samuel', 'merupakan lulusan sarjana Universitas Bina Sarana Informatika, Sekarang Bekerja Sebagai Direktur Pertamina Cabang Jawa Barat', 'bpk tono & ibu arsih', 'john', 'default-L.png');

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
(1, 1, 'merlin nasetion', 'merupakan lulusan sarjana Universitas Bina Sarana Informatika, Sekarang Bekerja Sebagai Asisten Direktur Pertamina Cabang Jawa Barat', 'bpk jojo & ibu minah', 'merlin', 'default-P.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `IDRole` int(11) NOT NULL,
  `no urut` int(3) NOT NULL,
  `nama_menu` varchar(45) NOT NULL,
  `url` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`ID`, `IDRole`, `no urut`, `nama_menu`, `url`, `icon`, `is_active`) VALUES
(1, 1, 1, 'Dashboard', '', '', 1),
(2, 1, 2, 'Customer', '', '', 1),
(3, 1, 3, 'pesanan', '', '', 1),
(4, 1, 4, 'publish', '', '', 1),
(5, 1, 5, 'Harga Publish', '', '', 1),
(6, 2, 1, 'Dashboard', 'customer/home/dashboard', 'fas fa-home', 1),
(7, 2, 2, 'Tambah Undangan', 'customer/undangan/tambah', 'fal fa-folder-open', 1);

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
  `invoice` int(11) NOT NULL,
  `id_dompet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `publishing`
--

CREATE TABLE `publishing` (
  `invoice` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `mulai_publish` date NOT NULL,
  `selesai_publish` date NOT NULL,
  `IDHP` int(11) NOT NULL,
  `IDU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `IDRole` int(11) NOT NULL,
  `role` varchar(45) NOT NULL,
  `controller_akses` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`IDRole`, `role`, `controller_akses`) VALUES
(1, 'administrator', ''),
(2, 'customer', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_menu`
--

CREATE TABLE `sub_menu` (
  `ID` int(11) NOT NULL,
  `IDMenu` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nama_sub_menu` varchar(45) NOT NULL,
  `url` text NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_menu`
--

INSERT INTO `sub_menu` (`ID`, `IDMenu`, `no_urut`, `nama_sub_menu`, `url`, `is_active`) VALUES
(1, 3, 1, 'Menunggu Pembayaran', '', 1),
(2, 3, 2, 'Konfirmasi', '', 1),
(3, 3, 3, 'Selesai', '', 1),
(4, 4, 1, 'Berjalan', '', 1),
(5, 4, 2, 'Durasi Habis', '', 1);

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
(10, 'template-10', 'bg-10.png'),
(11, 'default', 'default');

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
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `undangan`
--

INSERT INTO `undangan` (`IDU`, `url`, `IDDU`, `IDC`, `ID_Template`, `status`) VALUES
(1, 'john_merlin', 1, 22111001, 1, 'publish'),
(2, 'john_merlin', 1, 22111001, 2, 'publish'),
(3, 'john_merlin', 1, 22111001, 3, 'publish'),
(4, 'john_merlin', 1, 22111001, 4, 'publish'),
(5, 'john_merlin', 1, 22111001, 5, 'publish'),
(6, 'john_merlin', 1, 22111001, 6, 'publish'),
(7, 'john_merlin', 1, 22111001, 7, 'publish'),
(8, 'jon_merlin', 1, 22111001, 8, 'publish'),
(9, 'john_merlin', 1, 22111001, 9, 'publish'),
(10, 'john_merlin', 1, 22111001, 10, 'publish'),
(11, 'john_merlin', 1, 22111001, 11, 'publish');

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
(4, 1, '123456789', 'bank BCA', 'demo');

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
  ADD KEY `IDDU` (`IDDU`);

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
  ADD KEY `IDDU` (`IDDU`);

--
-- Indeks untuk tabel `j_resepsi`
--
ALTER TABLE `j_resepsi`
  ADD PRIMARY KEY (`IDJR`),
  ADD KEY `IDDU` (`IDDU`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`IDK`),
  ADD KEY `IDU` (`IDU`);

--
-- Indeks untuk tabel `mempelai_pria`
--
ALTER TABLE `mempelai_pria`
  ADD PRIMARY KEY (`IDMP`),
  ADD KEY `IDDU` (`IDDU`);

--
-- Indeks untuk tabel `mempelai_wanita`
--
ALTER TABLE `mempelai_wanita`
  ADD PRIMARY KEY (`IDMW`),
  ADD KEY `IDDU` (`IDDU`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_menu_role` (`IDRole`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`),
  ADD KEY `invoice` (`invoice`),
  ADD KEY `id_dompet` (`id_dompet`);

--
-- Indeks untuk tabel `publishing`
--
ALTER TABLE `publishing`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `IDHP` (`IDHP`),
  ADD KEY `IDU` (`IDU`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDRole`);

--
-- Indeks untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_sub_menu_menu` (`IDMenu`);

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
  ADD KEY `IDDU` (`IDDU`),
  ADD KEY `IDC` (`IDC`),
  ADD KEY `ID_Template` (`ID_Template`);

--
-- Indeks untuk tabel `virtual_account`
--
ALTER TABLE `virtual_account`
  ADD PRIMARY KEY (`IDVA`),
  ADD KEY `IDDU` (`IDDU`);

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
  MODIFY `IDBT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_undangan`
--
ALTER TABLE `data_undangan`
  MODIFY `IDDU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dompet_admin`
--
ALTER TABLE `dompet_admin`
  MODIFY `id_dompet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `IDG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `j_akad`
--
ALTER TABLE `j_akad`
  MODIFY `IDJA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `j_resepsi`
--
ALTER TABLE `j_resepsi`
  MODIFY `IDJR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `IDK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mempelai_pria`
--
ALTER TABLE `mempelai_pria`
  MODIFY `IDMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mempelai_wanita`
--
ALTER TABLE `mempelai_wanita`
  MODIFY `IDMW` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `IDRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `template`
--
ALTER TABLE `template`
  MODIFY `ID_Template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `undangan`
--
ALTER TABLE `undangan`
  MODIFY `IDU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `virtual_account`
--
ALTER TABLE `virtual_account`
  MODIFY `IDVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`);

--
-- Ketidakleluasaan untuk tabel `j_akad`
--
ALTER TABLE `j_akad`
  ADD CONSTRAINT `j_akad_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`);

--
-- Ketidakleluasaan untuk tabel `j_resepsi`
--
ALTER TABLE `j_resepsi`
  ADD CONSTRAINT `j_resepsi_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`IDU`) REFERENCES `undangan` (`IDU`);

--
-- Ketidakleluasaan untuk tabel `mempelai_pria`
--
ALTER TABLE `mempelai_pria`
  ADD CONSTRAINT `mempelai_pria_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`);

--
-- Ketidakleluasaan untuk tabel `mempelai_wanita`
--
ALTER TABLE `mempelai_wanita`
  ADD CONSTRAINT `mempelai_wanita_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_menu_role` FOREIGN KEY (`IDRole`) REFERENCES `role` (`IDRole`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`invoice`) REFERENCES `publishing` (`invoice`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_dompet`) REFERENCES `dompet_admin` (`id_dompet`);

--
-- Ketidakleluasaan untuk tabel `publishing`
--
ALTER TABLE `publishing`
  ADD CONSTRAINT `publishing_ibfk_1` FOREIGN KEY (`IDHP`) REFERENCES `harga_publish` (`IDHP`),
  ADD CONSTRAINT `publishing_ibfk_2` FOREIGN KEY (`IDU`) REFERENCES `undangan` (`IDU`);

--
-- Ketidakleluasaan untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `FK_sub_menu_menu` FOREIGN KEY (`IDMenu`) REFERENCES `menu` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `undangan`
--
ALTER TABLE `undangan`
  ADD CONSTRAINT `undangan_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`),
  ADD CONSTRAINT `undangan_ibfk_2` FOREIGN KEY (`IDC`) REFERENCES `customer` (`IDC`),
  ADD CONSTRAINT `undangan_ibfk_3` FOREIGN KEY (`ID_Template`) REFERENCES `template` (`ID_Template`);

--
-- Ketidakleluasaan untuk tabel `virtual_account`
--
ALTER TABLE `virtual_account`
  ADD CONSTRAINT `virtual_account_ibfk_1` FOREIGN KEY (`IDDU`) REFERENCES `data_undangan` (`IDDU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
