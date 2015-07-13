<?php
/**
  * @package: Script de Carga de Combos
  * @author: Nahum Martinez (NMA | GEN)
  * @fecha : 2015-04-04
  * @version: 1.0
  * @ubicacion: 504-POS/scripts/
  **/ 

$conexion = new mysqli('localhost', 'root', '', 'db_pos');

// CONDICION INICIAL DEL TIPO DE COMBO A LLENAR 
// SI ES 1 : SE LLENA EN BASE A UN ARRAY DE TABLAS
// SI ES 2 : SE LLENA EN BASE A UNA TABLA 
// TIPO DE COMBOBOX A LLENAR
$ve_TipoCombo = $_POST['gp_Tipo'];
$html         = '<option value="0">Seleccione un Estante ...</option>';

IF( $ve_TipoCombo == 1){
    // INICIALIZA LAS VARIABLES DE JSON
    // ARRAY DE LAS TABLAS A CONSULTAR
    $ve_Array    = $_POST['gp_Array'];
    $ve_arreglo  = implode(",",$ve_Array);

    // CAMPOS QUE TENEMOS QUE MOSTRAR Y EVALUAR 
    $ve_Codigo   = $_POST['gp_Codigo'];
    $ve_Value    = $_POST['gp_Value'];
    $ve_Option   = $_POST['gp_Option'];

    // CONDICION DEL QUERY A EVALUAR
    $ve_Where    = $_POST['gp_Where'];
    //$ve_Parm     = $_POST['gp_Parm'];

    // Cadena del SQL a Enviar a Ejecutar por MYSQL
    $sql         = "SELECT $ve_Value, $ve_Option 
                    FROM  $ve_arreglo
                    WHERE $ve_Where ";
    //echo $sql;
}else{
    // INICIALIZA LAS VARIABLES DE JSON
    // TABLA A CONSULTAR
    $ve_Tabla    = $_POST['gp_Tabla'];
    
    // CAMPOS QUE TENEMOS QUE MOSTRAR Y EVALUAR 
    $ve_Codigo   = $_POST['gp_Codigo'];
    $ve_Value    = $_POST['gp_Value'];
    $ve_Option   = $_POST['gp_Option'];

    // CONDICION DEL QUERY A EVALUAR
    $ve_Where    = $_POST['gp_Where'];
    
    // Cadena del SQL a Enviar a Ejecutar por MYSQL
    $sql         = "SELECT $ve_Value, $ve_Option FROM $ve_Tabla WHERE $ve_Codigo LIKE '$ve_Where%' ";
    
}
    


$result = $conexion->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row[$ve_Value].'">'.$row[$ve_Option].'</option>';
    }
}
echo $html;

?>
