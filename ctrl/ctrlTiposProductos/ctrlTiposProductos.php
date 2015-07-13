<?php
 include("../../models/clsTiposProductos/clsTiposProductos.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_codTipoProd 	= $_POST['gp_CodTipo'];
 $ve_descTipoProd 	= $_POST['gp_DescTipo'];
 $ve_fCreacion  	= $_POST['gp_FeCreacion'];
 $ve_programa   	= $_POST['gp_Programa'];
 $ve_usuario 		= $_POST['gp_Usuario'];
 $ve_IdGrupo 		= $_POST['gp_IdGrupo'];
 $ve_Observaciones 	= $_POST['gp_Observaciones'];
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Tipos de Productos
 $objectoTipoProd = new clsTipoProducto($ve_codTipoProd, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_descTipoProd, $ve_IdGrupo, $ve_Observaciones);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoTipoProd->buscar())
	 {
		 $ve_codTipoProd 	= $objectoTipoProd->get_cod_tipo_prod();
		 $ve_fCreacion  	= $objectoTipoProd->get_f_creacion();
		 $ve_programa 		= $objectoTipoProd->get_programa();
		 $ve_usuario 		= $objectoTipoProd->get_nombre_usuario();
		 $ve_descTipoProd 	= $objectoTipoProd->get_desc_tipo_prod();
		 $ve_IdGrupo 		= $objectoTipoProd->get_cat_prod();
		 $ve_Observaciones 	= $objectoTipoProd->get_observaciones();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor" => $ve_descTipoProd , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_IdGrupo, "valor4" => $ve_Observaciones);
				 		 	   
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
		if($objectoTipoProd->buscar()){
		$ve_listo = 0;
		$ve_codTipoProd 	= $objectoTipoProd->get_cod_tipo_prod();
			 //$result = array("status" => "no", "error" => "El Codigo ya Existe", "Codigo" => $ve_codCat); Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_codTipoProd == '' || $ve_codTipoProd == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoTipoProd->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_codTipoProd == '')
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoTipoProd->modificar();
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
		if($ve_codTipoProd == '')
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoTipoProd->eliminar();
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