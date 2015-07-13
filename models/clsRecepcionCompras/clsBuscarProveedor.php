<?php
/**
  * @package: Clase Buscar Proveedores
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-11-01
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsBuscaProveedor{
	 private $cod_proveedor;
	 private $nombre_prov;
	 private $tipo_proveedor;
	 private $estado_proveedor;
	 private $rubro_proveedor;
	 private $id_proveedor;
	 private $dir_proveedor;
	 
	// Constructor de la Clase
	// INI.
	public function __construct($cod_proveedor){
		
		$this->cod_proveedor = $cod_proveedor;
				
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase 
	public function get_id_proveedor(){
		return $this->id_proveedor;
	}
	
	public function get_cod_proveedor(){
		return $this->cod_proveedor;
	}
			
	public function get_nombre_prov(){
		return $this->nombre_prov;
	}
	
	public function get_tipo_proveedor(){
		return $this->tipo_proveedor;
	}
	
	public function get_estado_proveedor(){
		return $this->estado_proveedor;
	}
	
	public function get_rubro_proveedor(){
		return $this->rubro_proveedor;
	}
	
	public function get_dir_proveedor(){
		return $this->dir_proveedor;
	}
	
	// FIN de Metodos Get ...
	
	// Busqueda de un Proveedores si Existente en la Ventana de Compras *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select p.cod_proveedor, p.nombre_proveedor,
					   t.desc_tipo, e.desc_estado,
					   r.desc_rubro, p.id_proveedor,
					   pe.direccion
				from  t00_proveedores p, t00_tipos t,
					  t00_estados e, t00_rubros r, t00_personas pe
				where p.id_tipo_proveedor   = t.id_tipo and
					  p.id_estado_proveedor = e.id_estado and
					  p.id_rubro            = r.id_rubro and
					  p.id_persona          = pe.id_persona and
					  p.cod_proveedor       = '$this->cod_proveedor' and
					  t.ind_tipo            = 'PRV'";
				
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->id_proveedor 		= $columna['id_proveedor'];
				$this->cod_proveedor 		= $columna['cod_proveedor'];
				$this->nombre_prov			= $columna['nombre_proveedor'];
				$this->tipo_proveedor		= $columna['desc_tipo'];
				$this->estado_proveedor		= $columna['desc_estado'];
				$this->rubro_proveedor		= $columna['desc_rubro'];
				$this->dir_proveedor		= $columna['direccion'];
				$encontro 					= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Proveedores desde Compras ...
	
			
} // FIN DE CLASE ...
?>