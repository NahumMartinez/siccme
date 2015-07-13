<?php
		function CTablaAlmacenes()
		{
			$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$clavebuscadah=mysql_query("select al.id_almacen, al.cod_almacen, al.nom_almacen,
											   al.f_creacion, al.num_estantes,
											   su.nombre_sucursal, em.nombre_empleado
										from t00_almacenes al, t00_sucursales su, t00_empleados em
										where al.id_emple_encargado = em.id_empleado and
											  al.id_sucursal = su.id_sucursal
 ",$conexion) or
				die("Problemas en el select:".mysql_error());
			// Encabezado de la Tabla
				echo "<thead>
						<tr>
							<th>Id</th>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Fecha Creacion</th>
							<th>Estantes</th>
							<th>Sucursal</th>
							<th>Empleado a Cargo</th>
						</tr>
                      </thead>";
					  
					  echo "<tbody>";
					  
			while($row = mysql_fetch_array($clavebuscadah))
			{
				
				// Cuerpo de la Tabla
				
				echo "<tr>
						<td>$row[id_almacen]</td>
						<td>$row[cod_almacen]</td>
						<td>$row[nom_almacen]</td>
						<td>$row[f_creacion]</td>	
						<td>$row[num_estantes]</td>
						<td>$row[nombre_sucursal]</td>
						<td>$row[nombre_empleado]</td>
					  </tr>";
					
			}
				echo "</tbody>";
			// Pie de la Tabla
				echo "<tfoot>
                         <tr>
							<th>Id</th>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Fecha Creacion</th>
							<th>Estantes</th>
							<th>Sucursal</th>
							<th>Empleado a Cargo</th>
						</tr>
                      </tfoot>";
			
		}
											
?>