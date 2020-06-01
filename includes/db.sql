-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla prueba.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba.categorias: ~11 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`) VALUES
	(1, 'celulares y tablets'),
	(2, 'audio y foto'),
	(3, 'computacion'),
	(4, 'consolas y videojuegos'),
	(5, 'hogar'),
	(6, 'electrodomesticos'),
	(7, 'moda'),
	(8, 'relojes y accesorios'),
	(9, 'libros'),
	(10, 'belleza'),
	(11, 'juguetes'),
	(12, 'deportes'),
	(13, 'vehiculos');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla prueba.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba.compras: ~3 rows (aproximadamente)
DELETE FROM `compras`;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`id`, `persona_id`, `producto_id`) VALUES
	(1, 1, 4),
	(2, 2, 1),
	(3, 2, 3);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Volcando estructura para tabla prueba.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `precio` varchar(50) DEFAULT NULL,
  `categoria_id` varchar(50) DEFAULT NULL,
  `img_producto` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba.productos: ~3 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `persona_id`, `nombre`, `descripcion`, `precio`, `categoria_id`, `img_producto`, `estado`, `fecha`) VALUES
	(1, 1, 'Samsung Galaxy S20 Ultra SA-G988BD Dual-SIM 128GB Smartphone (Unlocked, Cosmic Gray)', 'esto es una prueba', '5499900', '1', 'productos/1/SAMSUNG-GALAXY-S20-ULTRA.jpg', 'activo', '2020-05-02'),
	(2, 2, 'Camisa Fashion DiseÃ±os en Pecho', 'camisa de color negro con diseÃ±os en el pecho de color rojo', '69000', '7', 'productos/7/Camisa-Fashion-DiseÃ±o-En-Pecho.jpg', 'inactivo', '2020-05-04'),
	(3, 1, 'Kawasaki Z1000 2020', 'se encuentra en perfectas condiciones y con papeles al dia', '59984669', '13', 'productos/13/Kawasaki-Z1000-2020.jpg', 'inactivo', '2020-05-06'),
	(4, 2, 'Xbox 360 Slim +1 Control Inalambrico + 320gb', 'color negro', '640000', '4', 'productos/4/xbox-360-slim-1-control-inalambrico-320gb.JPG', 'activo', '2020-05-08');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla prueba.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba.usuarios: ~2 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `celular`, `whatsapp`, `direccion`, `ciudad`) VALUES
	(1, 'Stiven', 'Cordoba', 'stiven-cor@hotmail.com', '98cf308b8740233a294c98ba95733aef', '3108189375', '+57 3108189375', 'Barrio/ Primero de Enero', 'Mocoa'),
	(2, 'James', 'Cordoba', 'locoantiguo972@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '3108189375', '+57 3108189375', 'No registra', 'No registra'),
	(3, 'prueba', 'prueba', 'prueba@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '42142132312', '+57 42142132312', 'No registra', 'No registra');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
