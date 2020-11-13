-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 06:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` text,
  `password` text,
  `nama` text,
  `nip` text,
  `rank` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `nama`, `nip`, `rank`) VALUES
(1, 'semydelavega', '198721fbb2ffc5c5179f3e90a9857515', 'Semy Luase', '-', 'Super Admin'),
(2, 'kepaladaerah', 'bf4c00efda5d3f5c166115d3480fd87f', 'Sarah M. Peni', '-', 'Admin Bupati'),
(3, 'wakilkepaladaerah', 'cecbeb84162c8ff892f4c6e137008848', 'Isra Karma', '-', 'Admin Wabup'),
(4, 'sekda', '143853039dad575c9fe430499b8bf2a4', 'Sinta F. Bain', '-', 'Admin Sekda'),
(5, 'asistensatu', '9a911a0dbf3dc1ec91a8b4e57be28ca4', 'Boy M. Weni', '-', 'Admin Ass 1'),
(6, 'asistendua', 'de8bcf75642eaaff6e5b6ee233f89642', 'Maria M. Lanbai', '-', 'Admin Ass 2'),
(7, 'asistentiga', '5ce2feb8350e5bd958bbf20e7b1d62f0', 'Samuel Huluang', '-', 'Admin Ass 3'),
(8, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Hermon E. Atakai', '-', 'Asisten Super Admin'),
(9, 'admin', '0192023a7bbd73250516f069df18b500', 'Elnike P. Mau', '-', 'Admin'),
(10, 'superadmin123', 'ac497cfaba23c4184cb03b97e8c51e0a', 'Iliyas Sutio', '-', 'Asisten Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tr_instansi`
--

CREATE TABLE `tr_instansi` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `kepala` text NOT NULL,
  `nip_kepala` text NOT NULL,
  `logo` text NOT NULL,
  `notlpn` text NOT NULL,
  `kab` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_instansi`
--

INSERT INTO `tr_instansi` (`id`, `nama`, `alamat`, `kepala`, `nip_kepala`, `logo`, `notlpn`, `kab`) VALUES
(1, 'Pemerintah Kabupaten Alor', 'Jln. SOEKARNO - HATTA No. -', 'Drs. AMON DJOBO', '-', 'logo1.png', '(0386) 21121', 'BATUNIRWALA - KALABAHI');

-- --------------------------------------------------------

--
-- Table structure for table `t_agenda`
--

CREATE TABLE `t_agenda` (
  `tahun` year(4) NOT NULL,
  `no_agenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_agenda`
--

INSERT INTO `t_agenda` (`tahun`, `no_agenda`) VALUES
(2017, 6),
(2018, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_gambar`
--

CREATE TABLE `t_gambar` (
  `id_gambar` int(11) NOT NULL,
  `no_agenda` int(11) DEFAULT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gambar`
--

INSERT INTO `t_gambar` (`id_gambar`, `no_agenda`, `file`) VALUES
(17, 3, 'logogaruda.png'),
(18, 4, 'logogaruda.png'),
(19, 5, 'logo_bw.png'),
(20, 6, 'logogaruda.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_struktur`
--

CREATE TABLE `t_struktur` (
  `id` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_struktur`
--

INSERT INTO `t_struktur` (`id`, `nip`, `nama`, `jabatan`) VALUES
(1, '-', 'Drs. Amon Djobo', 'BUPATI ALOR'),
(2, '-', 'Imran Duru, M.Pd.', 'WAKIL BUPATI ALOR'),
(3, '19600228 199007 1 001', 'Hopni Bukang, S.H.', 'Sekretaris Daerah'),
(4, '19611214 198203 1 018', 'Drs. Ahmad Maro', 'Asisten Pemerintah dan Kesra'),
(5, '19641220 199403 1 005', 'Drs. Dominggus Asadama', 'ASISTEN PEREKONOMIAN DAN PEMBANGUNAN'),
(6, '19600914 198503 2 007', 'Ir. Dorsila Pulinggomang', 'ASISTEN ADMINISTRASI UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `t_surat`
--

CREATE TABLE `t_surat` (
  `id` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL DEFAULT '0',
  `no_surat` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_teruskan` date DEFAULT NULL,
  `tujuan` text NOT NULL,
  `asal_surat` text NOT NULL,
  `perihal` text NOT NULL,
  `isi_ringkas` text NOT NULL,
  `tahun` text NOT NULL,
  `status` text NOT NULL,
  `status_dis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_surat`
--

INSERT INTO `t_surat` (`id`, `no_agenda`, `no_surat`, `tgl_surat`, `tgl_terima`, `tgl_teruskan`, `tujuan`, `asal_surat`, `perihal`, `isi_ringkas`, `tahun`, `status`, `status_dis`) VALUES
(13, 1, 'Pem.130/513/13/2017', '2017-10-19', '2017-10-20', '2017-10-20', 'BUPATI ALOR', 'Gubernur NTT', 'Pengiriman Instrumen Penilaian Camat Berprestasi tkt. Kab. Alor Tahun 2017', 'Pengiriman Instrumen Penilaian Camat Berprestasi tkt. Kab. Alor Tahun 2017', '17', 'BELUM DIBACA', 'BELUM DIDISPOSISI'),
(14, 2, 'Ksr.400/302/2017', '2017-10-16', '2017-10-20', NULL, 'WAKIL BUPATI ALOR', 'Gubernur NTT', 'Penegasan', 'Penegasan Penempatan Dokter PTT', '17', 'BELUM DIBACA', 'BELUM DIDISPOSISI'),
(15, 3, 'Ksr.400/303/2017', '2017-10-16', '2017-10-20', '2017-10-20', 'Sekretaris Daerah', 'Gubernur NTT', 'Penegasan', 'Penegasan Pengkajian Kelayakan PAUD/KB Harapan Bangsa', '17', 'Dibaca', 'BELUM DIDISPOSISI'),
(16, 4, 'Ksr.400/304/2017', '2017-10-16', '2017-10-20', NULL, 'Asisten Pemerintah dan Kesra', 'Gubernur NTT', 'Penegasan', 'Penegasan Laporan Kegiatan Festival Kesenian Daerah tkt. Prop. NTT', '17', 'BELUM DIBACA', 'BELUM DIDISPOSISI'),
(17, 5, 'Ksr.400/298/2017', '2017-10-12', '2017-10-20', NULL, 'ASISTEN PEREKONOMIAN DAN PEMBANGUNAN', 'Gubenrur NTT', 'Penegasan', 'Penegasan Urusan Pendidikan di masa transisi', '17', 'BELUM DIBACA', 'BELUM DIDISPOSISI'),
(18, 6, 'Ksr.400/301/2017', '2017-10-16', '2017-10-20', '2017-10-20', 'ASISTEN ADMINISTRASI UMUM', 'Gubernur NTT', 'Penegasan', 'Penegasan Izin Membangun dan Surat Penyerahan Tanah', '17', 'BELUM DIBACA', 'BELUM DIDISPOSISI');

-- --------------------------------------------------------

--
-- Table structure for table `t_suratkeluar`
--

CREATE TABLE `t_suratkeluar` (
  `id` int(11) NOT NULL,
  `no_agenda` int(11) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `dari` text,
  `teruskan` text,
  `perhatian` text,
  `sifat` text,
  `isi_disposisi` text,
  `tahun` text,
  `status` text,
  `status_disposisi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_suratkeluar`
--

INSERT INTO `t_suratkeluar` (`id`, `no_agenda`, `tgl_keluar`, `dari`, `teruskan`, `perhatian`, `sifat`, `isi_disposisi`, `tahun`, `status`, `status_disposisi`) VALUES
(2, 3, '2017-10-20', 'Sekretaris Daerah', 'Asisten Adm. Pemerintah dan Kesra', 'Proses lebih lanjut', 'Segera', 'Maklum', '17', 'Belum Dibaca', 'Belum Disposisi'),
(3, 6, '2017-10-20', 'ASISTEN ADMINISTRASI UMUM', NULL, 'Proses lebih lanjut', 'Segera', 'Maklum', '17', 'Belum Dibaca', 'Belum Disposisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_instansi`
--
ALTER TABLE `tr_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_agenda`
--
ALTER TABLE `t_agenda`
  ADD PRIMARY KEY (`tahun`);

--
-- Indexes for table `t_gambar`
--
ALTER TABLE `t_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `no_agenda` (`no_agenda`);

--
-- Indexes for table `t_struktur`
--
ALTER TABLE `t_struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_surat`
--
ALTER TABLE `t_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_agenda` (`no_agenda`);

--
-- Indexes for table `t_suratkeluar`
--
ALTER TABLE `t_suratkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_agenda` (`no_agenda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tr_instansi`
--
ALTER TABLE `tr_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_gambar`
--
ALTER TABLE `t_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `t_struktur`
--
ALTER TABLE `t_struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_surat`
--
ALTER TABLE `t_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `t_suratkeluar`
--
ALTER TABLE `t_suratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_gambar`
--
ALTER TABLE `t_gambar`
  ADD CONSTRAINT `FK_t_gambar_t_surat` FOREIGN KEY (`no_agenda`) REFERENCES `t_surat` (`no_agenda`);

--
-- Constraints for table `t_suratkeluar`
--
ALTER TABLE `t_suratkeluar`
  ADD CONSTRAINT `FK__t_surat` FOREIGN KEY (`no_agenda`) REFERENCES `t_surat` (`no_agenda`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
