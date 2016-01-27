-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2016 a las 08:20:58
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mycontacts`
--
CREATE DATABASE IF NOT EXISTS `mycontacts` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `mycontacts`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(75) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(100) COLLATE utf8_bin NOT NULL,
  `telf_prim` int(30) NOT NULL,
  `telf_sec` int(30) DEFAULT NULL,
  `ubicacion_prim_lat` double NOT NULL,
  `ubicacion_prim_lon` double NOT NULL,
  `ubicacion_sec_lat` double DEFAULT NULL,
  `ubicacion_sec_lon` double DEFAULT NULL,
  `img` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `apellidos`, `correo`, `direccion`, `telf_prim`, `telf_sec`, `ubicacion_prim_lat`, `ubicacion_prim_lon`, `ubicacion_sec_lat`, `ubicacion_sec_lon`, `img`, `id_usuario`) VALUES
(1, 'juana', 'rodriguez garcia', 'a@gmail.com', 'carrer del monseny', 933348756, 0, 41.513162, 2.113968, NULL, 0, '', 1),
(2, 'sofia', 'lopez gonzalez', 'b@gmail.com', 'carrer del poeta maragall', 933326587, NULL, 41.514761, 2.119912, NULL, NULL, '', 1),
(5, 'eric', 'perez mora', 'c@gmail.com', 'rambla europa', 933348554, NULL, 41.521114, 2.12611, NULL, NULL, '', 2),
(6, 'yhjghjh', 'a', 'a', 'a', 0, 123, 1, 1, 1, 1, 'unnamed.jpg', 1),
(8, 'felipe', 'iglesias', 'fasd', 'dsf', 0, 89, 1, 23, 5, 9, 'unnamed.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin NOT NULL,
  `img` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `correo` varchar(75) COLLATE utf8_bin NOT NULL,
  `pass` varchar(50) COLLATE utf8_bin NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `img`, `correo`, `pass`, `activo`) VALUES
(1, 'jose', 'rodriguez garcia', '1.jpg', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'sofia', 'lopez gonzalez', '', 'b@gmail.com', '123', 1),
(3, 'sdg', 'dfg', 'animal_021.jpg', 'fdgfd', 'fdgdfg', 1),
(4, 'sdf', 'dfgdf', 'unnamed.jpg', 'hytj', 'thhtr', 1),
(5, 'felipe', 'iglesias', 'foto.jpg', 'felipe', '123', 1),
(6, 'asfsdf', 'df', 'unnamed.jpg', 'djfgkl', 'okñdfjglñdfgñldfk', 1),
(7, 'hola', 'hola', '', 'sldjg', '1d8481f2840ea779562647f3d1fd022b', 1),
(8, 'jose luis', 'maseda', '', 'jose', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(9, 'felipe', 'asdf', 'unnamed.jpg', 'dsf', 'd41d8cd98f00b204e9800998ecf8427e', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
