$(document).ready(function () {  
	// Funcion para la Busqueda ********************************************
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$( "#botonb" ).click(function() {
		var p_CodSucursal 			= $("#cod_sucursal").val();
                var p_DescSucursal			= $("#desc_sucursal").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdEmple 				= $("#id_emple").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_Lat	 				= $("#desc_latitud").val();
		var p_Long	 				= $("#desc_longitud").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodSuc="+p_CodSucursal+"&gp_DescSucursal="+p_DescSucursal+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdEmple="+p_IdEmple+"&gp_IdLoc="+p_IdLoc+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlSucursales/ctrlSucursales.php",
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
					
					$("#desc_sucursal").val(response.valor);
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$("#id_loc").val(response.valor3);
					$("#id_emple").val(response.valor4);
					$("#desc_latitud").val(response.valor5);
					$("#desc_longitud").val(response.valor6);
					
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
					
				$('#desc_sucursal').attr('disabled','-1');	
				$("#desc_sucursal").val('');
				$("#f_creacion").val(response.valor1);
				$("#usuario").val(response.valor2);
				$('#id_emple').val(0);
				$('#id_emple').attr('disabled','-1');
				$('#id_loc').val(0);
				$('#id_loc').attr('disabled','-1');
				$('#desc_latitud').val('');
				$('#desc_latitud').attr('disabled','-1');
				$('#desc_longitud').val('');
				$('#desc_longitud').attr('disabled','-1');
				
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
			  $('#desc_sucursal').attr('disabled','-1');
			  $('#id_emple').val(0);
				$('#id_emple').attr('disabled','-1');
				$('#id_loc').val(0);
				$('#id_loc').attr('disabled','-1');
				$('#desc_latitud').val('');
				$('#desc_latitud').attr('disabled','-1');
				$('#desc_longitud').val('');
				$('#desc_longitud').attr('disabled','-1');
			  
            }
		
		});
		
		});
		
        // Funcion para la Insercion *******************************************
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botong" ).click(function() {
        var p_CodSucursal 			= $("#cod_sucursal").val();
        var p_DescSucursal			= $("#desc_sucursal").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdEmple 				= $("#id_emple").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_Lat	 				= $("#desc_latitud").val();
		var p_Long	 				= $("#desc_longitud").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodSuc="+p_CodSucursal+"&gp_DescSucursal="+p_DescSucursal+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdEmple="+p_IdEmple+"&gp_IdLoc="+p_IdLoc+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_Op="+p_Op;
  $.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlSucursales/ctrlSucursales.php",
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
					
					$('#cod_sucursal').val('');
					$('#desc_sucursal').val('');
					$('#desc_sucursal').attr('disabled','-1');
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#desc_latitud').val('');
					$('#desc_longitud').val('');
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_sucursales.php");
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
			  $('#cod_sucursal').val('');
					$('#desc_sucursal').val('');
					$('#desc_sucursal').attr('disabled','-1');
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#desc_latitud').val('');
					$('#desc_longitud').val('');
			  
            }

      });

    });
		
	// Funcion para la Modificacion ****************************************
		// Parametros Enviados desde el Formulario -- Boton de Modificar
		$( "#botonm" ).click(function() {
                var p_CodSucursal 			= $("#cod_sucursal").val();
                var p_DescSucursal			= $("#desc_sucursal").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdEmple 				= $("#id_emple").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_Lat	 				= $("#desc_latitud").val();
		var p_Long	 				= $("#desc_longitud").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodSuc="+p_CodSucursal+"&gp_DescSucursal="+p_DescSucursal+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdEmple="+p_IdEmple+"&gp_IdLoc="+p_IdLoc+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlSucursales/ctrlSucursales.php",
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
					$('#cod_sucursal').val('');
					$('#desc_sucursal').val('');
					$('#desc_sucursal').attr('disabled','-1');
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#desc_latitud').val('');
					$('#desc_longitud').val('');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_sucursales.php");
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
				$('#cod_sucursal').val('');
				$('#desc_sucursal').val('');
				$('#desc_sucursal').attr('disabled','-1');
				$('#id_emple').val(0);
				$('#id_emple').attr('disabled','-1');
				$('#id_loc').val(0);
				$('#id_loc').attr('disabled','-1');
				$('#desc_latitud').val('');
				$('#desc_longitud').val('');
			  
            }

      });

    });
		
	// Funcion para la Eliminacion *****************************************
		// Parametros Enviados desde el Formulario -- Boton de Eliminar
		$( "#botone" ).click(function() {
                var p_CodSucursal 			= $("#cod_sucursal").val();
                var p_DescSucursal			= $("#desc_sucursal").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdEmple 				= $("#id_emple").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_Lat	 				= $("#desc_latitud").val();
		var p_Long	 				= $("#desc_longitud").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodSuc="+p_CodSucursal+"&gp_DescSucursal="+p_DescSucursal+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdEmple="+p_IdEmple+"&gp_IdLoc="+p_IdLoc+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlSucursales/ctrlSucursales.php",
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
					
					$('#cod_sucursal').val('');
					$('#desc_sucursal').val('');
					$('#desc_sucursal').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#desc_latitud').val('');
					$('#desc_longitud').val('');
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Formulario 
                                        $(location).attr('href',"v_mant_sucursales.php");
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
			  $('#cod_sucursal').val('');
					$('#desc_sucursal').val('');
					$('#desc_sucursal').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#desc_latitud').val('');
					$('#desc_longitud').val('');
			  			  
            }

      });

    });
	
		// Funcion para el Boton Cancelar
		$( "#botonc" ).click(function() {
        var p_CodSucursal 			= $("#cod_sucursal").val();
        var p_DescSucursal			= $("#desc_sucursal").val();
		var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_IdEmple 				= $("#id_emple").val();
		var p_IdLoc 				= $("#id_loc").val();
		var p_Lat	 				= $("#desc_latitud").val();
		var p_Long	 				= $("#desc_longitud").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodSuc="+p_CodSucursal+"&gp_DescSucursal="+p_DescSucursal+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_IdEmple="+p_IdEmple+"&gp_IdLoc="+p_IdLoc+"&gp_Lat="+p_Lat+"&gp_Long="+p_Long+"&gp_Op="+p_Op;
		$.ajax({
	  	type: "POST",
              url: "../../../ctrl/ctrlSucursales/ctrlSucursales.php",
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
										
					$('#cod_sucursal').val('');
					$('#desc_sucursal').val('');
					$('#desc_sucursal').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#desc_latitud').val('');
					$('#desc_longitud').val('');
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
			  $('#cod_sucursal').val('');
					$('#desc_sucursal').val('');
					$('#desc_sucursal').attr('disabled','-1');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$('#id_emple').val(0);
					$('#id_emple').attr('disabled','-1');
					$('#id_loc').val(0);
					$('#id_loc').attr('disabled','-1');
					$('#desc_latitud').val('');
					$('#desc_longitud').val('');
			  			  
            }

      });

    });

});//Fin del Script

