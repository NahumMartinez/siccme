<?php
if($_POST){
	//echo "recibo algo POST";
	
	//recibo los datos y los decodifico con PHP
	$misDatosJSON 	= json_decode($_POST["datos"]);
	$misDatosJSON2 	= json_decode($_POST["datos2"]);
	$misDatosJSON3 	= json_decode($_POST["datos3"]);
	$misDatosJSON4 	= json_decode($_POST["datos4"]);
	$misDatosJSON5 	= json_decode($_POST["datos5"]);
		
	echo "-----------------------------  Nueva Linea ---------------------------------------";
	// Array de los Coidgos
	/*foreach($misDatosJSON as $b) {
        echo "<br>";
		echo $b." ----- ";
    }
	// Array de las Cantidades
	foreach($misDatosJSON2 as $b) {
        echo "<br>";
		echo $b." ----- ";
		
    }
	// Array de los Precios
	foreach($misDatosJSON3 as $b) {
        echo "<br>";
		echo $b." ----- ";
		
    }
	// Array de Impuestos
	foreach($misDatosJSON4 as $b) {
        echo "<br>";
		echo $b." ----- ";
		
    }*/
	$k ="";
	$v = "";
	$f = "";
	// Array de Impuestos
	foreach($misDatosJSON5 as $b) {
		list($k, $v, $f,) = $b;
		//list($k) = $b;
        echo "<br>";
		echo  $k ;
		//echo "<br>";
		//print_r  $v;
		//echo "<br>";
		//print_r  $f;
		
	}
	
	}
?>