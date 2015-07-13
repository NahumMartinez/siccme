$(document).ready(function () { 
		
        // Funcion para la Busqueda
        // Parametros Enviados desde el Formulario -- Boton de Busqueda
        $( "#btnBuscaCliente" ).click(function() {
        var p_CodCliente = $("#cod_cliente_1").val();
        var p_Op	 = $("#op1").val();
		
        var data = "gp_CodCliente="+p_CodCliente+"&gp_Op="+p_Op;
        
        // Lamado al Metodo Ajax, con Parametros del Fomulario Modal ***********
        
	      $.ajax({
	      type: "POST",
              url: "../../../ctrl/ctrlRegistroFacturas/ctrlBuscarCliente.php",
              data: data,
              timeout:3000,
              dataType: 'json',
              beforeSend: function () {
                            $("#alert_error").slideUp("slow");
                            
			  },
              success: function(response) {
		    var find = response.find;
                    if (find == "ok" ) {
				setTimeout(function () 
				{
                                    $('#cod_cliente_1').val(response.valor1);
                                    $('#nom_cliente_1').val(response.valor2);
                                    $('#apell_cliente_1').val(response.valor3);
                                    $('#tipo_cliente_1').val(response.valor4);
                                    $('#estado_cliente_1').val(response.valor5);
                                    $('#id_cliente_1').val(response.valor6);
                                    $('#ref_dir_1').val(response.valor7);
                                    
                                    // Formulario de la Factura
                                    $('#cod_cliente').val(response.valor1);
                                    $('#nom_cliente').val(response.valor2);
                                    $('#apell_cliente').val(response.valor3);
                                    $('#tipo_cliente').val(response.valor4);
                                    //$('#estado_cliente').val(response.valor5);
                                    $('#id_cliente').val(response.valor6);
                                    
                                    //$('#cod_proveedor').focus();
					
				    setTimeout(function () 
				    {
                                        $("#alert_success").slideUp("slow");
						
				    }, 2000);
				});
				
            }else{
                    $("#alert_error").slideDown("slow");
                    $("#alert_error").text(response.error);
                    // Controles del Formulario
                    //$('#buscarprov').attr('disabled','-1');

                    $('#cod_proveedor').val('');
                    //$('#cod_proveedor').attr('disabled','-1');		
                    $('#cod_proveedor').focus();
                    setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
		}

            },error: function () {
                $("#alert_error").slideDown("slow");
                setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
                $("#alert_error").text("No se encontraron Datos");
                $('#cod_proveedor').focus();
                //$('#buscarprov').attr('disabled','-1');
			  
                }
		
            });
		
        });
		
});//Fin del Script		