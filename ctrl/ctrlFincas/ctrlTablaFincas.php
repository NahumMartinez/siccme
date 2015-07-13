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
			$clavebuscadah=mysql_query("select f.id_finca, f.cod_finca, f.f_creacion,
											   f.nom_finca, f.num_puerta, f.ref_dir,
											   m.nombre_munic, l.nombre_localidad, a.nom_aldea
										from t00_fincas f, t00_municipios m, t00_localidades l, t00_aldeas a
										where f.id_localidad = l.id_localidad  and
											  l.id_aldea     = a.id_aldea      and
											  m.id_munic     = a.id_munic ",$conexion) or
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
										<th>Nombre Finca</th>
										<th>F. Creacion</th>
										<th>No. Puerta</th>
										<th>Referencia</th>
										<th>Localidad</th>
										<th>Aldea</th>
										<th>Municipio</th>
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
										<th>Nombre Finca</th>
										<th>F. Creacion</th>
										<th>No. Puerta</th>
										<th>Referencia</th>
										<th>Localidad</th>
										<th>Aldea</th>
										<th>Municipio</th>
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
									<td>$row[id_finca]</td>
									<td>$row[cod_finca]</td>
									<td>$row[nom_finca]</td>
									<td>$row[f_creacion]</td>	
									<td>$row[num_puerta]</td>
									<td>$row[ref_dir]</td>
									<td>$row[nombre_munic]</td>	
									<td>$row[nombre_localidad]</td>
									<td>$row[nom_aldea]</td>
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