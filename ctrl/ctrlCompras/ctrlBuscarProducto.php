<?php
 include("../../models/clsCompras/clsBuscarProducto.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodProd 		= $_POST['gp_CodProd'];
 $ve_CantProd 		= $_POST['gp_CantProd'];
 $ve_operacion 		= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Producto
 $objectoBuscaProducto = new clsBuscaProducto($ve_CodProd, $ve_CantProd );

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscaProd")
    {
	 if($objectoBuscaProducto->buscar())
	 {
		 $ve_CodProd_b 		= $objectoBuscaProducto->get_cod_producto();
		 $ve_DescProd_b		= $objectoBuscaProducto->get_desc_producto();
		 $ve_PrecioVenta_b	= $objectoBuscaProducto->get_precio_venta();
		 $ve_Impuesto_b		= $objectoBuscaProducto->get_impuesto();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos de Productos Encontrados " , "valor1" => $ve_CodProd_b, "valor2" => $ve_DescProd_b, "valor3" => $ve_PrecioVenta_b, "valor4" => $ve_Impuesto_b);
				 		 	   
	 }else
	 {
		$ve_listo 		= 0;
		$ve_fCreacion 	= date("Y-m-d");
		$ve_usuario		= $_SESSION["username"];
		$result = array("find" => "no", "error" => "Datos de Producto, no encontrados", "valor1" => $ve_fCreacion, "valor2" => $ve_usuario);
				 
	 }
	 echo json_encode($result);
 }	
// FIN de Proceso de Buscar
 
?>