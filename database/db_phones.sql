-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 17:24:15
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
-- Base de datos: `db_phones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `brand_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id_brand`, `brand_name`) VALUES
(1, 'Motorola'),
(2, 'Apple'),
(3, 'Samsung'),
(4, 'Huawei'),
(7, 'Xiaomi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `model` varchar(100) NOT NULL,
  `memory` varchar(100) NOT NULL,
  `display` varchar(200) NOT NULL,
  `cpugpu` varchar(200) NOT NULL,
  `camera` varchar(200) NOT NULL,
  `id_brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `phones`
--

INSERT INTO `phones` (`id`, `img`, `model`, `memory`, `display`, `cpugpu`, `camera`, `id_brand`) VALUES
(22, 'img/6347747d9191e.jpg', 'Moto edg 30', 'RAM 8 GB /Int. Memory	256 GB', '6.7 inches 1080 x 2400 pixels', 'Snapdragon 778/ Adreno 642L', '108 MP + 8 MP + 16 MP', 1),
(23, 'img/634773b0db000.jpg', 'IPhone 13pro max', '128/256/512 GB/1 TB', 'Pantalla Super Retina XDR con ProMotion Resolución de 2778 x 1284 pixeles a 458 ppi', 'Apple A15 Bionic', 'Telefoto: 12 MP f/2.8, 77mm, 3x óptico Ultrawide: 12 MP f/1.8, 6P, 120º Principal: 12 MP f/1.5, 1,9um', 2),
(29, 'img/634773d171762.jpg', 'Samsung Galaxy A53', '6 GB RAM/ 128 o 256 GB Almacenamiento', 'Super AMOLED Full HD+ de 6,5 pulgadas, 120 Hz (el refresco no es adaptativo) y cobertura Corning Gorilla Glass 5', 'Exynos 1280 de 8 núcleos', 'Principal: sensor de 64 megapíxeles, óptica con valor de apertura f/1.8 y estabilización óptica Ultra gran angular: sensor de 12 megapíxeles y óptica con valor de apertura f/2.2 Cámara de profundidad:', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2a$12$dvNQBP0zl0SynNu/IG7b6.zxNzTojc9CnwFsKRlLuKKyva3rMy8HS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indices de la tabla `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
