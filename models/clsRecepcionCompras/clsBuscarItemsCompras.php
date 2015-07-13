<?php

/* 
 * @autor      : Nahum Martinez.
 * @fecha      : 2014-12-26
 * @task       : Creacion del Script de Llamado de los Items de la Compra
 * @parametros : Cod_Compra / Documento_id            
 * @version    : 1.0
 * @ubicacion  : 504-POS/models/clsRecepcionCompras/ 
 */

require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsBuscaItemsCompras{
	 private $cod_compra;
         private $criterio;
         private $f_compra;
         private $monto_compra;
         private $imp_descuento;
         private $documento_id;
         private $f_entrega;
         private $cod_proveedor;
         private $nombre_proveedor;
         private $direccion;
         private $celular;
         private $e_mail;
         private $rubro;
         private $tipo_prov;
         private $rtn;
         private $usuario;
         private $impuesto;
         private $cantidad;
         private $gastos_compra;
         private $observaciones;
         private $hora_compra;
         private $precio_costo;
         	  	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_compra, $criterio){
		
		$this->cod_compra  = $cod_compra;
                $this->criterio    = $criterio;
						
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
        
        public function get_f_compra(){
		return $this->f_compra;
	}
			
	public function get_monto_compra(){
		return $this->monto_compra;
	}
	
	public function get_imp_descuento(){
		return $this->imp_descuento;
	}
			
	public function get_documento_id(){
		return $this->documento_id;
	}
			
	public function get_f_entrega(){
		return $this->f_entrega;
	}
	
	public function get_cod_proveedor(){
		return $this->cod_proveedor;
	}
	
        public function get_nombre_proveedor(){
		return $this->nombre_proveedor;
	}
        
        public function get_direccion(){
		return $this->direccion;
	}
        
        public function get_telefono(){
		return $this->telefono;
	}
        
        public function get_celular(){
		return $this->celular;
	}
        
        public function get_e_mail(){
		return $this->e_mail;
	}
        
        public function get_rubro(){
		return $this->rubro;
	}
        
        public function get_tipo_prov(){
		return $this->tipo_prov;
	} 
        
        public function get_rtn(){
		return $this->rtn;
	} 
        
        public function get_usuario(){
		return $this->usuario;
	} 
        
        public function get_impuesto(){
		return $this->impuesto;
	} 
        
        public function get_cantidad(){
		return $this->cantidad;
	} 
        
        public function get_gastos_compra(){
		return $this->gastos_compra;
	} 
        
        public function get_observaciones(){
		return $this->observaciones;
	} 
        
        public function get_hora_compra(){
		return $this->hora_compra;
	} 
        
        
        public function get_precio_costo(){
		return $this->precio_costo;
	}
	// FIN de Metodos Get ...
        
        
        // Funcion con el Codigo de la Compra como Parametro
        // Retorna el Array de los Items de la Compra
        public function devAjaxCod() {
            $m_ItemsCompras = array();
            $objDatos       = new clsDatos();
            // Ejecuta el Llamado al Aaray de los Items de la Compra Solicitada
            $sql  = "select ic.precio_costo , ic.cantidad, 
                            ROUND(((ic.precio_costo * ic.cantidad) + ((ic.precio_costo * ic.cantidad) * i.porcentaje_impuesto / 100 )),2) importe,
                            pr.cod_producto, pr.desc_producto,
                            ROUND(((ic.precio_costo * ic.cantidad) * i.porcentaje_impuesto / 100 ),2) impuesto
                     from t00_items_compras ic, t00_productos pr, t00_impuestos i
                     where ic.id_compra    = (select ce.id_compra from t00_compras_enc ce where ce.cod_compra = '$this->cod_compra' ) and
                           ic.id_producto  = pr.id_producto and 
                           i.id_isv        = pr.id_isv " ;
            
            $datos_encontrados = $objDatos->filtro($sql);
            $i= 0;
            
            // Recorrido del Array de los Items de la Compra
            while ($filas= $objDatos->proximoArray($datos_encontrados))  
            { 
                // Setea el Array a Enviar al Controlador con la Espeificacion 
                // de cada Fila 
                $m_ItemsCompras[$i]['precio']       = $filas[0];
                $m_ItemsCompras[$i]['cantidad']     = $filas[1];
                $m_ItemsCompras[$i]['importe']      = $filas[2];
                $m_ItemsCompras[$i]['cod_prod']     = $filas[3];
                $m_ItemsCompras[$i]['desc_prod']    = $filas[4];
                $m_ItemsCompras[$i]['impuesto']     = $filas[5];
                
                $i++;
                
            }
            //$encontro 		    = true;
                       
	    $objDatos->cerrarfiltro($datos_encontrados);
            $objDatos->cerrarconecxion();
           
            return $m_ItemsCompras;
        }
        
        // Funcion con el Documento ID de la Compra como Parametro
        // Retorna el Array de los Items de la Compra
        public function devAjaxDocId() {
            $m_ItemsCompras = array();
            $objDatos       = new clsDatos();
            // Ejecuta el Llamado al Aaray de los Items de la Compra Solicitada
            $sql  = "select ic.precio_costo , ic.cantidad, 
                            ROUND(((ic.precio_costo * ic.cantidad) + ((ic.precio_costo * ic.cantidad) * i.porcentaje_impuesto / 100 )),2) importe,
                            pr.cod_producto, pr.desc_producto,
                            ROUND(((ic.precio_costo * ic.cantidad) * i.porcentaje_impuesto / 100 ),2) impuesto
                     from t00_items_compras ic, t00_productos pr, t00_impuestos i
                     where ic.id_compra    = (select ce.id_compra from t00_compras_enc ce where ce.documento_id = '$this->cod_compra' ) and
                           ic.id_producto  = pr.id_producto and 
                           i.id_isv        = pr.id_isv " ;
            
            $datos_encontrados = $objDatos->filtro($sql);
            $i= 0;
            
            // Recorrido del Array de los Items de la Compra
            while ($filas= $objDatos->proximoArray($datos_encontrados))  
            { 
                // Setea el Array a Enviar al Controlador con la Espeificacion 
                // de cada Fila 
                $m_ItemsCompras[$i]['precio']       = $filas[0];
                $m_ItemsCompras[$i]['cantidad']     = $filas[1];
                $m_ItemsCompras[$i]['importe']      = $filas[2];
                $m_ItemsCompras[$i]['cod_prod']     = $filas[3];
                $m_ItemsCompras[$i]['desc_prod']    = $filas[4];
                $m_ItemsCompras[$i]['impuesto']     = $filas[5];
                
                $i++;
                
            }
            //$encontro 		    = true;
                       
	    $objDatos->cerrarfiltro($datos_encontrados);
            $objDatos->cerrarconecxion();
           
            return $m_ItemsCompras;
        }
	
			
} // FIN DE CLASE ...
?>