<?php
 include("../../models/clsRecepcionCompras/clsBuscarCompras.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodCompra 		= $_POST['gp_CodCompra'];
 $ve_operacion 		= $_POST['gp_Op'];
 $ve_Criterio 		= $_POST['gp_Criterio'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Producto
 $objectoBuscaCompras = new clsBuscaCompras($ve_CodCompra, $ve_Criterio);

 // Proceso de Buscar ********************************************************
 
    if($ve_operacion == "buscaCompra")
    {
        // Valida si Se Ingreso como Parametro el Codigo de la Compra / Documento
        if ($ve_Criterio == "codigo")
        {
           $ve_Items = true; 
           // Busca por el Codigo 
           if($objectoBuscaCompras->buscarCodigo())
           {      
		 $ve_CodCompra 		= $objectoBuscaCompras->get_cod_compra();
		 $ve_fCreacion		= $objectoBuscaCompras->get_f_compra();
		 $ve_ImpTotal   	= $objectoBuscaCompras->get_monto_compra();
		 $ve_ImpDescuento       = $objectoBuscaCompras->get_imp_descuento();
                 $ve_DocId 		= $objectoBuscaCompras->get_documento_id();
		 $ve_fEntrega		= $objectoBuscaCompras->get_f_entrega();
		 $ve_CodProv    	= $objectoBuscaCompras->get_cod_proveedor();
		 $ve_NomProv		= $objectoBuscaCompras->get_nombre_proveedor();
                 $ve_Direccion    	= $objectoBuscaCompras->get_direccion();
		 $ve_Telefono		= $objectoBuscaCompras->get_telefono();
                 $ve_Celular		= $objectoBuscaCompras->get_celular();
                 $ve_Email      	= $objectoBuscaCompras->get_e_mail();
                 $ve_Rubro      	= $objectoBuscaCompras->get_rubro();
                 $ve_TipoProv      	= $objectoBuscaCompras->get_tipo_prov();
                 $ve_Rtn          	= $objectoBuscaCompras->get_rtn();
                 $ve_Usuario          	= $objectoBuscaCompras->get_usuario();
                 //$ve_Impuesto          	= $objectoBuscaCompras->get_impuesto(); // Se Quita para Optimizar los Recursos de la Aplicacion
                 $ve_Cantidad          	= $objectoBuscaCompras->get_cantidad();
                 $ve_Gastos          	= $objectoBuscaCompras->get_gastos_compra();
                 $ve_Observaciones     	= $objectoBuscaCompras->get_observaciones();
                 $ve_HoraCompra     	= $objectoBuscaCompras->get_hora_compra();
		 $ve_listo 		= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos de la Compra Encontrados " , "valor1" => $ve_CodCompra, 
                                 "valor2" => $ve_fCreacion, "valor3" => $ve_ImpTotal,  "valor4" => $ve_ImpDescuento,
                                 "valor5" => $ve_DocId,     "valor6" => $ve_fEntrega,  "valor7" => $ve_CodProv,
                                 "valor8" => $ve_NomProv,   "valor9" => $ve_Direccion, "valor10" => $ve_Telefono,
                                 "valor11" => $ve_Celular,  "valor12" => $ve_Email,    "valor13" => $ve_Rubro, 
                                 "valor14" => $ve_TipoProv, "valor15" => $ve_Rtn,      "valor16" => $ve_Usuario, 
                                 "valor18" => $ve_Cantidad, "valor19" => $ve_Gastos, 
                                 "valor20" => $ve_Observaciones, "valor21" => $ve_HoraCompra);
		// Llamado a devAjax *******************************************
                 //$objectoBuscaCompras->devAjax(); 		 		 	   
	    }else
	    {
		$result = array("find" => "no", "error" => "Los Datos de la Compra no se han encontrados, la Compra ya fue Recepcionada  ");
				 
            }
            echo json_encode($result);     
        }elseif ($ve_Criterio == "doc_id") {
            // Busca por el Documento 
           if($objectoBuscaCompras->buscarDocumento())
           {
		 $ve_CodCompra 		= $objectoBuscaCompras->get_cod_compra();
		 $ve_fCreacion		= $objectoBuscaCompras->get_f_compra();
		 $ve_ImpTotal   	= $objectoBuscaCompras->get_monto_compra();
		 $ve_ImpDescuento       = $objectoBuscaCompras->get_imp_descuento();
                 $ve_DocId 		= $objectoBuscaCompras->get_documento_id();
		 $ve_fEntrega		= $objectoBuscaCompras->get_f_entrega();
		 $ve_CodProv    	= $objectoBuscaCompras->get_cod_proveedor();
		 $ve_NomProv		= $objectoBuscaCompras->get_nombre_proveedor();
                 $ve_Direccion    	= $objectoBuscaCompras->get_direccion();
		 $ve_Telefono		= $objectoBuscaCompras->get_telefono();
                 $ve_Celular		= $objectoBuscaCompras->get_celular();
                 $ve_Email      	= $objectoBuscaCompras->get_e_mail();
                 $ve_Rubro      	= $objectoBuscaCompras->get_rubro();
                 $ve_TipoProv      	= $objectoBuscaCompras->get_tipo_prov();
                 $ve_Rtn          	= $objectoBuscaCompras->get_rtn();
                 $ve_Usuario          	= $objectoBuscaCompras->get_usuario();
                 $ve_Impuesto          	= $objectoBuscaCompras->get_impuesto();
                 $ve_Cantidad          	= $objectoBuscaCompras->get_cantidad();
                 $ve_Gastos          	= $objectoBuscaCompras->get_gastos_compra();
                 $ve_Observaciones     	= $objectoBuscaCompras->get_observaciones();
                 $ve_HoraCompra     	= $objectoBuscaCompras->get_hora_compra();
		 $ve_listo 		= 1;
		 
		 $result = array("find" => "ok" , "msg" => "Datos de la Compra Encontrados " , "valor1" => $ve_CodCompra, 
                                 "valor2" => $ve_fCreacion, "valor3" => $ve_ImpTotal,  "valor4" => $ve_ImpDescuento,
                                 "valor5" => $ve_DocId,     "valor6" => $ve_fEntrega,  "valor7" => $ve_CodProv,
                                 "valor8" => $ve_NomProv,   "valor9" => $ve_Direccion, "valor10" => $ve_Telefono,
                                 "valor11" => $ve_Celular,  "valor12" => $ve_Email,    "valor13" => $ve_Rubro, 
                                 "valor14" => $ve_TipoProv, "valor15" => $ve_Rtn,      "valor16" => $ve_Usuario, 
                                 "valor17" => $ve_Impuesto, "valor18" => $ve_Cantidad, "valor19" => $ve_Gastos, 
                                 "valor20" => $ve_Observaciones, "valor21" => $ve_HoraCompra);
				 		 	   
	    }else
	    {
		$result = array("find" => "no", "error" => "Datos de Compra, no encontrados");
				 
            }
            echo json_encode($result);    
        }   
        
	 
    }	
// FIN de Proceso de Buscar Compras ...
    
// Procedo del Segundo Ajax
    if($ve_Items = true){
        if($objectoBuscaCompras->devAjax())
           {
              $ve_Item = "Si Entro";
              $result  = array("find" => "ok", "dev" => $ve_Item);
           }
    }
    
// FIN del Segundo Ajax    
 
?>