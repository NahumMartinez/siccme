<?php
/**
  * @package: Clase Tipos de Productos
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-05
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  //include("$_SERVER[DOCUMENT_ROOT]/504POS/models/db/clsDatos.php");
  //include("clsDatos.php");
  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsTipoProducto{
	private $cod_tipo_prod;
	private $f_creacion;
	private $programa;
	private $nombre_usuario;
	private $desc_tipo_prod;
	private $cat_prod;
	private $observaciones;
	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_tipo_prod, $f_creacion, $programa, $nombre_usuario, $desc_tipo_prod, $cat_prod, $observaciones){
		
		$this->cod_tipo_prod 	= $cod_tipo_prod;
		$this->f_creacion 		= $f_creacion;
		$this->programa 		= $programa;
		$this->nombre_usuario   = $nombre_usuario;
		$this->desc_tipo_prod 	= $desc_tipo_prod;
		$this->cat_prod 		= $cat_prod;
		$this->observaciones 	= $observaciones;
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_tipo_prod(){
		return $this->cod_tipo_prod;
	}
	
	public function get_f_creacion(){
		return $this->f_creacion;
	}
	
	public function get_programa(){
		return $this->programa;
	}
	
	public function get_nombre_usuario(){
		return $this->nombre_usuario;
	}
	
	public function get_desc_tipo_prod(){
		return $this->desc_tipo_prod;
	}
	
	public function get_cat_prod(){
		return $this->cat_prod;
	}
	
	public function get_observaciones(){
		return $this->observaciones;
	}
	// FIN de Metodos Get ...
	
	// Busqueda de un Tipo de Productos si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select t.* from t00_tipos t, t00_categorias g 
				where (t.cod_tipo = '$this->cod_tipo_prod') and
				t.id_categoria = g.id_categoria and 
				t.ind_tipo = 'P'";
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_tipo_prod 			= $columna['cod_tipo'];
				$this->desc_tipo_prod 			= $columna['desc_tipo'];
				$this->f_creacion			= $columna['f_creacion'];
				$this->programa         		= $columna['programa'];
				$this->nombre_usuario   		= $columna['usuario'];
				$this->cat_prod   			= $columna['id_categoria'];
				$this->observaciones   			= $columna['observaciones'];
				$encontro 				= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Tipo de Productos ...
	
	// Insercion de un Tipo de Productos ala BD ******************************************
	public function incluir(){
		$objDatos = new clsDatos();
				
		$sql = "insert into t00_tipos(cod_tipo, desc_tipo, f_creacion, programa, usuario, id_categoria, observaciones, ind_tipo) "
                        . " values ('$this->cod_tipo_prod','$this->desc_tipo_prod','$this->f_creacion', "
                        . " '$this->programa','$this->nombre_usuario', '$this->cat_prod', '$this->observaciones', 'P')";
				
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Tipo de Productos ...
	
	// Modificacion de Tipo de Productos *************************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		$sql = "update t00_tipos set desc_tipo = '$this->desc_tipo_prod', f_creacion = '$this->f_creacion',"
                        . " programa = '$this->programa', usuario = '$this->nombre_usuario', id_categoria = '$this->cat_prod',"
                        . " observaciones = '$this->observaciones' where cod_tipo = '$this->cod_tipo_prod' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Tipo de Productos ...
	
	// Eliminacion de Tipo de Productos **************************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00_tipos where cod_tipo = '$this->cod_tipo_prod' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Tipo de Productos ...
	
} // FIN DE CLASE ...
?>