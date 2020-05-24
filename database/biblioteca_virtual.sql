-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2020 a las 01:24:17
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca_virtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(80) NOT NULL,
  `author` varchar(80) NOT NULL,
  `details` text,
  `id_genre_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `author`, `details`, `id_genre_fk`) VALUES
(2, 'supercarpincho', 'internet', 'descripción de libro que debería mostrar solamente las primeras 20 palabras con el fin de poder incluir un enlace para continuar con la lectura detallada del libro en cuestión y poder incluir una imagen descriptiva', 1),
(3, '1984', 'Orwell George', '1984 es una de las novelas más inquietantes y atractivas del siglo XX. En el año 1984 Londres es una ciudad lúgubre en la que la Policía del Pensamiento controla de forma asfixiante la vida de los ciudadanos. Winston Smith es un peón de este engranaje perverso, su cometido es reescribir la historia para adaptarla a lo que el Partido considera la versión oficial de los hechos... hasta que decide replantearse la verdad del sistema que los gobierna y somete.', 3),
(6, 'Alpha| #1 Saga Wolves', 'Alpha| #1 Saga Wolves Kang Steel', '¿Que ocurre cuando la hija del Alpha sea secuestrada por otra manada?\r\nLas cosas no siempre terminan bien y para Camila, una joven mujer que vivía en  perfecta armonía a excepción de un inmenso vacío por encontrar a su compañero de vida ese obstáculo tampoco sería la excepción.\r\nNo, cuando su padre realizó un tratado de paz con una manada en el este, el cual especificaba lealtad absoluta, lealtad que no cumplieron cuando los Furia hicieron acto de presencia por traición y descubrir que una bestia es su alma gemela.\r\n', 10),
(7, 'Luna', 'Perla Murillo (-ItsPerl)', 'Ser una especie de humano entre lobos es difícil, ser el hijo \"rebelde\" lo empeora.\r\nMi vida no fue muy fácil, pero ella sólo llego a complicarla más.\r\nValentine Blood apareció en mi camino y arruinó más que mis planes, cambio mi vida por completo y ahora soy su \"Luna\".', 10),
(9, ' El Alfa Doruck', 'Isabel Solar', 'Cruel , despiadado , desalmado son los adjectivos que le han otorgado su manada al alfa Doruck.\r\n\r\nEl Alfa había encontrado a su Luna pero estaba molesto con ella pues era solo una simple humana y eso para él era terrible pues su mate era débil.\r\n\r\nNo tuvo consideración con ella en ningún momento desde que la encontró , toda su manada observaba día a día como era la vida de su Luna junto al alfa más cruel y despiadado que pudo existir.', 3),
(10, 'Día Z: Apocaliptíco I', 'Ulises Drake', '\'Ahora aunque caminen, no significa que están vivos\' - Menciona un personaje de éste libro.\r\n\r\nCuando después de que una organización terrorista lanza un mensaje a todos los países de cada continiente anunciando la creación de un arma biológica, el mundo se prepara. Un día unos extraños misiles surcan el cielo esparciendo un liquido extraño. Es la propagación de una bacteria que entra al cuerpo mediante la saliva y la sangre, éstas bacterias se alojan en el cerebro, muntandolo causando que la persona se haga agresiva y tenga una necesidad de comer carne humana, creando, por asi decirlo, un efecto \'Caníval\'.', 3),
(11, 'La Última Sombra', 'LyonGreen', 'Kaebu Spearhead se ha despertado en una habitación que puede pecar por su simplicidad. Pero todo debería estar perfecto ¿No? ciertamente, todo lo estaría de no ser por un pequeño detalle, Kaebu (un nombre que se ha inventado) no recuerda absolutamente nada, no tiene memorias de absolutamente nada. Por lo cual al salir al mundo y encontrárselo en ruinas, no resulta ser la mejor de sus experiencias.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'comic'),
(3, 'ficcion'),
(6, 'computacion'),
(9, 'terror'),
(10, 'fantasia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `userName` varchar(80) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `adminPass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `userName`, `password`, `adminPass`) VALUES
(1, 'admin', NULL, '$2y$10$O/n1L0Xv9rJcTnnzUiWZlerzmvtylmgUdLHQoK4YWInbq4dtvfy/i');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `id_genre_fk` (`id_genre_fk`);

--
-- Indices de la tabla `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_genre_fk`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
