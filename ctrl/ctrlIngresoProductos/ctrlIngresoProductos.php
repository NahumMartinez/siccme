<?php
 include("../../models/clsIngresoProductos/clsIngresoProductos.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodProducto 	= $_POST['gp_CodProd'];     
 $ve_fCreacion  	= $_POST['gp_FeCreacion'];      
 $ve_programa   	= $_POST['gp_Programa'];        
 $ve_usuario 		= $_POST['gp_Usuario'];         
 $ve_DescProd		= $_POST['gp_DescProd'];    
 $ve_Altura 		= $_POST['gp_Altura'];        
 $ve_Anchura 		= $_POST['gp_Anchura'];        
 $ve_Peso 		= $_POST['gp_Peso'];         
 $ve_IdMedida 		= $_POST['gp_IdMedida'];         
 $ve_fElaboracion 	= $_POST['gp_FeElaboracion'];        
 $ve_fVencimiento 	= $_POST['gp_FeVencimiento'];     	
 $ve_IdTipoProd	 	= $_POST['gp_IdTipoProd'];       
 $ve_IdColor 		= $_POST['gp_IdColor'];          
 $ve_PrecioCosto	= $_POST['gp_PrecioCosto'];   
 $ve_PrecioVenta_1	= $_POST['gp_PrecioVenta_1'];  	
 $ve_PrecioVenta_2	= $_POST['gp_PrecioVenta_2'];    
 $ve_PrecioVenta_3 	= $_POST['gp_PrecioVenta_3'];   	
 $ve_IdDescuento	= $_POST['gp_IdDescuento'];     
 $ve_IdImpto		= $_POST['gp_IdImpto'];         
 $ve_CantIni		= $_POST['gp_CantIni'];
 $ve_CantMax		= $_POST['gp_CantMax'];
 $ve_CantReal		= $_POST['gp_CantReal'];
 $ve_CantReOrden	= $_POST['gp_CantReOrden'];
 $ve_IndFact		= $_POST['gp_IndFact'];
 $ve_IdProveedor	= $_POST['gp_IdProveedor'];
 $ve_Observaciones	= $_POST['gp_Observaciones'];
 $ve_operacion  	= $_POST['gp_Op'];              
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Empleados
 $objectoProducto = new clsProducto($ve_CodProducto, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_DescProd, $ve_Altura, $ve_Anchura,									   $ve_Peso, $ve_IdMedida, $ve_fElaboracion, $ve_fVencimiento, $ve_IdTipoProd, $ve_IdColor,			                           $ve_PrecioCosto, $ve_PrecioVenta_1, $ve_PrecioVenta_2, $ve_PrecioVenta_3, $ve_IdDescuento, $ve_IdImpto                                   , $ve_CantIni, $ve_CantMax, $ve_CantReal, $ve_CantReOrden, $ve_IndFact, $ve_IdProveedor,                                    $ve_Observaciones);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoProducto->buscar())
	 {
		 $ve_CodProducto 		= $objectoProducto->get_cod_producto();
		 $ve_fCreacion  		= $objectoProducto->get_f_creacion();
		 $ve_programa 			= $objectoProducto->get_programa();
		 $ve_usuario 			= $objectoProducto->get_nombre_usuario();
		 $ve_DescProd  			= $objectoProducto->get_desc_producto();
		 $ve_Altura 			= $objectoProducto->get_altura();
		 $ve_Anchura 			= $objectoProducto->get_anchura();
		 $ve_Peso  				= $objectoProducto->get_peso();
		 $ve_IdMedida 			= $objectoProducto->get_id_medida();
		 $ve_fElaboracion 		= $objectoProducto->get_f_elaboracion();
		 $ve_fVencimiento  		= $objectoProducto->get_f_vencimiento();
		 $ve_IdTipoProd	 		= $objectoProducto->get_id_tipo_prod();
		 $ve_IdColor 			= $objectoProducto->get_id_color();
		 $ve_PrecioCosto		= $objectoProducto->get_precio_costo();
		 $ve_PrecioVenta_1		= $objectoProducto->get_precio_venta_1();
		 $ve_PrecioVenta_2		= $objectoProducto->get_precio_venta_2();
		 $ve_PrecioVenta_3 		= $objectoProducto->get_precio_venta_3();
		 $ve_IdDescuento		= $objectoProducto->get_id_descuento();
		 $ve_IdImpto			= $objectoProducto->get_id_impto();
		 $ve_CantIni			= $objectoProducto->get_cant_ini();
		 $ve_CantMax			= $objectoProducto->get_cant_max();
		 $ve_CantReal			= $objectoProducto->get_cant_real();
		 $ve_CantReOrden		= $objectoProducto->get_cant_re_orden();
		 $ve_IndFact			= $objectoProducto->get_ind_fact();
		 $ve_IdProveedor		= $objectoProducto->get_id_proveedor();
		 $ve_Observaciones		= $objectoProducto->get_observaciones();
		 
		 $ve_listo 				= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_DescProd, "valor4" => $ve_Altura, "valor5" => $ve_Anchura, "valor6" => $ve_Peso, "valor7" => $ve_IdMedida, "valor8" => $ve_fElaboracion, "valor9" => $ve_fVencimiento, "valor10" => $ve_IdTipoProd, "valor11" => $ve_IdColor, "valor12" => $ve_PrecioCosto, "valor13" => $ve_PrecioVenta_1, "valor14" => $ve_PrecioVenta_2, "valor15" => $ve_PrecioVenta_3, "valor16" => $ve_IdDescuento, "valor17" => $ve_IdImpto, "valor18" => $ve_CantIni, "valor19" => $ve_CantMax, "valor20" => $ve_CantReal, "valor21" => $ve_CantReOrden, "valor22" => $ve_IndFact, "valor23" => $ve_IdProveedor, "valor24" => $ve_Observaciones);
				 		 	   
	 }else
	 {
		$ve_listo 		= 0;
		$ve_fCreacion 	= date("Y-m-d");
		$ve_usuario		= $_SESSION["username"];
		$result = array("find" => "no", "error" => "Datos no encontrados", "valor1" => $ve_fCreacion, "valor2" => $ve_usuario);
					 
	 }
	 echo json_encode($result);
 }	
// FIN de Proceso de Buscar
 
// Proceso de Insercion ******************************************************
	if($ve_operacion=="incluir")
	{
		if($objectoProducto->buscar()){
		$ve_listo = 0;
		$ve_CodProducto 	= $objectoProducto->get_cod_producto();
			 // Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_CodProducto == '' || $ve_CodProducto == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoProducto->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_CodProducto == '') 
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoProducto->modificar();
		$ve_listo = 1;
		$ve_fCreacion 	= date("Y-m-d");
		$ve_usuario		= $_SESSION['username'];
		$result 		= array("mod" => "si", "msg" => "Los datos han sido Modificados exitosamente" , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario);
		}
		echo json_encode($result); 
	}
// FIN de Proceso de Modificacion

// Proceso de Eliminacion *****************************************************
	if($ve_operacion == "eliminar")
	{
		if($ve_CodProducto == '') 
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoProducto->eliminar();
			$ve_listo = 1;
			$ve_fCreacion 	= date("Y-m-d");
			$ve_usuario		= $_SESSION["username"];
			$result = array("del" => "si", "msg" => "Los datos han sido Eliminados exitosamente" , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario );
		}
		echo json_encode($result); 
	}
// FIN de Proceso de Eliminacion

// Proceso de Cancelacion *****************************************************
	if($ve_operacion == "cancelar")
	{
		
			$ve_listo = 1;
			$ve_fCreacion 	= date("Y-m-d");
			$ve_usuario		= $_SESSION["username"];
			$result = array("cancel" => "si", "msg" => "Cancelacion de Formulario" , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario );
		
		echo json_encode($result); 
	}
// FIN de Proceso de Cancelacion
?>