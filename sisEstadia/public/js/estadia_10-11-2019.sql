-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2019 a las 08:10:12
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estadia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `idConsulta` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idFisioterapeuta` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `diagnostico` varchar(100) NOT NULL,
  `recomendacion` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `peso` int(11) DEFAULT NULL,
  `estatura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`idConsulta`, `idPaciente`, `idFisioterapeuta`, `fecha`, `diagnostico`, `recomendacion`, `edad`, `peso`, `estatura`) VALUES
(1, 3, 4, '2019-11-07 07:27:33', 'qrrewqewqr', 'werwer', 25, 23, 23),
(2, 3, 4, '2019-11-07 07:27:33', 'qrrewqewqr', 'werwer', 25, 23, 23),
(3, 6, 4, '2019-11-10 00:46:08', '3r234', '234234', 34, 34, 34),
(4, 10, 3, '2019-11-10 00:47:25', 'eryuytubvn ghfghrths hdhd', 'fhdfdf ghtrtu dgjtjtd', 34, 34, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `idDia` int(11) NOT NULL,
  `nombre` varchar(9) NOT NULL,
  `idFisioterapeuta` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`idDia`, `nombre`, `idFisioterapeuta`, `idHorario`, `condicion`) VALUES
(1, 'Lunes', 1, 1, 0),
(3, 'Lunes', 2, 1, 0),
(4, 'Martes', 2, 1, 0),
(5, 'Martes', 3, 3, 0),
(6, 'Miercoles', 3, 4, 0),
(7, 'Martes', 1, 4, 1),
(8, 'LUNES', 1, 2, 1),
(9, 'MARTES', 3, 3, 1),
(10, 'SABADO', 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idEspecialidad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspecialidad`, `nombre`, `condicion`) VALUES
(1, 'Medico General', 1),
(2, 'Deportiva', 1),
(3, 'Neurológica', 1),
(4, 'Respiratoria', 1),
(5, 'Traumatológica', 1),
(6, 'Geriátrica', 1),
(7, 'Infantil', 1),
(8, 'Terapia maxilofacial (ATM)', 1),
(9, 'Ergonomía labora', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fisioterapeuta`
--

CREATE TABLE `fisioterapeuta` (
  `idFisioterapeuta` int(11) NOT NULL,
  `idEspecialidad` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido_paterno` varchar(20) NOT NULL,
  `apellido_materno` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `fecha_nacimineto` date DEFAULT NULL,
  `NSS` varchar(15) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `cedula` varchar(8) NOT NULL,
  `calle` varchar(20) NOT NULL,
  `numero_exterior` int(11) DEFAULT NULL,
  `numero_interior` int(11) DEFAULT NULL,
  `colonia` varchar(20) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `contrasenia` varchar(10) NOT NULL,
  `conf_contrasenia` varchar(10) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fisioterapeuta`
--

INSERT INTO `fisioterapeuta` (`idFisioterapeuta`, `idEspecialidad`, `nombre`, `apellido_paterno`, `apellido_materno`, `sexo`, `fecha_nacimineto`, `NSS`, `estado`, `fecha_ingreso`, `cedula`, `calle`, `numero_exterior`, `numero_interior`, `colonia`, `municipio`, `correo`, `telefono`, `usuario`, `contrasenia`, `conf_contrasenia`, `imagen`) VALUES
(1, 1, 'kjsdlfjs', 'lkjlkj', 'lkjklj', 'FEMENINO', '2019-10-03', NULL, 'Activo', '2019-10-10', '54654564', 'lkjlkjlkj', 9, NULL, 'lkjlkjlkj', 'lkjlkj', 'correo@gmail.com', '5465465465', 'ejemplo123', 'ejemplo123', 'ejemplo123', 'juan.jpg'),
(2, 2, 'fisios', 'fisio', 'fisio', 'MASCULINO', '2019-09-29', NULL, 'Activo', '2019-10-25', '54654654', 'calleuno', 9, 9, 'centro', 'verlin', 'juandias@gmail.com', '1478523695', 'ejemplo123', 'ejemplo123', 'ejemplo123', 'joni.jpg'),
(3, 3, 'pedrito', 'sensual', 'dolores', 'Femenino', '2019-10-17', NULL, 'Activo', '2019-10-21', '12336547', 'callecita', 89, NULL, 'colonia', 'municipoio', 'eldona_spider@gmail.com', '7771103517', 'ejemplo123', 'ejemplo123', 'ejemplo123', 'juan.jpg'),
(4, 1, 'fiso 4', 'paterno fisio 4', 'materno fisio4', 'FEMENINO', '2019-11-30', NULL, 'Activo', '2019-11-08', '11111111', 'calle fisio 4', 4, 4, 'col fisio 4', 'mun fisio 4', 'fisio_4@gmail.com', '2222222222', 'fisio4', 'fisio4', 'fisio4', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int(11) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `inicio` time NOT NULL,
  `fin` time NOT NULL,
  `cupo` int(11) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `turno`, `inicio`, `fin`, `cupo`, `condicion`) VALUES
(1, 'Matutino', '08:00:00', '14:00:00', 15, 1),
(2, 'Vespertino', '14:00:00', '20:00:00', 15, 1),
(3, 'Matutino_2', '07:00:00', '10:00:00', 6, 1),
(4, 'Matutino_3', '10:00:00', '14:00:00', 5, 0),
(7, 'Matutino_4', '15:00:00', '18:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
  `idProfesion` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido_paterno` varchar(20) NOT NULL,
  `apellido_materno` varchar(20) NOT NULL,
  `calle` varchar(20) NOT NULL,
  `numero_exterior` int(11) DEFAULT NULL,
  `numero_interior` int(11) DEFAULT NULL,
  `colonia` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `fecha_nacimineto` date DEFAULT NULL,
  `NSS` varchar(15) DEFAULT NULL,
  `usuario` varchar(10) NOT NULL,
  `contrasenia` varchar(10) NOT NULL,
  `conf_contrasenia` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `idProfesion`, `nombre`, `apellido_paterno`, `apellido_materno`, `calle`, `numero_exterior`, `numero_interior`, `colonia`, `telefono`, `correo`, `sexo`, `fecha_nacimineto`, `NSS`, `usuario`, `contrasenia`, `conf_contrasenia`, `estado`, `municipio`, `imagen`) VALUES
(1, 16, 'juanes', 'perez', 'hernandez', 'xicotencatl', 31, NULL, 'xicotencatl', '1478523698', 'eldona_spider@gmail.com', 'Femenino', '2019-10-09', NULL, 'ejemplo123', 'ejemplo123', 'ejemplo123', 'Activo', 'zacatepec', 'joni.jpg'),
(2, 28, 'jose antonio', 'salgado', 'rivera', 'xicotencatl', 31, NULL, 'xicotencatl', '7773242920', 'eldona_spider@hotmail.com', 'Masculino', '1988-12-16', '14785236987', 'jose123', 'jose123', 'jose123', 'Activo', 'zacatepec', 'joni.jpg'),
(3, 1, 'pac 333', 'paterno pac 3', 'materno pac 3', 'calle pac 3', 3, 3, 'col pac 3', '3333333333', 'pac_3@gmail.com', 'Femenino', '2019-11-07', NULL, 'paci3', 'paci3', 'paci3', 'Inactivo', 'mun pac 3', NULL),
(6, 10, 'Angel José', 'Nava', 'Peralta', 'Gonzales Ortega', 113, NULL, 'Centro', '7771234567', 'angelNava@gmail.com', 'Femenino', '1993-10-18', NULL, 'nava123', 'nava123', 'nava123', 'Activo', 'Jojutla', '2.jpg'),
(7, 18, 'Guadalupe adriana', 'palacios', 'castillo', 'rafael zanches', 7, NULL, 'otilio montaño', '5524081533', 'guadalupe@gmail.com', 'FEMENINO', '1992-12-12', NULL, 'guadalupe3', 'guadalupe3', 'guadalupe3', 'Activo', 'tlaltizapan', '3.jpg'),
(8, 16, 'christopher caleb', 'salgado', 'palacios', 'rafael saNchez', 7, NULL, 'otilio montaño', '7779632587', 'cristopher@gmail.com', 'MASCULINO', '2012-10-19', NULL, 'cris123', 'cris123', 'cris123', 'Activo', 'tlaltizapan', 'angel.jpg'),
(9, 1, 'cesar', 'gonsalez', 'palacio', 'rafael Sanches', 7, NULL, 'otilio montaño', '0000000000', 'cesar@gmail.com', 'MASCULINO', '2016-03-15', NULL, 'cesar123', 'cesar123', 'cesar123', 'Activo', 'tlaltizapan', '6.jpg'),
(10, 42, 'violeta', 'gonsalez', 'palacios', 'rafael sanchez', 7, NULL, 'otilio montaño', '5524081533', 'guadalupe@gmail.com', 'Femenino', '2017-12-21', NULL, 'violeta123', 'violeta123', 'violeta123', 'Activo', 'tlaltizapan', '7.jpg'),
(11, 28, 'antonio', 'arriaga', 'castellanos', 'efren mancilla', 4, NULL, 'plan de ayala', '7343430901', 'antonio@gmail.com', 'MASCULINO', '1955-09-09', NULL, 'antonio123', 'antonio123', 'antonio123', 'Inactivo', 'zacatepec', '6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE `profesion` (
  `idProfesion` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`idProfesion`, `nombre`, `condicion`) VALUES
(1, 'Carpintero(a)', 1),
(2, 'Cerrajero(a)', 1),
(3, 'Mecánico', 1),
(4, 'Pescador(a)', 1),
(5, 'Albañil', 1),
(6, 'Fontanero(a)', 1),
(7, 'Soldador', 1),
(8, 'Sastre', 1),
(9, 'Pastor ganadero', 1),
(10, 'Agricultor(a)', 1),
(11, 'Carnicero(a)', 1),
(12, 'Chofer o conductor(a', 1),
(13, 'Frutero(a)', 1),
(14, 'Artesano(a)', 1),
(15, 'Barrendero(a)', 1),
(16, 'Lechero(a)', 1),
(17, 'Lavandero(a)', 1),
(18, 'Escultor(a)', 1),
(19, 'Editor(a)', 1),
(20, 'Obrero(a)', 1),
(21, 'Locutor(a)', 1),
(22, 'Escritor(a)', 1),
(23, 'Vendedor(a)', 1),
(24, 'Repartidor(a)', 1),
(25, 'Peluquero(a)', 1),
(26, 'Policía', 1),
(27, 'Abogado(a)', 1),
(28, 'Ingeniero(a)', 1),
(29, 'Biólogo(a)', 1),
(30, 'Profesor(a)', 1),
(31, 'Físico(a)', 1),
(32, 'Químico(a)', 1),
(33, 'Electricista', 1),
(34, 'Filósofo(a)', 1),
(35, 'Médico', 1),
(36, 'Arquitecto(a)', 1),
(37, 'Periodista', 1),
(38, 'Secretaria(o)', 1),
(39, 'Enfermero(a)', 1),
(40, 'Paramédico', 1),
(41, 'Ama de Casa', 1),
(42, 'Niño/a 1-3 años', 1),
(43, 'Niño/a 3 - 12', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `idFisioterapeuta` (`idFisioterapeuta`);

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`idDia`),
  ADD KEY `idFisioterapeuta` (`idFisioterapeuta`),
  ADD KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `fisioterapeuta`
--
ALTER TABLE `fisioterapeuta`
  ADD PRIMARY KEY (`idFisioterapeuta`),
  ADD KEY `idEspecialidad` (`idEspecialidad`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`),
  ADD KEY `idProfesion` (`idProfesion`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
  ADD PRIMARY KEY (`idProfesion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `dia`
--
ALTER TABLE `dia`
  MODIFY `idDia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `fisioterapeuta`
--
ALTER TABLE `fisioterapeuta`
  MODIFY `idFisioterapeuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
  MODIFY `idProfesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`idFisioterapeuta`) REFERENCES `fisioterapeuta` (`idFisioterapeuta`);

--
-- Filtros para la tabla `dia`
--
ALTER TABLE `dia`
  ADD CONSTRAINT `dia_ibfk_1` FOREIGN KEY (`idFisioterapeuta`) REFERENCES `fisioterapeuta` (`idFisioterapeuta`),
  ADD CONSTRAINT `dia_ibfk_2` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`);

--
-- Filtros para la tabla `fisioterapeuta`
--
ALTER TABLE `fisioterapeuta`
  ADD CONSTRAINT `fisioterapeuta_ibfk_1` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`idEspecialidad`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`idProfesion`) REFERENCES `profesion` (`idProfesion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
