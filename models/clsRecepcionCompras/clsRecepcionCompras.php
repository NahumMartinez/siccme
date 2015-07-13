<?php
/**
  * @package: Clase Recepcion de Compras
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-14
  * @version: 1.0
  * @ubicacion: 504-POS/models/clsRecepionCompras
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsRecepcionCompras{
	 private $cod_compra;		// Codigo del Compra
	 private $f_creacion;	
	 private $programa;	
	 private $nombre_usuario;
	 private $id_moneda;
	 private $id_forma_pago;
	 private $doc_id;
	 private $id_proveedor;
	 private $imp_descuento;
	 private $imp_total;
	 private $gtos_compras;	
	 private $observaciones;	
	 private $f_entrega;
	 private $secuencial;
	 // Parametros para los Items Compras
	 private $cod_producto;
	 private $cant_producto;
	 private $price_producto;
	 private $id_descuento;
         
         // Parametro del Allacen
         private $cod_almacen;
		 
		 // Parametro del Allacen
         private $id_almacen;
         
         // Parametro del Allacen
         private $id_producto;
	 
	 
	// Constructor de la Clase
	// INI.
	public function __construct($cod_compra, $cod_almacen){
		
            $this->cod_compra  = $cod_compra;
	    $this->cod_almacen = $cod_almacen;	
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_compra(){
		return $this->cod_compra;
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
		
	public function get_id_moneda(){
		return $this->id_moneda;
	}
		
	public function get_id_forma_pago(){
		return $this->id_forma_pago;
	}
	
	public function get_doc_id(){
		return $this->doc_id;
	}
	
	public function get_id_proveedor(){
		return $this->id_proveedor;
	}
	
	public function get_imp_descuento(){
		return $this->imp_descuento;
	}
	
	public function get_imp_total(){
		return $this->imp_total;
	}
	
	public function get_gtos_compras(){
		return $this->gtos_compras;
	}
	
	public function get_observaciones(){
		return $this->observaciones;
	}
		
	public function get_f_entrega(){
		return $this->f_entrega;
	}
	
	public function get_secuencial(){
		return $this->secuencial;
	}
	
	// Metodos para los Items Compras
	public function get_cod_producto(){
		return $this->cod_producto;
	}
	
	public function get_cant_producto(){
		return $this->cant_producto;
	}
	
	public function get_price_producto(){
		return $this->price_producto;
	}
	
	public function get_id_descuento(){
		return $this->id_descuento;
	}
        
        // Parametro para el Almacen
        public function get_cod_almacen(){
		return $this->cod_almacen;
	}
        
        
    // Parametro para el ID_PRODUCTO
    public function get_id_producto(){
		return $this->id_producto;
	}
	
	// Parametro para el ID_ALMACEN
    public function get_id_almacen(){
		return $this->id_almacen;
	}
	
	// FIN de Metodos Get ...
	
	// ************************ Indidcador de Recibido de la Compras_Enc **************************** 
	public function buscaIndCompra()
	{
		$objDatos = new clsDatos();
		$sql = "select ce.ind_recibido from t00_compras_enc ce where  ce.cod_compra = '$this->cod_compra' and ce.ind_recepcionado = 0 ";
                
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->secuencial    = $columna['ind_recibido'];
				$encontro 	     = true;
                        }else{ $encontro 	     = false; }
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	
	}
	// Fin de Indidcador de Recibido de Compras_Enc ...  *******************************************

	// ************************     Insercion de los Items en la Base de Datos     ******************************
	/*
		Parametros : Id_Compra
		Id_Producto
	*/
	//public function insertaItems($p_cod_compra, $p_cod_producto, $p_cant, $p_precio, $p_id_impuesto){
    
        
        public function insertaItems($compra, $prod, $cant, $precio){
			$objDatos = new clsDatos();
                        
                        // Insertamos los Items de la Compra 
			$sql  = "INSERT INTO T00_ITEMS_COMPRAS (
                                            ID_COMPRA ,ID_PRODUCTO
                                            ,F_CREACION ,PROGRAMA
                                            ,USUARIO ,PRECIO_COSTO
                                            ,CANTIDAD ,ID_IMPUESTO
					    ) VALUES (
                                (SELECT ID_COMPRA FROM T00_COMPRAS_ENC WHERE COD_COMPRA = '".$compra."')
                                ,(SELECT ID_PRODUCTO FROM T00_PRODUCTOS WHERE COD_PRODUCTO = '".$prod."')
                                ,'$this->f_creacion' ,'$this->programa'
                                ,'$this->nombre_usuario ' ,'".$precio."'
                                ,'".$cant."'
                                ,(SELECT ID_ISV FROM T00_PRODUCTOS WHERE COD_PRODUCTO = '".$prod."'))";
                        $objDatos->ejecutar($sql);
                        
                        // Insertamos en la Tabla Historica de los Items de la Compra
                        $sql_1 = "INSERT INTO T01_HITEMS_COMPRAS ( ID_COMPRA, ID_PRODUCTO, DOCUMENTO_ID, 
                                               F_CREACION, PROGRAMA, USUARIO, 
                                               PRECIO_COSTO, ID_IMPUESTO )       
                                        SELECT IT.ID_COMPRA,  IT.ID_PRODUCTO, CE.DOCUMENTO_ID, 
                                               IT.F_CREACION, 'T00_ITEMS_COMPRAS', IT.USUARIO,
                                               IT.PRECIO_COSTO, IT.ID_IMPUESTO 
                                        FROM T00_ITEMS_COMPRAS IT, T00_COMPRAS_ENC CE 
                                        WHERE IT.ID_COMPRA   = (SELECT ID_COMPRA FROM T00_COMPRAS_ENC WHERE COD_COMPRA = '".$compra."') AND 
                                              IT.ID_PRODUCTO = (SELECT ID_PRODUCTO FROM T00_PRODUCTOS WHERE COD_PRODUCTO = '".$prod."') AND 
                                              IT.ID_COMPRA   =  CE.ID_COMPRA;";
                        $objDatos->ejecutar($sql_1);
                        echo $sql_1;
            $objDatos->cerrarconecxion();

	}
	// Fin de Insercion de Items de Compras ...

	// *************************    Busqueda de un Compra si Existente ******************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select co.cod_compra, co.f_creacion, co.usuario,
                                co.id_proveedor
			from  t00_compras_enc co
			where co.cod_compra = '$this->cod_compra' ";


		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_compra 	  = $columna['cod_compra'];
				$this->f_creacion 	  = $columna['f_creacion'];
				$this->id_proveedor  	  = $columna['id_proveedor'];
				$encontro 		  = true;
			}

			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();

			return $encontro;
	}
	// FIN de Busqueda de Compras Encabezado ...

        // ************************* Funcion de Insercion a items de la Venta, segun las cantidades de la compra 
        //  *****************************
        // Retorna : True / False segun los Items de Linea de Cada Compra y sus Cantidades
        public function InsertItemsCantidades()
        {                     
            // Instanciamos las Conecxiones a BD
            $objDatos_1  = new clsDatos();
						
            $ve_fCreacion = date("Y-m-d");
            $ve_usuario	  = $_SESSION["username"];
                    
		// Insert Select a Los Items de la Compra y Ponerlos a Dispocion de la
	        // Distribucion de Almacenes
		$sql_1 = "INSERT INTO T00_ITEMS_PRODUCTOS 
				(USUARIO, F_CREACION, PROGRAMA, 
				 ID_PRODUCTO, ID_COMPRA, ID_ESTADO, ID_IMPUESTO, 
				 NUM_CORRELATIVO, CANTIDAD, PRECIO_COSTO, IND_RECEPCIONADO, IND_VACIADO ) 
		    	    SELECT '".$ve_usuario."', '".$ve_fCreacion."', 'T00_ITEMS_PRODUCTOS', 
			           IC.ID_PRODUCTO, IC.ID_COMPRA, 8, IC.ID_IMPUESTO,
				   CONCAT(CE.COD_COMPRA,PR.COD_PRODUCTO), IC.CANTIDAD,
				   IC.PRECIO_COSTO, IC.IND_RECEPCIONADO, 0  
			    FROM T00_ITEMS_COMPRAS IC, T00_COMPRAS_ENC CE, T00_PRODUCTOS PR
			    WHERE IC.ID_COMPRA   = CE.ID_COMPRA AND  
				  PR.ID_PRODUCTO = IC.ID_PRODUCTO AND
				  IC.ID_COMPRA   = (SELECT CE1.ID_COMPRA FROM T00_COMPRAS_ENC CE1 	
			                            WHERE CE1.COD_COMPRA = '$this->cod_compra');";
                    
                $objDatos_1->ejecutar($sql_1);
                
                // Insertamos en la Tabla Historica T01_hitems_compras
                // 
                                    
		// Proceso de Actualizacion del Stok
		//actualizarStok($filas[0], $filas[1]);
			
		$sql_3 = "SELECT SUM(IC.CANTIDAD) CANT, IC.ID_PRODUCTO 
			  FROM T00_ITEMS_COMPRAS IC
			  WHERE IC.ID_COMPRA   = (SELECT CE1.ID_COMPRA FROM T00_COMPRAS_ENC CE1 	
						  WHERE CE1.COD_COMPRA = '$this->cod_compra')
			  GROUP BY IC.ID_PRODUCTO ;";
													
		$datos_encontrados = $objDatos_1->filtro($sql_3);
				
            // Recorrido del Array de los Items de la Compra
            while ($filas= $objDatos_1->proximoArray($datos_encontrados))  
            {
                // Actualizaos el Strock de Prodcuto segun, la Cantidad de Cada Producto Comprado
		$sql_2 = "UPDATE T00_PRODUCTOS 
                            SET CANT_REAL = CANT_REAL + '$filas[0]'" 
                        . "WHERE ID_PRODUCTO = '$filas[1]'";
		
		$objDatos_1->ejecutar($sql_2);
				
            }
			
		// Actualizaos la Fecha de ultima Comrpa En Almacenes
		$sql_BA = "SELECT ID_ALMACEN FROM T00_ALMACENES WHERE COD_ALMACEN = '$this->cod_almacen'";
		$datos_encontrados_BA = $objDatos_1->filtro($sql_BA);
		if($columna = $objDatos_1->proximo($datos_encontrados_BA))
                {
		    $this->id_almacen  = $columna['ID_ALMACEN'];
		}
                
		$sql_A = "UPDATE T00_ALMACENES 
                            SET F_ULT_COMPRA = '$ve_fCreacion', USUARIO = '$ve_usuario', PROGRAMA = 'T00_ITEMS_PRODUCTOS' 
                          WHERE ID_ALMACEN = '$this->id_almacen' ";
		
		$objDatos_1->ejecutar($sql_A);
                
                // Insertamos en la Tabla Historica de los Items de la Compra
                        $sql_h = "INSERT INTO T01_HITEMS_COMPRAS ( ID_COMPRA, ID_PRODUCTO, DOCUMENTO_ID, 
                                               F_CREACION, PROGRAMA, USUARIO, 
                                               PRECIO_COSTO, ID_IMPUESTO )       
                                        SELECT IT.ID_COMPRA,  IT.ID_PRODUCTO, CE.DOCUMENTO_ID, 
                                               IT.F_CREACION, 'T00_ITEMS_COMPRAS', IT.USUARIO,
                                               IT.PRECIO_COSTO, IT.ID_IMPUESTO 
                                        FROM T00_ITEMS_COMPRAS IT, T00_COMPRAS_ENC CE 
                                        WHERE CE.COD_COMPRA  = '$this->cod_compra' AND 
                                              IT.ID_COMPRA   =  CE.ID_COMPRA
                                        ORDER BY IT.ID_PRODUCTO;";
                        $objDatos_1->ejecutar($sql_h);
                        
                
            $encontro  = true;
                       
		$objDatos_1->cerrarfiltro($datos_encontrados);
		$objDatos_1->cerrarfiltro($datos_encontrados_BA);
                $objDatos_1->cerrarconecxion();
                       
            return $encontro;
        }
        
        // Fin de Funcion de Recorrido de Cantidades de la Compra
        
	// ************************* Actualizacion de Recepcion de Compras Enc ala BD *******************************
	public function actulizarComprasEnc(){
		$objDatos = new clsDatos();
		// Ejecuta Actualizacion en t00_compras_enc
		$sql = "update t00_compras_enc "
                        . " set ind_recibido = 1, f_entrega = CURDATE(), hora_compra = CURTIME(), "
                                . "id_almacen = (select id_almacen from t00_almacenes where cod_almacen = '$this->cod_almacen' ) "
                        . "where cod_compra = '$this->cod_compra' ";

		$objDatos->ejecutar($sql);
                $objDatos->cerrarconecxion();
                
	}
	// FIN de Actualizacion de Recepcion de Compras ... *********************************************************

	// *************************  Actualizado de Encabezado y Items de las Compras  *******************************************
	public function actulizaMasivo()
	{
		$objDatos = new clsDatos();
		// Borrado del Encabezado de la Compra 
		$sql = "update t00_compras_enc set ind_recepcionado = 1
			 where cod_compra = '$this->cod_compra' ";
		
		$objDatos->ejecutar($sql);
                // Borrado de los Items de la Compra 
		$sql_1 = "update t00_items_compras set ind_recepcionado = 1
			 where id_compra = (select id_compra from t00_compras_enc 	
                                            where cod_compra = '$this->cod_compra') ";
		
		$objDatos->ejecutar($sql_1);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Actualizado de Encabezado y Items de Compras ...
	
	// *************************  Sumarizacion del Stok de Items de Productos  ********************************************
	public function actualizarStok($cantidad, $id_producto)
	{
		$objDatos = new clsDatos();
		$sql = "update t00_productos set cant_real = cant_real + $cantidad where id_producto = $id_producto ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Encabezado de Compras ...
	
} // FIN DE CLASE ...
?>