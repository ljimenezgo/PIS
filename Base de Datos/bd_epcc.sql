-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2018 a las 10:16:45
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_epcc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_curso`
--

CREATE TABLE `alumno_curso` (
  `alumno_curso_id` int(11) NOT NULL,
  `alumno_cursoc_alumno_id` int(11) NOT NULL,
  `alumno_curso_curso_id` int(11) NOT NULL,
  `alumno_curso_estado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_docente`
--

CREATE TABLE `comentarios_docente` (
  `comentarios_docente_id` int(11) NOT NULL,
  `comentarios_docente_docente_id` int(11) NOT NULL,
  `comentarios_docente_alumno_id` int(11) NOT NULL,
  `comentarios_docente_comentario` longtext NOT NULL,
  `comentarios_docente_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `curso_id` int(11) NOT NULL,
  `curso_codigo` varchar(10) NOT NULL,
  `curso_descripcion` varchar(50) NOT NULL,
  `curso_malla_id` int(11) NOT NULL,
  `curso_equivalencia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_curso`
--

CREATE TABLE `docente_curso` (
  `docente_curso_id` int(11) NOT NULL,
  `docente_curso_docente_id` int(11) NOT NULL,
  `docente_curso_curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `libro_id` int(11) NOT NULL,
  `libro_codigo` varchar(20) DEFAULT NULL,
  `libro_nombre` varchar(80) NOT NULL,
  `libro_autor` varchar(50) NOT NULL,
  `libro_tipo` int(11) NOT NULL,
  `libro_pdf` varchar(200) DEFAULT '',
  `libro_enlace` varchar(200) DEFAULT NULL,
  `libro_estado` int(11) DEFAULT NULL,
  `libro_cantidad_disponible` int(11) DEFAULT NULL,
  `libro_cantidad` int(11) DEFAULT '0',
  `libro_anio` varchar(20) NOT NULL,
  `libro_editorial` varchar(100) NOT NULL,
  `libro_caracteristica` int(1) DEFAULT NULL,
  `trabajo_titulo` varchar(200) DEFAULT NULL,
  `trabajo_cargo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `malla_curricular`
--

CREATE TABLE `malla_curricular` (
  `malla_curricular_id` int(11) NOT NULL,
  `malla_curricular_dsc` varchar(10) NOT NULL,
  `malla_curricular_anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `matricula_id` int(11) NOT NULL,
  `matricula_anio` int(4) NOT NULL,
  `matricula_semestre` varchar(20) NOT NULL,
  `matricula_tipo` varchar(20) NOT NULL,
  `matricula_descripcion` varchar(200) NOT NULL,
  `matricula_fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `matricula_fecha_fin` timestamp NULL DEFAULT NULL,
  `matricula_estado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_promedio`
--

CREATE TABLE `nota_promedio` (
  `nota_promedio_id` int(11) NOT NULL,
  `nota_promedio_alumno_id` int(11) NOT NULL,
  `nota_promedio_semestre` varchar(20) NOT NULL,
  `nota_promedio_nota` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `persona_id` int(11) NOT NULL,
  `persona_nombres` varchar(45) NOT NULL,
  `persona_apellido1` varchar(45) NOT NULL,
  `persona_apellido2` varchar(45) NOT NULL,
  `persona_tipo_id` int(11) NOT NULL,
  `persona_dni` varchar(12) DEFAULT NULL,
  `persona_cui` varchar(10) DEFAULT NULL,
  `persona_direccion` varchar(50) DEFAULT NULL,
  `persona_email` varchar(50) DEFAULT NULL,
  `persona_telefono` varchar(12) DEFAULT NULL,
  `persona_malla` int(11) DEFAULT NULL,
  `persona_seccion` varchar(10) DEFAULT NULL,
  `persona_estado` int(11) NOT NULL,
  `persona_prestamo` int(11) NOT NULL,
  `persona_prestamo_total` int(11) DEFAULT '0',
  `persona_prestamo_deuda` int(11) DEFAULT '0',
  `persona_colaborador` int(11) DEFAULT '0',
  `persona_egresado` varchar(20) DEFAULT NULL,
  `persona_tipo_libro_prestado` varchar(100) DEFAULT NULL,
  `persona_tutor` int(11) NOT NULL,
  `persona_alumnos` int(20) NOT NULL DEFAULT '0',
  `persona_solicitar` int(11) NOT NULL,
  `persona_citado_tutoria` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`persona_id`, `persona_nombres`, `persona_apellido1`, `persona_apellido2`, `persona_tipo_id`, `persona_dni`, `persona_cui`, `persona_direccion`, `persona_email`, `persona_telefono`, `persona_malla`, `persona_seccion`, `persona_estado`, `persona_prestamo`, `persona_prestamo_total`, `persona_prestamo_deuda`, `persona_colaborador`, `persona_egresado`, `persona_tipo_libro_prestado`, `persona_tutor`, `persona_alumnos`, `persona_solicitar`, `persona_citado_tutoria`) VALUES
(72034061, 'ADMINISTRADOR', '', '', 1, '72034061', NULL, '', '', '', NULL, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0),
(72034062, 'BIBLIOTECA', '', '', 4, '72034062', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0),
(72034063, 'PSICOLOGIA', '', '', 8, '72034063', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0),
(72034064, 'BIENESTAR', '', '', 7, '72034064', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0),
(72034065, 'MEDICO', '', '', 9, '72034065', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `prestamo_id` int(11) NOT NULL,
  `prestamo_libro_id` int(11) NOT NULL,
  `prestamo_persona_id` int(11) NOT NULL,
  `prestamo_fecha_entrega` timestamp NULL DEFAULT NULL,
  `prestamo_fecha_a_devolver` timestamp NULL DEFAULT NULL,
  `prestamo_fecha_devolucion` timestamp NULL DEFAULT NULL,
  `prestamo_estado` int(11) NOT NULL,
  `prestamo_prestador` int(11) NOT NULL,
  `prestamo_tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_descripcion`) VALUES
(1, 'Administrador'),
(2, 'Alumno'),
(3, 'Profesor'),
(4, 'Biblioteca'),
(5, 'Colaborador'),
(6, 'ExAlumno'),
(7, 'Social'),
(8, 'Picologia'),
(9, 'Medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `seguimiento_id` int(11) NOT NULL,
  `seguimiento_docente` int(11) NOT NULL,
  `seguimiento_asignatura` varchar(200) NOT NULL,
  `seguimiento_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seguimiento_alumno` int(11) NOT NULL,
  `seguimiento_tema` varchar(200) NOT NULL,
  `seguimiento_asistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_libro`
--

CREATE TABLE `tipo_libro` (
  `tipo_libro_id` int(11) NOT NULL,
  `tipo_libro_dsc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_libro`
--

INSERT INTO `tipo_libro` (`tipo_libro_id`, `tipo_libro_dsc`) VALUES
(1, 'Virtual'),
(2, 'Fisico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `tipo_persona_id` int(11) NOT NULL,
  `tipo_persona_dsc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`tipo_persona_id`, `tipo_persona_dsc`) VALUES
(1, 'Administrador'),
(2, 'Alumno'),
(3, 'Profesor'),
(4, 'Biblioteca'),
(5, 'Colaborador'),
(6, 'ExAlumno'),
(7, 'Social'),
(8, 'Psicologia'),
(9, 'Medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoria`
--

CREATE TABLE `tutoria` (
  `tutoria_id` int(11) NOT NULL,
  `tutoria_docente` int(11) NOT NULL,
  `tutoria_alumno` int(11) NOT NULL,
  `tutoria_observacion` varchar(200) DEFAULT NULL,
  `tutoria_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tutoria_asunto` varchar(200) DEFAULT NULL,
  `tutoria_estado` int(11) NOT NULL DEFAULT '0',
  `tutoria_medico` int(11) NOT NULL DEFAULT '0',
  `tutoria_social` int(11) NOT NULL DEFAULT '0',
  `tutoria_piscologia` int(11) NOT NULL DEFAULT '0',
  `tutoria_medico_aceptado` int(11) NOT NULL DEFAULT '0',
  `tutoria_social_aceptado` int(11) NOT NULL DEFAULT '0',
  `tutoria_piscologia_aceptado` int(11) NOT NULL DEFAULT '0',
  `tutoria_cancelacion_motivo` varchar(200) DEFAULT NULL,
  `tutoria_medico_fecha` timestamp NULL DEFAULT NULL,
  `tutoria_social_fecha` timestamp NULL DEFAULT NULL,
  `tutoria_piscologia_fecha` timestamp NULL DEFAULT NULL,
  `tutoria_lugar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_cuenta` varchar(20) NOT NULL,
  `usuario_password` varchar(100) NOT NULL,
  `usuario_rol_id` int(11) NOT NULL,
  `usuario_persona_id` int(11) NOT NULL,
  `usuario_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_cuenta`, `usuario_password`, `usuario_rol_id`, `usuario_persona_id`, `usuario_estado`) VALUES
(36, '72034061', '$2y$10$AIJr66Tvp8gPkRDexwkuoOmlGaOh1.Yi5P34cj63g4qYEblLuINBe', 1, 72034061, 0),
(53, '72034062', '$2y$10$AIJr66Tvp8gPkRDexwkuoOmlGaOh1.Yi5P34cj63g4qYEblLuINBe', 4, 72034062, 0),
(54, '72034063', '$2y$10$AIJr66Tvp8gPkRDexwkuoOmlGaOh1.Yi5P34cj63g4qYEblLuINBe', 8, 72034063, 0),
(55, '72034064', '$2y$10$AIJr66Tvp8gPkRDexwkuoOmlGaOh1.Yi5P34cj63g4qYEblLuINBe', 7, 72034064, 0),
(56, '72034065', '$2y$10$AIJr66Tvp8gPkRDexwkuoOmlGaOh1.Yi5P34cj63g4qYEblLuINBe', 9, 72034065, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno_curso`
--
ALTER TABLE `alumno_curso`
  ADD PRIMARY KEY (`alumno_curso_id`),
  ADD UNIQUE KEY `alumno_curso_id_UNIQUE` (`alumno_curso_id`),
  ADD KEY `fk_alumno_curso_persona_idx` (`alumno_cursoc_alumno_id`),
  ADD KEY `fk_alumno_curso_curso_idx` (`alumno_curso_curso_id`);

--
-- Indices de la tabla `comentarios_docente`
--
ALTER TABLE `comentarios_docente`
  ADD PRIMARY KEY (`comentarios_docente_id`),
  ADD UNIQUE KEY `comentarios_docente_id_UNIQUE` (`comentarios_docente_id`),
  ADD KEY `fk_comentarios_docente_idx` (`comentarios_docente_docente_id`),
  ADD KEY `fk_comentarios_alumno_idx` (`comentarios_docente_alumno_id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`curso_id`),
  ADD UNIQUE KEY `curso_id_UNIQUE` (`curso_id`),
  ADD KEY `fk_curso_malla_idx` (`curso_malla_id`);

--
-- Indices de la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  ADD PRIMARY KEY (`docente_curso_id`),
  ADD UNIQUE KEY `docente_curso_id_UNIQUE` (`docente_curso_id`),
  ADD KEY `fk_docente_curso_persona_idx` (`docente_curso_docente_id`),
  ADD KEY `fk_docente_curso_curso_idx` (`docente_curso_curso_id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`libro_id`),
  ADD UNIQUE KEY `libro_id_UNIQUE` (`libro_id`),
  ADD KEY `fk_libro_tipo_libro_idx` (`libro_tipo`);

--
-- Indices de la tabla `malla_curricular`
--
ALTER TABLE `malla_curricular`
  ADD PRIMARY KEY (`malla_curricular_id`),
  ADD UNIQUE KEY `malla_curricular_id_UNIQUE` (`malla_curricular_id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`matricula_id`);

--
-- Indices de la tabla `nota_promedio`
--
ALTER TABLE `nota_promedio`
  ADD PRIMARY KEY (`nota_promedio_id`),
  ADD KEY `fk_nota_promedio_persona_idx` (`nota_promedio_alumno_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`persona_id`),
  ADD UNIQUE KEY `alumno_id_UNIQUE` (`persona_id`),
  ADD KEY `fk_persona_tipo_persona_idx` (`persona_tipo_id`),
  ADD KEY `fk_persona_malla_idx` (`persona_malla`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`prestamo_id`),
  ADD UNIQUE KEY `prestamo_id_UNIQUE` (`prestamo_id`),
  ADD KEY `fk_prestamo_libro_idx` (`prestamo_libro_id`),
  ADD KEY `fk_prestamo_persona_idx` (`prestamo_persona_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`),
  ADD UNIQUE KEY `rol_id_UNIQUE` (`rol_id`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`seguimiento_id`);

--
-- Indices de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  ADD PRIMARY KEY (`tipo_libro_id`),
  ADD UNIQUE KEY `tipo_libro_id_UNIQUE` (`tipo_libro_id`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`tipo_persona_id`),
  ADD UNIQUE KEY `docente_id_UNIQUE` (`tipo_persona_id`);

--
-- Indices de la tabla `tutoria`
--
ALTER TABLE `tutoria`
  ADD PRIMARY KEY (`tutoria_id`),
  ADD KEY `tutoria_docente` (`tutoria_docente`,`tutoria_alumno`),
  ADD KEY `tutoria_alumno` (`tutoria_alumno`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `fk_usuario_alumno_idx` (`usuario_persona_id`),
  ADD KEY `fk_usuario__rol_idx` (`usuario_rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno_curso`
--
ALTER TABLE `alumno_curso`
  MODIFY `alumno_curso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios_docente`
--
ALTER TABLE `comentarios_docente`
  MODIFY `comentarios_docente_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  MODIFY `docente_curso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `libro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `malla_curricular`
--
ALTER TABLE `malla_curricular`
  MODIFY `malla_curricular_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `matricula_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_promedio`
--
ALTER TABLE `nota_promedio`
  MODIFY `nota_promedio_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `prestamo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `seguimiento_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  MODIFY `tipo_libro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `tipo_persona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tutoria`
--
ALTER TABLE `tutoria`
  MODIFY `tutoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_curso`
--
ALTER TABLE `alumno_curso`
  ADD CONSTRAINT `fk_alumno_curso_curso` FOREIGN KEY (`alumno_curso_curso_id`) REFERENCES `curso` (`curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_curso_persona` FOREIGN KEY (`alumno_cursoc_alumno_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios_docente`
--
ALTER TABLE `comentarios_docente`
  ADD CONSTRAINT `fk_comentarios_alumno` FOREIGN KEY (`comentarios_docente_alumno_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_docente` FOREIGN KEY (`comentarios_docente_docente_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_malla` FOREIGN KEY (`curso_malla_id`) REFERENCES `malla_curricular` (`malla_curricular_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  ADD CONSTRAINT `fk_docente_curso_curso` FOREIGN KEY (`docente_curso_curso_id`) REFERENCES `curso` (`curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docente_curso_persona` FOREIGN KEY (`docente_curso_docente_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_libro_tipo_libro` FOREIGN KEY (`libro_tipo`) REFERENCES `tipo_libro` (`tipo_libro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_malla` FOREIGN KEY (`persona_malla`) REFERENCES `malla_curricular` (`malla_curricular_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_tipo_persona` FOREIGN KEY (`persona_tipo_id`) REFERENCES `tipo_persona` (`tipo_persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_prestamo_libro` FOREIGN KEY (`prestamo_libro_id`) REFERENCES `libro` (`libro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamo_persona` FOREIGN KEY (`prestamo_persona_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tutoria`
--
ALTER TABLE `tutoria`
  ADD CONSTRAINT `tutoria_ibfk_1` FOREIGN KEY (`tutoria_docente`) REFERENCES `persona` (`persona_id`),
  ADD CONSTRAINT `tutoria_ibfk_2` FOREIGN KEY (`tutoria_alumno`) REFERENCES `persona` (`persona_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario__rol` FOREIGN KEY (`usuario_rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_alumno` FOREIGN KEY (`usuario_persona_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
