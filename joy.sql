-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2021 a las 16:02:54
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendateclados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `nombre`) VALUES
(1, '[60%]'),
(2, '60%'),
(3, '60%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `comentario` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellido`, `email`, `telefono`, `comentario`) VALUES
(11, 'alex', 'huaracha', 'alwx162@gmail.com', '123123123', 'buenoss'),
(12, 'Pedro', 'Mamani', 'pedro13@gmail.com', '456741258', 'Bunos productos : )'),
(13, 'Juan ', ' Ramoz Kana', 'juan123@gmail.com', '123456741', 'Faltan productos '),
(14, 'Carlos', 'Martinez Pera', 'carloss44@gmail.com', '100204654', 'Todo bien '),
(15, 'Edson', 'Fernandez Martinez', 'edson123@gmail.com', '789854621', 'Todo claro'),
(16, 'Emerson ', 'Nuñez Lapadula', 'emersonyy@gmail.com', '987456410', 'Muy buenos productos'),
(17, 'Martin', 'Carpio del Rio', 'martin12@gmail.com', '999888777', 'Buenas '),
(18, 'Maria', 'Quispe Yudi', 'mariaaa12@gmail.com', '987654147', 'hola manito no habia mas barato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `idPedido` int(10) NOT NULL,
  `pedidoID` int(11) NOT NULL,
  `tecladoID` int(11) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`idPedido`, `pedidoID`, `tecladoID`, `cantidad`, `estado`, `precio`) VALUES
(1, 2, 18, 1, 1, '2200'),
(2, 3, 18, 1, 1, '2200'),
(3, 4, 19, 3, 1, '2300'),
(4, 4, 16, 2, 1, '2000'),
(5, 4, 14, 1, 1, '1800'),
(6, 5, 18, 3, 1, '2200'),
(7, 6, 16, 3, 1, '2000'),
(8, 7, 12, 1, 1, '2000'),
(9, 8, 14, 5, 1, '1800'),
(10, 9, 18, 1, 1, '2200'),
(11, 10, 19, 5, 1, '2300');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(10) NOT NULL,
  `clienteID` int(11) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `clienteID`, `total`, `fecha`, `estado`) VALUES
(1, 9, '2200', '2021-07-17', 1),
(2, 10, '2200', '2021-07-17', 1),
(3, 11, '2200', '2021-07-17', 1),
(4, 12, '12700', '2021-07-20', 1),
(5, 13, '6600', '2021-07-20', 1),
(6, 14, '6000', '2021-07-20', 1),
(7, 15, '2000', '2021-07-20', 1),
(8, 16, '9000', '2021-07-20', 1),
(9, 17, '2200', '2021-07-20', 1),
(10, 18, '11500', '2021-07-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teclados`
--

CREATE TABLE `teclados` (
  `IDteclado` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `categoriaID` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `teclados`
--

INSERT INTO `teclados` (`IDteclado`, `titulo`, `descripcion`, `foto`, `precio`, `categoriaID`, `fecha`, `estado`) VALUES
(12, 'Tofu', 'Negro y Gris', 'Tofu 65 w_ GMK 8008.jpg', '2000', 2, '2021-07-16', 1),
(13, 'Ducky One 2', 'Monocromatico', 'My new Custom Ducky One 2.jpg', '1580', 3, '2021-07-16', 1),
(14, 'Carbon Collection', 'Multicolor', '[photos] Carbon Collection.png', '1800', 1, '2021-07-16', 1),
(15, 'Lioncast Lk20', 'Multicolor', '[photos] My Lioncast Lk20.jpg', '2300', 1, '2021-07-16', 1),
(16, 'Tasty', 'Marron intenso', 'Tasty.jpg', '2000', 1, '2021-07-16', 1),
(17, 'Zambumon', 'Azul marino', 'Zambumon on Twitter.png', '2500', 1, '2021-07-16', 1),
(18, 'Novatouch', 'Multicolor', 'Novatouch Carbon SA + Pexon.jpg', '2200', 1, '2021-07-16', 1),
(19, 'Good Junk', 'Verdecito', 'GOOD JUNK.jpg', '2300', 2, '2021-07-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `clave`, `estado`) VALUES
(1, 'user', '123', 1),
(2, 'admin', '123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `teclados`
--
ALTER TABLE `teclados`
  ADD PRIMARY KEY (`IDteclado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `idPedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `teclados`
--
ALTER TABLE `teclados`
  MODIFY `IDteclado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
