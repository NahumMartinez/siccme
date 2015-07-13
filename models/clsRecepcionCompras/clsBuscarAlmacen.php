<?php
/**
  * @package: Clase Buscar Almacen de Destino
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-12-29
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsBuscaAlmacen{
         private $id_almacen;   
         private $cod_almacen;
         private $nombre_almacen;
         private $sucursal;
         private $num_estantes;
         private $empleado_encargado;
                  	  	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_almacen){
		
		$this->cod_almacen  = $cod_almacen;
                						
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase 
	public function get_id_almacen(){
		return $this->id_almacen;
	}
        
	public function get_cod_almacen(){
		return $this->cod_almacen;
	}
        
        public function get_nombre_almacen(){
		return $this->nombre_almacen;
	}
			
	public function get_sucursal(){
		return $this->sucursal;
	}
	
	public function get_num_estantes(){
		return $this->num_estantes;
	}
			
	public function get_empleado_encargado(){
		return $this->empleado_encargado;
	}
	
	// FIN de Metodos Get ...
	
	// Busqueda de un Almacen si Existe en la Ventana de Recepcion de Compras *************************************
        // Metodo de Busqueda por le Codigo del Almacen
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select al.id_almacen, al.cod_almacen, al.nom_almacen, 
                               al.num_estantes, su.nombre_sucursal,
                               concat(pe.nombre_1, ' ', pe.apellido_1) encargado
                        from t00_almacenes al, t00_personas pe, t00_sucursales su
                        where al.cod_almacen = '$this->cod_almacen' and
                              al.id_emple_encargado = pe.id_persona and 
                              al.id_sucursal        = su.id_sucursal";

		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_almacen 	    = $columna['cod_almacen'];
				$this->nombre_almacen       = $columna['nom_almacen'];
				$this->sucursal             = $columna['nombre_sucursal'];
				$this->num_estantes	    = $columna['num_estantes'];
                                $this->empleado_encargado   = $columna['encargado'];
                                $this->id_almacen           = $columna['id_almacen'];
				$encontro 		    = true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Almacen desde Recepcion de Compras ...
        		
} // FIN DE CLASE ...
?>