<?php require('inc/config.php'); require('inc/funciones.php'); ?>
<!doctype HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login Simple By Irwin2382</title>
	  <link href="assets/css/Irwin2382.css" rel="stylesheet">
	  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	  <script src="assets/js/login.js"></script>
	  
</head>
<body>
	<?php
if (logueado()) {
	echo "Hola ".username()." tu rango es: ".rango();

	if (rango() == "Administrador") {
		echo "<br>:P Eres admin e.e";
	}

	echo "<br><a href='logout.php'>Cerrar Sesión</a>";
}else{
	echo "Por favor <a href='login.php'>Inicia Sesión</a> o <a href='signup.php'>Registrate</a>";
}
  ?>


<p id='alert_error' class='text-error invisible'></p>
<p id='alert_success' class='text-correcto invisible'></p>
<form id="LoginSimpleIrwin2382">
	<input type="text" id="username" placeholder="Usuario"><br>
	<input type="password" id="password" placeholder="Contraseña"><br>
	<input type="submit" id="EnviarLogin" value="Iniciar Sesión"><br>
</form>
</body>
</html>