-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2013 a las 03:09:08
-- Versión del servidor: 5.6.11
-- Versión de PHP: 5.5.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Persona_RUT` int(11) NOT NULL,
  `Ultimo_Login` datetime DEFAULT NULL,
  PRIMARY KEY (`Persona_RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`Persona_RUT`, `Ultimo_Login`) VALUES
(185415562, '2013-10-11 14:36:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almuerzos`
--

CREATE TABLE IF NOT EXISTS `almuerzos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Lunes` binary(1) DEFAULT NULL,
  `Martes` binary(1) DEFAULT NULL,
  `Miercoles` binary(1) DEFAULT NULL,
  `Jueves` binary(1) DEFAULT NULL,
  `Viernes` binary(1) DEFAULT NULL,
  `Nino_RUT` int(11) NOT NULL,
  `Semestre` binary(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Almuerzos_Nino1_idx` (`Nino_RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheque`
--

CREATE TABLE IF NOT EXISTS `cheque` (
  `ID` int(11) NOT NULL,
  `Monto` int(11) DEFAULT NULL,
  `Vencimiento` date DEFAULT NULL,
  `Estado_ID` int(11) NOT NULL,
  `Papas_RUT` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Cheque_Estado1_idx` (`Estado_ID`),
  KEY `fk_Cheque_Papas1_idx` (`Papas_RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheque_cuotas`
--

CREATE TABLE IF NOT EXISTS `cheque_cuotas` (
  `Cheque_ID` int(11) NOT NULL,
  `Cuotas_ID` int(11) NOT NULL,
  PRIMARY KEY (`Cheque_ID`,`Cuotas_ID`),
  KEY `fk_Cheque_has_Cuotas_Cuotas1_idx` (`Cuotas_ID`),
  KEY `fk_Cheque_has_Cuotas_Cheque1_idx` (`Cheque_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_monto`
--

CREATE TABLE IF NOT EXISTS `componente_monto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Colegiatura` int(11) DEFAULT NULL,
  `MatKinder` int(11) DEFAULT NULL,
  `MatBasica` int(11) DEFAULT NULL,
  `Almuerzo` int(11) DEFAULT NULL,
  `DeudaEscol20` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidad`
--

CREATE TABLE IF NOT EXISTS `contabilidad` (
  `Persona_RUT` int(11) NOT NULL,
  `Ultimo_Login` datetime DEFAULT NULL,
  PRIMARY KEY (`Persona_RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contabilidad`
--

INSERT INTO `contabilidad` (`Persona_RUT`, `Ultimo_Login`) VALUES
(185415562, '2013-10-11 16:47:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE IF NOT EXISTS `cuotas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `N_boleta` int(11) DEFAULT NULL,
  `Vence` date DEFAULT NULL,
  `DetalleDoc` varchar(100) DEFAULT NULL,
  `Componente_Monto_ID` int(11) NOT NULL,
  `Total` int(11) DEFAULT NULL,
  `FechaDeposito` date DEFAULT NULL,
  `Comentario` varchar(200) DEFAULT NULL,
  `Familia_ID` int(11) NOT NULL,
  `Conta_Persona_RUT` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Cuotas_Componente1_idx` (`Componente_Monto_ID`),
  KEY `fk_Cuotas_Familia1_idx` (`Familia_ID`),
  KEY `fk_Cuotas_Conta1_idx` (`Conta_Persona_RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE IF NOT EXISTS `familia` (
  `ID` int(11) NOT NULL,
  `Familia` varchar(45) DEFAULT NULL,
  `Casa_Ninos` varchar(400) DEFAULT NULL,
  `Matriculas_Persona_RUT` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Familia_Matriculas1_idx` (`Matriculas_Persona_RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `letra`
--

CREATE TABLE IF NOT EXISTS `letra` (
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `letra_cuotas`
--

CREATE TABLE IF NOT EXISTS `letra_cuotas` (
  `Letra_ID` int(11) NOT NULL,
  `Cuotas_ID` int(11) NOT NULL,
  PRIMARY KEY (`Letra_ID`,`Cuotas_ID`),
  KEY `fk_Letra_has_Cuotas_Cuotas1_idx` (`Cuotas_ID`),
  KEY `fk_Letra_has_Cuotas_Letra1_idx` (`Letra_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
  `Persona_RUT` int(11) NOT NULL,
  `Ultimo_Login` datetime DEFAULT NULL,
  PRIMARY KEY (`Persona_RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`Persona_RUT`, `Ultimo_Login`) VALUES
(111111111, '2013-10-14 22:16:07'),
(185415562, '2013-10-11 14:36:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas_has_familia`
--

CREATE TABLE IF NOT EXISTS `matriculas_has_familia` (
  `Matriculas_Persona_RUT` int(11) NOT NULL,
  `Familia_ID` int(11) NOT NULL,
  PRIMARY KEY (`Matriculas_Persona_RUT`,`Familia_ID`),
  KEY `fk_Matriculas_has_Familia_Familia1_idx` (`Familia_ID`),
  KEY `fk_Matriculas_has_Familia_Matriculas1_idx` (`Matriculas_Persona_RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nino`
--

CREATE TABLE IF NOT EXISTS `nino` (
  `RUT` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido1` varchar(45) NOT NULL,
  `Apellido2` varchar(45) NOT NULL,
  `Sexo` binary(1) NOT NULL,
  `FechaNac` date NOT NULL,
  `FechaIns` datetime NOT NULL,
  `Curso` varchar(45) NOT NULL,
  `Pago_Matricula_ID` int(11) NOT NULL,
  `Pago_seguro_escolar_ID` int(11) NOT NULL,
  `Familia_ID` int(11) NOT NULL,
  `Beca_1` int(11) DEFAULT NULL,
  `Beca_2` int(11) DEFAULT NULL,
  `Colegio_anterior` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RUT`),
  KEY `fk_Nino_Pago_Matricula1_idx` (`Pago_Matricula_ID`),
  KEY `fk_Nino_Pago_seguro_escolar1_idx` (`Pago_seguro_escolar_ID`),
  KEY `fk_Nino_Familia1_idx` (`Familia_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_matricula`
--

CREATE TABLE IF NOT EXISTS `pago_matricula` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `N_de_Boleta` int(11) DEFAULT NULL,
  `Monto` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_seguro_escolar`
--

CREATE TABLE IF NOT EXISTS `pago_seguro_escolar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Vale_N` int(11) DEFAULT NULL,
  `Monto` int(11) DEFAULT NULL,
  `Fecha` int(11) DEFAULT NULL,
  `Lugar` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `papas`
--

CREATE TABLE IF NOT EXISTS `papas` (
  `RUT` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido1` varchar(45) NOT NULL,
  `Apellido2` varchar(45) NOT NULL,
  `Sexo` binary(1) NOT NULL,
  `FechaNac` date DEFAULT NULL,
  `FechaIns` datetime DEFAULT NULL,
  `Apoderado_Economico` binary(1) DEFAULT NULL,
  `Profesion` varchar(150) DEFAULT NULL,
  `Familia_ID` int(11) NOT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Comuna` varchar(70) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Lugar_Trabajo` varchar(200) DEFAULT NULL,
  `Direccion_Trabajo` varchar(200) DEFAULT NULL,
  `Telefonos` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`RUT`),
  KEY `fk_Papas_Familia1_idx` (`Familia_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `RUT` int(11) NOT NULL,
  `Nombre` varchar(40) DEFAULT NULL,
  `Apellido1` varchar(40) DEFAULT NULL,
  `Apellido2` varchar(40) DEFAULT NULL,
  `Sexo` binary(1) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `FechaIns` datetime DEFAULT NULL,
  `Clave` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`RUT`, `Nombre`, `Apellido1`, `Apellido2`, `Sexo`, `FechaNac`, `FechaIns`, `Clave`) VALUES
(111111111, 'Prueba', 'Prueba', 'Prueba', '', '2013-10-14', '2013-10-14 22:15:25', '97db1846570837fce6ff62a408f1c26a'),
(185415562, 'Leonardo', 'Hidalgo', 'Sepulveda', '1', '1993-09-09', '2013-10-11 02:22:53', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_Admin_Persona1` FOREIGN KEY (`Persona_RUT`) REFERENCES `persona` (`RUT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `almuerzos`
--
ALTER TABLE `almuerzos`
  ADD CONSTRAINT `fk_Almuerzos_Nino1` FOREIGN KEY (`Nino_RUT`) REFERENCES `nino` (`RUT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cheque`
--
ALTER TABLE `cheque`
  ADD CONSTRAINT `fk_Cheque_Estado1` FOREIGN KEY (`Estado_ID`) REFERENCES `estado` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cheque_Papas1` FOREIGN KEY (`Papas_RUT`) REFERENCES `papas` (`RUT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cheque_cuotas`
--
ALTER TABLE `cheque_cuotas`
  ADD CONSTRAINT `fk_Cheque_has_Cuotas_Cheque1` FOREIGN KEY (`Cheque_ID`) REFERENCES `cheque` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cheque_has_Cuotas_Cuotas1` FOREIGN KEY (`Cuotas_ID`) REFERENCES `cuotas` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  ADD CONSTRAINT `fk_Conta_Persona1` FOREIGN KEY (`Persona_RUT`) REFERENCES `persona` (`RUT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD CONSTRAINT `fk_Cuotas_Componente1` FOREIGN KEY (`Componente_Monto_ID`) REFERENCES `componente_monto` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cuotas_Conta1` FOREIGN KEY (`Conta_Persona_RUT`) REFERENCES `contabilidad` (`Persona_RUT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cuotas_Familia1` FOREIGN KEY (`Familia_ID`) REFERENCES `familia` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `familia`
--
ALTER TABLE `familia`
  ADD CONSTRAINT `fk_Familia_Matriculas1` FOREIGN KEY (`Matriculas_Persona_RUT`) REFERENCES `matriculas` (`Persona_RUT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `letra_cuotas`
--
ALTER TABLE `letra_cuotas`
  ADD CONSTRAINT `fk_Letra_has_Cuotas_Cuotas1` FOREIGN KEY (`Cuotas_ID`) REFERENCES `cuotas` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Letra_has_Cuotas_Letra1` FOREIGN KEY (`Letra_ID`) REFERENCES `letra` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `fk_Matriculas_Persona1` FOREIGN KEY (`Persona_RUT`) REFERENCES `persona` (`RUT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matriculas_has_familia`
--
ALTER TABLE `matriculas_has_familia`
  ADD CONSTRAINT `fk_Matriculas_has_Familia_Familia1` FOREIGN KEY (`Familia_ID`) REFERENCES `familia` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Matriculas_has_Familia_Matriculas1` FOREIGN KEY (`Matriculas_Persona_RUT`) REFERENCES `matriculas` (`Persona_RUT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nino`
--
ALTER TABLE `nino`
  ADD CONSTRAINT `fk_Nino_Familia1` FOREIGN KEY (`Familia_ID`) REFERENCES `familia` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Nino_Pago_Matricula1` FOREIGN KEY (`Pago_Matricula_ID`) REFERENCES `pago_matricula` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Nino_Pago_seguro_escolar1` FOREIGN KEY (`Pago_seguro_escolar_ID`) REFERENCES `pago_seguro_escolar` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `papas`
--
ALTER TABLE `papas`
  ADD CONSTRAINT `fk_Papas_Familia1` FOREIGN KEY (`Familia_ID`) REFERENCES `familia` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
