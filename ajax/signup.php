<?php
 /**
  * @package: Login Simple
  * @author: Irwin Lopez (Irwin2382 | Cerec)
  * @version: 1.0
  * @link: http://www.poxion.net
  * @copyright: NINGUNO PERO NO LE QUITEN LOS P**S CREDITOS -.-"
  **/ 
    require('../inc/config.php');
    require('../inc/funciones.php');
    $username = limpiar($_POST['username']);
    $email = limpiar($_POST['email']);
    $password = limpiar($_POST['password']);
    $cpassword = limpiar($_POST['cpassword']);
    $passenc = encriptacion($username,$password);
    $fecha = strftime("%A %d de %B del %Y")." a las ".date("g:i a");
    $ip = ip();
    if (!empty($username) && isset($username) and !empty($email) && isset($email) and !empty($password) && isset($password) and !empty($cpassword) && isset($cpassword)) {
        if(strlen($username) < 3 ) {
    $result = array("status" => "no","error" => "El nick ingresado es muy corto. Necesitas al menos 3 Caracteres ");
    $continue = 0;
  }else{
    if(strlen($email) < 8){
    $result = array("status" => "no", "error" => "El correo ingresado es muy corto. Necesitas al menos 8 Caracteres " );
    $continue = 0;
    }else{
  if(strlen($password) < 8) {
    $result = array("status" => "no","error" => "La contraseña ingresada es muy corta. Necesitas al menos 8 Caracteres ");
    $continue = 0;
    }else{

    $continue = 1;
  }}}

   if ($continue == 1) {
              $userconsult = mysqli_query($con,"SELECT * FROM t00_usuarios WHERE cod_usuario ='$username'");
              $userconsultexist=mysqli_num_rows($userconsult);
if ($userconsultexist != 0) {
     $result = array("status" => "no","error" => "Ya existe un usuario con este nick ");
    }else{ 
        $emailconsult = mysqli_query($con,"SELECT * FROM usuarios WHERE email ='$email'");
        $emailconsultexist=mysqli_num_rows($emailconsult);
    if ($emailconsultexist != 0) {
     $result = array("status" => "no","error" => "Ya existe un usuario con este correo ");
    }else{


if ($password != $cpassword) {
  $result = array("status" => "no","error" => "Las contraseñas no coinciden ");
}else{


$signupsave = mysqli_query($con,"INSERT INTO usuarios (usuario, contrasena, email, ip, fechaderegistro, rango) VALUES ('$username', '$passenc','$email', '$ip','$fecha',1)");
      if($signupsave) {
            $result = array( "status" => "si", "msg" => "Gracias por registrarte, seras redirigido en un momento " );            
            $_SESSION["username"] = $username;
    }else{
      $result = array( "status" => "no", "error" => "Lo sentimos, no pudimos registrarte ");
  }
}
}
}
}
    }else{
        $result = array("status" => "no", "error" => "Necesitas llenar todos los campos ");
    }
    echo json_encode($result);
?>

