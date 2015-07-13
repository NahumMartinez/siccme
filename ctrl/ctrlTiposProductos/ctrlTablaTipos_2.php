<?php
	
	$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$clavebuscadah=mysql_query("select t.id_tipo, t.cod_tipo, t.desc_tipo, 
											   t.f_creacion, t.observaciones, g.desc_grupo  
										from  t00_tipos t, t00_grupos g
										where t.id_grupo = g.id_grupo and t.ind_tipo = 'P'",$conexion) or
				die("Problemas en el select:".mysql_error());
				
			$datos = array();	
			
			while($row = mysql_fetch_array($clavebuscadah))
	{
		$datos[] = array(
			
			'id'          => $row['id_tipo'],
			'codigo'      => $row['cod_tipo'],
			'nombre'      => $row['desc_tipo'],
			'f_creacion'  => $row['f_creacion'],
			'observaciones'  => $row['observaciones'],
			'grupo'        => $row['desc_grupo']
		);
	}
	// convertimos el array de datos a formato json
	echo json_encode($datos);

?>