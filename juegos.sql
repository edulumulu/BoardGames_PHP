-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-06-2025 a las 09:52:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `JuegosDeMesaBBDD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Juegos`
--

CREATE TABLE `Juegos` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `disenador` varchar(50) DEFAULT NULL,
  `año` int(11) DEFAULT NULL,
  `numJugMax` int(11) DEFAULT NULL,
  `numJugMin` int(11) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `tematica` varchar(50) DEFAULT NULL,
  `dificultad` int(11) DEFAULT NULL,
  `estrategia` int(11) DEFAULT NULL,
  `suerte` int(11) DEFAULT NULL,
  `interaccion` int(11) DEFAULT NULL,
  `dueno` varchar(50) DEFAULT NULL,
  `expansion` tinyint(1) DEFAULT NULL,
  `expansionDe` varchar(50) DEFAULT NULL,
  `listaExpansiones` varchar(1000) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Juegos`
--

INSERT INTO `Juegos` (`id`, `nombre`, `disenador`, `año`, `numJugMax`, `numJugMin`, `duracion`, `tematica`, `dificultad`, `estrategia`, `suerte`, `interaccion`, `dueno`, `expansion`, `expansionDe`, `listaExpansiones`, `descripcion`, `imagen`) VALUES
(1, 'Sushi Go Party', 'Phil Walker-Harding', 2016, 8, 2, 20, 'Gastronómica', 2, 2, 3, 4, 'Diana', 0, '16 Candies', NULL, 'Escoge tu propio menú entre 20 exquisitos platos y, después, intenta ganar el mayor número de puntos posible combinando las mejores cartas.', 'shusi_go_party.jpeg'),
(2, 'Código Secreto: Dúo', 'Tomáš Kučerovský', 2018, 6, 2, 30, 'Espías', 4, 2, 2, 2, 'Edu', 0, NULL, NULL, 'Intercambia pistas codificadas de una palabra con tu compañero, tratando de identificar tarjetas de palabras específicas.', 'cod_secre_duo.jpg'),
(3, 'Código Secreto', 'Vlaada Chvátil', 2015, 8, 2, 20, 'Espías', 3, 2, 2, 1, 'Edu', 0, NULL, NULL, 'Dale a tu equipo pistas inteligentes de una sola palabra para ayudarles a detectar a sus agentes en el campo.', 'cod_secr.jpeg'),
(4, 'Cultivate', 'Danny Kvale', 2021, 5, 2, 40, 'Sectas', 3, 4, 3, 4, 'Diana', 0, NULL, NULL, '¡Compite como líder de una secta satírica para reclutar seguidores y cumplir tu malvado plan!', 'cultivate.jpg'),
(5, 'Zombicide', 'Eric Nouhaut', 2012, 6, 1, 60, 'Zombis', 4, 5, 3, 4, 'Edu', 0, 'Sushi Go Party', NULL, '¡Trabajad juntos para matar zombies! ¡Mejorar habilidades! ¡Entonces mata más zombies!', 'zombicide.jpg'),
(6, 'Tiro al pato', 'Randy Martinez', 2005, 6, 3, 20, 'Ferias', 1, 1, 3, 2, 'Edu', 0, NULL, NULL, 'Dispara a tus patos oponentes, trata de no disparar el tuyo.', 'tiro_al_pato.jpg'),
(7, 'Ubongo 3d ', 'Egmont Polska', 2019, 4, 1, 25, 'Puzzles', 4, 1, 1, 5, 'Edu', 0, NULL, NULL, ' ¡demostrad de qué sois capaces! Coged vuestras piezas y vuestros tableros e intentad resolverlos antes que los demás jugadores para conseguir la mejor puntuación.', 'ubongo.jpg'),
(8, 'Gran Hotel Austria', 'Klemens Franz', 2015, 4, 2, 60, 'Hoteles', 4, 5, 3, 5, 'Edu', 0, 'Sushi Go Party', NULL, 'Atiende a los huéspedes y prepara las habitaciones para ser el mejor hotelero de la era moderna vienesa.', 'austria.jpg'),
(9, 'First Class ', 'Michael Menzel', 2016, 4, 2, 60, 'Trenes', 4, 5, 2, 5, 'Edu', 0, 'Sushi Go Party', NULL, '¡Los jugadores seleccionan para gestionar la línea ferroviaria más lujosa y resolver asesinatos!', 'primera.webp'),
(10, 'Clank!', 'Rayph Beisnerr', 2016, 4, 2, 50, 'Mazmorras', 3, 4, 4, 4, 'Edu', 0, NULL, NULL, 'Reclama tus tesoros pero no atraigas al dragón en esta carrera de mazmorras de construcción de mazos.', 'clank.jpg'),
(11, 'Azul', 'Philippe Guérin', 2017, 4, 2, 30, 'Azulejos', 2, 3, 3, 4, 'Diana', 0, NULL, NULL, 'Embellece ingeniosamente las paredes de tu palacio dibujando los azulejos más bellos.', 'azul.jpg'),
(12, 'Bohnanza', 'Uwe Rosenberg', 1997, 7, 2, 45, 'Judías', 2, 2, 3, 3, 'Edu', 0, NULL, NULL, 'Cultiva frijoles, cosecha cultivos y comercia para conseguir fortuna en este clásico juego de cartas.', 'bohnanza.jpg'),
(13, 'Dominion', 'Donald X. Vaccarino', 2008, 4, 2, 30, 'Medieval', 2, 4, 3, 5, 'Edu', 0, NULL, '[Dominion Intriga, Dominion Prosperidad, Dominion Alquimia, Domion Edad Oscura, Dominion Cornucipia, Dominion Comarcas, Dominion Terramar]', 'Adquiere las tierras más valiosas construyendo tu mazo con cartas de tesoro y poder.', 'dominion.webp'),
(14, 'Dominion Intriga', 'Donald X. Vaccarino', 2009, 6, 2, 30, 'Medieval', 2, 3, 3, 5, 'Edu', 1, 'Dominion', NULL, 'Enlist torturers, swindlers, and saboteurs to gain wealth and dominate the kingdom. ', 'intriga.jpg'),
(15, 'Dominion Prosperidad', 'Donald X. Vaccarino', 2010, 4, 2, 25, 'Medieval', 3, 3, 3, 5, 'Edu', 1, 'Dominion', NULL, 'Diviértete más con más fondos en esta expansión de Dominion que tiene que ver con el dinero.', 'prospe.jpg'),
(16, 'Dominion Alquimia', 'Donald X. Vaccarino', 2010, 4, 2, 25, 'Medieval', 2, 3, 3, 5, 'Edu', 1, 'Dominion', NULL, 'Usa pociones para adquirir curiosidades raras que impulsarán tu cadena de acción.', 'alquimia.jpg'),
(17, 'Domnion Edad Oscura', 'Donald X. Vaccarino', 2012, 4, 2, 30, 'Medieval', 4, 4, 3, 5, 'Edu', 1, 'Dominion', NULL, 'Supere los tiempos difíciles con sinergias relacionadas con la basura.', 'edad.jpg'),
(18, 'Dominion Cornucipia', 'Donald X. Vaccarino', 2011, 4, 2, 30, 'Medieval', 3, 3, 3, 5, 'Edu', 1, 'Dominion', NULL, 'Coseche la cosecha y diversifique su mazo con una gran cantidad de cartas.', 'cornu.webp'),
(19, 'Dominion Comarcas', 'Donald X. Vaccarino', 2011, 4, 2, 30, 'Medieval', 3, 3, 3, 5, 'Edu', 1, 'Dominion', NULL, 'Explora tierras lejanas y encuentra formas de mantener tu gran mazo poderoso.', 'comarcas.jpg'),
(20, 'Dominion Terramar', 'Donald X. Vaccarino', 2009, 4, 2, 30, 'Medieval', 3, 3, 3, 5, 'Edu', 1, 'Dominion', NULL, 'Prepare su próximo turno zarpando.', 'terra.jpg'),
(21, 'Jungle Speed', 'Franz Vohwinkel', 1997, 10, 2, 10, 'Agilidad Visual', 1, 1, 2, 5, 'Edu', 0, NULL, NULL, '', 'jun.jpg'),
(22, 'Roborally', 'Richard Garfield', 1994, 8, 2, 60, 'Robots', 3, 4, 3, 5, 'Edu', 0, NULL, '[RoboRally: Crash and Burn, Roborally: Armed and Dangerous, Roborrally: Grand Prix, Roborrally: King of the Hill]', 'Utilice tarjetas de movimiento preprogramadas para hacer correr a su robot por una fábrica peligrosa.', 'robo.webp'),
(23, 'Mag Blast', 'Christian T. Petersen', 2006, 8, 2, 20, 'Naves espaciales', 1, 3, 3, 4, 'Edu', 0, NULL, NULL, 'En Mag Blast te conviertes en un almirante supremo encargado de construir, flotas, cruceros y acorazados para convertir a sus enemigos en ¡polvo espacial!', 'mag.jpg'),
(24, 'Fantasma Blitz', 'Jacques Zeimet', 2010, 8, 2, 15, 'Agilidad visual', 2, 1, 1, 5, 'Diana', 0, NULL, NULL, 'Identifique y agarre rápidamente el objeto correcto en un sótano abarrotado y espeluznante.', 'blitz.jpg'),
(25, 'RoboRally: Crash and Burn', 'Richard Garfield', 1997, 8, 2, 90, 'Robots', 3, 3, 3, 5, 'Edu', 1, 'Roborally', NULL, 'Más caos con estos nuevos planos de planta.', 'crash.webp'),
(26, 'Roborally: Armed and Dangerous', 'Richard Garfield', 1995, 8, 2, 90, 'Robots', 3, 3, 3, 5, 'Edu', 1, 'Roborally', NULL, '\"RoboRally: Armed and Dangerous\" es la expansión más grande para el juego de mesa ganador del premio Wizard of the Coast: \"RoboRally\". Presenta seis nuevos tableros (tantos como el juego base) y viene con veintiséis nuevas cartas de opción así como marcadores para llevar registro de los efectos de las nuevas cartas de opciones.', 'armed.webp'),
(27, 'Roborrally: Grand Prix', 'Richard Garfield', 1997, 8, 2, 120, 'Robots', 3, 3, 3, 5, 'Edu', 1, 'Roborally', NULL, '', 'prix.jpg'),
(28, 'Roborrally: King of the Hill', 'Richard Garfield', 1999, 8, 2, 60, 'Robots', 3, 3, 3, 5, 'Edu', 1, 'Roborally', NULL, 'Corre hacia la cima de esta montaña de trampas y caos.', 'hill.webp'),
(29, 'Calisto', 'Reiner Knizia', 2009, 4, 2, 20, 'Puzzles', 2, 3, 1, 5, 'Diana', 0, NULL, NULL, '', 'calisto.jpg'),
(30, 'Dungeons & Dragons: The Yawning Portal', 'Kristian Karlberg', 2023, 4, 1, 35, 'Dungeon & Dragons', 3, 4, 3, 5, 'Diana', 0, ' Dungeons & Dragons: The Yawning Portal', NULL, 'Sirve comida y bebida a aventureros hambrientos que buscan un respiro entre sus misiones.', 'portal.jpeg'),
(31, 'Hive', 'John Yianni', 2001, 2, 2, 20, 'Animales', 2, 4, 1, 5, 'Diana', 0, NULL, '[Hive: La Oruga, Hive: El Mosquito, Hive: La Mariquita]', 'Usa tus insectos para atrapar a la abeja reina de tu oponente en este juego abstracto sin tablero.', 'hive.jpg'),
(32, 'Hive: La Oruga', 'John Yianni', 2013, 2, 2, 20, 'Animales', 2, 4, 1, 5, 'Diana', 1, 'Hive', NULL, '', 'oru.jpeg'),
(33, 'Hive: El Mosquito', 'John Yianni', 2007, 2, 2, 20, 'Animales', 2, 4, 1, 5, 'Diana', 1, 'Hive', NULL, 'Utilice el mosquito para tomar la capacidad de movimiento de cualquier insecto que esté tocando.', 'mosqui.jpge'),
(34, 'Hive: La Mariquita', 'John Yianni', 2010, 2, 2, 20, 'Animales', 2, 4, 1, 5, 'Diana', 1, 'Hive', NULL, 'Agrega la mariquita a tu colmena y úsala para moverte hacia arriba y sobre otros insectos.', 'mari.jpg'),
(35, 'Hanabi', 'Antonie Bauza', 2010, 5, 2, 35, 'Cooperativo Fuegos artificiales', 3, 2, 2, 5, 'Edu', 0, NULL, NULL, 'Todos pueden ver tus cartas menos tú. ¿Pueden sus pistas ayudarte a descubrir qué jugar?', 'hana.jpg'),
(36, 'Justas', 'Iván Rial', 2022, 7, 2, 30, 'Medieval', 1, 1, 3, 3, 'Edu', 0, 'Azul', NULL, 'Los caballeros se enfrentan en duelo para alzarse como campeones del torneo de justas.', 'justas.webp'),
(37, 'Codex Naturails', 'Thomas Dupont', 2021, 4, 1, 25, 'Medieval', 2, 4, 2, 5, 'Edu', 0, NULL, NULL, 'Compile un manuscrito de páginas superpuestas que revelen plantas, animales y hongos.', 'codex.jpg'),
(38, 'Chartae', 'Reiner Knizia', 2019, 2, 2, 10, 'Mapas', 2, 3, 1, 5, 'Diana', 0, NULL, NULL, 'Un haiku gaming de estrategia y cartografía.', 'chartae.jpeg'),
(39, 'Dobble Connect', 'Mathieu Aubert', 2023, 8, 2, 10, 'Agilidad visual', 3, 1, 1, 5, 'Diana', 0, NULL, NULL, 'Los equipos detectan el símbolo correspondiente y alinean sus cartas en este frenético juego de fiesta.', 'dobbleconnect.webp'),
(40, 'The Island', 'Julian Courtland-Smith', 2010, 4, 2, 40, 'Islas', 2, 2, 3, 5, 'Diana', 0, NULL, NULL, 'The Island es un juego de mesa, donde dirigirás a un grupo de exploradores en una isla llena de peligros y tesoros.\nOtros grupos de exploradores también querrán salir de la isla en las barcas, así que habrá que estar alerta en cada turno y no perder de vista a nadie.', 'isl.jpg'),
(41, 'Ordered Witch', 'Iván Losada Pinedo', 2021, 5, 2, 15, 'Brujas', 1, 1, 3, 3, 'Diana', 0, NULL, NULL, '', 'wit.jpeg'),
(42, 'Sherlock Express', 'Henri Kermarrec', 2019, 6, 2, 10, 'Agilidad Visual', 2, 1, 1, 5, 'Diana', 0, NULL, NULL, '', 'sherl.jpeg'),
(43, 'Ubongo Extreme: Fun-Size Edition', 'Grzegorz Rejchtman', 2009, 4, 1, 20, 'Puzzles', 2, 1, 1, 5, 'Diana', 0, NULL, NULL, '', 'extrem.jpg'),
(44, 'Ubongo Mini', 'Grzegorz Rejchtman', 2007, 4, 1, 10, 'Puzzles', 1, 1, 1, 3, 'Diana', 0, NULL, NULL, 'Corre para llenar la forma del objetivo usando un conjunto de poliominós antes que tus oponentes.', 'mini.webp'),
(45, 'It s a Wonderful World', 'Frédéric Guérard', 2019, 5, 1, 45, 'Civilizaciones', 3, 4, 2, 5, 'Edu', 0, NULL, '[It s a Wonderful World: Ocio y Decadencia, It s a Wonderful World: Auge y Corrupción]', 'Redacte usted mismo la distopía \"perfecta\", complete proyectos y produzca recursos.', 'world.jpg'),
(46, 'It s a Wonderful World: Ocio y Decadencia', 'Frédéric Guérard', 2020, 5, 1, 60, 'Civilizaciones', 3, 4, 2, 5, 'Edu', 1, 'It s a Wonderful World', NULL, 'Una campaña multijuego para It\'s A Wonderful World', 'deca.jpeg'),
(47, 'It s a Wonderful World: Auge y Corrupción', 'Frédéric Guérard', 2020, 7, 1, 45, 'Civilizaciones', 3, 4, 2, 5, 'Diana', 1, 'It s a Wonderful World', NULL, 'Las nuevas cartas ofrecen nuevas formas de jugar y permiten jugar hasta 7 personas a la vez.', 'auge.jpg'),
(48, 'Fuzztoons', 'Patrick Frish', 2005, 8, 1, 60, 'Dungeon & Dragons', 2, 3, 4, 3, 'Edu', 0, NULL, NULL, '', 'fuzz.jpeg'),
(49, 'Virus', 'Domingo Cabrero', 2015, 6, 2, 20, 'Enfermedades', 1, 1, 4, 2, 'Edu', 0, NULL, NULL, 'Mantén tu cuerpo a salvo de virus mientras infectas a tus rivales.', 'virus.jpg'),
(50, 'Sirens', 'Art Casey', 2024, 2, 1, 15, 'Épico', 2, 3, 3, 3, 'Diana', 0, NULL, NULL, '¡Las sirenas opuestas trabajan entre sí para atraer a los marineros a su lado de la cala!', 'siren.png'),
(51, '16 Candies', 'Dickie Chapin', 2024, 4, 2, 15, 'Caramelos', 1, 2, 3, 3, 'Diana', 0, NULL, NULL, '¡Los jugadores compiten para proteger su suministro de dulces! ¡Perder nunca supo tan bien!', 'candies.webp'),
(52, '7 Wonders', 'Antoine Bauza', 2010, 7, 2, 35, 'Civilizaciones', 3, 4, 3, 4, 'Edu', 0, NULL, NULL, 'Selecciona cartas para desarrollar tu antigua civilización y construir su Maravilla del Mundo.', '7_wonders.jpg'),
(53, 'Puerto Rico', 'Andreas Seyfart', 2011, 5, 2, 120, 'Civilizaciones', 4, 4, 3, 5, 'Edu', 0, NULL, NULL, 'Envía mercancías, construye edificios y elige roles que te beneficien más que a otros.', 'rico.jpg'),
(54, 'Party & Co: Extreme 3.0', 'Diset S.A.', 2005, 4, 2, 60, 'Familiar', 1, 1, 1, 1, 'Edu', 0, NULL, NULL, '', 'party.jpg'),
(55, 'Sushi Go!', 'Phil Walker-Harding', 2013, 5, 2, 20, 'Gastronómica', 2, 3, 3, 3, 'Edu', 0, NULL, NULL, 'Pase el sushi, pero quédese con lo mejor. ¡Ahorra espacio para el postre!', 'sus.jpg'),
(56, 'Tantrix', 'Mike McManaway', 1991, 6, 1, 30, 'Puzzles', 2, 2, 2, 5, 'Diana', 0, NULL, NULL, 'Juego abstracto versátil con más de 40 desafíos para mantener tu cerebro activo.', 'tant.jpeg'),
(57, 'Iso', 'David Heras Pino', 2023, 3, 1, 5, 'Puzzles', 3, 2, 1, 5, 'Diana', 0, NULL, NULL, 'Adáptate a la vista isométrica y lleva tu visión espacial al siguiente nivel.', 'iso.jpg'),
(58, 'Defrag', 'Brandon McCool', 2024, 2, 1, 20, 'Ordenadores', 2, 3, 3, 4, 'Diana', 0, NULL, NULL, '¡Es el año 1995 y es hora de desfragmentar tu computadora resolviendo un rompecabezas estilo cuadrícula!', 'defrag.jpg'),
(59, 'Carcassone', 'Klaus-Jürgen Wrede', 2000, 5, 2, 30, 'Medieval', 2, 5, 4, 5, 'Edu', 0, NULL, '[Carcassone: Posadas y Catedrales, Carcassone: Comerciantes y Constructores, Carcassone: La Princesa y el Dragón, Carcassone: El Río, Carcassone: La Torre, Carcassone: El Alcalde y la Abadía, Carcassone: Mercados y Puentes, Carcassone: Colinas y Ovejas, Carcassone: El Fantasma, Carcassone: Máquinas Voladoras, Carcassone: Despachos, Carcassone: Transbordadores, Carcassone: Minas de Oro, Carcassone_: Mago y Bruja, Carcassone: Ladrones, Carcassone: Círculos de Cultivo, Carcassone: El Circo, Carcassone: Niebla, Carcassone: Los Puentes Levadizos, Carcassone: Las Revueltas Campesinas, Carcassone: Los Peajes, Carcassone: Las Casas de Baños, Carcassone: Árboles Frutales, Carcassone: Las Atalayas, Carcassone: Las Catedrales Alemanas, Carcassone: Castillos en Alemania, Carcassone: El Laberinto, Carcassone: Mitad y Mitad, Carcassone: Monasterios Alemanes, Carcassone: El Colegio, Carcassone: La Fiesta, Carcassone: El Tunel, Carcassone: El Rey, el Ladrón y eñ Culto, Carcassone: Los pescadores]', 'Da forma al paisaje medieval de Francia, conquistando ciudades, monasterios y granjas.', 'carcassone.jpg'),
(60, 'Carcassone: Posadas y Catedrales', 'Klaus-Jürgen Wrede', 2002, 6, 2, 50, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, 'Construye posadas y catedrales para aumentar el valor de tus carreteras y ciudades.', 'posadas.jpg'),
(61, 'Carcassone: Comerciantes y Constructorees', 'Klaus-Jürgen Wrede', 2003, 6, 2, 50, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, 'Acapare el mercado de bienes valiosos y utilice constructores expertos para acelerar sus proyectos.', 'comerciantes.jpeg'),
(62, 'Carcassone: La Princesa y el Dragón', 'Klaus-Jürgen Wrede', 2005, 6, 2, 55, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, 'Usa el dragón, la princesa y el hada a tu favor para hacerte con el control de Carcassonne.', 'princesa.webp'),
(63, 'Carcassone: El Río', 'Klaus-Jürgen Wrede', 2001, 6, 2, 30, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, 'Una forma diferente de empezar Carcassonne con un río que divide el paisaje.', 'rio.jpg'),
(64, 'Carcassone: La Torre', 'Klaus-Jürgen Wrede', 2006, 6, 2, 40, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, 'Levanta torres para capturar a los meeples de tu oponente.', 'torre.jpg'),
(65, 'Carcassone: El Alcalde y la Abadía', 'Klaus-Jürgen Wrede', 2007, 6, 2, 30, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '¡Los alcaldes pondrán las ciudades bajo tu control! ¡Las abadías completarán tus planes!', 'alcalde.png'),
(66, 'Carcassone: Mercados y Puentes', 'Klaus-Jürgen Wrede', 2010, 6, 2, 35, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '¡Construye puentes, construye castillos para desafiar a tus rivales y regatea en el bazar!', 'mercados.jpeg'),
(67, 'Carcassone: Colinas y Ovejas', 'Klaus-Jürgen Wrede', 2014, 6, 2, 35, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'ovejas.jpeg'),
(68, 'Carcassone: El Fantasma', 'Klaus-Jürgen Wrede', 2014, 6, 2, 30, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'fantasma.jpg'),
(69, 'Carcassone: Máquinas Voladoras', 'Klaus-Jürgen Wrede', 2012, 6, 2, 35, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'voladoras.webp'),
(70, 'Carcassone: Despachos', 'Klaus-Jürgen Wrede', 2012, 6, 2, 30, 'Medieval', 2, 3, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'despachos.jpg'),
(71, 'Carcassone: Transbordadores', 'Klaus-Jürgen Wrede', 2012, 6, 2, 30, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'transbord.jpg'),
(72, 'Carcassone: Minas de Oro', 'Klaus-Jürgen Wrede', 2012, 6, 2, 30, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'minas.jpg'),
(73, 'Carcassone: Mago y Bruja', 'Klaus-Jürgen Wrede', 2012, 6, 2, 30, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'bruja.jpg'),
(74, 'Carcassone: Ladrones', 'Klaus-Jürgen Wrede', 2012, 6, 2, 30, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'ladrones.jpg'),
(75, 'Carcassone: Círculos de Cultivo', 'Klaus-Jürgen Wrede', 2012, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'cultivo.jpg'),
(76, 'Carcassone: El Circo', 'Klaus-Jürgen Wrede', 2017, 6, 2, 45, 'Medieval', 2, 4, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'circo.jpg'),
(77, 'Carcassone: Niebla', 'Klaus-Jürgen Wrede', 2022, 5, 2, 25, 'Medieval', 3, 5, 3, 5, 'Diana', 1, 'Carcassone', NULL, 'Coloca las baldosas con cuidado en Carcasona para mantener a raya a los fantasmas.', 'niebla.jpeg'),
(78, 'Carcassone: Los Puentes Levadizos', 'Klaus-Jürgen Wrede', 2023, 6, 2, 35, 'Medieval', 3, 4, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'levadizos.jpg'),
(79, 'Carcassone: Las Revueltas Campesinas', 'Klaus-Jürgen Wrede', 2020, 6, 2, 35, 'Medieval', 3, 4, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'revueltas.jpg'),
(80, 'Carcassone: Los Peajes', 'Klaus-Jürgen Wrede', 2019, 6, 2, 35, 'Medieval', 2, 3, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'peajes.jpg'),
(81, 'Carcassone: Las Casas de Baños', 'Klaus-Jürgen Wrede', 2018, 6, 2, 35, 'Medieval', 3, 5, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'baños.jpg'),
(82, 'Carcassone: Árboles Frutales', 'Klaus-Jürgen Wrede', 2018, 6, 2, 30, 'Medieval', 2, 5, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'frutales.jpg'),
(83, 'Carcassone: Las Atalayas', 'Klaus-Jürgen Wrede', 2016, 6, 2, 35, 'Medieval', 3, 5, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'atalayas.jpg'),
(84, 'Carcassone: Las Catedrales Alemanas', 'Klaus-Jürgen Wrede', 2016, 6, 2, 35, 'Medieval', 2, 4, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'catedrales.jpg'),
(85, 'Carcassone: Castillos en Alemania', 'Klaus-Jürgen Wrede', 2015, 6, 2, 30, 'Medieval', 2, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'castillos.jpg'),
(86, 'Carcassone: El Laberinto', 'Klaus-Jürgen Wrede', 2016, 6, 2, 30, 'Medieval', 2, 3, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'laberinto.jpg'),
(87, 'Carcassone: Mitad y Mitad', 'Klaus-Jürgen Wrede', 2014, 6, 2, 30, 'Medieval', 4, 5, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'mitad.jpg'),
(88, 'Carcassone: Monasterios Alemanes', 'Klaus-Jürgen Wrede', 2014, 6, 2, 30, 'Medieval', 2, 5, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'monasterios.jpg'),
(89, 'Carcassone: El Colegio', 'Klaus-Jürgen Wrede', 2011, 6, 2, 25, 'Medieval', 2, 3, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'cole.jpg'),
(90, 'Carcassone: La Fiesta', 'Klaus-Jürgen Wrede', 2018, 6, 2, 30, 'Medieval', 2, 4, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'fiesta.jpg'),
(91, 'Carcassone: El Tunel', 'Klaus-Jürgen Wrede', 2009, 6, 2, 30, 'Medieval', 2, 5, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'tunel.jpg'),
(92, 'Carcassone: El Rey, el Ladrón y eñ Culto', 'Klaus-Jürgen Wrede', 2013, 6, 2, 30, 'Medieval', 2, 4, 3, 5, 'Edu', 1, 'Carcassone', NULL, '', 'rey.webp'),
(93, 'Carcassone 20th Aniversario', 'Klaus-Jürgen Wrede', 2021, 6, 2, 40, 'Medieval', 2, 4, 3, 5, 'Edu', 0, NULL, NULL, '', 'carcassone20.jpg'),
(94, 'Carcassone: Los pescadores', 'Eduardo Lucas y Diana García', 2023, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'shusi_go_party.jpeg'),
(95, 'Carcassone: El Patíbulo', 'Eduarrdo Lucas', 2023, 6, 2, 30, 'Medieval', 1, 1, 5, 5, 'Edu', 1, 'Carcassone', NULL, '', 'shusi_go_party.jpeg'),
(96, 'Carcassone: Los Asaltadores de Caminos', 'Eduarrdo Lucas y Diana García', 2023, 6, 2, 30, 'Medieval', 1, 1, 5, 5, 'Edu', 1, 'Carcassone', NULL, '', 'shusi_go_party.jpeg'),
(97, 'Carcassone: Los Inventores', 'Eduardo Lucas', 2023, 6, 2, 30, 'Medieval', 1, 2, 5, 5, 'Edu', 1, 'Carcassone', NULL, '', 'shusi_go_party.jpeg'),
(98, 'Carcassone: Spiel', 'Eduardo Lucas', 2023, 6, 2, 30, 'Medieval', 1, 2, 5, 5, 'Edu', 1, 'Carcassone', NULL, '', 'shusi_go_party.jpeg'),
(99, 'Carcassone: La Peste', 'Klaus-Jürgen Wrede', 2010, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'peste.jpg'),
(100, 'Carcassone: El Asedio', 'Klaus-Jürgen Wrede', 2014, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'ased.jpg'),
(101, 'Carcassone: Los Mercados de Leipzig', 'Klaus-Jürgen Wrede', 2017, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'leip.png'),
(102, 'Carcassone: Las señales', 'Klaus-Jürgen Wrede', 2021, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'senales.jpeg'),
(103, 'Carcassone: Pequeños Edificios', 'Klaus-Jürgen Wrede', 2012, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'shusi_go_party.jpeg'),
(104, 'Carcassone: Los Agrimensores', 'Klaus-Jürgen Wrede', 2020, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'agri.jpeg'),
(105, 'Carcassone: Las Apuestas', 'Klaus-Jürgen Wrede', 2022, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'apuestas.jpg'),
(106, 'Carcassone: Monasterios Japoneses', 'Klaus-Jürgen Wrede', 2015, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'japoneses.jpg'),
(107, 'Carcassone: Las Maravillas de la Humanidad', 'Klaus-Jürgen Wrede', 2023, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'mara.webp'),
(108, 'Carcassone: Los Círculos Prohibidos', 'Klaus-Jürgen Wrede', 2023, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'shusi_go_party.jpeg'),
(109, 'Carcassone: La Primavera', 'Klaus-Jürgen Wrede', 2024, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'prima.webp'),
(110, 'Carcassone: Las Torres de Vigilancia', 'Klaus-Jürgen Wrede', 2024, 6, 2, 30, 'Medieval', 3, 4, 4, 5, 'Edu', 1, 'Carcassone', NULL, '', 'vigila.webp'),
(130, 'Trio', 'Kaya Miyano', 2021, 6, 3, 15, 'Números', 2, 2, 4, 4, 'Diana', 0, NULL, NULL, 'Revela la carta más baja o más alta de cualquier persona y continúa hasta que haya tres iguales.\r\n', 'trio.jpg'),
(131, 'Alta Tension', 'Friedemann Friese', 2004, 6, 2, 120, 'Electricidad', 3, 4, 2, 5, 'Diana', 0, NULL, NULL, 'Oferta, establezca contactos y administre recursos en una carrera para abastecer de energía a la mayor cantidad de ciudades.\r\n', 'tension.jpg'),
(132, 'Turing Machine', 'Fabien Gridel', 2022, 4, 1, 20, 'Acertijos', 4, 2, 1, 5, 'Diana', 0, NULL, NULL, 'Descifra algoritmos como una verdadera computadora', 'turing.jpeg'),
(133, 'Fire Tower', 'Samuel Bryant', 2019, 4, 2, 30, 'Incendios', 2, 3, 5, 2, 'Diana', 0, NULL, NULL, 'Manipula un incendio forestal devastador para quemar las torres de bomberos rivales antes de que te atrapen.\r\n', 'fire.jpg'),
(134, 'Mision Cumplida', 'Ken Gruhl', 2018, 4, 1, 20, 'Cooperativo', 3, 2, 3, 5, 'Diana', 0, NULL, NULL, 'Colabora con tus compañeros para conseguir el máximo de misiones posibles', 'cumplida.jpeg'),
(135, 'Misión Rescate', 'Moured Khiar', 2020, 6, 1, 10, 'Cooperativo', 3, 1, 2, 5, 'Diana', 0, NULL, NULL, 'La base espacial está en peligro y todos debéis trabajar juntos para salvarla.\r\n', 'resca.jpeg'),
(136, 'Saboteur', 'Fréderic Moyersoen', 2004, 10, 3, 30, 'Escapar primerp', 1, 1, 1, 1, 'Diana', 0, NULL, '[Saboteur 2]', 'Sois enanos colocando cartas de túnel para conseguir oro: pero ¿quién de vosotros es el traidor?\r\n', 'saboteur.jpg'),
(137, 'Saboteur 2', 'Fréderic Moyersoen', 2011, 12, 2, 45, 'Escapar primerp', 3, 2, 3, 4, 'Diana', 1, 'Saboteur', NULL, 'Amplía el juego base con asociaciones, nuevos roles, acciones y obstáculos en el mapa.\r\n', 'saboteur2.jpg'),
(138, 'The Night Cage', 'Christopher Ryan Chan', 2021, 5, 1, 60, 'Cooperativo', 3, 2, 3, 5, 'Diana', 0, NULL, '[The Night Cage: Shrieking Hollow]', 'Escapa de un laberinto que cambia cada vez que la luz desaparece.\r\n', 'cage.jpg'),
(139, 'The Night Cage: Shrieking Hollow', 'Christopher Ryan Chan', 2024, 5, 1, 60, 'Cooperativo', 3, 2, 3, 5, 'Diana', 1, 'The Night Cage', NULL, 'Contén un horror indescriptible con solo la luz de una vela.\r\n', 'cage_2.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Juegos`
--
ALTER TABLE `Juegos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Juegos`
--
ALTER TABLE `Juegos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
