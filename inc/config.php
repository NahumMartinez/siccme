<?php
 /**
  * @package: Login Simple
  * @author: Irwin Lopez (Irwin2382 | Cerec)
  * @version: 1.0
  * @link: http://www.poxion.net
  * @copyright: NINGUNO PERO NO LE QUITEN LOS P**S CREDITOS -.-"
  **/ 
 @session_start();
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
 setlocale(LC_ALL,"es_ES");
 date_default_timezone_set('America/Mexico_City');
//Configuracion
 $url = "localhost:8080/504-POS"; //Sin / al final (En caso de que se use en la raiz dejar el puro dominio)
 $serv = "localhost"; //Servidor Mysql GENERAL MENTE LOCALHOST
 $user = "root"; //Usuario Mysql
 $pass = ""; //Contraseña Mysql
 $base = "db_pos"; //Base Myqsl
 $con = mysqli_connect($serv,$user,$pass,$base);
 if (!$con) { echo "<b>NO SE PUDO CONECTAR CON LA BASE DE DATOS</b>"; exit; }
