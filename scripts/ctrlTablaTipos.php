<?php
//include(dirname(__FILE__).'/../models/db/clsDatos.php');
		function CTablaCat()
		{
			$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$clavebuscadah=mysql_query("select id_tipo, cod_tipo, desc_tipo, f_creacion, usuario, id_grupo from t00_tipos ",$conexion) or
				die("Problemas en el select:".mysql_error());
			// Encabezado de la Tabla
				echo "<thead>
						<tr>
							<th>Codigo</th>
							<th>Descripcion</th>
							<th>Fecha Creacion</th>
							<th>Usuario</th>
							<th>ID Tipo</th>
							<th>ID Grupo</th>
						</tr>
                      </thead>";
					  
					  echo "<tbody>";
					  
			while($row = mysql_fetch_array($clavebuscadah))
			{
				
				// Cuerpo de la Tabla
				
				echo "<tr>
						<td>$row[cod_tipo]</td>
						<td>$row[desc_tipo]</td>
						<td>$row[f_creacion]</td>
						<td>$row[usuario]</td>	
						<td>$row[id_tipo]</td>
						<td>$row[id_grupo]</td>
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