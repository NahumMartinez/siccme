$(document).ready(function () { 
		
		// Funcion para la Busqueda
		// Parametros Enviados desde el Formulario -- Boton de Busqueda
		$( "#btnbuscarp" ).click(function() {
		var p_CodProv 		= $("#cod_proveedor").val();
        var p_Op	 		= $("#op").val();
		
        var data = "gp_CodProv="+p_CodProv+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
              url: "../../../ctrl/ctrlCompras/ctrlBuscarProveedor.php",
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
					$('#cod_proveedor').val(response.valor1);
					$('#nom_proveedor').val(response.valor2);
					$('#tipo_proveedor').val(response.valor3);
					$('#est_proveedor').val(response.valor4);
					$('#rubro_proveedor').val(response.valor5);
					$('#id_proveedor').val(response.valor6);
					$('#ref_dir').val(response.valor7);
					
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