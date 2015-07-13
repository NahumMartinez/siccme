<?php
/**
  * @package: Clase Compras
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-14
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsComprasEnc{
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
	 
	 
	// Constructor de la Clase
	// INI.
	public function __construct($cod_compra, $f_creacion, $programa, $nombre_usuario, $id_moneda, $id_forma_pago, $doc_id, $id_proveedor,
				    $imp_descuento, $imp_total, $gtos_compras, $observaciones, $f_entrega){
		
		$this->cod_compra 	= $cod_compra;
		$this->f_creacion 	= $f_creacion;
		$this->programa 	= $programa;
		$this->nombre_usuario   = $nombre_usuario;
		$this->id_moneda	= $id_moneda;
		$this->id_forma_pago	= $id_forma_pago;
		$this->doc_id	 	= $doc_id;
		$this->id_proveedor	= $id_proveedor;
		$this->imp_descuento	= $imp_descuento;
		$this->imp_total	= $imp_total;
		$this->gtos_compras	= $gtos_compras;
		$this->observaciones	= $observaciones;
		$this->f_entrega	= $f_entrega;
		
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
	
	// FIN de Metodos Get ...
	
	// ************************     Actualizacion del Secuencial de la Compras_Enc **************************** 
	public function secuencial()
	{
		$objDatos = new clsDatos();
		$sql = "select secuencial from t00_secuenciales where tabla = 't00_compras_enc' ";
	
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->secuencial      	  = $columna['secuencial'];
				$encontro 		  = $columna['secuencial'];
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	
	}
	// Fin de Actualizacion de Secuencial de Compras_Enc ...

	// ************************     Insercion de los Items en la Base de Datos     ******************************
	/*
		Parametros : Id_Compra
					 Id_Producto
	*/
	//public function insertaItems($p_cod_compra, $p_cod_producto, $p_cant, $p_precio, $p_id_impuesto){
    public function insertaItems($compra, $prod, $cant, $precio){
	$objDatos = new clsDatos();
	$sql 	  = "insert into t00_items_compras (
                             id_compra ,id_producto
                             ,f_creacion ,programa
                             ,usuario ,precio_costo
                             ,cantidad ,id_impuesto
					        ) values (
                            (select id_compra from t00_compras_enc where cod_compra = '".$compra."')
                            ,(select id_producto from t00_productos where cod_producto = '".$prod."')
			    ,'$this->f_creacion' ,'$this->programa'
                            ,'$this->nombre_usuario ' ,'".$precio."'
                            ,'".$cant."'
                            ,(select id_isv from t00_productos where cod_producto = '".$prod."'))";
	$objDatos->ejecutar($sql);
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
				$this->cod_compra 	= $columna['cod_compra'];
				$this->f_creacion 	= $columna['f_creacion'];
				$this->id_proveedor     = $columna['id_proveedor'];
				$encontro 				  		 = true;
			}

			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();

			return $encontro;
	}
	// FIN de Busqueda de Compras Encabezado ...

	// *************************    Insercion de una Compra ala BD     ******************************************
	public function incluir(){
		$objDatos = new clsDatos();
		// Ejecuta Insert en t00_compras_enc

		$sql = "insert into t00_compras_enc(cod_compra, f_creacion, programa, usuario, id_proveedor, f_compra, monto_compra,
						    imp_descuento, id_forma_pago, documento_id, id_moneda, observaciones, gastos_compra,
                                                    ind_recibido, f_entrega, hora_compra)
					   values ('$this->cod_compra', '$this->f_creacion', '$this->programa', '$this->nombre_usuario', '$this->id_proveedor',
						   '$this->f_creacion', '$this->imp_total', '$this->imp_descuento', '$this->id_forma_pago', '$this->doc_id',
						   '$this->id_moneda', '$this->observaciones', '$this->gtos_compras', 0 ,'$this->f_entrega', CURTIME())";

		$objDatos->ejecutar($sql);

        // Insercion de los Items de la Compra con los Parametros a Meter en el Ctrl

		// Actualizacion de Secuencial de Compras_Enc

		$sql_2 = "update t00_secuenciales set secuencial = (secuencial + '1')  where tabla = 't00_compras_enc' ";

		$objDatos->ejecutar($sql_2);
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Encabezado de Compras ...

	// *************************    Modificacion de Compras  *******************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		$concat = "$this->id_forma_pago.$this->id_proveedor";
		$sql = "update t00_proveedores
				set f_creacion = '$this->f_creacion', programa = '$this->programa', usuario = '$this->nombre_usuario',
								 id_persona = '$this->id_persona', id_tipo_proveedor = '$this->id_tipo_proveedor', id_estado_proveedor = '$this->id_est_proveedor', id_rubro = '$this->id_rubro', nombre_proveedor = '$concat'
				where cod_compra = '$this->cod_compra' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Encabezado de Compras ...
	
	// *************************    Eliminacion de Compras Encabezado  ********************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00_compras_enc where cod_compra = '$this->cod_compra' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Encabezado de Compras ...
	
} // FIN DE CLASE ...
?>