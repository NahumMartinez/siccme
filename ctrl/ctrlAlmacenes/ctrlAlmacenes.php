<?php
 include("../../models/clsAlmacenes/clsAlmacenes.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_codAlmacen 	= $_POST['gp_CodAlm'];
 $ve_descAlmacen 	= $_POST['gp_DescAlm'];
 $ve_fCreacion  	= $_POST['gp_FeCreacion'];
 $ve_programa   	= $_POST['gp_Programa'];
 $ve_usuario 		= $_POST['gp_Usuario'];
 $ve_IdSucursal		= $_POST['gp_IdSucursal'];
 $ve_IdEmple 		= $_POST['gp_IdEmpleado'];
 $ve_NumEstantes 	= $_POST['gp_NumEstantes'];
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Tipos de Productos
 $objectoAlmacen = new clsTipoProducto($ve_codAlmacen, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_descAlmacen, $ve_IdSucursal, $ve_IdEmple, $ve_NumEstantes);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoAlmacen->buscar())
	 {
		 $ve_codAlmacen 	= $objectoAlmacen->get_cod_almacen();
		 $ve_fCreacion  	= $objectoAlmacen->get_f_creacion();
		 $ve_programa 		= $objectoAlmacen->get_programa();
		 $ve_usuario 		= $objectoAlmacen->get_nombre_usuario();
		 $ve_descAlmacen 	= $objectoAlmacen->get_desc_almacen();
		 $ve_IdSucursal 	= $objectoAlmacen->get_id_sucursal();
		 $ve_IdEmple 		= $objectoAlmacen->get_id_emple();
		 $ve_NumEstantes 	= $objectoAlmacen->get_num_estantes();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor" => $ve_descAlmacen , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_IdSucursal, "valor4" => $ve_IdEmple, "valor5" => $ve_NumEstantes);
				 		 	   
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
		if($objectoAlmacen->buscar()){
		$ve_listo = 0;
		$ve_codAlmacen 	= $objectoAlmacen->get_cod_almacen();
			 //Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
		}else{
			if($ve_codAlmacen == '' || $ve_codAlmacen == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoAlmacen->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_codAlmacen == '')
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoAlmacen->modificar();
		$ve_listo = 1;
		$ve_fCreacion 	= date("Y-m-d");
		$ve_usuario		= $_SESSION['username'];
		$result = array("mod" => "si", "msg" => "Los datos han sido Modificados exitosamente" , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario);
		}
		echo json_encode($result); 
	}
// FIN de Proceso de Modificacion

// Proceso de Eliminacion *****************************************************
	if($ve_operacion == "eliminar")
	{
		if($ve_codAlmacen == '')
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoAlmacen->eliminar();
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