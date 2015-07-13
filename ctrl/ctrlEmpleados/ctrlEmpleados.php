<?php
 include("../../models/clsEmpleados/clsEmpleados.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodEmple 		= $_POST['gp_CodEmple'];
 $ve_fCreacion  	= $_POST['gp_FeCreacion'];
 $ve_programa   	= $_POST['gp_Programa'];
 $ve_usuario 		= $_POST['gp_Usuario'];
 $ve_NumIdentidad	= $_POST['gp_NumIdentidad'];
 $ve_NomName1 		= $_POST['gp_NomName1'];
 $ve_NomName2 		= $_POST['gp_NomName2'];
 $ve_Apelli1 		= $_POST['gp_Apelli1'];
 $ve_Apelli2 		= $_POST['gp_Apelli2'];
 $ve_Telefono 		= $_POST['gp_Telefono'];
 $ve_Celular 		= $_POST['gp_Celular'];
 $ve_Email	 		= $_POST['gp_Email'];
 $ve_RefDir 		= $_POST['gp_RefDir'];
 $ve_IdEstEmple		= $_POST['gp_IdEstEmple'];
 $ve_IdTipoEmple	= $_POST['gp_IdTipoEmple'];
 $ve_FeNacimiento	= $_POST['gp_FeNacimiento'];
 $ve_IdPersona 		= $_POST['gp_IdPersona'];
 $ve_CodPersona		= $_POST['gp_CodPers'];
 $ve_IdPuestoLab	= $_POST['gp_IdPuestoLab'];
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Empleados
 $objectoEmpleado = new clsEmpleados($ve_CodEmple, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_NumIdentidad, $ve_NomName1, $ve_NomName2,									  $ve_Apelli1, $ve_Apelli2, $ve_Telefono, $ve_Celular, $ve_Email, $ve_RefDir, $ve_IdTipoEmple, 									  $ve_IdEstEmple, $ve_FeNacimiento, $ve_IdPersona, $ve_CodPersona, $ve_IdPuestoLab);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoEmpleado->buscar())
	 {
		 $ve_CodEmple 		= $objectoEmpleado->get_cod_empleado();
		 $ve_fCreacion  	= $objectoEmpleado->get_f_creacion();
		 $ve_programa 		= $objectoEmpleado->get_programa();
		 $ve_usuario 		= $objectoEmpleado->get_nombre_usuario();
		 $ve_NumIdentidad  	= $objectoEmpleado->get_num_identidad();
		 $ve_NomName1 		= $objectoEmpleado->get_nom_1();
		 $ve_NomName2 		= $objectoEmpleado->get_nom_2();
		 $ve_Apelli1  		= $objectoEmpleado->get_ape_1();
		 $ve_Apelli2 		= $objectoEmpleado->get_ape_2();
		 $ve_Telefono 		= $objectoEmpleado->get_telefono();
		 $ve_Celular  		= $objectoEmpleado->get_celular();
		 $ve_Email	 		= $objectoEmpleado->get_email();
		 $ve_RefDir 		= $objectoEmpleado->get_ref_dir();
		 $ve_FeNacimiento	= $objectoEmpleado->get_f_nacimiento();
		 $ve_IdPersona 		= $objectoEmpleado->get_id_persona();
		 $ve_CodPersona		= $objectoEmpleado->get_cod_persona();
		 $ve_IdEstEmple		= $objectoEmpleado->get_id_est_empleado();
		 $ve_IdTipoEmple	= $objectoEmpleado->get_id_tipo_empleado();
		 $ve_IdPuestoLab	= $objectoEmpleado->get_id_puesto_lab();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_NumIdentidad, "valor4" => $ve_NomName1, "valor5" => $ve_NomName2, "valor6" => $ve_Apelli1, "valor7" => $ve_Apelli2, "valor8" => $ve_Telefono, "valor9" => $ve_Celular, "valor10" => $ve_Email, "valor11" => $ve_IdTipoEmple, "valor12" => $ve_IdEstEmple, "valor13" => $ve_CodPersona, "valor14" => $ve_RefDir, "valor15" => $ve_IdPersona, "valor16" => $ve_FeNacimiento, "valor17" => $ve_IdPuestoLab);
				 		 	   
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
		if($objectoEmpleado->buscar()){
		$ve_listo = 0;
		$ve_CodEmple 	= $objectoEmpleado->get_cod_empleado();
			 // Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_CodEmple == '' || $ve_CodEmple == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoEmpleado->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_CodEmple == '') 
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoEmpleado->modificar();
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
		if($ve_CodEmple == '') 
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoEmpleado->eliminar();
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