<?php
 include("../../models/clsRegistroFacturas/clsBuscarClientes.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodCliente		= $_POST['gp_CodCliente'];
 $ve_operacion 		= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Producto
 $objectoBuscaCliente = new clsBuscaCliente($ve_CodCliente);

 // Proceso de Buscar ********************************************************
    if($ve_operacion == "buscaCliente")
    {
	 if($objectoBuscaCliente->buscar())
	 {
		 $ve_CodCliente 		= $objectoBuscaCliente->get_cod_cliente();
		 $ve_NomCliente 		= $objectoBuscaCliente->get_nombre_cliente();
                 $ve_ApellidoCliente 		= $objectoBuscaCliente->get_apellido_cliente();
		 $ve_TipoCliente 		= $objectoBuscaCliente->get_tipo_cliente();
		 $ve_EstadoCliente 		= $objectoBuscaCliente->get_estado_cliente();
		 $ve_IdCliente   		= $objectoBuscaCliente->get_id_cliente();
		 $ve_DirCliente 		= $objectoBuscaCliente->get_dir_cliente();
		 $ve_listo              	= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos de Persona Encontrados " , 
                                 "valor1" => $ve_CodCliente, "valor2" => $ve_NomCliente, "valor3" => $ve_ApellidoCliente, 
                                 "valor4" => $ve_TipoCliente, "valor5" => $ve_EstadoCliente, "valor6" => $ve_IdCliente, "valor7" => $ve_DirCliente);
				 		 	   
	 }else
	 {
		
		$result = array("find" => "no", "error" => "Datos de Proveedor, no encontrados");
					 
	 }
	 echo json_encode($result);
 }	
// FIN de Proceso de Buscar
 
?>