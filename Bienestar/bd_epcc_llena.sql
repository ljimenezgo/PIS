-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2018 a las 20:19:58
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
(22, '2012SS', 'SISTEMAS DE SEGURIDAD', 9, 0),
(23, '2015SCC', 'SISTEMAS DE SEGURIDAD CRITICA', 9, 0),
(24, '2015GES', 'GESTION DE EMPRENDIMIENTO DE SOFTWARE', 9, 0);

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
  `libro_cantidad_disponible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(9, 'epcc2023', 2023);

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
  `persona_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`persona_id`, `persona_nombres`, `persona_apellido1`, `persona_apellido2`, `persona_tipo_id`, `persona_dni`, `persona_cui`, `persona_direccion`, `persona_email`, `persona_telefono`, `persona_malla`, `persona_seccion`, `persona_estado`) VALUES
(20023443, ' JOSE ALONSO', 'ARENAS', 'LAJO', 2, NULL, '20023443', 'DIREC56', 'jarenasl@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20043566, ' SONIA FATIMA', 'CCALLO', 'QUISPE', 2, NULL, '20043566', 'DIREC150', 'sccalloq@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20051144, ' LUIS GIANCARLO', 'CALLA', 'HUANCA', 2, NULL, '20051144', 'DIREC108', 'lcalla@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20061390, ' OMAR FELIX', 'ARCE', 'PAREDES', 2, NULL, '20061390', 'DIREC52', 'oarce@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20073666, ' DAVID DANIEL', 'CAHUANA', 'CONDORI', 2, NULL, '20073666', 'DIREC99', 'dcahuanaco@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20082100, ' AUGUSTO MIGUEL', 'BARRIGA', 'SALAZAR', 2, NULL, '20082100', 'DIREC80', 'abarrigas@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20083432, ' WILBER HUMBERTO', 'ARROSQUIPA', 'QUISPE', 2, NULL, '20083432', 'DIREC64', 'warrosquipa@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20083439, ' JOSE ISAIAS', 'CHAMBI', 'CHAMBI', 2, NULL, '20083439', 'DIREC170', 'jchambicha@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20084684, ' RENATO JESUS', 'ABARCA', 'ROJAS', 2, NULL, '20084684', 'DIREC2', 'rabarcaro@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20084703, ' JERIBAL EDSON', 'CANO', 'LAYME', 2, NULL, '20084703', 'DIREC121', 'jcanola@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20091808, ' CAROLINA DEL ROSARIO', 'ALVAREZ', 'RAMOS', 2, NULL, '20091808', 'DIREC30', 'calvarezr@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20097030, ' CESAR EDGAR', 'CHAMBI', 'HUANCACHOQUE', 2, NULL, '20097030', 'DIREC172', 'cchambih@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20097677, ' ISABEL MILAGROS', 'ALVAREZ', 'CABANA', 2, NULL, '20097677', 'DIREC26', 'ialvarezc@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20097731, ' SOLEDAD', 'AQUEPUCHO', 'CRUZ', 2, NULL, '20097731', 'DIREC47', 'saquepuchoc@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20097753, ' SHARLY ERIKA', 'ACOSTA', 'PERCA', 2, NULL, '20097753', 'DIREC8', 'sacosta@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20097832, ' SONIA', 'CASTILLO', 'OCHOCHOQUE', 2, NULL, '20097832', 'DIREC140', 'scastilloo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20100052, ' JUAN EDWIN', 'ARELA', 'CHARAHUA', 2, NULL, '20100052', 'DIREC54', 'jarelac@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20100368, ' EDWIN CESAR', 'CANAHUIRE', 'HINOJOSA', 2, NULL, '20100368', 'DIREC119', 'ecanahuire@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20101516, ' LUIS ANGEL', 'BARRIOS', 'LIPA', 2, NULL, '20101516', 'DIREC81', 'lbarriosl@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20101651, ' JOSE FRANCISCO', 'BEDREGAL', 'CACERES', 2, NULL, '20101651', 'DIREC86', 'jbedregalca@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20102506, ' YENY', 'AROCUTIPA', 'INCACUTIPA', 2, NULL, '20102506', 'DIREC60', 'yarocutipa@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20102578, ' CAROL MILENA', 'CAHUAYA', 'DEL CASTILLO', 2, NULL, '20102578', 'DIREC102', 'ccahuayad@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20102600, ' ALEX SEVERO', 'ARUCUTIPA', 'QUISPE', 2, NULL, '20102600', 'DIREC65', 'aarucutipa@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20102673, ' LUIS ENRIQUE', 'BENAVENTE', 'MOLLO', 2, NULL, '20102673', 'DIREC87', 'lbenaventemo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20103121, ' JULIO CESAR', 'CACERES', 'SOLIS', 2, NULL, '20103121', 'DIREC98', 'jcaceressol@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20103826, ' ERIKA ELIZABETH', 'CARDENA', 'HUAMAN', 2, NULL, '20103826', 'DIREC126', 'ecardenah@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20103984, ' LUIS CARLOS', 'CERVANTES', 'GUTIERREZ', 2, NULL, '20103984', 'DIREC162', 'lcervantesgu@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20104271, ' ROCIO RAQUEL', 'AGUILAR', 'MEDINA', 2, NULL, '20104271', 'DIREC12', 'raguilarme@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121439, ' JOSE LUIS', 'APAZA', 'EVEDOS', 2, NULL, '20121439', 'DIREC41', 'japazaev@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121696, ' CRISTHIAN LUIS', 'ANCCO', 'HALANOCCA', 2, NULL, '20121696', 'DIREC37', 'canccoh@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121712, ' MICAELA ESTEFANIA', 'BACA', 'CORNEJO', 2, NULL, '20121712', 'DIREC74', 'mbacaco@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121913, ' LESTER ERICK', 'CALLI', 'MAMANI', 2, NULL, '20121913', 'DIREC112', 'lcalli@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121930, ' FREDDY EDUARDO', 'AGUILAR', 'SANCHEZ', 2, NULL, '20121930', 'DIREC13', 'faguilarsa@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121945, ' MARIA MERCEDES', 'ALCA', 'MACHACA', 2, NULL, '20121945', 'DIREC16', 'malca@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121946, ' ELVIS FERNANDO', 'ALVAREZ', 'SULLCA', 2, NULL, '20121946', 'DIREC31', 'ealvarezs@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121948, ' PAMELA ANGELICA', 'CARCAMO', 'CASTANEDA', 2, NULL, '20121948', 'DIREC124', 'pcarcamo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121964, ' ANGEL IGNACIO', 'BENITO', 'VALERO', 2, NULL, '20121964', 'DIREC88', 'abenito@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121965, ' GRETHEL GUADALUPE', 'CAMA', 'PIZARRO', 2, NULL, '20121965', 'DIREC117', 'gcamapi@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20121985, ' DANIELA VICTORIA', 'AGUEDO', 'LAZO', 2, NULL, '20121985', 'DIREC10', 'daguedo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20122143, ' AYRTON FRANCO', 'ANDIA', 'HUAYHUA', 2, NULL, '20122143', 'DIREC40', 'aandiah@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20122889, ' VANESSA', 'CARRION', 'PACCO', 2, NULL, '20122889', 'DIREC136', 'vcarrion@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20123338, ' MILUSKA VANESSA', 'AUCATINCO', 'PINTO', 2, NULL, '20123338', 'DIREC69', 'maucatinco@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20123999, ' VICTOR IGOR', 'CAMPOS', 'FALCONI', 2, NULL, '20123999', 'DIREC118', 'vcamposf@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20124012, ' MARITZA MARISELA', 'CAYO', 'QUISPE', 2, NULL, '20124012', 'DIREC149', 'mcayoq@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20124013, ' DIANA', 'BOBADILLA', 'LUQUE', 2, NULL, '20124013', 'DIREC89', 'dbobadilla@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20131706, ' YONY JEANKARLO VLADIMIRO', 'CASTILLO', 'BARREDA', 2, NULL, '20131706', 'DIREC138', 'ycastillo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20131947, ' ANGELA GIANINNA', 'CALAPUJA', 'GUEVARA', 2, NULL, '20131947', 'DIREC104', 'acalapujag@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20131955, ' KRESSLY MAILYN', 'BUTILER', 'VELASQUEZ', 2, NULL, '20131955', 'DIREC95', 'kbutiler@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20131956, ' CONNIE MARIANA', 'BOLANOS', 'BEGAZO', 2, NULL, '20131956', 'DIREC90', 'cbolanosbe@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20131959, ' PAMELA JUDITH', 'CASTANEDA', 'TAIPE', 2, NULL, '20131959', 'DIREC137', 'pcastanedat@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20131978, ' HECTOR EDUARDO', 'BARRIGA', 'NEIRA', 2, NULL, '20131978', 'DIREC79', 'hbarrigan@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20131980, ' LAURIE ELIZABETH', 'ARCE', 'LEON', 2, NULL, '20131980', 'DIREC51', 'larcele@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20131986, ' DEBBY ALEJANDRA', 'CCAPA', 'AQUINO', 2, NULL, '20131986', 'DIREC155', 'dccapaa@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20131993, ' KELLY ALLISON', 'CCARI', 'BUSTINZA', 2, NULL, '20131993', 'DIREC156', 'kccarib@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20132016, ' ZULLY MARTHA', 'ABARCA', 'CASTRO', 2, NULL, '20132016', 'DIREC1', 'zabarca@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20132586, ' JORGE RONAL', 'CARCAUSTO', 'GOMEZ', 2, NULL, '20132586', 'DIREC125', 'jcarcaustogo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20132593, ' KATHERINE BLANCA', 'AGRAMONTE', 'APAZA', 2, NULL, '20132593', 'DIREC9', 'kagramonte@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20134012, ' DEYSY EDITH', 'ATENCIO', 'VILCARANA', 2, NULL, '20134012', 'DIREC68', 'datenciov@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20134015, ' KELY', 'CASTRO CUBA', 'CHECYA', 2, NULL, '20134015', 'DIREC142', 'kcastrocuba@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20134020, ' MINERVA', 'ALEJO', 'CHUQUITAYPE', 2, NULL, '20134020', 'DIREC18', 'malejoch@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20134031, ' LAURA JIMENA', 'APAZA', 'QUISPE', 2, NULL, '20134031', 'DIREC44', 'lapazaq@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20134039, ' CAROL GESSIRA', 'ACHAHUI', 'TAYPE', 2, NULL, '20134039', 'DIREC6', 'cachahui@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20140255, ' JOSE ALBERTO', 'ALMIRON', 'RODRIGUEZ', 2, NULL, '20140255', 'DIREC21', 'jalmironr@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141213, ' YONATHAN ESTEFAN', 'BAUTISTA', 'CARRASCO', 2, NULL, '20141213', 'DIREC82', 'ybautista@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141942, ' LAURA HILDA IRIS', 'CASTRO', 'CORIMAYA', 2, NULL, '20141942', 'DIREC144', 'lcastro@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141952, ' MELANIE DEL PILAR', 'ALARCON', 'AGUERO', 2, NULL, '20141952', 'DIREC14', 'malarcon@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141956, ' STEPHANY NAZAYDA', 'CALIZAYA', 'ORTIZ', 2, NULL, '20141956', 'DIREC106', 'scalizayao@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141964, ' JUAN ALBERTO', 'CCAMA', 'VARGAS', 2, NULL, '20141964', 'DIREC152', 'jccamav@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141969, ' GEANPIEER CARLO', 'BRAVO', 'GARCIA', 2, NULL, '20141969', 'DIREC93', 'gbravo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141974, ' ABNER EDUARDO', 'ANCALLE', 'LLALLERCO', 2, NULL, '20141974', 'DIREC36', 'aancallel@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141977, ' MARX LENIN', 'BARRETO', 'SALCEDO', 2, NULL, '20141977', 'DIREC78', 'mbarretos@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141979, ' DIEGO ARMANDO', 'CAHUANA', 'LLACHO', 2, NULL, '20141979', 'DIREC100', 'dcahuanal@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141987, ' PERLA MARIA', 'CCAMA', 'SALAZAR', 2, NULL, '20141987', 'DIREC151', 'pccamas@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20141998, ' MARIA ALEJANDRA', 'CARPIO', 'ALVARO', 2, NULL, '20141998', 'DIREC132', 'mcarpioal@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20142012, ' ALEXANDRA', 'AGUILAR', 'CHURA', 2, NULL, '20142012', 'DIREC11', 'aaguilarchu@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20142015, ' ANA LUCIA', 'AYBAR', 'RAMOS', 2, NULL, '20142015', 'DIREC70', 'aaybar@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20142016, ' INGRID MILAGROS', 'CCANAHUIRI', 'PRIETTO', 2, NULL, '20142016', 'DIREC154', 'iccanahuiri@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20142027, ' ANTHONY JAHIR', 'CARDENAS', 'BARRIONUEVO', 2, NULL, '20142027', 'DIREC127', 'acardenasb@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20142599, ' BLANCA', 'ALVAREZ', 'BUENO', 2, NULL, '20142599', 'DIREC25', 'balvarez@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20142600, ' SILVIA', 'AYMACHOQUE', 'CCALLA', 2, NULL, '20142600', 'DIREC73', 'saymachoquec@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20142603, ' GUSTAVO', 'CALLAPINA', 'DIAZ', 2, NULL, '20142603', 'DIREC110', 'gcallapina@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20142605, ' CARLOS ALBERTO', 'APAZA', 'MENDOZA', 2, NULL, '20142605', 'DIREC42', 'capazam@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20143605, ' GLENY MILAGROS', 'ANAMURO', 'QUISPE', 2, NULL, '20143605', 'DIREC34', 'ganamuro@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20144145, ' ROSY MARY', 'CAHUANIHANCO', 'CAHUANA', 2, NULL, '20144145', 'DIREC101', 'rcahuanihanco@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20144462, ' KARLA ANDREA', 'CALERO', 'GUTIERREZ', 2, NULL, '20144462', 'DIREC105', 'kcalero@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20151885, ' ROMULO', 'ANAYA', 'CHIPA', 2, NULL, '20151885', 'DIREC35', 'ranaya@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152101, ' RUBEN ALONSO', 'CAHUINA', 'QUISPE', 2, NULL, '20152101', 'DIREC103', 'rcahuinaqui@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152106, ' LUSMILA ESTEFANY', 'CCORA', 'HUILLCA', 2, NULL, '20152106', 'DIREC159', 'lccora@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152132, ' LIZBETH ESTHER', 'ALVAREZ', 'JARITA', 2, NULL, '20152132', 'DIREC29', 'lalvarezj@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152133, ' GLENYS MERCEDES', 'AMEZQUITA', 'VELAVELA', 2, NULL, '20152133', 'DIREC32', 'gamezquita@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152137, ' ERIKA ESPERANZA', 'ASTETE', 'ZAMATA', 2, NULL, '20152137', 'DIREC67', 'eastete@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152142, ' RUTH MARIA', 'BAUTISTA', 'PARICAHUA', 2, NULL, '20152142', 'DIREC85', 'rbautistap@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152144, ' JHON JHAYNOR', 'CCAMERCCOA', 'LLAIQUE', 2, NULL, '20152144', 'DIREC153', 'jccamerccoal@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152148, ' JULIO CESAR ENRIQUE', 'CATERIANO', 'DELGADO', 2, NULL, '20152148', 'DIREC146', 'jcateriano@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152155, ' YOEL ANDRES', 'CAPIA', 'GUTIERREZ', 2, NULL, '20152155', 'DIREC122', 'ycapia@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152159, ' ELIZABETH XIOMARA', 'CHALLCO', 'CORONEL', 2, NULL, '20152159', 'DIREC168', 'echallcoc@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152167, ' JOHAN ALEXIS', 'ACASIETE', 'CONZA', 2, NULL, '20152167', 'DIREC4', 'jacasietec@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152169, ' GABRIELA LUCIA', 'CALLE', 'CANASAS', 2, NULL, '20152169', 'DIREC111', 'gcalle@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152174, ' DALESKA MIRYAM', 'CARAZAS', 'RIOS', 2, NULL, '20152174', 'DIREC123', 'dcarazasr@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152176, ' JUAN CARLOS', 'CALLA', 'CHAMBI', 2, NULL, '20152176', 'DIREC107', 'jcallac@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152763, ' SUSAN ALEXANDRA', 'BAUTISTA', 'MAMANI', 2, NULL, '20152763', 'DIREC84', 'sbautistam@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152766, ' CESAR AUGUSTO', 'ARENAS', 'RODRIGUEZ', 2, NULL, '20152766', 'DIREC57', 'carenasro@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20152769, ' GIANCARLO AMERICO', 'CARPIO', 'PALACIOS', 2, NULL, '20152769', 'DIREC133', 'gcarpio@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20154352, ' PILAR LILIANA', 'ARIAS', 'RODRIGUEZ', 2, NULL, '20154352', 'DIREC58', 'pariasr@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20154353, ' JESUS GONZALO', 'CARI', 'TAPARA', 2, NULL, '20154353', 'DIREC131', 'jcarit@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20154361, ' BRENDA ESMERALDA', 'CERPA', 'JIMENEZ', 2, NULL, '20154361', 'DIREC161', 'bcerpa@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20154378, ' CINDY YUDITH', 'CALLA', 'JILAPA', 2, NULL, '20154378', 'DIREC109', 'ccallaj@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20154384, ' YEYMI SUGEY', 'CARDENAS', 'ROMERO', 2, NULL, '20154384', 'DIREC130', 'ycardenas@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161473, ' JACQUELINE DARIELA', 'CAYLLAHUA', 'RODRIGUEZ', 2, NULL, '20161473', 'DIREC148', 'jcayllahuar@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161475, ' YENI', 'CHAHUAYO', 'SOSA', 2, NULL, '20161475', 'DIREC166', 'ychahuayo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161479, ' ELIOS RODRIGO', 'BORJA', 'BAUTISTA', 2, NULL, '20161479', 'DIREC91', 'eborja@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161490, ' ARLEY ANA MARIA', 'ACEITUNA', 'ALE', 2, NULL, '20161490', 'DIREC5', 'aaceituna@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161492, ' CLAUDIA ROSA', 'AYESTAS', 'PORTUGAL', 2, NULL, '20161492', 'DIREC72', 'cayestas@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161503, ' ARACELI JANET', 'ALARCON', 'VIZCARDO', 2, NULL, '20161503', 'DIREC15', 'aalarconv@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161513, ' JAMIL RICKY', 'APAZA', 'TINTAYA', 2, NULL, '20161513', 'DIREC46', 'japazati@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161514, ' SHARON KAMERON', 'CASTRO', 'PINARES', 2, NULL, '20161514', 'DIREC145', 'scastrop@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161515, ' SHARON IVONNE', 'BARREDA', 'MARTINEZ', 2, NULL, '20161515', 'DIREC76', 'sbarredam@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161526, ' JESSICA SONIA', 'ANDAHUA', 'CHUNGA', 2, NULL, '20161526', 'DIREC39', 'jandahuac@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20161527, ' ALMENDRA ANAIST', 'ASCUE', 'JARA', 2, NULL, '20161527', 'DIREC66', 'aascuej@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20162331, ' GABRIEL ERNESTO', 'AMEZQUITA', 'VERA', 2, NULL, '20162331', 'DIREC33', 'gamezquitav@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20162337, ' YAKIMA ALONSO', 'ALPACA', 'ROJAS', 2, NULL, '20162337', 'DIREC22', 'yalpacar@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20162343, ' NIKOLE ROSARIO', 'CASTILLO', 'CAMA', 2, NULL, '20162343', 'DIREC139', 'ncastilloca@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20162344, ' MARILYN NORDY', 'BAUTISTA', 'CONDORI', 2, NULL, '20162344', 'DIREC83', 'mbautistac@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20162354, ' YSABEL ERIKA', 'ALCCAHUAMAN', 'QUISPE', 2, NULL, '20162354', 'DIREC17', 'yalccahuaman@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20164309, ' BRYAN RODOLFO', 'ALVAREZ', 'ARENAS', 2, NULL, '20164309', 'DIREC24', 'balvarezar@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20164313, ' MAURICIO ALONZO', 'CARRILLO', 'COAGUILA', 2, NULL, '20164313', 'DIREC135', 'mcarrilloc@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20164319, ' DANA ALISON', 'BUENO', 'PASTOR', 2, NULL, '20164319', 'DIREC94', 'dbuenop@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20164330, ' NIEVES YULIZA', 'CALSINA', 'LOPEZ', 2, NULL, '20164330', 'DIREC115', 'ncalsina@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20164339, ' ESTRELLA DE MARIA SARAHI', 'CABREJO', 'BARRIOS', 2, NULL, '20164339', 'DIREC96', 'ecabrejo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20164343, ' JOSE FERNANDO', 'CARRERA', 'MOLINA', 2, NULL, '20164343', 'DIREC134', 'jcarrera@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20164348, ' CHASKA', 'CASTRO CUBA', 'VEGA', 2, NULL, '20164348', 'DIREC143', 'ccastrocuba@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20164354, ' DANNA SHESIRA', 'ANCO', 'QUILCA', 2, NULL, '20164354', 'DIREC38', 'danco@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171436, ' OSCAR DANIEL', 'CARDENAS', 'CARLOSVIZA', 2, NULL, '20171436', 'DIREC128', 'ocardenas@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171448, ' VALERIA EMILY', 'ALVAREZ', 'ILASACA', 2, NULL, '20171448', 'DIREC28', 'valvarezi@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171450, ' NOHELIA NATHALY', 'CHAHUAYO', 'CARDENAS', 2, NULL, '20171450', 'DIREC165', 'nchahuayo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171451, ' CESAR AUGUSTO', 'AYBAR', 'RAMOS', 2, NULL, '20171451', 'DIREC71', 'caybarr@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171452, ' LUIS ALBERTO', 'CCUITO', 'VARGAS', 2, NULL, '20171452', 'DIREC160', 'lccuito@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171454, ' LUIS FERNANDO', 'APAZA', 'QUISPE', 2, NULL, '20171454', 'DIREC45', 'lapazaquisp@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171464, ' JUAN GONZALO', 'CANAZA', 'CUSIHUAMAN', 2, NULL, '20171464', 'DIREC120', 'jcanazac@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171465, ' RODRIGO DILVERT', 'CALLOAPAZA', 'QUICO', 2, NULL, '20171465', 'DIREC114', 'rcalloapaza@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171468, ' JESSICA LAURA', 'CAMA', 'CORDOVA', 2, NULL, '20171468', 'DIREC116', 'jcamaco@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171471, ' ESTEFANY ZARAI', 'CASTILLO', 'PAREDES', 2, NULL, '20171471', 'DIREC141', 'ecastillo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171472, ' GENSI ANALI', 'CARDENAS', 'RAMIREZ', 2, NULL, '20171472', 'DIREC129', 'gcardenasr@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171474, ' XIMENA', 'ARAGON', 'CHICATA', 2, NULL, '20171474', 'DIREC50', 'xaragon@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171481, ' JUDITH LIZBETH', 'CALLO', 'ROJAS', 2, NULL, '20171481', 'DIREC113', 'jcallor@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171488, ' LIZBETH', 'ALEJO', 'LLAVE', 2, NULL, '20171488', 'DIREC19', 'lalejo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171491, ' MIJAEL FLORENCIO', 'ARQQUE', 'EUGENIO', 2, NULL, '20171491', 'DIREC63', 'marqquee@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171493, ' KEYMER PATRICIA', 'ABRIL', 'SANCHEZ', 2, NULL, '20171493', 'DIREC3', 'kabril@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20171494, ' RENATO ANDRE', 'ALIAGA', 'CHAVEZ', 2, NULL, '20171494', 'DIREC20', 'raliagach@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20172764, ' ENMA THALIA', 'CHACARA', 'CONDORI', 2, NULL, '20172764', 'DIREC163', 'echacara@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20172777, ' HERMELINDA', 'CHALLCO', 'CUTIRE', 2, NULL, '20172777', 'DIREC169', 'hchallco@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20172787, ' DANIELA ALESANDRA', 'CHAMBI', 'CRUZ', 2, NULL, '20172787', 'DIREC171', 'dchambicr@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20172789, ' BETSY DAYANA', 'ARISMENDI', 'SUMARIA', 2, NULL, '20172789', 'DIREC59', 'barismendi@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20172795, ' DANIELA BRENDA', 'ACOSTA', 'LAURA', 2, NULL, '20172795', 'DIREC7', 'dacosta@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20172800, ' AGUSTA', 'CACERES', 'QQUECCA', 2, NULL, '20172800', 'DIREC97', 'acaceresqq@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20172802, ' ANGELA MILUSKA', 'ARENAS', 'DAVILA', 2, NULL, '20172802', 'DIREC55', 'aarenasd@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20172808, ' MARCO SEBASTIAN', 'BORJA', 'CISNEROS', 2, NULL, '20172808', 'DIREC92', 'mborjaci@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174009, ' YOEL MESIAS', 'CCOPA', 'QUISPE', 2, NULL, '20174009', 'DIREC158', 'yccopa@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174011, ' ALEX', 'BARRETO', 'POMA', 2, NULL, '20174011', 'DIREC77', 'abarretop@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174016, ' LEONELA KARINA', 'AQUINO', 'MAMAMI', 2, NULL, '20174016', 'DIREC48', 'laquino@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174017, ' FRANCISCO ANTONIO', 'APAZA', 'PARRA', 2, NULL, '20174017', 'DIREC43', 'fapazap@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174021, ' BRYAN SCOTT', 'CHACON', 'CHAVEZ', 2, NULL, '20174021', 'DIREC164', 'bchaconc@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174028, ' CARLOS DANIEL', 'BALDARRAGO', 'DEZA', 2, NULL, '20174028', 'DIREC75', 'cbaldarragod@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174030, ' FABRICIO SEBASTIAN', 'CHALCO', 'CHALLA', 2, NULL, '20174030', 'DIREC167', 'fchalcoc@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174033, ' VIDAL VICENTE', 'AROTAIPE', 'CHAUPI', 2, NULL, '20174033', 'DIREC62', 'varotaipe@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174035, ' ALLISON BRIGGITH', 'AQUINO', 'TICONA', 2, NULL, '20174035', 'DIREC49', 'aaquinot@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174037, ' KAREN SOFIA', 'CATUNTA', 'CAYO', 2, NULL, '20174037', 'DIREC147', 'kcatuntac@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174043, ' LUIS KLEIBER', 'CCASA', 'MELENDEZ', 2, NULL, '20174043', 'DIREC157', 'lccasa@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174044, ' JOSE MANUEL', 'AROSQUIPA', 'RODRIGO', 2, NULL, '20174044', 'DIREC61', 'jarosquiparo@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174046, ' GIOVANNA', 'ARCOS', 'PAREDES', 2, NULL, '20174046', 'DIREC53', 'garcos@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174051, ' SUJEYS YOSELYN', 'ALVARADO', 'LOPEZ', 2, NULL, '20174051', 'DIREC23', 'salvarado@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20174060, ' ARELI ESTHER', 'ALVAREZ', 'CONDE', 2, NULL, '20174060', 'DIREC27', 'aalvarezco@unsa.edu.pe', '54123456', NULL, NULL, 0),
(20204948, 'ARACELY', 'CHUA', 'BERBEN', 2, NULL, '20204948', 'La direccion va aquÃ­', 'jparodic@unsa.edu.pe', '932993', NULL, NULL, 0),
(21204948, 'ANTONELLA', 'CHUA', 'BERBEN', 2, NULL, '21204948', 'La direccion va aquÃ­', 'jparodic@unsa.edu.pe', '932993', NULL, NULL, 0),
(23948932, 'JUAN', 'PARODI', 'CANO', 3, '23948932', NULL, 'La direccion va aquÃ­', 'jparodic@unsa.edu.pe', '993478345', NULL, NULL, 0),
(72034061, 'ADMINISTRADOR', 'ADMINISTRADOR', 'ADMINISTRADOR', 1, '72034061', NULL, '', '', '', NULL, NULL, 0);

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
  `prestamo_fecha_devolucion` timestamp NULL DEFAULT NULL
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
(3, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_libro`
--

CREATE TABLE `tipo_libro` (
  `tipo_libro_id` int(11) NOT NULL,
  `tipo_libro_dsc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, 'Profesor');

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
(544, '20204948', '$2y$10$G8lHU6TO8jDbxKiAfWEK3eI2ICyRSdFZeivjrHU8g67l6h3YVDpgO', 2, 20204948, 0),
(545, '21204948', '$2y$10$XfX/HOwz/63PrNFricoT2eTU8D04Pz21lqz3cPJiiR57.FZyylHCC', 2, 21204948, 0),
(546, '20132016', '$2y$10$.UPeejhIXCev3kbpbOK61uKwt0cVOkZNpUm0LSqA2h7yB0/xrArPa', 2, 20132016, 0),
(547, '20084684', '$2y$10$MEfg0Np3MFCMtXGuZklP8eNnGlzwxK4ANQSb7wxaiM2C7AswvC0ny', 2, 20084684, 0),
(548, '20171493', '$2y$10$HqUy.GLvFxEjTbQVn1ND0OBrew5H3CEFqEhIGyEacovJjUL10PZRq', 2, 20171493, 0),
(549, '20152167', '$2y$10$FcTyy7bQmNkDYMpFKTxIJezzOW2rgXV5Cfvc/aWvTiw7DpbuJ8z2C', 2, 20152167, 0),
(550, '20161490', '$2y$10$v0r0ZhTfJxwLepeBmH20vezBioUAUudr8p5NBILWHGViMwzPQL7Ki', 2, 20161490, 0),
(551, '20134039', '$2y$10$Le0453o6dxMQkp/I5C7Zru4UrJtI0Ll6HPnpA3zqZ0vVGaC0SomrK', 2, 20134039, 0),
(552, '20172795', '$2y$10$P1RLphSuIJTXSkLrHXkqWef2gZIQCqw40wtbK7Ubt7.IkoGSIztru', 2, 20172795, 0),
(553, '20097753', '$2y$10$g2rmIDMyuAqCW0HSijfqFuoTFCgC0qmLap6o2f0e73pyN5sQ65slm', 2, 20097753, 0),
(554, '20132593', '$2y$10$Dz/O0ikj.G/89E4/8k/YdeVRbwDXcvpx1DgRGzXMhSvk5mwLWgLsm', 2, 20132593, 0),
(555, '20121985', '$2y$10$odpvaYypqmN910TmvDwzF./s0DlLv2H2FQveQks0msLCPflglYtsK', 2, 20121985, 0),
(556, '20142012', '$2y$10$ne2zG6aJLjSkRQNnZWqDa.kWvhCxv7Sw3AC2pPCLeAIpNzesBJ03y', 2, 20142012, 0),
(557, '20104271', '$2y$10$5kGeRd4Sh1Pi9rzIwrEjVOSOBm2nk/iHA/feLKlUOCEKkmHnZ9TXq', 2, 20104271, 0),
(558, '20121930', '$2y$10$YXjgBvRlccLWYRvrzwY0l.uS.rZNOgr.yhzvs22S1calU988awMJq', 2, 20121930, 0),
(559, '20141952', '$2y$10$HceZnytfxgBah7YTIdWUoueAQoZcTYb8j8DaSGVY6YC/fJ473mcWy', 2, 20141952, 0),
(560, '20161503', '$2y$10$pHvcirZOPGEsfkCKYS1bFOdF2Lhwy7hXhtyuoROIyeoaohjGUEiKa', 2, 20161503, 0),
(561, '20121945', '$2y$10$fIRKMi.L/HZq18RlYg9gNeLJABlf37Pxq5K.d2sxv02eaYs1q6wKC', 2, 20121945, 0),
(562, '20162354', '$2y$10$Z2B/9hlWK/B0Fhb04a6hV.KeRhNCsgmOkZZ2UakPUUlM8b2pfSqdG', 2, 20162354, 0),
(563, '20134020', '$2y$10$vwJl1zJhfBlgjNy/6qkIXut8FuwGXHzjqVLfGSIL9Wi/zz/dT2a7i', 2, 20134020, 0),
(564, '20171488', '$2y$10$UJT70NTszfilwjxfAAgP/.OmXsgfHhP9hvY1oMsdm8H0DtrirSNAe', 2, 20171488, 0),
(565, '20171494', '$2y$10$QywnWstfWVpujLtYfBYwY.fmF3lOrYS/YyWZwLjOFEWx6NOS/F/Ci', 2, 20171494, 0),
(566, '20140255', '$2y$10$m2x92y7bozi8yZnAIA495.JJxUd4hxisr/mLDcRQ7sr2UstOUbqna', 2, 20140255, 0),
(567, '20162337', '$2y$10$3tzmBqofEKzV.NFmE8xgyexUKk/peeDy2xSYQ.Ub85jIYkIT5Bpt.', 2, 20162337, 0),
(568, '20174051', '$2y$10$2IXwFXJeAzpsohYpaXgWIO79gvnNJuLm.onQdHdWs1xcRraLl8s.q', 2, 20174051, 0),
(569, '20164309', '$2y$10$9rCiN9FGx6.gXwneW.mzM.In7uZ9xhfZ7VLH61YSIaPh7siKVt3ku', 2, 20164309, 0),
(570, '20142599', '$2y$10$fJBsDxq11SRN2xRH0HgYf.9iNO1u9ms9ngJy6Lg7J8MgJCo3nYVD6', 2, 20142599, 0),
(571, '20097677', '$2y$10$th9zwER072rmNuo8kSQWK.r1QYo4UriCiouuccp2zM6vgmBYJnTta', 2, 20097677, 0),
(572, '20174060', '$2y$10$37uZpdBAOIpUyB5zw4p.meqzjkuym3CovvcbyeKeVmvyeWYEekvdG', 2, 20174060, 0),
(573, '20171448', '$2y$10$ra4jmaggchFwakWUwQxI0O27bO4MFI/HXyfCqwkMT/bTuQLUXK0qW', 2, 20171448, 0),
(574, '20152132', '$2y$10$/Nhjp6BaWWR4o09c9pXyNu5yXNYWpe8SoSedN8KQ4prQfhAA1Ij2C', 2, 20152132, 0),
(575, '20091808', '$2y$10$3QYudlOHddwig/sPfkz2G.GMyqhQZkZlIprJWSF4adx38Kuuh5PJa', 2, 20091808, 0),
(576, '20121946', '$2y$10$AYEdxCGL.eFTteZIb9X6/.HzxmW6u9n3/UyIoW3AyFu5TcJYqkB0u', 2, 20121946, 0),
(577, '20152133', '$2y$10$jstXE99/cyJl3ZwRYyHFQ.ctsuJEzubsdHCUgYqzzkgCAOujgO/7S', 2, 20152133, 0),
(578, '20162331', '$2y$10$Z1CbNWvj0CK8.NigP/phXO0T9APs0MAyEHJyx/7fZkQ/Yj/MpJtCe', 2, 20162331, 0),
(579, '20143605', '$2y$10$ubwGd6AfrnS2wUjOoDbQkuMMYG8AN812oBd2naXu9ZyXX8iStihM2', 2, 20143605, 0),
(580, '20151885', '$2y$10$d9DxsOfrKHjWhMfPg/y30.SKfgbOigcF9ETjkOxSvfjM/8XYZjuvC', 2, 20151885, 0),
(581, '20141974', '$2y$10$TvoAE6N97dLSD8IUg0gRZOhN/eCDQ5MzO0rtvpchd7pVZfB2jOrCi', 2, 20141974, 0),
(582, '20121696', '$2y$10$ET.MMhv6Fi4CY/VKNSS/feQcF4UoZQG.Kp7DgEp2oFffGvTKVMwH6', 2, 20121696, 0),
(583, '20164354', '$2y$10$cLWUmuAITLb9WbE/ApThDuf7F7EdkJ1dmCg8x9EsCm/bnlqSicH3e', 2, 20164354, 0),
(584, '20161526', '$2y$10$0XfsJm88kjli7Z62iLn5lO6JfITjEbvbfcbRvnUNd6uUeD8.1Oq8K', 2, 20161526, 0),
(585, '20122143', '$2y$10$Sy1WQu.vlgOOaGzEI8M/juX1WO1oo6MdIP2.fYC1LPpm2MaPHWOyq', 2, 20122143, 0),
(586, '20121439', '$2y$10$df7qyJCW99p.KJQaXli5u.MphplfgyYlap8qHLZxStbMSJMnptVNO', 2, 20121439, 0),
(587, '20142605', '$2y$10$.fdkWARPodqU.X88aNSoA.LYL.FtrnxhJBaNIL53wMhwLr0uqMB0u', 2, 20142605, 0),
(588, '20174017', '$2y$10$sD4UrqzeQwBMHcrvsYlugOiNLHk3Pla1RmWZ9mE4iEIlZ8ruipuGe', 2, 20174017, 0),
(589, '20134031', '$2y$10$piCgBXCxaKIqHicd3DiOLO5ytoScQULP6N9ay7aUGB5u6Ru4xO/bW', 2, 20134031, 0),
(590, '20171454', '$2y$10$0EbrB9YnW7yKSBzhsbwJQ.Xedv1rXeGuNJLEDHDzVOruUjL7IB26a', 2, 20171454, 0),
(591, '20161513', '$2y$10$nKP73EA5uUnCuIxiVsRDHOIU553UyfnSxQkN6coCLwP8WEJHe/cwK', 2, 20161513, 0),
(592, '20097731', '$2y$10$ErUYLFBsU7q0/l8UZRS0gubA5D7bedBNl5ez1G1BSITCCtjlvisy.', 2, 20097731, 0),
(593, '20174016', '$2y$10$9kgX8eNcNeVYII0jz98OBuaJ2QyBWmEnpOwjcQpjZw8zig.9Cbupa', 2, 20174016, 0),
(594, '20174035', '$2y$10$JmA1doi4Y0.pGstJZBmK3.F32pSoyCmTQjwzZdpjGG1J42HmvaV2u', 2, 20174035, 0),
(595, '20171474', '$2y$10$1mUchoNX1lZAymda5dJ2x.6/IRXPhOXbay7UIQvTND1w9XgTnof6m', 2, 20171474, 0),
(596, '20131980', '$2y$10$KnnkbCpoqI/Z8CD/R6H7xueRYaiIvBpEtaPN213Dc/pIJl50Uh0aO', 2, 20131980, 0),
(597, '20061390', '$2y$10$Iz4cVFm47HDI9P59mG/T5eaxJwK8SOEPP2C4QsAE6LL40nFWh9nby', 2, 20061390, 0),
(598, '20174046', '$2y$10$7hdetrj5Rpw5OilEDzb7aujN429JPLjGjQGtrOEDrzS2I2NEw0pDm', 2, 20174046, 0),
(599, '20100052', '$2y$10$OCnKnRFL7RYMzazrAi3PPOxLWBLflhLViHdD6CH2xxp.OFCr6jJ0O', 2, 20100052, 0),
(600, '20172802', '$2y$10$nEafCdsBFouZU87c4vd5r.eqHqtQs01k1zqJ6D8oIUufEJ1HOMEaK', 2, 20172802, 0),
(601, '20023443', '$2y$10$EZZLLJw1PrRSfiA0W3QBqOyR65RLgGDfhn6XfredVGQL10iPCNP1C', 2, 20023443, 0),
(602, '20152766', '$2y$10$0CWGX0iuQKTK6b.Hn6w5IuXOKeHfgS19UlA3h83HKSxYA2bxiNHkC', 2, 20152766, 0),
(603, '20154352', '$2y$10$0wxKyMtHZ89a3blv6KhG.OqiJ397KvAtO1.Zybv0C703eTS/MQgFm', 2, 20154352, 0),
(604, '20172789', '$2y$10$gFF2GQaVncdFXrxlLe.o4.Fm6m7iYuMcte1DfL59c0fr7cDtP7oR.', 2, 20172789, 0),
(605, '20102506', '$2y$10$WKX5zZ.td1bvjBbA13lDj.4JfvaTOdtRe3Fi8LlERZNW9CnZWEveC', 2, 20102506, 0),
(606, '20174044', '$2y$10$6yPixwRS2cBQl08u3urp4uhPcdCdxtQeJ6jvIrPDYTIJRQE5JUhH6', 2, 20174044, 0),
(607, '20174033', '$2y$10$nlGIIk0nocEBKOA2j7fKwu3sOH1yXN73M0tTOC6JI3qVe6HDx3tNi', 2, 20174033, 0),
(608, '20171491', '$2y$10$0VSASxnydL0x4/tlXEl3C.7FSR/z.bFKT0f1bC1UJ9f0hZM.N9yGC', 2, 20171491, 0),
(609, '20083432', '$2y$10$HhYwNlmpo5c4VfLhf0glle.2DDls9rpVfOow/BaPM0Fl8gn5uAHoO', 2, 20083432, 0),
(610, '20102600', '$2y$10$gS5ZsTr2nEQj1jqxiyBIku6hkdPVkXooOHBYm3Rs5dRAaZqhpufZe', 2, 20102600, 0),
(611, '20161527', '$2y$10$U6Z6r47u8otNYQrkSgD7p.hI57dltVAwlRw541uly5HGo8Ri/ythe', 2, 20161527, 0),
(612, '20152137', '$2y$10$rUK/g/0SznLnIp25117mlOHz5vQL6PcHJHelJEcmenuzAXxP1gACa', 2, 20152137, 0),
(613, '20134012', '$2y$10$qUq4/ISRfFu/69QWi0i4guyctYNlSUyscENzPgq/POALhO3k47MZ.', 2, 20134012, 0),
(614, '20123338', '$2y$10$bQgKgSHvfMnWJqm0cbnpZug/3K15JD6HwBRmzoSSxEZl5oSJR3MJ.', 2, 20123338, 0),
(615, '20142015', '$2y$10$O4Hvggl50vEASHqfNH8hGea9yF5Iyta2iUV192VDvrGgq8bOZCyMe', 2, 20142015, 0),
(616, '20171451', '$2y$10$4mIOPrjU7TB0dT4Bv2SGhes.CcYxoFipCaYj.JEgg7nFlppWb1AjC', 2, 20171451, 0),
(617, '20161492', '$2y$10$p1p8WT9/EUczb7Ef0UXubOTcaD.6Zfzd9kToCHMKjkGSTMv7I6CQO', 2, 20161492, 0),
(618, '20142600', '$2y$10$aSKTn0bqKbZ.5VJ5HezaTOw03s8HjkSt9QJHm9bBHKOO2xLavVsJW', 2, 20142600, 0),
(619, '20121712', '$2y$10$IR4UQ9X/JIXhUyHXwv0oauKSGh1/FLuIaQfgGMpO6aqWa4mMORlMO', 2, 20121712, 0),
(620, '20174028', '$2y$10$tlLI/bMb8zpL1YmoP65q6elXGtfyZXlYo15/yVloQ8KOcJiXSKgDe', 2, 20174028, 0),
(621, '20161515', '$2y$10$YQ3pD2Ig5sUGZdqXShxCEuhJEjIuN6gUbBMl5L5sfinj0rx6B/mQG', 2, 20161515, 0),
(622, '20174011', '$2y$10$Kp59oFn7OiCiU243loxxyuALYM31pkHYhzP6YYo2WUDmZ/nN8g9p.', 2, 20174011, 0),
(623, '20141977', '$2y$10$Fkup1veJb8xyeQTg3P1ZnOV3tbLYzUSgMAKAIunKsV29ZL7MoTbdW', 2, 20141977, 0),
(624, '20131978', '$2y$10$TEXUhEtiFxAlWo9tnIN9n.NCEuihtw/PN3sAO1evljDpRBBGqcOcK', 2, 20131978, 0),
(625, '20082100', '$2y$10$vfRRpifJJdfnUdtJ/xK7G.R.pPa2QH3cO3nhRgaFZwpgjxWIKH1NO', 2, 20082100, 0),
(626, '20101516', '$2y$10$E0bH5lZQXG6b9.3bMEm5PeoH9KKplSwtE0.t7QDMlyEEWhGOjFDfC', 2, 20101516, 0),
(627, '20141213', '$2y$10$vu6ILXxkJbg8BP6O65XffuVkcKrrWE824CXxXhkqWvRp.gnLKF/R.', 2, 20141213, 0),
(628, '20162344', '$2y$10$NVcT2lXApgnayTBiX1M8s.TMTLhBMrynhA2GSysk/FcSwR0tUYoRu', 2, 20162344, 0),
(629, '20152763', '$2y$10$2D9XuaEXWVl0t4SyXpegnef/OiBSe4hVd5Mm3HSl5PNUlDH3kNviK', 2, 20152763, 0),
(630, '20152142', '$2y$10$PjBFlEqejZlKfMTkzVSotOYYn4RtNAR9lbR.hODSO028/M17bfoxS', 2, 20152142, 0),
(631, '20101651', '$2y$10$dWnWG7w8/C9MHyglIEssXus0kEZSaUvTWxTmb3PJJIDrf8LOcw0G2', 2, 20101651, 0),
(632, '20102673', '$2y$10$bEgkJJRprbonoX3ChpCM3eXCGiGuGR2d3lXzM7fk8NcfdBEcWutk2', 2, 20102673, 0),
(633, '20121964', '$2y$10$KNInEBuWmAKwxmczwdaWle.Gyus/fkmovm0GoRT3WbJo0i7Kbk88.', 2, 20121964, 0),
(634, '20124013', '$2y$10$INitxkYPrhbXNJF.TMSgr.jExQqmPq/9BsGsJLMjoiQQcvFxOmX8m', 2, 20124013, 0),
(635, '20131956', '$2y$10$Xn.M2uh7ZJyQxJ.CzEfJxeQ/R75NsbX38aSeW7Wy0VGSe9ovP7Tt6', 2, 20131956, 0),
(636, '20161479', '$2y$10$rUxu15FYI9lbhPfjqp3GB.JD1DWVhEwo8k89P4prbrnxkBsXTc9wO', 2, 20161479, 0),
(637, '20172808', '$2y$10$qX0FbZUskuY0lHkEH/UF8ee1GeF3x8WQZht.HS95bEHduM1f2TmSO', 2, 20172808, 0),
(638, '20141969', '$2y$10$qaEBKhe5UofxiVvTA8kY7OFi0G/97gTqbeKrwcwkMFEWB0FVZwmBm', 2, 20141969, 0),
(639, '20164319', '$2y$10$XrAf7OdmMO3SRWiGeWHAAunrQeiDjTyxmez3vlIHaZW.yP5IUuRBW', 2, 20164319, 0),
(640, '20131955', '$2y$10$EPMbWTfzuIuN4cExpeeGtO7tOChybpy5z694L9mqmpyRm3wO8rf86', 2, 20131955, 0),
(641, '20164339', '$2y$10$Yj1h5mNhkybB1XsnvTwpCubT85OsTdgt1uKSICovwBCSImBLiVGnW', 2, 20164339, 0),
(642, '20172800', '$2y$10$FoqZWVj3cdj5iv5BwL3p/OR4QCcg1BBzBqEI8nxrV2TLHWVFdQz5C', 2, 20172800, 0),
(643, '20103121', '$2y$10$ID.G5RR6iGXyKWqGa2XzUuKEs2Ovkl/KVZceZXR0ByW3pZBQL3yY2', 2, 20103121, 0),
(644, '20073666', '$2y$10$PSeYi6ymp1OXT76yr65I0OQugyLxMIpgkro4pcDKriDUolaVTl6ou', 2, 20073666, 0),
(645, '20141979', '$2y$10$uqcx.rEzNNEtF8Y3TEW5cu/1M/5ejWVdv05wDqndB2wYQd1/FTVqK', 2, 20141979, 0),
(646, '20144145', '$2y$10$h61ileE2P.Fi483wsv2hMOox3yIBhMgvbl.LzOpyr0KO4L8tPLpLy', 2, 20144145, 0),
(647, '20102578', '$2y$10$EzC6YJVU8fEAodt02sM9jOOFtdhxa8Bx9XRI.QbKQgKmidoI5F626', 2, 20102578, 0),
(648, '20152101', '$2y$10$zfrpb3f85RRE7ocev0GqV.NI7UzHeQvPL8ZYlAi9pKF.zv7I1OzyG', 2, 20152101, 0),
(649, '20131947', '$2y$10$H.VE49pEiegGhBD5xH1TMOUYBx75lYZKnI1yCoNYpGQVtHcAGQYs.', 2, 20131947, 0),
(650, '20144462', '$2y$10$SUiEe3jybZFmMAUulunLYOU.kDr7w3aFZikmiJSGdQVdrcxBVdHWm', 2, 20144462, 0),
(651, '20141956', '$2y$10$kf3iP2kiwBF.hQUyG4KbEuMYW28uac7WZcJ9Akf381CE2NwzzDg96', 2, 20141956, 0),
(652, '20152176', '$2y$10$SztOlyWQIzJaCis7XAT7mewUCVtY4riewK9nFSM8Z/1v/U6BQgTtC', 2, 20152176, 0),
(653, '20051144', '$2y$10$WDm8LYFNuzXxW4sTRtde2Obg.Y8B11jdE5E2FZ0eIgyNX9XixYu0K', 2, 20051144, 0),
(654, '20154378', '$2y$10$11Xo6b78R07DCMAGPsvIKu69grT8Orpyt9K1UpTEdHDFkkVm/f4jS', 2, 20154378, 0),
(655, '20142603', '$2y$10$pkt3J9EB9158LR3eTPs88.92jFoTkqXvxXGFvezxbo2U2Yua3YChe', 2, 20142603, 0),
(656, '20152169', '$2y$10$471Pb7FO/yW.Zhhngx1d/.h02XaQw8i1kC88SkpxXfpYIXGTuIhJq', 2, 20152169, 0),
(657, '20121913', '$2y$10$7LDehF97aJnr9K7uqZf90uqF/n5Gw7Cga8hk1aGjEVk4wJq7AI65S', 2, 20121913, 0),
(658, '20171481', '$2y$10$PkZaxNh5uVAQI7m16JV1BOZ5KtdHgRFRPltK62HMca3oQE91sBtea', 2, 20171481, 0),
(659, '20171465', '$2y$10$L/XP8vVbHQ7I0sjkSQHuZucK5FuKDMnlXqRohxDqh0PGQlC28Rdnm', 2, 20171465, 0),
(660, '20164330', '$2y$10$CZMSGLo/jaccMsAtSZRVN.3iZ.2mcMn0pLRft8l5gPxuA2EJo08Ei', 2, 20164330, 0),
(661, '20171468', '$2y$10$r6CUC6K1qikMb3zWhrzzXewTpkyPRWVXpqqeq2LAXPg1ULh5OKEQe', 2, 20171468, 0),
(662, '20121965', '$2y$10$Dx4Yqm9q9NgZ.eHI.fK/NOmBr//6/cIMtreUCopC3ciUX0aPrdTnC', 2, 20121965, 0),
(663, '20123999', '$2y$10$ym3VLrnF4GUP7EzW3/4T0Olure3pllbHX//X4hXu0cxpLl06utNiu', 2, 20123999, 0),
(664, '20100368', '$2y$10$s7UZtr1BLLKqPL9PvLDO0uhJejZUiS1w8cm0LCqOLnN9017mikq26', 2, 20100368, 0),
(665, '20171464', '$2y$10$2vZgPTNyBkj2fKHepWOEcusTQg.ijPVmqRJiAqUF4o4yaI52FJ8gu', 2, 20171464, 0),
(666, '20084703', '$2y$10$bEak4o9UwCB0re4uiQC7fursTQzaX34rTNlvFaKsb45XJk41Fhinq', 2, 20084703, 0),
(667, '20152155', '$2y$10$MoDPwlrIBNhUzEsc.ueHqeAwSJ7e7mBkM4jncZDDafqMmepVaIqJ2', 2, 20152155, 0),
(668, '20152174', '$2y$10$VDrwQOOD5m4N6CgnurXly.rSmULW1tgi4taA.0KVioXYY4.GUa.9C', 2, 20152174, 0),
(669, '20121948', '$2y$10$3NFL7kPRqoKu58vxfWC/RujPhmXnt2sxQEKMWY8V1PMcd6ImuhEh6', 2, 20121948, 0),
(670, '20132586', '$2y$10$TJhuuny0gc2nV3lR5jYkY.G8QV7ozlDdLwQMGIZq//bSPwpinxdxm', 2, 20132586, 0),
(671, '20103826', '$2y$10$TB.MZ7tSAX9xYfx3tF2TS.k69TZnvqagqolZ3v1IsP10fWr2iXDTG', 2, 20103826, 0),
(672, '20142027', '$2y$10$HDhVdY05y8bNMA7HnXEgo.PlkZwsYzEW0.QPF/3nIDrX6F7U38UKi', 2, 20142027, 0),
(673, '20171436', '$2y$10$/4KJSLs7RSgLvjFiP1PBHuAFna1MXHykMTAoHk8897L0Uj0wDNyUO', 2, 20171436, 0),
(674, '20171472', '$2y$10$SYlj4frKwS97SBdIGJL.HOnW7ogmJlcP/zz6oYRnk70t6j78YSMna', 2, 20171472, 0),
(675, '20154384', '$2y$10$uUfjzzWtGpJw93BLIf8h3OIYUcbp09c1n9HwSgRP4KhxjN6n7bLpG', 2, 20154384, 0),
(676, '20154353', '$2y$10$HNQGdJ2sHABhk9JkXr9Hc.6ZnTToyM32/f6soK9Xs11Dr2k2wCkqC', 2, 20154353, 0),
(677, '20141998', '$2y$10$IHxiEqgZfFz0TSZQtGN4T.er/U.1m5rirPNwkSeVP56GruqqGM.n2', 2, 20141998, 0),
(678, '20152769', '$2y$10$O0h2gDp17xfs7d5gw0KBfOcAfJQE8x/Unv2iNpRWA/PSYzB56J7yC', 2, 20152769, 0),
(679, '20164343', '$2y$10$vhP1drbo23vX7ZsJIYIjg.OTOg/q98/CxJKAGvFvpbFcMmKMQRfZa', 2, 20164343, 0),
(680, '20164313', '$2y$10$hQgpyY.sJys1Cs5vzQS.ROxsWERfSN40CskAphJhtLurqzeS9eG/u', 2, 20164313, 0),
(681, '20122889', '$2y$10$en05C3J73AArgELPstH0puq0iUkgwV9DFPwpLUOjfYl/wl/mI533.', 2, 20122889, 0),
(682, '20131959', '$2y$10$dJQoOrFppbKcq1czZ7ru5e/Z51rq2kGHPPDctHK9IgDZs8adSMJwW', 2, 20131959, 0),
(683, '20131706', '$2y$10$HC2GTQkFRBAmChlRPt2s2u2kg8xHcpj26zWQAQIQL8mPIsblf2FFi', 2, 20131706, 0),
(684, '20162343', '$2y$10$mWmOChoqNjHydS0HE9QMSu4RRNOgmFfhgPJawdj8eivYniw/Ax9I.', 2, 20162343, 0),
(685, '20097832', '$2y$10$LZWkwAJQ.NeJ7FYEVB7sAu7SVSqGMz1ay5cUTHm8Hde/jfV2n3lUu', 2, 20097832, 0),
(686, '20171471', '$2y$10$yNv7qOIk2VkSI1A/wz7qy.8lRP9jYxsrGdqgqAkRJbZOpKn7DrzSe', 2, 20171471, 0),
(687, '20134015', '$2y$10$nAMAPbaI4hJYmnVCr6iTCO6hGgiDgFsLd1b7Uz7xQll70iPYqvTJy', 2, 20134015, 0),
(688, '20164348', '$2y$10$ZAIP0W.HjHpss4ubWpZBCufhiYQIWU//LoxcemhyE2l2luQ6V511O', 2, 20164348, 0),
(689, '20141942', '$2y$10$5PVa8b9/NjxFiqxrMFmQd.VCbZ0MtgUJCoM.BQ9HD9B4.aOg.7cXK', 2, 20141942, 0),
(690, '20161514', '$2y$10$eCc4JIZcJCIOwBTH1tkDZuVMksYFGATpjpaC5YzocByukxkVfr0ja', 2, 20161514, 0),
(691, '20152148', '$2y$10$7/JzIcSPHy/JbKhb1Nv6qeZA.e7B2BlUCSJLeCpKpko.wA.LTO4JG', 2, 20152148, 0),
(692, '20174037', '$2y$10$sD4XLGeP9vqTYZU89BNameee9ShISCT2XnVQeiqkYwDUNkzyECU92', 2, 20174037, 0),
(693, '20161473', '$2y$10$kSwboDW9wHEwDBafqNRXu.oYAv5r0Tf0Hz6g.pvSbV2JqQfJve/h2', 2, 20161473, 0),
(694, '20124012', '$2y$10$Ja9ujvCY.pP3bUpnAHhDD.PKHgKbfwMvLTFczTMW00crkrqG8N5tO', 2, 20124012, 0),
(695, '20043566', '$2y$10$yVp6FR.L4crkkf.d.4xmauTQlkUUdIqOLu.XgoGWdUAElQR8T/VyO', 2, 20043566, 0),
(696, '20141987', '$2y$10$fg9spafKplO4JCeI.VF59eGr9ycnJ8JZ27QkVdOPt7WPJUskEtYuG', 2, 20141987, 0),
(697, '20141964', '$2y$10$HYOD6nl3FkPSso9trasEuurmUQ6DPfHTaXZ.8xrCFhMIi7FNUxoSS', 2, 20141964, 0),
(698, '20152144', '$2y$10$LvXY7BA9ikVMhbDdnw385uV5d7CIiLfUeR7wcGjnEmZDxBEtiA0gi', 2, 20152144, 0),
(699, '20142016', '$2y$10$XJw7D5VL9EqozjY8EIWOIu0qk2E68JkZ1sFaDzUogY/O6381.nYzS', 2, 20142016, 0),
(700, '20131986', '$2y$10$YdZNU1WIQCLmnv65Om02ceY9JKIyp4KaMfW6qNWdQP29bwp0BGYHy', 2, 20131986, 0),
(701, '20131993', '$2y$10$NpxZMMZUwJksAoYkW8SWLeoxrC4XNObX7BlaEifBivGhCKtK8NDIK', 2, 20131993, 0),
(702, '20174043', '$2y$10$/enILK5rXPEI0WGFLjhYC.nD6Y4GeNTsCy5XMZq/nIA0HBsvZ3boi', 2, 20174043, 0),
(703, '20174009', '$2y$10$foRaWw5l.kTGSlMRmdZlZudunpO7sb099DmhhPeet.4A1IfRIDXJW', 2, 20174009, 0),
(704, '20152106', '$2y$10$FYNFkeSi/RNnNN5XIgHUJOUU9zMu/Kce8xikNfbjJBawr3Bu822Dy', 2, 20152106, 0),
(705, '20171452', '$2y$10$KgyfIvjr.pDUL/nu0UYhq.VzdSQHus/Ms0VqkPwxoBVDjIW0SFPVa', 2, 20171452, 0),
(706, '20154361', '$2y$10$VH.wuLygoCaXW9VMPS4bfOrXLgkJFsyNqcHx0oIi1m2DWBiJMFWTa', 2, 20154361, 0),
(707, '20103984', '$2y$10$f0skIkof6ym8d2pZbsub..MCSgDKcFRybo1ED.KkPNaO6p.5U.gPi', 2, 20103984, 0),
(708, '20172764', '$2y$10$TcODEs70dNIarnkI72j9Ju4oZ4GYgd/r6KkEDPcehsD42cSv7w0oy', 2, 20172764, 0),
(709, '20174021', '$2y$10$6RgJb02dbv7W15gh6d52SOkX9A2NT6wClbMbwOzhzIid49zycNw6G', 2, 20174021, 0),
(710, '20171450', '$2y$10$vAvaKef/4x2LibnVSHsWYuIw4ng2IQk1X0pbkVpnGP5J5PB33u9PC', 2, 20171450, 0),
(711, '20161475', '$2y$10$0SU9nd/OgtSDmYLAz2GPJ.3Dv1FqdD/xToSBJX/qOSh/z8uu/XDP6', 2, 20161475, 0),
(712, '20174030', '$2y$10$RDlOOkGMDIs4IyqHrF90VunvDSvZODJD8ketfXdl5caSdzBM21gaK', 2, 20174030, 0),
(713, '20152159', '$2y$10$5ca/y7bBi6PYOOTtIZqLlOh3A3P3TJb8yhV//v5KoGagGhtbgoeca', 2, 20152159, 0),
(714, '20172777', '$2y$10$vBJ2y1SNmOjDRw85eJ.db.MiiCsLF0zFisE6OGelEBGfcnA.uLCfu', 2, 20172777, 0),
(715, '20083439', '$2y$10$fWGniYBRiZawpZXXHmp0FuA44dAkRbZfqEdrGgI6N/5bXvNYBBZni', 2, 20083439, 0),
(716, '20172787', '$2y$10$w5fVpOgOpUzxIB6pl6bP5.QJI0roUTO0vfSHwqdnNYuywh7upLRty', 2, 20172787, 0),
(717, '20097030', '$2y$10$iUfJrMS2bCXBx7eVcODsyewQw7LWLRSdh4lUu79WBDVHn0Wked0B6', 2, 20097030, 0),
(718, '23948932', '$2y$10$2lG4GIeyIpCyDUP30EE7NuAlvr5PFlDK1ByaNbc72eicSrwI8r0IS', 3, 23948932, 0);

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
  MODIFY `comentarios_docente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  MODIFY `docente_curso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `libro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `malla_curricular`
--
ALTER TABLE `malla_curricular`
  MODIFY `malla_curricular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `nota_promedio`
--
ALTER TABLE `nota_promedio`
  MODIFY `nota_promedio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `prestamo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  MODIFY `tipo_libro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `tipo_persona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=719;

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
