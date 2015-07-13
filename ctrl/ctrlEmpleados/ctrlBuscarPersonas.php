<?php
 include("../../models/clsClientes/clsBuscarPersonas.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodPers 		= $_POST['gp_CodPers'];
 $ve_NumIdentidad 	= $_POST['gp_NumIdentidad'];
 $ve_NomName1		= $_POST['gp_NomName1'];
 $ve_NomName2 		= $_POST['gp_NomName2'];
 $ve_Apelli1	 	= $_POST['gp_Apelli1'];
 $ve_Apelli2		= $_POST['gp_Apelli2'];
 $ve_Telefono		= $_POST['gp_Telefono'];
 $ve_Celular 		= $_POST['gp_Celular'];
 $ve_Email		 	= $_POST['gp_Email'];
 $ve_RefDir 		= $_POST['gp_RefDir'];
 $ve_FeNacimiento	= $_POST['gp_FeNacimiento'];
 $ve_IdPersona		= $_POST['gp_IdPersona'];
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Clientes
 $objectoBuscaPersonas = new clsBuscaPersonas($ve_CodPers, $ve_NumIdentidad, $ve_NomName1, $ve_NomName2, $ve_Apelli1, $ve_Apelli2, $ve_Telefono, $ve_Celular, $ve_Email, $ve_RefDir, $ve_FeNacimiento, $ve_IdPersona );

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscarc")
    {
	 if($objectoBuscaPersonas->buscar())
	 {
		 $ve_CodPers 		= $objectoBuscaPersonas->get_cod_persona();
		 $ve_NumIdentidad	= $objectoBuscaPersonas->get_num_identidad();
		 $ve_NomName1 		= $objectoBuscaPersonas->get_nom_1();
		 $ve_NomName2 		= $objectoBuscaPersonas->get_nom_2();
		 $ve_Apelli1 		= $objectoBuscaPersonas->get_ape_1();
		 $ve_Apelli2 		= $objectoBuscaPersonas->get_ape_2();
		 $ve_Telefono 		= $objectoBuscaPersonas->get_telefono();
		 $ve_Celular 		= $objectoBuscaPersonas->get_celular();
		 $ve_Email 			= $objectoBuscaPersonas->get_email();
		 $ve_RefDir 		= $objectoBuscaPersonas->get_ref_dir();
		 $ve_FeNacimiento	= $objectoBuscaPersonas->get_f_nacimiento();
		 $ve_IdPersona		= $objectoBuscaPersonas->get_id_persona();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos de Persona Encontrados " , "valor2" => $ve_NumIdentidad, "valor3" => $ve_NomName1, "valor4" => $ve_NomName2, "valor5" => $ve_Apelli1, "valor6" => $ve_Apelli2, "valor7" => $ve_Telefono, "valor8" => $ve_Celular, "valor9" => $ve_Email, "valor10" => $ve_RefDir, "valor11" => $ve_FeNacimiento, "valor12" => $ve_IdPersona);
				 		 	   
	 }else
	 {
		$ve_listo 		= 0;
		$ve_fCreacion 	= date("Y-m-d");
		$ve_usuario		= $_SESSION["username"];
		$result = array("find" => "no", "error" => "Datos de Persona, no encontrados", "valor1" => $ve_fCreacion, "valor2" => $ve_usuario);
					 
	 }
	 echo json_encode($result);
 }	
// FIN de Proceso de Buscar
 
?>