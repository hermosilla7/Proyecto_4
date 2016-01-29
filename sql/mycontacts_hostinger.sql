-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2016 a las 12:29:40
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `apellidos`, `correo`, `direccion`, `telf_prim`, `telf_sec`, `ubicacion_prim_lat`, `ubicacion_prim_lon`, `ubicacion_sec_lat`, `ubicacion_sec_lon`, `img`, `id_usuario`) VALUES
(1, 'Sergio', 'Nieto Lopez', 'sergio@gmail.com', 'Carrer del Montseny, 5', 933348756, 622259833, 41.513162, 2.113968, NULL, NULL, '1.jpg', 1),
(2, 'Sofia', 'Del Pino Gonzalez', 'sofia1@gmail.com', 'Carrer del poeta Maragall', 933326587, 652248751, 41.514761, 2.119912, NULL, NULL, '2.jpg', 1),
(5, 'Eric', 'Luque Martinez', 'eric24@gmail.com', 'Av Carrilet, 323', 933348554, 699584236, 41.357609, 2.101775, NULL, NULL, '3.jpg', 2),
(6, 'Sandra', 'Castillo Iglesias', 'sandra.152@gmail.com', 'Carrer de la Miranda, 73', 658475216, 933338524, 41.360076, 2.078354, NULL, NULL, '6.jpg', 1),
(8, 'Ignacio', 'Rodriguez Rosa', 'nacho@gmail.com', 'Carrer del Moli, 4-6', 695235842, 934742269, 41.366338, 2.102993, NULL, NULL, '7.jpg', 1),
(9, 'Marta', 'De la Rosa Lopez', 'marta.rosa@gmail.com', 'Carrer hierbabuena, 34', 934578136, 722356952, 41.371408, 2.100212, NULL, NULL, '8.jpg', 2),
(10, 'Raul', 'Exposito Granados', 'r.exposito@gmail.com', 'Carrer de la primavera, 122-124', 622359412, 933526847, 41.371659, 2.106857, NULL, NULL, '9.jpg', 2),
(11, 'Miquel', 'Calvo Pastor', 'calvo_m@gmail.com', 'Carrer churruca, 22-24', 699523498, 933652125, 41.37574, 2.101004, NULL, NULL, '10.jpg', 1);

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
(1, 'David ', 'Marin Salvador', '5.jpg', 'david.marin@fje.edu', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'Ignasi', 'Romero Sanjuan', '3.jpg', 'ignasi.romero@fje.edu', ' 0ba0dd14265fced34a1202aeced9f02d', 1),
(3, 'Armand', 'Gutierrez Arumi', '4.jpg', 'armand.gutierrez@fje.edu', 'e10adc3949ba59abbe56e057f20f883e', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
