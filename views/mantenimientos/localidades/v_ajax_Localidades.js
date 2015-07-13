$(document).ready(function () {  
	// Funcion para la Busqueda ********************************************
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$( "#botonb" ).click(function() {
		var p_CodLoc 				= $("#cod_loc").val();
                var p_DescLoc 				= $("#desc_loc").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAldea 				= $("#id_aldea").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_IdArea 				= $("#id_area").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodLoc="+p_CodLoc+"&gp_DescLoc="+p_DescLoc+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAldea="+p_IdAldea+"&gp_IdLoc="+p_IdLoc+"&gp_IdArea="+p_IdArea+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlLocalidades/ctrlLocalidades.php",
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
					
					$("#desc_loc").val(response.valor);
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$("#id_aldea").val(response.valor3);
					$("#id_loc").val(response.valor4);
					$("#id_area").val(response.valor5);
					
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
					
				$('#desc_loc').attr('disabled','-1');	
				$("#desc_loc").val('');
				$("#f_creacion").val(response.valor1);
				$("#usuario").val(response.valor2);
				$('#id_aldea').val(0);
				$('#id_aldea').attr('disabled','-1');
				$('#id_loc').val(0);
				$('#id_loc').attr('disabled','-1');
				$('#id_area').val(0);
				$('#id_area').attr('disabled','-1');
				
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
			  $('#desc_loc').attr('disabled','-1');
			  
            }
		
		});
		
		});
		
        // Funcion para la Insercion *******************************************
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botong" ).click(function() {
                var p_CodLoc 				= $("#cod_loc").val();
                var p_DescLoc 				= $("#desc_loc").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAldea 				= $("#id_aldea").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_IdArea 				= $("#id_area").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodLoc="+p_CodLoc+"&gp_DescLoc="+p_DescLoc+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAldea="+p_IdAldea+"&gp_IdLoc="+p_IdLoc+"&gp_IdArea="+p_IdArea+"&gp_Op="+p_Op;
  $.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlLocalidades/ctrlLocalidades.php",
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
					$('#cod_loc').val('');
					$('#desc_loc').val('');
					$('#desc_loc').attr('disabled','-1');
					$('#id_aldea').val(0);
					$('#id_aldea').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#id_area').val(0);
					$('#id_area').attr('disabled','-1');
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_localidades.php");
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
                var p_CodLoc 				= $("#cod_loc").val();
                var p_DescLoc 				= $("#desc_loc").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAldea 				= $("#id_aldea").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_IdArea 				= $("#id_area").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodLoc="+p_CodLoc+"&gp_DescLoc="+p_DescLoc+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAldea="+p_IdAldea+"&gp_IdLoc="+p_IdLoc+"&gp_IdArea="+p_IdArea+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlLocalidades/ctrlLocalidades.php",
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
					$('#cod_loc').val('');
					$('#desc_loc').val('');
					$('#desc_loc').attr('disabled','-1');
					$('#id_aldea').val(0);
					$('#id_aldea').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#id_area').val(0);
					$('#id_area').attr('disabled','-1');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_localidades.php");
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
                var p_CodLoc 				= $("#cod_loc").val();
                var p_DescLoc 				= $("#desc_loc").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAldea 				= $("#id_aldea").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_IdArea 				= $("#id_area").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodLoc="+p_CodLoc+"&gp_DescLoc="+p_DescLoc+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAldea="+p_IdAldea+"&gp_IdLoc="+p_IdLoc+"&gp_IdArea="+p_IdArea+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlLocalidades/ctrlLocalidades.php",
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
					
					$('#cod_loc').val('');
					$('#desc_loc').val('');
					$('#desc_loc').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_aldea').val(0);
					$('#id_aldea').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#id_area').val(0);
					$('#id_area').attr('disabled','-1');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_localidades.php");
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
                var p_CodLoc 				= $("#cod_loc").val();
                var p_DescLoc 				= $("#desc_loc").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdAldea 				= $("#id_aldea").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_IdArea 				= $("#id_area").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodLoc="+p_CodLoc+"&gp_DescLoc="+p_DescLoc+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdAldea="+p_IdAldea+"&gp_IdLoc="+p_IdLoc+"&gp_IdArea="+p_IdArea+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlLocalidades/ctrlLocalidades.php",
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
										
					$('#cod_loc').val('');
					$('#desc_loc').val('');
					$('#desc_loc').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_aldea').val(0);
					$('#id_aldea').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#id_area').val(0);
					$('#id_area').attr('disabled','-1');
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

