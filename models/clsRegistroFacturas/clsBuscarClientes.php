<?php
/**
  * @package: Clase Buscar Clientes
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2015-05-03
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsBuscaCliente{
	 private $cod_cliente;
	 private $nombre_cliente;
         private $apellido_cliente;
	 private $tipo_cliente;
	 private $estado_cliente;
	 private $id_cliente;
	 private $dir_cliente;
	 
	// Constructor de la Clase
	// INI.
	public function __construct($cod_cliente){
		
		$this->cod_cliente = $cod_cliente;
				
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase 
	public function get_id_cliente(){
		return $this->id_cliente;
	}
	
	public function get_cod_cliente(){
		return $this->cod_cliente;
	}
			
	public function get_nombre_cliente(){
		return $this->nombre_cliente;
	}
	
	public function get_tipo_cliente(){
		return $this->tipo_cliente;
	}
	
	public function get_estado_cliente(){
		return $this->estado_cliente;
	}
	
	public function get_apellido_cliente(){
		return $this->apellido_cliente;
	}
	
	public function get_dir_cliente(){
		return $this->dir_cliente;
	}
	
	// FIN de Metodos Get ...
	
	// Busqueda de un Cliente para Ligarlo a la Factura ********************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "SELECT C.COD_CLIENTE, CONCAT(PE.NOMBRE_1 , CONCAT(' ', PE.NOMBRE_2)) NOMBRE,
			       CONCAT(PE.apellido_1 , CONCAT(' ',PE.APELLIDO_2)) APELLIDO,
                               T.DESC_TIPO, E.DESC_ESTADO, 
                               C.ID_CLIENTE, PE.DIRECCION
			FROM T00_CLIENTES C, T00_TIPOS T,
			     T00_ESTADOS E, T00_PERSONAS PE
			WHERE C.ID_TIPO_CLIENTE   = T.ID_TIPO AND
			      C.ID_ESTADO_CLIENTE = E.ID_ESTADO AND
			      C.ID_PERSONA        = PE.ID_PERSONA AND
			      C.COD_CLIENTE       = '$this->cod_cliente' AND
			      T.IND_TIPO          = 'CLI';";
				
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->id_cliente 		= $columna['ID_CLIENTE'];
				$this->cod_cliente 		= $columna['COD_CLIENTE'];
				$this->nombre_cliente		= $columna['NOMBRE'];
                                $this->apellido_cliente		= $columna['APELLIDO'];
				$this->tipo_cliente		= $columna['DESC_TIPO'];
				$this->estado_cliente		= $columna['DESC_ESTADO'];
				$this->dir_cliente		= $columna['DIRECCION'];
				$encontro 			= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Clientes desde facturas ...
	
			
} // FIN DE CLASE ...
?>