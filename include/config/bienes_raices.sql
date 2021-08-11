/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `usuarios` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE `propiedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int(1) DEFAULT NULL,
  `wc` int(1) DEFAULT NULL,
  `estacionamiento` int(1) DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendedorId_idx` (`vendedorId`),
  CONSTRAINT `vendedorId` FOREIGN KEY (`vendedorId`) REFERENCES `vendedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;


INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(2, 'correo@example.com', '$2y$10$jFnBsnIVsR9g2C0S/YcV/OhBdQrijE89xqivtF9ZtOFZd6VaL9WHS');

INSERT INTO `vendedores` (`id`, `nombre`, `apellidos`, `telefono`) VALUES
(1, 'carlos', 'tucno', '915456789');
INSERT INTO `vendedores` (`id`, `nombre`, `apellidos`, `telefono`) VALUES
(2, 'juan', 'torre', '123654789');
INSERT INTO `vendedores` (`id`, `nombre`, `apellidos`, `telefono`) VALUES
(4, ' pedro', 'suarez', '333666999 ');

INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(28, ' playa ccx', 89.00, '6575a1a9e78a07541ed2e1c1f25122c2.jpg', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estÃ¡ndar de las industrias desde el aÃ±o 1500', 2, 2, 2, '2021-07-05', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(30, ' eeeeee', 13.00, '3c132bfa1804804c7a584c5e07bc7067.jpg', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estÃ¡ndar de las industrias desde el aÃ±o 1500', 2, 2, 2, '2021-07-05', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(31, ' vvvv juan ccc', 321.00, '4c9f9622b7579cd142597712c6d47cd9.jpg', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estÃ¡ndar de las industrias desde el aÃ±o 1500', 6, 6, 6, '2021-07-05', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(32, ' rrrr', 43.00, '72a57352999f9cb275c048efc4379db2.jpg', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estÃ¡ndar de las industrias desde el aÃ±o 1500', 2, 2, 2, '2021-07-05', 2);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;