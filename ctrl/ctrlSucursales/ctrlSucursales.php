<?php
 include("../../models/clsSucursales/clsSucursales.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_codSucursal 	= $_POST['gp_CodSuc'];
 $ve_descSucursal 	= $_POST['gp_DescSucursal'];
 $ve_fCreacion  	= $_POST['gp_FeCreacion'];
 $ve_programa   	= $_POST['gp_Programa'];
 $ve_usuario 		= $_POST['gp_Usuario'];
 $ve_IdEmple 		= $_POST['gp_IdEmple'];
 $ve_IdLoc	 		= $_POST['gp_IdLoc'];
 $ve_Lat 			= $_POST['gp_Lat'];
 $ve_Long		 	= $_POST['gp_Long'];
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Tipos de Productos
 $objectoSucursal = new clsSucursal($ve_codSucursal, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_descSucursal, $ve_IdLoc, $ve_IdEmple, $ve_Lat, $ve_Long);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoSucursal->buscar())
	 {
		 $ve_codSucursal 	= $objectoSucursal->get_cod_sucursal();
		 $ve_fCreacion  	= $objectoSucursal->get_f_creacion();
		 $ve_programa 		= $objectoSucursal->get_programa();
		 $ve_usuario 		= $objectoSucursal->get_nombre_usuario();
		 $ve_descSucursal 	= $objectoSucursal->get_desc_sucursal();
		 $ve_IdLoc 			= $objectoSucursal->get_id_loc();
		 $ve_IdEmple 		= $objectoSucursal->get_id_emple();
		 $ve_Lat 			= $objectoSucursal->get_lat();
		 $ve_Long	 		= $objectoSucursal->get_long();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor" => $ve_descSucursal , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_IdLoc, "valor4" => $ve_IdEmple, "valor5" => $ve_Lat, "valor6" => $ve_Long);
				 		 	   
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
		if($objectoSucursal->buscar()){
		$ve_listo = 0;
		$ve_codSucursal 	= $objectoSucursal->get_cod_sucursal();
			 //Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_codSucursal == '' || $ve_codSucursal == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoSucursal->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_codSucursal == '')
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoSucursal->modificar();
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
		if($ve_codSucursal == '')
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoSucursal->eliminar();
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