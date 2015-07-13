<?php
include ("../../models/clsDistribucionProductos/clsDistribucionProductos.php");
// Declaracion de Variables a Recibir
// INI.
session_start();
$ve_CodProd 		= $_POST['gp_CodProd'];
$ve_Limit 		= $_POST['gp_Limit'];
$ve_IdAlmacen 		= $_POST['gp_IdAlmacen'];
$ve_IdEstante 		= $_POST['gp_IdEstante'];
$ve_NoFila 		= $_POST['gp_NoFila'];
$ve_NoColumna 		= $_POST['gp_NoColumna'];
$ve_operacion 		= $_POST['gp_Op'];

// FIN de declaracion de variables ...

// Instacia del Objeto Compras Encabezados
$objectoDistribucion = new clsDistribucionProductos($ve_CodProd, $ve_Limit, $ve_IdAlmacen, $ve_IdEstante, $ve_NoFila, $ve_NoColumna);

// ************************************  Proceso de Insercion *******************************************
// Hace el Llamado al Modelador con el Evento InsertItemsCantidades, para llenar la tabla:
// T02_ITEMS_ALMACEN

if ($ve_operacion == "InsertItemsCantidades") {
  
    // Validacion de la Ejecucion del Store Procedure
    if ($objectoDistribucion->InsertItemsAlmacen($ve_CodProd, $ve_Limit, $ve_IdAlmacen, $ve_IdEstante, $ve_NoFila, $ve_NoColumna) == true){
       $result = array("find" => "ok", "msg" => "La Distribucion al Almacen, se ha Realizado Exitosamente ");     
    }else{
        $result = array("find" => "no", "error" => "La Distribucion ha Fallado, en la Comunicacion y parametros enviados");
    }
  echo json_encode($result);
}
// FIN de Proceso de Insercion

?>