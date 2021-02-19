-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2021 a las 22:27:43
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `red_social`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversacion`
--

CREATE TABLE `conversacion` (
  `idconversacion` int(11) NOT NULL,
  `id_mensaje` int(11) NOT NULL,
  `id_usuario_by` int(11) NOT NULL,
  `id_usuario_from` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_amigos`
--

CREATE TABLE `lista_amigos` (
  `idamigos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_amigo` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_amigos`
--

INSERT INTO `lista_amigos` (`idamigos`, `id_usuario`, `id_amigo`, `status`) VALUES
(1, 5, 4, 1),
(2, 1, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idmensajes` int(11) NOT NULL,
  `mensaje` varchar(45) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idmensajes`, `mensaje`, `de`, `para`) VALUES
(8, 'hola', 5, 4),
(9, 'hola para norrar XD', 5, 4),
(11, 'hola hola sad :c', 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reaction`
--

CREATE TABLE `reaction` (
  `idreaction` int(11) NOT NULL,
  `like` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido_paterno` varchar(45) NOT NULL,
  `apellido_materno` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasennia` varchar(255) NOT NULL,
  `foto_perfil` varchar(45) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `usuario`, `correo`, `contrasennia`, `foto_perfil`) VALUES
(1, 'Armando', 'Hernandez', 'Bautisa', 'MAndo', 'prueva@gmail.com', '123', 'default.png'),
(2, 'Armando', 'Hernandez', 'Bautisa', 'MAndo', 'prueva@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'default.png'),
(3, 'Mando', 'perez', 'perez', 'lol', 'jhjhd@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'default.png'),
(4, 'prueba', '1', '1', 'Cuatro', 'p1@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'default.png'),
(5, 'Armando', 'Hernandez', 'Bautista', 'Mando', 'mando@gmail.com', '1d28c120568c10e19b9d8abe8b66d0983fa3d2e11ee7751aca50f83c6f4a43aa', '5_1613761512.png'),
(6, 'Owner', 'perez', 'gonzales', 'O1A', 'owner@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_post`
--

CREATE TABLE `usuario_post` (
  `idusuario_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `texto` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_post`
--

INSERT INTO `usuario_post` (`idusuario_post`, `id_usuario`, `texto`, `foto`) VALUES
(1, 1, 'primer post de prueva', NULL),
(2, 4, 'prueba de post desde perfil cuatro', NULL),
(3, 5, 'gtgtgt', NULL),
(4, 5, 'gtgtgt', NULL),
(6, 5, 'otro post hehe', NULL),
(9, 5, '', '5_1613589512.jpg'),
(10, 5, 'publicacion sin foto', ''),
(81, 6, 'owner', ''),
(82, 6, 'owner', ''),
(83, 6, 'owner', ''),
(84, 6, 'owner', ''),
(85, 6, 'owner', ''),
(86, 6, 'owner', ''),
(87, 6, 'owner', ''),
(88, 6, 'owner', ''),
(89, 6, 'owner', ''),
(90, 6, 'owner', ''),
(91, 6, 'owner', ''),
(92, 6, 'owner', ''),
(93, 6, 'owner', ''),
(94, 6, 'owner', ''),
(95, 6, 'owner', ''),
(96, 6, 'owner', ''),
(97, 6, 'owner', ''),
(98, 6, 'owner', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_post_reaction`
--

CREATE TABLE `usuario_post_reaction` (
  `idusuario_post_reaction` int(11) NOT NULL,
  `id_usuario_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_post_reaction`
--

INSERT INTO `usuario_post_reaction` (`idusuario_post_reaction`, `id_usuario_post`, `id_usuario`) VALUES
(1, 10, 5),
(2, 10, 5),
(3, 10, 5),
(4, 97, 6),
(5, 96, 6),
(6, 98, 6),
(7, 81, 6),
(8, 9, 5),
(9, 9, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conversacion`
--
ALTER TABLE `conversacion`
  ADD PRIMARY KEY (`idconversacion`),
  ADD KEY `fk_conversacion_mensaje_idx` (`id_mensaje`),
  ADD KEY `fk_conversacion_usuario_by_idx` (`id_usuario_by`),
  ADD KEY `fk_conversacion_usuario_from_idx` (`id_usuario_from`);

--
-- Indices de la tabla `lista_amigos`
--
ALTER TABLE `lista_amigos`
  ADD PRIMARY KEY (`idamigos`),
  ADD KEY `fk_usuario_lista_amigos_idx` (`id_usuario`),
  ADD KEY `fk_usuario_lista_amigos_from_idx` (`id_amigo`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idmensajes`);

--
-- Indices de la tabla `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`idreaction`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `usuario_post`
--
ALTER TABLE `usuario_post`
  ADD PRIMARY KEY (`idusuario_post`),
  ADD KEY `fk_usuario_usuario_post_idx` (`id_usuario`);

--
-- Indices de la tabla `usuario_post_reaction`
--
ALTER TABLE `usuario_post_reaction`
  ADD PRIMARY KEY (`idusuario_post_reaction`),
  ADD KEY `id_usuario_post` (`id_usuario_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_amigos`
--
ALTER TABLE `lista_amigos`
  MODIFY `idamigos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idmensajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reaction`
--
ALTER TABLE `reaction`
  MODIFY `idreaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario_post`
--
ALTER TABLE `usuario_post`
  MODIFY `idusuario_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `usuario_post_reaction`
--
ALTER TABLE `usuario_post_reaction`
  MODIFY `idusuario_post_reaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conversacion`
--
ALTER TABLE `conversacion`
  ADD CONSTRAINT `fk_conversacion_mensaje` FOREIGN KEY (`id_mensaje`) REFERENCES `mensajes` (`idmensajes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conversacion_usuario_by` FOREIGN KEY (`id_usuario_by`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conversacion_usuario_from` FOREIGN KEY (`id_usuario_from`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lista_amigos`
--
ALTER TABLE `lista_amigos`
  ADD CONSTRAINT `fk_usuario_lista_amigos_by` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_lista_amigos_from` FOREIGN KEY (`id_amigo`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_post`
--
ALTER TABLE `usuario_post`
  ADD CONSTRAINT `fk_usuario_usuario_post` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_post_reaction`
--
ALTER TABLE `usuario_post_reaction`
  ADD CONSTRAINT `usuario_post_reaction_ibfk_1` FOREIGN KEY (`id_usuario_post`) REFERENCES `usuario_post` (`idusuario_post`),
  ADD CONSTRAINT `usuario_post_reaction_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
