<?php
		function CTablaPersonas()
		{
			$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$clavebuscadah=mysql_query("select pe.id_persona, pe.cod_persona, pe.no_identidad,
											   concat(pe.nombre_1, ' ',pe.apellido_1) as nombre,
											   pe.f_nacimiento, pe.telefono, pe.celular,
											   pe.e_mail,
											   mu.nombre_munic, es.desc_estado, ti.desc_tipo
										from  t00_personas pe, t00_municipios mu, 
											  t00_estados es, t00_tipos ti 
										where pe.id_estado        =  es.id_estado and
											  pe.id_tipo_persona  =  ti.id_tipo  and
										      pe.id_munic         =  mu.id_munic",$conexion) or
				die("Problemas en el select:".mysql_error());
			// Encabezado de la Tabla
				echo "<thead>
						<tr>
							<th>Id</th>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Fecha Nac.</th>
							<th>Identidad</th>
							<th>Municipio.</th>
							<th>Telefono</th>
							<th>Celular</th>
							<th>E-Mail</th>
							<th>Tipo Pers.</th>
							<th>Estado Pers.</th>
						</tr>
                      </thead>";
					  
					  echo "<tbody>";
					  
			while($row = mysql_fetch_array($clavebuscadah))
			{
				
				// Cuerpo de la Tabla
				
				echo "<tr>
						<td>$row[id_persona]</td>
						<td>$row[cod_persona]</td>
						<td>$row[nombre]</td>
						<td>$row[f_nacimiento]</td>	
						<td>$row[no_identidad]</td>
						<td>$row[nombre_munic]</td>
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
							<th>Id</th>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Fecha Nac.</th>
							<th>Identidad</th>
							<th>Municipio.</th>
							<th>Telefono</th>
							<th>Celular</th>
							<th>E-Mail</th>
							<th>Tipo Pers.</th>
							<th>Estado Pers.</th>
						</tr>
                      </tfoot>";
			
		}
											
?>