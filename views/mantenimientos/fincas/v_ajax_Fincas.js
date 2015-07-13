$(document).ready(function () {  
	// Funcion para la Busqueda ********************************************
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$( "#botonb" ).click(function() {
		var p_CodFinca 				= $("#cod_finca").val();
                var p_DescFinca 			= $("#desc_finca").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdColor 				= $("#id_color").val();
		var p_IdLocal 				= $("#id_localidad").val();
		var p_NumPuerta 			= $("#num_puerta").val();
		var p_NumBloque 			= $("#num_bloque").val();
		var p_NumCalle	 			= $("#num_calle").val();
		var p_NumPeatonal 			= $("#num_paetonal").val();
		var p_Lat 					= $("#latitud").val();
		var p_Long 					= $("#longitud").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodFinca="+p_CodFinca+"&gp_DescFinca="+p_DescFinca+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdColor="+p_IdColor+"&gp_IdLocal="+p_IdLocal+"&gp_NumPuerta="+p_NumPuerta+"&gp_NumBloque="+p_NumBloque+"&gp_NumCalle="+p_NumCalle+"&gp_NumPeatonal="+p_NumPeatonal+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_RefDir="+p_RefDir+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlFincas/ctrlFincas.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var find	= response.find;
                if (find == "ok" ) {
					setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
					
					$("#desc_finca").val(response.valor);
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$("#id_color").val(response.valor3);
					$("#id_localidad").val(response.valor4);
					$("#num_puerta").val(response.valor5);
					$("#num_bloque").val(response.valor6);
					$("#num_calle").val(response.valor7);
					$("#num_paetonal").val(response.valor8);
					$("#latitud").val(response.valor9);
					$("#longitud").val(response.valor10);
					$("#ref_dir").val(response.valor11);
					
					setTimeout(function () 
					{
						$("#alert_success").slideUp("slow");
					}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				  // Controles del Formulario
				  $('#botonc').attr('disabled','-1');
				  $('#botong').attr('disabled','-1');
				  $('#botone').attr('disabled','-1');
				  $('#botonm').attr('disabled','-1');
				  $('#boton').removeAttr('disabled');
				  $('#botonb').removeAttr('disabled');
					
				$('#desc_finca').attr('disabled','-1');	
				$("#desc_finca").val('');
				$("#f_creacion").val(response.valor1);
				$("#usuario").val(response.valor2);
				$('#id_color').val(0);
				$('#id_color').attr('disabled','-1');
				$('#id_localidad').val(0);
				$('#id_localidad').attr('disabled','-1');
				$('#num_puerta').val('');
				$('#num_puerta').attr('disabled','-1');
				$('#num_bloque').val('');
				$('#num_bloque').attr('disabled','-1');
				$('#num_calle').val('');
				$('#num_calle').attr('disabled','-1');
				$('#num_paetonal').val('');
				$('#num_paetonal').attr('disabled','-1');
				$('#latitud').val('');
				$('#latitud').attr('disabled','-1');
				$('#longitud').val('');
				$('#longitud').attr('disabled','-1');
				$('#ref_dir').val('');
				$('#ref_dir').attr('disabled','-1');
				
                setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se encontraron Datos");
			  $("#desc_tipo").val('');
			  $('#botonc').attr('disabled','-1');
			  $('#botong').attr('disabled','-1');
			  $('#botone').attr('disabled','-1');
			  $('#botonm').attr('disabled','-1');
			  $('#boton').removeAttr('disabled');
			  $('#botonb').removeAttr('disabled');	
			  $('#desc_finca').attr('disabled','-1');
			  
            }
		
		});
		
		});
		
        // Funcion para la Insercion *******************************************
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botong" ).click(function() {
        var p_CodFinca 				= $("#cod_finca").val();
        var p_DescFinca 			= $("#desc_finca").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdColor 				= $("#id_color").val();
		var p_IdLocal 				= $("#id_localidad").val();
		var p_NumPuerta 			= $("#num_puerta").val();
		var p_NumBloque 			= $("#num_bloque").val();
		var p_NumCalle	 			= $("#num_calle").val();
		var p_NumPeatonal 			= $("#num_paetonal").val();
		var p_Lat 					= $("#latitud").val();
		var p_Long 					= $("#longitud").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodFinca="+p_CodFinca+"&gp_DescFinca="+p_DescFinca+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdColor="+p_IdColor+"&gp_IdLocal="+p_IdLocal+"&gp_NumPuerta="+p_NumPuerta+"&gp_NumBloque="+p_NumBloque+"&gp_NumCalle="+p_NumCalle+"&gp_NumPeatonal="+p_NumPeatonal+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_RefDir="+p_RefDir+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlFincas/ctrlFincas.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var status = response.status
				var find	= response.find
                if (status == "si" ) {
					setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
					
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
					$('#botonc').attr('disabled','-1');
					$('#botong').attr('disabled','-1');
					$('#boton').removeAttr('disabled');
					$('#botonb').removeAttr('disabled');
					$('#cod_finca').val('');
					$('#desc_finca').val('');
					$('#desc_finca').attr('disabled','-1');
					$('#id_color').val(0);
					$('#id_color').attr('disabled','-1');
					$('#id_localidad').val(0);
					$('#id_localidad').attr('disabled','-1');
					$('#num_puerta').val('');
					$('#num_puerta').attr('disabled','-1');
					$('#num_bloque').val('');
					$('#num_bloque').attr('disabled','-1');
					$('#num_calle').val('');
					$('#num_calle').attr('disabled','-1');
					$('#num_paetonal').val('');
					$('#num_paetonal').attr('disabled','-1');
					$('#latitud').val('');
					$('#latitud').attr('disabled','-1');
					$('#longitud').val('');
					$('#longitud').attr('disabled','-1');
					$('#ref_dir').val('');
					$('#ref_dir').attr('disabled','-1');
                                        // Reiniciamos el Fomulario 
                                        $(location).attr('href',"v_mant_fincas.php");
					}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				//$("#po").val(response.Codigo);
                setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
			  
            }

      });

    });
		
	// Funcion para la Modificacion ****************************************
		// Parametros Enviados desde el Formulario -- Boton de Modificar
		$( "#botonm" ).click(function() {
                var p_CodFinca 				= $("#cod_finca").val();
                var p_DescFinca 			= $("#desc_finca").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdColor 				= $("#id_color").val();
		var p_IdLocal 				= $("#id_localidad").val();
		var p_NumPuerta 			= $("#num_puerta").val();
		var p_NumBloque 			= $("#num_bloque").val();
		var p_NumCalle	 			= $("#num_calle").val();
		var p_NumPeatonal 			= $("#num_paetonal").val();
		var p_Lat 					= $("#latitud").val();
		var p_Long 					= $("#longitud").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodFinca="+p_CodFinca+"&gp_DescFinca="+p_DescFinca+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdColor="+p_IdColor+"&gp_IdLocal="+p_IdLocal+"&gp_NumPuerta="+p_NumPuerta+"&gp_NumBloque="+p_NumBloque+"&gp_NumCalle="+p_NumCalle+"&gp_NumPeatonal="+p_NumPeatonal+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_RefDir="+p_RefDir+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlFincas/ctrlFincas.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var mod = response.mod;
				if (mod == "si" ) {
					setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
					
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#cod_finca').val('');
					$('#desc_finca').val('');
					$('#desc_finca').attr('disabled','-1');
					$('#id_color').val(0);
					$('#id_color').attr('disabled','-1');
					$('#id_localidad').val(0);
					$('#id_localidad').attr('disabled','-1');
					$('#num_puerta').val('');
					$('#num_puerta').attr('disabled','-1');
					$('#num_bloque').val('');
					$('#num_bloque').attr('disabled','-1');
					$('#num_calle').val('');
					$('#num_calle').attr('disabled','-1');
					$('#num_paetonal').val('');
					$('#num_paetonal').attr('disabled','-1');
					$('#latitud').val('');
					$('#latitud').attr('disabled','-1');
					$('#longitud').val('');
					$('#longitud').attr('disabled','-1');
					$('#ref_dir').val('');
					$('#ref_dir').attr('disabled','-1');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Fomulario 
                                        $(location).attr('href',"v_mant_fincas.php");
					}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
			  
            }

      });

    });
		
	// Funcion para la Eliminacion *****************************************
		// Parametros Enviados desde el Formulario -- Boton de Eliminar
		$( "#botone" ).click(function() {
                var p_CodFinca 				= $("#cod_finca").val();
                var p_DescFinca 			= $("#desc_finca").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdColor 				= $("#id_color").val();
		var p_IdLocal 				= $("#id_localidad").val();
		var p_NumPuerta 			= $("#num_puerta").val();
		var p_NumBloque 			= $("#num_bloque").val();
		var p_NumCalle	 			= $("#num_calle").val();
		var p_NumPeatonal 			= $("#num_paetonal").val();
		var p_Lat 					= $("#latitud").val();
		var p_Long 					= $("#longitud").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodFinca="+p_CodFinca+"&gp_DescFinca="+p_DescFinca+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdColor="+p_IdColor+"&gp_IdLocal="+p_IdLocal+"&gp_NumPuerta="+p_NumPuerta+"&gp_NumBloque="+p_NumBloque+"&gp_NumCalle="+p_NumCalle+"&gp_NumPeatonal="+p_NumPeatonal+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_RefDir="+p_RefDir+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlFincas/ctrlFincas.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var del = response.del;
				if (del == "si" ) {
					setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
					
					$('#botonc').attr('disabled','-1');
					$('#botong').attr('disabled','-1');
					$('#botonm').attr('disabled','-1');
					$('#botone').attr('disabled','-1');
					$('#boton').removeAttr('disabled');
					$('#botonb').removeAttr('disabled');
					
					$('#cod_finca').val('');
					$('#desc_finca').val('');
					$('#desc_finca').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_color').val(0);
					$('#id_color').attr('disabled','-1');
					$('#id_localidad').val(0);
					$('#id_localidad').attr('disabled','-1');
					$('#num_puerta').val('');
					$('#num_puerta').attr('disabled','-1');
					$('#num_bloque').val('');
					$('#num_bloque').attr('disabled','-1');
					$('#num_calle').val('');
					$('#num_calle').attr('disabled','-1');
					$('#num_paetonal').val('');
					$('#num_paetonal').attr('disabled','-1');
					$('#latitud').val('');
					$('#latitud').attr('disabled','-1');
					$('#longitud').val('');
					$('#longitud').attr('disabled','-1');
					$('#ref_dir').val('');
					$('#ref_dir').attr('disabled','-1');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Fomulario 
                                        $(location).attr('href',"v_mant_fincas.php");
					}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				
				setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
			  			  
            }

      });

    });
	
	// Funcion para el Boton Cancelar **************************************
		$( "#botonc" ).click(function() {
        var p_CodFinca 				= $("#cod_finca").val();
        var p_DescFinca 			= $("#desc_finca").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdColor 				= $("#id_color").val();
		var p_IdLocal 				= $("#id_localidad").val();
		var p_NumPuerta 			= $("#num_puerta").val();
		var p_NumBloque 			= $("#num_bloque").val();
		var p_NumCalle	 			= $("#num_calle").val();
		var p_NumPeatonal 			= $("#num_paetonal").val();
		var p_Lat 					= $("#latitud").val();
		var p_Long 					= $("#longitud").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodFinca="+p_CodFinca+"&gp_DescFinca="+p_DescFinca+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdColor="+p_IdColor+"&gp_IdLocal="+p_IdLocal+"&gp_NumPuerta="+p_NumPuerta+"&gp_NumBloque="+p_NumBloque+"&gp_NumCalle="+p_NumCalle+"&gp_NumPeatonal="+p_NumPeatonal+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_RefDir="+p_RefDir+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlFincas/ctrlFincas.php",
              data: data,
              timeout:3000,
              dataType: 'json',
               beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var cancel = response.cancel;
				if (cancel == "si" ) {
					setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
										
					$('#cod_finca').val('');
					$('#desc_finca').val('');
					$('#desc_finca').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_color').val(0);
					$('#id_color').attr('disabled','-1');
					$('#id_localidad').val(0);
					$('#id_localidad').attr('disabled','-1');
					$('#num_puerta').val('');
					$('#num_puerta').attr('disabled','-1');
					$('#num_bloque').val('');
					$('#num_bloque').attr('disabled','-1');
					$('#num_calle').val('');
					$('#num_calle').attr('disabled','-1');
					$('#num_paetonal').val('');
					$('#num_paetonal').attr('disabled','-1');
					$('#latitud').val('');
					$('#latitud').attr('disabled','-1');
					$('#longitud').val('');
					$('#longitud').attr('disabled','-1');
					$('#ref_dir').val('');
					$('#ref_dir').attr('disabled','-1');
					
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
					}, 1000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				
				setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo procesar su solicitud");
			  			  
            }

      });

    });

});//Fin del Script

