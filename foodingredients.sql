-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for foodingredients
CREATE DATABASE IF NOT EXISTS `foodingredients` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `foodingredients`;

-- Dumping structure for table foodingredients.choose
CREATE TABLE IF NOT EXISTS `choose` (
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_ingredients` int NOT NULL,
  KEY `FK__ingredients` (`id_ingredients`),
  KEY `FK__user` (`username`),
  CONSTRAINT `FK__ingredients` FOREIGN KEY (`id_ingredients`) REFERENCES `ingredients` (`id_ingredients`) ON UPDATE CASCADE,
  CONSTRAINT `FK__user` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table foodingredients.choose: ~0 rows (approximately)

-- Dumping structure for table foodingredients.ingredients
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id_ingredients` int NOT NULL AUTO_INCREMENT,
  `ingredients_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_ingredients`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table foodingredients.ingredients: ~10 rows (approximately)
INSERT INTO `ingredients` (`id_ingredients`, `ingredients_name`) VALUES
	(1, 'Glukosa'),
	(2, 'Laktosa'),
	(3, 'Sukrosa'),
	(4, 'Natrium'),
	(5, 'Kolestrol'),
	(6, 'Lemak'),
	(7, 'Protein'),
	(8, 'Sodium'),
	(9, 'Gula'),
	(10, 'Karbohidrat');

-- Dumping structure for table foodingredients.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table foodingredients.user: ~2 rows (approximately)
INSERT INTO `user` (`username`, `password`) VALUES
	('atsila', '12345'),
	('Tes', '123');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
