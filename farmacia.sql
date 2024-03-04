-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2024 a las 02:47:26
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmacia`
--
CREATE DATABASE IF NOT EXISTS `farmacia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `farmacia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizaciones`
--

CREATE TABLE `autorizaciones` (
  `id_auto` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `id_detalle` int(11) NOT NULL,
  `id_medico` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `docu_medico` int(11) NOT NULL,
  `id_esp` int(3) NOT NULL,
  `id_estado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(3) NOT NULL,
  `ciudad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `ciudad`) VALUES
(1, 'Bogota'),
(2, 'Ibagué'),
(3, 'Cali'),
(4, 'Medellin'),
(5, 'Cartagena'),
(6, 'Manizales'),
(7, 'Bucaramanga'),
(8, 'Pereira'),
(9, 'Armenia'),
(10, 'Caqueta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_autorizacion`
--

CREATE TABLE `det_autorizacion` (
  `id_detalle` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `medida_cant` varchar(20) NOT NULL,
  `concentracion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `nit` varchar(10) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `id_licencia` int(10) DEFAULT NULL,
  `codigo_unico` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`nit`, `empresa`, `id_licencia`, `codigo_unico`) VALUES
('1234569877', 'Sanitas', 1, 123),
('2581473692', 'Nueva EPS', 2, 852);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eps`
--

CREATE TABLE `eps` (
  `id_eps` int(4) NOT NULL,
  `eps` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eps`
--

INSERT INTO `eps` (`id_eps`, `eps`) VALUES
(1, 'Salud Total '),
(2, 'Coomeva'),
(3, 'Compensar'),
(4, 'Sanitas'),
(5, 'Cafesalud'),
(6, 'Famisanar'),
(7, 'Nueva EPS'),
(8, 'Aliansalud '),
(9, 'Colmédica'),
(10, 'EPS Sura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializacion`
--

CREATE TABLE `especializacion` (
  `id_esp` int(3) NOT NULL,
  `especializacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especializacion`
--

INSERT INTO `especializacion` (`id_esp`, `especializacion`) VALUES
(1, 'Medicina Interna'),
(2, 'Pediatría'),
(3, 'Cirujano'),
(4, 'Ginecología y Obstetricia'),
(5, 'Psiquiatría'),
(6, 'Dermatología'),
(7, 'Oftalmología'),
(8, 'Otorrinolaringología'),
(9, 'Cardiología'),
(10, 'Neurología'),
(11, 'Endocrinología'),
(12, 'Nefrología'),
(13, 'Reumatología'),
(15, 'Radiología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(3) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `estado`) VALUES
(1, 'Pendiente'),
(2, 'Entregado'),
(3, 'Activo'),
(4, 'Inactivo'),
(5, 'Activa'),
(6, 'Cancelada'),
(7, 'Disponible'),
(8, 'Agotado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id_lab` int(4) NOT NULL,
  `laboratorio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`id_lab`, `laboratorio`) VALUES
(2, 'Laboratorio Pharma'),
(3, 'Laboratorio Tecnofarma'),
(4, 'Laboratorio MK'),
(5, 'Laboratorio Biogalenic'),
(6, 'Laboratorio Takeda'),
(7, 'Laboratorio LKM'),
(8, 'Laboratorio Roche'),
(9, 'Laboratorio Bayer'),
(10, 'Laboratorio Abbott'),
(11, 'Laboratorio Duran');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `id_licencia` int(10) NOT NULL,
  `licencia` varchar(10) NOT NULL,
  `f_inicio` date NOT NULL,
  `f_fin` date NOT NULL,
  `id_estado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`id_licencia`, `licencia`, `f_inicio`, `f_fin`, `id_estado`) VALUES
(1, 'a5dd5w6q3', '2024-02-21', '2025-02-21', 3),
(2, '4W#mb@J1y&', '2024-02-27', '2025-02-27', 3),
(3, 'x204lr#7%A', '2024-03-04', '2025-03-04', 3),
(4, 'w5wxbXlJX*', '2024-03-04', '2025-03-04', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medicamento` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_cla` int(3) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `medida_cant` varchar(20) NOT NULL,
  `id_lab` int(5) NOT NULL,
  `f_vencimiento` date NOT NULL,
  `lote` varchar(30) NOT NULL,
  `id_estado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id_medicamento`, `nombre`, `id_cla`, `cantidad`, `medida_cant`, `id_lab`, `f_vencimiento`, `lote`, `id_estado`) VALUES
(1, 'hbhggh', 5, '40tvtgf', '6yhgnh', 5, '2024-03-27', '677vgvn', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `docu_medico` int(11) NOT NULL,
  `id_doc` int(2) NOT NULL,
  `nombre_comple` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `id_rol` int(3) NOT NULL,
  `id_estado` int(3) NOT NULL,
  `id_esp` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`docu_medico`, `id_doc`, `nombre_comple`, `correo`, `telefono`, `password`, `id_rol`, `id_estado`, `id_esp`) VALUES
(1122736351, 3, 'Jeferson Cardenal', 'jefer23@gmail.com', '3002349008', 'jefer123', 3, 3, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rh`
--

CREATE TABLE `rh` (
  `id_rh` int(2) NOT NULL,
  `rh` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rh`
--

INSERT INTO `rh` (`id_rh`, `rh`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(3) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Desarrollador'),
(2, 'Administrador'),
(3, 'Medico'),
(4, 'Farmaceuta'),
(5, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_medicamento`
--

CREATE TABLE `tipo_medicamento` (
  `id_cla` int(3) NOT NULL,
  `clasificacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_medicamento`
--

INSERT INTO `tipo_medicamento` (`id_cla`, `clasificacion`) VALUES
(1, 'Analgesicos'),
(2, 'Antibioticos'),
(3, 'Anticonvulsivos'),
(4, 'Antidepresivos'),
(5, 'Antidiabeticos'),
(6, 'Antihipertensivos'),
(7, 'Antiinflamatorios'),
(8, 'Antipireticos'),
(9, 'Antitusivos'),
(10, 'Jarabe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trigg`
--

CREATE TABLE `trigg` (
  `n_password` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `v_password` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trigg`
--

INSERT INTO `trigg` (`n_password`, `v_password`, `tipo`, `fecha_creacion`) VALUES
('$2y$10$ZbpyX7GXpoOeI5eocfNz4O2pXH15pK.VXlnGsQeBalUx.qAN4wPEy', '$2y$10$ZbpyX7GXpoOeI5eocfNz4O2pXH15pK.VXlnGsQeBalUx.qAN4wPEy', 'update', '2024-03-02 19:46:35'),
('$2y$10$ZbpyX7GXpoOeI5eocfNz4O2pXH15pK.VXlnGsQeBalUx.qAN4wPEy', '$2y$10$ZbpyX7GXpoOeI5eocfNz4O2pXH15pK.VXlnGsQeBalUx.qAN4wPEy', 'update', '2024-03-02 19:47:58'),
('$2y$10$ZbpyX7GXpoOeI5eocfNz4O2pXH15pK.VXlnGsQeBalUx.qAN4wPEy', '$2y$10$ZbpyX7GXpoOeI5eocfNz4O2pXH15pK.VXlnGsQeBalUx.qAN4wPEy', 'update', '2024-03-02 19:54:34'),
('$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', '$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', 'update', '2024-03-03 16:38:04'),
('$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', '$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', 'update', '2024-03-03 16:45:05'),
('$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', '$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', 'update', '2024-03-03 16:46:16'),
('$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', '$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', 'update', '2024-03-03 16:47:53'),
('$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', '$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', 'update', '2024-03-03 17:06:11'),
('$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', '$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', 'update', '2024-03-03 18:00:57'),
('$2y$10$SdoiObkZ1uDA4xJisQ.e0usOVocevda7AbLhDR3A695UYObZyYwKm', '$2y$10$bDErsmra50Mo52nmlHpzeudKWRexuiCRs7SNTvypwnAqUJPiC.dCq', 'update', '2024-03-03 18:55:10'),
('$2y$10$SdoiObkZ1uDA4xJisQ.e0usOVocevda7AbLhDR3A695UYObZyYwKm', '$2y$10$SdoiObkZ1uDA4xJisQ.e0usOVocevda7AbLhDR3A695UYObZyYwKm', 'update', '2024-03-03 18:59:22'),
('$2y$10$0ooHUI6MSxlCboxr006x.u2IG81MgLCp1KCJetEISNWLYuCWw9Z2e', '$2y$10$SdoiObkZ1uDA4xJisQ.e0usOVocevda7AbLhDR3A695UYObZyYwKm', 'update', '2024-03-03 19:00:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_documento`
--

CREATE TABLE `t_documento` (
  `id_doc` int(3) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_documento`
--

INSERT INTO `t_documento` (`id_doc`, `tipo`) VALUES
(1, 'Registro Civil'),
(2, 'Tarjeta de Identidad'),
(3, 'Cedula de Ciudadania'),
(4, 'Cedula de Extrangeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `documento` int(11) NOT NULL,
  `id_doc` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `id_eps` int(4) NOT NULL,
  `id_rh` int(2) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `id_ciudad` int(3) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `id_rol` int(3) NOT NULL,
  `id_estado` int(3) NOT NULL,
  `nit` varchar(10) DEFAULT NULL,
  `token` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`documento`, `id_doc`, `nombre`, `apellido`, `id_eps`, `id_rh`, `telefono`, `correo`, `id_ciudad`, `direccion`, `password`, `id_rol`, `id_estado`, `nit`, `token`) VALUES
(1003239087, 3, 'Juan Esteban', 'Ortega', 1, 1, '3046589012', 'juanes@gmail.com', 7, 'Cra 5 23-30', '$2y$10$4Er5XPvRfHpO3dUS7ZhkVe2AEaONDw/8eLQ.3cWw6eh.EcDKUC70W', 5, 4, NULL, ''),
(1110172892, 3, 'Valentina', 'Mendoza', 7, 7, '3158571432', 'Valenramirez@gmail.com', 1, 'Barrio Usaquen', '$2y$10$TYJFKZbibuno5.SpYna0duc.a6up7kuCw2bfbbrCnFxCs/ihXunHe', 2, 3, '1234569877', ''),
(1118723902, 3, 'Aura Cristina', 'Olaya', 5, 8, '3228901209', 'Auraolaya@gmail.com', 4, 'Cra 5 norte 23-40', '$2y$10$GVXLX/6r5YA4amnDbAMRBODFxiLBQqOmzfpE/Y6Fmo0Vgu88Tdh0m', 4, 4, '1234569877', ''),
(1118763542, 3, 'Santiago', 'Prada', 4, 2, '3218906523', 'santiagoprada@gmail.com', 2, 'Barrio el Jardin', '$2y$10$tgxzhYlCkVFTwGk310aYh.Kth5w2hvQp.a3mN3Ny9g1H4aNXYi8M.', 1, 3, '1234569877', ''),
(1122736312, 3, 'Natalia', 'Giraldo', 8, 5, '3142638890', 'vmendoza098@misena.edu.co', 6, 'cra 3 23-34', '$2y$10$0ooHUI6MSxlCboxr006x.u2IG81MgLCp1KCJetEISNWLYuCWw9Z2e', 5, 4, NULL, '3s92');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `update_contra` AFTER UPDATE ON `usuarios` FOR EACH ROW begin insert into trigg(n_password, v_password, tipo) values(new.password, old.password, 'update'); end
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_cita` (`id_cita`),
  ADD KEY `id_detalle` (`id_detalle`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_medico` (`docu_medico`),
  ADD KEY `id_esp` (`id_esp`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `det_autorizacion`
--
ALTER TABLE `det_autorizacion`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_auto` (`id_auto`),
  ADD KEY `id_medicamento` (`id_medicamento`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`nit`);

--
-- Indices de la tabla `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`id_eps`);

--
-- Indices de la tabla `especializacion`
--
ALTER TABLE `especializacion`
  ADD PRIMARY KEY (`id_esp`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`id_licencia`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medicamento`),
  ADD KEY `id_cla` (`id_cla`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`docu_medico`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_esp` (`id_esp`),
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `rh`
--
ALTER TABLE `rh`
  ADD PRIMARY KEY (`id_rh`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_medicamento`
--
ALTER TABLE `tipo_medicamento`
  ADD PRIMARY KEY (`id_cla`);

--
-- Indices de la tabla `t_documento`
--
ALTER TABLE `t_documento`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `id_doc` (`id_doc`),
  ADD KEY `id_eps` (`id_eps`),
  ADD KEY `id_rh` (`id_rh`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `det_autorizacion`
--
ALTER TABLE `det_autorizacion`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eps`
--
ALTER TABLE `eps`
  MODIFY `id_eps` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `especializacion`
--
ALTER TABLE `especializacion`
  MODIFY `id_esp` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id_lab` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `id_licencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rh`
--
ALTER TABLE `rh`
  MODIFY `id_rh` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_medicamento`
--
ALTER TABLE `tipo_medicamento`
  MODIFY `id_cla` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_documento`
--
ALTER TABLE `t_documento`
  MODIFY `id_doc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
