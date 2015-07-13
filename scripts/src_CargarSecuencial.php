<?php
//include(dirname(__FILE__).'/../models/db/clsDatos.php');
		function CSecuencial($tabla)
		{
			$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$cod_secuencial = mysql_query("select secuencial from t00_secuenciales where tabla = '$tabla'",$conexion) or
				die("Problemas en el select de Secuenciales :".mysql_error());
			$row = mysql_fetch_row($cod_secuencial);
                        
                    // Condicion para Validar las Cantidad de Ceros al Secuencial
                    // Tarea : Uitliza el Numero tope del Secuencial (7) y valida en que posicion se encuentra 
                    //         el Secuencial entrante y le agrega el Numero de Ceros a la Posicion Restante.
                        
                        // Caso a Evaluar, segun las Posiciones del Secuencial
                        $pos_act = strlen($row[0]);
                        //echo $pos_act;
                        switch ($pos_act){
                            case 1:
                                $secuencia = '000000'.$row[0];
                                break;    
                            case 2:
                                $secuencia = '00000'.$row[0];
                                break;
                            case 3:
                                $secuencia = '0000'.$row[0];
                                break;   
                            case 4:
                                $secuencia = '000'.$row[0];
                                break;   
                            case 5:
                                $secuencia = '00'.$row[0];
                                break;   
                            case 6:
                                $secuencia = '0'.$row[0];
                                break;   
                            case 7:
                                $secuencia = $row[0];
                                break;   
                        }
                        // Salida a Visualizar al Cliente 
			echo $secuencia;
		}
											
?>