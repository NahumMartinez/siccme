<?php
 include("../../models/clsLocalidades/clsLocalidades.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_codLocalidad 	= $_POST['gp_CodLoc'];
 $ve_descLocalidad 	= $_POST['gp_DescLoc'];
 $ve_fCreacion  	= $_POST['gp_FeCreacion'];
 $ve_programa   	= $_POST['gp_Programa'];
 $ve_usuario 		= $_POST['gp_Usuario'];
 $ve_IdAldea 		= $_POST['gp_IdAldea'];
 $ve_IdLoc 			= $_POST['gp_IdLoc'];
 $ve_IdArea 		= $_POST['gp_IdArea'];
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Tipos de Productos
 $objectoLocalidades = new clsTipoProducto($ve_codLocalidad, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_descLocalidad, $ve_IdAldea, $ve_IdLoc, $ve_IdArea);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoLocalidades->buscar())
	 {
		 $ve_codLocalidad 	= $objectoLocalidades->get_cod_localidad();
		 $ve_fCreacion  	= $objectoLocalidades->get_f_creacion();
		 $ve_programa 		= $objectoLocalidades->get_programa();
		 $ve_usuario 		= $objectoLocalidades->get_nombre_usuario();
		 $ve_descLocalidad 	= $objectoLocalidades->get_desc_localidad();
		 $ve_IdAldea 		= $objectoLocalidades->get_id_aldea();
		 $ve_IdLoc 			= $objectoLocalidades->get_id_loc();
		 $ve_IdArea 		= $objectoLocalidades->get_id_area();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor" => $ve_descLocalidad , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_IdAldea, "valor4" => $ve_IdLoc, "valor5" => $ve_IdArea);
				 		 	   
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
		if($objectoLocalidades->buscar()){
		$ve_listo = 0;
		$ve_codLocalidad 	= $objectoLocalidades->get_cod_localidad();
			 // Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_codLocalidad == '' || $ve_codLocalidad == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoLocalidades->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_codLocalidad == '')
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoLocalidades->modificar();
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
		if($ve_codLocalidad == '')
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoLocalidades->eliminar();
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