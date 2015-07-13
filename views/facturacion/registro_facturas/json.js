$(document).ready(function () {  
		
		// Funcion para la Mandar el Arreglo de los Items de la Compra
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botonm" ).click(function() {
		var tabla 			= document.getElementById("table_tran");
		var datosCodigos 	= [];
		var datosCant		= [];
		var datosPrecio		= [];
		var datosImpDto		= [];
		var datosIdDescto	= [];
		var datosImpRebj	= [];
		
			for(var i = 1; tabla.rows[i]; i++)
			{
				datosCodigos.splice(1, 0, tabla.rows[i].cells[0].innerHTML);
				datosCant.splice(2, 0, tabla.rows[i].cells[2].innerHTML);
				datosPrecio.splice(3, 0, tabla.rows[i].cells[3].innerHTML);
				datosIdDescto.splice(2, 0, tabla.rows[i].cells[4].innerHTML);
				datosImpRebj.splice(1, 0, tabla.rows[i].cells[0].innerHTML);
				datosImpRebj.splice(1, 0, tabla.rows[i].cells[2].innerHTML);
				datosImpRebj.splice(1, 0, tabla.rows[i].cells[3].innerHTML);
				datosImpRebj.splice(1, 0, tabla.rows[i].cells[4].innerHTML);
			}
		
		var miJSON  = JSON.stringify(datosCodigos);
		var miJSON2 = JSON.stringify(datosCant);
		var miJSON3 = JSON.stringify(datosPrecio);
		var miJSON4 = JSON.stringify(datosIdDescto);
		var miJSON5 = JSON.stringify(datosImpRebj);
		
        var data = "datos="+miJSON+"&datos2="+miJSON2+"&datos3="+miJSON3+"&datos4="+miJSON4+"&datos5="+miJSON5;
		$.ajax({
			type: "POST",
              url: "recibo-json.php",
              data: data
              //timeout:3000,
              //dataType: 'json'
               /*beforeSend: function () {
                $("#alert_error").slideUp("slow");
				},
              success: function(response) {
				var find	= response.find;
                if (find == "ok" ) {
					setTimeout(function () 
				{
					var Codigo			= response.valor1;
					var Descripcion		= response.valor2;
					var Precio			= response.valor3;
					var Impuesto		= response.valor4;
					
				}
					
					setTimeout(function () 
					{
						$("#alert_success").slideUp("slow");
						
					}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				  // Controles del Formulario
				  $('#botonbp').attr('disabled','-1');
				  
					$('#cod_prod').val('');
					$('#cod_prod').attr('disabled','-1');		
					$('#cant_prod').val('1');
					$('#cant_prod').attr('disabled','-1');
					$('#cod_prod').focus();
                setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
				}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se encontraron Datos");
			  $('#cod_prod').focus();
			  $('#botonbp').attr('disabled','-1');
			  
            }*/
		
		});
		
		});
		
});	