-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2022 a las 22:16:36
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
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `nombre_libro` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` int(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `article`
--

INSERT INTO `article` (`id_article`, `id_type`, `nombre_libro`, `autor`, `precio`, `description`) VALUES
(1, 4, 'Tokyo Revengers', 'Ken Wakui', 2000, 'La historia esta inspirada en la propia vida del autor, el cual perteneció a una pandilla real llamada \"Black Emperor\". El propio autor cuenta que su obra va de viajes en el tiempo puesto que él desconoce como funcionan las pandillas en la actualidad, y prefiere hablar de las de principios de los años 2000'),
(3, 1, 'El patito feo', 'Hans Christian Andersen', 600, 'El patito feo es un cuento clásico-contemporáneo escrito por Hans Christian Andersen, escritor y poeta danés, sobre un patito particularmente más grande, torpe y feo que sus hermanitos, los cuales le molestaban por lo feo que era.'),
(4, 2, 'Spider-Man', 'Stan Lee y Steve Ditko', 1200, 'Se trata de un superhéroe que emplea sus habilidades sobrehumanas, reminiscentes de una araña, para combatir a otros supervillanos que persiguen fines siniestros. Científico, vigilante, profesor, fotógrafo, superhéroe.'),
(5, 3, 'Cien años de soledad', 'Gabriel García Márquez', 900, 'es una novela del escritor colombiano Gabriel García Márquez, ganador del Premio Nobel de Literatura en 1982. Es considerada una obra maestra de la literatura hispanoamericana y universal, así como una de las obras más traducidas y leídas en español.'),
(6, 5, 'La Odisea', 'Homero', 2500, 'es un poema épico griego compuesto por 24 cantos, atribuido al poeta griego Homero. Se cree que fue compuesta en el siglo VIII a. C. en los asentamientos que tenía Grecia en la costa oeste del Asia Menor. Según otros autores, la Odisea se completa en el siglo VII');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type`
--

CREATE TABLE `type` (
  `Id_type` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `pasillo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type`
--

INSERT INTO `type` (`Id_type`, `type`, `pasillo`) VALUES
(1, 'Cuentos', 1),
(2, 'Historietas', 2),
(3, 'Novelas', 5),
(4, 'Mangas', 3),
(5, 'Libros de texto', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `type` (`id_type`);

--
-- Indices de la tabla `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`Id_type`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `type`
--
ALTER TABLE `type`
  MODIFY `Id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`Id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
