/* 
 * @autor : Nahum Martinez
 * @Fecha : 2014-12-20
 * @Task  : Se Crea el FUNCN, para los distintos eventos y validaciones desde JQuery 
 */

$(document).ready(function () {  
    // Funcion para la Definir los Criterios de la Busqueda de las Compras
    // Parametros Enviados desde el Input (cod_prod) -- Boton de Busqueda
	$("#botonb").click(function () {
            
            var compa = ($('input:radio[name=rdb_busca]:checked').val()); 
            var p_CodCompra = $("#cod_compra").val();
            var p_Criterio  = $('input:radio[name=rdb_busca]:checked').val();
            var p_Op        = $("#op").val();
            
            if (typeof(compa) == "undefined"){
                alert("Debes Seleccionar una Opcion de Busqueda : Codigo / Documento");
                
                return;
            }else if(p_CodCompra == ''){
                alert("Debes Ingresar los Datos de : Codigo / Documento");
                $("#cod_compra").focus();
                return;
            }
            
            // Serializar los Datos de Envio
            var data = "gp_CodCompra="+p_CodCompra+"&gp_Criterio="+p_Criterio+"&gp_Op="+p_Op;
            
            $.ajax({
              type: "POST",
              url: "../../../ctrl/ctrlRecepcionCompras/ctrlBuscarCompas.php",
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
					
                                    // Seteo del Contenido del ctrlRecepcionCompras        
				    //$("#cod_compra").val(response.valor1);
                                    $("#f_compra").val(response.valor2);
                                    $("#imp_total").val(response.valor3);
                                    $('#imp_total').number( true, 2 );
                                    $("#imp_descuento").val(response.valor4);
                                    $('#imp_descuento').number( true, 2 );
                                    //$("#desc_dir").val(response.valor5);
                                    $("#f_entrega").val(response.valor6);
                                    $("#cod_proveedor").val(response.valor7);
                                    $("#nombre_proveedor").val(response.valor8);
                                    $("#dir_proveedor").val(response.valor9);
                                    $("#telefono_proveedor").val(response.valor10);
                                    $("#celular_proveedor").val(response.valor11);
                                    $("#email").val(response.valor12);
                                    $("#rubro_proveedor").val(response.valor13);
                                    $("#tipo_proveedor").val(response.valor14);
                                    $("#rtn").val(response.valor15);
                                    $("#usuario").val(response.valor16);
                                    //$("#imp_isv").val(Math.round(response.valor17 * 100)/100);
                                    //$("#imp_isv").val(response.valor17);
                                    $("#cant_art").val(response.valor18);
                                    $("#gastos").val(Math.round(response.valor19 * 100)/100);
                                    $('#gastos').number( true, 2 );
                                    $("#observaciones").val(response.valor20);
                                    $("#h_entrega").val(response.valor21);
                                                                  
                                    // Llamado al Ajax de las Cargas de los Items de los Productos 
                                    // de la Compra
                                                                           
                                    $.ajax({
                                        type:"POST",
                                        url:"../../../ctrl/ctrlRecepcionCompras/ctrlBuscarItemsCompras.php",
                                        data:data,
                                        dataType:'json',
                                        success: function(response)
                                        {
                                            // Declara el Array a (dev) 
                                            var dev = response.array ;
                                            // Declara la Variable a Cargar de la Tabla 
                                            var html='';
                                            // Declaraciones de Variables Sumatorias
                                            var sumImporte    = 0 ;
                                            var sumImpuesto   = 0;
                                            var sumCantidades = 0;
                                            
                                              $.each(dev, function(i, item){
                                                var dos =  item.length;
                                                // Recorre los Items del Array   
                                                  for(i=0; i < dos; i++)
                                                  {
                                                                                                       
                                                    html += '<tr>';
                                                    html += '<td>'+item[i].cod_prod+'</td>';
                                                    html += '<td>'+item[i].desc_prod+'</td>';
                                                    html += '<td style="text-align: center;">'+item[i].cantidad+'</td>';
                                                    html += '<td style="text-align: right;">'+item[i].precio+'</td>';
                                                    html += '<td style="text-align: right;">'+item[i].impuesto+'</td>';
                                                    html += '<td style="text-align: right;">'+item[i].importe+'</td>';
                                                    html += '</tr>';
                                                    sumImporte    = parseFloat(sumImporte) + parseFloat(item[i].importe); 
                                                    sumImpuesto   = parseFloat(sumImpuesto) + parseFloat(item[i].impuesto);
                                                    sumCantidades = parseFloat(sumCantidades) + parseFloat(item[i].cantidad);
                                                    
                                                  }
                                                  // Aumenta (i) en uno
                                                  i++;
                                                  
                                              });
                                              
                                              // Condicion del Contenido de la Tabla
                                              if(html == '')
                                              {
                                                  html = '<tr><td colspan="6">No se encontraron registros..</td></tr>';
                                                  // Genera el HTML; para cargar los Datos de la Tabla   
                                                  $("#table_tran tbody").html(html);
                                                  $("#tot_art").val('');
                                                  $("#tot_isv").val('');
                                                  $("#tot_imp").val('');
                                              }else{
                                                  // Genera el HTML; para cargar los Datos de la Tabla   
                                                  $("#table_tran tbody").html(html);
                                                  $("#tot_art").val(sumCantidades);
                                                  $("#tot_isv").val(Math.round(sumImpuesto * 100)/100);
                                                  $('#tot_isv').number( true, 2 );
                                                  $("#tot_imp").val(Math.round(sumImporte * 100)/100);// Redondeo a dos Decimales
                                                  $('#tot_imp').number( true, 2 );
                                                  var imp = $("#tot_isv").val(); // Seta el Valor de los Impuestos al 1 er. Tab
                                                  $("#imp_isv").val(imp);
                                                  $('#imp_isv').number( true, 2 );
                                              }
                                                
                                        }
                                    }); // Fin de Llamado al Ajax de los Items
																		
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

        }); // Fin de Llamado del Ajax Principal
            
    });	
		
});//Fin del Script

