<?php
$var_ini_table		= "";
$var_ini_head 		= "";
$var_ini_body		= "";
$var_ini_detalle	= "";
$var_fin_body		= "";
$var_foot_table		= "";
$var_fin_table		= "";

		/*function CTablaTipos()
		{*/
			$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$clavebuscadah=mysql_query("select e.id_estante , e.cod_estante, e.f_creacion,
											   e.no_filas, e.no_columnas,    
											   a.nom_almacen, l.nombre_localidad, s.nombre_sucursal
										from t00_estantes e, t00_almacenes a, t00_localidades l, t00_sucursales s
										where e.id_almacen    = a.id_almacen   and
											  a.id_sucursal   = s.id_sucursal  and
											  s.id_localidad  = l.id_localidad ",$conexion) or
				die("Problemas en el select:".mysql_error());
			//limpiar_buffer();
			
			// Variables a Imprir en la Tabla
			// Inicio de la Tabla          ***************************************************************
			$var_ini_table   = '<div class="box-body table-responsive"><a href="#" onclick =""></a>
                                    <table id="example1" class="table table-bordered table-striped">';
							
			// Encabezado de la Tabla      ***************************************************************					
			$var_ini_head 	 = "<thead>
									<tr>
										<th>ID</th>
										<th>Codigo</th>
										<th>Fecha Creacion</th>
										<th>Filas</th>
										<th>Cols</th>
										<th>Alamcen</th>
										<th>Localidad</th>
										<th>Sucursal</th>
									</tr>
								</thead>";
					  
			// Detalle de la Tabla         ****************************************************************		  
			$var_ini_body 	 = "<tbody>";		  
			
			$var_fin_body	 = "</tbody>";

			// Pie de la Tabla             ****************************************************************	
			$var_foot_table  = "<tfoot>
									 <tr>
										<th>ID</th>
										<th>Codigo</th>
										<th>Fecha Creacion</th>
										<th>Filas</th>
										<th>Cols</th>
										<th>Alamcen</th>
										<th>Localidad</th>
										<th>Sucursal</th>
									</tr>
								</tfoot>";
								
			// Fin de la Tabla             ****************************************************************
			$var_fin_table   = ' </table>
								 </div>';
								 
			// +++++++++++++++++ Las Variables seran imprimidas por el comando echo de PHP ++++++++++++++++
			//Impresion via echo de php de variables ************************************************
			// Inicio de Tabla             ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
				echo $var_ini_table;   
			
			// Encabezado de la Tabla      ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				echo $var_ini_head;
			
			// 	Inicio de Body la Tabla    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				echo $var_ini_body;
					  
			//  Detalle de la Tabla        ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++		  
			while($row = mysql_fetch_array($clavebuscadah))
			{
				// Inicio Cuerpo de la Tabla
				echo $var_ini_detalle = "<tr>
									<td>$row[id_estante]</td>
									<td>$row[cod_estante]</td>
									<td>$row[f_creacion]</td>
									<td>$row[no_filas]</td>	
									<td>$row[no_columnas]</td>
									<td>$row[nom_almacen]</td>
									<td>$row[nombre_localidad]</td>
									<td>$row[nombre_sucursal]</td>
								</tr>";					
				// Fin de Cuerpo de la Tabla
			}
			
			// Fin de Body la Tabla       +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				echo $var_fin_body;
			// Pie de la Tabla            +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++      
				echo $var_foot_table;
			// Fin de la Tabla 			  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
				echo $var_fin_table;	  	
			

			// Script de la Tabla
				 
			
		//}
		
		
											
?>