<?php
 include("../../models/clsClientes/clsClientes.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodCli 		= $_POST['gp_CodCli'];
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
 $ve_IdEstCli		= $_POST['gp_IdEstCli'];
 $ve_IdTipoCli		= $_POST['gp_IdTipoCli'];
 $ve_FeNacimiento	= $_POST['gp_FeNacimiento'];
 $ve_IdPersona 		= $_POST['gp_IdPersona'];
 $ve_CodPersona		= $_POST['gp_CodPers'];
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Clientes
 $objectoCliente = new clsClientes($ve_CodCli, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_NumIdentidad, $ve_NomName1, $ve_NomName2,$ve_Apelli1, $ve_Apelli2, $ve_Telefono, $ve_Celular, $ve_Email, $ve_RefDir, $ve_IdTipoCli, $ve_IdEstCli, $ve_FeNacimiento, $ve_IdPersona, $ve_CodPersona);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoCliente->buscar())
	 {
		 $ve_CodCli 		= $objectoCliente->get_cod_cliente();
		 $ve_fCreacion  	= $objectoCliente->get_f_creacion();
		 $ve_programa 		= $objectoCliente->get_programa();
		 $ve_usuario 		= $objectoCliente->get_nombre_usuario();
		 $ve_NumIdentidad  	= $objectoCliente->get_num_identidad();
		 $ve_NomName1 		= $objectoCliente->get_nom_1();
		 $ve_NomName2 		= $objectoCliente->get_nom_2();
		 $ve_Apelli1  		= $objectoCliente->get_ape_1();
		 $ve_Apelli2 		= $objectoCliente->get_ape_2();
		 $ve_Telefono 		= $objectoCliente->get_telefono();
		 $ve_Celular  		= $objectoCliente->get_celular();
		 $ve_Email	 		= $objectoCliente->get_email();
		 $ve_RefDir 		= $objectoCliente->get_ref_dir();
		 $ve_FeNacimiento	= $objectoCliente->get_f_nacimiento();
		 $ve_IdPersona 		= $objectoCliente->get_id_persona();
		 $ve_CodPersona		= $objectoCliente->get_cod_persona();
		 $ve_IdEstCli		= $objectoCliente->get_id_est_cli();
		 $ve_IdTipoCli		= $objectoCliente->get_id_tipo_cli();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_NumIdentidad, "valor4" => $ve_NomName1, "valor5" => $ve_NomName2, "valor6" => $ve_Apelli1, "valor7" => $ve_Apelli2, "valor8" => $ve_Telefono, "valor9" => $ve_Celular, "valor10" => $ve_Email, "valor11" => $ve_IdTipoCli, "valor12" => $ve_IdEstCli, "valor13" => $ve_CodPersona, "valor14" => $ve_RefDir, "valor15" => $ve_IdPersona, "valor16" => $ve_FeNacimiento);
				 		 	   
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
		if($objectoCliente->buscar()){
		$ve_listo = 0;
		$ve_CodCli 	= $objectoCliente->get_cod_cliente();
			 // Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_CodCli == '' || $ve_CodCli == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoCliente->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_CodCli == '')
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoCliente->modificar();
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
		if($ve_CodCli == '')
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoCliente->eliminar();
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