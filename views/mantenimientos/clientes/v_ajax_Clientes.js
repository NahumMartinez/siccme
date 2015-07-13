$(document).ready(function () {  
	// Funcion para la Busqueda ********************************************
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$( "#botonb" ).click(function() {
		var p_CodCli 				= $("#cod_cli").val();
                var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_NumIdentidad 			= $("#num_identidad").val();
		var p_NomName1	 			= $("#nombre_1").val();
		var p_NomName2				= $("#nombre_2").val();
		var p_Apelli1				= $("#apellido_1").val();
		var p_Apelli2 				= $("#apellido_2").val();
		var p_Telefono				= $("#telefono").val();
		var p_Celular 				= $("#celular").val();
		var p_EMail					= $("#email").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_IdTipoCli				= $("#id_tipo_cli").val();
		var p_IdEstCli				= $("#id_estado_cli").val();
		var p_FeNacimiento			= $("#f_nacimiento").val();
		var p_CodPers				= $("#cod_pers").val();
		var p_IdPersona				= $("#id_persona").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodCli="+p_CodCli+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_NumIdentidad="+p_NumIdentidad+"&gp_NomName1="+p_NomName1+"&gp_NomName2="+p_NomName2+"&gp_Apelli1="+p_Apelli1+"&gp_Apelli2="+p_Apelli2+"&gp_Telefono="+p_Telefono+"&gp_Celular="+p_Celular+"&gp_Email="+p_EMail+"&gp_RefDir="+p_RefDir+"&gp_IdTipoCli="+p_IdTipoCli+"&gp_IdEstCli="+p_IdEstCli+"&gp_FeNacimiento="+p_FeNacimiento+"&gp_CodPers="+p_CodPers+"&gp_IdPersona="+p_IdPersona+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlClientes/ctrlClientes.php",
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
										
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					$("#num_identidad").val(response.valor3);
					$("#nombre_1").val(response.valor4);
					$("#nombre_2").val(response.valor5);
					$("#apellido_1").val(response.valor6);
					$("#apellido_2").val(response.valor7);
					$("#telefono").val(response.valor8);
					$("#celular").val(response.valor9);
					$("#email").val(response.valor10);
					$("#id_tipo_cli").val(response.valor11);
					$("#id_estado_cli").val(response.valor12);
					$("#cod_pers").val(response.valor13);
					$("#ref_dir").val(response.valor14);
					$("#id_persona").val(response.valor15);
					$("#f_nacimiento").val(response.valor16);
										
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
				  $('#botonbc').attr('disabled','-1'); 	
				
				$("#f_creacion").val(response.valor1);
				$("#usuario").val(response.valor2);
				$('#cod_pers').val('');
					$('#cod_pers').attr('disabled','-1');		
					$('#num_identidad').val('');
					$('#num_identidad').attr('disabled','-1');
					$('#nombre_1').val('');
					$('#nombre_1').attr('disabled','-1');
					$('#nombre_2').val('');
					$('#nombre_2').attr('disabled','-1');
					$('#apellido_1').val('');
					$('#apellido_1').attr('disabled','-1');
					$('#apellido_2').val('');
					$('#apellido_2').attr('disabled','-1');
					$('#telefono').val('');
					$('#telefono').attr('disabled','-1');
					$('#celular').val('');
					$('#celular').attr('disabled','-1');
					$('#email').val('');
					$('#email').attr('disabled','-1');
					$('#ref_dir').val('');
					$('#ref_dir').attr('disabled','-1');
					$('#id_tipo_cli').val(0);
					$('#id_tipo_cli').attr('disabled','-1');
					$('#id_estado_cli').val(0);
					$('#id_estado_cli').attr('disabled','-1');
					$('#f_nacimiento').val('');
					$('#f_nacimiento').attr('disabled','-1');
					$('#id_persona').val(0);
				
				
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
			  		  
			  
            }
		
		});
		
		});
		
        // Funcion para la Insercion *******************************************
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botong" ).click(function() {
        var p_CodCli 				= $("#cod_cli").val();
        var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_NumIdentidad 			= $("#num_identidad").val();
		var p_NomName1	 			= $("#nombre_1").val();
		var p_NomName2				= $("#nombre_2").val();
		var p_Apelli1				= $("#apellido_1").val();
		var p_Apelli2 				= $("#apellido_2").val();
		var p_Telefono				= $("#telefono").val();
		var p_Celular 				= $("#celular").val();
		var p_EMail					= $("#email").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_IdTipoCli				= $("#id_tipo_cli").val();
		var p_IdEstCli				= $("#id_estado_cli").val();
		var p_FeNacimiento			= $("#f_nacimiento").val();
		var p_CodPers				= $("#cod_pers").val();
		var p_IdPersona				= $("#id_persona").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodCli="+p_CodCli+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_NumIdentidad="+p_NumIdentidad+"&gp_NomName1="+p_NomName1+"&gp_NomName2="+p_NomName2+"&gp_Apelli1="+p_Apelli1+"&gp_Apelli2="+p_Apelli2+"&gp_Telefono="+p_Telefono+"&gp_Celular="+p_Celular+"&gp_Email="+p_EMail+"&gp_RefDir="+p_RefDir+"&gp_IdTipoCli="+p_IdTipoCli+"&gp_IdEstCli="+p_IdEstCli+"&gp_FeNacimiento="+p_FeNacimiento+"&gp_CodPers="+p_CodPers+"&gp_IdPersona="+p_IdPersona+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlClientes/ctrlClientes.php",
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
					$('#botonbc').attr('disabled','-1');
					
					$('#cod_cli').val('');
					$('#cod_pers').val('');
					$('#cod_pers').attr('disabled','-1');		
					$('#num_identidad').val('');
					$('#num_identidad').attr('disabled','-1');
					$('#nombre_1').val('');
					$('#nombre_1').attr('disabled','-1');
					$('#nombre_2').val('');
					$('#nombre_2').attr('disabled','-1');
					$('#apellido_1').val('');
					$('#apellido_1').attr('disabled','-1');
					$('#apellido_2').val('');
					$('#apellido_2').attr('disabled','-1');
					$('#telefono').val('');
					$('#telefono').attr('disabled','-1');
					$('#celular').val('');
					$('#celular').attr('disabled','-1');
					$('#email').val('');
					$('#email').attr('disabled','-1');
					$('#ref_dir').val('');
					$('#ref_dir').attr('disabled','-1');
					$('#id_tipo_cli').val(0);
					$('#id_tipo_cli').attr('disabled','-1');
					$('#id_estado_cli').val(0);
					$('#id_estado_cli').attr('disabled','-1');
					$('#f_nacimiento').val('');
					$('#f_nacimiento').attr('disabled','-1');
					$('#id_persona').val(0);
                                        // Reiniciamos el Fomulario 
                                        $(location).attr('href',"v_mant_clientes.php");
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
                var p_CodCli 				= $("#cod_cli").val();
                var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_NumIdentidad 			= $("#num_identidad").val();
		var p_NomName1	 			= $("#nombre_1").val();
		var p_NomName2				= $("#nombre_2").val();
		var p_Apelli1				= $("#apellido_1").val();
		var p_Apelli2 				= $("#apellido_2").val();
		var p_Telefono				= $("#telefono").val();
		var p_Celular 				= $("#celular").val();
		var p_EMail					= $("#email").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_IdTipoCli				= $("#id_tipo_cli").val();
		var p_IdEstCli				= $("#id_estado_cli").val();
		var p_FeNacimiento			= $("#f_nacimiento").val();
		var p_CodPers				= $("#cod_pers").val();
		var p_IdPersona				= $("#id_persona").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodCli="+p_CodCli+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_NumIdentidad="+p_NumIdentidad+"&gp_NomName1="+p_NomName1+"&gp_NomName2="+p_NomName2+"&gp_Apelli1="+p_Apelli1+"&gp_Apelli2="+p_Apelli2+"&gp_Telefono="+p_Telefono+"&gp_Celular="+p_Celular+"&gp_Email="+p_EMail+"&gp_RefDir="+p_RefDir+"&gp_IdTipoCli="+p_IdTipoCli+"&gp_IdEstCli="+p_IdEstCli+"&gp_FeNacimiento="+p_FeNacimiento+"&gp_CodPers="+p_CodPers+"&gp_IdPersona="+p_IdPersona+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlClientes/ctrlClientes.php",
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
					
					$('#cod_cli').val('');
					
				$('#cod_pers').val('');
					$('#cod_pers').attr('disabled','-1');		
					$('#num_identidad').val('');
					$('#num_identidad').attr('disabled','-1');
					$('#nombre_1').val('');
					$('#nombre_1').attr('disabled','-1');
					$('#nombre_2').val('');
					$('#nombre_2').attr('disabled','-1');
					$('#apellido_1').val('');
					$('#apellido_1').attr('disabled','-1');
					$('#apellido_2').val('');
					$('#apellido_2').attr('disabled','-1');
					$('#telefono').val('');
					$('#telefono').attr('disabled','-1');
					$('#celular').val('');
					$('#celular').attr('disabled','-1');
					$('#email').val('');
					$('#email').attr('disabled','-1');
					$('#ref_dir').val('');
					$('#ref_dir').attr('disabled','-1');
					$('#id_tipo_cli').val(0);
					$('#id_tipo_cli').attr('disabled','-1');
					$('#id_estado_cli').val(0);
					$('#id_estado_cli').attr('disabled','-1');
					$('#f_nacimiento').val('');
					$('#f_nacimiento').attr('disabled','-1');
					$('#id_persona').val(0);
				
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Fomulario 
                                        $(location).attr('href',"v_mant_clientes.php");
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
                var p_CodCli 				= $("#cod_cli").val();
                var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_NumIdentidad 			= $("#num_identidad").val();
		var p_NomName1	 			= $("#nombre_1").val();
		var p_NomName2				= $("#nombre_2").val();
		var p_Apelli1				= $("#apellido_1").val();
		var p_Apelli2 				= $("#apellido_2").val();
		var p_Telefono				= $("#telefono").val();
		var p_Celular 				= $("#celular").val();
		var p_EMail					= $("#email").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_IdTipoCli				= $("#id_tipo_cli").val();
		var p_IdEstCli				= $("#id_estado_cli").val();
		var p_FeNacimiento			= $("#f_nacimiento").val();
		var p_CodPers				= $("#cod_pers").val();
		var p_IdPersona				= $("#id_persona").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodCli="+p_CodCli+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_NumIdentidad="+p_NumIdentidad+"&gp_NomName1="+p_NomName1+"&gp_NomName2="+p_NomName2+"&gp_Apelli1="+p_Apelli1+"&gp_Apelli2="+p_Apelli2+"&gp_Telefono="+p_Telefono+"&gp_Celular="+p_Celular+"&gp_Email="+p_EMail+"&gp_RefDir="+p_RefDir+"&gp_IdTipoCli="+p_IdTipoCli+"&gp_IdEstCli="+p_IdEstCli+"&gp_FeNacimiento="+p_FeNacimiento+"&gp_CodPers="+p_CodPers+"&gp_IdPersona="+p_IdPersona+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlClientes/ctrlClientes.php",
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
					
					$('#cod_cli').val('');
					
				$('#cod_pers').val('');
					$('#cod_pers').attr('disabled','-1');		
					$('#num_identidad').val('');
					$('#num_identidad').attr('disabled','-1');
					$('#nombre_1').val('');
					$('#nombre_1').attr('disabled','-1');
					$('#nombre_2').val('');
					$('#nombre_2').attr('disabled','-1');
					$('#apellido_1').val('');
					$('#apellido_1').attr('disabled','-1');
					$('#apellido_2').val('');
					$('#apellido_2').attr('disabled','-1');
					$('#telefono').val('');
					$('#telefono').attr('disabled','-1');
					$('#celular').val('');
					$('#celular').attr('disabled','-1');
					$('#email').val('');
					$('#email').attr('disabled','-1');
					$('#ref_dir').val('');
					$('#ref_dir').attr('disabled','-1');
					$('#id_tipo_cli').val(0);
					$('#id_tipo_cli').attr('disabled','-1');
					$('#id_estado_cli').val(0);
					$('#id_estado_cli').attr('disabled','-1');
					$('#f_nacimiento').val('');
					$('#f_nacimiento').attr('disabled','-1');
					$('#id_persona').val(0);
				
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
                                        // Reiniciamos el Fomulario 
                                        $(location).attr('href',"v_mant_clientes.php");
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
        var p_CodCli 				= $("#cod_cli").val();
        var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_NumIdentidad 			= $("#num_identidad").val();
		var p_NomName1	 			= $("#nombre_1").val();
		var p_NomName2				= $("#nombre_2").val();
		var p_Apelli1				= $("#apellido_1").val();
		var p_Apelli2 				= $("#apellido_2").val();
		var p_Telefono				= $("#telefono").val();
		var p_Celular 				= $("#celular").val();
		var p_EMail					= $("#email").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_IdTipoCli				= $("#id_tipo_cli").val();
		var p_IdEstCli				= $("#id_estado_cli").val();
		var p_FeNacimiento			= $("#f_nacimiento").val();
		var p_CodPers				= $("#cod_pers").val();
		var p_IdPersona				= $("#id_persona").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodCli="+p_CodCli+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+"&gp_Usuario="+p_Usuario+"&gp_NumIdentidad="+p_NumIdentidad+"&gp_NomName1="+p_NomName1+"&gp_NomName2="+p_NomName2+"&gp_Apelli1="+p_Apelli1+"&gp_Apelli2="+p_Apelli2+"&gp_Telefono="+p_Telefono+"&gp_Celular="+p_Celular+"&gp_Email="+p_EMail+"&gp_RefDir="+p_RefDir+"&gp_IdTipoCli="+p_IdTipoCli+"&gp_IdEstCli="+p_IdEstCli+"&gp_FeNacimiento="+p_FeNacimiento+"&gp_CodPers="+p_CodPers+"&gp_IdPersona="+p_IdPersona+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlClientes/ctrlClientes.php",
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
										
					$('#cod_cli').val('');
					$("#f_creacion").val(response.valor1);
					$("#usuario").val(response.valor2);
					
					$('#cod_pers').val('');
					$('#cod_pers').attr('disabled','-1');		
					$('#num_identidad').val('');
					$('#num_identidad').attr('disabled','-1');
					$('#nombre_1').val('');
					$('#nombre_1').attr('disabled','-1');
					$('#nombre_2').val('');
					$('#nombre_2').attr('disabled','-1');
					$('#apellido_1').val('');
					$('#apellido_1').attr('disabled','-1');
					$('#apellido_2').val('');
					$('#apellido_2').attr('disabled','-1');
					$('#telefono').val('');
					$('#telefono').attr('disabled','-1');
					$('#celular').val('');
					$('#celular').attr('disabled','-1');
					$('#email').val('');
					$('#email').attr('disabled','-1');
					$('#ref_dir').val('');
					$('#ref_dir').attr('disabled','-1');
					$('#id_tipo_cli').val(0);
					$('#id_tipo_cli').attr('disabled','-1');
					$('#id_estado_cli').val(0);
					$('#id_estado_cli').attr('disabled','-1');
					$('#f_nacimiento').val('');
					$('#f_nacimiento').attr('disabled','-1');
					$('#id_persona').val(0);
					
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

		// Funcion para el Boton Buscar Persona
		$( "#botonbc" ).click(function() {
        var p_CodPers 				= $("#cod_pers").val();
        var p_NumIdentidad 			= $("#num_identidad").val();
		var p_NomName1	 			= $("#nombre_1").val();
		var p_NomName2				= $("#nombre_2").val();
		var p_Apelli1				= $("#apellido_1").val();
		var p_Apelli2 				= $("#apellido_2").val();
		var p_Telefono				= $("#telefono").val();
		var p_Celular 				= $("#celular").val();
		var p_EMail					= $("#email").val();
		var p_RefDir 				= $("#ref_dir").val();
		var p_FeNacimiento			= $("#f_nacimiento").val();
		var p_IdPersona				= $("#id_persona").val();
		var p_Op					= $("#op").val();
		
        var data = "gp_CodPers="+p_CodPers+"&gp_NumIdentidad="+p_NumIdentidad+"&gp_NomName1="+p_NomName1+"&gp_NomName2="+p_NomName2+"&gp_Apelli1="+p_Apelli1+"&gp_Apelli2="+p_Apelli2+"&gp_Telefono="+p_Telefono+"&gp_Celular="+p_Celular+"&gp_Email="+p_EMail+"&gp_RefDir="+p_RefDir+"&gp_FeNacimiento="+p_FeNacimiento+"&gp_IdPersona="+p_IdPersona+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlClientes/ctrlBuscarPersonas.php",
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
										
					//$('#cod_pers').val('');
					//$("#cod_pers").val(response.valor1);
					$("#num_identidad").val(response.valor2);
					$("#nombre_1").val(response.valor3);
					$("#nombre_2").val(response.valor4);
					$("#apellido_1").val(response.valor5);
					$("#apellido_2").val(response.valor6);
					$("#telefono").val(response.valor7);
					$("#celular").val(response.valor8);
					$("#email").val(response.valor9);
					$("#ref_dir").val(response.valor10);
					$("#f_nacimiento").val(response.valor11);
					$("#id_persona").val(response.valor12);
																		
					setTimeout(function () 
					{
					$("#alert_success").slideUp("slow");
					}, 1000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				$('#num_identidad').val('');
				$('#num_identidad').attr('disabled','-1');
				$('#nombre_1').val('');
				$('#nombre_1').attr('disabled','-1');
				$('#nombre_2').val('');
				$('#nombre_2').attr('disabled','-1');
				$('#apellido_1').val('');
				$('#apellido_1').attr('disabled','-1');
				$('#apellido_2').val('');
				$('#apellido_2').attr('disabled','-1');
				$('#telefono').val('');
				$('#telefono').attr('disabled','-1');
				$('#celular').val('');
				$('#celular').attr('disabled','-1');
				$('#email').val('');
				$('#email').attr('disabled','-1');
				$('#ref_dir').val('');
				$('#ref_dir').attr('disabled','-1');
				$('#f_nacimiento').val('');
				$('#f_nacimiento').attr('disabled','-1');
				$('#id_persona').val('');
				$('#id_persona').attr('disabled','-1');
				
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

