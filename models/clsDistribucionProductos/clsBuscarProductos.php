<?php
/**
  * @package: Clase Buscar Productos
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2015-03-07
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsBuscaProductos{
	 private $cod_producto;
         private $desc_producto;
         private $desc_tipo_producto;
         private $precio_costo;
         private $precio_venta;
                  	  	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_producto){
		
	    $this->cod_producto  = $cod_producto;
              						
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
			
	public function get_desc_tipo_producto(){
		return $this->desc_tipo_producto;
	}
	
	public function get_precio_costo(){
		return $this->precio_costo;
	}
			
	public function get_precio_venta(){
		return $this->precio_venta;
	}
	
	// FIN de Metodos Get ...
	
	// Busqueda de un Producto si Existente en la Ventana de Distribucion de Productos *********************************
        // Metodo de Busqueda por le Codigo del Producto
	public function buscarCodigo(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "SELECT P.COD_PRODUCTO, P.DESC_PRODUCTO, T.DESC_TIPO,
                               P.PRECIO_COSTO,
                                CASE P.IND_PREC_ACTIVO
                                    WHEN 1 THEN P.PRECIO_VENTA1
                                    WHEN 2 THEN P.PRECIO_VENTA2
                                    WHEN 3 THEN P.PRECIO_VENTA3
                                END AS PRECIO_VENTA       
                        FROM T00_PRODUCTOS P, T00_TIPOS T 
                        WHERE P.ID_TIPO_PRODUCTO = T.ID_TIPO AND 
                              P.COD_PRODUCTO     = '$this->cod_producto' ";
                              
            $datos_encontrados = $objDatos->filtro($sql);
            if($columna = $objDatos->proximo($datos_encontrados))
            {
		$this->cod_producto 	    = $columna['COD_PRODUCTO'];
		$this->desc_producto        = $columna['DESC_PRODUCTO'];
		$this->desc_tipo_producto   = $columna['DESC_TIPO'];
		$this->precio_costo	    = $columna['PRECIO_COSTO'];
                $this->precio_venta	    = $columna['PRECIO_VENTA'];
			
		$encontro 		    = true;
            }
			
            $objDatos->cerrarfiltro($datos_encontrados);
            $objDatos->cerrarconecxion();
			
            return $encontro;
	}
	// FIN de Busqueda de Productos desde Compras ...
        
			
} // FIN DE CLASE ...
?>