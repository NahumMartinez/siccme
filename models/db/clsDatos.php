<?php
/**
  * @package: Clase Datos
  * @author: Nahum Martinez (NMA | GEN)
  * @fecha : 2014-08-16
  * @version: 1.0
  * @ubicacion: 504-POS/models/db/clsDatos.php
  **/ 
class clsDatos{

private $conecxion;

	public function __construct(){
		$servidor = "127.0.0.1";
		$usuario  = "root";
		$clave    = "";
		$base     = "db_pos";
		
		$this->conecxion = mysql_connect($servidor,$usuario,$clave) or die (mysql_error());
		if (!$this->conecxion) 
		{ 
		echo "<b>NO SE PUDO CONECTAR CON LA BASE DE DATOS</b>"; 
		exit; 
		}
		
		mysql_select_db($base, $this->conecxion);
		//echo $this->conecxion;
	}

	public function __destruct(){
		
	}

	public function filtro($sql){
		$result = mysql_query($sql, $this->conecxion);
		return $result;
	}
	
	public function cerrarfiltro($datos){
		mysql_free_result($datos);
	}
	
        // Utilizado para un Retorno Unico de Consulta
	public function proximo($datos){
		$arreglo = mysql_fetch_array($datos);
		return $arreglo;
	}
        
        // Utilizado para un Retorno Multiple de Consulta
        // Pero no con la Llave de JSON; sino con el Valor
        public function proximoArray($datos){
		$arreglo = mysql_fetch_row($datos);
		return $arreglo;
	}
	
	public function ejecutar($sql){
		//mysql_query($sql, $this->conecxion) or die('Error en el query: '.mysql_errno($this->conecxion).' - '.mysql_error($this->conecxion));
		if (mysql_query($sql, $this->conecxion)) 
		{ 
			mysql_query("COMMIT");
		}else{
			mysql_query("COMMIT");
		}
		
	}
	
	public function cerrarconecxion(){
		mysql_close($this->conecxion);
	}
	
	//Devuelve el último id del insert introducido
	public function lastID(){
		return mysql_insert_id($this->conecxion);
	}
	
}// FIN DE CLASE
?>