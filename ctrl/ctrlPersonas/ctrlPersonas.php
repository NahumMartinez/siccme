<?php
 include("../../models/clsPersonas/clsPersonas.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodPers 		= $_POST['gp_CodCli'];
 $ve_fCreacion  	= $_POST['gp_FeCreacion'];
 $ve_programa   	= $_POST['gp_Programa'];
 $ve_usuario 		= $_POST['gp_Usuario'];
 $ve_IdSexo 		= $_POST['gp_IdSexo'];
 $ve_IdEstCivil		= $_POST['gp_IdEstCivil'];
 $ve_IdEstPer 		= $_POST['gp_IdEstPer'];
 $ve_IdMunic 		= $_POST['gp_IdMunic'];
 $ve_NumIdentidad 	= $_POST['gp_NumIdentidad'];
 $ve_NumRTN		 	= $_POST['gp_NumRTN'];
 $ve_NumPas			= $_POST['gp_NumPas'];
 $ve_NomName1		= $_POST['gp_NomName1'];
 $ve_NomName2 		= $_POST['gp_NomName2'];
 $ve_Apelli1	 	= $_POST['gp_Apelli1'];
 $ve_Apelli2		= $_POST['gp_Apelli2'];
 $ve_Telefono		= $_POST['gp_Telefono'];
 $ve_Celular 		= $_POST['gp_Celular'];
 $ve_Email		 	= $_POST['gp_Email'];
 $ve_Skype			= $_POST['gp_Skype'];
 $ve_FaceBook		= $_POST['gp_FaceBook'];
 $ve_Twitter 		= $_POST['gp_Twitter'];
 $ve_RefDir 		= $_POST['gp_RefDir'];
 $ve_IdCondFiscal	= $_POST['gp_IdCondFiscal'];
 $ve_fNacimiento	= $_POST['gp_FeNacimiento'];
 $ve_fNacimiento_2	= $ve_fNacimiento = date("Y-m-d",strtotime($ve_fNacimiento));
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Personas
 $objectoPersona = new clsClientes($ve_CodPers, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_IdSexo, $ve_IdEstCivil, $ve_IdEstPer, $ve_IdMunic, $ve_NumIdentidad, $ve_NumRTN, $ve_NumPas, $ve_NomName1, $ve_NomName2, $ve_Apelli1, $ve_Apelli2, $ve_Telefono, $ve_Celular, $ve_Email, $ve_Skype, $ve_FaceBook, $ve_Twitter, $ve_RefDir, $ve_IdCondFiscal, $ve_fNacimiento_2);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoPersona->buscar())
	 {
		 $ve_CodPers 		= $objectoPersona->get_cod_persona();
		 $ve_fCreacion  	= $objectoPersona->get_f_creacion();
		 $ve_programa 		= $objectoPersona->get_programa();
		 $ve_usuario 		= $objectoPersona->get_nombre_usuario();
		 $ve_IdSexo 		= $objectoPersona->get_id_sexo();
		 $ve_IdEstCivil 	= $objectoPersona->get_est_civil();
		 $ve_IdEstPer 		= $objectoPersona->get_est_pers();
		 $ve_IdMunic 		= $objectoPersona->get_id_munic();
		 $ve_NumIdentidad	= $objectoPersona->get_num_identidad();
		 $ve_NumRTN 		= $objectoPersona->get_num_rtn();
		 $ve_NumPas 		= $objectoPersona->get_num_pas();
		 $ve_NomName1 		= $objectoPersona->get_nom_1();
		 $ve_NomName2 		= $objectoPersona->get_nom_2();
		 $ve_Apelli1 		= $objectoPersona->get_ape_1();
		 $ve_Apelli2 		= $objectoPersona->get_ape_2();
		 $ve_Telefono 		= $objectoPersona->get_telefono();
		 $ve_Celular 		= $objectoPersona->get_celular();
		 $ve_Email 			= $objectoPersona->get_email();
		 $ve_Skype 			= $objectoPersona->get_skype();
		 $ve_FaceBook 		= $objectoPersona->get_facebook();
		 $ve_Twitter 		= $objectoPersona->get_twitter();
		 $ve_RefDir 		= $objectoPersona->get_ref_dir();
		 $ve_IdCondFiscal	= $objectoPersona->get_id_cond_fiscal();
		 $ve_fNacimiento_2	= $objectoPersona->get_f_nacimiento();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_IdSexo, "valor4" => $ve_IdEstCivil, "valor5" => $ve_IdEstPer, "valor6" => $ve_IdMunic, "valor7" => $ve_NumIdentidad, "valor8" => $ve_NumRTN, "valor9" => $ve_NumPas, "valor10" => $ve_NomName1, "valor11" => $ve_NomName2, "valor12" => $ve_Apelli1, "valor13" => $ve_Apelli2, "valor14" => $ve_Telefono, "valor15" => $ve_Celular, "valor16" => $ve_Email, "valor17" => $ve_Skype, "valor18" => $ve_FaceBook, "valor19" => $ve_Twitter, "valor20" => $ve_RefDir, "valor21" => $ve_IdCondFiscal, "valor22" => $ve_fNacimiento_2);
				 		 	   
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
		if($objectoPersona->buscar()){
		$ve_listo = 0;
		$ve_CodPers 	= $objectoPersona->get_cod_persona();
			 // Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_CodPers == '' || $ve_CodPers == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoPersona->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_CodPers == '')
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoPersona->modificar();
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
		if($ve_CodPers == '')
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoPersona->eliminar();
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