$(document).ready(function () {  
	// Funcion para la Busqueda ********************************************
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$("#botonb").click(function() {
		var p_CodAlm 				= $("#cod_alm").val();
                var p_DescAlm 				= $("#desc_alm").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdSucursal			= $("#id_sucursal").val();
		var p_NumEstantes			= $("#num_estantes").val();
		var p_IdEmpleado			= $("#id_emple").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodAlm="+p_CodAlm+"&gp_DescAlm="+p_DescAlm+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdSucursal="+p_IdSucursal+"&gp_NumEstantes="+p_NumEstantes+"&gp_IdEmpleado="+p_IdEmpleado+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlAlmacenes/ctrlAlmacenes.php",
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
					
					$("#desc_alm").val(response.valor);
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$("#id_sucursal").val(response.valor3);
					$("#id_emple").val(response.valor4);
					$("#num_estantes").val(response.valor5);
					
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
					
				$('#desc_alm').attr('disabled','-1');	
				$("#desc_alm").val('');
				$("#f_creacion").val(response.valor1);
				$("#usuario").val(response.valor2);
				$('#id_sucursal').val(0);
				$('#id_sucursal').attr('disabled','-1');
				$('#id_emple').val(0);
				$('#id_emple').attr('disabled','-1');
				$('#num_estantes').attr('disabled','-1');
				
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
			  $('#desc_alm').attr('disabled','-1');
			  
            }
		
		});
		
		});
		
        // Funcion para la Insercion *******************************************
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botong" ).click(function() {
        var p_CodAlm 				= $("#cod_alm").val();
        var p_DescAlm 				= $("#desc_alm").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdSucursal			= $("#id_sucursal").val();
		var p_NumEstantes			= $("#num_estantes").val();
		var p_IdEmpleado			= $("#id_emple").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodAlm="+p_CodAlm+"&gp_DescAlm="+p_DescAlm+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdSucursal="+p_IdSucursal+"&gp_NumEstantes="+p_NumEstantes+"&gp_IdEmpleado="+p_IdEmpleado+"&gp_Op="+p_Op;
  $.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlAlmacenes/ctrlAlmacenes.php",
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
					
					$('#cod_alm').val('');
					$('#desc_alm').val('');
					$('#desc_alm').attr('disabled','-1');
					$('#id_sucursal').val(0);
					$('#id_sucursal').attr('disabled','-1');
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#num_estantes').attr('disabled','-1');
					$('#num_estantes').val('');
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_almacenes.php");
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
                var p_CodAlm 				= $("#cod_alm").val();
                var p_DescAlm 				= $("#desc_alm").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdSucursal			= $("#id_sucursal").val();
		var p_NumEstantes			= $("#num_estantes").val();
		var p_IdEmpleado			= $("#id_emple").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodAlm="+p_CodAlm+"&gp_DescAlm="+p_DescAlm+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdSucursal="+p_IdSucursal+"&gp_NumEstantes="+p_NumEstantes+"&gp_IdEmpleado="+p_IdEmpleado+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlAlmacenes/ctrlAlmacenes.php",
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
					$('#cod_alm').val('');
					$('#desc_alm').val('');
					$('#desc_alm').attr('disabled','-1');
					$('#id_sucursal').val(0);
					$('#id_sucursal').attr('disabled','-1');
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#num_estantes').attr('disabled','-1');
					$('#num_estantes').val('');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_almacenes.php");
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
                var p_CodAlm 				= $("#cod_alm").val();
                var p_DescAlm 				= $("#desc_alm").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdSucursal			= $("#id_sucursal").val();
		var p_NumEstantes			= $("#num_estantes").val();
		var p_IdEmpleado			= $("#id_emple").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodAlm="+p_CodAlm+"&gp_DescAlm="+p_DescAlm+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdSucursal="+p_IdSucursal+"&gp_NumEstantes="+p_NumEstantes+"&gp_IdEmpleado="+p_IdEmpleado+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlAlmacenes/ctrlAlmacenes.php",
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
					
					$('#cod_alm').val('');
					$('#desc_alm').val('');
					$('#desc_alm').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_sucursal').val(0);
					$('#id_sucursal').attr('disabled','-1');
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#num_estantes').attr('disabled','-1');
					$('#num_estantes').val('');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_almacenes.php");
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
                var p_CodAlm 				= $("#cod_alm").val();
                var p_DescAlm 				= $("#desc_alm").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdSucursal			= $("#id_sucursal").val();
		var p_NumEstantes			= $("#num_estantes").val();
		var p_IdEmpleado			= $("#id_emple").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodAlm="+p_CodAlm+"&gp_DescAlm="+p_DescAlm+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdSucursal="+p_IdSucursal+"&gp_NumEstantes="+p_NumEstantes+"&gp_IdEmpleado="+p_IdEmpleado+"&gp_Op="+p_Op;
		
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlAlmacenes/ctrlAlmacenes.php",
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
										
					$('#cod_alm').val('');
					$('#desc_alm').val('');
					$('#desc_alm').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_sucursal').val(0);
					$('#id_sucursal').attr('disabled','-1');
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#num_estantes').attr('disabled','-1');
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

