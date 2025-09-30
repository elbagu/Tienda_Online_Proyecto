-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2021 a las 00:43:43
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendainglesa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int(2) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Contraseña` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre_Categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nombre_Categoria`) VALUES
(1, 'Alimenticios'),
(2, 'Bazar'),
(3, 'Perfumería'),
(4, 'Mercería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CI` int(8) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(25) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Calle` varchar(40) NOT NULL,
  `Contraseña` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `Id_Entrega` int(11) NOT NULL,
  `Tipo_Entrega` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`Id_Entrega`, `Tipo_Entrega`) VALUES
(1, 'A domicilio'),
(2, 'El Local');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hace`
--

CREATE TABLE `hace` (
  `CI_Cliente` int(8) NOT NULL,
  `Id_Pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_pedido`
--

CREATE TABLE `lista_pedido` (
  `Id_Pedido` int(11) NOT NULL,
  `Id_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `Id_Marca` int(11) NOT NULL,
  `Nombre_Marca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (Id_Marca,Nombre_Marca) VALUES
(1,'Tienda Inglesa'),
(2,'Azucarlito'),
(3,'Rausa'),
(4,'Pringles'),
(5,'Conaprole'),
(6,'Salus'),
(7,'El trigal'),
(8,'Oreo'),
(9,'Cerealitas'),
(10,'Tramontina'),
(11,'Cuori'),
(12,'Rexona'),
(13,'Dove'),
(14,'Mundial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `Id_Oferta` int(11) NOT NULL,
  `Tiempo_Vigente` date NOT NULL,
  `Id_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Id_Pedido` int(11) NOT NULL,
  `CI_Cliente` int(8) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_Entrega` int(1) NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_Producto` int(11) NOT NULL,
  `Nombre_Producto` varchar(50) NOT NULL,
  `Precio` float NOT NULL,
  `Stock` int(5) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  `Id_Marca` int(11) NOT NULL,
  `Extranjero` tinyint(1) NOT NULL,
  `Imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Nombre_Producto`, `Precio`, `Stock`, `Id_Categoria`, `Id_Marca`, `Extranjero`, `Imagen`) VALUES
(1,'Manteca 150gr', 28, 100, 1, 1, 1, 'manteca.png'),
(2,'Azucar 1Kg', 35.7, 500, 1, 2, 0, 'azucar.png'),
(3,'Chorizos', 114, 50, 1, 3, 0, 'chorizo.png'),
(4,'Papitas 100gr', 99.9, 200, 1, 4, 1, 'papas.png'),
(5,'Pizza Natpolitana', 150, 30, 1, 1, 0, 'pizza.png'),
(6,'Dulce de Leche 1Kg', 28, 100, 1, 5, 1, 'dulce.png'),
(7,'Agua 6L', 119, 400, 1, 6, 1, 'salus.png'),
(8,'Galletas Chiquilin 90gr', 56.65, 800, 1, 7, 0, 'chiquilin.jpg'),
(9,'Galletas 351gr', 63, 100, 1, 8, 1, 'oreo.png'),
(10,'Galletitas 350gr', 48, 100, 1, 9, 0, 'cerealitas.png'),
(11,'Sarten Antiadherente', 638, 60, 2, 10, 0, 'SartenT.png'),
(12,'Pela Papas Blanco', 119, 40, 2, 10, 0, 'PelapapasT.png'),
(13,'Termo 1L', 1890, 30, 2, 10, 1, 'TermoT.png'),
(14,'Cuchillas Tradicional x 8', 2050, 15, 2, 10, 1, 'CuchillasT.png'),
(15,'Jeringa Injectora', 529, 53, 2, 10, 0, 'JeringaT.png'),
(16,'Sarten de Ceramica', 1396, 55, 2, 11, 0, 'SartenC.png'),
(17,'Caldera Blanca 3L', 1790, 37, 2, 11, 0, 'CalderaC.png'),
(18,'Olla a Presion 5L', 4790, 40, 2, 11, 1, 'OllaC.png'),
(19,'Sacacorcho Electrico', 1890, 72, 2, 11, 0, 'Sacacorcho.png'),
(20,'Termo de Acero 1L', 1004, 45, 2, 11, 1, 'TermoC.png'),
(21,'Jabon Liquido 200ml', 144, 90, 3, 12, 0, 'nodisponible.png'),
(22,'Desodorante en Aerosol', 169, 105, 3, 12, 0, 'aerosolR.png'),
(23,'Desodorante Roll On Men', 96, 95, 3, 12, 0, 'desodoranteR.png'),
(24,'Desodorante en Barra Femenino', 154, 80, 3, 12, 0, 'desodoranteFR.png'),
(25,'Alcohol en Gel 300ml', 184, 68, 3, 12, 0, 'AlcoholR.png'),
(26,'Antitranspirante en Aerosol', 157, 62, 3, 13, 0, 'AntitranspiranteD.png'),
(27,'Desodorante en Aerosol Men', 154, 45, 3, 13, 1, 'desodoranteD.png'),
(28,'Acondicionador 200 ml', 233, 70, 3, 13, 1, 'AcondicionadorD.png'),
(29,'Jabon Liquido 220 ml', 124, 85, 3, 13, 0, 'JabonD.png'),
(30,'Shampoo Regeneracion 750ml + Acondicionador 400ml', 488, 20, 3, 13, 0, 'ShampooD.png'),
(31,'Tijeras para Zurdo', 459, 35, 4, 14, 0, 'TijerasZ.png'),
(32,'Tijeras para Peluquero', 295, 55, 4, 14, 1, 'TijerasP.png'),
(33,'Elastico x3mts', 59, 70, 4, 1, 0, 'Elastico.png'),
(34,'Set de Agujas', 133, 29, 4, 1, 0, 'Agujas.png'),
(35,'Lana Clasico 100gr', 229, 31, 4, 1, 0, 'Lana100.png'),
(36,'Lana Soft 100 gr', 240, 84, 4, 1, 0, 'LanaS.png'),
(37,'Alfileres de Gancho', 29, 93, 4, 1, 0, 'Alfiler.png'),
(38,'Cordon de Zapatos', 35, 105, 4, 1, 0, 'Cordon.png'),
(39,'Hilo de Tejer', 224, 75, 4, 1, 0, 'Hilo.png'),
(40,'Aguja de Crochet Metal', 89, 85, 4, 1, 0, 'crochet.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CI`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`Id_Entrega`);

--
-- Indices de la tabla `hace`
--
ALTER TABLE `hace`
  ADD PRIMARY KEY (`CI_Cliente`,`Id_Pedido`);

--
-- Indices de la tabla `lista_pedido`
--
ALTER TABLE `lista_pedido`
  ADD PRIMARY KEY (`Id_Pedido`);

-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`Id_Marca`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`Id_Oferta`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_Pedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_Producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Admin` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `Id_Entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `Id_Oferta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `Id_Marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

ALTER TABLE `producto` ADD CONSTRAINT `categoria` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria`(`Id_Categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `producto` ADD CONSTRAINT `marca` FOREIGN KEY (`Id_Marca`) REFERENCES `marca`(`Id_Marca`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
