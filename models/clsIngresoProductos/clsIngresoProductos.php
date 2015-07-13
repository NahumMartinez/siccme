<?php
/**
  * @package: Clase Ingreso de Productos
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-11-16
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsProducto{
	 private $cod_producto;		// Codigo del Producto           
	 private $f_creacion;	                                     
	 private $programa;	                                         
	 private $nombre_usuario;	                                 
	 private $desc_producto;	                                 
	 private $altura;                                            
	 private $anchura;                                           
	 private $peso;                                              
	 private $id_medida;                                         
	 private $f_elaboracion;                                     
	 private $f_vencimiento;	                                  	
	 private $id_tipo_prod;	                                     
	 private $id_color;                                          
	 private $precio_costo;  	
     private $precio_venta_1;  	
	 private $precio_venta_2;	                                        	
	 private $precio_venta_3;	                                         	
	 private $id_descuento;	                                        
	 private $id_impto;	
	 private $cant_ini;
	 private $cant_max;
	 private $cant_real;
	 private $cant_re_orden;
	 private $ind_fact;
	 private $id_proveedor;
	 private $observaciones;
	 
	// Constructor de la Clase
	// INI.
	public function __construct($cod_producto, $f_creacion, $programa, $nombre_usuario, $desc_producto, $altura, $anchura, $peso,                            $id_medida, $f_elaboracion, $f_vencimiento, $id_tipo_prod, $id_color, $precio_costo, $precio_venta_1,                            $precio_venta_2, $precio_venta_3, $id_descuento, $id_impto, $cant_ini, $cant_max, $cant_real,                            $cant_re_orden, $ind_fact, $id_proveedor, $observaciones ){
		
		$this->cod_producto 		= $cod_producto;
		$this->f_creacion 			= $f_creacion;
		$this->programa 			= $programa;
		$this->nombre_usuario   	= $nombre_usuario;
		$this->desc_producto		= $desc_producto;
		$this->altura	 			= $altura;
		$this->anchura	 			= $anchura;
		$this->peso	 				= $peso;
		$this->id_medida	 		= $id_medida;
		$this->f_elaboracion	 	= $f_elaboracion;
		$this->f_vencimiento	 	= $f_vencimiento;
		$this->id_tipo_prod	 		= $id_tipo_prod;
		$this->id_color	 			= $id_color;
		$this->precio_costo			= $precio_costo;
		$this->precio_venta_1		= $precio_venta_1;
		$this->precio_venta_2		= $precio_venta_2;
		$this->precio_venta_3		= $precio_venta_3;
		$this->id_descuento			= $id_descuento;
		$this->id_impto				= $id_impto;
		$this->cant_ini				= $cant_ini;
		$this->cant_max				= $cant_max;
		$this->cant_real			= $cant_real;
		$this->cant_re_orden		= $cant_re_orden;
		$this->ind_fact				= $ind_fact;
		$this->id_proveedor			= $id_proveedor;
		$this->observaciones		= $observaciones;
				
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
	
	public function get_f_creacion(){
		return $this->f_creacion;
	}
	
	public function get_programa(){
		return $this->programa;
	}
	
	public function get_nombre_usuario(){
		return $this->nombre_usuario;
	}
		
	public function get_desc_producto(){
		return $this->desc_producto;
	}
		
	public function get_altura(){
		return $this->altura;
	}
	
	public function get_anchura(){
		return $this->anchura;
	}
	
	public function get_peso(){
		return $this->peso;
	}
	
	public function get_id_medida(){
		return $this->id_medida;
	}
	
	public function get_f_elaboracion(){
		return $this->f_elaboracion;
	}
	
	public function get_f_vencimiento(){
		return $this->f_vencimiento;
	}
	
	public function get_id_tipo_prod(){
		return $this->id_tipo_prod;
	}
		
	public function get_id_color(){
		return $this->id_color;
	}
	
	public function get_precio_costo(){
		return $this->precio_costo;
	}
		
	public function get_precio_venta_1(){
		return $this->precio_venta_1;
	}
	
	public function get_precio_venta_2(){
		return $this->precio_venta_2;
	}
	
	public function get_precio_venta_3(){
		return $this->precio_venta_3;
	}
	
	public function get_id_descuento(){
		return $this->id_descuento;
	}
	
	public function get_id_impto(){
		return $this->id_impto;
	}
	
	public function get_cant_ini(){
		return $this->cant_ini;
	}
	
	public function get_cant_max(){
		return $this->cant_max;
	}
	
	public function get_cant_real(){
		return $this->cant_real;
	}
	
	public function get_cant_re_orden(){
		return $this->cant_re_orden;
	}
	
	public function get_ind_fact(){
		return $this->ind_fact;
	}
	
	public function get_id_proveedor(){
		return $this->id_proveedor;
	}
	
	public function get_observaciones(){
		return $this->observaciones;
	}
	
	// FIN de Metodos Get ...
	
	// Busqueda de un Proveedores si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select * from t00_productos where cod_producto = '$this->cod_producto' ";
				
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_producto 		= $columna['cod_producto'];
				$this->f_creacion 			= $columna['f_creacion'];
				$this->programa 			= $columna['programa'];
				$this->nombre_usuario   	= $columna['usuario'];
				$this->desc_producto		= $columna['desc_producto'];
				$this->altura		   		= $columna['altura'];
				$this->anchura		   		= $columna['ancho'];
				$this->peso		   			= $columna['peso'];
				$this->id_medida		   	= $columna['id_medida'];
				$this->f_elaboracion		= $columna['fecha_elaboracion'];
				$this->f_vencimiento		= $columna['fecha_expedicion'];
				$this->id_tipo_prod		   	= $columna['id_tipo_producto'];
				$this->id_color		   		= $columna['id_color'];
				$this->precio_costo			= $columna['precio_costo']; 			
				$this->precio_venta_1  		= $columna['precio_venta1']; 				
				$this->precio_venta_2  		= $columna['precio_venta2'];
				$this->precio_venta_3  		= $columna['precio_venta3'];
				$this->id_descuento  		= $columna['id_descuento'];
				$this->id_impto  			= $columna['id_isv'];	
				$this->cant_ini  			= $columna['cant_ini']; 				
				$this->cant_max  			= $columna['cant_max'];
				$this->cant_real  			= $columna['cant_real'];
				$this->cant_re_orden  		= $columna['cant_re_orden'];
				$this->ind_fact  			= $columna['ind_facturable'];	
				$this->id_proveedor  		= $columna['id_proveedor'];
				$this->observaciones  		= $columna['observaciones'];	
				$encontro 					= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Ingreso de Productos ...
	
	// Insercion de una Persona ala BD ******************************************
	public function incluir(){
		$objDatos = new clsDatos();
		// Ejecuta Insert en t00_proveedores		
					
		$sql = "insert into t00_productos(cod_producto, id_tipo_producto, f_creacion, programa, usuario,
                            desc_producto,id_color, altura, ancho, peso, id_medida, fecha_elaboracion,
                            fecha_expedicion, precio_costo, precio_venta1, precio_venta2, precio_venta3, 
                            id_descuento, id_isv, cant_ini, cant_max, cant_real, cant_re_orden, 
                            ind_facturable, id_proveedor, observaciones) 
				values ('$this->cod_producto', '$this->id_tipo_prod', '$this->f_creacion', '$this->programa', 
						    '$this->nombre_usuario', '$this->desc_producto', '$this->id_color', '$this->altura', 
						    '$this->anchura', '$this->peso', '$this->id_medida', '$this->f_elaboracion', 
						    '$this->f_vencimiento', '$this->precio_costo', '$this->precio_venta_1', '$this->precio_venta_2',
						    '$this->precio_venta_3', '$this->id_descuento', '$this->id_impto', '$this->cant_ini', 
						    '$this->cant_max', '$this->cant_real', '$this->cant_re_orden', '$this->ind_fact', 
						    '$this->id_proveedor', '$this->observaciones')";
		
		$objDatos->ejecutar($sql);	
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Ingreso de Productos ...
	
	// Modificacion de Ingreso de Productos *************************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		
		$sql = "update t00_productos 
				set f_creacion = '$this->f_creacion', programa = '$this->programa', usuario = '$this->nombre_usuario', desc_producto = '$this->desc_producto', id_color = '$this->id_color', altura = '$this->altura', ancho = '$this->anchura', peso = '$this->peso', id_medida = '$this->id_medida', fecha_elaboracion = '$this->f_elaboracion', fecha_expedicion = '$this->f_vencimiento', precio_costo = '$this->precio_costo', precio_venta1 = '$this->precio_venta_1', precio_venta2 = '$this->precio_venta_2', precio_venta3 = '$this->precio_venta_3', id_descuento = '$this->id_descuento', id_isv = '$this->id_impto', cant_ini = '$this->cant_ini', cant_max = '$this->cant_max', cant_real = '$this->cant_real', cant_re_orden = '$this->cant_re_orden', ind_facturable = '$this->ind_fact', id_proveedor = '$this->id_proveedor', observaciones = '$this->observaciones' 
				where cod_producto = '$this->cod_producto' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Ingreso de Productos ...
	
	// Eliminacion de Ingreso de Productos **************************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00_productos where cod_producto = '$this->cod_producto' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Ingreso de Productos ...
	
} // FIN DE CLASE ...
?>