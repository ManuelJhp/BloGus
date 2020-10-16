-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-10-2020 a las 14:53:57
-- Versión del servidor: 10.3.22-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `manuelh1_blogus`
--
CREATE DATABASE IF NOT EXISTS `blogus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blogus`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Actualidad', 'actualidad', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(2, 'Software', 'software', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(3, 'Hardware', 'hardware', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(4, 'Herramientas', 'herramientas', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(5, 'Eventos', 'eventos', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(6, 'dfghdfgh', 'dfghdfgh', '2020-06-16 15:22:57', '2020-06-16 15:22:57'),
(7, '1212', '1212', '2020-06-16 16:02:14', '2020-06-16 16:02:14'),
(8, 'test', 'test', '2020-06-16 16:04:03', '2020-06-16 16:04:03'),
(9, 'NUEVA CATEGORIA', 'nueva-categoria', '2020-06-18 07:13:06', '2020-06-18 07:13:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(249, '2014_10_12_000000_create_users_table', 1),
(250, '2014_10_12_100000_create_password_resets_table', 1),
(251, '2020_03_28_233125_create_posts_table', 1),
(252, '2020_03_29_000337_create_categories_table', 1),
(253, '2020_03_29_003526_create_tags_table', 1),
(254, '2020_03_29_003840_create_post_tag_table', 1),
(255, '2020_03_31_145940_create_photos_table', 1),
(256, '2020_04_29_165712_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(13, 'App\\User', 2),
(14, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 3),
(3, 'App\\User', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'View posts', 'Ver publicaciones', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(2, 'Create posts', 'Crear publicaciones', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(3, 'Update posts', 'Actualizar publicaciones', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(4, 'Delete posts', 'Eliminar publicaciones', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(5, 'View users', 'Ver usuarios', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(6, 'Create users', 'Crear usuarios', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(7, 'Update users', 'Actualizar usuarios', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(8, 'Delete users', 'Eliminar usuarios', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(9, 'View roles', 'Ver roles', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(10, 'Create roles', 'Crear roles', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(11, 'Update roles', 'Actualizar roles', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(12, 'Delete roles', 'Eliminar roles', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(13, 'View permissions', 'Ver permisos', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(14, 'Update permissions', 'Actualizar permisos', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `photos`
--

INSERT INTO `photos` (`id`, `post_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, '/storage/posts/ZKFd93zDPWW80B4uoBiyfSFdujriRQnYVDsRLWem.png', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(2, 2, '/storage/posts/2BbBSn1fPxYUuX13hOF2LdEEdQ5wv4U9xWsddGCS.jpeg', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(4, 4, '/storage/posts/AjjiVPp708479vHN2QYcbtNZHXBC3IgiMVA5APN3.jpeg', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(5, 5, '/storage/posts/Mobile-World-Congress.jpeg', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(10, 3, '/storage/posts/53nFguCMMeboM16SiDHJWt6jwZ7SruqEvJIz4cWX.jpeg', '2020-06-18 07:12:39', '2020-06-18 07:12:39'),
(11, 10, '/storage/posts/wI6mrG0X3NYTW4lsOmTfWw5XecCz4CPvrYlQsrpX.jpeg', '2020-06-18 07:14:14', '2020-06-18 07:14:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `url`, `excerpt`, `iframe`, `body`, `published_at`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Laravel 7', 'laravel-7', 'Laravel 7 fue lanzado el 3 de marzo del 2020 e\n        incluye una serie de novedades muy interesantes', NULL, '\n        <p>Laravel 7 continues the improvements made in Laravel 6.x by introducing Laravel Sanctum,\n        routing speed improvements, custom Eloquent casts, Blade component tags,\n        fluent string operations, a developer focused HTTP client, first-party CORS support,\n        improved scoping for route model binding, stub customization, database queue improvements,\n        multiple mail drivers, query-time casts, a new artisan test command, and a variety of other\n        bug fixes and usability improvements</p>', '2020-05-20 15:18:55', 1, 1, '2020-05-20 15:18:55', '2020-05-20 15:18:55'),
(2, 'Vue.js', 'vuejs', 'Por qué elegir VueJS: 5 razones para considerarlo nuestro próximo framework de referencia', NULL, '\n        <h1>Un framework para aprender y usar de manera progresiva</h1>\n        <p>VueJS se autodenomina como un framework progresivo. Cuando encaramos un desarrollo con VueJS,\n        podemos indicar qué partes del framework queremos incluir. VueJS está modularizado en diferentes\n        librerías separadas que permiten ir añadiendo funcionalidad en el momento que las\n        vayamos necesitando</p>\n        <h1>Funcionalidades intuitivas, modernas y fáciles de usar</h1>\n        <p>VueJS no ha reinventado la rueda. Nuestro amigo verde fue creado como proyecto personal\n        por Evan You, antiguo desarrollador de Google, en un intento de simplificar el funcionamiento\n        de AngularJS. El framework empezó a ser tan fácil y simple de usar que, una vez que su creador\n        decidió subirlo a los repositorios de Github, la comunidad fue usándolo en cada vez más proyectos.\n\n        Empresas como Xiaomi, Alibaba o Gitlab son algunos de sus grandes exponentes. Si miramos las\n        estadísticas de las expectativas de uso en el año 2018 encontramos que muchas personas y empresas\n        están interesadas en conocerlo y usarlo</p>\n        ', '2020-05-21 15:18:55', 1, 1, '2020-05-21 15:18:55', '2020-05-21 15:18:55'),
(3, 'MSI', 'msi', 'MSI nos presenta sus últimas novedades', NULL, '<p>SDHSDHDGFH</p>', '2020-05-10 22:00:00', 9, 2, '2020-05-22 15:18:55', '2020-06-18 07:13:06'),
(4, 'EMUI 10', 'emui-10', 'EMUI10 permite una experiencia fluida y\n        conectada para aprovechar los dispositivos en todos los escenarios.', NULL, '<p>La Colaboración Multi-pantalla permite la conexión simultánea entre el ordenador portátil\n        y tu smartphone, La esencia del diseño de animación EMUI10 es explorar y seguir las leyes de la naturaleza\n        potenciando al máximo el componente intuitivo, Elimina todos los elementos triviales que dificultan\n        la lectura y aplica grandes tipografías con líneas de cuadrícula para focalizar tu atención </p>', '2020-05-23 15:18:55', 2, 2, '2020-05-23 15:18:55', '2020-05-23 15:18:55'),
(5, 'Mobile World Congress', 'mobile-world-congress', 'Mobile World Congress 2019: 5G, Internet de las cosas,\n        lectores de huellas ultrasónicos e inteligencia artificial', NULL, '\n        <p>\n        Vuelve la mayor cita mobile del año.\n        Es cierto que hace unos años que el MWC ha dejado de ser ese gran espacio\n        para los grandes lanzamientos, pero también lo es que ha ganado peso como foro en el\n        que lanzar nuevas tecnologías y proposiciones de valor para toda la industria, como puede\n        ser el desarrollo del 5G\n        Entre los ponentes de este año destacan nombres como el de Eugene Kaspersky (CEO de Kaspersky),\n        Rajeev Suri (CEO de Nokia), Steve Mollenkopf (CEO de Qualcomm), Jim Whitehurst (CEO de Red Hat),\n        Pat Gelsinger (CEO de VMware) o José María Álvarez-Pallete (CEO de Telefónica)\n        </p>\n        <p>Barcelona, 24-27 febrero</p>\n        <a href=\'https://www.mwcbarcelona.com\'>www.mwcbarcelona.com</a>', '2020-05-23 15:18:55', 5, 2, '2020-05-23 15:18:55', '2020-05-23 15:18:55'),
(10, 'NUEVO POST', 'nuevo-post', NULL, NULL, '<p>NUEVO CONTENIDO</p>', '2018-07-31 22:00:00', 9, 1, '2020-06-18 07:14:02', '2020-06-23 15:59:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(1, 1, 4),
(2, 2, 5),
(3, 3, 6),
(4, 4, 7),
(5, 5, 8),
(12, 3, 12),
(14, 10, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Administrador', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(2, 'Writer', 'Escritor', 'web', '2020-05-24 15:18:54', '2020-05-24 15:18:54'),
(3, 'Fotografo', 'Fotografo', 'web', '2020-06-16 16:36:35', '2020-06-16 16:36:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(4, 2),
(4, 3),
(5, 2),
(5, 3),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 2),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 2),
(13, 3),
(14, 2),
(14, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Lenovo', 'lenovo', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(2, 'Asus', 'asus', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(3, 'PHP', 'php', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(4, 'Laravel', 'laravel', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(5, 'Vue', 'vue', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(6, 'MSI', 'msi', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(7, 'Huawei', 'huawei', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(8, 'Movil', 'movil', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(9, 'ghfgdhf', 'ghfgdhf', '2020-06-16 15:22:57', '2020-06-16 15:22:57'),
(10, '1212', '1212', '2020-06-16 16:02:14', '2020-06-16 16:02:14'),
(11, 'test', 'test', '2020-06-16 16:04:03', '2020-06-16 16:04:03'),
(12, 'NUEVA ETIQUETA', 'nueva-etiqueta', '2020-06-18 07:13:06', '2020-06-18 07:13:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$U/2uOV5A/Q4HzBcJdRlSU.jMXW0HP8LBJ0pPJazPeQ9ck4qdGki/O', 'eUMRGBjEDVpI8ib8Tj8084c5ROFceUtbBBa1xICLWaxU0ouanLkVPN7Zup7D', '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(2, 'manuel', 'manuel@manuel.com', NULL, '$2y$10$yntZl9.9HgZN1H2JOKepOOYjRt0FZVlQ2X3ig6gf6Lcw6n2YhsDDq', NULL, '2020-05-24 15:18:55', '2020-05-24 15:18:55'),
(3, 'miguel', 'miguel@miguel.com', NULL, '$2y$10$DelbXzYfnbdserCrcBd78eWCOR8D6ufhDc/A8CnynQEBzDyQPQPrG', NULL, '2020-06-16 16:37:36', '2020-06-16 16:40:05'),
(6, 'adrian', 'SmaFix.eSp@gmail.com', NULL, '$2y$10$IjvM0Il6wLN/1E36PsYb1euVnc/VaYZ078DT29GGMBePS8p4lScJ.', NULL, '2020-06-18 07:21:00', '2020-06-18 07:21:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_url_unique` (`url`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
