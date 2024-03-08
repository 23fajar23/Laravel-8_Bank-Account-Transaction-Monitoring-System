-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 02:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mutasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `judul`, `deskripsi`, `date`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Announcement 1', '.(b)(u)(i)Lorem ipsum dolor(/i)(/u) (/b)sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad minim veniam,quis nostrud exerci tation ullamcorper.', '2024-03-08 20:08:49', 'tidak_aktif', '2024-03-08 13:08:49', '2024-03-08 13:12:03'),
(7, 'Announcement 2', '.(b)(u)Lorem Ipsum(/u) (/b)is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-03-08 20:10:09', 'aktif', '2024-03-08 13:10:09', '2024-03-08 13:10:09'),
(8, 'Announcement 3', '.(u)(b)Lorem Ipsum is simply dummy text of the printin(/b)g and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text eve(/u)r since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-03-08 20:10:45', 'aktif', '2024-03-08 13:10:45', '2024-03-08 13:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `autonotifs`
--

CREATE TABLE `autonotifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `otoritas` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `autonotifs`
--

INSERT INTO `autonotifs` (`id`, `uid`, `username`, `api_key`, `kategori`, `otoritas`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '-', '-', 'admin', 'admin', '-', 'tidak_aktif', NULL, NULL),
(2, '-', '-', '-', 'otp', 'admin', 'Pelanggan Yth,\n*(otp)* adalah kode konfirmasi Mutasi Rekening anda.\nOTP ini akan berlaku selama 30 menit ke depan.', 'aktif', NULL, NULL),
(3, '-', '-', '-', 'register', 'admin', 'Pelanggan Yth,\nPendaftaran akun telah berhasil, dengan rincian\n\n   Nama : (name)\n   Nama Lengkap : (fullname)\n   Alamat : (alamat)\n   No HP : (no_hp)\n   Email : (email)\n\nTerimakasih telah menggunakan layanan kami.\nLakukan verifikasi akun anda dengan kode OTP yang telah kami kirimkan sebelumnya.\n\n*Catatan :* \nSeluruh data penting anda akan di enkripsi pada sistem kami, jadi ingat baik-baik data penting anda supaya tidak terjadi hal yang tidak diinginkan.', 'aktif', NULL, NULL),
(4, '-', '-', '-', 'gagal_scrap', 'admin', 'Pelanggan Yth,\nSistem kami mendeteksi adanya kesalahan pada paket anda, dengan rincian\n\n   Service : (service)\n   Nama Paket : (nama_paket)\n   Jatuh Tempo : (expired)\n   Nomor rekening : (no_rekening)\n\nHarap segera melakukan pembaruan username dan password internet banking anda pada website kami untuk dapat tetap menikmati layanan ini.\nTerimakasih.', 'aktif', NULL, NULL),
(5, '-', '-', '-', 'add_bank', 'admin', 'Pelanggan Yth,\nPembelian Paket telah berhasil, dengan rincian\n\n   Paket : (nama_paket)\n   Service : Bank (service)\n   Harga : Rp (harga)\n   Masa Aktif : (durasi) Hari\n   Jatuh Tempo : (expired)\n\nTerimakasih telah menggunakan layanan kami.\nSelamat menggunakan dan hubungi kami jika anda memiliki kendala.', 'aktif', NULL, NULL),
(6, '-', '-', '-', 'paket_expired', 'admin', 'Pelanggan Yth,\n*Masa aktif paket anda telah habis*, dengan rincian \n\n   Paket : (nama_paket)\n   Service : Bank (service)\n   Harga : Rp (harga)\n   Masa Aktif : (durasi) Hari\n   Jatuh Tempo : (expired)\n\nTerimakasih telah menggunakan layanan kami.\nSilahkan lakukan perpanjangan dan hubungi kami jika anda memiliki kendala.', 'aktif', NULL, NULL),
(7, '-', '-', '-', 'top_up', 'admin', 'Pelanggan Yth,\nPermintaan isi ulang saldo telah berhasil, dengan rincian\n\n   Nominal : Rp (nominal)\n   Nama Bank : (nama_rekening)\n   Bank Tujuan : (service)\n   Nomor Rekening : (no_rekening)\n   Jatuh Tempo : (expired)\n   Tagihan : Rp (tagihan)\n\nSilahkan lakukan pembayaran dan simpan bukti pembayaran telah berhasil.\nTerimakasih.', 'aktif', NULL, NULL),
(8, '-', '-', '-', 'payment_success', 'admin', 'Pelanggan Yth,\nPembayaran sebesar Rp (tagihan) telah terkonfirmasi, dengan rincian\n\n   Nominal : Rp (nominal)\n   Nama Bank : (nama_rekening)\n   Bank Tujuan : (service)\n   Nomor Rekening : (no_rekening)\n   Terbayarkan : Rp (tagihan)\n\nTerimakasih telah menggunakan layanan kami. \nSelamat menggunakan dan hubungi kami jika anda memiliki kendala.', 'aktif', NULL, NULL),
(9, '-', '-', '-', 'payment_failed', 'admin', 'Pelanggan Yth,\nPembayaran *Gagal*, dengan rincian\n\n   Nominal : Rp (nominal)\n   Nama Bank : (nama_rekening)\n   Bank Tujuan : (service)\n   Nomor Rekening : (no_rekening)\n   Jatuh Tempo : (expired)\n   Tagihan : Rp (tagihan) *(Kadaluarsa)* \n\nJika anda telah melakukan pembayaran harap hubungi kami.\nAbaikan pesan ini jika memang anda belum melakukan pembayaran.', 'aktif', NULL, NULL),
(10, '-', '-', '-', 'paket_harian_delete', 'admin', 'Pelanggan Yth,\n*Paket Layanan Harian (nama_paket) dengan harga Rp (harga)*, saat ini *sudah tidak tersedia*, silahkan lakukan perpanjangan paket layanan anda.\nTerimakasih telah menggunakan layanan kami. \nSelamat menggunakan dan hubungi kami jika anda memiliki kendala.', 'aktif', NULL, NULL),
(11, '-', '-', '-', 'paket_harian_saldo', 'admin', 'Pelanggan Yth,\nPerpanjangan Paket Layanan Harian *Gagal*, dengan rincian\n\n   Paket : (nama_paket)\n   Service : Bank (service)\n   Harga : Rp (harga)\n   Masa Aktif : (durasi) Hari\n   Jatuh Tempo : (expired)\n\nSilahkan lakukan isi ulang saldo untuk tetap dapat menikmati layanan ini.\nTerimakasih.', 'aktif', NULL, NULL),
(12, '-', '-', '-', 'paket_harian_perpanjangan', 'admin', 'Pelanggan Yth,\nPerpanjangan Paket Layanan Harian *Berhasil*, dengan rincian\n\n   Paket : (nama_paket)\n   Service : Bank (service)\n   Harga : Rp (harga)\n   Masa Aktif : (durasi) Hari\n   Jatuh Tempo : (expired)\n\nTerimakasih telah menggunakan layanan kami. \nSelamat menggunakan dan hubungi kami jika anda memiliki kendala.', 'aktif', NULL, NULL),
(13, 'user@gmail.com', NULL, NULL, 'user', 'user', 'Telah terjadi transaksi sebesar Rp(nominal) di rekening (no_rekening) dengan jenis tansaksi (jenis_transaksi) pada tanggal (tgl_transaksi)', 'tidak_aktif', '2024-03-08 12:23:54', '2024-03-08 12:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposits`
--

CREATE TABLE `bank_deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `company_id` varchar(255) NOT NULL,
  `username_ibank` varchar(255) NOT NULL,
  `password_ibank` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mutasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_deposits`
--

INSERT INTO `bank_deposits` (`id`, `service`, `no_rekening`, `nama_rekening`, `company_id`, `username_ibank`, `password_ibank`, `status`, `mutasi`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '0', '-', '-', '-', '-', 'tidak_aktif', 'baru', NULL, NULL),
(2, 'BRI', '0', '-', '-', '-', '-', 'tidak_aktif', 'baru', NULL, NULL),
(3, 'BNI', '0', '-', '-', '-', '-', 'tidak_aktif', 'baru', NULL, NULL),
(4, 'MANDIRI', '0', '-', '-', '-', '-', 'tidak_aktif', 'baru', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_mibs`
--

CREATE TABLE `company_mibs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `referal_rekening` varchar(255) NOT NULL,
  `company_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_mibs`
--

INSERT INTO `company_mibs` (`id`, `uid`, `referal_rekening`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '4', 'R23P2R2', '2024-03-08 12:42:12', '2024-03-08 12:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `kode_unik` varchar(255) NOT NULL,
  `tagihan` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `expired` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integrasis`
--

CREATE TABLE `integrasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `api_signature` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `integrasis`
--

INSERT INTO `integrasis` (`id`, `email`, `status`, `api_key`, `api_signature`, `url`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', 'tidak_aktif', '$2y$10$ug1Ey2BzgGl0kJHyb1EQj.IMKxtaO6pMYFZ6hLcpkVJw9VXra5q8q', '$2y$10$/Cbu9YwESL8Db8ttQYE0J.xZTUzYOaL511bHRGV0nDo86QkIyxIZi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_autonotifs`
--

CREATE TABLE `laporan_autonotifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_autonotifs`
--

INSERT INTO `laporan_autonotifs` (`id`, `uid`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', 'Notifikasi transaksi sebesar Rp(nominal) pada rekening (no_rekening) berhasil dikirim.', 'tidak_aktif', '2024-03-08 12:23:54', '2024-03-08 12:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `list_banks`
--

CREATE TABLE `list_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `referal_paket_id` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `date_expired` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username_ibank` varchar(255) NOT NULL,
  `password_ibank` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_banks`
--

INSERT INTO `list_banks` (`id`, `uid`, `service`, `no_rekening`, `nama_paket`, `referal_paket_id`, `harga`, `jenis`, `date`, `date_expired`, `status`, `username_ibank`, `password_ibank`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', 'BCA', '1234567890', 'Paket Hemat', '-', '7000', 'normal', '2024-03-08 19:40:44', '2024-03-18 19:40:44', 'baru', 'eyJpdiI6InZCa01iU1V3S09HSUNFblpXTTZwMVE9PSIsInZhbHVlIjoiNG5sYXdzU0tLWE1iZ0R2akwvTi83QT09IiwibWFjIjoiNzdjN2ZlZTk1MjBiMWJkMDNmMjBhZWUwNzZlMjA4MmZlYTQ0NDMxYTUzZDE4N2E0YzJjNThjZDM4OWI3Yjk1MyIsInRhZyI6IiJ9', 'eyJpdiI6IjJQQnEwT08yRlNCek5uVWVhT3R5Z0E9PSIsInZhbHVlIjoib0pFTHp5dGYvV1hXM3dQLzVIVSt6Zz09IiwibWFjIjoiODk1YjBjZGM1ZTM3MzUzNmRhMDhiY2EwY2YyMWU4OGVjZDQ3Mjg4MTU5ZjA5YzYzNjFmODE1MzI4YmFhYTU4ZiIsInRhZyI6IiJ9', '2024-03-08 12:40:44', '2024-03-08 12:40:44'),
(2, 'user@gmail.com', 'BRI', '2345678901', 'Paket Hemat', '-', '7000', 'normal', '2024-03-08 19:41:25', '2024-03-18 19:41:25', 'baru', 'eyJpdiI6IktYSVhKMkMvckJjZGtUdWxmT0pZYnc9PSIsInZhbHVlIjoibWtCVHBGNTFpMGpyTHhjME9KRDVTUT09IiwibWFjIjoiYWI0NGJiNDRmMjkxZDgyODA2MTdhYTcwMWI0MGFmZmE0NDMwNGY2ZTcxYjk2OWRiZGY1NWQwNDBhZjE1NTU2YyIsInRhZyI6IiJ9', 'eyJpdiI6IlcrWXI4Rm45Q2Z3OW9ZcTJxZkxQaGc9PSIsInZhbHVlIjoiUFNCVFBGVW4xMkdOQWR2RE90UU1BUT09IiwibWFjIjoiMTI2YWRkYjQ2OWIzYTk4ZmU3Y2NlMzMyNmRjZGFkMzk2ZDQyNTU1ZjFlZWIzNTdjZDY2MWJiMjk4M2EzOTk1ZiIsInRhZyI6IiJ9', '2024-03-08 12:41:25', '2024-03-08 12:41:25'),
(3, 'user@gmail.com', 'BNI', '3456789012', 'Paket Hemat', '-', '7000', 'normal', '2024-03-08 19:41:43', '2024-03-18 19:41:43', 'baru', 'eyJpdiI6IkJaeUlNT2MvVjhoVHRCRnJlSXNRMmc9PSIsInZhbHVlIjoiTE9OWHpxc2RxbUpPT2E4cU04TXNxdz09IiwibWFjIjoiODg0MGNjZmIyN2FjZjA5YTBiMTYyNDE3OTc3ODgwY2ViYjk5NTQzNGU2OWE1OWEyNmE1ZmQ1NDZkZTUwOTAxOSIsInRhZyI6IiJ9', 'eyJpdiI6ImlvTFhvMkRMdHg2Rk1xcVBraW5vcFE9PSIsInZhbHVlIjoiQUhQaWVwVHg1SnpabzVIa2VzOW54dz09IiwibWFjIjoiZjg1NGYwNDk4ODVkM2QwNGRkZDA4ZTUzOWE0ZWQ1OGEyOWExNmY5YjA3MmQxYWMzOTIyY2IyMjUxNjZiODRlZiIsInRhZyI6IiJ9', '2024-03-08 12:41:43', '2024-03-08 12:41:43'),
(4, 'user@gmail.com', 'MANDIRI', '4567890123', 'Paket Hemat', '-', '7000', 'normal', '2024-03-08 19:42:12', '2024-03-18 19:42:12', 'baru', 'eyJpdiI6IlRrUU84elBFYWtLNWExcm1yZzNoU3c9PSIsInZhbHVlIjoiblNuWGRORmY4VU53aEU5MDQzVXNTUT09IiwibWFjIjoiYWQwMTM0ZTRhYjc0NzU3NjExZDY5NTJkMGUyZmRmYTA5ZDlkNmE5MjUyYWFmODVmYjI3NDgwMDJmMTRiODVkNCIsInRhZyI6IiJ9', 'eyJpdiI6IndQU2RWNE91WFgrZVB4S2FHTUx4Umc9PSIsInZhbHVlIjoiSEtHdXBKdlN4eHREUC80OGFNZjh0QT09IiwibWFjIjoiYWU0Y2E0ZWFkNGFkOTFjOWM2ODEwZjM5MWM2MjNkMjVjYzU1ZDM1NmI4MDM1YmExNzcxOThhOWM1YjJkNGEwYiIsInRhZyI6IiJ9', '2024-03-08 12:42:12', '2024-03-08 12:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `list_packets`
--

CREATE TABLE `list_packets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_packets`
--

INSERT INTO `list_packets` (`id`, `nama_paket`, `harga`, `jenis`, `durasi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Paket Hemat', '7000', 'normal', '10', 'aktif', '2024-03-08 12:37:39', '2024-03-08 12:37:39'),
(2, 'BCA Member', '20000', 'normal', '35', 'aktif', '2024-03-08 12:38:12', '2024-03-08 12:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `activity` text NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `referal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `uid`, `activity`, `kategori`, `status`, `date`, `deskripsi`, `referal`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'event', 'event', 'tidak_aktif', '2024-03-08 20:08:49', 'Announcement 1', '6', '2024-03-08 13:08:50', '2024-03-08 13:11:25'),
(2, 'admin@gmail.com', 'event', 'event', 'aktif', '2024-03-08 20:10:09', 'Announcement 2', '7', '2024-03-08 13:10:09', '2024-03-08 13:10:09'),
(3, 'admin@gmail.com', 'event', 'event', 'aktif', '2024-03-08 20:10:45', 'Announcement 3', '8', '2024-03-08 13:10:45', '2024-03-08 13:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_21_033645_create_list_banks_table', 1),
(6, '2022_07_26_040035_create_transaksis_table', 1),
(7, '2022_08_11_022237_create_integrasis_table', 1),
(8, '2022_08_31_075301_create_announcements_table', 1),
(9, '2022_09_06_141409_create_log_activities_table', 1),
(10, '2022_09_08_183927_create_testimonis_table', 1),
(11, '2022_10_17_103228_create_autonotifs_table', 1),
(12, '2022_10_24_134433_create_company_mibs_table', 1),
(13, '2022_11_03_101720_create_phone_autonotifs_table', 1),
(14, '2022_11_04_091703_create_track_messages_table', 1),
(15, '2022_11_07_093012_create_laporan_autonotifs_table', 1),
(16, '2022_11_10_104450_create_otps_table', 1),
(17, '2022_11_15_083505_create_list_packets_table', 1),
(18, '2022_11_15_102004_create_referal_bank_packets_table', 1),
(19, '2022_11_18_135919_create_riwayat_pembelians_table', 1),
(20, '2022_11_24_140411_create_deposits_table', 1),
(21, '2022_11_24_141559_create_bank_deposits_table', 1),
(22, '2022_11_24_141626_create_mutasi_bank_deposits_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_bank_deposits`
--

CREATE TABLE `mutasi_bank_deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `tgl_transaksi` varchar(255) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `saldo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status_resend` varchar(255) NOT NULL,
  `date_expired` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `uid`, `kode`, `status_resend`, `date_expired`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '123456', 'available', '2024-03-08 19:16:22', NULL, NULL),
(2, 'user@gmail.com', '145119', 'available', '2024-03-08 19:53:54', '2024-03-08 12:23:54', '2024-03-08 12:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_autonotifs`
--

CREATE TABLE `phone_autonotifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `referal_autonotif` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_autonotifs`
--

INSERT INTO `phone_autonotifs` (`id`, `uid`, `referal_autonotif`, `jenis`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '13', 'semua', '6280000000000', '2024-03-08 12:23:54', '2024-03-08 12:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `referal_bank_packets`
--

CREATE TABLE `referal_bank_packets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referal_id` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referal_bank_packets`
--

INSERT INTO `referal_bank_packets` (`id`, `referal_id`, `service`, `created_at`, `updated_at`) VALUES
(1, '1', 'BCA', '2024-03-08 12:37:40', '2024-03-08 12:37:40'),
(2, '1', 'BRI', '2024-03-08 12:37:40', '2024-03-08 12:37:40'),
(3, '1', 'MANDIRI', '2024-03-08 12:37:40', '2024-03-08 12:37:40'),
(4, '1', 'BNI', '2024-03-08 12:37:40', '2024-03-08 12:37:40'),
(5, '2', 'BCA', '2024-03-08 12:38:12', '2024-03-08 12:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pembelians`
--

CREATE TABLE `riwayat_pembelians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `tgl_pembelian` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pembelians`
--

INSERT INTO `riwayat_pembelians` (`id`, `uid`, `nama_paket`, `jenis`, `service`, `no_rekening`, `harga`, `durasi`, `tgl_pembelian`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', 'Paket Hemat', 'normal', 'BCA', '1234567890', '7000', '10', '2024-03-08 19:40:44', 'berhasil', '2024-03-08 12:40:44', '2024-03-08 12:40:44'),
(2, 'user@gmail.com', 'Paket Hemat', 'normal', 'BRI', '2345678901', '7000', '10', '2024-03-08 19:41:25', 'berhasil', '2024-03-08 12:41:25', '2024-03-08 12:41:25'),
(3, 'user@gmail.com', 'Paket Hemat', 'normal', 'BNI', '3456789012', '7000', '10', '2024-03-08 19:41:43', 'berhasil', '2024-03-08 12:41:43', '2024-03-08 12:41:43'),
(4, 'user@gmail.com', 'Paket Hemat', 'normal', 'MANDIRI', '4567890123', '7000', '10', '2024-03-08 19:42:12', 'berhasil', '2024-03-08 12:42:12', '2024-03-08 12:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `track_messages`
--

CREATE TABLE `track_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `referal_bank` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `tgl_transaksi` varchar(255) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `saldo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `uid`, `referal_bank`, `no_rekening`, `service`, `deskripsi`, `tipe`, `tgl_transaksi`, `nominal`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '1', '1234567890', 'BCA', 'Testing', 'KREDIT', '2024-03-02', '50000', '3000000', NULL, NULL),
(2, 'user@gmail.com', '1', '1234567890', 'BCA', 'Testing', 'KREDIT', '2024-03-01', '50000', '250000', NULL, NULL),
(3, 'user@gmail.com', '1', '1234567890', 'BCA', 'Testing', 'KREDIT', '2024-03-01', '100000', '250000', NULL, NULL),
(4, 'user@gmail.com', '1', '1234567890', 'BCA', 'Testing', 'KREDIT', '2024-03-08', '50000', '250000', NULL, NULL),
(5, 'user@gmail.com', '1', '1234567890', 'BCA', 'Testing', 'DEBIT', '2024-03-02', '50000', '3000000', NULL, NULL),
(6, 'user@gmail.com', '1', '1234567890', 'BCA', 'Testing', 'DEBIT', '2024-03-01', '50000', '250000', NULL, NULL),
(7, 'user@gmail.com', '1', '1234567890', 'BCA', 'Testing', 'DEBIT', '2024-03-01', '100000', '250000', NULL, NULL),
(8, 'user@gmail.com', '1', '1234567890', 'BCA', 'Testing', 'DEBIT', '2024-03-08', '50000', '250000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `api_signature` varchar(255) NOT NULL,
  `otoritas` varchar(255) NOT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `notif_wa` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `saldo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `jenis_kelamin`, `alamat`, `kota`, `no_hp`, `api_key`, `api_signature`, `otoritas`, `perusahaan`, `jabatan`, `notif_wa`, `status`, `saldo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123', 'laki-laki', '-', '-', '-', '-', '-', 'admin', '-', '-', 'aktif', 'aktif', '-', 'admin@gmail.com', NULL, '$2y$10$LWygwE4eJgBfm5sgy6Taye8TzX5nZbZOIJ453bEeD6tkh26BAV4Cy', NULL, NULL, NULL),
(2, 'User1', 'Demo User', 'laki-laki', '-', '-', '6280000000000', 'cba1f2d695a5ca39ee6f343297a761a4', 'e834ca61e416bca2f95cdec22af8c1a5', 'user', '-', '-', 'aktif', 'aktif', '22000', 'user@gmail.com', NULL, '$2y$10$wN6gWlHg6PujBItclnR5.OlilyYYXRHmMDtSLZ1dwDxo5yNcJ9L.W', NULL, '2024-03-08 12:23:55', '2024-03-08 12:42:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autonotifs`
--
ALTER TABLE `autonotifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_mibs`
--
ALTER TABLE `company_mibs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `integrasis`
--
ALTER TABLE `integrasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_autonotifs`
--
ALTER TABLE `laporan_autonotifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_banks`
--
ALTER TABLE `list_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_packets`
--
ALTER TABLE `list_packets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_bank_deposits`
--
ALTER TABLE `mutasi_bank_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phone_autonotifs`
--
ALTER TABLE `phone_autonotifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referal_bank_packets`
--
ALTER TABLE `referal_bank_packets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pembelians`
--
ALTER TABLE `riwayat_pembelians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_messages`
--
ALTER TABLE `track_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `autonotifs`
--
ALTER TABLE `autonotifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_mibs`
--
ALTER TABLE `company_mibs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integrasis`
--
ALTER TABLE `integrasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_autonotifs`
--
ALTER TABLE `laporan_autonotifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_banks`
--
ALTER TABLE `list_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `list_packets`
--
ALTER TABLE `list_packets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mutasi_bank_deposits`
--
ALTER TABLE `mutasi_bank_deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_autonotifs`
--
ALTER TABLE `phone_autonotifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referal_bank_packets`
--
ALTER TABLE `referal_bank_packets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayat_pembelians`
--
ALTER TABLE `riwayat_pembelians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `track_messages`
--
ALTER TABLE `track_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
