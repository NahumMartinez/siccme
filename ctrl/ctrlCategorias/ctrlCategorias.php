<?php
require_once("../../models/clsCategorias/clsCategorias.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_codCat 	= $_POST['gp_CodCat'];
 $ve_descCat 	= $_POST['gp_DescCat'];
 $ve_fCreacion  = $_POST['gp_FeCreacion'];
 $ve_programa   = $_POST['gp_Programa'];
 $ve_usuario 	= $_POST['gp_Usuario'];
 $ve_operacion  = $_POST['gp_Op'];
 
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Categorias
 $objectoCategoria = new clsCategoria($ve_codCat,$ve_fCreacion,$ve_programa, $ve_usuario,$ve_descCat);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoCategoria->buscar())
	 {
		 $ve_codCat 	= $objectoCategoria->get_cod_cat();
		 $ve_fCreacion  = $objectoCategoria->get_f_creacion();
		 $ve_programa 	= $objectoCategoria->get_programa();
		 $ve_usuario 	= $objectoCategoria->get_nombre_usuario();
		 $ve_descCat 	= $objectoCategoria->get_desc_cat();
		 $ve_listo 		= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor" => $ve_descCat , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario);
				 		 	   
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
		if($objectoCategoria->buscar()){
		$ve_listo = 0;
		$ve_codCat 	= $objectoCategoria->get_cod_cat();
			 //$result = array("status" => "no", "error" => "El Codigo ya Existe", "Codigo" => $ve_codCat); Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_codCat == '' || $ve_descCat == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoCategoria->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_codCat == '')
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoCategoria->modificar();
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
		if($ve_codCat == '')
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoCategoria->eliminar();
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