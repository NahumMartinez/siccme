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
  class clsBuscaCompras{
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
        
	// FIN de Metodos Get ...
	
	// Busqueda de un Producto si Existente en la Ventana de Recepcion de Compras *************************************
        // Metodo de Busqueda por le Codigo de la Compra
	public function buscarCodigo(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select c.cod_compra, c.f_creacion, c.monto_compra,
                               c.imp_descuento, c.documento_id, c.f_entrega,
                               p.cod_proveedor, p.nombre_proveedor, c.hora_compra,
                               pe.direccion, pe.telefono, pe.celular, pe.e_mail,
                               r.desc_rubro, t.desc_tipo, pe.rtn,
                               c.usuario,
                               (select sum(cantidad) as cantidad 
                                from t00_items_compras itc 
                                where itc.id_compra  = c.id_compra) cantidad, 
                               c.gastos_compra, c.observaciones       
                        from t00_compras_enc c, t00_proveedores p, t00_personas pe,
                             t00_rubros r, t00_tipos t 
                        where c.id_proveedor        = p.id_proveedor and
                              p.id_persona         = pe.id_persona   and
                              p.id_rubro           = r.id_rubro      and
                              p.id_tipo_proveedor  = t.id_tipo       and
                              c.cod_compra         = '$this->cod_compra' and
                              c.ind_recibido       = 0";
                              
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_compra 	    = $columna['cod_compra'];
				$this->f_compra             = $columna['f_creacion'];
				$this->monto_compra	    = $columna['monto_compra'];
				$this->imp_descuento	    = $columna['imp_descuento'];
                                $this->documento_id	    = $columna['documento_id'];
				$this->f_entrega	    = $columna['f_entrega'];
                                $this->hora_compra	    = $columna['hora_compra'];
				$this->cod_proveedor	    = $columna['cod_proveedor'];
                                $this->nombre_proveedor	    = $columna['nombre_proveedor'];
                                $this->direccion	    = $columna['direccion'];
				$this->telefono		    = $columna['telefono'];
				$this->celular		    = $columna['celular'];
                                $this->e_mail		    = $columna['e_mail'];
                                $this->rubro		    = $columna['desc_rubro'];
                                $this->tipo_prov	    = $columna['desc_tipo'];
                                $this->rtn                  = $columna['rtn'];
                                $this->usuario              = $columna['usuario'];
                                //$this->impuesto             = $columna['impuesto'];
                                $this->cantidad             = $columna['cantidad'];
                                $this->gastos_compra        = $columna['gastos_compra'];
                                $this->observaciones        = $columna['observaciones'];
				$encontro 		    = true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Productos desde Compras ...
        
        // Metodo de Busqueda por el Documento de la Compra
	public function buscarDocumento(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select c.cod_compra, c.f_creacion, c.monto_compra,
                               c.imp_descuento, c.documento_id, c.f_entrega,
                               p.cod_proveedor, p.nombre_proveedor, c.hora_compra,
                               pe.direccion, pe.telefono, pe.celular, pe.e_mail,
                               r.desc_rubro, t.desc_tipo, pe.rtn,
                               c.usuario,
                               (select ROUND(SUM(((imp.porcentaje_impuesto * itc.precio_costo) / 100)) , 2) as impuesto 
                                from t00_items_compras itc, t00_impuestos imp 
                                where itc.id_compra  = c.id_compra and  
                                      itc.id_impuesto = imp.id_isv ) impuesto,
                               (select sum(cantidad) as cantidad 
                                from t00_items_compras itc 
                                where itc.id_compra  = c.id_compra) cantidad, 
                               c.gastos_compra, c.observaciones       
                        from t00_compras_enc c, t00_proveedores p, t00_personas pe,
                             t00_rubros r, t00_tipos t 
                        where c.id_proveedor        = p.id_proveedor and
                               p.id_persona         = pe.id_persona  and
                               p.id_rubro           = r.id_rubro     and
                               p.id_tipo_proveedor  = t.id_tipo      and
                               c.documento_id       = '$this->cod_compra' and
                               c.ind_recibido       = 0";
				
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_compra 	    = $columna['cod_compra'];
				$this->f_compra             = $columna['f_creacion'];
				$this->monto_compra	    = $columna['monto_compra'];
				$this->imp_descuento	    = $columna['imp_descuento'];
                                $this->documento_id	    = $columna['documento_id'];
				$this->f_entrega	    = $columna['f_entrega'];
                                $this->hora_compra	    = $columna['hora_compra'];
				$this->cod_proveedor	    = $columna['cod_proveedor'];
                                $this->nombre_proveedor	    = $columna['nombre_proveedor'];
                                $this->direccion	    = $columna['direccion'];
				$this->telefono		    = $columna['telefono'];
				$this->celular		    = $columna['celular'];
                                $this->e_mail		    = $columna['e_mail'];
                                $this->rubro		    = $columna['desc_rubro'];
                                $this->tipo_prov	    = $columna['desc_tipo'];
                                $this->rtn                  = $columna['rtn'];
                                $this->usuario              = $columna['usuario'];
                                $this->impuesto             = $columna['impuesto'];
                                $this->cantidad             = $columna['cantidad'];
                                $this->gastos_compra        = $columna['gastos_compra'];
                                $this->observaciones        = $columna['observaciones'];
				$encontro 		    = true;
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
        
        
        public function devAjax() {
            $m_ItemsCompras = array();
            $objDatos       = new clsDatos();
            // Ejecuta el Llamado al Aaray de los Items de la Compra Solicitada
            $sql  = "select ic.precio_costo , ic.cantidad, (ic.precio_costo * ic.cantidad) importe,
                            pr.cod_producto, pr.desc_producto,
                            ((ic.precio_costo * ic.cantidad) * i.porcentaje_impuesto / 100 ) impuesto
                     from t00_items_compras ic, t00_productos pr, t00_impuestos i
                     where ic.id_compra    = (select ce.id_compra from t00_compras_enc ce where ce.cod_compra = '$this->cod_compra' ) and
                           ic.id_producto  = pr.id_producto and 
                           i.id_isv        = pr.id_isv" ;
            
            $datos_encontrados = $objDatos->filtro($sql);
            if($columna = $objDatos->proximo($datos_encontrados))
		{
                    //$this->cod_compra 	    = $columna['precio_costo'];
                    //$this->f_compra             = $columna['f_creacion'];
                    //$this->monto_compra	    = $columna['monto_compra'];
                    //$this->imp_descuento	    = $columna['imp_descuento'];
                    //$this->documento_id	    = $columna['documento_id'];
                    //$this->f_entrega	    = $columna['f_entrega'];
                                
                    $encontro 		    = true;
		}
			
	    $objDatos->cerrarfiltro($datos_encontrados);
            $objDatos->cerrarconecxion();
			
            return $encontro;
        }
	
			
} // FIN DE CLASE ...
?>