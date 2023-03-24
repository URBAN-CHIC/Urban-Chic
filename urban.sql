-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2023 a las 21:29:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `urban`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `registro` (IN `p_nombre` VARCHAR(50), IN `p_apellidoPaterno` VARCHAR(50), IN `p_apellidoMaterno` VARCHAR(50), IN `p_email` VARCHAR(100), IN `p_pass` VARCHAR(100), IN `p_telefono` VARCHAR(20), IN `p_sexo` ENUM('M','F','O'), IN `p_edad` INT, IN `p_rol` ENUM('cliente','admin'))   BEGIN
  DECLARE cliente_id INT;
  
  INSERT INTO clientes (nombre, apellidoPaterno, apellidoMaterno, email, pass, telefono, sexo, edad, rol)
  VALUES (p_nombre, p_apellidoPaterno, p_apellidoMaterno, p_email, p_pass, p_telefono, p_sexo, p_edad, p_rol);
  
  SET cliente_id = LAST_INSERT_ID();

  INSERT INTO users (nombre, apellidoPaterno, email, pass, rol, id_cliente)
  SELECT nombre, apellidoPaterno, email, pass, rol, cliente_id
  FROM clientes
  WHERE id = cliente_id;
  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `rol` enum('cliente','admin') DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `email`, `pass`, `telefono`, `sexo`, `edad`, `rol`) VALUES
(4, 'Fernando', 'delacruz', 'Zapata', 'ferdlcskate@gmail.com', '$2y$10$UtWmzl6nMCKHwLfAb1WRsuIIb7MY33LSk1KdNdP1Zd/CmTl/jFN56', '4781023128', '', 21, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `rol` enum('cliente','admin') DEFAULT 'cliente',
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidoPaterno`, `email`, `pass`, `rol`, `id_cliente`) VALUES
(4, 'Fernando', 'delacruz', 'ferdlcskate@gmail.com', '$2y$10$UtWmzl6nMCKHwLfAb1WRsuIIb7MY33LSk1KdNdP1Zd/CmTl/jFN56', 'cliente', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
