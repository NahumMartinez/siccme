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
			$clavebuscadah=mysql_query("select t.id_tipo, t.cod_tipo, t.desc_tipo, 
							   t.f_creacion, t.observaciones, g.desc_categoria  
						    from  t00_tipos t, t00_categorias g
						    where t.id_categoria = g.id_categoria and
							  t.ind_tipo = 'P' ",$conexion) or
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
										<th>Descripcion</th>
										<th>Fecha Creacion</th>
										<th>Categoria</th>
										<th>Observaciones</th>
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
										<th>Grupo</th>
										<th>Observaciones</th>
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
									<td>$row[id_tipo]</td>
									<td>$row[cod_tipo]</td>
									<td>$row[desc_tipo]</td>
									<td>$row[f_creacion]</td>	
									<td>$row[desc_categoria]</td>
									<td>$row[observaciones]</td>
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