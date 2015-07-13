<?php
include("../../models/clsRecepcionCompras/clsBuscarItemsCompras.php");
 // Declaracion de Variables a Recibir
 // INI.
  session_start();
 $ve_CodCompra 		= $_POST['gp_CodCompra'];
 $ve_Criterio 		= $_POST['gp_Criterio'];
 $ve_operacion 		= $_POST['gp_Op'];
 
 // FIN de declaracion de variables ...
 
 // Instacia del Objeto Producto
 $objectoBuscaItemsCompras = new clsBuscaItemsCompras($ve_CodCompra, $ve_Criterio);

 // Proceso de Buscar ********************************************************
 
 if($ve_operacion == "buscaCompra")
 {
    $m_ArrayItemsCompras = array();
    // Valida si Se Ingreso como Parametro el Codigo de la Compra / Documento
        if ($ve_Criterio == "codigo")
        {
           if($objBB = $objectoBuscaItemsCompras->devAjaxCod())
           {
            // Envio del Array ; parametrizado con la Operacion = Codigo de Compra
            $m_ArrayItemsCompras[] = $objBB ;
           }
            $result = array("array"=>$m_ArrayItemsCompras );
            echo json_encode($result);     
        }elseif ($ve_Criterio == "doc_id") {
           if($objBB = $objectoBuscaItemsCompras->devAjaxDocId())
           {
            // Envio del Array ; parametrizado con la Operacion = Documento_ID
            $m_ArrayItemsCompras[] = $objBB ;
           }
            $result = array("array"=>$m_ArrayItemsCompras );
            echo json_encode($result);
        }
 }
  
?>