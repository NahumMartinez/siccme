<?php
		function CTablaClientes()
		{
			$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$clavebuscadah=mysql_query("select cl.id_cliente, cl.cod_cliente, cl.f_creacion,
											   concat(pe.nombre_1,' ', pe.apellido_1) as nombre, pe.no_identidad,
											   pe.telefono, pe.celular, pe.e_mail,
											   ti.desc_tipo, es.desc_estado       
										from t00_clientes cl, t00_tipos ti, t00_estados es, t00_personas pe 
										where cl.id_tipo_cliente  = ti.id_tipo and
											  cl.id_estado_cliente = es.id_estado and
											  cl.id_persona = pe.id_persona",$conexion) or
				die("Problemas en el select:".mysql_error());
			// Encabezado de la Tabla
				echo "<thead>
						<tr>
							<th>Id Cliente</th>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Fecha Creacion</th>
							<th>Identidad</th>
							<th>Telefono</th>
							<th>Celular</th>
							<th>E-Mail</th>
							<th>Tipo Cli.</th>
							<th>Estado Cli.</th>
						</tr>
                      </thead>";
					  
					  echo "<tbody>";
					  
			while($row = mysql_fetch_array($clavebuscadah))
			{
				
				// Cuerpo de la Tabla
				
				echo "<tr>
						<td>$row[id_cliente]</td>
						<td>$row[cod_cliente]</td>
						<td>$row[nombre]</td>
						<td>$row[f_creacion]</td>	
						<td>$row[no_identidad]</td>
						<td>$row[telefono]</td>
						<td>$row[celular]</td>
						<td>$row[e_mail]</td>
						<td>$row[desc_tipo]</td>
						<td>$row[desc_estado]</td>
					  </tr>";
					
			}
				echo "</tbody>";
			// Pie de la Tabla
				echo "<tfoot>
                         <tr>
							<th>Codigo</th>
							<th>Descripcion</th>
							<th>Fecha Creacion</th>
							<th>Usuario</th>
							<th>ID</th>
						</tr>
                      </tfoot>";
			
		}
											
?>