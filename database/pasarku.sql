-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2021 pada 14.58
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasarku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banks`
--

INSERT INTO `banks` (`id`, `no_rek`, `nama_bank`, `created_at`, `updated_at`) VALUES
(1, '8055280726', 'BCA', '2021-08-13 03:47:45', '2021-08-13 03:47:45'),
(2, '0602388205', 'BNI', '2021-08-13 03:48:15', '2021-08-13 03:48:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `qty`, `subtotal`, `status`, `created_at`, `updated_at`, `transaction_id`) VALUES
(8, 3, 1, 2, 150000, 1, '2021-08-15 01:00:52', '2021-08-21 00:36:01', 6),
(9, 3, 2, 2, 255000, 1, '2021-08-15 01:24:42', '2021-08-21 00:30:35', 7),
(10, 3, 2, 2, 255000, 1, '2021-08-15 01:36:23', '2021-08-21 00:30:35', 9),
(11, 3, 3, 1, 56000, 1, '2021-08-15 01:37:34', '2021-08-15 02:24:29', 10),
(12, 3, 3, 1, 56000, 1, '2021-08-15 01:37:54', '2021-08-15 02:24:29', 10),
(13, 3, 4, 1, 25000, 1, '2021-08-15 02:16:11', '2021-08-15 02:24:29', 10),
(15, 4, 7, 1, 150000, 1, '2021-08-21 00:02:38', '2021-08-21 00:03:35', 11),
(16, 4, 3, 1, 56000, 1, '2021-08-21 00:02:48', '2021-08-21 00:03:35', 11),
(17, 4, 2, 2, 255000, 0, '2021-08-21 00:16:37', '2021-08-21 00:30:35', NULL),
(19, 4, 1, 2, 150000, 0, '2021-08-21 00:35:52', '2021-08-21 00:36:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'category.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama`, `icon`, `created_at`, `updated_at`) VALUES
(12, 'Skincare', '1628846740_skincare.png', '2021-07-24 04:15:50', '2021-08-13 02:25:40'),
(13, 'Kesehatan', '1628846751_medicine.png', '2021-07-24 04:17:28', '2021-08-13 02:25:51'),
(14, 'Buku dan Alat Tulis', '1628846761_stationary.png', '2021-07-24 04:18:12', '2021-08-13 02:26:01'),
(15, 'Baju', '1628846770_shirts.png', '2021-07-24 05:34:00', '2021-08-13 02:26:10'),
(18, 'Jam Tangan', '1628846780_smartwatch.png', '2021-07-25 00:36:08', '2021-08-13 02:26:20'),
(19, 'Minuman', '1628846795_soft-drink.png', '2021-07-25 00:40:15', '2021-08-13 02:26:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `city`, `state_id`) VALUES
(1, '2021-08-13 02:32:59', '2021-08-13 02:32:59', 'Palembang', 1),
(2, '2021-08-13 02:33:09', '2021-08-13 02:33:09', 'Muara Enim', 1),
(3, '2021-08-13 02:33:18', '2021-08-13 02:33:18', 'Kayu Agung', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurirs`
--

CREATE TABLE `kurirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kurir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kurirs`
--

INSERT INTO `kurirs` (`id`, `nama_kurir`, `ongkir`, `created_at`, `updated_at`) VALUES
(1, 'J&T', 20000, '2021-08-13 20:36:20', '2021-08-13 20:36:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_11_044652_create_categories_table', 1),
(61, '2021_07_18_083626_create_products_table', 2),
(62, '2021_07_25_044133_add_icon_to_categories_table', 2),
(63, '2021_07_25_080028_create_photos_table', 2),
(64, '2021_08_01_042214_add_level_to_users_table', 2),
(65, '2021_08_07_023650_create_states_table', 2),
(66, '2021_08_07_023850_create_cities_table', 2),
(67, '2021_08_07_030902_create_banks_table', 3),
(68, '2021_08_07_031245_create_kurirs_table', 3),
(69, '2021_08_08_042013_create_carts_table', 3),
(70, '2021_08_08_091140_add_total_to_carts_table', 3),
(71, '2021_08_14_034131_create_numbers_table', 4),
(73, '2021_08_14_040620_create_transactions_table', 5),
(74, '2021_08_14_042846_add_column_to_carts_table', 6),
(75, '2021_08_14_045352_add_alamat_to_transactions_table', 7),
(76, '2021_08_14_062908_add_total_to_transactions_table', 8),
(77, '2021_08_21_024807_add_column_to_products_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `numbers`
--

CREATE TABLE `numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `angka` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `numbers`
--

INSERT INTO `numbers` (`id`, `angka`, `created_at`, `updated_at`) VALUES
(1, 16, NULL, '2021-08-21 00:03:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `photos`
--

INSERT INTO `photos` (`id`, `nama_photo`, `status`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '1628846817_acfa700f62cccf4a0c24213a2fb14a59.jfif', 0, 1, '2021-08-09 20:28:12', '2021-08-13 02:26:57'),
(2, '1628566127_7868438_91fc1ccf-99e4-486b-b560-46e893e38d26_1075_1075.jpg', 0, 2, '2021-08-09 20:28:47', '2021-08-09 20:28:47'),
(3, '1628846871_c01a8e716cce9317962b31f4245f8837.jfif', 0, 3, '2021-08-13 02:27:51', '2021-08-13 02:27:51'),
(4, '1628846924_shirts.png', 0, 4, '2021-08-13 02:28:44', '2021-08-13 02:28:44'),
(5, '1628846953_fs3.jpg', 0, 5, '2021-08-13 02:29:13', '2021-08-13 02:29:13'),
(6, '1628847042_REST_xib-720x720-FIT_AND_TRIM-95691570c65a9bd9253f7ef8c1533f44.jpeg', 0, 6, '2021-08-13 02:30:11', '2021-08-13 02:30:42'),
(7, '1629514518_corona-extra-355ml-24-bottle.jpg', 0, 7, '2021-08-20 19:55:18', '2021-08-20 19:55:18'),
(8, '1629514589_product_1560326237_Olay_Tot_800x800.png', 0, 8, '2021-08-20 19:56:29', '2021-08-20 19:56:29'),
(9, '1629514804_lvS027988787-1.jpg', 0, 9, '2021-08-20 20:00:04', '2021-08-20 20:00:04'),
(10, '1629514835_Kerangka-Angka-Arab-Islam-Jam-Tangan-Pria-dan-Wanita-Kualitas-Jepang-Gerakan-Tahan-Air.jpg_q50.jpg', 0, 10, '2021-08-20 20:00:35', '2021-08-20 20:00:35'),
(11, '1629514893_82313c141522cfda231ae3e304cebb02.jpg', 0, 11, '2021-08-20 20:01:05', '2021-08-20 20:01:33'),
(12, '1629514942_Jaket_Wanita_Cute_Biscuit_Hooded_Jacket_Jaket_Lucu_Japan_Kor.jfif', 0, 12, '2021-08-20 20:02:22', '2021-08-20 20:02:22'),
(13, '1629515187_2f1059a76b74c3e02b73b29be2e6ace3.jfif', 0, 13, '2021-08-20 20:06:10', '2021-08-20 20:06:27'),
(14, '1629515214_larutan-kaki-tiga-jeruk-kaleng-320ml-1.jpg', 0, 14, '2021-08-20 20:06:54', '2021-08-20 20:06:54'),
(15, '1629515240_Emina-Bright-Stuff-for-Acne-Prone-Skin-Moisturizing-Cream.jpg', 0, 15, '2021-08-20 20:07:20', '2021-08-20 20:07:20'),
(16, '1629515262_cover_w640_h596_artikel-3.jpg', 0, 16, '2021-08-20 20:07:42', '2021-08-20 20:07:42'),
(17, '1629515290_Apotek_Online_Farmaku_com_Vitalong_C_+_Zinc_30S.jpg', 0, 17, '2021-08-20 20:08:10', '2021-08-20 20:08:10'),
(18, '1629515315_121edc592d24bb9635943c9178569081.jfif', 0, 18, '2021-08-20 20:08:35', '2021-08-20 20:08:35'),
(19, '1629515353_1b5fd452-0661-423e-8f7f-85e2e590dee3_11.jpeg', 0, 19, '2021-08-20 20:09:13', '2021-08-20 20:09:13'),
(20, '1629515373_112840_f.jpg', 0, 20, '2021-08-20 20:09:33', '2021-08-20 20:09:33'),
(21, '1629515547_2443252_644037e7-04be-4f4d-880a-a71fa20f4b73.jpg', 0, 21, '2021-08-20 20:12:27', '2021-08-20 20:12:27'),
(22, '1629515568_6ca3d88ad89c3e99e5ceb8c34c1db5b0.jfif', 0, 22, '2021-08-20 20:12:48', '2021-08-20 20:12:48'),
(23, '1629515595_1e2fd514d2ac4495a03ec3f52bd51947.jfif', 0, 23, '2021-08-20 20:13:15', '2021-08-20 20:13:15'),
(24, '1629515618_10193717_1.jpg', 0, 24, '2021-08-20 20:13:38', '2021-08-20 20:13:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `deskripsi_barang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `promo` int(11) NOT NULL DEFAULT 0,
  `rekomendasi` int(11) NOT NULL DEFAULT 0,
  `terjual` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama_barang`, `harga_barang`, `stok_barang`, `deskripsi_barang`, `category_id`, `created_at`, `updated_at`, `promo`, `rekomendasi`, `terjual`) VALUES
(1, 'Cosrx', 150000, 100, 'Dari siput pilihan', 12, '2021-08-09 20:28:04', '2021-08-20 22:07:24', 1, 1, 0),
(2, 'Blackmore', 255000, 50, 'Obat', 13, '2021-08-09 20:28:39', '2021-08-09 20:28:39', 0, 0, 0),
(3, 'Kamus', 56000, 99, 'Jadilah wibu yang handal', 14, '2021-08-13 02:27:35', '2021-08-21 00:03:35', 1, 0, 1),
(4, 'kaos', 25000, 20, 'kaos badan', 15, '2021-08-13 02:28:31', '2021-08-20 22:07:35', 0, 1, 0),
(5, 'Kaki', 25000, 50, 'Jam tangan yang bisa dipakai di kaki', 18, '2021-08-13 02:29:08', '2021-08-20 22:07:37', 1, 0, 0),
(6, 'Xibabo', 25000, 100, 'Minuman yang bisa dimakan', 19, '2021-08-13 02:29:59', '2021-08-13 02:30:42', 0, 0, 0),
(7, 'Corona', 150000, 99, 'Virus yang bisa diminum', 19, '2021-08-20 19:55:13', '2021-08-21 00:03:35', 0, 0, 1),
(8, 'Olay', 150000, 100, 'Agar tidak tua', 12, '2021-08-20 19:56:24', '2021-08-20 22:07:40', 0, 1, 0),
(9, 'Enervon', 56000, 22, 'Obat', 13, '2021-08-20 19:59:58', '2021-08-20 19:59:58', 0, 0, 0),
(10, 'Jam Arab', 255000, 2, 'Berasa di Arab', 18, '2021-08-20 20:00:30', '2021-08-20 20:00:30', 0, 0, 0),
(11, 'Arab', 25000, 2, 'Kamus', 14, '2021-08-20 20:00:59', '2021-08-20 20:01:33', 0, 0, 0),
(12, 'Jaket', 150000, 100, 'Lucu', 15, '2021-08-20 20:02:03', '2021-08-20 20:02:03', 0, 0, 0),
(13, 'Cap', 1500, 2, 'Cap kaki tiga', 19, '2021-08-20 20:06:05', '2021-08-20 20:06:27', 0, 0, 0),
(14, 'Tiga', 56000, 50, 'Rasa melon', 19, '2021-08-20 20:06:49', '2021-08-20 20:06:49', 0, 0, 0),
(15, 'Emina', 25000, 2, 'Cuci muka', 12, '2021-08-20 20:07:14', '2021-08-20 20:07:14', 0, 0, 0),
(16, 'Liptint', 255000, 2, 'Warna warni', 12, '2021-08-20 20:07:37', '2021-08-20 20:07:37', 0, 0, 0),
(17, 'Vitalong', 150000, 2, 'Daya tahan tubuh', 13, '2021-08-20 20:08:04', '2021-08-20 20:08:04', 0, 0, 0),
(18, 'Zinc', 23000, 100, 'Zinc', 13, '2021-08-20 20:08:28', '2021-08-20 20:08:28', 0, 0, 0),
(19, 'Anak', 150000, 25, 'Mengajari anak', 14, '2021-08-20 20:09:07', '2021-08-20 20:09:07', 0, 0, 0),
(20, 'Indonesia', 56000, 100, 'Buku anak', 14, '2021-08-20 20:09:28', '2021-08-20 20:09:28', 0, 0, 0),
(21, 'Putih', 56000, 2, 'Baju warna putih', 15, '2021-08-20 20:12:22', '2021-08-20 20:12:22', 0, 0, 0),
(22, 'Hitam', 25000, 2, 'Baju warna hitam', 15, '2021-08-20 20:12:44', '2021-08-20 20:12:44', 0, 0, 0),
(23, 'Dinding', 23000, 100, 'Jam yang menempel di dinding', 18, '2021-08-20 20:13:11', '2021-08-20 20:13:11', 0, 0, 0),
(24, 'Beker', 255000, 2, 'Jam yang bisa bunyi', 18, '2021-08-20 20:13:34', '2021-08-20 20:13:34', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `states`
--

INSERT INTO `states` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Sumatera Selatan', '2021-08-13 02:32:48', '2021-08-13 02:32:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `kurir_id` bigint(20) UNSIGNED NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `bank_id`, `kurir_id`, `no_invoice`, `created_at`, `updated_at`, `alamat`, `total`) VALUES
(6, 1, 1, 'INV-PK-15082021-11', '2021-08-15 01:00:59', '2021-08-15 01:00:59', 'Jakarta Timur 1', 150000),
(7, 1, 1, 'INV-PK-15082021-12', '2021-08-15 01:25:12', '2021-08-15 01:25:12', 'Jakarta Timur 1', 255000),
(8, 1, 1, 'INV-PK-15082021-13', '2021-08-15 01:25:40', '2021-08-15 01:25:40', 'Jakarta Timur 1', 0),
(9, 1, 1, 'INV-PK-15082021-14', '2021-08-15 01:36:28', '2021-08-15 01:36:28', 'Jakarta Timur 1', 255000),
(10, 1, 1, 'INV-PK-15082021-15', '2021-08-15 02:24:29', '2021-08-15 02:24:29', 'Jakarta Timur 1', 137000),
(11, 1, 1, 'INV-PK-21082021-16', '2021-08-21 00:03:35', '2021-08-21 00:03:35', 'Jakarta Timur 1', 206000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `level`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Selli', 'selliimeliasari@gmail.com', NULL, '$2y$10$zHOycqhCm1YVuq3RuKKkL.Qu8DcXkvehwg7yqLu9w9iZkahLkYqcS', NULL, '2021-07-31 00:40:08', '2021-07-31 00:40:08'),
(2, 0, 'Selli Imelia Sari', 'selliimeliasari2@gmail.com', NULL, '$2y$10$s8If0bQai5ky1IK5eONG1Ok43aSCPcuFHrXM7g229exSgp//MTGyy', NULL, '2021-07-31 00:41:02', '2021-07-31 00:41:02'),
(3, 3, 'Selli Imelia', 'selliimeliasari3@gmail.com', NULL, '$2y$10$84JvlNL0DHWUd18ZzkP4J.lpxbkF4v0ky/q8V2ldqrB1exNC/Iyx2', NULL, '2021-08-01 00:51:32', '2021-08-01 00:51:32'),
(4, 3, 'costumer', 'costumer@gmail.com', NULL, '$2y$10$cgYYBomhvuYtnRKzaInHU.zjzcpRAw3xDQEdjWutUTmNXbsubMuzO', NULL, '2021-08-20 19:30:16', '2021-08-20 19:30:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_transaction_id_foreign` (`transaction_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kurirs`
--
ALTER TABLE `kurirs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `numbers`
--
ALTER TABLE `numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_nama_barang_unique` (`nama_barang`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_bank_id_foreign` (`bank_id`),
  ADD KEY `transactions_kurir_id_foreign` (`kurir_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kurirs`
--
ALTER TABLE `kurirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `numbers`
--
ALTER TABLE `numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Ketidakleluasaan untuk tabel `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_kurir_id_foreign` FOREIGN KEY (`kurir_id`) REFERENCES `kurirs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
