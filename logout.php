<?php require('inc/config.php'); require('inc/funciones.php');
session_id();
session_destroy();
redir("logeo.php");
?>
