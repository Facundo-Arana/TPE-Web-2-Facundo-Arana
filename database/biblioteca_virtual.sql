-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2020 a las 02:17:16
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
  `id_genre_fk` int(11) NOT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `author`, `details`, `id_genre_fk`, `img`) VALUES
(5, 'El Alfa Doruck', 'Isabel Solar', 'Cruel , despiadado , desalmado son los adjectivos que le han otorgado su manada al alfa Doruck.\r\nEl Alfa había encontrado a su Luna pero estaba molesto con ella pues era solo una simple humana y eso para él era terrible pues su mate era débil.\r\nNo tuvo consideración con ella en ningún momento desde que la encontró , toda su manada observaba día a día como era la vida de su Luna junto al alfa más cruel y despiadado que pudo existir.\r\nSu misma Luna le tenía miedo por eso se convirtió en una sumisa y eso al alfa lo ponía contento pues ella solo lo obedecía y si no lo hacia la castigaba de la formas más horribles.\r\nLa manada siempre apoyo a su Luna pues veía que ella la pasaba peor que ellos , ella soportaba todo por miedo pero ya no lo haría.\r\nLo haría sufrir como él lo hizo con ella.', 10, 'covers/5ef6665ad3f44.jpg'),
(6, 'La isla misteriosa', 'Julio Verne', 'Durante la guerra civil americana, cinco hombres logran escapar del asedio de Pichmond en un globo aerostático que finalmente acabará estrellándose en una isla desierta de los mares del sur. Los cinco compañeros no tienen nada salvo su ingenio para sobrevivir en una isla que muy pronto se mostrará llena de secretos, misterios y enigmas.', 10, 'covers/5ef9fedcefdb5.jpg'),
(7, 'Alicia en el país de las maravillas', 'Lewis Carroll', 'Un asombroso camino que empieza con una vida aburrida en una época donde sus ideas, valores y formas no encajan, terminando en un mundo donde correr detrás de un conejo blanco, o tomar el té con un sombrerero loco es lo habitual.\r\nEn este lugar las leyes de la física funcionan de otra forma y donde lo común es charlar con seres asombrosos y encontrar fascinantes maravillas en un lugar irracional donde todo parece un sueño.\r\n\r\n¿Te atreves a descubrir este fantástico mundo?', 10, 'covers/5efa0091d0dcc.jpg'),
(8, 'El forastero misterioso', 'Mark Twain', 'Satán se encargará de obnubilar a los tres jóvenes con extraños trucos de magia, viajes alrededor del mundo y todo tipo de vivencias extraordinarias, para mostrarles mientras tanto, la cruda realidad de su tiempo y la esencia más horrible de nuestra especie reflejada en el fácil manejo de la masa por la minoría gobernante, en la hipocresía, en la explotación del hombre por el hombre, en la crueldad o en el egocentrismo.', 10, 'covers/5efa025e704d8.jpg'),
(9, 'El maravilloso Mago de Oz', 'L. Frank Baum', 'Este libro, que narra las aventuras de una muchacha llamada Dorothy Gale en la tierra de Oz, constituye una de las historias más conocidas de la cultura popular norteamericana y ha sido traducido a muchos idiomas. Gracias al gran éxito de El maravilloso mago de Oz, L. Frank Baum escribió trece libros más sobre la tierra de Oz. El libro se encuentra en dominio público en Estados Unidos desde 1956.', 10, 'covers/5efa03d02a352.jpg'),
(10, 'Las mil y una noches', 'Anónimo', 'Es de un valor incalculable. Sólo os diré, majestad, que, si después de cortarme la cabeza lo abrís por la sexta página, leéis la tercera línea de la hoja de la izquierda y, a continuación, hacéis cualquier pregunta, mi cabeza os responderá de inmediato', 3, 'covers/5efa04fdafb8d.jpg'),
(11, 'Los tres mosqueteros', 'Alejandro Dumas (Padre)', 'D\'Artagnan viaja a París con la esperanza de convertirse en mosquetero, uno de los guardias de élite del rey de Francia. Athos, Porthos y Aramis protegen al rey y D\'Artagnan se une a ellos para exponer el plan del cardenal Richelieu contra la corona.', 3, 'covers/5efa058f2e7fc.jpg'),
(12, 'El desaparecido (América)', 'Franz Kafka', 'Amerika es una obra póstuma de Franz Kafka que narra el viaje de Karl Rossmann, un joven europeo de 16 años, a Nueva York en un intento de huir de las consecuencias de un escarceo amoroso con una criada y con la voluntad de hacer fortuna y labrarse un futuro mejor.', 3, 'covers/5efa06b8cc551.jpg'),
(13, 'El gato negro', 'Edgar Allan Poe', 'Un joven matrimonio lleva una vida hogareña apacible en compañía de varios animales domésticos, entre ellos un misterioso gato negro. Todo cambia cuando el marido empieza a dejarse arrastrar por la bebida. El alcohol le vuelve irascible y en uno de sus accesos de furia acaba con la vida del animal.', 9, 'covers/5efa099c84176.jpg'),
(14, 'La llamada de Cthulhu ', 'H. P. Lovecraft', 'El narrador, heredero de su legado, se vuelca en la interpretación arqueológica de un bajorrelieve que va acompañado de un texto en una lengua desconocida que hace referencia a un culto secreto del que parece ser un dios olvidado y extraterrestre con el nombre de «Cthulhu».', 9, 'covers/5efa0a15cfab9.jpg'),
(15, 'El alquimista', 'H. P. Lovecraft', 'En lo alto de la cima de un montículo escarpado, de falda cubierta por árboles selváticos, se yergue la mansión de Antoine, último conde de C. El terreno circundante es salvaje y accidentado. Sus torreones, ahora demolidos por las tormentas y el paso del tiempo, fueron siglos atrás una de las más temidas fortalezas francesas, nunca invadida. Pero ahora la miseria ha oscurecido su antiguo esplendor, pues la altanería de los menguados descendientes ha impedido el ejercicio del comercio.', 9, 'covers/5efa0afa0bb0a.jpg'),
(16, '¿Cómo empieza el lenguaje?', 'Beatriz Ituero y Marta Casla', 'A partir de diversas viñetas, reflexiones y descubrimientos se pretende dar a conocer a los educadores el proceso por el que pasan los niños cuando están aprendiendo a comunicarse y el papel que tienen las personas que les rodean durante este proceso.', 11, 'covers/5efa1280822f2.jpg'),
(17, 'Mobile Learning: nuevas realidades en el aula', 'Raúl Santiago, Susana Trabaldo, Mercedes Kamijo y Álvaro Fernández', 'En este ebook, que forma parte de la colección de #InnovaciónEdu de Digital-Text, sus autores abordan el aprendizaje móvil y las herramientas para llevarlo a cabo. Asimismo, la obra realiza un recorrido por los dispositivos móviles y las posibilidades del M-learning, ofrece pautas para la creación de contenidos con apps móviles y para el diseño de actividades y descubre el trabajo colaborativo a través de los dispositivos.', 11, 'covers/5efa12f88d26c.jpg'),
(18, 'Aprobar o aprender. Una propuesta para el estudio útil', 'Enrique Bono', 'El autor, en base a sus investigaciones, compartidas y reflexionadas con los docentes y puestas en práctica con jóvenes estudiantes, plantea un camino de mejora en la adquisición de un aprendizaje de calidad, significativo y eficaz, próximo a un aula experimental. El libro cuestiona el nivel de calidad del aprendizaje actual de los jóvenes, y pone sobre la mesa las mayores deficiencias de las didácticas actuales y del propio sistema educativo, atendiendo a los más recientes estudios y a los descubrimientos de la neurociencia cognitiva.', 11, 'covers/5efa13736b0eb.jpg'),
(23, 'Fundamentos de Programacion.', 'Jose Alfredo Jimenez Murillo', 'Esta obra está pensada para ayudar a las personas que comienzan una carrera en el área de la computación. Busca desarrollar la lógica de programación del lector usando diferentes maneras de representar los algoritmos y resolviendo problemas interesantes para ilustrar y explicar cada uno de los conceptos o instrucciones de los lenguajes de programación, plantea problemas que obligarán a la persona a pensar y ser creativa para resolverlos.\r\n\r\n', 6, 'covers/5efa2b30dd7f9.jpg'),
(24, 'desarrollador web claves y tecnicas para optimizar sitios', 'Minera Francisco José', 'Esta obra es una guía de referencia útil y versátil, tanto para programadores como para diseñadores, que deseen obtener resultados profesionales en sus desarrollos. En sus páginas, repararemos conceptos y técnicas que permitirán mejorar la experiencia final de los usuarios', 6, 'covers/5efa2c077c764.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_book_fk` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `content` text NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `id_book_fk`, `id_user_fk`, `content`, `puntaje`) VALUES
(1, 5, 2, 'primer comentario', 0),
(2, 5, 3, 'segundo comentario', 3);

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
(3, 'Ficcion'),
(6, 'Computacion'),
(9, 'Terror'),
(10, 'Fantasia'),
(11, 'Educativos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `userName` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `priority` int(10) NOT NULL DEFAULT '1',
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `userName`, `email`, `priority`, `password`) VALUES
(2, 'TUDAI', '', 2, '$2y$12$6bkmpd7tqhioPGgfO0X7IOu.EDTE8wjelj.fFhrKw5eTcxJB3D3lq'),
(3, 'facundo', '', 1, '$2y$10$lpoh8wBGp1EFoS4liKyA3ONfQea8H0k2c1Vaue6eyq4AQ7qZbC.US'),
(5, 'admin', '', 1, '$2y$10$8e2HaY0BGmDTN4LgNXx.f.0IPXo3EI8CgTRXqhj/nlYZ3c3ux9APu'),
(8, 'gabyte', 'gabriematiasquattrini@gmail.com', 1, '$2y$10$9P3Zrhqce9mz50R69vA3NubE842WIVtn8ZtXEcTKKdt8/B4um3Lou');

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
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_user` (`id_user_fk`),
  ADD KEY `fk_book` (`id_book_fk`);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
