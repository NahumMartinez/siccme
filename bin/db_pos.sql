-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2014 a las 02:25:50
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_pos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `sp_dml_categorias`(in i_accion int(1), in i_cc varchar(5), i_dc varchar(35), in i_fc date,
in i_p varchar(20))
BEGIN
--  Creacion de las Varibles de la Tabla *****************************
	declare _accion int default 0;
	declare v_cc varchar(15); 	-- Codigo de Categoria
	declare v_dc varchar(15); 	-- Descripcion de categoria
	declare v_fc varchar(15); 	-- Fecha de creacion
	declare v_p varchar(15);   	-- Programa

	declare v_fung varchar(10);  		 -- Funcion de Si existe o no El Codigo de la Categoria
	declare s_id   int(3);		 		 -- Obtiene el Id de la categoria que se Desea Mod o Borrar
-- Fin de Creacion de Variables **************************************
--  Inicializacion de las Variables enviadas de La Interfaz **********
	set _accion = i_accion;
	set v_cc 	= i_cc;
	set v_dc 	= i_dc;
	set v_fc 	= i_fc;
	set v_p   	= i_p;

	set v_fung = (select fn_exist_categoria(v_cc)); -- Asigna el Valor de la Fincion a vfu_g
	set s_id = (select id_categoria from t00_categorias where cod_categoria = v_cc);
-- Fin de Inicializacion de Variables *********************************	
-- Validacion de que accio se Toma en el SP
	-- Valida se Accion es 0 = Insert
	if _accion = 0 then
		-- Pregunta si se Encuentra el Codigo  *************************************************
		-- _accion Insertar
		if v_fung > 0 then 
			select 'El Codigo ya se encuentra en la tabla';
			rollback;
		else	
			insert into t00_categorias
		(cod_categoria, desc_categoria, f_creacion, programa)
		values
		(v_cc, v_dc, v_fc, v_p);
		commit;
		select 'Datos Insertados de forma Satisfactoria';
		end if;
		-- Fin de Pregunta de existencia de Codigo del grupo *****************************
	elseif _accion = 1 then
		-- _accion Actualizar
		update t00_categorias 
		set
		cod_categoria = v_cc, desc_categoria = v_dc, f_creacion = v_fc, programa = v_p
		where id_categoria = s_id;
		select 'Datos Actualizados de forma Satisfactoria';
		commit;
	elseif _accion = 2 then
		-- _accion Delete
		delete from t00_categorias
		where id_categoria = s_id;
		select 'Datos Borrados de Forma Satisfactoria';
		commit;
	end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_dml_grupos`(in i_accion int(1), in i_cg varchar(5), 
i_dg varchar(30), in i_fc date,
in i_p varchar(20))
BEGIN
--  Creacion de las Varibles de la Tabla *******************************************************
	declare _accion int(1) default 0;	 -- Accion Tomada por el Usuario
	declare v_cg varchar(15); 			 -- Codigo de Grupo
	declare v_dg varchar(30); 			 -- Descripcion de Grupo
	declare v_fc date; 					 -- Fecha de creacion
	declare v_p varchar(15);   			 -- Programa 

	declare v_fung varchar(10);  		 -- Funcion de Si existe o no El Codigo del Grupo
	declare s_id   int(3);		 		 -- Obtiene el Id del Grupo que se Desea Mod o Borrar
-- Fin de Creacion de Variables 		 *******************************************************
--  Inicializacion de las Variables enviadas de La Interfaz ************************************
	set _accion = i_accion;
	set v_cg 	= i_cg;
	set v_dg 	= i_dg;
	set v_fc 	= i_fc;
	set v_p   	= i_p;

	set v_fung = (select fn_exist_grupo(v_cg)); -- Asigna el Valor de la Fincion a vfu_g
	set s_id = (select id_grupo from t00_grupos where cod_grupo = v_cg);
-- Fin de Inicializacion de Variables **********************************************************	
-- Validacion de que accio se Toma en el SP ****************************************************
	-- Valida se Accion es 0 = Insert
	if _accion = 0 then
		-- Pregunta si se Encuentra el Codigo  *************************************************
		-- _accion Insertar
		if v_fung > 0 then 
			select 'El Codigo ya se encuentra en la tabla';
			rollback;
		else	
			insert into t00_grupos
		(cod_grupo, desc_grupo, f_creacion, programa)
		values
		(v_cg, v_dg, v_fc, v_p);
		commit;
		select 'Datos Insertados de forma Satisfactoria';
		end if;
		-- Fin de Pregunta de existencia de Codigo del grupo *****************************
	elseif _accion = 1 then
		-- _accion Actualizar
		update t00_grupos 
		set
		cod_grupo = v_cg, desc_grupo = v_dg, f_creacion = v_fc, programa = v_p
		where id_grupo = s_id;
		select 'Datos Actualizados de forma Satisfactoria';
		commit;
	elseif _accion = 2 then
		delete from t00_grupos
		where id_grupo = s_id;
		select 'Datos Borrados de Forma Satisfactoria';
		commit;
	end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_dml_tipos`(in i_accion int(1), in i_ct varchar(5), i_dt varchar(25), in i_fc date,
in i_p varchar(20), i_ot varchar(100), in i_idg int(3))
BEGIN
--  Creacion de las Varibles de la Tabla *****************************
	declare _accion int default 0;
	declare v_ct varchar(5); 	-- Codigo de Tipo
	declare v_dt varchar(25); 	-- Descripcion del Tipo
	declare v_fc date; 			-- Fecha de creacion
	declare v_p varchar(20);   	-- Programa
	declare v_idg int(3);  		-- Id de Grupo
	declare v_ot varchar(100);

	declare v_fung varchar(10);  		 -- Funcion de Si existe o no El Codigo del Tipos
	declare s_id   int(3);		 		 -- Obtiene el Id del Tipo que se Desea Mod o Borrar
-- Fin de Creacion de Variables **************************************
--  Inicializacion de las Variables enviadas de La Interfaz **********
	set _accion = i_accion;
	set v_ct 	= i_ct;
	set v_dt 	= i_dt;
	set v_fc 	= i_fc;
	set v_p   	= i_p;
	set v_idg 	= i_idg;
	set v_ot	= i_ot;

	set v_fung = (select fn_exist_tipo(v_ct)); -- Asigna el Valor de la Fincion a vfu_g
	set s_id = (select id_tipo from t00_tipos where cod_tipo = v_ct);
-- Fin de Inicializacion de Variables *********************************	
-- Validacion de que accio se Toma en el SP ****************************************************
	-- Valida se Accion es 0 = Insert
	if _accion = 0 then
		-- Pregunta si se Encuentra el Codigo  *************************************************
		-- _accion Insertar
		if v_fung > 0 then 
			select 'El Tipo ya se encuentra en la tabla';
			rollback;
		else	
			insert into t00_tipos
		(cod_tipo, desc_tipo, f_creacion, programa, observaciones, id_grupo)
		values
		(v_ct, v_dt, v_fc, v_p, v_ot, v_idg);
		commit;
		select 'Datos Insertados de forma Satisfactoria';
		end if;
		-- Fin de Pregunta de existencia de Codigo del grupo *****************************
	elseif _accion = 1 then
		-- _accion Actualizar
		update t00_tipos 
		set
		cod_tipo = v_ct, desc_tipo = v_dt, f_creacion = v_fc, programa = v_p
		where id_tipo = s_id;
		select 'Datos Actualizados de forma Satisfactoria';
		commit;
	elseif _accion = 2 then
		delete from t00_tipos
		where id_tipo = s_id;
		select 'Datos Borrados de Forma Satisfactoria';
		commit;
	end if;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_buscar_id`(i_tabla varchar(30), i_campo varchar(20)) RETURNS int(5)
BEGIN
-- Zona de Declaracion de variables
	declare v_tabla varchar(30);
	declare v_cod	varchar(20);
	declare v_id	int(5);
-- Seteo de Variables de In en la Funcion
	set v_tabla = i_tabla;
	set v_cod   = i_campo;
	set v_id = (select id from v_tabla where v_campo = v_cod);

-- Buqueda del Id del Registro Solicitado
    
RETURN v_id;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fn_exist_categoria`(i_cod varchar(5)) RETURNS varchar(20) CHARSET latin1
BEGIN
-- Zona de declaracion  de las Variables a Utilizar *********************************
	declare v_cod varchar(5);
	declare s_cod varchar(20);
	declare salida varchar(20);

-- Seteo de variables Creacdas pasando los valores de los IN *************************
	set v_cod = i_cod;
	set salida = 'NADA';
	set s_cod = (select count(*) from t00_categorias where cod_categoria = v_cod);

-- Validacion del codigo de t00_grupos
	if s_cod > 1 then
		set salida = 'Te enconte';
	else
		set salida = 'No te Encontre';
	end if;
	
	return s_cod;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fn_exist_grupo`(i_cod varchar(5)) RETURNS varchar(20) CHARSET latin1
BEGIN
-- Zona de declaracion  de las Variables a Utilizar *********************************
	declare v_cod varchar(5);
	declare s_cod varchar(20);
	declare salida varchar(20);

-- Seteo de variables Creacdas pasando los valores de los IN *************************
	set v_cod = i_cod;
	set salida = 'NADA';
	set s_cod = (select count(*) from t00_grupos where cod_grupo = v_cod);

-- Validacion del codigo de t00_grupos
	if s_cod > 1 then
		set salida = 'Te enconte';
	else
		set salida = 'No te Encontre';
	end if;
	
	return s_cod;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fn_exist_tipo`(i_cod varchar(5)) RETURNS varchar(20) CHARSET latin1
BEGIN
-- Zona de declaracion  de las Variables a Utilizar *********************************
	declare v_cod varchar(5);
	declare s_cod varchar(20);
	declare salida varchar(20);

-- Seteo de variables Creacdas pasando los valores de los IN *************************
	set v_cod = i_cod;
	set salida = 'NADA';
	set s_cod = (select count(*) from t00_tipos where cod_tipo = v_cod);

-- Validacion del codigo de t00_grupos
	if s_cod > 1 then
		set salida = 'Te enconte';
	else
		set salida = 'No te Encontre';
	end if;
	
	return s_cod;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_accesos`
--

CREATE TABLE IF NOT EXISTS `t00_accesos` (
  `id_acceso` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(3) NOT NULL,
  `f_acceso` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `hora_inicio` datetime NOT NULL,
  `hora_final` datetime NOT NULL,
  `lat_usuario` varchar(30) NOT NULL,
  `long_usuario` varchar(30) NOT NULL,
  `url_directorio` varchar(150) NOT NULL,
  `evento_usuario` varchar(30) NOT NULL,
  `ip_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_acceso`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_aldeas`
--

CREATE TABLE IF NOT EXISTS `t00_aldeas` (
  `id_aldea` int(4) NOT NULL AUTO_INCREMENT,
  `cod_aldea` varchar(6) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nom_aldea` varchar(50) NOT NULL,
  `id_munic` int(3) NOT NULL,
  PRIMARY KEY (`id_aldea`,`cod_aldea`),
  KEY `nom_aldea` (`nom_aldea`,`id_munic`),
  KEY `id_munic` (`id_munic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `t00_aldeas`
--

INSERT INTO `t00_aldeas` (`id_aldea`, `cod_aldea`, `f_creacion`, `programa`, `usuario`, `nom_aldea`, `id_munic`) VALUES
(1, 'MUN001', '2014-10-25', 't00_Aldeas', 'Admin', 'Tegucigalpa', 110),
(2, 'MUN002', '2014-10-25', 't00_Aldeas', 'Admin', 'Amarateca', 110),
(3, 'MUN003', '2014-10-25', 't00_Aldeas', 'Admin', 'Azacualpa', 110),
(4, 'MUN004', '2014-10-25', 't00_Aldeas', 'Admin', 'Carpintero', 110),
(5, 'MUN005', '2014-10-25', 't00_Aldeas', 'Admin', 'Cerro Grande', 110),
(6, 'MUN006', '2014-10-25', 't00_Aldeas', 'Admin', 'Coa Abajo', 110),
(7, 'MUN007', '2014-10-25', 't00_Aldeas', 'Admin', 'Coa Arriba', 110),
(8, 'MUN008', '2014-10-25', 't00_Aldeas', 'Admin', 'Cofradía', 110),
(9, 'MUN009', '2014-10-25', 't00_Aldeas', 'Admin', 'Concepción de Río Grande', 110),
(10, 'MUN010', '2014-10-25', 't00_Aldeas', 'Admin', 'El Naranjal', 110),
(11, 'MUN011', '2014-10-25', 't00_Aldeas', 'Admin', 'El Piliguín', 110),
(12, 'MUN012', '2014-10-25', 't00_Aldeas', 'Admin', 'El Tizatillo', 110),
(13, 'MUN013', '2014-10-25', 't00_Aldeas', 'Admin', 'Germania', 110),
(14, 'MUN014', '2014-10-25', 't00_Aldeas', 'Admin', 'Guangololo', 110),
(15, 'MUN015', '2014-10-25', 't00_Aldeas', 'Admin', 'Guasculile', 110),
(16, 'MUN016', '2014-10-25', 't00_Aldeas', 'Admin', 'Jacaleapa', 110),
(17, 'MUN017', '2014-10-25', 't00_Aldeas', 'Admin', 'Jutiapa', 110),
(18, 'MUN018', '2014-10-25', 't00_Aldeas', 'Admin', 'La Calera', 110),
(19, 'MUN019', '2014-10-25', 't00_Aldeas', 'Admin', 'La Cuesta No.2', 110),
(20, 'MUN020', '2014-10-25', 't00_Aldeas', 'Admin', 'La Montañita', 110),
(21, 'MUN021', '2014-10-25', 't00_Aldeas', 'Admin', 'La Sábana', 110),
(22, 'MUN022', '2014-10-25', 't00_Aldeas', 'Admin', 'La Venta', 110),
(23, 'MUN023', '2014-10-25', 't00_Aldeas', 'Admin', 'Las Casitas', 110),
(24, 'MUN024', '2014-10-25', 't00_Aldeas', 'Admin', 'Las Flores', 110),
(25, 'MUN025', '2014-10-25', 't00_Aldeas', 'Admin', 'Las Tapias', 110),
(26, 'MUN026', '2014-10-25', 't00_Aldeas', 'Admin', 'Los Jutes', 110),
(27, 'MUN027', '2014-10-25', 't00_Aldeas', 'Admin', 'Mateo', 110),
(28, 'MUN028', '2014-10-25', 't00_Aldeas', 'Admin', 'Monte Redondo', 110),
(29, 'MUN029', '2014-10-25', 't00_Aldeas', 'Admin', 'Nueva Aldea', 110),
(30, 'MUN030', '2014-10-25', 't00_Aldeas', 'Admin', 'Río Abajo', 110),
(31, 'MUN031', '2014-10-25', 't00_Aldeas', 'Admin', 'Río Hondo', 110),
(32, 'MUN032', '2014-10-25', 't00_Aldeas', 'Admin', 'San Francisco de Soroguara', 110),
(33, 'MUN033', '2014-10-25', 't00_Aldeas', 'Admin', 'San Juancito', 110),
(34, 'MUN034', '2014-10-25', 't00_Aldeas', 'Admin', 'San Juan del Rancho', 110),
(35, 'MUN035', '2014-10-25', 't00_Aldeas', 'Admin', 'San Juan del Río Grande', 110),
(36, 'MUN036', '2014-10-25', 't00_Aldeas', 'Admin', 'San Matías', 110),
(37, 'MUN037', '2014-10-25', 't00_Aldeas', 'Admin', 'Santa Cruz Abajo', 110),
(38, 'MUN038', '2014-10-25', 't00_Aldeas', 'Admin', 'Santa Cruz Arriba', 110),
(39, 'MUN039', '2014-10-25', 't00_Aldeas', 'Admin', 'Santa Rosa', 110),
(40, 'MUN040', '2014-10-25', 't00_Aldeas', 'Admin', 'Soroguara', 110),
(41, 'MUN041', '2014-10-25', 't00_Aldeas', 'Admin', 'Támara', 110),
(42, 'MUN042', '2014-10-25', 't00_Aldeas', 'Admin', 'Villa Nueva', 110),
(43, 'MUN043', '2014-10-25', 't00_Aldeas', 'Admin', 'Yaguacire', 110),
(44, 'MUN044', '2014-10-25', 't00_Aldeas', 'Admin', 'Zambrano', 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_almacenes`
--

CREATE TABLE IF NOT EXISTS `t00_almacenes` (
  `id_almacen` int(3) NOT NULL AUTO_INCREMENT,
  `cod_almacen` varchar(6) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `nom_almacen` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `num_estantes` int(3) NOT NULL,
  `id_sucursal` int(3) NOT NULL,
  `id_emple_encargado` int(3) NOT NULL,
  PRIMARY KEY (`id_almacen`,`cod_almacen`),
  KEY `id_sucursal` (`id_sucursal`,`id_emple_encargado`),
  KEY `id_emple_encargado` (`id_emple_encargado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `t00_almacenes`
--

INSERT INTO `t00_almacenes` (`id_almacen`, `cod_almacen`, `f_creacion`, `programa`, `nom_almacen`, `usuario`, `num_estantes`, `id_sucursal`, `id_emple_encargado`) VALUES
(1, 'ALM001', '2014-10-26', 't00_TiposProd', 'Almacen Principal', 'nahum', 6, 1, 1),
(2, 'ALM002', '2014-10-26', 't00_TiposProd', 'Almacen Centro Sur', 'nahum', 5, 2, 1),
(3, 'ALM003', '2014-11-08', 't00_TiposProd', 'Almacen Zona Norte', 'nahum', 14, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_areas`
--

CREATE TABLE IF NOT EXISTS `t00_areas` (
  `id_area` int(3) NOT NULL AUTO_INCREMENT,
  `cod_area` varchar(6) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nom_area` varchar(25) NOT NULL,
  PRIMARY KEY (`id_area`,`cod_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `t00_areas`
--

INSERT INTO `t00_areas` (`id_area`, `cod_area`, `f_creacion`, `programa`, `usuario`, `nom_area`) VALUES
(1, 'CAR001', '2014-10-25', 't00_Areas', 'Admin', 'Norte'),
(2, 'CAR002', '2014-10-25', 't00_Areas', 'Admin', 'Sur'),
(3, 'CAR003', '2014-10-25', 't00_Areas', 'Admin', 'Occidente'),
(4, 'CAR004', '2014-10-25', 't00_Areas', 'Admin', 'Oriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_bodegas`
--

CREATE TABLE IF NOT EXISTS `t00_bodegas` (
  `id_bodega` int(3) NOT NULL AUTO_INCREMENT,
  `cod_bodega` varchar(5) NOT NULL,
  `id_sucursal` int(3) NOT NULL,
  `no_estantes` int(5) NOT NULL,
  `no_pasillos` int(5) NOT NULL,
  `fecha_inventario` date NOT NULL,
  PRIMARY KEY (`id_bodega`),
  KEY `id_sucursal` (`id_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_categorias`
--

CREATE TABLE IF NOT EXISTS `t00_categorias` (
  `id_categoria` int(2) NOT NULL AUTO_INCREMENT,
  `cod_categoria` varchar(6) NOT NULL,
  `desc_categoria` varchar(35) DEFAULT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `ind_cat` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`,`cod_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `t00_categorias`
--

INSERT INTO `t00_categorias` (`id_categoria`, `cod_categoria`, `desc_categoria`, `f_creacion`, `programa`, `usuario`, `ind_cat`) VALUES
(1, 'CAP001', 'Categoria Num 111', '2014-11-01', 't00_Categorias', 'nahum', 'P'),
(2, 'CAP002', 'Enlatados', '2014-11-08', 't00_Categorias', 'nahum', 'P'),
(3, 'CAP003', 'Frituras', '2014-11-08', 't00_Categorias', 'nahum', 'P'),
(4, 'CAP004', 'Categoria 4', '2014-11-10', 't00_Categorias', 'nahum', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_clientes`
--

CREATE TABLE IF NOT EXISTS `t00_clientes` (
  `id_cliente` int(4) NOT NULL AUTO_INCREMENT,
  `cod_cliente` varchar(6) NOT NULL,
  `id_persona` int(3) DEFAULT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `id_tipo_cliente` int(3) NOT NULL,
  `id_estado_cliente` int(3) NOT NULL,
  PRIMARY KEY (`id_cliente`,`cod_cliente`),
  KEY `id_tipo_cliente` (`id_tipo_cliente`),
  KEY `id_estado_cliente` (`id_estado_cliente`),
  KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `t00_clientes`
--

INSERT INTO `t00_clientes` (`id_cliente`, `cod_cliente`, `id_persona`, `f_creacion`, `programa`, `usuario`, `id_tipo_cliente`, `id_estado_cliente`) VALUES
(1, 'CCL001', 3, '2014-10-31', 't00_TiposProd', 'nahum', 11, 6),
(2, 'CCL002', 1, '2014-10-31', 't00_TiposProd', 'nahum', 12, 6),
(3, 'CCL003', 2, '2014-11-02', 't00_TiposProd', 'nahum', 11, 6),
(4, 'CCL004', 1, '2014-11-02', 't00_TiposProd', 'nahum', 13, 6),
(5, 'CCL005', 2, '2014-11-02', 't00_TiposProd', 'nahum', 12, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_colores`
--

CREATE TABLE IF NOT EXISTS `t00_colores` (
  `id_color` int(2) NOT NULL AUTO_INCREMENT,
  `cod_color` varchar(6) NOT NULL,
  `desc_color` varchar(20) NOT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `t00_colores`
--

INSERT INTO `t00_colores` (`id_color`, `cod_color`, `desc_color`) VALUES
(1, 'COL001', 'Blanco'),
(2, 'COL002', 'Negro'),
(3, 'COL003', 'Rojo'),
(4, 'COL004', 'Azul'),
(5, 'COL005', 'Amarillo'),
(6, 'COL006', 'Verde'),
(7, 'COL007', 'Morado'),
(8, 'COL008', 'Beigh'),
(9, 'COL009', 'Marron'),
(10, 'COL010', 'Celeste');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_compras_enc`
--

CREATE TABLE IF NOT EXISTS `t00_compras_enc` (
  `id_compra` int(6) NOT NULL AUTO_INCREMENT,
  `cod_compra` varchar(15) NOT NULL DEFAULT '',
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `id_proveedor` int(3) NOT NULL,
  `f_compra` date DEFAULT NULL,
  `monto_compra` double DEFAULT NULL,
  `id_impuesto` int(3) NOT NULL,
  `imp_descuento` double NOT NULL,
  `id_forma_pago` int(2) NOT NULL,
  `documento_id` varchar(20) DEFAULT NULL,
  `id_moneda` int(2) NOT NULL,
  `observaciones` varchar(150) DEFAULT NULL,
  `gastos_compra` double DEFAULT NULL,
  `ind_recibido` bit(1) DEFAULT NULL,
  `f_entrega` date DEFAULT NULL,
  PRIMARY KEY (`id_compra`,`cod_compra`),
  KEY `cod_compra` (`cod_compra`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_impuesto` (`id_impuesto`),
  KEY `id_descuento` (`imp_descuento`),
  KEY `id_forma_pago` (`id_forma_pago`),
  KEY `id_moneda` (`id_moneda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_deptos`
--

CREATE TABLE IF NOT EXISTS `t00_deptos` (
  `id_depto` int(2) NOT NULL AUTO_INCREMENT,
  `cod_depto` varchar(5) NOT NULL,
  `nombre_depto` varchar(30) NOT NULL,
  `id_pais` int(2) NOT NULL,
  `poblacion` double DEFAULT NULL,
  `superficie` double DEFAULT NULL,
  `cabezera` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_depto`),
  KEY `id_pais` (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `t00_deptos`
--

INSERT INTO `t00_deptos` (`id_depto`, `cod_depto`, `nombre_depto`, `id_pais`, `poblacion`, `superficie`, `cabezera`) VALUES
(1, 'DE001', 'ATLANTIDA', 1, 0, 0, 'LA CEIBA'),
(2, 'DE002', 'COLON', 1, 0, 0, 'TRUJILLO'),
(3, 'DE003', 'COMAYAGUA', 1, 0, 0, 'COMAYAGUA'),
(4, 'DE004', 'COPAN', 1, 0, 0, 'STA. ROSA DE COPAN'),
(5, 'DE005', 'CORTES', 1, 0, 0, 'SAN PEDRO SULA'),
(6, 'DE006', 'CHOLUTECA', 1, 0, 0, 'CHOLUTECA'),
(7, 'DE007', 'EL PARAISO', 1, 0, 0, 'YUSCARAN'),
(8, 'DE008', 'FRANCISCO MORAZAN', 1, 0, 0, 'DISTRITO CENTRAL'),
(9, 'DE009', 'GRACIAS A DIOS', 1, 0, 0, 'PUERTO LEMPIRA'),
(10, 'DE010', 'INTIBUCA', 1, 0, 0, 'LA ESPERANZA'),
(11, 'DE011', 'ISLAS DE LA BAHIA', 1, 0, 0, 'ROATAN'),
(12, 'DE012', 'LA PAZ', 1, 0, 0, 'LA PAZ'),
(13, 'DE013', 'LEMPIRA', 1, 0, 0, 'GRACIAS'),
(14, 'DE014', 'OCOTEPEQUE', 1, 0, 0, 'NUEVA OCOTEPEQUE'),
(15, 'DE015', 'OLANCHO', 1, 0, 0, 'JUTICALPA'),
(16, 'DE016', 'SANTA BARBARA', 1, 0, 0, 'SANTA BARBARA'),
(17, 'DE017', 'VALLE', 1, 0, 0, 'NACAOME'),
(18, 'DE018', 'YORO', 1, 0, 0, 'YORO'),
(19, 'DE019', 'AUXILIARES', 1, 0, 0, 'AUXILIARES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_descuentos`
--

CREATE TABLE IF NOT EXISTS `t00_descuentos` (
  `id_descuento` int(3) NOT NULL AUTO_INCREMENT,
  `cod_descuento` varchar(6) NOT NULL,
  `desc_descuento` varchar(50) NOT NULL,
  `monto_descuento` double NOT NULL,
  `porcentaje_descuento` double NOT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `ind_desc` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_descuento`,`cod_descuento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `t00_descuentos`
--

INSERT INTO `t00_descuentos` (`id_descuento`, `cod_descuento`, `desc_descuento`, `monto_descuento`, `porcentaje_descuento`, `f_creacion`, `programa`, `usuario`, `ind_desc`) VALUES
(1, 'CDE001', 'No Aplica', 0, 0, '2014-11-15', 'Manual', 'Admin', 'PE'),
(2, 'CDE002', 'General', 0, 20, '2014-11-15', 'Manual', 'Admin', 'PE'),
(3, 'CDE003', 'Especial', 0, 30, '2014-11-15', 'Manual', 'Admin', 'PE'),
(4, 'CDE004', 'Oferta 1', 0, 20, '2014-11-15', 'Manual', 'Admin', 'IDP'),
(5, 'CDE005', 'Oferta 2', 0, 30, '2014-11-15', 'Manual', 'Admin', 'IDP'),
(6, 'CDE006', 'Oferta 3', 0, 40, '2014-11-15', 'Manual', 'Admin', 'IDP'),
(7, 'CDE007', 'Inventario', 0, 50, '2014-11-15', 'Manual', 'Admin', 'IDP'),
(8, 'CDE008', 'Tercera Edad', 0, 45, '2014-11-15', 'Manual', 'Admin', 'PE'),
(9, 'CDE009', 'Sin descuento', 0, 0, '2014-11-15', 'Manual', 'Admin', 'IDP'),
(10, 'CDE010', 'Rango 1', 200, 0, '2014-11-26', 'Manual', 'Admin', 'IDP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_empleados`
--

CREATE TABLE IF NOT EXISTS `t00_empleados` (
  `id_empleado` int(3) NOT NULL AUTO_INCREMENT,
  `cod_empleado` varchar(6) NOT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `nombre_empleado` varchar(35) DEFAULT NULL,
  `id_persona` int(3) NOT NULL,
  `id_tipo_empleado` int(3) NOT NULL,
  `id_puesto_lab` int(3) DEFAULT NULL,
  `id_estado_empleado` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`,`cod_empleado`),
  KEY `id_persona` (`id_persona`,`id_tipo_empleado`),
  KEY `id_tipo_empleado` (`id_tipo_empleado`),
  KEY `id_estado_empleado` (`id_estado_empleado`),
  KEY `id_puesto_lab` (`id_puesto_lab`),
  KEY `id_tipo_empleado_2` (`id_tipo_empleado`),
  KEY `id_persona_2` (`id_persona`),
  KEY `id_puesto_lab_2` (`id_puesto_lab`),
  KEY `id_puesto_lab_3` (`id_puesto_lab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `t00_empleados`
--

INSERT INTO `t00_empleados` (`id_empleado`, `cod_empleado`, `f_creacion`, `programa`, `usuario`, `nombre_empleado`, `id_persona`, `id_tipo_empleado`, `id_puesto_lab`, `id_estado_empleado`) VALUES
(1, 'EMP001', '2014-10-25', 't00_Empleados', 'Admin', 'Eva.Barahona', 3, 9, 3, 6),
(6, 'EMP003', '2014-11-03', 't00_Empleados', 'nahum', 'Eva.Barahona', 3, 8, 5, 6),
(7, '1986', '2014-11-06', 't00_Empleados', 'nahum', 'Nahum.Martinez', 1, 8, 6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_estados`
--

CREATE TABLE IF NOT EXISTS `t00_estados` (
  `id_estado` int(3) NOT NULL AUTO_INCREMENT,
  `cod_estado` varchar(6) NOT NULL,
  `desc_estado` varchar(20) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `id_grupo` int(3) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_estado`,`cod_estado`),
  KEY `cod_estado` (`cod_estado`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `t00_estados`
--

INSERT INTO `t00_estados` (`id_estado`, `cod_estado`, `desc_estado`, `f_creacion`, `programa`, `id_grupo`, `descripcion`) VALUES
(1, 'EPE001', 'Empleado', '2014-08-09', 'MANUAL', 4, 'Estado de Vida de Persona'),
(2, 'EPE002', 'Desempleado', '2014-08-09', 'MANUAL', 4, 'Estado de Vida de Persona'),
(3, 'EPE003', 'Jubilado', '2014-08-09', 'MANUAL', 4, 'Estado de Vida de Persona'),
(4, 'EPE004', 'Discapasitado', '2014-08-09', 'MANUAL', 4, 'Estado de Vida de Persona'),
(5, 'EPE005', 'Convaleciente', '2014-08-09', 'MANUAL', 4, 'Estado de Vida de Persona'),
(6, 'EUS001', 'Acitvo', '2014-08-09', 'MANUAL', 5, 'Estado de Usuario'),
(7, 'EUS002', 'Inactivo', '2014-08-09', 'MANUAL', 5, 'Estado de Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_estado_civil`
--

CREATE TABLE IF NOT EXISTS `t00_estado_civil` (
  `id_estado_civil` int(1) NOT NULL AUTO_INCREMENT,
  `cod_est` varchar(5) NOT NULL,
  `desc_civil` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_estado_civil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `t00_estado_civil`
--

INSERT INTO `t00_estado_civil` (`id_estado_civil`, `cod_est`, `desc_civil`) VALUES
(1, 'EST01', 'Soltero'),
(2, 'EST02', 'Casado'),
(3, 'EST03', 'Viudo'),
(4, 'EST04', 'Union Libre'),
(5, 'EST05', 'Divorciado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_estantes`
--

CREATE TABLE IF NOT EXISTS `t00_estantes` (
  `id_estante` int(5) NOT NULL AUTO_INCREMENT,
  `cod_estante` varchar(6) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nom_estante` varchar(30) NOT NULL,
  `no_filas` int(3) NOT NULL,
  `no_columnas` int(3) NOT NULL,
  `id_almacen` int(3) NOT NULL,
  PRIMARY KEY (`id_estante`),
  KEY `id_almacen` (`id_almacen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `t00_estantes`
--

INSERT INTO `t00_estantes` (`id_estante`, `cod_estante`, `f_creacion`, `programa`, `usuario`, `nom_estante`, `no_filas`, `no_columnas`, `id_almacen`) VALUES
(1, 'EST001', '2014-10-26', 't00_Estantes', 'Admin', 'Estante Sur - 1', 4, 4, 1),
(2, 'EST002', '2014-10-26', 't00_Estantes', 'nahum', 'dafsdf', 7, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_fincas`
--

CREATE TABLE IF NOT EXISTS `t00_fincas` (
  `id_finca` int(4) NOT NULL AUTO_INCREMENT,
  `cod_finca` varchar(6) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nom_finca` varchar(45) NOT NULL,
  `id_localidad` int(3) NOT NULL,
  `num_puerta` int(6) NOT NULL,
  `bloque` int(2) NOT NULL,
  `peatonal` int(3) NOT NULL,
  `calle` int(2) NOT NULL,
  `id_color` int(3) NOT NULL,
  `ref_dir` varchar(150) NOT NULL,
  `latitud` varchar(25) NOT NULL,
  `longitud` varchar(25) NOT NULL,
  PRIMARY KEY (`id_finca`,`cod_finca`),
  KEY `id_localidad` (`id_localidad`),
  KEY `id_color` (`id_color`),
  KEY `nom_finca` (`nom_finca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `t00_fincas`
--

INSERT INTO `t00_fincas` (`id_finca`, `cod_finca`, `f_creacion`, `programa`, `usuario`, `nom_finca`, `id_localidad`, `num_puerta`, `bloque`, `peatonal`, `calle`, `id_color`, `ref_dir`, `latitud`, `longitud`) VALUES
(1, 'FIN001', '2014-10-29', 't00_TiposProd', 'nahum', 'Eva Barahona', 1, 1221, 44, 3, 2, 5, 'Calle principal a la colonia CAO, abajo de pollolandia, entrada a a bloque 5ta casa blanca', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_formas_pago`
--

CREATE TABLE IF NOT EXISTS `t00_formas_pago` (
  `id_forma_pago` int(2) NOT NULL AUTO_INCREMENT,
  `cod_forma_pago` varchar(20) NOT NULL DEFAULT '',
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `desc_forma_pago` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_forma_pago`,`cod_forma_pago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `t00_formas_pago`
--

INSERT INTO `t00_formas_pago` (`id_forma_pago`, `cod_forma_pago`, `f_creacion`, `programa`, `usuario`, `desc_forma_pago`) VALUES
(1, 'FP0001', '2014-11-18', 'Manual', 'Admin', 'Contado'),
(2, 'FP0002', '2014-11-18', 'Manual', 'Admin', 'Credito'),
(3, 'FP0003', '2014-11-18', 'Manual', 'Admin', 'Mixto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_fotos`
--

CREATE TABLE IF NOT EXISTS `t00_fotos` (
  `id_foto` int(6) NOT NULL AUTO_INCREMENT,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `desc_foto` varchar(40) DEFAULT NULL,
  `url_foto` varchar(200) DEFAULT NULL,
  `ind_foto` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_galeria_foto`
--

CREATE TABLE IF NOT EXISTS `t00_galeria_foto` (
  `id_galeria_foto` int(6) NOT NULL AUTO_INCREMENT,
  `id_foto` int(6) NOT NULL,
  `id_elemento` int(6) NOT NULL,
  `ind_elemento` varchar(3) NOT NULL,
  `cod_elemento` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_galeria_foto`,`id_foto`,`id_elemento`),
  KEY `id_foto` (`id_foto`),
  KEY `id_elemento` (`id_elemento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_grupos`
--

CREATE TABLE IF NOT EXISTS `t00_grupos` (
  `id_grupo` int(3) NOT NULL AUTO_INCREMENT,
  `cod_grupo` varchar(6) NOT NULL,
  `desc_grupo` varchar(30) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `cod_grupo` (`cod_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `t00_grupos`
--

INSERT INTO `t00_grupos` (`id_grupo`, `cod_grupo`, `desc_grupo`, `f_creacion`, `programa`) VALUES
(1, 'GRU001', 'Tipos de Usuarios', '2014-07-05', 'MANUAL'),
(2, 'GPR001', 'Tipos de Productos', '2014-07-05', 'MANUAL'),
(3, 'GPE001', 'Grupos de Personas', '2014-08-09', 'MANUAL'),
(4, 'GEP001', 'Grupo de Estado de Personas', '2014-08-09', 'MANUAL'),
(5, 'GEU001', 'Grupo de Estado de Usuarios', '2014-08-09', 'MANUAL'),
(6, 'GLO001', 'Grupo Localidades', '2014-10-25', 't00_Grupos'),
(7, 'GTE001', 'Tipos de Empleados', '2014-10-25', 't00_Grupos'),
(8, 'GTC001', 'Tipos de Clientes', '2014-10-30', 'too_Grupos'),
(9, 'GTP001', 'Tipos de Proveedores', '2014-11-03', 't00_Grupos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_impuestos`
--

CREATE TABLE IF NOT EXISTS `t00_impuestos` (
  `id_isv` int(3) NOT NULL AUTO_INCREMENT,
  `cod_impuesto` varchar(6) NOT NULL,
  `desc_impuesto` varchar(30) NOT NULL,
  `monto_impuesto` double NOT NULL,
  `porcentaje_impuesto` double NOT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `ind_impuesto` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_isv`,`cod_impuesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `t00_impuestos`
--

INSERT INTO `t00_impuestos` (`id_isv`, `cod_impuesto`, `desc_impuesto`, `monto_impuesto`, `porcentaje_impuesto`, `f_creacion`, `programa`, `usuario`, `ind_impuesto`) VALUES
(1, 'IMP001', 'Excento', 0, 0, '2014-11-15', 'Manual', 'Admin', 'IP'),
(2, 'IMP002', 'Sobre Ventas', 0, 12, '2014-11-15', 'Manual', 'Admin', 'IPR'),
(3, 'IMP003', 'Bebidas Alcholicas', 0, 15, '2014-11-15', 'Manual', 'Admin', 'IPR'),
(4, 'IMP004', 'Sobre Renta', 0, 20, '2014-11-15', 'Manual', 'Admin', 'IP'),
(5, 'IMP005', 'No Aplica', 0, 0, '2014-11-15', 'Manual', 'Admin', 'IPR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_items_compras`
--

CREATE TABLE IF NOT EXISTS `t00_items_compras` (
  `id_item` int(6) NOT NULL AUTO_INCREMENT,
  `id_compra` int(6) NOT NULL,
  `id_producto` int(6) NOT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `precio_costo` double DEFAULT NULL,
  `cantidad` int(4) DEFAULT NULL,
  `imp_descuento` double NOT NULL DEFAULT '0',
  `id_impuesto` int(3) NOT NULL,
  `imp_rebaja` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_item`,`id_compra`,`id_producto`),
  KEY `id_descuento` (`imp_descuento`),
  KEY `id_impuesto` (`id_impuesto`),
  KEY `t00_items_compras_ibfk_1` (`id_compra`),
  KEY `t00_items_compras_ibfk_2` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_localidades`
--

CREATE TABLE IF NOT EXISTS `t00_localidades` (
  `id_localidad` int(3) NOT NULL AUTO_INCREMENT,
  `cod_localidad` varchar(6) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre_localidad` varchar(30) NOT NULL,
  `id_aldea` int(3) NOT NULL,
  `id_tipo_localidad` int(3) NOT NULL,
  `id_area` int(3) NOT NULL,
  PRIMARY KEY (`id_localidad`),
  KEY `id_munic` (`id_aldea`),
  KEY `id_tipo_localidad` (`id_tipo_localidad`,`id_area`),
  KEY `id_area` (`id_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `t00_localidades`
--

INSERT INTO `t00_localidades` (`id_localidad`, `cod_localidad`, `f_creacion`, `programa`, `usuario`, `nombre_localidad`, `id_aldea`, `id_tipo_localidad`, `id_area`) VALUES
(1, 'LOC001', '2014-10-26', 't00_TiposProd', 'nahum', 'Col. Centro America Oeste', 1, 4, 1),
(2, 'LOC002', '2014-10-26', 't00_TiposProd', 'nahum', 'Colonia Estados Unidos', 1, 4, 4),
(3, 'LOC003', '2014-11-11', 't00_Localidades', 'nahum', 'Colonia San Jose de la Vega', 1, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_lotes`
--

CREATE TABLE IF NOT EXISTS `t00_lotes` (
  `id_lote` int(5) NOT NULL AUTO_INCREMENT,
  `id_producto` int(3) NOT NULL,
  `cod_lote` varchar(15) NOT NULL COMMENT 'Suma de año + mes + dia + correlativo',
  `correlativo` varchar(5) NOT NULL COMMENT 'autogenerado',
  `fecha_creacion` date NOT NULL,
  `id_estante` int(5) NOT NULL,
  PRIMARY KEY (`id_lote`),
  KEY `id_estante` (`id_estante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_medidas`
--

CREATE TABLE IF NOT EXISTS `t00_medidas` (
  `id_medida` int(2) NOT NULL AUTO_INCREMENT,
  `cod_medida` varchar(6) NOT NULL,
  `desc_medida` varchar(30) NOT NULL,
  `simbolo` varchar(2) NOT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_medida`,`cod_medida`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `t00_medidas`
--

INSERT INTO `t00_medidas` (`id_medida`, `cod_medida`, `desc_medida`, `simbolo`, `f_creacion`, `programa`, `usuario`) VALUES
(1, 'MED001', 'Libras', 'Lb', '2014-11-16', 'Manual', 'Admin'),
(2, 'MED002', 'Onzas', 'on', '2014-11-16', 'Manual', 'Admin'),
(3, 'MED003', 'KilosGramos', 'Kg', '2014-11-16', 'Manual', 'Admin'),
(4, 'MED004', 'Litros', 'L.', '2014-11-16', 'Manual', 'Admin'),
(5, 'MED005', 'Galones', 'GL', '2014-11-16', 'Manual', 'Admin'),
(6, 'MED006', 'Gramos', 'Gr', '2014-11-16', 'Manual', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_monedas`
--

CREATE TABLE IF NOT EXISTS `t00_monedas` (
  `id_moneda` int(2) NOT NULL AUTO_INCREMENT,
  `cod_moneda` varchar(6) NOT NULL DEFAULT '',
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `desc_moneda` varchar(20) DEFAULT NULL,
  `simbolo` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_moneda`,`cod_moneda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `t00_monedas`
--

INSERT INTO `t00_monedas` (`id_moneda`, `cod_moneda`, `f_creacion`, `programa`, `usuario`, `desc_moneda`, `simbolo`) VALUES
(1, 'MO0001', '2014-11-20', 'Manual', 'Admin', 'Lempiras', 'L.'),
(2, 'MO0002', '2014-11-20', 'Manual', 'Admin', 'Dolares', '$.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_municipios`
--

CREATE TABLE IF NOT EXISTS `t00_municipios` (
  `id_munic` int(3) NOT NULL AUTO_INCREMENT,
  `cod_munic` varchar(5) NOT NULL,
  `nombre_munic` varchar(30) NOT NULL,
  `id_depto` int(2) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `poblacion` double NOT NULL,
  `superficie` double NOT NULL,
  PRIMARY KEY (`id_munic`),
  KEY `id_pais` (`id_depto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=312 ;

--
-- Volcado de datos para la tabla `t00_municipios`
--

INSERT INTO `t00_municipios` (`id_munic`, `cod_munic`, `nombre_munic`, `id_depto`, `f_creacion`, `programa`, `poblacion`, `superficie`) VALUES
(1, '0101', 'La Ceiba', 1, '2014-08-09', 'MANUAL', 0, 0),
(2, '0102', 'El Porvenir', 1, '2014-08-09', 'MANUAL', 0, 0),
(3, '0103', 'Esparta', 1, '2014-08-09', 'MANUAL', 0, 0),
(4, '0104', 'Jutiapa', 1, '2014-08-09', 'MANUAL', 0, 0),
(5, '0105', 'La Masica', 1, '2014-08-09', 'MANUAL', 0, 0),
(6, '0106', 'San Francisco', 1, '2014-08-09', 'MANUAL', 0, 0),
(7, '0107', 'Tela', 1, '2014-08-09', 'MANUAL', 0, 0),
(8, '0108', 'Arizona', 1, '2014-08-09', 'MANUAL', 0, 0),
(9, '0201', 'Trujillo', 2, '2014-08-09', 'MANUAL', 0, 0),
(10, '0202', 'Balfate', 2, '2014-08-09', 'MANUAL', 0, 0),
(11, '0203', 'Iriona', 2, '2014-08-09', 'MANUAL', 0, 0),
(12, '0204', 'Limon', 2, '2014-08-09', 'MANUAL', 0, 0),
(13, '0205', 'Saba', 2, '2014-08-09', 'MANUAL', 0, 0),
(14, '0206', 'Santa Fe', 2, '2014-08-09', 'MANUAL', 0, 0),
(15, '0207', 'Santa Rosa de Aguan', 2, '2014-08-09', 'MANUAL', 0, 0),
(16, '0208', 'Sonaguera', 2, '2014-08-09', 'MANUAL', 0, 0),
(17, '0209', 'Tocoa', 2, '2014-08-09', 'MANUAL', 0, 0),
(18, '0210', 'Bonito Oriental', 2, '2014-08-09', 'MANUAL', 0, 0),
(19, '0301', 'Comayagua', 3, '2014-08-09', 'MANUAL', 0, 0),
(20, '0302', 'Ajuterique', 3, '2014-08-09', 'MANUAL', 0, 0),
(21, '0303', 'El Rosario', 3, '2014-08-09', 'MANUAL', 0, 0),
(22, '0304', 'Esquias', 3, '2014-08-09', 'MANUAL', 0, 0),
(23, '0305', 'Humuya', 3, '2014-08-09', 'MANUAL', 0, 0),
(24, '0306', 'La Libertad', 3, '2014-08-09', 'MANUAL', 0, 0),
(25, '0307', 'Lamani', 3, '2014-08-09', 'MANUAL', 0, 0),
(26, '0308', 'La Trinidad', 3, '2014-08-09', 'MANUAL', 0, 0),
(27, '0309', 'Lejamani', 3, '2014-08-09', 'MANUAL', 0, 0),
(28, '0310', 'Meambar', 3, '2014-08-09', 'MANUAL', 0, 0),
(29, '0311', 'Minas de Oro', 3, '2014-08-09', 'MANUAL', 0, 0),
(30, '0312', 'Ojos de Agua', 3, '2014-08-09', 'MANUAL', 0, 0),
(31, '0313', 'San Jeronimo', 3, '2014-08-09', 'MANUAL', 0, 0),
(32, '0314', 'San Jose Comayagua', 3, '2014-08-09', 'MANUAL', 0, 0),
(33, '0315', 'San Jose del Potrero', 3, '2014-08-09', 'MANUAL', 0, 0),
(34, '0316', 'San Luis', 3, '2014-08-09', 'MANUAL', 0, 0),
(35, '0317', 'San Sebasti', 3, '2014-08-09', 'MANUAL', 0, 0),
(36, '0318', 'Siguatepeque', 3, '2014-08-09', 'MANUAL', 0, 0),
(37, '0319', 'Villa de San Antonio', 3, '2014-08-09', 'MANUAL', 0, 0),
(38, '0320', 'Las Lajas', 3, '2014-08-09', 'MANUAL', 0, 0),
(39, '0321', 'Taulabe', 3, '2014-08-09', 'MANUAL', 0, 0),
(40, '0401', 'Santa Rosa de Copan', 4, '2014-08-09', 'MANUAL', 0, 0),
(41, '0402', 'Cabanas', 4, '2014-08-09', 'MANUAL', 0, 0),
(42, '0403', 'Concepcion', 4, '2014-08-09', 'MANUAL', 0, 0),
(43, '0404', 'Copan Ruinas', 4, '2014-08-09', 'MANUAL', 0, 0),
(44, '0405', 'Corquin', 4, '2014-08-09', 'MANUAL', 0, 0),
(45, '0406', 'Cucuyagua', 4, '2014-08-09', 'MANUAL', 0, 0),
(46, '0407', 'Dolores', 4, '2014-08-09', 'MANUAL', 0, 0),
(47, '0408', 'Dulce Nombre', 4, '2014-08-09', 'MANUAL', 0, 0),
(48, '0409', 'El Paraiso', 4, '2014-08-09', 'MANUAL', 0, 0),
(49, '0410', 'Florida', 4, '2014-08-09', 'MANUAL', 0, 0),
(50, '0411', 'La Jigua', 4, '2014-08-09', 'MANUAL', 0, 0),
(51, '0412', 'La Union', 4, '2014-08-09', 'MANUAL', 0, 0),
(52, '0413', 'Nueva Arcadia', 4, '2014-08-09', 'MANUAL', 0, 0),
(53, '0414', 'San Agustin', 4, '2014-08-09', 'MANUAL', 0, 0),
(54, '0415', 'San Antonio', 4, '2014-08-09', 'MANUAL', 0, 0),
(55, '0416', 'San Jeronimo', 4, '2014-08-09', 'MANUAL', 0, 0),
(56, '0417', 'San Jose', 4, '2014-08-09', 'MANUAL', 0, 0),
(57, '0418', 'San Juan de Opoa', 4, '2014-08-09', 'MANUAL', 0, 0),
(58, '0419', 'San Nicolas', 4, '2014-08-09', 'MANUAL', 0, 0),
(59, '0420', 'San Pedro', 4, '2014-08-09', 'MANUAL', 0, 0),
(60, '0421', 'Santa Rita', 4, '2014-08-09', 'MANUAL', 0, 0),
(61, '0422', 'Trinidad', 4, '2014-08-09', 'MANUAL', 0, 0),
(62, '0423', 'Veracruz', 4, '2014-08-09', 'MANUAL', 0, 0),
(63, '0501', 'San Pedro Sula', 5, '2014-08-09', 'MANUAL', 0, 0),
(64, '0502', 'Choloma', 5, '2014-08-09', 'MANUAL', 0, 0),
(65, '0503', 'Omoa', 5, '2014-08-09', 'MANUAL', 0, 0),
(66, '0504', 'Pimienta', 5, '2014-08-09', 'MANUAL', 0, 0),
(67, '0505', 'Potrerillos', 5, '2014-08-09', 'MANUAL', 0, 0),
(68, '0506', 'Puerto Cortes', 5, '2014-08-09', 'MANUAL', 0, 0),
(69, '0507', 'San Antonio de Cortes', 5, '2014-08-09', 'MANUAL', 0, 0),
(70, '0508', 'San Francisco de Yojoa', 5, '2014-08-09', 'MANUAL', 0, 0),
(71, '0509', 'San Manuel', 5, '2014-08-09', 'MANUAL', 0, 0),
(72, '0510', 'Santa Cruz de Yojoa', 5, '2014-08-09', 'MANUAL', 0, 0),
(73, '0511', 'Villanueva', 5, '2014-08-09', 'MANUAL', 0, 0),
(74, '0512', 'La Lima', 5, '2014-08-09', 'MANUAL', 0, 0),
(75, '0601', 'Choluteca', 6, '2014-08-09', 'MANUAL', 0, 0),
(76, '0602', 'Apacilagua', 6, '2014-08-09', 'MANUAL', 0, 0),
(77, '0603', 'Concepci?n de Maria', 6, '2014-08-09', 'MANUAL', 0, 0),
(78, '0604', 'Duyure', 6, '2014-08-09', 'MANUAL', 0, 0),
(79, '0605', 'El Corpus', 6, '2014-08-09', 'MANUAL', 0, 0),
(80, '0606', 'El Triunfo', 6, '2014-08-09', 'MANUAL', 0, 0),
(81, '0607', 'Marcovia', 6, '2014-08-09', 'MANUAL', 0, 0),
(82, '0608', 'Morolica', 6, '2014-08-09', 'MANUAL', 0, 0),
(83, '0609', 'Namasigue', 6, '2014-08-09', 'MANUAL', 0, 0),
(84, '0610', 'Orocuina', 6, '2014-08-09', 'MANUAL', 0, 0),
(85, '0611', 'Pespire', 6, '2014-08-09', 'MANUAL', 0, 0),
(86, '0612', 'San Antonio de Flores', 6, '2014-08-09', 'MANUAL', 0, 0),
(87, '0613', 'San Isidro', 6, '2014-08-09', 'MANUAL', 0, 0),
(88, '0614', 'San Jose', 6, '2014-08-09', 'MANUAL', 0, 0),
(89, '0615', 'San Marcos de Colon', 6, '2014-08-09', 'MANUAL', 0, 0),
(90, '0616', 'Santa Ana de Yusguare', 6, '2014-08-09', 'MANUAL', 0, 0),
(91, '0701', 'Yuscaran', 7, '2014-08-09', 'MANUAL', 0, 0),
(92, '0702', 'Alauca', 7, '2014-08-09', 'MANUAL', 0, 0),
(93, '0703', 'Danli', 7, '2014-08-09', 'MANUAL', 0, 0),
(94, '0704', 'El Paraiso', 7, '2014-08-09', 'MANUAL', 0, 0),
(95, '0705', 'Guinope', 7, '2014-08-09', 'MANUAL', 0, 0),
(96, '0706', 'Jacaleapa', 7, '2014-08-09', 'MANUAL', 0, 0),
(97, '0707', 'Liure', 7, '2014-08-09', 'MANUAL', 0, 0),
(98, '0708', 'Moroceli', 7, '2014-08-09', 'MANUAL', 0, 0),
(99, '0709', 'Oropoli', 7, '2014-08-09', 'MANUAL', 0, 0),
(100, '0710', 'Potrerillos', 7, '2014-08-09', 'MANUAL', 0, 0),
(101, '0711', 'San Antonio de Flores', 7, '2014-08-09', 'MANUAL', 0, 0),
(102, '0712', 'San Lucas', 7, '2014-08-09', 'MANUAL', 0, 0),
(103, '0713', 'San Matias', 7, '2014-08-09', 'MANUAL', 0, 0),
(104, '0714', 'Soledad', 7, '2014-08-09', 'MANUAL', 0, 0),
(105, '0715', 'Teupasenti', 7, '2014-08-09', 'MANUAL', 0, 0),
(106, '0716', 'Texiguat', 7, '2014-08-09', 'MANUAL', 0, 0),
(107, '0717', 'Vado Ancho', 7, '2014-08-09', 'MANUAL', 0, 0),
(108, '0718', 'Yauyupe', 7, '2014-08-09', 'MANUAL', 0, 0),
(109, '0719', 'Trojes', 7, '2014-08-09', 'MANUAL', 0, 0),
(110, '0801', 'Distrito Central', 8, '2014-08-09', 'MANUAL', 0, 0),
(111, '0802', 'Alubaren', 8, '2014-08-09', 'MANUAL', 0, 0),
(112, '0803', 'Cedros', 8, '2014-08-09', 'MANUAL', 0, 0),
(113, '0804', 'Curaren', 8, '2014-08-09', 'MANUAL', 0, 0),
(114, '0805', 'El Porvenir', 8, '2014-08-09', 'MANUAL', 0, 0),
(115, '0806', 'Guaimaca', 8, '2014-08-09', 'MANUAL', 0, 0),
(116, '0807', 'La Libertad', 8, '2014-08-09', 'MANUAL', 0, 0),
(117, '0808', 'La Venta', 8, '2014-08-09', 'MANUAL', 0, 0),
(118, '0809', 'Lepaterique', 8, '2014-08-09', 'MANUAL', 0, 0),
(119, '0810', 'Maraita', 8, '2014-08-09', 'MANUAL', 0, 0),
(120, '0811', 'Marale', 8, '2014-08-09', 'MANUAL', 0, 0),
(121, '0812', 'Nueva Armenia', 8, '2014-08-09', 'MANUAL', 0, 0),
(122, '0813', 'Ojojona', 8, '2014-08-09', 'MANUAL', 0, 0),
(123, '0814', 'Orica', 8, '2014-08-09', 'MANUAL', 0, 0),
(124, '0815', 'Reitoca', 8, '2014-08-09', 'MANUAL', 0, 0),
(125, '0816', 'Sabanagrande', 8, '2014-08-09', 'MANUAL', 0, 0),
(126, '0817', 'San Antonio de Oriente', 8, '2014-08-09', 'MANUAL', 0, 0),
(127, '0818', 'San Buenaventura', 8, '2014-08-09', 'MANUAL', 0, 0),
(128, '0819', 'San Ignacio', 8, '2014-08-09', 'MANUAL', 0, 0),
(129, '0820', 'San Juan de Flores', 8, '2014-08-09', 'MANUAL', 0, 0),
(130, '0821', 'San Miguelito', 8, '2014-08-09', 'MANUAL', 0, 0),
(131, '0822', 'Santa Ana', 8, '2014-08-09', 'MANUAL', 0, 0),
(132, '0823', 'Santa Lucia', 8, '2014-08-09', 'MANUAL', 0, 0),
(133, '0824', 'Talanga', 8, '2014-08-09', 'MANUAL', 0, 0),
(134, '0825', 'Tatumbla', 8, '2014-08-09', 'MANUAL', 0, 0),
(135, '0826', 'Valle de Angeles', 8, '2014-08-09', 'MANUAL', 0, 0),
(136, '0827', 'Villa de San Francisco', 8, '2014-08-09', 'MANUAL', 0, 0),
(137, '0828', 'Vallecillo', 8, '2014-08-09', 'MANUAL', 0, 0),
(138, '0901', 'Puerto Lempira', 9, '2014-08-09', 'MANUAL', 0, 0),
(139, '0902', 'Brus Laguna', 9, '2014-08-09', 'MANUAL', 0, 0),
(140, '0903', 'Ahuas', 9, '2014-08-09', 'MANUAL', 0, 0),
(141, '0904', 'Juan Francisco Bulnes', 9, '2014-08-09', 'MANUAL', 0, 0),
(142, '0905', 'Villeda Morales', 9, '2014-08-09', 'MANUAL', 0, 0),
(143, '0906', 'Wampusirpi', 9, '2014-08-09', 'MANUAL', 0, 0),
(144, '1001', 'La Esperanza', 10, '2014-08-09', 'MANUAL', 0, 0),
(145, '1002', 'Camasca', 10, '2014-08-09', 'MANUAL', 0, 0),
(146, '1003', 'Colomoncagua', 10, '2014-08-09', 'MANUAL', 0, 0),
(147, '1004', 'Concepcion', 10, '2014-08-09', 'MANUAL', 0, 0),
(148, '1005', 'Dolores', 10, '2014-08-09', 'MANUAL', 0, 0),
(149, '1006', 'Intibuca', 10, '2014-08-09', 'MANUAL', 0, 0),
(150, '1007', 'Jesus de Otoro', 10, '2014-08-09', 'MANUAL', 0, 0),
(151, '1008', 'Magdalena', 10, '2014-08-09', 'MANUAL', 0, 0),
(152, '1009', 'Masaguara', 10, '2014-08-09', 'MANUAL', 0, 0),
(153, '1010', 'San Antonio', 10, '2014-08-09', 'MANUAL', 0, 0),
(154, '1011', 'San Isidro', 10, '2014-08-09', 'MANUAL', 0, 0),
(155, '1012', 'San Juan de Flores', 10, '2014-08-09', 'MANUAL', 0, 0),
(156, '1013', 'San Marcos de La Sierra', 10, '2014-08-09', 'MANUAL', 0, 0),
(157, '1014', 'San Miguel Guancapla', 10, '2014-08-09', 'MANUAL', 0, 0),
(158, '1015', 'Santa Lucia', 10, '2014-08-09', 'MANUAL', 0, 0),
(159, '1016', 'Yamaranguila', 10, '2014-08-09', 'MANUAL', 0, 0),
(160, '1017', 'San Francisco de Opalaca', 10, '2014-08-09', 'MANUAL', 0, 0),
(161, '1101', 'Roatan', 11, '2014-08-09', 'MANUAL', 0, 0),
(162, '1102', 'Guanaja', 11, '2014-08-09', 'MANUAL', 0, 0),
(163, '1103', 'Jose Santos Guardiola', 11, '2014-08-09', 'MANUAL', 0, 0),
(164, '1104', 'Utila', 11, '2014-08-09', 'MANUAL', 0, 0),
(165, '1201', 'La Paz', 12, '2014-08-09', 'MANUAL', 0, 0),
(166, '1202', 'Aguantequerique', 12, '2014-08-09', 'MANUAL', 0, 0),
(167, '1203', 'Cabanas', 12, '2014-08-09', 'MANUAL', 0, 0),
(168, '1204', 'Cane', 12, '2014-08-09', 'MANUAL', 0, 0),
(169, '1205', 'Chinacla', 12, '2014-08-09', 'MANUAL', 0, 0),
(170, '1206', 'Guajiquiro', 12, '2014-08-09', 'MANUAL', 0, 0),
(171, '1207', 'Lauterique', 12, '2014-08-09', 'MANUAL', 0, 0),
(172, '1208', 'Marcala', 12, '2014-08-09', 'MANUAL', 0, 0),
(173, '1209', 'Mercedes de Oriente', 12, '2014-08-09', 'MANUAL', 0, 0),
(174, '1210', 'Opatoro', 12, '2014-08-09', 'MANUAL', 0, 0),
(175, '1211', 'San Antonio del Norte', 12, '2014-08-09', 'MANUAL', 0, 0),
(176, '1212', 'San Jose', 12, '2014-08-09', 'MANUAL', 0, 0),
(177, '1213', 'San Juan', 12, '2014-08-09', 'MANUAL', 0, 0),
(178, '1214', 'San pedro de Tutule', 12, '2014-08-09', 'MANUAL', 0, 0),
(179, '1215', 'Santa Ana', 12, '2014-08-09', 'MANUAL', 0, 0),
(180, '1216', 'Santa Elena', 12, '2014-08-09', 'MANUAL', 0, 0),
(181, '1217', 'Santa Maria', 12, '2014-08-09', 'MANUAL', 0, 0),
(182, '1218', 'Santiago de Puringla', 12, '2014-08-09', 'MANUAL', 0, 0),
(183, '1219', 'Yarula', 12, '2014-08-09', 'MANUAL', 0, 0),
(184, '1301', 'Gracias', 13, '2014-08-09', 'MANUAL', 0, 0),
(185, '1302', 'Belen', 13, '2014-08-09', 'MANUAL', 0, 0),
(186, '1303', 'Candelaria', 13, '2014-08-09', 'MANUAL', 0, 0),
(187, '1304', 'Cololaca', 13, '2014-08-09', 'MANUAL', 0, 0),
(188, '1305', 'Erandique', 13, '2014-08-09', 'MANUAL', 0, 0),
(189, '1306', 'Gualcince', 13, '2014-08-09', 'MANUAL', 0, 0),
(190, '1307', 'Guarita', 13, '2014-08-09', 'MANUAL', 0, 0),
(191, '1308', 'La Campa', 13, '2014-08-09', 'MANUAL', 0, 0),
(192, '1309', 'La Iguala', 13, '2014-08-09', 'MANUAL', 0, 0),
(193, '1310', 'Las Flores', 13, '2014-08-09', 'MANUAL', 0, 0),
(194, '1311', 'La Union', 13, '2014-08-09', 'MANUAL', 0, 0),
(195, '1312', 'La Virtud', 13, '2014-08-09', 'MANUAL', 0, 0),
(196, '1313', 'Lepaera', 13, '2014-08-09', 'MANUAL', 0, 0),
(197, '1314', 'Mapulaca', 13, '2014-08-09', 'MANUAL', 0, 0),
(198, '1315', 'Piraera', 13, '2014-08-09', 'MANUAL', 0, 0),
(199, '1316', 'San Andres', 13, '2014-08-09', 'MANUAL', 0, 0),
(200, '1317', 'San Francisco', 13, '2014-08-09', 'MANUAL', 0, 0),
(201, '1318', 'San Juan Guarita', 13, '2014-08-09', 'MANUAL', 0, 0),
(202, '1319', 'San Manuel de Colohete', 13, '2014-08-09', 'MANUAL', 0, 0),
(203, '1320', 'San Rafael', 13, '2014-08-09', 'MANUAL', 0, 0),
(204, '1321', 'San Sebastian', 13, '2014-08-09', 'MANUAL', 0, 0),
(205, '1322', 'Santa Cruz', 13, '2014-08-09', 'MANUAL', 0, 0),
(206, '1323', 'Talgua', 13, '2014-08-09', 'MANUAL', 0, 0),
(207, '1324', 'Tambla', 13, '2014-08-09', 'MANUAL', 0, 0),
(208, '1325', 'Tomala', 13, '2014-08-09', 'MANUAL', 0, 0),
(209, '1326', 'Valladolid', 13, '2014-08-09', 'MANUAL', 0, 0),
(210, '1327', 'Virginia', 13, '2014-08-09', 'MANUAL', 0, 0),
(211, '1328', 'San Marcos de Caiquin', 13, '2014-08-09', 'MANUAL', 0, 0),
(212, '1401', 'Ocotepeque', 14, '2014-08-09', 'MANUAL', 0, 0),
(213, '1402', 'Belen Gualcho', 14, '2014-08-09', 'MANUAL', 0, 0),
(214, '1403', 'Concepcion', 14, '2014-08-09', 'MANUAL', 0, 0),
(215, '1404', 'Dolores Merendon', 14, '2014-08-09', 'MANUAL', 0, 0),
(216, '1405', 'Fraternidad', 14, '2014-08-09', 'MANUAL', 0, 0),
(217, '1406', 'La Encarnacion', 14, '2014-08-09', 'MANUAL', 0, 0),
(218, '1407', 'La Labor', 14, '2014-08-09', 'MANUAL', 0, 0),
(219, '1408', 'Lucema', 14, '2014-08-09', 'MANUAL', 0, 0),
(220, '1409', 'Mercedes', 14, '2014-08-09', 'MANUAL', 0, 0),
(221, '1410', 'San Fernando', 14, '2014-08-09', 'MANUAL', 0, 0),
(222, '1411', 'San Francisco del Valle', 14, '2014-08-09', 'MANUAL', 0, 0),
(223, '1412', 'San Jorge', 14, '2014-08-09', 'MANUAL', 0, 0),
(224, '1413', 'San Marcos', 14, '2014-08-09', 'MANUAL', 0, 0),
(225, '1414', 'Santa Fe', 14, '2014-08-09', 'MANUAL', 0, 0),
(226, '1415', 'Sensenti', 14, '2014-08-09', 'MANUAL', 0, 0),
(227, '1416', 'Sinuapa', 14, '2014-08-09', 'MANUAL', 0, 0),
(228, '1501', 'Juticalpa', 15, '2014-08-09', 'MANUAL', 0, 0),
(229, '1502', 'Campamento', 15, '2014-08-09', 'MANUAL', 0, 0),
(230, '1503', 'Catacamas', 15, '2014-08-09', 'MANUAL', 0, 0),
(231, '1504', 'Concordia', 15, '2014-08-09', 'MANUAL', 0, 0),
(232, '1505', 'Dulce Nombre de Culmi', 15, '2014-08-09', 'MANUAL', 0, 0),
(233, '1506', 'El Rosario', 15, '2014-08-09', 'MANUAL', 0, 0),
(234, '1507', 'Esquipulas del Norte', 15, '2014-08-09', 'MANUAL', 0, 0),
(235, '1508', 'Gualaco', 15, '2014-08-09', 'MANUAL', 0, 0),
(236, '1509', 'Guarizama', 15, '2014-08-09', 'MANUAL', 0, 0),
(237, '1510', 'Guata', 15, '2014-08-09', 'MANUAL', 0, 0),
(238, '1511', 'Guayape', 15, '2014-08-09', 'MANUAL', 0, 0),
(239, '1512', 'Jano', 15, '2014-08-09', 'MANUAL', 0, 0),
(240, '1513', 'La Union', 15, '2014-08-09', 'MANUAL', 0, 0),
(241, '1514', 'Mangulile', 15, '2014-08-09', 'MANUAL', 0, 0),
(242, '1515', 'Manto', 15, '2014-08-09', 'MANUAL', 0, 0),
(243, '1516', 'Salama', 15, '2014-08-09', 'MANUAL', 0, 0),
(244, '1517', 'San Esteban', 15, '2014-08-09', 'MANUAL', 0, 0),
(245, '1518', 'San Francisco de Becerra', 15, '2014-08-09', 'MANUAL', 0, 0),
(246, '1519', 'San Francisco de La Paz', 15, '2014-08-09', 'MANUAL', 0, 0),
(247, '1520', 'Santa Maria del Real', 15, '2014-08-09', 'MANUAL', 0, 0),
(248, '1521', 'Silca', 15, '2014-08-09', 'MANUAL', 0, 0),
(249, '1522', 'Yocon', 15, '2014-08-09', 'MANUAL', 0, 0),
(250, '1523', 'Froylan Turcios', 15, '2014-08-09', 'MANUAL', 0, 0),
(251, '1601', 'Santa Barbara', 16, '2014-08-09', 'MANUAL', 0, 0),
(252, '1602', 'Arada', 16, '2014-08-09', 'MANUAL', 0, 0),
(253, '1603', 'Atima', 16, '2014-08-09', 'MANUAL', 0, 0),
(254, '1604', 'Azacualpa', 16, '2014-08-09', 'MANUAL', 0, 0),
(255, '1605', 'Ceguaca', 16, '2014-08-09', 'MANUAL', 0, 0),
(256, '1606', 'Colinas', 16, '2014-08-09', 'MANUAL', 0, 0),
(257, '1607', 'Concepcion del Norte', 16, '2014-08-09', 'MANUAL', 0, 0),
(258, '1608', 'Concepci?n del Sur', 16, '2014-08-09', 'MANUAL', 0, 0),
(259, '1609', 'Chinda', 16, '2014-08-09', 'MANUAL', 0, 0),
(260, '1610', 'El Nispero', 16, '2014-08-09', 'MANUAL', 0, 0),
(261, '1611', 'Gualala', 16, '2014-08-09', 'MANUAL', 0, 0),
(262, '1612', 'Ilama', 16, '2014-08-09', 'MANUAL', 0, 0),
(263, '1613', 'Macuelizo', 16, '2014-08-09', 'MANUAL', 0, 0),
(264, '1614', 'Naranjito', 16, '2014-08-09', 'MANUAL', 0, 0),
(265, '1615', 'Nuevo Celilac', 16, '2014-08-09', 'MANUAL', 0, 0),
(266, '1616', 'Petoa', 16, '2014-08-09', 'MANUAL', 0, 0),
(267, '1617', 'Proteccion', 16, '2014-08-09', 'MANUAL', 0, 0),
(268, '1618', 'Quimistan', 16, '2014-08-09', 'MANUAL', 0, 0),
(269, '1619', 'San Francisco de Ojuera', 16, '2014-08-09', 'MANUAL', 0, 0),
(270, '1620', 'San Luis', 16, '2014-08-09', 'MANUAL', 0, 0),
(271, '1621', 'San Marcos', 16, '2014-08-09', 'MANUAL', 0, 0),
(272, '1622', 'San Nicolas', 16, '2014-08-09', 'MANUAL', 0, 0),
(273, '1623', 'San Pedro de Zacapa', 16, '2014-08-09', 'MANUAL', 0, 0),
(274, '1624', 'Santa Rita', 16, '2014-08-09', 'MANUAL', 0, 0),
(275, '1625', 'San Vicente Centenario', 16, '2014-08-09', 'MANUAL', 0, 0),
(276, '1626', 'Trinidad', 16, '2014-08-09', 'MANUAL', 0, 0),
(277, '1627', 'Las Vegas', 16, '2014-08-09', 'MANUAL', 0, 0),
(278, '1628', 'Nueva Frontera', 16, '2014-08-09', 'MANUAL', 0, 0),
(279, '1701', 'Nacaome', 17, '2014-08-09', 'MANUAL', 0, 0),
(280, '1702', 'Alianza', 17, '2014-08-09', 'MANUAL', 0, 0),
(281, '1703', 'Amapala', 17, '2014-08-09', 'MANUAL', 0, 0),
(282, '1704', 'Aramecina', 17, '2014-08-09', 'MANUAL', 0, 0),
(283, '1705', 'Caridad', 17, '2014-08-09', 'MANUAL', 0, 0),
(284, '1706', 'Goascoran', 17, '2014-08-09', 'MANUAL', 0, 0),
(285, '1707', 'Langue', 17, '2014-08-09', 'MANUAL', 0, 0),
(286, '1708', 'San Francisco de Coray', 17, '2014-08-09', 'MANUAL', 0, 0),
(287, '1709', 'San Lorenzo', 17, '2014-08-09', 'MANUAL', 0, 0),
(288, '1801', 'Yoro', 18, '2014-08-09', 'MANUAL', 0, 0),
(289, '1802', 'Arenal', 18, '2014-08-09', 'MANUAL', 0, 0),
(290, '1803', 'El Negrito', 18, '2014-08-09', 'MANUAL', 0, 0),
(291, '1804', 'El Progreso', 18, '2014-08-09', 'MANUAL', 0, 0),
(292, '1805', 'Jocon', 18, '2014-08-09', 'MANUAL', 0, 0),
(293, '1806', 'Morazan', 18, '2014-08-09', 'MANUAL', 0, 0),
(294, '1807', 'Olanchito', 18, '2014-08-09', 'MANUAL', 0, 0),
(295, '1808', 'Santa Rita', 18, '2014-08-09', 'MANUAL', 0, 0),
(296, '1809', 'Sulaco', 18, '2014-08-09', 'MANUAL', 0, 0),
(297, '1810', 'Victoria', 18, '2014-08-09', 'MANUAL', 0, 0),
(298, '1811', 'Yorito', 18, '2014-08-09', 'MANUAL', 0, 0),
(299, '0814a', 'SAN JUAN', 8, '2014-08-09', 'MANUAL', 0, 0),
(300, '0901a', 'RUS RUS', 9, '2014-08-09', 'MANUAL', 0, 0),
(301, '0901b', 'TIKIRAYA', 9, '2014-08-09', 'MANUAL', 0, 0),
(302, '0905a', 'USIBILA', 9, '2014-08-09', 'MANUAL', 0, 0),
(303, '0906a', 'KRAUSIRPE', 9, '2014-08-09', 'MANUAL', 0, 0),
(304, '1003a', 'SAN ANTONIO', 10, '2014-08-09', 'MANUAL', 0, 0),
(305, '1210a', 'FLORIDA', 12, '2014-08-09', 'MANUAL', 0, 0),
(306, '1210b', 'MESETAS', 12, '2014-08-09', 'MANUAL', 0, 0),
(307, '1215a', 'ESTANCIA', 12, '2014-08-09', 'MANUAL', 0, 0),
(308, '1216a', 'NAHUATERIQUE', 12, '2014-08-09', 'MANUAL', 0, 0),
(309, '1219a', 'EL ZANCUDO', 12, '2014-08-09', 'MANUAL', 0, 0),
(310, '1307a', 'SAN PABLO', 13, '2014-08-09', 'MANUAL', 0, 0),
(311, '1318a', 'SAZALAPA', 13, '2014-08-09', 'MANUAL', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_pais`
--

CREATE TABLE IF NOT EXISTS `t00_pais` (
  `id_pais` int(2) NOT NULL AUTO_INCREMENT,
  `cod_pais` varchar(5) NOT NULL,
  `nombre_pais` varchar(30) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `t00_pais`
--

INSERT INTO `t00_pais` (`id_pais`, `cod_pais`, `nombre_pais`, `f_creacion`, `programa`) VALUES
(1, 'PA001', 'Honduras', '2014-08-09', 'MANUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_personas`
--

CREATE TABLE IF NOT EXISTS `t00_personas` (
  `id_persona` int(3) NOT NULL AUTO_INCREMENT,
  `cod_persona` varchar(6) NOT NULL,
  `id_tipo_persona` int(3) NOT NULL,
  `id_sexo` int(1) NOT NULL,
  `id_estado_civil` int(1) NOT NULL,
  `id_munic` int(3) NOT NULL,
  `id_estado` int(3) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `no_identidad` varchar(13) NOT NULL,
  `nombre_1` varchar(15) NOT NULL,
  `nombre_2` varchar(15) DEFAULT NULL,
  `apellido_1` varchar(15) NOT NULL,
  `apellido_2` varchar(15) DEFAULT NULL,
  `f_nacimiento` date NOT NULL,
  `telefono` int(8) DEFAULT NULL,
  `celular` int(8) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `skype` varchar(30) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `rtn` varchar(20) DEFAULT NULL,
  `no_pasaporte` varchar(50) DEFAULT NULL,
  `twitter` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_persona`,`cod_persona`),
  KEY `id_tipo_persona` (`id_tipo_persona`,`id_sexo`,`id_estado_civil`,`cod_persona`,`no_identidad`,`id_munic`),
  KEY `id_estado` (`id_estado`),
  KEY `id_sexo` (`id_sexo`),
  KEY `id_estado_civil` (`id_estado_civil`),
  KEY `id_munic` (`id_munic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `t00_personas`
--

INSERT INTO `t00_personas` (`id_persona`, `cod_persona`, `id_tipo_persona`, `id_sexo`, `id_estado_civil`, `id_munic`, `id_estado`, `f_creacion`, `programa`, `usuario`, `no_identidad`, `nombre_1`, `nombre_2`, `apellido_1`, `apellido_2`, `f_nacimiento`, `telefono`, `celular`, `direccion`, `e_mail`, `skype`, `facebook`, `rtn`, `no_pasaporte`, `twitter`) VALUES
(1, 'PER001', 2, 1, 2, 110, 1, '2014-08-09', 't00_Personas', '', '0810142343242', 'Nahum', 'Aaron', 'Martinez', 'Salgado', '1985-04-04', 22058495, 88907234, 'Colonia Centro America Oeste, Bloque G, casa 1221', 'neroblanco22@yahoo.es', 'neroblanco22', 'Nahum Martinez', '', '', ''),
(2, 'PER002', 2, 1, 4, 110, 1, '2014-10-31', 't00_Personas', 'nahum', '0801198520207', 'Nahum', 'Aaron', 'Martinez', 'Salgado', '1998-03-11', 22058495, 88907234, 'Colonia Centro America Oeste', 'neroblanco22@yahoo.es', 'neroblanco 22', 'Nahum Martinez', '', 'E78230', ''),
(3, 'PER003', 3, 2, 4, 1, 1, '2014-10-31', 't00_Personas', 'nahum', '0801198612134', 'Eva', 'Maria', 'Barahona', 'Mira', '1986-07-12', 22058495, 89009933, 'Altos del Trapiche, calle Principal subiendo por el palito tercera casa, enfrente de casa de tres plantas color azul', 'evamariab86@yahoo.es', 'eva maria', 'Eva Barahona', '', '', ''),
(14, '1986', 2, 2, 1, 19, 1, '2014-11-06', 't00_Personas', 'nahum', '0801198854376', 'Eva', 'petronila', 'LOpez', 'Castro', '1988-07-12', 22273398, 99356900, 'col.la peÃ±a por bajo , una cuadra arriba de la estacion de buses del popular ', 'evapetroloca@yahoo.es', '', '', '', '5555555555', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_productos`
--

CREATE TABLE IF NOT EXISTS `t00_productos` (
  `id_producto` int(6) NOT NULL AUTO_INCREMENT,
  `cod_producto` varchar(15) NOT NULL,
  `id_tipo_producto` int(3) NOT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `desc_producto` varchar(50) NOT NULL,
  `id_color` int(2) NOT NULL,
  `altura` varchar(6) NOT NULL,
  `ancho` varchar(6) NOT NULL,
  `peso` varchar(6) NOT NULL,
  `id_medida` int(2) NOT NULL,
  `fecha_elaboracion` date NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `precio_costo` double NOT NULL,
  `precio_venta1` double NOT NULL,
  `precio_venta2` double DEFAULT NULL,
  `precio_venta3` double DEFAULT NULL,
  `id_descuento` int(3) NOT NULL,
  `id_isv` int(3) NOT NULL,
  `cant_ini` int(6) DEFAULT NULL,
  `cant_max` int(6) DEFAULT NULL,
  `cant_real` int(6) DEFAULT NULL,
  `cant_re_orden` int(6) DEFAULT NULL,
  `ind_facturable` bit(1) DEFAULT NULL,
  `id_proveedor` int(3) NOT NULL,
  `observaciones` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_producto`,`cod_producto`),
  KEY `id_tipo_producto` (`id_tipo_producto`,`id_color`,`id_medida`,`id_descuento`,`id_isv`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_color` (`id_color`),
  KEY `id_medida` (`id_medida`),
  KEY `id_isv` (`id_isv`),
  KEY `id_descuento` (`id_descuento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `t00_productos`
--

INSERT INTO `t00_productos` (`id_producto`, `cod_producto`, `id_tipo_producto`, `f_creacion`, `programa`, `usuario`, `desc_producto`, `id_color`, `altura`, `ancho`, `peso`, `id_medida`, `fecha_elaboracion`, `fecha_expedicion`, `precio_costo`, `precio_venta1`, `precio_venta2`, `precio_venta3`, `id_descuento`, `id_isv`, `cant_ini`, `cant_max`, `cant_real`, `cant_re_orden`, `ind_facturable`, `id_proveedor`, `observaciones`) VALUES
(1, '453455345345345', 18, '2014-11-17', 't00_IngresoProductos', 'nahum', 'Carne de Pollo', 1, '', '', '', 1, '2014-11-16', '2014-11-17', 22.15, 27.7, 30.5, 0, 9, 1, 0, 1000, 0, 500, b'1', 2, 'Carnes de Pollo por Saco, promedio de Lbs. 80.5'),
(3, '7000001', 17, '2014-11-23', 't00_IngresoProductos', 'nahum', 'Sardina Marimar', 3, '', '', '', 4, '2014-11-23', '2014-11-23', 12.85, 20.5, 0, 0, 9, 1, 0, 200, 0, 100, b'1', 2, 'Sardina de Mar , marca Marimar con sin descuento y con Impuesto sobre Ventas '),
(4, '7000002', 18, '2014-11-23', 't00_IngresoProductos', 'nahum', 'Medallones de Pollo', 1, '', '', '2', 1, '2014-11-23', '2014-11-29', 22.9, 35, 0, 0, 9, 2, 0, 20, 0, 5, b'1', 2, 'Medallones de Pollo, CompaÃ±ia Cadeca de 12 Unidades cada Caja'),
(5, '7000003', 19, '2014-11-24', 't00_IngresoProductos', 'nahum', 'Churros Fiesta de Honduras', 5, '', '', '', 2, '2014-11-23', '2014-11-30', 3.5, 5, 0, 0, 9, 2, 0, 300, 0, 100, b'1', 2, 'Churros fiestas'),
(6, '7000004', 18, '2014-11-26', 't00_IngresoProductos', 'nahum', 'Alitas de Pollo', 1, '', '', '2', 1, '2014-11-26', '2014-11-30', 35, 50, 0, 0, 9, 5, 0, 50, 0, 150, b'1', 6, 'Alitas de Pollo, en caja de 12 Unidades, sin preservantes.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_proveedores`
--

CREATE TABLE IF NOT EXISTS `t00_proveedores` (
  `id_proveedor` int(3) NOT NULL AUTO_INCREMENT,
  `cod_proveedor` varchar(6) NOT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `nombre_proveedor` varchar(35) DEFAULT NULL,
  `id_persona` int(3) DEFAULT NULL,
  `id_tipo_proveedor` int(3) DEFAULT NULL,
  `id_estado_proveedor` int(3) DEFAULT NULL,
  `id_rubro` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`,`cod_proveedor`),
  KEY `id_tipo_proveedor` (`id_tipo_proveedor`),
  KEY `id_estado_proveedor` (`id_estado_proveedor`),
  KEY `id_rubro` (`id_rubro`),
  KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `t00_proveedores`
--

INSERT INTO `t00_proveedores` (`id_proveedor`, `cod_proveedor`, `f_creacion`, `programa`, `usuario`, `nombre_proveedor`, `id_persona`, `id_tipo_proveedor`, `id_estado_proveedor`, `id_rubro`) VALUES
(2, 'PRV001', '2014-11-06', 't00_Proveedores', 'nahum', 'Nahum.Martinez', 1, 15, 6, 1),
(6, 'PRV002', '2014-11-13', 't00_Proveedores', 'nahum', 'Eva.Barahona', 3, 14, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_puestos_lab`
--

CREATE TABLE IF NOT EXISTS `t00_puestos_lab` (
  `id_puesto` int(3) NOT NULL AUTO_INCREMENT,
  `cod_puesto` varchar(6) NOT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `desc_puesto_lab` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_puesto`,`cod_puesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `t00_puestos_lab`
--

INSERT INTO `t00_puestos_lab` (`id_puesto`, `cod_puesto`, `f_creacion`, `programa`, `usuario`, `desc_puesto_lab`) VALUES
(1, 'PLB001', '2014-11-02', 't00_PuestosLab', 'Admin', 'Contabilidad'),
(2, 'PLB002', '2014-11-02', 't00_PuestosLab', 'Admin', 'Recursos Humanos'),
(3, 'PLB003', '2014-11-02', 't00_PuestosLab', 'Admin', 'Informatica'),
(4, 'PLB004', '2014-11-02', 't00_PuestosLab', 'Admin', 'Secretaria Ejecutiva'),
(5, 'PLB005', '2014-11-02', 't00_PuestosLab', 'Admin', 'Recepcion'),
(6, 'PLB006', '2014-11-02', 't00_PuestosLab', 'Admin', 'Ama de Casa'),
(7, 'PLB007', '2014-11-02', 't00_PuestosLab', 'Admin', 'Condutor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_rubros`
--

CREATE TABLE IF NOT EXISTS `t00_rubros` (
  `id_rubro` int(2) NOT NULL AUTO_INCREMENT,
  `cod_rubro` varchar(6) NOT NULL,
  `desc_rubro` varchar(35) DEFAULT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rubro`,`cod_rubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `t00_rubros`
--

INSERT INTO `t00_rubros` (`id_rubro`, `cod_rubro`, `desc_rubro`, `f_creacion`, `programa`, `usuario`) VALUES
(1, 'RUB001', 'Comestibles Organicos', '2014-11-03', 't00_Rubros', 'Admin'),
(2, 'RUB002', 'Comestibles Enlatados', '2014-11-03', 't00_Rubros', 'Admin'),
(3, 'RUB003', 'Servicios Publicos', '2014-11-03', 't00_Rubros', 'Admin'),
(4, 'RUB004', 'Ins. Bancarias', '2014-11-03', 't00_Rubros', 'Admin'),
(5, 'RUB005', 'Ins. Gobierno', '2014-11-03', 't00_Rubros', 'Admin'),
(6, 'RUB006', 'Industrias Comerciales', '2014-11-03', 't00_Rubros', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_secuenciales`
--

CREATE TABLE IF NOT EXISTS `t00_secuenciales` (
  `id_secuencial` int(3) NOT NULL AUTO_INCREMENT,
  `cod_secuencial` varchar(6) NOT NULL,
  `secuencial` varchar(20) DEFAULT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `tabla` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_secuencial`,`cod_secuencial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `t00_secuenciales`
--

INSERT INTO `t00_secuenciales` (`id_secuencial`, `cod_secuencial`, `secuencial`, `f_creacion`, `programa`, `usuario`, `tabla`) VALUES
(1, 'SEC001', '000001', '2014-11-22', 'MANUAL', 'ADMIN', 't00_compras_enc'),
(2, 'SEC002', '000001', '2014-11-22', 'MANUAL', 'ADMIN', 't00_ventas_enc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_sexo`
--

CREATE TABLE IF NOT EXISTS `t00_sexo` (
  `id_sexo` int(1) NOT NULL AUTO_INCREMENT,
  `cod_sexo` varchar(5) NOT NULL,
  `desc_sexo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `t00_sexo`
--

INSERT INTO `t00_sexo` (`id_sexo`, `cod_sexo`, `desc_sexo`) VALUES
(1, 'SEX01', 'Masculino'),
(2, 'SEX02', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_sucursales`
--

CREATE TABLE IF NOT EXISTS `t00_sucursales` (
  `id_sucursal` int(3) NOT NULL AUTO_INCREMENT,
  `cod_sucursal` varchar(6) NOT NULL,
  `nombre_sucursal` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `id_localidad` int(3) NOT NULL,
  `latitud` varchar(25) NOT NULL,
  `longitud` varchar(25) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(25) NOT NULL,
  `id_emple_encargado` int(3) NOT NULL,
  PRIMARY KEY (`id_sucursal`),
  KEY `id_localidad` (`id_localidad`),
  KEY `id_emple_encargado` (`id_emple_encargado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `t00_sucursales`
--

INSERT INTO `t00_sucursales` (`id_sucursal`, `cod_sucursal`, `nombre_sucursal`, `usuario`, `id_localidad`, `latitud`, `longitud`, `f_creacion`, `programa`, `id_emple_encargado`) VALUES
(1, 'SUC001', 'Principal', 'nahum', 1, '2545454', '232323', '2014-10-26', 't00_Sucursales', 1),
(2, 'SUC002', 'Col. USA', 'nahum', 2, '46.8383883', '-87.3893893', '2014-10-26', 't00_Sucursales', 1),
(3, 'SUC003', 'Las Vegas', 'nahum', 1, '', '', '2014-11-11', 't00_Sucursales', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_tipos`
--

CREATE TABLE IF NOT EXISTS `t00_tipos` (
  `id_tipo` int(3) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(3) NOT NULL,
  `cod_tipo` varchar(6) NOT NULL DEFAULT '',
  `desc_tipo` varchar(25) DEFAULT NULL,
  `f_creacion` date DEFAULT NULL,
  `programa` varchar(20) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `ind_tipo` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`,`cod_tipo`),
  KEY `id_grupo` (`id_grupo`,`cod_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `t00_tipos`
--

INSERT INTO `t00_tipos` (`id_tipo`, `id_grupo`, `cod_tipo`, `desc_tipo`, `f_creacion`, `programa`, `observaciones`, `usuario`, `ind_tipo`) VALUES
(1, 1, 'TTU001', 'Administrador', '2014-07-06', 'MANUAL', 'Usuario con Todos los Privilegios del Sistema', 'Admin', NULL),
(2, 3, 'TPP001', 'Natural', '2014-08-09', 'MANUAL', 'Persona Natural', 'Admin', NULL),
(3, 3, 'TPP002', 'Juridica', '2014-08-09', 'MANUAL', 'Persona Juridica', 'Admin', NULL),
(4, 6, 'TLO001', 'Colonias', '2014-10-25', 'MANUAL', 'Tipo de Localidades de Colonias', 'Admin', NULL),
(5, 6, 'TLO002', 'Residenciales', '2014-10-25', 'MANUAL', 'Tipo de Localidades de Residenciales', 'Admin', NULL),
(6, 6, 'TLO003', 'Barrios', '2014-10-25', 'MANUAL', 'Tipo de Localidades Aldeas', 'Admin', NULL),
(7, 6, 'TLO004', 'Aldeas', '2014-10-25', 'MANUAL', 'Tipo de Localidades Aldeas', 'Admin', NULL),
(8, 7, 'TEP001', 'Permanentes', '2014-10-25', 'MANUAL', 'Tipos de Empleados Permanentes', 'Admin', NULL),
(9, 7, 'TEP002', 'Temporal', '2014-10-25', 'MANUAL', 'Tipos de Empleados Temporales', 'Admin', NULL),
(10, 8, 'TTC001', 'Normal', '2014-10-30', 'MANUAL', 'Tipos de Clientes Normales', 'Admin', NULL),
(11, 8, 'TTC002', 'Especial', '2014-10-30', 'MANUAL', 'Tipos de Clientes Especiales', 'Admin', NULL),
(12, 8, 'TTC003', 'Gubernamental', '2014-10-30', 'MANUAL', 'Tipos de Clientes Gubernamentales', 'Admin', NULL),
(13, 8, 'TTC004', 'Tercera Edad', '2014-10-30', 'MANUAL', 'Tipos de Clientes Tercera Edad', 'Admin', NULL),
(14, 9, 'TTP001', 'Bienes', '2014-11-03', 'MANUAL', 'Tipos de Proveedore de Bienes', 'Admin', 'PRV'),
(15, 9, 'TTP002', 'Servicios', '2014-11-03', 'MANUAL', 'Tipos de Proveedores de Servicios', 'Admin', 'PRV'),
(16, 9, 'TTP003', 'Recursos', '2014-11-03', 'MANUAL', 'Tipos de Proveedores de Recursos', 'Admin', 'PRV'),
(17, 2, 'P00001', 'Sardinas', '2014-11-08', 't00_TiposProd', 'Producto, enlatado para uso domestico. y de uso cotidiano Nahum dfdf', 'nahum', 'P'),
(18, 1, 'P00002', 'Carne de Pollo', '2014-11-09', 't00_TiposProd', 'Tipo de Producto #2', 'nahum', 'P'),
(19, 3, 'P00003', 'Frituras', '2014-11-09', 't00_TiposProd', 'Tipo de Productos con categoria de Frituras y demas cosas', 'nahum', 'P'),
(20, 1, 'P00004', 'Tipo numero 4', '2014-11-09', 't00_TiposProd', 'Descripcion Modificada sdsd', 'nahum', 'P'),
(21, 1, 'P00005', 'Tipo 5', '2014-11-09', 't00_TiposProd', 'zcvcvcv', 'nahum', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t00_usuarios`
--

CREATE TABLE IF NOT EXISTS `t00_usuarios` (
  `id_usuario` int(3) NOT NULL AUTO_INCREMENT,
  `cod_usuario` varchar(5) NOT NULL,
  `f_creacion` date NOT NULL,
  `programa` varchar(20) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `pass_usuario` varchar(100) NOT NULL,
  `id_tipo_usuario` int(3) NOT NULL,
  `id_persona` int(3) DEFAULT NULL,
  `ip_host` varchar(15) DEFAULT NULL,
  `h_entrada` date DEFAULT NULL,
  `h_salida` date DEFAULT NULL,
  `navegador` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `cod_usuario` (`cod_usuario`,`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t00_aldeas`
--
ALTER TABLE `t00_aldeas`
  ADD CONSTRAINT `t00_aldeas_ibfk_1` FOREIGN KEY (`id_munic`) REFERENCES `t00_municipios` (`id_munic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_almacenes`
--
ALTER TABLE `t00_almacenes`
  ADD CONSTRAINT `t00_almacenes_ibfk_1` FOREIGN KEY (`id_emple_encargado`) REFERENCES `t00_empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_almacenes_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `t00_sucursales` (`id_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_bodegas`
--
ALTER TABLE `t00_bodegas`
  ADD CONSTRAINT `t00_bodegas_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `t00_sucursales` (`id_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_clientes`
--
ALTER TABLE `t00_clientes`
  ADD CONSTRAINT `t00_clientes_ibfk_1` FOREIGN KEY (`id_tipo_cliente`) REFERENCES `t00_tipos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_clientes_ibfk_2` FOREIGN KEY (`id_estado_cliente`) REFERENCES `t00_estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_clientes_ibfk_3` FOREIGN KEY (`id_persona`) REFERENCES `t00_personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_compras_enc`
--
ALTER TABLE `t00_compras_enc`
  ADD CONSTRAINT `t00_compras_enc_ibfk_1` FOREIGN KEY (`id_moneda`) REFERENCES `t00_monedas` (`id_moneda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_compras_enc_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `t00_proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_compras_enc_ibfk_5` FOREIGN KEY (`id_forma_pago`) REFERENCES `t00_formas_pago` (`id_forma_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_compras_enc_ibfk_6` FOREIGN KEY (`id_impuesto`) REFERENCES `t00_impuestos` (`id_isv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_deptos`
--
ALTER TABLE `t00_deptos`
  ADD CONSTRAINT `t00_deptos_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `t00_pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_empleados`
--
ALTER TABLE `t00_empleados`
  ADD CONSTRAINT `t00_empleados_ibfk_1` FOREIGN KEY (`id_estado_empleado`) REFERENCES `t00_estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_empleados_ibfk_2` FOREIGN KEY (`id_tipo_empleado`) REFERENCES `t00_tipos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_empleados_ibfk_3` FOREIGN KEY (`id_puesto_lab`) REFERENCES `t00_puestos_lab` (`id_puesto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_empleados_ibfk_4` FOREIGN KEY (`id_persona`) REFERENCES `t00_personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_estados`
--
ALTER TABLE `t00_estados`
  ADD CONSTRAINT `t00_estados_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `t00_grupos` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_estantes`
--
ALTER TABLE `t00_estantes`
  ADD CONSTRAINT `t00_estantes_ibfk_1` FOREIGN KEY (`id_almacen`) REFERENCES `t00_almacenes` (`id_almacen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_fincas`
--
ALTER TABLE `t00_fincas`
  ADD CONSTRAINT `t00_fincas_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `t00_localidades` (`id_localidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_fincas_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `t00_colores` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_galeria_foto`
--
ALTER TABLE `t00_galeria_foto`
  ADD CONSTRAINT `t00_galeria_foto_ibfk_1` FOREIGN KEY (`id_foto`) REFERENCES `t00_fotos` (`id_foto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_galeria_foto_ibfk_2` FOREIGN KEY (`id_elemento`) REFERENCES `t00_productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_items_compras`
--
ALTER TABLE `t00_items_compras`
  ADD CONSTRAINT `t00_items_compras_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `t00_compras_enc` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_items_compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `t00_productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_items_compras_ibfk_4` FOREIGN KEY (`id_impuesto`) REFERENCES `t00_impuestos` (`id_isv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_localidades`
--
ALTER TABLE `t00_localidades`
  ADD CONSTRAINT `t00_localidades_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `t00_areas` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_localidades_ibfk_2` FOREIGN KEY (`id_tipo_localidad`) REFERENCES `t00_tipos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_localidades_ibfk_3` FOREIGN KEY (`id_aldea`) REFERENCES `t00_aldeas` (`id_aldea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_municipios`
--
ALTER TABLE `t00_municipios`
  ADD CONSTRAINT `t00_municipios_ibfk_1` FOREIGN KEY (`id_depto`) REFERENCES `t00_deptos` (`id_depto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_personas`
--
ALTER TABLE `t00_personas`
  ADD CONSTRAINT `t00_personas_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `t00_estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_personas_ibfk_2` FOREIGN KEY (`id_sexo`) REFERENCES `t00_sexo` (`id_sexo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_personas_ibfk_3` FOREIGN KEY (`id_estado_civil`) REFERENCES `t00_estado_civil` (`id_estado_civil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_personas_ibfk_4` FOREIGN KEY (`id_tipo_persona`) REFERENCES `t00_tipos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_personas_ibfk_5` FOREIGN KEY (`id_munic`) REFERENCES `t00_municipios` (`id_munic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_productos`
--
ALTER TABLE `t00_productos`
  ADD CONSTRAINT `t00_productos_ibfk_1` FOREIGN KEY (`id_tipo_producto`) REFERENCES `t00_tipos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_productos_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `t00_colores` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_productos_ibfk_3` FOREIGN KEY (`id_medida`) REFERENCES `t00_medidas` (`id_medida`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_productos_ibfk_4` FOREIGN KEY (`id_isv`) REFERENCES `t00_impuestos` (`id_isv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_productos_ibfk_5` FOREIGN KEY (`id_descuento`) REFERENCES `t00_descuentos` (`id_descuento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_productos_ibfk_6` FOREIGN KEY (`id_proveedor`) REFERENCES `t00_proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_proveedores`
--
ALTER TABLE `t00_proveedores`
  ADD CONSTRAINT `t00_proveedores_ibfk_1` FOREIGN KEY (`id_rubro`) REFERENCES `t00_rubros` (`id_rubro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_proveedores_ibfk_2` FOREIGN KEY (`id_tipo_proveedor`) REFERENCES `t00_tipos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_proveedores_ibfk_3` FOREIGN KEY (`id_estado_proveedor`) REFERENCES `t00_estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_proveedores_ibfk_4` FOREIGN KEY (`id_persona`) REFERENCES `t00_personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_sucursales`
--
ALTER TABLE `t00_sucursales`
  ADD CONSTRAINT `t00_sucursales_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `t00_localidades` (`id_localidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t00_sucursales_ibfk_2` FOREIGN KEY (`id_emple_encargado`) REFERENCES `t00_empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t00_tipos`
--
ALTER TABLE `t00_tipos`
  ADD CONSTRAINT `t00_tipos_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `t00_grupos` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
