<?php
 include("../../models/clsCompras/clsBuscarProveedor.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodProv 		= $_POST['gp_CodProv'];
 $ve_operacion 		= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Producto
 $objectoBuscaProveedor = new clsBuscaProveedor($ve_CodProv);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscaProv")
    {
	 if($objectoBuscaProveedor->buscar())
	 {
		 $ve_CodProv_p 		= $objectoBuscaProveedor->get_cod_proveedor();
		 $ve_Nombre_p 		= $objectoBuscaProveedor->get_nombre_prov();
		 $ve_Tipo_p 		= $objectoBuscaProveedor->get_tipo_proveedor();
		 $ve_Estado_p 		= $objectoBuscaProveedor->get_estado_proveedor();
		 $ve_Rubro_p 		= $objectoBuscaProveedor->get_rubro_proveedor();
		 $ve_IdProv_p 		= $objectoBuscaProveedor->get_id_proveedor();
		 $ve_Dir_p 		= $objectoBuscaProveedor->get_dir_proveedor();
		 $ve_listo 		= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos de Persona Encontrados " , "valor1" => $ve_CodProv_p, "valor2" => $ve_Nombre_p, "valor3" => $ve_Tipo_p, "valor4" => $ve_Estado_p, "valor5" => $ve_Rubro_p, "valor6" => $ve_IdProv_p, "valor7" => $ve_Dir_p);
				 		 	   
	 }else
	 {
		
		$result = array("find" => "no", "error" => "Datos de Proveedor, no encontrados");
					 
	 }
	 echo json_encode($result);
 }	
// FIN de Proceso de Buscar
 
?>