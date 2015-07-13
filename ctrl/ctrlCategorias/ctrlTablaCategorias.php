<?php
//include(dirname(__FILE__).'/../models/db/clsDatos.php');
$var_ini_table		= "";
$var_ini_head 		= "";
$var_ini_body		= "";
$var_ini_detalle	= "";
$var_fin_body		= "";
$var_foot_table		= "";
$var_fin_table		= "";
		
			$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$clavebuscadah=mysql_query("select id_categoria, cod_categoria, desc_categoria, f_creacion, usuario 
										from t00_categorias ",$conexion) or
				die("Problemas en el select:".mysql_error());
			
			// Variables a Imprir en la Tabla
			// Inicio de la Tabla          ***************************************************************
			$var_ini_table   = '<div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">';
							
			// Encabezado de la Tabla      ***************************************************************					
			$var_ini_head 	 = "<thead>
									<tr>
										<th>ID</th>
										<th>Codigo</th>
										<th>Descripcion</th>
										<th>Fecha Creacion</th>
										<th>Usuario</th>
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
									<th>Descripcion</th>
									<th>Fecha Creacion</th>
									<th>Usuario</th>
								</tr>
							  </tfoot>";
								
			// Fin de la Tabla             ****************************************************************
			$var_fin_table   = ' </table>
								 </div>';
			
			// +++++++++++++++++ Las Variables seran imprimidas por el comando echo de PHP ++++++++++++++++
			//Impresion via echo de php de variables ************************************************
			// Inicio de la Tabla	
				echo $var_ini_table;	
				
			// Encabezado de la Tabla
				echo $var_ini_head;
					  
				echo $var_ini_body;
					  
			while($row = mysql_fetch_array($clavebuscadah))
			{
				
				// Cuerpo de la Tabla
				
				echo $var_ini_detalle = "<tr>
											<td>$row[id_categoria]</td>
											<td>$row[cod_categoria]</td>
											<td>$row[desc_categoria]</td>
											<td>$row[f_creacion]</td>
											<td>$row[usuario]</td>	
										</tr>";
					
			}
				echo $var_fin_body;
			// Pie de la Tabla
				echo $var_foot_table;
				echo $var_fin_table;
		
											
?>