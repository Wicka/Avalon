-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2021 a las 10:30:56
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
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_ambito` int(11) UNSIGNED NOT NULL,
  `adaptada` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `num_participante` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `duracion` int(11) NOT NULL,
  `id_voluntario` int(11) UNSIGNED NOT NULL,
  `id_poblacion` int(11) UNSIGNED NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `id_grupo` int(11) UNSIGNED NOT NULL,
  `llena` int(1) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `id_ambito`, `adaptada`, `name`, `descripcion`, `num_participante`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`, `duracion`, `id_voluntario`, `id_poblacion`, `direccion`, `id_grupo`, `llena`, `id_estado`) VALUES
(122, 1, 0, 'Salir a buscar Flores', 'Buscar y catalogar distintas plantas de Montjuic', 10, '2021-05-10', '2021-05-10', '12:00:00', '18:00:00', 6, 124, 1, 'Plaça Espanya', 0, 0, 1),
(123, 1, 1, 'Declaracion IRPF', 'Ayuda en la campaña del IRPF 2020', 1, '2021-05-10', '2021-05-10', '17:00:00', '19:00:00', 3, 124, 1, 'Biblioteca Pere Candels', 0, 0, 1),
(124, 7, 1, 'Visita medica', 'Acompañar a la campaña vacunacion', 27, '2000-11-14', '2021-05-15', '00:18:26', '00:17:26', 13, 121, 1, 'Fira Barcelona l&#39;Hospitalet', 0, 0, 1),
(125, 3, 1, 'Pelicula Estreno', 'Ir al cine a ver una pelicula', 15, '2021-05-09', '2021-05-09', '00:16:00', '00:19:00', 3, 122, 1, 'Cines Icaria', 0, 0, 1),
(126, 2, 1, 'Descubrir Historia Ciudad', 'ruta por la zona románica de la ciudad, visita guiada', 12, '2021-06-11', '2021-06-11', '00:11:00', '00:18:00', 3, 126, 1, 'Plaça Catalunya', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuntados_actividad`
--

CREATE TABLE `apuntados_actividad` (
  `id` int(11) UNSIGNED NOT NULL,
  `grupo` int(11) UNSIGNED NOT NULL,
  `id_actividad` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apuntados_actividad`
--

INSERT INTO `apuntados_actividad` (`id`, `grupo`, `id_actividad`, `id_user`) VALUES
(1, 1, 122, 117),
(2, 1, 122, 120),
(5, 1, 124, 116),
(8, 1, 125, 116),
(9, 1, 122, 116),
(13, 1, 125, 125);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_ambito`
--

CREATE TABLE `aux_ambito` (
  `id` int(11) UNSIGNED NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_ambito`
--

INSERT INTO `aux_ambito` (`id`, `descripcion`) VALUES
(1, 'Naturaleza'),
(2, 'Museos'),
(3, 'Cine'),
(4, 'Teatro'),
(5, 'Gestiones'),
(6, 'Compras'),
(7, 'Consulta Medica'),
(8, 'Compañia');

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
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_estado`
--

INSERT INTO `aux_estado` (`id`, `descripcion`) VALUES
(1, 'Activo'),
(2, 'Baja'),
(3, 'Solicitud Elimacion cuenta');

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
-- Estructura de tabla para la tabla `aux_poblacion`
--

CREATE TABLE `aux_poblacion` (
  `id` int(11) UNSIGNED NOT NULL,
  `cp` varchar(5) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_poblacion`
--

INSERT INTO `aux_poblacion` (`id`, `cp`, `descripcion`) VALUES
(1, '08038', 'Barcelona'),
(2, '08221', 'Terrassa'),
(3, '08904', 'L\'Hospitalet de Llobregat'),
(4, '08860', 'Castelldefels');

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
  `telefono` int(12) UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `id_tipo`, `id_estado`, `id_disponibilidad`, `alias`, `email`, `telefono`, `pwd`, `create_date`, `last_connection`, `id_tipo_documento`, `num_documento`, `name`, `surname_01`, `surname_02`, `birth_date`, `id_titulacion`, `sector_estudios`) VALUES
(116, 3, 1, '1100', 'lunes', 'lunes@lunes.com ', 931112235, '$2y$10$6OXNjo9wWze61HRX.pwehOd1HVc2mJBCGvHB4xYZZ7JATYfeuq.yW ', '2021-05-08', '2021-05-10', 1, '11111111A ', 'Maria', 'Paredes ', 'Ruiz ', '2000-11-11', 7, 2),
(117, 3, 1, '0011', 'martes', 'martes@martes.com ', 612335444, '$2y$10$eiM9U9f58vfIRf0KKRBrZ.kyQ3WuUinCWw5kFQP4gkGrlciypTeyW ', '2021-05-08', '2021-05-08', 1, '22222222B ', 'Montse', 'Moreno ', 'Mesa ', '1986-02-11', 12, 1),
(118, 1, 1, '0000', 'admin', 'admin@admin.es ', 952554444, '$2y$10$Dna6Wlgpp3JEiQck1lvkA.1KcaDH1zBw9cUDG9Lo5NGTOwp82pQSm ', '2021-05-08', '2021-05-10', 1, '22233366V ', 'Administrador', 'Aplicacion ', 'The boss ', '2001-11-11', 12, 1),
(119, 3, 1, '0000', 'miercoles', 'miercoles@miercoles.es ', 935568899, '$2y$10$KH5T5K48A1JZQWmQKovPnuQ1LTJ4HEM5xvUdY0OuNOVXjpikRGQxq ', '2021-05-08', '2021-05-08', 1, '22233555P ', 'MIercoles', 'Romero ', 'Garcia ', '2000-11-11', 1, 1),
(120, 3, 1, '0011', 'jueves', 'jueves@jueves.es ', 611445789, '$2y$10$ZmLe7CwYWI77jtKcMfIAIeTe2yOP2hS4Roxv.QJ2D1TG.SRZbwCbi ', '2021-05-08', '2021-05-08', 1, '33333652F ', 'Julia', 'Garcia ', 'Roc ', '1980-11-11', 8, 1),
(121, 2, 1, '1100', 'enero', 'enero@enero.es ', 655999333, '$2y$10$rfQji3CjTeo/a8sy5ef6Kez.ddKJ4urbbLSJGDWcrpjKhho.SyBby ', '2021-05-08', '2021-05-10', 1, '99666555D ', 'Fernando', 'Abril ', 'Albiach ', '1974-11-11', 9, 3),
(122, 2, 1, '1011', 'febrero', 'febrero@febrero.es ', 695222333, '$2y$10$fZk5IGSlAlQbCPdcvWq.W.V6A1rLE1NRkSj1CHHErgVoCp/MNwGBK ', '2021-05-08', '2021-05-08', 1, '88999888D ', 'Isabel', 'Riera ', 'Marquez ', '2000-11-11', 8, 1),
(123, 2, 1, '0100', 'marzo', 'marzo@marzo.es ', 978886592, '$2y$10$ikcbzMQj.iRCaG/AW9ucnu84tHoCjqM7QxmCBL.NsnoR1HbRJ64oO ', '2021-05-08', '2021-05-08', 1, '22333000D ', 'Pepe', 'Luis ', 'Romero ', '2000-11-11', 9, 1),
(124, 2, 1, '0100', 'abril', 'abril@abril.com ', 95223336, '$2y$10$nUXb5xBdOvp2AphGLxpgre1SnzPbz4LOgZ/KMfFfxZvIN4/3Rzu.u ', '2021-05-08', '2021-05-08', 1, '88999555U ', 'Lara', 'Martinez ', 'Pujol ', '2000-11-11', 7, 1),
(125, 3, 1, '0000', 'viernes', 'viernes@viernes.es ', 962354785, '$2y$10$lMlpjVvwbWok9cr.seoSU.nfnbvnrVJWTb9gyWr02Zs6kPtv4SUBe ', '2021-05-10', '2021-05-10', 1, '99966652F ', 'Viernes', 'Semanal ', 'Peres ', '2000-11-11', 4, 2),
(126, 2, 1, '0110', 'mayo', 'mayo@mayo.es ', 655222889, '$2y$10$CSA2qazY/vbmyy8tSQWyH.CjgmTB6xCQyVT1u37N62d9DI0cuFIvO ', '2021-05-10', '2021-05-10', 1, '7788882112f ', 'Maya', 'Gomez ', 'Otero ', '1974-11-11', 8, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ambito` (`id_ambito`),
  ADD KEY `id_voluntario` (`id_voluntario`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_ciudad` (`id_poblacion`),
  ADD KEY `id_voluntario_2` (`id_voluntario`),
  ADD KEY `id_voluntario_3` (`id_voluntario`);

--
-- Indices de la tabla `apuntados_actividad`
--
ALTER TABLE `apuntados_actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `aux_ambito`
--
ALTER TABLE `aux_ambito`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `aux_poblacion`
--
ALTER TABLE `aux_poblacion`
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
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `apuntados_actividad`
--
ALTER TABLE `apuntados_actividad`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `aux_ambito`
--
ALTER TABLE `aux_ambito`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT de la tabla `aux_poblacion`
--
ALTER TABLE `aux_poblacion`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_ambito`) REFERENCES `aux_ambito` (`id`),
  ADD CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`id_voluntario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `apuntados_actividad`
--
ALTER TABLE `apuntados_actividad`
  ADD CONSTRAINT `apuntados_actividad_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id`),
  ADD CONSTRAINT `apuntados_actividad_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

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
