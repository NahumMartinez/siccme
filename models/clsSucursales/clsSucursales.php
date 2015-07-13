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
  class clsSucursal{
	private $cod_sucursal;
	private $f_creacion;
	private $programa;
	private $nombre_usuario;
	private $desc_sucursal;
	private $id_emple;
	private $id_loc;
	private $lat;
	private $long;
	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_sucursal, $f_creacion, $programa, $nombre_usuario, $desc_sucursal, $id_loc, $id_emple, $lat, $long){
		
		$this->cod_sucursal 	= $cod_sucursal;
		$this->f_creacion 		= $f_creacion;
		$this->programa 		= $programa;
		$this->nombre_usuario   = $nombre_usuario;
		$this->desc_sucursal 	= $desc_sucursal;
		$this->id_emple 		= $id_emple;
		$this->id_loc	 		= $id_loc;
		$this->lat	 			= $lat;
		$this->long	 			= $long;
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_sucursal(){
		return $this->cod_sucursal;
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
	
	public function get_desc_sucursal(){
		return $this->desc_sucursal;
	}
	
	public function get_id_emple(){
		return $this->id_emple;
	}
	
	public function get_id_loc(){
		return $this->id_loc;
	}
	public function get_lat(){
		return $this->lat;
	}
	public function get_long(){
		return $this->long;
	}
	// FIN de Metodos Get ...
	
	// Busqueda de un Tipo de Productos si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select s.* from t00_localidades l, t00_sucursales s, t00_empleados e where (s.cod_sucursal = '$this->cod_sucursal') and s.id_emple_encargado = e.id_empleado and l.id_localidad = s.id_localidad";
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_sucursal 			= $columna['cod_sucursal'];
				$this->desc_sucursal 			= $columna['nombre_sucursal'];
				$this->f_creacion 				= $columna['f_creacion'];
				$this->programa 				= $columna['programa'];
				$this->nombre_usuario   		= $columna['usuario'];
				$this->id_emple   				= $columna['id_emple_encargado'];
				$this->id_loc		   			= $columna['id_localidad'];
				$this->lat		   				= $columna['latitud'];
				$this->long		   				= $columna['longitud'];
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
				
		$sql = "insert into t00_sucursales(cod_sucursal, nombre_sucursal, f_creacion, programa, usuario, id_emple_encargado, id_localidad, latitud, longitud) values ('$this->cod_sucursal','$this->desc_sucursal','$this->f_creacion','$this->programa','$this->nombre_usuario', '$this->id_emple', '$this->id_loc', '$this->lat', '$this->long')";
				
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Tipo de Productos ...
	
	// Modificacion de Tipo de Productos *************************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		$sql = "update t00_sucursales set nombre_sucursal = '$this->desc_sucursal', f_creacion = '$this->f_creacion', programa = '$this->programa', usuario = '$this->nombre_usuario', id_emple_encargado = '$this->id_emple', id_localidad = '$this->id_loc', latitud = '$this->lat', longitud = '$this->long' where cod_sucursal = '$this->cod_sucursal' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Tipo de Productos ...
	
	// Eliminacion de Tipo de Productos **************************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00_sucursales where cod_sucursal = '$this->cod_sucursal' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Tipo de Productos ...
	
} // FIN DE CLASE ...
?>