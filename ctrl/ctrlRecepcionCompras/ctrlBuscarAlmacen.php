<?php
 include("../../models/clsRecepcionCompras/clsBuscarAlmacen.php");
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
		 $ve_listo 		= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos del Almacen Encontrados " , "valor1" => $ve_CodAlmacen, 
                                 "valor2" => $ve_NombreAlmacen, "valor3" => $ve_Sucursal,     "valor4" => $ve_NumEstantes,
                                 "valor5" => $ve_Empleado,      "valor6" => $ve_IdAlmacen);
			 	   
	    }else
	    {
		$result = array("find" => "no", "error" => "Datos de Almacen; no encontrados");
				 
            }
            echo json_encode($result);     
        } 
   	
// FIN de Proceso de Buscar Almacen ...

 
?>