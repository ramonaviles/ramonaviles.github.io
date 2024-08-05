-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 13:03:26
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `delivery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

CREATE TABLE `tb_carrito` (
  `id` int(11) NOT NULL,
  `id_pedido` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `producto` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio_unitario` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio_total` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra1` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra2` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra3` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_carrito`
--

INSERT INTO `tb_carrito` (`id`, `id_pedido`, `producto`, `detalle`, `cantidad`, `precio_unitario`, `precio_total`, `extra1`, `extra2`, `extra3`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'POLLOS POCOYO', 'SIN SOPA', '5', '18', '90', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:27:30', NULL, NULL, '1'),
(2, '1', 'COCA COLA', 'DE 3 LITROS', '1', '15', '15', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:27:53', NULL, NULL, '1'),
(3, '2', 'pañales para bebe', 'recien nacido', '1', '20', '20', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:36:14', NULL, NULL, '1'),
(4, '2', 'gaseosa', 'de 2 litro', '1', '10', '10', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:36:35', '2022-11-16 01:36:56', NULL, '0'),
(5, '2', 'pollod', 'con sopa', '1', '12', '12', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:36:49', NULL, NULL, '1'),
(6, '3', 'pollo', 'con sopa', '1', '15', '15', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:39:02', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_delivery`
--

CREATE TABLE `tb_delivery` (
  `id_delivery` int(11) NOT NULL,
  `id_pedido` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_carrito` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_motoquero_asignado` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_delivery` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra1` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra2` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra3` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra4` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra5` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mis_direcciones`
--

CREATE TABLE `tb_mis_direcciones` (
  `id` int(11) NOT NULL,
  `email` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_direccion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `referencia` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra1` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra2` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra3` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_mis_direcciones`
--

INSERT INTO `tb_mis_direcciones` (`id`, `email`, `nombre_direccion`, `direccion`, `referencia`, `extra1`, `extra2`, `extra3`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'fernando@gmail.com', 'OFICINA', 'AV. LITORAL CALLE 5 Y 6 #500', 'FRENTE AL COLEGIO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:33:44', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_motoqueros`
--

CREATE TABLE `tb_motoqueros` (
  `id` int(11) NOT NULL,
  `nombres` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ap_paterno` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ap_materno` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ci` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `genero` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `placa` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `token` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra1` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra2` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra3` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id_pedido` int(11) NOT NULL,
  `nombre_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ci_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular_referencia_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_direccion_cliente` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `costo_pedido` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `costo_delivery` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `obs` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_carrito` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_motoquero_asignado` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_pedido` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra1` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra2` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra3` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra4` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extra5` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id_pedido`, `nombre_cliente`, `ci_cliente`, `celular_cliente`, `celular_referencia_cliente`, `email_cliente`, `direccion_cliente`, `id_direccion_cliente`, `costo_pedido`, `costo_delivery`, `obs`, `id_carrito`, `id_motoquero_asignado`, `estado_pedido`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'Jose Hilari', '37723822', '77466443', '775665775', 'josehilari@gmail.com', 'Zona Alto Lima 3ra Seccion Av 6 entre calle rocallado y 6', '', '105', '12', 'ninguna', '1', '32', 'PEDIDO FINALIZADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:30:11', NULL, NULL, '1'),
(2, 'MARIA MONTES', '3772763', '77466477', '77577587', 'maria@gmail.com', 'av. italia entre calle mendoza frente al colegio fe', '', '32', '5', 'ninguna', '2', '32', 'PEDIDO FINALIZADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:38:26', NULL, NULL, '1'),
(3, 'Freddy Eddy', 'H', '7676765', '6767565', 'hilariweb@gmail.com', 'Zona Alto Lima 3ra Seccion Av 6 nro 450', '', '15', '5', 'ninguna', '3', '33', 'ASIGNADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:39:17', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ubicacion`
--

CREATE TABLE `tb_ubicacion` (
  `id` int(11) NOT NULL,
  `email` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitud` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_delivery` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra1` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra2` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra3` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_ubicacion`
--

INSERT INTO `tb_ubicacion` (`id`, `email`, `latitud`, `longitud`, `estado_delivery`, `cargo`, `nombre`, `extra1`, `extra2`, `extra3`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'julio@gmail.com', '0', '0', 'LIBRE', 'ADMINISTRADOR', 'Julio Mendoza Mamani', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:23:10', NULL, NULL, '1'),
(2, 'juanloza@gmail.com', '0', '0', 'LIBRE', 'MOTOQUERO', 'Juan Loza Quispe', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:25:06', NULL, NULL, '1'),
(3, 'mario@gmail.com', '0', '0', 'LIBRE', 'MOTOQUERO', 'Mario Mendoza Quispe', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:35:34', NULL, NULL, '1'),
(4, 'fernando@gmail.com', '0', '0', 'LIBRE', 'CLIENTE', 'FERNANDO COSIO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:26:13', NULL, NULL, '1'),
(5, 'ervinnvs65@gmail.com', '0', '0', 'LIBRE', 'CLIENTE', 'DANIEL CALVETI', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:38:20', NULL, NULL, '1'),
(6, 'ervinnvs652222@gmail.com', '0', '0', 'LIBRE', 'CLIENTE', 'Misión Vida', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:39:07', NULL, NULL, '1'),
(7, 'benjamin@gmail.com', '0', '0', 'LIBRE', 'CLIENTE', 'Benjamin Hilari', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:40:36', NULL, NULL, '1'),
(8, 'misionvida@gmail.com', '0', '0', 'LIBRE', 'CLIENTE', 'Misión Vida', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:47:12', NULL, NULL, '1'),
(9, 'brigida@gmail.com', '0', '0', 'LIBRE', 'CLIENTE', 'Brigida', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:47:42', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_paterno` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_materno` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expedido` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_perfil` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placa` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra1` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra2` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra3` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `ci`, `expedido`, `fecha_nacimiento`, `genero`, `celular`, `foto_perfil`, `email`, `password`, `token`, `cargo`, `placa`, `extra1`, `extra2`, `extra3`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'Freddy Eddy', 'Hilari', 'Michua', '12345678', 'LA PAZ', '', 'HOMBRE', '75657007', NULL, 'hilariweb@gmail.com', '12345678', NULL, 'ADMINISTRADOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-19 11:12:23', '2020-07-18 07:25:46', '1'),
(31, 'Julio Cesar', 'Mendoza', 'Mamani', '1231231233', NULL, '1991-11-16', 'HOMBRE', '77466455', NULL, 'julio@gmail.com', '12345678', NULL, 'ADMINISTRADOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:23:10', '2022-11-16 01:23:25', '2022-11-16 01:23:32', '0'),
(32, 'Juan', 'Loza', 'Quispe', '1233232', NULL, '1991-11-16', 'HOMBRE', '76756565', NULL, 'juanloza@gmail.com', '12345678', NULL, 'MOTOQUERO', '123 PTY', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:25:06', NULL, NULL, '1'),
(33, 'Mario', 'Mendoza', 'Quispe', '323232332', NULL, '1997-11-03', 'HOMBRE', '7665565', NULL, 'mario@gmail.com', '12345678', NULL, 'MOTOQUERO', '4345 TRH', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 01:35:34', NULL, NULL, '1'),
(34, 'FERNANDO COSIO', NULL, NULL, '4884993', NULL, NULL, NULL, '74747664', NULL, 'fernando@gmail.com', '12345678', NULL, 'CLIENTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:26:13', NULL, NULL, '1'),
(35, 'DANIEL CALVETI', NULL, NULL, '3960487', NULL, NULL, NULL, '3232323', NULL, 'ervinnvs65@gmail.com', '12345678', NULL, 'CLIENTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:38:20', NULL, NULL, '1'),
(36, 'Misión Vida', NULL, NULL, '8424349', NULL, NULL, NULL, '74073600', NULL, 'ervinnvs652222@gmail.com', '12345678', NULL, 'CLIENTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:39:07', NULL, NULL, '1'),
(37, 'Benjamin Hilari', NULL, NULL, '32323', NULL, NULL, NULL, '34343434', NULL, 'benjamin@gmail.com', '12345678', NULL, 'CLIENTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:40:36', NULL, NULL, '1'),
(38, 'Misión Vida', NULL, NULL, '3233', NULL, NULL, NULL, '323232323', NULL, 'misionvida@gmail.com', '12345678', NULL, 'CLIENTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:47:12', NULL, NULL, '1'),
(39, 'Brigida', NULL, NULL, '323232', NULL, NULL, NULL, '445545', NULL, 'brigida@gmail.com', '12345678', NULL, 'CLIENTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:47:42', NULL, NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_delivery`
--
ALTER TABLE `tb_delivery`
  ADD PRIMARY KEY (`id_delivery`);

--
-- Indices de la tabla `tb_mis_direcciones`
--
ALTER TABLE `tb_mis_direcciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_motoqueros`
--
ALTER TABLE `tb_motoqueros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `tb_ubicacion`
--
ALTER TABLE `tb_ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_delivery`
--
ALTER TABLE `tb_delivery`
  MODIFY `id_delivery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_mis_direcciones`
--
ALTER TABLE `tb_mis_direcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_motoqueros`
--
ALTER TABLE `tb_motoqueros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_ubicacion`
--
ALTER TABLE `tb_ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
