-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2024 at 07:38 PM
-- Server version: 10.5.24-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpr8253_perumahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodatas`
--

CREATE TABLE `biodatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `id_member` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `perumahan_id` bigint(20) NOT NULL,
  `kawasan_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodatas`
--

INSERT INTO `biodatas` (`id`, `user_id`, `id_member`, `nik`, `jk`, `perumahan_id`, `kawasan_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'G-7162BF', '3226342867852074', 'pria', 1, 3, '2024-03-21 15:49:55', '2024-03-21 15:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `deliveris`
--

CREATE TABLE `deliveris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveris`
--

INSERT INTO `deliveris` (`id`, `transaksi_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 20, 5, 'process', '2024-03-26 08:55:04', '2024-03-26 12:22:06'),
(2, 21, 5, 'packing', '2024-03-26 08:55:04', '2024-03-26 10:47:31'),
(3, 22, 5, 'market', '2024-03-26 08:55:04', '2024-03-26 08:55:04'),
(4, 30, 5, 'done', '2024-03-27 13:13:21', '2024-03-27 13:27:58'),
(5, 31, 5, 'packing', '2024-03-28 06:39:10', '2024-03-28 06:42:54'),
(6, 32, 5, 'market', '2024-04-02 23:09:45', '2024-04-02 23:09:45'),
(7, 33, 5, 'market', '2024-04-02 23:15:19', '2024-04-02 23:15:19'),
(8, 34, 5, 'market', '2024-04-02 23:15:49', '2024-04-02 23:15:49'),
(9, 35, 5, 'market', '2024-04-02 23:30:54', '2024-04-02 23:30:54'),
(10, 36, 5, 'market', '2024-04-03 00:47:50', '2024-04-03 00:47:50'),
(11, 39, 5, 'market', '2024-04-04 22:01:02', '2024-04-04 22:01:02'),
(12, 40, 5, 'market', '2024-04-05 07:14:08', '2024-04-05 07:14:08');

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
-- Table structure for table `gambars`
--

CREATE TABLE `gambars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambars`
--

INSERT INTO `gambars` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'product1.jpg', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(2, 'product2.jpg', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(3, 'product3.jpg', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(4, 'product4.jpg', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(5, 'product5.jpg', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(6, '1712125338.png', '2024-04-02 23:22:18', '2024-04-02 23:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `kawasans`
--

CREATE TABLE `kawasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kawasan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kawasans`
--

INSERT INTO `kawasans` (`id`, `kawasan`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Kawasan 0', 'Jln. Pantai Indah Kapuk, Jakarta Utara', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(2, 'Kawasan 1', 'Jln. Nagroaceh, Jakarta Selatan', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(3, 'Kawasan 2', 'Jln. Pattimura, Jakarta Timur', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(4, 'Global', 'Global', '2024-03-21 15:49:55', '2024-03-21 15:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `harga` bigint(20) NOT NULL,
  `produk_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `harga`, `produk_id`, `user_id`, `qty`, `created_at`, `updated_at`) VALUES
(37, 36000, 3, 5, 3, '2024-04-05 08:11:17', '2024-04-05 08:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kawasan_id` bigint(20) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `nama`, `kawasan_id`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Market 0', 1, 'market', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(2, 'Market 1', 2, 'market', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(3, 'Market 2', 3, 'market', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(4, 'Global Market', 4, 'global', '2024-03-21 15:49:55', '2024-03-21 15:49:55');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_20_173918_create_transaksis_table', 1),
(7, '2024_03_20_174057_create_produks_table', 1),
(8, '2024_03_20_174115_create_markets_table', 1),
(9, '2024_03_20_175832_create_biodatas_table', 1),
(10, '2024_03_20_180310_create_kawasans_table', 1),
(11, '2024_03_20_180524_create_gambars_table', 1),
(12, '2024_03_20_212610_create_perumahans_table', 1),
(13, '2024_03_21_214833_create_transaksi_details_table', 1),
(14, '2024_03_21_231341_create_terlaris_table', 2),
(15, '2024_03_23_203447_create_keranjangs_table', 3),
(16, '2024_03_25_072240_create_tugas_table', 4),
(17, '2024_03_26_115204_create_deliveris_table', 5),
(18, '2024_03_26_211639_create_sliders_table', 6);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perumahans`
--

CREATE TABLE `perumahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_rumah` varchar(255) NOT NULL,
  `kawasan_id` bigint(20) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perumahans`
--

INSERT INTO `perumahans` (`id`, `nomor_rumah`, `kawasan_id`, `tipe`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A01', 1, '45', 'Lunas', '2024-03-24 22:02:17', '2024-03-24 22:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar_id` bigint(20) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `ketentuan` text NOT NULL,
  `market_id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `produk`, `harga`, `stok`, `gambar_id`, `kategori`, `deskripsi`, `ketentuan`, `market_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sabun Mandi', 3000, 215, 1, 'market', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed facere fugit aperiam atque numquam ea id aspernatur, natus blanditiis quis sequi a magni dignissimos consequatur! Maxime placeat quaerat explicabo itaque provident ipsum nisi dolore sit maiores similique obcaecati, odio nihil quo beatae adipisci illo? Facilis rem repudiandae tempore esse necessitatibus placeat ex molestiae consectetur, saepe officiis id similique, blanditiis pariatur architecto libero adipisci nesciunt veritatis. Debitis quae laborum, libero tempora neque totam quas labore nemo culpa? Ad quisquam iusto esse maxime! Doloribus velit, ea dolorem unde provident natus ut officiis quae nesciunt, eaque, et omnis sunt maxime? Qui iusto aspernatur non asperiores rerum cupiditate! Possimus, aspernatur! Corporis magnam, rem tenetur esse aliquam dignissimos veritatis quisquam pariatur, laboriosam, ut dicta non illum maxime.', '', 1, 'aktif', '2024-03-21 15:49:55', '2024-03-24 04:14:51'),
(2, 'Shampo', 21000, 1167, 2, 'market', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed facere fugit aperiam atque numquam ea id aspernatur, natus blanditiis quis sequi a magni dignissimos consequatur! Maxime placeat quaerat explicabo itaque provident ipsum nisi dolore sit maiores similique obcaecati, odio nihil quo beatae adipisci illo? Facilis rem repudiandae tempore esse necessitatibus placeat ex molestiae consectetur, saepe officiis id similique, blanditiis pariatur architecto libero adipisci nesciunt veritatis. Debitis quae laborum, libero tempora neque totam quas labore nemo culpa? Ad quisquam iusto esse maxime! Doloribus velit, ea dolorem unde provident natus ut officiis quae nesciunt, eaque, et omnis sunt maxime? Qui iusto aspernatur non asperiores rerum cupiditate! Possimus, aspernatur! Corporis magnam, rem tenetur esse aliquam dignissimos veritatis quisquam pariatur, laboriosam, ut dicta non illum maxime.', '', 1, 'aktif', '2024-03-21 15:49:55', '2024-03-24 01:56:11'),
(3, 'Pasta Gigi', 12000, 1027, 3, 'market', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed facere fugit aperiam atque numquam ea id aspernatur, natus blanditiis quis sequi a magni dignissimos consequatur! Maxime placeat quaerat explicabo itaque provident ipsum nisi dolore sit maiores similique obcaecati, odio nihil quo beatae adipisci illo? Facilis rem repudiandae tempore esse necessitatibus placeat ex molestiae consectetur, saepe officiis id similique, blanditiis pariatur architecto libero adipisci nesciunt veritatis. Debitis quae laborum, libero tempora neque totam quas labore nemo culpa? Ad quisquam iusto esse maxime! Doloribus velit, ea dolorem unde provident natus ut officiis quae nesciunt, eaque, et omnis sunt maxime? Qui iusto aspernatur non asperiores rerum cupiditate! Possimus, aspernatur! Corporis magnam, rem tenetur esse aliquam dignissimos veritatis quisquam pariatur, laboriosam, ut dicta non illum maxime.', '', 3, 'aktif', '2024-03-21 15:49:55', '2024-04-02 23:09:45'),
(4, 'Minyak Rambut', 10000, 1051, 4, 'market', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed facere fugit aperiam atque numquam ea id aspernatur, natus blanditiis quis sequi a magni dignissimos consequatur! Maxime placeat quaerat explicabo itaque provident ipsum nisi dolore sit maiores similique obcaecati, odio nihil quo beatae adipisci illo? Facilis rem repudiandae tempore esse necessitatibus placeat ex molestiae consectetur, saepe officiis id similique, blanditiis pariatur architecto libero adipisci nesciunt veritatis. Debitis quae laborum, libero tempora neque totam quas labore nemo culpa? Ad quisquam iusto esse maxime! Doloribus velit, ea dolorem unde provident natus ut officiis quae nesciunt, eaque, et omnis sunt maxime? Qui iusto aspernatur non asperiores rerum cupiditate! Possimus, aspernatur! Corporis magnam, rem tenetur esse aliquam dignissimos veritatis quisquam pariatur, laboriosam, ut dicta non illum maxime.', '', 3, 'aktif', '2024-03-21 15:49:55', '2024-04-05 07:14:08'),
(5, 'Sisir', 15000, 190, 5, 'market', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed facere fugit aperiam atque numquam ea id aspernatur, natus blanditiis quis sequi a magni dignissimos consequatur! Maxime placeat quaerat explicabo itaque provident ipsum nisi dolore sit maiores similique obcaecati, odio nihil quo beatae adipisci illo? Facilis rem repudiandae tempore esse necessitatibus placeat ex molestiae consectetur, saepe officiis id similique, blanditiis pariatur architecto libero adipisci nesciunt veritatis. Debitis quae laborum, libero tempora neque totam quas labore nemo culpa? Ad quisquam iusto esse maxime! Doloribus velit, ea dolorem unde provident natus ut officiis quae nesciunt, eaque, et omnis sunt maxime? Qui iusto aspernatur non asperiores rerum cupiditate! Possimus, aspernatur! Corporis magnam, rem tenetur esse aliquam dignissimos veritatis quisquam pariatur, laboriosam, ut dicta non illum maxime.', '', 1, 'aktif', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(6, 'PDAM Muara Tirta', 125000, 1, 1, 'pdam', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed facere fugit aperiam atque numquam ea id aspernatur, natus blanditiis quis sequi a magni dignissimos consequatur! Maxime placeat quaerat explicabo itaque provident ipsum nisi dolore sit maiores similique obcaecati, odio nihil quo beatae adipisci illo? Facilis rem repudiandae tempore esse necessitatibus placeat ex molestiae consectetur, saepe officiis id similique, blanditiis pariatur architecto libero adipisci nesciunt veritatis. Debitis quae laborum, libero tempora neque totam quas labore nemo culpa? Ad quisquam iusto esse maxime! Doloribus velit, ea dolorem unde provident natus ut officiis quae nesciunt, eaque, et omnis sunt maxime? Qui iusto aspernatur non asperiores rerum cupiditate! Possimus, aspernatur! Corporis magnam, rem tenetur esse aliquam dignissimos veritatis quisquam pariatur, laboriosam, ut dicta non illum maxime.', '', 4, 'aktif', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(7, 'BLH Kota Gorontalo', 15000, 1, 1, 'kebersihan', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed facere fugit aperiam atque numquam ea id aspernatur, natus blanditiis quis sequi a magni dignissimos consequatur! Maxime placeat quaerat explicabo itaque provident ipsum nisi dolore sit maiores similique obcaecati, odio nihil quo beatae adipisci illo? Facilis rem repudiandae tempore esse necessitatibus placeat ex molestiae consectetur, saepe officiis id similique, blanditiis pariatur architecto libero adipisci nesciunt veritatis. Debitis quae laborum, libero tempora neque totam quas labore nemo culpa? Ad quisquam iusto esse maxime! Doloribus velit, ea dolorem unde provident natus ut officiis quae nesciunt, eaque, et omnis sunt maxime? Qui iusto aspernatur non asperiores rerum cupiditate! Possimus, aspernatur! Corporis magnam, rem tenetur esse aliquam dignissimos veritatis quisquam pariatur, laboriosam, ut dicta non illum maxime.', '', 4, 'aktif', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(8, 'Otoritas Jasa Keamanan', 100000, 1, 1, 'keamanan', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed facere fugit aperiam atque numquam ea id aspernatur, natus blanditiis quis sequi a magni dignissimos consequatur! Maxime placeat quaerat explicabo itaque provident ipsum nisi dolore sit maiores similique obcaecati, odio nihil quo beatae adipisci illo? Facilis rem repudiandae tempore esse necessitatibus placeat ex molestiae consectetur, saepe officiis id similique, blanditiis pariatur architecto libero adipisci nesciunt veritatis. Debitis quae laborum, libero tempora neque totam quas labore nemo culpa? Ad quisquam iusto esse maxime! Doloribus velit, ea dolorem unde provident natus ut officiis quae nesciunt, eaque, et omnis sunt maxime? Qui iusto aspernatur non asperiores rerum cupiditate! Possimus, aspernatur! Corporis magnam, rem tenetur esse aliquam dignissimos veritatis quisquam pariatur, laboriosam, ut dicta non illum maxime.', '', 4, 'aktif', '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(9, 'Pasta Gigi Herbal', 2500, 96, 6, 'market', 'HerbaDent bukan sekadar pasta gigi biasa. Ini adalah manifestasi dari filosofi kesehatan holistik, di mana setiap komponen berasal dari sumber alami terbaik, dipilih karena khasiatnya yang luar biasa. Diformulasikan dengan ekstrak mint, neem, dan kayu manis, HerbaDent tidak hanya membersihkan gigi Anda tetapi juga memberikan sensasi kesegaran alami yang tahan lama.', '', 3, 'aktif', '2024-04-02 23:22:18', '2024-04-04 22:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '1711612561.jpg', '2024-03-28 00:56:01', '2024-03-28 00:56:01'),
(2, '1711612627.png', '2024-03-28 00:57:07', '2024-03-28 00:57:07'),
(3, '1711612641.jpg', '2024-03-28 00:57:21', '2024-03-28 00:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `terlaris`
--

CREATE TABLE `terlaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) NOT NULL,
  `terjual` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terlaris`
--

INSERT INTO `terlaris` (`id`, `produk_id`, `terjual`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2024-03-21 16:26:46', '2024-03-21 16:26:46'),
(2, 4, 1, '2024-03-21 16:26:46', '2024-03-21 16:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `checkout_link` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `order_id`, `status`, `harga`, `user_id`, `checkout_link`, `periode`, `kategori`, `created_at`, `updated_at`) VALUES
(1, '34fcea28-689c-469c-8612-f7fa79dfc564', 'capture', 100000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/0fe067b2-a100-4f67-8b2b-1ecd6645df5e', '2024-01', 'keamanan', '2024-03-21 15:53:57', '2024-03-21 15:54:25'),
(2, '754757f2-a46e-4d2c-a2e1-6401b58458af', 'capture', 22000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/6cdfd98a-84f6-44a7-9963-74dcfc3718b6', '2024-02', 'market', '2024-03-21 15:54:33', '2024-03-21 15:54:46'),
(3, 'fb63bd5c-3561-4cb7-ab6a-4634601d5bec', 'capture', 15000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/d8f5fa38-8fd2-4a10-aeb3-a039d3ad2d3d', '2024-01', 'kebersihan', '2024-03-21 15:54:55', '2024-03-21 15:55:06'),
(4, '2838e75b-de93-43b8-98b0-f1e9e990634f', 'capture', 125000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/685c264e-8b5d-4f95-89b5-f5bade3b8f86', '2024-01', 'pdam', '2024-03-21 15:55:11', '2024-03-21 15:55:25'),
(5, 'a17ef286-0dd8-41af-8f53-c65086e07ad1', 'pending', 22000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/1d77596d-4d53-43e8-8702-cded39f4cf6b', '2024-02', 'market', '2024-03-21 16:25:21', '2024-03-21 16:25:21'),
(6, '19e68114-bd78-458d-b033-33851029521b', 'capture', 22000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/3ed6a2c7-91be-4d09-98bb-80ec9b229703', '2024-02', 'market', '2024-03-21 16:26:46', '2024-03-21 16:27:05'),
(7, '316259a3-5c5c-47c5-9f6e-95c84202520a', 'pending', 100000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/aa5afee9-eae5-42f4-878a-72a6500e2280', '2024-02', 'keamanan', '2024-03-23 07:52:16', '2024-03-23 07:52:16'),
(8, 'dd6e353a-e004-4537-9414-a1558a3c4cb7', 'pending', 100000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/23c0cb44-60bc-4491-b722-60de0d2d3dd3', '2024-02', 'keamanan', '2024-03-23 08:02:40', '2024-03-23 08:02:40'),
(9, '69a56cd0-46b0-4ce0-b363-22f77c7ec24b', 'pending', 100000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/30a8c2d9-e887-4a0c-a967-62ad5a87a3ac', '2024-02', 'keamanan', '2024-03-23 08:12:19', '2024-03-23 08:12:19'),
(10, '0cddae18-0f81-4d68-97cd-d6454c3120c0', 'pending', 100000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/02ddbdbf-e908-4acf-9a65-6a1058a1e654', '2024-02', 'keamanan', '2024-03-23 08:13:30', '2024-03-23 08:13:30'),
(11, '98fd6868-32a7-4799-8444-16a4a81346c3', 'capture', 100000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/e396e903-da75-4c1d-95c9-d5889a1090e5', '2024-02', 'keamanan', '2024-03-23 08:19:02', '2024-03-23 08:22:00'),
(12, 'a3fd97f5-24b6-4acf-a671-ef0c5c846441', 'capture', 100000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/5e8c3605-7cb2-4f0d-8fab-286a6f82c991', '2024-02', 'pdam', '2024-03-23 09:04:36', '2024-03-23 09:05:17'),
(13, '8ed4aa94-0339-4669-bc62-dc022e26d1e4', 'capture', 125000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/e60480be-144e-4433-94a0-879d273411a4', '2024-02', 'pdam', '2024-03-23 09:18:34', '2024-03-23 09:18:59'),
(14, '495f84d5-1071-46bc-a24d-87fda547feda', 'capture', 15000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/165be845-de3f-4f31-b77e-13461855bdeb', '2024-02', 'kebersihan', '2024-03-23 09:19:23', '2024-03-23 09:19:42'),
(15, '1ff3e678-4595-48be-a56b-8b6931ca0f47', 'pending', 225000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/b0c1ae1e-b42a-4ba6-a7f4-51eff4747048', '2024-03', 'market', '2024-03-24 01:41:29', '2024-03-24 01:41:29'),
(16, 'f5641619-8d90-462f-b554-6a1636f14d85', 'pending', 225000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/2d16cbb4-0785-4912-adb0-aaaf614ab2af', '2024-03', 'market', '2024-03-24 01:43:18', '2024-03-24 01:43:18'),
(17, '2168b0ef-17bd-4266-a955-2fefcd6b33ed', 'pending', 225000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/57c08fe3-dde6-4234-b57e-80b4cbdba367', '2024-03', 'market', '2024-03-24 01:43:35', '2024-03-24 01:43:35'),
(18, 'defbfc7e-716d-403b-b2f1-3a5dad0aca9b', 'pending', 225000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/b4ed9bfe-d407-433c-ab88-0e220d15d8ca', '2024-03', 'market', '2024-03-24 01:45:01', '2024-03-24 01:45:01'),
(19, '56c6564c-e24a-4ba0-a5f8-da725cbd2979', 'pending', 225000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/1e738f95-5954-4914-81bb-ab3bec94c942', '2024-03', 'market', '2024-03-24 01:45:14', '2024-03-24 01:45:14'),
(20, 'dd3ec35b-2cf2-45d5-85fb-8d7b25eba44c', 'pending', 225000, 5, 'cod', '2024-03', 'market', '2024-03-24 01:45:40', '2024-03-24 01:45:40'),
(21, 'b13f898b-5b32-4252-a73b-9ea9404bb949', 'pending', 225000, 5, 'cod', '2024-03', 'market', '2024-03-24 01:51:46', '2024-03-24 01:51:46'),
(22, 'deebf2a4-62db-40bb-a070-91fffe1b24f1', 'pending', 225000, 5, 'cod', '2024-03', 'market', '2024-03-24 01:52:51', '2024-03-24 01:52:51'),
(23, '2317bbec-f494-47fc-ba5b-784f6aab06af', 'capture', 69000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/3b6e0467-d98d-4a8b-8e72-896c4531c214', '2024-03', 'market', '2024-03-24 01:56:11', '2024-03-24 01:56:59'),
(24, 'f8303a84-c094-40b9-9c92-9e1ead0c9eab', 'capture', 30000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/2c270abd-1da8-4b4e-8a43-8bc96a7e3953', '2024-03', 'market', '2024-03-24 04:14:50', '2024-03-24 04:15:10'),
(25, '4e5e1c0c-bd59-4708-b41e-4ac3eb766647', 'capture', 24000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/684fbd4e-5202-4080-88eb-5066fad37e8c', '2024-03', 'market', '2024-03-24 04:18:57', '2024-03-24 04:19:13'),
(26, '4cb0bcb5-acd3-47a0-86ab-43f0b3666d12', 'capture', 24000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/80762990-d2b3-4a8c-9561-6f20c643e76f', '2024-03', 'market', '2024-03-24 04:21:55', '2024-03-24 04:22:11'),
(27, 'a1d9a953-005d-44ac-92ff-4b35f1466228', 'capture', 24000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/4ffaa222-48bd-4a53-808b-137c4f1b4f32', '2024-03', 'market', '2024-03-24 04:34:08', '2024-03-24 04:34:34'),
(28, 'ffa3111b-cf57-4f87-a789-aaef60a75e93', 'capture', 20000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/a1ed27e3-e567-440e-8ad8-085d0b4ac557', '2024-03', 'market', '2024-03-24 09:28:09', '2024-03-24 09:28:29'),
(29, '0043bf69-0528-4e59-84dc-e0bdcac8d21d', 'capture', 22000, 5, 'https://app.sandbox.midtrans.com/snap/v3/redirection/e0f3654d-1cf0-4668-b9d7-154ada824aba', '2024-03', 'market', '2024-03-24 09:32:21', '2024-03-24 09:32:44'),
(30, '04141f4e-bbac-4cac-84af-1b337d57c3c5', 'pending', 10000, 5, 'cod', '2024-03', 'market', '2024-03-27 13:13:21', '2024-03-27 13:13:21'),
(31, '2bc54940-19c2-4fe5-b0d7-b093bf220062', 'pending', 56000, 5, 'cod', '2024-03', 'market', '2024-03-28 06:39:10', '2024-03-28 06:39:10'),
(32, '1a7993d7-472e-4113-9995-d5c850694970', 'pending', 12000, 5, 'https://app.midtrans.com/snap/v4/redirection/b1ee4fff-512e-4036-96df-2732eb866623', '2024-04', 'market', '2024-04-02 23:09:45', '2024-04-02 23:09:45'),
(33, '60d61f11-ae0a-4bb5-ba18-580375d132d6', 'pending', 20000, 5, 'https://app.midtrans.com/snap/v4/redirection/6f792572-a294-41d6-9887-a5da13de996c', '2024-04', 'market', '2024-04-02 23:15:19', '2024-04-02 23:15:19'),
(34, '69cf4d2e-6d52-42c5-af4b-1315f7f432f0', 'pending', 10000, 5, 'https://app.midtrans.com/snap/v4/redirection/4bbf1d70-4665-4fa6-864a-c9f5b42c17b6', '2024-04', 'market', '2024-04-02 23:15:49', '2024-04-02 23:15:49'),
(35, 'fe4b1b25-5ad0-43a0-9cad-c784e8885c9d', 'pending', 5000, 5, 'https://app.midtrans.com/snap/v4/redirection/eff13224-a778-4164-9dca-cf8930a2cf5f', '2024-04', 'market', '2024-04-02 23:30:54', '2024-04-02 23:30:54'),
(36, '3230cf57-ff53-46fe-b483-79bf408e9c70', 'pending', 2500, 5, 'https://app.midtrans.com/snap/v4/redirection/3973c5db-aab7-4373-9b59-4c059a8f974d', '2024-04', 'market', '2024-04-03 00:47:50', '2024-04-03 00:47:50'),
(37, 'e11ce3c8-8da6-4877-8879-a8d940c78bcb', 'pending', 125000, 5, 'https://app.midtrans.com/snap/v4/redirection/8d3afdef-1c69-44ee-a43f-46c240cfd738', '2024-03', 'pdam', '2024-04-03 09:06:31', '2024-04-03 09:06:31'),
(38, '348f6130-2cbf-4a17-a062-f96ccb2830a8', 'pending', 125000, 5, 'https://app.midtrans.com/snap/v4/redirection/4ef9c63a-f735-4d05-94df-095938c2605c', '2024-03', 'pdam', '2024-04-03 09:08:55', '2024-04-03 09:08:55'),
(39, 'e9b46416-a9a4-468b-a3d5-7dad919f25af', 'pending', 2500, 5, 'https://app.midtrans.com/snap/v4/redirection/cc893e9d-ea43-4921-8abd-a5083803535a', '2024-04', 'market', '2024-04-04 22:01:02', '2024-04-04 22:01:02'),
(40, 'd7f8c42b-311b-44ec-b68c-807056376a69', 'pending', 20000, 5, 'https://app.midtrans.com/snap/v4/redirection/48846898-f096-44da-9eea-41fac1cd6bc9', '2024-04', 'market', '2024-04-05 07:14:08', '2024-04-05 07:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_details`
--

CREATE TABLE `transaksi_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `transaksi_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_details`
--

INSERT INTO `transaksi_details` (`id`, `produk_id`, `qty`, `transaksi_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 1, '2024-03-21 15:53:57', '2024-03-21 15:53:57'),
(2, 3, 1, 2, '2024-03-21 15:54:33', '2024-03-21 15:54:33'),
(3, 4, 1, 2, '2024-03-21 15:54:33', '2024-03-21 15:54:33'),
(4, 7, 1, 3, '2024-03-21 15:54:55', '2024-03-21 15:54:55'),
(5, 6, 1, 4, '2024-03-21 15:55:11', '2024-03-21 15:55:11'),
(6, 3, 1, 5, '2024-03-21 16:25:21', '2024-03-21 16:25:21'),
(7, 3, 1, 6, '2024-03-21 16:26:46', '2024-03-21 16:26:46'),
(8, 4, 1, 6, '2024-03-21 16:26:46', '2024-03-21 16:26:46'),
(9, 8, 1, 7, '2024-03-23 07:52:16', '2024-03-23 07:52:16'),
(10, 8, 1, 8, '2024-03-23 08:02:40', '2024-03-23 08:02:40'),
(11, 8, 1, 9, '2024-03-23 08:12:19', '2024-03-23 08:12:19'),
(12, 8, 1, 10, '2024-03-23 08:13:30', '2024-03-23 08:13:30'),
(13, 8, 1, 11, '2024-03-23 08:19:02', '2024-03-23 08:19:02'),
(14, 8, 1, 12, '2024-03-23 09:04:36', '2024-03-23 09:04:36'),
(15, 6, 1, 13, '2024-03-23 09:18:34', '2024-03-23 09:18:34'),
(16, 7, 1, 14, '2024-03-23 09:19:23', '2024-03-23 09:19:23'),
(17, 1, 5, 20, '2024-03-24 01:45:40', '2024-03-24 01:45:40'),
(18, 2, 10, 20, '2024-03-24 01:45:40', '2024-03-24 01:45:40'),
(19, 1, 5, 21, '2024-03-24 01:51:46', '2024-03-24 01:51:46'),
(20, 2, 10, 21, '2024-03-24 01:51:46', '2024-03-24 01:51:46'),
(21, 1, 5, 22, '2024-03-24 01:52:51', '2024-03-24 01:52:51'),
(22, 2, 10, 22, '2024-03-24 01:52:51', '2024-03-24 01:52:51'),
(23, 2, 3, 23, '2024-03-24 01:56:11', '2024-03-24 01:56:11'),
(24, 1, 2, 23, '2024-03-24 01:56:11', '2024-03-24 01:56:11'),
(25, 1, 2, 24, '2024-03-24 04:14:51', '2024-03-24 04:14:51'),
(26, 3, 2, 24, '2024-03-24 04:14:51', '2024-03-24 04:14:51'),
(27, 3, 2, 25, '2024-03-24 04:18:57', '2024-03-24 04:18:57'),
(28, 3, 2, 26, '2024-03-24 04:21:55', '2024-03-24 04:21:55'),
(29, 3, 2, 27, '2024-03-24 04:34:08', '2024-03-24 04:34:08'),
(30, 4, 1, 28, '2024-03-24 09:28:09', '2024-03-24 09:28:09'),
(31, 4, 1, 28, '2024-03-24 09:28:09', '2024-03-24 09:28:09'),
(32, 3, 1, 29, '2024-03-24 09:32:21', '2024-03-24 09:32:21'),
(33, 4, 1, 29, '2024-03-24 09:32:21', '2024-03-24 09:32:21'),
(34, 4, 1, 30, '2024-03-27 13:13:21', '2024-03-27 13:13:21'),
(35, 3, 1, 31, '2024-03-28 06:39:10', '2024-03-28 06:39:10'),
(36, 4, 1, 31, '2024-03-28 06:39:10', '2024-03-28 06:39:10'),
(37, 4, 1, 31, '2024-03-28 06:39:10', '2024-03-28 06:39:10'),
(38, 3, 2, 31, '2024-03-28 06:39:10', '2024-03-28 06:39:10'),
(39, 3, 1, 32, '2024-04-02 23:09:45', '2024-04-02 23:09:45'),
(40, 4, 1, 33, '2024-04-02 23:15:19', '2024-04-02 23:15:19'),
(41, 4, 1, 33, '2024-04-02 23:15:19', '2024-04-02 23:15:19'),
(42, 4, 1, 34, '2024-04-02 23:15:49', '2024-04-02 23:15:49'),
(43, 9, 1, 35, '2024-04-02 23:30:54', '2024-04-02 23:30:54'),
(44, 9, 1, 35, '2024-04-02 23:30:54', '2024-04-02 23:30:54'),
(45, 9, 1, 36, '2024-04-03 00:47:50', '2024-04-03 00:47:50'),
(46, 6, 1, 37, '2024-04-03 09:06:32', '2024-04-03 09:06:32'),
(47, 6, 1, 38, '2024-04-03 09:08:55', '2024-04-03 09:08:55'),
(48, 9, 1, 39, '2024-04-04 22:01:02', '2024-04-04 22:01:02'),
(49, 4, 2, 40, '2024-04-05 07:14:08', '2024-04-05 07:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `kawasan_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$wCXPlZglD.aCX6CS4ee4ZOGrd1vaqkCTMIg8qU0DdjP3sazh.FQ9G', 'super_administrator', NULL, '2024-03-21 15:49:54', '2024-03-21 15:49:54'),
(2, 'Kawasan I', 'kawasan1@gmail.com', NULL, '$2y$12$oawPSK3droC6PYueSBWK.ubTOakjuEMD2Wx8Xz4TZTHyWurLd3Ti6', 'administrator', NULL, '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(3, 'Kawasan II', 'kawasan2@gmail.com', NULL, '$2y$12$TKhwV.NSlEtUnEtYXc4FeetNl0jVRCewX6pNE8Mkg7S5ieVaVIaRu', 'administrator', NULL, '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(4, 'Kawasan III', 'kawasan3@gmail.com', NULL, '$2y$12$18/LHFEX43h16bM4PAjLLeekkNETbpYpVLQbxz/Frt93xTOemeUPO', 'administrator', NULL, '2024-03-21 15:49:55', '2024-03-21 15:49:55'),
(5, 'Member', 'member@gmail.com', NULL, '$2y$12$8v0E77ylnkURdNdHpUYUreyI/eI2IXQRCxsttbMT2821UCkpwQFH6', 'member', NULL, '2024-03-21 15:49:55', '2024-03-21 15:49:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveris`
--
ALTER TABLE `deliveris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gambars`
--
ALTER TABLE `gambars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kawasans`
--
ALTER TABLE `kawasans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `perumahans`
--
ALTER TABLE `perumahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terlaris`
--
ALTER TABLE `terlaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
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
-- AUTO_INCREMENT for table `biodatas`
--
ALTER TABLE `biodatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliveris`
--
ALTER TABLE `deliveris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambars`
--
ALTER TABLE `gambars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kawasans`
--
ALTER TABLE `kawasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perumahans`
--
ALTER TABLE `perumahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terlaris`
--
ALTER TABLE `terlaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
