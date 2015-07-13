$(document).ready(function () {  
	// Funcion para la Busqueda ***************************************************
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$( "#botonb" ).click(function() {
		var p_CodTipo 			= $("#cod_tipo").val();
                var p_DescTipo 			= $("#desc_tipo").val();
		var p_FeCreacion 		= $("#f_creacion").val();
		var p_Programa 			= $("#programa").val();
		var p_Usuario 			= $("#usuario").val();
		var p_IdGrupo 			= $("#id_grupo").val();
		var p_Observaciones 		= $("#observaciones").val();
		var p_Op			= $("#op").val();
		
                var data = "gp_CodTipo="+p_CodTipo+"&gp_DescTipo="+p_DescTipo+"&gp_FeCreacion="+p_FeCreacion+"\
                            &gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdGrupo="+p_IdGrupo+"\
                            &gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		//alert( "Puhs Buscar."+p_CodCat);
		$.ajax({
		    type: "POST",
                    url: "../../../ctrl/ctrlTiposProductos/ctrlTiposProductos.php",
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

                                $("#desc_tipo").val(response.valor);
                                $("#f_creacion").val(response.valor1);
                                $("#usuario").val(response.valor2);
                                $("#id_grupo").val(response.valor3);
                                $("#observaciones").val(response.valor4);

                                setTimeout(function () 
                                {
                                    //$(location).attr('href',"v_mant_categorias.php");
                                    $("#alert_success").slideUp("slow");
                                }, 2000);
                            });

            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				//$("#po").val(response.Codigo);
				$("#desc_tipo").val('');
				  $('#botonc').attr('disabled','-1');
				  $('#botong').attr('disabled','-1');
				  $('#botone').attr('disabled','-1');
				  $('#botonm').attr('disabled','-1');
				  $('#boton').removeAttr('disabled');
				  $('#botonb').removeAttr('disabled');	
				  $('#desc_tipo').attr('disabled','-1');	
				$("#desc_tipo").val('');
				$("#f_creacion").val(response.valor1);
				$("#usuario").val(response.valor2);
				$('#observaciones').val('');
			  $('#observaciones').attr('disabled','-1');
			  $('#id_grupo').val(0);
			  $('#id_grupo').attr('disabled','-1');
				
				
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
			  $('#desc_tipo').attr('disabled','-1');
			  
            }
		
		});
		
		});
		
        // Funcion para la Insercion **************************************************
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botong" ).click(function() {
                var p_CodTipo 				= $("#cod_tipo").val();
                var p_DescTipo 				= $("#desc_tipo").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdGrupo 				= $("#id_grupo").val();
		var p_Observaciones 		= $("#observaciones").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodTipo="+p_CodTipo+"&gp_DescTipo="+p_DescTipo+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdGrupo="+p_IdGrupo+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
  $.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlTiposProductos/ctrlTiposProductos.php",
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
					//$("#po").val(response.valor); Prueba del esponse del PHP
					
					setTimeout(function () 
					{
					//$(location).attr('href',"v_mant_categorias.php");
					$("#alert_success").slideUp("slow");
					$('#botonc').attr('disabled','-1');
					$('#botong').attr('disabled','-1');
					$('#boton').removeAttr('disabled');
					$('#botonb').removeAttr('disabled');
					$('#cod_tipo').val('');
					$('#desc_tipo').val('');
					$('#desc_tipo').attr('disabled','-1');
					$('#observaciones').val('');
					$('#observaciones').attr('disabled','-1');
					$('#id_grupo').val(0);
					$('#id_grupo').attr('disabled','-1');
                                        
                                        // Reiniciamoas el Formulario
                                        $(location).attr('href',"v_mant_tipos_productos.php");
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
		
	// Funcion para la Modificacion ************************************************
		// Parametros Enviados desde el Formulario -- Boton de Modificar
		$( "#botonm" ).click(function() {
                var p_CodTipo 				= $("#cod_tipo").val();
                var p_DescTipo 				= $("#desc_tipo").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdGrupo 				= $("#id_grupo").val();
		var p_Observaciones 		= $("#observaciones").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodTipo="+p_CodTipo+"&gp_DescTipo="+p_DescTipo+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdGrupo="+p_IdGrupo+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlTiposProductos/ctrlTiposProductos.php",
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
					$('#cod_tipo').val('');
					$('#desc_tipo').val('');
					$('#desc_tipo').attr('disabled','-1');
					$('#id_grupo').val(0);
					$('#id_grupo').attr('disabled','-1');
					$('#observaciones').val('');
					$('#observaciones').attr('disabled','-1');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_tipos_productos.php");
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
		
	// Funcion para la Eliminacion *************************************************
		// Parametros Enviados desde el Formulario -- Boton de Eliminar
		$( "#botone" ).click(function() {
                var p_CodTipo 				= $("#cod_tipo").val();
                var p_DescTipo 				= $("#desc_tipo").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdGrupo 				= $("#id_grupo").val();
		var p_Observaciones 		= $("#observaciones").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodTipo="+p_CodTipo+"&gp_DescTipo="+p_DescTipo+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdGrupo="+p_IdGrupo+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlTiposProductos/ctrlTiposProductos.php",
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
					$('#cod_tipo').val('');
					$('#desc_tipo').val('');
					$('#desc_tipo').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#observaciones').val('');
					$('#observaciones').attr('disabled','-1');
					$('#id_grupo').val(0);
					$('#id_grupo').attr('disabled','-1');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        
                                        // Reiniciamos el Formulario
                                        $(location).attr('href',"v_mant_tipos_productos.php");
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
	
	// Funcion para el Boton Cancelar ***********************************************
		$( "#botonc" ).click(function() {
                var p_CodTipo 				= $("#cod_tipo").val();
                var p_DescTipo 				= $("#desc_tipo").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdGrupo 				= $("#id_grupo").val();
		var p_Observaciones 		= $("#observaciones").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodTipo="+p_CodTipo+"&gp_DescTipo="+p_DescTipo+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdGrupo="+p_IdGrupo+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlTiposProductos/ctrlTiposProductos.php",
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
										
					$('#cod_tipo').val('');
					$('#desc_tipo').val('');
					$('#desc_tipo').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
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

