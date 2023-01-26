-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-01-2022 a las 08:02:45
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empleados`
--
CREATE DATABASE IF NOT EXISTS `empleados` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `empleados`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_user` int(11) NOT NULL,
  `c_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_per` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`c_id`, `c_user`, `c_nom`, `c_per`, `c_doc`) VALUES
(2, 2, 'Diseño Web', '2001-2002', 'profiles/cursos/CEID2_6162c07dbf6a1.pdf'),
(35, 1, 'datos', '2009-2010', 'profiles/cursos/CEID1_6184d51e4869b.pdf'),
(38, 1, '2200', '2020-2021', 'profiles/cursos/CEID38_6184fd48330e6.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `face` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ivac` date NOT NULL,
  `fvac` date NOT NULL,
  `id_e` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alta` date NOT NULL,
  `baja` date NOT NULL,
  `dom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telf` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fnac` date NOT NULL,
  `sex` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `edoc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ndcm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_ine` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ldm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ndl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hijos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ldn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nac` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `curp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdcsm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fine` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tdl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tele` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sindi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cancelled` int(11) NOT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`id_data`, `img`, `apellido`, `nombre`, `email`, `face`, `status`, `ivac`, `fvac`, `id_e`, `ads`, `area`, `alta`, `baja`, `dom`, `telf`, `cel`, `fnac`, `sex`, `edoc`, `rfc`, `ndcm`, `cod_ine`, `ldm`, `ndl`, `alergia`, `hijos`, `ldn`, `nac`, `gs`, `curp`, `mdcsm`, `fine`, `tdl`, `tele`, `sindi`, `Cancelled`) VALUES
(1, 'profiles/img/20220107_073717.jpg', 'Ramos Galán', 'Marco Antonio', 'mark_rg@msn.com', 'https://', 'Activo', '2022-11-05', '2022-11-10', '001', 'Desarrollo de software', 'Sistemas', '2022-11-05', '2022-11-05', 'Andador Santa Inés No. 15 Infornavit San Román Córdoba, Ver', '2712111687', '271211687', '2022-11-05', 'Masculino', 'Soltero(a)', 'RAGM841124LP6', '000000', '07741116375842', 'Sí', '99.999.9999', 'Ninguna', '0', 'Córdoba', 'Mexicana', 'O+', 'RAGM841124HVZLR06', '000000', 'IDMEX1836577170', 'A', '2712111687', 'Si', 0),
(3, 'profiles/img/20220107_073733.jpg', 'Flores', 'Aura', 'mail@msn.com', 'https', 'Inactivo', '2022-01-08', '2022-01-12', '000', '0', '0', '2022-01-06', '2022-01-06', '0', '2712111687', '2712111687', '2022-01-20', 'Femenino', 'Soltero(a)', 'RAGM841124', 'RAGM841124', 'RAGM841124', 'Si', 'N/A', 'Ninguna', '0', 'Córdoba', 'Mexicana', 'A+', 'RAGM841124', 'RAGM841124', 'RAGM841124', 'A', 'N/A', 'No', 0),
(4, 'profiles/img/20220107_073744.jpg', 'Antonio', 'Ramos', 'mail@mail.com', '0', 'Inactivo', '2022-01-11', '2022-01-11', '2020', '2020', '2020', '2022-01-05', '2022-01-12', 'Conocido', '202020', '2020', '2022-01-04', 'Masculino', 'Viudo(a)', 'RRR', 'RRR', 'RRRR', 'RRR', 'RRRR', 'Ninguna', '0', '0', 'Mexicana', 'AB+', 'b', 'b', 'b', 'b', 'b', 'No', 0),
(5, 'profiles/img/20220107_073807.jpg', 'Martinez', 'Juan', '64@msn.com', 'https://', 'Activo', '2022-01-28', '2022-01-26', '2095', 'X', 'X', '2022-01-07', '2022-01-07', 'X', '111223344', '111223344', '2022-01-29', 'Masculino', 'Casado(a)', '111223344', '111223344', '111223344', 'Si', '111223344', 'Ninguna', '5+', '111223344', '111223344', 'O+', '111223344', '111223344', '111223344', 'D', '111223344', 'No', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise`
--

DROP TABLE IF EXISTS `enterprise`;
CREATE TABLE IF NOT EXISTS `enterprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `enterprise`
--

INSERT INTO `enterprise` (`id`, `name`, `image`) VALUES
(1, 'Gobierno Municipal de Nogales, Ver. 2018 - 2022', 'img/20211010_042335.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_user` int(11) NOT NULL,
  `e_emp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_pue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_per` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `experience`
--

INSERT INTO `experience` (`e_id`, `e_user`, `e_emp`, `e_dir`, `e_pue`, `e_per`) VALUES
(27, 2, 'Publicidad Algarin', 'Córdoba', 'Diseño', '2008-2021'),
(28, 1, 'Refaccionaria', 'Avenida 1', 'Ayudante', '2001'),
(33, 1, 'Imprenta', 'Centro', 'Empleado', '2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_user` int(11) NOT NULL,
  `r_esc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_ubi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_per` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_doc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `record`
--

INSERT INTO `record` (`r_id`, `r_user`, `r_esc`, `r_ubi`, `r_per`, `r_doc`) VALUES
(2, 2, 'Instituo Tecnológico Superior de Zongolica', 'Km 4 Carretera a la Compañia S/N, Tepetlitlanapa, Zongolica, Ver. CP:95005', '2016-2020', 'profiles/historial/20211010_053432.pdf'),
(24, 2, 'Escuela', 'escuela', '2001-2002', 'profiles/historial/20211010_053432.pdf'),
(27, 2, 'Agregdo', 'Agregado', 'Agregado', 'profiles/historial/20211010_053432.pdf'),
(41, 1, 'ITSZ', 'Zongolica', '2001-2006', 'profiles/historial/20211105_070018.pdf'),
(43, 1, 'DEMO', 'DEMO', '2020', 'profiles/historial/20211105_074509.pdf'),
(44, 17, 'ff', '3', 'fff', 'profiles/historial/20211105_125058.pdf'),
(45, 4, 'ITSZ', 'Nogles', '2009-2010', 'profiles/historial/20211210_074940.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_rol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`, `user_rol`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'SuperAdmin'),
(2, 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Admin'),
(3, 'update@update.com', '3ac340832f29c11538fbe2d6f75e8bcc', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
