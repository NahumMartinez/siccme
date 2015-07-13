<?php
 include("../../models/clsDistribucionProductos/clsBuscarProductos.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodProducto	= $_POST['gp_CodProd'];
 $ve_operacion 		= $_POST['gp_Op'];
  
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Producto
 $objectoBuscaProductos = new clsBuscaProductos($ve_CodProducto);

 // Proceso de Buscar ********************************************************
 
    if($ve_operacion == "buscaProds")
    {           
           // Busca por el Codigo 
           if($objectoBuscaProductos->buscarCodigo())
           {      
		 $ve_CodProducto 	= $objectoBuscaProductos->get_cod_producto();
		 $ve_DescProd		= $objectoBuscaProductos->get_desc_producto();
		 $ve_descTipoProd   	= $objectoBuscaProductos->get_desc_tipo_producto();
		 $ve_PrecioCosto        = $objectoBuscaProductos->get_precio_costo();
                 $ve_PrecioVenta 	= $objectoBuscaProductos->get_precio_venta();
		 		 
		 $ve_listo 		= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos de los Productos Encontrados " , "valor1" => $ve_CodProducto, 
                                 "valor2" => $ve_DescProd, "valor3" => $ve_descTipoProd,  "valor4" => $ve_PrecioCosto,
                                 "valor5" => $ve_PrecioVenta);
		
	    }else
	    {
                $var = $objectoBuscaProductos->buscarCodigo();
                
		$result = array("find" => "no", "error" => "Los Datos del Producto no se han encontrados. ");
            }
            echo json_encode($result);     
      
    }	
// FIN de Proceso de Buscar Productos ...
   
?>