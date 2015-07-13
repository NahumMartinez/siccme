<?php
/**
  * @package: Clase Almacenes
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-14
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsTipoProducto{
	private $cod_almacen;
	private $f_creacion;
	private $programa;
	private $nombre_usuario;
	private $desc_almacen;
	private $id_sucursal;
	private $id_emple;
	private $num_estantes;
	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_almacen, $f_creacion, $programa, $nombre_usuario, $desc_almacen, $id_sucursal, $id_emple, $num_estantes){
		
		$this->cod_almacen 		= $cod_almacen;
		$this->f_creacion 		= $f_creacion;
		$this->programa 		= $programa;
		$this->nombre_usuario   = $nombre_usuario;
		$this->desc_almacen 	= $desc_almacen;
		$this->id_sucursal 		= $id_sucursal;
		$this->id_emple	 		= $id_emple;
		$this->num_estantes	 	= $num_estantes;
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_almacen(){
		return $this->cod_almacen;
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
	
	public function get_desc_almacen(){
		return $this->desc_almacen;
	}
	
	public function get_id_sucursal(){
		return $this->id_sucursal;
	}
	
	public function get_id_emple(){
		return $this->id_emple;
	}
	public function get_num_estantes(){
		return $this->num_estantes;
	}
	// FIN de Metodos Get ...
	
	// Busqueda de un Almacen si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select a.* from t00_almacenes a, t00_sucursales s, t00_empleados e where (a.cod_almacen = '$this->cod_almacen') and a.id_sucursal = s.id_sucursal and a.id_emple_encargado = e.id_empleado";
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_almacen 				= $columna['cod_almacen'];
				$this->desc_almacen 			= $columna['nom_almacen'];
				$this->f_creacion 				= $columna['f_creacion'];
				$this->programa 				= $columna['programa'];
				$this->nombre_usuario   		= $columna['usuario'];
				$this->id_sucursal   			= $columna['id_sucursal'];
				$this->id_emple		   			= $columna['id_emple_encargado'];
				$this->num_estantes		   		= $columna['num_estantes'];
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
				
		$sql = "insert into t00_almacenes(cod_almacen, nom_almacen, f_creacion, programa, usuario, id_sucursal, id_emple_encargado, num_estantes) values ('$this->cod_almacen','$this->desc_almacen','$this->f_creacion','$this->programa','$this->nombre_usuario', '$this->id_sucursal', '$this->id_emple', '$this->num_estantes')";
				
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Tipo de Productos ...
	
	// Modificacion de Tipo de Productos *************************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		$sql = "update t00_almacenes set nom_almacen = '$this->desc_almacen', f_creacion = '$this->f_creacion', programa = '$this->programa', usuario = '$this->nombre_usuario', id_sucursal = '$this->id_sucursal', id_emple_encargado = '$this->id_emple', num_estantes = '$this->num_estantes' where cod_almacen = '$this->cod_almacen' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Tipo de Productos ...
	
	// Eliminacion de Tipo de Productos **************************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00_almacenes where cod_almacen = '$this->cod_almacen' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Tipo de Productos ...
	
} // FIN DE CLASE ...
?>