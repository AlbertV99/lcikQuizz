-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-10-2019 a las 01:15:25
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lcikQuizz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dificultad`
--

CREATE TABLE `dificultad` (
  `iddificultad` int(11) NOT NULL,
  `descripcionDificultad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dificultad`
--

INSERT INTO `dificultad` (`iddificultad`, `descripcionDificultad`) VALUES
(1, 'Facil'),
(2, 'Medio'),
(3, 'Dificil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL,
  `descripcionPregunta` varchar(200) NOT NULL,
  `Explicacion` mediumtext,
  `dificultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idpregunta`, `descripcionPregunta`, `Explicacion`, `dificultad_id`) VALUES
(59, 'Â¿QuiÃ©n creo el Sistema Operativo Linux?', NULL, 1),
(60, 'Â¿Donde se guardan los datos en una PC?', NULL, 1),
(61, 'Â¿Cuantos MegaBytes tiene un TeraByte?', NULL, 1),
(63, 'Â¿Cual de estos es un navegador web?', NULL, 1),
(64, 'Â¿Que significa informÃ¡tica?', NULL, 1),
(65, 'Cual de estos no es un dispositivo imprescidible para usar una computadora', NULL, 1),
(66, 'Â¿Cuales de estos programas sirven para editar fotos?', NULL, 1),
(67, 'Â¿Cual es el cerebro del computador?', NULL, 1),
(68, 'Â¿Cual fue el primer dispositivo utilizado para calcular?', NULL, 1),
(69, 'Â¿Como se llama el evento en el que estas?', NULL, 1),
(70, 'Â¿Cual es el lugar donde se ubican todos los componentes de la computadora?', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idrespuesta` int(11) NOT NULL,
  `respuesta` varchar(50) NOT NULL,
  `esCorrecto` varchar(2) NOT NULL,
  `pregunta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idrespuesta`, `respuesta`, `esCorrecto`, `pregunta_id`) VALUES
(1, 'Steve Jobs', 'NO', 59),
(2, 'Linus Tordvalds', 'SI', 59),
(3, 'Bill Gates', 'NO', 59),
(4, 'Procesador', 'NO', 60),
(5, 'Memoria', 'NO', 60),
(6, 'DiscoDuro', 'SI', 60),
(7, '1024', 'SI', 61),
(8, '1000', 'NO', 61),
(9, '1999', 'NO', 61),
(10, 'Mozilla Firefox', 'SI', 63),
(11, 'Facebook', 'NO', 63),
(12, 'PlayStore', 'NO', 63),
(13, 'Uso de computadoras', 'NO', 64),
(14, 'InformaciÃ³n automatica', 'SI', 64),
(15, 'Manejo de programas de la computadora', 'NO', 64),
(16, 'Impresora', 'SI', 65),
(17, 'Teclado', 'NO', 65),
(18, 'Monitor', 'NO', 65),
(19, 'Photoshop', 'SI', 66),
(20, 'Excel', 'NO', 66),
(21, 'PowerPoint', 'NO', 66),
(22, 'Monitor', 'NO', 67),
(23, 'Procesador', 'SI', 67),
(24, 'Placa madre', 'NO', 67),
(25, 'Abaco', 'SI', 68),
(26, 'Calculadora', 'NO', 68),
(27, 'ENIAC', 'NO', 68),
(28, 'EyC', 'NO', 69),
(29, 'ETyC', 'SI', 69),
(30, 'ETC', 'NO', 69),
(31, 'Gabinete', 'SI', 70),
(32, 'CPU', 'NO', 70),
(33, 'Placa madre', 'NO', 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `iddificultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `puntaje`, `iddificultad`) VALUES
(1, 'ALBERTO', 5, 1),
(2, 'Ricardo Galeano', 7, 1),
(3, 'Cardozo', 10, 1),
(4, 'Edu', 8, 1),
(5, 'Kevyn', 6, 1),
(6, 'tu hermana en tanga', 8, 1),
(7, 'meli', 10, 1),
(8, 'CESAR ECHAURI', 7, 1),
(9, 'david', 7, 1),
(10, 'Manuel', 8, 1),
(11, 'Kevyn Vera', 10, 1),
(12, 'Matias Brunp', 9, 1),
(13, 'Uriel', 6, 1),
(14, 'Auxiliadora Acosta', 10, 1),
(15, 'Ede', 10, 1),
(16, 'marce', 8, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dificultad`
--
ALTER TABLE `dificultad`
  ADD PRIMARY KEY (`iddificultad`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idpregunta`),
  ADD KEY `fk_pregunta_dificultad1_idx` (`dificultad_id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idrespuesta`),
  ADD KEY `fk_respuesta_pregunta_idx` (`pregunta_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idrespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_dificultad1` FOREIGN KEY (`dificultad_id`) REFERENCES `dificultad` (`iddificultad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_pregunta` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`idpregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
