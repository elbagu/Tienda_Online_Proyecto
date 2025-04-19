CREATE DATABASE TiendaInglesa;

USE TiendaInglesa;

CREATE TABLE `admin` (
  `Id_Admin` int(2) NOT NULL PRIMARY KEY,
  `Usuario` varchar(30) NOT NULL,
  `Contraseña` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL PRIMARY KEY,
  `Nombre_Categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `cliente` (
  `CI` int(8) NOT NULL PRIMARY KEY,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(25) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Calle` varchar(40) NOT NULL,
  `Contraseña` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `entrega` (
  `Id_Entrega` int(11) NOT NULL PRIMARY KEY,
  `Tipo_Entrega` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `hace` (
  `CI_Cliente` int(8) NOT NULL,
  `Id_Pedido` int(11) NOT NULL,
  PRIMARY KEY (`CI_Cliente`,`Id_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `lista_pedido` (
  `Id_Pedido` int(11) NOT NULL,
  `Id_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `marca` (
  `Id_Marca` int(11) NOT NULL PRIMARY KEY,
  `Nombre_Marca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `oferta` (
  `Id_Oferta` int(11) NOT NULL PRIMARY KEY,
  `Tiempo_Vigente` date NOT NULL,
  `Id_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `pedido` (
  `Id_Pedido` int(11) NOT NULL PRIMARY KEY,
  `CI_Cliente` int(8) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_Entrega` int(1) NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `producto` (
  `Id_Producto` int(11) NOT NULL PRIMARY KEY,
  `Nombre_Producto` varchar(50) NOT NULL,
  `Precio` float NOT NULL,
  `Stock` int(5) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  `Id_Marca` int(11) NOT NULL,
  `Extranjero` tinyint(1) NOT NULL,
  `Imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `admin`
  MODIFY `Id_Admin` int(2) NOT NULL AUTO_INCREMENT;

ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `entrega`
  MODIFY `Id_Entrega` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `oferta`
  MODIFY `Id_Oferta` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `marca`
  MODIFY `Id_Marca` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pedido`
  MODIFY `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `producto`
  MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `producto` ADD CONSTRAINT `categoria` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria`(`Id_Categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `producto` ADD CONSTRAINT `marca` FOREIGN KEY (`Id_Marca`) REFERENCES `marca`(`Id_Marca`) ON DELETE CASCADE ON UPDATE CASCADE;
