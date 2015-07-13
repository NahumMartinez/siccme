<?php
include ("../../models/clsCompras/clsCompras.php");
// Declaracion de Variables a Recibir
// INI.
session_start();
$ve_CodCompra       = $_POST['gp_CodCompra'];
$ve_fCreacion       = $_POST['gp_FeCreacion'];
$ve_programa        = $_POST['gp_Programa'];
$ve_usuario         = $_POST['gp_Usuario'];
$ve_IdMoneda        = $_POST['gp_IdMoneda'];
$ve_IdFormaPago     = $_POST['gp_IdFormaPago'];
$ve_DocId           = $_POST['gp_DocId'];
$ve_IdProveedor     = $_POST['gp_IdProveedor'];
$ve_ImpDescuento    = $_POST['gp_ImpDescuento'];
$ve_ImpTotal        = $_POST['gp_ImpTotal'];
$ve_GtosCompras     = $_POST['gp_GtosCompras'];
$ve_Observaciones   = $_POST['gp_Observaciones'];
$ve_fEntrega        = $_POST['gp_FEntrega'];
// Valores de los Items de la Compra
//recibo los datos y los decodifico con PHP
$misDatosJSON       = json_decode($_POST["datos"]);
$misDatosJSON2      = json_decode($_POST["datos2"]);
$misDatosJSON3      = json_decode($_POST["datos3"]);
$misDatosJSON4      = json_decode($_POST["datos4"]);
$ve_operacion       = $_POST['gp_Op'];




// FIN de declaracion de variables ...
// Instacia del Objeto Compras Encabezados
$objectoComprasEnc = new clsComprasEnc($ve_CodCompra, $ve_fCreacion, $ve_programa, $ve_usuario, $ve_IdMoneda, 
                                       $ve_IdFormaPago, $ve_DocId, $ve_IdProveedor, $ve_ImpDescuento, $ve_ImpTotal,
                                       $ve_GtosCompras, $ve_Observaciones, $ve_fEntrega);
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

// Proceso de Insercion ******************************************************
if ($ve_operacion == "incluir") {
  if ($objectoComprasEnc->buscar()) {
    $ve_listo = 0;
    $ve_CodCompra = $objectoComprasEnc->get_cod_compra();
// Prueba de Mandar un Array
    $result = array("status" => "no", "error" => "El Codigo ya Existe");
  }
  else {
    if ($ve_CodCompra == '' || $ve_CodCompra == '0') {
      exit ();
      $result = array("status" => "no", "error" => "Falta Ingresar el Codigo");
    }
    else {
      $ve_listo = 1;
      $objectoComprasEnc->incluir();
      $secuencia = $objectoComprasEnc->secuencial();
      
        for ($i = 0; $i < count($misDatosJSON); $i++)
        {
           $cod_1       =  $misDatosJSON[$i];
           $cant_1      =  $misDatosJSON2[$i];
           $precio_1    =  $misDatosJSON3[$i];
           $objectoComprasEnc->insertaItems($ve_CodCompra, $cod_1 , $cant_1 , $precio_1 );
        }

      $result = array("status" => "si", "msg" => "Los datos han sido Ingresados de Forma Satisfactoria", "valor1" => $secuencia);
    }
  }
  echo json_encode($result);
}
// FIN de Proceso de Insercion

// Proceso de Modificacion ****************************************************
if ($ve_operacion == "modificar") {
  if ($ve_CodCompra == '') {
    exit ();
    $result = array("mod" => "no", "error" => "Falta Ingresar el Codigo");
  }
  else {
    $objectoComprasEnc->modificar();
    $ve_listo = 1;
    $ve_fCreacion = date("Y-m-d");
    $ve_usuario = $_SESSION['username'];
    $result = array("mod" => "si", "msg" => "Los datos han sido Modificados exitosamente", "valor1" => $ve_fCreacion, "valor2" => $ve_usuario);
  }
  echo json_encode($result);
}
// FIN de Proceso de Modificacion
// Proceso de Eliminacion *****************************************************
if ($ve_operacion == "eliminar") {
  if ($ve_CodCompra == '') {
    exit ();
    $result = array("del" => "no", "error" => "Falta Ingresar el Codigo");
  }
  else {
    $objectoComprasEnc->eliminar();
    $ve_listo = 1;
    $ve_fCreacion = date("Y-m-d");
    $ve_usuario = $_SESSION["username"];
    $result = array("del" => "si", "msg" => "Los datos han sido Eliminados exitosamente", "valor1" => $ve_fCreacion, "valor2" => $ve_usuario);
  }
  echo json_encode($result);
}
// FIN de Proceso de Eliminacion
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