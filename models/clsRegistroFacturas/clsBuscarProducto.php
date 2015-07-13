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
         private $id_producto;
	 private $desc_producto;
         private $num_correlativo;
	 private $precio_venta;
	 private $impuesto;
         private $descuento;
	 private $cant;
         
         // Variables del Stok de Procudtos
         private $cant_disponibles;
         private $cant_comprometidas;
         private $cant_vendidas;
	  	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_producto, $cant){
		
		$this->cod_producto 	= $cod_producto;
		$this->cant		= $cant;
				
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
        
        public function get_id_producto(){
		return $this->id_producto;
	}
			
	public function get_desc_producto(){
		return $this->desc_producto;
	}
        
        public function get_num_correlativo(){
		return $this->num_correlativo;
	}
			
	public function get_precio_venta(){
		return $this->precio_venta;
	}
	
	public function get_impuesto(){
		return $this->impuesto;
	}
        
        public function get_descuento(){
		return $this->descuento;
	}
		
        // Metodos para El Cotrol del Stok de Productos
        public function get_cant_disponibles(){
		return $this->cant_disponibles;
	}
        
        public function get_cant_comprometidas(){
		return $this->cant_comprometidas;
	}
        
        public function get_cant_vendidas(){
		return $this->cant_vendidas;
	}
        
	// FIN de Metodos Get ...
	
	// Busqueda de un Producto si Existente en la Ventana de Clientes *************************************
	public function buscar(){
		$encontro = 2;
                $ve_IdSucursal   = $_SESSION["id_sucursal"];
                $ve_IdAlmacen    = $_SESSION["id_almacen"];
                //echo $ve_IdSucursal;
		$objDatos = new clsDatos();
                		
                $sql = "SELECT P.ID_PRODUCTO, P.COD_PRODUCTO, P.DESC_PRODUCTO, 
                               CASE P.IND_PREC_ACTIVO
                                 WHEN 1 THEN P.PRECIO_VENTA1
                                 WHEN 2 THEN P.PRECIO_VENTA2
                                 WHEN 3 THEN P.PRECIO_VENTA3
                               END AS PRECIO_VENTA,
                               I.PORCENTAJE_IMPUESTO, D.PORCENTAJE_DESCUENTO,
                               IP.CANT_DISPONIBLES, IP.CANT_COMPROMETIDAS, IP.CANT_VENDIDAS
                        FROM  T00_PRODUCTOS P, T00_IMPUESTOS I, 
                              T00_ALMACENES A, T02_ITEMS_ALMACEN IP, 
                              T00_SUCURSALES S,T00_DESCUENTOS D
                        WHERE P.ID_ISV       = I.ID_ISV       AND
                              P.ID_PRODUCTO  = IP.ID_PRODUCTO AND
                              A.ID_ALMACEN   = IP.ID_ALMACEN  AND
                              A.ID_SUCURSAL  = S.ID_SUCURSAL  AND
                              P.ID_DESCUENTO = D.ID_DESCUENTO AND
                              S.ID_SUCURSAL  = '".$ve_IdSucursal."' AND
                              IP.ID_ALMACEN =  '".$ve_IdAlmacen."' AND
                              P.COD_PRODUCTO = '$this->cod_producto' AND
                              IP.CANT_DISPONIBLES > 0;";
		//echo "Almacen".$ve_IdAlmacen; echo "Sucursal".$ve_IdSucursal; 		
		$datos_encontrados = $objDatos->filtro($sql);
                if($columna = $objDatos->proximo($datos_encontrados))
                { 
                        $this->id_producto 	= $columna['ID_PRODUCTO'];
                        $this->cod_producto 	= $columna['COD_PRODUCTO'];
                        $this->desc_producto	= $columna['DESC_PRODUCTO'];
                        //$this->num_correlativo	= $columna['NUM_CORRELATIVO'];
                        $this->precio_venta	= $columna['PRECIO_VENTA'];
                        $this->impuesto		= $columna['PORCENTAJE_IMPUESTO'];
						$this->descuento	= $columna['PORCENTAJE_DESCUENTO'];
                        $this->cant_disponibles	= $columna['CANT_DISPONIBLES'];
                        $this->cant_comprometidas = $columna['CANT_COMPROMETIDAS'];
                        $this->cant_vendidas	= $columna['CANT_VENDIDAS'];
                        
                        // Validacion de Cantidades del Producto
                            if($this->cant > $this->cant_disponibles){
                               $encontro = 3; 
                            }else{
                                // Actualizmos el Stok de los Items de la Peticion del Producto
                                $sql_1 = "UPDATE T02_ITEMS_ALMACEN "
                                    . "     SET CANT_DISPONIBLES = CANT_DISPONIBLES - '$this->cant',"
                                    . "         CANT_COMPROMETIDAS =  CANT_COMPROMETIDAS + '$this->cant' "
                                    . "   WHERE ID_PRODUCTO = '$this->id_producto' AND "
                                    . "         ID_ALMACEN  = '".$ve_IdAlmacen."'";
                                // Ejecuacion dela Petcion        
                                $objDatos->ejecutar($sql_1);
                                
                                $encontro = 1;
                            }
                
                }else{ $encontro = 2;}  
                
                $objDatos->cerrarfiltro($datos_encontrados);
                $objDatos->cerrarconecxion();   //echo $encontro;
				
		return $encontro;
	}
	// FIN de Busqueda de Productos desde Facturacion ...
        
        // Actualizacion del Producto al ser Eliminado del Lostado de Facturacion
	// Actualizmos el Estado del Producto encontrado a PreVendido
        function actProdEliminado(){        
                $encontro = true;
                $ve_IdAlmacen    = $_SESSION["id_almacen"]; //echo $ve_IdAlmacen; echo $this->cod_producto;
                $objDatos = new clsDatos();
                
                $sql   = " UPDATE T02_ITEMS_ALMACEN SET PROGRAMA = 'T00_FACTURAS_ENC', "
                        . "       CANT_DISPONIBLES = CANT_DISPONIBLES + '$this->cant',"
                        . "       CANT_COMPROMETIDAS = CANT_COMPROMETIDAS -  '$this->cant' "
                        ." WHERE ID_PRODUCTO = (SELECT ID_PRODUCTO FROM T00_PRODUCTOS WHERE COD_PRODUCTO = '$this->cod_producto') "
                        ." AND ID_ALMACEN = '$ve_IdAlmacen' ";
			
                $objDatos->ejecutar($sql);
                $objDatos->cerrarconecxion();
        
                return $encontro;
        }        
        // Fin de Actualizacion de Producto *******************************************************        
				
} // FIN DE CLASE ...
?>