$(document).ready(function () {  
	// Funcion para la Busqueda ********************************************
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$( "#botonb" ).click(function() {
		var p_CodEst 				= $("#cod_estant").val();
                var p_DescEst 				= $("#desc_estante").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAlmacen				= $("#id_almacen").val();
		var p_NumFilas 				= $("#num_filas").val();
		var p_NumColumnas			= $("#num_columnas").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodEst="+p_CodEst+"&gp_DescEst="+p_DescEst+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAlmacen="+p_IdAlmacen+"&gp_NumFilas="+p_NumFilas+"&gp_NumColumnas="+p_NumColumnas+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlEstantes/ctrlEstantes.php",
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
					
					$("#desc_estante").val(response.valor);
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$("#id_almacen").val(response.valor3);
					$("#num_filas").val(response.valor4);
					$("#num_columnas").val(response.valor5);
					
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
					
				$('#desc_estante').attr('disabled','-1');	
				$("#desc_estante").val('');
				$("#f_creacion").val(response.valor1);
				$("#usuario").val(response.valor2);
				$('#id_almacen').val(0);
				$('#id_almacen').attr('disabled','-1');
				$('#num_filas').val(0);
				$('#num_filas').attr('disabled','-1');
				$('#num_columnas').val(0);
				$('#num_columnas').attr('disabled','-1');
				
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
			  $('#desc_estante').attr('disabled','-1');
			  
            }
		
		});
		
		});
		
        // Funcion para la Insercion *******************************************
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botong" ).click(function() {
        var p_CodEst 				= $("#cod_estant").val();
        var p_DescEst 				= $("#desc_estante").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAlmacen				= $("#id_almacen").val();
		var p_NumFilas 				= $("#num_filas").val();
		var p_NumColumnas			= $("#num_columnas").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodEst="+p_CodEst+"&gp_DescEst="+p_DescEst+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAlmacen="+p_IdAlmacen+"&gp_NumFilas="+p_NumFilas+"&gp_NumColumnas="+p_NumColumnas+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlEstantes/ctrlEstantes.php",
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
					$('#cod_estant').val('');
					$('#desc_estante').val('');
					$('#desc_estante').attr('disabled','-1');
					$('#id_almacen').val(0);
					$('#id_almacen').attr('disabled','-1');
					$('#num_filas').val(0);
					$('#num_filas').attr('disabled','-1');
					$('#num_columnas').val(0);
					$('#num_columnas').attr('disabled','-1');
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_estantes.php");
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
        var p_CodEst 				= $("#cod_estant").val();
        var p_DescEst 				= $("#desc_estante").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAlmacen				= $("#id_almacen").val();
		var p_NumFilas 				= $("#num_filas").val();
		var p_NumColumnas			= $("#num_columnas").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodEst="+p_CodEst+"&gp_DescEst="+p_DescEst+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAlmacen="+p_IdAlmacen+"&gp_NumFilas="+p_NumFilas+"&gp_NumColumnas="+p_NumColumnas+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlEstantes/ctrlEstantes.php",
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
					$('#cod_estant').val('');
					$('#desc_estante').val('');
					$('#desc_estante').attr('disabled','-1');
					$('#id_almacen').val(0);
					$('#id_almacen').attr('disabled','-1');
					$('#num_filas').val(0);
					$('#num_filas').attr('disabled','-1');
					$('#num_columnas').val(0);
					$('#num_columnas').attr('disabled','-1');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_estantes.php");
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
        var p_CodEst 				= $("#cod_estant").val();
        var p_DescEst 				= $("#desc_estante").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAlmacen				= $("#id_almacen").val();
		var p_NumFilas 				= $("#num_filas").val();
		var p_NumColumnas			= $("#num_columnas").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodEst="+p_CodEst+"&gp_DescEst="+p_DescEst+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAlmacen="+p_IdAlmacen+"&gp_NumFilas="+p_NumFilas+"&gp_NumColumnas="+p_NumColumnas+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlEstantes/ctrlEstantes.php",
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
					
					$('#cod_estant').val('');
					$('#desc_estante').val('');
					$('#desc_estante').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_almacen').val(0);
					$('#id_almacen').attr('disabled','-1');
					$('#num_filas').val(0);
					$('#num_filas').attr('disabled','-1');
					$('#num_columnas').val(0);
					$('#num_columnas').attr('disabled','-1');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_estantes.php");
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
	
		// Funcion para el Boton Cancelar
		$( "#botonc" ).click(function() {
        var p_CodEst 				= $("#cod_estant").val();
        var p_DescEst 				= $("#desc_estante").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAlmacen				= $("#id_almacen").val();
		var p_NumFilas 				= $("#num_filas").val();
		var p_NumColumnas			= $("#num_columnas").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodEst="+p_CodEst+"&gp_DescEst="+p_DescEst+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAlmacen="+p_IdAlmacen+"&gp_NumFilas="+p_NumFilas+"&gp_NumColumnas="+p_NumColumnas+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlEstantes/ctrlEstantes.php",
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
										
					$('#cod_estant').val('');
					$('#desc_estante').val('');
					$('#desc_estante').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_almacen').val(0);
					$('#id_almacen').attr('disabled','-1');
					$('#num_filas').val(0);
					$('#num_filas').attr('disabled','-1');
					$('#num_columnas').val(0);
					$('#num_columnas').attr('disabled','-1');
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

