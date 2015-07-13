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
            
            // Validacion de Campo de Codigo del Porducto ***********************
            var p_CodProd_val    = $("#cod_prod").val();
            if(p_CodProd_val == ''){
                alert('Falta Seleccionar el Producto, para continuar con la busqueda.');
                p_CodProd_val.focus();
                return;
            }
            
            $.ajax({
              type: "POST",
              url: "../../../ctrl/ctrlDistribucionProductos/ctrlBuscarAlmacen.php",
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
                                    $("#encargado_p").val(response.valor5);
                                    $("#id_almacen_p").val(response.valor6);
                                    $("#cant_real_p").val(response.valor7);
                                    $("#cant_max_p").val(response.valor8);
                                    $("#cant_min_p").val(response.valor9);
                                    $("#cant_reord_p").val(response.valor10);
                                    $("#ult_compra_p").val(response.valor11);
                                    
                                    
                                    $("#no_filas").val('');
                                    $("#no_columnas").val('');
                                    // Llamado al Ajax de las Cargas de los Items de los ************************************
                                    // Combos Genericos, De una o mas Tablas Segun su Tipo
                                    // Serializar los Datos de Envio
                                    // Variables de Carga :
                                    // Tipo de Combobox a Llenar
                                    var p_Tipo      = 1; 
                                    // Tablas del Query               ********************
                                    var p_tabla     = "T00_ESTANTES E";
                                    var p_tabla2    = "T00_ALMACENES A";
                                    
                                    // Campos que seran Seleccionados *********************
                                    var p_value     = "ID_ESTANTE";
                                    var p_option    = "NOM_ESTANTE";
                                    
                                    // Campos de Condicion del Query  *********************
                                    var p_parm      = $("#cod_almacen_1").val();
                                    var p_codigo    = "COD_ESTANTE";
                                    
                                    // Condicion Where del Query      *********************
                                    var p_where     = "E.ID_ALMACEN   = A.ID_ALMACEN AND A.COD_ALMACEN  = '"+p_parm+"' ";
                                    //var p_where = ""; 
                                    // **********************************************************************************        
                                    // Envio de la Peticion al Servidor con parametros y condicion de Llenado
                                    // Tipo de Combo = 1 (Varias Tablas) ************************************************
                                        $.post("../../../models/scripts/c_combo.php", 
                                                { gp_Tipo: p_Tipo, 'gp_Array[]': [p_tabla,p_tabla2],
                                                  gp_Codigo: p_codigo, gp_Value : p_value,
                                                  gp_Option: p_option, gp_Where: p_where }, function(data){
                                                  
                                            $("#combo_almacen").html(data);
                                            if(data == '<option value="0">Seleccione un Estante ...</option>'){
                                                alert('El Almacen Seleccionado, no posee Estantes ... ');
                                            }
                                        });
                                            
                                        
                                       // Tipo de Combo = 2 (Una Tabla) ***************************************     
                                       /* $.post("../../../models/scripts/c_combo.php", 
                                                { gp_Tipo: p_Tipo, gp_Tabla: p_tabla, gp_Codigo: p_codigo, gp_Value : p_value,
                                                  gp_Option: p_option, gp_Where: p_where }, function(data){
                                            $("#subcategory").html(data);
                                        });*/    
                                    // Fin del Llamado al Servidor de la Peticion ****************************************  
					
                                    // Llamado a la Carga de Cantidades de Inventario ************************************
                                    var p_CodProd    = $("#cod_prod").val();
                                    var p_CodAlmacen = $("#cod_almacen_1").val();
                                    var p_Op         = "obtenInventario";
            
                                    var data2 = "gp_CodAlmacen="+p_CodAlmacen+"&gp_CodProd="+p_CodProd+"&gp_Op="+p_Op;
                                    
                                    $.ajax({
                                        type: "POST",
                                        url: "../../../ctrl/ctrlDistribucionProductos/ctrlBuscarAlmacen.php",
                                        data: data2,
                                        timeout:3000,
                                        dataType: 'json', 
                                        success: function(response) {
                                            var find = response.valor_inv1;
                                            
                                            $("#c_real").text(response.valor_inv1);  
                                            $("#c_max").text(response.valor_inv2);
                                            $("#c_reord").text(response.valor_inv3); 
                                            
                                        }
                                    });        
                                    // Fin de LLamado de Carga de Cantidades de Invetario  *********************************
				setTimeout(function () 
				{
				    $("#alert_success").slideUp("slow");
				}, 2000);
				});
				
            }else{
                $("#alert_error").slideDown("slow");
                $("#alert_error").text(response.error);
		// Limpiado de Varibles
               
                $("#cod_almacen_p").val('');
                $("#nom_almacen_p").val('');
                $("#sucursal_p").val('');
                $("#num_estantes_p").val('');
                $("#emple_almacen_p").val('');
                $("#id_almacen_p").val('');
                $("#cant_real_p").val('');
                $("#cant_max_p").val('');
                $("#cant_min_p").val('');
                $("#cant_reord_p").val('');
                $("#ult_compra_p").val('');
                
                $("#no_filas").val('');
                $("#no_columnas").val('');

		setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
		}

            },error: function () {
              $("#alert_error").slideDown("slow");
              setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo Procesar su Solicitud / Los Datos no se Encuentran");
			  			  
            }

        });
            
    });	
		
                
   // Funcion de AutoLlenado de los Datos ala ser cargados los Combobox
   $("#combo_almacen").change(function () {
           $("#combo_almacen option:selected").each(function () {
            id_category = $(this).val();
            var p_CodAlmacen = $("#cod_almacen_1").val();
            var p_IdEstante  = $("#combo_almacen").val();
            var p_Op         = "obtenDatosEstante";
            
            var data = "gp_CodAlmacen="+p_CodAlmacen+"&gp_IdEstante="+p_IdEstante+"&gp_Op="+p_Op;
                               
            $.ajax({
              type: "POST",
              url: "../../../ctrl/ctrlDistribucionProductos/ctrlBuscarAlmacen.php",
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
                                    $("#no_filas").val(response.valor1);
                                    $("#no_columnas").val(response.valor2);
                                    																		
				/*setTimeout(function () 
				{
				    $("#alert_success").slideUp("slow");
				}, 2000);*/
				});
				
            }else{
                //$("#alert_error").slideDown("slow");
                //$("#alert_error").text(response.error);
		// Limpiado de Varibles
               
                $("#no_filas").val('');
                $("#no_columnas").val('');
                
		//setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
		}

            },error: function () {
              //$("#alert_error").slideDown("slow");
              //setTimeout(function () { $("#alert_error").slideUp("slow"); }, 2000);
              $("#alert_error").text("No se pudo Procesar su Solicitud / Los Datos no se Encuentran");
			  			  
            }

        });   
               
        });
    })  
    
    
});//Fin del Script

