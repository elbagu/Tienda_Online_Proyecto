
-- Base de datos: `tiendainglesa`

USE tiendainglesa;


INSERT INTO `categoria` (`Nombre_Categoria`) VALUES
('Alimenticios'),
('Perfumería'),
('Mercería'),
('Bazar');


INSERT INTO `entrega` (`Tipo_Entrega`) VALUES
('A domicilio'),
('El Local');

INSERT INTO `marca` (Nombre_Marca) VALUES
('Tienda Inglesa'),
('Azucarlito'),
('Rausa'),
('Pringles'),
('Conaprole'),
('Salus'),
('El trigal'),
('Oreo'),
('Cerealitas'),
('Tramontina'),
('Cuori'),
('Rexona'),
('Dove'),
('Mundial');

INSERT INTO `producto` (`Nombre_Producto`, `Precio`, `Stock`, `Id_Categoria`, `Id_Marca`, `Extranjero`, `Imagen`) VALUES
('Manteca 150gr', 28, 100, 1, 1, 1, 'manteca.png'),
('Azucar 1Kg', 35.7, 500, 1, 2, 0, 'azucar.png'),
('Chorizos', 114, 50, 1, 3, 0, 'chorizo.png'),
('Papitas 100gr', 99.9, 200, 1, 4, 1, 'papas.png'),
('Pizza Natpolitana', 150, 30, 1, 1, 0, 'pizza.png'),
('Dulce de Leche 1Kg', 28, 100, 1, 5, 1, 'dulce.png'),
('Agua 6L', 119, 400, 1, 6, 1, 'salus.png'),
('Galletas Chiquilin 90gr', 56.65, 800, 1, 7, 0, 'chiquilin.jpg'),
('Galletas 351gr', 63, 100, 1, 8, 1, 'oreo.png'),
('Galletitas 350gr', 48, 100, 1, 9, 0, 'cerealitas.png'),
('Sarten Antiadherente', 638, 60, 2, 10, 0, 'SartenT.png'),
('Pela Papas Blanco', 119, 40, 2, 10, 0, 'PelapapasT.png'),
('Termo 1L', 1890, 30, 2, 10, 1, 'TermoT.png'),
('Cuchillas Tradicional x 8', 2050, 15, 2, 10, 1, 'CuchillasT.png'),
('Jeringa Injectora', 529, 53, 2, 10, 0, 'JeringaT.png'),
('Sarten de Ceramica', 1396, 55, 2, 11, 0, 'SartenC.png'),
('Caldera Blanca 3L', 1790, 37, 2, 11, 0, 'CalderaC.png'),
('Olla a Presion 5L', 4790, 40, 2, 11, 1, 'OllaC.png'),
('Sacacorcho Electrico', 1890, 72, 2, 11, 0, 'Sacacorcho.png'),
('Termo de Acero 1L', 1004, 45, 2, 11, 1, 'TermoC.png'),
('Jabon Liquido 200ml', 144, 90, 3, 12, 0, 'nodisponible.png'),
('Desodorante en Aerosol', 169, 105, 3, 12, 0, 'aerosolR.png'),
('Desodorante Roll On Men', 96, 95, 3, 12, 0, 'desodoranteR.png'),
('Desodorante en Barra Femenino', 154, 80, 3, 12, 0, 'desodoranteFR.png'),
('Alcohol en Gel 300ml', 184, 68, 3, 12, 0, 'AlcoholR.png'),
('Antitranspirante en Aerosol', 157, 62, 3, 13, 0, 'AntitranspiranteD.png'),
('Desodorante en Aerosol Men', 154, 45, 3, 13, 1, 'desodoranteD.png'),
('Acondicionador 200 ml', 233, 70, 3, 13, 1, 'AcondicionadorD.png'),
('Jabon Liquido 220 ml', 124, 85, 3, 13, 0, 'JabonD.png'),
('Shampoo Regeneracion 750ml + Acondicionador 400ml', 488, 20, 3, 13, 0, 'ShampooD.png'),
('Tijeras para Zurdo', 459, 35, 4, 14, 0, 'TijerasZ.png'),
('Tijeras para Peluquero', 295, 55, 4, 14, 1, 'TijerasP.png'),
('Elastico x3mts', 59, 70, 4, 1, 0, 'Elastico.png'),
('Set de Agujas', 133, 29, 4, 1, 0, 'Agujas.png'),
('Lana Clasico 100gr', 229, 31, 4, 1, 0, 'Lana100.png'),
('Lana Soft 100 gr', 240, 84, 4, 1, 0, 'LanaS.png'),
('Alfileres de Gancho', 29, 93, 4, 1, 0, 'Alfiler.png'),
('Cordon de Zapatos', 35, 105, 4, 1, 0, 'Cordon.png'),
('Hilo de Tejer', 224, 75, 4, 1, 0, 'Hilo.png'),
('Aguja de Crochet Metal', 89, 85, 4, 1, 0, 'crochet.png');

INSERT INTO `Admin` (`Usuario`, `Contraseña`) VALUES
('Admin','1234'),
('Presidente123','12345678');
