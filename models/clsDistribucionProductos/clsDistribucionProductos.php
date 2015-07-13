<?php
/**
  * @package: Clase Distribucion de Productos en Almacen
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2015-0419
  * @version: 1.0
  * @ubicacion: 504-POS/models/clsDistribucionProductos
  * @tareas: Se recibe los productos en estado ERP001 y se insertan en la la tabla, 
  *          t02_items_almacen, y luego cambia el estado del producto en t00_items_compras 
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsDistribucionProductos{
	 private $cod_producto;		// Codigo del Compra
	 private $limit;	
	 private $id_almacen;	
	 private $id_estante;
	 private $no_fila;
	 private $no_columna;
         
         // Cantidades Disponbles a Actualizar
         private $cant_disponibles;
         private $id_producto;
         private $id_compra;

         // Constructor de la Clase
	// INI.
	public function __construct($cod_producto, $limit, $id_almacen, $id_estante, $no_fila, $no_columna){
		
		$this->cod_producto  = $cod_producto;
		$this->limit         = $limit;
		$this->id_almacen    = $id_almacen;
		$this->id_estante    = $id_estante;
		$this->no_fila       = $no_fila;
		$this->no_columna    = $no_columna;
		
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
	
	public function get_limit(){
		return $this->limit;
	}
	
	public function get_id_almacen(){
		return $this->id_almacen;
	}
	
	public function get_id_estante(){
		return $this->id_estante;
	}
		
	public function get_no_fila(){
		return $this->no_fila;
	}
		
	public function get_no_columna(){
		return $this->no_columna;
	}
        
        // Cantidades Disponibles de Productos a Ingresar
        public function get_cant_disponibles(){
		return $this->cant_disponibles;
	}
        
        public function get_id_producto(){
		return $this->id_producto;
	}
        
        public function get_id_compra(){
		return $this->id_compra;
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
                        $encontro	 	     = true;
                }else{ 
                        $encontro 		     = false; }

                $objDatos->cerrarfiltro($datos_encontrados);
                $objDatos->cerrarconecxion();

                return $encontro;
	
	}
	// Fin de Indidcador de Recibido de Compras_Enc ...  *******************************************
	
        
        /************************** Insercion de los Items en la Base de Datos *****************************
	*                                                                                                  * 
	*  Parametros : COD_PRODUCTO, ID_ALMACEN, ID_ESTANTE, NUM_ITEMS, NO_FILA, NO_COLUMNA               * 
	*  TABLA      : T02_ITEMS_ALMACEN                                                                  * 
        *  PROCESO    : SE INVOCARA EL PROCESO ALMACENADO: SP_INSERT_T02_ITEMS_ALMACEN (Procesos Manuales) * 
        *               PARA INSERTAR TODOS LOS ITEMS EN ESTADO (ERP001) Producto Comprado, Y CAMBIARLO A  *
        *               (ERP009) Producto Almacenado, PARA UTILIZARLO EN LA FACTURACION.                   *
	****************************************************************************************************/
        public function InsertItemsAlmacen(){
            $objDatos = new clsDatos();
            			
            $ve_fCreacion = date("Y-m-d");
            $ve_usuario	  = $_SESSION["username"];
            /*$sql      = "CALL SP_INSERT_T02_ITEMS_ALMACEN($this->cod_producto, $this->limit,
                                                          $this->id_almacen, $this->id_estante, $this->no_fila, $this->no_columna)";*/	
            // Busca las Cantidades de la Compra Recibida 
            $sql   = "SELECT SUM(IP.CANTIDAD ) CANT_DISP, IP.ID_PRODUCTO, IP.ID_COMPRA
                      FROM T00_ITEMS_PRODUCTOS IP
                      WHERE IP.ID_PRODUCTO = (SELECT P.ID_PRODUCTO FROM T00_PRODUCTOS P WHERE P.COD_PRODUCTO = '$this->cod_producto') AND 
                            IP.ID_ESTADO = 8 AND CANTIDAD > 0 AND IND_VACIADO = 0;";
            
            $datos_encontrados = $objDatos->filtro($sql);
                if($columna = $objDatos->proximo($datos_encontrados))
                {
                    $this->cant_disponibles  = $columna['CANT_DISP'];
                    $this->id_producto       = $columna['ID_PRODUCTO'];
                    $this->id_compra         = $columna['ID_COMPRA'];
                    // Actualzacion de Las Cantidades Disponibles para el Almacen
		    if($this->limit > $this->cant_disponibles){ exit;
		    }else{
		          $sql_1 = "UPDATE T02_ITEMS_ALMACEN SET CANT_DISPONIBLES = CANT_DISPONIBLES + '$this->limit' 
                                    WHERE ID_PRODUCTO = '$this->id_producto' AND
                                          ID_ALMACEN = '$this->id_almacen';";
                        
			  $objDatos->ejecutar($sql_1);
		    }
                    $cantidad_productos  = $this->limit;                    
                    
                    // Actualizacion de Los Items de Productos a ID_ESTDO = 18 (Producto Almacenado)
                    // Bucle con el Cual recorremos las Compras con cantidades disponibles, de no ser asi se
                    // actualiza: IND_VACIADO = 1 y CANTIDAD = 0; con el objetivo de no contar con las cant.
                    // de esa compra ligada al producto.
					
                    $sql_co = "SELECT IP.CANTIDAD, IP.ID_PRODUCTO, IP.ID_COMPRA
                                       FROM T00_ITEMS_PRODUCTOS IP
                                       WHERE IP.ID_PRODUCTO = '$this->id_producto' AND 
                                             IP.ID_ESTADO = 8 AND CANTIDAD >= 0 AND IND_VACIADO = 0;";
                    // Ciclo While para las Compras que no tengan CANTIDAD > 0 y IND_VACIADO = 1
                    // Recorrido del Array de los Items de la Compra

                    $datos_encontrados_1 = $objDatos->filtro($sql_co);
                        
                    while ($filas= $objDatos->proximoArray($datos_encontrados_1))  
                    {
                     // Verificamos si Compra tiene Disponibilidad de Cantidades de Prodcutos
                     // Inicializa Limit

                        //echo 'Limit INi ' . $this->limit . '  ';					
                        if($filas[0] <= 0){
                        // Actualiza las Cantidad en = 0
                        $sql_2 = "UPDATE T00_ITEMS_PRODUCTOS 
                                     SET ID_ESTADO = 8, PROGRAMA = 'T02_ITEMS_ALMACEN', IND_VACIADO = 1, 
                                         CANTIDAD = 0, USUARIO = '".$ve_usuario."'
                                  WHERE ID_PRODUCTO = '$filas[1]' AND 
                                        ID_COMPRA   = '$filas[2]' AND 
                                        ID_ESTADO   = 8 AND IND_VACIADO = 0;";	
                        // Ejecuacion de la Peticion	
                        $objDatos->ejecutar($sql_2);
                        //echo 'Entra por 0';
                        
                        }else{
                            if($this->limit > $filas[0]){
                                //echo 'Entra por Limite Mayor';
                            $this->limit = $this->limit - $filas[0];
                                //echo "Limite dentro de Mayor INI ".$this->limit." ";    
                            $sql_2 = "UPDATE T00_ITEMS_PRODUCTOS 
                                        SET ID_ESTADO = 8, PROGRAMA = 'T02_ITEMS_ALMACEN', 
                                            IND_RECEPCIONADO = 1, IND_VACIADO = 1, 
                                            CANTIDAD = CANTIDAD - '$filas[0]' , USUARIO = '".$ve_usuario."'
                                      WHERE ID_PRODUCTO = '$filas[1]' AND 
                                            ID_COMPRA   = '$filas[2]' AND 
                                            ID_ESTADO   = 8 AND IND_VACIADO = 0;";	
                            // Ejecuacion de la Peticion	
                            $objDatos->ejecutar($sql_2);
                                //echo $sql_2;
                                //echo "Limite dentro de Mayor FIN ".$this->limit." "; 
                                
                                // Insertamos en el Historico de Los Items de Productos a ID_ESTDO = 18 (Producto Almacenado)
                                $sql_3 = "INSERT INTO T01_HASIGNACION_ALMACENES  
                                                (USUARIO, F_CREACION, PROGRAMA,
                                                 ID_PRODUCTO, ID_COMPRA, ID_ALMACEN, ID_ESTANTE,
                                                 CANT_DISPONIBLES, ID_ESTADO, NUM_CORRELATIVO, CANT_INGRESADA) 
                                          SELECT '".$ve_usuario."', '".$ve_fCreacion."', 'T02_ITEMS_ALMACEN',  
                                                 '$this->id_producto', '$this->id_compra', '$this->id_almacen', '$this->id_estante', 
                                                 IA.CANT_DISPONIBLES, 18, IP.NUM_CORRELATIVO, '".$filas[0]."'
                                          FROM T00_ITEMS_PRODUCTOS IP, T02_ITEMS_ALMACEN IA
                                          WHERE IP.ID_PRODUCTO = '$filas[1]' AND 
                                                IP.ID_ESTADO   = 8   AND
                                                IA.ID_PRODUCTO = IP.ID_PRODUCTO AND 
                                                IA.ID_ALMACEN = '$this->id_almacen' AND
                                                IP.ID_COMPRA  = '$filas[2]';";

                                $objDatos->ejecutar($sql_3);
                                
                            }elseif($this->limit <= $filas[0]){
                                //echo 'Entra por Milite Menor';
                                //echo "Limite dentro de Menor FIN ".$this->limit." ";
                            $sql_2 = "UPDATE T00_ITEMS_PRODUCTOS 
                                        SET ID_ESTADO = 8, IND_RECEPCIONADO = 1, 
                                            PROGRAMA = 'T02_ITEMS_ALMACEN', 
                                            CANTIDAD = CANTIDAD - '$this->limit', USUARIO = '".$ve_usuario."'
                                      WHERE ID_PRODUCTO = '$filas[1]' AND 
                                            ID_COMPRA   = '$filas[2]' AND 
                                            ID_ESTADO   = 8 AND IND_VACIADO = 0;";
                            // Ejecuacion de la Peticion
                            $objDatos->ejecutar($sql_2);
                                //echo $sql_2; 
                                //echo "Limite dentro de Menor FIN ".$this->limit." ";
                                //echo "Filas ".$filas[0]." "; 
                                // Insertamos en el Historico de Los Items de Productos a ID_ESTDO = 18 (Producto Almacenado)
                                $sql_3 = "INSERT INTO T01_HASIGNACION_ALMACENES  
                                                (USUARIO, F_CREACION, PROGRAMA,
                                                 ID_PRODUCTO, ID_COMPRA, ID_ALMACEN, ID_ESTANTE,
                                                 CANT_DISPONIBLES, ID_ESTADO, NUM_CORRELATIVO, CANT_INGRESADA) 
                                          SELECT '".$ve_usuario."', '".$ve_fCreacion."', 'T02_ITEMS_ALMACEN',  
                                                 '$this->id_producto', '$this->id_compra', '$this->id_almacen', '$this->id_estante', 
                                                 IA.CANT_DISPONIBLES, 18, IP.NUM_CORRELATIVO, '".$this->limit."'
                                          FROM T00_ITEMS_PRODUCTOS IP, T02_ITEMS_ALMACEN IA
                                          WHERE IP.ID_PRODUCTO = '$filas[1]' AND 
                                                IP.ID_ESTADO   = 8   AND
                                                IA.ID_PRODUCTO = IP.ID_PRODUCTO AND 
                                                IA.ID_ALMACEN = '$this->id_almacen' AND
                                                IP.ID_COMPRA  = '$filas[2]';";

                                $objDatos->ejecutar($sql_3);
                                
                                // Evaluamos si hay Diferencia
                                if( $filas[0] - $this->limit >= 0){
                                    $this->limit = 0; 
                                    //echo "Limite dentro Break ".$this->limit." ";
                                    //echo "Filas Break ".$filas[0]." "; 
                                    //echo "Breajk 0";
                                    break; 
                                }
                            		
                            }
                            
                            /*if($this->limit = 0){
                               echo "Breajk 2"; break; 
                            }*/
                            

                    }// Fin de Validacion
                    //echo $filas[0] .'   '. $filas[1] .'   '. $filas[2];
                    //echo 'Limit FIN '. $this->limit . '  ';					
                        
                    }
					
                    // Actualizamos el Stok del Almace con un ID_ESTDO = 18 (Producto Almacenado)
                    $sql_4 = "UPDATE T00_ALMACENES SET CANT_REAL = CANT_REAL + '".$cantidad_productos."', 
                                     F_ULT_COMPRA = '$ve_fCreacion', USUARIO = '".$ve_usuario."', PROGRAMA = 'T02_ITEMS_ALMACEN' 
		              WHERE ID_ALMACEN = '$this->id_almacen';";
                        
                    $objDatos->ejecutar($sql_4);
                    
                    $encontro	   = true;
                }else{ 
                    $encontro 	   = false; }

            // Cerramos las Conecxiones a Base de Datos
            $objDatos->cerrarfiltro($datos_encontrados);
            $objDatos->cerrarfiltro($datos_encontrados_1);
            $objDatos->cerrarconecxion();
                        
            return $encontro;
            
        }
        // Insercion de Items en Almacen

        // ************************* Funcion de Insercion a items de la Venta, segun las cantidades de la compra 
        // Retorna : El Array de las Cantidades de la Compra
        public function InsertItemsCantidades()
        {    
            $m_ItemsCompras = array();
            $objDatos    = new clsDatos();
            // Ejecuta el Llamado al Aaray de los Items de la Compra Solicitada
            $sql  = "select ic.id_compra, ic.id_producto, ic.cantidad, ic.usuario, 
                            ic.f_creacion, ce.cod_compra, pr.cod_producto  
                    from t00_items_compras ic, t00_compras_enc ce, t00_productos pr
                    where ic.id_compra   = ce.id_compra and  
                          pr.id_producto = ic.id_producto and
                          ic.id_compra   = (select ce1.id_compra from t00_compras_enc ce1 	
                                            where ce1.cod_compra = '$this->cod_compra'); " ;
            
            $datos_encontrados = $objDatos->filtro($sql);
            $i= 0;
            $count = 0;
            // Recorrido del Array de los Items de la Compra
            while ($filas= $objDatos->proximoArray($datos_encontrados))  
            { 
                // Setea el Array a Enviar al Controlador con la Espeificacion 
                // de cada Fila 
                
                for($j=0; $j < $filas[2]; $j ++)
                {
                    // Aumento de $i Si Las Cantidades son Mayores a un Item
                    if($filas[2] > 1)
                    {
                        if($i = $count)
                        {
                            $i++; 
                        }else{
                            $i = $i-1;  
                        }
                    }

                    // Creacion del Correlativo para el Id del Producto
                    // Aumento de $i Si Las Cantidades son Mayores a un Item
                    if($i >= 1 ){
                        $num_correlativo = $filas[5].$filas[6].$i;
                    }else{
                        $num_correlativo = $filas[5].$filas[6].$i+1;
                    }
                    
                    $objDatos_1    = new clsDatos();
                    $sql_1 = "insert into t00_items_productos
		     	     (id_producto, id_compra, f_creacion, programa, usuario, id_estado, num_correlativo) 
                              values ('$filas[1]', '$filas[0]', '$filas[4]', 't00_items_compras', '$filas[3]', 8, $num_correlativo)";
                    
                    $objDatos_1->ejecutar($sql_1);
                    $count++;
                }
                // Aumenta el Contador para el ID Unico a Generar
                $i++;
                //$count++;
                // Proceso de Actualizacion del Stok
                //actualizarStok($filas[2], $filas[1]);
                $objDatos_2 = new clsDatos();
		$sql_2 = "update t00_productos set cant_real = cant_real + $filas[2] where id_producto = $filas[1] ";
		
		$objDatos_2->ejecutar($sql_2);
                
            }
            $encontro  = true;
                       
	    $objDatos->cerrarfiltro($datos_encontrados);
            $objDatos->cerrarconecxion();
            $objDatos_1->cerrarconecxion();
            $objDatos_2->cerrarconecxion();
           
            return $encontro;
        }
        
        // Fin de Funcion de Insercion de Items en Almacen
        			
} // FIN DE CLASE ...
?>