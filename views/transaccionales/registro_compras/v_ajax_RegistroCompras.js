/* 
 * @autor : Nahum Martinez
 * @Fecha : 2015-03-07
 * @Task  : Se Crea el FUNCN, para los distintos eventos y validaciones desde JQuery
 * @Objetivo : Almacenar la Compra con la Cantidad de Los Items Solicitados 
 */

$(document).ready(function () {
		
		
        // Funcion para la Insercion
		// Parametros Enviados desde el Formulario -- Boton de Guardar
		$( "#botong" ).click(function() {
                    
                // Validacion del Numero de Productos a Ingresar no sea > a 1000  
                if(validaCampos() == 'Bad'){
                    //alert('El Numero total de Productos a Comprar, es mayor al permitido(1000). ');
                    return;
                }
                else if(SumaItems() == 'Bad'){
                    alert('El Numero total de Productos a Comprar, es mayor al permitido(1000). ');
                    return;
                 }
                                        
                var p_CodCompra			= $("#secuencial").val();
                var p_FeCreacion 		= $("#f_creacion").val();
		var p_Programa 			= $("#programa").val();
		var p_Usuario 			= $("#usuario").val();
		var p_IdMondeda			= $("#id_moneda").val();
		var p_IdFormaPago 		= $("#id_forma_pago").val();
		var p_DocId			= $("#documento_id").val();
		var p_IdProveedor		= $("#id_proveedor2").val();
		var p_ImpDescuento		= $("#imp_descuento").val();
		var p_ImpTotal			= $("#imp_total").val();
		var p_GtosCompras		= $("#gtos_compas").val();
		var p_Observaciones		= $("#obs_compras").val();
		var p_FEntrega			= $("#f_entrega").val();
                
                    
		// Datos de los Items de Compras
		var tabla 			= document.getElementById("table_tran");
		var datosCodigos                = [];
		var datosCant                   = [];
		var datosPrecio                 = [];
		var datosIdDescto               = [];
		                
                // Variable de Opcion al JSON
		var p_Op			= $("#op").val();
		
		// Arrays Para los Items de Productos de la Compras
			for(var i = 1; tabla.rows[i]; i++)
			{
				datosCodigos.splice(1, 0, tabla.rows[i].cells[0].innerHTML);
				datosCant.splice(1, 0, tabla.rows[i].cells[2].innerHTML);
				datosPrecio.splice(1, 0, tabla.rows[i].cells[3].innerHTML);
				datosIdDescto.splice(1, 0, tabla.rows[i].cells[4].innerHTML);
			}
		// Array para ser Enviados con JSON via encode
		var miJSON  = JSON.stringify(datosCodigos);
		var miJSON2 = JSON.stringify(datosCant);
		var miJSON3 = JSON.stringify(datosPrecio);
		var miJSON4 = JSON.stringify(datosIdDescto);

                var data = "gp_CodCompra="+p_CodCompra+"&gp_FeCreacion="+p_FeCreacion+"&gp_Programa="+p_Programa+
                           "&gp_Usuario="+p_Usuario+"&gp_IdMoneda="+p_IdMondeda+"&gp_IdFormaPago="+p_IdFormaPago+
                           "&gp_DocId="+p_DocId+"&gp_IdProveedor="+p_IdProveedor+"&gp_ImpDescuento="+p_ImpDescuento+
                           "&gp_ImpTotal="+p_ImpTotal+"&gp_GtosCompras="+p_GtosCompras+"&gp_Observaciones="+p_Observaciones+
                           "&gp_FEntrega="+p_FEntrega+"&datos="+miJSON+"&datos2="+miJSON2+"&datos3="+miJSON3+"&datos4="+miJSON4+"&gp_Op="+p_Op;
		
		$.ajax({
			type: "POST",
                        url: "../../../ctrl/ctrlCompras/ctrlIngresoCompra.php",
                        data: data,
                        //timeout:3000,
                        dataType: 'json',
                        beforeSend: function () {
                            $("#alert_error").slideUp("slow");
			    // Efecto de Carga en Espera
                            $("#div_carga").show();
                        },
                        success: function(response) {
				var status      = response.status;
				var find	= response.find;
                        if (status == "si" ) {
				    setTimeout(function () 
				{
				    $("#alert_success").slideDown("slow");
				    $("#alert_success").text(response.msg);
					
					setTimeout(function () 
					{
                                            //Clean();
                                            $("#alert_success").slideUp("slow");
                                            $('#botonc').attr('disabled','-1');
                                            //$('#botong').attr('disabled','-1');
                                            $('#boton').removeAttr('disabled');
                                            $('#botonb').removeAttr('disabled');
                                            //$('#botonbc').attr('disabled','-1');

                                            $('#secuencial').val(response.valor1);
                                            $('#cod_prod').val('');

                                            $('#id_moneda').val(1);
                                            $('#id_forma_pago').val(1);
                                            //$('#id_forma_pago').attr('disabled','-1');
                                            $('#documento_id').val('');
                                            //$('#documento_id').attr('disabled','-1');
                                            // Limpieza de Proveedores
                                            $('#id_proveedor2').val('');
                                            $('#cod_proveedor2').val('');
                                            $('#nombre_proveedor2').val('');
                                            $('#tipo_proveedor2').val('');
                                            $('#id_proveedor').val('');
                                            $('#cod_proveedor').val('');
                                            $('#nombre_proveedor').val('');
                                            $('#tipo_proveedor').val('');
                                            $('#est_proveedor').val('');
                                            $('#rubro_proveedor').val('');
                                            $('#ref_dir').val('');

                                            $('#imp_descuento').val('0.00');
                                            $('#sub_total').val('0.00');
                                            $('#imp_total').val('0.00');
                                            $('#cant_prod').val('1');
                                            $('#gtos_compas').val('0.00');

                                            $('#obs_compras').val('');

                                            $('#f_entrega').val('');
                                            $('#table_tran tbody').remove();
					}, 2000);
				}); 
                                // Oculta el Loader
                                $("#div_carga").hide();
				
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
		
    // Funcion que Evalua un Error de Peticion Ajax, pero su Estado sea (200ok),
    // La Solicitud ha sido Procesada Exitosamente a Nivel de Modelo *********** 
    function AjaxFailed(result) {
        
        // Evalua que el Estado de la Peticion sea (200 ok) Hecho
        if (result.status == 200){
            // Aviso de Operacion Exitosa
               $("#alert_success").slideDown("slow");
               $("#alert_success").text("El Ingreso de la Compra, se ha Realizado Exitosamente");
            // Limpiamos el Formulario
               Clean();
            
        }else{ 
            $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
            $("#alert_error").text("El Ingreso de la Compra ha Fallado pulse F5, para reintertarlo");
        }
    }		
		
                
    // Funcion para Limpiar los Campos del Formulario
    function Clean(){
        $("#alert_success").slideUp("slow");
        $('#botonc').attr('disabled','-1');
        //$('#botong').attr('disabled','-1');
        $('#boton').removeAttr('disabled');
        $('#botonb').removeAttr('disabled');
        //$('#botonbc').attr('disabled','-1');

        $('#secuencial').val(response.valor1);
        $('#cod_prod').val('');

        $('#id_moneda').val(1);
        $('#id_forma_pago').val(1);
        //$('#id_forma_pago').attr('disabled','-1');
        $('#documento_id').val('');
        //$('#documento_id').attr('disabled','-1');
        // Limpieza de Proveedores
        $('#id_proveedor2').val('');
        $('#cod_proveedor2').val('');
        $('#nombre_proveedor2').val('');
        $('#tipo_proveedor2').val('');
        $('#id_proveedor').val('');
        $('#cod_proveedor').val('');
        $('#nombre_proveedor').val('');
        $('#tipo_proveedor').val('');
        $('#est_proveedor').val('');
        $('#rubro_proveedor').val('');
        $('#ref_dir').val('');

        $('#imp_descuento').val('0.00');
        $('#sub_total').val('0.00');
        $('#imp_total').val('0.00');
        $('#cant_prod').val('1');
        $('#gtos_compas').val('0.00');

        $('#obs_compras').val('');

        $('#f_entrega').val('');
        $('#table_tran tbody').remove();
        //$(location).attr('href',"v_mant_registro_compras.php");

    }
    
});//Fin del Script

