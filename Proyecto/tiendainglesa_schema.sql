-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2021 a las 18:39:33
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

CREATE TABLE IF NOT EXISTS `admin` (
  `Id_Admin` int(2) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(30) NOT NULL,
  `Contraseña` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_Admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `CI` int(8) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(25) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Calle` varchar(40) NOT NULL,
  `Contraseña` varchar(40) NOT NULL,
  PRIMARY KEY (`CI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `Id_Entrega` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_Entrega` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_Entrega`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hace`
--

CREATE TABLE IF NOT EXISTS `hace` (
  `CI_Cliente` int(8) NOT NULL,
  `Id_Pedido` int(11) NOT NULL,
  PRIMARY KEY (`CI_Cliente`,`Id_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_pedido`
--

CREATE TABLE IF NOT EXISTS `lista_pedido` (
  `Id_Pedido` int(11) NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  PRIMARY KEY (`Id_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `Id_Marca` int(11) NOT NULL,
  `Nombre_Marca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
  `Id_Oferta` int(11) NOT NULL AUTO_INCREMENT,
  `Tiempo_Vigente` date NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  PRIMARY KEY (`Id_Oferta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT,
  `CI_Cliente` int(8) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_Entrega` int(1) NOT NULL,
  `Total` float NOT NULL,
  PRIMARY KEY (`Id_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `Id_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Producto` varchar(50) NOT NULL,
  `Precio` float NOT NULL,
  `Stock` int(5) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  `Id_Marca` int(11) NOT NULL,
  `Extranjero` tinyint(1) NOT NULL,
  `Imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

ALTER TABLE `marca` CHANGE `Id_Marca` `Id_Marca` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`Id_Marca`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
