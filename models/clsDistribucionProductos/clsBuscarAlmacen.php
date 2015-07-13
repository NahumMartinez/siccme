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
         private $cant_real;
         private $cant_max;
         private $cant_min;
         private $cant_reord;
         private $f_ult_compra;
         
         // Para los Estantes
         private $no_filas;
         private $no_columnas;
         
         // Para el Inventario
         private $cant_inv_real;
         private $cant_inv_max;
         private $cant_inv_reord;
                  	  	
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
        
        public function get_cant_real(){
		return $this->cant_real;
	}
        
        public function get_cant_max(){
		return $this->cant_max;
	}
        
        public function get_cant_min(){
		return $this->cant_min;
	}
        
        public function get_cant_reord(){
		return $this->cant_reord;
	}
        
        public function get_f_ult_compra(){
		return $this->f_ult_compra;
	}
        
        // Metodos para Los Estantes
        public function get_cant_inv_real(){
		return $this->cant_inv_real;
	}
        
        public function get_cant_inv_max(){
		return $this->cant_inv_max;
	}
        
        public function get_cant_inv_reord(){
		return $this->cant_inv_reord;
	}
        
        // Metodos para el Invntario del Producto
        public function get_no_filas(){
		return $this->no_filas;
	}
        
        public function get_no_columnas(){
		return $this->no_columnas;
	}
	
	// FIN de Metodos Get ...
	
	// Busqueda de un Almacen si Existe en la Ventana de Recepcion de Compras *************************************
        // Metodo de Busqueda por le Codigo del Almacen
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "SELECT AL.ID_ALMACEN, AL.COD_ALMACEN, AL.NOM_ALMACEN, 
                               AL.NUM_ESTANTES, SU.NOMBRE_SUCURSAL,
                               CONCAT(PE.NOMBRE_1, ' ', PE.APELLIDO_1) ENCARGADO,
                               AL.CANT_REAL, AL.CANT_MAX, AL.CANT_MIN, AL.CANT_REORD,
                               AL.F_ULT_COMPRA
                        FROM T00_ALMACENES AL, T00_PERSONAS PE, T00_SUCURSALES SU
                        WHERE AL.COD_ALMACEN        = '$this->cod_almacen' AND
                              AL.ID_EMPLE_ENCARGADO = PE.ID_PERSONA AND 
                              AL.ID_SUCURSAL        = SU.ID_SUCURSAL ";

		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_almacen 	    	= $columna['COD_ALMACEN'];
				$this->nombre_almacen   	= $columna['NOM_ALMACEN'];
				$this->sucursal         	= $columna['NOMBRE_SUCURSAL'];
				$this->num_estantes	    	= $columna['NUM_ESTANTES'];
				$this->empleado_encargado   = $columna['ENCARGADO'];
				$this->id_almacen           = $columna['ID_ALMACEN'];
				$this->cant_real            = $columna['CANT_REAL'];
				$this->cant_max             = $columna['CANT_MAX'];
				$this->cant_min             = $columna['CANT_MIN'];
				$this->cant_reord           = $columna['CANT_REORD'];
				$this->f_ult_compra         = $columna['F_ULT_COMPRA'];
				$encontro 		    		= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Almacen desde Recepcion de Compras ...
        
        
        // Funcion de Busqueda de la Matriz del Estante
        public function matrizEstantes($ve_IdEstante) {
            $encontro = false;
	    $objDatos = new clsDatos();
            $sql = "SELECT E.NO_FILAS, E.NO_COLUMNAS 
                    FROM T00_ESTANTES E 
                    WHERE E.ID_ALMACEN = (SELECT A.ID_ALMACEN FROM T00_ALMACENES A WHERE A.COD_ALMACEN = '$this->cod_almacen')
                          AND E.ID_ESTANTE = '$ve_IdEstante'";
            //echo $sql;
            $datos_encontrados = $objDatos->filtro($sql);
                if($columna = $objDatos->proximo($datos_encontrados))
		{
                    $this->no_filas     = $columna['NO_FILAS'];
                    $this->no_columnas  = $columna['NO_COLUMNAS'];
                    $encontro 		    = true;
                }
                   
            $objDatos->cerrarfiltro($datos_encontrados);
	    $objDatos->cerrarconecxion();
			
	    return $encontro;       
            
        }
        
        // Fin de Busqueda de Matriz
        
        // Funcion de Busqueda del Inventario del Producto, 
        // en estado : ERP001(Producto Comprado)
        public function obtenInventario($cod_producto) {
            $encontro = false;
	    $objDatos = new clsDatos();
            
            $sql = "SELECT SUM(CANTIDAD) CANT_REAL,
                           P.CANT_RE_ORDEN, P.CANT_MAX 
                    FROM T00_ITEMS_PRODUCTOS IP, T00_PRODUCTOS P 
                    WHERE IP.ID_PRODUCTO = (SELECT P.ID_PRODUCTO FROM T00_PRODUCTOS P WHERE P.ID_PRODUCTO = IP.ID_PRODUCTO AND
                          P.COD_PRODUCTO = '$cod_producto') AND
                          IP.ID_PRODUCTO = P.ID_PRODUCTO";
            //echo $sql;
            $datos_encontrados = $objDatos->filtro($sql);
                if($columna = $objDatos->proximo($datos_encontrados))
		{
                    $this->cant_inv_real    = $columna['CANT_REAL'];
                    if( $columna['CANT_MAX'] == null){ $this->cant_inv_max = "0"; }else{$this->cant_inv_max            = $columna['CANT_MAX'];}
                    if( $columna['CANT_RE_ORDEN'] == null){ $this->cant_inv_reord = "0"; }else{$this->cant_inv_reord   = $columna['CANT_RE_ORDEN'];}
                    $encontro 		    = true;
                }
                   
            $objDatos->cerrarfiltro($datos_encontrados);
	    $objDatos->cerrarconecxion();
			
	    return $encontro;       
            
        }
        
        // Fin de Busqueda del Inventario del Producto
        		
} // FIN DE CLASE ...
?>