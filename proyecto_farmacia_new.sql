-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2025 a las 16:24:12
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
(2, 4, '30d', '2025-01-02 06:40:22', 1),
(3, 6, '15d', '2024-09-17 06:35:48', 1),
(4, 4, '15d', '2025-01-19 20:15:33', 0),
(5, 3, '30d', '2024-04-12 10:54:22', 0),
(6, 1, '30d', '2024-04-02 19:37:14', 1),
(7, 5, 'contado', '2024-09-03 09:15:59', 0),
(8, 3, 'contado', '2024-08-12 09:50:36', 0),
(9, 4, '30d', '2024-06-12 19:32:44', 0);

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
(1, 4, 1, NULL, '2020-04-01 19:43:08', '2021-02-05 20:14:53'),
(2, 1, 1, NULL, '2021-10-14 09:07:34', '2021-10-15 05:57:37'),
(3, 3, 2, NULL, '2020-11-29 05:50:42', '2021-10-12 03:05:35'),
(4, 1, 2, NULL, '2022-05-02 21:41:38', '2023-02-16 01:32:13'),
(5, 3, 3, NULL, '2020-09-07 22:07:29', '2021-09-05 10:24:13'),
(6, 4, 3, NULL, '2022-06-01 12:05:05', '2022-06-18 09:04:31'),
(7, 3, 4, NULL, '2020-06-11 08:17:41', '2020-12-09 01:05:58'),
(8, 2, 4, NULL, '2021-05-25 03:50:02', '2021-08-20 02:35:25'),
(9, 4, 5, NULL, '2020-09-01 19:08:48', '2020-12-07 04:09:48'),
(10, 3, 5, NULL, '2020-12-22 00:41:42', '2021-06-26 07:09:42'),
(11, 1, 6, NULL, '2021-01-26 18:27:51', '2021-02-05 16:57:08'),
(12, 4, 6, NULL, '2021-03-15 05:56:32', '2021-08-31 02:07:54'),
(13, 1, 7, NULL, '2021-02-04 13:17:01', '2022-01-25 03:11:38'),
(14, 2, 7, NULL, '2022-11-28 23:12:17', '2023-09-26 10:07:09'),
(15, 4, 8, NULL, '2020-06-04 01:35:24', '2021-05-24 02:58:39'),
(16, 3, 8, NULL, '2021-11-25 02:13:21', '2022-03-15 22:17:20'),
(17, 1, 9, NULL, '2020-03-28 14:08:30', '2020-07-14 08:46:56'),
(18, 1, 9, NULL, '2020-10-28 05:46:57', '2021-10-24 12:38:56'),
(19, 2, 10, NULL, '2020-02-26 09:20:38', '2020-06-07 02:20:51'),
(20, 1, 10, NULL, '2021-04-01 07:11:39', '2022-02-07 00:18:46'),
(21, 4, 11, NULL, '2020-03-06 22:51:38', '2020-10-27 03:14:59'),
(22, 1, 11, NULL, '2021-02-24 13:57:37', '2021-11-15 20:16:02'),
(23, 4, 12, NULL, '2020-10-29 13:30:21', '2021-02-23 18:59:45'),
(24, 2, 12, NULL, '2021-03-24 01:58:29', '2021-05-08 13:14:56'),
(25, 1, 13, NULL, '2020-09-05 21:27:16', '2021-08-10 20:01:53'),
(26, 4, 13, NULL, '2021-11-01 14:35:57', '2022-10-02 20:06:13'),
(27, 1, 14, NULL, '2020-10-15 07:32:23', '2021-01-02 03:17:44'),
(28, 4, 14, NULL, '2021-08-07 15:20:33', '2022-05-08 22:35:44'),
(29, 2, 15, NULL, '2020-09-18 07:06:46', '2021-06-11 03:16:31'),
(30, 2, 15, NULL, '2021-09-12 17:42:53', '2022-02-15 06:56:22'),
(31, 2, 16, NULL, '2020-12-30 21:45:38', '2021-12-18 13:37:50'),
(32, 1, 16, NULL, '2022-10-30 23:28:04', '2023-03-02 12:15:24'),
(33, 3, 17, NULL, '2020-08-10 16:47:18', '2021-05-24 20:25:56'),
(34, 1, 17, NULL, '2021-09-06 05:53:27', '2021-12-04 07:37:06'),
(35, 3, 18, NULL, '2020-03-25 05:49:26', '2020-06-01 00:30:26'),
(36, 3, 18, NULL, '2020-12-26 19:29:43', '2021-02-25 22:14:08'),
(37, 3, 19, NULL, '2020-12-23 01:41:24', '2021-09-25 15:27:22'),
(38, 2, 19, NULL, '2022-06-16 08:56:56', '2022-08-05 07:15:08'),
(39, 4, 20, NULL, '2020-10-15 04:02:19', '2021-10-11 14:26:51'),
(40, 2, 20, NULL, '2022-05-21 19:17:58', '2023-03-31 02:23:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_rotaciones`
--

CREATE TABLE `historial_rotaciones` (
  `historial_id` int(11) NOT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `fecha_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_salida` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_rotaciones`
--

INSERT INTO `historial_rotaciones` (`historial_id`, `personal_id`, `sucursal_id`, `fecha_entrada`, `fecha_salida`) VALUES
(1, 16, 1, '2025-02-12 01:15:17', NULL),
(2, 18, 2, '2025-02-11 23:54:20', NULL),
(3, 7, 5, '2025-02-12 01:04:26', NULL),
(4, 15, 5, '2025-02-12 01:11:59', NULL),
(5, 9, 3, '2025-02-14 00:56:20', NULL),
(6, 6, 5, '2025-02-12 00:00:20', NULL),
(7, 13, 2, '2025-02-12 01:12:49', NULL),
(8, 11, 2, '2025-02-10 13:16:16', NULL),
(9, 5, 5, '2022-07-01 14:10:28', '2025-02-11 23:13:57'),
(10, 4, 3, '2025-02-12 01:11:30', NULL),
(11, 10, 5, '2025-02-12 01:19:56', NULL),
(12, 14, 5, '2020-04-11 01:13:11', NULL),
(13, 19, 5, '2022-10-24 18:59:46', '2025-02-11 23:13:57'),
(14, 8, 1, '2025-02-12 01:12:28', NULL),
(15, 2, 1, '2025-02-12 01:05:04', NULL),
(16, 6, 3, '2023-05-21 01:03:28', '2025-02-10 23:13:57'),
(17, 20, 2, '2025-02-12 01:18:51', NULL),
(18, 9, 3, '2022-07-15 08:20:25', '2024-10-08 22:51:05'),
(19, 11, 1, '2025-02-10 10:56:52', NULL),
(20, 3, 3, '2025-02-12 01:05:26', NULL),
(21, 1, 1, '2024-03-02 00:11:40', NULL),
(22, 17, 4, '2020-12-09 01:16:03', NULL),
(23, 12, 4, '2024-11-15 01:17:26', NULL),
(24, 19, 2, '2024-10-08 01:18:07', NULL);

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
(1, 4, 46),
(2, 2, 54),
(3, 6, 46),
(4, 5, 56),
(5, 1, 48),
(6, 3, 58),
(7, 2, 43),
(8, 2, 58),
(9, 4, 42),
(10, 5, 49),
(11, 2, 55),
(12, 1, 43),
(13, 1, 49),
(14, 1, 46),
(15, 3, 45),
(16, 1, 56),
(17, 4, 57),
(18, 2, 56),
(19, 2, 46),
(20, 5, 47);

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
(2, 58, 16),
(3, 42, 1),
(4, 46, 7),
(5, 46, 13),
(6, 58, 12),
(7, 45, 1),
(8, 47, 1),
(9, 57, 16),
(10, 43, 6),
(11, 41, 12),
(12, 44, 6),
(13, 58, 8),
(14, 55, 16),
(15, 48, 19),
(16, 47, 14),
(17, 51, 9),
(18, 55, 15),
(19, 44, 12),
(20, 58, 15),
(21, 48, 14);

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
('8n02qsgqsAhkw8m7oVvViCiEN5S5lVTqi9wUTSPN', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 OPR/116.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUNSUkk2RjZJN0FBRlpyU3F5blYxU2FXQnBWTFZtdlBLblA1dHFzNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF9wcm95ZWN0cy9wcm95ZWN0b19GYXJtYWNpYV9uZXcvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738200205),
('VA9jW2QTxab5G36Hw5f2GrIy0kUBIisYXb38iFb7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 OPR/116.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieXl0QWlBTHJxUnBheGYyMXMxdVh4U0FnWnJKYnpsWnozS3pGWXQ5aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXJzb25hbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1739718343);

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
  `sucursal_id` int(11) NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock_medicamento`
--

INSERT INTO `stock_medicamento` (`stock_medicamento`, `medicamento_id`, `stock_id`, `sucursal_id`, `precio`, `cantidad`) VALUES
(1, 41, 1, 1, 97, 73),
(2, 42, 4, 1, 12, 37),
(3, 43, NULL, 1, 148, 39),
(4, 44, NULL, 1, 108, 98),
(5, 45, NULL, 1, 441, 19),
(6, 46, NULL, 1, 88, 68),
(7, 47, NULL, 1, 55, 15),
(8, 48, NULL, 1, 40, 27),
(9, 49, NULL, 1, 447, 28),
(10, 50, NULL, 1, 440, 30),
(11, 51, NULL, 1, 374, 3),
(12, 52, NULL, 1, 298, 45),
(13, 53, NULL, 1, 38, 28),
(14, 54, NULL, 1, 357, 97),
(15, 55, NULL, 1, 36, 15),
(16, 56, NULL, 1, 148, 6),
(17, 57, NULL, 1, 168, 7),
(18, 58, NULL, 1, 490, 57),
(19, 59, NULL, 1, 179, 36),
(20, 60, NULL, 1, 14, 51),
(21, 41, NULL, 2, 419, 85),
(22, 42, NULL, 2, 368, 32),
(23, 43, NULL, 2, 246, 18),
(24, 44, NULL, 2, 416, 10),
(25, 45, NULL, 2, 141, 39),
(26, 46, NULL, 2, 371, 87),
(27, 47, NULL, 2, 87, 74),
(28, 48, NULL, 2, 400, 2),
(29, 49, NULL, 2, 284, 83),
(30, 50, NULL, 2, 483, 12),
(31, 51, NULL, 2, 457, 18),
(32, 52, NULL, 2, 213, 26),
(33, 53, NULL, 2, 13, 86),
(34, 54, NULL, 2, 188, 22),
(35, 55, NULL, 2, 263, 8),
(36, 56, NULL, 2, 378, 83),
(37, 57, NULL, 2, 35, 93),
(38, 58, NULL, 2, 249, 41),
(39, 59, NULL, 2, 48, 49),
(40, 60, NULL, 2, 369, 99),
(41, 41, NULL, 3, 117, 59),
(42, 42, NULL, 3, 86, 70),
(43, 43, NULL, 3, 348, 20),
(44, 44, NULL, 3, 404, 89),
(45, 45, NULL, 3, 95, 43),
(46, 46, NULL, 3, 204, 32),
(47, 47, NULL, 3, 274, 47),
(48, 48, NULL, 3, 330, 18),
(49, 49, NULL, 3, 373, 15),
(50, 50, NULL, 3, 122, 93),
(51, 51, NULL, 3, 162, 44),
(52, 52, NULL, 3, 267, 43),
(53, 53, NULL, 3, 456, 28),
(54, 54, NULL, 3, 94, 71),
(55, 55, NULL, 3, 297, 27),
(56, 56, NULL, 3, 453, 70),
(57, 57, NULL, 3, 30, 44),
(58, 58, NULL, 3, 427, 40),
(59, 59, NULL, 3, 125, 53),
(60, 60, NULL, 3, 436, 93),
(61, 41, NULL, 4, 51, 53),
(62, 42, NULL, 4, 205, 36),
(63, 43, NULL, 4, 239, 60),
(64, 44, NULL, 4, 362, 83),
(65, 45, NULL, 4, 489, 1),
(66, 46, NULL, 4, 211, 45),
(67, 47, NULL, 4, 249, 34),
(68, 48, NULL, 4, 65, 10),
(69, 49, NULL, 4, 498, 71),
(70, 50, NULL, 4, 352, 8),
(71, 51, NULL, 4, 275, 14),
(72, 52, NULL, 4, 283, 92),
(73, 53, NULL, 4, 185, 87),
(74, 54, NULL, 4, 195, 99),
(75, 55, NULL, 4, 445, 63),
(76, 56, NULL, 4, 205, 64),
(77, 57, NULL, 4, 224, 93),
(78, 58, NULL, 4, 156, 79),
(79, 59, NULL, 4, 97, 26),
(80, 60, NULL, 4, 397, 46),
(81, 41, NULL, 5, 420, 62),
(82, 42, NULL, 5, 254, 75),
(83, 43, NULL, 5, 421, 87),
(84, 44, NULL, 5, 360, 79),
(85, 45, NULL, 5, 292, 73),
(86, 46, NULL, 5, 148, 36),
(87, 47, NULL, 5, 420, 34),
(88, 48, NULL, 5, 71, 89),
(89, 49, NULL, 5, 40, 79),
(90, 50, NULL, 5, 36, 6),
(91, 51, NULL, 5, 288, 74),
(92, 52, NULL, 5, 162, 20),
(93, 53, NULL, 5, 75, 100),
(94, 54, NULL, 5, 167, 68),
(95, 55, NULL, 5, 368, 93),
(96, 56, NULL, 5, 69, 91),
(97, 57, NULL, 5, 280, 77),
(98, 58, NULL, 5, 76, 3),
(99, 59, NULL, 5, 310, 43),
(100, 60, NULL, 5, 352, 63);

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
(5, 'vice city', 41232344);

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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-02-12 00:17:58', '$2y$12$f5BFQF1IutL6inZ924H0fuk8uwdlOzK8dqlv6Jk5Pr82sGpuow98K', 'N96wPYO6QV', '2025-02-12 00:17:58', '2025-02-12 00:17:58');

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
  ADD KEY `stock_id` (`stock_id`),
  ADD KEY `sucursal_id` (`sucursal_id`);

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
  MODIFY `compra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `historial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `medicamento_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `stock_medicamento`
--
ALTER TABLE `stock_medicamento`
  MODIFY `stock_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `sucursal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `stock_medicamento_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`),
  ADD CONSTRAINT `stock_medicamento_ibfk_3` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`sucursal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
