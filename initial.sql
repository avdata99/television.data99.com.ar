-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2015 a las 19:49:17
-- Versión del servidor: 5.5.42-cll
-- Versión de PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tele_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canales`
--

CREATE TABLE IF NOT EXISTS `canales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `youtube_id` varchar(120) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `pais` varchar(35) NOT NULL DEFAULT 'Argentina',
  `ciudad` varchar(35) NOT NULL DEFAULT 'Buenos Aires',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL DEFAULT '00:00:00',
  `video_id` varchar(90) NOT NULL,
  `canal_id` varchar(120) NOT NULL,
  `th_mini` varchar(150) NOT NULL,
  `th_med` varchar(120) NOT NULL,
  `th_high` varchar(120) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `video_id` (`video_id`),
  KEY `fecha` (`fecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=307542 ;

INSERT INTO `canales` (`id`, `youtube_id`, `nombre`, `pais`, `ciudad`) VALUES
(1, 'UCS3toGCNP90tvNoRUr7jB2Q', 'Argentina en Noticias', 'Argentina', 'Buenos Aires'),
(2, 'UChxGASjdNEYHhVKpl667Huw', 'Telefe noticias', 'Argentina', 'Buenos Aires'),
(3, 'UCUzonpa3XKurQVycdMY70XQ', 'Canal 10 de Cordoba', 'Argentina', 'Cordoba'),
(4, 'UCs231K71Bnu5295_x0MB5Pg', 'Television publica argentina', 'Argentina', 'Buenos Aires'),
(5, 'UCqlsTzBv49Uiu8Z3IseVgQQ', 'RTVE', 'España', 'Madrid'),
(6, 'UC2BGQW7013P70utHoafZbbA', 'Almería Noticias Canal 28', 'España', 'Almería'),
(7, 'UC32TdiIsh_5X8tKr_9rKQyA', 'Univision Noticias', 'Mexico', 'Mexico'),
(8, 'UC4rtLjvAdTkjzuKj03vZupA', 'RTU Noticias', 'Ecuador', 'Quito'),
(9, 'UCN6hSRuNcyqiD3MjcbTSm1A', 'Noticias Mundo Fox', 'USA', 'USA'),
(10, 'UCTp0PrexDQCj60zQlkzAEFw', 'GloboVision', 'Venezuela', 'Caracas');


INSERT INTO `videos` (`id`, `fecha`, `hora`, `video_id`, `canal_id`, `th_mini`, `th_med`, `th_high`, `title`, `description`) VALUES
(1, '2013-07-08', '00:00:00', 'ia8hfheZhHo', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/ia8hfheZhHo/default.jpg', 'https://i.ytimg.com/vi/ia8hfheZhHo/mqdefault.jpg', 'https://i.ytimg.com/vi/ia8hfheZhHo/hqdefault.jpg', 'AEN TV 20130708 4MIN 11HS', 'El gobierno resolvió aplicar la Ley de Abastecimiento al trigo para garantizar al mercado El ministro de Planificación Julio De Vido, aseguró que elFrente Pa...'),
(2, '2013-07-03', '00:00:00', 'xNTErn6wMIo', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/xNTErn6wMIo/default.jpg', 'https://i.ytimg.com/vi/xNTErn6wMIo/mqdefault.jpg', 'https://i.ytimg.com/vi/xNTErn6wMIo/hqdefault.jpg', 'AEN TV 20130703 4MIN 11HS', 'El presidente de la Cámara Argentina de la Construcción aseguró que el CEDIN promoverá una clara dinamización del sector El INDEC informó que el índice ...'),
(3, '2013-07-15', '00:00:00', '5je8xrOqWvo', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/5je8xrOqWvo/default.jpg', 'https://i.ytimg.com/vi/5je8xrOqWvo/mqdefault.jpg', 'https://i.ytimg.com/vi/5je8xrOqWvo/hqdefault.jpg', 'AEN TV 20130715 4MIN 11HS', 'El 80 por ciento de los argentinos elige nuestro país para estas vacaciones de invierno. La presidenta Cristina Fernández llamo a seguir construyendo un país...'),
(4, '2013-07-01', '00:00:00', 'uj8F5xfbwEQ', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/uj8F5xfbwEQ/default.jpg', 'https://i.ytimg.com/vi/uj8F5xfbwEQ/mqdefault.jpg', 'https://i.ytimg.com/vi/uj8F5xfbwEQ/hqdefault.jpg', 'AEN TV 20130701 4 MIN 11HS', 'El secretario de Empleo de la Nación, Enrique Deibe aseguró que durante la última década el empleo jóven creció un 35 por ciento La presidenta Cristina ...'),
(5, '2013-07-04', '00:00:00', '7itG1BemXVs', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/7itG1BemXVs/default.jpg', 'https://i.ytimg.com/vi/7itG1BemXVs/mqdefault.jpg', 'https://i.ytimg.com/vi/7itG1BemXVs/hqdefault.jpg', 'AEN TV 20130704 4MIN 11HS', 'Argentina recibió un nuevo crédito de la Corporación Andina de Fomento, para la interconexión eléctrica NEA. La presidenta Cristina Fernández condenó ...'),
(6, '2013-07-05', '00:00:00', 'ze4kiG-B7fQ', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/ze4kiG-B7fQ/default.jpg', 'https://i.ytimg.com/vi/ze4kiG-B7fQ/mqdefault.jpg', 'https://i.ytimg.com/vi/ze4kiG-B7fQ/hqdefault.jpg', 'AEN TV 20130705 4MIN 11HS', 'La presidenta Cristina Fernández reclamó en Cochabamba que aquellos que humillaron a Bolivia y el Cono Sur pidan perdón Ya es Ley el Registro Nacional ...'),
(7, '2013-07-04', '00:00:00', 'x4IplHyi_No', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/x4IplHyi_No/default.jpg', 'https://i.ytimg.com/vi/x4IplHyi_No/mqdefault.jpg', 'https://i.ytimg.com/vi/x4IplHyi_No/hqdefault.jpg', 'AEN TV 20130704 4MIN 18HS', 'Argentina recibió un nuevo crédito de la Corporación Andina de Fomento, para la interconexión eléctrica NEA. La presidenta Cristina Fernández inauguró ...'),
(8, '2013-07-12', '00:00:00', 'vqofAAy10Tc', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/vqofAAy10Tc/default.jpg', 'https://i.ytimg.com/vi/vqofAAy10Tc/mqdefault.jpg', 'https://i.ytimg.com/vi/vqofAAy10Tc/hqdefault.jpg', 'AEN TV 20130712 4MIN 18HS', 'Desde mañana sábado abre sus puertas al público Tecnópolis y funcionará todos los días hasta las 20 hs durante las vacaciones de invierno "La integración es ...'),
(9, '2013-07-12', '00:00:00', 'C_IbWsHWtdI', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/C_IbWsHWtdI/default.jpg', 'https://i.ytimg.com/vi/C_IbWsHWtdI/mqdefault.jpg', 'https://i.ytimg.com/vi/C_IbWsHWtdI/hqdefault.jpg', 'AEN TV 20130712 4MIN 11HS', 'Según la Encuesta de Viajes y Turismo de los Hogares del Ministerio de Turismo, casi 13 millones de turistas recorrerán el país durante las vacaciones de inv...'),
(10, '2013-07-08', '00:00:00', 'UUuVKVlBQs4', 'UCS3toGCNP90tvNoRUr7jB2Q', 'https://i.ytimg.com/vi/UUuVKVlBQs4/default.jpg', 'https://i.ytimg.com/vi/UUuVKVlBQs4/mqdefault.jpg', 'https://i.ytimg.com/vi/UUuVKVlBQs4/hqdefault.jpg', 'AEN TV 20130708 4MIN 18HS', 'Un informe de la Universidad Católica destacó los beneficios de la Asignación Universal por Hijo La presidenta Cristina Fernández entregó en una escuela rura ...');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

