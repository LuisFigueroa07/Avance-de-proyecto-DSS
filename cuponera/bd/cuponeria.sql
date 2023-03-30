-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-02-2023 a las 01:47:47
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuponeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `idCargo` int NOT NULL,
  `tipo_usuario` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `tipo_usuario`) VALUES
(1, 'administrador'),
(2, 'admin empresa_ofertante'),
(3, 'cliente'),
(4, 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

DROP TABLE IF EXISTS `cupon`;
CREATE TABLE IF NOT EXISTS `cupon` (
  `idCupones` int NOT NULL,
  `estadoCup` int DEFAULT NULL,
  `idUsuario` int DEFAULT NULL,
  PRIMARY KEY (`idCupones`),
  KEY `FK_idusuario` (`idUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`idCupones`, `estadoCup`, `idUsuario`) VALUES
(1, 1, 5),
(2, 2, 3),
(3, 1, 1),
(4, 1, 8),
(5, 2, 10),
(6, 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int NOT NULL,
  `nombre_empresa` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `nombre_contacto` varchar(50) DEFAULT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idRubro` int DEFAULT NULL,
  `porcentaje_comision` float DEFAULT NULL,
  `idOferta` int DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`),
  KEY `FK_idrubro` (`idRubro`),
  KEY `FK_idoferta` (`idOferta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombre_empresa`, `direccion`, `nombre_contacto`, `telefono`, `idRubro`, `porcentaje_comision`, `idOferta`) VALUES
(1, 'Teleperfomance', 'San salvador', 'Cristian Alexis', '7535-3432', 4, 6.2, 3),
(2, 'Samsung', 'Sede en corea', 'Kim ', '7828-3828', 4, 20, 2),
(3, 'Pollo Campero', 'unicentro ss', 'Juan Perez', '2342-2923', 7, 10, 1),
(4, 'La Pampa', 'Las cunagas', 'Khordel Martinez', '2842-8402', 3, 20, 5),
(5, 'Hoyoverse', 'Barrio chino', 'Enrique Hernandez', '7293-2838', 2, 10, 6),
(6, 'Disquera El Bueno', 'La coruña', 'Pereira Lopez', '2938-4829', 4, 20, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

DROP TABLE IF EXISTS `oferta`;
CREATE TABLE IF NOT EXISTS `oferta` (
  `idOferta` int NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `cupones_disponibles` int DEFAULT NULL,
  `ingresos_totales` float DEFAULT NULL,
  `cargo_por_servicio` varchar(25) DEFAULT NULL,
  `estadoOferta` int DEFAULT NULL,
  `idCupones` int DEFAULT NULL,
  PRIMARY KEY (`idOferta`),
  KEY `FK_idcupones` (`idCupones`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`idOferta`, `fecha_registro`, `fecha_vencimiento`, `fecha_limite`, `descripcion`, `cupones_disponibles`, `ingresos_totales`, `cargo_por_servicio`, `estadoOferta`, `idCupones`) VALUES
(1, '2023-03-01', '2023-03-08', '2023-03-31', 'Descuento de un 30% en pollo ', 500, 8000.87, '5', 1, 1),
(2, '2023-04-01', '2023-04-08', '2023-04-15', 'Telefono móvil al 5% de descuento', 25, 1000, '20', 2, 2),
(3, '2023-02-16', '2023-02-23', '2023-02-28', 'Audifonos 2x1', 10, 2000, '20', 2, 3),
(4, '2023-02-19', '2023-02-26', '2023-02-28', 'Discos nuevos al 20% de descuento', 40, 300.2, '5', 2, 6),
(5, '2023-03-08', '2023-03-16', '2023-04-30', 'Balde de comida a mitad de precio', 300, 4973.74, '20', 2, 4),
(6, '2023-03-13', '2023-03-14', '2023-04-28', 'Descuento del 20% en protogemas', 50, 4586.85, '20', 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

DROP TABLE IF EXISTS `rubro`;
CREATE TABLE IF NOT EXISTS `rubro` (
  `idRubro` int NOT NULL,
  `TipoRubro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idRubro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`idRubro`, `TipoRubro`) VALUES
(1, 'medicina'),
(2, 'entretenimiento'),
(3, 'restaurante'),
(4, 'tecnologia'),
(5, 'deportes'),
(6, 'ropa'),
(7, 'alimenticia'),
(8, 'cursos'),
(9, 'motos'),
(10, 'autos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contraseña` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `direccion_correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `direccion_recidencia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DUI` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idCargo` int NOT NULL,
  `idEmpresa` int DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `FK_idcargo` (`idCargo`),
  KEY `FK_idempresa` (`idEmpresa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `contraseña`, `direccion_correo`, `telefono`, `direccion_recidencia`, `DUI`, `idCargo`, `idEmpresa`) VALUES
(1, 'Gerardo', 'Herrera', '12345678', 'gerardo@gmail.com', '2323-4234', 'guadalupe', '23938293-2', 1, 1),
(2, 'Luis', 'Figueroa', '12345678', 'figueroa@gmail.com', '2939-2938', 'Los santos', '28472938-3', 2, 1),
(3, 'Elmishore', 'Cherto', '12345678', 'elmcherto@gmail.com', '2983-2938', 'Andorra', '34347893-9', 2, 2),
(4, 'Coscu', 'Santos', '12345678', 'checoscu@gmail.com', '2982-2948', 'viña del mar', '82929322-2', 3, NULL),
(5, 'Zaidy', 'Tobar', '12345678', 'zaidy@gmail.com', '2392-2938', 'Soyapango', '23928423-9', 2, 3),
(6, 'Marjorie', 'Garcia', '12345678', 'marjorie@gmail.com', '2392-2939', 'Alta vista', '39229283-2', 4, NULL),
(7, 'Cristian', 'Lopez', '12345678', 'cristobo@gmail.com', '7829-2839', 'San jose', '28822929-2', 1, 4),
(8, 'Diego', 'Melara', '12345678', 'monc200@gmail.com', '2832-2938', 'Alta vista', '29482843-2', 2, 4),
(9, 'Alejandra', 'Herrera', '12345678', 'janna200@gmail.com', '2392-2939', 'Soyapango', '73272782-0', 2, 5),
(10, 'Enrique', 'Rivera', '12345678', 'enriquepro@gmail.com', '2839-2838', 'España', '29382923-2', 2, 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
