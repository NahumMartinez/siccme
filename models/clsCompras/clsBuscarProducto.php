<?php
/**
  * @package: Clase Buscar Productos
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-11-01
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsBuscaProducto{
	 private $cod_producto;
	 private $desc_producto;
	 private $precio_venta;
	 private $impuesto;
	 private $cant;
	  	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_producto, $cant){
		
		$this->cod_producto 		= $cod_producto;
		$this->cant			 		= $cant;
				
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase 
	
	public function get_cod_producto(){
		return $this->cod_producto;
	}
			
	public function get_desc_producto(){
		return $this->desc_producto;
	}
			
	public function get_precio_venta(){
		return $this->precio_venta;
	}
	
	public function get_impuesto(){
		return $this->impuesto;
	}
		
	// FIN de Metodos Get ...
	
	// Busqueda de un Producto si Existente en la Ventana de Clientes *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select p.cod_producto, p.desc_producto, p.precio_costo,
			       i.porcentaje_impuesto
			from   t00_productos p, t00_impuestos i
			where  p.id_isv = i.id_isv and
			       p.cod_producto = '$this->cod_producto' ";
				
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_producto 		= $columna['cod_producto'];
				$this->desc_producto		= $columna['desc_producto'];
				$this->precio_venta		= $columna['precio_costo'];
				$this->impuesto			= $columna['porcentaje_impuesto'];
				$encontro 			= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Productos desde Compras ...
	
	// Insercion de una Persona ala BD ******************************************
	public function incluir(){
		$objDatos = new clsDatos();
		// Ejecuta Insert en t00_items_compras		
		$concat = "$this->nom_name1.$this->apell_1";			
		$sql = "insert into t00_proveedores(cod_proveedor, id_persona, f_creacion, programa, usuario, id_tipo_proveedor, 				id_estado_proveedor, id_rubro, nombre_proveedor) 
				values ('$this->cod_proveedor', '$this->id_persona', '$this->f_creacion', '$this->programa', '$this->nombre_usuario', '$this->id_tipo_proveedor', '$this->id_est_proveedor', '$this->id_rubro', '$concat')";
		
		$objDatos->ejecutar($sql);	
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Tipo de Empleados ...
	
			
} // FIN DE CLASE ...
?>