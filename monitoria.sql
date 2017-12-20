-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2017 a las 21:42:37
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `monitoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminldap`
--

CREATE TABLE `adminldap` (
  `id` int(11) NOT NULL,
  `user` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `adminldap`
--

INSERT INTO `adminldap` (`id`, `user`, `password`) VALUES
(1, 'ADMINUP', 'adminupdate123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(250) NOT NULL,
  `correcto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion`
--

CREATE TABLE `modificacion` (
  `id` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(250) NOT NULL,
  `correcto` tinyint(1) NOT NULL,
  `uid_modificado` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modificacion`
--

INSERT INTO `modificacion` (`id`, `login`, `fecha`, `hora`, `ip`, `correcto`, `uid_modificado`) VALUES
(1, 'ADMINUP', '2017-12-14', '11:02:12', '192.168.99.8', 0, ''),
(2, 'ADMINUP', '2017-12-14', '11:03:06', '192.168.99.8', 0, ''),
(3, 'ADMINUP', '2017-12-14', '11:08:07', '192.168.99.8', 0, ''),
(4, 'ADMINUP', '2017-12-14', '11:09:25', '192.168.99.8', 1, ''),
(5, 'ADMINUP', '2017-12-14', '11:17:30', '192.168.99.8', 1, ''),
(6, 'jcposso', '2017-12-20', '15:02:38', '192.168.99.8', 1, 'jcposso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacionpass`
--

CREATE TABLE `modificacionpass` (
  `id` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(250) NOT NULL,
  `correcto` tinyint(1) NOT NULL,
  `uid_modificado` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modificacionpass`
--

INSERT INTO `modificacionpass` (`id`, `login`, `fecha`, `hora`, `ip`, `correcto`, `uid_modificado`) VALUES
(1, 'jcposso', '0000-00-00', '00:00:00', '100.0.1.2', 1, ''),
(2, 'jcposso', '0000-00-00', '00:00:00', '100.0.1.2', 1, ''),
(3, 'jcposso', '2017-12-14', '10:44:15', '100.0.1.2', 1, ''),
(4, 'jcposso', '2017-12-14', '10:45:35', '100.0.1.2', 1, ''),
(5, 'jcposso', '2017-12-14', '10:48:33', '100.0.1.2', 1, ''),
(6, 'ADMINUP', '2017-12-14', '10:49:25', '192.168.99.8', 1, ''),
(7, 'ADMINUP', '2017-12-14', '10:49:44', '192.168.99.8', 1, ''),
(8, 'ADMINUP', '2017-12-14', '11:19:58', '192.168.99.8', 1, ''),
(9, 'ADMINUP', '2017-12-14', '11:20:41', '192.168.99.8', 1, ''),
(10, 'ADMINUP', '2017-12-20', '14:52:51', '192.168.99.8', 1, ''),
(11, 'jcposso', '2017-12-20', '14:57:56', '192.168.99.8', 1, 'jcposso'),
(12, 'jcposso', '2017-12-20', '14:58:39', '192.168.99.8', 1, 'prueba123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `cargo` varchar(36) NOT NULL,
  `uid` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL,
  `nombre` varchar(36) NOT NULL,
  `apellido` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `cargo`, `uid`, `password`, `nombre`, `apellido`) VALUES
(1, 'agente', 'jcposso', '123456', 'Juan Camilo ', 'Posso'),
(2, 'admin', 'prueba123', 'qweasd', 'Juan Camilo', 'Ponce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(250) NOT NULL,
  `correcto` tinyint(1) NOT NULL,
  `uid_creado` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `login`, `fecha`, `hora`, `ip`, `correcto`, `uid_creado`) VALUES
(1, 'ADMINUP', '2017-12-14', '11:00:25', '192.168.99.8', 1, ''),
(2, 'ADMINUP', '2017-12-14', '11:12:30', '192.168.99.8', 1, ''),
(3, 'jcposso', '2017-12-20', '15:05:41', '192.168.99.8', 1, 'FAPP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uidnumber`
--

CREATE TABLE `uidnumber` (
  `uidnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adminldap`
--
ALTER TABLE `adminldap`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modificacion`
--
ALTER TABLE `modificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modificacionpass`
--
ALTER TABLE `modificacionpass`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `uidnumber`
--
ALTER TABLE `uidnumber`
  ADD PRIMARY KEY (`uidnumber`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adminldap`
--
ALTER TABLE `adminldap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modificacion`
--
ALTER TABLE `modificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `modificacionpass`
--
ALTER TABLE `modificacionpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `uidnumber`
--
ALTER TABLE `uidnumber`
  MODIFY `uidnumber` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
