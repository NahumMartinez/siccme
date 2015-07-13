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
			$clavebuscadah=mysql_query("select em.id_empleado, em.cod_empleado, em.nombre_empleado, em.f_creacion,
											   ti.desc_tipo, es.desc_estado, pl.desc_puesto_lab,
											   pe.no_identidad, pe.telefono, pe.celular, pe.e_mail,
											   mu.nombre_munic
										from  t00_empleados em, t00_tipos ti, t00_estados es, 
											  t00_puestos_lab pl, t00_personas pe, t00_municipios mu
										where em.id_tipo_empleado   = ti.id_tipo    and
											  em.id_estado_empleado = es.id_estado  and
											  em.id_puesto_lab      = pl.id_puesto  and
											  em.id_persona         = pe.id_persona and
											  pe.id_munic           = mu.id_munic ",$conexion) or
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
										<th>No. Identidad</th>
										<th>Nombre</th>
										<th>Fecha Creacion</th>
										<th>Telefono</th>
										<th>Celular</th>
										<th>Email</th>
										<th>Municipio</th>
										<th>Tipo Emp.</th>
										<th>Estado Emp.</th>
										<th>Puesto</th>
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
										<th>No. Identidad</th>
										<th>Nombre</th>
										<th>Fecha Creacion</th>
										<th>Telefono</th>
										<th>Celular</th>
										<th>Email</th>
										<th>Municipio</th>
										<th>Tipo Emp.</th>
										<th>Estado Emp.</th>
										<th>Puesto</th>
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
									       <td>$row[id_empleado]</td>
									       <td>$row[cod_empleado]</td>
										   <td>$row[no_identidad]</td>
									       <td>$row[nombre_empleado]</td>
									       <td>$row[f_creacion]</td>	
									       <td>$row[telefono]</td>
									       <td>$row[celular]</td>
									       <td>$row[e_mail]</td>	
									       <td>$row[nombre_munic]</td>
										   <td>$row[desc_tipo]</td>
									       <td>$row[desc_estado]</td>
										   <td>$row[desc_puesto_lab]</td>
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