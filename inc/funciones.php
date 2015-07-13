<?php
 /**
  * @package: Login Simple
  * @author: Irwin Lopez (Irwin2382 | Cerec)
  * @version: 1.0
  * @link: http://www.poxion.net
  **/ 

 function limpiar($valor){
 		global $con;
		$valor = mysqli_real_escape_string($con,$valor);
		$valor = htmlentities(strip_tags($valor), ENT_QUOTES, 'UTF-8');
		return $valor;
 }

 function redir($url){
		echo '<script >top.location.href="'.$url.'";</script>';
	}
	function logueado(){
		if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
			return true;
		}else{
			return false;
		}
	}
	function username(){
		return $_SESSION['username'];
	}
	//function encriptacion($username,$password){
	function encriptacion($password){
		//return md5(sha1(base64_encode("K978971!#&&3(1)".$username.$password."8194Ksk103:P-Ola-k-Ase-:v")));
		return md5($password);
	}
	function ip(){
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
      		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  		else
      		$ip=$_SERVER['REMOTE_ADDR'];
  		if(isset($_SERVER['HTTP_CF_CONNECTING_IP']))
      		$ip=$_SERVER['HTTP_CF_CONNECTING_IP'];
  		return $ip;
	}
	function rango(){
		global $con;
		$query = 'SELECT * FROM t00_usuarios WHERE cod_usuario = "' .$_SESSION['username']. '" LIMIT 1';
  		$result = mysqli_query($con, $query) or die('Algo salio mal con la consulta');
  		$rango = mysqli_fetch_assoc($result);
  		if ($rango['rango'] == 1) return "Administrador";
  		return "Usuario comun";


	}