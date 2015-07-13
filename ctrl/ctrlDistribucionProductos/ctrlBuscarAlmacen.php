<?php
 include("../../models/clsDistribucionProductos/clsBuscarAlmacen.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodAlmacen 	= $_POST['gp_CodAlmacen'];
 $ve_operacion 		= $_POST['gp_Op'];
 
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Producto
 $objectoBuscaAlmacen = new clsBuscaAlmacen($ve_CodAlmacen);

 // Proceso de Buscar ********************************************************
 
    if($ve_operacion == "buscaAlmacen")
    {
           // Buscar el Almacen por el Codigo 
            
           if($objectoBuscaAlmacen->buscar())
           {      
		 $ve_CodAlmacen 	= $objectoBuscaAlmacen->get_cod_almacen();
		 $ve_NombreAlmacen	= $objectoBuscaAlmacen->get_nombre_almacen();
		 $ve_Sucursal   	= $objectoBuscaAlmacen->get_sucursal();
		 $ve_NumEstantes        = $objectoBuscaAlmacen->get_num_estantes();
                 $ve_Empleado       	= $objectoBuscaAlmacen->get_empleado_encargado();
		 $ve_IdAlmacen       	= $objectoBuscaAlmacen->get_id_almacen();
                 $ve_CantReal       	= $objectoBuscaAlmacen->get_cant_real();
                 $ve_CantMax       	= $objectoBuscaAlmacen->get_cant_max();
                 $ve_CantMin       	= $objectoBuscaAlmacen->get_cant_min();
                 $ve_CantReord       	= $objectoBuscaAlmacen->get_cant_reord();
                 $ve_F_UltCompra       	= $objectoBuscaAlmacen->get_f_ult_compra();
		 $ve_listo 		= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos del Almacen Encontrados " , "valor1" => $ve_CodAlmacen, 
                                 "valor2" => $ve_NombreAlmacen, "valor3" => $ve_Sucursal,     "valor4" => $ve_NumEstantes,
                                 "valor5" => $ve_Empleado,      "valor6" => $ve_IdAlmacen, 
                                 "valor7" => $ve_CantReal,      "valor8" => $ve_CantMax,      "valor9" => $ve_CantMin,
                                 "valor10" => $ve_CantReord,    "valor11" => $ve_F_UltCompra);
			 	   
	    }else
	    {
		$result = array("find" => "no", "error" => "Datos de Almacen; no se han encontrados");
				 
            }
            echo json_encode($result);     
        } 
   	
// FIN de Proceso de Buscar Almacen ...
        
// Funcion de Carga de Datos para el Estante Segun el Almacen
  if($ve_operacion == "obtenDatosEstante"){
      $ve_IdEstante 	= $_POST['gp_IdEstante'];
      if($objectoBuscaAlmacen->matrizEstantes($ve_IdEstante))
      {
          $ve_NoFilas 	  = $objectoBuscaAlmacen->get_no_filas();
	  $ve_NoColumnas  = $objectoBuscaAlmacen->get_no_columnas();
          $ve_listo 	  = 1;
          
          $result   = array("find" => "ok" , "msg" => "Datos de Estantes Encontrados " , "valor1" => $ve_NoFilas, 
                            "valor2" => $ve_NoColumnas);
          
      }else
      {
         $result = array("find" => "no", "error" => "Datos de Estantes ; no se han encontrados");
				 
      }
        
        echo json_encode($result); 
  }   
  
// Fin. de Carga de Datos de Estante
  
// Funcion de Carga de Datos para el Inventario del Producto
  if($ve_operacion == "obtenInventario"){
      $ve_CodProducto 	= $_POST['gp_CodProd'];
      if($objectoBuscaAlmacen->obtenInventario($ve_CodProducto))
      {
          $ve_CantInvReal   = $objectoBuscaAlmacen->get_cant_inv_real();
	  $ve_CantInvMax    = $objectoBuscaAlmacen->get_cant_inv_max();
          $ve_CantInvReord  = $objectoBuscaAlmacen->get_cant_inv_reord();
          $ve_listo 	    = 1;
          
          $result   = array("busca" => "ok" , "msg" => "Datos de Inventario " , "valor_inv1" => $ve_CantInvReal, 
                            "valor_inv2" => $ve_CantInvMax, "valor_inv3" => $ve_CantInvReord);
          
      }else
      {
         $result = array("find" => "no", "error" => "Datos de Inventario ; no se han encontrados");
				 
      }
        
        echo json_encode($result); 
  }   
  
// Fin. de Carga de Datos de Inventario del Producto 
 
?>