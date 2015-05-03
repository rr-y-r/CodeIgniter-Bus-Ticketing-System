-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 03 Mei 2015 pada 08.02
-- Versi Server: 5.5.40
-- PHP Version: 5.4.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rploot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
`id_bank` int(8) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('016c292deaed44b8b8239dafac190636', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 1430518811, 'a:6:{s:9:"user_data";s:0:"";s:5:"email";s:9:"mahasiswa";s:6:"userid";s:1:"2";s:12:"is_logged_in";b:1;s:3:"nim";s:10:"1103120167";s:5:"level";s:9:"mahasiswa";}'),
('02ea0afd60b16e5591178edbe116639d', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 1430629164, 'a:6:{s:9:"user_data";s:0:"";s:5:"email";s:5:"admin";s:6:"userid";s:1:"1";s:12:"is_logged_in";b:1;s:3:"nim";s:1:"0";s:5:"level";s:5:"admin";}'),
('10f9ce8a7a7e6d9c2966144411bddca5', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 1430552582, ''),
('18ccaafb30d75379c1b09ee45ce3df85', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 1430648780, 'a:6:{s:9:"user_data";s:0:"";s:5:"email";s:5:"admin";s:6:"userid";s:1:"1";s:12:"is_logged_in";b:1;s:3:"nim";s:1:"0";s:5:"level";s:5:"admin";}'),
('2a68690e00ddac88ea1035674c77630b', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 1430624705, ''),
('369b1e8826a04ff70b0d974bf39861d8', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 1430541071, ''),
('470e6ffad2dc4e45c69a24ce5ff7bfe8', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 1430641383, 'a:6:{s:9:"user_data";s:0:"";s:5:"email";s:5:"admin";s:6:"userid";s:1:"1";s:12:"is_logged_in";b:1;s:3:"nim";s:1:"0";s:5:"level";s:5:"admin";}'),
('76585860e97465e1988a8118e919d870', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 1430543041, ''),
('c84f4d125abb73722d5ba34c14c9da47', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 1430513480, ''),
('d7898b130fec583a44fd74d1c4014beb', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 1430549383, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id_customer` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_identitas` int(25) NOT NULL,
  `hp` int(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `biaya` bigint(10) NOT NULL,
  `id_kamar` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `no_identitas`, `hp`, `alamat`, `email`, `jumlah`, `date_in`, `date_out`, `gambar`, `biaya`, `id_kamar`) VALUES
(1, '0', 0, 0, '', '', 0, '0000-00-00', '0000-00-00', '', 0, 0),
(2, '0', 0, 0, '', '', 0, '0000-00-00', '0000-00-00', '', 0, 0),
(3, '0', 0, 0, '', '', 0, '0000-00-00', '0000-00-00', '', 0, 0),
(4, 'sdfsdf', 0, 324, '', '', 0, '0000-00-00', '0000-00-00', '', 0, 0),
(5, 'sdfsdf', 0, 234234, '', 'sdf@dslkfj.com', 0, '0000-00-00', '0000-00-00', '', 0, 0),
(6, 'sdfsdf', 0, 234234, '', 'sdf@dslkfj.com', 0, '0000-00-00', '0000-00-00', '', 0, 0),
(7, 'sdgddf', 0, 345345, '', 'sdfsdf@sdf.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(8, 'sdfsdf', 0, 234234, '', 'sdfsdf@sdf.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(9, '0', 0, 0, '', '0', 0, '0000-00-00', '0000-00-00', '', 0, 0),
(10, 'adam', 0, 8234, '', 'asd@sd.com', 3, '0000-00-00', '0000-00-00', '', 0, 0),
(11, 'svdsd', 0, 234234, '', 'sdf@dslkfj.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(12, 'adam', 0, 2147483647, '', 'sdf@dslkfj.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(13, 'asdsdf', 0, 234234, '', 'sdf@dslkfj.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(14, 'sdfsdf', 0, 234234, '', 'sdf@dslkfj.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(15, 'sdfsdf', 0, 123123, '', 'sdf@dslkfj.com', 4, '2015-02-04', '0000-00-00', '', 0, 0),
(16, 'skfsdf', 0, 234, '', 'asd@sd.com', 3, '2015-10-04', '0000-00-00', '', 0, 0),
(17, 'budi', 0, 123123, '', 'sdf@dslkfj.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(18, 'budi', 0, 23, '', 'sdfsdf@sdf.com', 4, '2015-05-04', '0000-00-00', '', 0, 0),
(19, 'sfsjdflksjdflkj', 0, 234, '', 'sdf@dslkfj.com', 4, '2015-04-04', '0000-00-00', '', 0, 0),
(20, 'asfdxfvsdf', 0, 0, '', 'sdf@dslkfj.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(21, 'ooooo', 0, 999999, '', 'oo@iii.com', 4, '2015-04-29', '0000-00-00', '', 0, 0),
(22, 'sdgsdg', 0, 234234, '', 'sdfsdf@sdf.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(23, 'xdfsd', 0, 234, '', 'sd@sd.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(24, 'hhhh', 0, 564564, '', 'sdf@dslkfj.com', 4, '2015-02-05', '0000-00-00', '', 0, 0),
(25, 'tedy', 0, 32235234, '', 'asd@sd.com', 4, '2015-05-09', '0000-00-00', '', 0, 0),
(26, 'ioooio', 0, 23234, '', 'sd@sd.com', 4, '2015-01-05', '0000-00-00', '', 0, 0),
(27, 'modal', 0, 5353253, '', 'sdfsdf@sdf.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(28, 'gggg', 0, 0, '', 'sdfsdf@sdf.com', 4, '2015-02-05', '0000-00-00', '', 0, 0),
(29, 'ffff', 0, 33333, '', 'sdfsdf@sdf.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(30, 'ffff', 0, 33333, '', 'dfd@dfg.vi', 3, '2015-02-05', '0000-00-00', '', 0, 0),
(31, 'hhhhh', 0, 445, '', 'dfd@dfg.vi', 4, '2015-02-05', '0000-00-00', '', 0, 0),
(32, 'jkljklljkljkl', 0, 234234, '', 'sdf@dslkfj.com', 4, '2015-04-05', '0000-00-00', '', 0, 0),
(33, 'ytryytytyuytu', 2147483647, 324234, 'dfdfgdfgdfg', 'sdf@dslkfj.com', 4, '2015-09-05', '0000-00-00', '', 0, 0),
(34, 'hjghjghj', 567567567, 747456456, 'vvnmghm', 'sdf@dslkfj.com', 4, '0000-00-00', '0000-00-00', '', 0, 0),
(35, 'dfgdfg', 345345, 68678, 'dfdfgdfgdfg', 'sdfsdf@sdf.com', 4, '2015-09-05', '2015-10-05', '', 0, 0),
(36, 'fghgfgh', 5636456, 34534, 'fghfgh', 'sdffds@df.com', 4, '2015-03-05', '2015-04-05', '', 0, 0),
(37, 'fghfgh', 4534543, 213432, 'dfgdfg', 'sdf@dslkfj.com', 3, '2015-04-05', '2015-05-05', '', 225000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dorm_room`
--

CREATE TABLE IF NOT EXISTS `dorm_room` (
`roomid` int(8) NOT NULL,
  `nomor` int(3) NOT NULL,
  `fasilitas` varchar(32) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kapasitas` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dorm_room`
--

INSERT INTO `dorm_room` (`roomid`, `nomor`, `fasilitas`, `status`, `kapasitas`) VALUES
(36, 23, '32', '', 23),
(37, 11, '23', '', 33),
(38, 231, '44', '', 33);

-- --------------------------------------------------------

--
-- Struktur dari tabel `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `filename`, `title`, `userid`, `url`) VALUES
(11, 'download.jpg', 'asdasd', '2', ''),
(13, '10982445_10204072022107343_7748229746660777211_n.jpg', 'adascd', '2', ''),
(14, '[tugas]_sister.png', 'awdwad', '2', ''),
(15, '20140702_075357.jpg', 'ddd', '2', ''),
(16, '10982445_10204072022107343_7748229746660777211_n1.jpg', 'awdawd', '2', ''),
(17, '11150412_10204259270468435_8718408792352069505_n1.jpg', 'wasss', '2', ''),
(18, 'zs.png', '1232', '2', ''),
(19, '10665199_10203157460123865_740748938158076498_n.jpg', '23', '2', ''),
(20, '10665199_10203157460123865_740748938158076498_n1.jpg', 'awda', '1', ''),
(21, '11150412_10204259270468435_8718408792352069505_n.jpg', 'drop the bass', '1', ''),
(23, '55.jpg', 'zzz', '1', ''),
(24, 'Diego3.png', 'fghj', '1', ''),
(25, '11150412_10204259270468435_8718408792352069505_n2.jpg', 'cc', '2', ''),
(26, '[tugas]_sister1.png', '55', '2', ''),
(27, '11150412_10204259270468435_8718408792352069505_n3.jpg', 'lol', '1', ''),
(28, '[tugas]_sister2.png', 'tetes', '2', ''),
(29, '[tugas]_sister3.png', '12313', '2', ''),
(30, '11150412_10204259270468435_8718408792352069505_n4.jpg', 'drop the bass', '2', ''),
(31, '[tugas]_sister4.png', 'drop the bass', '2', ''),
(32, '[tugas]_sister5.png', 'awd', '2', ''),
(33, '[tugas]_sister6.png', 'awda', '2', ''),
(34, '551.jpg', 'Lampiran', '2', ''),
(35, '10665199_10203157460123865_740748938158076498_n2.jpg', 'lolol', '1', ''),
(36, 'gambar1.png', 'lala yeye', '2', ''),
(37, 'z.png', 'c', '1', ''),
(38, 'z1.png', 'cc', '1', ''),
(39, 'a3f39f21142644318773391517_700wa_0.gif', 'KTM', '2', ''),
(40, '2234.jpg', 'Lampiran', '2', ''),
(41, 'WIN_20150321_213741.JPG', 'asdasd', '2', ''),
(42, '22341.jpg', 'Lampiran', '2', ''),
(43, '22342.jpg', 'Lampiran', '2', ''),
(44, '20140702_0753571.jpg', 'ruang', '2', ''),
(45, '11150412_10204259270468435_8718408792352069505_n5.jpg', 'yes', '2', ''),
(46, '22343.jpg', 'foto1', '2', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
`ticketid` int(5) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `userid` int(5) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `file` varchar(180) NOT NULL,
  `status` varchar(28) NOT NULL,
  `expired` date NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ticket`
--

INSERT INTO `ticket` (`ticketid`, `jenis`, `userid`, `deskripsi`, `lampiran`, `file`, `status`, `expired`, `pesan`) VALUES
(14, 'Microsoft Dreamspark', 2, 'Pengajuan pembuatan akun Dreamspark', 'Nama : Ryan RynaldoNIM : 1103120167', '22342.jpg', 'Diterima', '2016-05-01', 'Semoga Bermanfaat'),
(15, 'Peminjaman Properti', 2, 'peminjaman ruang kelas untuk kuliah pengganti di e306', 'pukul : 11.30\r\nNama : Ryan Rynaldo', '20140702_0753571.jpg', 'On Progress', '0000-00-00', ''),
(16, 'Lain-lain', 2, 'Kritik dan saran tentang perkuliahan', 'turunkan uang semester !', '11150412_10204259270468435_8718408792352069505_n5.jpg', 'Ditolak', '0000-00-00', 'Ticket yang diajukan tidak relevan'),
(17, 'Microsoft Dreamspark', 2, 'deskripsi', 'lampiran', '22343.jpg', 'Diterima', '2015-06-11', 'pesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`userid` int(3) NOT NULL,
  `nim` int(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(32) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `no. rek` int(13) NOT NULL,
  `kontak` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `nim`, `email`, `password`, `level`, `nama`, `alamat`, `gender`, `no. rek`, `kontak`) VALUES
(1, 0, 'admin', 'admin', 'admin', '', '', '', 0, ''),
(2, 1103120167, 'mahasiswa', 'mahasiswa', 'mahasiswa', '', '', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `dorm_room`
--
ALTER TABLE `dorm_room`
 ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
 ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
 ADD PRIMARY KEY (`ticketid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
MODIFY `id_bank` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `dorm_room`
--
ALTER TABLE `dorm_room`
MODIFY `roomid` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
MODIFY `ticketid` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `userid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
