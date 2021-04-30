-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2021 a las 09:42:36
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `avalon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_disponibildad_horario`
--

CREATE TABLE `aux_disponibildad_horario` (
  `id` varchar(4) NOT NULL,
  `franja` int(11) UNSIGNED NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `horas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_disponibildad_horario`
--

INSERT INTO `aux_disponibildad_horario` (`id`, `franja`, `descripcion`, `horas`) VALUES
('0000', 0, 'Online', '24'),
('0001', 10, 'Noches', '12'),
('0010', 8, 'Tardes', '10'),
('0011', 9, 'Tarde y Noche', '11'),
('0100', 5, 'Mediodia', '6'),
('0101', 14, 'Mediodias y Noches', '0'),
('0110', 6, 'Mediodias y Tardes', '7'),
('0111', 7, 'Mediodias, Tardes y Noches', '9'),
('1000', 1, 'Mañanas', '8'),
('1001', 13, 'Mañanas y Noches', '0'),
('1010', 11, 'Mañanas y Tardes', '7'),
('1011', 12, 'Mañana, Tardes y Noches', '0'),
('1100', 2, 'Mañanas, Mediodia', '2'),
('1101', 15, 'Mañanas, Mediodia y Noches', '0'),
('1110', 3, 'Mañanas, Mediodia y Tardes ', '3'),
('1111', 4, 'Mañanas, Mediodia, Tardes y Noche', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_estado`
--

CREATE TABLE `aux_estado` (
  `id` int(11) UNSIGNED NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_estado`
--

INSERT INTO `aux_estado` (`id`, `descripcion`) VALUES
(1, 'Fijo'),
(2, 'Temporal'),
(3, 'Externo'),
(4, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_estudios`
--

CREATE TABLE `aux_estudios` (
  `id` int(11) UNSIGNED NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_estudios`
--

INSERT INTO `aux_estudios` (`id`, `descripcion`) VALUES
(1, 'Telecomunicaciones'),
(2, 'Informatica'),
(3, 'Psicologia'),
(4, 'Cocina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_nivel_estudios`
--

CREATE TABLE `aux_nivel_estudios` (
  `id` int(11) UNSIGNED NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_nivel_estudios`
--

INSERT INTO `aux_nivel_estudios` (`id`, `descripcion`) VALUES
(1, 'Analfabeto por problemas físicos o psíquicos'),
(2, 'Analfabeto por otras razones'),
(3, 'Sin estudios'),
(4, 'Estudios primarios o equivalentes'),
(5, 'Enseñanza general secundaria, 1er ciclo'),
(7, 'Enseñanza general secundaria, 2n ciclo'),
(8, 'Enseñanza Profesional de 2º grado, 2º ciclo'),
(9, 'Enseñanza general secundaria, 2º ciclo'),
(12, 'Enseñanzas profesionales superiores'),
(13, 'Estudios universitarios o equivalentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_tipos_documentos`
--

CREATE TABLE `aux_tipos_documentos` (
  `id` int(11) UNSIGNED NOT NULL,
  `documento` varchar(30) NOT NULL,
  `formato` varchar(30) NOT NULL,
  `longitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_tipos_documentos`
--

INSERT INTO `aux_tipos_documentos` (`id`, `documento`, `formato`, `longitud`) VALUES
(1, 'DNI', 'dd', 9),
(2, 'Tarjeta Extranjeria', 'ff', 10),
(3, 'Pasaporte', '55', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_tipo_usuarios`
--

CREATE TABLE `aux_tipo_usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_tipo_usuarios`
--

INSERT INTO `aux_tipo_usuarios` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Voluntario'),
(3, 'Usuario'),
(4, 'visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_tipo` int(11) UNSIGNED NOT NULL,
  `id_estado` int(11) UNSIGNED NOT NULL,
  `id_disponibilidad` varchar(4) NOT NULL,
  `alias` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `last_connection` date NOT NULL DEFAULT current_timestamp(),
  `id_tipo_documento` int(11) UNSIGNED NOT NULL,
  `num_documento` varchar(12) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname_01` varchar(30) NOT NULL,
  `surname_02` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `id_titulacion` int(11) UNSIGNED NOT NULL,
  `sector_estudios` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_tipo`, `id_estado`, `id_disponibilidad`, `alias`, `email`, `pwd`, `create_date`, `last_connection`, `id_tipo_documento`, `num_documento`, `name`, `surname_01`, `surname_02`, `birth_date`, `id_titulacion`, `sector_estudios`) VALUES
(49, 2, 1, '0110', 'voluntario', 'volu@volu.com', '$2y$10$XHsT70uvsvtUrXnEeMwcxuKNEV1rl4If9nEhFBnb.TfkD3fe7pSpW', '2021-04-29', '2021-04-29', 1, '111111111111', 'voluntario', 'voluntario', '', '2000-11-11', 1, 1),
(52, 3, 1, '0000', 'lunes', 'lune@f.es', '$2y$10$a4rvdyYY4kYAlknN3KrSBOTwsqsETwbwKXB98UgHt0b/YTfD0q6Ci', '2021-04-29', '2021-04-29', 1, '121212', 'Hola/2020', 'Hola/2020', '', '2000-11-11', 1, 1),
(55, 1, 1, '0000', 'martes', 'M@M.ES', '$2y$10$rrub1bTcTubTXEDtKHVoTOYi.RH765IGEv2fymzXTrhNJ0x7BPnfW', '2021-04-29', '2021-04-29', 1, 'dfsdfasd', 'Hola/2020', 'Hola/2020', 'Hola/2020', '2000-11-11', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aux_disponibildad_horario`
--
ALTER TABLE `aux_disponibildad_horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aux_estado`
--
ALTER TABLE `aux_estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aux_estudios`
--
ALTER TABLE `aux_estudios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aux_nivel_estudios`
--
ALTER TABLE `aux_nivel_estudios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aux_tipos_documentos`
--
ALTER TABLE `aux_tipos_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aux_tipo_usuarios`
--
ALTER TABLE `aux_tipo_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `num_documento` (`num_documento`),
  ADD KEY `tipo_documento` (`id_tipo_documento`),
  ADD KEY `Estado` (`id_estado`),
  ADD KEY `disponibilidad` (`id_disponibilidad`),
  ADD KEY `titulacon` (`id_titulacion`),
  ADD KEY `tipo` (`id_tipo`),
  ADD KEY `sector_estudios` (`sector_estudios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aux_estado`
--
ALTER TABLE `aux_estado`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aux_estudios`
--
ALTER TABLE `aux_estudios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aux_nivel_estudios`
--
ALTER TABLE `aux_nivel_estudios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `aux_tipos_documentos`
--
ALTER TABLE `aux_tipos_documentos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `aux_tipo_usuarios`
--
ALTER TABLE `aux_tipo_usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `aux_estado` (`id`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`id_tipo`) REFERENCES `aux_tipo_usuarios` (`id`),
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`id_tipo_documento`) REFERENCES `aux_tipos_documentos` (`id`),
  ADD CONSTRAINT `users_ibfk_6` FOREIGN KEY (`id_titulacion`) REFERENCES `aux_nivel_estudios` (`id`),
  ADD CONSTRAINT `users_ibfk_7` FOREIGN KEY (`sector_estudios`) REFERENCES `aux_estudios` (`id`),
  ADD CONSTRAINT `users_ibfk_8` FOREIGN KEY (`id_disponibilidad`) REFERENCES `aux_disponibildad_horario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
