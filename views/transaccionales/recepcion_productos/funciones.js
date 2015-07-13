/* 
 * @autor : Nahum Martinez
 * @Fecha : 2014-12-20
 * @Task  : Se Crea el FUNCN, para los distintos eventos y validaciones desde JQuery 
 */

$(document).ready(function () {  
    // Funcion para la Definir los Criterios de la Busqueda de las Compras
    // Parametros Enviados desde el Input (cod_prod) -- Boton de Busqueda
	$("#botonb").click(function () {	
            alert($('input:radio[name=rdb_busca]:checked').val());
            var p_CodCompra = $("#cod_compra").val();
            var p_Criterio  = $("#rdb_busca").val();
            var p_Op        = $("#op").val();
            
            var data = "gp_CodCompra"+p_CodCompra+"gp_Criterio"+p_Criterio+"gp_Op"+p_Op;
            
            $.ajax({
              type: "POST",
              url: "../../../ctrl/ctrlRecepcionCompras/ctrlBuscarCompras.php",
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
				    $("#alert_success").slideDown("slow");
				    $("#alert_success").text(response.msg);
										
				    $("#desc_prod").val(response.valor2);
																		
				setTimeout(function () 
				{
				    $("#alert_success").slideUp("slow");
				}, 1000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
				$('#desc_prod').val('');
				
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

