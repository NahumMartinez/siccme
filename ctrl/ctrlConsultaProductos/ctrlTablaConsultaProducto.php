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
                $clavebuscadah=mysql_query("SELECT P.ID_PRODUCTO, P.COD_PRODUCTO, P.DESC_PRODUCTO, 
                                                   T.DESC_TIPO, P.F_CREACION, P.PRECIO_COSTO, P.PRECIO_VENTA1,
                                                   I.PORCENTAJE_IMPUESTO
                                            FROM T00_PRODUCTOS P, T00_TIPOS T, T00_IMPUESTOS I
                                            WHERE P.ID_TIPO_PRODUCTO = T.ID_TIPO AND
                                                  P.ID_ISV = I.ID_ISV AND
                                                  P.COD_PRODUCTO LIKE '%%'; ",$conexion) or
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
					<th>Nombre Producto</th>
					<th>Tipo Producto</th>
					<th>F. Creacion</th>
					<th>Precio Costo</th>
					<th>Precio Venta</th>
					<th>Impuesto</th>
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
					<th>Nombre Producto</th>
					<th>Tipo Producto</th>
					<th>F. Creacion</th>
					<th>Precio Costo</th>
					<th>Precio Venta</th>
					<th>Impuesto</th>
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
                                                            <td>$row[ID_PRODUCTO]</td>
                                                            <td>$row[COD_PRODUCTO]</td>
                                                            <td>$row[DESC_PRODUCTO]</td>
                                                            <td>$row[DESC_TIPO]</td>	
                                                            <td>$row[F_CREACION]</td>
                                                            <td>$row[PRECIO_COSTO]</td>
                                                            <td>$row[PRECIO_VENTA1]</td>	
                                                            <td>$row[PORCENTAJE_IMPUESTO]</td>
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