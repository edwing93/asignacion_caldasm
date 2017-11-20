-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2017 a las 02:43:43
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asignacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `Id_cita` int(11) NOT NULL,
  `Kilometraje` int(11) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Notas` varchar(200) DEFAULT NULL,
  `Fecha_inicial` date DEFAULT NULL,
  `Hora_inicial` varchar(45) DEFAULT NULL,
  `Fecha_final` date DEFAULT NULL,
  `Hora_final` varchar(45) DEFAULT NULL,
  `Cedula_responsable` int(11) DEFAULT NULL,
  `Nombres_responsable` varchar(200) DEFAULT NULL,
  `Sedes_Id` int(11) NOT NULL,
  `Terceros_Nit` int(11) NOT NULL,
  `Vehiculos_Placa` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`Id_cita`, `Kilometraje`, `Estado`, `Notas`, `Fecha_inicial`, `Hora_inicial`, `Fecha_final`, `Hora_final`, `Cedula_responsable`, `Nombres_responsable`, `Sedes_Id`, `Terceros_Nit`, `Vehiculos_Placa`) VALUES
(5, 298, 'Pendiente', 'Revision de Llantas', '2017-11-22', '7:30', '2017-11-23', '12:00', NULL, 'Mi mama', 120, 1087493981, 'YMP94D'),
(6, 10000, 'Pendiente', 'MANTENIMIENTO', '2017-11-15', '14:00', '2017-11-18', '16:00', NULL, 'EDWIN GONZALEZ', 120, 1088307124, 'LYC777'),
(7, 5000, 'Pendiente', 'MANTENIMIENTO', '2017-12-01', '07:30', '2017-12-02', '11:00', NULL, 'LA DUEÑA', 120, 1088307124, 'NMP085'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 120, 1088307124, 'LYC777');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_tiene_operaciones`
--

CREATE TABLE `cita_tiene_operaciones` (
  `Estado_operacion` varchar(45) DEFAULT NULL,
  `Valor_total` varchar(45) DEFAULT NULL,
  `Operarios_Cedula` int(11) NOT NULL,
  `Operacion_general` varchar(45) DEFAULT NULL,
  `Cita_Id_cita` int(11) NOT NULL,
  `Operaciones_Id_operacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cita_tiene_operaciones`
--

INSERT INTO `cita_tiene_operaciones` (`Estado_operacion`, `Valor_total`, `Operarios_Cedula`, `Operacion_general`, `Cita_Id_cita`, `Operaciones_Id_operacion`) VALUES
('Pendiente', '0', 777, NULL, 5, 6),
('Pendiente', '0', 777, NULL, 6, 6),
('Pendiente', '0', 777, NULL, 7, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_terceros`
--

CREATE TABLE `login_terceros` (
  `Nit` int(11) NOT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `Terceros_Nit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_terceros`
--

INSERT INTO `login_terceros` (`Nit`, `Contrasena`, `Terceros_Nit`) VALUES
(1087493981, 'bolabola', 1087493981),
(1088307124, '123456', 1088307124);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_usuarios`
--

CREATE TABLE `login_usuarios` (
  `Nit` int(11) NOT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `Usuarios_Id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_usuarios`
--

INSERT INTO `login_usuarios` (`Nit`, `Contrasena`, `Usuarios_Id_usuario`) VALUES
(1088307124, '123456', 1088307124);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `Id_operacion` int(11) NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Tiempo` int(11) DEFAULT NULL,
  `Valor_operacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`Id_operacion`, `Descripcion`, `Tiempo`, `Valor_operacion`) VALUES
(6, 'Reparacion', 23, 231),
(12, 'm', 26, 30800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operarios`
--

CREATE TABLE `operarios` (
  `Cedula` int(11) NOT NULL,
  `Nombres` varchar(200) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operarios`
--

INSERT INTO `operarios` (`Cedula`, `Nombres`, `Estado`) VALUES
(222, 'Ca', 'Firme'),
(777, 'Lola', 'aci¡tv¡');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`Id`, `Nombre`, `Direccion`, `Telefono`) VALUES
(120, 'Minuto', 'Calle 17', 3298008);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE `terceros` (
  `Nit` int(11) NOT NULL,
  `Nombres` varchar(200) DEFAULT NULL,
  `Razon_social` varchar(45) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono1` int(11) DEFAULT NULL,
  `Telefono2` int(11) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Autoriza_datos` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`Nit`, `Nombres`, `Razon_social`, `Fecha_nacimiento`, `Direccion`, `Telefono1`, `Telefono2`, `Correo`, `Autoriza_datos`) VALUES
(1087493981, 'Andres Octavio', 'Mejia Jimenez', '2017-01-01', 'A la mitad del barrio', 2147483647, 2147483647, 'andresmj08@gmail.com', NULL),
(1088307124, 'Edwin Gonzalez', '', '1993-04-02', 'Rocio alto', NULL, 2147483647, 'Edwin@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Nombres` varchar(200) DEFAULT NULL,
  `Sede` varchar(45) DEFAULT NULL,
  `Perfil` varchar(45) DEFAULT NULL,
  `Sedes_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Nombres`, `Sede`, `Perfil`, `Sedes_Id`) VALUES
(1088307124, 'Edwin Echavarria', '120', 'admin', 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `Placa` varchar(6) NOT NULL DEFAULT '',
  `Descripcion` varchar(200) DEFAULT NULL,
  `Modelo` varchar(45) DEFAULT NULL,
  `Nit_tercero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`Placa`, `Descripcion`, `Modelo`, `Nit_tercero`) VALUES
('LYC777', 'MEGANE RS', '2017', 1088307124),
('NMP085', 'SANDERO', '2008', 1088307124),
('YMP94D', 'Chevrolet', '2009', 1087493981);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`Id_cita`),
  ADD KEY `fk_Cita_Sedes1_idx` (`Sedes_Id`),
  ADD KEY `fk_Cita_Terceros1_idx` (`Terceros_Nit`),
  ADD KEY `fk_Cita_Vehiculos1_idx` (`Vehiculos_Placa`);

--
-- Indices de la tabla `cita_tiene_operaciones`
--
ALTER TABLE `cita_tiene_operaciones`
  ADD KEY `fk_Cita_tiene_Operaciones_Operarios1_idx` (`Operarios_Cedula`),
  ADD KEY `fk_Cita_tiene_Operaciones_Cita1_idx` (`Cita_Id_cita`),
  ADD KEY `fk_Cita_tiene_Operaciones_Operaciones1_idx` (`Operaciones_Id_operacion`);

--
-- Indices de la tabla `login_terceros`
--
ALTER TABLE `login_terceros`
  ADD PRIMARY KEY (`Nit`),
  ADD KEY `fk_Login_terceros_Terceros1_idx` (`Terceros_Nit`);

--
-- Indices de la tabla `login_usuarios`
--
ALTER TABLE `login_usuarios`
  ADD PRIMARY KEY (`Nit`),
  ADD KEY `fk_Login_usuarios_Usuarios1_idx` (`Usuarios_Id_usuario`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`Id_operacion`);

--
-- Indices de la tabla `operarios`
--
ALTER TABLE `operarios`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD PRIMARY KEY (`Nit`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `fk_Usuarios_Sedes1_idx` (`Sedes_Id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`Placa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `Id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_Cita_Sedes1` FOREIGN KEY (`Sedes_Id`) REFERENCES `sedes` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_Terceros1` FOREIGN KEY (`Terceros_Nit`) REFERENCES `terceros` (`Nit`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_Vehiculos1` FOREIGN KEY (`Vehiculos_Placa`) REFERENCES `vehiculos` (`Placa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cita_tiene_operaciones`
--
ALTER TABLE `cita_tiene_operaciones`
  ADD CONSTRAINT `fk_Cita_tiene_Operaciones_Cita1` FOREIGN KEY (`Cita_Id_cita`) REFERENCES `cita` (`Id_cita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_tiene_Operaciones_Operaciones1` FOREIGN KEY (`Operaciones_Id_operacion`) REFERENCES `operaciones` (`Id_operacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_tiene_Operaciones_Operarios1` FOREIGN KEY (`Operarios_Cedula`) REFERENCES `operarios` (`Cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `login_terceros`
--
ALTER TABLE `login_terceros`
  ADD CONSTRAINT `fk_Login_terceros_Terceros1` FOREIGN KEY (`Terceros_Nit`) REFERENCES `terceros` (`Nit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `login_usuarios`
--
ALTER TABLE `login_usuarios`
  ADD CONSTRAINT `fk_Login_usuarios_Usuarios1` FOREIGN KEY (`Usuarios_Id_usuario`) REFERENCES `usuarios` (`Id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Sedes1` FOREIGN KEY (`Sedes_Id`) REFERENCES `sedes` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
