<?php
include ("../../models/clsRecepcionCompras/clsRecepcionCompras.php");
// Declaracion de Variables a Recibir
// INI.
session_start();
$ve_CodCompra 		= $_POST['gp_CodCompra'];
$ve_operacion 		= $_POST['gp_Op'];
$ve_Criterio 		= $_POST['gp_Criterio'];
$ve_CodAlmacen 		= $_POST['gp_CodAlmacen'];

// FIN de declaracion de variables ...
// Instacia del Objeto Compras Encabezados
$objectoComprasEnc = new clsRecepcionCompras($ve_CodCompra, $ve_CodAlmacen);
// Proceso de Buscar ********************************************************
if ($ve_operacion == "buscar") {
  if ($objectoComprasEnc->buscar()) {
    $ve_CodCompra       = $objectoComprasEnc->get_cod_compra();
    $ve_fCreacion       = $objectoComprasEnc->get_f_creacion();
    $ve_programa        = $objectoComprasEnc->get_programa();
    $ve_usuario         = $objectoComprasEnc->get_nombre_usuario();
    $ve_IdMoneda        = $objectoComprasEnc->get_id_moneda();
    $ve_IdFormaPago     = $objectoComprasEnc->get_id_forma_pago();
    $ve_DocId           = $objectoComprasEnc->get_doc_id();
    $ve_IdProveedor     = $objectoComprasEnc->get_id_proveedor();
    $ve_ImpDescuento    = $objectoComprasEnc->get_imp_descuento();
    $ve_ImpTotal        = $objectoComprasEnc->get_imp_total();
    $ve_GtosCompras     = $objectoComprasEnc->get_gtos_compras();
    $ve_Observaciones   = $objectoComprasEnc->get_obervaciones();
    $ve_fEntrega        = $objectoComprasEnc->get_f_entrega();
    $ve_listo           = 1;
    $result = array("find" => "ok", "msg" => "Se han encontrado los Datos", "valor1" => $ve_fCreacion, "valor2" => $ve_usuario, "valor3" => $ve_IdMoneda, "valor4" => $ve_IdFormaPago, "valor5" => $ve_DocId, "valor6" => $ve_IdProveedor, "valor7" => $ve_ImpDescuento, "valor8" => $ve_ImpTotal, "valor9" => $ve_GtosCompras, "valor10" => $ve_Observaciones, "valor11" => $ve_fEntrega);
  }
  else {
//$ve_listo 		= 0;
//$ve_fCreacion 	= date("Y-m-d");
//$ve_usuario		= $_SESSION["username"];
    $result = array("find" => "no", "error" => "Datos de la Compra, no encontrados");
  }
  echo json_encode($result);
}
// FIN de Proceso de Buscar

// Proceso de Actualizacion en T00_COMPRAS_ENC **************************************************
if ($ve_operacion == "RecepcionCompra") {
  if ($ve_CodCompra == '') {
    exit ();
    $result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
  }
  else {
      if ($objectoComprasEnc->buscaIndCompra() == false) {
            //$ve_listo = 0;
            //$ve_CodCompra = $objectoComprasEnc->get_cod_compra();
            // Prueba de Mandar un Array
            $result = array("status" => "no", "error" => "La Compra no Tiene Estado 0");
    }else{
            $objectoComprasEnc->actulizarComprasEnc();
            $objectoComprasEnc->InsertItemsCantidades(); 
            $objectoComprasEnc->actulizaMasivo();
            $ve_listo = 1;
            
            $result = array("mod" => "si", "msg" => "Se ha Recepcionado la Compra Satisfactoriamente ");
        }
    }
  echo json_encode($result);
}
// FIN de Proceso de Actualizacion *************************************************************

// Proceso de Cancelacion *****************************************************
if ($ve_operacion == "cancelar") {
  $ve_listo = 1;
  $ve_fCreacion = date("Y-m-d");
  $ve_usuario = $_SESSION["username"];
  $result = array("cancel" => "si", "msg" => "Cancelacion de Formulario", "valor1" => $ve_fCreacion, "valor2" => $ve_usuario);
  echo json_encode($result);
}
// FIN de Proceso de Cancelacion
?>