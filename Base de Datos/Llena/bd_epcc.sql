-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2018 a las 03:41:40
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_epcc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_curso`
--

CREATE TABLE `alumno_curso` (
  `alumno_curso_id` int(11) NOT NULL,
  `alumno_cursoc_alumno_id` int(11) NOT NULL,
  `alumno_curso_curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_docente`
--

CREATE TABLE `comentarios_docente` (
  `comentarios_docente_id` int(11) NOT NULL,
  `comentarios_docente_docente_id` int(11) NOT NULL,
  `comentarios_docente_alumno_id` int(11) NOT NULL,
  `comentarios_docente_comentario` longtext NOT NULL,
  `comentarios_docente_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `curso_id` int(11) NOT NULL,
  `curso_codigo` varchar(10) NOT NULL,
  `curso_descripcion` varchar(50) NOT NULL,
  `curso_malla_id` int(11) NOT NULL,
  `curso_equivalencia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`curso_id`, `curso_codigo`, `curso_descripcion`, `curso_malla_id`, `curso_equivalencia_id`) VALUES
(1, '2012SS', 'SISTEMAS DE SEGURIDAD', 1, 0),
(2, '2015SCC', 'SISTEMAS DE SEGURIDAD CRITICA', 1, 0),
(3, '2015GES', 'GESTION DE EMPRENDIMIENTO DE SOFTWARE', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_curso`
--

CREATE TABLE `docente_curso` (
  `docente_curso_id` int(11) NOT NULL,
  `docente_curso_docente_id` int(11) NOT NULL,
  `docente_curso_curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `libro_id` int(11) NOT NULL,
  `libro_codigo` varchar(20) DEFAULT NULL,
  `libro_nombre` varchar(80) NOT NULL,
  `libro_autor` varchar(50) NOT NULL,
  `libro_tipo` int(11) NOT NULL,
  `libro_pdf` longblob,
  `libro_enlace` varchar(100) DEFAULT NULL,
  `libro_estado` int(11) DEFAULT NULL,
  `libro_cantidad_disponible` int(11) DEFAULT NULL,
  `libro_cantidad` int(11) DEFAULT NULL,
  `libro_anio` varchar(20) NOT NULL,
  `libro_editorial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`libro_id`, `libro_codigo`, `libro_nombre`, `libro_autor`, `libro_tipo`, `libro_pdf`, `libro_enlace`, `libro_estado`, `libro_cantidad_disponible`, `libro_cantidad`, `libro_anio`, `libro_editorial`) VALUES
(2, '978-84-9964-759-3', 'MICROSERVICIOS UN ENFOQUE INTEGRADO', 'TORRES BOSCH VICTORIA', 1, '', 'http://www.ra-ma.es/libros/MICROSERVICIOS-UN-ENFOQUE-INTEGRADO/99624/978-84-9964-765-4', 0, 23, 0, '2018', 'RAMA EDITORIAL'),
(3, '978-84-9964-765-4', 'MANTENIMIENTO Y EVOLUCIÃ“N DE SISTEMAS DE INFORMACIÃ“N', 'PIATTINI VELTHUIS MARIO G', 1, '', 'http://www.ra-ma.es/libros/MICROSERVICIOS-UN-ENFOQUE-INTEGRADO/99624/978-84-9964-765-4', 0, 24, 0, '2018', 'RAMA EDITORIAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `malla_curricular`
--

CREATE TABLE `malla_curricular` (
  `malla_curricular_id` int(11) NOT NULL,
  `malla_curricular_dsc` varchar(10) NOT NULL,
  `malla_curricular_anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `malla_curricular`
--

INSERT INTO `malla_curricular` (`malla_curricular_id`, `malla_curricular_dsc`, `malla_curricular_anio`) VALUES
(1, 'ehdc2004', 2004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_promedio`
--

CREATE TABLE `nota_promedio` (
  `nota_promedio_id` int(11) NOT NULL,
  `nota_promedio_alumno_id` int(11) NOT NULL,
  `nota_promedio_semestre` varchar(20) NOT NULL,
  `nota_promedio_nota` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `persona_id` int(11) NOT NULL,
  `persona_nombres` varchar(45) NOT NULL,
  `persona_apellido1` varchar(45) NOT NULL,
  `persona_apellido2` varchar(45) NOT NULL,
  `persona_tipo_id` int(11) NOT NULL,
  `persona_dni` varchar(12) DEFAULT NULL,
  `persona_cui` varchar(10) DEFAULT NULL,
  `persona_direccion` varchar(50) DEFAULT NULL,
  `persona_email` varchar(50) DEFAULT NULL,
  `persona_telefono` varchar(12) DEFAULT NULL,
  `persona_malla` int(11) DEFAULT NULL,
  `persona_seccion` varchar(10) DEFAULT NULL,
  `persona_estado` int(11) NOT NULL,
  `persona_prestamo` int(11) NOT NULL,
  `persona_prestamo_total` int(11) DEFAULT '0',
  `persona_prestamo_deuda` int(11) DEFAULT '0',
  `persona_colaborador` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`persona_id`, `persona_nombres`, `persona_apellido1`, `persona_apellido2`, `persona_tipo_id`, `persona_dni`, `persona_cui`, `persona_direccion`, `persona_email`, `persona_telefono`, `persona_malla`, `persona_seccion`, `persona_estado`, `persona_prestamo`, `persona_prestamo_total`, `persona_prestamo_deuda`, `persona_colaborador`) VALUES
(19990724, 'CHAVEZ/PEDRAZA, GUSTAVO HERNAN', '', '', 2, NULL, '19990724', NULL, 'gchavezpe@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20023443, 'ARENAS/LAJO, JOSE ALONSO', '', '', 2, NULL, '20023443', NULL, 'jarenasl@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20043566, 'CCALLO/QUISPE, SONIA FATIMA', '', '', 2, NULL, '20043566', NULL, 'sccalloq@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20051144, 'CALLA/HUANCA, LUIS GIANCARLO', '', '', 2, NULL, '20051144', NULL, 'lcalla@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20061390, 'ARCE/PAREDES, OMAR FELIX', '', '', 2, NULL, '20061390', NULL, 'oarce@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20073666, 'CAHUANA/CONDORI, DAVID DANIEL', '', '', 2, NULL, '20073666', NULL, 'dcahuanaco@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20081682, 'CHAVEZ/QUINTANILLA, DIRCEU ANDRES', '', '', 2, NULL, '20081682', NULL, 'dchavezq@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20082100, 'BARRIGA/SALAZAR, AUGUSTO MIGUEL', '', '', 2, NULL, '20082100', NULL, 'abarrigas@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20083432, 'ARROSQUIPA/QUISPE, WILBER HUMBERTO', '', '', 2, NULL, '20083432', NULL, 'warrosquipa@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20083439, 'CHAMBI/CHAMBI, JOSE ISAIAS', '', '', 2, NULL, '20083439', NULL, 'jchambicha@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20084684, 'ABARCA/ROJAS, RENATO JESUS', '', '', 2, NULL, '20084684', NULL, 'rabarcaro@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20084703, 'CANO/LAYME, JERIBAL EDSON', '', '', 2, NULL, '20084703', NULL, 'jcanola@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20091808, 'ALVAREZ/RAMOS, CAROLINA DEL ROSARIO', '', '', 2, NULL, '20091808', NULL, 'calvarezr@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20097030, 'CHAMBI/HUANCACHOQUE, CESAR EDGAR', '', '', 2, NULL, '20097030', NULL, 'cchambih@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20097677, 'ALVAREZ/CABANA, ISABEL MILAGROS', '', '', 2, NULL, '20097677', NULL, 'ialvarezc@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20097731, 'AQUEPUCHO/CRUZ, SOLEDAD', '', '', 2, NULL, '20097731', NULL, 'saquepuchoc@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20097753, 'ACOSTA/PERCA, SHARLY ERIKA', '', '', 2, NULL, '20097753', NULL, 'sacosta@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20097775, 'CHAVEZ/CONDORI, FLOR DE MARIA URPI', '', '', 2, NULL, '20097775', NULL, 'fchavezcon@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20097832, 'CASTILLO/OCHOCHOQUE, SONIA', '', '', 2, NULL, '20097832', NULL, 'scastilloo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20100052, 'ARELA/CHARAHUA, JUAN EDWIN', '', '', 2, NULL, '20100052', NULL, 'jarelac@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20100368, 'CANAHUIRE/HINOJOSA, EDWIN CESAR', '', '', 2, NULL, '20100368', NULL, 'ecanahuire@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20101516, 'BARRIOS/LIPA, LUIS ANGEL', '', '', 2, NULL, '20101516', NULL, 'lbarriosl@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20101651, 'BEDREGAL/CACERES, JOSE FRANCISCO', '', '', 2, NULL, '20101651', NULL, 'jbedregalca@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20102506, 'AROCUTIPA/INCACUTIPA, YENY', '', '', 2, NULL, '20102506', NULL, 'yarocutipa@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20102578, 'CAHUAYA/DEL CASTILLO, CAROL MILENA', '', '', 2, NULL, '20102578', NULL, 'ccahuayad@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20102600, 'ARUCUTIPA/QUISPE, ALEX SEVERO', '', '', 2, NULL, '20102600', NULL, 'aarucutipa@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20102673, 'BENAVENTE/MOLLO, LUIS ENRIQUE', '', '', 2, NULL, '20102673', NULL, 'lbenaventemo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20103121, 'CACERES/SOLIS, JULIO CESAR', '', '', 2, NULL, '20103121', NULL, 'jcaceressol@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20103826, 'CARDENA/HUAMAN, ERIKA ELIZABETH', '', '', 2, NULL, '20103826', NULL, 'ecardenah@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20103984, 'CERVANTES/GUTIERREZ, LUIS CARLOS', '', '', 2, NULL, '20103984', NULL, 'lcervantesgu@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20104271, 'AGUILAR/MEDINA, ROCIO RAQUEL', '', '', 2, NULL, '20104271', NULL, 'raguilarme@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121439, 'APAZA/EVEDOS, JOSE LUIS', '', '', 2, NULL, '20121439', NULL, 'japazaev@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121696, 'ANCCO/HALANOCCA, CRISTHIAN LUIS', '', '', 2, NULL, '20121696', NULL, 'canccoh@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121712, 'BACA/CORNEJO, MICAELA ESTEFANIA', '', '', 2, NULL, '20121712', NULL, 'mbacaco@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121913, 'CALLI/MAMANI, LESTER ERICK', '', '', 2, NULL, '20121913', NULL, 'lcalli@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121930, 'AGUILAR/SANCHEZ, FREDDY EDUARDO', '', '', 2, NULL, '20121930', NULL, 'faguilarsa@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121945, 'ALCA/MACHACA, MARIA MERCEDES', '', '', 2, NULL, '20121945', NULL, 'malca@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121946, 'ALVAREZ/SULLCA, ELVIS FERNANDO', '', '', 2, NULL, '20121946', NULL, 'ealvarezs@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121948, 'CARCAMO/CASTANEDA, PAMELA ANGELICA', '', '', 2, NULL, '20121948', NULL, 'pcarcamo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121964, 'BENITO/VALERO, ANGEL IGNACIO', '', '', 2, NULL, '20121964', NULL, 'abenito@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121965, 'CAMA/PIZARRO, GRETHEL GUADALUPE', '', '', 2, NULL, '20121965', NULL, 'gcamapi@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20121985, 'AGUEDO/LAZO, DANIELA VICTORIA', '', '', 2, NULL, '20121985', NULL, 'daguedo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20122143, 'ANDIA/HUAYHUA, AYRTON FRANCO', '', '', 2, NULL, '20122143', NULL, 'aandiah@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20122889, 'CARRION/PACCO, VANESSA', '', '', 2, NULL, '20122889', NULL, 'vcarrion@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20123338, 'AUCATINCO/PINTO, MILUSKA VANESSA', '', '', 2, NULL, '20123338', NULL, 'maucatinco@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20123999, 'CAMPOS/FALCONI, VICTOR IGOR', '', '', 2, NULL, '20123999', NULL, 'vcamposf@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20124012, 'CAYO/QUISPE, MARITZA MARISELA', '', '', 2, NULL, '20124012', NULL, 'mcayoq@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20124013, 'BOBADILLA/LUQUE, DIANA', '', '', 2, NULL, '20124013', NULL, 'dbobadilla@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131601, 'CHAVEZ/PACHECO, JORGE ORLANDO', '', '', 2, NULL, '20131601', NULL, 'jchavezpa@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131706, 'CASTILLO/BARREDA, YONY JEANKARLO VLADIMIRO', '', '', 2, NULL, '20131706', NULL, 'ycastillo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131947, 'CALAPUJA/GUEVARA, ANGELA GIANINNA', '', '', 2, NULL, '20131947', NULL, 'acalapujag@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131955, 'BUTILER/VELASQUEZ, KRESSLY MAILYN', '', '', 2, NULL, '20131955', NULL, 'kbutiler@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131956, 'BOLANOS/BEGAZO, CONNIE MARIANA', '', '', 2, NULL, '20131956', NULL, 'cbolanosbe@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131959, 'CASTANEDA/TAIPE, PAMELA JUDITH', '', '', 2, NULL, '20131959', NULL, 'pcastanedat@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131978, 'BARRIGA/NEIRA, HECTOR EDUARDO', '', '', 2, NULL, '20131978', NULL, 'hbarrigan@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131980, 'ARCE/LEON, LAURIE ELIZABETH', '', '', 2, NULL, '20131980', NULL, 'larcele@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131986, 'CCAPA/AQUINO, DEBBY ALEJANDRA', '', '', 2, NULL, '20131986', NULL, 'dccapaa@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131993, 'CCARI/BUSTINZA, KELLY ALLISON', '', '', 2, NULL, '20131993', NULL, 'kccarib@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20131999, 'CHAVEZ/HUARILLOCLLA, MARIA LUISA', '', '', 2, NULL, '20131999', NULL, 'mchavezhuar@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20132016, 'ABARCA/CASTRO, ZULLY MARTHA', '', '', 2, NULL, '20132016', NULL, 'zabarca@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20132586, 'CARCAUSTO/GOMEZ, JORGE RONAL', '', '', 2, NULL, '20132586', NULL, 'jcarcaustogo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20132593, 'AGRAMONTE/APAZA, KATHERINE BLANCA', '', '', 2, NULL, '20132593', NULL, 'kagramonte@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20134012, 'ATENCIO/VILCARANA, DEYSY EDITH', '', '', 2, NULL, '20134012', NULL, 'datenciov@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20134015, 'CASTRO CUBA/CHECYA, KELY', '', '', 2, NULL, '20134015', NULL, 'kcastrocuba@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20134020, 'ALEJO/CHUQUITAYPE, MINERVA', '', '', 2, NULL, '20134020', NULL, 'malejoch@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20134031, 'APAZA/QUISPE, LAURA JIMENA', '', '', 2, NULL, '20134031', NULL, 'lapazaq@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20134039, 'ACHAHUI/TAYPE, CAROL GESSIRA', '', '', 2, NULL, '20134039', NULL, 'cachahui@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20140255, 'ALMIRON/RODRIGUEZ, JOSE ALBERTO', '', '', 2, NULL, '20140255', NULL, 'jalmironr@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141213, 'BAUTISTA/CARRASCO, YONATHAN ESTEFAN', '', '', 2, NULL, '20141213', NULL, 'ybautista@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141942, 'CASTRO/CORIMAYA, LAURA HILDA IRIS', '', '', 2, NULL, '20141942', NULL, 'lcastro@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141952, 'ALARCON/AGUERO, MELANIE DEL PILAR', '', '', 2, NULL, '20141952', NULL, 'malarcon@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141956, 'CALIZAYA/ORTIZ, STEPHANY NAZAYDA', '', '', 2, NULL, '20141956', NULL, 'scalizayao@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141964, 'CCAMA/VARGAS, JUAN ALBERTO', '', '', 2, NULL, '20141964', NULL, 'jccamav@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141969, 'BRAVO/GARCIA, GEANPIEER CARLO', '', '', 2, NULL, '20141969', NULL, 'gbravo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141974, 'ANCALLE/LLALLERCO, ABNER EDUARDO', '', '', 2, NULL, '20141974', NULL, 'aancallel@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141977, 'BARRETO/SALCEDO, MARX LENIN', '', '', 2, NULL, '20141977', NULL, 'mbarretos@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141979, 'CAHUANA/LLACHO, DIEGO ARMANDO', '', '', 2, NULL, '20141979', NULL, 'dcahuanal@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141987, 'CCAMA/SALAZAR, PERLA MARIA', '', '', 2, NULL, '20141987', NULL, 'pccamas@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20141998, 'CARPIO/ALVARO, MARIA ALEJANDRA', '', '', 2, NULL, '20141998', NULL, 'mcarpioal@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20142012, 'AGUILAR/CHURA, ALEXANDRA', '', '', 2, NULL, '20142012', NULL, 'aaguilarchu@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20142015, 'AYBAR/RAMOS, ANA LUCIA', '', '', 2, NULL, '20142015', NULL, 'aaybar@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20142016, 'CCANAHUIRI/PRIETTO, INGRID MILAGROS', '', '', 2, NULL, '20142016', NULL, 'iccanahuiri@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20142027, 'CARDENAS/BARRIONUEVO, ANTHONY JAHIR', '', '', 2, NULL, '20142027', NULL, 'acardenasb@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20142599, 'ALVAREZ/BUENO, BLANCA', '', '', 2, NULL, '20142599', NULL, 'balvarez@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20142600, 'AYMACHOQUE/CCALLA, SILVIA', '', '', 2, NULL, '20142600', NULL, 'saymachoquec@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20142603, 'CALLAPINA/DIAZ, GUSTAVO', '', '', 2, NULL, '20142603', NULL, 'gcallapina@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20142605, 'APAZA/MENDOZA, CARLOS ALBERTO', '', '', 2, NULL, '20142605', NULL, 'capazam@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20143605, 'ANAMURO/QUISPE, GLENY MILAGROS', '', '', 2, NULL, '20143605', NULL, 'ganamuro@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20144145, 'CAHUANIHANCO/CAHUANA, ROSY MARY', '', '', 2, NULL, '20144145', NULL, 'rcahuanihanco@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20144462, 'CALERO/GUTIERREZ, KARLA ANDREA', '', '', 2, NULL, '20144462', NULL, 'kcalero@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20151885, 'ANAYA/CHIPA, ROMULO', '', '', 2, NULL, '20151885', NULL, 'ranaya@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152101, 'CAHUINA/QUISPE, RUBEN ALONSO', '', '', 2, NULL, '20152101', NULL, 'rcahuinaqui@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152106, 'CCORA/HUILLCA, LUSMILA ESTEFANY', '', '', 2, NULL, '20152106', NULL, 'lccora@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152132, 'ALVAREZ/JARITA, LIZBETH ESTHER', '', '', 2, NULL, '20152132', NULL, 'lalvarezj@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152133, 'AMEZQUITA/VELAVELA, GLENYS MERCEDES', '', '', 2, NULL, '20152133', NULL, 'gamezquita@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152137, 'ASTETE/ZAMATA, ERIKA ESPERANZA', '', '', 2, NULL, '20152137', NULL, 'eastete@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152142, 'BAUTISTA/PARICAHUA, RUTH MARIA', '', '', 2, NULL, '20152142', NULL, 'rbautistap@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152144, 'CCAMERCCOA/LLAIQUE, JHON JHAYNOR', '', '', 2, NULL, '20152144', NULL, 'jccamerccoal@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152148, 'CATERIANO/DELGADO, JULIO CESAR ENRIQUE', '', '', 2, NULL, '20152148', NULL, 'jcateriano@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152155, 'CAPIA/GUTIERREZ, YOEL ANDRES', '', '', 2, NULL, '20152155', NULL, 'ycapia@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152159, 'CHALLCO/CORONEL, ELIZABETH XIOMARA', '', '', 2, NULL, '20152159', NULL, 'echallcoc@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152167, 'ACASIETE/CONZA, JOHAN ALEXIS', '', '', 2, NULL, '20152167', NULL, 'jacasietec@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152169, 'CALLE/CANASAS, GABRIELA LUCIA', '', '', 2, NULL, '20152169', NULL, 'gcalle@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152174, 'CARAZAS/RIOS, DALESKA MIRYAM', '', '', 2, NULL, '20152174', NULL, 'dcarazasr@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152176, 'CALLA/CHAMBI, JUAN CARLOS', '', '', 2, NULL, '20152176', NULL, 'jcallac@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152763, 'BAUTISTA/MAMANI, SUSAN ALEXANDRA', '', '', 2, NULL, '20152763', NULL, 'sbautistam@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152766, 'ARENAS/RODRIGUEZ, CESAR AUGUSTO', '', '', 2, NULL, '20152766', NULL, 'carenasro@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20152769, 'CARPIO/PALACIOS, GIANCARLO AMERICO', '', '', 2, NULL, '20152769', NULL, 'gcarpio@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20154352, 'ARIAS/RODRIGUEZ, PILAR LILIANA', '', '', 2, NULL, '20154352', NULL, 'pariasr@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20154353, 'CARI/TAPARA, JESUS GONZALO', '', '', 2, NULL, '20154353', NULL, 'jcarit@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20154361, 'CERPA/JIMENEZ, BRENDA ESMERALDA', '', '', 2, NULL, '20154361', NULL, 'bcerpa@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20154378, 'CALLA/JILAPA, CINDY YUDITH', '', '', 2, NULL, '20154378', NULL, 'ccallaj@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20154384, 'CARDENAS/ROMERO, YEYMI SUGEY', '', '', 2, NULL, '20154384', NULL, 'ycardenas@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161473, 'CAYLLAHUA/RODRIGUEZ, JACQUELINE DARIELA', '', '', 2, NULL, '20161473', NULL, 'jcayllahuar@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161475, 'CHAHUAYO/SOSA, YENI', '', '', 2, NULL, '20161475', NULL, 'ychahuayo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161479, 'BORJA/BAUTISTA, ELIOS RODRIGO', '', '', 2, NULL, '20161479', NULL, 'eborja@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161490, 'ACEITUNA/ALE, ARLEY ANA MARIA', '', '', 2, NULL, '20161490', NULL, 'aaceituna@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161492, 'AYESTAS/PORTUGAL, CLAUDIA ROSA', '', '', 2, NULL, '20161492', NULL, 'cayestas@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161503, 'ALARCON/VIZCARDO, ARACELI JANET', '', '', 2, NULL, '20161503', NULL, 'aalarconv@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161513, 'APAZA/TINTAYA, JAMIL RICKY', '', '', 2, NULL, '20161513', NULL, 'japazati@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161514, 'CASTRO/PINARES, SHARON KAMERON', '', '', 2, NULL, '20161514', NULL, 'scastrop@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161515, 'BARREDA/MARTINEZ, SHARON IVONNE', '', '', 2, NULL, '20161515', NULL, 'sbarredam@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161522, 'CHARAGUA/CONDORI, JEAN CARLOS', '', '', 2, NULL, '20161522', NULL, 'jcharagua@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161526, 'ANDAHUA/CHUNGA, JESSICA SONIA', '', '', 2, NULL, '20161526', NULL, 'jandahuac@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20161527, 'ASCUE/JARA, ALMENDRA ANAIST', '', '', 2, NULL, '20161527', NULL, 'aascuej@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20162331, 'AMEZQUITA/VERA, GABRIEL ERNESTO', '', '', 2, NULL, '20162331', NULL, 'gamezquitav@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20162337, 'ALPACA/ROJAS, YAKIMA ALONSO', '', '', 2, NULL, '20162337', NULL, 'yalpacar@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20162338, 'CHAMPI/TTITO, BRITZ KATERIN', '', '', 2, NULL, '20162338', NULL, 'bchampit@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20162343, 'CASTILLO/CAMA, NIKOLE ROSARIO', '', '', 2, NULL, '20162343', NULL, 'ncastilloca@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20162344, 'BAUTISTA/CONDORI, MARILYN NORDY', '', '', 2, NULL, '20162344', NULL, 'mbautistac@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20162351, 'CHAVEZ/ORTIZ, ENRIQUE PATRICIO', '', '', 2, NULL, '20162351', NULL, 'echavezo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20162354, 'ALCCAHUAMAN/QUISPE, YSABEL ERIKA', '', '', 2, NULL, '20162354', NULL, 'yalccahuaman@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20164309, 'ALVAREZ/ARENAS, BRYAN RODOLFO', '', '', 2, NULL, '20164309', NULL, 'balvarezar@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20164313, 'CARRILLO/COAGUILA, MAURICIO ALONZO', '', '', 2, NULL, '20164313', NULL, 'mcarrilloc@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20164319, 'BUENO/PASTOR, DANA ALISON', '', '', 2, NULL, '20164319', NULL, 'dbuenop@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20164324, 'CHAVEZ/NAVINTA, CARLOS LEONEL', '', '', 2, NULL, '20164324', NULL, 'cchavezn@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20164330, 'CALSINA/LOPEZ, NIEVES YULIZA', '', '', 2, NULL, '20164330', NULL, 'ncalsina@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20164339, 'CABREJO/BARRIOS, ESTRELLA DE MARIA SARAHI', '', '', 2, NULL, '20164339', NULL, 'ecabrejo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20164343, 'CARRERA/MOLINA, JOSE FERNANDO', '', '', 2, NULL, '20164343', NULL, 'jcarrera@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20164348, 'CASTRO CUBA/VEGA, CHASKA', '', '', 2, NULL, '20164348', NULL, 'ccastrocuba@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20164354, 'ANCO/QUILCA, DANNA SHESIRA', '', '', 2, NULL, '20164354', NULL, 'danco@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171436, 'CARDENAS/CARLOSVIZA, OSCAR DANIEL', '', '', 2, NULL, '20171436', NULL, 'ocardenas@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171448, 'ALVAREZ/ILASACA, VALERIA EMILY', '', '', 2, NULL, '20171448', NULL, 'valvarezi@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171450, 'CHAHUAYO/CARDENAS, NOHELIA NATHALY', '', '', 2, NULL, '20171450', NULL, 'nchahuayo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171451, 'AYBAR/RAMOS, CESAR AUGUSTO', '', '', 2, NULL, '20171451', NULL, 'caybarr@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171452, 'CCUITO/VARGAS, LUIS ALBERTO', '', '', 2, NULL, '20171452', NULL, 'lccuito@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171454, 'APAZA/QUISPE, LUIS FERNANDO', '', '', 2, NULL, '20171454', NULL, 'lapazaquisp@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171464, 'CANAZA/CUSIHUAMAN, JUAN GONZALO', '', '', 2, NULL, '20171464', NULL, 'jcanazac@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171465, 'CALLOAPAZA/QUICO, RODRIGO DILVERT', '', '', 2, NULL, '20171465', NULL, 'rcalloapaza@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171468, 'CAMA/CORDOVA, JESSICA LAURA', '', '', 2, NULL, '20171468', NULL, 'jcamaco@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171471, 'CASTILLO/PAREDES, ESTEFANY ZARAI', '', '', 2, NULL, '20171471', NULL, 'ecastillo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171472, 'CARDENAS/RAMIREZ, GENSI ANALI', '', '', 2, NULL, '20171472', NULL, 'gcardenasr@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171474, 'ARAGON/CHICATA, XIMENA', '', '', 2, NULL, '20171474', NULL, 'xaragon@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171481, 'CALLO/ROJAS, JUDITH LIZBETH', '', '', 2, NULL, '20171481', NULL, 'jcallor@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171488, 'ALEJO/LLAVE, LIZBETH', '', '', 2, NULL, '20171488', NULL, 'lalejo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171491, 'ARQQUE/EUGENIO, MIJAEL FLORENCIO', '', '', 2, NULL, '20171491', NULL, 'marqquee@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171493, 'ABRIL/SANCHEZ, KEYMER PATRICIA', '', '', 2, NULL, '20171493', NULL, 'kabril@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20171494, 'ALIAGA/CHAVEZ, RENATO ANDRE', '', '', 2, NULL, '20171494', NULL, 'raliagach@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20172764, 'CHACARA/CONDORI, ENMA THALIA', '', '', 2, NULL, '20172764', NULL, 'echacara@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20172777, 'CHALLCO/CUTIRE, HERMELINDA', '', '', 2, NULL, '20172777', NULL, 'hchallco@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20172778, 'CHARCA/CCOSI, LILIAN', '', '', 2, NULL, '20172778', NULL, 'lcharcac@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20172787, 'CHAMBI/CRUZ, DANIELA ALESANDRA', '', '', 2, NULL, '20172787', NULL, 'dchambicr@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20172789, 'ARISMENDI/SUMARIA, BETSY DAYANA', '', '', 2, NULL, '20172789', NULL, 'barismendi@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20172795, 'ACOSTA/LAURA, DANIELA BRENDA', '', '', 2, NULL, '20172795', NULL, 'dacosta@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20172800, 'CACERES/QQUECCA, AGUSTA', '', '', 2, NULL, '20172800', NULL, 'acaceresqq@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20172802, 'ARENAS/DAVILA, ANGELA MILUSKA', '', '', 2, NULL, '20172802', NULL, 'aarenasd@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20172808, 'BORJA/CISNEROS, MARCO SEBASTIAN', '', '', 2, NULL, '20172808', NULL, 'mborjaci@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174009, 'CCOPA/QUISPE, YOEL MESIAS', '', '', 2, NULL, '20174009', NULL, 'yccopa@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174011, 'BARRETO/POMA, ALEX', '', '', 2, NULL, '20174011', NULL, 'abarretop@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174016, 'AQUINO/MAMAMI, LEONELA KARINA', '', '', 2, NULL, '20174016', NULL, 'laquino@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174017, 'APAZA/PARRA, FRANCISCO ANTONIO', '', '', 2, NULL, '20174017', NULL, 'fapazap@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174021, 'CHACON/CHAVEZ, BRYAN SCOTT', '', '', 2, NULL, '20174021', NULL, 'bchaconc@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174028, 'BALDARRAGO/DEZA, CARLOS DANIEL', '', '', 2, NULL, '20174028', NULL, 'cbaldarragod@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174030, 'CHALCO/CHALLA, FABRICIO SEBASTIAN', '', '', 2, NULL, '20174030', NULL, 'fchalcoc@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174033, 'AROTAIPE/CHAUPI, VIDAL VICENTE', '', '', 2, NULL, '20174033', NULL, 'varotaipe@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174035, 'AQUINO/TICONA, ALLISON BRIGGITH', '', '', 2, NULL, '20174035', NULL, 'aaquinot@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174037, 'CATUNTA/CAYO, KAREN SOFIA', '', '', 2, NULL, '20174037', NULL, 'kcatuntac@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174043, 'CCASA/MELENDEZ, LUIS KLEIBER', '', '', 2, NULL, '20174043', NULL, 'lccasa@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174044, 'AROSQUIPA/RODRIGO, JOSE MANUEL', '', '', 2, NULL, '20174044', NULL, 'jarosquiparo@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174046, 'ARCOS/PAREDES, GIOVANNA', '', '', 2, NULL, '20174046', NULL, 'garcos@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174051, 'ALVARADO/LOPEZ, SUJEYS YOSELYN', '', '', 2, NULL, '20174051', NULL, 'salvarado@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(20174060, 'ALVAREZ/CONDE, ARELI ESTHER', '', '', 2, NULL, '20174060', NULL, 'aalvarezco@unsa.edu.pe', NULL, NULL, NULL, 0, 0, 0, 0, 0),
(67349825, 'Carlos', 'Gutierrez', 'Valera', 3, '67349825', NULL, '', 'c.gutierrez@gmail.com', '', NULL, NULL, 0, 0, 0, 0, 0),
(72034061, 'ADMINISTRADOR', 'ADMINISTRADOR', 'ADMINISTRADOR', 1, '72034061', NULL, '', '', '', NULL, NULL, 0, 0, NULL, NULL, 0),
(72034062, 'Luis', 'Jimenez', 'Gonzales', 4, '72034062', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 0),
(72034065, 'Mario', 'Gomez', 'Villanueva', 3, '72034065', NULL, '', 'mario@gmail.com', '', NULL, NULL, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `prestamo_id` int(11) NOT NULL,
  `prestamo_libro_id` int(11) NOT NULL,
  `prestamo_persona_id` int(11) NOT NULL,
  `prestamo_fecha_entrega` timestamp NULL DEFAULT NULL,
  `prestamo_fecha_a_devolver` timestamp NULL DEFAULT NULL,
  `prestamo_fecha_devolucion` timestamp NULL DEFAULT NULL,
  `prestamo_estado` int(11) NOT NULL,
  `prestamo_prestador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_descripcion`) VALUES
(1, 'Administrador'),
(2, 'Alumno'),
(3, 'Profesor'),
(4, 'Biblioteca'),
(5, 'Colaborador'),
(6, 'ExAlumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_libro`
--

CREATE TABLE `tipo_libro` (
  `tipo_libro_id` int(11) NOT NULL,
  `tipo_libro_dsc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_libro`
--

INSERT INTO `tipo_libro` (`tipo_libro_id`, `tipo_libro_dsc`) VALUES
(1, 'Virtual'),
(2, 'Fisico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `tipo_persona_id` int(11) NOT NULL,
  `tipo_persona_dsc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`tipo_persona_id`, `tipo_persona_dsc`) VALUES
(1, 'Administrador'),
(2, 'Alumno'),
(3, 'Profesor'),
(4, 'Biblioteca'),
(5, 'Colaborador'),
(6, 'ExAlumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_cuenta` varchar(20) NOT NULL,
  `usuario_password` varchar(100) NOT NULL,
  `usuario_rol_id` int(11) NOT NULL,
  `usuario_persona_id` int(11) NOT NULL,
  `usuario_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_cuenta`, `usuario_password`, `usuario_rol_id`, `usuario_persona_id`, `usuario_estado`) VALUES
(36, '72034061', '$2y$10$AIJr66Tvp8gPkRDexwkuoOmlGaOh1.Yi5P34cj63g4qYEblLuINBe', 1, 72034061, 0),
(53, '72034062', '$2y$10$AIJr66Tvp8gPkRDexwkuoOmlGaOh1.Yi5P34cj63g4qYEblLuINBe', 4, 72034062, 0),
(268, '20132016', '$2y$10$j0xaurxgowD3xBn0.ACfzeLX4d7NawXUKk4jUSJqvmIoRqXwFbufi', 2, 20132016, 0),
(269, '20084684', '$2y$10$Q2f..A9TFX4O31A/p24uOevfy0rgKLYolrfZd6zFKI1XDEwhaUfXq', 2, 20084684, 0),
(270, '20171493', '$2y$10$L8TgXPqrIXljPgEljBqbBew6ohXmmlIIH1o.FkSHZJkeGreAZ9Zqu', 2, 20171493, 0),
(271, '20152167', '$2y$10$3uhYb8n/iJesYHzqGpG7r.3J938B77p90zNfikrUS.tIcDOwtgExK', 2, 20152167, 0),
(272, '20161490', '$2y$10$rxBNR.tlTuWgHHsAOlC5Ee78EW3RbBHVkFTBpD6NPbLOoTN3a0S8m', 2, 20161490, 0),
(273, '20134039', '$2y$10$UkJHcs6eIT0IHAmffhA6Mu4IYJ/.C05ruvqzGpHH9Gmo8oviAczye', 2, 20134039, 0),
(274, '20172795', '$2y$10$WT0XOk/4aY81mx0ehhcP.OAosHeoJDlbJUVKJ5Bdiw1ziNbxq2L0.', 2, 20172795, 0),
(275, '20097753', '$2y$10$HMTyemozqG0F1/.DDZtZOuWwm5t8eYeatCdXI1iynEFxcPu2GgS5O', 2, 20097753, 0),
(276, '20132593', '$2y$10$TfGmYLlIOFiW6/AFerceiOw/O91xauINDe/V.2xn36Uokqivtixom', 2, 20132593, 0),
(277, '20121985', '$2y$10$sVYPCl8fzls1bQu351S6suZzr1x96VvPLQqKefY4L8otItO3w39fO', 2, 20121985, 0),
(278, '20142012', '$2y$10$snDQYaq5TETBAOIdEKgpqu8Y3I4TjAVGp3q.DFqjlWZT.j6ThnW8.', 2, 20142012, 0),
(279, '20104271', '$2y$10$RIzw8kcQIs8/nrrnAbVGO.pGguIWePiMpQh/C271ENSC/MBlBBPxO', 2, 20104271, 0),
(280, '20121930', '$2y$10$dx/uE/hcO/PdRFGEYIdFJORLCP0Zx/smMLLLw1UN5EcKY9sMnSyyK', 2, 20121930, 0),
(281, '20141952', '$2y$10$SivbAEt7/WavWciToXUDCOR0UxHz43yo4WF1.sfegU7k53G1dCa2u', 2, 20141952, 0),
(282, '20161503', '$2y$10$GM6lNOy8ZjrGgRqTAGy5Ge4GIfRUoMjlPzkEH8iwLMikaGfdZRKwa', 2, 20161503, 0),
(283, '20121945', '$2y$10$HDWVyZ3RUVhltkcmR13CNONnppFhV6f0kJvQdXN.XvXdvAtQB4nme', 2, 20121945, 0),
(284, '20162354', '$2y$10$3vtNszqLZy.VPN/z2wXJoeHbQxZXErfi1gv26sZmKH/P0HbP97MQW', 2, 20162354, 0),
(285, '20134020', '$2y$10$8LuArLCICZ.ugkaGHoPuYetzFmFIjYpUUEJBEKVozBfBFOUAKQEBC', 2, 20134020, 0),
(286, '20171488', '$2y$10$SpJgu8RYOtH6b7XvjIsqd.DblRCBJ/zWkQkrQOSufAY0yTi7EXIyy', 2, 20171488, 0),
(287, '20171494', '$2y$10$IsWhcb5FubY3hGILhVuVqeepVLc8byrmez0R.OimcLBidzhF2Bg0S', 2, 20171494, 0),
(288, '20140255', '$2y$10$AaTFmL5o9jwnC7TiGiaxX.8CyxxPE9hpsQqvGw1y6Mp.qANWSYmYS', 2, 20140255, 0),
(289, '20162337', '$2y$10$QKrVcn4MP6XMmH412mDsbe.gR2YgtndfyCh/80LHTJ/EY2qBlMo1S', 2, 20162337, 0),
(290, '20174051', '$2y$10$oY6d22BReoAQOXg3DS0dIePZNQu867BpS1QUcEVk95HIAFGfp3JnG', 2, 20174051, 0),
(291, '20164309', '$2y$10$6UNCUM3n/IwubI4j.4XwuOp/GyYPbf3zs7jmmmTzfIpujhxikj2AS', 2, 20164309, 0),
(292, '20142599', '$2y$10$AN6f0ziJbto8qtN8yIadye21H5/bgweMQo4U8W0nuOxo.293CkYv6', 2, 20142599, 0),
(293, '20097677', '$2y$10$j.jXzx/1DUkXHMzxawoil.Zb6ekvhfT1bykDSrR4JmScGXmnWwDEe', 2, 20097677, 0),
(294, '20174060', '$2y$10$V2sk1t47O23VctWFPkFUiefPVLoo3g/VBgfi0xJPUqLdwfrFssh5i', 2, 20174060, 0),
(295, '20171448', '$2y$10$knUf6bM40xzpZQdgiGoCm..krkhAKyJ/.oKWnJXXIpGlCUkWADj6C', 2, 20171448, 0),
(296, '20152132', '$2y$10$iKOHIyhRfaEIFPr7IUwuL.nlpXYMg1D94oQwkkbS4g8rOy6lYi5vG', 2, 20152132, 0),
(297, '20091808', '$2y$10$V0z.fAL5WOx6ZuErGQdIOOIS9IjHhWAL0MLT/b69r7W71nGLzj3.u', 2, 20091808, 0),
(298, '20121946', '$2y$10$AdDvsNa7SoaiPWcoz2Gj5OnIgxZM7ivc1CscFbYTsB2B7J09M2mLS', 2, 20121946, 0),
(299, '20152133', '$2y$10$wXssrnADNaYBV1AWb1Iiuu5UcmGvSRc/O5miV1YRfBfirsZkQFAEe', 2, 20152133, 0),
(300, '20162331', '$2y$10$x4LlhA4ZtNgGiU/21fEMp.4uRx5a.h.sMQ9Rj851gG06W5Jpv9Yka', 2, 20162331, 0),
(301, '20143605', '$2y$10$9EJozI/cqPyWEMs6otcE4e4LpXjJ6ALrg/kT/fkompBlYaPjn7Af.', 2, 20143605, 0),
(302, '20151885', '$2y$10$xJfWqNigVAuA9HC25s6BS.fUtseIbowUExco2OAztqLxd6Sbg/im2', 2, 20151885, 0),
(303, '20141974', '$2y$10$COV9sz8/UNqk.EAExXZtme7LwrONRfKYZdZqRkY9X6QYZjeS/l0eC', 2, 20141974, 0),
(304, '20121696', '$2y$10$crnif2ZWba3.mCgHhZhZxOsV/g8/1JMkNCHkf9T7Zxqn9XN3zjYme', 2, 20121696, 0),
(305, '20164354', '$2y$10$pUW/x3UZdXZSqsWqblstp.FJKdApR12Xc49KowVYflfw6IsWfYwNi', 2, 20164354, 0),
(306, '20161526', '$2y$10$j0hXNzNnf6eWwm3Sk2oDqu8PJGgNTElcWJDMx7WaTW3G1UhSzKyii', 2, 20161526, 0),
(307, '20122143', '$2y$10$ZLA2/OvoILGOcAnocFhhiOjQIcvbRvccXzz6XqZ5reWSI6iD.UAl.', 2, 20122143, 0),
(308, '20121439', '$2y$10$e5HP9THxlywL8r47dBdKF.dD6M6XkXCwc.yYwMiGunbFsFUAyytgG', 2, 20121439, 0),
(309, '20142605', '$2y$10$PSIpf5WPxHZB8B22Eck.meuZ.x9xOjJepmeG4fHZE9krTSc2uT62e', 2, 20142605, 0),
(310, '20174017', '$2y$10$yKylz7j3qr3AdFqh8U7HV.v1HQgKsTmQN/Nnxa6p/USwfjOumFrSq', 2, 20174017, 0),
(311, '20134031', '$2y$10$anunoccLC8J7z6PZ9jZaXOXQky56FYEjDYV7tzXBFax4FLlfO5uOm', 2, 20134031, 0),
(312, '20171454', '$2y$10$1M.c7BBjqP32TiNJn6AzbeTuun.qd7cOc.UwC6V7KE7hqiG9btHIC', 2, 20171454, 0),
(313, '20161513', '$2y$10$oHLJ4suRfcWOfUqKm3sFMu6rFeZBe7hXPSx1qRdxk0AxCJs14y82S', 2, 20161513, 0),
(314, '20097731', '$2y$10$ekX9Db0vefHBFqUrKFVuWODrb0u4phmgZMutiQc5RN9.dneClyd9a', 2, 20097731, 0),
(315, '20174016', '$2y$10$Qb51G597VzRmXrhPlmwjMuSQdW01TWwvVrx0p7Nma7fvCDZraSJcy', 2, 20174016, 0),
(316, '20174035', '$2y$10$5xzaja54Z9Qa.eb/nSgKD.5uFdBsmaPypk3L1RQbaVzluK7bxsPa6', 2, 20174035, 0),
(317, '20171474', '$2y$10$KIS47NzplGlmosX/tCg47ennkJtCc4K9YbZNb5oj2/grCR8.mG2L2', 2, 20171474, 0),
(318, '20131980', '$2y$10$s2/oCRJhzPZExr7DCB04/OCtRMHidS189fy1EJwfJ20WsX2OeUF8u', 2, 20131980, 0),
(319, '20061390', '$2y$10$s87zQ2legW2l3G/NP17n8.ohXhH9ILiRxR9xil29ZgIbZugF75cfW', 2, 20061390, 0),
(320, '20174046', '$2y$10$wtKxV.17QOIw/jF1qpS1wOAhrJxUYoZLXc7S0bfbG1k21DeS2hgCi', 2, 20174046, 0),
(321, '20100052', '$2y$10$ckzletJNjj9VDkF6Ivkobu.t/0g2O2YWrnJ40UTT6K/qqr91NGhWK', 2, 20100052, 0),
(322, '20172802', '$2y$10$IjnL/hZdD6dUMIUwrkwPXeNDMSW1JRPFxcqu6XEDds/rDNFej6x62', 2, 20172802, 0),
(323, '20023443', '$2y$10$dcQc.A5opOqboJ2AwDkWBe1lDip/ce8mMkVKBnpJGNdieH9XR/6H2', 2, 20023443, 0),
(324, '20152766', '$2y$10$qi5Ewjz6oaxECPBylxyCGusCVyR466dSykjLC8c/E/WgDXGTquIhe', 2, 20152766, 0),
(325, '20154352', '$2y$10$x/DSfDpHM9AUG1ufuHgLQ.LadvUhJL66AxlrptsyOoPqjLoO0dJuK', 2, 20154352, 0),
(326, '20172789', '$2y$10$RVUZOWboePw1PiK106Y.aeOa7Chv3KfD7OsZY13l1q.AoTOqEKKq2', 2, 20172789, 0),
(327, '20102506', '$2y$10$Cp/ftluqkep.SfQjkg/uIuda9rbZuGOavRhwE/ziE6j/B9CGSjl4m', 2, 20102506, 0),
(328, '20174044', '$2y$10$PQlhW.fvdm.Z1yFXmvQnGeJsZJiJdePAHaUbSLfiIyKZCYod1fmWy', 2, 20174044, 0),
(329, '20174033', '$2y$10$f4T9JmUi511pu7OD6.xIj.yXJNm2jeWv.xh2DtJE//MhChU6GbB8.', 2, 20174033, 0),
(330, '20171491', '$2y$10$sWKRIS7gddKlIy8yVH34YONwKIz0mhoDTOTbockJvduD1YBGHzbnS', 2, 20171491, 0),
(331, '20083432', '$2y$10$IQiV0jgNDk6iZVrI0zwP7.QAlvLuUaN/bsHzGrlinfdw7Avq8iGci', 2, 20083432, 0),
(332, '20102600', '$2y$10$A/b1.LkVzH4PT5AV5/VqveqKxa2K/KoDz5x1BzbM19YTxgve6dAye', 2, 20102600, 0),
(333, '20161527', '$2y$10$wX3eavuHMf8jZ4hdTrvcve926Heo2vp1Neym4rnTSFKc8qGV6EAq2', 2, 20161527, 0),
(334, '20152137', '$2y$10$aqDcOXk92F5IGL69d9MAK.Hd4rtAdjFO2YK2hf2B0EZpteRj57WB.', 2, 20152137, 0),
(335, '20134012', '$2y$10$y2lDaZ8uBzzofAUZZmmpHO2bbRM8AAmLpIMyIRvdV90k8QRzrH2MG', 2, 20134012, 0),
(336, '20123338', '$2y$10$lLbCQTfPU4GQNkey9iyLtOz7.7WgvKhwvVZy9fXUwswnik0ao/XIi', 2, 20123338, 0),
(337, '20142015', '$2y$10$UjEn4DeKIknceSaqd.QOCOmHuE3NQ9uE5cYQbHhBxtoSuY7Bf7Fvi', 2, 20142015, 0),
(338, '20171451', '$2y$10$IOYEkOVpAehfeMWMNIzSn.x/B5UXI4uly4Op43cH9SglGcp8d1P/K', 2, 20171451, 0),
(339, '20161492', '$2y$10$b7AAUpb9LOSyfOaeNpo6leooy2ufUbdY9a9bD9l5n0hlba3WQU8bW', 2, 20161492, 0),
(340, '20142600', '$2y$10$Qef9.yJiU3bLC/oK/5qC3e0bMLiewl/WOw4J.XBVxEu0m1kz7vAHC', 2, 20142600, 0),
(341, '20121712', '$2y$10$AnGwAlgquG.z1spWoASOIevAVSVYFQukHR4SW74s.at9juvj8WSbC', 2, 20121712, 0),
(342, '20174028', '$2y$10$nERuV5xft6P88hy2gv1ltOic2RZeefYeeJXpNdAI9TC6QWbwQNCum', 2, 20174028, 0),
(343, '20161515', '$2y$10$ExNIzITWhavR1Nu9t25WLOaYv4FcglBUozjVu/xRJCIQRJz0U5tSu', 2, 20161515, 0),
(344, '20174011', '$2y$10$ALfyeUNWstW6fdDmzFSBle6UqtPOuHrTW41tgpRlmhLrBnX04dB4S', 2, 20174011, 0),
(345, '20141977', '$2y$10$U3UtFmqYOttxVZEH6mqU3O/WHnVGF5o/.cJQbwl.pdzJbXK9cTdjK', 2, 20141977, 0),
(346, '20131978', '$2y$10$adgeT1mtETzqjrQzT2czB.5ED7rtZdDKUsOBodu.jWMfF0Y4K70Fu', 2, 20131978, 0),
(347, '20082100', '$2y$10$BVVAER50bouYu7b1JmtkROEApj9sZdmY3wt8L/PZxHBkjgo4PXuKS', 2, 20082100, 0),
(348, '20101516', '$2y$10$V5Uj1KSuJS7hEiTdN6IJpObC4/MjbXde4We0yB.W8yljjYfCFN8vm', 2, 20101516, 0),
(349, '20141213', '$2y$10$/7O3NhqII52ToIP.qEsNq.giD2JQwlBJB4zTXte1lBjnCL4zyQUxe', 2, 20141213, 0),
(350, '20162344', '$2y$10$OHsSOlhSgNDnr./A88a8LO2ECobZyYPdJXwybapW710cTS0SfPG7a', 2, 20162344, 0),
(351, '20152763', '$2y$10$Qj/.3YT63Jcus6Iczvljw.dTMnAjsV879mzWRaBDorJY6t5PxT71G', 2, 20152763, 0),
(352, '20152142', '$2y$10$BRBvRKBs6jOIGk2aPCW5muFSTUkthoqH5C8vy/PRmcD5k1.iR7W4y', 2, 20152142, 0),
(353, '20101651', '$2y$10$Q8kfHgjQwJpSU9tqcIRccuQOYe.fRAvGRxwhQjFsPfJif0nWHPUYq', 2, 20101651, 0),
(354, '20102673', '$2y$10$aKy0UQObYoU6gQ8rMe7ylecf/vf8OmmJ3ebYBDBQ2HFkigFhKxayi', 2, 20102673, 0),
(355, '20121964', '$2y$10$Do9Do0sNGOWy.pXRPce.0.Aj/XVRGvoGtCCj4e6V6N/3/jJSzto56', 2, 20121964, 0),
(356, '20124013', '$2y$10$6jAGIGhy0wpLcQTBDCc/kO23qoQKbK7gooRYKO.3R0ep4lBjUwtLu', 2, 20124013, 0),
(357, '20131956', '$2y$10$yKK.JBMvFRv7hB.rsysap.ygIfUQob795Orto0Sj/9fcW5F4wpZeS', 2, 20131956, 0),
(358, '20161479', '$2y$10$ZSMszXNfiykXgtL0hSxdYeD9sN79Y7uT8irKohreChzsY9VPNPRDS', 2, 20161479, 0),
(359, '20172808', '$2y$10$LyVzpM8qLKKt5Kz1UIjZcug4yfbTCE.wQDOHMyCN8ZMtYe3g9j0zC', 2, 20172808, 0),
(360, '20141969', '$2y$10$QbN.rSQvEYZOBx9yCjGj7OZ8ab57c/msSUVZR1cfRRYl/By.DvAh2', 2, 20141969, 0),
(361, '20164319', '$2y$10$xkd/bQtHA6pa2hpk2mD19OBsaWX.AOtS27ikZGDurStCYpavuKwDS', 2, 20164319, 0),
(362, '20131955', '$2y$10$8xXtDPRaAJ2rUbD99FQreOhkR9iWSXUZYohuMQD.FRgeWCbeBWWaC', 2, 20131955, 0),
(363, '20164339', '$2y$10$K.hNeYIbjdrklOfleSwoz.0YgdrwS5Cse2ONwPjbmwkBGmZXXRcFm', 2, 20164339, 0),
(364, '20172800', '$2y$10$3rDqf9gdsmd033tcGk1ZBOC/LNktmHp9dhE2Y4qTkEBpj5KTAN6Nq', 2, 20172800, 0),
(365, '20103121', '$2y$10$pSdUmb.77lnFTyKYuV9JAumtsPnFA4.777AxnVrxoyodWqW7uL5DS', 2, 20103121, 0),
(366, '20073666', '$2y$10$dz7M3bARun5nPVFTyzdvZODb/jlL9ctZRGvPmTR6dRw5qBhJpX8CC', 2, 20073666, 0),
(367, '20141979', '$2y$10$/NVDzf635dwG1Q0o6x2PlOGQRWw97DFhPUbZlky0LrnflUAo05.eO', 2, 20141979, 0),
(368, '20144145', '$2y$10$sVSS5EFGATGeoA/rVyy1Nu1w/YsIOqLHf9ezs.9cHdjP3WWjvqNge', 2, 20144145, 0),
(369, '20102578', '$2y$10$UELn7JE233cLNQMK3s5r.OmlOn5fxaaUSeNpt3fo26lqE2ds1pw3.', 2, 20102578, 0),
(370, '20152101', '$2y$10$fxjaTuLSgkAl4gueJrNf3OM132KjdiwegBCbVJml2.OddY/ONoFca', 2, 20152101, 0),
(371, '20131947', '$2y$10$Bhb3uTFC37R7YysVYrn.9O.dBMTzO4TNNKPDMMUDdQNagU9GWw3fW', 2, 20131947, 0),
(372, '20144462', '$2y$10$baDpezZiAeJVW2Ao708Seu.cYKVy3Ek5fdWJQ0sHaF0T1qjwyRWsW', 2, 20144462, 0),
(373, '20141956', '$2y$10$MhelnGfoF.j3ZNe9MhaR1OWJEQmV/S3ZDC8hz37yJU1fbali6/Pf6', 2, 20141956, 0),
(374, '20152176', '$2y$10$hZ6xwcIosEUVr53gVmjIKeIGrLhvLT7x7XCZwBMzSeFKptG8ce6/C', 2, 20152176, 0),
(375, '20051144', '$2y$10$IYnGRm0ZdDUP4WUEyQtlH.n5id56d1Qq2yUlTvHuko3pCveKO0n5e', 2, 20051144, 0),
(376, '20154378', '$2y$10$zO10Ls.CzcJ/STYKt1fNcuiCzBp4OZRJVMuIco1WqJJP9n5oaJw9O', 2, 20154378, 0),
(377, '20142603', '$2y$10$ROcfifySi.fkcgq.8d0aae3YnZyIHbCC5xinQZiMv3oStLR5xBfIq', 2, 20142603, 0),
(378, '20152169', '$2y$10$6nBkozq./wPVLoF3k55WO.yubi3hYUASSZUuHpdrsnGv5nI6p.19C', 2, 20152169, 0),
(379, '20121913', '$2y$10$01LLK0iMdmnxvLfWTxmv/.SwRiLtEzNX7yHYQuJ23g4NQc/Q6U/vq', 2, 20121913, 0),
(380, '20171481', '$2y$10$3937wuKuNHj4Z9qtWkeef.8NQ4cpkcy2OcW.PviTQkPgtq/Mbeev.', 2, 20171481, 0),
(381, '20171465', '$2y$10$1LuR9NTSGQh5p4i8e/8qkOIZEy.fSP.x8toszRf/yybXqCCw2ai.G', 2, 20171465, 0),
(382, '20164330', '$2y$10$0UpzEho4HeJ7BBbkj6BeOujjnsmSpNX6NMM1Ac5JQJjDlDLyVQOve', 2, 20164330, 0),
(383, '20171468', '$2y$10$Jkg4fRJbKfQO3NX1UPO9s.fyRmhQWLJX7zuPGApphnGm2kRplrZkG', 2, 20171468, 0),
(384, '20121965', '$2y$10$PA5A6lN5mAjGq62KCw0ZHurpvbu.DPbTHuahYpm0jVZS3WfWWt3Iq', 2, 20121965, 0),
(385, '20123999', '$2y$10$sGDnSrDVz60nxAYBf8OFnO9zlW/Oa.bpbIycFRNdbmDIoRh84UY/W', 2, 20123999, 0),
(386, '20100368', '$2y$10$yl5lwKJ00ec28BVx8jMAd.VYnhG0WNz.Qfkcdk1vcdksbxHOAo0YG', 2, 20100368, 0),
(387, '20171464', '$2y$10$my289cUsUVYY4IQJId3zMuYe7wxV3CrbXi29cRvS3BaTV70BHeHzm', 2, 20171464, 0),
(388, '20084703', '$2y$10$cPz6TQasLY2Hr7p9kHZpC.Rv42fCl8ZXO7d5xaQsAavPBEEpCCmMm', 2, 20084703, 0),
(389, '20152155', '$2y$10$rvl16JRgDvMcrqmL5yxdlubcpm1W70b310cnQACQpqX2f1upYnGEG', 2, 20152155, 0),
(390, '20152174', '$2y$10$jN2HEir5SknHtc/Vfjbnyu2g05YvEbUcHaBze/YN.heRZg11yMDqC', 2, 20152174, 0),
(391, '20121948', '$2y$10$l34bcG5h92mbL0BX1JHjaeOrkIl5/Bomzql1DXJhmJzGQFenwvM12', 2, 20121948, 0),
(392, '20132586', '$2y$10$RzHYVusxlfL1a7WshGxYpOfTm4k/GcQ4y8/DaqnvI/85jiz5tWaeu', 2, 20132586, 0),
(393, '20103826', '$2y$10$KGQxeKrYHFhXTQ4g7lLVwuvK7zeOq5JoGfsuKj1.PO0h48S5Vzcvi', 2, 20103826, 0),
(394, '20142027', '$2y$10$7/El65DMxkGaFRfIghG7Tec9jcxlP0bRgnCJAiy0iQ1xxYbdKAOjm', 2, 20142027, 0),
(395, '20171436', '$2y$10$CxVV82G4e1Q3ZrOZjHotK.UJzNgZGlCcZOyDLMhNGEYvcdF9lLdNe', 2, 20171436, 0),
(396, '20171472', '$2y$10$kSO4nMc8TMkABqKz.66lZ.JWWXOyBAtRQ/mbwvMuNS0LTZKo6J3oq', 2, 20171472, 0),
(397, '20154384', '$2y$10$UOTJDaxs5G1T9I.jVJD7N.e4w6I7e7afw1xRnZaElbMH/ku5CUPUS', 2, 20154384, 0),
(398, '20154353', '$2y$10$kmWsYPI8XDfkznWtwmYuWeCCjBsxud6B4BZONnYBHwue3JqBa3GRO', 2, 20154353, 0),
(399, '20141998', '$2y$10$IjCwUsGZSyZiDwY0C7Uc6.GQK.KNI/ExQIZXtONWwzhm0jnPQgndm', 2, 20141998, 0),
(400, '20152769', '$2y$10$uNp1.xg06xs/TsH.VGrMTe80WK3/y28Jojc8qR8aVYD1ffWZItCuO', 2, 20152769, 0),
(401, '20164343', '$2y$10$SK7.Rib5Kt.ar7PpC/BHRO8ETnc9b6veT7SdJIfSU6n.JIIfN18RK', 2, 20164343, 0),
(402, '20164313', '$2y$10$0cD.esErwku628V.BryuEehZONKKrF1j7QobQ05228OuTiRQiNcS6', 2, 20164313, 0),
(403, '20122889', '$2y$10$g1wI3edZjQb2Ai5wViOKOOvSfnBSkC991SEIkO/TI3J7F.WemtuEi', 2, 20122889, 0),
(404, '20131959', '$2y$10$rnZwmfn60VvuGxrd8XBbMe1HL7loE32015H7RIyrJIW4GA3nXFaBK', 2, 20131959, 0),
(405, '20131706', '$2y$10$lsM662w2t/nAnrWZS5bNIe53gQaH/QOMoKox9uG48ArFeYoPDyw7a', 2, 20131706, 0),
(406, '20162343', '$2y$10$uNA30HcHPntFkSOS.CV.XOTEIBGBxFhEmdu1ljbmQFEQgiCebJx9K', 2, 20162343, 0),
(407, '20097832', '$2y$10$OPNe4/vPCDUvp/5KfFVhH.PH7S1bAIiTaJ6y8XHkolKZvK5GCXQFW', 2, 20097832, 0),
(408, '20171471', '$2y$10$hTiYVbIaWLh2w8/o88/ldeUeFB6rDZLddlpBXT3Z1BCiDHfdksxdW', 2, 20171471, 0),
(409, '20134015', '$2y$10$r84QlRivk1ryIslsz7l2beOnlzL6nCJyWTkGUqvQTJqMrxYq.fzUC', 2, 20134015, 0),
(410, '20164348', '$2y$10$hVKgG6.p1ueqY1JjFJ9iJO7V5aQb8x8iPyeQa4pDqxmH5R6czQEb6', 2, 20164348, 0),
(411, '20141942', '$2y$10$Cv5NVvGMT7rJX2padpuhbeX5Cc9ag9LrEZ0Bi/rb90CpA/5ZjpZXa', 2, 20141942, 0),
(412, '20161514', '$2y$10$hyxpFz3J.pBFmguvy8ajFuOYmugtpcMoxrcF/GusYo.m/GWB5lqKK', 2, 20161514, 0),
(413, '20152148', '$2y$10$06326tfWbHrDoLbWCDaikeBF8Aep0Ms1Bu/h93o1L1bRKQNwvOtWy', 2, 20152148, 0),
(414, '20174037', '$2y$10$9lI2GjQeref68/878Ri9Tul2CFKPhB.fWazp0oho.uOg0RIrDrlyO', 2, 20174037, 0),
(415, '20161473', '$2y$10$uLVTrZMkEhFZJlO7DMbWsuOdO563LZfhJ/hnbSIeFIikXLUbmC8p2', 2, 20161473, 0),
(416, '20124012', '$2y$10$rToPQ.XKmxlRvnWZbKcDTuGu8L7b8YO5n0PtlhYvBYRoW9m1/F1ES', 2, 20124012, 0),
(417, '20043566', '$2y$10$wcU3KlAPUXd3tK4tcnTcwOVm41ocKYJPHykfj1qEfcdJFaQ/Me7PC', 2, 20043566, 0),
(418, '20141987', '$2y$10$Tfpt21uznOWFpVlSuqdHl.LcVg77pIh1fD3Zc1MEIkeQ6Ap7HFtlK', 2, 20141987, 0),
(419, '20141964', '$2y$10$duB2obhsbKt/IPzvLziYoOMdHpJhg..Nea0e0HW3KHzMvexsA4zXe', 2, 20141964, 0),
(420, '20152144', '$2y$10$8KETpdbJcP7le1t0b.UFruYMottgQ4TWW6zVtribIW9W7KCLrmyam', 2, 20152144, 0),
(421, '20142016', '$2y$10$ErC8AR0iP74EoJp4a7xQOuQsjqIkLZqCELxvgbQ..j4nj3jW9ykfu', 2, 20142016, 0),
(422, '20131986', '$2y$10$/xePrqX6rPigwdaHeTfy2usuqX6ECFG5EXPaeu2ys8vu.xqL43m2W', 2, 20131986, 0),
(423, '20131993', '$2y$10$BpJViTOaKa1hD/D.rvpW8.qppMLtfc.ZuhlMojaaW6zftBHdgUxAW', 2, 20131993, 0),
(424, '20174043', '$2y$10$unCflqYPE3HvdDrt7hlAme5tbA4nDovM/6iDZxWCHg23TJNufvj3q', 2, 20174043, 0),
(425, '20174009', '$2y$10$wdFdp5qahLtEBVYb7acLBu794PpDNtrgygwUex3i9qA2Mzfzw1Qm2', 2, 20174009, 0),
(426, '20152106', '$2y$10$swF6jBoLUCwaCXBmHEyGzOHtAiLUZYvky9L8yLlmCPdBStmyFHm52', 2, 20152106, 0),
(427, '20171452', '$2y$10$VvaoY907my9VLgXuBx1fd.R1tKgpPBW2ZDhkraeuGb/N.oAWoWU6W', 2, 20171452, 0),
(428, '20154361', '$2y$10$PHc13N0X7Sxfw1JawURo5.IEjSekRgk.j5PAnnxwldcSFmbnfbciS', 2, 20154361, 0),
(429, '20103984', '$2y$10$jt5cwKrPc9mLf1hKUvZRnunLlxyCVVz5lI4aMYcynZEyFdsrdIh4G', 2, 20103984, 0),
(430, '20172764', '$2y$10$aPgo5d3uL6vHVCjSRrRi9uvgup9CB6LMZgQTXVHUdsquKi2Z8b.qK', 2, 20172764, 0),
(431, '20174021', '$2y$10$AH6pMwlkiKjg2yDQ4.L7Euizm4TLqrcO3MUJTof.vQzwlcx7p3P3u', 2, 20174021, 0),
(432, '20171450', '$2y$10$WYCe63h8vbzcj1RB1sXQOukB4bBwMPIjnnJxnEfMkcLYGm2zQLPxa', 2, 20171450, 0),
(433, '20161475', '$2y$10$YrgTSk8wundTuOV5UL4aeeaX.R/g1f6C13f3aB/wmbOlvdhVS3Gre', 2, 20161475, 0),
(434, '20174030', '$2y$10$azziFQt7wEfueY5SxLNfEOX4UTggQfaJ2YszuYt5WDLbkvWaBnQuy', 2, 20174030, 0),
(435, '20152159', '$2y$10$BA95F9vD/MyFY2jmU5fGAerKYgWdPZvuAKFfdx3ildr26iww5QZYO', 2, 20152159, 0),
(436, '20172777', '$2y$10$IbL3SkaS2916rfInDFGArujm3kFsBuhmjjEL.mi.auttIoazQgJgG', 2, 20172777, 0),
(437, '20083439', '$2y$10$hBsXmBtGabtpHzux1BgcwORSzPSllRNs4dV2veGWgUjXcxY.PBWX6', 2, 20083439, 0),
(438, '20172787', '$2y$10$8Cpv11dGjB575h7yDXcIPeSSQB/8kvI3FhsCui3U2jtFt.VPKhw9O', 2, 20172787, 0),
(439, '20097030', '$2y$10$oe9etmI2WzH4SZK4Do/ek.QyPXf6GrWRsGLV2QwCDf3kcSrjQH.JS', 2, 20097030, 0),
(440, '20162338', '$2y$10$VZDlAsVRZU8JXEIfcJG4kehT/r3tz/g7lqfos9cdGTrnpkO.ii7hu', 2, 20162338, 0),
(441, '20161522', '$2y$10$aVYQuiPtgKTUo2iDmdOawuX5dzmYZEgxCxtMqQeTrpQy7NfaOV9JC', 2, 20161522, 0),
(442, '20172778', '$2y$10$YiEEPF8xn1vaAHkY.Uohouwp.SV.JpMhslzkErXon70SCl/4HDU9q', 2, 20172778, 0),
(443, '20097775', '$2y$10$UyH6.pJSetHMs5TZTQaRVuRs5wKAva.SUDAxdTadexN61O8W2PEjW', 2, 20097775, 0),
(444, '20131999', '$2y$10$xbAivZYfxK1PUE9vHrnEWeiaBcrApQRhVUBG7x42nylGTlPr0TR.2', 2, 20131999, 0),
(445, '20164324', '$2y$10$/qQ1VEgOdOa.K0ajIzRrOu.468WTGImg/69XjfAKSEniBmuQzgga2', 2, 20164324, 0),
(446, '20162351', '$2y$10$3ePZ46jfSgaB6mA68prTiOmKtPM5aGCFX9cruvH7fFrBvrguYB4cq', 2, 20162351, 0),
(447, '20131601', '$2y$10$Ykd7GXf/k81PD02l1z7KhOSZpIEOthSwNQuEJUcaSiWHaP/CEBweK', 2, 20131601, 0),
(448, '19990724', '$2y$10$3YRvhegweToLnH3j0OnIHOanjA.nBwM1z54CT5dSxQSdR.goTLOgO', 2, 19990724, 0),
(449, '20081682', '$2y$10$kFq.jQWjX3SoPSaDZhFKP.Si7AqtWmEgqjG5T.6rtpfVlCnqKRE6C', 2, 20081682, 0),
(450, '72034065', '$2y$10$MYU4cST5hOMA8Cd.Zk7xZeOVP4S.fOQofMMfy2inRzA2O3D.R4s8O', 3, 72034065, 0),
(451, '67349825', '$2y$10$8RO7307MAVr2Z7dwtGPHROieG65JMSDp9QA.jksLfy5gBAXrxxpeu', 3, 67349825, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno_curso`
--
ALTER TABLE `alumno_curso`
  ADD PRIMARY KEY (`alumno_curso_id`),
  ADD UNIQUE KEY `alumno_curso_id_UNIQUE` (`alumno_curso_id`),
  ADD KEY `fk_alumno_curso_persona_idx` (`alumno_cursoc_alumno_id`),
  ADD KEY `fk_alumno_curso_curso_idx` (`alumno_curso_curso_id`);

--
-- Indices de la tabla `comentarios_docente`
--
ALTER TABLE `comentarios_docente`
  ADD PRIMARY KEY (`comentarios_docente_id`),
  ADD UNIQUE KEY `comentarios_docente_id_UNIQUE` (`comentarios_docente_id`),
  ADD KEY `fk_comentarios_docente_idx` (`comentarios_docente_docente_id`),
  ADD KEY `fk_comentarios_alumno_idx` (`comentarios_docente_alumno_id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`curso_id`),
  ADD UNIQUE KEY `curso_id_UNIQUE` (`curso_id`),
  ADD KEY `fk_curso_malla_idx` (`curso_malla_id`);

--
-- Indices de la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  ADD PRIMARY KEY (`docente_curso_id`),
  ADD UNIQUE KEY `docente_curso_id_UNIQUE` (`docente_curso_id`),
  ADD KEY `fk_docente_curso_persona_idx` (`docente_curso_docente_id`),
  ADD KEY `fk_docente_curso_curso_idx` (`docente_curso_curso_id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`libro_id`),
  ADD UNIQUE KEY `libro_id_UNIQUE` (`libro_id`),
  ADD KEY `fk_libro_tipo_libro_idx` (`libro_tipo`);

--
-- Indices de la tabla `malla_curricular`
--
ALTER TABLE `malla_curricular`
  ADD PRIMARY KEY (`malla_curricular_id`),
  ADD UNIQUE KEY `malla_curricular_id_UNIQUE` (`malla_curricular_id`);

--
-- Indices de la tabla `nota_promedio`
--
ALTER TABLE `nota_promedio`
  ADD PRIMARY KEY (`nota_promedio_id`),
  ADD KEY `fk_nota_promedio_persona_idx` (`nota_promedio_alumno_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`persona_id`),
  ADD UNIQUE KEY `alumno_id_UNIQUE` (`persona_id`),
  ADD KEY `fk_persona_tipo_persona_idx` (`persona_tipo_id`),
  ADD KEY `fk_persona_malla_idx` (`persona_malla`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`prestamo_id`),
  ADD UNIQUE KEY `prestamo_id_UNIQUE` (`prestamo_id`),
  ADD KEY `fk_prestamo_libro_idx` (`prestamo_libro_id`),
  ADD KEY `fk_prestamo_persona_idx` (`prestamo_persona_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`),
  ADD UNIQUE KEY `rol_id_UNIQUE` (`rol_id`);

--
-- Indices de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  ADD PRIMARY KEY (`tipo_libro_id`),
  ADD UNIQUE KEY `tipo_libro_id_UNIQUE` (`tipo_libro_id`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`tipo_persona_id`),
  ADD UNIQUE KEY `docente_id_UNIQUE` (`tipo_persona_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `fk_usuario_alumno_idx` (`usuario_persona_id`),
  ADD KEY `fk_usuario__rol_idx` (`usuario_rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno_curso`
--
ALTER TABLE `alumno_curso`
  MODIFY `alumno_curso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios_docente`
--
ALTER TABLE `comentarios_docente`
  MODIFY `comentarios_docente_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  MODIFY `docente_curso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `libro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `malla_curricular`
--
ALTER TABLE `malla_curricular`
  MODIFY `malla_curricular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nota_promedio`
--
ALTER TABLE `nota_promedio`
  MODIFY `nota_promedio_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `prestamo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  MODIFY `tipo_libro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `tipo_persona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_curso`
--
ALTER TABLE `alumno_curso`
  ADD CONSTRAINT `fk_alumno_curso_curso` FOREIGN KEY (`alumno_curso_curso_id`) REFERENCES `curso` (`curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_curso_persona` FOREIGN KEY (`alumno_cursoc_alumno_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios_docente`
--
ALTER TABLE `comentarios_docente`
  ADD CONSTRAINT `fk_comentarios_alumno` FOREIGN KEY (`comentarios_docente_alumno_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_docente` FOREIGN KEY (`comentarios_docente_docente_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_malla` FOREIGN KEY (`curso_malla_id`) REFERENCES `malla_curricular` (`malla_curricular_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  ADD CONSTRAINT `fk_docente_curso_curso` FOREIGN KEY (`docente_curso_curso_id`) REFERENCES `curso` (`curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docente_curso_persona` FOREIGN KEY (`docente_curso_docente_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_libro_tipo_libro` FOREIGN KEY (`libro_tipo`) REFERENCES `tipo_libro` (`tipo_libro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_malla` FOREIGN KEY (`persona_malla`) REFERENCES `malla_curricular` (`malla_curricular_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_tipo_persona` FOREIGN KEY (`persona_tipo_id`) REFERENCES `tipo_persona` (`tipo_persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_prestamo_libro` FOREIGN KEY (`prestamo_libro_id`) REFERENCES `libro` (`libro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamo_persona` FOREIGN KEY (`prestamo_persona_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario__rol` FOREIGN KEY (`usuario_rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_alumno` FOREIGN KEY (`usuario_persona_id`) REFERENCES `persona` (`persona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
