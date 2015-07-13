<?php
		function CTablaLocalidades()
		{
			$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$clavebuscadah=mysql_query("select lo.id_localidad, lo.cod_localidad, lo.f_creacion,
											   lo.nombre_localidad, 
											   al.nom_aldea, ti.desc_tipo, ar.nom_area        
										from  t00_localidades lo, t00_aldeas al, 
											  t00_tipos ti, t00_areas ar 
										where lo.id_aldea           =  al.id_aldea and
											  lo.id_tipo_localidad  =  ti.id_tipo  and
											  lo.id_area            =  ar.id_area ",$conexion) or
				die("Problemas en el select:".mysql_error());
			// Encabezado de la Tabla
				echo "<thead>
						<tr>
							<th>Id Localidad</th>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Fecha Creacion</th>
							<th>Aldea</th>
							<th>Tipo Localidad</th>
							<th>Area</th>
						</tr>
                      </thead>";
					  
					  echo "<tbody>";
					  
			while($row = mysql_fetch_array($clavebuscadah))
			{
				
				// Cuerpo de la Tabla
				
				echo "<tr>
						<td>$row[id_localidad]</td>
						<td>$row[cod_localidad]</td>
						<td>$row[nombre_localidad]</td>
						<td>$row[f_creacion]</td>	
						<td>$row[nom_aldea]</td>
						<td>$row[desc_tipo]</td>
						<td>$row[nom_area]</td>
					</tr>";
					
			}
				echo "</tbody>";
			// Pie de la Tabla
				echo "<tfoot>
                         <tr>
							<th>Id Localidad</th>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Fecha Creacion</th>
							<th>Aldea</th>
							<th>Tipo Localidad</th>
							<th>Area</th>
						</tr>
                      </tfoot>";
			
		}
											
?>