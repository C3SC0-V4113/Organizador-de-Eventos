-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 13-05-2021 a las 18:10:48
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
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `NombreCliente` varchar(50) DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `idUsuario`, `NombreCliente`, `Telefono`, `Correo`) VALUES
(1, 4, 'Pana', '7872-4055', 'frankjose00@gmail.com'),
(2, 5, 'Miguel', '2525-2525', 'vallecesco@gmai.com'),
(3, 1, 'CESCO', '7872-4055', 'frankjose00@gmail.com'),
(4, 3, 'valcha', '52526565', 'valcha.juancar@gmail.com');

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
(33, 1),
(38, 1),
(41, 1);

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
(33, 'GitHub', 'https://github.com/'),
(38, 'Facebook', 'https://m.facebook.com/home.php'),
(41, 'LinkedIn', 'https://www.linkedin.com/feed/');

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
  `idLugar` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Visibilidad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEventos`, `IdTipoEvento`, `IdEmpresa`, `Id_Usuario`, `Nombre`, `fecha`, `idLugar`, `idCliente`, `Descripcion`, `Visibilidad`) VALUES
(1, 3, 1, 1, 'Papyrus Undertale', '2021-05-03', 1, 1, 'Fiesta con tematica de Papyrus, el querido personaje de Undertale', 0),
(2, 3, 1, 1, 'Cumpleaños con Spiderman', '2020-12-07', 2, 2, 'Fiesta de un niño de 5 años con tematica de Spiderman', 1),
(8, 6, 1, 1, 'Prueba de Edicion', '2022-11-01', 1, 1, 'Les Miserables y Sweeney Todd', 1),
(10, 6, 1, 1, 'Prueba 4 y de Edicion', '2021-10-16', 1, 1, 'Cats Andrew Lloyd Webber', 1),
(13, 4, 1, 1, 'Prueba Multiple 2.0', '2021-12-07', 2, 1, 'Venom Snake Punished', 1),
(14, 4, 1, 1, 'Fiesta de Michi', '2021-08-21', 1, 1, 'Mi gatito Cumple 6 años', 1);

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
(4, 1, 'ImagenesSubidas/cWKXDINwG9Fx0CePOrHXxLdGy8LnFKiJhchyCS7LuQU.jpg'),
(6, 1, 'ImagenesSubidas/video-game-undertale-frisk-undertale-papyrus-undertale-wallpaper-preview.jpg'),
(7, 2, 'ImagenesSubidas/spidey.jpg'),
(8, 2, 'ImagenesSubidas/spider-man-remastered-ps5-esquire-4-1605525077.jpg'),
(9, 2, 'ImagenesSubidas/hipertextual-4-trajes-spider-man-lejos-casa-nuevo-trailer-2019196176.jpg');

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
(1, 'SERVICIOS DE CALIDAD Y PRECISIÓN', 'Estos servicios deben funcionar o me darán ganas de matarme :3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `idLugar` int(11) NOT NULL,
  `NombreLugar` varchar(100) NOT NULL,
  `DirecccionLugar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`idLugar`, `NombreLugar`, `DirecccionLugar`) VALUES
(1, 'Hotel Sheraton', 'No se, en el hotel Sheraton we'),
(2, 'Centro Militar', 'Yo que se we, cerca del Sheraton');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL,
  `IDEvento` int(11) NOT NULL,
  `FechaReservada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idReserva`, `IDEvento`, `FechaReservada`) VALUES
(20, 8, '2022-11-01'),
(22, 10, '2021-10-16'),
(25, 13, '2021-12-07'),
(26, 14, '2021-08-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idServicios` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(300) DEFAULT NULL,
  `urlIMG` longtext DEFAULT NULL,
  `Precio` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicios`, `Nombre`, `Descripcion`, `urlIMG`, `Precio`) VALUES
(1, 'Sillas Plegables', '100 Sillas Plegables para cualquier tipo de Evento', 'fas fa-align-justify', '150.00'),
(2, 'Servicio de Edecanes', 'Personal de 6 edecanes para presentar el evento, y ayudar con tareas pequeñas', 'fas fa-users', '1000.00'),
(3, 'Limosina', 'Renta por un dia de Limosina para ir hasta a 4 sitios en el horario indicado', 'fas fa-car', '250.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciosdeeventos`
--

CREATE TABLE `serviciosdeeventos` (
  `idSDE` int(11) NOT NULL,
  `idReserva` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `serviciosdeeventos`
--

INSERT INTO `serviciosdeeventos` (`idSDE`, `idReserva`, `idServicio`) VALUES
(12, 26, 3),
(13, 26, 1),
(14, 26, 3),
(15, 26, 2),
(36, 20, 1),
(37, 25, 2),
(38, 25, 1),
(39, 22, 2);

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
(3, 'cliente', 2, '89f624dc5f553676c8b05de3701e6178'),
(4, 'aver', 2, 'a70c993d481c091b54727a9d75547b30'),
(5, 'yosoy', 2, '449dbee947bc2f5d4b788d4235670c0d');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `ForaneaUsuario` (`idUsuario`);

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
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `fkidCliente` (`idCliente`),
  ADD KEY `keylugarr` (`idLugar`) USING BTREE;

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
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`idLugar`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `IDEvento` (`IDEvento`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicios`);

--
-- Indices de la tabla `serviciosdeeventos`
--
ALTER TABLE `serviciosdeeventos`
  ADD PRIMARY KEY (`idSDE`),
  ADD KEY `ForaneaReserva` (`idReserva`),
  ADD KEY `ForaneaServicio` (`idServicio`);

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
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  MODIFY `IDEnlaces` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `fotoseventos`
--
ALTER TABLE `fotoseventos`
  MODIFY `idFotos` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `idLugar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `serviciosdeeventos`
--
ALTER TABLE `serviciosdeeventos`
  MODIFY `idSDE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

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
  ADD CONSTRAINT `eventousuarios_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fkflu` FOREIGN KEY (`idLugar`) REFERENCES `lugares` (`idLugar`),
  ADD CONSTRAINT `fkidCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

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
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `IDEvento` FOREIGN KEY (`IDEvento`) REFERENCES `eventos` (`idEventos`);

--
-- Filtros para la tabla `serviciosdeeventos`
--
ALTER TABLE `serviciosdeeventos`
  ADD CONSTRAINT `ResReserva` FOREIGN KEY (`idReserva`) REFERENCES `reservas` (`idReserva`),
  ADD CONSTRAINT `ResServicio` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicios`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_tipo_usuario`) REFERENCES `tipo_usuario` (`idTipo_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
