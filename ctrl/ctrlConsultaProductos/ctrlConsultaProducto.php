<?php
 include("../../models/clsFincas/clsFincas.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_codFinca 		= $_POST['gp_CodFinca'];
 $ve_descFinca 		= $_POST['gp_DescFinca'];
 $ve_fCreacion  	= $_POST['gp_FeCreacion'];
 $ve_programa   	= $_POST['gp_Programa'];
 $ve_usuario 		= $_POST['gp_Usuario'];
 $ve_IdColor 		= $_POST['gp_IdColor'];
 $ve_IdLocal 		= $_POST['gp_IdLocal'];
 $ve_NumPuerta 		= $_POST['gp_NumPuerta'];
 $ve_NumBloque 		= $_POST['gp_NumBloque'];
 $ve_NumCalle 		= $_POST['gp_NumCalle'];
 $ve_NumPeatonal 	= $_POST['gp_NumPeatonal'];
 $ve_Lat			= $_POST['gp_Lat'];
 $ve_Long 			= $_POST['gp_Long'];
 $ve_RefDir 		= $_POST['gp_RefDir'];
 $ve_operacion  	= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Tipos de Productos
 $objectoFinca = new clsTipoProducto($ve_codFinca, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_descFinca, $ve_IdColor, $ve_IdLocal, $ve_NumPuerta, $ve_NumBloque, $ve_NumCalle, $ve_NumPeatonal, $ve_Lat, $ve_Long, $ve_RefDir);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscar")
    {
	 if($objectoFinca->buscar())
	 {
		 $ve_codFinca 		= $objectoFinca->get_cod_finca();
		 $ve_fCreacion  	= $objectoFinca->get_f_creacion();
		 $ve_programa 		= $objectoFinca->get_programa();
		 $ve_usuario 		= $objectoFinca->get_nombre_usuario();
		 $ve_descFinca 		= $objectoFinca->get_desc_finca();
		 $ve_IdColor 		= $objectoFinca->get_id_color();
		 $ve_IdLocal 		= $objectoFinca->get_id_localidad();
		 $ve_NumPuerta 		= $objectoFinca->get_num_puerta();
		 $ve_NumBloque	 	= $objectoFinca->get_num_bloque();
		 $ve_NumCalle 		= $objectoFinca->get_num_calle();
		 $ve_NumPeatonal 	= $objectoFinca->get_num_peatonal();
		 $ve_Lat 			= $objectoFinca->get_latitud();
		 $ve_Long 			= $objectoFinca->get_longitud();
		 $ve_RefDir 		= $objectoFinca->get_ref_dir();
		 $ve_listo 			= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Se han encontrado los Datos" , "valor" => $ve_descFinca , "valor1" => $ve_fCreacion , "valor2" => $ve_usuario, "valor3" => $ve_IdColor, "valor4" => $ve_IdLocal, "valor5" => $ve_NumPuerta, "valor6" => $ve_NumBloque, "valor7" => $ve_NumCalle, "valor8" => $ve_NumPeatonal, "valor9" => $ve_Lat, "valor10" => $ve_Long, "valor11" => $ve_RefDir);
				 		 	   
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
		if($objectoFinca->buscar()){
		$ve_listo = 0;
		$ve_codFinca 	= $objectoFinca->get_cod_finca();
			 // Prueba de Mandar un Array
			 $result = array("status" => "no", "error" => "El Codigo ya Existe");
			 
		}else{
			if($ve_codFinca == '' || $ve_codFinca == ''){
				exit();
				$result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
			}else{
				$ve_listo = 1;
				$objectoFinca->incluir(); 
				$result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria" );
			
			}
				
		}
		echo json_encode($result); 
	}	
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
	if($ve_operacion == "modificar")
	{
		if($ve_codFinca == '')
		{
			exit();
			$result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
		$objectoFinca->modificar();
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
		if($ve_codFinca == '')
		{
			exit();
			$result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
		}else{
			$objectoFinca->eliminar();
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