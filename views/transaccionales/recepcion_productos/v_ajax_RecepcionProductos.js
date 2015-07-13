/* 
 * @autor : Nahum Martinez
 * @Fecha : 2015-01-06
 * @Task  : Se Crea el FUNCN, para los distintos eventos y validaciones desde JQuery 
 */

$(document).ready(function () {  
		
        // Funcion para la Recepcion de Compras
	// Parametros Enviados desde el Formulario -- Boton de Recepcion
		$( "#btnAceptarCompra" ).click(function() {
                    
                // Validacion de Datos Nesesarios para la Recepcion
                var p_CodCompra     = $("#cod_compra").val();
                var p_CodProveedor  = $("#cod_proveedor").val();
                var p_CodAlmacen    = $("#cod_almacen_p").val();
                var p_Criterio      = $('input:radio[name=rdb_busca]:checked').val();
                var p_Op            = $("#op").val();
                
                if (typeof(p_CodCompra) == "undefined"){
                    alert("Debe Seleccionar los Datos de la Compra; para continuar");
                    $("#cod_compra").focus();
                    return;
                }else if(p_CodCompra == ''){
                    alert("Debe Seleccionar los Datos de la Compra; para continuar ");
                    $("#cod_compra").focus();
                    return;
                }else if(p_CodProveedor == '') {
                    alert("Debe Seleccionar los Datos del Proveedor; para continuar ");
                    $("#cod_proveedor").focus();
                    return;
                }else if(p_CodAlmacen == ''){
                    alert("Debe Seleccionar los Datos del Almacen de Destino; para continuar ");
                    $("#cod_almacen_p").focus();
                    return;
                } 
                
                //alert("Valor de OP -- "+p_Op);
                // Envio por Medio de Ajax al Controlador
                
                var data = "gp_CodCompra="+p_CodCompra+"&gp_Criterio="+p_Criterio+"&gp_CodAlmacen="+p_CodAlmacen+"&gp_Op="+p_Op;
		$.ajax({
		    type: "POST",
                    url: "../../../ctrl/ctrlRecepcionCompras/ctrlRecepcionCompras.php",
                    data: data,
                    // timeout:3000, Se Comenta Debido a que hay Procesos que tienen un Intervalo de Respuesta mas Grande
                    dataType: 'json',
                    beforeSend: function () {
                        $("#alert_error").slideUp("slow");
                        $("#div_carga").show();
                    },
                    success: function(response) {
				var status = response.status;
				var find   = response.mod;
                                if (find == "si" ) {
					setTimeout(function () 
                                    {
                                        
					setTimeout(function () 
					{
                                          $("#alert_success").slideDown("slow");
					  $("#alert_success").text(response.msg);
                                          // Reincia el Formulario
                                          $(location).attr('href',"v_mant_recepcion_productos.php");
					}, 600);
                                    });
                                    // Esconde el DIV de Loader.
                                    $("#div_carga").hide();
				
                                }else{
                                    $("#alert_error").slideDown("slow");
                                    $("#alert_error").text(response.error);
                                    //$("#po").val(response.Codigo);
                                    setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
                                }
                    // Error de Peticion al Ajax                    
                    },error: 
                        AjaxFailed    

                });

            });
		
	// Funcion para el Boton Cancelar la Recepcion de la Compra
            $( "#botonc" ).click(function() {
                var p_CodProd 				= $("#cod_prod").val();
                var p_FeCreacion 			= $("#f_creacion").val();
		var p_Programa 				= $("#programa").val();
		var p_Usuario 				= $("#usuario").val();
		var p_DescProd 				= $("#desc_prod").val();
		var p_Altura	 			= $("#altura").val();
		var p_Anchura				= $("#anchura").val();
		var p_Peso				= $("#peso").val();
		var p_IdMedida 				= $("#id_medida").val();
		var p_FeElaboracion			= $("#f_elaboracion").val();
		var p_FeVencimiento			= $("#f_vencimiento").val();
		var p_IdTipoProd			= $("#id_tipo_prod").val();
		var p_IdColor 				= $("#id_color").val();
		var p_PrecioCosto			= $("#p_costo").val();
		var p_PrecioVenta_1			= $("#p_venta_1").val();
		var p_PrecioVenta_2			= $("#p_venta_2").val();
		var p_PrecioVenta_3			= $("#p_venta_3").val();
		var p_IdDescuento			= $("#id_descuento").val();
		var p_IdImpto				= $("#id_impto").val();
		var p_CantIni				= $("#cant_ini").val();
		var p_CantMax				= $("#cant_max").val();
		var p_CantReal				= $("#cant_real").val();
		var p_CantReOrden			= $("#cant_re_orden").val();
		var p_IndFact				= $("#ind_fact").val();
		var p_IdProveedor			= $("#id_proveedor").val();
		var p_Observaciones			= $("#obs_prod").val();
		var p_Op				= $("#op").val();
		
                var data = "gp_CodProd="+p_CodProd+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+
                           "&gp_Usuario="+p_Usuario+"&gp_DescProd="+p_DescProd+"&gp_Altura="+p_Altura+
                           "&gp_Anchura="+p_Anchura+"&gp_Peso="+p_Peso+"&gp_IdMedida="+p_IdMedida+
                           "&gp_FeElaboracion="+p_FeElaboracion+"&gp_FeVencimiento="+p_FeVencimiento+
                           "&gp_IdTipoProd="+p_IdTipoProd+"&gp_IdColor="+p_IdColor+"&gp_PrecioCosto="+p_PrecioCosto+
                           "&gp_PrecioVenta_1="+p_PrecioVenta_1+"&gp_PrecioVenta_2="+p_PrecioVenta_2+
                           "&gp_PrecioVenta_3="+p_PrecioVenta_3+"&gp_IdDescuento="+p_IdDescuento+
                           "&gp_IdImpto="+p_IdImpto+"&gp_CantIni="+p_CantIni+"&gp_CantMax="+p_CantMax+
                           "&gp_CantReal="+p_CantReal+"&gp_CantReOrden="+p_CantReOrden+"&gp_IndFact="+p_IndFact+
                           "&gp_IdProveedor="+p_IdProveedor+"&gp_Observaciones="+p_Observaciones+"&gp_Op="+p_Op;
		$.ajax({
			type: "POST",
                        url: "../../../ctrl/ctrlIngresoProductos/ctrlIngresoProductos.php",
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
					
					// Seteo del Contenido Vacio de la Tabla
                                    var html = '';
                                    //'<tr><td colspan="6">No se encontraron registros..</td></tr>';
                                    // Genera el HTML; para cargar los Datos de la Tabla   
                                    $("#table_tran tbody").html(html);
                                    
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
		// Seteo del Contenido Vacio de la Tabla
                var html = '';
                //'<tr><td colspan="6">No se encontraron registros..</td></tr>';
                // Genera el HTML; para cargar los Datos de la Tabla   
                $("#table_tran tbody").html(html);
                // Limpia el Radio Button del Formulario
                $('input[name=rdb_busca]').attr('checked',false);
            }

      });

    });
    
        // Funcion que Evalua un Error de Peticion Ajax, pero su Estado sea (200ok),
        // La Solicitud ha sido Procesada Exitosamente a Nivel de Modelo *********** 
        function AjaxFailed(result) {

            // Evalua que el Estado de la Peticion sea (200 ok) Hecho
            if (result.status == 200){
                // Aviso de Operacion Exitosa
                   $("#alert_success").slideDown("slow");
                   $("#alert_success").text("La Recepcion de la Compra, se ha Realizado Exitosamente");
                // Reiniciamos el Formulario
                   setTimeout(function () 
                    {
                    // Reincia el Formulario
                      $(location).attr('href',"v_mant_recepcion_productos.php");
                    }, 800);

            }else{ 
                $("#alert_error").slideDown("slow");
                  setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
                $("#alert_error").text("La Recepcion de la Compra ha Fallado pulse F5, para reintertarlo");
            }
        }
                
        
});//Fin del Script

