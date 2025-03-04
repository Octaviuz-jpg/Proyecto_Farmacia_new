-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2025 a las 16:52:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_farmacia_new`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analista`
--

CREATE TABLE `analista` (
  `analista_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `analista`
--

INSERT INTO `analista` (`analista_id`, `nombre`, `apellido`) VALUES
(21, 'Octavio', 'Malave'),
(22, 'Miguel', 'Permia'),
(23, 'Raiza', 'Rondon'),
(24, 'Sonic', 'Theedgeddog');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `cargo_id` int(11) NOT NULL,
  `cargo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`cargo_id`, `cargo`) VALUES
(1, 'administrativo'),
(2, 'farmaceutico'),
(3, 'pasante'),
(4, 'auxilar de farmacia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `compra_id` int(11) NOT NULL,
  `pedido_proveedor_id` int(11) DEFAULT NULL,
  `forma_pago` varchar(255) DEFAULT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado_pago` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`compra_id`, `pedido_proveedor_id`, `forma_pago`, `fecha_pago`, `estado_pago`) VALUES
(1, 4, '15d', '2024-09-09 03:28:59', 1),
(2, 1, '15d', '2024-08-12 15:21:40', 0),
(3, 1, 'contado', '2024-05-08 16:30:00', 0),
(4, 6, 'contado', '2024-04-08 01:19:46', 0),
(5, 4, '30d', '2024-12-28 03:35:37', 0),
(6, 2, '30d', '2024-10-15 18:19:35', 0),
(7, 4, '15d', '2024-05-03 20:52:36', 1),
(8, 5, '15d', '2024-06-11 04:15:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `historial_cargos`
--

CREATE TABLE `historial_cargos` (
  `historial_cargo_id` int(11) NOT NULL,
  `cargo_id` int(11) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tiempo_inicio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tiempo_final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_cargos`
--

INSERT INTO `historial_cargos` (`historial_cargo_id`, `cargo_id`, `personal_id`, `descripcion`, `tiempo_inicio`, `tiempo_final`) VALUES
(1, 1, 1, NULL, '2020-07-22 11:55:43', '2020-10-13 11:36:13'),
(2, 1, 1, NULL, '2021-07-16 23:20:01', '2021-09-19 03:33:21'),
(3, 1, 2, NULL, '2020-07-12 01:54:04', '2020-12-18 17:48:55'),
(4, 4, 2, NULL, '2021-07-18 04:00:46', '2021-12-06 18:15:05'),
(5, 2, 3, NULL, '2020-06-08 23:33:02', '2020-06-20 11:39:10'),
(6, 1, 3, NULL, '2020-08-05 12:49:31', '2021-06-12 12:56:22'),
(7, 4, 4, NULL, '2020-10-22 18:07:05', '2021-08-03 10:07:48'),
(8, 4, 4, NULL, '2021-08-14 15:58:58', '2022-03-01 06:07:02'),
(9, 1, 5, NULL, '2020-10-19 10:17:09', '2020-12-18 10:14:02'),
(10, 1, 5, NULL, '2021-05-20 21:32:07', '2022-03-01 02:47:07'),
(11, 2, 6, NULL, '2021-01-11 03:53:25', '2022-01-08 11:22:58'),
(12, 1, 6, NULL, '2022-07-25 14:42:57', '2023-05-02 03:45:30'),
(13, 4, 7, NULL, '2020-12-20 19:06:27', '2021-09-12 01:36:43'),
(14, 3, 7, NULL, '2022-07-22 03:04:22', '2023-04-25 01:37:02'),
(15, 2, 8, NULL, '2020-03-19 06:21:58', '2020-10-23 04:05:42'),
(16, 2, 8, NULL, '2021-06-02 07:49:51', '2022-04-15 10:31:00'),
(17, 2, 9, NULL, '2020-07-04 13:17:58', '2021-02-10 12:25:06'),
(18, 3, 9, NULL, '2021-02-25 18:04:54', '2021-10-06 17:33:44'),
(19, 1, 10, NULL, '2020-08-09 20:03:30', '2021-06-06 17:05:08'),
(20, 4, 10, NULL, '2022-03-16 05:17:03', '2022-10-30 15:22:03'),
(21, 1, 11, NULL, '2020-03-13 06:36:38', '2020-10-11 21:56:33'),
(22, 1, 11, NULL, '2021-03-07 19:05:35', '2021-06-17 14:49:54'),
(23, 1, 12, NULL, '2020-09-05 13:13:02', '2021-01-08 10:47:58'),
(24, 2, 12, NULL, '2021-10-19 14:14:58', '2022-06-19 20:33:09'),
(25, 4, 13, NULL, '2020-10-05 17:42:27', '2020-11-12 21:09:32'),
(26, 3, 13, NULL, '2021-01-01 07:07:55', '2021-09-19 06:27:58'),
(27, 4, 14, NULL, '2020-07-16 22:46:20', '2021-01-21 04:00:23'),
(28, 2, 14, NULL, '2021-10-04 11:10:56', '2022-08-14 13:43:35'),
(29, 1, 15, NULL, '2020-05-17 14:22:38', '2021-01-29 03:32:56'),
(30, 2, 15, NULL, '2021-08-03 03:47:10', '2022-03-29 22:40:42'),
(31, 1, 16, NULL, '2020-07-14 21:57:10', '2020-11-06 01:28:02'),
(32, 1, 16, NULL, '2020-12-27 09:22:25', '2021-04-23 22:07:53'),
(33, 2, 17, NULL, '2020-12-12 19:26:10', '2021-06-29 12:41:53'),
(34, 2, 17, NULL, '2021-08-23 16:33:53', '2022-07-03 21:36:45'),
(35, 2, 18, NULL, '2020-11-01 05:34:38', '2020-11-10 20:27:57'),
(36, 4, 18, NULL, '2021-06-20 17:07:29', '2021-08-08 20:53:00'),
(37, 4, 19, NULL, '2020-05-27 14:43:54', '2020-12-09 01:37:43'),
(38, 3, 19, NULL, '2021-03-28 13:15:08', '2022-01-31 01:08:43'),
(39, 4, 20, NULL, '2021-02-19 02:39:16', '2022-01-09 10:06:21'),
(40, 1, 20, NULL, '2022-09-24 10:10:02', '2023-05-04 06:54:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_rotaciones`
--

CREATE TABLE `historial_rotaciones` (
  `historial_id` int(11) NOT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `fecha_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_salida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_rotaciones`
--

INSERT INTO `historial_rotaciones` (`historial_id`, `personal_id`, `sucursal_id`, `fecha_entrada`, `fecha_salida`) VALUES
(1, 5, 1, '2024-02-26 18:07:34', '0000-00-00 00:00:00'),
(2, 5, 1, '2024-02-26 18:07:34', '0000-00-00 00:00:00'),
(3, 15, 5, '2022-12-19 00:00:58', '2024-12-19 11:02:40'),
(4, 17, 3, '2022-11-15 17:47:04', '2022-11-21 07:35:57'),
(5, 20, 2, '2023-10-09 18:00:52', '2025-03-04 04:16:48'),
(6, 10, 4, '2025-03-04 04:42:57', '0000-00-00 00:00:00'),
(7, 19, 2, '2025-03-04 04:42:23', '0000-00-00 00:00:00'),
(8, 16, 2, '2023-11-16 07:52:40', '2025-03-04 04:16:48'),
(9, 17, 1, '2022-11-21 07:35:57', '0000-00-00 00:00:00'),
(10, 15, 3, '2024-12-19 11:02:40', '0000-00-00 00:00:00'),
(11, 9, 2, '2025-03-04 04:39:41', '0000-00-00 00:00:00'),
(12, 1, 2, '2025-03-04 04:42:43', '0000-00-00 00:00:00'),
(13, 20, 5, '2025-03-04 14:31:46', '0000-00-00 00:00:00'),
(14, 16, 3, '2025-03-05 01:03:59', '0000-00-00 00:00:00'),
(15, 11, 1, '2025-03-04 04:41:56', '0000-00-00 00:00:00'),
(16, 12, 2, '2025-03-04 04:43:28', '0000-00-00 00:00:00'),
(17, 13, 1, '2025-03-04 14:32:56', '0000-00-00 00:00:00'),
(18, 13, 1, '2023-06-16 14:13:36', '2024-05-03 22:03:44'),
(19, 3, 2, '2025-03-04 14:35:50', '0000-00-00 00:00:00'),
(20, 5, 5, '2023-10-14 13:29:59', '2024-02-26 18:07:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_personal`
--

CREATE TABLE `ingreso_personal` (
  `ingreso_id` int(11) NOT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `fecha_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_salida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE `laboratorios` (
  `lab_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `laboratorios`
--

INSERT INTO `laboratorios` (`lab_id`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'Raynor, Douglas and Schuppe', '7745 McClure Valleys Suite 651\nGraceberg, VT 64668-1260', 7411817),
(2, 'Hammes, Heaney and Lindgren', '560 Homenick Parks Apt. 969\nMorissetteberg, RI 58644-9729', 3317300),
(3, 'Stark, Borer and Wiegand', '8232 Quigley Unions Suite 157\nWest Destany, NJ 08831', 4016672),
(4, 'Stoltenberg Inc', '9730 Sandra Hills Suite 869\nWest Caden, RI 99641-6264', 2266367),
(5, 'Gusikowski, Kunze and Harris', '362 Veronica Ways Apt. 835\nKlockoville, CA 20373', 8522836),
(6, 'Reilly LLC', '3977 Nikolaus Union\nCorkeryland, CA 16247', 7130679);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lab_medicamento`
--

CREATE TABLE `lab_medicamento` (
  `lab_medicamentos` int(11) NOT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `medicamento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lab_medicamento`
--

INSERT INTO `lab_medicamento` (`lab_medicamentos`, `lab_id`, `medicamento_id`) VALUES
(1, 1, 44),
(2, 5, 45),
(3, 6, 48),
(4, 6, 48),
(5, 1, 44),
(6, 2, 59),
(7, 2, 44),
(8, 5, 50),
(9, 3, 57),
(10, 6, 43),
(11, 2, 53),
(12, 3, 50),
(13, 1, 45),
(14, 2, 57),
(15, 3, 44),
(16, 4, 48),
(17, 3, 51),
(18, 1, 53),
(19, 1, 51),
(20, 1, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `medicamentos_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `generico` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`medicamentos_id`, `nombre`, `generico`) VALUES
(41, 'Dynafloxen Ultra Relief', 1),
(42, 'Virafix Rapid Cure', 0),
(43, 'Prolixan Health Boost', 1),
(44, 'Xyloflam Strong Defense', 0),
(45, 'Ultramedic Quick Relief', 1),
(46, 'Nexagen Total Care', 0),
(47, 'Solutab Maximum Strength', 1),
(48, 'Painex Fast Action', 0),
(49, 'Zenaflor Complete Health', 1),
(50, 'Immunix Advanced Guard', 0),
(51, 'Lumitrex Night Relief', 1),
(52, 'Inhalex Pure Breathe', 0),
(53, 'Fortidex Energy Boost', 1),
(54, 'Cardiomed Heart Health', 0),
(55, 'Relaxan Calm Formula', 1),
(56, 'Securin Daily Guard', 0),
(57, 'VitaPlus Complete Care', 1),
(58, 'Optimed Immune Support', 0),
(59, 'Relipure Pain Relief', 1),
(60, 'Zynaflex Muscle Relax', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento_presentaciones`
--

CREATE TABLE `medicamento_presentaciones` (
  `medicamento_presentacion` int(11) NOT NULL,
  `medicamentos_id` int(11) DEFAULT NULL,
  `presentacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicamento_presentaciones`
--

INSERT INTO `medicamento_presentaciones` (`medicamento_presentacion`, `medicamentos_id`, `presentacion_id`) VALUES
(1, 55, 18),
(2, 55, 14),
(3, 53, 16),
(4, 46, 7),
(5, 57, 4),
(6, 57, 5),
(7, 51, 18),
(8, 48, 17),
(9, 57, 6),
(10, 57, 18),
(11, 42, 20),
(12, 46, 14),
(13, 56, 18),
(14, 46, 12),
(15, 53, 17),
(16, 55, 7),
(17, 47, 7),
(18, 47, 9),
(19, 50, 17),
(20, 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monodroga`
--

CREATE TABLE `monodroga` (
  `monodroga_id` int(11) NOT NULL,
  `tipo_monodroga` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `monodroga`
--

INSERT INTO `monodroga` (`monodroga_id`, `tipo_monodroga`, `descripcion`) VALUES
(81, 'Paracetamol', 'Analgésico y antipirético'),
(82, 'Ibuprofeno', 'Anti-inflamatorio no esteroide'),
(83, 'Aspirina', 'Anti-inflamatorio, analgésico y antipirético'),
(84, 'Amoxicilina', 'Antibiótico de amplio espectro'),
(85, 'Diclofenaco', 'Anti-inflamatorio no esteroide'),
(86, 'Loratadina', 'Antihistamínico'),
(87, 'Metformina', 'Antidiabético oral'),
(88, 'Omeprazol', 'Inhibidor de la bomba de protones'),
(89, 'Ciprofloxacina', 'Antibiótico'),
(90, 'Clonazepam', 'Ansiolítico'),
(91, 'Fluoxetina', 'Antidepresivo'),
(92, 'Amlodipino', 'Antihipertensivo'),
(93, 'Simvastatina', 'Reductor del colesterol'),
(94, 'Tramadol', 'Analgésico'),
(95, 'Lorazepam', 'Ansiolítico'),
(96, 'Ketorolaco', 'Anti-inflamatorio no esteroide'),
(97, 'Enalapril', 'Antihipertensivo'),
(98, 'Prednisona', 'Corticosteroide'),
(99, 'Acetaminofén', 'Analgésico y antipirético'),
(100, 'Azitromicina', 'Antibiótico de amplio espectro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monodroga_medicamentos`
--

CREATE TABLE `monodroga_medicamentos` (
  `monodroga_medicamento_id` int(11) NOT NULL,
  `medicamentos_id` int(11) DEFAULT NULL,
  `monodroga_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `monodroga_medicamentos`
--

INSERT INTO `monodroga_medicamentos` (`monodroga_medicamento_id`, `medicamentos_id`, `monodroga_id`) VALUES
(1, 45, 90),
(2, 46, 95),
(3, 44, 84),
(4, 53, 95),
(5, 57, 87),
(6, 49, 95),
(7, 44, 86),
(8, 54, 88),
(9, 47, 91),
(10, 57, 86),
(11, 49, 87),
(12, 58, 82),
(13, 52, 93),
(14, 56, 95),
(15, 41, 84),
(16, 41, 92),
(17, 48, 99),
(18, 52, 86),
(19, 55, 81),
(20, 52, 82),
(21, 55, 84),
(22, 50, 91),
(23, 53, 99),
(24, 49, 93),
(25, 51, 95),
(26, 53, 85),
(27, 56, 93),
(28, 59, 91),
(29, 43, 82),
(30, 50, 86),
(31, 52, 84),
(32, 53, 91),
(33, 60, 90),
(34, 41, 98),
(35, 52, 83),
(36, 43, 93),
(37, 54, 88),
(38, 53, 85),
(39, 52, 83),
(40, 55, 82);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `pedido_id` int(11) NOT NULL,
  `analista_id` int(11) DEFAULT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`pedido_id`, `analista_id`, `fecha_pedido`) VALUES
(2, 23, '2024-08-14 17:34:06'),
(3, 24, '2024-11-29 17:34:15'),
(4, 23, '2024-12-27 13:06:16'),
(5, 24, '2024-07-13 04:47:51'),
(6, 21, '2024-12-02 14:29:33'),
(7, 23, '2024-11-20 22:00:15'),
(8, 24, '2024-11-22 16:34:45'),
(9, 21, '2024-12-08 09:04:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_proveedor`
--

CREATE TABLE `pedido_proveedor` (
  `pedido_proveedor_id` int(11) NOT NULL,
  `laboratorio_id` int(11) DEFAULT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `medicamento_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido_proveedor`
--

INSERT INTO `pedido_proveedor` (`pedido_proveedor_id`, `laboratorio_id`, `pedido_id`, `medicamento_id`, `cantidad`) VALUES
(1, 4, 5, 49, 8),
(2, 1, 5, 51, 21),
(3, 6, 5, 41, 19),
(4, 4, 2, 54, 4),
(5, 2, 3, 48, 23),
(6, 4, 2, 59, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `personal_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`personal_id`, `nombre`, `apellido`, `edad`, `correo`, `telefono`) VALUES
(1, 'Trycia', 'Sawayn', 63, 'abigale72@example.org', 415207),
(2, 'Angelina', 'Hamill', 33, 'christiana.runolfsdottir@example.com', 8438927),
(3, 'Lilyan', 'D\'Amore', 65, 'monahan.chesley@example.net', 9125377),
(4, 'Emmett', 'Stehr', 45, 'iquigley@example.net', 9007121),
(5, 'Justice', 'Feest', 57, 'waelchi.natalia@example.net', 1521613),
(6, 'Preston', 'Ullrich', 41, 'raphaelle.bashirian@example.org', 2392661),
(7, 'Lempi', 'Lowe', 28, 'sibyl56@example.com', 6934615),
(8, 'Marquis', 'Rath', 45, 'jackie83@example.net', 8163074),
(9, 'Josianne', 'Altenwerth', 56, 'iva.kuhn@example.net', 3273135),
(10, 'Jared', 'Erdman', 40, 'wava.schimmel@example.com', 3211519),
(11, 'William', 'Kulas', 50, 'roxanne.gerlach@example.com', 529848),
(12, 'Jimmie', 'Mills', 57, 'hbrekke@example.com', 793190),
(13, 'Elena', 'Rippin', 40, 'chris85@example.com', 7999370),
(14, 'Ike', 'Graham', 23, 'jayden89@example.org', 8678104),
(15, 'Lavada', 'Eichmann', 29, 'ozella64@example.org', 4049514),
(16, 'Colleen', 'Hintz', 40, 'gutmann.danny@example.net', 9198470),
(17, 'Andreanne', 'Mayert', 43, 'sylvia75@example.net', 672995),
(18, 'Drew', 'Mills', 38, 'lnolan@example.com', 8631248),
(19, 'Marcelina', 'Pouros', 49, 'jude.lehner@example.org', 4646278),
(20, 'Stanton', 'Huels', 64, 'reagan04@example.net', 4755420);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentaciones`
--

CREATE TABLE `presentaciones` (
  `presentacion_id` int(11) NOT NULL,
  `tipo_presentacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `presentaciones`
--

INSERT INTO `presentaciones` (`presentacion_id`, `tipo_presentacion`) VALUES
(1, 'Tableta'),
(2, 'Cápsula'),
(3, 'Jarabe'),
(4, 'Inyección'),
(5, 'Crema'),
(6, 'Pomada'),
(7, 'Supositorio'),
(8, 'Gotas'),
(9, 'Parche'),
(10, 'Inhalador'),
(11, 'Spray nasal'),
(12, 'Gel'),
(13, 'Solución'),
(14, 'Polvo'),
(15, 'Liofilizado'),
(16, 'Enema'),
(17, 'Implante'),
(18, 'Comprimido'),
(19, 'Suspensión'),
(20, 'Emulsión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('h8rnNclcK3pCDNQA9pCsZG4gqloopQuaIraepflJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 OPR/117.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1dCTzVjeVNLMGJvaXU5RHNjWXA4V1p3aFBSNUE2ZkdPUzBJVXp4MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdWN1cnNhbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741103126);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `sucursal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`stock_id`, `sucursal_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_medicamento`
--

CREATE TABLE `stock_medicamento` (
  `stock_medicamento` int(11) NOT NULL,
  `medicamento_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock_medicamento`
--

INSERT INTO `stock_medicamento` (`stock_medicamento`, `medicamento_id`, `stock_id`, `precio`, `cantidad`) VALUES
(1, 41, 1, 13, 38),
(2, 42, 1, 291, 92),
(3, 43, 1, 410, 74),
(4, 44, 1, 75, 79),
(5, 45, 1, 181, 88),
(6, 46, 1, 439, 12),
(7, 47, 1, 387, 3),
(8, 48, 1, 344, 14),
(9, 49, 1, 478, 63),
(10, 50, 1, 55, 42),
(11, 51, 1, 190, 63),
(12, 52, 1, 130, 39),
(13, 53, 1, 455, 94),
(14, 54, 1, 248, 35),
(15, 55, 1, 11, 100),
(16, 56, 1, 285, 8),
(17, 57, 1, 357, 75),
(18, 58, 1, 369, 94),
(19, 59, 1, 43, 49),
(20, 60, 1, 392, 57),
(21, 41, 2, 340, 79),
(22, 42, 2, 266, 43),
(23, 43, 2, 183, 10),
(24, 44, 2, 132, 28),
(25, 45, 2, 285, 7),
(26, 46, 2, 335, 39),
(27, 47, 2, 376, 20),
(28, 48, 2, 180, 38),
(29, 49, 2, 140, 65),
(30, 50, 2, 491, 28),
(31, 51, 2, 377, 66),
(32, 52, 2, 123, 82),
(33, 53, 2, 14, 85),
(34, 54, 2, 206, 24),
(35, 55, 2, 226, 25),
(36, 56, 2, 479, 87),
(37, 57, 2, 485, 95),
(38, 58, 2, 316, 58),
(39, 59, 2, 207, 1),
(40, 60, 2, 136, 92),
(41, 41, 3, 217, 22),
(42, 42, 3, 24, 29),
(43, 43, 3, 242, 68),
(44, 44, 3, 256, 61),
(45, 45, 3, 270, 8),
(46, 46, 3, 273, 96),
(47, 47, 3, 213, 41),
(48, 48, 3, 236, 10),
(49, 49, 3, 482, 16),
(50, 50, 3, 209, 10),
(51, 51, 3, 61, 56),
(52, 52, 3, 236, 83),
(53, 53, 3, 259, 19),
(54, 54, 3, 329, 21),
(55, 55, 3, 227, 95),
(56, 56, 3, 353, 99),
(57, 57, 3, 18, 72),
(58, 58, 3, 169, 30),
(59, 59, 3, 311, 58),
(60, 60, 3, 431, 48),
(61, 41, 4, 349, 79),
(62, 42, 4, 477, 76),
(63, 43, 4, 123, 41),
(64, 44, 4, 110, 60),
(65, 45, 4, 255, 57),
(66, 46, 4, 381, 21),
(67, 47, 4, 115, 98),
(68, 48, 4, 41, 71),
(69, 49, 4, 35, 61),
(70, 50, 4, 133, 99),
(71, 51, 4, 312, 40),
(72, 52, 4, 275, 10),
(73, 53, 4, 300, 32),
(74, 54, 4, 395, 47),
(75, 55, 4, 144, 57),
(76, 56, 4, 438, 59),
(77, 57, 4, 193, 75),
(78, 58, 4, 373, 24),
(79, 59, 4, 17, 88),
(80, 60, 4, 74, 94),
(81, 41, 5, 500, 54),
(82, 42, 5, 441, 89),
(83, 43, 5, 257, 71),
(84, 44, 5, 202, 31),
(85, 45, 5, 307, 51),
(86, 46, 5, 469, 22),
(87, 47, 5, 264, 31),
(88, 48, 5, 468, 48),
(89, 49, 5, 174, 35),
(90, 50, 5, 155, 89),
(91, 51, 5, 190, 67),
(92, 52, 5, 431, 63),
(93, 53, 5, 167, 55),
(94, 54, 5, 341, 1),
(95, 55, 5, 112, 67),
(96, 56, 5, 290, 72),
(97, 57, 5, 364, 10),
(98, 58, 5, 134, 39),
(99, 59, 5, 339, 48),
(100, 60, 5, 422, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `sucursal_id` int(11) NOT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `numerodetlf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`sucursal_id`, `ubicacion`, `numerodetlf`) VALUES
(1, 'unare', 41579523),
(2, 'manoa', 41579523),
(3, 'unare II', 23423423),
(4, 'san felix', 32423455),
(5, 'vice city', 41232344),
(6, 'upata', 32222),
(7, 'upata', 32222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analista`
--
ALTER TABLE `analista`
  ADD PRIMARY KEY (`analista_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`cargo_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`compra_id`),
  ADD KEY `pedido_proveedor_id` (`pedido_proveedor_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `historial_cargos`
--
ALTER TABLE `historial_cargos`
  ADD PRIMARY KEY (`historial_cargo_id`),
  ADD KEY `personal_id` (`personal_id`),
  ADD KEY `cargo_id` (`cargo_id`);

--
-- Indices de la tabla `historial_rotaciones`
--
ALTER TABLE `historial_rotaciones`
  ADD PRIMARY KEY (`historial_id`),
  ADD KEY `personal_id` (`personal_id`),
  ADD KEY `sucursal_id` (`sucursal_id`);

--
-- Indices de la tabla `ingreso_personal`
--
ALTER TABLE `ingreso_personal`
  ADD PRIMARY KEY (`ingreso_id`),
  ADD KEY `personal_id` (`personal_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indices de la tabla `lab_medicamento`
--
ALTER TABLE `lab_medicamento`
  ADD PRIMARY KEY (`lab_medicamentos`),
  ADD KEY `lab_id` (`lab_id`),
  ADD KEY `medicamento_id` (`medicamento_id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`medicamentos_id`);

--
-- Indices de la tabla `medicamento_presentaciones`
--
ALTER TABLE `medicamento_presentaciones`
  ADD PRIMARY KEY (`medicamento_presentacion`),
  ADD KEY `medicamentos_id` (`medicamentos_id`),
  ADD KEY `presentacion_id` (`presentacion_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monodroga`
--
ALTER TABLE `monodroga`
  ADD PRIMARY KEY (`monodroga_id`);

--
-- Indices de la tabla `monodroga_medicamentos`
--
ALTER TABLE `monodroga_medicamentos`
  ADD PRIMARY KEY (`monodroga_medicamento_id`),
  ADD KEY `medicamentos_id` (`medicamentos_id`),
  ADD KEY `monodroga_id` (`monodroga_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `analista_id` (`analista_id`);

--
-- Indices de la tabla `pedido_proveedor`
--
ALTER TABLE `pedido_proveedor`
  ADD PRIMARY KEY (`pedido_proveedor_id`),
  ADD KEY `laboratorio_id` (`laboratorio_id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `medicamento_id` (`medicamento_id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indices de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  ADD PRIMARY KEY (`presentacion_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `sucursal_id` (`sucursal_id`);

--
-- Indices de la tabla `stock_medicamento`
--
ALTER TABLE `stock_medicamento`
  ADD PRIMARY KEY (`stock_medicamento`),
  ADD KEY `medicamento_id` (`medicamento_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`sucursal_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analista`
--
ALTER TABLE `analista`
  MODIFY `analista_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `cargo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `compra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_cargos`
--
ALTER TABLE `historial_cargos`
  MODIFY `historial_cargo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `historial_rotaciones`
--
ALTER TABLE `historial_rotaciones`
  MODIFY `historial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ingreso_personal`
--
ALTER TABLE `ingreso_personal`
  MODIFY `ingreso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `lab_medicamento`
--
ALTER TABLE `lab_medicamento`
  MODIFY `lab_medicamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `medicamentos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `medicamento_presentaciones`
--
ALTER TABLE `medicamento_presentaciones`
  MODIFY `medicamento_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `monodroga`
--
ALTER TABLE `monodroga`
  MODIFY `monodroga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `monodroga_medicamentos`
--
ALTER TABLE `monodroga_medicamentos`
  MODIFY `monodroga_medicamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedido_proveedor`
--
ALTER TABLE `pedido_proveedor`
  MODIFY `pedido_proveedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  MODIFY `presentacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `stock_medicamento`
--
ALTER TABLE `stock_medicamento`
  MODIFY `stock_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `sucursal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`pedido_proveedor_id`) REFERENCES `pedido_proveedor` (`pedido_proveedor_id`);

--
-- Filtros para la tabla `historial_cargos`
--
ALTER TABLE `historial_cargos`
  ADD CONSTRAINT `historial_cargos_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`personal_id`),
  ADD CONSTRAINT `historial_cargos_ibfk_2` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`cargo_id`);

--
-- Filtros para la tabla `historial_rotaciones`
--
ALTER TABLE `historial_rotaciones`
  ADD CONSTRAINT `historial_rotaciones_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`personal_id`),
  ADD CONSTRAINT `historial_rotaciones_ibfk_2` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`sucursal_id`);

--
-- Filtros para la tabla `ingreso_personal`
--
ALTER TABLE `ingreso_personal`
  ADD CONSTRAINT `ingreso_personal_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`personal_id`);

--
-- Filtros para la tabla `lab_medicamento`
--
ALTER TABLE `lab_medicamento`
  ADD CONSTRAINT `lab_medicamento_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `laboratorios` (`lab_id`),
  ADD CONSTRAINT `lab_medicamento_ibfk_2` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamentos` (`medicamentos_id`);

--
-- Filtros para la tabla `medicamento_presentaciones`
--
ALTER TABLE `medicamento_presentaciones`
  ADD CONSTRAINT `medicamento_presentaciones_ibfk_1` FOREIGN KEY (`medicamentos_id`) REFERENCES `medicamentos` (`medicamentos_id`),
  ADD CONSTRAINT `medicamento_presentaciones_ibfk_2` FOREIGN KEY (`presentacion_id`) REFERENCES `presentaciones` (`presentacion_id`);

--
-- Filtros para la tabla `monodroga_medicamentos`
--
ALTER TABLE `monodroga_medicamentos`
  ADD CONSTRAINT `monodroga_medicamentos_ibfk_1` FOREIGN KEY (`medicamentos_id`) REFERENCES `medicamentos` (`medicamentos_id`),
  ADD CONSTRAINT `monodroga_medicamentos_ibfk_2` FOREIGN KEY (`monodroga_id`) REFERENCES `monodroga` (`monodroga_id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`analista_id`) REFERENCES `analista` (`analista_id`);

--
-- Filtros para la tabla `pedido_proveedor`
--
ALTER TABLE `pedido_proveedor`
  ADD CONSTRAINT `pedido_proveedor_ibfk_1` FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorios` (`lab_id`),
  ADD CONSTRAINT `pedido_proveedor_ibfk_2` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`pedido_id`),
  ADD CONSTRAINT `pedido_proveedor_ibfk_3` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamentos` (`medicamentos_id`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`sucursal_id`);

--
-- Filtros para la tabla `stock_medicamento`
--
ALTER TABLE `stock_medicamento`
  ADD CONSTRAINT `stock_medicamento_ibfk_1` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamentos` (`medicamentos_id`),
  ADD CONSTRAINT `stock_medicamento_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
