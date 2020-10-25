-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2020 a las 15:41:13
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_destionnotas`
CREATE DATABASE `bd_destionnotas`;
use `bd_destionnotas`;

--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

CREATE TABLE `tbl_administrador` (
  `id_admin` int(3) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`id_admin`, `email`, `passwd`) VALUES
(1, 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'carlos@admin.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumno`
--

CREATE TABLE `tbl_alumno` (
  `id_alumno` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_p` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_m` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grupo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_alumno`
--

INSERT INTO `tbl_alumno` (`id_alumno`, `nombre`, `apellido_p`, `apellido_m`, `grupo`, `email`, `passwd`) VALUES
(1, 'Albert', 'Buendía', 'Mojil', 'Bachillerato 1', 'a.buendia@daw.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'David', 'Juan', 'Aranda', 'Bachillerato 1', 'd.juan@daw.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Carlos', 'Mirabal', 'Salazar', 'DAW1', 'carlos@daw.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notas`
--

CREATE TABLE `tbl_notas` (
  `id_nota` int(5) NOT NULL,
  `nombre_asignatura` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_alumno` int(5) NOT NULL,
  `nota` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `tbl_alumno`
--
ALTER TABLE `tbl_alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `tbl_notas`
--
ALTER TABLE `tbl_notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_alumno`
--
ALTER TABLE `tbl_alumno`
  MODIFY `id_alumno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_notas`
--
ALTER TABLE `tbl_notas`
  MODIFY `id_nota` int(5) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_notas`
--
ALTER TABLE `tbl_notas`
  ADD CONSTRAINT `tbl_notas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `tbl_alumno` (`id_alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
