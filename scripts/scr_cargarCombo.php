<?php
//include(dirname(__FILE__).'/../models/db/clsDatos.php');
		function CCombo($tabla,$value,$desc,$cod,$where)
		{
			$conexion=mysql_connect("localhost","root","") or
				die("Problemas en la conexion");
			mysql_select_db("db_pos",$conexion) or
				die("Problemas en la selección de la base de datos");  
			$clavebuscadah=mysql_query("select $value, $desc from $tabla where $cod like '$where%'",$conexion) or
				die("Problemas en el select:".mysql_error());
			while($row = mysql_fetch_array($clavebuscadah))
			{
				echo '<OPTION VALUE="'.$row[$value].'">'.$row[$desc].'</OPTION>';
			}
			
		}
											
?>