<?php
 include("../../models/clsRegistroFacturas/clsBuscarProducto.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodProd 		= $_POST['gp_CodProd'];
 $ve_CantProd 		= $_POST['gp_CantProd'];
 $ve_IdSucursal         = $_SESSION["id_sucursal"];
 $ve_IdAlmacen          = $_SESSION["id_almacen"];
 $ve_operacion 		= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Producto
 $objectoBuscaProducto = new clsBuscaProducto($ve_CodProd, $ve_CantProd );

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscaProd")
    {
	 if($objectoBuscaProducto->buscar() == 1) // Si los Items estan en el Almacen y disponibles
	 {
		 $ve_CodProd_b 		= $objectoBuscaProducto->get_cod_producto();
		 $ve_DescProd_b		= $objectoBuscaProducto->get_desc_producto();
		 $ve_PrecioVenta_b	= $objectoBuscaProducto->get_precio_venta();
		 $ve_Impuesto_b		= $objectoBuscaProducto->get_impuesto();
                 $ve_Descuento_b	= $objectoBuscaProducto->get_descuento();
                 //$ve_Correlativo	= $objectoBuscaProducto->get_num_correlativo();
		 $ve_listo 		= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos de Producto Encontrados " , 
                                 "valor1" => $ve_CodProd_b,     "valor2" => $ve_DescProd_b, 
                                 "valor3" => $ve_PrecioVenta_b, "valor4" => $ve_Impuesto_b, 
                                 "valor5" => $ve_Descuento_b);
				 		 	   
	 }elseif($objectoBuscaProducto->buscar() === 3) // Evaluamos los casos Negativos (Si las Cantidades solicitadas exeden las Existentes)
	 {
            // Validacion Tipo de Error Cantidades Solicitadas Exceden las Existentes
			$ve_listo     = 0;
            $ve_fCreacion = date("Y-m-d");
            $ve_usuario   = $_SESSION["username"];
            $result       = array("find" => "mayor", "error" => "La Cantidad que se Solicita, Exede la existente  ", 
                                   "valor1" => $ve_fCreacion, "valor2" => $ve_usuario);
					 
	 }elseif($objectoBuscaProducto->buscar() === 2)
	 {
			// Validacion Tipo de Error Los Productos no se encuentran existentes en el Almacen
			$ve_listo     = 0;
            $ve_fCreacion = date("Y-m-d");
            $ve_usuario   = $_SESSION["username"];
            $result       = array("find" => "no", "error" => "Este Producto, no se encuentra disponible, o no hay Existencias Disponibles ", 
                                  "valor1" => $ve_fCreacion, "valor2" => $ve_usuario);
	 }
	 
	 
	 echo json_encode($result);
 }	
// FIN de Proceso de Buscar
 
 
// Proceso de Actualizacion de Producto Eliminado del Listado de la Venta ********************************
if($ve_operacion == "actProdEliminado"){ 
    if ($ve_CodProd == '' || $ve_CantProd == '') {
    exit ();
    $result = array("mod" => "no", "error" => "Falta Ingresar Los Datos para Continuar");
  }
  else {
    $Correlativo   = $_POST["gp_Correlativo"];  
    $objectoBuscaProducto->actProdEliminado();
    $ve_listo = 1;
    $ve_fCreacion = date("Y-m-d");
    $ve_usuario = $_SESSION['username'];
    $result = array("mod" => "si", "msg" => "Los datos han sido Modificados exitosamente");
  }
  echo json_encode($result);
}
// Fin de Proceso de Actualizacion del Priducto ********************************************************** 
 
?>