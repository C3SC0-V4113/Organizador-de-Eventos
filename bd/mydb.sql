-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 27-03-2021 a las 10:25:03
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_empresa_enlaces`
--

CREATE TABLE `detalle_empresa_enlaces` (
  `IDEnlaces` int(5) NOT NULL,
  `IDEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_empresa_enlaces`
--

INSERT INTO `detalle_empresa_enlaces` (`IDEnlaces`, `IDEmpresa`) VALUES
(3, 1),
(33, 1),
(38, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `TituloDescripcion` varchar(25) NOT NULL,
  `LogoDesc` varchar(150) NOT NULL,
  `Descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `EventosTitle` varchar(25) NOT NULL,
  `EventosDesc` text NOT NULL,
  `UbicTitle` varchar(25) NOT NULL,
  `UbicDesc` text NOT NULL,
  `ContactTitle` varchar(25) NOT NULL,
  `ContactDesc` text NOT NULL,
  `Slogan` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono` varchar(8) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Logo_Url` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `Nombre`, `TituloDescripcion`, `LogoDesc`, `Descripcion`, `EventosTitle`, `EventosDesc`, `UbicTitle`, `UbicDesc`, `ContactTitle`, `ContactDesc`, `Slogan`, `Telefono`, `Direccion`, `Email`, `Logo_Url`) VALUES
(1, 'WINE & CHAMPAGNE EVENTOS', 'UNA EMPRESA GENIAL', 'fas fa-ambulance', 'Eget mattis at, laoreet vel et velit aliquam diam ante, aliquet sit amet vulputate et magna feugiat laoreet vel velit lorem. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum ducimus sit impedit, consequuntur, enim cumque magnam doloribus laboriosam quidem alias, cum veniam ut deserunt. Culpa assumenda doloribus error perferendis dolor. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque dolores totam blanditiis temporibus, aut neque? Enim laboriosam vero molestiae voluptatum magni, exercitationem ducimus illum porro eaque sunt adipisci velit quasi.', '¡MOMENTOS INOLVIDABLES!', 'Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis numquam voluptatibus, sapiente sed sint enim deserunt omnis, necessitatibus impedit cupiditate est, magni tempore molestias repellat sequi ipsum error praesentium quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, obcaecati beatae commodi labore earum mollitia provident, rerum officia autem at, libero est in atque quia eaque minus quos ipsam! Aliquid! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia qui, dolorem aperiam quasi in, accusamus beatae vitae ducimus saepe asperiores sapiente possimus iste minus delectus ipsa maxime necessitatibus explicabo autem.', '¡ESTAMOS CERCA!!!!!!!', 'Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus voluptates est dolorem totam corrupti suscipit laudantium at, incidunt ipsa. Reprehenderit voluptates tempore similique illo hic nihil corrupti facilis, ad eius!\r\n\r\nEget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate ad est porro minima nemo. Voluptatibus non architecto odit molestiae rem, sint eveniet veniam autem impedit ad inventore alias facere reiciendis. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus incidunt natus magnam, blanditiis sequi eum ut recusandae sed hic voluptatibus neque tempora, numquam expedita aliquam enim molestias facilis corrupti dolore?', '¿Interesado?¡Contactanos!', 'Atenderemos en nuestras redes sociales', '¡B I E N V E N I D O S!', '78724055', 'Cima 4, Pasaje el Copinol, #173', 'vallecesco@gmail.com', '##');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces`
--

CREATE TABLE `enlaces` (
  `IDEnlaces` int(5) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Enlace` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enlaces`
--

INSERT INTO `enlaces` (`IDEnlaces`, `Nombre`, `Enlace`) VALUES
(3, 'Twitter', 'https://twitter.com/compose/tweet/media'),
(33, 'GitHub', 'https://github.com/'),
(38, 'Facebook', 'https://m.facebook.com/home.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idEventos` int(11) NOT NULL,
  `IdTipoEvento` int(11) NOT NULL,
  `IdEmpresa` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Lugar` varchar(200) DEFAULT NULL,
  `Cliente` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEventos`, `IdTipoEvento`, `IdEmpresa`, `Id_Usuario`, `Nombre`, `fecha`, `Lugar`, `Cliente`, `Descripcion`) VALUES
(2, 3, 1, 1, 'Papyrus', '2016-06-27', 'Snowdin', 'Cool Dude', 'Veremos si esto es de su talla'),
(4, 3, 1, 1, 'Cumpleaños', '2020-09-06', 'Pollo campero', 'Karla', 'Cumpleaños para toda la familia y Amigos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoseventos`
--

CREATE TABLE `fotoseventos` (
  `idFotos` int(11) UNSIGNED NOT NULL,
  `idEventos` int(11) NOT NULL,
  `UrlFoto` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fotoseventos`
--

INSERT INTO `fotoseventos` (`idFotos`, `idEventos`, `UrlFoto`) VALUES
(1, 2, 'ImagenesSubidas/3f8b4f4dcc6c8f205506cec38e95a48f1c8fc39b_hq.jpg'),
(3, 4, 'ImagenesSubidas/fiesta-de-cumpleanos-655x368.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infoservicios`
--

CREATE TABLE `infoservicios` (
  `idEmpresa` int(11) NOT NULL,
  `HeaderTitulo` varchar(50) DEFAULT NULL,
  `DescripcionHeader` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infoservicios`
--

INSERT INTO `infoservicios` (`idEmpresa`, `HeaderTitulo`, `DescripcionHeader`) VALUES
(1, 'Nuestros bellos y rikonilos Servicios', 'Esto llegara a la historia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idServicios` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(300) DEFAULT NULL,
  `urlIMG` longtext DEFAULT NULL,
  `IdEmpresa` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicios`, `Nombre`, `Descripcion`, `urlIMG`, `IdEmpresa`, `Id_Usuario`) VALUES
(1, 'Probando los Servicios', 'Somos de una boda cuqui', 'fas fa-archive', 1, 1),
(2, 'Segundo Servicio', 'Vamoooos', 'fas fa-ambulance', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevento`
--

CREATE TABLE `tipoevento` (
  `idTipoEvento` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoevento`
--

INSERT INTO `tipoevento` (`idTipoEvento`, `Nombre`) VALUES
(1, 'Boda'),
(2, 'Entrega de Premios'),
(3, 'Fiestas'),
(4, 'Graduaciones'),
(5, 'Inaguraciones'),
(6, 'Ruedas de Presa'),
(7, 'Convenciones'),
(8, 'Eventos Deportivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idTipo_Usuario` int(11) NOT NULL,
  `Tipo_Usuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipo_Usuario`, `Tipo_Usuario`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Id_tipo_usuario` int(11) NOT NULL,
  `contraseña` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Usuario`, `Id_tipo_usuario`, `contraseña`) VALUES
(1, 'admin', 1, '98eb470b2b60482e259d28648895d9e1'),
(3, 'cliente', 2, '89f624dc5f553676c8b05de3701e6178');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_empresa_enlaces`
--
ALTER TABLE `detalle_empresa_enlaces`
  ADD KEY `IDEmpresa` (`IDEmpresa`),
  ADD KEY `detalle_empresa_enlaces_ibfk_2` (`IDEnlaces`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  ADD PRIMARY KEY (`IDEnlaces`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEventos`),
  ADD KEY `IdTipoEvento` (`IdTipoEvento`),
  ADD KEY `IdEmpresa` (`IdEmpresa`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `fotoseventos`
--
ALTER TABLE `fotoseventos`
  ADD PRIMARY KEY (`idFotos`),
  ADD KEY `idEventos` (`idEventos`);

--
-- Indices de la tabla `infoservicios`
--
ALTER TABLE `infoservicios`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicios`),
  ADD KEY `IdEmpresa` (`IdEmpresa`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  ADD PRIMARY KEY (`idTipoEvento`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idTipo_Usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `Id_tipo_usuario` (`Id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  MODIFY `IDEnlaces` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `fotoseventos`
--
ALTER TABLE `fotoseventos`
  MODIFY `idFotos` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_empresa_enlaces`
--
ALTER TABLE `detalle_empresa_enlaces`
  ADD CONSTRAINT `detalle_empresa_enlaces_ibfk_1` FOREIGN KEY (`IDEmpresa`) REFERENCES `empresa` (`idEmpresa`),
  ADD CONSTRAINT `detalle_empresa_enlaces_ibfk_2` FOREIGN KEY (`IDEnlaces`) REFERENCES `enlaces` (`IDEnlaces`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`IdTipoEvento`) REFERENCES `tipoevento` (`idTipoEvento`),
  ADD CONSTRAINT `eventosempresa_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`idEmpresa`),
  ADD CONSTRAINT `eventousuarios_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `fotoseventos`
--
ALTER TABLE `fotoseventos`
  ADD CONSTRAINT `fotoe_ibfk_1` FOREIGN KEY (`idEventos`) REFERENCES `eventos` (`idEventos`);

--
-- Filtros para la tabla `infoservicios`
--
ALTER TABLE `infoservicios`
  ADD CONSTRAINT `infoservicios_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`idEmpresa`),
  ADD CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_tipo_usuario`) REFERENCES `tipo_usuario` (`idTipo_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
