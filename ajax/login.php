<?php
 /**
  * @package: Login Simple
  * @author: Nahum Martinez(NMA | 2015)
  * @version: 1.0
  **/ 
  session_start();  
    require('../inc/config.php');
    require('../inc/funciones.php');
    if ($_POST) {
    $username = limpiar($_POST['username']);
    $password = limpiar($_POST['password']);
    if (!empty($username) && isset($username) and !empty($password) && isset($password)) {
    //$passenc = encriptacion($username,$password);
	$passenc = encriptacion($password);
	//echo $passenc;
    $ValidarLogin = mysqli_query($con,"SELECT nick_name, pass_usuario, id_sucursal, id_almacen "
                                    . "FROM t00_usuarios WHERE cod_usuario ='$username' and pass_usuario ='".$passenc."'");
      
	  if($Login = mysqli_fetch_array($ValidarLogin)) {
        $_SESSION["username"]    = $Login["nick_name"];
		$_SESSION["pass"]        = $Login["pass_usuario"];
        $_SESSION["id_sucursal"] = $Login["id_sucursal"];
        $_SESSION["id_almacen"]  = $Login["id_almacen"];
        
    $result = array("status" => "si", "msg" => "Gracias por iniciar sesión, Seras redirigido en un momento");
    }else{
      $result = array("status" => "no", "error" => "Sus datos no son validos");
  }
    }else{
        $result = array("status" => "no", "error" => "Necesitas llenar todos los campos");
    }
    echo json_encode($result);
    }else{
        echo "Ola k ase";
    }
?>
