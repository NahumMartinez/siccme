<?php
/**
  * @package: Clase Fincas
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-14
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsTipoProducto{
	 private $cod_finca;	
	 private $desc_finca;	
	 private $f_creacion;	
	 private $programa;	
	 private $nombre_usuario;	
	 private $id_color;	
	 private $id_localidad;	
	 private $num_puerta;	
	 private $num_bloque;	
	 private $num_calle;	
	 private $num_peatonal; 
	 private $lat;	
	 private $long;	
	 private $ref_dir;	
	 
	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_finca, $f_creacion, $programa, $nombre_usuario, $desc_finca, $id_color, $id_localidad, $num_puerta, $num_bloque, $num_calle, $num_peatonal, $lat, $long, $ref_dir){
		
		$this->cod_finca 		= $cod_finca;
		$this->f_creacion 		= $f_creacion;
		$this->programa 		= $programa;
		$this->nombre_usuario   = $nombre_usuario;
		$this->desc_finca 		= $desc_finca;
		$this->id_color 		= $id_color;
		$this->id_localidad	 	= $id_localidad;
		$this->num_puerta	 	= $num_puerta;
		$this->num_bloque	 	= $num_bloque;
		$this->num_calle	 	= $num_calle;
		$this->num_peatonal	 	= $num_peatonal;
		$this->lat	 			= $lat;
		$this->long	 			= $long;
		$this->ref_dir	 		= $ref_dir;
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_finca(){
		return $this->cod_finca;
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
	
	public function get_desc_finca(){
		return $this->desc_finca;
	}
	
	public function get_id_color(){
		return $this->id_color;
	}
	
	public function get_id_localidad(){
		return $this->id_localidad;
	}
	public function get_num_puerta(){
		return $this->num_puerta;
	}
	public function get_num_bloque(){
		return $this->num_bloque;
	}
	public function get_num_calle(){
		return $this->num_calle;
	}
	public function get_num_peatonal(){
		return $this->num_peatonal;
	}
	public function get_latitud(){
		return $this->lat;
	}
	public function get_longitud(){
		return $this->long;
	}
	public function get_ref_dir(){
		return $this->ref_dir;
	}
	
	// FIN de Metodos Get ...
	
	// Busqueda de un Tipo de Productos si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select f.* from t00_localidades l, t00_colores c, t00_fincas f 
				where (f.cod_finca = '$this->cod_finca') 
				and c.id_color = f.id_color and l.id_localidad = f.id_localidad";
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_finca 			= $columna['cod_finca'];
				$this->desc_finca 			= $columna['nom_finca'];
				$this->f_creacion 			= $columna['f_creacion'];
				$this->programa 			= $columna['programa'];
				$this->nombre_usuario   	= $columna['usuario'];
				$this->id_color   			= $columna['id_color'];
				$this->id_localidad		   	= $columna['id_localidad'];
				$this->num_puerta		   	= $columna['num_puerta'];
				$this->num_bloque		   	= $columna['bloque'];
				$this->num_calle		   	= $columna['calle'];
				$this->num_peatonal		   	= $columna['peatonal'];
				$this->lat		   			= $columna['latitud'];
				$this->long		   			= $columna['longitud'];
				$this->ref_dir		   		= $columna['ref_dir'];
				$encontro 					= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Tipo de Productos ...
	
	// Insercion de un Tipo de Productos ala BD ******************************************
	public function incluir(){
		$objDatos = new clsDatos();
				
		$sql = "insert into t00_fincas(cod_finca, nom_finca, f_creacion, programa, usuario, id_color, id_localidad, num_puerta, bloque, calle, peatonal, latitud, longitud, ref_dir) values ('$this->cod_finca','$this->desc_finca','$this->f_creacion','$this->programa','$this->nombre_usuario', '$this->id_color', '$this->id_localidad', '$this->num_puerta', '$this->num_bloque', '$this->num_calle', '$this->num_peatonal', '$this->lat', '$this->long', '$this->ref_dir')";
				
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Tipo de Productos ...
	
	// Modificacion de Tipo de Productos *************************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		$sql = "update t00_fincas set nom_finca = '$this->desc_finca', f_creacion = '$this->f_creacion', programa = '$this->programa', usuario = '$this->nombre_usuario', id_color = '$this->id_color', id_localidad = '$this->id_localidad', num_puerta = '$this->num_puerta', bloque = '$this->num_bloque', calle = '$this->num_calle', peatonal = '$this->num_peatonal', latitud = '$this->lat', longitud = '$this->long', ref_dir = '$this->ref_dir' 
		where cod_finca = '$this->cod_finca' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Tipo de Productos ...
	
	// Eliminacion de Tipo de Productos **************************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00 where cod_finca = '$this->cod_finca' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Tipo de Productos ...
	
} // FIN DE CLASE ...
?>