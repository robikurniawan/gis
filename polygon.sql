-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 19 Okt 2018 pada 11.02
-- Versi Server: 5.6.35
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `polygon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`, `latitude`, `longitude`) VALUES
(1, 'Ulaweng', '-5.549039', '120.413134'),
(2, 'Tonra', '-6.049053', '107.184049'),
(3, 'Tellu Siattinge', '-6.419054', '107.332086'),
(4, 'Tellu Limpoe', '-6.010564', '107.328385'),
(5, 'Tanete Riattang Timur', '-6.395705', '107.437959'),
(6, 'Tanete Riattang Barat', '-6.211067', '107.514957'),
(7, 'Tanete Riattang', '-6.225596', '107.572377'),
(8, 'Sibulue', '-6.140040', '107.411135'),
(9, ' Salomekko', '-6.366683', '107.528444'),
(10, 'Ponre', '', ''),
(11, 'Patimpeng', '', ''),
(12, 'Palakka', '', ''),
(13, 'Mare', '', ''),
(14, 'Libureng', '', ''),
(15, 'Lappariaja', '', ''),
(16, 'Lamuru', '', ''),
(17, 'Kajuara', '', ''),
(18, 'Kahu', '', ''),
(19, 'Dua Boccoe', '', ''),
(20, 'Cina', '', ''),
(21, 'Cenrana', '', ''),
(22, 'Bontocani', '', ''),
(23, 'Bengo', '', ''),
(24, 'Barebbo', '', ''),
(25, 'Awangpone', '', ''),
(26, 'Amali', '', ''),
(27, 'Ajangale', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_lahan`
--

CREATE TABLE `lokasi_lahan` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `polygon` text NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi_lahan`
--

INSERT INTO `lokasi_lahan` (`id`, `nama_lokasi`, `kecamatan`, `alamat`, `status`, `keterangan`, `polygon`, `id_user`) VALUES
(32, 'Lahan Padi', 1, '', 3, 'Sementara penanaman', '-4.68025,120.31595 -4.66773,120.36717 -4.72723,120.34747 ', '3'),
(33, 'Lahan Jagung', 2, '', 2, 'Gagal Panen Karna Musim', '-4.6125,120.15596 -4.53026,120.16612 -4.44801,120.21199 -4.56572,120.20464 -4.57953,120.17549 ', '2'),
(34, 'Lahan Sawah', 2, '', 1, 'Sementara Dalam Masa Panen', '-4.71242,120.169 -4.60829,120.13968 -4.54248,120.25044 -4.66942,120.28934 -4.72518,120.19366 ', '2'),
(35, 'Lahan Tak Terpakai', 1, '', 2, 'Sementara Proses Perbaikan', '-4.34416,120.2253 -4.27011,120.28388 -4.19331,120.35481 -4.31346,120.35388 -4.398,120.33786 ', '3'),
(36, 'Lahan Penanaman Jati', 1, '', 3, 'Proses Pananaman ', '-4.64535,120.38323 -4.62266,120.38138 -4.62461,120.40562 -4.64957,120.42942 -4.65195,120.39073 ', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `nama_status`, `warna`) VALUES
(1, 'Panen', '#4dd000'),
(2, 'Gagal Panen', '#FF0000'),
(3, 'Tanam', '#FFFF00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kelompok_tani` varchar(50) NOT NULL,
  `level` enum('a','p') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `kecamatan`, `alamat`, `kelompok_tani`, `level`) VALUES
(1, 'Robi', 'robi', 'f5c8ff28ac5767c4495ca6230fa6d9fc7274bf1f', 1, 'Makassar', '', 'p'),
(2, 'Akbar', 'akbar', '3e91e506e7b4e4960328504e54a738e1da1a94cf', 2, 'Makassar', '', 'p'),
(3, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'Makassar', '', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_lahan`
--
ALTER TABLE `lokasi_lahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan` (`kecamatan`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `lokasi_lahan`
--
ALTER TABLE `lokasi_lahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;