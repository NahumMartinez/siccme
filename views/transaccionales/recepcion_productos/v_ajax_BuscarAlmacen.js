/* 
 * @autor : Nahum Martinez
 * @Fecha : 2014-12-20
 * @Task  : Se Crea el FUNCN, para los distintos eventos y validaciones desde JQuery 
 */

$(document).ready(function () {  
    // Funcion para la Definir los Criterios de la Busqueda del Almacen
    // Parametros Enviados desde el Input (cod_almacen_1) -- Boton de Busqueda
	$("#btnBAlm").click(function () {
            var p_CodAlmacen = $("#cod_almacen_1").val();
            var p_Op         = $("#op1").val();
            
            var data = "gp_CodAlmacen="+p_CodAlmacen+"&gp_Op="+p_Op;
            
            $.ajax({
              type: "POST",
              url: "../../../ctrl/ctrlRecepcionCompras/ctrlBuscarAlmacen.php",
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
				    //$("#alert_success").slideDown("slow");
				    //$("#alert_success").text(response.msg);
					
                                    // Seteo del Contenido del ctrlRecepcionCompras/ctrlBuscarAlmacen.php        
				    //$("#cod_compra").val(response.valor1);
                                    $("#nom_almacen").val(response.valor2);
                                    $("#sucursal").val(response.valor3);
                                    $("#num_estantes").val(response.valor4);
                                    $("#emple_almacen").val(response.valor5);
                                    $("#id_almacen").val(response.valor6);
                                    
                                    // Pasa Valores al Formulario Principal
                                    $("#cod_almacen_p").val(response.valor1);
                                    $("#nom_almacen_p").val(response.valor2);
                                    $("#sucursal_p").val(response.valor3);
                                    $("#num_estantes_p").val(response.valor4);
                                    $("#emple_almacen_p").val(response.valor5);
                                    $("#id_almacen_p").val(response.valor6);
                                    
																		
				setTimeout(function () 
				{
				    $("#alert_success").slideUp("slow");
				}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
		// Limpiado de Varibles
                //$("#cod_compra").val(response.valor1);
                $("#f_compra").val('');
                $("#imp_total").val('');
                $("#imp_descuento").val('');
                //$("#desc_dir").val(response.valor5);
                $("#f_entrega").val('');
                $("#cod_proveedor").val('');
                $("#nombre_proveedor").val('');
                $("#dir_proveedor").val('');
                $("#telefono_proveedor").val('');
                $("#celular_proveedor").val('');
                $("#email").val('');
                $("#rubro_proveedor").val('');
                $("#tipo_proveedor").val('');
                $("#rtn").val('');
                $("#usuario").val('');
                $("#imp_isv").val('');
                $("#cant_art").val('');
                $("#gastos").val('');
                $("#observaciones").val('');
                $("#h_entrega").val('');

		setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
		}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo Procesar su Solicitud / Los Datos no se Encuentran");
			  			  
            }

        });
            
    });	
		
});//Fin del Script

