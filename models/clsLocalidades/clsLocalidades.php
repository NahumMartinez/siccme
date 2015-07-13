<?php
/**
  * @package: Clase Localidades
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-14
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsTipoProducto{
	private $cod_localidad;
	private $f_creacion;
	private $programa;
	private $nombre_usuario;
	private $desc_localidad;
	private $id_aldea;
	private $id_loc;
	private $id_area;
	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_localidad, $f_creacion, $programa, $nombre_usuario, $desc_localidad, $id_aldea, $id_loc, $id_area){
		
		$this->cod_localidad 	= $cod_localidad;
		$this->f_creacion 		= $f_creacion;
		$this->programa 		= $programa;
		$this->nombre_usuario   = $nombre_usuario;
		$this->desc_localidad 	= $desc_localidad;
		$this->id_aldea 		= $id_aldea;
		$this->id_loc	 		= $id_loc;
		$this->id_area	 		= $id_area;
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_localidad(){
		return $this->cod_localidad;
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
	
	public function get_desc_localidad(){
		return $this->desc_localidad;
	}
	
	public function get_id_aldea(){
		return $this->id_aldea;
	}
	
	public function get_id_loc(){
		return $this->id_loc;
	}
	public function get_id_area(){
		return $this->id_area;
	}
	// FIN de Metodos Get ...
	
	// Busqueda de un Tipo de Productos si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select l.* from t00_localidades l, t00_tipos t, t00_aldeas a, t00_areas ar where (l.cod_localidad = '$this->cod_localidad') and l.id_aldea = a.id_aldea and l.id_tipo_localidad = t.id_tipo and ar.id_area = l.id_area";
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_localidad 			= $columna['cod_localidad'];
				$this->desc_localidad 			= $columna['nombre_localidad'];
				$this->f_creacion 				= $columna['f_creacion'];
				$this->programa 				= $columna['programa'];
				$this->nombre_usuario   		= $columna['usuario'];
				$this->id_aldea   				= $columna['id_aldea'];
				$this->id_loc		   			= $columna['id_tipo_localidad'];
				$this->id_area		   			= $columna['id_area'];
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
				
		$sql = "insert into t00_localidades(cod_localidad, nombre_localidad, f_creacion, programa, usuario, id_aldea, id_tipo_localidad, id_area) values ('$this->cod_localidad','$this->desc_localidad','$this->f_creacion','$this->programa','$this->nombre_usuario', '$this->id_aldea', '$this->id_loc', '$this->id_area')";
				
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Tipo de Productos ...
	
	// Modificacion de Tipo de Productos *************************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		$sql = "update t00_localidades set nombre_localidad = '$this->desc_localidad', f_creacion = '$this->f_creacion', programa = '$this->programa', usuario = '$this->nombre_usuario', id_aldea = '$this->id_aldea', id_tipo_localidad = '$this->id_loc', id_area = '$this->id_area' where cod_localidad = '$this->cod_localidad' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Tipo de Productos ...
	
	// Eliminacion de Tipo de Productos **************************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00_localidades where cod_localidad = '$this->cod_localidad' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Tipo de Productos ...
	
} // FIN DE CLASE ...
?>