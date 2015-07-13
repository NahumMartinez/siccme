<?php
 include("../../models/clsEstantes/clsEstantes.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_codEstante 	= $_POST['gp_CodEst'];
 $ve_descEstante 	= $_POST['gp_DescEst'];
 $ve_fCreacion  	= $_POST['gp_FeCreacion'];
 $ve_programa   	= $_POST['gp_Programa'];
 $ve_usuario 		= $_POST['gp_Usuario'];
 $ve_IdAlmacen 		= $_POST['gp_IdAlmacen'];
 $ve_NumFilas	 	= $_POST['gp_NumFilas'];
 $ve_NumColum	 	= $_POST['gp_NumColumnas'];
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Tipos de Productos
 $objectoEstantes = new clsEstantes($ve_codEstante, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_descEstante, $ve_IdAlmacen, $ve_NumFilas, $ve_NumColum);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoEstantes->buscar())
	 {
		 $ve_codEstante 	= $objectoEstantes->get_cod_estante();
		 $ve_fCreacion  	= $objectoEstantes->get_f_creacion();
		 $ve_programa 		= $objectoEstantes->get_programa();
		 $ve_usuario 		= $objectoEstantes->get_nombre_usuario();
		 $ve_descEstante 	= $objectoEstantes->get_desc_estantes();
		 $ve_IdAlmacen 		= $objectoEstantes->get_id_almacen();
		 $ve_NumFilas	 	= $objectoEstantes->get_num_filas();
		 $ve_NumColum	 	= $objectoEstantes->get_num_colum();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor" => $ve_descEstante , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_IdAlmacen, "valor4" => $ve_NumFilas, "valor5" => $ve_NumColum);
				 		 	   
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
		if($objectoEstantes->buscar()){
		$ve_listo = 0;
		$ve_codEstante 	= $objectoEstantes->get_cod_estante();
			 //$result = array("status" => "no", "error" => "El Codigo ya Existe", "Codigo" => $ve_codCat); Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_codEstante == '' || $ve_codEstante == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoEstantes->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_codEstante == '')
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoEstantes->modificar();
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
		if($ve_codEstante == '')
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoEstantes->eliminar();
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