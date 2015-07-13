<?php require('inc/config.php'); require('inc/funciones.php'); ?>
<!doctype HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login Simple By Irwin2382</title>
	  <link href="assets/css/Irwin2382.css" rel="stylesheet">
	  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	  <script src="assets/js/signup.js"></script>
	  
</head>
<body>
<p id='alert_error' class='text-error invisible'></p>
<p id='alert_success' class='text-correcto invisible'></p>
<form id="SignupSimpleIrwin2382">
	<input type="text" id="username" placeholder="Usuario"><br>
	<input type="text" id="email" placeholder="Correo"><br>
	<input type="password" id="password" placeholder="Contraseña"><br>
	<input type="password" id="cpassword" placeholder="Confirma tu contraseña"><br>
	<input type="submit" id="EnviarRegistro" value="Registrarme"><br>
</form>
</body>
</html>