<?php
/**
  * @package: Clase Estantes
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-14
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsEstantes{
	private $cod_estante;
	private $f_creacion;
	private $programa;
	private $nombre_usuario;
	private $desc_estante;
	private $id_almacen;
	private $num_filas;
	private $num_colum;
	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_estante, $f_creacion, $programa, $nombre_usuario, $desc_estante, $id_almacen, $num_filas, $num_colum){
		
		$this->cod_estante 	= $cod_estante;
		$this->f_creacion 		= $f_creacion;
		$this->programa 		= $programa;
		$this->nombre_usuario   = $nombre_usuario;
		$this->desc_estante 	= $desc_estante;
		$this->id_almacen 		= $id_almacen;
		$this->num_filas	 	= $num_filas;
		$this->num_colum	 	= $num_colum;
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_estante(){
		return $this->cod_estante;
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
	
	public function get_desc_estantes(){
		return $this->desc_estante;
	}
	
	public function get_id_almacen(){
		return $this->id_almacen;
	}
	
	public function get_num_filas(){
		return $this->num_filas;
	}
	public function get_num_colum(){
		return $this->num_colum;
	}
	// FIN de Metodos Get ...
	
	// Busqueda de un Tipo de Productos si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select e.* from t00_almacenes a, t00_estantes e where (e.cod_estante = '$this->cod_estante') 
				and e.id_almacen = a.id_almacen";
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_estante	 			= $columna['cod_estante'];
				$this->desc_estante 			= $columna['nom_estante'];
				$this->f_creacion 				= $columna['f_creacion'];
				$this->programa 				= $columna['programa'];
				$this->nombre_usuario   		= $columna['usuario'];
				$this->id_almacen   			= $columna['id_almacen'];
				$this->num_filas	   			= $columna['no_filas'];
				$this->num_colum	   			= $columna['no_columnas'];
				$encontro 						= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Tipo de Productos ...
	
	// Insercion de un Tipo de Productos ala BD ******************************************
	public function incluir(){
		$objDatos = new clsDatos();
				
		$sql = "insert into t00_estantes(cod_estante, nom_estante, f_creacion, programa, usuario, id_almacen, no_filas, no_columnas) 	values ('$this->cod_estante','$this->desc_estante','$this->f_creacion','$this->programa','$this->nombre_usuario', '$this->id_almacen', '$this->num_filas', '$this->num_colum')";
				
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Tipo de Productos ...
	
	// Modificacion de Tipo de Productos *************************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		$sql = "update t00_estantes set nom_estante = '$this->desc_estante', f_creacion = '$this->f_creacion', programa = '$this->programa', usuario = '$this->nombre_usuario', id_almacen = '$this->id_almacen', no_filas = '$this->num_filas', no_columnas = '$this->num_colum' where cod_estante = '$this->cod_estante' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Tipo de Productos ...
	
	// Eliminacion de Tipo de Productos **************************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00_estantes where cod_estante = '$this->cod_estante' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Tipo de Productos ...
	
} // FIN DE CLASE ...
?>