-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2023 a las 22:00:52
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUser` (IN `p_id` INT)   BEGIN
  -- Eliminar usuario en la tabla usuarios
  DELETE FROM usuarios WHERE id_cliente = p_id;
  
  -- Eliminar cliente en la tabla clientes
  DELETE FROM clientes WHERE id = p_id;
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registerUser` (IN `p_nombre` VARCHAR(50), IN `p_apellidoPaterno` VARCHAR(50), IN `p_apellidoMaterno` VARCHAR(50), IN `p_email` VARCHAR(100), IN `p_pass` VARCHAR(100), IN `p_telefono` VARCHAR(20), IN `p_sexo` VARCHAR(30), IN `p_edad` INT, IN `p_rol` ENUM('cliente','admin'))   BEGIN
DECLARE cliente_id INT;

-- Insertamos el cliente en la tabla clientes
INSERT INTO clientes (nombre, apellidoPaterno, apellidoMaterno, email, telefono, sexo, edad, rol)
VALUES (p_nombre, p_apellidoPaterno, p_apellidoMaterno, p_email, p_telefono, p_sexo, p_edad, p_rol);

-- Obtenemos el ID del cliente recién insertado
SET cliente_id = LAST_INSERT_ID();

-- Insertamos el usuario en la tabla usuarios
INSERT INTO usuarios (email, pass, rol, id_cliente)
VALUES (p_email, p_pass, p_rol, cliente_id);

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
  `telefono` varchar(20) DEFAULT NULL,
  `sexo` varchar(50) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `rol` enum('cliente','admin') DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `rol` enum('cliente','admin') DEFAULT 'cliente',
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- tabla de productos
CREATE TABLE ropa (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  marca VARCHAR(255) NOT NULL,
  talla VARCHAR(10) NOT NULL,
  precio DECIMAL(10, 2) NOT NULL,
  categoria VARCHAR(255) NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

-- insertar datos
INSERT INTO ropa (nombre, marca, talla, precio, categoria)
VALUES ('Camisa blanca', 'Zara', 'M', 29.99, 'ropa mujer'),
       ('Jeans azules', 'Levi', '32x32', 49.99, 'ropa hombre'),
       ('Botas negras', 'Dr. Martens', '7', 129.99, 'calzado'),
       ('Pulsera plateada', 'Pandora', 'Única', 19.99, 'accesorios');

