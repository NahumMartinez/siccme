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
                
                alert("Valor de OP -- "+p_Op);
                
                var data = "gp_CodCompra="+p_CodCompra+"&gp_Criterio="+p_Criterio+"&gp_Op="+p_Op;
		$.ajax({
		    type: "POST",
                    url: "../../../ctrl/ctrlRecepcionCompras/ctrlRecepcionCompras.php",
                    data: data,
                    timeout:3000,
                    dataType: 'json',
                    beforeSend: function () {
                        $("#alert_error").slideUp("slow");
				},
                    success: function(response) {
				var status = response.status
				var find	= response.mod
                                if (find == "si" ) {
					setTimeout(function () 
                                    {
                                        $("#alert_success").slideDown("slow");
					$("#alert_success").text(response.msg);
					
					setTimeout(function () 
					{
					/*$("#alert_success").slideUp("slow");
					/*$('#botonc').attr('disabled','-1');
					$('#botong').attr('disabled','-1');
					$('#boton').removeAttr('disabled');
					$('#botonb').removeAttr('disabled');
					//$('#botonbc').attr('disabled','-1');
					*/
					/*$('#cod_compra').val('');
							
					$('#cod_proveedor').val('');
					//$('#desc_prod').attr('disabled','-1');
					$('#rtn').val('');
					//$('#altura').attr('disabled','-1');
					$('#nombre_proveedor').val('');
					//$('#anchura').attr('disabled','-1');
					$('#tipo_proveedor').val('');
					//$('#peso').attr('disabled','-1');
					$('#rubro_proveedor').val('');
					//$('#id_medida').attr(disabled','-1');
					$('#telefono_proveedor').val('');
					//$('#f_elaboracion').attr('disabled','-1');
					$('#celular_proveedor').val('');
					//$('#f_vencimiento').attr('disabled','-1');
					$('#email').val('');
					//$('#id_tipo_prod').attr('disabled','-1');
					$('#dir_proveedor').val('');
					//$('#id_color').attr('disabled','-1');
					$('#cod_almacen_p').val('');
					//$('#p_costo').attr('disabled','-1');
					$('#id_almacen_p').val('0');
					//$('#p_venta_1').attr('disabled','-1');
					$('#nom_almacen_p').val('');
					//$('#p_venta_2').attr('disabled','-1');
					$('#num_estantes_p').val('');
					//$('#p_venta_3').attr('disabled','-1');
					$('#sucursal_p').val('');
					//$('#id_descuento').attr('disabled','-1');
					$('#f_compra').val('');
					//$('#id_impto').attr('disabled','-1');
					$('#h_entrega').val('');
					//$('#cant_ini').attr('disabled','-1');
					$('#usuario').val('');
					//$('#cant_max').attr('disabled','-1');
					$('#cant_art').val('0');
					//$('#cant_real').attr('disabled','-1');
					$('#imp_total').val('');
					//$('#cant_re_orden').attr('disabled','-1');
					$('#imp_descuento').val('');
					//$('#ind_fact').attr('disabled','-1');
					$('#imp_isv').val('');
					//$('#id_proveedor').attr('disabled','-1');
					$('#gastos').val('');
					//$('#obs_prod').attr('disabled','-1');*/
                                        /*$('#f_entrega').val('');
                                        $('#observaciones').val('');
                                        $('#f_entrega').val('');
                                        html = '';
                                        // Genera el HTML; para cargar los Datos de la Tabla   
                                        $("#table_tran tbody").html(html);
                                        $("#tot_art").val('0');
                                        $("#tot_isv").val('');
                                        $("#tot_imp").val('');*/
                                        
                                        $(location).attr('href',"v_mant_recepcion_productos.php");
			                
					}, 600);
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
                        $("#alert_error").text("No se pudo procesar su solicitudsdsdd");
			  
                    }

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
                
        
});//Fin del Script

